@extends('admin.layout.main')
@section('title')
<title>{{env('APP_NAME')}} | Dashboard</title>
@endsection
@section('content')
<!-- <div class="dashboard-main-todo">
    <div class="dashboard-title section_title proxima_nova_semibold">To Do Info</div>
</div>

<div class="dashborad_main">

    <div class="dashborad_todo_info_main">
        <div class="dash_todo_titles">
            <p class="dash_approve proxima_nova_semibold">Approve Punches</p>
            <p class="dash_status section_sub_title">2 days approval pending</p>
        </div>
        <div class="dashboard-right-arrow">
            <a href="{{route('approve_punches')}}"><img src="{{asset('assets/admin/images/dashboard/view_now.svg')}}"
                    alt=""></a>
        </div>
    </div>

    <div class="dashborad_todo_info_main">
        <div class="dash_todo_titles">
            <p class="dash_approve proxima_nova_semibold">Approve Overtime</p>
            <p class="dash_status section_sub_title">73 days approval pending</p>
        </div>
        <div class="dashboard-right-arrow">
            <a href="{{route('approve_overtime')}}"><img src="{{asset('assets/admin/images/dashboard/view_now.svg')}}"
                    alt=""></a>
        </div>
    </div>

    <div class="dashborad_todo_info_main">
        <div class="dash_todo_titles">
            <p class="dash_approve proxima_nova_semibold">Review Fine</p>
            <p class="dash_status section_sub_title">24 days approval pending</p>
        </div>
        <div class="dashboard-right-arrow">
            <a href="{{route('review_fine')}}"><img src="{{asset('assets/admin/images/dashboard/view_now.svg')}}"
                    alt=""></a>
        </div>
    </div>

    <div class="dashborad_todo_info_main dashborad_todo_last">
        <div class="dash_todo_titles">
            <p class="dash_approve proxima_nova_semibold">Manage Leaves</p>
            <p class="dash_status section_sub_title">1 pending to approve</p>
        </div>
        <div class="dashboard-right-arrow">
            <a href="{{route('manage_leave')}}"> <img src="{{asset('assets/admin/images/dashboard/view_now.svg')}}"
                    alt=""></a>
        </div>
    </div>

</div> -->

<div class="date-titles dashboard_current_day_txt">
    <h2 class="proxima_nova_semibold section_title">{{$current_day}}</h2>
</div>
<div class="all-employe-data row">
    <div class="date-total-employe col">
        <p class="proxima_nova_semibold employe-total">Total employee</p>
        <h2 class="proxima_nova_semibold" id="total_staff">{{$total_staff}}</h2>
        <a href="{{route('staff')}}">
            <p class="department-section proxima_nova_semibold">All Department</p>
        </a>
    </div>
    <div class="employe-time col">
        <p class="proxima_nova_semibold employe-total">On Time</p>
        <h2 class="proxima_nova_semibold" id="present_count">{{$present_count}}</h2>
        <a class="see_employee_status" data-status="Present">
            <p class="department-section proxima_nova_semibold">See Employees</p>
        </a>
    </div>
    <!-- <div class="employe-late">
        <p class="proxima_nova_semibold employe-total">Late</p>
        <h2 class="proxima_nova_semibold">5</h2>
        <a href="{{route('late')}}">
            <p class="department-section proxima_nova_semibold">See Employees</p>
        </a>
    </div> -->
    <div class="employe-absent col">
        <p class="proxima_nova_semibold employe-total">Absent / No Data</p>
        <h2 class="proxima_nova_semibold" id="absent_count">{{$absent_count}}</h2>
        <a class="see_employee_status" data-status="Absent">
            <p class="department-section proxima_nova_semibold">See Employees</p>
        </a>
    </div>
    <!-- <div class="employe-leave">
        <p class="proxima_nova_semibold employe-total">On Leave</p>
        <h2 class="proxima_nova_semibold">5</h2>
        <a href="{{route('leave')}}">
            <p class="department-section proxima_nova_semibold">See Employees</p>
        </a>
    </div> -->
    <div class="employe-late col">
        <p class="proxima_nova_semibold employe-total">Half Leave</p>
        <h2 class="proxima_nova_semibold" id="half_day">{{$half_day}}</h2>
        <a class="see_employee_status" data-status="Half Day">
            <p class="department-section proxima_nova_semibold">See Employees</p>
        </a>
    </div>

</div>

<div class="chart-sections">
    <div class="chart-main-sec">
        <div class="charts-date-main">
            <div class="chart-date-picker-main">
                <div class="chart-date-picker-sub">
                    <h2 class="section_title proxima_nova_semibold">Attendance Stats</h2>
                </div>
                <div> 
                    <input type="text" id="datepicker" name="start_month" class="attendance_status_month proxima_nova_semibold" value="{{ date('M Y') }}" readonly="true" autocomplete="off"> 
                    <!-- - <input type="text" id="datepicker2" name="end_month" class="attendance_status_month proxima_nova_semibold" readonly="true"> -->
                </div>
            </div>
            <div id="chart">
            </div>
        </div>
        

        <div class="dashboard-this-month">
            <div>
                <h5 class="section_title proxima_nova_semibold data-spaces-add">Holiday - This Month</h5>
            </div>
            <div class="holiday-list-main">
                <div class="proxima_nova_bold holiday-month-left">
                    Holiday Name
                </div>
                <div class="proxima_nova_bold holiday-month-right">
                    Date
                </div>
            </div>
            @if(count($holiday) != 0)
                @foreach($holiday as $holidays)
                    <div class="holiday-list-sub">
                        <div class="section_sub_title holiday-month-left holiday-sub-left">
                            {{$holidays['holiday_name']}}
                        </div>
                        <div class="section_sub_title holiday-month-right holiday-sub-left">
                            {{$holidays['holiday_date']}}
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center dash_atten_main_no_data holiday_data">
                    <img src="{{asset('assets/admin/images/dashboard/ic-date.svg')}}" class="dashboard_attendance_list_no_data" alt="">
                    <h5 class="proxima_nova_semibold section_title">No Data Found</h5>
                </div>
            @endif
        </div>

        
    </div>
        <!-- <div class="chart-shift-info-main">
            <div class="chart-date-picker-main">
                <div class="chart-date-picker-sub">
                    <h2 class="section_title proxima_nova_semibold">Shift Info</h2>
                </div>
                <div> <input type="text" id="datepicker3" class="proxima_nova_semibold" data-provide="datepicker"
                        data-date-format="mm/yyyy"></div>
            </div>
            <div id="chart1">
            </div>
        </div> -->
    </div>

</div>

<!-- <div class="employe-details-main">
    <div class="employe-details">
        <h2 class="section_title "> Detailed Attendance View</h2>
        <a href="{{route('detailed_attendance_view')}}" class="employe-Views-record"> <img
                src="{{asset('assets/admin/images/dashboard/view_now2.svg')}}" alt=""></a>
    </div>
    <div class="employe-details">
        <h2 class="section_title ">Upcoming leaves <span>(0)</span></h2>
        <a href="{{route('attendance-upcoming-leaves')}}" class="employe-Views-record2"><img
                src="{{asset('assets/admin/images/dashboard/view_now2.svg')}}" alt=""></a>
    </div>
    <div class="employe-details employe-details-last">
        <h2 class="section_title ">Daily Work Entries <span>(0)</span></h2>
        <a href="{{route('attendance-daily-work-entries')}}" class="employe-Views-record3"><img
                src="{{asset('assets/admin/images/dashboard/view_now2.svg')}}" alt=""></a>
    </div>
</div> -->

        <div class="">
                <div class="dashborad-data-today-employe">
                    <div class="today-report-data-dashboard">
                        <div class="report-see-all-data">
                            <h5 class="staff-report-title section_title proxima_nova_semibold">Present Staff</h5>
                            @if($presentstaff_count > 5)
                                <a class="see_employee_status" data-status="Present"><span class="proxima_nova_semibold section_sub_title staff-seeall">See all</span></a>
                            @endif
                        </div>
                        
                        <div class="present-staff-data">
                            <div class="proxima_nova_bold holiday-month-left">
                            Staff Name
                            </div>
                            <div class="proxima_nova_bold holiday-month-right">
                            Department
                            </div>
                        </div>
                        @if($presentstaff_count > 0)
                            @foreach($presentstaff as $presentstaffs)
                                @foreach($presentstaffs['Staff'] as $staff)                            
                                    <div class="dashboard-data-sub-list">
                                        <div class="holiday-month-left">
                                        <a href="/staff/staff-profile/{{$presentstaffs['staff_id']}}" class="staff-edit">
                                                <div class="user-images dash-user-images">
                                                    <div>
                                                    <!-- /assets/admin/images/dummy/dummy-user.png -->
                                                        @if(count($staff->staffPhoto) > 0)
                                                            <img src="{{asset('assets/admin/images/staff_photos/'.$staff->staffPhoto[0]->photo)}}" class="approve-user-img dash-images-data" alt="">
                                                        @else
                                                            <img src="{{asset('assets/admin/images/dummy/dummy-user.png')}}" class="approve-user-img dash-images-data" alt="">
                                                        @endif
                                                    </div>
                                                    <div>{{$staff['name']}}<p class="data-sub-field">{{$staff->Department['name']}}</p></div>
                                                </div>
                                            </a>
                                        </div>
                                        <div>
                                            <div class="section_sub_title holiday-month-right holiday-sub-left">
                                                {{$staff->Department['name']}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach                            
                            @endforeach
                        @else
                            <div class="text-center dash_atten_main_no_data">
                                <img src="{{asset('assets/admin/images/staff_manage/no_data.svg')}}" class="dashboard_attendance_list_no_data" alt="">
                                <h5 class="proxima_nova_semibold section_title">No Data Available</h5>
                            </div>
                        @endif

                    </div>

                    <div class="col today-report-data-dashboard">
                        <div class="report-see-all-data ">
                            <h5 class="staff-report-title section_title proxima_nova_semibold">Absent Staff</h5>
                            @if($absentstaff_count > 5)
                                <a class="see_employee_status" data-status="Absent"><span class="proxima_nova_semibold section_sub_title staff-seeall">See all</span></a>
                            @endif
                        </div>

                        <div class="absent-staff-data">
                            <div class="proxima_nova_bold holiday-month-left">
                            Staff Name
                            </div>
                            <div class="proxima_nova_bold holiday-month-right">
                            Department
                            </div>
                        </div>
                        @if($absentstaff_count > 0)
                            @foreach($absentstaff as $absentstaffs)
                                @foreach($absentstaffs['Staff'] as $staff)                            
                                    <div class="dashboard-data-sub-list">
                                        <div class="holiday-month-left">
                                        <a href="/staff/staff-profile/{{$absentstaffs['staff_id']}}" class="staff-edit">
                                                <div class="user-images dash-user-images">
                                                    <div>
                                                        @if(count($staff->staffPhoto) > 0)
                                                            <img src="{{asset('assets/admin/images/staff_photos/'.$staff->staffPhoto[0]->photo)}}" class="approve-user-img dash-images-data" alt="">
                                                        @else
                                                            <img src="{{asset('assets/admin/images/dummy/dummy-user.png')}}" class="approve-user-img dash-images-data" alt="">
                                                        @endif
                                                    </div>
                                                    <div>{{$staff['name']}}<p class="data-sub-field">{{$staff->Department['name']}}</p></div>
                                                </div>
                                            </a>
                                        </div>
                                        <div>
                                            <div class="section_sub_title holiday-month-right holiday-sub-left">
                                                {{$staff->Department['name']}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach                            
                            @endforeach
                        @else
                            <div class="text-center dash_atten_main_no_data">
                                <img src="{{asset('assets/admin/images/staff_manage/no_data.svg')}}" class="dashboard_attendance_list_no_data" alt="">
                                <h5 class="proxima_nova_semibold section_title">No Data Available</h5>
                            </div>
                        @endif

                    </div>

                    <div class="col today-report-data-dashboard">
                        <div class="report-see-all-data">
                            <h5 class="staff-report-title section_title proxima_nova_semibold">Half Leave Staff</h5>
                            @if($halfleave_count > 5)
                                <a class="see_employee_status" data-status="Half Day"><span class="proxima_nova_semibold section_sub_title staff-seeall">See all</span></a>
                            @endif
                        </div>

                        <div class="half-staff-data">
                            <div class="proxima_nova_bold holiday-month-left">
                            Staff Name
                            </div>
                            <div class="proxima_nova_bold holiday-month-right">
                            Department
                            </div>
                        </div>

                        @if($halfleave_count > 0)
                            @foreach($halfleave as $halfleaves)
                                @foreach($halfleaves['Staff'] as $staff)                            
                                    <div class="dashboard-data-sub-list">
                                        <div class="holiday-month-left">
                                        <a href="/staff/staff-profile/{{$halfleaves['staff_id']}}" class="staff-edit">
                                                <div class="user-images dash-user-images">
                                                    <div>
                                                        @if(count($staff->staffPhoto) > 0)
                                                            <img src="{{asset('assets/admin/images/staff_photos/'.$staff->staffPhoto[0]->photo)}}" class="approve-user-img dash-images-data" alt="">
                                                        @else
                                                            <img src="{{asset('assets/admin/images/dummy/dummy-user.png')}}" class="approve-user-img dash-images-data" alt="">
                                                        @endif
                                                    </div>
                                                    <div>{{$staff['name']}}<p class="data-sub-field">{{$staff->Department['name']}}</p></div>
                                                </div>
                                            </a>
                                        </div>
                                        <div>
                                            <div class="section_sub_title holiday-month-right holiday-sub-left">
                                            Web Development
                                            </div>
                                        </div>
                                    </div>
                                @endforeach                            
                            @endforeach
                        @else
                            <div class="text-center dash_atten_main_no_data">
                                <img src="{{asset('assets/admin/images/staff_manage/no_data.svg')}}" class="dashboard_attendance_list_no_data" alt="">
                                <h5 class="proxima_nova_semibold section_title">No Data Available</h5>
                            </div>
                        @endif

                    </div>
                </div>
        </div>

<!-- <div class="bonus-chart-section">
    <div class="bonus-chart-main">
        <div class="bouns-title-main">
            <div class="bouns-title-sub">
                <h2 class="section_title proxima_nova_semibold">Allowance/Deduction/Bonus</h2>
            </div>
            <div> <input type="text" id="datepicker4" class="proxima_nova_semibold" data-provide="datepicker"
                    data-date-format="mm/yyyy"></div>
        </div>
        <div class="bonus-chart-sub">
            <div id="chart">
                <div id="timeline-chart"></div>
            </div>
        </div>
    </div>
    <div class="bonus-chart-payment">
        <div>
            <div class="payment-title">
                <div class="payment-title-sub">
                    <h2 class="section_title proxima_nova_semibold">Payment Summary</h2>
                </div>
                <div> <input type="text" id="datepicker5" class="proxima_nova_semibold" data-provide="datepicker"
                        data-date-format="mm/yyyy"></div>
            </div>
            <div class="payment-chart-sub">
                <div id="payment-chart">
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        
        var business_id = $('#business_id').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: "{{ route('set-session') }}",
            data: {
                business_id: business_id
            },
            success: function(response) {
                // console.log(response);
            }
        });
        // })


        // input datepicker
        // $(document).ready(function() {
        // var startDatepicker = $("#datepicker");
        // var endDatepicker = $("#datepicker2");

        // // Initialize datepicker1
        // startDatepicker.datepicker({
        //     format: "M yyyy",
        //     autoclose: true,
        //     minViewMode: 1
        // });

        // // Initialize datepicker2
        // endDatepicker.datepicker({
        //     format: "M yyyy",
        //     autoclose: true,
        //     minViewMode: 1
        // });

        // // Set the start date to the first day and end date to the last day of the current month
        // var currentDate = new Date();
        // var firstDayOfCurrentMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
        // var lastDayOfCurrentMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);

        // startDatepicker.datepicker('setDate', firstDayOfCurrentMonth);
        // endDatepicker.datepicker('setDate', lastDayOfCurrentMonth);

        // // When a month is selected in datepicker1, update available months in datepicker2
        // startDatepicker.on('changeDate', function (e) {
        //     var selectedDate = new Date(e.date);
        //     var firstDayOfSelectedMonth = new Date(selectedDate.getFullYear(), selectedDate.getMonth(), 1);
        //     endDatepicker.datepicker('setStartDate', firstDayOfSelectedMonth);

        //     // Check if the start date is after the end date, and update end date if necessary
        //     if (startDatepicker.datepicker('getDate') > endDatepicker.datepicker('getDate')) {
        //         endDatepicker.datepicker('setDate', firstDayOfSelectedMonth);
        //     }
        // });

        // // When a month is selected in datepicker2, update available months in datepicker1
        // endDatepicker.on('changeDate', function (e) {
        //     var selectedDate = new Date(e.date);
        //     var lastDayOfSelectedMonth = new Date(selectedDate.getFullYear(), selectedDate.getMonth() + 1, 0);
        //     startDatepicker.datepicker('setEndDate', lastDayOfSelectedMonth);

        //     // Check if the end date is before the start date, and update start date if necessary
        //     if (endDatepicker.datepicker('getDate') < startDatepicker.datepicker('getDate')) {
        //         startDatepicker.datepicker('setDate', lastDayOfSelectedMonth);
        //     }
        // });

        // Assuming $start_month is a PHP variable containing the start month in 'Y-m-d' format
        
                var startDate = new Date('<?php echo $start_month ?>');
                var endDate = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0);

                $('#datepicker').datepicker({
                    format: 'M yyyy',
                    startView: 'months',
                    minViewMode: 'months',
                    endDate: endDate // Disable future months
                });
                $('#datepicker').datepicker('setDate', new Date('<?php echo $start_month?>'));


    // Set the initial date to the current month
    // $('#datepicker').datepicker('setDate', currentDate);
        // $('#datepicker').datepicker({
        //     format: 'M yyyy',
        //     startView: 'months',
        //     minViewMode: 'months',
        //     endDate: new Date()
        // });

        // $('#datepicker2').datepicker({
        //     format: 'M yyyy',
        //     startView: 'months',
        //     minViewMode: 'months'
        // });
        // $('#datepicker2').datepicker('setDate', new Date(''));

        $('#datepicker3').datepicker({
            format: 'M yyyy',
            startView: 'months',
            minViewMode: 'months'
        });
        $('#datepicker3').datepicker('setDate', new Date('2023-01-01'));
        $('#datepicker4').datepicker({
            format: 'M yyyy',
            startView: 'months',
            minViewMode: 'months'
        });
        $('#datepicker4').datepicker('setDate', new Date('2023-01-01'));
        $('#datepicker5').datepicker({
            format: 'M yyyy',
            startView: 'months',
            minViewMode: 'months'
        });
        $('#datepicker5').datepicker('setDate', new Date('2023-01-01'));
    });
    $('.see_employee_status').click(function() {
        var status = $(this).data('status');
        // console.log(status);
        localStorage.setItem('attendanceStatus', status);

        // Redirect to the attendance page
        window.location.href = "{{ route('attendance') }}";
    });

    // ************************************* Attendance Stats chart *************************************

    var chart;
    $('.attendance_status_month ').on('change',function(){
        var start_month = $("input[name='start_month']").val();
        // var end_month = $("input[name='end_month']").val();
        // console.log(start_month);

        // if(start_month && end_month){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('months_attendance_chart') }}",
                type: "POST",
                data:{
                    "start_month":start_month,
                    // "end_month":end_month
                },
                success: function(response) {
                    // console.log(response);
                    if(response.status == 1){
                        var presentCounts = Object.values(response['present_statusData']).map(function(item) {
                            return item.count;
                        });
                        // console.log(presentCounts);
                        var absentCounts = Object.values(response['absent_statusData']).map(function(item) {
                            return item.count;
                        });
                        // console.log(absentCounts);
                        var halfdayCounts = Object.values(response['halfday_statusData']).map(function(item) {
                            return item.count;
                        });
                        var months = Object.values(response['filteredMonths']);
                        // console.log(months);
                        var maxPresentCount = Math.max(...presentCounts);
                        var maxAbsentCount = Math.max(...absentCounts);
                        var maxHalfdayCount = Math.max(...halfdayCounts);

                        // Find the overall maximum count among all series
                        var maxCount = maxPresentCount + maxAbsentCount + maxHalfdayCount;
                        var count;
                        // console.log(maxCount);
                        if(maxCount != 0){
                            count = maxCount;
                        } else {
                            count = 20;
                        }
                        var options = {                
                            series: [
                                {   
                                    name: 'On Time',
                                    data: presentCounts
                                },  
                                {
                                    name: 'Absent / No Data',
                                    data: absentCounts
                                }, 
                                {
                                    name: 'Half Leave',
                                    data: halfdayCounts
                                }
                            ],
                            chart: {
                                type: 'bar',
                                height: 300,
                                stacked: true,
                                toolbar: {
                                    show: false
                                },
                                zoom: {
                                    enabled: true
                                }
                            },
                            responsive: [{
                                breakpoint: 480,
                                options: {
                                    legend: {
                                        position: 'bottom',
                                        offsetX: -50,
                                        // offsetY: 0
                                    }
                                }
                            }],
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                    borderRadius: 5,
                                },
                            },
                            xaxis: {
                                type: 'category',
                                // categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                categories: months
            
                            },
                            yaxis: {
                                min: 0,
                                max: count,
                                tickAmount: 6,
                            },
                            legend: {
                                position: 'bottom',
                                // offsetY: 40
                                offsetX: -50,
                            },
                            fill: {
                                opacity: 1
                            },
                            dataLabels: {
                                enabled: false // Hide data labels
                            },
                            // colors: ['#886CFE', '#FF6857', '#FEBD0B', '#3AC73B']
                            // colors: ['#3AC74B', '#FEBD0B', '#FF6857', '#886CFE']
                            colors: ['#3AC74B', '#FF6857', '#FEBD0B']
                        };
                        // renderChart(months, presentCounts, absentCounts, halfdayCounts);
                        if (!chart) {
                            chart = new ApexCharts(document.querySelector("#chart"), options);
                            chart.render();
                        } else {
                            chart.updateSeries([
                                { data: presentCounts },
                                { data: absentCounts },
                                { data: halfdayCounts }
                            ]);
                            chart.updateOptions({
                                xaxis: {
                                    categories: months
                                }
                            });
                        }
            
                        // var chart = new ApexCharts(document.querySelector("#chart"), options);        
                        // chart.render();
                    }
                }
            });
        // }
    })



    // ************************************* Shift Info radial chart *************************************

    // var options1 = {
    //     chart: {
    //         height: 320,
    //         wight: 300,
    //         type: "radialBar",
    //         offsetX: -80,
    //         offsetY: 60,
    //     },
    //     series: [67, 84, 20],
    //     plotOptions: {
    //         radialBar: {
    //             dataLabels: {
    //                 name: {
    //                     fontSize: '13px',
    //                     fontWeight: '100',
    //                 },
    //                 value: {

    //                     fontSize: '22px',
    //                     fontWeight: 'bold',
    //                     formatter: function(val) {
    //                         return parseInt(val);
    //                     },
    //                 },
    //                 total: {
    //                     show: true,
    //                     label: 'Fixed Shift',
                        
    //                     style: {
    //                         fontSize: '25px !important',
    //                         // fontWeight: '700',
    //                         color: '#050E17',
    //                     },

    //                 }
    //             }
    //         }
    //     },
    //     legend: {
    //         show: true,
    //         floating: true,
    //         fontSize: '15px',
    //         position: 'right',
    //         offsetX: -40,
    //         offsetY: 60,
    //         labels: {
    //             useSeriesColors: false,
    //             colors: ['#000', '#000', '#000'],
    //             style: {
    //                 fontSize: ['12px', '12px', '12px'],
    //                 fontWeight: ['600', '600', '600'],
    //             },
    //         },
    //         markers: {
    //             size: 0
    //         },
    //         //   formatter: function(seriesName, opts) {
    //         //     return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
    //         //   },
    //         itemMargin: {
    //             vertical: 3
    //         }
    //     },
    //     labels: ['Fixed', 'Rotational', 'Open'],
    //     colors: ['#3AC73B', '#FEBD0B', '#FF6857']
    // };

    // new ApexCharts(document.querySelector("#chart1"), options1).render();


    // ************************************* Allowance time series chart *************************************
    // var series = [];
    // var options = {
    //     chart: {
    //         type: "area",
    //         height: 300,
    //         foreColor: "#050E17",
    //         stacked: true,
    //         dropShadow: {
    //             enabled: true,
    //             enabledSeries: [0],
    //             top: -2,
    //             left: 2,
    //             blur: 5,
    //             opacity: 0.06
    //         },
    //         toolbar: {
    //             show: false
    //         },
    //         offsetX: -5
    //     },
    //     colors: ['#3AC73B', '#FF6857', '#FEBD0B'],
    //     stroke: {
    //         curve: "smooth",
    //         width: 3
    //     },
    //     dataLabels: {
    //         enabled: false
    //     },
    //     series: [{
    //             name: 'Allowance',
    //             data: generateDayWiseTimeSeries(0, 7)
    //         },
    //         {
    //             name: 'Bonus',
    //             data: generateDayWiseTimeSeries(1, 7)
    //         },
    //         {
    //             name: 'Deduction',
    //             data: generateDayWiseTimeSeries(2, 7)
    //         }
    //     ],
    //     markers: {
    //         size: 0,
    //         strokeColor: "#fff",
    //         strokeWidth: 3,
    //         strokeOpacity: 1,
    //         fillOpacity: 1,
    //         hover: {
    //             // size: 6
    //         }
    //     },
    //     xaxis: {
    //         type: "datetime",
    //         labels: {
    //             datetimeFormatter: {
    //                 year: 'yyyy',
    //                 month: 'MMM',
    //             }
    //         },
    //         offsetX: -30,
    //         axisBorder: {
    //             show: false
    //         },
    //         axisTicks: {
    //             show: false
    //         }
    //     },
    //     yaxis: {
    //         labels: {
    //             offsetX: -5,
    //             offsetY: -5,
    //         },
    //         tooltip: {
    //             enabled: true
    //         }
    //     },
    //     grid: {
    //         padding: {
    //             left: -5,
    //             right: 5
    //         }
    //     },
    //     tooltip: {
    //         x: {
    //             format: "dd MMM yyyy"
    //         },
    //     },
    //     legend: {
    //         position: 'bottom',
    //         horizontalAlign: 'center'
    //     },
    //     fill: {
    //         type: "gradient",
    //         gradient: {
    //             shadeIntensity: 1,
    //             opacityFrom: 0.3,
    //             opacityTo: 0.3,
    //             stops: [0, 100],
    //         }
    //     }

    // };

    // var chart = new ApexCharts(document.querySelector("#timeline-chart"), options);

    // chart.render();

    // function generateDayWiseTimeSeries(s, count) {
    //     var values = [
    //         [4, 3, 10, 9, 29, 19, 25],
    //         [2, 3, 8, 7, 22, 16, 23],
    //         [2, 4, 7, 9, 22, 16, 28]
    //     ];

    //     var series = [];
    //     var x = new Date("04 feb 2012").getTime(); // Start date in March
    //     var i = 0;
    //     while (i < count) {
    //         series.push([x, values[s][i]]);
    //         // Add a month to the date
    //         x = new Date(x);
    //         x.setMonth(x.getMonth() + 1);
    //         i++;
    //     }
    //     return series;
    // }



    // ************************************* payment chart *************************************

    // var options = {
    //     chart: {
    //         width: 400,
    //         type: "donut",
    //         offsetX: 30,
    //         offsetY: 60,
    //     },
    //     plotOptions: {
    //         pie: {
    //             donut: {
    //                 labels: {
    //                     show: true,
    //                     name: {
    //                         show: true,
    //                         fontSize: '18px',
    //                         color: '#050E17',
    //                         fontWeight: '600',
    //                     },
    //                     value: {
    //                         show: true,
    //                         fontSize: '25px',
    //                         color: '#050E17',
    //                         fontWeight: '700',
    //                     },
    //                     total: {
    //                         show: true,
    //                         label: 'Jun 2023',
    //                         formatter: function(w) {
    //                             return 53536
    //                         }
    //                     }
    //                 },
    //             },
    //         },
    //     },
    //     dataLabels: {
    //         enabled: false
    //     },
    //     series: [44, 55],
    //     labels: ["Previous Month", "Current Month"],
    //     colors: ["#E7EDF6", "#BBC6D8"],
    //     legend: {
    //         position: "right",
    //         horizontalAlign: "center",
    //         offsetX: 30,
    //         offsetY: 60,
    //         markers: {
    //             fillColors: ["#E7EDF6", "#BBC6D8"],
    //         },
    //     },
    // };

    // var chart = new ApexCharts(document.querySelector("#payment-chart"), options);

    // chart.render();
</script>
@endsection