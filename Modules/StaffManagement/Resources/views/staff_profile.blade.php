@extends('admin.layout.main')
@section('title')
<title>{{env('APP_NAME')}} | Staff profile</title>
@endsection
@section('header-page')
@php
$firstThreeCharacters = substr($business[0]->name, 0, 3);
$staff_prefix = strtoupper($firstThreeCharacters);
@endphp
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-12 top-header-sub staff-summary-main">
            <div class="breadcrumbs-area clearfix">
                <div class="breadcrumbs-sub">
                    <div class="attendance-breadcrumbs">
                        <a href="{{route('staff')}}" class="back_button"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z" fill="#050E17"></path>
                        </svg></a></a>
                        <h4 class="page-title pull-left proxima_nova_semibold">View Profile
                        </h4>
                    </div>
                </div>
                <ul class="breadcrumbs pull-left">
                    <li class="section_sub_title"><a href="{{route('staff')}}">Staff management</a></li>
                    <li class="section_sub_title">/ Staff profile</li>
                    <li class="section_sub_title">/ Attendance</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
@section('content')
    <div class="staff-profile-main">
        <div class="staff-profile">
            <div class="staff-left-header profile-staff-content">
                <div class="staff-avatar-upload">
                    @if(!empty($staff[0]->staffPhoto[0]->photo))
                    <div class="staff-avatar-preview">
                        <div class="half-image">
                            <img id="staff-imagePreview"
                                src="{{asset('assets/admin/images/staff_photos/'. $staff[0]->staffPhoto[0]->photo)}}"
                                alt="Image Preview 1" data-bs-toggle="modal" data-bs-target="#profile-img-model" style="cursor:pointer">
                            <!-- <div class="input-area" data-bs-toggle="modal" data-bs-target="#profile-img-model">
                                <label id="upload-label" for="upload" style="cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                        fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9 10.5H3C2.1715 10.5 1.5 9.8285 1.5 9V3C1.5 2.1715 2.1715 1.5 3 1.5H9C9.8285 1.5 10.5 2.1715 10.5 3V9C10.5 9.8285 9.8285 10.5 9 10.5Z"
                                            stroke="white" stroke-width="0.9" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M1.5 8.7427L3.806 6.4367C4.0015 6.2412 4.318 6.2412 4.513 6.4367L5.216 7.1397L7.5045 4.8517C7.7 4.6562 8.0165 4.6562 8.2115 4.8517L10.5 7.1402"
                                            stroke="white" stroke-width="0.9" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M4.25758 3.70335C4.33081 3.77658 4.33081 3.8953 4.25758 3.96852C4.18436 4.04174 4.06564 4.04174 3.99242 3.96852C3.91919 3.8953 3.91919 3.77658 3.99242 3.70335C4.06564 3.63013 4.18436 3.63013 4.25758 3.70335"
                                            stroke="white" stroke-width="0.9" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>{{ count($staff[0]->StaffPhoto) }}
                                </label>
                            </div> -->
                        </div>
                    </div>
                    @else
                    <div class="staff-avatar-preview">
                        <div class="half-image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="106" height="106" viewBox="0 0 100 100"
                                fill="none">
                                <circle cx="50" cy="50" r="50" fill="#F0F1F5" />
                                <mask id="mask0_5071_3991" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                                    width="100" height="100">
                                    <circle cx="50" cy="50" r="50" fill="#FAFAFA" />
                                </mask>
                                <g mask="url(#mask0_5071_3991)">
                                    <path
                                        d="M80 100H20V92.381C20 87.3292 21.9754 82.4844 25.4917 78.9123C29.0081 75.3401 33.7772 73.3333 38.75 73.3333H61.25C66.2228 73.3333 70.9919 75.3401 74.5083 78.9123C78.0246 82.4844 80 87.3292 80 92.381V100ZM50 65.7143C47.0453 65.7143 44.1194 65.1231 41.3896 63.9744C38.6598 62.8257 36.1794 61.1421 34.0901 59.0196C32.0008 56.8971 30.3434 54.3773 29.2127 51.6042C28.082 48.831 27.5 45.8588 27.5 42.8571C27.5 39.8555 28.082 36.8832 29.2127 34.1101C30.3434 31.3369 32.0008 28.8172 34.0901 26.6947C36.1794 24.5722 38.6598 22.8886 41.3896 21.7399C44.1194 20.5912 47.0453 20 50 20C55.9674 20 61.6903 22.4082 65.9099 26.6947C70.1295 30.9812 72.5 36.7951 72.5 42.8571C72.5 48.9192 70.1295 54.733 65.9099 59.0196C61.6903 63.3061 55.9674 65.7143 50 65.7143Z"
                                        fill="#BBC6D8" />
                                </g>
                            </svg>
                        </div>
                    </div>
                    @endif
                    <div data-bs-toggle="modal" data-bs-target="#profile-img-model" style="cursor: pointer; ">
                        <!-- <img src="{{asset('assets/admin/images/profile/edit1.svg')}}" alt="" class="staff-model-preview"> -->
                    </div>
                </div>
                <div class="staff-main-header">
                    <div class="staff-profile-names">
                        <h2 class="staff-name proxima_nova_semibold">{{ ucwords($staff[0]->name)}} {{($staff[0]->last_name)}}</h2>
                        <p class="staff-user-skill section_sub_title">{{$staff[0]->department->name}}</p>
                        <span class="staff-number section_sub_title">{{$staff_prefix}}{{$staff[0]->id}}</span>
                    </div>
                    <div class="staff_edit_profile theme_btn_hover_color">
                        <a href="{{ route('view_profile', ['id' => $staff[0]->id]) }}"
                            class="staff-edit-btn section_sub_title">Edit Profile</a>
                    </div>
                </div>
            </div>
            <div class="staff-right-header">
                <div class="staff-profile-details">
                    <div class="staff-profile-num">
                        <h2 class="section_sub_title"> Mobile Number</h2>
                        <p class="staff-phone-number">{{$staff[0]->phone_number}}</p>
                    </div>
                    <div class="staff-profile-num staff-profile-sec">
                        <h2 class="section_sub_title">Staff Type</h2>
                        <p>Monthly Regular</p>
                    </div>
                </div>
                <div class="staff-profile-details-sec ">
                    <!-- <div class="staff-profile-num">
                        <h2 class="section_sub_title">Shift Type</h2>
                        <div class="salary-main-salary">
                            <p class="staff-phone-number">{{$staff[0]->salary_cycle}}</p><span class="month_salary"></span>
                        </div>
                    </div> -->
                    <div class="staff-profile-num staff-profile-sec">
                        <h2 class="section_sub_title">Salary</h2>
                        <div class="salary-main-salary">
                            <p>{{ number_format($staff[0]->salary_amount) }}/</p><span class="month_salary">Month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="staff-atten-profile-main">
        <div class="">
            <ul class="nav nav-tabs" id="myTabs">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active proxima_nova_semibold" id="attendance-tab" data-bs-toggle="tab"
                        href="#attendance" role="tab" aria-controls="attendance" aria-selected="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.16667 3.25C3.66041 3.25 3.25 3.66041 3.25 4.16667V15.8333C3.25 16.3396 3.66041 16.75 4.16667 16.75H15C15.5063 16.75 15.9167 16.3396 15.9167 15.8333V14.1667C15.9167 13.7525 16.2525 13.4167 16.6667 13.4167C17.0809 13.4167 17.4167 13.7525 17.4167 14.1667V15.8333C17.4167 17.168 16.3347 18.25 15 18.25H4.16667C2.83198 18.25 1.75 17.168 1.75 15.8333V4.16667C1.75 2.83198 2.83198 1.75 4.16667 1.75H15C16.3347 1.75 17.4167 2.83198 17.4167 4.16667V5.83333C17.4167 6.24755 17.0809 6.58333 16.6667 6.58333C16.2525 6.58333 15.9167 6.24755 15.9167 5.83333V4.16667C15.9167 3.66041 15.5063 3.25 15 3.25H4.16667Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.08594 6.66699C5.08594 6.25278 5.42172 5.91699 5.83594 5.91699H13.336C13.7502 5.91699 14.086 6.25278 14.086 6.66699C14.086 7.08121 13.7502 7.41699 13.336 7.41699H5.83594C5.42172 7.41699 5.08594 7.08121 5.08594 6.66699Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.08594 10C5.08594 9.58579 5.42172 9.25 5.83594 9.25H11.6693C12.0835 9.25 12.4193 9.58579 12.4193 10C12.4193 10.4142 12.0835 10.75 11.6693 10.75H5.83594C5.42172 10.75 5.08594 10.4142 5.08594 10Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.08594 13.333C5.08594 12.9188 5.42172 12.583 5.83594 12.583H13.336C13.7502 12.583 14.086 12.9188 14.086 13.333C14.086 13.7472 13.7502 14.083 13.336 14.083H5.83594C5.42172 14.083 5.08594 13.7472 5.08594 13.333Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18.8637 8.21967C19.1566 8.51256 19.1566 8.98744 18.8637 9.28033L16.7803 11.3637C16.4874 11.6566 16.0126 11.6566 15.7197 11.3637L14.4697 10.1137C14.1768 9.82077 14.1768 9.3459 14.4697 9.053C14.7626 8.76011 15.2374 8.76011 15.5303 9.053L16.25 9.77267L17.803 8.21967C18.0959 7.92678 18.5708 7.92678 18.8637 8.21967Z"
                                fill="#808080" />
                        </svg>Attendance</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link proxima_nova_semibold" id="leaves-tab" data-bs-toggle="tab" href="#leaves" role="tab"
                        aria-controls="leaves" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.16345 3.12207C3.58742 3.12207 3.12109 3.58839 3.12109 4.16443V13.3349C3.12109 13.911 3.58742 14.3773 4.16345 14.3773H8.33186C8.67704 14.3773 8.95686 14.6571 8.95686 15.0023C8.95686 15.3475 8.67704 15.6273 8.33186 15.6273H4.16345C2.89706 15.6273 1.87109 14.6013 1.87109 13.3349V4.16443C1.87109 2.89804 2.89706 1.87207 4.16345 1.87207H14.1676C15.434 1.87207 16.46 2.89804 16.46 4.16443V8.33283C16.46 8.67801 16.1802 8.95783 15.835 8.95783C15.4898 8.95783 15.21 8.67801 15.21 8.33283V4.16443C15.21 3.58839 14.7437 3.12207 14.1676 3.12207H4.16345Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.87109 6.66504C1.87109 6.31986 2.15092 6.04004 2.49609 6.04004H15.835C16.1802 6.04004 16.46 6.31986 16.46 6.66504C16.46 7.01022 16.1802 7.29004 15.835 7.29004H2.49609C2.15092 7.29004 1.87109 7.01022 1.87109 6.66504Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.8002 12.9858C13.0443 12.7417 13.4401 12.7417 13.6841 12.9858L15.5366 14.8382C15.7806 15.0823 15.7806 15.478 15.5366 15.7221C15.2925 15.9662 14.8968 15.9662 14.6527 15.7221L12.8002 13.8697C12.5562 13.6256 12.5562 13.2299 12.8002 12.9858Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15.5366 12.9858C15.7806 13.2299 15.7806 13.6256 15.5366 13.8697L13.6841 15.7221C13.4401 15.9662 13.0443 15.9662 12.8002 15.7221C12.5562 15.478 12.5562 15.0823 12.8002 14.8382L14.6527 12.9858C14.8968 12.7417 15.2925 12.7417 15.5366 12.9858Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.4994 11.459C11.9234 11.459 11.457 11.9253 11.457 12.5013V15.8361C11.457 16.4121 11.9234 16.8784 12.4994 16.8784H15.8341C16.4102 16.8784 16.8765 16.4121 16.8765 15.8361V12.5013C16.8765 11.9253 16.4102 11.459 15.8341 11.459H12.4994ZM10.207 12.5013C10.207 11.235 11.233 10.209 12.4994 10.209H15.8341C17.1005 10.209 18.1265 11.235 18.1265 12.5013V15.8361C18.1265 17.1025 17.1005 18.1284 15.8341 18.1284H12.4994C11.233 18.1284 10.207 17.1025 10.207 15.8361V12.5013Z"
                                fill="#808080" />
                        </svg>Leaves</a>
                </li>
                {{--                <li class="nav-item" role="presentation">--}}
                {{--                    <a class="nav-link proxima_nova_semibold" id="overtime-tab" data-bs-toggle="tab"--}}
                {{--                       href="#overtime" role="tab" aria-controls="overtime" aria-selected="false">--}}
                {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"--}}
                {{--                             fill="none">--}}
                {{--                            <path fill-rule="evenodd" clip-rule="evenodd"--}}
                {{--                                  d="M1.875 4.99967C1.875 3.73366 2.90066 2.70801 4.16667 2.70801H10.8333C11.1785 2.70801 11.4583 2.98783 11.4583 3.33301C11.4583 3.67819 11.1785 3.95801 10.8333 3.95801H4.16667C3.59101 3.95801 3.125 4.42402 3.125 4.99967V15.833C3.125 16.4087 3.59101 16.8747 4.16667 16.8747H15C15.5757 16.8747 16.0417 16.4087 16.0417 15.833V9.16634C16.0417 8.82116 16.3215 8.54134 16.6667 8.54134C17.0118 8.54134 17.2917 8.82116 17.2917 9.16634V15.833C17.2917 17.099 16.266 18.1247 15 18.1247H4.16667C2.90066 18.1247 1.875 17.099 1.875 15.833V4.99967Z"--}}
                {{--                                  fill="#808080" />--}}
                {{--                            <path fill-rule="evenodd" clip-rule="evenodd"--}}
                {{--                                  d="M14.1628 2.29102C12.2071 2.29102 10.6211 3.87703 10.6211 5.83268C10.6211 7.78834 12.2071 9.37435 14.1628 9.37435C16.1192 9.37435 17.7044 7.78842 17.7044 5.83268C17.7044 3.87695 16.1192 2.29102 14.1628 2.29102ZM14.1628 10.6243C16.8097 10.6243 18.9544 8.47861 18.9544 5.83268C18.9544 3.18675 16.8097 1.04102 14.1628 1.04102C11.5167 1.04102 9.37109 3.18667 9.37109 5.83268C9.37109 8.47869 11.5167 10.6243 14.1628 10.6243Z"--}}
                {{--                                  fill="#808080" />--}}
                {{--                            <path fill-rule="evenodd" clip-rule="evenodd"--}}
                {{--                                  d="M12.0947 5.83398C12.0947 5.45257 12.4038 5.14338 12.7853 5.14338L15.546 5.14338C15.9274 5.14338 16.2366 5.45257 16.2366 5.83398C16.2366 6.2154 15.9274 6.52459 15.546 6.52459L12.7853 6.52459C12.4038 6.52459 12.0947 6.2154 12.0947 5.83398Z"--}}
                {{--                                  fill="#808080" />--}}
                {{--                            <path fill-rule="evenodd" clip-rule="evenodd"--}}
                {{--                                  d="M14.1656 3.76302C14.547 3.76302 14.8562 4.07222 14.8562 4.45363V7.21434C14.8562 7.59575 14.547 7.90495 14.1656 7.90495C13.7842 7.90495 13.475 7.59575 13.475 7.21434V4.45363C13.475 4.07222 13.7842 3.76302 14.1656 3.76302Z"--}}
                {{--                                  fill="#808080" />--}}
                {{--                        </svg>Overtime</a>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item" role="presentation">--}}
                {{--                    <a class="nav-link proxima_nova_semibold" id="allowances-tab" data-bs-toggle="tab"--}}
                {{--                       href="#allowances" role="tab" aria-controls="allowances" aria-selected="false">--}}
                {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"--}}
                {{--                             fill="none">--}}
                {{--                            <path fill-rule="evenodd" clip-rule="evenodd"--}}
                {{--                                  d="M3.30078 11.5002C3.20078 11.5002 3.10078 11.6002 3.10078 11.7002V16.7002C3.10078 16.8002 3.20078 16.9002 3.30078 16.9002H5.00078C5.10078 16.9002 5.20078 16.8002 5.20078 16.7002V11.7002C5.20078 11.6002 5.10078 11.5002 5.00078 11.5002H3.30078ZM1.90078 11.7002C1.90078 10.9002 2.60078 10.2002 3.40078 10.2002H5.00078C5.80078 10.2002 6.50078 10.9002 6.50078 11.7002V16.7002C6.50078 17.5002 5.80078 18.2002 5.00078 18.2002H3.30078C2.50078 18.2002 1.80078 17.5002 1.80078 16.7002V11.7002H1.90078Z"--}}
                {{--                                  fill="#808080" />--}}
                {{--                            <path--}}
                {{--                                    d="M10.8992 17.9998C10.5992 17.9998 10.2992 17.9998 9.89922 17.8998L7.69922 17.2998C7.49922 17.1998 7.29922 17.1998 6.99922 17.1998H5.79922C5.49922 17.1998 5.19922 16.8998 5.19922 16.5998C5.19922 16.2998 5.49922 15.9998 5.79922 15.9998H7.09922C7.39922 15.9998 7.69922 15.9998 8.09922 16.0998L10.2992 16.6998C10.6992 16.7998 11.0992 16.7998 11.4992 16.6998L13.8992 16.1998C14.3992 16.0998 14.8992 15.7998 15.2992 15.4998L16.9992 13.7998C17.2992 13.4998 17.2992 13.0998 16.9992 12.8998C16.7992 12.6998 16.3992 12.5998 16.0992 12.7998L14.0992 14.2998C13.6992 14.5998 13.1992 14.7998 12.6992 14.7998H10.7992C10.4992 14.7998 10.1992 14.4998 10.1992 14.1998C10.1992 13.8998 10.4992 13.5998 10.7992 13.5998H12.6992C12.8992 13.5998 13.1992 13.4998 13.2992 13.3998L15.2992 11.8998C15.9992 11.2998 17.0992 11.3998 17.6992 12.0998C18.0992 12.4998 18.1992 12.8998 18.1992 13.3998C18.1992 13.8998 17.9992 14.3998 17.6992 14.6998L15.9992 16.3998C15.4992 16.9998 14.7992 17.2998 13.9992 17.4998L11.5992 17.9998C11.3992 17.9998 11.1992 17.9998 10.8992 17.9998Z"--}}
                {{--                                    fill="#808080" />--}}
                {{--                            <path fill-rule="evenodd" clip-rule="evenodd"--}}
                {{--                                  d="M6.99976 11.0002C7.69976 10.5002 8.59975 10.2002 9.49975 10.2002C9.89975 10.2002 10.1998 10.2002 10.5998 10.3002L12.4998 10.8002C13.2998 11.0002 13.8998 11.8002 13.8998 12.6002V12.9002C13.8998 13.9002 13.0998 14.8002 11.9998 14.8002H10.7998C10.4998 14.8002 10.1998 14.5002 10.1998 14.2002C10.1998 13.9002 10.4998 13.6002 10.7998 13.6002H11.9998C12.3998 13.6002 12.5998 13.3002 12.5998 13.0002V12.7002C12.5998 12.4002 12.3998 12.2002 12.0998 12.1002L10.1998 11.6002C9.89975 11.5002 9.69975 11.5002 9.39975 11.5002C8.79975 11.5002 8.09976 11.7002 7.59976 12.1002L6.09975 13.1002C5.79975 13.3002 5.39975 13.2002 5.19975 12.9002C4.99975 12.6002 5.09976 12.2002 5.39976 12.0002L6.99976 11.0002Z"--}}
                {{--                                  fill="#808080" />--}}
                {{--                            <path fill-rule="evenodd" clip-rule="evenodd"--}}
                {{--                                  d="M13.8996 4.7C13.1996 4 12.0996 4 11.3996 4.7C10.6996 5.4 10.6996 6.5 11.3996 7.2C12.0996 7.9 13.1996 7.9 13.8996 7.2C14.4996 6.5 14.4996 5.4 13.8996 4.7ZM14.6996 3.9C13.4996 2.7 11.5996 2.7 10.4996 3.9C9.29961 5.1 9.29961 7 10.4996 8.1C11.6996 9.3 13.5996 9.3 14.6996 8.1C15.7996 6.9 15.8996 5 14.6996 3.9Z"--}}
                {{--                                  fill="#808080" />--}}
                {{--                            <path fill-rule="evenodd" clip-rule="evenodd"--}}
                {{--                                  d="M7.80039 1.9C9.00039 0.7 10.9004 0.7 12.0004 1.9C12.5004 2.4 12.7004 2.9 12.8004 3.5C12.9004 3.8 12.6004 4.2 12.3004 4.2C12.0004 4.3 11.6004 4 11.6004 3.7C11.5004 3.3 11.4004 3 11.1004 2.8C10.4004 2.1 9.30039 2.1 8.60039 2.8C8.00039 3.5 8.00039 4.6 8.60039 5.3C9.00039 5.7 9.60039 5.9 10.2004 5.8C10.5004 5.7 10.9004 6 10.9004 6.3C11.0004 6.6 10.8004 6.9 10.4004 7C9.50039 7.1 8.50039 6.9 7.80039 6.1C6.60039 5 6.60039 3.1 7.80039 1.9Z"--}}
                {{--                                  fill="#808080" />--}}
                {{--                        </svg>Allowances</a>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item" role="presentation">--}}
                {{--                    <a class="nav-link proxima_nova_semibold" id="deduction-tab" data-bs-toggle="tab"--}}
                {{--                       href="#deduction" role="tab" aria-controls="deduction" aria-selected="false">--}}
                {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"--}}
                {{--                             fill="none">--}}
                {{--                            <path fill-rule="evenodd" clip-rule="evenodd"--}}
                {{--                                  d="M6.8833 13.3087C6.21388 12.6393 5.12852 12.6393 4.4591 13.3087C3.78968 13.9781 3.78968 15.0635 4.4591 15.7329C5.12852 16.4023 6.21388 16.4023 6.8833 15.7329C7.55272 15.0635 7.55272 13.9781 6.8833 13.3087ZM7.76718 12.4248C6.6096 11.2672 4.73279 11.2672 3.57521 12.4248C2.41764 13.5824 2.41764 15.4592 3.57521 16.6168C4.73279 17.7744 6.6096 17.7744 7.76718 16.6168C8.92476 15.4592 8.92476 13.5824 7.76718 12.4248Z"--}}
                {{--                                  fill="#808080" />--}}
                {{--                            <path fill-rule="evenodd" clip-rule="evenodd"--}}
                {{--                                  d="M6.8833 4.26574C6.21388 3.59632 5.12852 3.59632 4.4591 4.26574C3.78968 4.93516 3.78968 6.02052 4.4591 6.68994C5.12852 7.35936 6.21388 7.35936 6.8833 6.68994C7.55272 6.02052 7.55272 4.93516 6.8833 4.26574ZM7.76718 3.38186C6.6096 2.22428 4.73279 2.22428 3.57521 3.38186C2.41764 4.53943 2.41764 6.41624 3.57521 7.57382C4.73279 8.7314 6.6096 8.7314 7.76718 7.57382C8.92476 6.41624 8.92476 4.53943 7.76718 3.38186Z"--}}
                {{--                                  fill="#808080" />--}}
                {{--                            <path fill-rule="evenodd" clip-rule="evenodd"--}}
                {{--                                  d="M3.94965 7.21196C4.11311 6.90794 4.49208 6.794 4.7961 6.95746L16.9628 13.4991C17.2668 13.6626 17.3807 14.0416 17.2173 14.3456C17.0538 14.6496 16.6748 14.7635 16.3708 14.6001L4.20415 8.05841C3.90013 7.89495 3.78618 7.51598 3.94965 7.21196Z"--}}
                {{--                                  fill="#808080" />--}}
                {{--                            <path fill-rule="evenodd" clip-rule="evenodd"--}}
                {{--                                  d="M17.2173 5.65337C17.3807 5.95738 17.2668 6.33635 16.9628 6.49982L4.7961 13.0415C4.49208 13.2049 4.11311 13.091 3.94965 12.787C3.78618 12.483 3.90013 12.104 4.20415 11.9405L16.3708 5.39886C16.6748 5.2354 17.0538 5.34935 17.2173 5.65337Z"--}}
                {{--                                  fill="#808080" />--}}
                {{--                        </svg>Deduction</a>--}}
                {{--                </li>--}}
            </ul>
        </div>
        <!-- atten tab start -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="attendance" role="tabpanel" aria-labelledby="attendance-tab">
                <row>
                    <div class="approve-datas staff_profile_atten">
                        <div class="atten-data-profile assign-data-search col-md-4 col-sm-4">
                            <h4 class="page-title pull-left proxima_nova_semibold">Attendance</h4>
                        </div>
                        <div class="approve-right-data col-md-8 col-sm-8">
                            <div class="approve-data-download dropdown-toggle proxima_nova_bold cursor_pointer report_data_download">
                                <!-- <a><img src="{{asset('assets/admin/images/approve_punches/download-report.svg')}}"
                                        alt=""></a> -->
                                <a id="export_excel">
                                    <div class="export_report_data">
                                        <p class="export_data_report section_sub_title">Export</p>
                                    </div>
                                    <div class="report_down_img"> 
                                        <img class="" src="{{ asset('assets/admin/images/approve_punches/download-report.svg')}}" alt="">
                                    </div>
                                </a>
                            </div>
                            <div class="staff_profile_datepicker">
                                <input type="text" id="attendance_datepicker" class="start_date form-control m-0 attence_datepicker proxima_nova_semibold input-group-addon" value="{{ $start_date }}" readonly="true"/>
                                <div class="date_range_to">
                                    to
                                </div>
                                <input type="text" id="attendance_datepicker" class="end_date form-control m-0 attence_datepicker proxima_nova_semibold input-group-addon" value="{{ $end_date }}" readonly="true"/>
                            </div>
                        </div>

                    <div class="approve-datas atten-datas staff-profile-approve staff_profile_attendance sms_staff">
                        <!-- <div class="atten-data-search assign-data-search send_absent_staff col-md-6 col-sm-6">
                            <input type="checkbox" id="absent_sms">
                            <label for="absent_sms" class="atten-sms section_sub_title pull-left">Send Absent SMS to Staff
                            </label>
                        </div> -->
                        <!-- <div class="col-md-6 col-sm-6 staff-right-section">
                            <div class="staff-right-btn">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                        fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9 2.8125C5.58241 2.8125 2.8125 5.58241 2.8125 9C2.8125 12.4176 5.58241 15.1875 9 15.1875C12.4176 15.1875 15.1875 12.4176 15.1875 9C15.1875 5.58241 12.4176 2.8125 9 2.8125ZM9 1.6875C4.96109 1.6875 1.6875 4.96109 1.6875 9C1.6875 13.0389 4.96109 16.3125 9 16.3125C13.0389 16.3125 16.3125 13.0389 16.3125 9C16.3125 4.96109 13.0389 1.6875 9 1.6875Z"
                                            fill="#17B643" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.3977 7.10225C12.6174 7.32192 12.6174 7.67808 12.3977 7.89775L8.64775 11.6477C8.42808 11.8674 8.07192 11.8674 7.85225 11.6477L5.60225 9.39775C5.38258 9.17808 5.38258 8.82192 5.60225 8.60225C5.82192 8.38258 6.17808 8.38258 6.39775 8.60225L8.25 10.4545L11.6023 7.10225C11.8219 6.88258 12.1781 6.88258 12.3977 7.10225Z"
                                            fill="#17B643" />
                                    </svg>
                                </div>
                                <a href="" class="proxima_nova_semibold">All Approved</a>
                            </div>
                        </div> -->
                    </div>
                </div>
                </row>
                <!-- staff-status-start -->
                <div class="atten-status-main staff-atten-profile">
                    <div class="atten-status-sub">
                        <div class="atten-third-section-box">
                            <div class="atten-status-boxs">
                                <h2 class="section_title proxima_nova_semibold" id="month_count">{{$month_count}}</h2>
                                <p class="section_sub_title proxima_nova_semibold">Days</p>
                            </div>
                            <div>
                                <img src="{{asset('assets/admin/images/staff_manage/days.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="atten-third-section-box">
                            <div class="atten-status-boxs">
                                <h2 class="section_title proxima_nova_semibold" id="present_count">{{$present_count}}</h2>
                                <p class="section_sub_title proxima_nova_semibold">Present</p>
                            </div>
                            <div>
                                <img src="{{asset('assets/admin/images/staff_manage/Present.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="atten-third-section-box">
                            <div class="atten-status-boxs">
                                <h2 class="section_title proxima_nova_semibold" id="absent_count">{{$absent_count}}</h2>
                                <p class="section_sub_title proxima_nova_semibold">Absent</p>
                            </div>
                            <div>
                                <img src="{{asset('assets/admin/images/staff_manage/Absent.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="atten-third-section-box">
                            <div class="atten-status-boxs">
                                <h2 class="section_title proxima_nova_semibold" id="half_day">{{$halfday_count}}</h2>
                                <p class="section_sub_title proxima_nova_semibold">Half Day</p>
                            </div>
                            <div>
                                <img src="{{asset('assets/admin/images/staff_manage/Halfday.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="atten-third-section-box">
                            <div class="atten-status-boxs">
                                <h2 class="section_title proxima_nova_semibold" id="paid_leave">{{$paidleave_count}}</h2>
                                <p class="section_sub_title proxima_nova_semibold">Paid Leave</p>
                            </div>
                            <div>
                                <img src="{{asset('assets/admin/images/staff_manage/leave.svg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="approve_staff_data">
                    <table id="staff_attendance_data" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Date / Day</th>
                                <th>Staff Time</th>
                                <th>Note</th>
                                <th>Status</th>
                                <th>Overtime</th>
                                <th>Fine</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="leaves" role="tabpanel" aria-labelledby="leaves-tab">

                <row>
                    <div class="approve-datas staff-profile-leaves">
                        <div class="atten-data-profile assign-data-search col-md-6 col-sm-6">


                            <h4 class="page-title pull-left proxima_nova_semibold">Leaves
                            </h4>
                            <div class="approve-data-search">
                                <form action="" method="">
                                    <input class="input-search-rounded" type="text" id="staff_data_find"
                                        placeholder="Search">
                                </form>
                            </div>


                        </div>
                        <div class="approve-right-data col-md-6 col-sm-6">
                            <div class="approve-data-download  dropdown-toggle proxima_nova_bold">
                                <a href="#"><img src="{{asset('assets/admin/images/approve_punches/download-report.svg')}}"
                                        alt=""></a>
                            </div>
                            <div class="dropdown-menu" x-placement="bottom-start">
                                <a class="dropdown-item proxima_nova_semibold" href="#">Excel Report</a>
                                <a class="dropdown-item proxima_nova_semibold" href="#">PDF Report</a>
                            </div>
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" id="attendance_datepicker"
                                    class="form-control m-0 proxima_nova_semibold attence_datepicker input-group-addon"
                                    value="{{ date('M Y') }}">
                            </div>
                        </div>

                    </div>
                </row>

                <div class="approve_staff_data" id="daily_attendance menu1">
                    <table id="leaves_data" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Leave Type</th>
                                <th>Reason</th>
                                <th>Marked by</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>12 Sep | Mon</td>
                                <td class="leave_reject">Absent</td>
                                <td>Due to high fever.</td>
                                <td>By Admin on 18-Apr-2023</td>
                                <td class="leave_approve">Approved</td>
                                <td>
                                    <div class="approve-main-sec"><button class="atten-coming-btn"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M13.6882 3.98043C13.8835 4.17569 13.8835 4.49228 13.6882 4.68754L6.35486 12.0209C6.15959 12.2161 5.84301 12.2161 5.64775 12.0209L2.31442 8.68754C2.11915 8.49228 2.11915 8.17569 2.31442 7.98043C2.50968 7.78517 2.82626 7.78517 3.02152 7.98043L6.0013 10.9602L12.9811 3.98043C13.1763 3.78517 13.4929 3.78517 13.6882 3.98043Z"
                                                    fill="#808080" />
                                            </svg>
                                        </button>
                                        <button class="atten-coming-btn reject_danger_btn"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2.84154 2.84154C3.07296 2.61011 3.44817 2.61011 3.67959 2.84154L13.1611 12.323C13.3925 12.5544 13.3925 12.9296 13.1611 13.1611C12.9296 13.3925 12.5544 13.3925 12.323 13.1611L2.84154 3.67959C2.61011 3.44817 2.61011 3.07296 2.84154 2.84154Z"
                                                    fill="#FF5E5E" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M13.1611 2.84154C13.3925 3.07296 13.3925 3.44817 13.1611 3.67959L3.67959 13.1611C3.44817 13.3925 3.07296 13.3925 2.84154 13.1611C2.61011 12.9296 2.61011 12.5544 2.84154 12.323L12.323 2.84154C12.5544 2.61011 12.9296 2.61011 13.1611 2.84154Z"
                                                    fill="#FF5E5E" />
                                            </svg></button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>12 Sep | Mon</td>
                                <td>Paid Leave</td>
                                <td>Due to family function.</td>
                                <td>By Admin on 15-Apr-2023</td>
                                <td class="leave_reject">Rejected</td>
                                <td>
                                    <div class="approve-main-sec"><button class="atten-coming-btn approve_success_btn"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M13.6882 3.98043C13.8835 4.17569 13.8835 4.49228 13.6882 4.68754L6.35486 12.0209C6.15959 12.2161 5.84301 12.2161 5.64775 12.0209L2.31442 8.68754C2.11915 8.49228 2.11915 8.17569 2.31442 7.98043C2.50968 7.78517 2.82626 7.78517 3.02152 7.98043L6.0013 10.9602L12.9811 3.98043C13.1763 3.78517 13.4929 3.78517 13.6882 3.98043Z"
                                                    fill="#17B643" />
                                            </svg></button>
                                        <button class="atten-coming-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2.84154 2.84154C3.07296 2.61011 3.44817 2.61011 3.67959 2.84154L13.1611 12.323C13.3925 12.5544 13.3925 12.9296 13.1611 13.1611C12.9296 13.3925 12.5544 13.3925 12.323 13.1611L2.84154 3.67959C2.61011 3.44817 2.61011 3.07296 2.84154 2.84154Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M13.1611 2.84154C13.3925 3.07296 13.3925 3.44817 13.1611 3.67959L3.67959 13.1611C3.44817 13.3925 3.07296 13.3925 2.84154 13.1611C2.61011 12.9296 2.61011 12.5544 2.84154 12.323L12.323 2.84154C12.5544 2.61011 12.9296 2.61011 13.1611 2.84154Z"
                                                    fill="#808080" />
                                            </svg></button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>13 Jun | Wed</td>
                                <td>Unpaid Leave</td>
                                <td>Due to health related issues.</td>
                                <td>By Admin on 13-Apr-2023</td>
                                <td class="leave_reject">Rejected</td>
                                <td>
                                    <div class="approve-main-sec"><button class="atten-coming-btn"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M13.6882 3.98043C13.8835 4.17569 13.8835 4.49228 13.6882 4.68754L6.35486 12.0209C6.15959 12.2161 5.84301 12.2161 5.64775 12.0209L2.31442 8.68754C2.11915 8.49228 2.11915 8.17569 2.31442 7.98043C2.50968 7.78517 2.82626 7.78517 3.02152 7.98043L6.0013 10.9602L12.9811 3.98043C13.1763 3.78517 13.4929 3.78517 13.6882 3.98043Z"
                                                    fill="#808080" />
                                            </svg>
                                        </button>
                                        <button class="atten-coming-btn reject_danger_btn"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2.84154 2.84154C3.07296 2.61011 3.44817 2.61011 3.67959 2.84154L13.1611 12.323C13.3925 12.5544 13.3925 12.9296 13.1611 13.1611C12.9296 13.3925 12.5544 13.3925 12.323 13.1611L2.84154 3.67959C2.61011 3.44817 2.61011 3.07296 2.84154 2.84154Z"
                                                    fill="#FF5E5E" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M13.1611 2.84154C13.3925 3.07296 13.3925 3.44817 13.1611 3.67959L3.67959 13.1611C3.44817 13.3925 3.07296 13.3925 2.84154 13.1611C2.61011 12.9296 2.61011 12.5544 2.84154 12.323L12.323 2.84154C12.5544 2.61011 12.9296 2.61011 13.1611 2.84154Z"
                                                    fill="#FF5E5E" />
                                            </svg></button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>11 Sep | Mon</td>
                                <td>Paid Leave</td>
                                <td>Due to health related issues.</td>
                                <td>By Admin on 13-Apr-2023</td>
                                <td class="leave_pending">Pending</td>
                                <td>
                                    <div class="approve-main-sec"><button class="atten-coming-btn"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M13.6882 3.98043C13.8835 4.17569 13.8835 4.49228 13.6882 4.68754L6.35486 12.0209C6.15959 12.2161 5.84301 12.2161 5.64775 12.0209L2.31442 8.68754C2.11915 8.49228 2.11915 8.17569 2.31442 7.98043C2.50968 7.78517 2.82626 7.78517 3.02152 7.98043L6.0013 10.9602L12.9811 3.98043C13.1763 3.78517 13.4929 3.78517 13.6882 3.98043Z"
                                                    fill="#808080" />
                                            </svg>
                                        </button>
                                        <button class="atten-coming-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2.84154 2.84154C3.07296 2.61011 3.44817 2.61011 3.67959 2.84154L13.1611 12.323C13.3925 12.5544 13.3925 12.9296 13.1611 13.1611C12.9296 13.3925 12.5544 13.3925 12.323 13.1611L2.84154 3.67959C2.61011 3.44817 2.61011 3.07296 2.84154 2.84154Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M13.1611 2.84154C13.3925 3.07296 13.3925 3.44817 13.1611 3.67959L3.67959 13.1611C3.44817 13.3925 3.07296 13.3925 2.84154 13.1611C2.61011 12.9296 2.61011 12.5544 2.84154 12.323L12.323 2.84154C12.5544 2.61011 12.9296 2.61011 13.1611 2.84154Z"
                                                    fill="#808080" />
                                            </svg></button>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="overtime" role="tabpanel" aria-labelledby="overtime-tab">
                <div class="overtime-tab-list">
                    <row>
                        <div class="approve-datas staff-profile-leaves">
                            <div class="atten-data-profile assign-data-search col-md-6 col-sm-6">
                                <h4 class="page-title pull-left proxima_nova_semibold">Overtime</h4>
                                <div class="approve-data-search">
                                    <form action="" method="">
                                        <input class="input-search-rounded" type="text" id="staff_data_find"
                                            placeholder="Search">
                                    </form>
                                </div>
                            </div>
                            <div class="approve-right-data col-md-6 col-sm-6">
                                <div class="approve-data-download  dropdown-toggle proxima_nova_bold">
                                    <a href="#"><img
                                            src="{{asset('assets/admin/images/approve_punches/download-report.svg')}}"
                                            alt=""></a>
                                </div>
                                <div class="dropdown-menu" x-placement="bottom-start">
                                    <a class="dropdown-item proxima_nova_semibold" href="#">Excel Report</a>
                                    <a class="dropdown-item proxima_nova_semibold" href="#">PDF Report</a>
                                </div>
                                <div class="input-group date" data-provide="datepicker">
                                    <input type="text" class="form-control proxima_nova_semibold calender-picker"
                                        readonly='true'>
                                    <div class="input-group-addon calender-img">
                                        <!-- <img src="../assets/images/approve_punches/calender.svg" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                            fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1.26898 3.26898C1.62763 2.91034 2.20911 2.91034 2.56775 3.26898L6 6.70123L9.43225 3.26898C9.79089 2.91034 10.3724 2.91034 10.731 3.26898C11.0897 3.62763 11.0897 4.20911 10.731 4.56775L6.64938 8.64938C6.29074 9.00803 5.70926 9.00803 5.35062 8.64938L1.26898 4.56775C0.910339 4.20911 0.910339 3.62763 1.26898 3.26898Z"
                                                fill="#808080"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </row>
                    <div class="approve_staff_data" id="daily_attendance menu1">
                        <table id="overtime_data" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Overtime</th>
                                    <th>Paid / Not Paid</th>
                                    <th>Payments</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>19 April | Mon</td>
                                    <td>+15 Mins</td>
                                    <td>Paid</td>
                                    <td>&#x20B9 200</td>
                                    <td>
                                        <div class="atten-action-main">
                                            <div class="add-overtime-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M3.34356 3.3166C2.96581 3.3166 2.65156 3.6263 2.65156 4.0186V12.6479C2.65156 13.0402 2.96581 13.3499 3.34356 13.3499H12.6596C13.0373 13.3499 13.3516 13.0402 13.3516 12.6479V8.71127C13.3516 8.35228 13.6426 8.06127 14.0016 8.06127C14.3605 8.06127 14.6516 8.35228 14.6516 8.71127V12.6479C14.6516 13.749 13.7645 14.6499 12.6596 14.6499H3.34356C2.23864 14.6499 1.35156 13.749 1.35156 12.6479V4.0186C1.35156 2.91757 2.23864 2.0166 3.34356 2.0166H8.00156C8.36055 2.0166 8.65156 2.30762 8.65156 2.6666C8.65156 3.02559 8.36055 3.3166 8.00156 3.3166H3.34356Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M11.1515 2.59748C11.926 1.82297 13.1816 1.82297 13.9561 2.59748L13.4965 3.0571L13.9561 2.59748L14.0708 2.71215C14.8453 3.48666 14.8453 4.74221 14.0708 5.51672L8.47742 11.1101L8.47563 11.1118C8.30797 11.2782 8.09809 11.3982 7.86549 11.4564C7.86547 11.4564 7.86546 11.4564 7.86545 11.4564L5.39012 12.0754C5.33547 12.0902 5.27849 12.098 5.22047 12.0979C5.04608 12.0981 4.88106 12.0275 4.76081 11.9075C4.64077 11.7872 4.57019 11.6222 4.57031 11.4478C4.57027 11.3898 4.57805 11.3328 4.59288 11.2781L5.21187 8.80279C5.21188 8.80277 5.21188 8.80276 5.21188 8.80275C5.26968 8.5716 5.38922 8.35978 5.55818 8.19082L11.1515 2.59748ZM6.1139 10.5543L7.55011 10.1952L7.55015 10.1952C7.55214 10.1947 7.55546 10.1934 7.55963 10.1894C7.55975 10.1893 7.55986 10.1891 7.55997 10.189L13.1515 4.59748C13.4183 4.33066 13.4183 3.89821 13.1515 3.63139L13.0368 3.51672C12.77 3.2499 12.3376 3.2499 12.0708 3.51672L6.47742 9.11005C6.47572 9.11175 6.47393 9.11458 6.47306 9.11808L6.47305 9.11812L6.1139 10.5543Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.0966 3.65327C10.3505 3.39943 10.762 3.39943 11.0159 3.65327L13.0159 5.65327C13.2697 5.90711 13.2697 6.31867 13.0159 6.57251C12.762 6.82635 12.3505 6.82635 12.0966 6.57251L10.0966 4.57251C9.84279 4.31867 9.84279 3.90711 10.0966 3.65327Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.77438 8.32084C5.8206 8.31425 5.94266 8.29688 6.05157 8.29688C7.33122 8.29688 8.36823 9.33389 8.36823 10.6135C8.36823 10.7251 8.35178 10.8394 8.34414 10.8926C8.34295 10.9008 8.34197 10.9076 8.3413 10.9127C8.2943 11.2685 7.96768 11.519 7.61179 11.4719C7.2559 11.4249 7.00549 11.0983 7.0525 10.7424C7.05451 10.7272 7.05679 10.7108 7.05864 10.6975C7.05924 10.6932 7.0598 10.6892 7.06028 10.6857C7.06257 10.6691 7.06421 10.6568 7.0655 10.6458C7.06807 10.6239 7.06823 10.6154 7.06823 10.6135C7.06823 10.0519 6.61326 9.59689 6.05159 9.59687C6.05147 9.59688 6.04942 9.5969 6.04483 9.59724C6.03959 9.59762 6.03209 9.59834 6.02083 9.59968C6.00908 9.60109 5.99637 9.6028 5.97833 9.60526L5.97491 9.60572C5.95887 9.60791 5.93804 9.61076 5.91669 9.61337C5.56038 9.65707 5.2361 9.40365 5.1924 9.04733C5.1487 8.69102 5.40213 8.36674 5.75844 8.32304C5.7616 8.32265 5.76703 8.32188 5.77438 8.32084Z"
                                                        fill="#808080" />
                                                </svg>
                                            </div>
                                            <div class="create-data proxima_nova_bold">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M4 3.25C4.41421 3.25 4.75 3.58579 4.75 4V12.5C4.75 12.9228 5.08115 13.25 5.48733 13.25H10.4873C10.9096 13.25 11.25 12.9061 11.25 12.5V4C11.25 3.58579 11.5858 3.25 12 3.25C12.4142 3.25 12.75 3.58579 12.75 4V12.5C12.75 13.7513 11.7211 14.75 10.4873 14.75H5.48733C4.23618 14.75 3.25 13.7346 3.25 12.5V4C3.25 3.58579 3.58579 3.25 4 3.25Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M2.25 4C2.25 3.58579 2.58579 3.25 3 3.25H13C13.4142 3.25 13.75 3.58579 13.75 4C13.75 4.41421 13.4142 4.75 13 4.75H3C2.58579 4.75 2.25 4.41421 2.25 4Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.91602 2C5.91602 1.58579 6.2518 1.25 6.66602 1.25H9.33268C9.7469 1.25 10.0827 1.58579 10.0827 2C10.0827 2.41421 9.7469 2.75 9.33268 2.75H6.66602C6.2518 2.75 5.91602 2.41421 5.91602 2Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9.33398 5.9165C9.7482 5.9165 10.084 6.25229 10.084 6.6665V11.3332C10.084 11.7474 9.7482 12.0832 9.33398 12.0832C8.91977 12.0832 8.58398 11.7474 8.58398 11.3332V6.6665C8.58398 6.25229 8.91977 5.9165 9.33398 5.9165Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M6.66602 5.9165C7.08023 5.9165 7.41602 6.25229 7.41602 6.6665V11.3332C7.41602 11.7474 7.08023 12.0832 6.66602 12.0832C6.2518 12.0832 5.91602 11.7474 5.91602 11.3332V6.6665C5.91602 6.25229 6.2518 5.9165 6.66602 5.9165Z"
                                                        fill="#808080" />
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>18 April | Mon</td>
                                    <td>+15 Mins</td>
                                    <td>Paid</td>
                                    <td>&#x20B9 200</td>
                                    <td>
                                        <div class="atten-action-main">
                                            <div class="add-overtime-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M3.34356 3.3166C2.96581 3.3166 2.65156 3.6263 2.65156 4.0186V12.6479C2.65156 13.0402 2.96581 13.3499 3.34356 13.3499H12.6596C13.0373 13.3499 13.3516 13.0402 13.3516 12.6479V8.71127C13.3516 8.35228 13.6426 8.06127 14.0016 8.06127C14.3605 8.06127 14.6516 8.35228 14.6516 8.71127V12.6479C14.6516 13.749 13.7645 14.6499 12.6596 14.6499H3.34356C2.23864 14.6499 1.35156 13.749 1.35156 12.6479V4.0186C1.35156 2.91757 2.23864 2.0166 3.34356 2.0166H8.00156C8.36055 2.0166 8.65156 2.30762 8.65156 2.6666C8.65156 3.02559 8.36055 3.3166 8.00156 3.3166H3.34356Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M11.1515 2.59748C11.926 1.82297 13.1816 1.82297 13.9561 2.59748L13.4965 3.0571L13.9561 2.59748L14.0708 2.71215C14.8453 3.48666 14.8453 4.74221 14.0708 5.51672L8.47742 11.1101L8.47563 11.1118C8.30797 11.2782 8.09809 11.3982 7.86549 11.4564C7.86547 11.4564 7.86546 11.4564 7.86545 11.4564L5.39012 12.0754C5.33547 12.0902 5.27849 12.098 5.22047 12.0979C5.04608 12.0981 4.88106 12.0275 4.76081 11.9075C4.64077 11.7872 4.57019 11.6222 4.57031 11.4478C4.57027 11.3898 4.57805 11.3328 4.59288 11.2781L5.21187 8.80279C5.21188 8.80277 5.21188 8.80276 5.21188 8.80275C5.26968 8.5716 5.38922 8.35978 5.55818 8.19082L11.1515 2.59748ZM6.1139 10.5543L7.55011 10.1952L7.55015 10.1952C7.55214 10.1947 7.55546 10.1934 7.55963 10.1894C7.55975 10.1893 7.55986 10.1891 7.55997 10.189L13.1515 4.59748C13.4183 4.33066 13.4183 3.89821 13.1515 3.63139L13.0368 3.51672C12.77 3.2499 12.3376 3.2499 12.0708 3.51672L6.47742 9.11005C6.47572 9.11175 6.47393 9.11458 6.47306 9.11808L6.47305 9.11812L6.1139 10.5543Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.0966 3.65327C10.3505 3.39943 10.762 3.39943 11.0159 3.65327L13.0159 5.65327C13.2697 5.90711 13.2697 6.31867 13.0159 6.57251C12.762 6.82635 12.3505 6.82635 12.0966 6.57251L10.0966 4.57251C9.84279 4.31867 9.84279 3.90711 10.0966 3.65327Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.77438 8.32084C5.8206 8.31425 5.94266 8.29688 6.05157 8.29688C7.33122 8.29688 8.36823 9.33389 8.36823 10.6135C8.36823 10.7251 8.35178 10.8394 8.34414 10.8926C8.34295 10.9008 8.34197 10.9076 8.3413 10.9127C8.2943 11.2685 7.96768 11.519 7.61179 11.4719C7.2559 11.4249 7.00549 11.0983 7.0525 10.7424C7.05451 10.7272 7.05679 10.7108 7.05864 10.6975C7.05924 10.6932 7.0598 10.6892 7.06028 10.6857C7.06257 10.6691 7.06421 10.6568 7.0655 10.6458C7.06807 10.6239 7.06823 10.6154 7.06823 10.6135C7.06823 10.0519 6.61326 9.59689 6.05159 9.59687C6.05147 9.59688 6.04942 9.5969 6.04483 9.59724C6.03959 9.59762 6.03209 9.59834 6.02083 9.59968C6.00908 9.60109 5.99637 9.6028 5.97833 9.60526L5.97491 9.60572C5.95887 9.60791 5.93804 9.61076 5.91669 9.61337C5.56038 9.65707 5.2361 9.40365 5.1924 9.04733C5.1487 8.69102 5.40213 8.36674 5.75844 8.32304C5.7616 8.32265 5.76703 8.32188 5.77438 8.32084Z"
                                                        fill="#808080" />
                                                </svg>
                                            </div>
                                            <div class="create-data proxima_nova_bold">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M4 3.25C4.41421 3.25 4.75 3.58579 4.75 4V12.5C4.75 12.9228 5.08115 13.25 5.48733 13.25H10.4873C10.9096 13.25 11.25 12.9061 11.25 12.5V4C11.25 3.58579 11.5858 3.25 12 3.25C12.4142 3.25 12.75 3.58579 12.75 4V12.5C12.75 13.7513 11.7211 14.75 10.4873 14.75H5.48733C4.23618 14.75 3.25 13.7346 3.25 12.5V4C3.25 3.58579 3.58579 3.25 4 3.25Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M2.25 4C2.25 3.58579 2.58579 3.25 3 3.25H13C13.4142 3.25 13.75 3.58579 13.75 4C13.75 4.41421 13.4142 4.75 13 4.75H3C2.58579 4.75 2.25 4.41421 2.25 4Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.91602 2C5.91602 1.58579 6.2518 1.25 6.66602 1.25H9.33268C9.7469 1.25 10.0827 1.58579 10.0827 2C10.0827 2.41421 9.7469 2.75 9.33268 2.75H6.66602C6.2518 2.75 5.91602 2.41421 5.91602 2Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9.33398 5.9165C9.7482 5.9165 10.084 6.25229 10.084 6.6665V11.3332C10.084 11.7474 9.7482 12.0832 9.33398 12.0832C8.91977 12.0832 8.58398 11.7474 8.58398 11.3332V6.6665C8.58398 6.25229 8.91977 5.9165 9.33398 5.9165Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M6.66602 5.9165C7.08023 5.9165 7.41602 6.25229 7.41602 6.6665V11.3332C7.41602 11.7474 7.08023 12.0832 6.66602 12.0832C6.2518 12.0832 5.91602 11.7474 5.91602 11.3332V6.6665C5.91602 6.25229 6.2518 5.9165 6.66602 5.9165Z"
                                                        fill="#808080" />
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>17 April | Mon</td>
                                    <td>+15 Mins</td>
                                    <td>Paid</td>
                                    <td>&#x20B9 200</td>
                                    <td>
                                        <div class="atten-action-main">
                                            <div class="add-overtime-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M3.34356 3.3166C2.96581 3.3166 2.65156 3.6263 2.65156 4.0186V12.6479C2.65156 13.0402 2.96581 13.3499 3.34356 13.3499H12.6596C13.0373 13.3499 13.3516 13.0402 13.3516 12.6479V8.71127C13.3516 8.35228 13.6426 8.06127 14.0016 8.06127C14.3605 8.06127 14.6516 8.35228 14.6516 8.71127V12.6479C14.6516 13.749 13.7645 14.6499 12.6596 14.6499H3.34356C2.23864 14.6499 1.35156 13.749 1.35156 12.6479V4.0186C1.35156 2.91757 2.23864 2.0166 3.34356 2.0166H8.00156C8.36055 2.0166 8.65156 2.30762 8.65156 2.6666C8.65156 3.02559 8.36055 3.3166 8.00156 3.3166H3.34356Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M11.1515 2.59748C11.926 1.82297 13.1816 1.82297 13.9561 2.59748L13.4965 3.0571L13.9561 2.59748L14.0708 2.71215C14.8453 3.48666 14.8453 4.74221 14.0708 5.51672L8.47742 11.1101L8.47563 11.1118C8.30797 11.2782 8.09809 11.3982 7.86549 11.4564C7.86547 11.4564 7.86546 11.4564 7.86545 11.4564L5.39012 12.0754C5.33547 12.0902 5.27849 12.098 5.22047 12.0979C5.04608 12.0981 4.88106 12.0275 4.76081 11.9075C4.64077 11.7872 4.57019 11.6222 4.57031 11.4478C4.57027 11.3898 4.57805 11.3328 4.59288 11.2781L5.21187 8.80279C5.21188 8.80277 5.21188 8.80276 5.21188 8.80275C5.26968 8.5716 5.38922 8.35978 5.55818 8.19082L11.1515 2.59748ZM6.1139 10.5543L7.55011 10.1952L7.55015 10.1952C7.55214 10.1947 7.55546 10.1934 7.55963 10.1894C7.55975 10.1893 7.55986 10.1891 7.55997 10.189L13.1515 4.59748C13.4183 4.33066 13.4183 3.89821 13.1515 3.63139L13.0368 3.51672C12.77 3.2499 12.3376 3.2499 12.0708 3.51672L6.47742 9.11005C6.47572 9.11175 6.47393 9.11458 6.47306 9.11808L6.47305 9.11812L6.1139 10.5543Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.0966 3.65327C10.3505 3.39943 10.762 3.39943 11.0159 3.65327L13.0159 5.65327C13.2697 5.90711 13.2697 6.31867 13.0159 6.57251C12.762 6.82635 12.3505 6.82635 12.0966 6.57251L10.0966 4.57251C9.84279 4.31867 9.84279 3.90711 10.0966 3.65327Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.77438 8.32084C5.8206 8.31425 5.94266 8.29688 6.05157 8.29688C7.33122 8.29688 8.36823 9.33389 8.36823 10.6135C8.36823 10.7251 8.35178 10.8394 8.34414 10.8926C8.34295 10.9008 8.34197 10.9076 8.3413 10.9127C8.2943 11.2685 7.96768 11.519 7.61179 11.4719C7.2559 11.4249 7.00549 11.0983 7.0525 10.7424C7.05451 10.7272 7.05679 10.7108 7.05864 10.6975C7.05924 10.6932 7.0598 10.6892 7.06028 10.6857C7.06257 10.6691 7.06421 10.6568 7.0655 10.6458C7.06807 10.6239 7.06823 10.6154 7.06823 10.6135C7.06823 10.0519 6.61326 9.59689 6.05159 9.59687C6.05147 9.59688 6.04942 9.5969 6.04483 9.59724C6.03959 9.59762 6.03209 9.59834 6.02083 9.59968C6.00908 9.60109 5.99637 9.6028 5.97833 9.60526L5.97491 9.60572C5.95887 9.60791 5.93804 9.61076 5.91669 9.61337C5.56038 9.65707 5.2361 9.40365 5.1924 9.04733C5.1487 8.69102 5.40213 8.36674 5.75844 8.32304C5.7616 8.32265 5.76703 8.32188 5.77438 8.32084Z"
                                                        fill="#808080" />
                                                </svg>
                                            </div>
                                            <div class="create-data proxima_nova_bold">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M4 3.25C4.41421 3.25 4.75 3.58579 4.75 4V12.5C4.75 12.9228 5.08115 13.25 5.48733 13.25H10.4873C10.9096 13.25 11.25 12.9061 11.25 12.5V4C11.25 3.58579 11.5858 3.25 12 3.25C12.4142 3.25 12.75 3.58579 12.75 4V12.5C12.75 13.7513 11.7211 14.75 10.4873 14.75H5.48733C4.23618 14.75 3.25 13.7346 3.25 12.5V4C3.25 3.58579 3.58579 3.25 4 3.25Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M2.25 4C2.25 3.58579 2.58579 3.25 3 3.25H13C13.4142 3.25 13.75 3.58579 13.75 4C13.75 4.41421 13.4142 4.75 13 4.75H3C2.58579 4.75 2.25 4.41421 2.25 4Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.91602 2C5.91602 1.58579 6.2518 1.25 6.66602 1.25H9.33268C9.7469 1.25 10.0827 1.58579 10.0827 2C10.0827 2.41421 9.7469 2.75 9.33268 2.75H6.66602C6.2518 2.75 5.91602 2.41421 5.91602 2Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9.33398 5.9165C9.7482 5.9165 10.084 6.25229 10.084 6.6665V11.3332C10.084 11.7474 9.7482 12.0832 9.33398 12.0832C8.91977 12.0832 8.58398 11.7474 8.58398 11.3332V6.6665C8.58398 6.25229 8.91977 5.9165 9.33398 5.9165Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M6.66602 5.9165C7.08023 5.9165 7.41602 6.25229 7.41602 6.6665V11.3332C7.41602 11.7474 7.08023 12.0832 6.66602 12.0832C6.2518 12.0832 5.91602 11.7474 5.91602 11.3332V6.6665C5.91602 6.25229 6.2518 5.9165 6.66602 5.9165Z"
                                                        fill="#808080" />
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>16 April | Mon</td>
                                    <td>+15 Mins</td>
                                    <td>Paid</td>
                                    <td>&#x20B9 200</td>
                                    <td>
                                        <div class="atten-action-main">
                                            <div class="add-overtime-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M3.34356 3.3166C2.96581 3.3166 2.65156 3.6263 2.65156 4.0186V12.6479C2.65156 13.0402 2.96581 13.3499 3.34356 13.3499H12.6596C13.0373 13.3499 13.3516 13.0402 13.3516 12.6479V8.71127C13.3516 8.35228 13.6426 8.06127 14.0016 8.06127C14.3605 8.06127 14.6516 8.35228 14.6516 8.71127V12.6479C14.6516 13.749 13.7645 14.6499 12.6596 14.6499H3.34356C2.23864 14.6499 1.35156 13.749 1.35156 12.6479V4.0186C1.35156 2.91757 2.23864 2.0166 3.34356 2.0166H8.00156C8.36055 2.0166 8.65156 2.30762 8.65156 2.6666C8.65156 3.02559 8.36055 3.3166 8.00156 3.3166H3.34356Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M11.1515 2.59748C11.926 1.82297 13.1816 1.82297 13.9561 2.59748L13.4965 3.0571L13.9561 2.59748L14.0708 2.71215C14.8453 3.48666 14.8453 4.74221 14.0708 5.51672L8.47742 11.1101L8.47563 11.1118C8.30797 11.2782 8.09809 11.3982 7.86549 11.4564C7.86547 11.4564 7.86546 11.4564 7.86545 11.4564L5.39012 12.0754C5.33547 12.0902 5.27849 12.098 5.22047 12.0979C5.04608 12.0981 4.88106 12.0275 4.76081 11.9075C4.64077 11.7872 4.57019 11.6222 4.57031 11.4478C4.57027 11.3898 4.57805 11.3328 4.59288 11.2781L5.21187 8.80279C5.21188 8.80277 5.21188 8.80276 5.21188 8.80275C5.26968 8.5716 5.38922 8.35978 5.55818 8.19082L11.1515 2.59748ZM6.1139 10.5543L7.55011 10.1952L7.55015 10.1952C7.55214 10.1947 7.55546 10.1934 7.55963 10.1894C7.55975 10.1893 7.55986 10.1891 7.55997 10.189L13.1515 4.59748C13.4183 4.33066 13.4183 3.89821 13.1515 3.63139L13.0368 3.51672C12.77 3.2499 12.3376 3.2499 12.0708 3.51672L6.47742 9.11005C6.47572 9.11175 6.47393 9.11458 6.47306 9.11808L6.47305 9.11812L6.1139 10.5543Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.0966 3.65327C10.3505 3.39943 10.762 3.39943 11.0159 3.65327L13.0159 5.65327C13.2697 5.90711 13.2697 6.31867 13.0159 6.57251C12.762 6.82635 12.3505 6.82635 12.0966 6.57251L10.0966 4.57251C9.84279 4.31867 9.84279 3.90711 10.0966 3.65327Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.77438 8.32084C5.8206 8.31425 5.94266 8.29688 6.05157 8.29688C7.33122 8.29688 8.36823 9.33389 8.36823 10.6135C8.36823 10.7251 8.35178 10.8394 8.34414 10.8926C8.34295 10.9008 8.34197 10.9076 8.3413 10.9127C8.2943 11.2685 7.96768 11.519 7.61179 11.4719C7.2559 11.4249 7.00549 11.0983 7.0525 10.7424C7.05451 10.7272 7.05679 10.7108 7.05864 10.6975C7.05924 10.6932 7.0598 10.6892 7.06028 10.6857C7.06257 10.6691 7.06421 10.6568 7.0655 10.6458C7.06807 10.6239 7.06823 10.6154 7.06823 10.6135C7.06823 10.0519 6.61326 9.59689 6.05159 9.59687C6.05147 9.59688 6.04942 9.5969 6.04483 9.59724C6.03959 9.59762 6.03209 9.59834 6.02083 9.59968C6.00908 9.60109 5.99637 9.6028 5.97833 9.60526L5.97491 9.60572C5.95887 9.60791 5.93804 9.61076 5.91669 9.61337C5.56038 9.65707 5.2361 9.40365 5.1924 9.04733C5.1487 8.69102 5.40213 8.36674 5.75844 8.32304C5.7616 8.32265 5.76703 8.32188 5.77438 8.32084Z"
                                                        fill="#808080" />
                                                </svg>
                                            </div>
                                            <div class="create-data proxima_nova_bold">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M4 3.25C4.41421 3.25 4.75 3.58579 4.75 4V12.5C4.75 12.9228 5.08115 13.25 5.48733 13.25H10.4873C10.9096 13.25 11.25 12.9061 11.25 12.5V4C11.25 3.58579 11.5858 3.25 12 3.25C12.4142 3.25 12.75 3.58579 12.75 4V12.5C12.75 13.7513 11.7211 14.75 10.4873 14.75H5.48733C4.23618 14.75 3.25 13.7346 3.25 12.5V4C3.25 3.58579 3.58579 3.25 4 3.25Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M2.25 4C2.25 3.58579 2.58579 3.25 3 3.25H13C13.4142 3.25 13.75 3.58579 13.75 4C13.75 4.41421 13.4142 4.75 13 4.75H3C2.58579 4.75 2.25 4.41421 2.25 4Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.91602 2C5.91602 1.58579 6.2518 1.25 6.66602 1.25H9.33268C9.7469 1.25 10.0827 1.58579 10.0827 2C10.0827 2.41421 9.7469 2.75 9.33268 2.75H6.66602C6.2518 2.75 5.91602 2.41421 5.91602 2Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9.33398 5.9165C9.7482 5.9165 10.084 6.25229 10.084 6.6665V11.3332C10.084 11.7474 9.7482 12.0832 9.33398 12.0832C8.91977 12.0832 8.58398 11.7474 8.58398 11.3332V6.6665C8.58398 6.25229 8.91977 5.9165 9.33398 5.9165Z"
                                                        fill="#808080" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M6.66602 5.9165C7.08023 5.9165 7.41602 6.25229 7.41602 6.6665V11.3332C7.41602 11.7474 7.08023 12.0832 6.66602 12.0832C6.2518 12.0832 5.91602 11.7474 5.91602 11.3332V6.6665C5.91602 6.25229 6.2518 5.9165 6.66602 5.9165Z"
                                                        fill="#808080" />
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <div class="reject-approve-bttn">
                            <button name="" class="approve-btn-btn add-overtime-btn proxima_nova_semibold">Add
                                Overtime</button>
                        </div>
                    </div>
                </div>
                <div class="overtime-add-form">
                    <div class="overtime-add-sub-overtime">
                        <h4 class="page-title pull-left proxima_nova_semibold">Add Overtime</h4>
                        <p class="section_sub_title">Sweta Vaghasiya | 25 April, 2023</p>
                    </div>
                    <div class="overtime-main-sub-edit">
                        <div class="shift-main-inner-edit">
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Choose Date</label>
                                <div class="input-group over_time date" data-provide="datepicker">
                                    <input type="text" class="form-control proxima_nova_semibold calender-picker"
                                        readonly='true'>
                                    <div class="input-group-addon calender-img">
                                        <img src="{{asset('assets/admin/images/approve_punches/calender.svg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="overtime-inner-sub-label-edit">
                                <label class="shift-type-label">Choose Overtime</label>
                                <select class="form-select create-select section_sub_title"
                                    aria-label="Default select example">
                                    <option>Late Overtime</option>
                                    <option value="web">Early Overtime</option>
                                </select>
                            </div>
                        </div>
                        <div class="shift-main-inner-edit">
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Number of Hours</label>
                                <div class="salary-stru-field">
                                    <input type="time" id="mobile_code" class="form-control hajri_shift_hours" name="time"
                                        value="18:20">
                                </div>
                            </div>
                            <div class="overtime-inner-sub-label-edit">
                                <label class="shift-type-label">Overtime Rate</label>
                                <div class="overtime-add-rate">
                                    <select class="form-select create-select section_sub_title"
                                        aria-label="Default select example">
                                        <option>&#x20B9 (Fixed Amount)</option>
                                        <option value="web">% (Percentage)</option>
                                    </select>
                                    <div class="overtime-hours-rate">
                                        <input type="text" class="overtime-text-rate" placeholder="&#x20B9 300">
                                        <div>Per hour</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="staff-overtime-total">
                            <p class="section_sub_title staff-total-amount">Total Amount</p>
                            <h2 class="staff-overtime-total-sub proxima_nova_semibold">&#x20B9 300</h2>
                            <div class="send-overtime-sms">
                                <input type="checkbox">
                                <p class="atten-sms pull-left section_sub_title">Send Overtime SMS to Staff
                                </p>
                            </div>
                        </div>
                        <div>
                            <div class="reject-approve-bttn">
                                <button name=""
                                    class="approve-btn-btn apply-overtime-btn proxima_nova_semibold">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="allowances" role="tabpanel" aria-labelledby="allowances-tab">
                <row>
                    <div class="approve-datas ">
                        <div class="atten-data-profile assign-data-search col-md-6 col-sm-6">
                            <h4 class="page-title pull-left proxima_nova_semibold">Allowances</h4>
                        </div>
                        <div class="approve-right-data col-md-6 col-sm-6">
                            <div class="approve-data-download  dropdown-toggle proxima_nova_bold">
                                <a href="#"> <img src="{{asset('assets/admin/images/approve_punches/download-report.svg')}}"
                                        alt=""></a>
                            </div>
                            <div class="dropdown-menu" x-placement="bottom-start">
                                <a class="dropdown-item proxima_nova_semibold" href="#">Excel Report</a>
                                <a class="dropdown-item proxima_nova_semibold" href="#">PDF Report</a>
                            </div>
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" class="form-control proxima_nova_semibold calender-picker"
                                    readonly='true'>
                                <div class="input-group-addon calender-img">
                                    <!-- <img src="../assets/images/approve_punches/calender.svg" alt=""> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                        fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M1.26898 3.26898C1.62763 2.91034 2.20911 2.91034 2.56775 3.26898L6 6.70123L9.43225 3.26898C9.79089 2.91034 10.3724 2.91034 10.731 3.26898C11.0897 3.62763 11.0897 4.20911 10.731 4.56775L6.64938 8.64938C6.29074 9.00803 5.70926 9.00803 5.35062 8.64938L1.26898 4.56775C0.910339 4.20911 0.910339 3.62763 1.26898 3.26898Z"
                                            fill="#808080"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="allowances-data">
                        <div class="allowances-data-sub">
                            <p class="proxima_nova_semibold">&#x20B9 700</p>
                            <h2 class="allowances-total">Total Allowance</h2>
                        </div>
                        <div class="allowances-data-sub">
                            <p class="proxima_nova_semibold">&#x20B9 5100</p>
                            <h2 class="allowances-total">Total Bonus</h2>
                        </div>
                    </div>
                </row>
                <div class="approve_staff_data" id="daily_attendance menu1">
                    <table id="allowances_data" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Allowances / Bonus</th>
                                <th>Paid / Not Paid</th>
                                <th>Payments</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>20 April </td>
                                <td>Allowances</td>
                                <td>Paid</td>
                                <td>&#x20B9 200</td>
                                <td>
                                    <div class="atten-action-main">
                                        <div class="create-data  dropdown-toggle proxima_nova_bold"
                                            data-bs-toggle="offcanvas" data-bs-target="#allowances-toggle-right"
                                            aria-controls="allowances-toggle-right">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M3.34356 3.3166C2.96581 3.3166 2.65156 3.6263 2.65156 4.0186V12.6479C2.65156 13.0402 2.96581 13.3499 3.34356 13.3499H12.6596C13.0373 13.3499 13.3516 13.0402 13.3516 12.6479V8.71127C13.3516 8.35228 13.6426 8.06127 14.0016 8.06127C14.3605 8.06127 14.6516 8.35228 14.6516 8.71127V12.6479C14.6516 13.749 13.7645 14.6499 12.6596 14.6499H3.34356C2.23864 14.6499 1.35156 13.749 1.35156 12.6479V4.0186C1.35156 2.91757 2.23864 2.0166 3.34356 2.0166H8.00156C8.36055 2.0166 8.65156 2.30762 8.65156 2.6666C8.65156 3.02559 8.36055 3.3166 8.00156 3.3166H3.34356Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.1515 2.59748C11.926 1.82297 13.1816 1.82297 13.9561 2.59748L13.4965 3.0571L13.9561 2.59748L14.0708 2.71215C14.8453 3.48666 14.8453 4.74221 14.0708 5.51672L8.47742 11.1101L8.47563 11.1118C8.30797 11.2782 8.09809 11.3982 7.86549 11.4564C7.86547 11.4564 7.86546 11.4564 7.86545 11.4564L5.39012 12.0754C5.33547 12.0902 5.27849 12.098 5.22047 12.0979C5.04608 12.0981 4.88106 12.0275 4.76081 11.9075C4.64077 11.7872 4.57019 11.6222 4.57031 11.4478C4.57027 11.3898 4.57805 11.3328 4.59288 11.2781L5.21187 8.80279C5.21188 8.80277 5.21188 8.80276 5.21188 8.80275C5.26968 8.5716 5.38922 8.35978 5.55818 8.19082L11.1515 2.59748ZM6.1139 10.5543L7.55011 10.1952L7.55015 10.1952C7.55214 10.1947 7.55546 10.1934 7.55963 10.1894C7.55975 10.1893 7.55986 10.1891 7.55997 10.189L13.1515 4.59748C13.4183 4.33066 13.4183 3.89821 13.1515 3.63139L13.0368 3.51672C12.77 3.2499 12.3376 3.2499 12.0708 3.51672L6.47742 9.11005C6.47572 9.11175 6.47393 9.11458 6.47306 9.11808L6.47305 9.11812L6.1139 10.5543Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.0966 3.65327C10.3505 3.39943 10.762 3.39943 11.0159 3.65327L13.0159 5.65327C13.2697 5.90711 13.2697 6.31867 13.0159 6.57251C12.762 6.82635 12.3505 6.82635 12.0966 6.57251L10.0966 4.57251C9.84279 4.31867 9.84279 3.90711 10.0966 3.65327Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.77438 8.32084C5.8206 8.31425 5.94266 8.29688 6.05157 8.29688C7.33122 8.29688 8.36823 9.33389 8.36823 10.6135C8.36823 10.7251 8.35178 10.8394 8.34414 10.8926C8.34295 10.9008 8.34197 10.9076 8.3413 10.9127C8.2943 11.2685 7.96768 11.519 7.61179 11.4719C7.2559 11.4249 7.00549 11.0983 7.0525 10.7424C7.05451 10.7272 7.05679 10.7108 7.05864 10.6975C7.05924 10.6932 7.0598 10.6892 7.06028 10.6857C7.06257 10.6691 7.06421 10.6568 7.0655 10.6458C7.06807 10.6239 7.06823 10.6154 7.06823 10.6135C7.06823 10.0519 6.61326 9.59689 6.05159 9.59687C6.05147 9.59688 6.04942 9.5969 6.04483 9.59724C6.03959 9.59762 6.03209 9.59834 6.02083 9.59968C6.00908 9.60109 5.99637 9.6028 5.97833 9.60526L5.97491 9.60572C5.95887 9.60791 5.93804 9.61076 5.91669 9.61337C5.56038 9.65707 5.2361 9.40365 5.1924 9.04733C5.1487 8.69102 5.40213 8.36674 5.75844 8.32304C5.7616 8.32265 5.76703 8.32188 5.77438 8.32084Z"
                                                    fill="#808080" />
                                            </svg>
                                        </div>
                                        <div class="create-data">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M4 3.25C4.41421 3.25 4.75 3.58579 4.75 4V12.5C4.75 12.9228 5.08115 13.25 5.48733 13.25H10.4873C10.9096 13.25 11.25 12.9061 11.25 12.5V4C11.25 3.58579 11.5858 3.25 12 3.25C12.4142 3.25 12.75 3.58579 12.75 4V12.5C12.75 13.7513 11.7211 14.75 10.4873 14.75H5.48733C4.23618 14.75 3.25 13.7346 3.25 12.5V4C3.25 3.58579 3.58579 3.25 4 3.25Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2.25 4C2.25 3.58579 2.58579 3.25 3 3.25H13C13.4142 3.25 13.75 3.58579 13.75 4C13.75 4.41421 13.4142 4.75 13 4.75H3C2.58579 4.75 2.25 4.41421 2.25 4Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.91602 2C5.91602 1.58579 6.2518 1.25 6.66602 1.25H9.33268C9.7469 1.25 10.0827 1.58579 10.0827 2C10.0827 2.41421 9.7469 2.75 9.33268 2.75H6.66602C6.2518 2.75 5.91602 2.41421 5.91602 2Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9.33398 5.9165C9.7482 5.9165 10.084 6.25229 10.084 6.6665V11.3332C10.084 11.7474 9.7482 12.0832 9.33398 12.0832C8.91977 12.0832 8.58398 11.7474 8.58398 11.3332V6.6665C8.58398 6.25229 8.91977 5.9165 9.33398 5.9165Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M6.66602 5.9165C7.08023 5.9165 7.41602 6.25229 7.41602 6.6665V11.3332C7.41602 11.7474 7.08023 12.0832 6.66602 12.0832C6.2518 12.0832 5.91602 11.7474 5.91602 11.3332V6.6665C5.91602 6.25229 6.2518 5.9165 6.66602 5.9165Z"
                                                    fill="#808080" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>25 April </td>
                                <td>Allowances</td>
                                <td>Paid</td>
                                <td>&#x20B9 200</td>
                                <td>
                                    <div class="atten-action-main">
                                        <div class="create-data  dropdown-toggle proxima_nova_bold"
                                            data-bs-toggle="offcanvas" data-bs-target="#allowances-toggle-right"
                                            aria-controls="allowances-toggle-right">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M3.34356 3.3166C2.96581 3.3166 2.65156 3.6263 2.65156 4.0186V12.6479C2.65156 13.0402 2.96581 13.3499 3.34356 13.3499H12.6596C13.0373 13.3499 13.3516 13.0402 13.3516 12.6479V8.71127C13.3516 8.35228 13.6426 8.06127 14.0016 8.06127C14.3605 8.06127 14.6516 8.35228 14.6516 8.71127V12.6479C14.6516 13.749 13.7645 14.6499 12.6596 14.6499H3.34356C2.23864 14.6499 1.35156 13.749 1.35156 12.6479V4.0186C1.35156 2.91757 2.23864 2.0166 3.34356 2.0166H8.00156C8.36055 2.0166 8.65156 2.30762 8.65156 2.6666C8.65156 3.02559 8.36055 3.3166 8.00156 3.3166H3.34356Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.1515 2.59748C11.926 1.82297 13.1816 1.82297 13.9561 2.59748L13.4965 3.0571L13.9561 2.59748L14.0708 2.71215C14.8453 3.48666 14.8453 4.74221 14.0708 5.51672L8.47742 11.1101L8.47563 11.1118C8.30797 11.2782 8.09809 11.3982 7.86549 11.4564C7.86547 11.4564 7.86546 11.4564 7.86545 11.4564L5.39012 12.0754C5.33547 12.0902 5.27849 12.098 5.22047 12.0979C5.04608 12.0981 4.88106 12.0275 4.76081 11.9075C4.64077 11.7872 4.57019 11.6222 4.57031 11.4478C4.57027 11.3898 4.57805 11.3328 4.59288 11.2781L5.21187 8.80279C5.21188 8.80277 5.21188 8.80276 5.21188 8.80275C5.26968 8.5716 5.38922 8.35978 5.55818 8.19082L11.1515 2.59748ZM6.1139 10.5543L7.55011 10.1952L7.55015 10.1952C7.55214 10.1947 7.55546 10.1934 7.55963 10.1894C7.55975 10.1893 7.55986 10.1891 7.55997 10.189L13.1515 4.59748C13.4183 4.33066 13.4183 3.89821 13.1515 3.63139L13.0368 3.51672C12.77 3.2499 12.3376 3.2499 12.0708 3.51672L6.47742 9.11005C6.47572 9.11175 6.47393 9.11458 6.47306 9.11808L6.47305 9.11812L6.1139 10.5543Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.0966 3.65327C10.3505 3.39943 10.762 3.39943 11.0159 3.65327L13.0159 5.65327C13.2697 5.90711 13.2697 6.31867 13.0159 6.57251C12.762 6.82635 12.3505 6.82635 12.0966 6.57251L10.0966 4.57251C9.84279 4.31867 9.84279 3.90711 10.0966 3.65327Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.77438 8.32084C5.8206 8.31425 5.94266 8.29688 6.05157 8.29688C7.33122 8.29688 8.36823 9.33389 8.36823 10.6135C8.36823 10.7251 8.35178 10.8394 8.34414 10.8926C8.34295 10.9008 8.34197 10.9076 8.3413 10.9127C8.2943 11.2685 7.96768 11.519 7.61179 11.4719C7.2559 11.4249 7.00549 11.0983 7.0525 10.7424C7.05451 10.7272 7.05679 10.7108 7.05864 10.6975C7.05924 10.6932 7.0598 10.6892 7.06028 10.6857C7.06257 10.6691 7.06421 10.6568 7.0655 10.6458C7.06807 10.6239 7.06823 10.6154 7.06823 10.6135C7.06823 10.0519 6.61326 9.59689 6.05159 9.59687C6.05147 9.59688 6.04942 9.5969 6.04483 9.59724C6.03959 9.59762 6.03209 9.59834 6.02083 9.59968C6.00908 9.60109 5.99637 9.6028 5.97833 9.60526L5.97491 9.60572C5.95887 9.60791 5.93804 9.61076 5.91669 9.61337C5.56038 9.65707 5.2361 9.40365 5.1924 9.04733C5.1487 8.69102 5.40213 8.36674 5.75844 8.32304C5.7616 8.32265 5.76703 8.32188 5.77438 8.32084Z"
                                                    fill="#808080" />
                                            </svg>
                                        </div>
                                        <div class="create-data">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M4 3.25C4.41421 3.25 4.75 3.58579 4.75 4V12.5C4.75 12.9228 5.08115 13.25 5.48733 13.25H10.4873C10.9096 13.25 11.25 12.9061 11.25 12.5V4C11.25 3.58579 11.5858 3.25 12 3.25C12.4142 3.25 12.75 3.58579 12.75 4V12.5C12.75 13.7513 11.7211 14.75 10.4873 14.75H5.48733C4.23618 14.75 3.25 13.7346 3.25 12.5V4C3.25 3.58579 3.58579 3.25 4 3.25Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2.25 4C2.25 3.58579 2.58579 3.25 3 3.25H13C13.4142 3.25 13.75 3.58579 13.75 4C13.75 4.41421 13.4142 4.75 13 4.75H3C2.58579 4.75 2.25 4.41421 2.25 4Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.91602 2C5.91602 1.58579 6.2518 1.25 6.66602 1.25H9.33268C9.7469 1.25 10.0827 1.58579 10.0827 2C10.0827 2.41421 9.7469 2.75 9.33268 2.75H6.66602C6.2518 2.75 5.91602 2.41421 5.91602 2Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9.33398 5.9165C9.7482 5.9165 10.084 6.25229 10.084 6.6665V11.3332C10.084 11.7474 9.7482 12.0832 9.33398 12.0832C8.91977 12.0832 8.58398 11.7474 8.58398 11.3332V6.6665C8.58398 6.25229 8.91977 5.9165 9.33398 5.9165Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M6.66602 5.9165C7.08023 5.9165 7.41602 6.25229 7.41602 6.6665V11.3332C7.41602 11.7474 7.08023 12.0832 6.66602 12.0832C6.2518 12.0832 5.91602 11.7474 5.91602 11.3332V6.6665C5.91602 6.25229 6.2518 5.9165 6.66602 5.9165Z"
                                                    fill="#808080" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>25 April </td>
                                <td>Allowances</td>
                                <td>Paid</td>
                                <td>&#x20B9 200</td>
                                <td>
                                    <div class="atten-action-main">
                                        <div class="create-data  dropdown-toggle proxima_nova_bold"
                                            data-bs-toggle="offcanvas" data-bs-target="#allowances-toggle-right"
                                            aria-controls="allowances-toggle-right">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M3.34356 3.3166C2.96581 3.3166 2.65156 3.6263 2.65156 4.0186V12.6479C2.65156 13.0402 2.96581 13.3499 3.34356 13.3499H12.6596C13.0373 13.3499 13.3516 13.0402 13.3516 12.6479V8.71127C13.3516 8.35228 13.6426 8.06127 14.0016 8.06127C14.3605 8.06127 14.6516 8.35228 14.6516 8.71127V12.6479C14.6516 13.749 13.7645 14.6499 12.6596 14.6499H3.34356C2.23864 14.6499 1.35156 13.749 1.35156 12.6479V4.0186C1.35156 2.91757 2.23864 2.0166 3.34356 2.0166H8.00156C8.36055 2.0166 8.65156 2.30762 8.65156 2.6666C8.65156 3.02559 8.36055 3.3166 8.00156 3.3166H3.34356Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.1515 2.59748C11.926 1.82297 13.1816 1.82297 13.9561 2.59748L13.4965 3.0571L13.9561 2.59748L14.0708 2.71215C14.8453 3.48666 14.8453 4.74221 14.0708 5.51672L8.47742 11.1101L8.47563 11.1118C8.30797 11.2782 8.09809 11.3982 7.86549 11.4564C7.86547 11.4564 7.86546 11.4564 7.86545 11.4564L5.39012 12.0754C5.33547 12.0902 5.27849 12.098 5.22047 12.0979C5.04608 12.0981 4.88106 12.0275 4.76081 11.9075C4.64077 11.7872 4.57019 11.6222 4.57031 11.4478C4.57027 11.3898 4.57805 11.3328 4.59288 11.2781L5.21187 8.80279C5.21188 8.80277 5.21188 8.80276 5.21188 8.80275C5.26968 8.5716 5.38922 8.35978 5.55818 8.19082L11.1515 2.59748ZM6.1139 10.5543L7.55011 10.1952L7.55015 10.1952C7.55214 10.1947 7.55546 10.1934 7.55963 10.1894C7.55975 10.1893 7.55986 10.1891 7.55997 10.189L13.1515 4.59748C13.4183 4.33066 13.4183 3.89821 13.1515 3.63139L13.0368 3.51672C12.77 3.2499 12.3376 3.2499 12.0708 3.51672L6.47742 9.11005C6.47572 9.11175 6.47393 9.11458 6.47306 9.11808L6.47305 9.11812L6.1139 10.5543Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.0966 3.65327C10.3505 3.39943 10.762 3.39943 11.0159 3.65327L13.0159 5.65327C13.2697 5.90711 13.2697 6.31867 13.0159 6.57251C12.762 6.82635 12.3505 6.82635 12.0966 6.57251L10.0966 4.57251C9.84279 4.31867 9.84279 3.90711 10.0966 3.65327Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.77438 8.32084C5.8206 8.31425 5.94266 8.29688 6.05157 8.29688C7.33122 8.29688 8.36823 9.33389 8.36823 10.6135C8.36823 10.7251 8.35178 10.8394 8.34414 10.8926C8.34295 10.9008 8.34197 10.9076 8.3413 10.9127C8.2943 11.2685 7.96768 11.519 7.61179 11.4719C7.2559 11.4249 7.00549 11.0983 7.0525 10.7424C7.05451 10.7272 7.05679 10.7108 7.05864 10.6975C7.05924 10.6932 7.0598 10.6892 7.06028 10.6857C7.06257 10.6691 7.06421 10.6568 7.0655 10.6458C7.06807 10.6239 7.06823 10.6154 7.06823 10.6135C7.06823 10.0519 6.61326 9.59689 6.05159 9.59687C6.05147 9.59688 6.04942 9.5969 6.04483 9.59724C6.03959 9.59762 6.03209 9.59834 6.02083 9.59968C6.00908 9.60109 5.99637 9.6028 5.97833 9.60526L5.97491 9.60572C5.95887 9.60791 5.93804 9.61076 5.91669 9.61337C5.56038 9.65707 5.2361 9.40365 5.1924 9.04733C5.1487 8.69102 5.40213 8.36674 5.75844 8.32304C5.7616 8.32265 5.76703 8.32188 5.77438 8.32084Z"
                                                    fill="#808080" />
                                            </svg>
                                        </div>
                                        <div class="create-data">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M4 3.25C4.41421 3.25 4.75 3.58579 4.75 4V12.5C4.75 12.9228 5.08115 13.25 5.48733 13.25H10.4873C10.9096 13.25 11.25 12.9061 11.25 12.5V4C11.25 3.58579 11.5858 3.25 12 3.25C12.4142 3.25 12.75 3.58579 12.75 4V12.5C12.75 13.7513 11.7211 14.75 10.4873 14.75H5.48733C4.23618 14.75 3.25 13.7346 3.25 12.5V4C3.25 3.58579 3.58579 3.25 4 3.25Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2.25 4C2.25 3.58579 2.58579 3.25 3 3.25H13C13.4142 3.25 13.75 3.58579 13.75 4C13.75 4.41421 13.4142 4.75 13 4.75H3C2.58579 4.75 2.25 4.41421 2.25 4Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.91602 2C5.91602 1.58579 6.2518 1.25 6.66602 1.25H9.33268C9.7469 1.25 10.0827 1.58579 10.0827 2C10.0827 2.41421 9.7469 2.75 9.33268 2.75H6.66602C6.2518 2.75 5.91602 2.41421 5.91602 2Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9.33398 5.9165C9.7482 5.9165 10.084 6.25229 10.084 6.6665V11.3332C10.084 11.7474 9.7482 12.0832 9.33398 12.0832C8.91977 12.0832 8.58398 11.7474 8.58398 11.3332V6.6665C8.58398 6.25229 8.91977 5.9165 9.33398 5.9165Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M6.66602 5.9165C7.08023 5.9165 7.41602 6.25229 7.41602 6.6665V11.3332C7.41602 11.7474 7.08023 12.0832 6.66602 12.0832C6.2518 12.0832 5.91602 11.7474 5.91602 11.3332V6.6665C5.91602 6.25229 6.2518 5.9165 6.66602 5.9165Z"
                                                    fill="#808080" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>25 April </td>
                                <td>Allowances</td>
                                <td>Paid</td>
                                <td>&#x20B9 200</td>
                                <td>
                                    <div class="atten-action-main">
                                        <div class="create-data  dropdown-toggle proxima_nova_bold"
                                            data-bs-toggle="offcanvas" data-bs-target="#allowances-toggle-right"
                                            aria-controls="allowances-toggle-right">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M3.34356 3.3166C2.96581 3.3166 2.65156 3.6263 2.65156 4.0186V12.6479C2.65156 13.0402 2.96581 13.3499 3.34356 13.3499H12.6596C13.0373 13.3499 13.3516 13.0402 13.3516 12.6479V8.71127C13.3516 8.35228 13.6426 8.06127 14.0016 8.06127C14.3605 8.06127 14.6516 8.35228 14.6516 8.71127V12.6479C14.6516 13.749 13.7645 14.6499 12.6596 14.6499H3.34356C2.23864 14.6499 1.35156 13.749 1.35156 12.6479V4.0186C1.35156 2.91757 2.23864 2.0166 3.34356 2.0166H8.00156C8.36055 2.0166 8.65156 2.30762 8.65156 2.6666C8.65156 3.02559 8.36055 3.3166 8.00156 3.3166H3.34356Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.1515 2.59748C11.926 1.82297 13.1816 1.82297 13.9561 2.59748L13.4965 3.0571L13.9561 2.59748L14.0708 2.71215C14.8453 3.48666 14.8453 4.74221 14.0708 5.51672L8.47742 11.1101L8.47563 11.1118C8.30797 11.2782 8.09809 11.3982 7.86549 11.4564C7.86547 11.4564 7.86546 11.4564 7.86545 11.4564L5.39012 12.0754C5.33547 12.0902 5.27849 12.098 5.22047 12.0979C5.04608 12.0981 4.88106 12.0275 4.76081 11.9075C4.64077 11.7872 4.57019 11.6222 4.57031 11.4478C4.57027 11.3898 4.57805 11.3328 4.59288 11.2781L5.21187 8.80279C5.21188 8.80277 5.21188 8.80276 5.21188 8.80275C5.26968 8.5716 5.38922 8.35978 5.55818 8.19082L11.1515 2.59748ZM6.1139 10.5543L7.55011 10.1952L7.55015 10.1952C7.55214 10.1947 7.55546 10.1934 7.55963 10.1894C7.55975 10.1893 7.55986 10.1891 7.55997 10.189L13.1515 4.59748C13.4183 4.33066 13.4183 3.89821 13.1515 3.63139L13.0368 3.51672C12.77 3.2499 12.3376 3.2499 12.0708 3.51672L6.47742 9.11005C6.47572 9.11175 6.47393 9.11458 6.47306 9.11808L6.47305 9.11812L6.1139 10.5543Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.0966 3.65327C10.3505 3.39943 10.762 3.39943 11.0159 3.65327L13.0159 5.65327C13.2697 5.90711 13.2697 6.31867 13.0159 6.57251C12.762 6.82635 12.3505 6.82635 12.0966 6.57251L10.0966 4.57251C9.84279 4.31867 9.84279 3.90711 10.0966 3.65327Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.77438 8.32084C5.8206 8.31425 5.94266 8.29688 6.05157 8.29688C7.33122 8.29688 8.36823 9.33389 8.36823 10.6135C8.36823 10.7251 8.35178 10.8394 8.34414 10.8926C8.34295 10.9008 8.34197 10.9076 8.3413 10.9127C8.2943 11.2685 7.96768 11.519 7.61179 11.4719C7.2559 11.4249 7.00549 11.0983 7.0525 10.7424C7.05451 10.7272 7.05679 10.7108 7.05864 10.6975C7.05924 10.6932 7.0598 10.6892 7.06028 10.6857C7.06257 10.6691 7.06421 10.6568 7.0655 10.6458C7.06807 10.6239 7.06823 10.6154 7.06823 10.6135C7.06823 10.0519 6.61326 9.59689 6.05159 9.59687C6.05147 9.59688 6.04942 9.5969 6.04483 9.59724C6.03959 9.59762 6.03209 9.59834 6.02083 9.59968C6.00908 9.60109 5.99637 9.6028 5.97833 9.60526L5.97491 9.60572C5.95887 9.60791 5.93804 9.61076 5.91669 9.61337C5.56038 9.65707 5.2361 9.40365 5.1924 9.04733C5.1487 8.69102 5.40213 8.36674 5.75844 8.32304C5.7616 8.32265 5.76703 8.32188 5.77438 8.32084Z"
                                                    fill="#808080" />
                                            </svg>
                                        </div>
                                        <div class="create-data">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M4 3.25C4.41421 3.25 4.75 3.58579 4.75 4V12.5C4.75 12.9228 5.08115 13.25 5.48733 13.25H10.4873C10.9096 13.25 11.25 12.9061 11.25 12.5V4C11.25 3.58579 11.5858 3.25 12 3.25C12.4142 3.25 12.75 3.58579 12.75 4V12.5C12.75 13.7513 11.7211 14.75 10.4873 14.75H5.48733C4.23618 14.75 3.25 13.7346 3.25 12.5V4C3.25 3.58579 3.58579 3.25 4 3.25Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2.25 4C2.25 3.58579 2.58579 3.25 3 3.25H13C13.4142 3.25 13.75 3.58579 13.75 4C13.75 4.41421 13.4142 4.75 13 4.75H3C2.58579 4.75 2.25 4.41421 2.25 4Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.91602 2C5.91602 1.58579 6.2518 1.25 6.66602 1.25H9.33268C9.7469 1.25 10.0827 1.58579 10.0827 2C10.0827 2.41421 9.7469 2.75 9.33268 2.75H6.66602C6.2518 2.75 5.91602 2.41421 5.91602 2Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9.33398 5.9165C9.7482 5.9165 10.084 6.25229 10.084 6.6665V11.3332C10.084 11.7474 9.7482 12.0832 9.33398 12.0832C8.91977 12.0832 8.58398 11.7474 8.58398 11.3332V6.6665C8.58398 6.25229 8.91977 5.9165 9.33398 5.9165Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M6.66602 5.9165C7.08023 5.9165 7.41602 6.25229 7.41602 6.6665V11.3332C7.41602 11.7474 7.08023 12.0832 6.66602 12.0832C6.2518 12.0832 5.91602 11.7474 5.91602 11.3332V6.6665C5.91602 6.25229 6.2518 5.9165 6.66602 5.9165Z"
                                                    fill="#808080" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <div class="reject-approve-bttn">
                        <button name="" class="approve-btn-btn add-allow-btn proxima_nova_semibold">Add
                            Allowance/Bonus</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="deduction" role="tabpanel" aria-labelledby="deduction-tab">
                <row>
                    <div class="approve-datas ">
                        <div class="atten-data-profile assign-data-search col-md-6 col-sm-6">
                            <h4 class="page-title pull-left proxima_nova_semibold">Deduction</h4>
                        </div>
                        <div class="approve-right-data col-md-6 col-sm-6">
                            <div class="approve-data-download  dropdown-toggle proxima_nova_bold">
                                <a href="#"> <img src="{{asset('assets/admin/images/approve_punches/download-report.svg')}}"
                                        alt=""></a>
                            </div>
                            <div class="dropdown-menu" x-placement="bottom-start">
                                <a class="dropdown-item proxima_nova_semibold" href="#">Excel Report</a>
                                <a class="dropdown-item proxima_nova_semibold" href="#">PDF Report</a>
                            </div>
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" class="form-control proxima_nova_semibold calender-picker"
                                    readonly='true'>
                                <div class="input-group-addon calender-img">
                                    <!-- <img src="../assets/images/approve_punches/calender.svg" alt=""> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                        fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M1.26898 3.26898C1.62763 2.91034 2.20911 2.91034 2.56775 3.26898L6 6.70123L9.43225 3.26898C9.79089 2.91034 10.3724 2.91034 10.731 3.26898C11.0897 3.62763 11.0897 4.20911 10.731 4.56775L6.64938 8.64938C6.29074 9.00803 5.70926 9.00803 5.35062 8.64938L1.26898 4.56775C0.910339 4.20911 0.910339 3.62763 1.26898 3.26898Z"
                                            fill="#808080"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="allowances-data">
                        <div class="allowances-data-sub">
                            <p class="proxima_nova_semibold">&#x20B9 700</p>
                            <h2 class="allowances-total">Total Deduction</h2>
                        </div>
                    </div>
                </row>
                <div class="approve_staff_data" id="daily_attendance menu1">
                    <table id="deduction_data" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Deduction Type</th>
                                <th>Description</th>
                                <th>Payments</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>20 April</td>
                                <td>PF</td>
                                <td>Late time to forget</td>
                                <td>&#x20B9 630</td>
                                <td>
                                    <div class="atten-action-main">
                                        <div class="create-data  dropdown-toggle proxima_nova_bold"
                                            data-bs-toggle="offcanvas" data-bs-target="#deduction-toggle-right"
                                            aria-controls="deduction-toggle-right">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M3.34356 3.3166C2.96581 3.3166 2.65156 3.6263 2.65156 4.0186V12.6479C2.65156 13.0402 2.96581 13.3499 3.34356 13.3499H12.6596C13.0373 13.3499 13.3516 13.0402 13.3516 12.6479V8.71127C13.3516 8.35228 13.6426 8.06127 14.0016 8.06127C14.3605 8.06127 14.6516 8.35228 14.6516 8.71127V12.6479C14.6516 13.749 13.7645 14.6499 12.6596 14.6499H3.34356C2.23864 14.6499 1.35156 13.749 1.35156 12.6479V4.0186C1.35156 2.91757 2.23864 2.0166 3.34356 2.0166H8.00156C8.36055 2.0166 8.65156 2.30762 8.65156 2.6666C8.65156 3.02559 8.36055 3.3166 8.00156 3.3166H3.34356Z"
                                                    fill="#808080"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.1515 2.59748C11.926 1.82297 13.1816 1.82297 13.9561 2.59748L13.4965 3.0571L13.9561 2.59748L14.0708 2.71215C14.8453 3.48666 14.8453 4.74221 14.0708 5.51672L8.47742 11.1101L8.47563 11.1118C8.30797 11.2782 8.09809 11.3982 7.86549 11.4564C7.86547 11.4564 7.86546 11.4564 7.86545 11.4564L5.39012 12.0754C5.33547 12.0902 5.27849 12.098 5.22047 12.0979C5.04608 12.0981 4.88106 12.0275 4.76081 11.9075C4.64077 11.7872 4.57019 11.6222 4.57031 11.4478C4.57027 11.3898 4.57805 11.3328 4.59288 11.2781L5.21187 8.80279C5.21188 8.80277 5.21188 8.80276 5.21188 8.80275C5.26968 8.5716 5.38922 8.35978 5.55818 8.19082L11.1515 2.59748ZM6.1139 10.5543L7.55011 10.1952L7.55015 10.1952C7.55214 10.1947 7.55546 10.1934 7.55963 10.1894C7.55975 10.1893 7.55986 10.1891 7.55997 10.189L13.1515 4.59748C13.4183 4.33066 13.4183 3.89821 13.1515 3.63139L13.0368 3.51672C12.77 3.2499 12.3376 3.2499 12.0708 3.51672L6.47742 9.11005C6.47572 9.11175 6.47393 9.11458 6.47306 9.11808L6.47305 9.11812L6.1139 10.5543Z"
                                                    fill="#808080"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.0966 3.65327C10.3505 3.39943 10.762 3.39943 11.0159 3.65327L13.0159 5.65327C13.2697 5.90711 13.2697 6.31867 13.0159 6.57251C12.762 6.82635 12.3505 6.82635 12.0966 6.57251L10.0966 4.57251C9.84279 4.31867 9.84279 3.90711 10.0966 3.65327Z"
                                                    fill="#808080"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.77438 8.32084C5.8206 8.31425 5.94266 8.29688 6.05157 8.29688C7.33122 8.29688 8.36823 9.33389 8.36823 10.6135C8.36823 10.7251 8.35178 10.8394 8.34414 10.8926C8.34295 10.9008 8.34197 10.9076 8.3413 10.9127C8.2943 11.2685 7.96768 11.519 7.61179 11.4719C7.2559 11.4249 7.00549 11.0983 7.0525 10.7424C7.05451 10.7272 7.05679 10.7108 7.05864 10.6975C7.05924 10.6932 7.0598 10.6892 7.06028 10.6857C7.06257 10.6691 7.06421 10.6568 7.0655 10.6458C7.06807 10.6239 7.06823 10.6154 7.06823 10.6135C7.06823 10.0519 6.61326 9.59689 6.05159 9.59687C6.05147 9.59688 6.04942 9.5969 6.04483 9.59724C6.03959 9.59762 6.03209 9.59834 6.02083 9.59968C6.00908 9.60109 5.99637 9.6028 5.97833 9.60526L5.97491 9.60572C5.95887 9.60791 5.93804 9.61076 5.91669 9.61337C5.56038 9.65707 5.2361 9.40365 5.1924 9.04733C5.1487 8.69102 5.40213 8.36674 5.75844 8.32304C5.7616 8.32265 5.76703 8.32188 5.77438 8.32084Z"
                                                    fill="#808080"></path>
                                            </svg>
                                        </div>
                                        <div class="create-data proxima_nova_bold">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M4 3.25C4.41421 3.25 4.75 3.58579 4.75 4V12.5C4.75 12.9228 5.08115 13.25 5.48733 13.25H10.4873C10.9096 13.25 11.25 12.9061 11.25 12.5V4C11.25 3.58579 11.5858 3.25 12 3.25C12.4142 3.25 12.75 3.58579 12.75 4V12.5C12.75 13.7513 11.7211 14.75 10.4873 14.75H5.48733C4.23618 14.75 3.25 13.7346 3.25 12.5V4C3.25 3.58579 3.58579 3.25 4 3.25Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2.25 4C2.25 3.58579 2.58579 3.25 3 3.25H13C13.4142 3.25 13.75 3.58579 13.75 4C13.75 4.41421 13.4142 4.75 13 4.75H3C2.58579 4.75 2.25 4.41421 2.25 4Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.91602 2C5.91602 1.58579 6.2518 1.25 6.66602 1.25H9.33268C9.7469 1.25 10.0827 1.58579 10.0827 2C10.0827 2.41421 9.7469 2.75 9.33268 2.75H6.66602C6.2518 2.75 5.91602 2.41421 5.91602 2Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9.33398 5.9165C9.7482 5.9165 10.084 6.25229 10.084 6.6665V11.3332C10.084 11.7474 9.7482 12.0832 9.33398 12.0832C8.91977 12.0832 8.58398 11.7474 8.58398 11.3332V6.6665C8.58398 6.25229 8.91977 5.9165 9.33398 5.9165Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M6.66602 5.9165C7.08023 5.9165 7.41602 6.25229 7.41602 6.6665V11.3332C7.41602 11.7474 7.08023 12.0832 6.66602 12.0832C6.2518 12.0832 5.91602 11.7474 5.91602 11.3332V6.6665C5.91602 6.25229 6.2518 5.9165 6.66602 5.9165Z"
                                                    fill="#808080" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>19 April</td>
                                <td>PF</td>
                                <td>Late time to forget</td>
                                <td>&#x20B9 630</td>
                                <td>
                                    <div class="atten-action-main">
                                        <div class="create-data  dropdown-toggle proxima_nova_bold"
                                            data-bs-toggle="offcanvas" data-bs-target="#deduction-toggle-right"
                                            aria-controls="deduction-toggle-right">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M3.34356 3.3166C2.96581 3.3166 2.65156 3.6263 2.65156 4.0186V12.6479C2.65156 13.0402 2.96581 13.3499 3.34356 13.3499H12.6596C13.0373 13.3499 13.3516 13.0402 13.3516 12.6479V8.71127C13.3516 8.35228 13.6426 8.06127 14.0016 8.06127C14.3605 8.06127 14.6516 8.35228 14.6516 8.71127V12.6479C14.6516 13.749 13.7645 14.6499 12.6596 14.6499H3.34356C2.23864 14.6499 1.35156 13.749 1.35156 12.6479V4.0186C1.35156 2.91757 2.23864 2.0166 3.34356 2.0166H8.00156C8.36055 2.0166 8.65156 2.30762 8.65156 2.6666C8.65156 3.02559 8.36055 3.3166 8.00156 3.3166H3.34356Z"
                                                    fill="#808080"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.1515 2.59748C11.926 1.82297 13.1816 1.82297 13.9561 2.59748L13.4965 3.0571L13.9561 2.59748L14.0708 2.71215C14.8453 3.48666 14.8453 4.74221 14.0708 5.51672L8.47742 11.1101L8.47563 11.1118C8.30797 11.2782 8.09809 11.3982 7.86549 11.4564C7.86547 11.4564 7.86546 11.4564 7.86545 11.4564L5.39012 12.0754C5.33547 12.0902 5.27849 12.098 5.22047 12.0979C5.04608 12.0981 4.88106 12.0275 4.76081 11.9075C4.64077 11.7872 4.57019 11.6222 4.57031 11.4478C4.57027 11.3898 4.57805 11.3328 4.59288 11.2781L5.21187 8.80279C5.21188 8.80277 5.21188 8.80276 5.21188 8.80275C5.26968 8.5716 5.38922 8.35978 5.55818 8.19082L11.1515 2.59748ZM6.1139 10.5543L7.55011 10.1952L7.55015 10.1952C7.55214 10.1947 7.55546 10.1934 7.55963 10.1894C7.55975 10.1893 7.55986 10.1891 7.55997 10.189L13.1515 4.59748C13.4183 4.33066 13.4183 3.89821 13.1515 3.63139L13.0368 3.51672C12.77 3.2499 12.3376 3.2499 12.0708 3.51672L6.47742 9.11005C6.47572 9.11175 6.47393 9.11458 6.47306 9.11808L6.47305 9.11812L6.1139 10.5543Z"
                                                    fill="#808080"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.0966 3.65327C10.3505 3.39943 10.762 3.39943 11.0159 3.65327L13.0159 5.65327C13.2697 5.90711 13.2697 6.31867 13.0159 6.57251C12.762 6.82635 12.3505 6.82635 12.0966 6.57251L10.0966 4.57251C9.84279 4.31867 9.84279 3.90711 10.0966 3.65327Z"
                                                    fill="#808080"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.77438 8.32084C5.8206 8.31425 5.94266 8.29688 6.05157 8.29688C7.33122 8.29688 8.36823 9.33389 8.36823 10.6135C8.36823 10.7251 8.35178 10.8394 8.34414 10.8926C8.34295 10.9008 8.34197 10.9076 8.3413 10.9127C8.2943 11.2685 7.96768 11.519 7.61179 11.4719C7.2559 11.4249 7.00549 11.0983 7.0525 10.7424C7.05451 10.7272 7.05679 10.7108 7.05864 10.6975C7.05924 10.6932 7.0598 10.6892 7.06028 10.6857C7.06257 10.6691 7.06421 10.6568 7.0655 10.6458C7.06807 10.6239 7.06823 10.6154 7.06823 10.6135C7.06823 10.0519 6.61326 9.59689 6.05159 9.59687C6.05147 9.59688 6.04942 9.5969 6.04483 9.59724C6.03959 9.59762 6.03209 9.59834 6.02083 9.59968C6.00908 9.60109 5.99637 9.6028 5.97833 9.60526L5.97491 9.60572C5.95887 9.60791 5.93804 9.61076 5.91669 9.61337C5.56038 9.65707 5.2361 9.40365 5.1924 9.04733C5.1487 8.69102 5.40213 8.36674 5.75844 8.32304C5.7616 8.32265 5.76703 8.32188 5.77438 8.32084Z"
                                                    fill="#808080"></path>
                                            </svg>
                                        </div>
                                        <div class="create-data proxima_nova_bold">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M4 3.25C4.41421 3.25 4.75 3.58579 4.75 4V12.5C4.75 12.9228 5.08115 13.25 5.48733 13.25H10.4873C10.9096 13.25 11.25 12.9061 11.25 12.5V4C11.25 3.58579 11.5858 3.25 12 3.25C12.4142 3.25 12.75 3.58579 12.75 4V12.5C12.75 13.7513 11.7211 14.75 10.4873 14.75H5.48733C4.23618 14.75 3.25 13.7346 3.25 12.5V4C3.25 3.58579 3.58579 3.25 4 3.25Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2.25 4C2.25 3.58579 2.58579 3.25 3 3.25H13C13.4142 3.25 13.75 3.58579 13.75 4C13.75 4.41421 13.4142 4.75 13 4.75H3C2.58579 4.75 2.25 4.41421 2.25 4Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.91602 2C5.91602 1.58579 6.2518 1.25 6.66602 1.25H9.33268C9.7469 1.25 10.0827 1.58579 10.0827 2C10.0827 2.41421 9.7469 2.75 9.33268 2.75H6.66602C6.2518 2.75 5.91602 2.41421 5.91602 2Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9.33398 5.9165C9.7482 5.9165 10.084 6.25229 10.084 6.6665V11.3332C10.084 11.7474 9.7482 12.0832 9.33398 12.0832C8.91977 12.0832 8.58398 11.7474 8.58398 11.3332V6.6665C8.58398 6.25229 8.91977 5.9165 9.33398 5.9165Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M6.66602 5.9165C7.08023 5.9165 7.41602 6.25229 7.41602 6.6665V11.3332C7.41602 11.7474 7.08023 12.0832 6.66602 12.0832C6.2518 12.0832 5.91602 11.7474 5.91602 11.3332V6.6665C5.91602 6.25229 6.2518 5.9165 6.66602 5.9165Z"
                                                    fill="#808080" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>02 April</td>
                                <td>PF</td>
                                <td>Late time to forget</td>
                                <td>&#x20B9 630</td>
                                <td>
                                    <div class="atten-action-main">
                                        <div class="create-data  dropdown-toggle proxima_nova_bold"
                                            data-bs-toggle="offcanvas" data-bs-target="#deduction-toggle-right"
                                            aria-controls="deduction-toggle-right">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M3.34356 3.3166C2.96581 3.3166 2.65156 3.6263 2.65156 4.0186V12.6479C2.65156 13.0402 2.96581 13.3499 3.34356 13.3499H12.6596C13.0373 13.3499 13.3516 13.0402 13.3516 12.6479V8.71127C13.3516 8.35228 13.6426 8.06127 14.0016 8.06127C14.3605 8.06127 14.6516 8.35228 14.6516 8.71127V12.6479C14.6516 13.749 13.7645 14.6499 12.6596 14.6499H3.34356C2.23864 14.6499 1.35156 13.749 1.35156 12.6479V4.0186C1.35156 2.91757 2.23864 2.0166 3.34356 2.0166H8.00156C8.36055 2.0166 8.65156 2.30762 8.65156 2.6666C8.65156 3.02559 8.36055 3.3166 8.00156 3.3166H3.34356Z"
                                                    fill="#808080"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.1515 2.59748C11.926 1.82297 13.1816 1.82297 13.9561 2.59748L13.4965 3.0571L13.9561 2.59748L14.0708 2.71215C14.8453 3.48666 14.8453 4.74221 14.0708 5.51672L8.47742 11.1101L8.47563 11.1118C8.30797 11.2782 8.09809 11.3982 7.86549 11.4564C7.86547 11.4564 7.86546 11.4564 7.86545 11.4564L5.39012 12.0754C5.33547 12.0902 5.27849 12.098 5.22047 12.0979C5.04608 12.0981 4.88106 12.0275 4.76081 11.9075C4.64077 11.7872 4.57019 11.6222 4.57031 11.4478C4.57027 11.3898 4.57805 11.3328 4.59288 11.2781L5.21187 8.80279C5.21188 8.80277 5.21188 8.80276 5.21188 8.80275C5.26968 8.5716 5.38922 8.35978 5.55818 8.19082L11.1515 2.59748ZM6.1139 10.5543L7.55011 10.1952L7.55015 10.1952C7.55214 10.1947 7.55546 10.1934 7.55963 10.1894C7.55975 10.1893 7.55986 10.1891 7.55997 10.189L13.1515 4.59748C13.4183 4.33066 13.4183 3.89821 13.1515 3.63139L13.0368 3.51672C12.77 3.2499 12.3376 3.2499 12.0708 3.51672L6.47742 9.11005C6.47572 9.11175 6.47393 9.11458 6.47306 9.11808L6.47305 9.11812L6.1139 10.5543Z"
                                                    fill="#808080"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.0966 3.65327C10.3505 3.39943 10.762 3.39943 11.0159 3.65327L13.0159 5.65327C13.2697 5.90711 13.2697 6.31867 13.0159 6.57251C12.762 6.82635 12.3505 6.82635 12.0966 6.57251L10.0966 4.57251C9.84279 4.31867 9.84279 3.90711 10.0966 3.65327Z"
                                                    fill="#808080"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.77438 8.32084C5.8206 8.31425 5.94266 8.29688 6.05157 8.29688C7.33122 8.29688 8.36823 9.33389 8.36823 10.6135C8.36823 10.7251 8.35178 10.8394 8.34414 10.8926C8.34295 10.9008 8.34197 10.9076 8.3413 10.9127C8.2943 11.2685 7.96768 11.519 7.61179 11.4719C7.2559 11.4249 7.00549 11.0983 7.0525 10.7424C7.05451 10.7272 7.05679 10.7108 7.05864 10.6975C7.05924 10.6932 7.0598 10.6892 7.06028 10.6857C7.06257 10.6691 7.06421 10.6568 7.0655 10.6458C7.06807 10.6239 7.06823 10.6154 7.06823 10.6135C7.06823 10.0519 6.61326 9.59689 6.05159 9.59687C6.05147 9.59688 6.04942 9.5969 6.04483 9.59724C6.03959 9.59762 6.03209 9.59834 6.02083 9.59968C6.00908 9.60109 5.99637 9.6028 5.97833 9.60526L5.97491 9.60572C5.95887 9.60791 5.93804 9.61076 5.91669 9.61337C5.56038 9.65707 5.2361 9.40365 5.1924 9.04733C5.1487 8.69102 5.40213 8.36674 5.75844 8.32304C5.7616 8.32265 5.76703 8.32188 5.77438 8.32084Z"
                                                    fill="#808080"></path>
                                            </svg>
                                        </div>
                                        <div class="create-data proxima_nova_bold">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M4 3.25C4.41421 3.25 4.75 3.58579 4.75 4V12.5C4.75 12.9228 5.08115 13.25 5.48733 13.25H10.4873C10.9096 13.25 11.25 12.9061 11.25 12.5V4C11.25 3.58579 11.5858 3.25 12 3.25C12.4142 3.25 12.75 3.58579 12.75 4V12.5C12.75 13.7513 11.7211 14.75 10.4873 14.75H5.48733C4.23618 14.75 3.25 13.7346 3.25 12.5V4C3.25 3.58579 3.58579 3.25 4 3.25Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2.25 4C2.25 3.58579 2.58579 3.25 3 3.25H13C13.4142 3.25 13.75 3.58579 13.75 4C13.75 4.41421 13.4142 4.75 13 4.75H3C2.58579 4.75 2.25 4.41421 2.25 4Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.91602 2C5.91602 1.58579 6.2518 1.25 6.66602 1.25H9.33268C9.7469 1.25 10.0827 1.58579 10.0827 2C10.0827 2.41421 9.7469 2.75 9.33268 2.75H6.66602C6.2518 2.75 5.91602 2.41421 5.91602 2Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9.33398 5.9165C9.7482 5.9165 10.084 6.25229 10.084 6.6665V11.3332C10.084 11.7474 9.7482 12.0832 9.33398 12.0832C8.91977 12.0832 8.58398 11.7474 8.58398 11.3332V6.6665C8.58398 6.25229 8.91977 5.9165 9.33398 5.9165Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M6.66602 5.9165C7.08023 5.9165 7.41602 6.25229 7.41602 6.6665V11.3332C7.41602 11.7474 7.08023 12.0832 6.66602 12.0832C6.2518 12.0832 5.91602 11.7474 5.91602 11.3332V6.6665C5.91602 6.25229 6.2518 5.9165 6.66602 5.9165Z"
                                                    fill="#808080" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>30 April</td>
                                <td>PF</td>
                                <td>Late time to forget</td>
                                <td>&#x20B9 630</td>
                                <td>
                                    <div class="atten-action-main">
                                        <div class="create-data  dropdown-toggle proxima_nova_bold"
                                            data-bs-toggle="offcanvas" data-bs-target="#deduction-toggle-right"
                                            aria-controls="deduction-toggle-right">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M3.34356 3.3166C2.96581 3.3166 2.65156 3.6263 2.65156 4.0186V12.6479C2.65156 13.0402 2.96581 13.3499 3.34356 13.3499H12.6596C13.0373 13.3499 13.3516 13.0402 13.3516 12.6479V8.71127C13.3516 8.35228 13.6426 8.06127 14.0016 8.06127C14.3605 8.06127 14.6516 8.35228 14.6516 8.71127V12.6479C14.6516 13.749 13.7645 14.6499 12.6596 14.6499H3.34356C2.23864 14.6499 1.35156 13.749 1.35156 12.6479V4.0186C1.35156 2.91757 2.23864 2.0166 3.34356 2.0166H8.00156C8.36055 2.0166 8.65156 2.30762 8.65156 2.6666C8.65156 3.02559 8.36055 3.3166 8.00156 3.3166H3.34356Z"
                                                    fill="#808080"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.1515 2.59748C11.926 1.82297 13.1816 1.82297 13.9561 2.59748L13.4965 3.0571L13.9561 2.59748L14.0708 2.71215C14.8453 3.48666 14.8453 4.74221 14.0708 5.51672L8.47742 11.1101L8.47563 11.1118C8.30797 11.2782 8.09809 11.3982 7.86549 11.4564C7.86547 11.4564 7.86546 11.4564 7.86545 11.4564L5.39012 12.0754C5.33547 12.0902 5.27849 12.098 5.22047 12.0979C5.04608 12.0981 4.88106 12.0275 4.76081 11.9075C4.64077 11.7872 4.57019 11.6222 4.57031 11.4478C4.57027 11.3898 4.57805 11.3328 4.59288 11.2781L5.21187 8.80279C5.21188 8.80277 5.21188 8.80276 5.21188 8.80275C5.26968 8.5716 5.38922 8.35978 5.55818 8.19082L11.1515 2.59748ZM6.1139 10.5543L7.55011 10.1952L7.55015 10.1952C7.55214 10.1947 7.55546 10.1934 7.55963 10.1894C7.55975 10.1893 7.55986 10.1891 7.55997 10.189L13.1515 4.59748C13.4183 4.33066 13.4183 3.89821 13.1515 3.63139L13.0368 3.51672C12.77 3.2499 12.3376 3.2499 12.0708 3.51672L6.47742 9.11005C6.47572 9.11175 6.47393 9.11458 6.47306 9.11808L6.47305 9.11812L6.1139 10.5543Z"
                                                    fill="#808080"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.0966 3.65327C10.3505 3.39943 10.762 3.39943 11.0159 3.65327L13.0159 5.65327C13.2697 5.90711 13.2697 6.31867 13.0159 6.57251C12.762 6.82635 12.3505 6.82635 12.0966 6.57251L10.0966 4.57251C9.84279 4.31867 9.84279 3.90711 10.0966 3.65327Z"
                                                    fill="#808080"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.77438 8.32084C5.8206 8.31425 5.94266 8.29688 6.05157 8.29688C7.33122 8.29688 8.36823 9.33389 8.36823 10.6135C8.36823 10.7251 8.35178 10.8394 8.34414 10.8926C8.34295 10.9008 8.34197 10.9076 8.3413 10.9127C8.2943 11.2685 7.96768 11.519 7.61179 11.4719C7.2559 11.4249 7.00549 11.0983 7.0525 10.7424C7.05451 10.7272 7.05679 10.7108 7.05864 10.6975C7.05924 10.6932 7.0598 10.6892 7.06028 10.6857C7.06257 10.6691 7.06421 10.6568 7.0655 10.6458C7.06807 10.6239 7.06823 10.6154 7.06823 10.6135C7.06823 10.0519 6.61326 9.59689 6.05159 9.59687C6.05147 9.59688 6.04942 9.5969 6.04483 9.59724C6.03959 9.59762 6.03209 9.59834 6.02083 9.59968C6.00908 9.60109 5.99637 9.6028 5.97833 9.60526L5.97491 9.60572C5.95887 9.60791 5.93804 9.61076 5.91669 9.61337C5.56038 9.65707 5.2361 9.40365 5.1924 9.04733C5.1487 8.69102 5.40213 8.36674 5.75844 8.32304C5.7616 8.32265 5.76703 8.32188 5.77438 8.32084Z"
                                                    fill="#808080"></path>
                                            </svg>
                                        </div>
                                        <div class="create-data proxima_nova_bold">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M4 3.25C4.41421 3.25 4.75 3.58579 4.75 4V12.5C4.75 12.9228 5.08115 13.25 5.48733 13.25H10.4873C10.9096 13.25 11.25 12.9061 11.25 12.5V4C11.25 3.58579 11.5858 3.25 12 3.25C12.4142 3.25 12.75 3.58579 12.75 4V12.5C12.75 13.7513 11.7211 14.75 10.4873 14.75H5.48733C4.23618 14.75 3.25 13.7346 3.25 12.5V4C3.25 3.58579 3.58579 3.25 4 3.25Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2.25 4C2.25 3.58579 2.58579 3.25 3 3.25H13C13.4142 3.25 13.75 3.58579 13.75 4C13.75 4.41421 13.4142 4.75 13 4.75H3C2.58579 4.75 2.25 4.41421 2.25 4Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.91602 2C5.91602 1.58579 6.2518 1.25 6.66602 1.25H9.33268C9.7469 1.25 10.0827 1.58579 10.0827 2C10.0827 2.41421 9.7469 2.75 9.33268 2.75H6.66602C6.2518 2.75 5.91602 2.41421 5.91602 2Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9.33398 5.9165C9.7482 5.9165 10.084 6.25229 10.084 6.6665V11.3332C10.084 11.7474 9.7482 12.0832 9.33398 12.0832C8.91977 12.0832 8.58398 11.7474 8.58398 11.3332V6.6665C8.58398 6.25229 8.91977 5.9165 9.33398 5.9165Z"
                                                    fill="#808080" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M6.66602 5.9165C7.08023 5.9165 7.41602 6.25229 7.41602 6.6665V11.3332C7.41602 11.7474 7.08023 12.0832 6.66602 12.0832C6.2518 12.0832 5.91602 11.7474 5.91602 11.3332V6.6665C5.91602 6.25229 6.2518 5.9165 6.66602 5.9165Z"
                                                    fill="#808080" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <div class="reject-approve-bttn">
                        <button name="" class="approve-btn-btn add-allow-btn proxima_nova_semibold">Add Deduction</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- atten tab end -->
        <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="view-toggle-right"
            data-bs-scroll="true" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <div class="popup-close-btns" data-bs-dismiss="offcanvas" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2.84154 2.84056C3.07296 2.60914 3.44817 2.60914 3.67959 2.84056L13.1611 12.322C13.3925 12.5535 13.3925 12.9287 13.1611 13.1601C12.9296 13.3915 12.5544 13.3915 12.323 13.1601L2.84154 3.67861C2.61011 3.44719 2.61011 3.07198 2.84154 2.84056Z"
                            fill="#808080" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M13.1611 2.84056C13.3925 3.07198 13.3925 3.44719 13.1611 3.67861L3.67959 13.1601C3.44817 13.3915 3.07296 13.3915 2.84154 13.1601C2.61011 12.9287 2.61011 12.5535 2.84154 12.322L12.323 2.84056C12.5544 2.60914 12.9296 2.60914 13.1611 2.84056Z"
                            fill="#808080" />
                    </svg>
                </div>
            </div>
            <div class="view_log_model_inner">
                <h5 class="section_title_heading proxima_nova_bold download-work-main-header">View Log</h5>
                <hr>
                <div class="view-log-model">
                    <h2 class="proxima_nova_semibold section_title note_name"></h2>
                    <p class="log_date"></p>
                </div>
                <div class="view-log-model-main ">
                    <!-- <ul class="view-log-content">
                                    <li class="view-log-status proxima_nova_semibold section_title status_log_value"></li>
                                    <p class="status_log_by"></p>
                                </ul> -->
                </div>
            </div>
            <div class="download-cancel-btns-main">
                <div class="download-cancel-btn">
                    <button name="" class="download-btn proxima_nova_semibold close_view_log" data-bs-dismiss="offcanvas" aria-label="Close">Close</button>
                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="allowances-toggle-right"
            data-bs-scroll="true" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <div class="popup-close-btns" data-bs-dismiss="offcanvas" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
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
                <h5 class="section_title_heading proxima_nova_bold download-work-main-header allowances-title-main">
                    Allowances/Bonus</h5>
                <span class="allow-name">Sweta Vaghasiya</span>
                <hr>
                <div class="filter-sub-sec">
                    <form method="">
                        <div class="daily-work-select">
                            <div class="daily-work-date">
                                <input type="radio" id="allowances_data" name="dateType" value="Date" checked />
                                <label for="Date" class="single-date-work section_sub_title">Allowances</label>
                            </div>
                            <div class="daily-work-range">
                                <input type="radio" id="bonus_data" name="dateType" value="Range" />
                                <label for="Range" class="single-date-work section_sub_title">Bonus</label>
                            </div>
                        </div>
                        <div class="selected-data-show" id="singleDatePicker">
                            <h3 class="picker-title section_sub_title">Choose Date</h3>
                            <div class="allow-date-picker date amount-allow-data" data-provide="datepicker">
                                <input type="date" class="form-control single-picker section_sub_title">
                                <div class="input-group-addon select-calender-img"></div>
                            </div>
                        </div>
                        <div class="selected-data-show-amout" id="singleDatePicker">
                            <h3 class="picker-title section_sub_title">Amount</h3>
                            <div class="amount-allow-data">
                                <input type="text" class="amount-text" placeholder="Amount">
                                <div>&#x20B9</div>
                            </div>
                        </div>
                        <div class="daily-work-select">
                            <div class="daily-work-date">
                                <input type="radio" id="allowances_data" name="dateType" value="Date" checked />
                                <label for="Date" class="single-date-work section_sub_title">Already Paid</label>
                            </div>
                            <div class="daily-work-range">
                                <input type="radio" id="bonus_data" name="dateType" value="Range" />
                                <label for="Range" class="single-date-work section_sub_title">Add to Salary</label>
                            </div>
                        </div>
                        <div class="staff-work-details">
                            <label for="exampleInputPassword1"
                                class="form-label staff-detail-label section_sub_title">Description (Optional)</label>
                            <div class="amount-allow-data">
                                <textarea id="description" name="description" class="work-label section_sub_title" rows="4"
                                    cols="20" placeholder="Add Description"></textarea>
                            </div>
                        </div>
                        <div class="allow-sms-staff">
                            <input type="checkbox">
                            <p class="atten-sms section_sub_title pull-left">Send Absent SMS to Staff
                            </p>
                        </div>
                        <div class="download-cancel-btns-main">
                            <div class="download-cancel-btn">
                                <button name="" class="delete-allow-btn proxima_nova_semibold">Delete</button>
                            </div>
                            <div class="save-staff-allow-btn">
                                <button name="" class="download-btn proxima_nova_semibold">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="deduction-toggle-right"
            data-bs-scroll="true" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <div class="popup-close-btns" data-bs-dismiss="offcanvas" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
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
                <h5 class="section_title_heading proxima_nova_bold download-work-main-header allowances-title-main">
                    Deduction</h5>
                <span class="allow-name">Sweta Vaghasiya</span>
                <hr>
                <div class="filter-sub-sec">
                    <form method="">
                        <div class="selected-data-show" id="singleDatePicker">
                            <h3 class="picker-title section_sub_title">Choose Date</h3>
                            <div class="allow-date-picker date amount-allow-data" data-provide="datepicker">
                                <input type="date" class="form-control single-picker section_sub_title">
                                <div class="input-group-addon select-calender-img"></div>
                            </div>
                        </div>
                        <div class="selected-data-show-amout" id="singleDatePicker">
                            <h3 class="picker-title section_sub_title">Amount</h3>
                            <div class="amount-allow-data">
                                <input type="text" class="amount-text" placeholder="Amount">
                                <div>&#x20B9</div>
                            </div>
                        </div>
                        <div class="daily-work-select">
                            <h3 class="picker-title section_sub_title">Select Deduction Type</h3>
                            <div class="daily-work-date">
                                <input type="radio" id="allowances_data" name="dateType" value="Date" checked />
                                <label for="Date" class="single-date-work section_sub_title">PF</label>
                            </div>
                            <div class="daily-work-range daily-work-date">
                                <input type="radio" id="bonus_data" name="dateType" value="Range" />
                                <label for="Range" class="single-date-work section_sub_title">ESI</label>
                            </div>
                            <div class="daily-work-range daily-work-date">
                                <input type="radio" id="bonus_data" name="dateType" value="Range" />
                                <label for="Range" class="single-date-work section_sub_title">Other</label>
                            </div>
                        </div>
                        <div class="staff-work-details">
                            <label for="exampleInputPassword1"
                                class="form-label staff-detail-label section_sub_title">Description (Optional)</label>
                            <div class="amount-allow-data">
                                <textarea id="description" name="description" class="work-label section_sub_title" rows="4"
                                    cols="20" placeholder="Add Description"></textarea>
                            </div>
                        </div>
                        <div class="allow-sms-staff">
                            <input type="checkbox">
                            <p class="atten-sms section_sub_title pull-left">Send Absent SMS to Staff
                            </p>
                        </div>
                        <div class="download-cancel-btns-main">
                            <div class="save-staff-allow-btn deduction-allow-data">
                                <button name="" class="download-btn proxima_nova_semibold">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="create-toggle-right"
            data-bs-scroll="true" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <div class="popup-close-btns" data-bs-dismiss="offcanvas" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
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
                <h5 class="section_title_heading proxima_nova_bold download-work-main-header filter-title-main">Add Note
                </h5>
                <hr>
                <div class="filter-sub-sec">
                    <form id="staff_add_note" method="">
                        <div class="staff_add_form_inner">
                            <input type="hidden" id="staff_id" name="staff_id">
                            <input type="hidden" id="attendance_date" name="attendance_date">
                            <div class="daily-work-select">
                                <h2 class="filter-shiftcheck section_title proxima_nova_semibold note_name"></h2>
                                <div class="form-check add-note-main">
                                    <textarea placeholder="Leave needs to be added." class="section_sub_title w-100" name="note_area"
                                        id="note_area"></textarea>
                                </div>                        
                            </div>
                        </div>
                        <div class="download-cancel-btns-main">
                                <div class="download-cancel-btn">
                                    <button type="submit" name="" class="download-btn proxima_nova_semibold w-100">Save</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="profile-img-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title profile-title-model section_title_heading proxima_nova_bold"
                        id="exampleModalLabel">{{$staff[0]['name']}} {{$staff[0]['last_name']}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="staff_attendance_profile" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="staff_id" name="staff_id" value="{{$staff[0]->id}}">
                    <div class="modal-body staff-images-show mb-5">
                        <div id="append-preview">
                             @if(!empty($staff[0]->staffPhoto[0]->photo))
                                <div class="addes-img-sub" id="">
                                    <img src="{{asset('assets/admin/images/staff_photos/'.$staff[0]->staffPhoto[0]->photo)}}" alt=""
                                        class="added-images">
                                </div>
                            @endif
                            <!-- @foreach($staff[0]->StaffPhoto as $photos)
                            <div class="addes-img-sub" id="{{$photos->id}}"> -->
                                <!-- <img src="{{asset('assets/admin/images/staff_photos/'.$photos->photo)}}" alt=""
                                    class="added-images"> -->
                                <!-- <button type="button" class="decline-images" id="delete-preview-profile" onclick="deletePreviewProfile({{$photos->id}})"></button> -->
                            <!-- </div>
                            @endforeach -->
                        </div>
                        <!-- <div class="addes-img-sub addes-image-upload">
                            <div class="staff-profile-edit">
                                <input type='file' id="profile" name="profile[]" accept=".png, .jpg, .jpeg" multiple />
                                <label for="profile"><img src="{{asset('assets/admin/images/staff_manage/edit2.svg')}}" alt=""></label>
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="staff-save-btn-main modal-footer">
                        <button type="submit" class="staff-multi-images-btn">Save</button>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>

$(document).ready(function(){
    var startDatepicker = $('.start_date');
    var endDatepicker = $('.end_date');
    var today = new Date();
    var lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);

    startDatepicker.datepicker({
        format: 'dd M yyyy',
        autoclose: true,
        todayHighlight: false,
        endDate: today
    }).on('changeDate', function(selected) {
        // Set the minimum date for the "To" datepicker
        endDatepicker.datepicker('setStartDate', selected.date);

        // Disable "To" date if it's less than the selected "From" date
        if (endDatepicker.datepicker('getDate') < selected.date) {
        endDatepicker.datepicker('setDate', selected.date);
        }
    });

    endDatepicker.datepicker({
        format: 'dd M yyyy',
        autoclose: true,
        todayHighlight: false,
        endDate: today
    }).on('changeDate', function(selected) {
        // Set the maximum date for the "From" datepicker
        startDatepicker.datepicker('setEndDate', selected.date);
    });
});
// status select box
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
//  datepicker
// $('.start_date').datepicker({
//     format: 'dd M yyyy',
//     autoclose: true,
//     // startView: 'months',
//     // minViewMode: 'months'
// });
// $('.end_date').datepicker({
//     format: 'dd M yyyy',
//     autoclose: true,
//     // startView: 'months',
//     // minViewMode: 'months'
// });
$('.input-group.date').datepicker({
    format: 'dd M yyyy',
    autoclose: true,
    // startView: 'months',
    // minViewMode: 'months'
});
$('.input-group.date-leave').datepicker({
    format: 'M yyyy',
    autoclose: true,
});
$('.input-group.date-leave').datepicker('setDate', new Date('2023-01-01'));

$('.input-group.over_time.date').datepicker({
    format: 'dd M yyyy',
    autoclose: true,
});
// $('.input-group.date').datepicker('setDate', new Date('2023-01-01'));

$('.allow-date-picker.date').datepicker({
    format: 'dd, M yyyy',
    autoclose: true
});
$('.allow-date-picker.date').datepicker('setDate', new Date('2023-04-19'));

$('.single-picker').datepicker({
    format: 'dd, M yyyy',
    autoclose: true
});
$('.single-picker').datepicker('setDate', new Date('2023-04-19'));

//  datatable
$(document).ready(function() {
    var table = $('#leaves_data').DataTable({
        searching: false,
        responsive: true,
        lengthChange: false,
        info: false,
        bPaginate: false,
    });
    var table = $('#overtime_data').DataTable({
        searching: false,
        responsive: true,
        lengthChange: false,
        info: false,
        bPaginate: false,
    });
    var table = $('#allowances_data').DataTable({
        searching: false,
        responsive: true,
        lengthChange: false,
        info: false,
        bPaginate: false,
    });
    var table = $('#deduction_data').DataTable({
        searching: false,
        responsive: true,
        lengthChange: false,
        info: false,
        bPaginate: false,
    });
    // muklti checkbox
    $('#selectAllCheckbox').on('change', function() {
        var isChecked = $(this).prop('checked');
        $('.selectCheckbox_model').prop('checked', isChecked);
    });
    // search data
    $('#staff_data_find').on('input', function() {
        var searchValue = $(this).val();
        table.search(searchValue).draw();
        // console.log(table);
    });
    $('.add-overtime-btn').click(function() {
        $('.overtime-add-form').show();
        $('.overtime-tab-list').hide();
    });

    $('.apply-overtime-btn').click(function() {
        $('.overtime-add-form').hide();
        $('.overtime-tab-list').show();
    });
});
</script>
<script>
//  datatable
$(document).ready(function() {
    var table;

    function datatable(start_date = null, end_date = null) {
        if(start_date == null && end_date == null){
            var start_date = $('.start_date').val()
            var end_date = $('.end_date').val()
        }
        table = $('#staff_attendance_data').DataTable({
            // "lengthMenu": [[5, 10, 20], [5, 10, 20]],
            searching: false,
            lengthChange: false,
            info: false,
            responsive: true,
            bPaginate: false,
            // pagingType: "full_numbers",
            order: [
                // [0, "desc"]
            ],
            ajax: {
                "url": "{{ route('staff_attendance_list') }}",
                "dataType": "json",
                "type": "POST",
                "data": {
                    _token: "{{csrf_token()}}",
                    'staff_id': <?=$staff[0]->id?>,
                    'start_date': start_date,
                    'end_date': end_date,
                }
            },
            initComplete: function (settings, json) {
                    var api = this.api();
                    if (table.rows().count() === 0) {
                        // Display image or advertisement
                        var adContent = '<tr><td colspan="7"><div class="no_data_found"><div class=""><img src="{{asset('assets/admin/images/staff_manage/no_data.svg')}}" alt="Advertisement"></div><div class="proxima_nova_semibold section_title">No data found, staff profile</div></div></td></tr>';
                        $(api.table().body()).html(adContent);
                    }
                },
            columns: [{
                    "data": "date",
                },
                {
                    "data": "staff_time"
                },
                {
                    "data": "note"
                },
                {
                    data: "status",
                    render: function(data, type, row) {
                        return `
                                    <div class="custom-select">
                                        <select class="mySelect">
                                            <option value="Present" data-record-id="${row.id}" data-image="{{asset('assets/admin/images/attendance/present2.svg')}}" ${data === 'Present' ? 'selected' : ''}>Present</option>
                                            <option value="Absent" data-record-id="${row.id}" data-image="{{asset('assets/admin/images/attendance/Absent2.svg')}}" ${data === 'Absent' ? 'selected' : ''}>Absent</option>
                                            <option value="Half Day" data-record-id="${row.id}" data-image="{{asset('assets/admin/images/attendance/halfday2.svg')}}" ${data === 'Half Day' ? 'selected' : ''}>Half Day</option>
                                            
                                        </select>
                                    </div>
                                    `;
                    }
                    // <option value="Paid Leave" data-record-id="${row.id}" data-image="{{asset('assets/admin/images/attendance/paid.svg')}}" ${data === 'Paid Leave' ? 'selected' : ''}>Paid Leave</option>
                    //                         <option value="Holiday" data-record-id="${row.id}" data-image="{{asset('assets/admin/images/attendance/holiday.svg')}}" ${data === 'Holiday' ? 'selected' : ''}>Holiday</option>
                },
                {
                    "data": "overtime"
                },
                {
                    "data": "fine"
                },
                {
                    "data": "action"
                },
            ],
            drawCallback: function() {
                $('.mySelect').select2({
                    templateResult: formatOption,
                    templateSelection: formatOption,
                    minimumResultsForSearch: Infinity, //search disable hide
                }).on('select2:open', function (e) {
                    $('.select2-container').addClass('atten_status_datas');
                });
                $('.mySelect').on('change', function(e) {
                    var selectedOption = $(this).find(
                    'option:selected'); // Get the selected option
                    var id = selectedOption.data('record-id');
                    var status = $(this).val();
                    var calender_date = $('#calender_date').val();
                    changeStatus(id, status, calender_date);
                });
            },
            // createdRow: function (row, data, dataIndex) {
            //     $(row).attr('id', 'storie_col_' + data['id']);
            // },
            columnDefs: [
                // { "width": "40%", "targets": 3 },
                // {'targets': [1,2], 'orderable': false}
            ]
        });
        $('.dataTables_length').addClass('bs-select');
    }
    datatable();
    $('.start_date, .end_date').on('change', function() {
        table.destroy();
        
        // var calender_date = $('#attendance_datepicker').val();
        var start_date = $('.start_date').val();
        // console.log(start_date)
        var end_date = $('.end_date').val();
        datatable(start_date, end_date);
    });
    $('#staff_add_note').submit(function(event) {
        event.preventDefault();
        if (fieldValidation()) {
            var formData = new FormData($(this)[0]);
            // var calender_date = $('#calender_date').val();
            // formData.append('calender_date', calender_date);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('add_staff_note') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response['status'] == 1) {
                        toastr["success"](response.message);
                        $('#create-toggle-right').offcanvas('toggle');
                        table.ajax.reload(null, false);
                    } else {
                        toastr["error"](response.message)
                    }
                }
            });
        }
    });
});

function deletePreviewProfile(deleteId) {
    $('#' + deleteId).remove();
    $('#staff_attendance_profile').append('<input type="hidden" name="deletedPreviewProfile[]" value="' + deleteId +
        '">');
}
$('#profile').on('change', function(e) {
    // console.log(e);
    var files = e.target.files;
    var imagePreviewContainer = $('#append-preview');
    for (var i = 0; i < files.length; i++) {
        (function(file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var preview = '<div class="addes-img-sub" id="' + file.name + '"><img src="' + e.target
                    .result + '" alt="" class="added-images">' +
                    '<button type="button" class="decline-images" data-image-name="' + file.name +
                    '"></button>' +
                    '</div>';
                imagePreviewContainer.append(preview);
            };
            reader.readAsDataURL(file);
        })(files[i]);
    }
});
$('#append-preview').on('click', '.decline-images', function(e) {
    var removeFile = $(this).data('image-name');
    $(this).parent().remove();
    var newInputElement = $('#profile').clone(true);
    $('#profile').val('');
    var newFiles = [];
    // Loop through the files of the cloned input element
    for (var i = 0; i < newInputElement[0].files.length; i++) {
        if (newInputElement[0].files[i].name !== removeFile) {
            newFiles.push(newInputElement[0].files[i]);
        }
    }
    // Create a new FileList object and set it to the cloned input element
    var newFileList = new DataTransfer();
    for (var i = 0; i < newFiles.length; i++) {
        newFileList.items.add(newFiles[i]);
    }
    newInputElement[0].files = newFileList.files;
    $('#profile').replaceWith(newInputElement);
});
$('#staff_attendance_profile').submit(function(event) {
    event.preventDefault();
    var formData = new FormData($('#staff_attendance_profile')[0]);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: "{{ route('update_staff_profile') }}",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // console.log(response);
            if (response['status'] == 1) {
                toastr["success"](response.message);
                // $('#add_staff')[0].reset();
                setTimeout(function() {
                    location.reload(true)
                }, 1500);
            } else {
                toastr["error"](response.message)
            }
        }
    });
});

function fieldValidation() {
    var valid = true;
    $(".error").remove();
    if ($('#note_area').val() == "") {
        $("#note_area").after(
            '<span class="error error_message proxima_nova_semibold">Please add note.</span>'
        );
        valid = false;
    }
    return valid;
}
$('.start_date, .end_date').on('change', function() {
    var start_date = $('.start_date').val();
    var end_date = $('.end_date').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route('attendance_staff_on_date_change') }}",
        type: 'POST',
        data: {
            start_date: start_date,
            end_date: end_date,
            staff_id: <?=$staff[0]->id?>
        },
        success: function(response) {
            $('#month_count').html(response.month_count);
            $('#present_count').html(response.present_count);
            $('#absent_count').html(response.absent_count);
            $('#half_day').html(response.halfday_count);
            $('#paid_leave').html(response.paidleave_count);
        },
    });
});

function displayNote(date, staff_id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route('staff_display_note_data') }}",
        type: "POST",
        data: {
            "date": date,
            "staff_id": staff_id,
        },
        success: function(response) {
            if (response['status'] == 1) {
                $('#staff_id').val(response['staff_name'][0]['id']);
                $('.note_name').html(response['staff_name'][0]['name']);
                $('#attendance_date').val(response['staff_note']['date']);
                $('#note_area').val(response['staff_note']['note']);
            }
        }
    });
}

function changeStatus(id, status, calender_date) {
    // console.log(id);
    var start_date = $('.start_date').val();
    var end_date = $('.end_date').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route('staff_attendance_change_status') }}",
        type: "POST",
        data: {
            "attendance_id": id,
            "staff_id": <?=$staff[0]->id?>,
            "status": status,
            "start_date": start_date,
            "end_date": end_date,
        },
        success: function(response) {
            toastr["success"](response.message);
            $('#staff_count').html(response.staff_count);
            $('#present_count').html(response.present_count);
            $('#absent_count').html(response.absent_count);
            $('#half_day').html(response.halfday_count);
            $('#paid_leave').html(response.paidleave_count);
        },
    });
}

var attendance_id;
function viewLog(id) {
    $('.view-log-model-main').empty();
    var calender_date = $('#attendance_datepicker').val();
    attendance_id = id;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route('display_note_and_log_data') }}",
        type: "POST",
        data: {
            "attendance_id": attendance_id,
            "calender_date": calender_date,
        },
        success: function (response) {
            if (response['status'] == 1) {
                var staff_log = response['data'][0]['staff_log'];
                var i = 0;
                $.each(staff_log, function (index, logItem) {
                    if (logItem.detail === "Select" || logItem === null) {
                        $('.view-log-model-main').empty();
                    } else {
                        $('.view-log-model-main').append(
                            '<ul class="view-log-content"><li class="view-log-status proxima_nova_semibold section_title status_log_value"> Marked ' +
                            logItem.detail + '</li><p class="status_log_by">By ' + logItem.user
                                .name + ' on ' + response['log_time'][i++] + '</p></ul>');
                    }

                });

                $('#attendance_id').val(response['data'][0]['id']);
                $('#note_area').val(response['data'][0]['note']);
                $('.note_name').html(response['data'][0]['staff_note']['name']);
                $('.log_date').html(response['date']);
            }
        }
    });

}
$('#export_excel').on('click', function (e) {
    e.preventDefault();
    var url = '{{ route('staff_attendance_excel') }}';
    var calender_date = $('#attendance_datepicker').val();
    var start_date = $('.start_date').val();
    var end_date = $('.end_date').val();
    var staffId = {!! json_encode($staff[0]->id) !!}; // Pass PHP variable to JavaScript

    var queryParams = $.param({ staff_id: staffId, calender_date: calender_date ,start_date:start_date,end_date:end_date});

    var finalUrl = url + '?' + queryParams;

    window.location.href = finalUrl;
    if(finalUrl){
        toastr["success"]('Your files is being downloaded');
    }else {
        toastr["error"]('Somthing went wrong.');
    }
});
</script>
@endsection