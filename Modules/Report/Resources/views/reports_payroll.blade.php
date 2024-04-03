@extends('admin.layout.main')
@section('title')
    <title>{{env('APP_NAME')}} | Payroll Approvals List</title>
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
                        <h4 class="page-title pull-left proxima_nova_semibold">Payroll Reports</h4>
                    </div>
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li class="section_sub_title"><a href="#">Reports</a></li>
                        <li class="section_sub_title">/ Payroll Reports</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-content-inner">
        <a class="report-list" href="{{route('bulk_salary_slip')}}">
            <div class="atten-report-list">
                <div>
                    <div class="section_sub_title proxima_nova_semibold business-manager-name">Bulk Salary Slip</div>
                </div>
                <p class="report-inner-content proxima_nova_regular">Bulk Salary Slip Report</p>
            </div>
            <div class="col-2 text-end">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 8.5H16.5C15.3954 8.5 14.5 7.60457 14.5 6.5V3" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 17H15" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 14L11 12.25L13 14L15 12" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.1213 6.12132L16.8787 3.87868C16.3161 3.31607 15.553 3 14.7574 3H7C5.34315 3 4 4.34315 4 6V18C4 19.6569 5.34315 21 7 21H17C18.6569 21 20 19.6569 20 18V8.24264C20 7.44699 19.6839 6.68393 19.1213 6.12132Z" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </a>

        <a class="report-list" href="{{route('staff_payroll_report')}}">
            <div class="atten-report-list">
                <div>
                    <div class="payroll-add-report">
                        <div class="section_sub_title proxima_nova_semibold business-manager-name">Staff Payroll Report</div>
                    </div>
                </div>
                    <p class="report-inner-content proxima_nova_regular">Complete payroll report of all the staff</p>
            </div>
            <div class="col-2 text-end">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.99805 6.99776V4.99693C6.99805 3.8919 7.89385 2.99609 8.99888 2.99609H19.003C20.1081 2.99609 21.0039 3.8919 21.0039 4.99693V19.0028C21.0039 20.1078 20.1081 21.0036 19.003 21.0036H8.99888C7.89385 21.0036 6.99805 20.1078 6.99805 19.0028V17.0019" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <rect x="3.99707" y="6.99609" width="10.0042" height="10.0042" rx="2" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M21.0039 9.07833H14.001" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M21.0039 15.0002H14.001" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14.0012 2.99609V21.0036" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.5667 13.7495L7.56543 10.248" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M7.56543 13.7495L10.5667 10.248" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.001 11L12 13L9.99902 11" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <rect x="3" y="3" width="18" height="18" rx="5" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 8V13" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M15 16H9" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </a>
    </div>
@endsection