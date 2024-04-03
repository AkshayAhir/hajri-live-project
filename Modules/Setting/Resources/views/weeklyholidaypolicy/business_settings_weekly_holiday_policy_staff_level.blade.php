@extends('admin.layout.main')
@section('title')
<title>{{env('APP_NAME')}} | Weekly Holiday Template</title>
@endsection
@section('header-page')
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 top-header-sub">
            <div class="breadcrumbs-area clearfix">
                <div class="breadcrumbs-sub">
                <a onclick="history.back()" class="back_button"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z" fill="#050E17"></path>
                        </svg></a>
                    <h4 class="page-title pull-left proxima_nova_semibold">Weekly Holiday Policy
                    </h4>
                </div>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{route('setting')}}">Settings</a></li>
                    <li class="section_sub_title">/ Business settings</li>
                    <li class="section_sub_title">/ Weekly holiday policy</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="main-content-inner">
    <div class="weekly-top-nots">
        <h2 class="proxima_nova_semibold">Staff Weekly Holidays</h2>
        <p class="">Assign weekly off days of your business to automatically mark attendance for
            those days</p>
    </div>

    <div class="leavel-data">
        <div class="level-data-sub weekly_off_preference_txt">
            <h2 class="proxima_nova_semibold section_sub_title mb-0 pe-2">Weekly Off Preference</h2>
            <p>(Choose if you wish to keep same holidays for all your staff or different)</p>
        </div>
        <div>

        </div>
        <div class="leavel-btn">
            <button class="business-level proxima_nova_semibold" data-bs-toggle="offcanvas"
                data-bs-target="#create-toggle-right" aria-controls="create-toggle-right">Business Level</button>
            <button type="button" class="staff-level proxima_nova_semibold level-active">Staff Level</button>
        </div>
    </div>
    <form>
        <div class="staff-view-profile-main">


            <div class="holiday-days">
                <h2 class="proxima_nova_semibold staff-pay-title mb-0">Holiday Days</h2>
                <div class="holiday_days_accordian">
                    <div class="holiday-datastaff row">
                        <div class="holidayexpand section_sub_title col-sm-4 holiday_staff_level_day" data-bs-toggle="collapse"
                            data-bs-target="#sundaydropdown" aria-expanded="false" aria-controls="sundaydropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.95462 15.8911C6.60367 15.5401 6.60367 14.9711 6.95462 14.6201L11.1121 10.4626L6.95462 6.30513C6.60367 5.95417 6.60367 5.38516 6.95462 5.0342C7.30558 4.68325 7.8746 4.68325 8.22556 5.0342L13.0185 9.82718C13.3695 10.1781 13.3695 10.7471 13.0185 11.0981L8.22556 15.8911C7.8746 16.242 7.30558 16.242 6.95462 15.8911Z"
                                    fill="#808080" />
                            </svg>
                            Sunday
                        </div>
                        <div class="col-sm-4 holiday_staff_level_day text-center">
                            <p class="business-manager-count">
                                @if($sunday_count != 0)
                                    {{$sunday_count}} Assigned
                                @else
                                    Not Assigned
                                @endif
                            </p>
                        </div>
                        <div class="col-sm-4 holiday_staff_level_day text-end">
                            <a href="{{ route('weekly_holiday_policy_staff_manage',['day' => 1]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.0641 9.12695C12.4619 9.12695 12.7844 9.44945 12.7844 9.84727V10.5861C12.7844 10.9839 12.4619 11.3064 12.0641 11.3064C11.6662 11.3064 11.3438 10.9839 11.3438 10.5861V9.84727C11.3438 9.44945 11.6662 9.12695 12.0641 9.12695Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.0641 12.8203C12.4619 12.8203 12.7844 13.1428 12.7844 13.5406V14.2794C12.7844 14.6772 12.4619 14.9997 12.0641 14.9997C11.6662 14.9997 11.3438 14.6772 11.3438 14.2794V13.5406C11.3438 13.1428 11.6662 12.8203 12.0641 12.8203Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.51265 10.607C9.70585 10.2592 10.1444 10.1339 10.4921 10.3271L11.157 10.6965C11.5048 10.8897 11.6301 11.3282 11.4369 11.676C11.2437 12.0237 10.8052 12.149 10.4574 11.9558L9.79251 11.5864C9.44475 11.3932 9.31945 10.9547 9.51265 10.607Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.6904 12.4527C12.8836 12.1049 13.3221 11.9796 13.6699 12.1728L14.3348 12.5422C14.6825 12.7354 14.8078 13.1739 14.6146 13.5217C14.4214 13.8694 13.9829 13.9947 13.6351 13.8015L12.9702 13.4321C12.6225 13.239 12.4972 12.8004 12.6904 12.4527Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.4369 12.4527C11.6301 12.8004 11.5048 13.239 11.157 13.4321L10.4921 13.8015C10.1444 13.9947 9.70585 13.8694 9.51265 13.5217C9.31945 13.1739 9.44475 12.7354 9.79251 12.5422L10.4574 12.1728C10.8052 11.9796 11.2437 12.1049 11.4369 12.4527Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M14.6146 10.607C14.8078 10.9547 14.6825 11.3932 14.3348 11.5864L13.6699 11.9558C13.3221 12.149 12.8836 12.0237 12.6904 11.676C12.4972 11.3282 12.6225 10.8897 12.9702 10.6965L13.6351 10.3271C13.9829 10.1339 14.4214 10.2592 14.6146 10.607Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.5881 11.5382C12.2784 11.2284 11.8479 11.2284 11.5382 11.5382C11.2284 11.8479 11.2284 12.2784 11.5382 12.5881C11.8479 12.8978 12.2784 12.8978 12.5881 12.5881C12.8978 12.2784 12.8978 11.8479 12.5881 11.5382ZM13.6068 10.5195C12.7344 9.64715 11.3918 9.64715 10.5195 10.5195C9.64715 11.3918 9.64715 12.7344 10.5195 13.6068C11.3918 14.4791 12.7344 14.4791 13.6068 13.6068C14.4791 12.7344 14.4791 11.3918 13.6068 10.5195Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.34526 3.12393C8.36659 2.21039 6.88379 2.21287 5.90787 3.13139C4.98208 4.00273 4.98961 5.53747 5.93872 6.5459C6.81005 7.47169 8.3448 7.46415 9.35323 6.51504C10.2957 5.62804 10.3209 4.10765 9.34526 3.12393ZM10.3378 2.0797C8.80443 0.639225 6.45287 0.640101 4.92051 2.08233C3.33442 3.57511 3.47464 6.02981 4.88965 7.53326C6.38244 9.11934 8.83714 8.97912 10.3406 7.56411C11.9066 6.09018 11.8847 3.62875 10.3589 2.10015C10.3554 2.09669 10.352 2.09326 10.3485 2.08986C10.3449 2.08643 10.3414 2.08304 10.3378 2.0797Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.04485 10.9367C3.59571 10.9367 2.44063 12.0918 2.44063 13.5409C2.44063 13.9388 2.11814 14.2613 1.72032 14.2613C1.3225 14.2613 1 13.9388 1 13.5409C1 11.2962 2.80007 9.49609 5.04485 9.49609H6.9657C7.36352 9.49609 7.68602 9.81859 7.68602 10.2164C7.68602 10.6142 7.36352 10.9367 6.9657 10.9367H5.04485Z"
                                        fill="#2F8CFF" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="collapse" id="sundaydropdown">
                        <div class="colspan-data-more">
                            @if($sunday_staff)
                            @foreach($sunday_staff as $staff)
                                {{$staff['name']}},
                            @endforeach
                            @endif
                            <!-- Deep Patel, Piyush Kheni, Harsh Sanghavi, Nihal Desai and  -->
                            <a href="{{ route('weekly_holiday_policy_staff_manage',['staff_day' => 1]) }}"
                                class="more-data">
                                @if($sunday_count > 10)
                                    10+ more.
                                @endif
                                </a>
                        </div>
                    </div>
                </div>
                <div class="holiday_days_accordian">
                    <div class="holiday-datastaff row">
                        <div class="holidayexpand section_sub_title col-sm-4 holiday_staff_level_day" data-bs-toggle="collapse"
                            data-bs-target="#mondaydropdown" aria-expanded="false" aria-controls="mondaydropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.95462 15.8911C6.60367 15.5401 6.60367 14.9711 6.95462 14.6201L11.1121 10.4626L6.95462 6.30513C6.60367 5.95417 6.60367 5.38516 6.95462 5.0342C7.30558 4.68325 7.8746 4.68325 8.22556 5.0342L13.0185 9.82718C13.3695 10.1781 13.3695 10.7471 13.0185 11.0981L8.22556 15.8911C7.8746 16.242 7.30558 16.242 6.95462 15.8911Z"
                                    fill="#808080" />
                            </svg>
                            Monday
                        </div>
                        <div class="col-sm-4 holiday_staff_level_day text-center">
                            <p class="business-manager-count">
                                @if($monday_count != 0)
                                    {{$monday_count}} Assigned
                                @else
                                    Not Assigned
                                @endif
                            </p>
                        </div>
                        <div class="col-sm-4 holiday_staff_level_day text-end">
                            <a href="{{ route('weekly_holiday_policy_staff_manage',['day' => 2]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.0641 9.12695C12.4619 9.12695 12.7844 9.44945 12.7844 9.84727V10.5861C12.7844 10.9839 12.4619 11.3064 12.0641 11.3064C11.6662 11.3064 11.3438 10.9839 11.3438 10.5861V9.84727C11.3438 9.44945 11.6662 9.12695 12.0641 9.12695Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.0641 12.8203C12.4619 12.8203 12.7844 13.1428 12.7844 13.5406V14.2794C12.7844 14.6772 12.4619 14.9997 12.0641 14.9997C11.6662 14.9997 11.3438 14.6772 11.3438 14.2794V13.5406C11.3438 13.1428 11.6662 12.8203 12.0641 12.8203Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.51265 10.607C9.70585 10.2592 10.1444 10.1339 10.4921 10.3271L11.157 10.6965C11.5048 10.8897 11.6301 11.3282 11.4369 11.676C11.2437 12.0237 10.8052 12.149 10.4574 11.9558L9.79251 11.5864C9.44475 11.3932 9.31945 10.9547 9.51265 10.607Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.6904 12.4527C12.8836 12.1049 13.3221 11.9796 13.6699 12.1728L14.3348 12.5422C14.6825 12.7354 14.8078 13.1739 14.6146 13.5217C14.4214 13.8694 13.9829 13.9947 13.6351 13.8015L12.9702 13.4321C12.6225 13.239 12.4972 12.8004 12.6904 12.4527Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.4369 12.4527C11.6301 12.8004 11.5048 13.239 11.157 13.4321L10.4921 13.8015C10.1444 13.9947 9.70585 13.8694 9.51265 13.5217C9.31945 13.1739 9.44475 12.7354 9.79251 12.5422L10.4574 12.1728C10.8052 11.9796 11.2437 12.1049 11.4369 12.4527Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M14.6146 10.607C14.8078 10.9547 14.6825 11.3932 14.3348 11.5864L13.6699 11.9558C13.3221 12.149 12.8836 12.0237 12.6904 11.676C12.4972 11.3282 12.6225 10.8897 12.9702 10.6965L13.6351 10.3271C13.9829 10.1339 14.4214 10.2592 14.6146 10.607Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.5881 11.5382C12.2784 11.2284 11.8479 11.2284 11.5382 11.5382C11.2284 11.8479 11.2284 12.2784 11.5382 12.5881C11.8479 12.8978 12.2784 12.8978 12.5881 12.5881C12.8978 12.2784 12.8978 11.8479 12.5881 11.5382ZM13.6068 10.5195C12.7344 9.64715 11.3918 9.64715 10.5195 10.5195C9.64715 11.3918 9.64715 12.7344 10.5195 13.6068C11.3918 14.4791 12.7344 14.4791 13.6068 13.6068C14.4791 12.7344 14.4791 11.3918 13.6068 10.5195Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.34526 3.12393C8.36659 2.21039 6.88379 2.21287 5.90787 3.13139C4.98208 4.00273 4.98961 5.53747 5.93872 6.5459C6.81005 7.47169 8.3448 7.46415 9.35323 6.51504C10.2957 5.62804 10.3209 4.10765 9.34526 3.12393ZM10.3378 2.0797C8.80443 0.639225 6.45287 0.640101 4.92051 2.08233C3.33442 3.57511 3.47464 6.02981 4.88965 7.53326C6.38244 9.11934 8.83714 8.97912 10.3406 7.56411C11.9066 6.09018 11.8847 3.62875 10.3589 2.10015C10.3554 2.09669 10.352 2.09326 10.3485 2.08986C10.3449 2.08643 10.3414 2.08304 10.3378 2.0797Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.04485 10.9367C3.59571 10.9367 2.44063 12.0918 2.44063 13.5409C2.44063 13.9388 2.11814 14.2613 1.72032 14.2613C1.3225 14.2613 1 13.9388 1 13.5409C1 11.2962 2.80007 9.49609 5.04485 9.49609H6.9657C7.36352 9.49609 7.68602 9.81859 7.68602 10.2164C7.68602 10.6142 7.36352 10.9367 6.9657 10.9367H5.04485Z"
                                        fill="#2F8CFF" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="collapse" id="mondaydropdown">
                        <div class="colspan-data-more">
                            @if($monday_staff)
                            @foreach($monday_staff as $staff)
                            {{$staff['name']}},
                            @endforeach
                            @endif
                            <a href="{{ route('weekly_holiday_policy_staff_manage',['staff_day' => 2]) }}"
                                class="more-data">
                                @if($monday_count > 10)
                                    10+ more.
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                <div class="holiday_days_accordian">
                    <div class="holiday-datastaff row">
                        <div class="holidayexpand section_sub_title col-sm-4 holiday_staff_level_day" data-bs-toggle="collapse"
                            data-bs-target="#tuesdaydropdown" aria-expanded="false" aria-controls="tuesdaydropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.95462 15.8911C6.60367 15.5401 6.60367 14.9711 6.95462 14.6201L11.1121 10.4626L6.95462 6.30513C6.60367 5.95417 6.60367 5.38516 6.95462 5.0342C7.30558 4.68325 7.8746 4.68325 8.22556 5.0342L13.0185 9.82718C13.3695 10.1781 13.3695 10.7471 13.0185 11.0981L8.22556 15.8911C7.8746 16.242 7.30558 16.242 6.95462 15.8911Z"
                                    fill="#808080" />
                            </svg>
                            Tuesday
                        </div>
                        <div class="col-sm-4 holiday_staff_level_day text-center">
                            <p class="business-manager-count">
                                @if($tuesday_count != 0)
                                    {{$tuesday_count}} Assigned
                                @else
                                    Not Assigned
                                @endif
                            </p>
                        </div>
                        <div class="col-sm-4 holiday_staff_level_day text-end">
                            <a href="{{ route('weekly_holiday_policy_staff_manage',['day' => 3]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.0641 9.12695C12.4619 9.12695 12.7844 9.44945 12.7844 9.84727V10.5861C12.7844 10.9839 12.4619 11.3064 12.0641 11.3064C11.6662 11.3064 11.3438 10.9839 11.3438 10.5861V9.84727C11.3438 9.44945 11.6662 9.12695 12.0641 9.12695Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.0641 12.8203C12.4619 12.8203 12.7844 13.1428 12.7844 13.5406V14.2794C12.7844 14.6772 12.4619 14.9997 12.0641 14.9997C11.6662 14.9997 11.3438 14.6772 11.3438 14.2794V13.5406C11.3438 13.1428 11.6662 12.8203 12.0641 12.8203Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.51265 10.607C9.70585 10.2592 10.1444 10.1339 10.4921 10.3271L11.157 10.6965C11.5048 10.8897 11.6301 11.3282 11.4369 11.676C11.2437 12.0237 10.8052 12.149 10.4574 11.9558L9.79251 11.5864C9.44475 11.3932 9.31945 10.9547 9.51265 10.607Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.6904 12.4527C12.8836 12.1049 13.3221 11.9796 13.6699 12.1728L14.3348 12.5422C14.6825 12.7354 14.8078 13.1739 14.6146 13.5217C14.4214 13.8694 13.9829 13.9947 13.6351 13.8015L12.9702 13.4321C12.6225 13.239 12.4972 12.8004 12.6904 12.4527Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.4369 12.4527C11.6301 12.8004 11.5048 13.239 11.157 13.4321L10.4921 13.8015C10.1444 13.9947 9.70585 13.8694 9.51265 13.5217C9.31945 13.1739 9.44475 12.7354 9.79251 12.5422L10.4574 12.1728C10.8052 11.9796 11.2437 12.1049 11.4369 12.4527Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M14.6146 10.607C14.8078 10.9547 14.6825 11.3932 14.3348 11.5864L13.6699 11.9558C13.3221 12.149 12.8836 12.0237 12.6904 11.676C12.4972 11.3282 12.6225 10.8897 12.9702 10.6965L13.6351 10.3271C13.9829 10.1339 14.4214 10.2592 14.6146 10.607Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.5881 11.5382C12.2784 11.2284 11.8479 11.2284 11.5382 11.5382C11.2284 11.8479 11.2284 12.2784 11.5382 12.5881C11.8479 12.8978 12.2784 12.8978 12.5881 12.5881C12.8978 12.2784 12.8978 11.8479 12.5881 11.5382ZM13.6068 10.5195C12.7344 9.64715 11.3918 9.64715 10.5195 10.5195C9.64715 11.3918 9.64715 12.7344 10.5195 13.6068C11.3918 14.4791 12.7344 14.4791 13.6068 13.6068C14.4791 12.7344 14.4791 11.3918 13.6068 10.5195Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.34526 3.12393C8.36659 2.21039 6.88379 2.21287 5.90787 3.13139C4.98208 4.00273 4.98961 5.53747 5.93872 6.5459C6.81005 7.47169 8.3448 7.46415 9.35323 6.51504C10.2957 5.62804 10.3209 4.10765 9.34526 3.12393ZM10.3378 2.0797C8.80443 0.639225 6.45287 0.640101 4.92051 2.08233C3.33442 3.57511 3.47464 6.02981 4.88965 7.53326C6.38244 9.11934 8.83714 8.97912 10.3406 7.56411C11.9066 6.09018 11.8847 3.62875 10.3589 2.10015C10.3554 2.09669 10.352 2.09326 10.3485 2.08986C10.3449 2.08643 10.3414 2.08304 10.3378 2.0797Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.04485 10.9367C3.59571 10.9367 2.44063 12.0918 2.44063 13.5409C2.44063 13.9388 2.11814 14.2613 1.72032 14.2613C1.3225 14.2613 1 13.9388 1 13.5409C1 11.2962 2.80007 9.49609 5.04485 9.49609H6.9657C7.36352 9.49609 7.68602 9.81859 7.68602 10.2164C7.68602 10.6142 7.36352 10.9367 6.9657 10.9367H5.04485Z"
                                        fill="#2F8CFF" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="collapse" id="tuesdaydropdown">
                        <div class="colspan-data-more">
                            @if($tuesday_staff)
                            @foreach($tuesday_staff as $staff)
                            {{$staff['name']}},
                            @endforeach
                            @endif
                            <a href="{{ route('weekly_holiday_policy_staff_manage',['staff_day' => 2]) }}"
                                class="more-data">
                                @if($tuesday_count > 10)
                                    10+ more.
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                <div class="holiday_days_accordian">
                    <div class="holiday-datastaff row">
                        <div class="holidayexpand section_sub_title col-sm-4 holiday_staff_level_day" data-bs-toggle="collapse"
                            data-bs-target="#wednesdaydropdown" aria-expanded="false" aria-controls="wednesdaydropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.95462 15.8911C6.60367 15.5401 6.60367 14.9711 6.95462 14.6201L11.1121 10.4626L6.95462 6.30513C6.60367 5.95417 6.60367 5.38516 6.95462 5.0342C7.30558 4.68325 7.8746 4.68325 8.22556 5.0342L13.0185 9.82718C13.3695 10.1781 13.3695 10.7471 13.0185 11.0981L8.22556 15.8911C7.8746 16.242 7.30558 16.242 6.95462 15.8911Z"
                                    fill="#808080" />
                            </svg>
                            Wednesday
                        </div>
                        <div class="col-sm-4 holiday_staff_level_day text-center">
                            <p class="business-manager-count">
                                @if($wednesday_count != 0)
                                    {{$wednesday_count}} Assigned
                                @else
                                    Not Assigned
                                @endif
                            </p>
                        </div>
                        <div class="col-sm-4 holiday_staff_level_day text-end">
                            <a href="{{ route('weekly_holiday_policy_staff_manage',['day' => 4]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.0641 9.12695C12.4619 9.12695 12.7844 9.44945 12.7844 9.84727V10.5861C12.7844 10.9839 12.4619 11.3064 12.0641 11.3064C11.6662 11.3064 11.3438 10.9839 11.3438 10.5861V9.84727C11.3438 9.44945 11.6662 9.12695 12.0641 9.12695Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.0641 12.8203C12.4619 12.8203 12.7844 13.1428 12.7844 13.5406V14.2794C12.7844 14.6772 12.4619 14.9997 12.0641 14.9997C11.6662 14.9997 11.3438 14.6772 11.3438 14.2794V13.5406C11.3438 13.1428 11.6662 12.8203 12.0641 12.8203Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.51265 10.607C9.70585 10.2592 10.1444 10.1339 10.4921 10.3271L11.157 10.6965C11.5048 10.8897 11.6301 11.3282 11.4369 11.676C11.2437 12.0237 10.8052 12.149 10.4574 11.9558L9.79251 11.5864C9.44475 11.3932 9.31945 10.9547 9.51265 10.607Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.6904 12.4527C12.8836 12.1049 13.3221 11.9796 13.6699 12.1728L14.3348 12.5422C14.6825 12.7354 14.8078 13.1739 14.6146 13.5217C14.4214 13.8694 13.9829 13.9947 13.6351 13.8015L12.9702 13.4321C12.6225 13.239 12.4972 12.8004 12.6904 12.4527Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.4369 12.4527C11.6301 12.8004 11.5048 13.239 11.157 13.4321L10.4921 13.8015C10.1444 13.9947 9.70585 13.8694 9.51265 13.5217C9.31945 13.1739 9.44475 12.7354 9.79251 12.5422L10.4574 12.1728C10.8052 11.9796 11.2437 12.1049 11.4369 12.4527Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M14.6146 10.607C14.8078 10.9547 14.6825 11.3932 14.3348 11.5864L13.6699 11.9558C13.3221 12.149 12.8836 12.0237 12.6904 11.676C12.4972 11.3282 12.6225 10.8897 12.9702 10.6965L13.6351 10.3271C13.9829 10.1339 14.4214 10.2592 14.6146 10.607Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.5881 11.5382C12.2784 11.2284 11.8479 11.2284 11.5382 11.5382C11.2284 11.8479 11.2284 12.2784 11.5382 12.5881C11.8479 12.8978 12.2784 12.8978 12.5881 12.5881C12.8978 12.2784 12.8978 11.8479 12.5881 11.5382ZM13.6068 10.5195C12.7344 9.64715 11.3918 9.64715 10.5195 10.5195C9.64715 11.3918 9.64715 12.7344 10.5195 13.6068C11.3918 14.4791 12.7344 14.4791 13.6068 13.6068C14.4791 12.7344 14.4791 11.3918 13.6068 10.5195Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.34526 3.12393C8.36659 2.21039 6.88379 2.21287 5.90787 3.13139C4.98208 4.00273 4.98961 5.53747 5.93872 6.5459C6.81005 7.47169 8.3448 7.46415 9.35323 6.51504C10.2957 5.62804 10.3209 4.10765 9.34526 3.12393ZM10.3378 2.0797C8.80443 0.639225 6.45287 0.640101 4.92051 2.08233C3.33442 3.57511 3.47464 6.02981 4.88965 7.53326C6.38244 9.11934 8.83714 8.97912 10.3406 7.56411C11.9066 6.09018 11.8847 3.62875 10.3589 2.10015C10.3554 2.09669 10.352 2.09326 10.3485 2.08986C10.3449 2.08643 10.3414 2.08304 10.3378 2.0797Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.04485 10.9367C3.59571 10.9367 2.44063 12.0918 2.44063 13.5409C2.44063 13.9388 2.11814 14.2613 1.72032 14.2613C1.3225 14.2613 1 13.9388 1 13.5409C1 11.2962 2.80007 9.49609 5.04485 9.49609H6.9657C7.36352 9.49609 7.68602 9.81859 7.68602 10.2164C7.68602 10.6142 7.36352 10.9367 6.9657 10.9367H5.04485Z"
                                        fill="#2F8CFF" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="collapse" id="wednesdaydropdown">
                        <div class="colspan-data-more">
                            @if($wednesday_staff)
                            @foreach($wednesday_staff as $staff)
                            {{$staff['name']}},
                            @endforeach
                            @endif
                            <a href="{{ route('weekly_holiday_policy_staff_manage',['staff_day' => 2]) }}"
                                class="more-data">
                                @if($wednesday_count > 10)
                                    10+ more.
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                <div class="holiday_days_accordian">
                    <div class="holiday-datastaff row">
                        <div class="holidayexpand section_sub_title col-sm-4 holiday_staff_level_day" data-bs-toggle="collapse"
                            data-bs-target="#thursdaydropdown" aria-expanded="false" aria-controls="thursdaydropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.95462 15.8911C6.60367 15.5401 6.60367 14.9711 6.95462 14.6201L11.1121 10.4626L6.95462 6.30513C6.60367 5.95417 6.60367 5.38516 6.95462 5.0342C7.30558 4.68325 7.8746 4.68325 8.22556 5.0342L13.0185 9.82718C13.3695 10.1781 13.3695 10.7471 13.0185 11.0981L8.22556 15.8911C7.8746 16.242 7.30558 16.242 6.95462 15.8911Z"
                                    fill="#808080" />
                            </svg>
                            Thursday
                        </div>
                        <div class="col-sm-4 holiday_staff_level_day text-center">
                            <p class="business-manager-count">
                                @if($thursday_count != 0)
                                    {{$thursday_count}} Assigned
                                @else
                                    Not Assigned
                                @endif
                            </p>
                        </div>
                        <div class="col-sm-4 holiday_staff_level_day text-end">
                            <a href="{{ route('weekly_holiday_policy_staff_manage',['day' => 5]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.0641 9.12695C12.4619 9.12695 12.7844 9.44945 12.7844 9.84727V10.5861C12.7844 10.9839 12.4619 11.3064 12.0641 11.3064C11.6662 11.3064 11.3438 10.9839 11.3438 10.5861V9.84727C11.3438 9.44945 11.6662 9.12695 12.0641 9.12695Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.0641 12.8203C12.4619 12.8203 12.7844 13.1428 12.7844 13.5406V14.2794C12.7844 14.6772 12.4619 14.9997 12.0641 14.9997C11.6662 14.9997 11.3438 14.6772 11.3438 14.2794V13.5406C11.3438 13.1428 11.6662 12.8203 12.0641 12.8203Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.51265 10.607C9.70585 10.2592 10.1444 10.1339 10.4921 10.3271L11.157 10.6965C11.5048 10.8897 11.6301 11.3282 11.4369 11.676C11.2437 12.0237 10.8052 12.149 10.4574 11.9558L9.79251 11.5864C9.44475 11.3932 9.31945 10.9547 9.51265 10.607Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.6904 12.4527C12.8836 12.1049 13.3221 11.9796 13.6699 12.1728L14.3348 12.5422C14.6825 12.7354 14.8078 13.1739 14.6146 13.5217C14.4214 13.8694 13.9829 13.9947 13.6351 13.8015L12.9702 13.4321C12.6225 13.239 12.4972 12.8004 12.6904 12.4527Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.4369 12.4527C11.6301 12.8004 11.5048 13.239 11.157 13.4321L10.4921 13.8015C10.1444 13.9947 9.70585 13.8694 9.51265 13.5217C9.31945 13.1739 9.44475 12.7354 9.79251 12.5422L10.4574 12.1728C10.8052 11.9796 11.2437 12.1049 11.4369 12.4527Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M14.6146 10.607C14.8078 10.9547 14.6825 11.3932 14.3348 11.5864L13.6699 11.9558C13.3221 12.149 12.8836 12.0237 12.6904 11.676C12.4972 11.3282 12.6225 10.8897 12.9702 10.6965L13.6351 10.3271C13.9829 10.1339 14.4214 10.2592 14.6146 10.607Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.5881 11.5382C12.2784 11.2284 11.8479 11.2284 11.5382 11.5382C11.2284 11.8479 11.2284 12.2784 11.5382 12.5881C11.8479 12.8978 12.2784 12.8978 12.5881 12.5881C12.8978 12.2784 12.8978 11.8479 12.5881 11.5382ZM13.6068 10.5195C12.7344 9.64715 11.3918 9.64715 10.5195 10.5195C9.64715 11.3918 9.64715 12.7344 10.5195 13.6068C11.3918 14.4791 12.7344 14.4791 13.6068 13.6068C14.4791 12.7344 14.4791 11.3918 13.6068 10.5195Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.34526 3.12393C8.36659 2.21039 6.88379 2.21287 5.90787 3.13139C4.98208 4.00273 4.98961 5.53747 5.93872 6.5459C6.81005 7.47169 8.3448 7.46415 9.35323 6.51504C10.2957 5.62804 10.3209 4.10765 9.34526 3.12393ZM10.3378 2.0797C8.80443 0.639225 6.45287 0.640101 4.92051 2.08233C3.33442 3.57511 3.47464 6.02981 4.88965 7.53326C6.38244 9.11934 8.83714 8.97912 10.3406 7.56411C11.9066 6.09018 11.8847 3.62875 10.3589 2.10015C10.3554 2.09669 10.352 2.09326 10.3485 2.08986C10.3449 2.08643 10.3414 2.08304 10.3378 2.0797Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.04485 10.9367C3.59571 10.9367 2.44063 12.0918 2.44063 13.5409C2.44063 13.9388 2.11814 14.2613 1.72032 14.2613C1.3225 14.2613 1 13.9388 1 13.5409C1 11.2962 2.80007 9.49609 5.04485 9.49609H6.9657C7.36352 9.49609 7.68602 9.81859 7.68602 10.2164C7.68602 10.6142 7.36352 10.9367 6.9657 10.9367H5.04485Z"
                                        fill="#2F8CFF" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="collapse" id="thursdaydropdown">
                        <div class="colspan-data-more">
                            @if($thursday_staff)
                            @foreach($thursday_staff as $staff)
                            {{$staff['name']}},
                            @endforeach
                            @endif
                            <a href="{{ route('weekly_holiday_policy_staff_manage',['staff_day' => 2]) }}"
                                class="more-data">
                                @if($thursday_count > 10)
                                    10+ more.
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                <div class="holiday_days_accordian">
                    <div class="holiday-datastaff row">
                        <div class="holidayexpand section_sub_title col-sm-4 holiday_staff_level_day" data-bs-toggle="collapse"
                            data-bs-target="#fridaydropdown" aria-expanded="false" aria-controls="fridaydropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.95462 15.8911C6.60367 15.5401 6.60367 14.9711 6.95462 14.6201L11.1121 10.4626L6.95462 6.30513C6.60367 5.95417 6.60367 5.38516 6.95462 5.0342C7.30558 4.68325 7.8746 4.68325 8.22556 5.0342L13.0185 9.82718C13.3695 10.1781 13.3695 10.7471 13.0185 11.0981L8.22556 15.8911C7.8746 16.242 7.30558 16.242 6.95462 15.8911Z"
                                    fill="#808080" />
                            </svg>
                            Friday
                        </div>
                        <div class="col-sm-4 holiday_staff_level_day text-center">
                            <p class="business-manager-count">
                                @if($friday_count != 0)
                                    {{$friday_count}} Assigned
                                @else
                                    Not Assigned
                                @endif
                            </p>
                        </div>
                        <div class="col-sm-4 holiday_staff_level_day text-end">
                            <a href="{{ route('weekly_holiday_policy_staff_manage',['day' => 6]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.0641 9.12695C12.4619 9.12695 12.7844 9.44945 12.7844 9.84727V10.5861C12.7844 10.9839 12.4619 11.3064 12.0641 11.3064C11.6662 11.3064 11.3438 10.9839 11.3438 10.5861V9.84727C11.3438 9.44945 11.6662 9.12695 12.0641 9.12695Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.0641 12.8203C12.4619 12.8203 12.7844 13.1428 12.7844 13.5406V14.2794C12.7844 14.6772 12.4619 14.9997 12.0641 14.9997C11.6662 14.9997 11.3438 14.6772 11.3438 14.2794V13.5406C11.3438 13.1428 11.6662 12.8203 12.0641 12.8203Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.51265 10.607C9.70585 10.2592 10.1444 10.1339 10.4921 10.3271L11.157 10.6965C11.5048 10.8897 11.6301 11.3282 11.4369 11.676C11.2437 12.0237 10.8052 12.149 10.4574 11.9558L9.79251 11.5864C9.44475 11.3932 9.31945 10.9547 9.51265 10.607Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.6904 12.4527C12.8836 12.1049 13.3221 11.9796 13.6699 12.1728L14.3348 12.5422C14.6825 12.7354 14.8078 13.1739 14.6146 13.5217C14.4214 13.8694 13.9829 13.9947 13.6351 13.8015L12.9702 13.4321C12.6225 13.239 12.4972 12.8004 12.6904 12.4527Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.4369 12.4527C11.6301 12.8004 11.5048 13.239 11.157 13.4321L10.4921 13.8015C10.1444 13.9947 9.70585 13.8694 9.51265 13.5217C9.31945 13.1739 9.44475 12.7354 9.79251 12.5422L10.4574 12.1728C10.8052 11.9796 11.2437 12.1049 11.4369 12.4527Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M14.6146 10.607C14.8078 10.9547 14.6825 11.3932 14.3348 11.5864L13.6699 11.9558C13.3221 12.149 12.8836 12.0237 12.6904 11.676C12.4972 11.3282 12.6225 10.8897 12.9702 10.6965L13.6351 10.3271C13.9829 10.1339 14.4214 10.2592 14.6146 10.607Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.5881 11.5382C12.2784 11.2284 11.8479 11.2284 11.5382 11.5382C11.2284 11.8479 11.2284 12.2784 11.5382 12.5881C11.8479 12.8978 12.2784 12.8978 12.5881 12.5881C12.8978 12.2784 12.8978 11.8479 12.5881 11.5382ZM13.6068 10.5195C12.7344 9.64715 11.3918 9.64715 10.5195 10.5195C9.64715 11.3918 9.64715 12.7344 10.5195 13.6068C11.3918 14.4791 12.7344 14.4791 13.6068 13.6068C14.4791 12.7344 14.4791 11.3918 13.6068 10.5195Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.34526 3.12393C8.36659 2.21039 6.88379 2.21287 5.90787 3.13139C4.98208 4.00273 4.98961 5.53747 5.93872 6.5459C6.81005 7.47169 8.3448 7.46415 9.35323 6.51504C10.2957 5.62804 10.3209 4.10765 9.34526 3.12393ZM10.3378 2.0797C8.80443 0.639225 6.45287 0.640101 4.92051 2.08233C3.33442 3.57511 3.47464 6.02981 4.88965 7.53326C6.38244 9.11934 8.83714 8.97912 10.3406 7.56411C11.9066 6.09018 11.8847 3.62875 10.3589 2.10015C10.3554 2.09669 10.352 2.09326 10.3485 2.08986C10.3449 2.08643 10.3414 2.08304 10.3378 2.0797Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.04485 10.9367C3.59571 10.9367 2.44063 12.0918 2.44063 13.5409C2.44063 13.9388 2.11814 14.2613 1.72032 14.2613C1.3225 14.2613 1 13.9388 1 13.5409C1 11.2962 2.80007 9.49609 5.04485 9.49609H6.9657C7.36352 9.49609 7.68602 9.81859 7.68602 10.2164C7.68602 10.6142 7.36352 10.9367 6.9657 10.9367H5.04485Z"
                                        fill="#2F8CFF" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="collapse" id="fridaydropdown">
                        <div class="colspan-data-more">
                            @if($friday_staff)
                            @foreach($friday_staff as $staff)
                            {{$staff['name']}},
                            @endforeach
                            @endif
                            <a href="{{ route('weekly_holiday_policy_staff_manage',['staff_day' => 2]) }}"
                                class="more-data">
                                @if($friday_count > 10)
                                    10+ more.
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                <div class="holiday_days_accordian">
                    <div class="holiday-datastaff row">
                        <div class="holidayexpand section_sub_title col-sm-4 holiday_staff_level_day" data-bs-toggle="collapse"
                            data-bs-target="#saturdaydropdown" aria-expanded="false" aria-controls="saturdaydropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.95462 15.8911C6.60367 15.5401 6.60367 14.9711 6.95462 14.6201L11.1121 10.4626L6.95462 6.30513C6.60367 5.95417 6.60367 5.38516 6.95462 5.0342C7.30558 4.68325 7.8746 4.68325 8.22556 5.0342L13.0185 9.82718C13.3695 10.1781 13.3695 10.7471 13.0185 11.0981L8.22556 15.8911C7.8746 16.242 7.30558 16.242 6.95462 15.8911Z"
                                    fill="#808080" />
                            </svg>
                            Saturday
                        </div>
                        <div class="col-sm-4 holiday_staff_level_day text-center">
                            <p class="business-manager-count">
                                @if($saturday_count != 0)
                                    {{$saturday_count}} Assigned
                                @else
                                    Not Assigned
                                @endif
                            </p>
                        </div>
                        <div class="col-sm-4 holiday_staff_level_day text-end">
                            <a href="{{ route('weekly_holiday_policy_staff_manage',['day' => 7]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.0641 9.12695C12.4619 9.12695 12.7844 9.44945 12.7844 9.84727V10.5861C12.7844 10.9839 12.4619 11.3064 12.0641 11.3064C11.6662 11.3064 11.3438 10.9839 11.3438 10.5861V9.84727C11.3438 9.44945 11.6662 9.12695 12.0641 9.12695Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.0641 12.8203C12.4619 12.8203 12.7844 13.1428 12.7844 13.5406V14.2794C12.7844 14.6772 12.4619 14.9997 12.0641 14.9997C11.6662 14.9997 11.3438 14.6772 11.3438 14.2794V13.5406C11.3438 13.1428 11.6662 12.8203 12.0641 12.8203Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.51265 10.607C9.70585 10.2592 10.1444 10.1339 10.4921 10.3271L11.157 10.6965C11.5048 10.8897 11.6301 11.3282 11.4369 11.676C11.2437 12.0237 10.8052 12.149 10.4574 11.9558L9.79251 11.5864C9.44475 11.3932 9.31945 10.9547 9.51265 10.607Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.6904 12.4527C12.8836 12.1049 13.3221 11.9796 13.6699 12.1728L14.3348 12.5422C14.6825 12.7354 14.8078 13.1739 14.6146 13.5217C14.4214 13.8694 13.9829 13.9947 13.6351 13.8015L12.9702 13.4321C12.6225 13.239 12.4972 12.8004 12.6904 12.4527Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.4369 12.4527C11.6301 12.8004 11.5048 13.239 11.157 13.4321L10.4921 13.8015C10.1444 13.9947 9.70585 13.8694 9.51265 13.5217C9.31945 13.1739 9.44475 12.7354 9.79251 12.5422L10.4574 12.1728C10.8052 11.9796 11.2437 12.1049 11.4369 12.4527Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M14.6146 10.607C14.8078 10.9547 14.6825 11.3932 14.3348 11.5864L13.6699 11.9558C13.3221 12.149 12.8836 12.0237 12.6904 11.676C12.4972 11.3282 12.6225 10.8897 12.9702 10.6965L13.6351 10.3271C13.9829 10.1339 14.4214 10.2592 14.6146 10.607Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.5881 11.5382C12.2784 11.2284 11.8479 11.2284 11.5382 11.5382C11.2284 11.8479 11.2284 12.2784 11.5382 12.5881C11.8479 12.8978 12.2784 12.8978 12.5881 12.5881C12.8978 12.2784 12.8978 11.8479 12.5881 11.5382ZM13.6068 10.5195C12.7344 9.64715 11.3918 9.64715 10.5195 10.5195C9.64715 11.3918 9.64715 12.7344 10.5195 13.6068C11.3918 14.4791 12.7344 14.4791 13.6068 13.6068C14.4791 12.7344 14.4791 11.3918 13.6068 10.5195Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.34526 3.12393C8.36659 2.21039 6.88379 2.21287 5.90787 3.13139C4.98208 4.00273 4.98961 5.53747 5.93872 6.5459C6.81005 7.47169 8.3448 7.46415 9.35323 6.51504C10.2957 5.62804 10.3209 4.10765 9.34526 3.12393ZM10.3378 2.0797C8.80443 0.639225 6.45287 0.640101 4.92051 2.08233C3.33442 3.57511 3.47464 6.02981 4.88965 7.53326C6.38244 9.11934 8.83714 8.97912 10.3406 7.56411C11.9066 6.09018 11.8847 3.62875 10.3589 2.10015C10.3554 2.09669 10.352 2.09326 10.3485 2.08986C10.3449 2.08643 10.3414 2.08304 10.3378 2.0797Z"
                                        fill="#2F8CFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.04485 10.9367C3.59571 10.9367 2.44063 12.0918 2.44063 13.5409C2.44063 13.9388 2.11814 14.2613 1.72032 14.2613C1.3225 14.2613 1 13.9388 1 13.5409C1 11.2962 2.80007 9.49609 5.04485 9.49609H6.9657C7.36352 9.49609 7.68602 9.81859 7.68602 10.2164C7.68602 10.6142 7.36352 10.9367 6.9657 10.9367H5.04485Z"
                                        fill="#2F8CFF" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="collapse" id="saturdaydropdown">
                        <div class="colspan-data-more">
                            @if($saturday_staff)
                            @foreach($saturday_staff as $staff)
                            {{$staff['name']}},
                            @endforeach
                            @endif
                            <a href="{{ route('weekly_holiday_policy_staff_manage',['staff_day' => 2]) }}"
                                class="more-data">
                                @if($saturday_count > 10)
                                    10+ more.
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </form>
</div>

<div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="create-toggle-right"
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
            </svg></div>
    </div>
    <div class="offcanvas-body overflow-auto">
        <h5 class="section_title_heading proxima_nova_bold download-work-main-header filter-title-main">
            Switch to Business level?</h5>
        <hr>
        <div class="filter-sub-sec">
            <form method="" class="switch_business_level_form">
                <div class="daily-work-select">
                    <h2 class="holiday-staff-select  proxima_nova_semibold">Your current weekly off setting
                        will be removed.
                    </h2>
                </div>

            </form>
            <div class="download-cancel-btns-main">
                <div class="holiday-data-save-btn">
                    <button name="" class="continue_btn download-btn proxima_nova_semibold w-100">Continue</button>
                    <button name="" class="cancel-btn-btn proxima_nova_semibold w-100" data-bs-dismiss="offcanvas"
                        aria-label="Close">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$('.continue_btn').on("click", function() {
    window.location.href = "{{ url('setting/weekly_holiday_policy_business_level') }}";
})
</script>
@endsection