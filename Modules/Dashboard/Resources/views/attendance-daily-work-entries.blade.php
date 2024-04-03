@extends('admin.layout.main')
@section('title')
    <title>{{env('APP_NAME')}} | Daily Work Entries</title>
@endsection
@section('header-page')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6 top-header-sub">
                <div class="breadcrumbs-area clearfix">
                    <div class="breadcrumbs-sub">
                        <a href="{{route('dashboard')}}"><img src="{{asset('assets/admin/images/header/back.svg')}}" alt=""></a>
                        <h4 class="page-title pull-left proxima_nova_semibold">Daily Work Entries
                        </h4>
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li class="section_sub_title"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="section_sub_title">/  Attendance</li>
                        <li class="section_sub_title">/  Daily Work Entries</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <row>
        <div class="approve-datas">
            <div class="approve-data-search col-md-6 col-sm-6">
                <form action="" method="">
                    <input class="input-search-rounded" type="text" id="staff_data_find"
                           placeholder="Search">
                </form>
            </div>

            <div class="approve-right-data col-md-6 col-sm-6">

                <div class="approve-data-download  dropdown-toggle proxima_nova_bold"
                     data-bs-toggle="offcanvas" data-bs-target="#download-toggle-right"
                     aria-controls="download-toggle-right">
                    <a href="javascript:void(0)"> <img
                                src="{{asset('assets/admin/images/approve_punches/download-report.svg')}}" alt=""></a>
                </div>

                <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1"
                     id="download-toggle-right" data-bs-scroll="true" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <div class="popup-close-btns" data-bs-dismiss="offcanvas" aria-label="Close"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M2.84154 2.84056C3.07296 2.60914 3.44817 2.60914 3.67959 2.84056L13.1611 12.322C13.3925 12.5535 13.3925 12.9287 13.1611 13.1601C12.9296 13.3915 12.5544 13.3915 12.323 13.1601L2.84154 3.67861C2.61011 3.44719 2.61011 3.07198 2.84154 2.84056Z"
                                      fill="#808080" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M13.1611 2.84056C13.3925 3.07198 13.3925 3.44719 13.1611 3.67861L3.67959 13.1601C3.44817 13.3915 3.07296 13.3915 2.84154 13.1601C2.61011 12.9287 2.61011 12.5535 2.84154 12.322L12.323 2.84056C12.5544 2.60914 12.9296 2.60914 13.1611 2.84056Z"
                                      fill="#808080" />
                            </svg></div>
                    </div>
                    <div class="daily_work_entry_inner">
                        <h5 class="section_title_heading proxima_nova_bold download-work-main-header">Daily Work
                            Entry</h5>
                        <hr>                    
                        <div class="daily-work-select">
                            <div class="daily-work-date">
                                <input type="radio" id="single_Date" name="dateType" value="Date" checked />
                                <label for="Date" class="single-date-work section_sub_title">Single Date</label>
                            </div>

                            <div class="daily-work-range">
                                <input type="radio" id="Date_Range" name="dateType" value="Range" />
                                <label for="Range" class="single-date-work section_sub_title">Date Range</label>
                            </div>
                        </div>
                        <div class="selected-data-show" id="singleDatePicker">
                            <h3 class="picker-title section_sub_title">Select Date</h3>
                            <div class="single-date-picker date" data-provide="datepicker">
                                <input type="text" class="form-control single-picker section_sub_title">
                                <div class="input-group-addon select-calender-img">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 18 18" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.9996 0.850098C12.3586 0.850098 12.6496 1.14111 12.6496 1.5001V4.5001C12.6496 4.85908 12.3586 5.1501 11.9996 5.1501C11.6406 5.1501 11.3496 4.85908 11.3496 4.5001V1.5001C11.3496 1.14111 11.6406 0.850098 11.9996 0.850098Z"
                                            fill="#808080" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5.99961 0.850098C6.35859 0.850098 6.64961 1.14111 6.64961 1.5001V4.5001C6.64961 4.85908 6.35859 5.1501 5.99961 5.1501C5.64062 5.1501 5.34961 4.85908 5.34961 4.5001V1.5001C5.34961 1.14111 5.64062 0.850098 5.99961 0.850098Z"
                                            fill="#808080" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M1.59961 6.7501C1.59961 6.39111 1.89062 6.1001 2.24961 6.1001H15.7496C16.1086 6.1001 16.3996 6.39111 16.3996 6.7501C16.3996 7.10908 16.1086 7.4001 15.7496 7.4001H2.24961C1.89062 7.4001 1.59961 7.10908 1.59961 6.7501Z"
                                            fill="#808080" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M1.59961 4.5001C1.59961 3.31236 2.56187 2.3501 3.74961 2.3501H14.2496C15.4373 2.3501 16.3996 3.31236 16.3996 4.5001V14.2501C16.3996 15.4378 15.4373 16.4001 14.2496 16.4001H3.74961C2.56187 16.4001 1.59961 15.4378 1.59961 14.2501V4.5001ZM3.74961 3.6501C3.27984 3.6501 2.89961 4.03033 2.89961 4.5001V14.2501C2.89961 14.7199 3.27984 15.1001 3.74961 15.1001H14.2496C14.7194 15.1001 15.0996 14.7199 15.0996 14.2501V4.5001C15.0996 4.03033 14.7194 3.6501 14.2496 3.6501H3.74961Z"
                                            fill="#808080" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12 9.83986C11.9979 9.37388 12.376 9 12.8368 9C13.2983 9 13.675 9.37333 13.675 9.8375C13.675 10.3 13.3 10.675 12.8375 10.675C12.3758 10.675 12.0013 10.3013 12 9.83986Z"
                                            fill="#808080" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.00001 9.83986C7.99791 9.37388 8.37596 9 8.83676 9C9.2983 9 9.67501 9.37333 9.67501 9.8375C9.67501 10.3 9.29999 10.675 8.83751 10.675C8.37581 10.675 8.00128 10.3013 8.00001 9.83986Z"
                                            fill="#808080" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4.42384 12.8403C4.42174 12.3744 4.79979 12.0005 5.26058 12.0005C5.72213 12.0005 6.09883 12.3738 6.09883 12.838C6.09883 13.3005 5.72382 13.6755 5.26133 13.6755C4.79963 13.6755 4.42511 13.3017 4.42384 12.8403Z"
                                            fill="#808080" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.00001 12.8399C7.99791 12.3739 8.37596 12 8.83676 12C9.2983 12 9.67501 12.3733 9.67501 12.8375C9.67501 13.3 9.29999 13.675 8.83751 13.675C8.37581 13.675 8.00128 13.3013 8.00001 12.8399Z"
                                            fill="#808080" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="selected-data-show" id="dateRangePicker">
                            <div>
                                <h3 class="picker-title section_sub_title">From (Date)</h3>
                                <div class="single-date-picker from-date-picker date" data-provide="datepicker">
                                    <input type="text" class="form-control single-picker section_sub_title">
                                    <div class="input-group-addon select-calender-img">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 18 18" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.9996 0.850098C12.3586 0.850098 12.6496 1.14111 12.6496 1.5001V4.5001C12.6496 4.85908 12.3586 5.1501 11.9996 5.1501C11.6406 5.1501 11.3496 4.85908 11.3496 4.5001V1.5001C11.3496 1.14111 11.6406 0.850098 11.9996 0.850098Z"
                                                fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.99961 0.850098C6.35859 0.850098 6.64961 1.14111 6.64961 1.5001V4.5001C6.64961 4.85908 6.35859 5.1501 5.99961 5.1501C5.64062 5.1501 5.34961 4.85908 5.34961 4.5001V1.5001C5.34961 1.14111 5.64062 0.850098 5.99961 0.850098Z"
                                                fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1.59961 6.7501C1.59961 6.39111 1.89062 6.1001 2.24961 6.1001H15.7496C16.1086 6.1001 16.3996 6.39111 16.3996 6.7501C16.3996 7.10908 16.1086 7.4001 15.7496 7.4001H2.24961C1.89062 7.4001 1.59961 7.10908 1.59961 6.7501Z"
                                                fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1.59961 4.5001C1.59961 3.31236 2.56187 2.3501 3.74961 2.3501H14.2496C15.4373 2.3501 16.3996 3.31236 16.3996 4.5001V14.2501C16.3996 15.4378 15.4373 16.4001 14.2496 16.4001H3.74961C2.56187 16.4001 1.59961 15.4378 1.59961 14.2501V4.5001ZM3.74961 3.6501C3.27984 3.6501 2.89961 4.03033 2.89961 4.5001V14.2501C2.89961 14.7199 3.27984 15.1001 3.74961 15.1001H14.2496C14.7194 15.1001 15.0996 14.7199 15.0996 14.2501V4.5001C15.0996 4.03033 14.7194 3.6501 14.2496 3.6501H3.74961Z"
                                                fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 9.83986C11.9979 9.37388 12.376 9 12.8368 9C13.2983 9 13.675 9.37333 13.675 9.8375C13.675 10.3 13.3 10.675 12.8375 10.675C12.3758 10.675 12.0013 10.3013 12 9.83986Z"
                                                fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.00001 9.83986C7.99791 9.37388 8.37596 9 8.83676 9C9.2983 9 9.67501 9.37333 9.67501 9.8375C9.67501 10.3 9.29999 10.675 8.83751 10.675C8.37581 10.675 8.00128 10.3013 8.00001 9.83986Z"
                                                fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M4.42384 12.8403C4.42174 12.3744 4.79979 12.0005 5.26058 12.0005C5.72213 12.0005 6.09883 12.3738 6.09883 12.838C6.09883 13.3005 5.72382 13.6755 5.26133 13.6755C4.79963 13.6755 4.42511 13.3017 4.42384 12.8403Z"
                                                fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.00001 12.8399C7.99791 12.3739 8.37596 12 8.83676 12C9.2983 12 9.67501 12.3733 9.67501 12.8375C9.67501 13.3 9.29999 13.675 8.83751 13.675C8.37581 13.675 8.00128 13.3013 8.00001 12.8399Z"
                                                fill="#808080" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="date-range-to-date">
                                <h3 class="picker-title section_sub_title">To (Date)</h3>
                                <div class="single-date-picker to-date-picker date" data-provide="datepicker">
                                    <input type="text" class="form-control single-picker section_sub_title">
                                    <div class="input-group-addon select-calender-img">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 18 18" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.9996 0.850098C12.3586 0.850098 12.6496 1.14111 12.6496 1.5001V4.5001C12.6496 4.85908 12.3586 5.1501 11.9996 5.1501C11.6406 5.1501 11.3496 4.85908 11.3496 4.5001V1.5001C11.3496 1.14111 11.6406 0.850098 11.9996 0.850098Z"
                                                fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.99961 0.850098C6.35859 0.850098 6.64961 1.14111 6.64961 1.5001V4.5001C6.64961 4.85908 6.35859 5.1501 5.99961 5.1501C5.64062 5.1501 5.34961 4.85908 5.34961 4.5001V1.5001C5.34961 1.14111 5.64062 0.850098 5.99961 0.850098Z"
                                                fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1.59961 6.7501C1.59961 6.39111 1.89062 6.1001 2.24961 6.1001H15.7496C16.1086 6.1001 16.3996 6.39111 16.3996 6.7501C16.3996 7.10908 16.1086 7.4001 15.7496 7.4001H2.24961C1.89062 7.4001 1.59961 7.10908 1.59961 6.7501Z"
                                                fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1.59961 4.5001C1.59961 3.31236 2.56187 2.3501 3.74961 2.3501H14.2496C15.4373 2.3501 16.3996 3.31236 16.3996 4.5001V14.2501C16.3996 15.4378 15.4373 16.4001 14.2496 16.4001H3.74961C2.56187 16.4001 1.59961 15.4378 1.59961 14.2501V4.5001ZM3.74961 3.6501C3.27984 3.6501 2.89961 4.03033 2.89961 4.5001V14.2501C2.89961 14.7199 3.27984 15.1001 3.74961 15.1001H14.2496C14.7194 15.1001 15.0996 14.7199 15.0996 14.2501V4.5001C15.0996 4.03033 14.7194 3.6501 14.2496 3.6501H3.74961Z"
                                                fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 9.83986C11.9979 9.37388 12.376 9 12.8368 9C13.2983 9 13.675 9.37333 13.675 9.8375C13.675 10.3 13.3 10.675 12.8375 10.675C12.3758 10.675 12.0013 10.3013 12 9.83986Z"
                                                fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.00001 9.83986C7.99791 9.37388 8.37596 9 8.83676 9C9.2983 9 9.67501 9.37333 9.67501 9.8375C9.67501 10.3 9.29999 10.675 8.83751 10.675C8.37581 10.675 8.00128 10.3013 8.00001 9.83986Z"
                                                fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M4.42384 12.8403C4.42174 12.3744 4.79979 12.0005 5.26058 12.0005C5.72213 12.0005 6.09883 12.3738 6.09883 12.838C6.09883 13.3005 5.72382 13.6755 5.26133 13.6755C4.79963 13.6755 4.42511 13.3017 4.42384 12.8403Z"
                                                fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.00001 12.8399C7.99791 12.3739 8.37596 12 8.83676 12C9.2983 12 9.67501 12.3733 9.67501 12.8375C9.67501 13.3 9.29999 13.675 8.83751 13.675C8.37581 13.675 8.00128 13.3013 8.00001 12.8399Z"
                                                fill="#808080" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="download-cancel-btns-main">
                        <div class="download-cancel-btn">
                            <button name="" class="download-btn proxima_nova_semibold">Download</button>
                            <button name="" class="cancel-btn-btn proxima_nova_semibold">Cancel</button>
                        </div>
                    </div>
                </div>

                <div class="input-group date" data-provide="datepicker">
                    <input type="text" class="form-control proxima_nova_semibold calender-picker input-group-addon calender-img" readonly='true'>
                    <!-- <div class="input-group-addon calender-img">
                        <img src="{{asset('assets/admin/images/approve_punches/calender.svg')}}" alt="">
                    </div> -->
                </div>
            </div>

        </div>
    </row>
    <div class="approve_staff_data">
        <table id="staff_datas" class="display" style="width:100%">
            <thead>
            <tr>
                <th></th>
                <th>Staff Name</th>
                <th>Work Name</th>
                <th>Units, Amount.etc</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td>
                                    <div class="tab-data-show"></div>
                                </td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/ic-user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Jay Shah<p class="data-sub-field">Node.js Developer</p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="atten-work-row">
                        <p class="atten-work-title">Saree Stitching</p>
                        <p class="atten-work-title-multi">Saree Stitching</p>
                    </div>
                </td>
                <td>
                    <div class="atten-work-row">
                        <p class="atten-work-title">100</p>
                        <p class="atten-work-title-multi">200</p>
                    </div>
                </td>
                <td>
                    <div class="atten-work-row">
                        <p class="atten-work-title">Saree is stitched today before..</p>
                        <p class="atten-work-title-multi">Embroidery work for today is..</p>
                    </div>
                </td>
                <td>
                    <div class="atten-daily-work-btn">
                        <div class="atten-multi-btn atten-work-row">
                            <div class="create-data copy_icon dropdown-toggle proxima_nova_bold"
                                 data-bs-toggle="offcanvas" data-bs-target="#create-toggle-right"
                                 aria-controls="create-toggle-right">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                     viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M3.33333 13.9998H9.33333C10.07 13.9998 10.6667 13.4031 10.6667 12.6664V5.52376C10.6667 4.7871 10.07 4.19043 9.33333 4.19043H3.33333C2.59667 4.19043 2 4.7871 2 5.52376V12.6664C2 13.4031 2.59667 13.9998 3.33333 13.9998Z"
                                          stroke="#808080" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round" />
                                    <path d="M5 9.0931H7.66667" stroke="#808080" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.33333 7.75977V10.4264" stroke="#808080"
                                          stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round" />
                                    <path
                                            d="M5.33398 4.19067V3.33333C5.33398 2.59667 5.93065 2 6.66732 2H12.6673C13.404 2 14.0007 2.59667 14.0007 3.33333V10.6667C14.0007 11.4033 13.404 12 12.6673 12H10.6673"
                                            stroke="#808080" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="create-data copy_icon dropdown-toggle proxima_nova_bold atten-work-title-multi"
                                 data-bs-toggle="offcanvas" data-bs-target="#create-toggle-right"
                                 aria-controls="create-toggle-right">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                     viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M3.33333 13.9998H9.33333C10.07 13.9998 10.6667 13.4031 10.6667 12.6664V5.52376C10.6667 4.7871 10.07 4.19043 9.33333 4.19043H3.33333C2.59667 4.19043 2 4.7871 2 5.52376V12.6664C2 13.4031 2.59667 13.9998 3.33333 13.9998Z"
                                          stroke="#808080" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round" />
                                    <path d="M5 9.0931H7.66667" stroke="#808080" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.33333 7.75977V10.4264" stroke="#808080"
                                          stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round" />
                                    <path
                                            d="M5.33398 4.19067V3.33333C5.33398 2.59667 5.93065 2 6.66732 2H12.6673C13.404 2 14.0007 2.59667 14.0007 3.33333V10.6667C14.0007 11.4033 13.404 12 12.6673 12H10.6673"
                                            stroke="#808080" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>

                        <div class="atten-multi-btn ">
                            <div class="create-data edit_icon dropdown-toggle proxima_nova_bold"
                                 data-bs-toggle="offcanvas" data-bs-target="#edit-toggle-right"
                                 aria-controls="edit-toggle-right">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
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

                            <div class="create-data edit_icon  dropdown-toggle proxima_nova_bold atten-work-title-multi"
                                 data-bs-toggle="offcanvas" data-bs-target="#edit-toggle-right"
                                 aria-controls="edit-toggle-right">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
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
                        </div>

                        <div class="atten-multi-btn ">
                            <div class="delete_icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                     viewBox="0 0 16 16" fill="none">
                                    <path
                                            d="M12 4V12.5C12 13.3287 11.3153 14 10.4873 14H5.48733C4.65867 14 4 13.3287 4 12.5V4"
                                            stroke="#808080" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    <path d="M13 3.99984H3" stroke="#808080" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.66602 1.99984H9.33268" stroke="#808080"
                                          stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round" />
                                    <path d="M9.33333 6.6665V11.3332" stroke="#808080"
                                          stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round" />
                                    <path d="M6.66732 11.3332V6.6665" stroke="#808080"
                                          stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="delete_icon atten-work-title-multi">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                     viewBox="0 0 16 16" fill="none">
                                    <path
                                            d="M12 4V12.5C12 13.3287 11.3153 14 10.4873 14H5.48733C4.65867 14 4 13.3287 4 12.5V4"
                                            stroke="#808080" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    <path d="M13 3.99984H3" stroke="#808080" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.66602 1.99984H9.33268" stroke="#808080"
                                          stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round" />
                                    <path d="M9.33333 6.6665V11.3332" stroke="#808080"
                                          stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round" />
                                    <path d="M6.66732 11.3332V6.6665" stroke="#808080"
                                          stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="dtr-hidden" style="display: none;">6222</td>
            </tr>

            <tr>
                <td>
                    <div class="tab-data-show"></div>
                </td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Piyush Kheni<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td><span class="no_entries_txt">No Entries Available</span></td>
                <td></td>

                <td></td>
                <td>
                    <div class="approve-main-sec">
                        <div class="atten-multi-btn ">
                            <div class="create-data copy_icon dropdown-toggle proxima_nova_bold"
                                 data-bs-toggle="offcanvas" data-bs-target="#create-toggle-right"
                                 aria-controls="create-toggle-right">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                     viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M3.33333 13.9998H9.33333C10.07 13.9998 10.6667 13.4031 10.6667 12.6664V5.52376C10.6667 4.7871 10.07 4.19043 9.33333 4.19043H3.33333C2.59667 4.19043 2 4.7871 2 5.52376V12.6664C2 13.4031 2.59667 13.9998 3.33333 13.9998Z"
                                          stroke="#808080" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round" />
                                    <path d="M5 9.0931H7.66667" stroke="#808080" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.33333 7.75977V10.4264" stroke="#808080"
                                          stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round" />
                                    <path
                                            d="M5.33398 4.19067V3.33333C5.33398 2.59667 5.93065 2 6.66732 2H12.6673C13.404 2 14.0007 2.59667 14.0007 3.33333V10.6667C14.0007 11.4033 13.404 12 12.6673 12H10.6673"
                                            stroke="#808080" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
            <td>
                    <div class="tab-data-show"></div>
                </td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>Saree Dyeing</td>
                <td>240</td>

                <td>All sarees are dyed today at...</td>
                <td>
                    <div class="approve-main-sec">
                        <div class="create-data copy_icon  dropdown-toggle proxima_nova_bold"
                             data-bs-toggle="offcanvas" data-bs-target="#create-toggle-right"
                             aria-controls="create-toggle-right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                 viewBox="0 0 16 16" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M3.33333 13.9998H9.33333C10.07 13.9998 10.6667 13.4031 10.6667 12.6664V5.52376C10.6667 4.7871 10.07 4.19043 9.33333 4.19043H3.33333C2.59667 4.19043 2 4.7871 2 5.52376V12.6664C2 13.4031 2.59667 13.9998 3.33333 13.9998Z"
                                      stroke="#808080" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round" />
                                <path d="M5 9.0931H7.66667" stroke="#808080" stroke-width="1.5"
                                      stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M6.33333 7.75977V10.4264" stroke="#808080" stroke-width="1.5"
                                      stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                        d="M5.33398 4.19067V3.33333C5.33398 2.59667 5.93065 2 6.66732 2H12.6673C13.404 2 14.0007 2.59667 14.0007 3.33333V10.6667C14.0007 11.4033 13.404 12 12.6673 12H10.6673"
                                        stroke="#808080" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="create-data edit_icon  dropdown-toggle proxima_nova_bold"
                             data-bs-toggle="offcanvas" data-bs-target="#edit-toggle-right"
                             aria-controls="edit-toggle-right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
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
                        <div class="delete_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                             viewBox="0 0 16 16" fill="none">
                            <path
                                    d="M12 4V12.5C12 13.3287 11.3153 14 10.4873 14H5.48733C4.65867 14 4 13.3287 4 12.5V4"
                                    stroke="#808080" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            <path d="M13 3.99984H3" stroke="#808080" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6.66602 1.99984H9.33268" stroke="#808080" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9.33333 6.6665V11.3332" stroke="#808080" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6.66732 11.3332V6.6665" stroke="#808080" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
            <td>
                    <div class="tab-data-show"></div>
                </td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Dhruvi Gajera<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>Embroidery Work</td>
                <td>120</td>

                <td>Embroidery work is completed...</td>
                <td>
                    <div class="approve-main-sec">
                        <div class="create-data copy_icon dropdown-toggle proxima_nova_bold"
                             data-bs-toggle="offcanvas" data-bs-target="#create-toggle-right"
                             aria-controls="create-toggle-right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                 viewBox="0 0 16 16" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M3.33333 13.9998H9.33333C10.07 13.9998 10.6667 13.4031 10.6667 12.6664V5.52376C10.6667 4.7871 10.07 4.19043 9.33333 4.19043H3.33333C2.59667 4.19043 2 4.7871 2 5.52376V12.6664C2 13.4031 2.59667 13.9998 3.33333 13.9998Z"
                                      stroke="#808080" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round" />
                                <path d="M5 9.0931H7.66667" stroke="#808080" stroke-width="1.5"
                                      stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M6.33333 7.75977V10.4264" stroke="#808080" stroke-width="1.5"
                                      stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                        d="M5.33398 4.19067V3.33333C5.33398 2.59667 5.93065 2 6.66732 2H12.6673C13.404 2 14.0007 2.59667 14.0007 3.33333V10.6667C14.0007 11.4033 13.404 12 12.6673 12H10.6673"
                                        stroke="#808080" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="create-data edit_icon dropdown-toggle proxima_nova_bold"
                             data-bs-toggle="offcanvas" data-bs-target="#edit-toggle-right"
                             aria-controls="edit-toggle-right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
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
                        <div class="delete_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                             viewBox="0 0 16 16" fill="none">
                            <path
                                    d="M12 4V12.5C12 13.3287 11.3153 14 10.4873 14H5.48733C4.65867 14 4 13.3287 4 12.5V4"
                                    stroke="#808080" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            <path d="M13 3.99984H3" stroke="#808080" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6.66602 1.99984H9.33268" stroke="#808080" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9.33333 6.6665V11.3332" stroke="#808080" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6.66732 11.3332V6.6665" stroke="#808080" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        </div>
                    </div>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
    <!-- edit work entries -->
    <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="edit-toggle-right"
         data-bs-scroll="true" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <div class="popup-close-btns" data-bs-dismiss="offcanvas" aria-label="Close"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                        fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M2.84154 2.84056C3.07296 2.60914 3.44817 2.60914 3.67959 2.84056L13.1611 12.322C13.3925 12.5535 13.3925 12.9287 13.1611 13.1601C12.9296 13.3915 12.5544 13.3915 12.323 13.1601L2.84154 3.67861C2.61011 3.44719 2.61011 3.07198 2.84154 2.84056Z"
                          fill="#808080" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M13.1611 2.84056C13.3925 3.07198 13.3925 3.44719 13.1611 3.67861L3.67959 13.1601C3.44817 13.3915 3.07296 13.3915 2.84154 13.1601C2.61011 12.9287 2.61011 12.5535 2.84154 12.322L12.323 2.84056C12.5544 2.60914 12.9296 2.60914 13.1611 2.84056Z"
                          fill="#808080" />
                </svg></div>
        </div>
      
        <h5 class="section_title_heading proxima_nova_bold download-work-main-header">Edit Work Entry</h5>
        <p class="work-create-date">Deep Patel | 27 April, 2023 | Wed</p>
        <hr>
        <form method="">
            <div class="edit_work_entry_inner">
                <div class="daily-work-select">
                    <div class="daily-work-name">
                        <label for="exampleInputPassword1" class="form-label work-label section_sub_title">Work
                            Name</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            placeholder="Enter Work Name">
                    </div>

                    <div class="daily-work-name">
                        <label for="exampleInputPassword1"
                            class="form-label work-label section_sub_title">Units, Amount, Quantity,
                            etc.</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            placeholder="Enter Value">
                    </div>

                    <div class="daily-work-name">
                        <label for="exampleInputPassword1"
                            class="form-label work-label section_sub_title">Description (Optional)</label>
                        <textarea id="description" name="description" class="work-label section_sub_title"
                                rows="4" cols="20" placeholder="Enter Description"></textarea>
                    </div>

                    <div class="work-images upload-image">
                        <div class="upload-image-get">
                            <div class="upload-image-get-inner">
                                <img src="../assets/images/dummy/1.svg" alt="">
                                <p class="upload-image-name section_sub_title">IMG_20230809_170140</p>

                                <div class="btn-group upload-actions">
                                    <div class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <img src="../assets/images/daily_work/dots.svg" alt="">
                                    </div>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item proxima_nova_semibold"
                                        href="javascript:(void);">Download</a>
                                        <a class="dropdown-item proxima_nova_semibold"
                                        href="javascript:(void);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="upload-image-get-inner">
                                <img src="../assets/images/dummy/1.svg" alt="">
                                <p class="upload-image-name section_sub_title">IMG_20230809_170140</p>
                                <div class="btn-group upload-actions">
                                    <div class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <img src="../assets/images/daily_work/dots.svg" alt="">
                                    </div>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item proxima_nova_semibold"
                                        href="javascript:(void);">Download</a>
                                        <a class="dropdown-item proxima_nova_semibold"
                                        href="javascript:(void);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <a href="" class="add-more-img section_sub_title proxima_nova_semibold">+ Add More</a>
                        </div>
                    </div>



                    <div class="add-location-main edit-location-main">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6.57305 9.72921C6.60911 10.003 6.41639 10.2542 6.14261 10.2902C4.99492 10.4413 4.0386 10.7244 3.38505 11.0722C2.69588 11.439 2.5 11.7854 2.5 12.0032C2.5 12.1382 2.56837 12.3213 2.8099 12.5433C3.05185 12.7658 3.42957 12.9892 3.93848 13.1871C4.95312 13.5817 6.38887 13.8365 8 13.8365C9.61113 13.8365 11.0469 13.5817 12.0615 13.1871C12.5704 12.9892 12.9481 12.7658 13.1901 12.5433C13.4316 12.3213 13.5 12.1382 13.5 12.0032C13.5 11.7854 13.3041 11.439 12.6149 11.0722C11.9614 10.7244 11.0051 10.4413 9.85739 10.2902C9.58361 10.2542 9.39089 10.003 9.42695 9.72921C9.463 9.45543 9.71417 9.26272 9.98794 9.29877C11.2096 9.45964 12.2919 9.76755 13.0847 10.1894C13.8419 10.5924 14.5 11.1943 14.5 12.0032C14.5 12.5125 14.2326 12.9432 13.867 13.2795C13.5017 13.6153 13.0008 13.8947 12.424 14.1191C11.2671 14.569 9.70287 14.8365 8 14.8365C6.29713 14.8365 4.73288 14.569 3.57602 14.1191C2.99918 13.8947 2.49827 13.6153 2.13304 13.2795C1.76738 12.9432 1.5 12.5125 1.5 12.0032C1.5 11.1943 2.15812 10.5924 2.91528 10.1894C3.70807 9.76755 4.79041 9.45964 6.01206 9.29877C6.28583 9.26272 6.537 9.45543 6.57305 9.72921Z"
                                fill="#2F8CFF" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.5 5.55859C3.5 3.12194 5.52788 1.16992 8 1.16992C10.4721 1.16992 12.5 3.12194 12.5 5.55859C12.5 6.39837 12.2136 7.22712 11.8171 7.97756C11.4189 8.73107 10.894 9.43509 10.3792 10.034C9.86311 10.6342 9.34856 11.1388 8.96357 11.4931C8.77074 11.6706 8.60957 11.811 8.49586 11.9078C8.43899 11.9562 8.39393 11.9937 8.36265 12.0194C8.347 12.0323 8.3348 12.0422 8.32629 12.0491L8.3163 12.0572L8.31255 12.0602C8.31244 12.0603 8.31203 12.0606 8 11.6699C7.68797 12.0606 7.68787 12.0605 7.68775 12.0604L7.6837 12.0572L7.67371 12.0491C7.6652 12.0422 7.653 12.0323 7.63735 12.0194C7.60607 11.9937 7.56101 11.9562 7.50414 11.9078C7.39043 11.811 7.22926 11.6706 7.03643 11.4931C6.65144 11.1388 6.13689 10.6342 5.62084 10.034C5.10602 9.43509 4.5811 8.73107 4.18293 7.97756C3.78638 7.22712 3.5 6.39837 3.5 5.55859ZM8 11.6699L7.68775 12.0604C7.87024 12.2062 8.12954 12.2064 8.31203 12.0606L8 11.6699ZM8 11.0147C8.0827 10.9422 8.17923 10.8559 8.28643 10.7573C8.65144 10.4214 9.13689 9.94503 9.62084 9.38206C10.106 8.81768 10.5811 8.17615 10.9329 7.51035C11.2864 6.84148 11.5 6.17714 11.5 5.55859C11.5 3.70057 9.94655 2.16992 8 2.16992C6.05345 2.16992 4.5 3.70057 4.5 5.55859C4.5 6.17714 4.71362 6.84148 5.06707 7.51035C5.4189 8.17615 5.89398 8.81768 6.37916 9.38206C6.86311 9.94503 7.34856 10.4214 7.71357 10.7573C7.82077 10.8559 7.9173 10.9422 8 11.0147Z"
                                fill="#2F8CFF" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.59056 5.08099C8.26512 4.75555 7.73748 4.75555 7.41205 5.08099C7.08661 5.40643 7.08661 5.93407 7.41205 6.2595C7.73748 6.58494 8.26512 6.58494 8.59056 6.2595C8.916 5.93407 8.916 5.40643 8.59056 5.08099ZM9.29709 4.37331C8.58109 3.65792 7.42071 3.65811 6.70494 4.37389L6.70494 4.37389C5.98898 5.08985 5.98898 6.25065 6.70494 6.96661C7.4209 7.68257 8.5817 7.68257 9.29767 6.96661C10.0136 6.25065 10.0136 5.08985 9.29767 4.37388C9.29748 4.37369 9.29728 4.3735 9.29709 4.37331Z"
                                fill="#2F8CFF" />
                        </svg>

                        <a class="edit-location proxima_nova_semibold">420, Platinum Point,
                            opp. C.N.G Pu...</a>

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M2.84154 2.84056C3.07296 2.60914 3.44817 2.60914 3.67959 2.84056L13.1611 12.322C13.3925 12.5535 13.3925 12.9287 13.1611 13.1601C12.9296 13.3915 12.5544 13.3915 12.323 13.1601L2.84154 3.67861C2.61011 3.44719 2.61011 3.07198 2.84154 2.84056Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.1611 2.84056C13.3925 3.07198 13.3925 3.44719 13.1611 3.67861L3.67959 13.1601C3.44817 13.3915 3.07296 13.3915 2.84154 13.1601C2.61011 12.9287 2.61011 12.5535 2.84154 12.322L12.323 2.84056C12.5544 2.60914 12.9296 2.60914 13.1611 2.84056Z"
                                fill="#808080" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="download-cancel-btns-main">
                <div class="download-cancel-btn">
                    <button name="" class="download-btn proxima_nova_semibold">Save</button>
                </div>
            </div>
        </form>
    </div>
    <!-- create work entries -->
    <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="create-toggle-right"
         data-bs-scroll="true" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <div class="popup-close-btns" data-bs-dismiss="offcanvas" aria-label="Close"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                        fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M2.84154 2.84056C3.07296 2.60914 3.44817 2.60914 3.67959 2.84056L13.1611 12.322C13.3925 12.5535 13.3925 12.9287 13.1611 13.1601C12.9296 13.3915 12.5544 13.3915 12.323 13.1601L2.84154 3.67861C2.61011 3.44719 2.61011 3.07198 2.84154 2.84056Z"
                          fill="#808080" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M13.1611 2.84056C13.3925 3.07198 13.3925 3.44719 13.1611 3.67861L3.67959 13.1601C3.44817 13.3915 3.07296 13.3915 2.84154 13.1601C2.61011 12.9287 2.61011 12.5535 2.84154 12.322L12.323 2.84056C12.5544 2.60914 12.9296 2.60914 13.1611 2.84056Z"
                          fill="#808080" />
                </svg></div>
        </div>
        <h5 class="section_title_heading proxima_nova_bold download-work-main-header">Add Work Entry</h5>
        <p class="work-create-date">27 April, 2023 | Wed</p>
        <hr>
        <form method="">
            <div class="add_work_entry_form">
                <div class="daily-work-select">
                    <div class="daily-work-name">
                        <label for="exampleInputPassword1" class="form-label work-label section_sub_title">Work
                            Name</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            placeholder="Enter Work Name">
                    </div>

                    <div class="daily-work-name">
                        <label for="exampleInputPassword1"
                            class="form-label work-label section_sub_title">Units, Amount, Quantity,
                            etc.</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            placeholder="Enter Value">
                    </div>

                    <div class="daily-work-name">
                        <label for="exampleInputPassword1"
                            class="form-label work-label section_sub_title">Description (Optional)</label>
                        <textarea id="description" name="description" class="work-label section_sub_title"
                                rows="4" cols="20" placeholder="Enter Description"></textarea>
                    </div>

                    <div class="work-images">
                        <div class="upload-work-images">
                            <div class="upload-images">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                    viewBox="0 0 35 35" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.73828 8.75C4.73828 5.72969 7.18672 3.28125 10.207 3.28125H21.5198C22.9703 3.28125 24.3613 3.85742 25.3868 4.88301L28.6574 8.15353C29.6829 9.17912 30.2591 10.5701 30.2591 12.0205V26.25C30.2591 29.2703 27.8107 31.7188 24.7904 31.7188H10.207C7.18672 31.7188 4.73828 29.2703 4.73828 26.25V8.75ZM10.207 5.46875C8.39485 5.46875 6.92578 6.93782 6.92578 8.75V26.25C6.92578 28.0622 8.39485 29.5312 10.207 29.5312H24.7904C26.6026 29.5312 28.0716 28.0622 28.0716 26.25V12.0205C28.0716 11.1503 27.7259 10.3157 27.1106 9.70032L23.84 6.42981C23.2247 5.81445 22.3901 5.46875 21.5198 5.46875H10.207Z"
                                        fill="#808080" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M21.1445 3.28125C21.7486 3.28125 22.2383 3.77094 22.2383 4.375V9.47917C22.2383 10.4859 23.0544 11.3021 24.0612 11.3021H29.1654C29.7694 11.3021 30.2591 11.7918 30.2591 12.3958C30.2591 12.9999 29.7694 13.4896 29.1654 13.4896H24.0612C21.8463 13.4896 20.0508 11.6941 20.0508 9.47917V4.375C20.0508 3.77094 20.5405 3.28125 21.1445 3.28125Z"
                                        fill="#808080" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16.7266 16.7266C17.1537 16.2995 17.8463 16.2995 18.2734 16.7266L21.5546 20.0079C21.9818 20.435 21.9818 21.1275 21.5546 21.5546C21.1275 21.9818 20.435 21.9818 20.0079 21.5546L17.5 19.0468L14.9921 21.5546C14.565 21.9818 13.8725 21.9818 13.4454 21.5546C13.0182 21.1275 13.0182 20.435 13.4454 20.0079L16.7266 16.7266Z"
                                        fill="#808080" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M17.4902 16.4062C18.0943 16.4062 18.584 16.8959 18.584 17.5V24.7917C18.584 25.3957 18.0943 25.8854 17.4902 25.8854C16.8862 25.8854 16.3965 25.3957 16.3965 24.7917V17.5C16.3965 16.8959 16.8862 16.4062 17.4902 16.4062Z"
                                        fill="#808080" />
                                </svg>
                            </div>

                            <div>
                                <p class="section_sub_title proxima_nova_bold image-dragdrop">
                                    Drag & drop your files or <label for="custom-file-upload"
                                                                    class="file-upload section_sub_title proxima_nova_bold">Select
                                        Files</label>
                                    <input type="file" id="custom-file-upload" multiple
                                        accept=".png, .jpg, .jpeg" class="upload-input custom-file-upload">
                                </p>
                            </div>
                        </div>
                        <!-- <div id="work-images">
                        </div> -->
                    </div>




                    <div class="add-location-main">
                        <a class="add-location section_sub_title proxima_nova_semibold">+ Add Location
                            (Optional)</a>
                    </div>
                </div>
            </div>
            <div class="download-cancel-btns-main">
                <div class="download-cancel-btn">
                    <button name="" class="download-btn proxima_nova_semibold">Save</button>
                </div>
            </div>
        </form>
    </div>
    <div id="myModal" class="modal check-model">
        <div class="model-section">
            <div class="model_left_side">
                <div class="selected_check_member proxima_nova_semibold">
                    1
                </div>
            </div>
            <div class="model_right_side">
                <div class="member_div proxima_nova_semibold">
                    Members
                    Selected
                </div>
                <div class="export_div">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <rect x="2.25" y="2.25" width="13.5" height="13.5" rx="2" stroke="#808080"
                              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.75 2.25V15.75" stroke="#808080" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M15.75 6.75H6.75" stroke="#808080" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M15.75 11.25H6.75" stroke="#808080" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <p>Export</p>
                </div>
                <div class="delete_div">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M5.24805 6.7489C5.24805 6.33469 4.91226 5.9989 4.49805 5.9989C4.08383 5.9989 3.74805 6.33469 3.74805 6.7489H5.24805ZM14.2518 6.7489C14.2518 6.33469 13.916 5.9989 13.5018 5.9989C13.0876 5.9989 12.7518 6.33469 12.7518 6.7489H14.2518ZM11.251 7.49926C11.251 7.08505 10.9152 6.74926 10.501 6.74926C10.0868 6.74926 9.75101 7.08505 9.75101 7.49926H11.251ZM9.75101 12.7514C9.75101 13.1657 10.0868 13.5014 10.501 13.5014C10.9152 13.5014 11.251 13.1657 11.251 12.7514H9.75101ZM8.25016 7.49927C8.25016 7.08505 7.91437 6.74927 7.50016 6.74927C7.08594 6.74927 6.75016 7.08505 6.75016 7.49927H8.25016ZM6.75016 12.7515C6.75016 13.1657 7.08594 13.5015 7.50016 13.5015C7.91437 13.5015 8.25016 13.1657 8.25016 12.7515H6.75016ZM3.37305 3.74801C2.95883 3.74801 2.62305 4.0838 2.62305 4.49801C2.62305 4.91222 2.95883 5.24801 3.37305 5.24801V3.74801ZM14.6277 5.24801C15.0419 5.24801 15.3777 4.91222 15.3777 4.49801C15.3777 4.0838 15.0419 3.74801 14.6277 3.74801V5.24801ZM5.28763 4.26084C5.15664 4.6538 5.36901 5.07854 5.76197 5.20952C6.15493 5.34051 6.57967 5.12814 6.71065 4.73518L5.28763 4.26084ZM6.40731 3.2735L7.11882 3.51067L7.11888 3.5105L6.40731 3.2735ZM7.8314 2.24707L7.83122 2.99707H7.8314V2.24707ZM10.1694 2.24707V2.99707L10.1703 2.99707L10.1694 2.24707ZM11.595 3.2735L12.3067 3.03711L12.3065 3.0365L11.595 3.2735ZM11.2899 4.73439C11.4204 5.1275 11.8449 5.34033 12.238 5.20978C12.6311 5.07923 12.844 4.65472 12.7134 4.26162L11.2899 4.73439ZM3.74805 6.7489V14.252H5.24805V6.7489H3.74805ZM3.74805 14.252C3.74805 15.495 4.75569 16.5027 5.99867 16.5027V15.0027C5.58411 15.0027 5.24805 14.6666 5.24805 14.252H3.74805ZM5.99867 16.5027H12.0012V15.0027H5.99867V16.5027ZM12.0012 16.5027C13.2442 16.5027 14.2518 15.495 14.2518 14.252H12.7518C12.7518 14.6666 12.4157 15.0027 12.0012 15.0027V16.5027ZM14.2518 14.252V6.7489H12.7518V14.252H14.2518ZM9.75101 7.49926V12.7514H11.251V7.49926H9.75101ZM6.75016 7.49927V12.7515H8.25016V7.49927H6.75016ZM3.37305 5.24801H14.6277V3.74801H3.37305V5.24801ZM6.71065 4.73518L7.11882 3.51067L5.6958 3.03633L5.28763 4.26084L6.71065 4.73518ZM7.11888 3.5105C7.22102 3.20384 7.508 2.99699 7.83122 2.99707L7.83158 1.49707C6.86245 1.49684 6.00199 2.11702 5.69574 3.0365L7.11888 3.5105ZM7.8314 2.99707H10.1694V1.49707H7.8314V2.99707ZM10.1703 2.99707C10.4938 2.99667 10.7812 3.20358 10.8834 3.5105L12.3065 3.0365C12 2.11624 11.1384 1.49587 10.1684 1.49707L10.1703 2.99707ZM10.8832 3.50989L11.2899 4.73439L12.7134 4.26162L12.3067 3.03711L10.8832 3.50989Z"
                                fill="#808080" />
                    </svg>

                    <p>Delete</p>
                </div>
                <div class="cancel_div" id="closeModal">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.75 3.75L14.25 14.25" stroke="#808080" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M3.75 14.25L14.25 3.75" stroke="#808080" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <p>Cancel</p>
                </div>
            </div>
        </div>
        <!-- </div> -->

    </div>
@endsection
@section('scripts')
    <script>
        $('.input-group.date').datepicker({
            format: 'dd, M yyyy',
            autoclose: true
        });
        $('.input-group.date').datepicker('setDate', new Date('2023-04-19'));

        $('.single-date-picker.date').datepicker({
            format: 'dd, M yyyy',
            autoclose: true
        });
        $('.single-date-picker.date').datepicker('setDate', new Date('2023-04-19'));

        $('.from-date-picker.date').datepicker({
            format: 'dd, M yyyy',
            autoclose: true
        });
        $('.from-date-picker.date').datepicker('setDate', new Date('2023-09-29'));

        $('.to-date-picker.date').datepicker({
            format: 'dd, M yyyy',
            autoclose: true
        });
        $('.to-date-picker.date').datepicker('setDate', new Date('2023-12-08'));

        //  datatable

        $(document).ready(function () {
            var table = $('#staff_datas').DataTable({
                searching: false,
                lengthChange: false,
                info: false,
                columnDefs: [
                    {
                        className: 'dtr-control',
                        orderable: false,
                        targets: 0,
                    }
                ],
            });

            // muklti checkbox
            $('#selectAllCheckbox').on('change', function () {
                var isChecked = $(this).prop('checked');
                $('.selectCheckbox_model').prop('checked', isChecked);
            });

            // search data
            $('#staff_data_find').on('input', function () {
                var searchValue = $(this).val();
                table.search(searchValue).draw();
            });
            $('.selectCheckbox_model').change(function () {
                var checkedCount = $('.selectCheckbox_model:checked').length;
                $('.selected_check_member').html(checkedCount);
                if (checkedCount > 0) {
                    $('#myModal').show();
                } else {
                    $('#myModal').hide();
                }
            });
            $('#closeModal').click(function () {
                $('#myModal').hide();
            });

            // Handle radio button changes
            $('#dateRangePicker').hide();
            $('input[name="dateType"]').change(function () {
                // console.log(this);
                if (this.value === "Date") {
                    $('#singleDatePicker').show();
                    $('#dateRangePicker').hide();
                } else if (this.value === "Range") {
                    $('#singleDatePicker').hide();
                    $('#dateRangePicker').show();
                }
            });

            // $('#custom-file-upload').on('change', function () {
            //     var files = this.files;
            //     var $uploadWorkImages = $('.upload-work-images');
            //     var $workImages = $('#work-images');

            //     // Clear the existing images in the container
            //     $workImages.empty();

            //     if (files && files.length > 0) {
            //         // Hide the "upload-work-images" container
            //         $uploadWorkImages.hide();

            //         // Show the "#work-images" container
            //         $workImages.show();

            //         for (var i = 0; i < files.length; i++) {
            //             var reader = new FileReader();
            //             (function (index) {
            //                 reader.onload = function (e) {
            //                     var image = $('<img class="uploaded-image">');
            //                     image.attr('src', e.target.result);
            //                     $workImages.append(image);

            //                     // Get and display the name of the uploaded image
            //                     var imageName = $('<p class="uploaded-image-name">');
            //                     imageName.text(files[index].name);
            //                     $workImages.append(imageName);
            //                 };
            //             })(i); // Immediately invoke the function with the current index
            //             reader.readAsDataURL(files[i]);
            //         }
            //     }
            // });




        });


    </script>
@endsection