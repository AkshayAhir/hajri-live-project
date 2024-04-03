@extends('admin.layout.main')
@section('title')
    <title>{{env('APP_NAME')}} | Approvals Punches</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/dropzone.css')}}">
@endsection
@section('header-page')
    <div class="page-title-area payroll-approval active">
        <div class="row align-items-center">
            <div class="top-header-sub">
                <div class="breadcrumbs-area-details clearfix">
                    <div class="breadcrumbs-sub">
                    <div class="attendance-breadcrumbs" onclick="history.back()">
                    <a class="back_button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z" fill="#050E17"></path>
                        </svg></a>
                        <h4 class="page-title pull-left proxima_nova_semibold">Approve Overtime
                        </h4>
                    </div>
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li class="section_sub_title"><a href="#">Payroll</a></li>
                        <li class="section_sub_title">/ Approve</li>
                        <li class="section_sub_title">/  Approve Overtime</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <row>
        <div class="main-payroll-sec">
            <div class="shifts-data">
                <div class="filters sidebar-select approve-punch-data">
                    <select id="main_select_services"
                        class="form-select create-select section_sub_title select-club-services"
                        name="club-services">
                        <option value=".abrikosovaya" selected>Business Manager</option>
                        <option value=".bratskaya">Designer</option>
                        <option value=".lesi-ukrainki">Android Developer</option>
                        <option value=".lesi-ukrainki">React Developer</option>
                        <option value=".lesi-ukrainki">Flutter Developer</option>
                    </select>
                </div>
            </div>
            <form action="" method="">
                <input class="input-search-rounded" type="text" id="staff_data_find" placeholder="Search">
            </form>
        </div>
    </row>
<div class="approve-main-content">
    <div class="approve_staff_data reports_attendance_table review-table">
        <table id="staff_datas" class="display dataTable no-footer dtr-inline" style="width: 100%;">
            <thead>
                <tr>
                    <th class="data_list_check"><input type="checkbox" id="selectAllCheckbox"></th> <!-- Checkbox Column -->
                    <th>Staff Name</th>
                    <th>Date</th>
                    <th>Overtime</th>
                    <th>Status</th>
                    <th>Approve/Decline</th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd">
                    <td class="dtr-control">
                        <input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model" value="22">
                    </td>
                    <td>
                        <a href="http://localhost:8000/staff/staff-profile/22" class="staff-edit">
                            <div class="user-images">
                                <div><img src="http://localhost:8000/assets/admin/images/dummy/dummy-user.png" class="approve-user-img" alt=""></div>
                                <div>amitab bachchan<p class="data-sub-field">android devloper</p></div>
                            </div>
                        </a>
                    </td>
                    <td>20 April, 2023</td>
                    <td>09:00 AM</td>
                    <td>06:15 PM</td>
                    <td>
                        <div class="approve-main-sec">
                            <button class="atten-coming-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6882 3.98043C13.8835 4.17569 13.8835 4.49228 13.6882 4.68754L6.35486 12.0209C6.15959 12.2161 5.84301 12.2161 5.64775 12.0209L2.31442 8.68754C2.11915 8.49228 2.11915 8.17569 2.31442 7.98043C2.50968 7.78517 2.82626 7.78517 3.02152 7.98043L6.0013 10.9602L12.9811 3.98043C13.1763 3.78517 13.4929 3.78517 13.6882 3.98043Z" fill="#808080" />
                                </svg>
                            </button>
                            <button class="atten-coming-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.84154 2.84154C3.07296 2.61011 3.44817 2.61011 3.67959 2.84154L13.1611 12.323C13.3925 12.5544 13.3925 12.9296 13.1611 13.1611C12.9296 13.3925 12.5544 13.3925 12.323 13.1611L2.84154 3.67959C2.61011 3.44817 2.61011 3.07296 2.84154 2.84154Z" fill="#808080" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1611 2.84154C13.3925 3.07296 13.3925 3.44817 13.1611 3.67959L3.67959 13.1611C3.44817 13.3925 3.07296 13.3925 2.84154 13.1611C2.61011 12.9296 2.61011 12.5544 2.84154 12.323L12.323 2.84154C12.5544 2.61011 12.9296 2.61011 13.1611 2.84154Z" fill="#808080" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="dtr-control">
                        <input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model" value="22">
                    </td>
                    <td>
                        <a href="http://localhost:8000/staff/staff-profile/22" class="staff-edit">
                            <div class="user-images">
                                <div><img src="http://localhost:8000/assets/admin/images/dummy/dummy-user.png" class="approve-user-img" alt=""></div>
                                <div>amitab bachchan<p class="data-sub-field">android devloper</p></div>
                            </div>
                        </a>
                    </td>
                    <td>20 April, 2023</td>
                    <td>09:00 AM</td>
                    <td>06:15 PM</td>
                    <td>
                        <div class="approve-main-sec">
                            <button class="atten-coming-btn approve_success_btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6882 3.98043C13.8835 4.17569 13.8835 4.49228 13.6882 4.68754L6.35486 12.0209C6.15959 12.2161 5.84301 12.2161 5.64775 12.0209L2.31442 8.68754C2.11915 8.49228 2.11915 8.17569 2.31442 7.98043C2.50968 7.78517 2.82626 7.78517 3.02152 7.98043L6.0013 10.9602L12.9811 3.98043C13.1763 3.78517 13.4929 3.78517 13.6882 3.98043Z" fill="#17B643" />
                                </svg>
                            </button>
                            <button class="atten-coming-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.84154 2.84154C3.07296 2.61011 3.44817 2.61011 3.67959 2.84154L13.1611 12.323C13.3925 12.5544 13.3925 12.9296 13.1611 13.1611C12.9296 13.3925 12.5544 13.3925 12.323 13.1611L2.84154 3.67959C2.61011 3.44817 2.61011 3.07296 2.84154 2.84154Z" fill="#808080" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1611 2.84154C13.3925 3.07296 13.3925 3.44817 13.1611 3.67959L3.67959 13.1611C3.44817 13.3925 3.07296 13.3925 2.84154 13.1611C2.61011 12.9296 2.61011 12.5544 2.84154 12.323L12.323 2.84154C12.5544 2.61011 12.9296 2.61011 13.1611 2.84154Z" fill="#808080" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="dtr-control">
                        <input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model" value="22">
                    </td>
                    <td>
                        <a href="http://localhost:8000/staff/staff-profile/22" class="staff-edit">
                            <div class="user-images">
                                <div><img src="http://localhost:8000/assets/admin/images/dummy/dummy-user.png" class="approve-user-img" alt=""></div>
                                <div>amitab bachchan<p class="data-sub-field">android devloper</p></div>
                            </div>
                        </a>
                    </td>
                    <td>20 April, 2023</td>
                    <td>09:00 AM</td>
                    <td>06:15 PM</td>
                    <td>
                        <div class="approve-main-sec">
                            <button class="atten-coming-btn approve_success_btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6882 3.98043C13.8835 4.17569 13.8835 4.49228 13.6882 4.68754L6.35486 12.0209C6.15959 12.2161 5.84301 12.2161 5.64775 12.0209L2.31442 8.68754C2.11915 8.49228 2.11915 8.17569 2.31442 7.98043C2.50968 7.78517 2.82626 7.78517 3.02152 7.98043L6.0013 10.9602L12.9811 3.98043C13.1763 3.78517 13.4929 3.78517 13.6882 3.98043Z" fill="#17B643" />
                                </svg>
                            </button>
                            <button class="atten-coming-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.84154 2.84154C3.07296 2.61011 3.44817 2.61011 3.67959 2.84154L13.1611 12.323C13.3925 12.5544 13.3925 12.9296 13.1611 13.1611C12.9296 13.3925 12.5544 13.3925 12.323 13.1611L2.84154 3.67959C2.61011 3.44817 2.61011 3.07296 2.84154 2.84154Z" fill="#808080" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1611 2.84154C13.3925 3.07296 13.3925 3.44817 13.1611 3.67959L3.67959 13.1611C3.44817 13.3925 3.07296 13.3925 2.84154 13.1611C2.61011 12.9296 2.61011 12.5544 2.84154 12.323L12.323 2.84154C12.5544 2.61011 12.9296 2.61011 13.1611 2.84154Z" fill="#808080" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="dtr-control">
                        <input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model" value="22">
                    </td>
                    <td>
                        <a href="http://localhost:8000/staff/staff-profile/22" class="staff-edit">
                            <div class="user-images">
                                <div><img src="http://localhost:8000/assets/admin/images/dummy/dummy-user.png" class="approve-user-img" alt=""></div>
                                <div>amitab bachchan<p class="data-sub-field">android devloper</p></div>
                            </div>
                        </a>
                    </td>
                    <td>20 April, 2023</td>
                    <td>09:00 AM</td>
                    <td>06:15 PM</td>
                    <td>
                        <div class="approve-main-sec">
                            <button class="atten-coming-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6882 3.98043C13.8835 4.17569 13.8835 4.49228 13.6882 4.68754L6.35486 12.0209C6.15959 12.2161 5.84301 12.2161 5.64775 12.0209L2.31442 8.68754C2.11915 8.49228 2.11915 8.17569 2.31442 7.98043C2.50968 7.78517 2.82626 7.78517 3.02152 7.98043L6.0013 10.9602L12.9811 3.98043C13.1763 3.78517 13.4929 3.78517 13.6882 3.98043Z" fill="#808080" />
                                </svg>
                            </button>
                            <button class="atten-coming-btn reject_danger_btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.84154 2.84154C3.07296 2.61011 3.44817 2.61011 3.67959 2.84154L13.1611 12.323C13.3925 12.5544 13.3925 12.9296 13.1611 13.1611C12.9296 13.3925 12.5544 13.3925 12.323 13.1611L2.84154 3.67959C2.61011 3.44817 2.61011 3.07296 2.84154 2.84154Z" fill="#FF5E5E" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1611 2.84154C13.3925 3.07296 13.3925 3.44817 13.1611 3.67959L3.67959 13.1611C3.44817 13.3925 3.07296 13.3925 2.84154 13.1611C2.61011 12.9296 2.61011 12.5544 2.84154 12.323L12.323 2.84154C12.5544 2.61011 12.9296 2.61011 13.1611 2.84154Z" fill="#FF5E5E" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="staff-profile-btn">
    <button type="submit" name="" id="approve_step2_btn" class="create-staff-btn staff-next-btn proxima_nova_semibold">Next
        <img class="loader" src="https://admin.hajri.app/assets/admin/images/white_loader.gif" alt="" style="display: none;">
    </button>
</div>
@endsection



