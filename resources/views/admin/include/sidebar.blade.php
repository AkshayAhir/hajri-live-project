<?php
$business_id = Session::get('business_id');
?>
<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <div class="sidebar-brand">
            <div id="close-sidebar">
                <img src="{{asset('assets/admin/images/sidebar/ic_close.svg')}}" alt="">
            </div>
        </div>
        <div class="header_top">
            <div class="logo">
                <a href="{{ route('dashboard') }}">
                    <img class="img-responsive logo_img " src="{{asset('assets/admin/images/sidebar/logo.svg')}}" alt="User picture"><span class="logo_txt">Hajri</span>
                </a>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul>
                <!-- <li class="nav_menu cont_select_center">
                    <div class="select_mate_option" data-mate-select="active">
                        <div class="filters sidebar-select select_mate_option">
                            <select id="business_id"
                                class="form-select create-select section_sub_title sidebar-select-club-services business_selct_box"
                                name="business_id">
                                @foreach($business as $value)
                                <option value="{{$value->id}}" {{ $business_id == $value->id ? 'selected' : '' }}>
                                    {{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </li> -->
                <li class="nav_menu cont_select_center">
                    <div class="sidebar-select-main business_selct_box select_mate_option"> 
                        @if($business_count == 1)
                            <input type="hidden" id="business_id" class="business_id" value="{{$business_id}}">
                           <p class="business_one_data"> {{$business[0]->name}}</p>
                           <p class="business_one_data_hidden"> {{$business[0]->name}}</p>
                        @else
                            <select class="sidebar-select-id" id="business_id" name="business_id">
                                @foreach($business as $value)
                                <?php 
                                    $text = $value->name;
                                    $truncatedText = substr($text, 0, 20)
                                ?>
                                <option value="{{$value->id}}" {{ $business_id == $value->id ? 'selected' : '' }}>{{$truncatedText}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </li>
                <li class="nav_menu sidemenu_dash">
                    <a href="{{ route('dashboard') }}"
                        class="{{ Request::is('dashboard*','approve-punches*','approve-overtime*','review-fine*','manage-leave*','detailed-attendance-view*','attendance-upcoming-leaves*','attendance-daily-work-entries*','on_time*','late*','absent*','leave*','notification*') ? 'hr_active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.16667 2.25C2.66005 2.25 2.25 2.66005 2.25 3.16667V14.8333C2.25 15.34 2.66005 15.75 3.16667 15.75H14.8333C15.34 15.75 15.75 15.34 15.75 14.8333V3.16667C15.75 2.66005 15.34 2.25 14.8333 2.25H3.16667ZM0.75 3.16667C0.75 1.83162 1.83162 0.75 3.16667 0.75H14.8333C16.1684 0.75 17.25 1.83162 17.25 3.16667V14.8333C17.25 16.1684 16.1684 17.25 14.8333 17.25H3.16667C1.83162 17.25 0.75 16.1684 0.75 14.8333V3.16667Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.33301 0.75C7.74722 0.75 8.08301 1.08579 8.08301 1.5V16.5C8.08301 16.9142 7.74722 17.25 7.33301 17.25C6.91879 17.25 6.58301 16.9142 6.58301 16.5V1.5C6.58301 1.08579 6.91879 0.75 7.33301 0.75Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6.58301 9C6.58301 8.58579 6.91879 8.25 7.33301 8.25H16.4997C16.9139 8.25 17.2497 8.58579 17.2497 9C17.2497 9.41421 16.9139 9.75 16.4997 9.75H7.33301C6.91879 9.75 6.58301 9.41421 6.58301 9Z"
                                fill="#808080" />
                        </svg>
                        <span class="proxima_nova_semibold">Dashboard</span>
                    </a>
                </li>
                <li class="nav_menu">
                    <a href="{{route('staff')}}" class="{{ Request::is('staff*') ? 'hr_active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 14" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.00033 10.25C3.58121 10.25 2.41699 11.4142 2.41699 12.8333C2.41699 13.2475 2.08121 13.5833 1.66699 13.5833C1.25278 13.5833 0.916992 13.2475 0.916992 12.8333C0.916992 10.5858 2.75278 8.75 5.00033 8.75H8.33366C10.5812 8.75 12.417 10.5858 12.417 12.8333C12.417 13.2475 12.0812 13.5833 11.667 13.5833C11.2528 13.5833 10.917 13.2475 10.917 12.8333C10.917 11.4142 9.75278 10.25 8.33366 10.25H5.00033Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.22986 2.54065C7.31244 1.69857 5.88446 1.70188 5.13332 2.51081C4.3433 3.36159 4.3736 4.66556 5.21665 5.57346C5.97023 6.38501 7.32263 6.3861 8.24005 5.53421C9.07274 4.76099 9.10494 3.42584 8.22986 2.54065ZM9.25707 1.44748C7.84027 0.135424 5.44565 -0.029966 4.03413 1.49013C2.65748 2.97268 2.79385 5.16871 4.11746 6.59414C5.53055 8.11592 7.84482 7.94817 9.26073 6.6334C10.7571 5.2439 10.729 2.922 9.28412 1.47354C9.27978 1.46915 9.27536 1.46479 9.27089 1.46048C9.26633 1.45608 9.26172 1.45175 9.25707 1.44748Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.584 8.66699C12.584 8.25278 12.9198 7.91699 13.334 7.91699H15.834C17.6649 7.91699 19.084 9.33611 19.084 11.167C19.084 11.5812 18.7482 11.917 18.334 11.917C17.9198 11.917 17.584 11.5812 17.584 11.167C17.584 10.1645 16.8364 9.41699 15.834 9.41699H13.334C12.9198 9.41699 12.584 9.08121 12.584 8.66699Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15.5671 3.12844C15.0025 2.63441 14.136 2.67547 13.6971 3.11432C13.6878 3.12362 13.6783 3.13267 13.6685 3.14146C13.2161 3.54859 13.1807 4.39493 13.7243 4.99893C14.1314 5.4513 14.9777 5.48679 15.5817 4.94319C16.0636 4.50955 16.1092 3.68518 15.5671 3.12844ZM16.5799 2.02177C15.4818 1.0385 13.7079 0.998358 12.6505 2.03972C11.4524 3.13399 11.6568 4.94399 12.6093 6.00238C13.7022 7.21668 15.5225 7.01452 16.5852 6.05813C17.7642 4.99704 17.7237 3.16901 16.6188 2.05868C16.6126 2.05233 16.6062 2.04607 16.5997 2.0399C16.5932 2.03371 16.5866 2.02767 16.5799 2.02177Z"
                                fill="#808080" />
                        </svg>
                        <span class="proxima_nova_semibold">Staff Management</span>
                        <!-- <span class="proxima_nova_semibold" class="badge badge-pill badge-danger">3</span> -->
                    </a>
                </li>
                <li class="nav_menu">
                    <!-- <a class="{{ Request::is('attendance*') ? 'hr_active' : '' }}" href="#sidebarLayouts"
                        data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts"> -->
                    <a href="{{route('attendance')}}" class="{{ Request::is('attendance*') ? 'hr_active' : '' }}" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.16667 3.25C3.66041 3.25 3.25 3.66041 3.25 4.16667V15.8333C3.25 16.3396 3.66041 16.75 4.16667 16.75H15C15.5063 16.75 15.9167 16.3396 15.9167 15.8333V14.1667C15.9167 13.7525 16.2525 13.4167 16.6667 13.4167C17.0809 13.4167 17.4167 13.7525 17.4167 14.1667V15.8333C17.4167 17.168 16.3347 18.25 15 18.25H4.16667C2.83198 18.25 1.75 17.168 1.75 15.8333V4.16667C1.75 2.83198 2.83198 1.75 4.16667 1.75H15C16.3347 1.75 17.4167 2.83198 17.4167 4.16667V5.83333C17.4167 6.24755 17.0809 6.58333 16.6667 6.58333C16.2525 6.58333 15.9167 6.24755 15.9167 5.83333V4.16667C15.9167 3.66041 15.5063 3.25 15 3.25H4.16667Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.08301 6.66699C5.08301 6.25278 5.41879 5.91699 5.83301 5.91699H13.333C13.7472 5.91699 14.083 6.25278 14.083 6.66699C14.083 7.08121 13.7472 7.41699 13.333 7.41699H5.83301C5.41879 7.41699 5.08301 7.08121 5.08301 6.66699Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.08301 10C5.08301 9.58579 5.41879 9.25 5.83301 9.25H11.6664C12.0806 9.25 12.4164 9.58579 12.4164 10C12.4164 10.4142 12.0806 10.75 11.6664 10.75H5.83301C5.41879 10.75 5.08301 10.4142 5.08301 10Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.08301 13.333C5.08301 12.9188 5.41879 12.583 5.83301 12.583H13.333C13.7472 12.583 14.083 12.9188 14.083 13.333C14.083 13.7472 13.7472 14.083 13.333 14.083H5.83301C5.41879 14.083 5.08301 13.7472 5.08301 13.333Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18.8637 8.21967C19.1566 8.51256 19.1566 8.98744 18.8637 9.28033L16.7803 11.3637C16.4874 11.6566 16.0126 11.6566 15.7197 11.3637L14.4697 10.1137C14.1768 9.82077 14.1768 9.3459 14.4697 9.053C14.7626 8.76011 15.2374 8.76011 15.5303 9.053L16.25 9.77267L17.803 8.21967C18.0959 7.92678 18.5708 7.92678 18.8637 8.21967Z"
                                fill="#808080" />
                        </svg>

                        <span class="proxima_nova_semibold">Attendance</span>
                        <!-- <span class="arrow"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 16 16" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.1196 5.26322C12.7686 4.91226 12.1996 4.91226 11.8487 5.26322L7.69116 9.42074L3.53365 5.26322C3.18269 4.91226 2.61367 4.91226 2.26272 5.26322C1.91176 5.61418 1.91176 6.18319 2.26272 6.53415L7.05569 11.3271C7.40665 11.6781 7.97566 11.6781 8.32662 11.3271L13.1196 6.53415C13.4706 6.18319 13.4706 5.61418 13.1196 5.26322Z"
                                    fill="#808080" />
                            </svg></span> -->
                    </a>
                    <!-- <div class="menu-dropdown collapse sidebar-layout" id="sidebarLayouts" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('attendance') }}"
                                    class="{{ Request::is('attendance') ? 'hr_sub_active' : '' }} nav-link proxima_nova_semibold">Attendance</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('review_fines') }}" class="{{ Request::is('attendance/review_fines') ? 'hr_sub_active' : '' }} nav-link proxima_nova_semibold">View
                                    Fines</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('review_overtime') }}" class="{{ Request::is('attendance/review_overtime') ? 'hr_sub_active' : '' }} nav-link proxima_nova_semibold">View Overtime</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('attendance_punches') }}"
                                    class="{{ Request::is('attendance/attendance_punches') ? 'hr_sub_active' : '' }} nav-link proxima_nova_semibold">View
                                    Punches</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('attendance_leave') }}"
                                    class="{{ Request::is('attendance/attendance_leave') ? 'hr_sub_active' : '' }} nav-link proxima_nova_semibold">Leave
                                    Management</a>
                            </li>
                            <li class="nav-item">
                                <a href="detached.html"
                                   class="nav-link proxima_nova_semibold create-data dropdown-toggle proxima_nova_bold"
                                   data-bs-toggle="offcanvas" data-bs-target="#daily-toggle-right"
                                   aria-controls="daily-toggle-right">Daily Report</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('attendance_settings') }}"
                                    class="{{ Request::is('attendance/attendance_settings') ? 'hr_sub_active' : '' }} nav-link proxima_nova_semibold">Settings</a>
                            </li>
                        </ul>
                    </div> -->
                </li>
                <li class="nav_menu">
                    <a href="{{route('report')}}" class="{{ Request::is('report*') ? 'hr_active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M2.58301 5C2.58301 3.20507 4.03808 1.75 5.83301 1.75H12.2975C13.1594 1.75 13.9861 2.09241 14.5956 2.7019L16.4644 4.57077C17.0739 5.18026 17.4163 6.00691 17.4163 6.86887V15C17.4163 16.7949 15.9613 18.25 14.1663 18.25H5.83301C4.03808 18.25 2.58301 16.7949 2.58301 15V5ZM5.83301 3.25C4.86651 3.25 4.08301 4.0335 4.08301 5V15C4.08301 15.9665 4.86651 16.75 5.83301 16.75H14.1663C15.1328 16.75 15.9163 15.9665 15.9163 15V6.86887C15.9163 6.40474 15.732 5.95962 15.4038 5.63143L13.5349 3.76256C13.2067 3.43437 12.7616 3.25 12.2975 3.25H5.83301Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.083 1.75C12.4972 1.75 12.833 2.08579 12.833 2.5V5.41667C12.833 5.92293 13.2434 6.33333 13.7497 6.33333H16.6663C17.0806 6.33333 17.4163 6.66912 17.4163 7.08333C17.4163 7.49755 17.0806 7.83333 16.6663 7.83333H13.7497C12.415 7.83333 11.333 6.75136 11.333 5.41667V2.5C11.333 2.08579 11.6688 1.75 12.083 1.75Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.91602 13.75C5.91602 13.3358 6.2518 13 6.66602 13H13.3327C13.7469 13 14.0827 13.3358 14.0827 13.75C14.0827 14.1642 13.7469 14.5 13.3327 14.5H6.66602C6.2518 14.5 5.91602 14.1642 5.91602 13.75Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.91602 10.833C5.91602 10.4188 6.2518 10.083 6.66602 10.083H13.3327C13.7469 10.083 14.0827 10.4188 14.0827 10.833C14.0827 11.2472 13.7469 11.583 13.3327 11.583H6.66602C6.2518 11.583 5.91602 11.2472 5.91602 10.833Z"
                                fill="#808080" />
                        </svg>
                        <span class="proxima_nova_semibold">Reports</span>
                    </a>
                </li>
                <!-- <li class="nav_menu">
                    <a href="products.html">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.1758 2.4765C12.1757 2.47653 12.1759 2.47647 12.1758 2.4765L5.21577 5.10454C5.21571 5.10456 5.21583 5.10452 5.21577 5.10454C4.53511 5.36184 4.08398 6.0142 4.08398 6.74213V9.9213C4.08398 10.3355 3.7482 10.6713 3.33398 10.6713C2.91977 10.6713 2.58398 10.3355 2.58398 9.9213V6.74213C2.58398 5.39012 3.4213 4.17913 4.68553 3.70138L11.6466 1.07298C13.2272 0.477673 14.9173 1.64398 14.9173 3.33463V6.1263C14.9173 6.54051 14.5815 6.8763 14.1673 6.8763C13.7531 6.8763 13.4173 6.54051 13.4173 6.1263V3.33463C13.4173 2.6937 12.7768 2.25036 12.1758 2.4765Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M2.58398 7.79264C2.58398 6.4576 3.6656 5.37598 5.00065 5.37598H15.0007C16.7957 5.37598 18.2507 6.83093 18.2507 8.62598V15.0001C18.2507 16.7894 16.7899 18.2501 15.0007 18.2501H8.88565C8.47144 18.2501 8.13565 17.9144 8.13565 17.5001C8.13565 17.0859 8.47144 16.7501 8.88565 16.7501H15.0007C15.9614 16.7501 16.7507 15.9609 16.7507 15.0001V8.62598C16.7507 7.65936 15.9673 6.87598 15.0007 6.87598H5.00065C4.49403 6.87598 4.08398 7.28602 4.08398 7.79264V10.2143C4.08398 10.6285 3.7482 10.9643 3.33398 10.9643C2.91977 10.9643 2.58398 10.6285 2.58398 10.2143V7.79264Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6.25033 9.91699C4.13371 9.91699 2.41699 11.6337 2.41699 13.7503C2.41699 15.8669 4.13371 17.5837 6.25033 17.5837C8.36769 17.5837 10.0837 15.867 10.0837 13.7503C10.0837 11.6336 8.36769 9.91699 6.25033 9.91699ZM6.25033 19.0837C9.19629 19.0837 11.5837 16.6953 11.5837 13.7503C11.5837 10.8054 9.19629 8.41699 6.25033 8.41699C3.30528 8.41699 0.916992 10.8053 0.916992 13.7503C0.916992 16.6954 3.30528 19.0837 6.25033 19.0837Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.81753 12.2011C9.11042 12.494 9.11042 12.9689 8.81753 13.2618L6.27086 15.8084C6.13016 15.9491 5.93931 16.0282 5.74033 16.0281C5.54135 16.0281 5.35054 15.9489 5.20991 15.8082L3.68325 14.2798C3.39051 13.9868 3.39077 13.5119 3.68383 13.2192C3.97688 12.9264 4.45175 12.9267 4.74449 13.2197L5.74082 14.2172L7.75687 12.2011C8.04976 11.9082 8.52464 11.9082 8.81753 12.2011Z"
                                fill="#808080" />
                        </svg>
                        <span class="proxima_nova_semibold">Payroll</span>
                    </a>
                </li> -->
                <li class="nav_menu">
                    <a href="{{route('setting')}}" class="{{ Request::is('setting*') ? 'hr_active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path
                                d="M12.6 18.2002C12.2 18.2002 11.8 18.1002 11.5 17.8002L10.6 17.0002C10.3 16.7002 9.7 16.7002 9.4 17.0002L8.5 17.8002C8 18.2002 7.3 18.3002 6.7 18.1002L5.8 17.7002C5.2 17.4002 4.9 16.8002 4.9 16.2002L5 15.0002C5 14.5002 4.7 14.1002 4.2 14.0002L3 13.8002C2.4 13.7002 1.8 13.2002 1.7 12.6002L1.5 11.7002C1.5 11.0002 1.7 10.3002 2.3 10.0002L3.3 9.3002C3.6 9.0002 3.7 8.5002 3.5 8.1002L2.9 7.10019C2.6 6.5002 2.6 5.8002 3 5.3002L3.6 4.6002C4 4.0002 4.7 3.8002 5.3 4.0002L6.5 4.4002C7 4.5002 7.5 4.3002 7.6 3.9002L8 2.7002C8.2 2.1002 8.8 1.7002 9.5 1.7002H10.5C11.2 1.7002 11.7 2.1002 12 2.7002L12.4 3.8002C12.6 4.2002 13.1 4.5002 13.5 4.3002L14.6 4.0002C15.2 3.8002 15.9 4.0002 16.3 4.5002L16.9 5.2002C17.3 5.7002 17.4 6.4002 17 7.0002L16.4 8.0002C16.2 8.4002 16.3 8.9002 16.7 9.2002L17.7 9.9002C18.2 10.3002 18.5 10.9002 18.3 11.6002L18.1 12.5002C18 13.1002 17.4 13.6002 16.8 13.7002L15.7 14.0002C15.2 14.1002 14.9 14.5002 14.9 15.0002L15 16.2002C15 16.9002 14.7 17.5002 14.1 17.7002L13.2 18.1002C13 18.2002 12.8 18.2002 12.6 18.2002ZM4.9 5.4002L4.2 6.2002L4.8 7.3002C5.4 8.4002 5.1 9.8002 4.1 10.5002L3.1 11.2002L3.3 12.2002L3.4 12.3002L4.6 12.5002C5.8 12.7002 6.7 13.8002 6.6 15.1002L6.5 16.3002L7.4 16.8002L8.4 16.0002C9.3 15.1002 10.8 15.1002 11.7 16.0002L12.6 16.8002L13.6 16.4002V15.1002C13.5 13.9002 14.4 12.7002 15.6 12.5002L16.8 12.3002L17.1 11.3002L16.1 10.5002C15.1 9.8002 14.7 8.4002 15.4 7.3002L16 6.3002L15.4 5.5002L14.2 5.8002C13 6.2002 11.7 5.5002 11.2 4.4002L10.8 3.3002L9.8 3.2002L9 4.4002C8.5 5.6002 7.2 6.2002 6 5.8002L4.9 5.4002Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M11.1 8.9C10.5 8.3 9.60002 8.3 9.00002 8.9C8.40002 9.5 8.40002 10.4 9.00002 11C9.60002 11.6 10.5 11.6 11.1 11C11.7 10.5 11.7 9.5 11.1 8.9ZM12.1 7.9C11 6.7 9.00002 6.7 7.90002 7.9C6.80002 9.1 6.70002 11 7.90002 12.2C9.10002 13.4 11 13.4 12.2 12.2C13.3 11 13.3 9 12.1 7.9Z"
                                fill="#808080" />
                        </svg>
                        <span class="proxima_nova_semibold">Settings</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar-menu  -->
    </div>

</nav>