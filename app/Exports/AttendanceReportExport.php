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
use App\Models\Attendance;

class AttendanceReportExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
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
        $month = session('month');
        $startDate = \Carbon\Carbon::parse($month)->startOfMonth();
        $endDate = \Carbon\Carbon::parse($month)->endOfMonth();

        $headings = ["ID", "First Name", "Last Name","Middle Name","Present Days","Absent Days","Working Hours","Total Work Hours","Staff Salary"];
        $currentDate = clone $startDate;

        while ($currentDate <= $endDate) {
            $headings[] = $currentDate->format('M j');
            $currentDate->addDay();
        }

        return $headings;
    }   

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $month = session('month');
                $month = \Carbon\Carbon::parse($month)->format('F Y');
                $business_id = Session('business_id');
                $business = Business::where('id', $business_id)->value('name');
            
                if(!empty($this->selectedIds) &&count($this->selectedIds) === 1){
                    $staff_id = Attendance::where('id', $this->selectedIds)->value('staff_id');
                    $staff_name = Staff::where('id', $staff_id)->value('name');
                    $titleRange = 'A1:AN1'; // Title range
                    $event->sheet->mergeCells($titleRange); // Merge cells for the title
                    $event->sheet->setCellValue('A1', $business); // Set the title content in cell A1
                    $event->sheet->getStyle('A1')->getFont()->setSize(25); // Set the font size for the title
                    // $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                    $titleRange = 'A2:AN2'; // Title range
                    $event->sheet->mergeCells($titleRange); // Merge cells for the title
                    $event->sheet->setCellValue('A2', $staff_name.' Attendance Report - '.$month); // Set the title content in cell A1
                    $event->sheet->getStyle('A2')->getFont()->setSize(18); // Set the font size for the title
                    // $event->sheet->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $titleRange = 'A3:AN3'; // Title range
                    $event->sheet->mergeCells($titleRange); // Merge cells for the title
                    $event->sheet->setCellValue('A3', '');

                    $cellRange = 'A4:AN4'; // Header range
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
                    $titleRange = 'A1:AN1'; // Title range
                    $event->sheet->mergeCells($titleRange); // Merge cells for the title
                    $event->sheet->setCellValue('A1', $business); // Set the title content in cell A1
                    $event->sheet->getStyle('A1')->getFont()->setSize(25); // Set the font size for the title
                    // $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    
                    $titleRange = 'A2:AN2'; // Title range
                    $event->sheet->mergeCells($titleRange); // Merge cells for the title
                    $event->sheet->setCellValue('A2', 'Attendance Report - '.$month); // Set the title content in cell A1
                    $event->sheet->getStyle('A2')->getFont()->setSize(18); // Set the font size for the title
                    // $event->sheet->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $titleRange = 'A3:AN3'; // Title range
                    $event->sheet->mergeCells($titleRange); // Merge cells for the title
                    $event->sheet->setCellValue('A3', '');
    
                    $cellRange = 'A4:AN4'; // Header range
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
        $startDate = \Carbon\Carbon::parse($month)->startOfMonth();
        $endDate = \Carbon\Carbon::parse($month)->endOfMonth();
        if (!empty($this->selectedIds)) {
            $post_data = Attendance::with('Staff')
            ->whereIn('id', $this->selectedIds)
            ->get();
        } else {
            $post_data = Attendance::with(['Staff.StaffPhoto', 'Staff.Department'])
                ->whereYear('date', $month->year)->whereMonth('date', $month->month)
                ->whereHas('Staff', function ($query) use ($business_id) {
                    $query->where('business_id', $business_id);
                })
                ->groupBy('staff_id')
                ->get();
        }

        $allDates = [];
        $currentDate = clone $startDate;
        while ($currentDate <= $endDate) {
            $allDates[] = $currentDate->copy();
            $currentDate->addDay();
        }
        
        $workingDaysCount = 0;
        $days = $startDate->copy();

        while ($days <= $endDate) {
            if ($days->isWeekday()) {
                $workingDaysCount++;
            }
            $days->addDay();
        }

        // dd($workingDaysCount);  
        $collect_data = [];
        foreach($post_data as $data) {
            $present_days = Attendance::where('staff_id', $data['staff_id'])->whereYear('date', $month->year)->whereMonth('date', $month->month)->where('status', 'Present')->distinct('date')->count();
            $absent_days = Attendance::where('staff_id', $data['staff_id'])->whereYear('date', $month->year)->whereMonth('date', $month->month)->where('status', 'Absent')->distinct('date')->count();
            $total_hours = Attendance::where('staff_id', $data['staff_id'])->whereYear('date', $month->year)->whereMonth('date', $month->month)->where('status', 'Present')->pluck('total_time')->toArray();
            
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
                $totalTime = "{$totalHours}h {$totalMinutes}m";
            } else {
                $totalHours = '-';
                $totalMinutes = '-';
                $totalTime = "0h 0m";
            }

            // $total_seconds = array_reduce($total_hours, function ($carry, $time) {
            //     list($hours, $minutes, $seconds) = explode(':', $time);
            //     return $carry + ($hours * 3600) + ($minutes * 60) + $seconds;
            // }, 0);
            
            // $totalHours = floor($total_seconds / 3600);
            // $totalMinutes = round(($total_seconds % 3600) / 60);

            // $totalTime = "{$totalHours}h {$totalMinutes}m";

            $business_id = Staff::where('id', $data['staff_id'])->value('business_id');
            $business_hour = Business::where('id', $business_id)->value('shift_hour');
            
            list($hours, $minutes, $seconds) = explode(':', $business_hour);
            $totalSeconds = ($hours * 3600) + ($minutes * 60) + $seconds;
            $totalSecondsWorked = $totalSeconds * $workingDaysCount;
            $hours = floor($totalSecondsWorked / 3600);
            $minutes = floor(($totalSecondsWorked % 3600) / 60);
            $seconds = $totalSecondsWorked % 60;
            $working_hour = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
            
            $rowData = [
                // "Month" => \Carbon\Carbon::parse($month)->format('M Y'),
                "ID" => $data['staff_id'],
                "First Name" => $data->Staff[0]['name'],
                "Last Name" => $data->Staff[0]['last_name'],
                "Middle Name" => $data->Staff[0]['middle_name'],
                "Present Days" => $present_days,
                "Absent Days" => $absent_days,
                "Working Hours" => $working_hour,
                "Total Work Hours" => $totalTime,
                "Staff Salary" =>$data->Staff[0]['salary_amount'],
            ];            

            foreach ($allDates as $date) {
                $total_hours = Attendance::where('staff_id', $data['staff_id'])->whereDate('date', $date)->where('status', 'Present')->pluck('total_time')->toArray();
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
                    $totalTime = "{$totalHours}h {$totalMinutes}m";
                } else {
                    $totalHours = '-';
                    $totalMinutes = '-';
                    $totalTime = "0h 0m";
                }
                // $total_seconds = array_reduce($total_hours, function ($carry, $time) {
                //     list($hours, $minutes, $seconds) = explode(':', $time);
                //     return $carry + ($hours * 3600) + ($minutes * 60) + $seconds;
                // }, 0);
                
                // $totalHours = floor($total_seconds / 3600); 
                // $totalMinutes = round(($total_seconds % 3600) / 60);
    
                // $totalTime = "{$totalHours}h {$totalMinutes}m";
                $rowData[$date->format('M j')] = $totalTime;
            }
            $collect_data[] = $rowData;
        }
        // dd($collect_data);
        // session()->forget('month');
        return collect($collect_data);
    }
}
