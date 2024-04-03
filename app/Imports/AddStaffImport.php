<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\OnlyFirstSheet;

class AddStaffImport implements ToCollection, WithHeadingRow, WithTitle, WithMultipleSheets
{
    /**
    * @param Collection $collection
    */
    protected $sheetName;
    protected $importedData = [];
    public function setSheetName($sheetName)
    {
        $this->sheetName = $sheetName;
    }
    public function title(): string
    {
        return $this->sheetName;
    }
    public function collection(collection $row)
    {
        $add_staff = [];
        foreach ($row as $value) {
            $add_staff[] = $value;
        }
        $this->importedData = $add_staff;
    }
    public function getImportedData()
    {
        return $this->importedData;
    }
    public function sheets(): array
    {
        return [
            0 => $this,
        ];
    }
}
