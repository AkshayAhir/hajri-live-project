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
                        <h4 class="page-title pull-left proxima_nova_semibold">review overtime
                        </h4>
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="index.html">Attendance</a></li>
                        <li class="section_sub_title">/  review overtime</li>
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
                <a href="" class="over_time proxima_nova_semibold overtime-approve">Bulk Approve Overtime</a>
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
                        <a href="#"> <img src="{{asset('assets/admin/images/approve_punches/download-report.svg')}}" alt=""></a>
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
                        <input type="text" class="input-group-addon form-control proxima_nova_semibold calender-picker" readonly='true'>
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
                        <th>In Time</th>
                        <th>Out Time</th>
                        <th>Overtime</th>
                        <th>Salary</th>
                        <th>Hours</th>
                        <th>Total</th>
                        <th>Approve/Decline</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                        <td>
                            <div class="user-images">
                                <div><img src="{{asset('assets/admin/images/approve_punches/ic-user.svg')}}"
                                        class="approve-user-img" alt=""></div>
                                <div>Jay Shah<p class="data-sub-field">Node.js Developer</p>
                                </div>
                            </div>
                        </td>
                        <td>9:00</td>
                        <td>6:30</td>
                        <td class="over_time">30 Mins</td>
                        <td>
                            <div class="filters sidebar-select select_mate_option atten-salary">
                                <select id="main_select_services"
                                    class="form-select create-select section_sub_title select-club-services"
                                    name="club-services">
                                    <option value="">Fixed Amount</option>
                                    <option value="Salary" selected>1x Salary</option>
                                    <option value="Salary">1.5x Salary</option>
                                    <option value="Salary">2x Salary</option>
                                    <option value="Salary">Add Custom Salary Multiple</option>
                                </select>
                            </div>
                        </td>
                        <td> &#x20B9 100</td>
                        <td> &#x20B9 75</td>
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
                                <div><img src="{{asset('assets/admin/images/approve_punches/ic-user.svg')}}"
                                        class="approve-user-img" alt=""></div>
                                <div>Jay Shah<p class="data-sub-field">Node.js Developer</p>
                                </div>
                            </div>
                        </td>
                        <td>9:00</td>
                        <td>6:30</td>
                        <td class="over_time">30 Mins</td>
                        <td>
                            <div class="filters sidebar-select select_mate_option atten-salary">
                                <select id="main_select_services"
                                    class="form-select create-select section_sub_title select-club-services"
                                    name="club-services">
                                    <option value="">Fixed Amount</option>
                                    <option value="Salary" selected>1x Salary</option>
                                    <option value="Salary">1.5x Salary</option>
                                    <option value="Salary">2x Salary</option>
                                    <option value="Salary">Add Custom Salary Multiple</option>
                                </select>
                            </div>
                        </td>
                        <td> &#x20B9 100</td>
                        <td> &#x20B9 75</td>
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
                                <div><img src="{{asset('assets/admin/images/approve_punches/ic-user.svg')}}"
                                        class="approve-user-img" alt=""></div>
                                <div>Jay Shah<p class="data-sub-field">Node.js Developer</p>
                                </div>
                            </div>
                        </td>
                        <td>9:00</td>
                        <td>6:30</td>
                        <td class="over_time">30 Mins</td>
                        <td>
                            <div class="filters sidebar-select select_mate_option atten-salary">
                                <select id="main_select_services"
                                    class="form-select create-select section_sub_title select-club-services"
                                    name="club-services">
                                    <option value="">Fixed Amount</option>
                                    <option value="Salary" selected>1x Salary</option>
                                    <option value="Salary">1.5x Salary</option>
                                    <option value="Salary">2x Salary</option>
                                    <option value="Salary">Add Custom Salary Multiple</option>
                                </select>
                            </div>
                        </td>
                        <td> &#x20B9 100</td>
                        <td> &#x20B9 75</td>
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

                   

                </tbody>
            </table>
        </div>

        <!-- @extends('attendance::layouts.daily-report') -->

        <div id="myModal" class="modal check-model">
            <div class="model-section">
                <div class="model_left_side">
                    <div class="proxima_nova_semibold">
                        1
                    </div>
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
                    <div class="delete_div">
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
        $('.input-group.date').datepicker('setDate', new Date('2023-01-01'));

        //  datatable 

        $(document).ready(function () {
            var table = $('#staff_datas').DataTable({
                searching: false,
                lengthChange: false,
                info: false,                                
                responsive: true,
                columnDefs: [
                    { "width": "10px", "targets": 0 }
                ]
            });

            // muklti checkbox
            $('#selectAllCheckbox').on('change', function () {
                var isChecked = $(this).prop('checked');
                $('.selectCheckbox_model').prop('checked', isChecked);
            });

            // search data
            $('#staff_data_find').on('input', function () {
                var searchValue = $(this).val();
                table.search(searchValue).draw();
                // console.log(table);
            });


            $('.selectCheckbox_model').change(function () {
                if ($(this).is(':checked')) {
                    $('#myModal').show();
                } else {
                    $('#myModal').hide();
                }
            });
            $('#closeModal').click(function () {
                $('#myModal').hide();
            });
        });
    </script>
@endsection