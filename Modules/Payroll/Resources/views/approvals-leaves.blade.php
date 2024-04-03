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
                        <h4 class="page-title pull-left proxima_nova_semibold">Approve leaves
                        </h4>
                    </div>
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li class="section_sub_title"><a href="#">Payroll</a></li>
                        <li class="section_sub_title">/ Approve</li>
                        <li class="section_sub_title">/  Approve Leaves</li>
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
                    <th>Applied Date</th>
                    <th>Leave Type</th>
                    <th>Start Date</th>
                    <th>End date</th>
                    <th>Duration</th>
                    <th>Status</th>
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
                    <td>Paid</td>
                    <td>22 April, 2023</td>
                    <td>23 April, 2023</td>
                    <td>1</td>
                    <td>In Progress</td>
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
                    <td>20 May, 2023</td>
                    <td>Without Paid</td>
                    <td>22 April, 2023</td>
                    <td>23 April, 2023</td>
                    <td>05</td>
                    <td>In Progress</td>
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



