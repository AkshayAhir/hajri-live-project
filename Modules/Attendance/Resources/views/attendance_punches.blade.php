@extends('admin.layout.main')
@section('title')
    <title>{{env('APP_NAME')}} | Attendance</title>
@endsection
@section('header-page')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6 top-header-sub">
                <div class="breadcrumbs-area clearfix">
                    <div class="breadcrumbs-sub">
                        <img src="{{asset('assets/admin/images/header/back.svg')}}" alt="">
                        <h4 class="page-title pull-left proxima_nova_semibold">Punches
                        </h4>
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="index.html">Attendance </a></li>
                        <li class="section_sub_title">/  Punches</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-content-inner">

        <div class="shifts-data review-approve-time">
            <div class="filters sidebar-select approve-punch-data">
                        <select id="main_select_services" 
                            class="form-select create-select section_sub_title select-club-services"
                            name="club-services">
                            <option value=".abrikosovaya" selected>Day Shift | 9:00 AM - 6:30 PM</option>
                            <option value=".bratskaya">Designer</option>
                            <option value=".lesi-ukrainki">Android Developer</option>
                            <option value=".lesi-ukrainki">React Developer</option>
                            <option value=".lesi-ukrainki">Flutter Developer</option>
                        </select>
                    </div>
            <div>
                <a href="" class="over_time proxima_nova_semibold overtime-approve">Bulk Approve Punches</a>
            </div>
        </div>

        <row>
            <div class="approve-datas">
                <div class="approve-data-search col-md-6 col-sm-6">
                    <form action="" method="">
                        <input class="input-search-rounded" type="text" id="staff_data_find"
                            placeholder="Search">
                    </form>
                </div>

                <div class="approve-right-data col-md-6 col-sm-6">
                    <!-- <div class="user-profile pull-right"> -->
                        <div class="approve-data-download  dropdown-toggle proxima_nova_bold">
                            <a href="#"> <img src="{{asset('assets/admin/images/approve_punches/download-report.svg')}}"
                                    alt=""></a>
                        </div>
                        <div class="dropdown-menu" x-placement="bottom-start">
                            <a class="dropdown-item proxima_nova_semibold" href="#">Excel Report</a>
                            <a class="dropdown-item proxima_nova_semibold" href="#">PDF Report</a>
                        </div>
                    <!-- </div>  -->
                    <!-- <div class="approve-data-download dropdown-toggle proxima_nova_bold">
                        <a href=""> <img src="../assets/images/approve_punches/download-report.svg" alt=""></a>
                    </div> -->
                    <div class="input-group date" data-provide="datepicker">
                        <input type="text" id="calender_date" class="input-group-addon form-control proxima_nova_semibold calender-picker" value="{{ date('d, M y') }}" readonly='true'>
                        <!-- <div class="input-group-addon calender-img">
                            <img src="{{asset('assets/admin/images/approve_punches/calender.svg')}}" alt="">
                        </div> -->
                    </div>
                </div>

            </div>
        </row>

        <div class="approve_staff_data">
            <table id="staff_datas" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectAllCheckbox"></th> <!-- Checkbox Column -->
                        <th>Staff Name</th>
                        <th>Break</th>
                        <th>In Time</th>
                        <th>Out Time</th>
                        <th>Total Time</th>
                        <th>Approve/Decline</th>
                        <th>Staff Logs</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                        <td>
                            <div class="user-images">
                                <div><img src="{{asset('assets/admin/images/approve_punches/ic-user.svg')}}"
                                        class="approve-user-img" alt=""></div>
                                <div>Jay Shah<p class="data-sub-field">Node.js Developer</p>
                                </div>
                            </div>
                        </td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>
                            <div class="approve-main-sec">
                                <button class="atten-coming-btn approve_success"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.6882 3.98043C13.8835 4.17569 13.8835 4.49228 13.6882 4.68754L6.35486 12.0209C6.15959 12.2161 5.84301 12.2161 5.64775 12.0209L2.31442 8.68754C2.11915 8.49228 2.11915 8.17569 2.31442 7.98043C2.50968 7.78517 2.82626 7.78517 3.02152 7.98043L6.0013 10.9602L12.9811 3.98043C13.1763 3.78517 13.4929 3.78517 13.6882 3.98043Z"
                                        fill="#808080" />
                                    </svg>
                                </button>
                                <button class="atten-coming-btn reject_danger"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2.84154 2.84154C3.07296 2.61011 3.44817 2.61011 3.67959 2.84154L13.1611 12.323C13.3925 12.5544 13.3925 12.9296 13.1611 13.1611C12.9296 13.3925 12.5544 13.3925 12.323 13.1611L2.84154 3.67959C2.61011 3.44817 2.61011 3.07296 2.84154 2.84154Z"
                                        fill="#808080" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.1611 2.84154C13.3925 3.07296 13.3925 3.44817 13.1611 3.67959L3.67959 13.1611C3.44817 13.3925 3.07296 13.3925 2.84154 13.1611C2.61011 12.9296 2.61011 12.5544 2.84154 12.323L12.323 2.84154C12.5544 2.61011 12.9296 2.61011 13.1611 2.84154Z"
                                        fill="#808080" />
                                    </svg>
                                </button>

                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                        <td>
                            <div class="user-images">
                                <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                        class="approve-user-img" alt=""></div>
                                <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                                </div>
                            </div>
                        </td>
                        <td>43 Mins</td>
                        <td>9:01</td>
                        <td>5:00</td>
                        <td>9:19 Hrs</td>
                        <td>
                            <div class="approve-main-sec">
                                <button class="atten-coming-btn approve_success"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.6882 3.98043C13.8835 4.17569 13.8835 4.49228 13.6882 4.68754L6.35486 12.0209C6.15959 12.2161 5.84301 12.2161 5.64775 12.0209L2.31442 8.68754C2.11915 8.49228 2.11915 8.17569 2.31442 7.98043C2.50968 7.78517 2.82626 7.78517 3.02152 7.98043L6.0013 10.9602L12.9811 3.98043C13.1763 3.78517 13.4929 3.78517 13.6882 3.98043Z"
                                        fill="#808080" />
                                    </svg>
                                </button>
                                <button class="atten-coming-btn reject_danger"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2.84154 2.84154C3.07296 2.61011 3.44817 2.61011 3.67959 2.84154L13.1611 12.323C13.3925 12.5544 13.3925 12.9296 13.1611 13.1611C12.9296 13.3925 12.5544 13.3925 12.323 13.1611L2.84154 3.67959C2.61011 3.44817 2.61011 3.07296 2.84154 2.84154Z"
                                        fill="#808080" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.1611 2.84154C13.3925 3.07296 13.3925 3.44817 13.1611 3.67959L3.67959 13.1611C3.44817 13.3925 3.07296 13.3925 2.84154 13.1611C2.61011 12.9296 2.61011 12.5544 2.84154 12.323L12.323 2.84154C12.5544 2.61011 12.9296 2.61011 13.1611 2.84154Z"
                                        fill="#808080" />
                                    </svg>
                                </button>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                        <td>
                            <div class="user-images">
                                <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                        class="approve-user-img" alt=""></div>
                                <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                                </div>
                            </div>
                        </td>
                        <td>43 Mins</td>
                        <td>9:01</td>
                        <td>5:00</td>
                        <td>9:19 Hrs</td>
                        <td>
                            <div class="approve-main-sec"><button class="approve-btn"><img
                                        src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                                <button class="approve-btn"><img
                                        src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                        <td>
                            <div class="user-images">
                                <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                        class="approve-user-img" alt=""></div>
                                <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                                </div>
                            </div>
                        </td>
                        <td>43 Mins</td>
                        <td>9:01</td>
                        <td>5:00</td>
                        <td>9:19 Hrs</td>
                        <td>
                            <div class="approve-main-sec">
                                <button class="atten-coming-btn approve_success"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.6882 3.98043C13.8835 4.17569 13.8835 4.49228 13.6882 4.68754L6.35486 12.0209C6.15959 12.2161 5.84301 12.2161 5.64775 12.0209L2.31442 8.68754C2.11915 8.49228 2.11915 8.17569 2.31442 7.98043C2.50968 7.78517 2.82626 7.78517 3.02152 7.98043L6.0013 10.9602L12.9811 3.98043C13.1763 3.78517 13.4929 3.78517 13.6882 3.98043Z"
                                        fill="#808080" />
                                    </svg>
                                </button>
                                <button class="atten-coming-btn reject_danger"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2.84154 2.84154C3.07296 2.61011 3.44817 2.61011 3.67959 2.84154L13.1611 12.323C13.3925 12.5544 13.3925 12.9296 13.1611 13.1611C12.9296 13.3925 12.5544 13.3925 12.323 13.1611L2.84154 3.67959C2.61011 3.44817 2.61011 3.07296 2.84154 2.84154Z"
                                        fill="#808080" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.1611 2.84154C13.3925 3.07296 13.3925 3.44817 13.1611 3.67959L3.67959 13.1611C3.44817 13.3925 3.07296 13.3925 2.84154 13.1611C2.61011 12.9296 2.61011 12.5544 2.84154 12.323L12.323 2.84154C12.5544 2.61011 12.9296 2.61011 13.1611 2.84154Z"
                                        fill="#808080" />
                                    </svg>
                                </button>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                        <td>
                            <div class="user-images">
                                <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                        class="approve-user-img" alt=""></div>
                                <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                                </div>
                            </div>
                        </td>
                        <td>43 Mins</td>
                        <td>9:01</td>
                        <td>5:00</td>
                        <td>9:19 Hrs</td>
                        <td>
                            <div class="approve-main-sec">
                                <button class="atten-coming-btn approve_success"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.6882 3.98043C13.8835 4.17569 13.8835 4.49228 13.6882 4.68754L6.35486 12.0209C6.15959 12.2161 5.84301 12.2161 5.64775 12.0209L2.31442 8.68754C2.11915 8.49228 2.11915 8.17569 2.31442 7.98043C2.50968 7.78517 2.82626 7.78517 3.02152 7.98043L6.0013 10.9602L12.9811 3.98043C13.1763 3.78517 13.4929 3.78517 13.6882 3.98043Z"
                                        fill="#808080" />
                                    </svg>
                                </button>
                                <button class="atten-coming-btn reject_danger"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2.84154 2.84154C3.07296 2.61011 3.44817 2.61011 3.67959 2.84154L13.1611 12.323C13.3925 12.5544 13.3925 12.9296 13.1611 13.1611C12.9296 13.3925 12.5544 13.3925 12.323 13.1611L2.84154 3.67959C2.61011 3.44817 2.61011 3.07296 2.84154 2.84154Z"
                                        fill="#808080" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.1611 2.84154C13.3925 3.07296 13.3925 3.44817 13.1611 3.67959L3.67959 13.1611C3.44817 13.3925 3.07296 13.3925 2.84154 13.1611C2.61011 12.9296 2.61011 12.5544 2.84154 12.323L12.323 2.84154C12.5544 2.61011 12.9296 2.61011 13.1611 2.84154Z"
                                        fill="#808080" />
                                    </svg>
                                </button>

                            </div>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>

        <!-- @extends('attendance::layouts.daily-report') -->

        <div>
            <div class="reject-approve-bttn">
                <button name="" class="reject-btn proxima_nova_semibold attend_reject_select">Reject Selected</button>
                {{-- <button name="" class="reject-btn proxima_nova_semibold" onclick="Rejectselect()">Reject Selected</button> --}}

                <button name="" class="approve-btn-btn proxima_nova_semibold">Approve Selected</button>
            </div>
        </div>

        <div id="myModal" class="modal check-model">
            <div class="model-section">
                <div class="model_left_side">
                    <div class="selected_check_member proxima_nova_semibold"></div>
                </div>
                <div class="model_right_side">
                    <div class="member_div proxima_nova_semibold">
                        Members
                        Selected
                    </div>
                    <div class="export_div">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="2.25" y="2.25" width="13.5" height="13.5" rx="2" stroke="#808080"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6.75 2.25V15.75" stroke="#808080" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15.75 6.75H6.75" stroke="#808080" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15.75 11.25H6.75" stroke="#808080" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <p>Export</p>
                    </div>
                    <div class="delete_div" onclick="onCheckDelete()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M4.49805 6.74902V14.2521C4.49805 15.0809 5.1699 15.7528 5.99867 15.7528H12.0012C12.8299 15.7528 13.5018 15.0809 13.5018 14.2521V6.74902" stroke="#808080" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M10.5002 7.49902V12.7512" stroke="#808080" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M7.50016 7.49902V12.7512" stroke="#808080" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M3.37305 4.4982H14.6277" stroke="#808080" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M6 4.49801L6.40817 3.2735C6.61236 2.66043 7.18608 2.24692 7.83226 2.24707H10.1702C10.817 2.24627 11.3915 2.65991 11.5958 3.2735L12.0025 4.49801" stroke="#808080" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>

                        <p>Delete</p>
                    </div>
                    <div class="cancel_div" id="closeModal">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.75 3.75L14.25 14.25" stroke="#808080" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M3.75 14.25L14.25 3.75" stroke="#808080" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <p>Cancel</p>
                    </div>
                </div>
            </div>
            <!-- </div> -->

        </div>
    </div>
@endsection

@section('scripts')
    <script>

        $('.input-group.date').datepicker({
            format: 'dd, M yyyy',
            autoclose: true
        });
        $('.input-group.date').datepicker('setDate', new Date());

        //  datatable 
        var selectedIds = [];
        var table;
        
        $(document).ready(function () {            
            function datatable(searchValue = null, calender_date = null) {
                table = $('#staff_datas').DataTable({
                    // "lengthMenu": [[5, 10, 20], [5, 10, 20]],
                    searching: false,
                    lengthChange: false,
                    info: false,
                    responsive: true,
                    // pagingType: "full_numbers",
                    order: [
                        [0, "desc"]
                    ],
                    drawCallback: function() {
                        $('#selectAllCheckbox').on('change', function () {
                            var isChecked = $(this).prop('checked');
                            $('.selectCheckbox_model').prop('checked', isChecked);
                            var checkedCount = $('.selectCheckbox_model:checked').length;
                            $('.selected_check_member').html(checkedCount);
                            if (checkedCount > 0) {
                                $('#myModal').show();
                            } else {
                                $('#myModal').hide();
                            }
                            if (isChecked) {
                                $('.selectCheckbox_model').each(function () {
                                    var id = $(this).val();
                                    if (selectedIds.indexOf(id) === -1) {
                                        selectedIds.push(id);
                                    }
                                });
                            } else {
                                selectedIds = [];
                            }
                            // console.log('Selected IDs:', selectedIds);
                        });                        
                        $('.selectCheckbox_model').change(function () {
                            var id = $(this).val();
                            var checkedCount = $('.selectCheckbox_model:checked').length;
                            $('.selected_check_member').html(checkedCount);
                            if (checkedCount > 0) {
                                $('#myModal').show();
                            } else {
                                $('#myModal').hide();
                            }
                            if ($(this).is(':checked')) {
                                selectedIds.push(id);
                            } else {
                                const index = selectedIds.indexOf(id);
                                if (index !== -1) {
                                    selectedIds.splice(index, 1);
                                }
                            }
                            // console.log('Selected IDs:', selectedIds);
                        });
                        $('#closeModal').click(function () {
                            var selectedIds = [];
                            $('#myModal').hide();
                            // console.log('Selected IDs:', selectedIds);
                        });

                    },
                    ajax: {
                        "url": "{{ route('attendance_punches_list') }}",
                        "dataType": "json",
                        "type": "POST",
                        "data": {_token: "{{csrf_token()}}",'searchValue':searchValue,'calender_date':calender_date}
                    },
                    columns: [
                        {
                            data: 'id',
                            type: 'num',
                            render: function (data, type, row) {
                                if(row.out_time == '-'){
                                    return '';
                                }else{
                                    return `<input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model" value="${row.staff_id}">`;
                                }
                                
                            }
                        },
                        {
                            data: "name",
                            render: function (data, type, row) {
                                return `
                                        <div class="user-images">
                                            <div><img src="${row.staff_photo}"
                                                class="approve-user-img" alt=""></div>
                                            <div>${data}<p class="data-sub-field">${row.department_name}</p></div>
                                        </div>
                                    `;
                            }
                        },
                        { "data": "break_time"},
                        { "data": "in_time"},
                        { "data": "out_time"},
                        { "data": "total_time"},
                        { "data": "action"},
                        {
                            orderable: false,
                            data: null,
                            render: function (data, type, row) {
                                return `<a href="#" class="view-data">View</a>`;
                                        
                            }
                        }
                        // { "data": "staff_logs"}
                        
                    ],
                    // createdRow: function (row, data, dataIndex) {
                    //     $(row).attr('id', 'storie_col_' + data['id']);
                    // },
                    columnDefs: [
                        { "width": "10px", "targets": 0 },
                        // {'targets': [1,2], 'orderable': false}
                    ]
                });

                $('.dataTables_length').addClass('bs-select');
            }
            function format(d) {
                console.log(d);
                var total = d.requested.length;
                var requested = '';
                var i = 1;
                $.each(d.requested, function(index, item) {
                    var suffix = ["th", "st", "nd", "rd"];
                    var v = i % 100;
                    var number = (i++) + (suffix[(v - 20) % 10] ?? suffix[v] ?? suffix[0]);

                    var in_time = item.in_time + ' ' + item.date; 
                    var inTime = new Date(in_time);
                    var formattedInDate = inTime.toLocaleDateString('en-US', { day: '2-digit', month: 'short', year: '2-digit' });
                    var formattedInTime = inTime.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
                    var final_in_time = formattedInTime + ', ' + formattedInDate;
                    
                    var final_out_time = "-";
                    if(item.out_time != null){
                        var out_time = item.out_time + ' ' + item.date; 
                        var outTime = new Date(out_time);
                        var formattedOutDate = outTime.toLocaleDateString('en-US', { day: '2-digit', month: 'short', year: '2-digit' });
                        var formattedOutTime = outTime.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
                        final_out_time = formattedOutTime + ', ' + formattedOutDate;
                    }

                    // Parse the time string into hours, minutes, and seconds
                    var timeParts = item.total_time.split(':');
                    var hours = parseInt(timeParts[0]);
                    var minutes = parseInt(timeParts[1]);
                    var formattedHours = Math.floor((hours + minutes / 60)).toString().padStart(2, '0');
                    var formattedMinutes = (minutes % 60).toString().padStart(2, '0');
                    var total_hours = formattedHours + ':' + formattedMinutes;

                    // console.log(item.attendance_status);
                    var attendance_status_btn = '';
                    if(item.attendance_status == 0){
                        attendance_status_btn += '<button type="button" class="btn btn-outline-warning btn-pending">Pending</button>'; 
                    }else if(item.attendance_status == 1){
                        attendance_status_btn +='<button type="button" class="btn btn-outline-success btn-approve">Approve</button>';  
                    }else if(item.attendance_status == 2){
                        attendance_status_btn +='<button type="button" class="btn btn-outline-danger btn-decline">Decline</button>';
                    }
                    var approve_decline_btn = '';
                    if(item.attendance_status == 0){
                        approve_decline_btn += '<button class="atten-coming-btn approve_success" onclick="approveDecline(' + item.id + ', \'' + final_out_time + '\',\''+0+'\' )">' +
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">'+
                                                '<path fill-rule="evenodd" clip-rule="evenodd" d="M13.6882 3.98043C13.8835 4.17569 13.8835 4.49228 13.6882 4.68754L6.35486 12.0209C6.15959 12.2161 5.84301 12.2161 5.64775 12.0209L2.31442 8.68754C2.11915 8.49228 2.11915 8.17569 2.31442 7.98043C2.50968 7.78517 2.82626 7.78517 3.02152 7.98043L6.0013 10.9602L12.9811 3.98043C13.1763 3.78517 13.4929 3.78517 13.6882 3.98043Z" fill="#808080" />'+
                                            '</svg>'+
                                        '</button>'+
                                        '<button class="atten-coming-btn reject_danger" onclick="approveDecline(' + item.id + ', \'' + final_out_time + '\',\''+1+'\' )">' +
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">'+
                                                '<path fill-rule="evenodd" clip-rule="evenodd" d="M2.84154 2.84154C3.07296 2.61011 3.44817 2.61011 3.67959 2.84154L13.1611 12.323C13.3925 12.5544 13.3925 12.9296 13.1611 13.1611C12.9296 13.3925 12.5544 13.3925 12.323 13.1611L2.84154 3.67959C2.61011 3.44817 2.61011 3.07296 2.84154 2.84154Z" fill="#808080" />'+
                                                '<path fill-rule="evenodd" clip-rule="evenodd" d="M13.1611 2.84154C13.3925 3.07296 13.3925 3.44817 13.1611 3.67959L3.67959 13.1611C3.44817 13.3925 3.07296 13.3925 2.84154 13.1611C2.61011 12.9296 2.61011 12.5544 2.84154 12.323L12.323 2.84154C12.5544 2.61011 12.9296 2.61011 13.1611 2.84154Z" fill="#808080" />'+
                                            '</svg>'+
                                        '</button>';
                    }
                    requested += '<div class="row main-view-punches">' +
                                '<div class="col-2" style="align-content: center;">' +
                                    '<button class="staff-view-punches staff-view-svg">' +
                                        '<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                                            '<path d="M4.08301 11.6663C4.08301 10.2079 5.24967 9.09961 6.64967 9.09961H9.62467C11.083 9.09961 12.1913 10.2663 12.1913 11.6663" stroke="#2F8CFF" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>' +
                                            '<path d="M9.91706 3.14922C10.8504 4.08255 10.8504 5.65755 9.91706 6.59089C8.98372 7.52422 7.40872 7.52422 6.47539 6.59089C5.54206 5.65755 5.54206 4.08255 6.47539 3.14922C7.40872 2.21589 8.92539 2.21589 9.91706 3.14922" stroke="#2F8CFF" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>' +
                                            '<path d="M1.16699 7.00065H4.08366" stroke="#2F8CFF" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>' +
                                            '<path d="M2.91699 8.16732L4.08366 7.00065L2.91699 5.83398" stroke="#2F8CFF" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>' +
                                        '</svg>'+ number +'</button>' +
                                '</div>' +
                                '<div class="col-3 staff-punches-time">' +
                                    '<div class="punches-time-inner">'+
                                        '<div>'+
                                            '<p>in time:</p>' +
                                            '<p>out time:</p>' +
                                        '</div>'+
                                        '<div class="staff-view-time">'+
                                            '<p>'+final_in_time +'</p>' +
                                            '<p>'+final_out_time+'</p>' +
                                        '</div>'+
                                    '</div>'+ 
                                '</div>' +
                                '<div class="col-3 staff-punches-time">' +
                                    '<div class="punches-time-inner">'+
                                        '<div>'+
                                            '<p>Type:</p>' +
                                            '<p>Total Hours:</p>' +
                                        '</div>'+
                                        '<div class="staff-view-time">'+
                                            '<p>Manual</p>' +
                                            '<p>'+total_hours+'</p>' +
                                        '</div>'+
                                    '</div>'+ 
                                '</div>' +
                                '<div class="col-2" style="align-content: center;">' + attendance_status_btn+'</div>'+
                                '<div class="col-2" style="align-content: center;">' +
                                    '<div class="approve-main-sec">'+approve_decline_btn+'</div>' +  
                                '</div>' +
                            '</div>';
                });
                return (
                    '<div class = "main-data-detail">' +
                        '<div class = "entries-data">' +
                            '<div class = "row">' +
                                '<div class = "col-1" style="max-width:40px">'+
                                    '<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                                        '<path d="M15.0664 9.71484V15.2847L19.4445 17.9533" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>' +
                                        '<path d="M5.25879 10.9294C6.98013 6.06236 11.9131 3.10145 17.0178 3.8712C22.1225 4.64096 25.963 8.92484 26.1726 14.083C26.3822 19.2412 22.902 23.8226 17.8765 25.004" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>' +
                                        '<path fill-rule="evenodd" clip-rule="evenodd" d="M12.4997 26.2555H4.37135C4.02603 26.2555 3.74609 25.9755 3.74609 25.6302V25.1225C3.75022 23.678 4.92019 22.508 6.36468 22.5039H10.5064C11.9509 22.508 13.1209 23.678 13.125 25.1225V25.6302C13.125 25.9755 12.8451 26.2555 12.4997 26.2555Z" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>' +
                                        '<path fill-rule="evenodd" clip-rule="evenodd" d="M8.43559 19.3771C7.05561 19.3771 5.93641 18.2594 5.93457 16.8794C5.93274 15.4994 7.04897 14.3787 8.42895 14.375C9.80893 14.3713 10.9311 15.4861 10.9367 16.866C10.9393 17.5311 10.677 18.1698 10.2076 18.641C9.73832 19.1122 9.10065 19.3771 8.43559 19.3771Z" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>' +
                                    '</svg>' +
                                '</div>'+
                                '<div class="col-11">'+
                                    '<p>This employee has '+total+' entries today</p>' +
                                    '<p class="clr-p">Total approved hours: '+d.total_time+' hrs</p>' +
                                '</div>'+
                            '</div>' + 
                        '</div>' +
                        '<div class="attendance-view-punches">'+requested+'</div>' +
                    '</div>'
                );
            }
            function initializeViewDataHandler() {
                table.on('click', 'a.view-data', function (e) {
                    e.preventDefault();
                    let button = $(this);
                    let tr = button.closest('tr');
                    let row = table.row(tr);
                    if (row.child.isShown()) {
                        row.child.hide();
                        button.text('View');
                        button.removeClass('expanded');
                    } else {
                        row.child(format(row.data())).show();
                        button.text('Hide');
                        button.addClass('expanded');
                    }
                });
            }
            var searchValue = $('#staff_data_find').val();
            var calender_date = $('#calender_date').val();
            datatable(searchValue,calender_date);
            initializeViewDataHandler();

            $('#staff_data_find').on('input', function () {
                table.destroy();                
                var searchValue = $('#staff_data_find').val();
                var calender_date = $('#calender_date').val();
                datatable(searchValue,calender_date);
            });

            $('#calender_date').on('change', function () {
                table.destroy();
                var searchValue = $('#staff_data_find').val();
                var calender_date = $('#calender_date').val();
                datatable(searchValue,calender_date);
            });   

            // function Rejectselect(row.staff_id) {
            //     alert(staff_id);
            // }

            // $(".attend_reject_select").on('click', function(){
            //     $.ajax({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         url: "{{ route('attendance_reject_select') }}",
            //         type: "POST",
            //         data:{
            //             'staff_id': staff_id,
            //         },
            //         success: function(response) {
                     
            //         },
            //     });
            // });

            
        });
        function approveDecline(id,final_out_time,status){
            if(final_out_time == '-' && status == 0){
                toastr["error"]("Not approved without out time");
            }else if(final_out_time == '-' && status == 1){
                toastr["error"]("Not decline without out time");
            }else{
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('attendance_approve_decline') }}",
                    type: "POST",
                    data:{
                        'id': id,
                        'status':status
                    },
                    success: function(response) {
                        if(response.status == 1) {
                            toastr["success"](response.message);
                            table.ajax.reload(null, false);
                        }else{
                            toastr["error"](response.message);
                        }
                    },
                });
            }
        }
        
        
        function allApproveDecline(staff_id,date,punchout_time,status){
            if(punchout_time == '-' && status == 0){
                toastr["error"]("Not all Approve without out time");
            }else if(punchout_time == '-' && status == 1){
                toastr["error"]("Not all decline without out time");
            }else{
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('all_attendance_approve_decline') }}",
                    type: "POST",
                    data:{
                        'staff_id': staff_id,
                        'date':date,
                        'status': status
                    },
                    success: function(response) {
                        if(response.status == 1) {
                            toastr["success"](response.message);
                            table.ajax.reload(null, false);
                        }else{
                            toastr["error"](response.message);
                        }
                    },
                });
            }
            
        }

        

        function onCheckDelete(){
            var calender_date = $('#calender_date').val();  
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('delete_check_punches') }}",
                type: "POST",
                data:{
                    "selectedIds":selectedIds,
                    "calender_date":calender_date
                },
                success: function(response) {
                    toastr["success"](response.message);
                    $('#myModal').hide();
                    table.ajax.reload(null, false);
                },
            });
        }


    // $('#staff_datas').on('click', '.view-data', function() {
    //     var tr = $(this).closest('tr');
    //     var rowData = table.row(tr).data(); 
    //     var in_time = rowData.in_time;
    //     var out_time = rowData.out_time;

    //     // Create a new row below the clicked row
    //     var newRow = `
    //         <tr class="details-row">
    //             <td colspan="7">
    //                 <p>In Time: ${in_time}</p>
    //                 <p>Out Time: ${out_time}</p>
    //             </td>
    //         </tr>`;

    //     // Check if there is already a details row, if yes, remove it
    //     if (tr.next().hasClass('details-row')) {
    //         tr.next().remove();
    //     } else {
    //         tr.after(newRow);
    //     }
    // });
</script>
@endsection