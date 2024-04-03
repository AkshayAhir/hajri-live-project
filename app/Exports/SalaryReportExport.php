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
use App\Models\Attendance;
use App\Models\Business;

class SalaryReportExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
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
            "ID", "First Name","Last Name", "Middle Name", "Department", "Present Days", "Absent Days", "Total Working Days", "Working Hour","Total Time","Staff Salary","Final Salary",
        ];
    }    

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $business_id = Session('business_id');
                $business = Business::where('id', $business_id)->value('name');
                $month = session('month');
                $month = \Carbon\Carbon::parse($month)->format('F Y');
            
                if(!empty($this->selectedIds) &&count($this->selectedIds) === 1){
                    $staff_name = Staff::where('id', $this->selectedIds)->value('name');
                    $titleRange = 'A1:L1'; // Title range
                    $event->sheet->mergeCells($titleRange); // Merge cells for the title
                    $event->sheet->setCellValue('A1', $business); // Set the title content in cell A1
                    $event->sheet->getStyle('A1')->getFont()->setSize(25); // Set the font size for the title
                    // $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                    $titleRange = 'A2:L2'; // Title range
                    $event->sheet->mergeCells($titleRange); // Merge cells for the title
                    $event->sheet->setCellValue('A2', $staff_name.' Salary Report  - '.$month); // Set the title content in cell A1
                    $event->sheet->getStyle('A2')->getFont()->setSize(18); // Set the font size for the title
                    // $event->sheet->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $blankrange = 'A3:L3'; // Title range
                    $event->sheet->mergeCells($blankrange); // Merge cells for the title
                    $event->sheet->setCellValue('A3', '');

                    $cellRange = 'A4:L4'; // Header range
                    $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                    $event->sheet->getStyle($cellRange)->getFont()->setBold(true); // Bold font
                    $event->sheet->getStyle($cellRange)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('EDF2FF');


                    // Loop through the headings and set them in the respective cells
                    $headings = $this->headings();
                    $column = 'A';
                    foreach ($headings as $heading) {
                        $event->sheet->setCellValue($column . '4', $heading);
                        $column++;
                    }
                    // Write the data to the Excel sheet
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
                } 
            
                else {
                    $titleRange = 'A1:L1'; // Title range
                    $event->sheet->mergeCells($titleRange); // Merge cells for the title
                    $event->sheet->setCellValue('A1', $business); // Set the title content in cell A1
                    $event->sheet->getStyle('A1')->getFont()->setSize(25); // Set the font size for the title
                    // $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    
                    $titleRange = 'A2:L2'; // Title range
                    $event->sheet->mergeCells($titleRange); // Merge cells for the title
                    $event->sheet->setCellValue('A2', 'Salary Report  - '.$month); // Set the title content in cell A1
                    $event->sheet->getStyle('A2')->getFont()->setSize(18); // Set the font size for the title
                    // $event->sheet->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $blankrange = 'A3:L3'; // Title range
                    $event->sheet->mergeCells($blankrange); // Merge cells for the title
                    $event->sheet->setCellValue('A3', '');
    
                    $cellRange = 'A4:L4'; // Header range
                    $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                    $event->sheet->getStyle($cellRange)->getFont()->setBold(true); // Bold font
                    $event->sheet->getStyle($cellRange)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('EDF2FF');

    
                    // Loop through the headings and set them in the respective cells
                    $headings = $this->headings();
                    $column = 'A';
                    foreach ($headings as $heading) {
                        $event->sheet->setCellValue($column . '4', $heading);
                        $column++;
                    }
                    
                    // Start from the fourth row for data
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
                }
            },
        ];
    }

    public function collection()
    {
        DB::statement("SET SQL_MODE=''");
        $month = session('month');
        $business_id = Session('business_id');
        // dd($month);
        if (!empty($this->selectedIds)) {
            $post_data = Staff::with('Department')->whereIn('id', $this->selectedIds)->get();
        } else {
            $post_data = Staff::with('Department')->where('business_id', $business_id)->get();
        }
        
        $collect_data = [];
        foreach($post_data as $data) {
            $startDate = Carbon::parse($month)->startOfMonth();
            $endDate = Carbon::parse($month)->endOfMonth();
            $workingDaysCount = 0;
            $days = $startDate->copy();               

            while ($days <= $endDate) {
                if ($days->isWeekday()) {
                    $workingDaysCount++;
                }
                $days->addDay();
            }
            // return $workingDaysCount;
            $staff_salary = Staff::where('id', $data->id)->value('salary_amount');
            $perday_amt = $staff_salary / $workingDaysCount;

            $present_days = Attendance::where('staff_id', $data->id)->whereYear('date', $month->year)->whereMonth('date', $month->month)->where('status', 'Present')->distinct('date')->count();
            $absent_days = Attendance::where('staff_id', $data->id)->whereYear('date', $month->year)->whereMonth('date', $month->month)->where('status', 'Absent')->distinct('date')->count();

            $business_hour = Business::where('id', $business_id)->value('shift_hour');
        
            list($hours, $minutes, $seconds) = explode(':', $business_hour);
            $totalSeconds = ($hours * 3600) + ($minutes * 60) + $seconds;
            $totalSecondsWorked = $totalSeconds * $workingDaysCount;
            $hours = floor($totalSecondsWorked / 3600);
            $minutes = floor(($totalSecondsWorked % 3600) / 60);
            $seconds = $totalSecondsWorked % 60;
            $working_hour = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

            $total_hours = Attendance::where('staff_id', $data->id)->whereYear('date', $month->year)->whereMonth('date', $month->month)->where('status', 'Present')->pluck('total_time')->toArray();

            // $total_seconds = array_reduce($total_hours, function ($carry, $time) {
            //     list($hours, $minutes, $seconds) = explode(':', $time);
            //     return $carry + ($hours * 3600) + ($minutes * 60) + $seconds;
            // }, 0);
            
            // $totalHours = floor($total_seconds / 3600);
            // $totalMinutes = round(($total_seconds % 3600) / 60);
            // $total_Second = $total_seconds % 60;
            // $totalTime = sprintf('%02d:%02d:%02d', $totalHours, $totalMinutes, $total_Second);
            // $totalSeconds = ($totalHours * 3600) + ($totalMinutes * 60) + $total_Second;
            // $staff_days = $totalSeconds / (24 * 60 * 60);
            // $final_salary = round($perday_amt * $staff_days, 2);

            $total_seconds = $total_hours
                ? array_reduce($total_hours, function ($carry, $time) {
                    $timeParts = explode(':', $time);
                    if (count($timeParts) === 3) {
                        list($hours, $minutes, $seconds) = $timeParts;
                        return $carry + ($hours * 3600) + ($minutes * 60) + $seconds;
                    }
                    return $carry; // Return the existing carry value if the format is incorrect
                }, 0)
                : '-';
                
                
                if ($total_seconds !== '-') {
                    $totalHours = floor($total_seconds / 3600);
                    $totalMinutes = round(($total_seconds % 3600) / 60);
                    $total_Second = $total_seconds % 60;
                } else {
                    $totalHours = '-';
                    $totalMinutes = '-';
                    $total_Second = '-'; 
                }
                if ($totalHours !== '-' && $totalMinutes !== '-' && $total_Second !== '-') {
                    $totalTime = sprintf('%02d:%02d:%02d', $totalHours, $totalMinutes, $total_Second);
                    $totalSeconds = ($totalHours * 3600) + ($totalMinutes * 60) + $total_Second;
                    $staff_days = $totalSeconds / (24 * 60 * 60);
                    $final_salary = round($perday_amt * $staff_days, 2);
                } else {
                    $totalTime = '-';
                    $staff_days = '-';
                    $final_salary = '-';
                }

            $collect_data[] = [
                "ID" => $data->id,
                "First Name" => $data->name,
                "Last Name" => $data->last_name,
                "Middle Name" => $data->middle_name,
                "Department" => $data->Department['name'],
                "Present Days" => $present_days,
                "Absent Days" => $absent_days,
                "Total Working Days" => $workingDaysCount,
                "Working Hour" => $working_hour,
                "Total Time" => $totalTime,
                "Staff Salary" => $staff_salary,
                "Final Salary" => $final_salary,
            ];
        }
        // session()->forget('month');
        return collect($collect_data);
    }
}
