@extends('admin.layout.main')
@section('title')
<title>{{env('APP_NAME')}} | Settings</title>
@endsection
@section('content')
<div class="col-sm-12">
    <div class="account-setting setting_detail_inner_content">
        <div class="setting-detail">
            <div class="setting-titel-main">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path
                        d="M12.0621 3.77224C13.2011 4.91128 13.2011 6.758 12.0621 7.89704C10.923 9.03607 9.07632 9.03607 7.93728 7.89704C6.79825 6.758 6.79825 4.91128 7.93728 3.77224C9.07632 2.63321 10.923 2.63321 12.0621 3.77224"
                        stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3.33301 15.4178V16.2511C3.33301 16.7111 3.70634 17.0845 4.16634 17.0845H15.833C16.293 17.0845 16.6663 16.7111 16.6663 16.2511V15.4178C16.6663 12.8961 13.373 11.2578 9.99967 11.2578C6.62634 11.2578 3.33301 12.8961 3.33301 15.4178Z"
                        stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <a class="account-setting-link proxima_nova_semibold" href="{{ route('account_setting') }}">
                    <h2 class="section_title  proxima_nova_semibold settings_text_data">Account Settings
                        <div>
                            <div class="setting-nest-arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.95462 15.8911C6.60367 15.5401 6.60367 14.9711 6.95462 14.6201L11.1121 10.4626L6.95462 6.30513C6.60367 5.95417 6.60367 5.38516 6.95462 5.0342C7.30558 4.68325 7.8746 4.68325 8.22556 5.0342L13.0185 9.82718C13.3695 10.1781 13.3695 10.7471 13.0185 11.0981L8.22556 15.8911C7.8746 16.242 7.30558 16.242 6.95462 15.8911Z"
                                        fill="#808080" />
                                </svg>
                            </div>
                        </div>
                    </h2>
                </a>
            </div>

        </div>
        <div class="account-login-detail">
            <div class="left-field">
                <p>Phone Number</p>
            </div>
            <div class="">
                @if($login_user['phone_number'])
                <p class="details-right-sec">+91 {{$login_user['phone_number']}}</p>
                @else
                <div class="right-field">
                    <p class="details-right-sec">Not Added</p>
                </div>
                @endif
            </div>
        </div>
        <div class="account-login-detail">
            <div class="left-field">
                <p>Email ID</p>
            </div>
            <div class="">
                @if($login_user['email'])
                <p class="details-right-sec">{{$login_user['email']}}</p>
                @else
                <p class="details-right-sec">Not Added</p>
                @endif
            </div>
        </div>
        <div class="account-login-detail">
            <div class="left-field">
                <p>Subscription Plan</p>
            </div>
            <div class="">
                <p class="details-right-sec">No Business Added</p>
            </div>
        </div>
    </div>
    <div class="account-setting setting_detail_inner_content">
        <div class="setting-detail">
            <div class="setting-titel-main">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M16.6667 13.334H13.7792C13.5008 13.334 13.24 13.4732 13.0858 13.7048L12.7475 14.2123C12.5933 14.444 12.3325 14.5832 12.0542 14.5832H7.94583C7.6675 14.5832 7.40667 14.444 7.2525 14.2123L6.91417 13.7048C6.75917 13.4732 6.49917 13.334 6.22 13.334H3.33333C2.87333 13.334 2.5 13.7073 2.5 14.1673V15.0007C2.5 15.9215 3.24583 16.6673 4.16667 16.6673H15.8333C16.7542 16.6673 17.5 15.9215 17.5 15.0007V14.1673C17.5 13.7073 17.1267 13.334 16.6667 13.334V13.334Z"
                        stroke="#2F8CFF" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M7.50065 10.8342V8.89258" stroke="#2F8CFF" stroke-width="1.3" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M10.0007 10.8346V7.91797" stroke="#2F8CFF" stroke-width="1.3" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M12.5007 10.8349V5.97656" stroke="#2F8CFF" stroke-width="1.3" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path
                        d="M16.6663 13.334V4.64315C16.6663 3.91982 16.003 3.33398 15.1847 3.33398H4.81467C3.99634 3.33398 3.33301 3.91982 3.33301 4.64315V13.334"
                        stroke="#2F8CFF" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <a class="account-setting-link proxima_nova_semibold" href="{{route('manage_business')}}">
                    <h2 class="section_title  proxima_nova_semibold settings_text_data">Business Settings
                        <div>
                            <div class="setting-nest-arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.95462 15.8911C6.60367 15.5401 6.60367 14.9711 6.95462 14.6201L11.1121 10.4626L6.95462 6.30513C6.60367 5.95417 6.60367 5.38516 6.95462 5.0342C7.30558 4.68325 7.8746 4.68325 8.22556 5.0342L13.0185 9.82718C13.3695 10.1781 13.3695 10.7471 13.0185 11.0981L8.22556 15.8911C7.8746 16.242 7.30558 16.242 6.95462 15.8911Z"
                                        fill="#808080" />
                                </svg>
                            </div>
                        </div>
                    </h2>
                </a>
            </div>

        </div>
        <div class="account-login-detail">
            <div class="left-field">
                <p>Manage Business</p>
            </div>
            <div class="">
                @if($businesses == 0)
                <p class="details-right-sec">No Business Added</p>
                @else
                <p class="details-right-sec">{{$businesses}} Business Added</p>
                @endif
            </div>
        </div>
        <div class="account-login-detail">
            <div class="left-field">
                <p>Business Name</p>
            </div>
            @if($business_data[0]['name'])
                <p class="details-right-sec">{{$business_data[0]['name']}}</p>
            @else
                <p class="details-right-sec">Not Added</p>
            @endif
        </div>
        <div class="account-login-detail">
            <div class="left-field">
                <p>Business Category</p>
            </div>
            @if($business_category)
                <p class="details-right-sec">{{$business_category}}</p>
            @else
                <p class="details-right-sec">Not Added</p>
            @endif
        </div>
        <div class="account-login-detail">
            <div class="left-field">
                <p>Business Address</p>
            </div>
            @if($business_data[0]['business_address'])
            <p class="details-right-sec">
                {{ $business_data[0]['business_address'] }}
            </p>
            @else
            <p class="details-right-sec">Not Added</p>
            @endif
        </div>
        <div class="account-login-detail">
            <div class="left-field">
                <p>Working Hours</p>
            </div>
            @if($business_data[0]['shift_hour'])
            <p class="details-right-sec">{{$business_data[0]['shift_hour']}} hours</p>
            @else
            <p class="details-right-sec">Not Added</p>
            @endif
        </div>
        <div class="account-login-detail">
            <div class="left-field">
                <p>Bank Details</p>
            </div>
            @if($business_data[0]['bank_account'])
            <p class="details-right-sec">{{$business_data[0]['bank_account']}}</p>
            @else
            <p class="details-right-sec">No Business Added</p>
            @endif
        </div>
    </div>
    <div class="account-setting setting_detail_inner_content">
        <div class="setting-detail">
            <div class=" setting-titel-main_last">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M15.836 17.5039H4.16443C3.24357 17.5039 2.49707 16.7574 2.49707 15.8365V8.33338C2.49707 7.41252 3.24357 6.66602 4.16443 6.66602H15.836C16.7568 6.66602 17.5033 7.41252 17.5033 8.33338V15.8365C17.5033 16.7574 16.7568 17.5039 15.836 17.5039Z"
                        stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M13.3355 17.5026V4.99744C13.3355 4.07658 12.589 3.33008 11.6681 3.33008H8.33338C7.41252 3.33008 6.66602 4.07658 6.66602 4.99744V17.5026"
                        stroke="#2F8CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <h2 class="section_title  proxima_nova_semibold">Holiday / Leave Settings</h2>
            </div>
        </div>

        <div class="account-login-detail-main">
            <div class="account-login-detail-sec">
                <div class="main-left-sec">
                    <a class="account-setting-link" href="{{route('holiday_policy')}}">
                        <div class="left-field">
                            <p class="settings_text_data">Holiday Policy
                                <!-- <div class="business_arrow_right"> -->
                            <div class="setting-nest-arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.95462 15.8911C6.60367 15.5401 6.60367 14.9711 6.95462 14.6201L11.1121 10.4626L6.95462 6.30513C6.60367 5.95417 6.60367 5.38516 6.95462 5.0342C7.30558 4.68325 7.8746 4.68325 8.22556 5.0342L13.0185 9.82718C13.3695 10.1781 13.3695 10.7471 13.0185 11.0981L8.22556 15.8911C7.8746 16.242 7.30558 16.242 6.95462 15.8911Z"
                                        fill="#808080" />
                                </svg>
                                <!-- </div> -->
                            </div>
                        </div>
                    </a>
                    </p>
                </div>
                <div class="right-field">
                    @if($holiday_template_count == 0)
                    <p class="details-right-sec">Not Added</p>
                    @else
                    <p class="details-right-sec">{{$holiday_template_count}} Added</p>
                    @endif
                </div>
            </div>
            <div class="account-login-detail-sec">
            <div class="main-left-sec">
                <a class="account-setting-link" href="{{route('weekly_holiday_policy_business_level')}}">
                    <div class="left-field weekly-left-policy">
                        <p class="settings_text_data">Weekly holiday policy
                        <div class="setting-nest-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.95462 15.8911C6.60367 15.5401 6.60367 14.9711 6.95462 14.6201L11.1121 10.4626L6.95462 6.30513C6.60367 5.95417 6.60367 5.38516 6.95462 5.0342C7.30558 4.68325 7.8746 4.68325 8.22556 5.0342L13.0185 9.82718C13.3695 10.1781 13.3695 10.7471 13.0185 11.0981L8.22556 15.8911C7.8746 16.242 7.30558 16.242 6.95462 15.8911Z"
                                    fill="#808080" />
                            </svg>
                        </div>
                        </p>
                    </div>
                </a>
            </div>
            <div class="right-field">
                @if($weekly_holiday_count == 0)
                <p class="details-right-sec">Not Assigned</p>
                @else
                <p class="details-right-sec">{{$weekly_holiday_count}} Assigned</p>
                @endif

            </div>
        </div>
        <div class="account-login-detail-sec">
            <div class="main-left-sec">
                <a class="account-setting-link" href="{{route('leave_policy')}}">
                    <div class="left-field">
                        <p>Leave Policy
                        <div class="setting-nest-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.95462 15.8911C6.60367 15.5401 6.60367 14.9711 6.95462 14.6201L11.1121 10.4626L6.95462 6.30513C6.60367 5.95417 6.60367 5.38516 6.95462 5.0342C7.30558 4.68325 7.8746 4.68325 8.22556 5.0342L13.0185 9.82718C13.3695 10.1781 13.3695 10.7471 13.0185 11.0981L8.22556 15.8911C7.8746 16.242 7.30558 16.242 6.95462 15.8911Z"
                                    fill="#808080" />
                            </svg>
                        </div>
                        </p>
                    </div>
                </a>
            </div>
            <div class="right-field">
                <p class="details-right-sec">08:30 hours</p>
            </div>
            <!-- <div class="business_arrow_right">
                <a class="setting-nest-arrow" href="{{route('leave_policy')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M6.95462 15.8911C6.60367 15.5401 6.60367 14.9711 6.95462 14.6201L11.1121 10.4626L6.95462 6.30513C6.60367 5.95417 6.60367 5.38516 6.95462 5.0342C7.30558 4.68325 7.8746 4.68325 8.22556 5.0342L13.0185 9.82718C13.3695 10.1781 13.3695 10.7471 13.0185 11.0981L8.22556 15.8911C7.8746 16.242 7.30558 16.242 6.95462 15.8911Z"
                            fill="#808080" />
                    </svg>
                </a>
            </div> -->
        </div>
        <div class="account-login-detail-sec">
            <div class="main-left-sec">
                <a class="account-setting-link" href="{{route('departments')}}">
                    <div class="left-field">
                        <p class="settings_text_data">Departments
                        <div class="setting-nest-arrow" href="{{route('departments')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.95462 15.8911C6.60367 15.5401 6.60367 14.9711 6.95462 14.6201L11.1121 10.4626L6.95462 6.30513C6.60367 5.95417 6.60367 5.38516 6.95462 5.0342C7.30558 4.68325 7.8746 4.68325 8.22556 5.0342L13.0185 9.82718C13.3695 10.1781 13.3695 10.7471 13.0185 11.0981L8.22556 15.8911C7.8746 16.242 7.30558 16.242 6.95462 15.8911Z"
                                    fill="#808080" />
                            </svg>
                        </div>
                        </p>
                    </div>
                </a>
            </div>
            <div class="right-field">
                @if($department == 0)
                <p class="details-right-sec">Manage your Department</p>
                @else
                <p class="details-right-sec">{{$department}} Department</p>
                @endif
            </div>
        </div>
            <!-- <div class="business_arrow_right">
                    <a class="setting-nest-arrow" href="{{route('holiday_policy')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6.95462 15.8911C6.60367 15.5401 6.60367 14.9711 6.95462 14.6201L11.1121 10.4626L6.95462 6.30513C6.60367 5.95417 6.60367 5.38516 6.95462 5.0342C7.30558 4.68325 7.8746 4.68325 8.22556 5.0342L13.0185 9.82718C13.3695 10.1781 13.3695 10.7471 13.0185 11.0981L8.22556 15.8911C7.8746 16.242 7.30558 16.242 6.95462 15.8911Z"
                                fill="#808080" />
                        </svg>
                    </a>
                </div> -->
        </div>
        
    </div>

</div>
<!-- <div class="account-login-detail-sec">
                <div class="left-field">
                    <p>Manager settings</p>
                </div>
                <div class="right-field">
                    <p class="details-right-sec">No Manager Added</p>
                </div>
                <a class="setting-nest-arrow" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.95462 15.8911C6.60367 15.5401 6.60367 14.9711 6.95462 14.6201L11.1121 10.4626L6.95462 6.30513C6.60367 5.95417 6.60367 5.38516 6.95462 5.0342C7.30558 4.68325 7.8746 4.68325 8.22556 5.0342L13.0185 9.82718C13.3695 10.1781 13.3695 10.7471 13.0185 11.0981L8.22556 15.8911C7.8746 16.242 7.30558 16.242 6.95462 15.8911Z" fill="#808080" />
                    </svg>
                </a>
            </div> -->
</div>
</div>
</div>
<style>
    .main-left-sec {
        display: flex;
        justify-content: space-between;
        width: 40%;
    }
</style>
@endsection
@section('scripts')
@endsection