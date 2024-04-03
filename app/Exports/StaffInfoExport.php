<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use DB;
use App\Models\Staff;
use App\Models\Business;

class StaffInfoExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $selectedIds;

    public function __construct($selectedIds)
    {
        $this->selectedIds = $selectedIds;
    }

    public function headings(): array
    {
        $headings = ["ID", "First Name","Last Name", "Middle Name","Phone Number","Salary Amount","Department","Account Holder Name","Account Number","IFSC Code","UPI Id","Date Of Joining","Designation","UAN Number","ESI Number","PAN Number"];
        return $headings;
    }  

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $business_id = Session('business_id');
                $business = Business::where('id', $business_id)->value('name');
        
                $titleRange = 'A1:P1';
                $event->sheet->mergeCells($titleRange);
                $event->sheet->setCellValue('A1', $business);
                $event->sheet->getStyle('A1')->getFont()->setSize(25);
                // $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $titleRange = 'A2:P2';
                $event->sheet->mergeCells($titleRange);
                $event->sheet->setCellValue('A2', 'Staff Personal Information');
                $event->sheet->getStyle('A2')->getFont()->setSize(18);
                // $event->sheet->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $titleRange = 'A3:P3';
                $event->sheet->mergeCells($titleRange);
                $event->sheet->setCellValue('A3', '');

                $cellRange = 'A4:P4';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                $event->sheet->getStyle($cellRange)->getFont()->setBold(true);
                $event->sheet->getStyle($cellRange)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('EDF2FF');

                $headings = $this->headings();
                $column = 'A';
                foreach ($headings as $heading) {
                    $event->sheet->setCellValue($column . '4', $heading);
                    $column++;
                }
                $dataCollection = $this->collection();
                $row = 5;
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
        $post_data = Staff::with('Department','StaffBankDetail','StaffInfo')->whereIn('id', $this->selectedIds)->get();
        $collect_data = [];
        foreach($post_data as $data) {
            // dd($data['id']);
           
                $rowData = [
                    "ID" => $data['id'],
                    "First Name" => $data['name'],
                    "Last Name" => $data['last_name'],
                    "Middle Name" => $data['middle_name'],
                    "Phone Number" => $data['phone_number'],
                    "Salary Amount" => $data['salary_amount'],
                    "Department" => $data->Department['name'],
                    "Account Holder Name" => $data->StaffBankDetail['account_holder_name'] ?? '-',
                    "Account Number" => " ". ($data->StaffBankDetail['account_number'] ?? '-' ). " ",
                    "IFSC Code" => $data->StaffBankDetail['IFSC_code'] ?? '-',
                    "UPI Id" => $data->StaffBankDetail['UPI_id'] ?? '-',
                    "Date Of Joining" => $data->StaffInfo['date_of_joining'] ?? '-',
                    "Designation" => $data->StaffInfo['designation'] ?? '-',
                    "UAN Number" => $data->StaffInfo['UAN_number'] ?? '-',
                    "ESI Number" => $data->StaffInfo['ESI_number'] ?? '-',
                    "PAN Number" => $data->StaffInfo['PAN_number'] ?? '-',
                ];    
                // $rowData["Date"] = $date;
                $collect_data[] = $rowData;
            
        }
        session()->forget('month');
        return collect($collect_data);
    }
}
