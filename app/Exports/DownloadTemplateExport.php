<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Models\Department;

class DownloadTemplateExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
//    public function headings(): array
//    {
//        $headings = ["First name", "Middle name","Last name","Phone number","Email","Department","Salary Amount","Account holder name","Account number","IFSC Code","UPI Id"];
//        return $headings;
//    }
    public function sheets(): array
    {
//        $business_id = Session('business_id');
        $sheets = [];
        // First sheet
        $dataSheet1 = [
            ["Name", "Middle Name","Last Name","Phone Number","Email","Salary Amount","Account Holder Name","Account Number","IFSC Code","UPI Id"],

            ['amit',
                'bharatbhai',
                'patel',
                '9876543215',
                'amit@gmail.com',
                '12000',
                'amit bharatbhai patel',
                '9876543215424144',
                'BARODA001',
                'amit@sbi.com',
            ],
        ];
        $sheets[] = new class($dataSheet1) implements FromCollection, WithTitle {
            private $data;
            public function __construct($data)
            {
                $this->data = $data;
            }
            public function collection()
            {
                return collect($this->data);
            }
            public function title(): string
            {
                return 'Add staff Sample';
            }
        };

//        // Second sheet
//        $dataSheet2 = Department::select('id', 'name')->where('business_id',$business_id)->get();
//        $headersSheet2 = ['ID', 'Department Name'];
//
//        $dataSheet2->prepend($headersSheet2);
//
//        $sheets[] = new class($dataSheet2) implements FromCollection, WithTitle {
//            private $data;
//            public function __construct($data)
//            {
//                $this->data = $data;
//            }
//            public function collection()
//            {
//                return $this->data;
//            }
//            public function title(): string
//            {
//                return 'Departments';
//            }
//        };
        return $sheets;
    }
}
