<?php

namespace App\Exports;

use App\Models\Payroll;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use DB;

class PayrollExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $payrun_id;

    public function __construct($payrun_id = null)
    {
        $this->payrun_id = $payrun_id;
    }

    public function headings(): array
    {
        return [
            "ID", "First Name","Last Name", "Middle Name","Phone Number", "Department", "Date", "Total Working Days", "Working Hour","Overtime","Staff Salary","Net Salary",
        ];
    }
    public function collection()
    {
        $post_data = Payroll::with('Staff','Staff.Department')->where('payrun_id',$this->payrun_id)->get();
        $collect_data = [];
        foreach($post_data as $data) {
            $rowData = [
                "ID" => $data->staff_id,
                "First Name" => $data->Staff->name,
                "Last Name" => $data->Staff->last_name,
                "Middle Name" => $data->Staff->middle_name,
                "Phone Number" => $data->Staff->phone_number,
                "Department" => $data->Staff->Department->name,
                "Date" => Carbon::parse($data->date)->format('M, Y'),
                "Total Working Days" => $data->total_hours,
                "Working Hour" => ($data->worked_hours) ? $data->worked_hours : '-',
                "Overtime" => $data->overtime,
                "Salary Amount" => '₹'.$data->Staff->salary_amount,
                "Net Salary" => '₹'.$data->net_salary
            ];
            // $rowData["Date"] = $date;
            $collect_data[] = $rowData;
        }
//        dd($collect_data);
        return collect($collect_data);
//        return Payroll::where('payrun_id',$this->payrun_id)->get();
    }
}
