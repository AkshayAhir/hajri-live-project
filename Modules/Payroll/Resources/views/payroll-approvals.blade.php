@extends('admin.layout.main')
@section('title')
    <title>{{env('APP_NAME')}} | Payroll Approvals List</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/dropzone.css')}}">
@endsection
@section('header-page')
    <div class="page-title-area payroll-approvals payroll-approval active">
        <div class="row align-items-center">
            <div class="top-header-sub">
                <div class="breadcrumbs-area clearfix">
                    <div class="breadcrumbs-sub">
                    <div class="attendance-breadcrumbs approval-visit-btn active" id="back-button-1">
                    <a onclick="history.back()" class="back_button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z" fill="#050E17"></path>
                        </svg></a>
                        <h4 class="page-title pull-left proxima_nova_semibold">Payroll Approvals List</h4>
                    </div>
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li class="section_sub_title"><a href="{{route('payroll')}}">Payroll</a></li>
                        <li class="section_sub_title">/ Approvals</li>
                        <li class="section_sub_title">/ list</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="page-title-area payroll-approvals approval-back">
        <div class="row align-items-center">
            <div class="top-header-sub">
                <div class="breadcrumbs-area clearfix">
                    <div class="breadcrumbs-sub">
                    <div class="attendance-breadcrumbs approval-visit-btn active" id="back-button-1">
                    <a class="back_button approval-back-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z" fill="#050E17"></path>
                        </svg></a>
                        <h4 class="page-title pull-left proxima_nova_semibold">Payroll Approvals List</h4>
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

    <div class="page-title-area payroll-approvals reviews">
        <div class="row align-items-center">
            <div class="top-header-sub">
                <div class="breadcrumbs-area clearfix">
                    <div class="breadcrumbs-sub">
                        <div class="attendance-breadcrumbs" id="redirect-back" >
                            <a class="back_button review-back-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z" fill="#050E17"></path>
                            </svg>
                            </a>
                            <h4 class="page-title pull-left proxima_nova_semibold">Reviews
                            </h4>
                        </div>
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li class="section_sub_title"><a href="#">Payroll</a></li>
                        <li class="section_sub_title">/ Process Payrol</li>
                        <li class="section_sub_title">/ Reviews</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="page-title-area payroll-approvals download-reports">
        <div class="row align-items-center">
            <div class="top-header-sub">
                <div class="breadcrumbs-area clearfix">
                    <div class="breadcrumbs-sub">
                    <div class="attendance-breadcrumbs" id="back-button-2">
                    <a class="back_button download-back-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z" fill="#050E17"></path>
                        </svg></a>
                        <h4 class="page-title pull-left proxima_nova_semibold">Download Reports
                        </h4>
                    </div>
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li class="section_sub_title"><a href="#">Payroll</a></li>
                        <li class="section_sub_title">/ Process Payroll</li>
                        <li class="section_sub_title">/ Download Reports</li>
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
                <p id="step1" class="staff-personal-info staff_info_active proxima_nova_semibold staff-info-first">
                <span class="info-step step1-number step-1 info_active">1</span>
                    <svg class="info-step visit-list step1-check" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 7L8.8125 13L6 10.2727" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                Approval</p>
            </div>
            <div class="staff-view-profile" style="cursor:pointer" id="review_details_form_data">
                <p id="step2" class="staff-personal-info proxima_nova_semibold review-details-form-data">
                <span class="info-step step2-number step-2">2</span>
                <svg class="info-step visit-list step2-check" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 7L8.8125 13L6 10.2727" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Review Details</p>
            </div>
            <div class="staff-view-profile" style="cursor:pointer" id="process_payroll_form_data">
                <p id="step3" class="staff-personal-info proxima_nova_semibold review-details-form-data">
                <span class="info-step step3-number step-3">3</span>
                <svg class="info-step visit-list step3-check" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 7L8.8125 13L6 10.2727" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Process Payroll</p>
            </div>
            <div class="staff-view-profile" style="cursor:pointer" id="download_reports_form_data">
                <p id="step4" class="staff-personal-info proxima_nova_semibold download-reports-form-data">
                <span class="info-step step4-number step-4">4</span>
                <svg class="info-step visit-list step4-check" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 7L8.8125 13L6 10.2727" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Download Reports</p>
            </div>
        </div>
    </div>
    <div class="profile-step step1 active" id="profile-step">
        <div class="inner-payroll-details" id="inner-payroll-details" >
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
                                <svg class="payroll-datas-svg" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.66716 19.3325C5.87849 18.1365 5.41699 16.7054 5.41699 15.166" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10.7139 7.46402C11.3509 6.97869 12.1363 6.67969 12.9997 6.67969C15.0938 6.67969 16.7914 8.37727 16.7914 10.4714" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9.20801 15.5273C9.20801 17.6214 10.9056 19.319 12.9997 19.319C13.862 19.319 14.6474 19.02 15.2855 18.5347" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9.20866 11.1914V15.5247" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.9997 10.834V15.1673" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.7917 10.4766V14.8099" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13.0003 3.25C8.81216 3.25 5.41699 6.64517 5.41699 10.8333" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13.0004 22.7506C11.7437 22.7506 10.5618 22.4397 9.51855 21.8991" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M19.333 6.66602C20.1217 7.86202 20.5832 9.2931 20.5832 10.8325" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13 22.7493C17.1882 22.7493 20.5833 19.3542 20.5833 15.166" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13 3.25068C14.2567 3.25068 15.4386 3.5616 16.4818 4.10218" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Approve Punches
                            </td>
                            <td>No Pending Approval</td>
                            <td>Approved</td>
                            <td>
                                <!-- <a href="{{ route('approval-punches') }}"> -->
                                <a href="#">
                                    <button type="button" style="border: none; background: none; padding: 0; margin: 0;">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00208 16.3436C5.6217 15.9632 5.6217 15.3465 6.00208 14.9661L10.5081 10.4601L6.00208 5.95401C5.6217 5.57363 5.6217 4.95691 6.00208 4.57653C6.38246 4.19615 6.99918 4.19615 7.37956 4.57653L12.5744 9.77133C12.9547 10.1517 12.9547 10.7684 12.5744 11.1488L7.37956 16.3436C6.99918 16.724 6.38246 16.724 6.00208 16.3436Z" fill="#050E17"/>
                                        </svg>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr class="payroll-datas">
                            <td>
                                <svg class="payroll-datas-svg" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.9997" cy="14.0827" rx="8.66667" ry="8.66667" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10.833 2.16667H15.1663" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M22.7497 6.50065L20.583 4.33398L21.6663 5.41732" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.9997 16.2493V11.916" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.9997 16.2493V11.916" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15.1663 14.0827H10.833" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M21.6663 5.41602L19.1279 7.95442" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Approve Overtime
                            </td>
                            <td>No Pending Approval</td>
                            <td>Approved</td>
                            <td>
                                <!-- <a href="{{ route('approval-overtime') }}"> -->
                                <a href="#">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00208 16.3436C5.6217 15.9632 5.6217 15.3465 6.00208 14.9661L10.5081 10.4601L6.00208 5.95401C5.6217 5.57363 5.6217 4.95691 6.00208 4.57653C6.38246 4.19615 6.99918 4.19615 7.37956 4.57653L12.5744 9.77133C12.9547 10.1517 12.9547 10.7684 12.5744 11.1488L7.37956 16.3436C6.99918 16.724 6.38246 16.724 6.00208 16.3436Z" fill="#050E17"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        <tr class="payroll-datas">
                            <td>
                                <svg class="payroll-datas-svg" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.43262 8.1211C2.43262 5.87744 4.25146 4.05859 6.49512 4.05859H19.5032C21.7469 4.05859 23.5657 5.87744 23.5657 8.12109V19.5035C23.5657 21.7472 21.7469 23.566 19.5032 23.566H6.49512C4.25146 23.566 2.43262 21.7472 2.43262 19.5035V8.1211ZM6.49512 5.68359C5.14892 5.68359 4.05762 6.7749 4.05762 8.1211V19.5035C4.05762 20.8497 5.14892 21.941 6.49512 21.941H19.5032C20.8494 21.941 21.9407 20.8497 21.9407 19.5035V8.12109C21.9407 6.7749 20.8494 5.68359 19.5032 5.68359H6.49512Z" fill="#2F8CFF"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.12207 2.43359C8.5708 2.43359 8.93457 2.79736 8.93457 3.24609V6.49745C8.93457 6.94618 8.5708 7.30995 8.12207 7.30995C7.67334 7.30995 7.30957 6.94618 7.30957 6.49745V3.24609C7.30957 2.79736 7.67334 2.43359 8.12207 2.43359Z" fill="#2F8CFF"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.877 2.43359C18.3257 2.43359 18.6895 2.79736 18.6895 3.24609V6.49745C18.6895 6.94618 18.3257 7.30995 17.877 7.30995C17.4282 7.30995 17.0645 6.94618 17.0645 6.49745V3.24609C17.0645 2.79736 17.4282 2.43359 17.877 2.43359Z" fill="#2F8CFF"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.49902 15.9805C6.49902 15.5317 6.86279 15.168 7.31152 15.168H18.1494C18.5981 15.168 18.9619 15.5317 18.9619 15.9805C18.9619 16.4292 18.5981 16.793 18.1494 16.793H7.31152C6.86279 16.793 6.49902 16.4292 6.49902 15.9805Z" fill="#2F8CFF"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.24902 9.48047C3.24902 9.03174 3.61279 8.66797 4.06152 8.66797H22.4827C22.9314 8.66797 23.2952 9.03174 23.2952 9.48047C23.2952 9.9292 22.9314 10.293 22.4827 10.293H4.06152C3.61279 10.293 3.24902 9.9292 3.24902 9.48047Z" fill="#2F8CFF"/>
                                </svg>
                                Approve Leaves
                            </td>
                            <td>No Pending Approval</td>
                            <td>Approved</td>
                            <td>
                                <!-- <a href="{{ route('approval-leaves') }}"> -->
                                <a href="#">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00208 16.3436C5.6217 15.9632 5.6217 15.3465 6.00208 14.9661L10.5081 10.4601L6.00208 5.95401C5.6217 5.57363 5.6217 4.95691 6.00208 4.57653C6.38246 4.19615 6.99918 4.19615 7.37956 4.57653L12.5744 9.77133C12.9547 10.1517 12.9547 10.7684 12.5744 11.1488L7.37956 16.3436C6.99918 16.724 6.38246 16.724 6.00208 16.3436Z" fill="#050E17"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> 
        </div>
        <div class="staff-profile-btn">
            <button type="submit" name="" id="approve_btn" class="create-staff-btn staff-next-btn proxima_nova_semibold">Review Attendance
                <img class="loader" src="https://admin.hajri.app/assets/admin/images/white_loader.gif" alt="" style="display: none;">
            </button>
        </div>
    </div>

    <div class="profile-step step2" id="profile-step">
        <div class="inner-payroll-details" id="inner-payroll-details" >
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
                                <svg class="payroll-datas-svg" width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                <a href="{{ route('payroll-reviewdetail') }}">
                                    <button type="button" style="border: none; background: none; padding: 0; margin: 0;">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00208 16.3436C5.6217 15.9632 5.6217 15.3465 6.00208 14.9661L10.5081 10.4601L6.00208 5.95401C5.6217 5.57363 5.6217 4.95691 6.00208 4.57653C6.38246 4.19615 6.99918 4.19615 7.37956 4.57653L12.5744 9.77133C12.9547 10.1517 12.9547 10.7684 12.5744 11.1488L7.37956 16.3436C6.99918 16.724 6.38246 16.724 6.00208 16.3436Z" fill="#050E17"/>
                                        </svg>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr class="payroll-datas">
                            <td>
                                <svg class="payroll-datas-svg" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="18.1458" cy="12.1868" r="3.52083" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M22.7496 16.2496L20.8906 14.3906" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M21.6667 19.5V20.5833C21.6667 21.78 20.6966 22.75 19.5 22.75H5.41667C4.22005 22.75 3.25 21.78 3.25 20.5833V5.41667C3.25 4.22005 4.22005 3.25 5.41667 3.25H19.5C20.6966 3.25 21.6667 4.22005 21.6667 5.41667V6.5" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7.58398 13.0007H10.834" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7.58398 17.3327H13.0007" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7.58398 8.66667H11.9173" stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>Total Pay Review
                            </td>
                            <td>No Pending Approval</td>
                            <td>Approved</td>
                            <td>
                                <a href="{{ route('payroll-totalpay') }}">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00208 16.3436C5.6217 15.9632 5.6217 15.3465 6.00208 14.9661L10.5081 10.4601L6.00208 5.95401C5.6217 5.57363 5.6217 4.95691 6.00208 4.57653C6.38246 4.19615 6.99918 4.19615 7.37956 4.57653L12.5744 9.77133C12.9547 10.1517 12.9547 10.7684 12.5744 11.1488L7.37956 16.3436C6.99918 16.724 6.38246 16.724 6.00208 16.3436Z" fill="#050E17"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
        <div class="staff-profile-btn">
            <button type="submit" name="" id="review_btn" class="create-staff-btn staff-next-btn proxima_nova_semibold">Process Payroll
                <img class="loader" src="https://admin.hajri.app/assets/admin/images/white_loader.gif" alt="" style="display: none;">
            </button>
        </div>
    </div>

    <div class="profile-step step3" id="profile-step">
        <div class="payroll-approval-review">
            <p class="proxima_nova_semibold holiday-staff-list-day">Payroll Review
                <span class="holiday-policy-count proxima_nova_bold">({{$staff_count}} Employees)</span>
            </p>
            <row>
                <div class="row">
                    <div class="col-6">
                        <div class="main-payroll-sec">
                           <!-- <div class="shifts-data">
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
                            </div> -->
                            <form action="" method="">
                                <input class="input-search-rounded" type="text" id="staff_data_find" placeholder="Search">
                            </form>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end icon-with-svg">
                            <svg  data-bs-toggle="offcanvas"  data-bs-target="#payroll-toggle-model" width="24" class="payroll-data-svg" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.9922 3H16.9971" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.043 6H21.0009" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21 13H12" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21.0009 10H12.043" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21.0009 20H12.0195" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="5" cy="19" r="2" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.0664 17H17.0478" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="5" cy="5" r="2" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M5 7V8.5" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.10156 10.5L5.10156 12.5" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M3.89844 11.3008L5.09844 12.5008" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M5 17V15.5" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                </div> 
            </row>
            <div class="approve-payroll-data">
                <table id="staff_datas" class="process-payroll-datas display dataTable no-footer dtr-inline" style="width: 100%;">
                    <thead>
                        <tr>
                            <th class="data_list_check"><input type="checkbox" id="selectAllCheckboxProcess"></th> <!-- Checkbox Column -->
                            <th>Name</th>
                            <th>Staff Id</th>
                            <th>Mobile Number</th>
                            <th>Net Pay</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="staff-profile-btn">
            <button type="submit" name="" id="process_btn" class="create-staff-btn staff-next-btn proxima_nova_semibold">Freeze Payroll
                <img class="loader" src="https://admin.hajri.app/assets/admin/images/white_loader.gif" alt="" style="display: none;">
            </button>
        </div>
    </div>

    <div class="profile-step step4" id="profile-step">
        <div class="payroll-approval-review">
            <p class="proxima_nova_semibold holiday-staff-list-day">Payroll Reports
                <span class="holiday-policy-count proxima_nova_bold">(<span class="holiday-policy-count proxima_nova_bold" id="staff_count">0</span> Staff)</span>
            </p>
            <div class="approve-payroll-data">
                <table id="staff_datas" class="download-payroll-datas display dataTable no-footer dtr-inline" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Staff Payment Type</th>
                            <th>Report Cycle</th>
                            <th>Report Type</th>
                            <th>Generated On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
{{--                        <tr class="odd">--}}
{{--                            <td class="dtr-control">--}}
{{--                                <input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model" value="22">--}}
{{--                            </td>--}}
{{--                            <td>Non Weekly Staff</td>--}}
{{--                            <td>Feb, 2023</td>--}}
{{--                            <td>Half Page</td>--}}
{{--                            <td>02 April,2023 | 6:51 PM</td>--}}
{{--                            <td>--}}
{{--                                <svg width="24" height="24" class="download-pdf-btn" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0009 3C12.3833 3 12.6932 3.30996 12.6932 3.69231V16.6154C12.6932 16.9977 12.3833 17.3077 12.0009 17.3077C11.6186 17.3077 11.3086 16.9977 11.3086 16.6154V3.69231C11.3086 3.30996 11.6186 3 12.0009 3Z" fill="#808080"/>--}}
{{--                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.69231 15.9238C4.07466 15.9238 4.38462 16.2338 4.38462 16.6161C4.38462 18.2729 5.72789 19.6161 7.38462 19.6161H16.6154C18.2721 19.6161 19.6154 18.2729 19.6154 16.6161C19.6154 16.2338 19.9253 15.9238 20.3077 15.9238C20.69 15.9238 21 16.2338 21 16.6161C21 19.0376 19.0368 21.0008 16.6154 21.0008H7.38462C4.96319 21.0008 3 19.0376 3 16.6161C3 16.2338 3.30996 15.9238 3.69231 15.9238Z" fill="#808080"/>--}}
{{--                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.89423 11.5113C7.16462 11.241 7.60296 11.241 7.8733 11.5114L11.9991 15.6381L16.1259 11.5114C16.3962 11.241 16.8346 11.241 17.1049 11.5114C17.3753 11.7817 17.3753 12.2201 17.1049 12.4904L12.4886 17.1067C12.3588 17.2366 12.1827 17.3095 11.9991 17.3095C11.8154 17.3095 11.6393 17.2366 11.5095 17.1067L6.89413 12.4904C6.62379 12.22 6.62384 11.7817 6.89423 11.5113Z" fill="#808080"/>--}}
{{--                                </svg>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="payroll-toggle-model"
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
                </svg>
            </div>
        </div>
        <div class="offcanvas-body overflow-auto">
            <h5 class="section_title_heading proxima_nova_bold download-work-main-header filter-title-main">Add Or Remove
                Columns
            </h5>
            <p>
                <svg width="118" height="11" viewBox="0 0 118 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.932 8H0.936V-0.00400066H4.152C5.76 -0.00400066 6.66 1.1 6.66 2.408C6.66 3.716 5.736 4.82 4.152 4.82H1.932V8ZM4.032 3.932C4.98 3.932 5.628 3.308 5.628 2.408C5.628 1.508 4.98 0.883999 4.032 0.883999H1.932V3.932H4.032ZM8.84297 8H7.94297V2.204H8.84297V3.14C9.31097 2.528 9.98297 2.084 10.775 2.084V3.008C10.667 2.984 10.559 2.972 10.415 2.972C9.86297 2.972 9.10697 3.428 8.84297 3.896V8ZM14.4359 8.144C12.6719 8.144 11.5679 6.776 11.5679 5.096C11.5679 3.416 12.6719 2.06 14.4359 2.06C16.1999 2.06 17.3039 3.416 17.3039 5.096C17.3039 6.776 16.1999 8.144 14.4359 8.144ZM14.4359 7.34C15.6719 7.34 16.3559 6.284 16.3559 5.096C16.3559 3.92 15.6719 2.864 14.4359 2.864C13.1999 2.864 12.5039 3.92 12.5039 5.096C12.5039 6.284 13.1999 7.34 14.4359 7.34ZM21.3271 8.144C19.5991 8.144 18.4351 6.824 18.4351 5.096C18.4351 3.38 19.5991 2.06 21.3271 2.06C22.3831 2.06 23.0071 2.492 23.4511 3.068L22.8511 3.62C22.4671 3.092 21.9751 2.864 21.3751 2.864C20.1391 2.864 19.3711 3.812 19.3711 5.096C19.3711 6.38 20.1391 7.34 21.3751 7.34C21.9751 7.34 22.4671 7.1 22.8511 6.584L23.4511 7.136C23.0071 7.712 22.3831 8.144 21.3271 8.144ZM27.3285 8.144C25.6125 8.144 24.3765 6.908 24.3765 5.096C24.3765 3.416 25.5765 2.06 27.2325 2.06C28.9845 2.06 30.0165 3.428 30.0165 5.168V5.396H25.3245C25.3965 6.488 26.1645 7.4 27.4125 7.4C28.0725 7.4 28.7445 7.136 29.2005 6.668L29.6325 7.256C29.0565 7.832 28.2765 8.144 27.3285 8.144ZM29.1285 4.736C29.1165 3.872 28.5405 2.804 27.2205 2.804C25.9845 2.804 25.3725 3.848 25.3245 4.736H29.1285ZM33.3102 8.144C32.3622 8.144 31.5582 7.856 30.9702 7.232L31.4382 6.584C31.8222 7.028 32.5542 7.412 33.3462 7.412C34.2342 7.412 34.7142 6.992 34.7142 6.416C34.7142 5.012 31.1262 5.876 31.1262 3.728C31.1262 2.828 31.9062 2.06 33.2862 2.06C34.2702 2.06 34.9662 2.432 35.4342 2.9L35.0142 3.524C34.6662 3.104 34.0302 2.792 33.2862 2.792C32.4942 2.792 32.0022 3.188 32.0022 3.704C32.0022 4.976 35.5902 4.136 35.5902 6.392C35.5902 7.364 34.8102 8.144 33.3102 8.144ZM38.8883 8.144C37.9403 8.144 37.1363 7.856 36.5483 7.232L37.0163 6.584C37.4003 7.028 38.1323 7.412 38.9243 7.412C39.8123 7.412 40.2923 6.992 40.2923 6.416C40.2923 5.012 36.7043 5.876 36.7043 3.728C36.7043 2.828 37.4843 2.06 38.8643 2.06C39.8483 2.06 40.5443 2.432 41.0123 2.9L40.5923 3.524C40.2443 3.104 39.6083 2.792 38.8643 2.792C38.0723 2.792 37.5803 3.188 37.5803 3.704C37.5803 4.976 41.1683 4.136 41.1683 6.392C41.1683 7.364 40.3883 8.144 38.8883 8.144ZM46.7562 8H45.7602V-0.00400066H48.9762C50.5842 -0.00400066 51.4842 1.1 51.4842 2.408C51.4842 3.716 50.5602 4.82 48.9762 4.82H46.7562V8ZM48.8562 3.932C49.8042 3.932 50.4522 3.308 50.4522 2.408C50.4522 1.508 49.8042 0.883999 48.8562 0.883999H46.7562V3.932H48.8562ZM57.0568 8H56.1568V7.34C55.6768 7.868 55.0168 8.144 54.2368 8.144C53.2528 8.144 52.2088 7.484 52.2088 6.224C52.2088 4.928 53.2528 4.316 54.2368 4.316C55.0288 4.316 55.6888 4.568 56.1568 5.108V4.064C56.1568 3.284 55.5328 2.84 54.6928 2.84C53.9968 2.84 53.4328 3.092 52.9168 3.644L52.4968 3.02C53.1208 2.372 53.8648 2.06 54.8128 2.06C56.0368 2.06 57.0568 2.612 57.0568 4.016V8ZM54.5608 7.496C55.1968 7.496 55.8088 7.256 56.1568 6.776V5.684C55.8088 5.204 55.1968 4.964 54.5608 4.964C53.7208 4.964 53.1328 5.492 53.1328 6.236C53.1328 6.968 53.7208 7.496 54.5608 7.496ZM58.5369 10.268L58.6809 9.452C58.8129 9.512 59.0289 9.548 59.1729 9.548C59.5689 9.548 59.8329 9.416 60.0369 8.936L60.4209 8.06L57.9969 2.204H58.9689L60.9009 6.956L62.8209 2.204H63.8049L60.9009 9.176C60.5529 10.016 59.9649 10.34 59.1969 10.352C59.0049 10.352 58.7049 10.316 58.5369 10.268ZM65.6438 8H64.7438V2.204H65.6438V3.14C66.1118 2.528 66.7838 2.084 67.5758 2.084V3.008C67.4678 2.984 67.3598 2.972 67.2158 2.972C66.6638 2.972 65.9078 3.428 65.6438 3.896V8ZM71.2367 8.144C69.4727 8.144 68.3687 6.776 68.3687 5.096C68.3687 3.416 69.4727 2.06 71.2367 2.06C73.0007 2.06 74.1047 3.416 74.1047 5.096C74.1047 6.776 73.0007 8.144 71.2367 8.144ZM71.2367 7.34C72.4727 7.34 73.1567 6.284 73.1567 5.096C73.1567 3.92 72.4727 2.864 71.2367 2.864C70.0007 2.864 69.3047 3.92 69.3047 5.096C69.3047 6.284 70.0007 7.34 71.2367 7.34ZM76.4719 8H75.5719V-0.00400066H76.4719V8ZM79.1672 8H78.2672V-0.00400066H79.1672V8ZM89.9003 8H88.7243L86.6842 4.82H85.0883V8H84.0923V-0.00400066H87.3083C88.7723 -0.00400066 89.8163 0.931999 89.8163 2.408C89.8163 3.848 88.8323 4.64 87.7403 4.736L89.9003 8ZM87.1883 3.944C88.1363 3.944 88.7843 3.308 88.7843 2.408C88.7843 1.508 88.1363 0.883999 87.1883 0.883999H85.0883V3.944H87.1883ZM93.6098 8.144C91.8938 8.144 90.6578 6.908 90.6578 5.096C90.6578 3.416 91.8577 2.06 93.5138 2.06C95.2658 2.06 96.2978 3.428 96.2978 5.168V5.396H91.6058C91.6777 6.488 92.4458 7.4 93.6938 7.4C94.3538 7.4 95.0258 7.136 95.4818 6.668L95.9138 7.256C95.3378 7.832 94.5578 8.144 93.6098 8.144ZM95.4098 4.736C95.3978 3.872 94.8218 2.804 93.5018 2.804C92.2658 2.804 91.6538 3.848 91.6058 4.736H95.4098ZM100.611 8.144C99.8195 8.144 99.1235 7.772 98.6555 7.124V10.208H97.7555V2.204H98.6555V3.068C99.0755 2.48 99.7955 2.06 100.611 2.06C102.135 2.06 103.191 3.212 103.191 5.096C103.191 6.968 102.135 8.144 100.611 8.144ZM100.383 7.34C101.547 7.34 102.243 6.38 102.243 5.096C102.243 3.812 101.547 2.864 100.383 2.864C99.6755 2.864 98.9675 3.284 98.6555 3.788V6.404C98.9675 6.908 99.6755 7.34 100.383 7.34ZM107.155 8.144C105.391 8.144 104.287 6.776 104.287 5.096C104.287 3.416 105.391 2.06 107.155 2.06C108.919 2.06 110.023 3.416 110.023 5.096C110.023 6.776 108.919 8.144 107.155 8.144ZM107.155 7.34C108.391 7.34 109.075 6.284 109.075 5.096C109.075 3.92 108.391 2.864 107.155 2.864C105.919 2.864 105.223 3.92 105.223 5.096C105.223 6.284 105.919 7.34 107.155 7.34ZM112.39 8H111.49V2.204H112.39V3.14C112.858 2.528 113.53 2.084 114.322 2.084V3.008C114.214 2.984 114.106 2.972 113.962 2.972C113.41 2.972 112.654 3.428 112.39 3.896V8ZM116.915 8.144C116.063 8.144 115.631 7.652 115.631 6.788V2.996H114.671V2.204H115.631V0.62H116.531V2.204H117.707V2.996H116.531V6.596C116.531 7.028 116.723 7.34 117.119 7.34C117.371 7.34 117.611 7.232 117.731 7.1L117.995 7.772C117.767 7.988 117.443 8.144 116.915 8.144Z" fill="#808080"/>
                </svg>
            </p>
            <hr>
            <div class="add-remove-colum">
                <div class="inner-div">
                    <input type="checkbox" id="serial_no" name="serial_no" value="serial_no">
                    <label class="checkbox-label" for="serial_no">Serial No</label>
                </div>
                <div class="inner-div">
                    <input type="checkbox" id="staff_name" name="staff_name" value="staff_name">
                    <label class="checkbox-label" for="staff_name">Staff Name</label>
                </div>
                <div class="inner-div">
                    <input type="checkbox" id="staff_phone" name="staff_phone" value="staff_phone">
                    <label class="checkbox-label" for="staff_phone">Staff Phone</label>
                </div>
                <div class="inner-div">
                    <input type="checkbox" id="date_of_joining" name="date_of_joining" value="date_of_joining">
                    <label class="checkbox-label" for="date_of_joining">Date Of Joining</label>
                </div>
                <div class="inner-div">
                    <input type="checkbox" id="gender" name="gender" value="gender">
                    <label class="checkbox-label" for="gender">Gender</label>
                </div>
                <div class="inner-div">
                    <input type="checkbox" id="staff_id" name="staff_id" value="staff_id">
                    <label class="checkbox-label" for="staff_id">Staff Id</label>
                </div>
                <div class="inner-div">
                    <input type="checkbox" id="date_of_birth" name="date_of_birth" value="date_of_birth">
                    <label class="checkbox-label" for="date_of_birth">Date Of Birth</label>
                </div>
                <div class="inner-div">
                    <input type="checkbox" id="designation" name="designation" value="designation">
                    <label class="checkbox-label" for="designation">Designation</label>
                </div>
                <div class="inner-div">
                    <input type="checkbox" id="department" name="department" value="department">
                    <label class="checkbox-label" for="department">Department</label>
                </div>
                <div class="inner-div">
                    <input type="checkbox" id="uan_Number" name="uan_Number" value="uan_Number">
                    <label class="checkbox-label" for="uan_Number">Uan Number</label>
                </div>
                <div class="inner-div">
                    <input type="checkbox" id="esi_number" name="esi_number" value="esi_number">
                    <label class="checkbox-label" for="esi_number">Esi Number</label>
                </div>
                <div  class="inner-div">
                    <input type="checkbox" id="address_line_1" name="address_line_1" value="address_line_1">
                    <label class="checkbox-label" for="address_line_1">Address Line 1</label>
                </div>
                <div  class="inner-div">
                    <input type="checkbox" id="address_line_2" name="address_line_2" value="address_line_2">
                    <label class="checkbox-label" for="address_line_2">Address Line 2</label>
                </div>
                <div  class="inner-div">
                    <input type="checkbox" id="address_city" name="address_city" value="address_city">
                    <label class="checkbox-label" for="address_city">Address City</label>
                </div>
                <div  class="inner-div">
                    <input type="checkbox" id="address_state" name="address_state" value="address_state">
                    <label class="checkbox-label" for="address_state">Address State</label>
                </div>
                <div  class="inner-div">
                    <input type="checkbox" id="address_Pincode" name="address_Pincode" value="address_Pincode">
                    <label class="checkbox-label" for="address_Pincode">Address Pincode</label>
                </div>
            </div>
            <button type="submit" name="" id="add_apply_btn"
                class="download-btn apply-details-list w-100">Apply
                <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
            </button>
        <!-- <div class="filter-sub-sec">
                <form id="add_department" method="post">
                    @csrf
                <div class="download-cancel-btns-main">
                    <div class="download-cancel-btn mb-0">
                        <button type="submit" name="" id="add_apply_btn"
                            class="download-btn proxima_nova_semibold w-100">Apply
                            <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                            </button>
                        </div>
                    </div>
                </form>
            </div> -->
        </div>
    </div>

    <div id="myModal" class="modal check-model">
        <div class="model-section">
            <div class="model_left_side">
                <div class="selected_check_member proxima_nova_semibold">
                    1
                </div>
            </div>
            <div class="model_right_side">
                <div class="member_div proxima_nova_semibold">Members Selected</div>
                <div class="export_div">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="2.25" y="2.25" width="13.5" height="13.5" rx="2" stroke="#808080" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.75 2.25V15.75" stroke="#808080" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round" />
                        <path d="M15.75 6.75H6.75" stroke="#808080" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round" />
                        <path d="M15.75 11.25H6.75" stroke="#808080" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round" />
                    </svg>
                    <p>Export</p>
                </div>
                <div class="delete_div">
                    <a href="javascript:(void);"  data-bs-toggle="offcanvas" data-bs-target="#deleteModal" aria-controls="deleteModal">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M5.24805 6.7489C5.24805 6.33469 4.91226 5.9989 4.49805 5.9989C4.08383 5.9989 3.74805 6.33469 3.74805 6.7489H5.24805ZM14.2518 6.7489C14.2518 6.33469 13.916 5.9989 13.5018 5.9989C13.0876 5.9989 12.7518 6.33469 12.7518 6.7489H14.2518ZM11.251 7.49926C11.251 7.08505 10.9152 6.74926 10.501 6.74926C10.0868 6.74926 9.75101 7.08505 9.75101 7.49926H11.251ZM9.75101 12.7514C9.75101 13.1657 10.0868 13.5014 10.501 13.5014C10.9152 13.5014 11.251 13.1657 11.251 12.7514H9.75101ZM8.25016 7.49927C8.25016 7.08505 7.91437 6.74927 7.50016 6.74927C7.08594 6.74927 6.75016 7.08505 6.75016 7.49927H8.25016ZM6.75016 12.7515C6.75016 13.1657 7.08594 13.5015 7.50016 13.5015C7.91437 13.5015 8.25016 13.1657 8.25016 12.7515H6.75016ZM3.37305 3.74801C2.95883 3.74801 2.62305 4.0838 2.62305 4.49801C2.62305 4.91222 2.95883 5.24801 3.37305 5.24801V3.74801ZM14.6277 5.24801C15.0419 5.24801 15.3777 4.91222 15.3777 4.49801C15.3777 4.0838 15.0419 3.74801 14.6277 3.74801V5.24801ZM5.28763 4.26084C5.15664 4.6538 5.36901 5.07854 5.76197 5.20952C6.15493 5.34051 6.57967 5.12814 6.71065 4.73518L5.28763 4.26084ZM6.40731 3.2735L7.11882 3.51067L7.11888 3.5105L6.40731 3.2735ZM7.8314 2.24707L7.83122 2.99707H7.8314V2.24707ZM10.1694 2.24707V2.99707L10.1703 2.99707L10.1694 2.24707ZM11.595 3.2735L12.3067 3.03711L12.3065 3.0365L11.595 3.2735ZM11.2899 4.73439C11.4204 5.1275 11.8449 5.34033 12.238 5.20978C12.6311 5.07923 12.844 4.65472 12.7134 4.26162L11.2899 4.73439ZM3.74805 6.7489V14.252H5.24805V6.7489H3.74805ZM3.74805 14.252C3.74805 15.495 4.75569 16.5027 5.99867 16.5027V15.0027C5.58411 15.0027 5.24805 14.6666 5.24805 14.252H3.74805ZM5.99867 16.5027H12.0012V15.0027H5.99867V16.5027ZM12.0012 16.5027C13.2442 16.5027 14.2518 15.495 14.2518 14.252H12.7518C12.7518 14.6666 12.4157 15.0027 12.0012 15.0027V16.5027ZM14.2518 14.252V6.7489H12.7518V14.252H14.2518ZM9.75101 7.49926V12.7514H11.251V7.49926H9.75101ZM6.75016 7.49927V12.7515H8.25016V7.49927H6.75016ZM3.37305 5.24801H14.6277V3.74801H3.37305V5.24801ZM6.71065 4.73518L7.11882 3.51067L5.6958 3.03633L5.28763 4.26084L6.71065 4.73518ZM7.11888 3.5105C7.22102 3.20384 7.508 2.99699 7.83122 2.99707L7.83158 1.49707C6.86245 1.49684 6.00199 2.11702 5.69574 3.0365L7.11888 3.5105ZM7.8314 2.99707H10.1694V1.49707H7.8314V2.99707ZM10.1703 2.99707C10.4938 2.99667 10.7812 3.20358 10.8834 3.5105L12.3065 3.0365C12 2.11624 11.1384 1.49587 10.1684 1.49707L10.1703 2.99707ZM10.8832 3.50989L11.2899 4.73439L12.7134 4.26162L12.3067 3.03711L10.8832 3.50989Z"
                                    fill="#808080" />
                        </svg>
                    </a>
                    <p>Delete</p>
                </div>
                <div class="cancel_div cancel_process_selected_id" id="closeModal">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.75 3.75L14.25 14.25" stroke="#808080" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round" />
                        <path d="M3.75 14.25L14.25 3.75" stroke="#808080" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round" />
                    </svg>
                    <p>Cancel</p>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
@endsection
@section('scripts')
    <!-- <script>
       var allProcessPayrollRoute = "{{ route('all-process-payroll') }}";
        var token = "{{csrf_token()}}";
    </script>
    <script src="{{asset('assets/admin/js/payroll/payroll-approvals.js')}}"></script> -->
    <script>
        var process_table;
        var process_selectedIds = [];
        function datatable(searchValue = null,department_id = null) {
            process_table = $('.process-payroll-datas').DataTable({
                // "lengthMenu": [[5, 10, 20], [5, 10, 20]],
                // lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
                // dom: '<"float-left"B><"float-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
                searching: false,
                lengthChange: false,
                info: false,
                responsive: true,
                // pagingType: "full_numbers",
                order: [
                    // [0, "desc"]
                ],
                drawCallback: function () {
                    $('#selectAllCheckboxProcess').on('change', function () {
                        var isChecked = $(this).prop('checked');
                        $('.selectCheckbox_process_model').prop('checked', isChecked);
                        var checkedCount = $('.selectCheckbox_process_model:checked').length;
                        $('.selected_check_member').html(checkedCount);
                        if (checkedCount > 0) {
                            $('#myModal').show();
                        } else {
                            $('#myModal').hide();
                        }
                        if (isChecked) {
                            $('.selectCheckbox_process_model').each(function () {
                                var id = $(this).val();
                                if (process_selectedIds.indexOf(id) === -1) {
                                    process_selectedIds.push(id);
                                }
                            });
                        } else {
                            process_selectedIds = [];
                        }
                    });
                    $('.selectCheckbox_process_model').change(function () {
                        var id = $(this).val();
                        var checkedCount = $('.selectCheckbox_process_model:checked').length;
                        $('.selected_check_member').html(checkedCount);
                        if (checkedCount > 0) {
                            $('#myModal').show();
                        } else {
                            $('#myModal').hide();
                        }
                        if ($(this).is(':checked')) {
                            process_selectedIds.push(id);
                        } else {
                            const index = process_selectedIds.indexOf(id);
                            if (index !== -1) {
                                process_selectedIds.splice(index, 1);
                            }
                        }
                        // console.log('Selected IDs:', selectedIds);
                    });
                },
                ajax: {
                    "url": "{{ route('all-process-payroll') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": { _token: "{{csrf_token()}}",
                        'searchValue': searchValue,
                        'department_id': department_id,
                    },
                    "dataSrc": "data"
                },
                initComplete: function (settings, json) {
                    var api = this.api();
                    if (process_table.rows().count() === 0) {
                        // Display image or advertisement
                        var adContent = '<tr><td colspan="5"><div class="no_data_found"><div class=""><img src="{{asset('assets/admin/images/staff_manage/no_data.svg')}}" alt="Advertisement"></div><div class="proxima_nova_semibold section_title">No data found, add staff</div></div></td></tr>';
                        $(api.table().body()).html(adContent);
                    }
                },
                columns: [
                    {
                        data: 'id',
                        type: 'num',
                        render: function (data, type, row) {
                            return `<input type="checkbox" class="selectCheckbox_process_model" id="selectCheckbox_process_model" value="${row.id}">`;
                        }
                    },
                    {
                        data: "name",
                        render: function (data, type, row) {
                            var routeUrl = "{{ route('staff-profile', ':id') }}";
                            var url = routeUrl.replace(':id', row.id);
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
                    { "data": "staff_id" },
                    { "data": "phone_number" },
                    { "data": "net_salary" },
                    // { "data": "action", "className": "action_btn"},
                ],
                // createdRow: function (row, data, dataIndex) {
                //     $(row).attr('id', 'storie_col_' + data['id']);
                // },
                columnDefs: [
                    { "width": "10px", "targets": 0 },
                    // { "width": "40%", "targets": 3 },
                    {'targets': [0], 'orderable': false}
                ]
            });
            $('.dataTables_length').addClass('bs-select');
        }
        datatable();
        var download_table;
        var download_selectedIds = [];
        function downloadDatatable() {
            download_table = $('.download-payroll-datas').DataTable({
                // "lengthMenu": [[5, 10, 20], [5, 10, 20]],
                // lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
                // dom: '<"float-left"B><"float-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
                searching: false,
                lengthChange: false,
                info: false,
                responsive: true,
                // pagingType: "full_numbers",
                order: [
                    // [0, "desc"]
                ],
                ajax: {
                    "url": "{{ route('all-download-payroll') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": { _token: "{{csrf_token()}}",
                        // 'searchValue': searchValue,
                    },
                    "dataSrc": "data"
                },
                initComplete: function (settings, json) {
                    var api = this.api();
                    if (download_table.rows().count() === 0) {
                        // Display image or advertisement
                        var adContent = '<tr><td colspan="5"><div class="no_data_found"><div class=""><img src="{{asset('assets/admin/images/staff_manage/no_data.svg')}}" alt="Advertisement"></div><div class="proxima_nova_semibold section_title">No data found, add staff</div></div></td></tr>';
                        $(api.table().body()).html(adContent);
                    }
                },
                columns: [
                    // {
                    //     data: 'id',
                    //     type: 'num',
                    //     render: function (data, type, row) {
                    //         return `<input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model" value="${row.id}">`;
                    //     }
                    // },
                    { "data": "staff_payment_type" },
                    { "data": "report_cycle" },
                    { "data": "report_type" },
                    { "data": "generated_on" },
                    { "data": "action"},
                ],
                // createdRow: function (row, data, dataIndex) {
                //     $(row).attr('id', 'storie_col_' + data['id']);
                // },
                columnDefs: [
                    // { "width": "10px", "targets": 0 },
                    // { "width": "40%", "targets": 3 },
                    {'targets': [0], 'orderable': false}
                ]
            });
            $('.dataTables_length').addClass('bs-select');
        }
        // downloadDatatable();
        $('#staff_data_find').on('input', function () {
            var searchValue = $(this).val();
            process_table.destroy();
            datatable(searchValue);
        });
        
        if (localStorage.getItem('step2-next-button') === 'true') {
            //remove active in step 1 2 4
            $('.step1, .step2, .step4').removeClass('active');
            $('#step1, #step2, #step4').removeClass('staff_info_active');
            $('.step-1, .step-2, .step-4').removeClass('info_active');
             //add active in step 3
            $('.step3').addClass('active');
            $('#step3').addClass('staff_info_active');
            $('.step-3').addClass('info_active');
            $('.header_title').html('Process Payroll');

            $('.step1-number, .step2-number').addClass('d-none');
            $('.step1-check, .step2-check').addClass('check-active');

            localStorage.removeItem('step2-next-button');
        }
        // //step-1 click
        $('.approval-back-btn').click(function(){
            $('.profile-step').addClass('active');
            $('.page-title-area').removeClass('active');
            $('.payroll-approval').addClass('active');
            //add active in step 1
            $('.step1').addClass('active');
            $('#step1').addClass('staff_info_active');
            $('.step-1').addClass('info_active');
            //remove active in step 2 3 4
            $('.step2, .step3, .step4').removeClass('active');
            $('#step2, #step3, #step4').removeClass('staff_info_active');
            $('.step-2, .step-3, .step-4').removeClass('info_active');

            $('.step1-check').addClass('info_active');
            $('.step2-check, .step3-check, .step4-check').removeClass('info_active');
            $('.header_title').html('Payroll Approvals');
        })
        // //step-2 click
        $('.review-back-btn').click(function(){
            $('.profile-step,.page-title-area, .payroll-approval').removeClass('active');
            // $('.payroll-approval').removeClass('active');
            $('.approval-back').addClass('active');
             // Hide the second span on the first page
            $('.step1-number').addClass('d-none');
            $('.step1-check').addClass('check-active');

            $('.step1-check, .step3-check, .step4-check').removeClass('info_active');
            $('.step2-check').addClass('info_active');
            //remove active in step 1 3 4
            $('.step1, .step3, .step4').removeClass('active');
            $('#step1, #step3, #step4').removeClass('staff_info_active');
            $('.step-1, .step-3, .step-4').removeClass('info_active');
            //add active in step 2
            $('.step2').addClass('active');
            $('#step2').addClass('staff_info_active');
            $('.step-2').addClass('info_active');
            $('.header_title').html('Review Details');
        })
        // //step-3 click
        $('.download-back-btn').click(function(){
            $('.profile-step,.page-title-area').removeClass('active');
            $('.reviews').addClass('active');

            $('.step1-number, .step2-number').addClass('d-none');
            $('.step1-check, .step2-check').addClass('check-active');

            $('.step1-check, .step2-check, .step4-check').removeClass('info_active');
            $('.step3-check').addClass('info_active');
            //remove active in step 1 2 4
            $('.step1, .step2, .step4').removeClass('active');
            $('#step1, #step2, #step4').removeClass('staff_info_active');
            $('.step-1, .step-2, .step-4').removeClass('info_active');

            $('.step3').addClass('active');
            $('#step3').addClass('staff_info_active');
            $('.step-3').addClass('info_active');
            $('.header_title').html('Process Payroll');
        })
        $('#approve_btn').click(function(event) {
            event.preventDefault();
            $('.approval-back').addClass('active');
            $('.payroll-approval').removeClass('active');
            $('.profile-step').removeClass('active');
            $('.step1').removeClass('active');
            $('#step1').removeClass('staff_info_active');
            $('.step-1').removeClass('info_active');

            $('.step2').addClass('active');
            $('#step2').addClass('staff_info_active');
            $('.step-2').addClass('info_active');

            $('.step1-number').addClass('d-none');
            $('.step1-check').addClass('check-active');
            $('.step1-check, .step3-check').removeClass('info_active');
            $('.step2-check').addClass('info_active');
        })
        $('#review_btn').click(function(event) {
            event.preventDefault();
            $('.profile-step, .page-title-area').removeClass('active');
            $('.reviews').addClass('active');
              //remove active in step 1 2
            $('.step1, .step2').removeClass('active');
            $('#step1, #step2').removeClass('staff_info_active');
            $('.step-1, .step-2').removeClass('info_active');

            $('.step3').addClass('active');
            $('#step3').addClass('staff_info_active');
            $('.step-3').addClass('info_active');
            $('.header_title').html('Process Payroll');

            $('.step2-number').addClass('d-none');
            $('.step2-check').addClass('check-active');
            $('.step1-check, .step2-check ').removeClass('info_active');
        })
        $('#process_btn').click(function(event) {
            if(process_selectedIds.length == 0){
                toastr["error"]("Please select staff")
            }else{
                $('#staff_count').html(process_selectedIds.length);
                $('#myModal').hide();
                event.preventDefault();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ route('add-payroll-record') }}",
                    data: {
                        "selectedIds":process_selectedIds
                    },
                    success: function(response) {
                        if (response['status'] == 1) {
                            $('.profile-step, .page-title-area').removeClass('active');
                            $('.download-reports').addClass('active');
                            // remove active in step 1 2 3
                            $('.step1, .step2, .step3').removeClass('active');
                            $('#step1, #step2, #step3').removeClass('staff_info_active');
                            $('.step-1, .step-2, .step-2').removeClass('info_active');
                            // add active in step 4
                            $('.step4').addClass('active');
                            $('#step4').addClass('staff_info_active');
                            $('.step-4').addClass('info_active');

                            $('.step3-number').addClass('d-none');
                            $('.step3-check').addClass('check-active');
                            $('.step1-check, .step2-check ,.step3-check').removeClass('info_active');
                            // download_table.
                            downloadDatatable();
                        }else{
                            toastr["error"](response.message)
                        }
                    }
                });
            }
        });
        $('.cancel_process_selected_id').click(function () {
            $('#myModal').hide();
            process_selectedIds = [];
            $('#selectAllCheckboxProcess').prop('checked', false);
            $('.selectCheckbox_process_model').prop('checked', false);
        });
        function downloadPayrolls(id){
            var url = '{{ route('payroll_export') }}';
            var queryParams = $.param({ payrun_id: id });
            var finalUrl = url + '?' + queryParams;
            window.location.href = finalUrl;
            if(finalUrl){
                toastr["success"]('Your files is being downloaded');
            }else {
                toastr["error"]('Somthing went wrong.');
            }
        }
    </script>
@endsection