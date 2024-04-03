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

class StaffAttendanceExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $staffId;
    protected $calender_date;
    protected $start_date;
    protected $end_date;

    public function __construct($staffId, $calender_date,$start_date, $end_date)
    {
        $this->staffId = $staffId;
        $this->calender_date = $calender_date;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }
    
    public function headings(): array
    {
        $month = Carbon::parse($this->calender_date);
        // dd($month);
        $startDate = \Carbon\Carbon::parse($this->start_date);
        $endDate = \Carbon\Carbon::parse($this->end_date);
        $headings = ["Date", "Total Time","In Time","Out Time","Break Time"];
        // $currentDate = clone $startDate;
        
        // while ($currentDate <= $endDate) {
        //     $headings[] = $currentDate->format('d M Y');
        //     $currentDate->addDay();
        // }
        // // dd($headings);

        return $headings;
    }   

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $month = session('month');
                $startDate = \Carbon\Carbon::parse($this->start_date)->format('jS F Y');
                $endDate = \Carbon\Carbon::parse($this->end_date)->format('jS F Y');
                $business_id = Session('business_id');
                $business = Business::where('id', $business_id)->value('name');
        
                $staff_name = Staff::with('Department','StaffBankDetail')->where('id', $this->staffId)->first();
                $titleRange = 'A1:AX1'; // Title range
                $event->sheet->mergeCells($titleRange); // Merge cells for the title
                $event->sheet->setCellValue('A1', $business); // Set the title content in cell A1
                $event->sheet->getStyle('A1')->getFont()->setSize(25); // Set the font size for the title
                // $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $titleRange = 'A2:AX2'; // Title range
                $event->sheet->mergeCells($titleRange); // Merge cells for the title
                $event->sheet->setCellValue('A2', $staff_name['name'].' '. $staff_name['last_name'].' Attendance Report - '.$startDate.' to '. $endDate); // Set the title content in cell A1
                $event->sheet->getStyle('A2')->getFont()->setSize(18); // Set the font size for the title
                // $event->sheet->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $titleRange = 'A3:AX3'; // Title range
                $event->sheet->mergeCells($titleRange); // Merge cells for the title
                $event->sheet->setCellValue('A3', '');

                $startDate = \Carbon\Carbon::parse($this->start_date);
                $endDate = \Carbon\Carbon::parse($this->end_date);

                $present_days = Attendance::where('staff_id', $this->staffId)->whereBetween('date', [$startDate,$endDate])->where('status', 'Present')->distinct('date')->count();
                $absent_days = Attendance::where('staff_id', $this->staffId)->whereBetween('date', [$startDate,$endDate])->where('status', 'Absent')->distinct('date')->count();
                $total_hours = Attendance::where('staff_id', $this->staffId)->whereBetween('date', [$startDate,$endDate])->where('status', 'Present')->pluck('total_time')->toArray();
                // dd($total_hours);
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

                $startDate = \Carbon\Carbon::parse($month)->startOfMonth();
                $endDate = \Carbon\Carbon::parse($month)->endOfMonth();
                $workingDaysCount = 0;
                $days = $startDate->copy();

                while ($days <= $endDate) {
                    if ($days->isWeekday()) {
                        $workingDaysCount++;
                    }
                    $days->addDay();
                }
                $business_hour = Business::where('id', $business_id)->value('shift_hour');
        
                list($hours, $minutes, $seconds) = explode(':', $business_hour);
                $totalSeconds = ($hours * 3600) + ($minutes * 60) + $seconds;
                $totalSecondsWorked = $totalSeconds * $workingDaysCount;
                $hours = floor($totalSecondsWorked / 3600);
                $minutes = floor(($totalSecondsWorked % 3600) / 60);
                $seconds = $totalSecondsWorked % 60;
                $working_hour = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

                $staffrang = 'A4:AX4'; // Title range
                $event->sheet->mergeCells($staffrang); // Merge cells for the title
                $event->sheet->setCellValue('A4', 'Present Days : '.$present_days);
                $event->sheet->getStyle($staffrang)->getFont()->setBold(true);

                $staffrang = 'A5:AX5'; // Title range
                $event->sheet->mergeCells($staffrang); // Merge cells for the title
                $event->sheet->setCellValue('A5', 'Absent Days : ' . $absent_days);
                $event->sheet->getStyle($staffrang)->getFont()->setBold(true);
                
                $staffrang = 'A6:AX6'; // Title range
                $event->sheet->mergeCells($staffrang); // Merge cells for the title
                $event->sheet->setCellValue('A6', 'Working Hours : '. $working_hour);
                $event->sheet->getStyle($staffrang)->getFont()->setBold(true);

                $staffrang = 'A7:AX7'; // Title range
                $event->sheet->mergeCells($staffrang); // Merge cells for the title
                $event->sheet->setCellValue('A7', 'Total Work hour : '. $totalTime);
                $event->sheet->getStyle($staffrang)->getFont()->setBold(true);

                $staffrang = 'A8:AX8'; // Title range
                $event->sheet->mergeCells($staffrang); // Merge cells for the title
                $event->sheet->setCellValue('A8', 'Salary Amount : '. $staff_name['salary_amount']);
                $event->sheet->getStyle($staffrang)->getFont()->setBold(true);

                $staffrang = 'A9:AX9'; // Title range
                $event->sheet->mergeCells($staffrang); // Merge cells for the title
                $event->sheet->setCellValue('A9', 'Department : '. $staff_name->Department['name']);
                $event->sheet->getStyle($staffrang)->getFont()->setBold(true);

                $staffrang = 'A10:AX10'; // Title range
                $event->sheet->mergeCells($staffrang); // Merge cells for the title
                $event->sheet->setCellValue('A10', 'Phone Number : '. $staff_name['phone_number']);
                $event->sheet->getStyle($staffrang)->getFont()->setBold(true);

                $staffrang = 'A11:AX11'; // Title range
                $event->sheet->mergeCells($staffrang); // Merge cells for the title
//              $event->sheet->setCellValue('A11', 'Account Holder Name : '. $staff_name->StaffBankDetail ? '-' : $staff_name->StaffBankDetail['account_holder_name']);
                $staffHolderName = $staff_name->StaffBankDetail ? $staff_name->StaffBankDetail['account_holder_name'] : '';
                $event->sheet->setCellValue('A11', 'Account Holder Name : '. $staffHolderName);
                $event->sheet->getStyle($staffrang)->getFont()->setBold(true);

                $staffrang = 'A12:AX12'; // Title range
                $event->sheet->mergeCells($staffrang); // Merge cells for the title
                $staffAccountNumber = $staff_name->StaffBankDetail ? $staff_name->StaffBankDetail['account_number'] : '';
                $event->sheet->setCellValue('A12', 'Account Number : '. $staffAccountNumber);
                $event->sheet->getStyle($staffrang)->getFont()->setBold(true);

                $staffrang = 'A13:AX13'; // Title range
                $event->sheet->mergeCells($staffrang); // Merge cells for the title
                $staffIFSCcode = $staff_name->StaffBankDetail ? $staff_name->StaffBankDetail['IFSC_code'] : '';
                $event->sheet->setCellValue('A13', 'IFSC Code : '. $staffIFSCcode);
                $event->sheet->getStyle($staffrang)->getFont()->setBold(true);

                $staffrang = 'A14:AX14'; // Title range
                $event->sheet->mergeCells($staffrang); // Merge cells for the title
                $staffUPIid = $staff_name->StaffBankDetail ? $staff_name->StaffBankDetail['UPI_id'] : '';
                $event->sheet->setCellValue('A14', 'UPI ID : '. $staffUPIid);
                $event->sheet->getStyle($staffrang)->getFont()->setBold(true);

                $staffrang = 'A15:AX15'; // Title range
                $event->sheet->mergeCells($staffrang); // Merge cells for the title
                $event->sheet->setCellValue('A15', 'Date Of Joining : '. '-');
                $event->sheet->getStyle($staffrang)->getFont()->setBold(true);

                $titleRange = 'A16:AX16'; // Title range
                $event->sheet->mergeCells($titleRange); // Merge cells for the title
                $event->sheet->setCellValue('A16', '');

                $cellRange = 'A17:AX17'; // Header range
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                $event->sheet->getStyle($cellRange)->getFont()->setBold(true); // Bold font
                $event->sheet->getStyle($cellRange)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('EDF2FF');

                // Loop through the headings and set them in the respective cells
                $headings = $this->headings();
                $column = 'A';
                foreach ($headings as $heading) {
                    $event->sheet->setCellValue($column . '17', $heading);
                    $column++;
                }
                // Write the data to the Excel sheet
                $dataCollection = $this->collection();
                $row = 18;
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
        // dd($this->start_date);
        DB::statement("SET SQL_MODE=''");  
        $month = Carbon::parse($this->calender_date);
        $business_id = Session('business_id');
        $startDate = \Carbon\Carbon::parse($this->start_date);
        $endDate = \Carbon\Carbon::parse($this->end_date);
        $post_data = Attendance::with('Staff.Department','Staff.StaffBankDetail','Staff.StaffInfo')
        ->where('staff_id', $this->staffId)
        ->whereBetween('date', [$startDate,$endDate])
        // ->groupBy('date')
        // ->whereMonth('date', $month->month)
        ->get()->take(1);

        // dd($post_data);
        $allDates = [];
        $currentDate = clone $startDate;
        while ($currentDate <= $endDate) {
            $allDates[] = $currentDate->copy()->format('Y-m-d');
            $currentDate->addDay();
        }
        // dd($allDates);
        
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
            // dd($data->Staff[0]->Department['name']); 
            $present_days = Attendance::where('staff_id', $data['staff_id'])->whereBetween('date', [$startDate,$endDate])->where('status', 'Present')->distinct('date')->count();
            $absent_days = Attendance::where('staff_id', $data['staff_id'])->whereBetween('date', [$startDate,$endDate])->where('status', 'Absent')->distinct('date')->count();
            $total_hours = Attendance::where('staff_id', $data['staff_id'])->whereBetween('date', [$startDate,$endDate])->where('status', 'Present')->pluck('total_time')->toArray();

            // $total_seconds = array_reduce($total_hours, function ($carry, $time) {
            //     list($hours, $minutes, $seconds) = explode(':', $time);
            //     return $carry + ($hours * 3600) + ($minutes * 60) + $seconds;
            // }, 0);
            
            // $totalHours = floor($total_seconds / 3600);
            // $totalMinutes = round(($total_seconds % 3600) / 60);

            // $totalTime = "{$totalHours}h {$totalMinutes}m";
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


            // $business_id = Staff::where('id', $data['staff_id'])->value('business_id');
            $business_hour = Business::where('id', $business_id)->value('shift_hour');
            
            list($hours, $minutes, $seconds) = explode(':', $business_hour);
            $totalSeconds = ($hours * 3600) + ($minutes * 60) + $seconds;
            $totalSecondsWorked = $totalSeconds * $workingDaysCount;
            $hours = floor($totalSecondsWorked / 3600);
            $minutes = floor(($totalSecondsWorked % 3600) / 60);
            $seconds = $totalSecondsWorked % 60;
            $working_hour = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

            foreach ($allDates as $date) {
                // $staff_id = Attendance::where('id', $this->staffId)->value('staff_id');
                $in_times = Attendance::where('staff_id', $this->staffId)->where('date', $date)->pluck('in_time')->toArray();
                $informatted_times = [];
                foreach ($in_times as $time) {
                    $formatted_time = date('h:i:s A', strtotime($time));
                    $informatted_times[] = $formatted_time;
                }               
                $in_time_formatted = implode(",\n", $informatted_times);

                $out_times = Attendance::where('staff_id', $this->staffId)->where('date', $date)->pluck('out_time')->toArray();
                $outformatted_times = [];
                foreach ($out_times as $time) {
                    $formatted_time = date('h:i:s A', strtotime($time));
                    $outformatted_times[] = $formatted_time;
                }               
                $out_time_formatted = implode(",\n", $outformatted_times);

                $break_time = Attendance::where('staff_id', $this->staffId)->where('date', $date)->value('break_time');

                $total_hours = Attendance::where('staff_id', $this->staffId)->where('date', $date)->where('status', 'Present')->pluck('total_time')->toArray();
                // dd($total_hours);
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
                $rowData = [
                    "Date" => $date,
                    "Total Time" => $totalTime,
                    "In Time" => $in_time_formatted,
                    "Out Time" => $out_time_formatted,
                    "Break Time" => $break_time,
                ];    
                // $rowData["Date"] = $date;
                $collect_data[] = $rowData;
            }
        }
        session()->forget('month');
        return collect($collect_data);
    }
}
