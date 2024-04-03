@extends('admin.layout.main')
@section('title')
    <title>{{env('APP_NAME')}} | Attendance</title>
@endsection
@section('header-page')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-12 top-header-sub staff-summary-main">
                <div class="breadcrumbs-area clearfix">
                    <div class="breadcrumbs-sub">
                        <div class="attendance-breadcrumbs">
                            <img src="{{asset('assets/admin/images/header/back.svg')}}" alt="">
                            <h4 class="page-title pull-left proxima_nova_semibold">Settings
                            </h4>
                        </div>

                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="index.html">Attendance</a></li>
                        <li class="section_sub_title">/  Settings</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
            <div class="main-content-inner on-time-main main-atten">

                <row>
                    <div class="setting-notes-main">
                        <h2 class="notes-setting proxima_nova_semibold">Notes:</h2>
                        <div class="setting-access-note">
                            <h3 class="proxima_nova_semibold section_sub_title">Select staff for providing access</h3>
                            <p class="section_sub_title">Note: Phone number is mandatory to give access.</p>
                        </div>
                        <div class="setting-access-note">
                            <h3 class="proxima_nova_semibold section_sub_title">How it works?</h3>
                            <p class="section_sub_title">On providing access, your staff would be able to Add Daily Work
                                Entries from their app. You can validate them anytime.</p>
                        </div>
                    </div>

                    <h2 class="proxima_nova_semibold staff-pay-title atten-setting-entry-title">Daily Work Entry</h2>
                    <div class="approve-datas atten-datas">
                        <div class="atten-data-search assign-data-search col-md-6 col-sm-6">
                            <div>
                                <div class="create-data dropdown-toggle proxima_nova_bold active"
                                    data-bs-toggle="offcanvas" data-bs-target="#filter-toggle-right"
                                    aria-controls="filter-toggle-right">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M19.5182 9.8002H4.08141C3.69061 9.8002 3.2998 9.4002 3.2998 9.0002C3.2998 8.6002 3.59291 8.2002 4.08141 8.2002H19.5182C19.909 8.2002 20.2998 8.5002 20.2998 9.0002C20.2998 9.5002 19.909 9.8002 19.5182 9.8002Z" fill="#808080"/>
                                        <path d="M10.6002 21.6998C10.1002 21.6998 9.7002 21.5998 9.3002 21.2998C8.5002 20.8998 8.0002 20.0998 8.0002 19.1998V13.3998L4.2002 10.4998C3.6002 9.9998 3.2002 9.2998 3.2002 8.4998V5.7998C3.2002 4.3998 4.3002 3.2998 5.7002 3.2998H18.1002C19.5002 3.2998 20.6002 4.3998 20.6002 5.7998V8.4998C20.6002 9.2998 20.2002 9.9998 19.6002 10.4998L16.0002 13.3998V17.7998C16.0002 18.7998 15.5002 19.5998 14.6002 20.0998L11.8002 21.4998C11.3002 21.6998 11.0002 21.6998 10.6002 21.6998ZM5.8002 4.7998C5.2002 4.7998 4.8002 5.2998 4.8002 5.7998V8.4998C4.8002 8.7998 4.9002 9.0998 5.2002 9.2998L9.3002 12.4998C9.5002 12.5998 9.6002 12.8998 9.6002 13.0998V19.2998C9.6002 19.6998 9.8002 19.9998 10.1002 20.1998C10.4002 20.3998 10.8002 20.3998 11.1002 20.1998L13.9002 18.7998C14.2002 18.5998 14.5002 18.2998 14.5002 17.8998V12.9998C14.5002 12.7998 14.6002 12.4998 14.8002 12.3998L18.9002 9.1998C19.2002 8.9998 19.3002 8.6998 19.3002 8.3998V5.7998C19.3002 5.1998 18.8002 4.7998 18.3002 4.7998H5.8002Z" fill="#808080"/>
                                    </svg>
                                </div>
                            </div>
                            <form action="" method="">
                                <input class="input-search-rounded" type="text" id="staff_data_find"
                                    placeholder="Search">
                            </form>

                        </div>
                        <div class="approve-right-data col-md-6 col-sm-6">

                            <div class="approve-data-download  dropdown-toggle proxima_nova_bold">
                                <a href="#"> <img src="{{asset('assets/admin/images/approve_punches/download-report.svg')}}" alt=""></a>
                            </div>
                            <div class="dropdown-menu" x-placement="bottom-start">
                                <a class="dropdown-item proxima_nova_semibold" href="#">Excel Report</a>
                                <a class="dropdown-item proxima_nova_semibold" href="#">PDF Report</a>
                            </div>
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
                                <th>Staff ID</th>
                                <th>Salary Payment Type</th>
                                <th>Phone Number</th>
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
                                <td>STF07744</td>
                                <td>
                                    <div class="salary-payment-type">
                                        <div class="salary-payment-text section_sub_title">R</div>
                                        <div class="tooltip-text">Regular</div>Monthly
                                    </div>
                                </td>
                                <td>+91 9465263478</td>
                            </tr>

                            <tr>
                                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                                <td>
                                    <div class="user-images">
                                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                                class="approve-user-img" alt=""></div>
                                        <div>Aditya Maurya<p class="data-sub-field">UI/UX Designer</p>
                                        </div>
                                    </div>
                                </td>
                                <td>STF07720</td>
                                <td>
                                    <div class="salary-payment-type">
                                        <div class="salary-payment-text section_sub_title">C</div>
                                        <div class="tooltip-text">Contractual</div>Monthly
                                    </div>
                                </td>
                                <td>+91 9562412345</td>
                            </tr>

                            <tr>
                                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                                <td>
                                    <div class="user-images">
                                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                                class="approve-user-img" alt=""></div>
                                        <div>Tejas Raiyani<p class="data-sub-field">UI/UX Designer</p>
                                        </div>
                                    </div>
                                </td>
                                <td>STF07730</td>
                                <td>
                                    <div class="salary-payment-type">
                                        <div class="salary-payment-text section_sub_title">R</div>
                                        <div class="tooltip-text">Regular</div>Monthly
                                    </div>
                                </td>
                                <td>+91 7574252201</td>
                            </tr>

                            <tr>
                                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                                <td>
                                    <div class="user-images">
                                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                                class="approve-user-img" alt=""></div>
                                        <div>Deep Patel<p class="data-sub-field">UI/UX Designer</p>
                                        </div>
                                    </div>
                                </td>
                                <td>STF07730</td>
                                <td>
                                    <div class="salary-payment-type">
                                        <div class="salary-payment-text section_sub_title">R</div>
                                        <div class="tooltip-text">Regular</div>Monthly
                                    </div>
                                </td>
                                <td>+91 9913654782</td>
                            </tr>

                            <tr>
                                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                                <td>
                                    <div class="user-images">
                                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                                class="approve-user-img" alt=""></div>
                                        <div>Nihal Desai<p class="data-sub-field">UI/UX Designer</p>
                                        </div>
                                    </div>
                                </td>
                                <td>STF07730</td>
                                <td>
                                    <div class="salary-payment-type">
                                        <div class="salary-payment-text section_sub_title">C</div>
                                        <div class="tooltip-text">Contractual</div>Monthly
                                    </div>
                                </td>
                                <td>+91 7574252201</td>
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
                                <td>STF07744</td>
                                <td>
                                    <div class="salary-payment-type">
                                        <div class="salary-payment-text section_sub_title">R</div>
                                        <div class="tooltip-text">Regular</div>Monthly
                                    </div>
                                </td>
                                <td>+91 9465263478</td>
                            </tr>

                            <tr>
                                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                                <td>
                                    <div class="user-images">
                                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                                class="approve-user-img" alt=""></div>
                                        <div>Aditya Maurya<p class="data-sub-field">UI/UX Designer</p>
                                        </div>
                                    </div>
                                </td>
                                <td>STF07720</td>
                                <td>
                                    <div class="salary-payment-type">
                                        <div class="salary-payment-text section_sub_title">C</div>
                                        <div class="tooltip-text">Contractual</div>Monthly
                                    </div>
                                </td>
                                <td>+91 9562412345</td>
                            </tr>

                            <tr>
                                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                                <td>
                                    <div class="user-images">
                                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                                class="approve-user-img" alt=""></div>
                                        <div>Tejas Raiyani<p class="data-sub-field">UI/UX Designer</p>
                                        </div>
                                    </div>
                                </td>
                                <td>STF07730</td>
                                <td>
                                    <div class="salary-payment-type">
                                        <div class="salary-payment-text section_sub_title">R</div>
                                        <div class="tooltip-text">Regular</div>Monthly
                                    </div>
                                </td>
                                <td>+91 7574252201</td>
                            </tr>

                            <tr>
                                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                                <td>
                                    <div class="user-images">
                                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                                class="approve-user-img" alt=""></div>
                                        <div>Deep Patel<p class="data-sub-field">UI/UX Designer</p>
                                        </div>
                                    </div>
                                </td>
                                <td>STF07730</td>
                                <td>
                                    <div class="salary-payment-type">
                                        <div class="salary-payment-text section_sub_title">R</div>
                                        <div class="tooltip-text">Regular</div>Monthly
                                    </div>
                                </td>
                                <td>+91 9913654782</td>
                            </tr>

                            <tr>
                                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                                <td>
                                    <div class="user-images">
                                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                                class="approve-user-img" alt=""></div>
                                        <div>Nihal Desai<p class="data-sub-field">UI/UX Designer</p>
                                        </div>
                                    </div>
                                </td>
                                <td>STF07730</td>
                                <td>
                                    <div class="salary-payment-type">
                                        <div class="salary-payment-text section_sub_title">C</div>
                                        <div class="tooltip-text">Contractual</div>Monthly
                                    </div>
                                </td>
                                <td>+91 7574252201</td>
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
                                <td>STF07744</td>
                                <td>
                                    <div class="salary-payment-type">
                                        <div class="salary-payment-text section_sub_title">R</div>
                                        <div class="tooltip-text">Regular</div>Monthly
                                    </div>
                                </td>
                                <td>+91 9465263478</td>
                            </tr>

                            <tr>
                                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                                <td>
                                    <div class="user-images">
                                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                                class="approve-user-img" alt=""></div>
                                        <div>Aditya Maurya<p class="data-sub-field">UI/UX Designer</p>
                                        </div>
                                    </div>
                                </td>
                                <td>STF07720</td>
                                <td>
                                    <div class="salary-payment-type">
                                        <div class="salary-payment-text section_sub_title">C</div>
                                        <div class="tooltip-text">Contractual</div>Monthly
                                    </div>
                                </td>
                                <td>+91 9562412345</td>
                            </tr>

                            <tr>
                                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                                <td>
                                    <div class="user-images">
                                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                                class="approve-user-img" alt=""></div>
                                        <div>Tejas Raiyani<p class="data-sub-field">UI/UX Designer</p>
                                        </div>
                                    </div>
                                </td>
                                <td>STF07730</td>
                                <td>
                                    <div class="salary-payment-type">
                                        <div class="salary-payment-text section_sub_title">R</div>
                                        <div class="tooltip-text">Regular</div>Monthly
                                    </div>
                                </td>
                                <td>+91 7574252201</td>
                            </tr>

                            <tr>
                                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                                <td>
                                    <div class="user-images">
                                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                                class="approve-user-img" alt=""></div>
                                        <div>Deep Patel<p class="data-sub-field">UI/UX Designer</p>
                                        </div>
                                    </div>
                                </td>
                                <td>STF07730</td>
                                <td>
                                    <div class="salary-payment-type">
                                        <div class="salary-payment-text section_sub_title">R</div>
                                        <div class="tooltip-text">Regular</div>Monthly
                                    </div>
                                </td>
                                <td>+91 9913654782</td>
                            </tr>

                            <tr>
                                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                                <td>
                                    <div class="user-images">
                                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                                class="approve-user-img" alt=""></div>
                                        <div>Nihal Desai<p class="data-sub-field">UI/UX Designer</p>
                                        </div>
                                    </div>
                                </td>
                                <td>STF07730</td>
                                <td>
                                    <div class="salary-payment-type">
                                        <div class="salary-payment-text section_sub_title">C</div>
                                        <div class="tooltip-text">Contractual</div>Monthly
                                    </div>
                                </td>
                                <td>+91 7574252201</td>
                            </tr>


                        </tbody>
                    </table>
                </div>

                <div class="assign-edit-btn">
                    <button name="" class="reject-btn staff-profile-delete-btn proxima_nova_semibold">Disable
                        All</button>
                    <button name="" class="save-staff-btn proxima_nova_semibold">Save</button>
                </div>

                <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="view-toggle-right"
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
                    <h5 class="section_title_heading proxima_nova_bold download-work-main-header">View Log</h5>
                    <hr>

                    <div class="view-log-model">
                        <h2 class="proxima_nova_semibold section_title">
                            Sweta Vaghasiya
                        </h2>
                        <p>20 April | Wed</p>
                    </div>
                    <ul class="view-log-content">
                        <li class="view-log-status proxima_nova_semibold section_title">Marked Absent</li>
                        <p>By Dhruvi on 25 April, 10:31 AM</p>
                    </ul>
                    <div class="download-cancel-btns-main">
                        <div class="download-cancel-btn">
                            <button name="" class="download-btn proxima_nova_semibold">Done</button>
                        </div>
                    </div>
                </div>

                <!-- @extends('attendance::layouts.daily-report') -->

                <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="filter-toggle-right"
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
                </div>

                <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="create-toggle-right"
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
                            Add Note</h5>
                        <hr>
                        <div class="filter-sub-sec">
                            <form method="">
                                <div class="daily-work-select">
                                    <h2 class="filter-shiftcheck section_title proxima_nova_semibold">Sweta Vaghasiya
                                    </h2>
                                    <div class="form-check add-note-main">
                                        <textarea placeholder="Leave needs to be added."
                                            class="section_sub_title"></textarea> </textarea>
                                    </div>

                                    <div class="download-cancel-btns-main">
                                        <div class="download-cancel-btn">
                                            <button name="" class="download-btn proxima_nova_semibold">Save</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    </main>
</div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#mySelect').select2({
                templateResult: formatOption,
                templateSelection: formatOption,
                minimumResultsForSearch: Infinity, //search disable hide
            });
            $('#mySelect2').select2({
                templateResult: formatOption,
                templateSelection: formatOption,
                minimumResultsForSearch: Infinity,
            });
            $('#mySelect3').select2({
                templateResult: formatOption,
                templateSelection: formatOption,
                minimumResultsForSearch: Infinity,
            });
            $('#mySelect4').select2({
                templateResult: formatOption,
                templateSelection: formatOption,
                minimumResultsForSearch: Infinity,
            });
            $('#mySelect5').select2({
                templateResult: formatOption,
                templateSelection: formatOption,
                minimumResultsForSearch: Infinity,
            });
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

        $('.input-group.date').datepicker({
            format: 'dd, M yyyy',
            autoclose: true,
        });
        $('.input-group.date').datepicker('setDate', new Date('2023-01-01'));

        //  datatable 

        $(document).ready(function () {
            var table = $('#staff_datas').DataTable({
                searching: false,
                lengthChange: false,
                info: false,
                // bPaginate: false,
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