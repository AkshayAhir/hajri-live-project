@extends('admin.layout.main')
@section('title')
    <title>{{env('APP_NAME')}} | Settings - leave policy</title>
@endsection
@section('header-page')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="top-header-sub">
                <div class="breadcrumbs-area clearfix">
                    <div class="breadcrumbs-sub">
                    <a onclick="history.back()" class="back_button"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z" fill="#050E17"></path>
                        </svg></a>
                        <h4 class="page-title pull-left proxima_nova_semibold">Create Template
                        </h4>
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li class="section_sub_title"><a href="{{route('setting')}}">Settings</a></li>
                        <li class="section_sub_title">/  Business settings</li>
                        <li class="section_sub_title">/  Leave Policy</li>
                        <li class="section_sub_title">/  Create template</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @if($leave_template)
        <div class="col-sm-12 shift-setting-main">
            <form action="" method="post" id="save_leave_policy" class="">
                <input type="hidden" name="id" value="{{$leave_template['id']}}"> 
                <div class="hajri-salary-pays-main template_settings_form">
                    <div class="shift-main-sub-edit horizontal-scroll-container">
                        <h2 class="proxima_nova_semibold leave-policy-title">Template Settings</h2>
                        <div class="shift-main-inner-edit">
                            <div class="shift-inner-sub-label-edit col-6">
                                <label class="shift-type-label">Template Name</label>
                                <input type="text" class="form-control shift-edit-input" id="template_name" name="template_name" value="{{$leave_template['template_name']}}">
                            </div>
                            <div class="shift-inner-sub-label-edit col-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="form-label shift-type-label">Leave Policy Cycle</label>
                                    @if($leave_template['leave_start_period'] && $leave_template['leave_end_period'])
                                        <div class="year-month-radio">
                                            <label class="policy-leave-label">
                                                <input type="radio" name="leave_policy_cycle" id="policy_cycle_monthly" value="monthly" />
                                                <div class="front-end box">
                                                    <span class="proxima_nova_semibold">Monthly</span>
                                                </div>
                                            </label>
                                            <label class="policy-leave-label">
                                                <input type="radio" name="leave_policy_cycle" id="policy_cycle_yearly" value="yearly" checked/>
                                                <div class="back-end box">
                                                    <span class="proxima_nova_semibold">Yearly</span>
                                                </div>
                                            </label>
                                        </div>
                                    @else
                                        <div class="year-month-radio">
                                            <label class="policy-leave-label">
                                                <input type="radio" name="leave_policy_cycle" id="policy_cycle_monthly" value="monthly" checked/>
                                                <div class="front-end box">
                                                    <span class="proxima_nova_semibold">Monthly</span>
                                                </div>
                                            </label>
                                            <label class="policy-leave-label">
                                                <input type="radio" name="leave_policy_cycle" id="policy_cycle_yearly" value="yearly" >
                                                <div class="back-end box">
                                                    <span class="proxima_nova_semibold">Yearly</span>
                                                </div>
                                            </label>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="shift-main-inner-edit">
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Leave Period</label>
                                    @if($leave_template['leave_start_period'] && $leave_template['leave_end_period'])
                                        <div class="leave-edit-inner">
                                            <div class="shift-inner-time leave-policy-time date">
                                                <input type="text" class="form-control leave-policy-edit-time input-group-addon" id="leave_start_period" name="leave_start_period" value="{{$leave_template['leave_start_period']}}">
                                            </div>
                                            <div class="leave-inner-time-sec">
                                                <p>To</p>
                                                <div class="shift-inner-time leave-policy-to-time date">
                                                    <input type="text" class="form-control leave-policy-edit-time input-group-addon" id="leave_end_period" name="leave_end_period" value="{{$leave_template['leave_end_period']}}" >
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="leave-edit-inner">
                                            <div class="shift-inner-time leave-policy-time date">
                                                <input type="text" class="form-control leave-policy-edit-time input-group-addon" id="leave_start_period" name="leave_start_period" value="{{$leave_template['leave_start_period']}}">
                                            </div>
                                            <div class="leave-inner-time-sec">
                                                <p>To</p>
                                                <div class="shift-inner-time leave-policy-to-time date">
                                                    <input type="text" class="form-control leave-policy-edit-time input-group-addon" id="leave_end_period" name="leave_end_period" value="{{$leave_template['leave_end_period']}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                
                            </div>
                            <div class="shift-inner-sub-label-edit">
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Accrual Type</label>
                                    <div class="filters staff_attendance" id="accrual_type_error">
                                        <input type="text" class="form-control leave-policy-edit-time input-group-addon" name="accrual_type" value="All at once" readonly="true" value="{{$leave_template['accrual_type']}}">
                                        <!-- <select class="form-select create-select section_sub_title select-club-services" id="accrual_type" name="accrual_type">
                                            <option value="all_at_once">All at once</option>
                                            <option value="month_start">Month Start</option>
                                            <option value="month_end">Month End</option>
                                        </select> -->
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="shift-main-inner-edit">
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Number Of Leaves</label>
                                <input type="number" class="form-control shift-edit-input" id="number_of_leaves" name="number_of_leaves" value="{{$leave_template['number_of_leaves']}}">
                            </div>
                        </div>
                        
                        
                        <!-- <div class="atten-location-atten">
                            <input class="form-check-input" type="checkbox" value="" checked id="flexCheckChecked">
                            <p class="section_sub_title ">Allowed Sandwich Leaves</p>
                        </div> -->
                    </div>
                    <!-- <h2 class="proxima_nova_semibold leave-catego-title">Leave Categories</h2>
                    <div class="leave--cateory-main-sec horizontal-scroll-container">
                        <div class="leave-main-inner-edit steff-paymeny-detail">
                            <div class="leave-cate-edit">
                                <label class="shift-type-label">Leave Category Name</label>
                                    <div>
                                        <input type="text" class="form-control shift-edit-input leave-edit-input" placeholder="Casual Leave">
                                    </div>
                                <div class="leave-cate-multi-add">
                                    <input type="text" class="form-control shift-edit-input leave-edit-input" placeholder="Sick Leave">
                                </div>
                                <div class="leave-cate-multi-add">
                                    <input type="text" class="form-control shift-edit-input leave-edit-input" placeholder="Annual Leave">
                                </div>
                            </div>
                            <div class="leave-cate-edit">
                                <label class="shift-type-label">Leave Count</label>
                                <input type="text" class="form-control shift-edit-input leave-edit-input" placeholder="days per year">
                                <div class="leave-cate-multi-add">
                                    <input type="text" class="form-control shift-edit-input leave-edit-input" placeholder="days per year">
                                </div>
                                <div class="leave-cate-multi-add">
                                    <input type="text" class="form-control shift-edit-input leave-edit-input" placeholder="days per year">
                                </div>
                            </div>

                            <div class="leave-cate-edit">
                                <label class="shift-type-label">Unused Leave Rule</label>
                                <select class="form-select create-select section_sub_title leave-edit-input" aria-label="Default select example">
                                    <option>Lapse</option>
                                    <option value="carry">Carry Forward</option>
                                    <option value="encash">Encash</option>
                                </select>
                                <div class="leave-cate-multi-add">
                                    <select class="form-select create-select section_sub_title leave-edit-input" aria-label="Default select example">
                                        <option>Lapse</option>
                                        <option value="carry">Carry Forward</option>
                                        <option value="encash">Encash</option>
                                    </select>
                                </div>
                                <div class="leave-cate-multi-add">
                                    <select class="form-select create-select section_sub_title leave-edit-input" aria-label="Default select example">
                                        <option>Lapse</option>
                                        <option value="carry">Carry Forward</option>
                                        <option value="encash">Encash</option>
                                    </select>
                                </div>
                            </div>
                            <div class="leave-cate-edit">
                                <label class="shift-type-label">Encashment/Carry Forward Limit</label>
                                <button class="leave-edit-add-btn proxima_nova_semibold">Add</button>
                                <div class="leave-cate-multi-add">
                                    <div class="leave-cate-inner">
                                        <input type="number" class="form-control shift-edit-input leave-edit-input leave-carry-forward" placeholder="0">
                                        <div class="leave-text-sub">Days</div>
                                    </div>
                                    <div class="leave-carry-sub-text">No Carry Forward</div>
                                </div>
                                <div class="leave-cate-multi-add-2">
                                    <div class="leave-cate-inner">
                                        <input type="number" class="form-control shift-edit-input leave-edit-input leave-carry-forward" placeholder="0">
                                        <div class="leave-text-sub">Days</div>
                                    </div>
                                    <div class="leave-carry-sub-text">No Encashment</div>
                                </div>
                            </div>
                            <div class="leave-cate-edit">
                                <div class="leave-data-delete-main">
                                    <button class="leave-cate-data-delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.32085 4.8749C3.42492 4.76287 3.57092 4.69922 3.72383 4.69922H14.2493C14.402 4.69922 14.5478 4.76268 14.6518 4.87442C14.7559 4.98615 14.8088 5.13611 14.7979 5.28839L14.1477 14.3949C14.0708 15.4677 13.1783 16.2992 12.1028 16.2992H5.89283C4.81935 16.2992 3.92801 15.4709 3.84811 14.4004L3.17532 5.28972C3.16406 5.13723 3.21679 4.98694 3.32085 4.8749ZM12.1028 15.1992C12.6009 15.1992 13.0148 14.8141 13.0505 14.3164L13.6587 5.79922H4.31594L4.94505 14.3185C4.94505 14.3185 4.94506 14.3186 4.94505 14.3185C4.98219 14.8155 5.39584 15.1992 5.89283 15.1992H12.1028Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99922 7.69922C9.30298 7.69922 9.54922 7.94546 9.54922 8.24922V12.7492C9.54922 13.053 9.30298 13.2992 8.99922 13.2992C8.69546 13.2992 8.44922 13.053 8.44922 12.7492V8.24922C8.44922 7.94546 8.69546 7.69922 8.99922 7.69922Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.44922 5.24922C2.44922 4.94546 2.69546 4.69922 2.99922 4.69922H14.9992C15.303 4.69922 15.5492 4.94546 15.5492 5.24922C15.5492 5.55298 15.303 5.79922 14.9992 5.79922H2.99922C2.69546 5.79922 2.44922 5.55298 2.44922 5.24922Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.49416 3.02953C5.79441 2.22921 6.55906 1.69922 7.41387 1.69922H10.5849C11.4397 1.69922 12.2043 2.22921 12.5046 3.02953L13.2644 5.05614C13.371 5.34057 13.2269 5.65758 12.9424 5.76422C12.658 5.87085 12.341 5.72672 12.2344 5.44229L11.4747 3.41591C11.4746 3.41587 11.4747 3.41595 11.4747 3.41591C11.3354 3.04479 10.981 2.79922 10.5849 2.79922H7.41387C7.01771 2.79922 6.6634 3.04467 6.52411 3.41579C6.5241 3.41583 6.52413 3.41576 6.52411 3.41579L5.76436 5.44229C5.65773 5.72672 5.34072 5.87085 5.05629 5.76422C4.77187 5.65758 4.62774 5.34057 4.73437 5.05614L5.49416 3.02953Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6111 7.70065C11.914 7.72236 12.142 7.98558 12.1203 8.28856L11.7978 12.7886C11.7761 13.0915 11.5129 13.3195 11.2099 13.2978C10.9069 13.2761 10.6789 13.0129 10.7006 12.7099L11.0231 8.20993C11.0449 7.90695 11.3081 7.67894 11.6111 7.70065Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.38766 7.70065C6.69064 7.67894 6.95386 7.90695 6.97557 8.20993L7.29807 12.7099C7.31978 13.0129 7.09177 13.2761 6.78879 13.2978C6.48581 13.3195 6.2226 13.0915 6.20088 12.7886L5.87838 8.28856C5.85667 7.98558 6.08468 7.72236 6.38766 7.70065Z" fill="#808080" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="leave-data-delete-main-sec">
                                    <button class="leave-cate-data-delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.32085 4.8749C3.42492 4.76287 3.57092 4.69922 3.72383 4.69922H14.2493C14.402 4.69922 14.5478 4.76268 14.6518 4.87442C14.7559 4.98615 14.8088 5.13611 14.7979 5.28839L14.1477 14.3949C14.0708 15.4677 13.1783 16.2992 12.1028 16.2992H5.89283C4.81935 16.2992 3.92801 15.4709 3.84811 14.4004L3.17532 5.28972C3.16406 5.13723 3.21679 4.98694 3.32085 4.8749ZM12.1028 15.1992C12.6009 15.1992 13.0148 14.8141 13.0505 14.3164L13.6587 5.79922H4.31594L4.94505 14.3185C4.94505 14.3185 4.94506 14.3186 4.94505 14.3185C4.98219 14.8155 5.39584 15.1992 5.89283 15.1992H12.1028Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99922 7.69922C9.30298 7.69922 9.54922 7.94546 9.54922 8.24922V12.7492C9.54922 13.053 9.30298 13.2992 8.99922 13.2992C8.69546 13.2992 8.44922 13.053 8.44922 12.7492V8.24922C8.44922 7.94546 8.69546 7.69922 8.99922 7.69922Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.44922 5.24922C2.44922 4.94546 2.69546 4.69922 2.99922 4.69922H14.9992C15.303 4.69922 15.5492 4.94546 15.5492 5.24922C15.5492 5.55298 15.303 5.79922 14.9992 5.79922H2.99922C2.69546 5.79922 2.44922 5.55298 2.44922 5.24922Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.49416 3.02953C5.79441 2.22921 6.55906 1.69922 7.41387 1.69922H10.5849C11.4397 1.69922 12.2043 2.22921 12.5046 3.02953L13.2644 5.05614C13.371 5.34057 13.2269 5.65758 12.9424 5.76422C12.658 5.87085 12.341 5.72672 12.2344 5.44229L11.4747 3.41591C11.4746 3.41587 11.4747 3.41595 11.4747 3.41591C11.3354 3.04479 10.981 2.79922 10.5849 2.79922H7.41387C7.01771 2.79922 6.6634 3.04467 6.52411 3.41579C6.5241 3.41583 6.52413 3.41576 6.52411 3.41579L5.76436 5.44229C5.65773 5.72672 5.34072 5.87085 5.05629 5.76422C4.77187 5.65758 4.62774 5.34057 4.73437 5.05614L5.49416 3.02953Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6111 7.70065C11.914 7.72236 12.142 7.98558 12.1203 8.28856L11.7978 12.7886C11.7761 13.0915 11.5129 13.3195 11.2099 13.2978C10.9069 13.2761 10.6789 13.0129 10.7006 12.7099L11.0231 8.20993C11.0449 7.90695 11.3081 7.67894 11.6111 7.70065Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.38766 7.70065C6.69064 7.67894 6.95386 7.90695 6.97557 8.20993L7.29807 12.7099C7.31978 13.0129 7.09177 13.2761 6.78879 13.2978C6.48581 13.3195 6.2226 13.0915 6.20088 12.7886L5.87838 8.28856C5.85667 7.98558 6.08468 7.72236 6.38766 7.70065Z" fill="#808080" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="leave-data-delete-main-third">
                                    <button class="leave-cate-data-delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.32085 4.8749C3.42492 4.76287 3.57092 4.69922 3.72383 4.69922H14.2493C14.402 4.69922 14.5478 4.76268 14.6518 4.87442C14.7559 4.98615 14.8088 5.13611 14.7979 5.28839L14.1477 14.3949C14.0708 15.4677 13.1783 16.2992 12.1028 16.2992H5.89283C4.81935 16.2992 3.92801 15.4709 3.84811 14.4004L3.17532 5.28972C3.16406 5.13723 3.21679 4.98694 3.32085 4.8749ZM12.1028 15.1992C12.6009 15.1992 13.0148 14.8141 13.0505 14.3164L13.6587 5.79922H4.31594L4.94505 14.3185C4.94505 14.3185 4.94506 14.3186 4.94505 14.3185C4.98219 14.8155 5.39584 15.1992 5.89283 15.1992H12.1028Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99922 7.69922C9.30298 7.69922 9.54922 7.94546 9.54922 8.24922V12.7492C9.54922 13.053 9.30298 13.2992 8.99922 13.2992C8.69546 13.2992 8.44922 13.053 8.44922 12.7492V8.24922C8.44922 7.94546 8.69546 7.69922 8.99922 7.69922Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.44922 5.24922C2.44922 4.94546 2.69546 4.69922 2.99922 4.69922H14.9992C15.303 4.69922 15.5492 4.94546 15.5492 5.24922C15.5492 5.55298 15.303 5.79922 14.9992 5.79922H2.99922C2.69546 5.79922 2.44922 5.55298 2.44922 5.24922Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.49416 3.02953C5.79441 2.22921 6.55906 1.69922 7.41387 1.69922H10.5849C11.4397 1.69922 12.2043 2.22921 12.5046 3.02953L13.2644 5.05614C13.371 5.34057 13.2269 5.65758 12.9424 5.76422C12.658 5.87085 12.341 5.72672 12.2344 5.44229L11.4747 3.41591C11.4746 3.41587 11.4747 3.41595 11.4747 3.41591C11.3354 3.04479 10.981 2.79922 10.5849 2.79922H7.41387C7.01771 2.79922 6.6634 3.04467 6.52411 3.41579C6.5241 3.41583 6.52413 3.41576 6.52411 3.41579L5.76436 5.44229C5.65773 5.72672 5.34072 5.87085 5.05629 5.76422C4.77187 5.65758 4.62774 5.34057 4.73437 5.05614L5.49416 3.02953Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6111 7.70065C11.914 7.72236 12.142 7.98558 12.1203 8.28856L11.7978 12.7886C11.7761 13.0915 11.5129 13.3195 11.2099 13.2978C10.9069 13.2761 10.6789 13.0129 10.7006 12.7099L11.0231 8.20993C11.0449 7.90695 11.3081 7.67894 11.6111 7.70065Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.38766 7.70065C6.69064 7.67894 6.95386 7.90695 6.97557 8.20993L7.29807 12.7099C7.31978 13.0129 7.09177 13.2761 6.78879 13.2978C6.48581 13.3195 6.2226 13.0915 6.20088 12.7886L5.87838 8.28856C5.85667 7.98558 6.08468 7.72236 6.38766 7.70065Z" fill="#808080" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="add-leave-category">
                            <a href="" class="proxima_nova_bold">+ Add Leave Category</a>
                        </div>
                    </div>
                    <h2 class="proxima_nova_semibold leave-catego-title">Leave Approval</h2>
                    <div class="shift-main-inner-edit steff-paymeny-detail leave-main-bottom-sec">
                        <div class="leave-approleft-sec">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.33226 2.64766C3.84981 2.64766 2.64753 3.84993 2.64753 5.33238V10.6679C2.64753 12.1504 3.84981 13.3527 5.33226 13.3527H10.6678C12.1503 13.3527 13.3525 12.1504 13.3525 10.6679V5.33238C13.3525 3.84993 12.1503 2.64766 10.6678 2.64766H5.33226ZM1.34753 5.33238C1.34753 3.13196 3.13184 1.34766 5.33226 1.34766H10.6678C12.8682 1.34766 14.6525 3.13196 14.6525 5.33238V10.6679C14.6525 12.8684 12.8682 14.6527 10.6678 14.6527H5.33226C3.13184 14.6527 1.34753 12.8684 1.34753 10.6679V5.33238Z" fill="#808080" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.08192 5.50149C7.0797 4.99121 7.49368 4.58203 7.99798 4.58203C8.50295 4.58203 8.91539 4.99057 8.91539 5.49877C8.91539 6.00503 8.5049 6.4155 7.99865 6.4155C7.4933 6.4155 7.08338 6.00648 7.08192 5.50149Z" fill="#808080" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.74988 7.62305C6.74988 7.20883 7.08566 6.87305 7.49988 6.87305H8.16682C8.58104 6.87305 8.91682 7.20883 8.91682 7.62305V10.791C8.91682 11.2052 8.58104 11.541 8.16682 11.541C7.75261 11.541 7.41682 11.2052 7.41682 10.791V8.3685C7.04169 8.32717 6.74988 8.00919 6.74988 7.62305Z" fill="#808080" />
                            </svg>
                            <p class="section_sub_title">Multilevel Approval Settings is set to Level 1 by default</p>
                        </div>
                        <div class="set-multi-btn create-data dropdown-toggle proxima_nova_bold active" data-bs-toggle="offcanvas" data-bs-target="#create-toggle-right" aria-controls="create-toggle-right">
                            <button name="" class="set-appro-btn proxima_nova_semibold">Set Multilevel Approval</button>
                        </div>
                    </div> -->
                </div>
                <div class="leave-policy-edit-btn">
                    <button name="" id="save_leave_policy_btn" class="save-staff-btn proxima_nova_semibold">Save
                        <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                    </button>
                </div>
            </form>
        </div>
        <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="create-toggle-right"
            data-bs-scroll="true" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <div class="popup-close-btns" data-bs-dismiss="offcanvas" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.84154 2.84056C3.07296 2.60914 3.44817 2.60914 3.67959 2.84056L13.1611 12.322C13.3925 12.5535 13.3925 12.9287 13.1611 13.1601C12.9296 13.3915 12.5544 13.3915 12.323 13.1601L2.84154 3.67861C2.61011 3.44719 2.61011 3.07198 2.84154 2.84056Z" fill="#808080" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1611 2.84056C13.3925 3.07198 13.3925 3.44719 13.1611 3.67861L3.67959 13.1601C3.44817 13.3915 3.07296 13.3915 2.84154 13.1601C2.61011 12.9287 2.61011 12.5535 2.84154 12.322L12.323 2.84056C12.5544 2.60914 12.9296 2.60914 13.1611 2.84056Z" fill="#808080" />
                    </svg>
                </div>
            </div>
            <div class="offcanvas-body ">
                <h5 class="section_title_heading proxima_nova_bold download-work-main-header filter-title-main">Set Multilevel Approval</h5>
                <hr>
                <div class="filter-sub-sec">
                    <form method="">
                        <div class="daily-work-select">
                            <h2 class="set-multi-text section_sub_title">Choose Type of Approval</h2>
                            <!-- <div class="shift-inner-sub-label-edit"> -->
                            <select class="form-select create-select section_sub_title" aria-label="Default select example">
                                <option>Level One</option>
                                <option value="start">Level Two</option>
                                <option value="end">Level Three</option>
                            </select>
                            <!-- </div> -->
                        </div>
                        <div class="daily-work-select right-model">
                            <ul class="navigation_tabs" id="navigation_tabs">
                                <li class="tab_active">
                                    <div class="nav-active">
                                        <h2 class="section_sub_title tab-model-title proxima_nova_semibold">First Approval By</h2>
                                        <select class="form-select create-select section_sub_title" aria-label="Default select example">
                                            <option>Manager</option>
                                            <option value="start">Admin</option>
                                            <option value="end">Employer</option>
                                        </select>
                                    </div>
                                </li>
                                <li class="tab_active">
                                    <div class="nav-active">
                                        <h2 class="section_sub_title tab-model-title proxima_nova_semibold">Second Approval By</h2>
                                        <select class="form-select create-select section_sub_title" aria-label="Default select example">
                                            <option>Manager</option>
                                            <option value="start" selected>Admin</option>
                                            <option value="end">Employer</option>
                                        </select>
                                    </div>
                                </li>
                                <li class="tab_active">
                                    <div class="nav-active">
                                        <h2 class="section_sub_title tab-model-title proxima_nova_semibold">Third Approval By</h2>
                                        <select class="form-select create-select section_sub_title" aria-label="Default select example">
                                            <option>Manager</option>
                                            <option value="start">Admin</option>
                                            <option value="end" selected>Employer</option>
                                        </select>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- <div class="download-cancel-btns-main"> -->
                        <div class="policy-edit-save-btn">
                            <button name="" class="download-btn proxima_nova_semibold">Save</button>
                        </div>
                        <!-- </div> -->
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="col-sm-12 shift-setting-main">
            <form action="" method="post" id="save_leave_policy" class="template_settings_form">
                <div class="hajri-salary-pays-main">
                    <div class="shift-main-sub-edit horizontal-scroll-container">
                        <h2 class="proxima_nova_semibold leave-policy-title">Template Settings</h2>
                        <div class="shift-main-inner-edit">
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Template Name</label>
                                <input type="text" class="form-control shift-edit-input" id="template_name" name="template_name" placeholder="Leave Policy">
                            </div>
                            <div class="shift-inner-sub-label-edit">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="form-label shift-type-label">Leave Policy Cycle</label>
                                    <div class="year-month-radio">
                                        <label class="policy-leave-label">
                                            <input type="radio" name="leave_policy_cycle" id="policy_cycle_monthly" value="monthly" checked/>
                                            <div class="front-end box">
                                                <span class="proxima_nova_semibold">Monthly</span>
                                            </div>
                                        </label>
                                        <label class="policy-leave-label">
                                            <input type="radio" name="leave_policy_cycle" id="policy_cycle_yearly" value="yearly" />
                                            <div class="back-end box">
                                                <span class="proxima_nova_semibold">Yearly</span>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="shift-main-inner-edit">
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Leave Period</label>
                                <div class="leave-edit-inner">
                                    <div class="shift-inner-time leave-policy-time date">
                                        <input type="text" class="form-control leave-policy-edit-time input-group-addon" id="leave_start_period" name="leave_start_period" >
                                    </div>
                                    <div class="leave-inner-time-sec">
                                        <p>To</p>
                                        <div class="shift-inner-time leave-policy-to-time date">
                                            <input type="text" class="form-control leave-policy-edit-time input-group-addon" id="leave_end_period" name="leave_end_period" disabled>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="shift-inner-sub-label-edit">
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Accrual Type</label>
                                    <div class="filters staff_attendance" id="accrual_type_error">
                                        <input type="text" class="form-control leave-policy-edit-time input-group-addon" name="accrual_type" value="All at once" readonly="true">
                                        <!-- <select class="form-select create-select section_sub_title select-club-services" id="accrual_type" name="accrual_type">
                                            <option value="all_at_once">All at once</option>
                                            <option value="month_start">Month Start</option>
                                            <option value="month_end">Month End</option>
                                        </select> -->
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="shift-main-inner-edit">
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Number Of Leaves</label>
                                <input type="number" class="form-control shift-edit-input" id="number_of_leaves" name="number_of_leaves" placeholder="Number Of Leaves">
                            </div>
                        </div>
                        
                        
                        <!-- <div class="atten-location-atten">
                            <input class="form-check-input" type="checkbox" value="" checked id="flexCheckChecked">
                            <p class="section_sub_title ">Allowed Sandwich Leaves</p>
                        </div> -->
                    </div>
                    <!-- <h2 class="proxima_nova_semibold leave-catego-title">Leave Categories</h2>
                    <div class="leave--cateory-main-sec horizontal-scroll-container">
                        <div class="leave-main-inner-edit steff-paymeny-detail">
                            <div class="leave-cate-edit">
                                <label class="shift-type-label">Leave Category Name</label>
                                    <div>
                                        <input type="text" class="form-control shift-edit-input leave-edit-input" placeholder="Casual Leave">
                                    </div>
                                <div class="leave-cate-multi-add">
                                    <input type="text" class="form-control shift-edit-input leave-edit-input" placeholder="Sick Leave">
                                </div>
                                <div class="leave-cate-multi-add">
                                    <input type="text" class="form-control shift-edit-input leave-edit-input" placeholder="Annual Leave">
                                </div>
                            </div>
                            <div class="leave-cate-edit">
                                <label class="shift-type-label">Leave Count</label>
                                <input type="text" class="form-control shift-edit-input leave-edit-input" placeholder="days per year">
                                <div class="leave-cate-multi-add">
                                    <input type="text" class="form-control shift-edit-input leave-edit-input" placeholder="days per year">
                                </div>
                                <div class="leave-cate-multi-add">
                                    <input type="text" class="form-control shift-edit-input leave-edit-input" placeholder="days per year">
                                </div>
                            </div>

                            <div class="leave-cate-edit">
                                <label class="shift-type-label">Unused Leave Rule</label>
                                <select class="form-select create-select section_sub_title leave-edit-input" aria-label="Default select example">
                                    <option>Lapse</option>
                                    <option value="carry">Carry Forward</option>
                                    <option value="encash">Encash</option>
                                </select>
                                <div class="leave-cate-multi-add">
                                    <select class="form-select create-select section_sub_title leave-edit-input" aria-label="Default select example">
                                        <option>Lapse</option>
                                        <option value="carry">Carry Forward</option>
                                        <option value="encash">Encash</option>
                                    </select>
                                </div>
                                <div class="leave-cate-multi-add">
                                    <select class="form-select create-select section_sub_title leave-edit-input" aria-label="Default select example">
                                        <option>Lapse</option>
                                        <option value="carry">Carry Forward</option>
                                        <option value="encash">Encash</option>
                                    </select>
                                </div>
                            </div>
                            <div class="leave-cate-edit">
                                <label class="shift-type-label">Encashment/Carry Forward Limit</label>
                                <button class="leave-edit-add-btn proxima_nova_semibold">Add</button>
                                <div class="leave-cate-multi-add">
                                    <div class="leave-cate-inner">
                                        <input type="number" class="form-control shift-edit-input leave-edit-input leave-carry-forward" placeholder="0">
                                        <div class="leave-text-sub">Days</div>
                                    </div>
                                    <div class="leave-carry-sub-text">No Carry Forward</div>
                                </div>
                                <div class="leave-cate-multi-add-2">
                                    <div class="leave-cate-inner">
                                        <input type="number" class="form-control shift-edit-input leave-edit-input leave-carry-forward" placeholder="0">
                                        <div class="leave-text-sub">Days</div>
                                    </div>
                                    <div class="leave-carry-sub-text">No Encashment</div>
                                </div>
                            </div>
                            <div class="leave-cate-edit">
                                <div class="leave-data-delete-main">
                                    <button class="leave-cate-data-delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.32085 4.8749C3.42492 4.76287 3.57092 4.69922 3.72383 4.69922H14.2493C14.402 4.69922 14.5478 4.76268 14.6518 4.87442C14.7559 4.98615 14.8088 5.13611 14.7979 5.28839L14.1477 14.3949C14.0708 15.4677 13.1783 16.2992 12.1028 16.2992H5.89283C4.81935 16.2992 3.92801 15.4709 3.84811 14.4004L3.17532 5.28972C3.16406 5.13723 3.21679 4.98694 3.32085 4.8749ZM12.1028 15.1992C12.6009 15.1992 13.0148 14.8141 13.0505 14.3164L13.6587 5.79922H4.31594L4.94505 14.3185C4.94505 14.3185 4.94506 14.3186 4.94505 14.3185C4.98219 14.8155 5.39584 15.1992 5.89283 15.1992H12.1028Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99922 7.69922C9.30298 7.69922 9.54922 7.94546 9.54922 8.24922V12.7492C9.54922 13.053 9.30298 13.2992 8.99922 13.2992C8.69546 13.2992 8.44922 13.053 8.44922 12.7492V8.24922C8.44922 7.94546 8.69546 7.69922 8.99922 7.69922Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.44922 5.24922C2.44922 4.94546 2.69546 4.69922 2.99922 4.69922H14.9992C15.303 4.69922 15.5492 4.94546 15.5492 5.24922C15.5492 5.55298 15.303 5.79922 14.9992 5.79922H2.99922C2.69546 5.79922 2.44922 5.55298 2.44922 5.24922Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.49416 3.02953C5.79441 2.22921 6.55906 1.69922 7.41387 1.69922H10.5849C11.4397 1.69922 12.2043 2.22921 12.5046 3.02953L13.2644 5.05614C13.371 5.34057 13.2269 5.65758 12.9424 5.76422C12.658 5.87085 12.341 5.72672 12.2344 5.44229L11.4747 3.41591C11.4746 3.41587 11.4747 3.41595 11.4747 3.41591C11.3354 3.04479 10.981 2.79922 10.5849 2.79922H7.41387C7.01771 2.79922 6.6634 3.04467 6.52411 3.41579C6.5241 3.41583 6.52413 3.41576 6.52411 3.41579L5.76436 5.44229C5.65773 5.72672 5.34072 5.87085 5.05629 5.76422C4.77187 5.65758 4.62774 5.34057 4.73437 5.05614L5.49416 3.02953Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6111 7.70065C11.914 7.72236 12.142 7.98558 12.1203 8.28856L11.7978 12.7886C11.7761 13.0915 11.5129 13.3195 11.2099 13.2978C10.9069 13.2761 10.6789 13.0129 10.7006 12.7099L11.0231 8.20993C11.0449 7.90695 11.3081 7.67894 11.6111 7.70065Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.38766 7.70065C6.69064 7.67894 6.95386 7.90695 6.97557 8.20993L7.29807 12.7099C7.31978 13.0129 7.09177 13.2761 6.78879 13.2978C6.48581 13.3195 6.2226 13.0915 6.20088 12.7886L5.87838 8.28856C5.85667 7.98558 6.08468 7.72236 6.38766 7.70065Z" fill="#808080" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="leave-data-delete-main-sec">
                                    <button class="leave-cate-data-delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.32085 4.8749C3.42492 4.76287 3.57092 4.69922 3.72383 4.69922H14.2493C14.402 4.69922 14.5478 4.76268 14.6518 4.87442C14.7559 4.98615 14.8088 5.13611 14.7979 5.28839L14.1477 14.3949C14.0708 15.4677 13.1783 16.2992 12.1028 16.2992H5.89283C4.81935 16.2992 3.92801 15.4709 3.84811 14.4004L3.17532 5.28972C3.16406 5.13723 3.21679 4.98694 3.32085 4.8749ZM12.1028 15.1992C12.6009 15.1992 13.0148 14.8141 13.0505 14.3164L13.6587 5.79922H4.31594L4.94505 14.3185C4.94505 14.3185 4.94506 14.3186 4.94505 14.3185C4.98219 14.8155 5.39584 15.1992 5.89283 15.1992H12.1028Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99922 7.69922C9.30298 7.69922 9.54922 7.94546 9.54922 8.24922V12.7492C9.54922 13.053 9.30298 13.2992 8.99922 13.2992C8.69546 13.2992 8.44922 13.053 8.44922 12.7492V8.24922C8.44922 7.94546 8.69546 7.69922 8.99922 7.69922Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.44922 5.24922C2.44922 4.94546 2.69546 4.69922 2.99922 4.69922H14.9992C15.303 4.69922 15.5492 4.94546 15.5492 5.24922C15.5492 5.55298 15.303 5.79922 14.9992 5.79922H2.99922C2.69546 5.79922 2.44922 5.55298 2.44922 5.24922Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.49416 3.02953C5.79441 2.22921 6.55906 1.69922 7.41387 1.69922H10.5849C11.4397 1.69922 12.2043 2.22921 12.5046 3.02953L13.2644 5.05614C13.371 5.34057 13.2269 5.65758 12.9424 5.76422C12.658 5.87085 12.341 5.72672 12.2344 5.44229L11.4747 3.41591C11.4746 3.41587 11.4747 3.41595 11.4747 3.41591C11.3354 3.04479 10.981 2.79922 10.5849 2.79922H7.41387C7.01771 2.79922 6.6634 3.04467 6.52411 3.41579C6.5241 3.41583 6.52413 3.41576 6.52411 3.41579L5.76436 5.44229C5.65773 5.72672 5.34072 5.87085 5.05629 5.76422C4.77187 5.65758 4.62774 5.34057 4.73437 5.05614L5.49416 3.02953Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6111 7.70065C11.914 7.72236 12.142 7.98558 12.1203 8.28856L11.7978 12.7886C11.7761 13.0915 11.5129 13.3195 11.2099 13.2978C10.9069 13.2761 10.6789 13.0129 10.7006 12.7099L11.0231 8.20993C11.0449 7.90695 11.3081 7.67894 11.6111 7.70065Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.38766 7.70065C6.69064 7.67894 6.95386 7.90695 6.97557 8.20993L7.29807 12.7099C7.31978 13.0129 7.09177 13.2761 6.78879 13.2978C6.48581 13.3195 6.2226 13.0915 6.20088 12.7886L5.87838 8.28856C5.85667 7.98558 6.08468 7.72236 6.38766 7.70065Z" fill="#808080" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="leave-data-delete-main-third">
                                    <button class="leave-cate-data-delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.32085 4.8749C3.42492 4.76287 3.57092 4.69922 3.72383 4.69922H14.2493C14.402 4.69922 14.5478 4.76268 14.6518 4.87442C14.7559 4.98615 14.8088 5.13611 14.7979 5.28839L14.1477 14.3949C14.0708 15.4677 13.1783 16.2992 12.1028 16.2992H5.89283C4.81935 16.2992 3.92801 15.4709 3.84811 14.4004L3.17532 5.28972C3.16406 5.13723 3.21679 4.98694 3.32085 4.8749ZM12.1028 15.1992C12.6009 15.1992 13.0148 14.8141 13.0505 14.3164L13.6587 5.79922H4.31594L4.94505 14.3185C4.94505 14.3185 4.94506 14.3186 4.94505 14.3185C4.98219 14.8155 5.39584 15.1992 5.89283 15.1992H12.1028Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99922 7.69922C9.30298 7.69922 9.54922 7.94546 9.54922 8.24922V12.7492C9.54922 13.053 9.30298 13.2992 8.99922 13.2992C8.69546 13.2992 8.44922 13.053 8.44922 12.7492V8.24922C8.44922 7.94546 8.69546 7.69922 8.99922 7.69922Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.44922 5.24922C2.44922 4.94546 2.69546 4.69922 2.99922 4.69922H14.9992C15.303 4.69922 15.5492 4.94546 15.5492 5.24922C15.5492 5.55298 15.303 5.79922 14.9992 5.79922H2.99922C2.69546 5.79922 2.44922 5.55298 2.44922 5.24922Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.49416 3.02953C5.79441 2.22921 6.55906 1.69922 7.41387 1.69922H10.5849C11.4397 1.69922 12.2043 2.22921 12.5046 3.02953L13.2644 5.05614C13.371 5.34057 13.2269 5.65758 12.9424 5.76422C12.658 5.87085 12.341 5.72672 12.2344 5.44229L11.4747 3.41591C11.4746 3.41587 11.4747 3.41595 11.4747 3.41591C11.3354 3.04479 10.981 2.79922 10.5849 2.79922H7.41387C7.01771 2.79922 6.6634 3.04467 6.52411 3.41579C6.5241 3.41583 6.52413 3.41576 6.52411 3.41579L5.76436 5.44229C5.65773 5.72672 5.34072 5.87085 5.05629 5.76422C4.77187 5.65758 4.62774 5.34057 4.73437 5.05614L5.49416 3.02953Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6111 7.70065C11.914 7.72236 12.142 7.98558 12.1203 8.28856L11.7978 12.7886C11.7761 13.0915 11.5129 13.3195 11.2099 13.2978C10.9069 13.2761 10.6789 13.0129 10.7006 12.7099L11.0231 8.20993C11.0449 7.90695 11.3081 7.67894 11.6111 7.70065Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.38766 7.70065C6.69064 7.67894 6.95386 7.90695 6.97557 8.20993L7.29807 12.7099C7.31978 13.0129 7.09177 13.2761 6.78879 13.2978C6.48581 13.3195 6.2226 13.0915 6.20088 12.7886L5.87838 8.28856C5.85667 7.98558 6.08468 7.72236 6.38766 7.70065Z" fill="#808080" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="add-leave-category">
                            <a href="" class="proxima_nova_bold">+ Add Leave Category</a>
                        </div>
                    </div>
                    <h2 class="proxima_nova_semibold leave-catego-title">Leave Approval</h2>
                    <div class="shift-main-inner-edit steff-paymeny-detail leave-main-bottom-sec">
                        <div class="leave-approleft-sec">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.33226 2.64766C3.84981 2.64766 2.64753 3.84993 2.64753 5.33238V10.6679C2.64753 12.1504 3.84981 13.3527 5.33226 13.3527H10.6678C12.1503 13.3527 13.3525 12.1504 13.3525 10.6679V5.33238C13.3525 3.84993 12.1503 2.64766 10.6678 2.64766H5.33226ZM1.34753 5.33238C1.34753 3.13196 3.13184 1.34766 5.33226 1.34766H10.6678C12.8682 1.34766 14.6525 3.13196 14.6525 5.33238V10.6679C14.6525 12.8684 12.8682 14.6527 10.6678 14.6527H5.33226C3.13184 14.6527 1.34753 12.8684 1.34753 10.6679V5.33238Z" fill="#808080" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.08192 5.50149C7.0797 4.99121 7.49368 4.58203 7.99798 4.58203C8.50295 4.58203 8.91539 4.99057 8.91539 5.49877C8.91539 6.00503 8.5049 6.4155 7.99865 6.4155C7.4933 6.4155 7.08338 6.00648 7.08192 5.50149Z" fill="#808080" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.74988 7.62305C6.74988 7.20883 7.08566 6.87305 7.49988 6.87305H8.16682C8.58104 6.87305 8.91682 7.20883 8.91682 7.62305V10.791C8.91682 11.2052 8.58104 11.541 8.16682 11.541C7.75261 11.541 7.41682 11.2052 7.41682 10.791V8.3685C7.04169 8.32717 6.74988 8.00919 6.74988 7.62305Z" fill="#808080" />
                            </svg>
                            <p class="section_sub_title">Multilevel Approval Settings is set to Level 1 by default</p>
                        </div>
                        <div class="set-multi-btn create-data dropdown-toggle proxima_nova_bold active" data-bs-toggle="offcanvas" data-bs-target="#create-toggle-right" aria-controls="create-toggle-right">
                            <button name="" class="set-appro-btn proxima_nova_semibold">Set Multilevel Approval</button>
                        </div>
                    </div> -->
                </div>
            </form>
        </div>
        <div class="leave-policy-edit-btn">
            <button name="" id="save_leave_policy_btn" class="save-staff-btn proxima_nova_semibold">Save
                <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
            </button>
        </div>
        <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="create-toggle-right"
            data-bs-scroll="true" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <div class="popup-close-btns" data-bs-dismiss="offcanvas" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.84154 2.84056C3.07296 2.60914 3.44817 2.60914 3.67959 2.84056L13.1611 12.322C13.3925 12.5535 13.3925 12.9287 13.1611 13.1601C12.9296 13.3915 12.5544 13.3915 12.323 13.1601L2.84154 3.67861C2.61011 3.44719 2.61011 3.07198 2.84154 2.84056Z" fill="#808080" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1611 2.84056C13.3925 3.07198 13.3925 3.44719 13.1611 3.67861L3.67959 13.1601C3.44817 13.3915 3.07296 13.3915 2.84154 13.1601C2.61011 12.9287 2.61011 12.5535 2.84154 12.322L12.323 2.84056C12.5544 2.60914 12.9296 2.60914 13.1611 2.84056Z" fill="#808080" />
                    </svg>
                </div>
            </div>
            <div class="offcanvas-body ">
                <h5 class="section_title_heading proxima_nova_bold download-work-main-header filter-title-main">Set Multilevel Approval</h5>
                <hr>
                <div class="filter-sub-sec">
                    <form method="">
                        <div class="daily-work-select">
                            <h2 class="set-multi-text section_sub_title">Choose Type of Approval</h2>
                            <!-- <div class="shift-inner-sub-label-edit"> -->
                            <select class="form-select create-select section_sub_title" aria-label="Default select example">
                                <option>Level One</option>
                                <option value="start">Level Two</option>
                                <option value="end">Level Three</option>
                            </select>
                            <!-- </div> -->
                        </div>
                        <div class="daily-work-select right-model">
                            <ul class="navigation_tabs" id="navigation_tabs">
                                <li class="tab_active">
                                    <div class="nav-active">
                                        <h2 class="section_sub_title tab-model-title proxima_nova_semibold">First Approval By</h2>
                                        <select class="form-select create-select section_sub_title" aria-label="Default select example">
                                            <option>Manager</option>
                                            <option value="start">Admin</option>
                                            <option value="end">Employer</option>
                                        </select>
                                    </div>
                                </li>
                                <li class="tab_active">
                                    <div class="nav-active">
                                        <h2 class="section_sub_title tab-model-title proxima_nova_semibold">Second Approval By</h2>
                                        <select class="form-select create-select section_sub_title" aria-label="Default select example">
                                            <option>Manager</option>
                                            <option value="start" selected>Admin</option>
                                            <option value="end">Employer</option>
                                        </select>
                                    </div>
                                </li>
                                <li class="tab_active">
                                    <div class="nav-active">
                                        <h2 class="section_sub_title tab-model-title proxima_nova_semibold">Third Approval By</h2>
                                        <select class="form-select create-select section_sub_title" aria-label="Default select example">
                                            <option>Manager</option>
                                            <option value="start">Admin</option>
                                            <option value="end" selected>Employer</option>
                                        </select>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- <div class="download-cancel-btns-main"> -->
                        <div class="policy-edit-save-btn">
                            <button name="" class="download-btn proxima_nova_semibold">Save</button>
                        </div>
                        <!-- </div> -->
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('scripts')
    <script>

        $('.leave-policy-time.date').datepicker({
            format: 'M yyyy',
            startView: 'months',
            minViewMode: 'months',
            autoclose: true
        });
        $('.leave-policy-to-time.date').datepicker({
            format: 'M yyyy',
            startView: 'months',
            minViewMode: 'months',
            autoclose: true
        });
<<<<<<< HEAD
        var currentDate = new Date();
        $('.leave-policy-time.date').datepicker('setDate', new Date(currentDate.getFullYear(), currentDate.getMonth(), 1));
        $('.leave-policy-to-time.date').datepicker('setDate', new Date(currentDate.getFullYear(), 11, 31));
        $("#policy_cycle_monthly").change(function(){
            $('#leave_start_period').prop('disabled', false);
            $('#leave_end_period').prop('disabled', true);

        });
        $("#policy_cycle_yearly").change(function(){
            $('#leave_end_period').prop('disabled', false);
        });

        function fieldValidation() {
            var valid = true;
            $(".error").remove();
            if ($('#template_name').val() == "") {
                $("#template_name").after(
                    '<span class="error error_message proxima_nova_semibold">Template name field is required</span>'
                );
                valid = false;
            }
            if ($('#number_of_leaves').val() == "") {
                $("#number_of_leaves").after(
                    '<span class="error error_message proxima_nova_semibold">Number of Leaves name field is required</span>'
                );
                valid = false;
            }
            // if($('#leave_end_period').prop('disabled', false) || $('#leave_start_period').prop('disabled', false)){
            //     $(".leave-edit-inner").after(
            //         '<span class="error error_message proxima_nova_semibold">Leave Period name field is required</span>'
            //     );
            //     valid = false;
            // }

            return valid;
        }

        $('#save_leave_policy_btn').click(function(e){
            e.preventDefault();
            if(fieldValidation()){
                var formData = new FormData($('#save_leave_policy')[0]);
                $('.loader').show();
                $('#save_leave_policy_btn').prop('disabled', true);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ route('add_edit_leave_policy') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response['status'] == 1) {
                            toastr["success"](response.message);
                            setTimeout(function () {
                                var redirectUrl = "{{ url('setting/leave_policy') }}"
                                window.location.href = redirectUrl;
                            }, 3000);
                        }else{
                            toastr["error"](response.message)
                        }
                    }
                });
            }
        })
=======
        $('.leave-policy-time.date').datepicker('setDate', new Date('2023-01-01'));
        $('.leave-policy-to-time.date').datepicker('setDate', new Date('2023-12-01'));
>>>>>>> 9ee7d98de403d43c1e001aefae0ecaf8228cb55b
        
    </script>
@endsection