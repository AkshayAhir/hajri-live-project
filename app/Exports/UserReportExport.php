<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon\Carbon;
use Illuminate\Support\Collection;

use App\Models\Staff;
use App\Models\Business;

class UserReportExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    protected $selectedIds;

    public function __construct($selectedIds = null)
    {
        $this->selectedIds = $selectedIds;
    }

    public function headings(): array
    {
        return [
            "ID", "First Name", "Last Name", "Middle Name","Department","Salary Amount", "Phone Number", "Account Holder Name", "Account Number", "IFSC Code", "UPI ID", "Date Of Joining", "Designation", "UAN Number", "ESI Number", "PAN Number"
        ];
    }  
    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $month = session('month');
                $business_id = Session('business_id');
                $business = Business::where('id', $business_id)->value('name');
                
                $titleRange = 'A1:P1'; // Title range
                $event->sheet->mergeCells($titleRange); // Merge cells for the title
                $event->sheet->setCellValue('A1', $business.' Employee List'); // Set the title content in cell A1
                $event->sheet->getStyle('A1')->getFont()->setSize(25); // Set the font size for the title
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $blankrange = 'A2:P2'; // Title range
                $event->sheet->mergeCells($blankrange); // Merge cells for the title
                $event->sheet->setCellValue('A2', '');

                $cellRange = 'A3:P3'; // Header range
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                $event->sheet->getStyle($cellRange)->getFont()->setBold(true); // Bold font
                $event->sheet->getStyle($cellRange)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('EDF2FF');
                

                // Loop through the headings and set them in the respective cells
                $headings = $this->headings();
                $column = 'A';
                foreach ($headings as $heading) {
                    $event->sheet->setCellValue($column . '3', $heading);
                    $column++;
                }
                
                // Start from the fourth row for data
                $dataCollection = $this->collection();
                $row = 4;
                foreach ($dataCollection as $data) {
                    $column = 'A';
                    foreach ($data as $value) {
                        $event->sheet->setCellValue($column . $row, $value);
                        $column++;
                    }
                    $row++;
                }
            },
        ];
    }

    public function collection()
    {
        $business_id = Session('business_id');
        if (!empty($this->selectedIds)) {
            $post_data = Staff::with('Department','StaffBankDetail','StaffInfo')->whereIn('id', $this->selectedIds)->get();
        } else {
            $post_data = Staff::with('Department','StaffBankDetail','StaffInfo')->where('business_id', $business_id)->get();
        }
        
        $collect_data = [];
        foreach($post_data as $data) {
            // dd($data->StaffInfo['date_of_joining']);
            $collect_data[] = [
                "ID" => $data->id,
                "First Name" => $data->name,
                "Last Name" => $data->last_name,
                "Middle Name" => $data->middle_name,
                "Department" => $data->Department['name'] ?? '-',
                "Salary Amount" => $data->salary_amount,
                "Phone Number" => $data->phone_number,
                "Account Holder Name" => $data->StaffBankDetail['account_holder_name'] ?? '-',
                "Account Number" => " ". ($data->StaffBankDetail['account_number'] ?? '-' ). " ",
                "IFSC Code" => $data->StaffBankDetail['IFSC_code'] ?? '-' ,
                "UPI ID" => $data->StaffBankDetail['UPI_id'] ?? '-' ,
                "Date Of Joining" => $data->StaffInfo['date_of_joining'] ?? '-',
                "Designation" => $data->StaffInfo['designation'] ?? '-',
                "UAN Number" => $data->StaffInfo['UAN_number'] ?? '-',
                "ESI Number" => $data->StaffInfo['ESI_number'] ?? '-',
                "PAN Number" => $data->StaffInfo['PAN_number'] ?? '-',
            ];
        }
        // session()->forget('month');
        return collect($collect_data);
    }
}
