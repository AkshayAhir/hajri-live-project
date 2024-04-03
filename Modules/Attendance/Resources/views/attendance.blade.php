@extends('admin.layout.main')
@section('title')
<title>{{env('APP_NAME')}} | Attendance</title>
@endsection
@section('header-page')
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-12 top-header-sub staff-summary-main attendance_main_data">
            <div class="breadcrumbs-area clearfix">
                <div class="breadcrumbs-sub">
                    <div class="attendance-breadcrumbs">
                        <!-- <img src="{{asset('assets/images/header/back.svg')}}" alt=""> -->
                        <h4 class="page-title pull-left proxima_nova_semibold">Attendance
                        </h4>
                    </div>
                    <div class="approve-right-data col-md-6 col-sm-6">

                        <!-- <div class="approve-data-download  dropdown-toggle proxima_nova_bold cursor_pointer">
                            <img src="{{asset('assets/admin/images/approve_punches/download-report.svg')}}" alt="">
                        </div> -->
                        <div class="dropdown-menu download-data" x-placement="bottom-start">
                            <a class="dropdown-item proxima_nova_semibold" href="#">Excel Report</a>
                            <!-- <a class="dropdown-item proxima_nova_semibold" href="#">PDF Report</a> -->
                        </div>
                        <div class="input-group date" data-provide="datepicker">
                            <input type="text"
                                class="input-group-addon form-control proxima_nova_semibold calender-picker"
                                value="{{ date('d, M Y') }}" name="calender_date" id="calender_date" autocomplete="off">
                            <!-- <div class="input-group-addon calender-img">
                                <img src="{{asset('assets/admin/images/approve_punches/calender.svg')}}" alt="">
                            </div> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')

<div class="atten-status-main">
    <div class="atten-status-sub">
        <div class="atten-third-section-box">
            <div class="atten-status-boxs">
                <h2 class="section_title proxima_nova_semibold" id="staff_count">{{$staff_count}}</h2>
                <p class="section_sub_title proxima_nova_semibold">All Staff</p>
            </div>
            <div>
                <img src="{{asset('assets/admin/images/attendance/Staff.svg')}}" alt="">
            </div>
        </div>
        <div class="atten-third-section-box">
            <div class="atten-status-boxs">
                <h2 class="section_title proxima_nova_semibold" id="present_count">{{$present_count}}</h2>
                <p class="section_sub_title proxima_nova_semibold">Present</p>
            </div>
            <div>
                <img src="{{asset('assets/admin/images/attendance/Present.svg')}}" alt="">
            </div>
        </div>
        <div class="atten-third-section-box">
            <div class="atten-status-boxs">
                <h2 class="section_title proxima_nova_semibold" id="absent_count">{{$absent_count}}</h2>
                <p class="section_sub_title proxima_nova_semibold">Absent</p>
            </div>
            <div>
                <img src="{{asset('assets/admin/images/attendance/Absent.svg')}}" alt="">
            </div>
        </div>
        <div class="atten-third-section-box">
            <div class="atten-status-boxs">
                <h2 class="section_title proxima_nova_semibold" id="half_day">{{$half_day}}</h2>
                <p class="section_sub_title proxima_nova_semibold">Half Day</p>
            </div>
            <div>
                <img src="{{asset('assets/admin/images/attendance/Halfday.svg')}}" alt="">
            </div>
        </div>
        <div class="atten-third-section-box">
            <div class="atten-status-boxs">
                <h2 class="section_title proxima_nova_semibold" id="paid_leave">{{$paid_leave}}</h2>
                <p class="section_sub_title proxima_nova_semibold">Paid Leave</p>
            </div>
            <div>
                <img src="{{asset('assets/admin/images/attendance/leave.svg')}}" alt="">
            </div>
        </div>
    </div>
</div>

<div class="main-content-inner on-time-main main-atten">

    <row>
        <div class="approve-datas atten-datas">
            <div class="atten-data-search attendance-search assign-data-search col-md-6 col-sm-6">
                <!-- <div>
                                <div class="create-data dropdown-toggle proxima_nova_bold active"
                                    data-bs-toggle="offcanvas" data-bs-target="#filter-toggle-right"
                                    aria-controls="filter-toggle-right">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M19.5182 9.8002H4.08141C3.69061 9.8002 3.2998 9.4002 3.2998 9.0002C3.2998 8.6002 3.59291 8.2002 4.08141 8.2002H19.5182C19.909 8.2002 20.2998 8.5002 20.2998 9.0002C20.2998 9.5002 19.909 9.8002 19.5182 9.8002Z" fill="#808080"/>
                                        <path d="M10.6002 21.6998C10.1002 21.6998 9.7002 21.5998 9.3002 21.2998C8.5002 20.8998 8.0002 20.0998 8.0002 19.1998V13.3998L4.2002 10.4998C3.6002 9.9998 3.2002 9.2998 3.2002 8.4998V5.7998C3.2002 4.3998 4.3002 3.2998 5.7002 3.2998H18.1002C19.5002 3.2998 20.6002 4.3998 20.6002 5.7998V8.4998C20.6002 9.2998 20.2002 9.9998 19.6002 10.4998L16.0002 13.3998V17.7998C16.0002 18.7998 15.5002 19.5998 14.6002 20.0998L11.8002 21.4998C11.3002 21.6998 11.0002 21.6998 10.6002 21.6998ZM5.8002 4.7998C5.2002 4.7998 4.8002 5.2998 4.8002 5.7998V8.4998C4.8002 8.7998 4.9002 9.0998 5.2002 9.2998L9.3002 12.4998C9.5002 12.5998 9.6002 12.8998 9.6002 13.0998V19.2998C9.6002 19.6998 9.8002 19.9998 10.1002 20.1998C10.4002 20.3998 10.8002 20.3998 11.1002 20.1998L13.9002 18.7998C14.2002 18.5998 14.5002 18.2998 14.5002 17.8998V12.9998C14.5002 12.7998 14.6002 12.4998 14.8002 12.3998L18.9002 9.1998C19.2002 8.9998 19.3002 8.6998 19.3002 8.3998V5.7998C19.3002 5.1998 18.8002 4.7998 18.3002 4.7998H5.8002Z" fill="#808080"/>
                                    </svg>
                                </div>
                            </div> -->
                <!-- <form action="" method=""> -->
                <input class="input-search-rounded" type="text" id="staff_data_find" placeholder="Search">
                <!-- </form> -->

            </div>
            <div class="col-md-6 col-sm-6 staff-right-length">
                <div class="business_selct_box select_mate_option staff-option_select">
                    <select class="mySelect_sort status_filter">
                        <!-- <option value="sortby" <?=$status===null ? 'selected' : '' ?>>Sort By</option> -->
                        <option value="Present" <?=$status==="Present" ? 'selected' : '' ?>>Present</option>
                        <option value="Absent" <?=$status==="Absent" ? 'selected' : '' ?>>Absent</option>
                        <option value="Half Day" <?=$status==="Half Day" ? 'selected' : '' ?>>Half Day</option>
                        <option value="all">All</option>
                    </select>
                </div>

                <div class="business_selct_box select_mate_option staff-option_select paginat_option">
                    <select class="mySelect_pagi number_page_sorting">
                        <option value="10perpage">10 Per Page</option>
                        <option value="50perpage">50 Per Page</option>
                        <option value="100perpage">100 Per Page</option>
                        <option value="all">All</option>
                    </select>
                </div>
            </div>
            <!-- <div class="col-md-6 col-sm-6 staff-right-section attendence_all_approved_sec">
                <div class="staff-right-btn">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9 2.8125C5.58241 2.8125 2.8125 5.58241 2.8125 9C2.8125 12.4176 5.58241 15.1875 9 15.1875C12.4176 15.1875 15.1875 12.4176 15.1875 9C15.1875 5.58241 12.4176 2.8125 9 2.8125ZM9 1.6875C4.96109 1.6875 1.6875 4.96109 1.6875 9C1.6875 13.0389 4.96109 16.3125 9 16.3125C13.0389 16.3125 16.3125 13.0389 16.3125 9C16.3125 4.96109 13.0389 1.6875 9 1.6875Z"
                                fill="#17B643" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.3977 7.10225C12.6174 7.32192 12.6174 7.67808 12.3977 7.89775L8.64775 11.6477C8.42808 11.8674 8.07192 11.8674 7.85225 11.6477L5.60225 9.39775C5.38258 9.17808 5.38258 8.82192 5.60225 8.60225C5.82192 8.38258 6.17808 8.38258 6.39775 8.60225L8.25 10.4545L11.6023 7.10225C11.8219 6.88258 12.1781 6.88258 12.3977 7.10225Z"
                                fill="#17B643" />
                        </svg>
                    </div>
                    <a href="" class="proxima_nova_semibold">
                        All Approved
                    </a>
                </div>
            </div> -->
        </div>
    </row>

    <div class="approve_staff_data">
        <table id="staff_datas" class="display" style="width:100%" width="100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>In Time</th>
                    <th>Out Time</th>
                    <th>Break Time</th>
                    <th>Staff Time</th>
                    <th class="data_list_check">Status</th>
                    <th>Overtime</th>
                    <!-- <th>Fine</th> -->
                    <th class="data_list_check">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="view-toggle-right"
        data-bs-scroll="true" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <div class="popup-close-btns" data-bs-dismiss="offcanvas" aria-label="Close"><svg
                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M2.84154 2.84056C3.07296 2.60914 3.44817 2.60914 3.67959 2.84056L13.1611 12.322C13.3925 12.5535 13.3925 12.9287 13.1611 13.1601C12.9296 13.3915 12.5544 13.3915 12.323 13.1601L2.84154 3.67861C2.61011 3.44719 2.61011 3.07198 2.84154 2.84056Z"
                        fill="#808080" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M13.1611 2.84056C13.3925 3.07198 13.3925 3.44719 13.1611 3.67861L3.67959 13.1601C3.44817 13.3915 3.07296 13.3915 2.84154 13.1601C2.61011 12.9287 2.61011 12.5535 2.84154 12.322L12.323 2.84056C12.5544 2.60914 12.9296 2.60914 13.1611 2.84056Z"
                        fill="#808080" />
                </svg></div>
        </div>
        <div class="section_title_heading view_log_inner">
            <h5 class="section_title_heading proxima_nova_bold download-work-main-header">View Log</h5>
            <hr>

            <div class="view-log-model">
                <h2 class="proxima_nova_semibold section_title note_name"></h2>
                <p class="log_date"></p>
            </div>
            <div class="view-log-model-main">
                <!-- <ul class="view-log-content">
                                <li class="view-log-status proxima_nova_semibold section_title status_log_value"></li>
                                <p class="status_log_by"></p>
                            </ul> -->
            </div>
        </div>
        <div class="download-cancel-btns-main">
            <div class="download-cancel-btn">
                <!-- <button name="" class="download-btn proxima_nova_semibold mb-0 close_view_log" aria-label="Close" data-bs-dismiss="offcanvas">Close</button> -->
            </div>
        </div>
    </div>


    <!-- <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="filter-toggle-right"
                    data-bs-scroll="true" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <div class="popup-close-btns" data-bs-dismiss="offcanvas" aria-label="Close"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2.84154 2.84056C3.07296 2.60914 3.44817 2.60914 3.67959 2.84056L13.1611 12.322C13.3925 12.5535 13.3925 12.9287 13.1611 13.1601C12.9296 13.3915 12.5544 13.3915 12.323 13.1601L2.84154 3.67861C2.61011 3.44719 2.61011 3.07198 2.84154 2.84056Z"
                                    fill="#808080" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.1611 2.84056C13.3925 3.07198 13.3925 3.44719 13.1611 3.67861L3.67959 13.1601C3.44817 13.3915 3.07296 13.3915 2.84154 13.1601C2.61011 12.9287 2.61011 12.5535 2.84154 12.322L12.323 2.84056C12.5544 2.60914 12.9296 2.60914 13.1611 2.84056Z"
                                    fill="#808080" />
                            </svg></div>
                    </div>
                    <div class="offcanvas-body overflow-auto">
                        <h5 class="section_title_heading proxima_nova_bold download-work-main-header filter-title-main">
                            Filter</h5>
                        <hr>
                        <div class="filter-sub-sec">
                            <form method="">
                                <div class="daily-work-select">
                                    <h2 class="filter-shiftcheck section_title proxima_nova_semibold">Shift Type</h2>
                                    <div class="form-check filter-shift-main">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">
                                            Monthly
                                        </label>
                                    </div>
                                    <div class="form-check filter-shift-main">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">
                                            Pay Per Work
                                        </label>
                                    </div>
                                    <div class="form-check filter-shift-main">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">
                                            Weekly
                                        </label>
                                    </div>
                                    <div class="form-check filter-shift-main">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">
                                            Daily Regular
                                        </label>
                                    </div>
                                    <div class="form-check filter-shift-main">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">
                                            Daily
                                        </label>
                                    </div>
                                    <div class="form-check filter-shift-main">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">
                                            Hourly
                                        </label>
                                    </div>
                                    <div class="form-check filter-shift-main">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">
                                            Monthly Regular
                                        </label>
                                    </div>
                                    <div class="form-check filter-shift-main">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">
                                            Hourly Regular
                                        </label>
                                    </div>
                                </div>

                                <div class="download-cancel-btns-main">
                                    <div class="download-cancel-btn">
                                        <button name="" class="download-btn proxima_nova_semibold">Apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> -->

    <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="create-toggle-right"
        data-bs-scroll="true" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <div class="popup-close-btns" data-bs-dismiss="offcanvas" aria-label="Close"><svg
                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M2.84154 2.84056C3.07296 2.60914 3.44817 2.60914 3.67959 2.84056L13.1611 12.322C13.3925 12.5535 13.3925 12.9287 13.1611 13.1601C12.9296 13.3915 12.5544 13.3915 12.323 13.1601L2.84154 3.67861C2.61011 3.44719 2.61011 3.07198 2.84154 2.84056Z"
                        fill="#808080" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M13.1611 2.84056C13.3925 3.07198 13.3925 3.44719 13.1611 3.67861L3.67959 13.1601C3.44817 13.3915 3.07296 13.3915 2.84154 13.1601C2.61011 12.9287 2.61011 12.5535 2.84154 12.322L12.323 2.84056C12.5544 2.60914 12.9296 2.60914 13.1611 2.84056Z"
                        fill="#808080" />
                </svg></div>
        </div>
        <div class="offcanvas-body overflow-auto">
            <h5 class="section_title_heading proxima_nova_bold download-work-main-header filter-title-main">
                Add Note</h5>
            <hr>
            <div class="filter-sub-sec">
                <form id="add_note_form" method="">
                    <div class="attendance_add_form_inner">

                        <input type="hidden" name="attendance_id" id="attendance_id" value="">
                        <div class="daily-work-select">
                            <h2 class="filter-shiftcheck section_title proxima_nova_semibold note_name"></h2>
                            <div class="form-check add-note-main w-100 add_note_form">
                                <textarea placeholder="Leave needs to be added." class="section_sub_title w-100"
                                    name="note_area" id="note_area"></textarea> </textarea>
                            </div>


                        </div>
                    </div>
                    <div class="download-cancel-btns-main">
                        <div class="download-cancel-btn">
                            <button name="" class="download-btn proxima_nova_semibold w-100 mb-0" aria-label="Close"
                                data-bs-dismiss="offcanvas">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')

<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet"/> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.js"></script>
<script>
    $(document).ready(function () {
        $('.mySelect_sort').select2({
            minimumResultsForSearch: Infinity,
        }).on('select2:open', function (e) {
            $('.select2-container').addClass('attendance-down-data');
            var staffSelectWidth = $('.staff-option_select').outerWidth();
            // console.log(staffSelectWidth);

            // Set the width of .attendance-down-data.select2-container--open .select2-dropdown when open
            $('.attendance-down-data.select2-container--open .select2-dropdown').css('width', staffSelectWidth + 'px');

        });
        $('.mySelect_pagi').select2({
            minimumResultsForSearch: Infinity,
        }).on('select2:open', function (e) {
            $('.select2-container').addClass('attendance-down-data-paginat');
        })
        
    });
    var table;

    $(document).ready(function () {
        //  datatable
        if (!localStorage.getItem('attendanceStatus')) {
            $('.status_filter option[value="all"]').prop('selected', true);
        } else {
            $('.status_filter').val(localStorage.getItem('attendanceStatus')).prop('selected', true);
        }
        function datatable(searchValue = null, calender_date = null, number_page_sorting = null, status = null) {
            if (status == null) {
                var status = localStorage.getItem('attendanceStatus');
                // console.log(status);
            }
            // console.log(status);

            table = $('#staff_datas').DataTable({
                // "lengthMenu": [[5, 10, 20], [5, 10, 20]],
                searching: false,
                lengthChange: false,
                info: false,
                responsive: true,
                // pagingType: "full_numbers",
                order: [
                    // [1, "desc"]
                ],
                drawCallback: function (settings) {
                    // If there is data, initialize Select2 and other functionalities
                    $('.mySelect').select2({
                        templateResult: formatOption,
                        templateSelection: formatOption,
                        minimumResultsForSearch: Infinity,
                    }).on('select2:open', function (e) {
                        $('.select2-container').addClass('atten_status_datas');
                    });

                    $('.mySelect').on('change', function (e) {
                        var selectedOption = $(this).find('option:selected');
                        var id = selectedOption.data('record-id');
                        var status = $(this).val();
                        var calender_date = $('#calender_date').val();
                        changeStatus(id, status, calender_date);
                    });
                },
                ajax: {
                    "url": "{{ route('attendance_list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": {
                        _token: "{{csrf_token()}}",
                        'searchValue': searchValue,
                        'calender_date': calender_date,
                        'number_page_sorting': number_page_sorting,
                        'status': status,
                    },
                    "dataSrc": "data"
                },
                initComplete: function (settings, json) {
                    var api = this.api();
                    if (table.rows().count() === 0) {
                        // Display image or advertisement
                        var adContent = '<tr><td colspan="7"><div class="no_data_found"><div class=""><img src="{{asset('assets/admin/images/staff_manage/no_data.svg')}}" alt="Advertisement"></div><div class="proxima_nova_semibold section_title">No data found, add staff</div></div></td></tr>';
                        $(api.table().body()).html(adContent);
                    }
                },
                columns: [
                    {
                        data: "name",
                        render: function (data, type, row) {
                            var routeUrl = "{{ route('staff-profile', ':id') }}";
                            var url = routeUrl.replace(':id', row.staff_id);
                            return `
                            <a href="${url}" class="staff-edit">
                                <div class="user-images">
                                    <div><img src="${row.staff_photo}" class="approve-user-img" alt=""></div>
                                    <div>${data}<p class="data-sub-field">${row.department_name}</p></div>
                                </div>
                            </a>
                        `;
                        }
                    },
                    { "data": "in_time" },
                    { "data": "out_time" },
                    { "data": "break_time" },
                    { "data": "staff_time" },
                    { "data": "status" },
                    { "data": "overtime" },
                    // {"data": "fine"},
                    { "data": "action" },
                ],
                // createdRow: function (row, data, dataIndex) {
                //     $(row).attr('id', 'storie_col_' + data['id']);
                // },
                columnDefs: [
                    // { "width": "40%", "targets": 3 },
                    { 'targets': [5, 7], 'orderable': false }
                ]
            });
            $('.dataTables_length').addClass('bs-select');
        }
        datatable();

        $('#staff_data_find').on('input', function () {
            var searchValue = $('#staff_data_find').val();
            var calender_date = $('#calender_date').val();
            var number_page_sorting = $('.number_page_sorting').val();
            var status = localStorage.getItem('attendanceStatus');
            table.destroy();
            datatable(searchValue, calender_date, number_page_sorting, status);
            if (number_page_sorting === 'all') {
                table.page.len(-1).draw(); // Show all records
            } else if (number_page_sorting === '10perpage') {
                table.page.len(10).draw(); // Show 10 records per page
            } else if (number_page_sorting === '50perpage') {
                table.page.len(50).draw(); // Show 50 records per page
            } else if (number_page_sorting === '100perpage') {
                table.page.len(100).draw(); // Show 100 records per page
            } else {
                table.page.len(parseInt(number_page_sorting)).draw(); // Show selected number of records per page
            }
        });

        $('#calender_date').on('change', function () {
            var searchValue = $('#staff_data_find').val();
            var calender_date = $('#calender_date').val();
            var number_page_sorting = $('.number_page_sorting').val();
            var status = localStorage.getItem('attendanceStatus');
            table.destroy();
            datatable(searchValue, calender_date, number_page_sorting, status);
            if (number_page_sorting === 'all') {
                table.page.len(-1).draw(); // Show all records
            } else if (number_page_sorting === '10perpage') {
                table.page.len(10).draw(); // Show 10 records per page
            } else if (number_page_sorting === '50perpage') {
                table.page.len(50).draw(); // Show 50 records per page
            } else if (number_page_sorting === '100perpage') {
                table.page.len(100).draw(); // Show 100 records per page
            } else {
                table.page.len(parseInt(number_page_sorting)).draw(); // Show selected number of records per page
            }
        });

        $('.number_page_sorting').change(function () {
            var searchValue = $('#staff_data_find').val();
            var calender_date = $('#calender_date').val();
            var number_page_sorting = $('.number_page_sorting').val();
            var status = localStorage.getItem('attendanceStatus');
            table.destroy();
            datatable(searchValue, calender_date, number_page_sorting, status);

            var staffSelectWidth = $('.staff-option_select').outerWidth();
            if (number_page_sorting == 'all') {
                $('.attendance-down-data-paginat .select2-dropdown').addClass("pagination_all_data");
                table.page.len(-1).draw(); // Show all records
            } else if (number_page_sorting === '10perpage') {
                $('.attendance-down-data-paginat .select2-dropdown').removeClass("pagination_all_data");

                $('.attendance-down-data-paginat.select2-container--open .select2-dropdown').css('width', staffSelectWidth + 'px');
                table.page.len(10).draw(); // Show 10 records per page
            } else if (number_page_sorting === '50perpage') {
                $('.attendance-down-data-paginat .select2-dropdown').removeClass("pagination_all_data");
                $('.attendance-down-data-paginat.select2-container--open .select2-dropdown').css('width', staffSelectWidth + 'px');
                table.page.len(50).draw(); // Show 50 records per page
            } else if (number_page_sorting === '100perpage') {
                $('.attendance-down-data-paginat .select2-dropdown').removeClass("pagination_all_data");
                $('.attendance-down-data-paginat.select2-container--open .select2-dropdown').css('width', staffSelectWidth + 'px');
                table.page.len(100).draw(); // Show 100 records per page
            } else {
                $('.attendance-down-data-paginat .select2-dropdown').removeClass("pagination_all_data");
                $('.attendance-down-data-paginat.select2-container--open .select2-dropdown').css('width', staffSelectWidth + 'px');
                table.page.len(parseInt(number_page_sorting)).draw(); // Show selected number of records per page
            }
    
        })

        var status = $('.status_filter').val();
        var selectedText = $('.status_filter').find('option:selected').text();
        $('.status_filter').siblings('.select2-container').find('.select2-selection__rendered').html('<span class="sort_by_text">Sort by </span>' + selectedText);
        $('.status_filter').change(function () {
            var searchValue = $('#staff_data_find').val();
            var calender_date = $('#calender_date').val();
            var number_page_sorting = $('.number_page_sorting').val();
            var status = $('.status_filter').val();
            localStorage.setItem('attendanceStatus', status);
            var selectedText = $('.status_filter').find('option:selected').text();
            $('.status_filter').siblings('.select2-container').find('.select2-selection__rendered').html('<span class="sort_by_text">Sort by </span>' + selectedText);
            table.destroy();
            datatable(searchValue, calender_date, number_page_sorting, status);
            if (number_page_sorting === 'all') {
                table.page.len(-1).draw(); // Show all records
            } else if (number_page_sorting === '10perpage') {
                table.page.len(10).draw(); // Show 10 records per page
            } else if (number_page_sorting === '50perpage') {
                table.page.len(50).draw(); // Show 50 records per page
            } else if (number_page_sorting === '100perpage') {
                table.page.len(100).draw(); // Show 100 records per page
            } else {
                table.page.len(parseInt(number_page_sorting)).draw(); // Show selected number of records per page
            }
            // 
            // if (status == 'all' || status == 'sortby') {
            //     window.location.href = "{{ route('attendance') }}"
            // } else {
            //     window.location.href = "{{ route('attendance') }}?status=" + status;
            // }
        })


    });

    function formatOption(option) {
        if (!option.id) {
            return option.text;
        }
        var optionImage = $(option.element).data('image');
        var optionText = option.text;
        var $option = $(
            '<span><img class="option-image" src="' + optionImage + '"/> ' + optionText + '</span>'
        );
        return $option;
    }
    var today = new Date();
    $('.calender-picker').datepicker({
        format: 'dd, M yyyy',
        autoclose: true,
        endDate: today,
        // setDate : new Date(),
    });
    // $('.calender-picker').datepicker('setDate', new Date());

    $('#calender_date').on('change', function () {
        var calender_date = $('#calender_date').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('attendance_on_date_change') }}",
            type: 'POST',
            data: {
                calender_date: calender_date,
            },
            success: function (response) {
                $('#staff_count').html(response.staff_count);
                $('#present_count').html(response.present_count);
                $('#absent_count').html(response.absent_count);
                $('#half_day').html(response.half_day);
                $('#paid_leave').html(response.paid_leave);
            },
        });
    });

    function fieldValidation() {
        var valid = true;
        $(".error").remove();
        if ($('#note_area').val() == "") {
            $("#note_area").after(
                '<span class="error error_message proxima_nova_semibold">Please add note.</span>'
            );
            valid = false;
        }
        return valid;
    }

    $('#add_note_form').submit(function (event) {
        event.preventDefault();
        if (fieldValidation()) {
            var formData = new FormData($(this)[0]);
            var calender_date = $('#calender_date').val();
            formData.append('calender_date', calender_date);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('add_note') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response['status'] == 1) {
                        toastr["success"](response.message);
                    } else {
                        toastr["error"](response.message)
                    }
                }
            });
        }
    });

    var attendance_id;

    function displayNote(id) {
        $('.view-log-model-main').empty();
        var calender_date = $('#calender_date').val();
        attendance_id = id;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('display_note_and_log_data') }}",
            type: "POST",
            data: {
                "attendance_id": attendance_id,
                "calender_date": calender_date,
            },
            success: function (response) {
                if (response['status'] == 1) {
                    var staff_log = response['data'][0]['staff_log'];
                    var i = 0;
                    $.each(staff_log, function (index, logItem) {
                        if (logItem.detail === "Select" || logItem === null) {
                            $('.view-log-model-main').empty();
                        } else {
                            $('.view-log-model-main').append(
                                '<ul class="view-log-content"><li class="view-log-status proxima_nova_semibold section_title status_log_value"> Marked ' +
                                logItem.detail + '</li><p class="status_log_by">By ' + logItem.user
                                    .name + ' on ' + response['log_time'][i++] + '</p></ul>');
                        }

                    });
                    $('#attendance_id').val(response['data'][0]['id']);
                    $('#note_area').val(response['data'][0]['note']);
                    $('.note_name').html(response['data'][0]['staff_note']['name']);
                    $('.log_date').html(response['date']);
                }
            }
        });
    }

    function changeStatus(id, status, calender_date) {
        // console.log(id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('change_attendance_status') }}",
            type: "POST",
            data: {
                "id": id,
                "status": status,
                "calender_date": calender_date
            },
            success: function (response) {
                table.ajax.reload(null, false);
                toastr["success"](response.message);
                $('#staff_count').html(response.staff_count);
                $('#present_count').html(response.present_count);
                $('#absent_count').html(response.absent_count);
                $('#half_day').html(response.half_day);
                $('#paid_leave').html(response.paid_leave);
            },
        });
    }


</script>
@endsection