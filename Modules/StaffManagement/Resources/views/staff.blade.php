@extends('admin.layout.main')
@section('title')
<title>{{env('APP_NAME')}} | Staff management</title>
@endsection
@section('header-page')
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-12 top-header-sub staff-summary-main">
            <div class="breadcrumbs-area clearfix">
                <div class="breadcrumbs-sub staf-add-btn-top">
                    <!-- <img src="../assets/images/header/back.svg" alt=""> -->
                    <h4 class="page-title pull-left proxima_nova_semibold">Staff Management<span
                            class="proxima_nova_bold">({{$staff_count}})</span>
                    </h4>
                    <div class="staff-summary-main">
{{--                        <button class="staff-manage-summary-btn ">--}}
{{--                            <a href="{{route('add-staff')}}" class="section_sub_title proxima_nova_semibold">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"--}}
{{--                                    fill="none">--}}
{{--                                    <path--}}
{{--                                        d="M4.16699 16.6667C4.16699 14.5833 5.83366 13 7.83366 13H12.0837C14.167 13 15.7503 14.6667 15.7503 16.6667"--}}
{{--                                        stroke="white" stroke-width="1.5" stroke-linecap="round"--}}
{{--                                        stroke-linejoin="round" />--}}
{{--                                    <path--}}
{{--                                        d="M12.5002 4.33301C13.9169 5.74967 13.9169 7.99967 12.5002 9.33301C11.0836 10.6663 8.83357 10.7497 7.50024 9.33301C6.1669 7.91634 6.08357 5.66634 7.50024 4.33301C8.9169 2.99967 11.0836 2.99967 12.5002 4.33301"--}}
{{--                                        stroke="white" stroke-width="1.5" stroke-linecap="round"--}}
{{--                                        stroke-linejoin="round" />--}}
{{--                                </svg>--}}
{{--                                Add Staff </a>--}}
{{--                        </button>--}}
                        <button class="staff-manage-summary-btn ">
                            <a class="dropdown-toggle text-decoration-none filter_staff_data" href="#" data-bs-toggle="offcanvas" data-bs-target="#xml-download-toggle-right" aria-controls="xml-download-toggle-right">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                     fill="none">
                                    <path
                                        d="M4.16699 16.6667C4.16699 14.5833 5.83366 13 7.83366 13H12.0837C14.167 13 15.7503 14.6667 15.7503 16.6667"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M12.5002 4.33301C13.9169 5.74967 13.9169 7.99967 12.5002 9.33301C11.0836 10.6663 8.83357 10.7497 7.50024 9.33301C6.1669 7.91634 6.08357 5.66634 7.50024 4.33301C8.9169 2.99967 11.0836 2.99967 12.5002 4.33301"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                Add Staff
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="on-time-main">
    <row>
        <div class="approve-datas main-staff-data-list">
            <div class="approve-data-search assign-data-search col-md-6 col-sm-6">
                <div>
                    <div class="dropdown staff_department_dropdown">
                        <a class="dropdown-toggle text-decoration-none filter_staff_data" href="#" data-bs-toggle="offcanvas" data-bs-target="#create-toggle-right" aria-controls="create-toggle-right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 18 18" fill="none">
                                <path d="M14.9246 7.35039H3.07461C2.77461 7.35039 2.47461 7.05039 2.47461 6.75039C2.47461 6.45039 2.69961 6.15039 3.07461 6.15039H14.9246C15.2246 6.15039 15.5246 6.37539 15.5246 6.75039C15.5246 7.12539 15.2246 7.35039 14.9246 7.35039Z" fill="#808080"/>
                                <path d="M7.95039 16.2746C7.57539 16.2746 7.27539 16.1996 6.97539 15.9746C6.37539 15.6746 6.00039 15.0746 6.00039 14.3996V10.0496L3.15039 7.87461C2.70039 7.49961 2.40039 6.97461 2.40039 6.37461V4.34961C2.40039 3.29961 3.22539 2.47461 4.27539 2.47461H13.5754C14.6254 2.47461 15.4504 3.29961 15.4504 4.34961V6.37461C15.4504 6.97461 15.1504 7.49961 14.7004 7.87461L12.0004 10.0496V13.3496C12.0004 14.0996 11.6254 14.6996 10.9504 15.0746L8.85039 16.1246C8.47539 16.2746 8.25039 16.2746 7.95039 16.2746ZM4.35039 3.59961C3.90039 3.59961 3.60039 3.97461 3.60039 4.34961V6.37461C3.60039 6.59961 3.67539 6.82461 3.90039 6.97461L6.97539 9.37461C7.12539 9.44961 7.20039 9.67461 7.20039 9.82461V14.4746C7.20039 14.7746 7.35039 14.9996 7.57539 15.1496C7.80039 15.2996 8.10039 15.2996 8.32539 15.1496L10.4254 14.0996C10.6504 13.9496 10.8754 13.7246 10.8754 13.4246V9.74961C10.8754 9.59961 10.9504 9.37461 11.1004 9.29961L14.1754 6.89961C14.4004 6.74961 14.4754 6.52461 14.4754 6.29961V4.34961C14.4754 3.89961 14.1004 3.59961 13.7254 3.59961H4.35039Z" fill="#808080"/>
                                </svg>
                            <span class="section_sub_title proxima_nova_semibold">Filter<span class="select_department_count proxima_nova_semibold ps-1"></span></span>
                        </a>
                        <!-- <ul class="dropdown-menu py-0" aria-labelledby="dropdownMenuLink">
                            <input type="hidden" id="department_selected_id" name="">
                            <a href="javascript:void(0);" class="select_department dropdown-item" style="background:#f5f8ff">Departments</a>
                            @foreach($departments as $department)
                            <a href="javascript:void(0);" data-id="{{$department['id']}}" class="select_department dropdown-item">{{$department['name']}}</a>
                            @endforeach
                        </ul> -->
                    </div>
                </div>
                <!-- <div class="shifts-data">
                    <div class="filters sidebar-select approve-punch-data">
                        <select id="main_select_services" class="form-select create-select section_sub_title select-staff-department" name="select_department" id="select_department">
                            @foreach($departments as $department)
                                <option value="{{$department['id']}}">{{$department['name']}}</option>                        
                            @endforeach
                        </select>
                    </div>
                </div> -->
                <input class="input-search-rounded" type="text" id="staff_data_find" placeholder="Search">
            </div>
            <div class="col-md-6 col-sm-6 staff-right-length">
                <!-- <div> -->
                <div class="business_selct_box select_mate_option staff-option_select">
                    <select class="mySelect2 character_page_sorting">
                        <!-- <option value="sortby" selected>Sort by</option> -->
                        <!-- <option value="" disabled class="sort_disa_clear">Sort</option> -->
                        <option value="newest"selected >Newest</option>
                        <option value="oldest">Oldest</option>
                        <option value="atoz">A to Z</option>
                        <option value="ztoa">Z to A</option>
                    </select>
                </div>
                <!-- <div class="shifts-data"> -->
                <div class="business_selct_box select_mate_option staff-option_select">
                    <select class="mySelect2 number_page_sorting">
                        <option value="10perpage" selected>10 Per Page</option>
                        <option value="50perpage">50 Per Page</option>
                        <option value="100perpage">100 Per Page</option>
                        <option value="all">All</option>
                    </select>
                </div>

            </div>
        </div>
    </row>
    <div class="approve_staff_data">
        <table id="staff_datas" class="display" style="width:100%">
            <thead>
                <tr>
                    <th class="data_list_check"><input type="checkbox" id="selectAllCheckbox"></th> <!-- Checkbox Column -->
                    <th>Staff Name</th>
                    <th>Phone Number</th>
                    <th>Salary amount</th>
                    <th>Shift Type</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <div class="offcanvas offcanvas-end daily-work-data-download filter_icon" tabindex="-1" id="xml-download-toggle-right"
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
            <h5 class="section_title_heading proxima_nova_bold download-work-main-header filter-title-main">Add Staff</h5>
            <hr>
            <div class="filter-sub-sec">
                <form method="">
                    @csrf
                    <div class="download-cancel-btns-main">
                        <a href="{{route('add-staff')}}">
                            <button type="button" name="" class="download-btn proxima_nova_semibold apply_staff_filter xml_data_staff" data-bs-dismiss="offcanvas" aria-label="Close">Add Staff</button>
                        </a>
                        <a href="{{route('bulk-excel-add-staff')}}">
                            <button type="button" name="" class="download-btn proxima_nova_semibold apply_staff_filter xml_data_staff_excel" data-bs-dismiss="offcanvas" aria-label="Close">
                                Bulk Excel Add
                            </button>
                        </a>
                        <div class="download-cancel-btn">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <div class="offcanvas offcanvas-end daily-work-data-download filter_icon" tabindex="-1" id="create-toggle-right"
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
            <h5 class="section_title_heading proxima_nova_bold download-work-main-header filter-title-main">Filter</h5>
            <hr>
            <div class="filter-sub-sec">
                <form method="">
                    @csrf
                    <div class="daily-work-select">
                        <h2 class="filter-shiftcheck section_title proxima_nova_semibold">Filter By Departments</h2>
                        @foreach($departments as $department)
                            <div class="form-check filter-shift-main">
                                <input class="form-check-input select_department" type="checkbox" value="{{$department['id']}}" name="select_department" id="{{$department['id']}}">
                                <label class="form-check-label proxima_nova_regular" for="{{$department['id']}}">{{$department['name']}}</label>
                            </div>
                        @endforeach                            
                    </div>

                    <!-- <div class="daily-work-select">
                        <h2 class="filter-shiftcheck section_title proxima_nova_semibold">Filter Shifts</h2>
                        <div class="form-check filter-shift-main">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">No Shift</label>
                        </div>
                        <div class="form-check filter-shift-main">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">Tupple Day
                                Shift...</label>
                        </div>
                    </div>

                    <div class="daily-work-select">
                        <h2 class="filter-shiftcheck section_title proxima_nova_semibold">Filter Staff Type</h2>
                        <div class="form-check filter-shift-main">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">Monthly
                                Regular</label>
                        </div>
                        <div class="form-check filter-shift-main">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">Daily
                                Regular</label>
                        </div>
                        <div class="form-check filter-shift-main">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">Hourly
                                Regular</label>
                        </div>
                        <div class="form-check filter-shift-main">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">Monthly Contract
                                Base</label>
                        </div>
                        <div class="form-check filter-shift-main">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">Weekly Contract
                                Base</label>
                        </div>
                        <div class="form-check filter-shift-main">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">Daily Contract
                                Base</label>
                        </div>
                        <div class="form-check filter-shift-main">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">Hourly Contract
                                Base</label>
                        </div>
                    </div>
                    <div class="daily-work-select">
                        <h2 class="filter-shiftcheck section_title proxima_nova_semibold">Group By</h2>
                        <div class="form-check filter-shift-main">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label proxima_nova_regular"
                                for="flexCheckChecked">Department</label>
                        </div>
                        <div class="form-check filter-shift-main">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">Shift</label>
                        </div>
                        <div class="form-check filter-shift-main">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">Staff
                                Type</label>
                        </div>
                    </div> -->
                    <div class="download-cancel-btns-main">
                        <div class="download-cancel-btn">
                            <button type="button" name="" class="download-btn proxima_nova_semibold apply_staff_filter" data-bs-dismiss="offcanvas" aria-label="Close">Apply</button>
                            <button type="button" name="" class="download-btn proxima_nova_semibold cancel-staff-btn clear_filter" disabled>Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="deleteModal" data-bs-scroll="true"
    aria-labelledby="offcanvasRightLabel">
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
            <h5 class="section_title_heading proxima_nova_bold download-work-main-header filter-title-main">Delete
                Staff</h5>
            <hr>
            <div class="staff_view_delete_title">
                <h5>Are you sure to delete this Staff?</h5>
            </div>
            <div class="filter-sub-sec">
                <div class="download-cancel-btns-main">
                    <div class="download-cancel-btn mb-0">
                        <button type="submit" name=""
                            class="download-btn proxima_nova_semibold w-100 close_delete_modal delete_staff_btn"
                            onclick="deleteDepartment()" data-bs-dismiss="offcanvas" aria-label="Close">Delete
                            <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                        </button>
                        <button type="submit" name="" class="download-btn proxima_nova_semibold w-100 cancel_modal cancel_selected_id" data-bs-dismiss="offcanvas" aria-label="Close">Cancel
                            <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                        </button>
                    </div>
                </div>
            </div>
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
                <div class="cancel_div cancel_selected_id" id="closeModal">
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
</div>
@endsection
@section('scripts')
<<<<<<< HEAD
<script>
    var table;
    var selectedIds = [];
    var select_department = [];
    var selecteddep = [];
    $('.input-group.date').datepicker({
        format: 'dd, M yyyy',
        autoclose: true
    });
    $('.input-group.date').datepicker('setDate', new Date('2023-01-01'));
=======
    <script>
        
        $('.input-group.date').datepicker({
            format: 'dd, M yyyy',
            autoclose: true
        });
        $('.input-group.date').datepicker('setDate', new Date('2023-01-01'));
>>>>>>> 9ee7d98de403d43c1e001aefae0ecaf8228cb55b

    $('.cancel_selected_id').click(function () {
        $('#myModal').hide();
        selectedIds = [];
        // console.log(selectedIds);
        $('#selectAllCheckbox').prop('checked', false);
        $('.selectCheckbox_model').prop('checked', false);
    });

    $(document).ready(function () {
        $('.mySelect2').select2({
            // templateResult: formatOption,
            // templateSelection: formatOption,
            minimumResultsForSearch: Infinity
        }).on('select2:open', function (e) {
            $('.select2-container').addClass('staff-down-data');
        });

        function datatable(searchValue = null, character_page_sorting = null, number_page_sorting = null, select_department = null) {
            if(character_page_sorting == null && number_page_sorting == null){
                var character_page_sorting = $('.character_page_sorting').val();
                var number_page_sorting = $('.number_page_sorting').val();
            }
            table = $('#staff_datas').DataTable({
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
                    $('#selectAllCheckbox').on('change', function () {
                        var isChecked = $(this).prop('checked');
                        $('.selectCheckbox_model').prop('checked', isChecked);
                        var checkedCount = $('.selectCheckbox_model:checked').length;
                        $('.selected_check_member').html(checkedCount);
                        if (checkedCount > 0) {
                            $('#myModal').show();
                        } else {
                            $('#myModal').hide();
                        }
                        if (isChecked) {
                            $('.selectCheckbox_model').each(function () {
                                var id = $(this).val();
                                if (selectedIds.indexOf(id) === -1) {
                                    selectedIds.push(id);
                                }
                            });
                        } else {
                            selectedIds = [];
                        }
                        // console.log('Selected IDs:', selectedIds);
                    });

                    $('.selectCheckbox_model').change(function () {
                        var id = $(this).val();
                        var checkedCount = $('.selectCheckbox_model:checked').length;
                        $('.selected_check_member').html(checkedCount);
                        if (checkedCount > 0) {
                            $('#myModal').show();
                        } else {
                            $('#myModal').hide();
                        }
                        if ($(this).is(':checked')) {
                            selectedIds.push(id);
                        } else {
                            const index = selectedIds.indexOf(id);
                            if (index !== -1) {
                                selectedIds.splice(index, 1);
                            }
                        }
                        // console.log('Selected IDs:', selectedIds);
                    });
                },
                ajax: {
                    "url": "{{ route('all-staff') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": { _token: "{{csrf_token()}}", 'searchValue': searchValue, 
                        'character_page_sorting':character_page_sorting, 
                        'number_page_sorting': number_page_sorting ,
                        'select_department': select_department, 
                    },
                    "dataSrc": "data"
                },
                initComplete: function (settings, json) {
                    var api = this.api();
                    if (table.rows().count() === 0) {
                        // Display image or advertisement
                        var adContent = '<tr><td colspan="7"><div class="no_data_found"><div class=""><img src="{{asset('assets/admin/images/staff_manage/no_data.svg')}}" alt="Advertisement"></div><div class="proxima_nova_semibold section_title">No data found, add staff</div></div></td></tr>';
                        $(api.table().body()).html(adContent);
                    }
                },
                columns: [
                    {
                        data: 'id',
                        type: 'num',
                        render: function (data, type, row) {
                            return `<input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model" value="${row.id}">`;
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
                    { "data": "phone_number" },
                    { "data": "salary_amount" },
                    { "data": "salary_cycle" },
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
        $('#staff_data_find').on('input', function () {
            var searchValue = $(this).val();
            var character_page_sorting = $('.character_page_sorting').val();
            var number_page_sorting = $('.number_page_sorting').val();
            table.destroy();
            datatable(searchValue,character_page_sorting,number_page_sorting,select_department);
            if (number_page_sorting === 'all') {
                table.page.len(-1).draw(); // Show all records
            } else if (number_page_sorting === '10perpage') {
                table.page.len(10).draw(); // Show 10 records per page
            } else if (number_page_sorting === '50perpage') {
                table.page.len(50).draw(); // Show 50 records per page
            } else if (number_page_sorting === '100perpage') {
                table.page.len(100).draw(); // Show 100 records per page
            } else {
                table.page.len(parseInt(number_page_sorting)).draw(); // Show selected number of records per page
            }
        });
        $('.select_department').on('click', function () {
            var id = $(this).val();
            var count = $('.select_department:checked').length;
            if(count > 0){
                $('.clear_filter').prop('disabled',false);
            } else {
                $('.clear_filter').prop('disabled',true);
            }
            if ($(this).is(':checked')) {
                select_department.push(id);
            } else {
                const index = select_department.indexOf(id);
                if (index !== -1) {
                    select_department.splice(index, 1);
                }
            }
            // console.log('Selected IDs:', select_department);
        });
        // $('.filter_icon').on('click', function () {
        //     console.log('Selected IDs:', select_department);
        //     $('.select_department').prop('checked', false);
        //     select_department.forEach(function(id) {
        //         $('.select_department[value="' + id + '"]').prop('checked', true);
        //     });
        // });
        $('.apply_staff_filter').on('click', function () {
            // var department_selected_id = $(this).data('id');
            // $('#department_selected_id').val(department_selected_id);
            var searchValue = $('#staff_data_find').val();
            var character_page_sorting = $('.character_page_sorting').val();
            var number_page_sorting = $('.number_page_sorting').val();
            var checkedCount = $('.select_department:checked').length;
            if (checkedCount > 0) {
                selecteddep = select_department;
                // console.log(selecteddep);
                $('.select_department_count').html('('+checkedCount+')');
                $('.dropdown.staff_department_dropdown').css('background-color','rgba(47, 140, 255, 0.1)');
                $('.staff_department_dropdown span').css('color','#2F8CFF');
                $('.staff_department_dropdown svg path').css('fill','#2F8CFF')
            } else {
                selecteddep = [];
                select_department = [];
                $('.select_department_count').html('');
                $('.dropdown.staff_department_dropdown').css('background-color','');
                $('.staff_department_dropdown span').css('color','');
                $('.staff_department_dropdown svg path').css('fill','')
            }

            
            table.destroy();
            datatable(searchValue,character_page_sorting,number_page_sorting, select_department);
            if (number_page_sorting === 'all') {
                table.page.len(-1).draw(); // Show all records
            } else if (number_page_sorting === '10perpage') {
                table.page.len(10).draw(); // Show 10 records per page
            } else if (number_page_sorting === '50perpage') {
                table.page.len(50).draw(); // Show 50 records per page
            } else if (number_page_sorting === '100perpage') {
                table.page.len(100).draw(); // Show 100 records per page
            } else {
                table.page.len(parseInt(number_page_sorting)).draw(); // Show selected number of records per page
            }
        });

        $('.filter_staff_data').click(function () {
            // selectedIds = [];
            // console.log(selecteddep);
            $('.select_department').each(function() {
                var id = $(this).val();
                if (selecteddep.includes(id)) {
                    $(this).prop('checked', true);
                }
            });
            var count = $('.select_department:checked').length;
            if(count > 0){
                $('.clear_filter').prop('disabled',false);
            } else {
                $('.clear_filter').prop('disabled',true);
            }
            // $('#selectAllCheckbox').prop('checked', false);
            // $('.selectCheckbox_model').prop('checked', false);
        });

        $('.clear_filter').on('click', function () {
            $('.select_department').prop('checked', false);
            $('.clear_filter').prop('disabled',true);
            // console.log('Selected IDs:', select_department);
        });
        var character_page_sorting = $('.character_page_sorting').val();
        var selectedText = $('.character_page_sorting').find('option:selected').text();
        $('.character_page_sorting').siblings('.select2-container').find('.select2-selection__rendered').html('<span class="sort_by_text">Sort by </span>' + selectedText);

        $('.character_page_sorting').change(function () {
            var character_page_sorting = $('.character_page_sorting').val();
            var number_page_sorting = $('.number_page_sorting').val();
            var searchValue = $('#staff_data_find').val();

            var selectedText = $(this).find('option:selected').text();

            if (character_page_sorting !== 'sortby') {
                $(this).siblings('.select2-container').find('.select2-selection__rendered').html('<span class="sort_by_text">Sort by </span>' + selectedText);
            } else {
                $(this).siblings('.select2-container').find('.select2-selection__rendered').html('<span class="sort_by_text">Sort by </span>');
            }
            
            table.destroy();
            datatable(searchValue,character_page_sorting,number_page_sorting,select_department);
            if (number_page_sorting === 'all') {
                table.page.len(-1).draw(); // Show all records
            } else if (number_page_sorting === '10perpage') {
                table.page.len(10).draw(); // Show 10 records per page
            } else if (number_page_sorting === '50perpage') {
                table.page.len(50).draw(); // Show 50 records per page
            } else if (number_page_sorting === '100perpage') {
                table.page.len(100).draw(); // Show 100 records per page
            } else {
                table.page.len(parseInt(number_page_sorting)).draw(); // Show selected number of records per page
            }
        })
        $('.number_page_sorting').change(function () {
            var searchValue = $('#staff_data_find').val();
            var character_page_sorting = $('.character_page_sorting').val();
            var number_page_sorting = $('.number_page_sorting').val();
            // var selectedText = $(this).find('option:selected').text();

            // if (number_page_sorting !== 'sortby') {
            //     $(this).siblings('.select2-container').find('.select2-selection__rendered').html('<span class="sort_by_text">Sort by </span>' + selectedText);
            // } else {
            //     $(this).siblings('.select2-container').find('.select2-selection__rendered').html('<span class="sort_by_text">Sort by </span>');
            // }
            table.destroy();
            datatable(searchValue,character_page_sorting,number_page_sorting,select_department);
            var staffSelectWidth = $('.staff-option_select').outerWidth();
            if (number_page_sorting === 'all') {
                $('.staff-down-data .select2-dropdown').addClass("pagination_all_data");
                table.page.len(-1).draw(); // Show all records
            } else if (number_page_sorting === '10perpage') {
                $('.attendance-down-data-paginat .select2-dropdown').removeClass("pagination_all_data");
                $('.attendance-down-data-paginat.select2-container--open .select2-dropdown').css('width', staffSelectWidth + 'px');
                table.page.len(10).draw(); // Show 10 records per page
            } else if (number_page_sorting === '50perpage') {
                $('.attendance-down-data-paginat .select2-dropdown').removeClass("pagination_all_data");
                $('.attendance-down-data-paginat.select2-container--open .select2-dropdown').css('width', staffSelectWidth + 'px');
                table.page.len(50).draw(); // Show 50 records per page
            } else if (number_page_sorting === '100perpage') {
                $('.attendance-down-data-paginat .select2-dropdown').removeClass("pagination_all_data");
                $('.attendance-down-data-paginat.select2-container--open .select2-dropdown').css('width', staffSelectWidth + 'px');
                table.page.len(100).draw(); // Show 100 records per page
            } else {
                $('.attendance-down-data-paginat .select2-dropdown').removeClass("pagination_all_data");
                $('.attendance-down-data-paginat.select2-container--open .select2-dropdown').css('width', staffSelectWidth + 'px');
                table.page.len(parseInt(number_page_sorting)).draw(); // Show selected number of records per page
            }            
        })

        $('.delete_staff_btn').on('click', function (event) {
            event.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('delete_staff') }}",
                data: {
                    'selectedIds': selectedIds
                },
                success: function (response) {
                    if (response['status'] == 1) {
                        toastr["success"](response.message);
                        $('#myModal').hide();
                        $('#selectAllCheckbox').prop('checked', false);
                        table.ajax.reload(null, false);
                    } else {
                        toastr["error"](response.message)
                    }
                }
            });
        })          

        $('.export_div').on('click', function (e) {
            e.preventDefault();
            var url = '{{ route('staff_info_export') }}';
            var queryParams = $.param({ selectedIds: selectedIds});

            var finalUrl = url + '?' + queryParams;

            window.location.href = finalUrl;
            $('.selectCheckbox_model').prop('checked', false);
            selectedIds = [];
            if(finalUrl){
                $('#myModal').hide();
                $('#selectAllCheckbox').prop('checked', false);
                toastr["success"]('Your files is being downloaded');
            }else {
                toastr["error"]('Somthing went wrong.');
            }
        });
    })
</script>
@endsection