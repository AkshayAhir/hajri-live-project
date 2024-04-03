@extends('admin.layout.main')
@section('title')
    <title>{{env('APP_NAME')}} | Approve Punches</title>
@endsection
@section('header-page')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6 top-header-sub">
                <div class="breadcrumbs-area clearfix">
                    <div class="breadcrumbs-sub">
                        <a href="{{route('dashboard')}}"><img src="{{asset('assets/admin/images/header/back.svg')}}" alt=""></a>
                        <h4 class="page-title pull-left proxima_nova_semibold">Approve Punches
                        </h4>
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li class="section_sub_title"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="section_sub_title">/  Approve Punches</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="shifts-data">
        <div class="filters sidebar-select approve-punch-data">
            <select id="main_select_services"
                class="form-select create-select section_sub_title select-club-services"
                name="club-services">
                <option value=".abrikosovaya" selected>Day Shift | 9:00 AM - 6:30 PM</option>
                <option value=".bratskaya">Designer</option>
                <option value=".lesi-ukrainki">Android Developer</option>
                <option value=".lesi-ukrainki">React Developer</option>
                <option value=".lesi-ukrainki">Flutter Developer</option>
            </select>
        </div>

    </div>
    <row>
        <div class="approve-datas approve_punches">
            <div class="approve-data-search col-md-6 col-sm-6">
                <form action="" method="">
                    <input class="input-search-rounded" type="text" id="staff_data_find"
                           placeholder="Search">
                </form>
            </div>
            <div class="approve-right-data col-md-6 col-sm-6 approve_punches_calender">
                <!-- <div class="user-profile pull-right"> -->
                <div class="approve-data-download  dropdown-toggle proxima_nova_bold">
                    <a href="#"> <img src="{{asset('assets/admin/images/approve_punches/download-report.svg')}}" alt=""></a>
                </div>
                <div class="dropdown-menu" x-placement="bottom-start">
                    <a class="dropdown-item proxima_nova_semibold" href="#">Excel Report</a>
                    <a class="dropdown-item proxima_nova_semibold" href="#">PDF Report</a>
                </div>
                <!-- </div>  -->
                <!-- <div class="approve-data-download dropdown-toggle proxima_nova_bold">
                    <a href=""> <img src="../assets/images/approve_punches/download-report.svg" alt=""></a>
                </div> -->
                <div class="input-group date" data-provide="datepicker">
                    <input type="text" class="input-group-addon calender-img form-control proxima_nova_semibold calender-picker" readonly='true'>
                    <!-- <div class="input-group-addon calender-img">
                        <img src="{{asset('assets/admin/images/approve_punches/calender.svg')}}" alt="" >
                    </div> -->
                </div>
            </div>

        </div>
    </row>
    <div class="approve_staff_data">
        <table id="staff_datas" class="display responsive" style="width:100%">
            <thead>
            <tr>
                <th><input type="checkbox" id="selectAllCheckbox"></th> <!-- Checkbox Column -->
                <th>Staff Name</th>
                <th>Break</th>
                <th>In Time</th>
                <th>Out Time</th>
                <th>Total Time</th>
                <th>Approve/Decline</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/ic-user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Jay Shah<p class="data-sub-field">Node.js Developer</p>
                        </div>
                    </div>
                </td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>

            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}"
                                  class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img
                                    src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}" class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}" class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model"></td>
                <td>
                    <div class="user-images">
                        <div><img src="{{asset('assets/admin/images/approve_punches/user.svg')}}" class="approve-user-img" alt=""></div>
                        <div>Priyal Borad<p class="data-sub-field">UI/UX Designer</p>
                        </div>
                    </div>
                </td>
                <td>43 Mins</td>
                <td>9:01</td>
                <td>5:00</td>
                <td>9:19 Hrs</td>
                <td>
                    <div class="approve-main-sec"><button class="approve-btn"><img src="{{asset('assets/admin/images/approve_punches/ic-check.svg')}}" alt=""></button>
                        <button class="approve-btn"><img src="{{asset('assets/admin/images/approve_punches/decline.svg')}}" alt=""></button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div>
        <div class="reject-approve-bttn">
            <button name="" class="reject-btn proxima_nova_semibold">Reject Selected</button>
            <button name="" class="approve-btn-btn proxima_nova_semibold">Approve Selected</button>
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
    
    document.addEventListener('click', function (event) {
        const dropdown = document.querySelector('.dropdown-content');
        if (!event.target.closest('.profile-main-notification')) {
            dropdown.classList.remove('active');
        }
    });
    $('.input-group.date').datepicker({
        format: 'dd, M yyyy',
        autoclose: true
    });
    $('.input-group.date').datepicker('setDate', new Date('2023-01-01'));

    //  datatable
    $(document).ready(function () {
        var table = $('#staff_datas').DataTable({
            searching: false,
            lengthChange: false,
            info: false,
            responsive: true,
            columnDefs: [
                { "width": "10px", "targets": 0 }
            ]
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
            // console.log(table);
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
    });
</script>
@endsection