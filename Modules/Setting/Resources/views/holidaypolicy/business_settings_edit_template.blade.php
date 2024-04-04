@extends('admin.layout.main')
@section('title')
<title>{{env('APP_NAME')}} | Holiday Template</title>
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
                    <h4 class="page-title pull-left proxima_nova_semibold">
                        @if($holiday_template)
                        Edit Holiday Calendar Template
                        @else
                        Create Holiday Calendar Template
                        @endif
                    </h4>
                </div>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{route('setting')}}">Settings</a></li>
                    <li class="section_sub_title">/ Business settings</li>
                    <li class="section_sub_title">/ Holiday Policy</li>
                    <li class="section_sub_title">/ @if($holiday_template)
                        Edit Holiday Calendar Template
                        @else
                        Create Holiday Calendar Template
                        @endif</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
@if($holiday_template)
<div class="main-content-inner leave-policy-main">
    <form action="" id="add_holiday_template" method="post" class="add_holiday_template_form">
        @csrf
        <input type="hidden" name="id" value="{{$holiday_template['id']}}">
        <div class="">
            <div class="holiday-policy-edit">
                <div class="holiday-sub-policy">
                    <div>
                        <label class="shift-type-label">Template Name</label>
                    </div>
                    <div>
                        <input type="text" name="template_name" id="template_name" class="form-control shift-edit-input"
                            placeholder="Enter Template Name" value="{{$holiday_template['name']}}">
                    </div>
                </div>
                <div id="shift_time">
                    <div>
                        <label class="shift-type-label">Shift Time</label>
                    </div>
                    <div class="policy-weekly-shifttime">
                        <div class="policy-inner-time">
                            <div class="policy-start-time">
                                <input type="text" name="shift_start_time" id="shift_start_time"
                                    class="input-group-addon staff-salary form-control shift-edit-input weekly-policy-level"
                                    placeholder="Enter Start Time" value="{{$holiday_template['shift_start_time']}}">
                            </div>
                            <p>To</p>
                            <div class="policy-start-to-time">
                                <input type="text" name="shift_end_time" id="shift_end_time"
                                    class="input-group-addon staff-salary form-control shift-edit-input weekly-policy-level"
                                    placeholder="Enter End Time" value="{{$holiday_template['shift_end_time']}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="holiday-policy-edit-sec">

            <h2 class="section_title proxima_nova_semibold">Holiday's</h2>
            <div id="add_holiday">+ Add Holiday</div>
        </div>

        <div class="holiday-policy-edit-third">
            <div class="holiday-date-sub">
                <div class="policy-weekly-holiday-date">
                    <!-- <div class="policy-holiday">
                        <label class="shift-type-label">Holiday Name</label>
                    </div>
                    <div class="policy-holiday">
                        <label class="shift-type-label">Holiday Date</label>
                    </div> -->
                </div>
                @foreach($holiday_list as $holidays)
                    <div class="policy-weekly-holiday">
                        <div class="policy-holiday-inner">
                            <div class="policy-holiday">
                                <label class="shift-type-label">Holiday Name</label>
                            </div>
                            <div class="main-holiday-input">
                                <input type="text" class="holiday_name form-control shift-edit-input holiday-input"
                                    placeholder="Enter Holiday Name" name="holiday_name"
                                    value="{{$holidays['holiday_name']}}">
                            </div>
                        </div>
                        <div class="policy-date-inner">
                            <div class="holiday_policy_date">
                                <div class="policy-holiday">
                                    <label class="shift-type-label">Holiday Date</label>
                                </div>
                                <input type="text" class="holiday_date form-control shift-edit-input holiday-input"
                                    readonly="true" placeholder="Select Date" name="holiday_date"
                                    value="{{$holidays['holiday_date']}}">
                            </div>
                            <div class="total-delete-icon first-icon-delete" data-id="{{$holidays['id']}}" data-bs-toggle="offcanvas" data-bs-target="#deleteholidayModal" aria-controls="deleteholidayModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M3.32085 4.8749C3.42492 4.76287 3.57092 4.69922 3.72383 4.69922H14.2493C14.402 4.69922 14.5478 4.76268 14.6518 4.87442C14.7559 4.98615 14.8088 5.13611 14.7979 5.28839L14.1477 14.3949C14.0708 15.4677 13.1783 16.2992 12.1028 16.2992H5.89283C4.81935 16.2992 3.92801 15.4709 3.84811 14.4004L3.17532 5.28972C3.16406 5.13723 3.21679 4.98694 3.32085 4.8749ZM12.1028 15.1992C12.6009 15.1992 13.0148 14.8141 13.0505 14.3164L13.6587 5.79922H4.31594L4.94505 14.3185C4.94505 14.3185 4.94506 14.3186 4.94505 14.3185C4.98219 14.8155 5.39584 15.1992 5.89283 15.1992H12.1028Z"
                                        fill="#808080" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.99922 7.69922C9.30298 7.69922 9.54922 7.94546 9.54922 8.24922V12.7492C9.54922 13.053 9.30298 13.2992 8.99922 13.2992C8.69546 13.2992 8.44922 13.053 8.44922 12.7492V8.24922C8.44922 7.94546 8.69546 7.69922 8.99922 7.69922Z"
                                        fill="#808080" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2.44922 5.24922C2.44922 4.94546 2.69546 4.69922 2.99922 4.69922H14.9992C15.303 4.69922 15.5492 4.94546 15.5492 5.24922C15.5492 5.55298 15.303 5.79922 14.9992 5.79922H2.99922C2.69546 5.79922 2.44922 5.55298 2.44922 5.24922Z"
                                        fill="#808080" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.49416 3.02953C5.79441 2.22921 6.55906 1.69922 7.41387 1.69922H10.5849C11.4397 1.69922 12.2043 2.22921 12.5046 3.02953L13.2644 5.05614C13.371 5.34057 13.2269 5.65758 12.9424 5.76422C12.658 5.87085 12.341 5.72672 12.2344 5.44229L11.4747 3.41591C11.4746 3.41587 11.4747 3.41595 11.4747 3.41591C11.3354 3.04479 10.981 2.79922 10.5849 2.79922H7.41387C7.01771 2.79922 6.6634 3.04467 6.52411 3.41579C6.5241 3.41583 6.52413 3.41576 6.52411 3.41579L5.76436 5.44229C5.65773 5.72672 5.34072 5.87085 5.05629 5.76422C4.77187 5.65758 4.62774 5.34057 4.73437 5.05614L5.49416 3.02953Z"
                                        fill="#808080" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.6111 7.70065C11.914 7.72236 12.142 7.98558 12.1203 8.28856L11.7978 12.7886C11.7761 13.0915 11.5129 13.3195 11.2099 13.2978C10.9069 13.2761 10.6789 13.0129 10.7006 12.7099L11.0231 8.20993C11.0449 7.90695 11.3081 7.67894 11.6111 7.70065Z"
                                        fill="#808080" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.38766 7.70065C6.69064 7.67894 6.95386 7.90695 6.97557 8.20993L7.29807 12.7099C7.31978 13.0129 7.09177 13.2761 6.78879 13.2978C6.48581 13.3195 6.2226 13.0915 6.20088 12.7886L5.87838 8.28856C5.85667 7.98558 6.08468 7.72236 6.38766 7.70065Z"
                                        fill="#808080" />
                                </svg>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </form>
    <div>
        <div class="create-leave-bttn">
            <button class="reject-btn proxima_nova_semibold" data-bs-toggle="offcanvas" data-bs-target="#deleteModal" aria-controls="deleteModal">Delete
                <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
            </button>
            <button class="createleave-btn-btn proxima_nova_semibold" id="save_template">Save
                <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
            </button>
        </div>
    </div>

    <div class="offcanvas offcanvas-end daily-work-data-download holiday_offcanvas" tabindex="-1" id="deleteholidayModal"
        data-bs-scroll="true" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <div class="popup-close-btns" data-bs-dismiss="offcanvas" aria-label="Close"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                        fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M2.84154 2.84056C3.07296 2.60914 3.44817 2.60914 3.67959 2.84056L13.1611 12.322C13.3925 12.5535 13.3925 12.9287 13.1611 13.1601C12.9296 13.3915 12.5544 13.3915 12.323 13.1601L2.84154 3.67861C2.61011 3.44719 2.61011 3.07198 2.84154 2.84056Z"
                        fill="#808080" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M13.1611 2.84056C13.3925 3.07198 13.3925 3.44719 13.1611 3.67861L3.67959 13.1601C3.44817 13.3915 3.07296 13.3915 2.84154 13.1601C2.61011 12.9287 2.61011 12.5535 2.84154 12.322L12.323 2.84056C12.5544 2.60914 12.9296 2.60914 13.1611 2.84056Z" fill="#808080" />
                </svg>
            </div>
        </div>
        <div class="offcanvas-body overflow-auto">
            <h5 class="section_title_heading proxima_nova_bold download-work-main-header filter-title-main">Delete Holiday</h5>
            <hr>
            <div class="staff_view_delete_title">
                <h5>Are you sure to delete this holiday?</h5>
            </div>
            <div class="filter-sub-sec">
                <div class="download-cancel-btns-main">
                    <div class="download-cancel-btn mb-0">
                        <button type="submit" name="" class="download-btn proxima_nova_semibold w-100 close_delete_modal" data-id="{{$holiday_template['id']}}" data-bs-dismiss="offcanvas" aria-label="Close" id="delete_template_holiday">Delete
                            <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                        </button>
                        <button type="submit" name="" class="download-btn proxima_nova_semibold w-100 cancel_modal" data-bs-dismiss="offcanvas" aria-label="Close">Cancel
                            <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end daily-work-data-download holiday_offcanvas" tabindex="-1" id="deleteModal"
        data-bs-scroll="true" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <div class="popup-close-btns" data-bs-dismiss="offcanvas" aria-label="Close"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                        fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M2.84154 2.84056C3.07296 2.60914 3.44817 2.60914 3.67959 2.84056L13.1611 12.322C13.3925 12.5535 13.3925 12.9287 13.1611 13.1601C12.9296 13.3915 12.5544 13.3915 12.323 13.1601L2.84154 3.67861C2.61011 3.44719 2.61011 3.07198 2.84154 2.84056Z"
                        fill="#808080" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M13.1611 2.84056C13.3925 3.07198 13.3925 3.44719 13.1611 3.67861L3.67959 13.1601C3.44817 13.3915 3.07296 13.3915 2.84154 13.1601C2.61011 12.9287 2.61011 12.5535 2.84154 12.322L12.323 2.84056C12.5544 2.60914 12.9296 2.60914 13.1611 2.84056Z" fill="#808080" />
                </svg>
            </div>
        </div>
        <div class="offcanvas-body overflow-auto">
            <h5 class="section_title_heading proxima_nova_bold download-work-main-header filter-title-main">Delete Holiday Template</h5>
            <hr>
            <div class="staff_view_delete_title">
                <h5>Are you sure to delete this holiday template?</h5>
            </div>
            <div class="filter-sub-sec">
                <div class="download-cancel-btns-main">
                    <div class="download-cancel-btn mb-0">
                        <button type="submit" name="" class="download-btn proxima_nova_semibold w-100 close_delete_modal" data-id="{{$holiday_template['id']}}" data-bs-dismiss="offcanvas" aria-label="Close" id="delete_template">Delete
                            <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                        </button>
                        <button type="submit" name="" class="download-btn proxima_nova_semibold w-100 cancel_modal" data-bs-dismiss="offcanvas" aria-label="Close">Cancel
                            <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
    <div class="main-content-inner leave-policy-main">
        <form action="" id="add_holiday_template" method="post" class="edit_holiday_calendar_template_form">
            @csrf
            <div class="">
                <div class="holiday-policy-edit">
                    <div class="holiday-sub-policy">
                        <div>
                            <label class="shift-type-label">Template Name</label>
                        </div>
                        <div>
                            <input type="text" name="template_name" id="template_name" class="form-control shift-edit-input"
                                placeholder="Enter Template Name">
                        </div>
                    </div>
                    <div id="shift_time">
                        <div>
                            <label class="shift-type-label">Shift Time</label>
                        </div>
                        <div class="policy-weekly-shifttime">
                            <div class="policy-inner-time">
                                <div class="policy-start-time">
                                    <input type="text" name="shift_start_time" id="shift_start_time"
                                        class="input-group-addon staff-salary form-control shift-edit-input weekly-policy-level"
                                        placeholder="Select Time">
                                </div>
                                <p>To</p>
                                <div class="policy-start-to-time">
                                    <input type="text" name="shift_end_time" id="shift_end_time"
                                        class="input-group-addon staff-salary form-control shift-edit-input weekly-policy-level"
                                        placeholder="Select Time">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="holiday-policy-edit-sec">

                <h2 class="section_title proxima_nova_semibold">Holiday's</h2>
                <div id="add_holiday">+ Add Holiday</div>
            </div>

            <div class="holiday-policy-edit-third">
                <div class="holiday-date-sub">
                    <div class="policy-weekly-holiday-date">
                        <!-- <div class="policy-holiday">
                            <label class="shift-type-label">Holiday Name</label>
                        </div>
                        <div class="policy-holiday">
                            <label class="shift-type-label">Holiday Date</label>
                        </div> -->
                    </div>
                    <div class="policy-weekly-holiday">
                        <div class="policy-holiday-inner">
                            <div class="policy-holiday">
                                <label class="shift-type-label">Holiday Name</label>
                            </div>
                            <div class="main-holiday-input">
                                <input type="text" class="holiday_name form-control shift-edit-input holiday-input"
                                    placeholder="Enter Holiday Name" name="holiday_name">
                            </div>
                        </div>
                        <div class="policy-date-inner">
                            <div class="policy-holiday-inner">
                                <div class="policy-holiday">
                                    <label class="shift-type-label">Holiday Date</label>
                                </div>
                                <input type="text" class="holiday_date form-control shift-edit-input holiday-input"
                                    readonly="true" placeholder="Select Date" name="holiday_date">
                            </div>
                            <div class="total-delete-icon delete_holiday_from_list first-icon-delete" data-id="" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M3.32085 4.8749C3.42492 4.76287 3.57092 4.69922 3.72383 4.69922H14.2493C14.402 4.69922 14.5478 4.76268 14.6518 4.87442C14.7559 4.98615 14.8088 5.13611 14.7979 5.28839L14.1477 14.3949C14.0708 15.4677 13.1783 16.2992 12.1028 16.2992H5.89283C4.81935 16.2992 3.92801 15.4709 3.84811 14.4004L3.17532 5.28972C3.16406 5.13723 3.21679 4.98694 3.32085 4.8749ZM12.1028 15.1992C12.6009 15.1992 13.0148 14.8141 13.0505 14.3164L13.6587 5.79922H4.31594L4.94505 14.3185C4.94505 14.3185 4.94506 14.3186 4.94505 14.3185C4.98219 14.8155 5.39584 15.1992 5.89283 15.1992H12.1028Z"
                                        fill="#808080" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.99922 7.69922C9.30298 7.69922 9.54922 7.94546 9.54922 8.24922V12.7492C9.54922 13.053 9.30298 13.2992 8.99922 13.2992C8.69546 13.2992 8.44922 13.053 8.44922 12.7492V8.24922C8.44922 7.94546 8.69546 7.69922 8.99922 7.69922Z"
                                        fill="#808080" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2.44922 5.24922C2.44922 4.94546 2.69546 4.69922 2.99922 4.69922H14.9992C15.303 4.69922 15.5492 4.94546 15.5492 5.24922C15.5492 5.55298 15.303 5.79922 14.9992 5.79922H2.99922C2.69546 5.79922 2.44922 5.55298 2.44922 5.24922Z"
                                        fill="#808080" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.49416 3.02953C5.79441 2.22921 6.55906 1.69922 7.41387 1.69922H10.5849C11.4397 1.69922 12.2043 2.22921 12.5046 3.02953L13.2644 5.05614C13.371 5.34057 13.2269 5.65758 12.9424 5.76422C12.658 5.87085 12.341 5.72672 12.2344 5.44229L11.4747 3.41591C11.4746 3.41587 11.4747 3.41595 11.4747 3.41591C11.3354 3.04479 10.981 2.79922 10.5849 2.79922H7.41387C7.01771 2.79922 6.6634 3.04467 6.52411 3.41579C6.5241 3.41583 6.52413 3.41576 6.52411 3.41579L5.76436 5.44229C5.65773 5.72672 5.34072 5.87085 5.05629 5.76422C4.77187 5.65758 4.62774 5.34057 4.73437 5.05614L5.49416 3.02953Z"
                                        fill="#808080" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.6111 7.70065C11.914 7.72236 12.142 7.98558 12.1203 8.28856L11.7978 12.7886C11.7761 13.0915 11.5129 13.3195 11.2099 13.2978C10.9069 13.2761 10.6789 13.0129 10.7006 12.7099L11.0231 8.20993C11.0449 7.90695 11.3081 7.67894 11.6111 7.70065Z"
                                        fill="#808080" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.38766 7.70065C6.69064 7.67894 6.95386 7.90695 6.97557 8.20993L7.29807 12.7099C7.31978 13.0129 7.09177 13.2761 6.78879 13.2978C6.48581 13.3195 6.2226 13.0915 6.20088 12.7886L5.87838 8.28856C5.85667 7.98558 6.08468 7.72236 6.38766 7.70065Z"
                                        fill="#808080" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="create-leave-bttn">
            <button class="reject-btn proxima_nova_semibold"  disabled>Delete
                <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
            </button>
            <button class="createleave-btn-btn proxima_nova_semibold" id="save_template">Save
                <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
            </button>
        </div>
    </div>
@endif
@endsection

@section('scripts')
<script>

    $('.staff-salary').datepicker({
        format: 'M yyyy',
        startView: 'months',
        minViewMode: 'months',
        autoclose: true,
    });

    // $('.staff-salary').datepicker('setDate', new Date());

    function fieldValidation() {
        var valid = true;
        $(".error").remove();
        if ($('#template_name').val() == "") {
            $("#template_name").after(
                '<span class="error error_message proxima_nova_semibold">Template name is required.</span>'
            );
            valid = false;
        }
        if ($('#shift_start_time').val() == "" || $('#shift_end_time').val() == "") {
            $(".policy-inner-time").after(
                '<span class="error error_message proxima_nova_semibold">Shift Time is required.</span>'
            );
            valid = false;
        }

        // if ($('.holiday-input').val().trim() == '' && $('.holiday_date').val().trim() == '') {
        //     $(".policy-inner-time").after(
        //         '<span class="error error_message proxima_nova_semibold">Add at least one holiday and holiday date.</span>'
        //     );
        //     valid = false;
        // }
        return valid;
    }

    // Handle click event on delete icon
    $('.holiday-date-sub').on('click', '.delete_holiday_from_list', function () {
        var holidayContainer = $(this).closest('.policy-weekly-holiday');
        holidayContainer.remove();
    });

    // Handle click event on "Add Holiday" button
    $("#add_holiday").on("click", function () {

        var newInput = $('<div><div class="policy-weekly-holiday"><div class="policy-holiday-inner"><div class="policy-holiday append-policy-data"><label class="shift-type-label">Holiday Name</label>    </div>    <div class="main-holiday-input"><input type="text" class="holiday_name form-control shift-edit-input holiday-input" placeholder="Enter Holiday Name" name="holiday_name">    </div></div><div class="policy-date-inner"><div class="policy-holiday-inner"><div class="policy-holiday append-policy-data"><label class="shift-type-label">Holiday Date</label></div><input type="text" class="holiday_date form-control shift-edit-input holiday-input" readonly="true" placeholder="Select Date" name="holiday_date" value=""></div><div class="total-delete-icon delete_holiday_from_list" data-id=""><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"    fill="none">    <path fill-rule="evenodd" clip-rule="evenodd"        d="M3.32085 4.8749C3.42492 4.76287 3.57092 4.69922 3.72383 4.69922H14.2493C14.402 4.69922 14.5478 4.76268 14.6518 4.87442C14.7559 4.98615 14.8088 5.13611 14.7979 5.28839L14.1477 14.3949C14.0708 15.4677 13.1783 16.2992 12.1028 16.2992H5.89283C4.81935 16.2992 3.92801 15.4709 3.84811 14.4004L3.17532 5.28972C3.16406 5.13723 3.21679 4.98694 3.32085 4.8749ZM12.1028 15.1992C12.6009 15.1992 13.0148 14.8141 13.0505 14.3164L13.6587 5.79922H4.31594L4.94505 14.3185C4.94505 14.3185 4.94506 14.3186 4.94505 14.3185C4.98219 14.8155 5.39584 15.1992 5.89283 15.1992H12.1028Z"        fill="#808080" />    <path fill-rule="evenodd" clip-rule="evenodd"        d="M8.99922 7.69922C9.30298 7.69922 9.54922 7.94546 9.54922 8.24922V12.7492C9.54922 13.053 9.30298 13.2992 8.99922 13.2992C8.69546 13.2992 8.44922 13.053 8.44922 12.7492V8.24922C8.44922 7.94546 8.69546 7.69922 8.99922 7.69922Z" fill="#808080" />    <path fill-rule="evenodd" clip-rule="evenodd"        d="M2.44922 5.24922C2.44922 4.94546 2.69546 4.69922 2.99922 4.69922H14.9992C15.303 4.69922 15.5492 4.94546 15.5492 5.24922C15.5492 5.55298 15.303 5.79922 14.9992 5.79922H2.99922C2.69546 5.79922 2.44922 5.55298 2.44922 5.24922Z"        fill="#808080" />    <path fill-rule="evenodd" clip-rule="evenodd"        d="M5.49416 3.02953C5.79441 2.22921 6.55906 1.69922 7.41387 1.69922H10.5849C11.4397 1.69922 12.2043 2.22921 12.5046 3.02953L13.2644 5.05614C13.371 5.34057 13.2269 5.65758 12.9424 5.76422C12.658 5.87085 12.341 5.72672 12.2344 5.44229L11.4747 3.41591C11.4746 3.41587 11.4747 3.41595 11.4747 3.41591C11.3354 3.04479 10.981 2.79922 10.5849 2.79922H7.41387C7.01771 2.79922 6.6634 3.04467 6.52411 3.41579C6.5241 3.41583 6.52413 3.41576 6.52411 3.41579L5.76436 5.44229C5.65773 5.72672 5.34072 5.87085 5.05629 5.76422C4.77187 5.65758 4.62774 5.34057 4.73437 5.05614L5.49416 3.02953Z"        fill="#808080" />    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6111 7.70065C11.914 7.72236 12.142 7.98558 12.1203 8.28856L11.7978 12.7886C11.7761 13.0915 11.5129 13.3195 11.2099 13.2978C10.9069 13.2761 10.6789 13.0129 10.7006 12.7099L11.0231 8.20993C11.0449 7.90695 11.3081 7.67894 11.6111 7.70065Z" fill="#808080" /> <path fill-rule="evenodd" clip-rule="evenodd" d="M6.38766 7.70065C6.69064 7.67894 6.95386 7.90695 6.97557 8.20993L7.29807 12.7099C7.31978 13.0129 7.09177 13.2761 6.78879 13.2978C6.48581 13.3195 6.2226 13.0915 6.20088 12.7886L5.87838 8.28856C5.85667 7.98558 6.08468 7.72236 6.38766 7.70065Z"fill="#808080" /></svg> </div>    </div></div></div>');

        $(".holiday-policy-edit-third .holiday-date-sub").append(newInput);
        newInput.find('.holiday_date').datepicker({
            format: 'dd M yyyy | D',
            autoclose: true,
        });
        newInput.find('input:first').focus();
    });

    // $( document ).ready(function() {
    $('.holiday_date').datepicker({
        format: 'dd M yyyy | D',
        autoclose: true,
    });
    // });

    $('#save_template').on('click', function (event) {
        event.preventDefault();
        if (fieldValidation()) {
            $('#save_template .loader').show();
            $('#save_template').prop('disabled', true);
            var holidays = []; // Array to store holiday objects
            var holidayInputs = document.querySelectorAll('.holiday-policy-edit-third .holiday-date-sub .policy-weekly-holiday');

            holidayInputs.forEach(function (container) {
                var holidayName = container.querySelector('.holiday_name').value.trim();
                var holidayDate = container.querySelector('.holiday_date').value.trim();

                if (holidayName !== '' && holidayDate !== '') {
                    var holidayObj = {
                        name: holidayName,
                        date: holidayDate
                    };
                    holidays.push(holidayObj); // Add the object to the holidays array
                }
            });

            // console.log(holidays)
            var formData = new FormData($('#add_holiday_template')[0]);
            // var calender_date = $('#calender_date').val();

            holidays.forEach(function (holiday, index) {
                formData.append(`holidays[${index}][holiday_date]`, holiday.date);
                formData.append(`holidays[${index}][holiday_name]`, holiday.name);
            });
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('add_edit_holiday_template') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response['status'] == 1) {
                        toastr["success"](response.message)
                        setTimeout(function () {
                            var redirectUrl = "{{ url('setting/holiday_policy') }}"
                            window.location.href = redirectUrl;
                        }, 3000);
                    } else {
                        toastr["error"](response.message)
                    }
                }
            });
        }
    });

    var delete_holday_id;
    $('.total-delete-icon').click(function(){
        var id = $(this).data('id');
        // var id = $(this).closest('.holiday-date-sub .policy-weekly-holiday').data('id');
        delete_holday_id = id;
        console.log(delete_holday_id);
    })

    $('#delete_template_holiday').on('click', function () {
        var id = delete_holday_id;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: "{{ route('delete_holiday') }}",
            data: { 'id': id },
            success: function (response) {
                var holidayContainer = $( '.policy-weekly-holiday .total-delete-icon[data-id="' + delete_holday_id + '"]' ).closest('.policy-weekly-holiday');
                // console.log(holidayContainer);
                holidayContainer.remove();
                toastr["success"]('Holiday delete successfully');
            },
        });
    });


    $('#delete_template').on('click', function (event) {
        var id = $(this).data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: "{{ route('delete_template') }}",
            data: { 'id': id },
            success: function (response) {
                if (response['status'] == 1) {
                    $('#delete_template .loader').show();
                    $('#delete_template').prop('disabled', true);
                    $('.cancel_modal .loader').show();
                    $('.cancel_modal').prop('disabled', true);                    
                    toastr["success"](response.message);
                    setTimeout(function () {
                        window.location.href = "{{ url('setting/holiday_policy') }}";
                    }, 3000);
                } else {
                    toastr["error"](response.message);
                }
            }
        });
    });


    // Hide all titles associated with the hidden elements
    // $('.policy-weekly-holiday:gt(0) .policy-holiday').hide();
    function handleScreenWidth() {
        if ($(window).width() >= 575) {
            $('.policy-weekly-holiday:gt(0) .policy-holiday').hide();
        } else {
            $('.policy-weekly-holiday .policy-holiday').show();
        }
    }
    $(document).ready(function () {
    handleScreenWidth();
});

    $(document).ready(function () {
        // Select the first occurrence of the element with the class 'first-icon-delete'
        $('.total-delete-icon:first').addClass('first-icon-delete');

        // Select all subsequent occurrences of the element with the class 'total-delete-icon'
        $('.total-delete-icon:not(:first)').removeClass('first-icon-delete');
    });

    // Bind the function to the resize event
    // $(window).resize(handleScreenWidth);


</script>
@endsection