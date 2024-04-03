<!-- @extends('admin.layout.main')
@section('title')
    <title>{{env('APP_NAME')}} | Approvals Review Details</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/dropzone.css')}}">
@endsection
@section('header-page')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="top-header-sub">
                <div class="breadcrumbs-area clearfix">
                    <div class="breadcrumbs-sub">
                    <div class="attendance-breadcrumbs" onclick="history.back()">
                    <a class="back_button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z" fill="#050E17"></path>
                        </svg></a>
                        <h4 class="page-title pull-left proxima_nova_semibold">Payroll Approvals List
                        </h4>
                    </div>
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li class="section_sub_title"><a href="#">Payroll</a></li>
                        <li class="section_sub_title">/ Approvals</li>
                        <li class="section_sub_title">/ list</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="payroll-approval-main">
        <div class="approval-form-muti-step">
            <div class="staff-view-profile" style="cursor:pointer" id="approval_info_form_data">
                <p id="step1" class="staff-personal-info proxima_nova_semibold staff-info-first">
                <span class="info-step step-1">1</span>Approval</p>
            </div>
            <div class="staff-view-profile" style="cursor:pointer" id="review_details_form_data">
                <p id="step2" class="staff-personal-info staff_info_active proxima_nova_semibold review-details-form-data">
                    <span class="info-step step-2 info_active">2</span>Review Details</p>
            </div>
            <div class="staff-view-profile" style="cursor:pointer" id="process_payroll_form_data">
                <p id="step3" class="staff-personal-info proxima_nova_semibold review-details-form-data">
                <span class="info-step step-3">3</span>Process Payroll</p>
            </div>
            <div class="staff-view-profile" style="cursor:pointer" id="download_reports_form_data">
                <p id="step4" class="staff-personal-info proxima_nova_semibold download-reports-form-data">
                <span class="info-step step-4">4</span>Download Reports</p>
            </div>
        </div>
    </div>
    <div class="payroll-approval-details">
        <div class="payroll-inner">
            <div>
                <svg width="20" height="20" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.21875 4.6875C4.21875 4.51491 4.35866 4.375 4.53125 4.375H5C5.17259 4.375 5.3125 4.51491 5.3125 4.6875V6.14583H5.46875C5.64134 6.14583 5.78125 6.28574 5.78125 6.45833C5.78125 6.63092 5.64134 6.77083 5.46875 6.77083H5C4.82741 6.77083 4.6875 6.63092 4.6875 6.45833V5H4.53125C4.35866 5 4.21875 4.86009 4.21875 4.6875Z" fill="#050E17"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.33333C0.9375 2.01015 2.01015 0.9375 3.33333 0.9375H6.66667C7.98985 0.9375 9.0625 2.01015 9.0625 3.33333V6.66667C9.0625 7.98985 7.98985 9.0625 6.66667 9.0625H3.33333C2.01015 9.0625 0.9375 7.98985 0.9375 6.66667V3.33333ZM3.33333 1.5625C2.35533 1.5625 1.5625 2.35533 1.5625 3.33333V6.66667C1.5625 7.64467 2.35533 8.4375 3.33333 8.4375H6.66667C7.64467 8.4375 8.4375 7.64467 8.4375 6.66667V3.33333C8.4375 2.35533 7.64467 1.5625 6.66667 1.5625H3.33333Z" fill="#050E17"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.64182 3.14411C4.47976 3.3069 4.4801 3.57021 4.64266 3.73257C4.80532 3.89503 5.06885 3.89494 5.23141 3.73239C5.39397 3.56983 5.39405 3.3063 5.23159 3.14364C5.06914 2.98098 4.80561 2.98073 4.64285 3.14309L4.64285 3.14309L4.64268 3.14326L4.64257 3.14336C4.64251 3.14343 4.64245 3.14349 4.64239 3.14355" fill="#050E17"/>
                </svg>
            </div>
            <div>
                <p>Please ensure all lens devices are synced and have an active internet connection.</p>
            </div>
        </div>
        <div class="payroll-inner">
            <div>
                <svg width="20" height="20" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.21875 4.6875C4.21875 4.51491 4.35866 4.375 4.53125 4.375H5C5.17259 4.375 5.3125 4.51491 5.3125 4.6875V6.14583H5.46875C5.64134 6.14583 5.78125 6.28574 5.78125 6.45833C5.78125 6.63092 5.64134 6.77083 5.46875 6.77083H5C4.82741 6.77083 4.6875 6.63092 4.6875 6.45833V5H4.53125C4.35866 5 4.21875 4.86009 4.21875 4.6875Z" fill="#050E17"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.33333C0.9375 2.01015 2.01015 0.9375 3.33333 0.9375H6.66667C7.98985 0.9375 9.0625 2.01015 9.0625 3.33333V6.66667C9.0625 7.98985 7.98985 9.0625 6.66667 9.0625H3.33333C2.01015 9.0625 0.9375 7.98985 0.9375 6.66667V3.33333ZM3.33333 1.5625C2.35533 1.5625 1.5625 2.35533 1.5625 3.33333V6.66667C1.5625 7.64467 2.35533 8.4375 3.33333 8.4375H6.66667C7.64467 8.4375 8.4375 7.64467 8.4375 6.66667V3.33333C8.4375 2.35533 7.64467 1.5625 6.66667 1.5625H3.33333Z" fill="#050E17"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.64182 3.14411C4.47976 3.3069 4.4801 3.57021 4.64266 3.73257C4.80532 3.89503 5.06885 3.89494 5.23141 3.73239C5.39397 3.56983 5.39405 3.3063 5.23159 3.14364C5.06914 2.98098 4.80561 2.98073 4.64285 3.14309L4.64285 3.14309L4.64268 3.14326L4.64257 3.14336C4.64251 3.14343 4.64245 3.14349 4.64239 3.14355" fill="#050E17"/>
                </svg>
            </div>
            <div>
                <p>To Prevent loss of punch-in\out records and ensure accurate payroll, we recommend a one-day buffer at the end of each cycle in case of shifts span over two calendar dates. <a href="#" class="learn-more-btn">Learn More</a></p>
            </div>
        </div>
        <div class="payroll-inner">
            <div>
                <svg width="20" height="20" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.21875 4.6875C4.21875 4.51491 4.35866 4.375 4.53125 4.375H5C5.17259 4.375 5.3125 4.51491 5.3125 4.6875V6.14583H5.46875C5.64134 6.14583 5.78125 6.28574 5.78125 6.45833C5.78125 6.63092 5.64134 6.77083 5.46875 6.77083H5C4.82741 6.77083 4.6875 6.63092 4.6875 6.45833V5H4.53125C4.35866 5 4.21875 4.86009 4.21875 4.6875Z" fill="#050E17"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.33333C0.9375 2.01015 2.01015 0.9375 3.33333 0.9375H6.66667C7.98985 0.9375 9.0625 2.01015 9.0625 3.33333V6.66667C9.0625 7.98985 7.98985 9.0625 6.66667 9.0625H3.33333C2.01015 9.0625 0.9375 7.98985 0.9375 6.66667V3.33333ZM3.33333 1.5625C2.35533 1.5625 1.5625 2.35533 1.5625 3.33333V6.66667C1.5625 7.64467 2.35533 8.4375 3.33333 8.4375H6.66667C7.64467 8.4375 8.4375 7.64467 8.4375 6.66667V3.33333C8.4375 2.35533 7.64467 1.5625 6.66667 1.5625H3.33333Z" fill="#050E17"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.64182 3.14411C4.47976 3.3069 4.4801 3.57021 4.64266 3.73257C4.80532 3.89503 5.06885 3.89494 5.23141 3.73239C5.39397 3.56983 5.39405 3.3063 5.23159 3.14364C5.06914 2.98098 4.80561 2.98073 4.64285 3.14309L4.64285 3.14309L4.64268 3.14326L4.64257 3.14336C4.64251 3.14343 4.64245 3.14349 4.64239 3.14355" fill="#050E17"/>
                </svg>
            </div>
            <div>
            </svg>If any attendance is not marked, it will be considered absent even when the “ Mark Attendance on Old Days” setting is enabled.</p>
            </div>
        </div>            
    </div> 
    <div class="approve-payroll-data">
        <table id="approve_datas" width="100%">
            <thead>
                <tr>
                    <th class="approve-title">Title</th>
                    <th>Info</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr class="payroll-datas">
                    <td>
                        <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.6667 16.4167V18.5833C19.6667 19.78 18.6966 20.75 17.5 20.75H3.41667C2.22005 20.75 1.25 19.78 1.25 18.5833V3.41667C1.25 2.22005 2.22005 1.25 3.41667 1.25H17.5C18.6966 1.25 19.6667 2.22005 19.6667 3.41667V5.58333" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.58398 6.66667H15.334" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.58398 11.0007H13.1674" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.58398 15.3327H15.334" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17.5 10.4583L19.125 12.0833L21.8333 9.375" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Attendance Review
                    </td>
                    <td>10 Pending To Review</td>
                    <td>In Progress</td>
                    <td>
                        <a href="#">
                            <button type="button" style="border: none; background: none; padding: 0; margin: 0;">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00208 16.3436C5.6217 15.9632 5.6217 15.3465 6.00208 14.9661L10.5081 10.4601L6.00208 5.95401C5.6217 5.57363 5.6217 4.95691 6.00208 4.57653C6.38246 4.19615 6.99918 4.19615 7.37956 4.57653L12.5744 9.77133C12.9547 10.1517 12.9547 10.7684 12.5744 11.1488L7.37956 16.3436C6.99918 16.724 6.38246 16.724 6.00208 16.3436Z" fill="#050E17"/>
                                </svg>
                            </button>
                        </a>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr class="payroll-datas">
                    <td>
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="18.1458" cy="12.1868" r="3.52083" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M22.7496 16.2496L20.8906 14.3906" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21.6667 19.5V20.5833C21.6667 21.78 20.6966 22.75 19.5 22.75H5.41667C4.22005 22.75 3.25 21.78 3.25 20.5833V5.41667C3.25 4.22005 4.22005 3.25 5.41667 3.25H19.5C20.6966 3.25 21.6667 4.22005 21.6667 5.41667V6.5" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.58398 13.0007H10.834" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.58398 17.3327H13.0007" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.58398 8.66667H11.9173" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        Total Pay Review
                    </td>
                    <td>No Pending Approval</td>
                    <td>Approved</td>
                    <td>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00208 16.3436C5.6217 15.9632 5.6217 15.3465 6.00208 14.9661L10.5081 10.4601L6.00208 5.95401C5.6217 5.57363 5.6217 4.95691 6.00208 4.57653C6.38246 4.19615 6.99918 4.19615 7.37956 4.57653L12.5744 9.77133C12.9547 10.1517 12.9547 10.7684 12.5744 11.1488L7.37956 16.3436C6.99918 16.724 6.38246 16.724 6.00208 16.3436Z" fill="#050E17"/>
                        </svg>
                    </td>
                </tr>
            </tbody>
        </table>
        
    </div>
    <div class="staff-profile-btn">
        <button type="submit" name="" id="approve_step2_btn" class="create-staff-btn staff-next-btn proxima_nova_semibold">Review Attendance
            <img class="loader" src="https://admin.hajri.app/assets/admin/images/white_loader.gif" alt="" style="display: none;">
        </button>
    </div>
@endsection -->
