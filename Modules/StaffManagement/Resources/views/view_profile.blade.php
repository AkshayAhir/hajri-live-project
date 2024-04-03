@extends('admin.layout.main')
@section('title')
    <title>{{env('APP_NAME')}} | View profile</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/dropzone.css')}}">
@endsection
@section('header-page')
    @php
        $firstThreeCharacters = substr($business[0]->name, 0, 3);
        $staff_prefix = strtoupper($firstThreeCharacters);
    @endphp
{{--    {{$staff[0]->id}}--}}
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="top-header-sub">
                <div class="breadcrumbs-area clearfix">
                    <div class="breadcrumbs-sub">
                    <div class="attendance-breadcrumbs" onclick="history.back()">
                    <a class="back_button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z" fill="#050E17"></path>
                        </svg></a>
                        <h4 class="page-title pull-left proxima_nova_semibold">Personal Info
                        </h4>
                    </div>
                        <!-- <a href="{{ route('staff-profile', ['id' => $staff[0]->id]) }}" class="zback_button"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z" fill="#050E17"></path>
                        </svg></a></a> -->
                        <!-- <h4 class="page-title pull-left proxima_nova_semibold">Personal Info</h4> -->
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li class="section_sub_title"><a href="{{route('staff')}}">Staff management</a></li>
                        <li class="section_sub_title">/  staff profile</li>
                        <li class="section_sub_title">/  view profile</li>
                        <li class="section_sub_title">/  Personal Info</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
        <div class="staff-view-profile-main">
            <div class="staff-form-muti-step">
                <div class="staff-view-profile" style="cursor:pointer" id="personal_info_form_data">
                    <p id="step1" class="staff-personal-info staff_info_active proxima_nova_semibold staff-personal-first">
                    <span class="info-step step-1 info_active">1</span>Personal Info</p>
                </div>
                <div class="staff-view-profile" style="cursor:pointer" id="bank_details_form_data">
                    <p id="step2" class="staff-personal-info proxima_nova_semibold staff-personal-secound">
                    <span class="info-step step-2">2</span>Bank Details</p>
                </div>
                <!-- <div class="staff-view-profile">
                    <p id="step3" class="staff-personal-info proxima_nova_semibold staff-personal-third">
                    <span class="info-step step-3">3</span>Staff Settings</p>
                </div> -->
            </div>

            <div class="profile-step step1 active" id="profile-step">
                <form id="staff_personal_info" method="post">
                    <input type="hidden" id="personal_staff_id" name="staff_id" value="{{$staff[0]->id}}">
                    @csrf
                    <div class="staff-view-form-profile">
                        <h2 class="proxima_nova_semibold staff-pay-title">Staff's personal Information</h2>
                        
                        <div class="shift-main-inner-edit">
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">First Name <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                <input type="text" class="form-control shift-edit-input" name="first_name" id="first_name" placeholder="Enter your first name" value="{{$staff[0]->name}}">
                            </div>
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Last Name <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                <input type="text" class="form-control shift-edit-input" name="last_name" id="last_name" placeholder="Enter your last name" value="{{$staff[0]->last_name}}">
                            </div>
                        </div>
                        <div class="shift-main-inner-edit">
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Middle Name <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                <input type="text" class="form-control shift-edit-input" name="middle_name" id="middle_name" placeholder="Enter your middle name" value="{{$staff[0]->middle_name}}">
                            </div>
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Phone Number <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                <input type="text" class="form-control shift-edit-input" id="phone_number" name="phone_number" placeholder="Enter phone number" value="{{$staff[0]->phone_number}}" maxlength="11">
                            </div>
                        </div>
                        <div class="shift-main-inner-edit">
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Email <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                @if($staff[0]->email)
                                    <input type="text" class="form-control shift-edit-input" name="staff_email" id="staff_email" placeholder="Enter your email" value="{{$staff[0]->email}}" readonly>
                                @else
                                    <input type="text" class="form-control shift-edit-input" name="staff_email" id="staff_email" placeholder="Enter your email">
                                @endif
                            </div>
                            @forelse ($staff_personal_info as $staff_personal_infos)
{{--                            {{$staff_personal_infos->date_of_birth}}--}}
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Date of Birth</label>
                                    <!-- <input type="date" class="form-control shift-edit-input" placeholder="Enter name" name="date_of_birth" id="date_of_birth" value="{{$staff_personal_infos->date_of_birth}}"> -->
                                    <input type="text" class="input-group-addon form-control shift-edit-input calender-picker view_profile_date_ofbirth"
                                value="{{$staff_personal_infos->date_of_birth}}" name="date_of_birth" id="date_of_birth" autocomplete="off">
                                </div>
                            @empty
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Date of Birth</label>
                                    <input type="date" class="input-group-addon form-control shift-edit-input calender-picker view_profile_date_ofbirth" placeholder="Enter Birth" name="date_of_birth" id="date_of_birth">
                                </div>
                            @endforelse
                        </div>
                        @forelse ($staff_personal_info as $staff_personal_infos)
                            <div class="shift-main-inner-edit">
                                <!-- <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Date of Birth</label>
                                    <input type="date" class="form-control shift-edit-input" placeholder="Enter name" name="date_of_birth" id="date_of_birth" value="{{$staff_personal_infos->date_of_birth}}">
                                </div> -->
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Gender</label>
                                    <div class="filters staff_attendance" id="gender_error">
                                        <select class="form-select create-select section_sub_title select-club-services" id="gender" name="gender">
                                            <option value="">Select Gender</option>
                                            <option value="male" {{($staff_personal_infos->gender == 'male') ? 'selected' : ''}}>Male</option>
                                            <option value="female" {{($staff_personal_infos->gender == 'female') ? 'selected' : ''}}>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Address 1</label>
                                    <input type="text" class="form-control shift-edit-input" placeholder="Enter address" id="address1" name="address1" value="{{$staff_personal_infos->address1}}">
                                </div>
                            </div>
                            <div class="shift-main-inner-edit">
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">City</label>
                                    <input type="text" class="form-control shift-edit-input" placeholder="Enter city" name="city" id="city" value="{{$staff_personal_infos->city}}">
                                </div>
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Address 2 (Optional)</label>
                                    <input type="text" class="form-control shift-edit-input" placeholder="Enter address" id="address2" name="address2" value="{{$staff_personal_infos->address}}">
                                </div>
                            </div>
                            <div class="shift-main-inner-edit">
                                
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">State</label>
                                    <div class="filters staff_attendance" id="state_error">
                                        <select class="form-select create-select section_sub_title select-club-services" id="state" name="state">
                                            <option value="">Select State</option>
                                            <option value="gujrat" {{($staff_personal_infos->state == 'gujrat') ? 'selected' : ''}}>Gujrat</option>
                                            <option value="delhi" {{($staff_personal_infos->state == 'delhi') ? 'selected' : ''}}>Delhi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Pincode</label>
                                    <input type="text" class="form-control shift-edit-input" placeholder="Enter Pincode" id="pincode" name="pincode" value="{{$staff_personal_infos->pincode}}">
                                </div>
                            </div>
                        @empty
                            <div class="shift-main-inner-edit">
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Gender</label>
                                    <div class="filters staff_attendance" id="gender_error">
                                        <select class="form-select create-select section_sub_title select-club-services" id="gender" name="gender">
                                            <option value="">Select Gender</option>
                                            <option value="web">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Address 1</label>
                                    <input type="text" class="form-control shift-edit-input" placeholder="Enter address" id="address1" name="address1">
                                </div>
                            </div>
                            <div class="shift-main-inner-edit">
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">City</label>
                                    <input type="text" class="form-control shift-edit-input" placeholder="Enter city" name="city" id="city">
                                </div>
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Address 2 (Optional)</label>
                                    <input type="text" class="form-control shift-edit-input" placeholder="Enter address" id="address2" name="address2">
                                </div>
                            </div>
                            <div class="shift-main-inner-edit">
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">State</label>
                                    <div class="filters staff_attendance" id="state_error">
                                        <select class="form-select create-select section_sub_title select-club-services" id="state" name="state">
                                            <option value="">Select State</option>
                                            <option value="gujrat">Gujrat</option>
                                            <option value="delhi">Delhi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Pincode</label>
                                    <input type="text" class="form-control shift-edit-input" placeholder="Enter Pincode" id="pincode" name="pincode">
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <div class="staff-view-form-profile">
                        <h2 class="proxima_nova_semibold staff-pay-title">Employment Information</h2>
                        @forelse ($staff_info as $staff_infos)
                            <div class="shift-main-inner-edit">
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Staff ID</label>
                                    <input type="text" class="form-control shift-edit-input" placeholder="Enter Staff ID" value="{{$staff_prefix}}{{$staff[0]->id}}" disabled>
                                </div>
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Date Of Joining</label>
                                    <!-- <input type="date" class="form-control shift-edit-input" id="date_of_joining" name="date_of_joining" value="{{$staff_infos->date_of_joining}}"> -->
                                    <input type="text"
                                class="input-group-addon form-control shift-edit-input calender-picker view_profile_date_ofbirth"
                                value="{{$staff_infos->date_of_joining}}" name="date_of_joining" id="date_of_joining" autocomplete="off">
                                </div>
                            </div>
                            <div class="shift-main-inner-edit">
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Designation</label>
                                    <input type="text" class="form-control shift-edit-input" placeholder="Enter Designation" name="designation" id="designation" value="{{$staff_infos->designation}}">
                                </div>
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Department</label>
                                    <div class="filters staff_attendance" id="department_error">
                                        <select class="form-select create-select section_sub_title select-club-services" id="department_id" name="department_id">
                                            <option value="">Select Department</option>
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}" {{($staff[0]->department_id == $department->id) ? 'selected' : ''}}>{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--                            <input type="text" class="form-control shift-edit-input" placeholder="Enter Department">--}}
                                </div>
                            </div>
                            <div class="shift-main-inner-edit">
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">UAN Number</label>
                                    <input type="text" class="form-control shift-edit-input" placeholder="Enter UAN Number" name="UAN_number" id="UAN_number" value="{{$staff_infos->UAN_number}}">
                                </div>
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">ESI Number</label>
                                    <input type="text" class="form-control shift-edit-input" placeholder="Enter ESI Number" name="ESI_number" id="ESI_number" value="{{$staff_infos->ESI_number}}">
                                </div>
                            </div>
                            <div class="shift-main-inner-edit">
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">PAN Number</label>
                                    <input type="text" class="form-control shift-edit-input" placeholder="Enter PAN Number" name="PAN_number" id="PAN_number" value="{{$staff_infos->PAN_number}}">
                                </div>
                            </div>
                        @empty
                            <div class="shift-main-inner-edit">
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Staff ID</label>
                                    <input type="text" class="form-control shift-edit-input" placeholder="Enter Staff ID" value="{{$staff_prefix}}{{$staff[0]->id}}" disabled>
                                </div>
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Date Of Joining</label>
                                    <input type="date" class="form-control shift-edit-input" id="date_of_joining" name="date_of_joining">
                                </div>
                            </div>
                            <div class="shift-main-inner-edit">
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Designation</label>
                                    <input type="text" class="form-control shift-edit-input" placeholder="Enter Designation" name="designation" id="designation">
                                </div>
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Department</label>
                                    <div class="filters staff_attendance" id="department_error">
                                        <select class="form-select create-select section_sub_title select-club-services" id="department_id" name="department_id">
                                            <option value="">Select Department</option>
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}" {{($staff[0]->department_id == $department->id) ? 'selected' : ''}}>{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="shift-main-inner-edit">
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">UAN Number</label>
                                    <input type="text" class="form-control shift-edit-input" placeholder="Enter UAN Number" name="UAN_number" id="UAN_number">
                                </div>
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">ESI Number</label>
                                    <input type="text" class="form-control shift-edit-input" placeholder="Enter ESI Number" name="ESI_number" id="ESI_number">
                                </div>
                            </div>
                            <div class="shift-main-inner-edit">
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">PAN Number</label>
                                    <input type="text" class="form-control shift-edit-input" placeholder="Enter PAN Number" name="PAN_number" id="PAN_number">
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <!-- <div class="staff-view-form-profile">
                    <h2 class="proxima_nova_semibold staff-pay-title">Documents</h2>
                    <div class="shift-main-inner-edit">
                        <div class="shift-inner-sub-label-edit">
                            <label class="shift-type-label staff-view-photo-upload section_sub_title">Please upload the file in png, jpeg, jpg or pdf format</label>
                            <div class="needsclick dropzone" id="images-dropzone" style="text-align: center">
                                <div class="add-staff-dropzone">
                                    <div class="upload-images">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.73828 8.75C4.73828 5.72969 7.18672 3.28125 10.207 3.28125H21.5198C22.9703 3.28125 24.3613 3.85742 25.3868 4.88301L28.6574 8.15353C29.6829 9.17912 30.2591 10.5701 30.2591 12.0205V26.25C30.2591 29.2703 27.8107 31.7188 24.7904 31.7188H10.207C7.18672 31.7188 4.73828 29.2703 4.73828 26.25V8.75ZM10.207 5.46875C8.39485 5.46875 6.92578 6.93782 6.92578 8.75V26.25C6.92578 28.0622 8.39485 29.5312 10.207 29.5312H24.7904C26.6026 29.5312 28.0716 28.0622 28.0716 26.25V12.0205C28.0716 11.1503 27.7259 10.3157 27.1106 9.70032L23.84 6.42981C23.2247 5.81445 22.3901 5.46875 21.5198 5.46875H10.207Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1445 3.28125C21.7486 3.28125 22.2383 3.77094 22.2383 4.375V9.47917C22.2383 10.4859 23.0544 11.3021 24.0612 11.3021H29.1654C29.7694 11.3021 30.2591 11.7918 30.2591 12.3958C30.2591 12.9999 29.7694 13.4896 29.1654 13.4896H24.0612C21.8463 13.4896 20.0508 11.6941 20.0508 9.47917V4.375C20.0508 3.77094 20.5405 3.28125 21.1445 3.28125Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.7266 16.7266C17.1537 16.2995 17.8463 16.2995 18.2734 16.7266L21.5546 20.0079C21.9818 20.435 21.9818 21.1275 21.5546 21.5546C21.1275 21.9818 20.435 21.9818 20.0079 21.5546L17.5 19.0468L14.9921 21.5546C14.565 21.9818 13.8725 21.9818 13.4454 21.5546C13.0182 21.1275 13.0182 20.435 13.4454 20.0079L16.7266 16.7266Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.4902 16.4062C18.0943 16.4062 18.584 16.8959 18.584 17.5V24.7917C18.584 25.3957 18.0943 25.8854 17.4902 25.8854C16.8862 25.8854 16.3965 25.3957 16.3965 24.7917V17.5C16.3965 16.8959 16.8862 16.4062 17.4902 16.4062Z" fill="#808080" />
                                        </svg>
                                    </div>
                                    <p class="staff-image-dragdrop">Drag & drop your image or <label for="custom-file-upload" class="file-upload ">Select Files</label></p>
                                </div>
                            </div>
                            <p class="section_sub_title profile-upload-document">ex: Aadhar card, pan card..etc</p>
                        </div>
                    </div>
                </div> -->
            </form>
            <div class="staff-profile-btn">
                @if($staff[0]->is_deactivate == 0)
                    <button name="" class="reject-btn staff-profile-deactivate-btn proxima_nova_semibold" data-bs-toggle="offcanvas" data-bs-target="#deactivateModal" aria-controls="deactivateModal">Deactivate Staff
                        <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                    </button>
                @else
                    <button name="" class="reject-btn staff-profile-delete-btn proxima_nova_semibold" data-bs-toggle="offcanvas" data-bs-target="#deleteModal" aria-controls="deleteModal">Delete Staff
                        <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                    </button>
                @endif
                
                <button type="submit" name="" id="staff_step1_btn" class="create-staff-btn staff-next-btn proxima_nova_semibold">Save
                    <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                </button>
            </div>
            </div>

            <div class="profile-step step2" id="profile-step">
                <form id="update_bank_detail" method="post">
                    <div class="update_bank_detail_form_inner">
                        @csrf
                        <input type="hidden" id="staff_id" name="staff_id" value="{{$staff[0]->id}}">
                        @forelse ($staff_bank_details as $staff_bank_detail)
                            <div class="staff-view-form-profile">
                                <h2 class="proxima_nova_semibold staff-pay-title">Bank Account</h2>
                                <div class="shift-main-inner-edit">
                                    <div class="shift-inner-sub-label-edit">
                                        <label class="shift-type-label">Account Holder Name <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                        <input type="text" class="form-control shift-edit-input" name="account_holder_name" id="account_holder_name" placeholder="Enter name" value="{{$staff_bank_detail->account_holder_name}}">
                                    </div>
                                    <div class="shift-inner-sub-label-edit">
                                        <label class="shift-type-label">Account Number <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                        <input type="text" class="form-control shift-edit-input" placeholder="Enter Account Number" name="account_number" id="account_number" value="{{$staff_bank_detail->account_number}}">
                                    </div>
                                </div>
                                <div class="shift-main-inner-edit">
                                    <div class="shift-inner-sub-label-edit">
                                        <label class="shift-type-label">Confirm Account Number <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                        <input type="text" class="form-control shift-edit-input" placeholder="Confirm Account Number" name="confirm_account_number" id="confirm_account_number" value="{{$staff_bank_detail->account_number}}">
                                    </div>
                                    <div class="shift-inner-sub-label-edit">
                                        <label class="shift-type-label">IFSC Code <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                        <input type="text" class="form-control shift-edit-input" placeholder="Enter IFSC Code" id="IFSC_code" name="IFSC_code" value="{{$staff_bank_detail->IFSC_code}}">
                                    </div>
                                </div>
                                <h2 class="proxima_nova_semibold staff-pay-title">UPI ID</h2>
                                <div class="shift-main-inner-edit">
                                    <div class="shift-inner-sub-label-edit">
                                        <label class="shift-type-label">UPI ID <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                        <input type="text" class="form-control shift-edit-input" placeholder="Enter UPI ID" id="UPI_id" name="UPI_id" value="{{$staff_bank_detail->UPI_id}}">
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="staff-view-form-profile">
                                <h2 class="proxima_nova_semibold staff-pay-title">Bank Account</h2>
                                <div class="shift-main-inner-edit">
                                    <div class="shift-inner-sub-label-edit">
                                        <label class="shift-type-label">Account Holder Name <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                        <input type="text" class="form-control shift-edit-input" name="account_holder_name" id="account_holder_name" placeholder="Enter name">
                                    </div>
                                    <div class="shift-inner-sub-label-edit">
                                        <label class="shift-type-label">Account Number <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                        <input type="text" class="form-control shift-edit-input" placeholder="Enter Account Number" name="account_number" id="account_number">
                                    </div>
                                </div>
                                <div class="shift-main-inner-edit">
                                    <div class="shift-inner-sub-label-edit">
                                        <label class="shift-type-label">Confirm Account Number</label>
                                        <input type="text" class="form-control shift-edit-input" placeholder="Confirm Account Number" name="confirm_account_number" id="confirm_account_number">
                                    </div>
                                    <div class="shift-inner-sub-label-edit">
                                        <label class="shift-type-label">IFSC Code <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                        <input type="text" class="form-control shift-edit-input" placeholder="Enter IFSC Code" id="IFSC_code" name="IFSC_code">
                                    </div>
                                </div>
                                <h2 class="proxima_nova_semibold staff-pay-title">UPI ID</h2>
                                <div class="shift-main-inner-edit">
                                    <div class="shift-inner-sub-label-edit">
                                        <label class="shift-type-label">UPI ID <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                        <input type="text" class="form-control shift-edit-input" placeholder="Enter UPI ID" id="UPI_id" name="UPI_id">
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </form>
                <div class="staff-profile-btn">
                    <button name="" class="reject-btn staff-profile-delete-btn proxima_nova_semibold" data-bs-toggle="offcanvas" data-bs-target="#deleteModal" aria-controls="deleteModal">Delete Staff
                        <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                    </button>
                    <button type="submit" name="" id="staff_step2_btn" class="create-staff-btn staff-next-btn proxima_nova_semibold">Save
                        <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                    </button>
                </div>
            </div>

            <!-- <div class="modal fade deleteModal" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content delete_content">
                    <div class="modal-header">
                        <h5 class="modal-title proxima_nova_bold" id="deleteModalLabel">Delete Staff</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>Are you sure to delete this staff?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary close_delete_modal delete_staff_btn">Delete Staff</button>
                    </div>
                    </div>
                </div>
            </div> -->

            <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="deleteModal"
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
                    <h5 class="section_title_heading proxima_nova_bold download-work-main-header filter-title-main">Delete Staff</h5>
                    <hr>
                    <div class="staff_view_delete_title">
                        <h5>Are you sure to delete this staff?</h5>
                    </div>
                    <div class="filter-sub-sec">
                        <div class="download-cancel-btns-main">
                            <div class="download-cancel-btn mb-0">
                                <button type="submit" name="" class="download-btn proxima_nova_semibold w-100 delete_staff_btn close_delete_modal">Delete
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

            <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="deactivateModal"
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
                    <h5 class="section_title_heading proxima_nova_bold download-work-main-header filter-title-main">Deactivate Staff</h5>
                    <hr>
                    <div class="staff_view_delete_title">
                        <h5>Are you sure to deactivate this staff?</h5>
                    </div>
                    <div class="filter-sub-sec">
                        <div class="download-cancel-btns-main">
                            <div class="download-cancel-btn mb-0">
                                <button type="submit" name="" class="download-btn proxima_nova_semibold w-100 deactivate_staff_btn close_delete_modal">Deactivate
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

            <!-- <div class="profile-step step3" id="profile-step">
                <form id="staff_holiday_policy" method="post">
                <div class="staff_holiday_policy_inner_form">
                    @csrf
                    <div class="staff-view-form-profile">
                        <h2 class="proxima_nova_semibold staff-pay-title">Shift Hours</h2>
                        <div class="shift-main-inner-edit">
                            <div class="shift_hour_field">
                                <label class="shift-type-label">Set Your Shift Hours</label>
                                <input type="time" class="form-control shift-edit-input" placeholder="08:30 Hrs" name="shift_hour" id="shift_hour" value="20:00">
                            </div>
                        </div>
                    </div>
                    <div class="staff-view-form-profile">
                        <div class="holiday-policy">
                            <div>
                                <h2 class="proxima_nova_semibold staff-pay-title">Staff Weekly Holidays</h2>
                                <div class="shift-main-inner-edit">
                                    <div class="shift-inner-sub-label-edit">
                                        <label class="shift-type-label">Select Staff Weekly Holiday</label>
                                        <div class="staff-work-date">
                                            <input type="checkbox" id="single_Date" name="dateType" value="Date" checked="">
                                            <label for="Date" class="staff-setting-holiday section_sub_title">Monthly</label>
                                        </div>
                                        <div class="staff-work-date">
                                            <input type="checkbox" id="single_Date" name="dateType" value="Date">
                                            <label for="Date" class="staff-setting-holiday section_sub_title">Pay Per Work</label>
                                        </div>
                                        <div class="staff-work-date">
                                            <input type="checkbox" id="single_Date" name="dateType" value="Date">
                                            <label for="Date" class="staff-setting-holiday section_sub_title">Weekly</label>
                                        </div>
                                        <div class="staff-work-date">
                                            <input type="checkbox" id="single_Date" name="dateType" value="Date">
                                            <label for="Date" class="staff-setting-holiday section_sub_title">Daily Regular</label>
                                        </div>
                                        <div class="staff-work-date">
                                            <input type="checkbox" id="single_Date" name="dateType" value="Date">
                                            <label for="Date" class="staff-setting-holiday section_sub_title">Daily</label>
                                        </div>
                                        <div class="staff-work-date">
                                            <input type="checkbox" id="single_Date" name="dateType" value="Date">
                                            <label for="Date" class="staff-setting-holiday section_sub_title">Hourly</label>
                                        </div>
                                        <div class="staff-work-date">
                                            <input type="checkbox" id="single_Date" name="dateType" value="Date">
                                            <label for="Date" class="staff-setting-holiday section_sub_title">Monthly Regular</label>
                                        </div>
                                        <div class="staff-work-date">
                                            <input type="checkbox" id="single_Date" name="dateType" value="Date">
                                            <label for="Date" class="staff-setting-holiday section_sub_title">Hourly Regular</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="right-holiday-policy">
                                <h2 class="proxima_nova_semibold staff-pay-title">Holiday Policy</h2>
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Set Your Staff's Holiday Policy</label>
                                    <select class="form-select create-select section_sub_title">
                                        <option>Select Policy</option>
                                        <option value="web">Gujrat</option>
                                        <option value="designer">Delhi</option>
                                    </select>
                                </div>
                                <div class="staff-profile-policy">
                                    <h2 class="proxima_nova_semibold staff-pay-title">Leave Policy</h2>
                                    <div class="shift-inner-sub-label-edit">
                                        <label class="shift-type-label">Set Your Staff's Leave Policy</label>
                                        <select class="form-select create-select section_sub_title">
                                            <option>Select leave policy</option>
                                            <option value="web">Gujrat</option>
                                            <option value="designer">Delhi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="staff-view-forms">
                        <div class="staff-view-form-profile">
                            <h2 class="proxima_nova_semibold staff-pay-title">Salary Cycle</h2>
                            <div class="shift-main-inner-edit">
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Select Staff Salary Cycle</label>
                                    <input type="text" class="shift-edit-input input-group-addon salary_date  salary-calender-pickers" placeholder="1 to 1 Every Month">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="staff-profile-btn">
                        <button name="" class="reject-btn staff-profile-delete-btn proxima_nova_semibold delete_staff_btn">Delete Staff</button>
                        <button type="submit" name="" id="staff_step2_btn" class="create-staff-btn staff-next-btn proxima_nova_semibold">Save</button>
                    </div>
                </form>
            </div> -->
        </div>

@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script>

$(document).ready(function() {
    // Select the PAN_number input
    var panNumberInput = $('#PAN_number');

    // Select the submit button
    var submitButton = $('#staff_step1_btn');

    // Attach a keydown event handler to the PAN_number input
    panNumberInput.on('keydown', function(event) {
        // Check if the pressed key is 'Enter'
        if (event.key === 'Enter') {
            // Trigger the submit button click event
            submitButton.click();
        }
    });
});

var today = new Date();
    $('#date_of_birth').datepicker({
        format: 'dd M yyyy',
        autoclose: true,
        endDate: today,
    });
    $('#date_of_joining').datepicker({
        format: 'dd M yyyy',
        autoclose: true,
    });

    $('#date_of_birth').datepicker('setDate', '<?= $date_of_birthday?>');
    $('#date_of_joining').datepicker('setDate', '<?= $date_of_joining?>');

        // var formattedValue = $('#phone_number').val().replace(/(\d{5})(?!$)/g, '$1 ').trim();
        // // console.log(formattedValue);
        // var phone_number = $('#phone_number').val(formattedValue);

        $('#bank_details_form_data').click(function(){
            $('.profile-step').removeClass('active');
            $('.staff-personal-info').removeClass('staff_info_active');
            $('.info-step').removeClass('info_active');
            $('.step1').removeClass('active');
            $('#step1').removeClass('staff_info_active');
            $('.step-1').removeClass('info_active');
            $('.step2').addClass('active');
            $('#step2').addClass('staff_info_active');
            $('.step-2').addClass('info_active');
        })
        $('#personal_info_form_data').click(function(){
            $('.profile-step').addClass('active');
            $('.staff-personal-info').addClass('staff_info_active');
            $('.info-step').addClass('info_active');
            $('.step1').addClass('active');
            $('#step1').addClass('staff_info_active');
            $('.step-1').addClass('info_active');
            $('.step2').removeClass('active');
            $('#step2').removeClass('staff_info_active');
            $('.step-2').removeClass('info_active');
        })
        // var url = "{{url('')}}";
        // let uploadedDocumentMap = {};
        // Dropzone.autoDiscover = false;
        // let myDropzone = new Dropzone("div#images-dropzone",{
        //     url: '{{ route('uploadStaffDocument') }}',
        //     autoProcessQueue: false,
        //     thumbnailWidth:'50',
        //     thumbnailHeight:'50',
        //     uploadMultiple: true,
        //     addRemoveLinks: true,
        //     parallelUploads: 10,
        //     acceptedFiles: 'image/jpeg, image/jpg, image/png',
        //     dictRemoveFile: `
        //                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
        //                 <path fill-rule="evenodd" clip-rule="evenodd" d="M2.84154 2.83958C3.07296 2.60816 3.44817 2.60816 3.67959 2.83958L13.1611 12.3211C13.3925 12.5525 13.3925 12.9277 13.1611 13.1591C12.9296 13.3905 12.5544 13.3905 12.323 13.1591L2.84154 3.67763C2.61011 3.44621 2.61011 3.071 2.84154 2.83958Z" fill="#ffffff"/>
        //                 <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1611 2.83958C13.3925 3.071 13.3925 3.44621 13.1611 3.67763L3.67959 13.1591C3.44817 13.3905 3.07296 13.3905 2.84154 13.1591C2.61011 12.9277 2.61011 12.5525 2.84154 12.3211L12.323 2.83958C12.5544 2.60816 12.9296 2.60816 13.1611 2.83958Z" fill="#ffffff"/>
        //                 </svg>`,
        //     headers: {
        //         'X-CSRF-TOKEN': "{{ csrf_token() }}"
        //     },
        //     init: function () {
        //         var myDropzone = this;
        //         var staff_documents = <?php echo json_encode($staff_documents); ?>;
        //         var thumbnailUrls = [];
        //         if(staff_documents != ''){
        //             $.each(staff_documents, function(key,val) {
        //                 $('#staff_personal_info').append('<input type="hidden" name="documents[]" value="' + val.documents + '">');
        //                 thumbnailUrls.push(url+"/assets/admin/images/staff_document/"+val.documents);
        //             });
        //         }
        //         if (thumbnailUrls) {
        //             for (var i = 0; i < thumbnailUrls.length; i++) {
        //                 var imageUrl = thumbnailUrls[i];
        //                 $.ajax({
        //                     url: imageUrl,
        //                     type: 'HEAD',
        //                     async: false,
        //                     success: function (data, status, xhr) {
        //                         var sizeInBytes = xhr.getResponseHeader('Content-Length');
        //                         var sizeInKB = Math.round(sizeInBytes / 1024); // Convert to KB
        //                         var sizeInMB = (sizeInKB / 1024).toFixed(2); // Convert to MB with 2 decimal places
        //                         var mockFile = {
        //                             name: "myimage.jpg",
        //                             size: sizeInBytes,
        //                             type: 'image/jpeg',
        //                             status: Dropzone.ADDED,
        //                             url: imageUrl,
        //                             sizeInKB: sizeInKB,
        //                             sizeInMB: sizeInMB
        //                         };
        //                         myDropzone.emit("addedfile", mockFile);
        //                         myDropzone.emit("thumbnail", mockFile, imageUrl);

        //                         myDropzone.files.push(mockFile);
        //                     }
        //                 });
        //             }
        //         }
        //         this.on("successmultiple", function(data, response) {
        //             $.each(response['name'], function (key, val) {
        //                 $('#staff_personal_info').append('<input type="hidden" name="new_documents[]" value="' + val + '">');
        //                 uploadedDocumentMap[data[key].name] = val;
        //             });
        //             staffAddStep()
        //         })
        //         this.on("removedfile", function (file) {
        //             file.previewElement.remove();
        //             let name = '';
        //             if (typeof file.url !== 'undefined') {
        //                 name = file.url.substring(file.url.lastIndexOf('/') + 1);
        //             } else if (typeof file.file_name !== 'undefined') {
        //                 name = file.file_name;
        //             } else {
        //                 name = uploadedDocumentMap[file.name];
        //             }
        //             $('#staff_personal_info').append('<input type="hidden" name="remove_documents[]" value="' + name + '">');
        //             $('#staff_personal_info').find('input[name="documents[]"][value="' + name + '"]').remove();
        //         });
        //     }
        // });
        
        const phoneNumberInput = document.getElementById('phone_number');
        phoneNumberInput.addEventListener('input', function (event) {
            let value = event.target.value.replace(/\D/g, ''); // Remove non-numeric characters
            const formattedValue = formatPhoneNumber(value);
            event.target.value = formattedValue;
        });
        function formatPhoneNumber(value) {
            // Add spaces after every 5 digits
            return value.replace(/(\d{5})/g, '$1 ').trim();
        }
        function fieldValidation(){
            var valid = true;
            $(".error").remove();
            if ($('#first_name').val() == "") {
                $("#first_name").after(
                    '<span class="error error_message proxima_nova_semibold">First name field is required</span>'
                );
                valid = false;
            }
            if ($('#last_name').val() == "") {
                $("#last_name").after(
                    '<span class="error error_message proxima_nova_semibold">Last name field is required</span>'
                );
                valid = false;
            }
            if ($('#middle_name').val() == "") {
                $("#middle_name").after(
                    '<span class="error error_message proxima_nova_semibold">Middle name field is required</span>'
                );
                valid = false;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if ($('#staff_email').val() == "") {
                $("#staff_email").after(
                    '<span class="error error_message proxima_nova_semibold">Email field is required</span>'
                );
                valid = false;
            }
            else{
                if (!emailRegex.test($('#staff_email').val())) {
                    $("#staff_email").after(
                        '<span class="error error_message proxima_nova_semibold">Please enter valid Email</span>'
                    );
                    valid = false;
                }
            }
            // var filter = /^[6-9][0-9]{9}$/;
            var filter = /^[6-9]\d{4}\s\d{5}$/;
            if ($('#phone_number').val() == "") {
                $("#phone_number").after(
                    '<span class="error error_message proxima_nova_semibold">Phone number field is required</span>'
                );
                valid = false;
            } 
            else{
                if (!filter.test($('#phone_number').val())) {
                    $("#phone_number").after(
                        '<span class="error error_message proxima_nova_semibold">Please enter valid Mobile number</span>'
                    );
                    valid = false;
                }
            }
            if ($('#department_id').val() == "") {
                $("#department_error").after(
                    '<span class="error error_message proxima_nova_semibold">Department field is required</span>'
                );
                valid = false;
            }
            if ($('#salary_amount').val() == "") {
                $("#salary_amount").after(
                    '<span class="error error_message proxima_nova_semibold">Salary amount field is required</span>'
                );
                valid = false;
            }
            if ($('#salary_cycle').val() == "") {
                $("#salary_cycle").after(
                    '<span class="error error_message proxima_nova_semibold">Salary cycle field is required</span>'
                );
                valid = false;
            }
            if ($('#confirm_account_number').val() != $('#account_number').val()) {
                $("#confirm_account_number").after(
                    '<span class="error error_message proxima_nova_semibold">Confirm account number not match</span>'
                );
                valid = false;
            }
            return valid;
        }
        $('#staff_step1_btn').click(function(event) {
            event.preventDefault();
            // console.log(myDropzone.getQueuedFiles().length);
            // if(myDropzone.getQueuedFiles().length == 0){
                staffAddStep()
            // }else{
            //     myDropzone.processQueue();
            // }
        })
        function staffAddStep(){
            if(fieldValidation()) {
                
                var formData = new FormData($('#staff_personal_info')[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ route('staff_info') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response['status'] == 1) {
                            $('.loader').show();
                            $('.staff_step1_btn').prop('disabled', true);
                            // toastr["success"](response.message);
                            $('#staff_personal_info')[0].reset();
                            $('.profile-step').removeClass('active');
                            $('.staff-personal-info').removeClass('staff_info_active');
                            $('.info-step').removeClass('info_active');
                            $('.step1').removeClass('active');
                            $('.loader').hide();
                            $('#step1').removeClass('staff_info_active');
                            $('.step-1').removeClass('info_active');
                            $('.step2').addClass('active');
                            $('#step2').addClass('staff_info_active');
                            $('.step-2').addClass('info_active');
                        } else if (response['status'] == 2) {
                            // toastr["success"](response.message);
                            $("#staff_email").after(
                                '<span class="error error_message proxima_nova_semibold">'+response['message']+'</span>'
                            );
                        }else {
                            toastr["error"](response.message)
                        }
                    }
                });
            }
        }
        function bankValidation(){
            var valid = true;
            $(".error").remove();
            if ($('#account_holder_name').val() == "") {
                $("#account_holder_name").after(
                    '<span class="error error_message proxima_nova_semibold">Account holder name field is required</span>'
                );
                valid = false;
            }
            if ($('#account_number').val() == "") {
                $("#account_number").after(
                    '<span class="error error_message proxima_nova_semibold">Account number field is required</span>'
                );
                valid = false;
            }
            if ($('#confirm_account_number').val() != $('#account_number').val()) {
                $("#confirm_account_number").after(
                    '<span class="error error_message proxima_nova_semibold">Confirm account number not match</span>'
                );
                valid = false;
            }
            if ($('#IFSC_code').val() == "") {
                $("#IFSC_code").after(
                    '<span class="error error_message proxima_nova_semibold">IFSC code field is required</span>'
                );
                valid = false;
            }
            if ($('#UPI_id').val() == "") {
                $("#UPI_id").after(
                    '<span class="error error_message proxima_nova_semibold">UPI id field is required</span>'
                );
                valid = false;
            }
            return valid;
        }
        $('#staff_step2_btn').click(function (event){
            event.preventDefault();
            if(bankValidation()){
                $('.loader').show();
                $('.staff_step2_btn').prop('disabled', true);
                var formData = new FormData($('#update_bank_detail')[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ route('update_bank_details') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response['status'] == 1) {
                            // toastr["success"](response.message);
                            $('#staff_personal_info')[0].reset();
                            $('.profile-step').removeClass('active');
                            $('.staff-personal-info').removeClass('staff_info_active');
                            $('.info-step').removeClass('info_active');
                            $('.step1').removeClass('active');
                            $('#step1').removeClass('staff_info_active');
                            $('.step-1').removeClass('info_active');
                            $('.step2').removeClass('active');
                            $('#step2').removeClass('staff_info_active');
                            $('.step-2').removeClass('info_active');
                            // $('.step3').addClass('active');
                            // $('#step3').addClass('staff_info_active');
                            // $('.step-3').addClass('info_active');
                            window.location.href = "{{ url('staff') }}";
                        }else{
                            toastr["error"](response.message)
                        }
                    }
                });
            }
        })
        $('.delete_staff_btn').on('click',function (event){
            event.preventDefault();
            var staff_id = [<?=$staff[0]->id?>];
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('delete_staff') }}",
                data: {
                    selectedIds:staff_id
                },
                success: function(response) {
                    // console.log(response);
                    if (response['status'] == 1) {
                        $('.delete_staff_btn .loader').show();
                        $('.delete_staff_btn').prop('disabled', true);
                        $('.cancel_modal .loader').show();
                        $('.cancel_modal').prop('disabled', true);
                        toastr["success"](response.message);
                        setTimeout(function () {
                            window.location.href = '/staff';
                        }, 2000);
                    }else{
                        toastr["error"](response.message)
                    }
                }
            });
        })

        $('.deactivate_staff_btn').on('click',function (event){
            event.preventDefault();
            var staff_id = '<?=$staff[0]->id?>';
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('deactivate_staff') }}",
                data: {
                    staff_id:staff_id
                },
                success: function(response) {
                    // console.log(response);
                    if (response['status'] == 1) {
                        toastr["success"](response.message);
                        setTimeout(function () {
                            window.location.href = '/staff';
                        }, 2000);
                    }else{
                        toastr["error"](response.message)
                    }
                }
            });
        })

        // jQuery code
        // $(document).ready(function () {
        //     // Find all profile steps
        //     var profileSteps = $('.profile-step');
        //     var topSteps = $('.staff-personal-info');
        //     var countSteps = $('.info-step');
        //     var currentIndex = 0;
        //     function showNextStep() {
        //         profileSteps.eq(currentIndex).removeClass('active');
        //         topSteps.eq(currentIndex).removeClass('staff_info_active');
        //         countSteps.eq(currentIndex).removeClass('info_active');
        //
        //         currentIndex++;
        //
        //         if (currentIndex < profileSteps.length) {
        //             profileSteps.eq(currentIndex).addClass('active');
        //         }
        //         if (currentIndex < topSteps.length) {
        //             topSteps.eq(currentIndex).addClass('staff_info_active');
        //         }
        //         if (currentIndex < countSteps.length) {
        //             countSteps.eq(currentIndex).addClass('info_active');
        //         }
        //     }
        //     // Event handler for the "Save" button click
        //     $('.staff-next-btn').click(function () {
        //         showNextStep();
        //     });
        // });
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
            // muklti checkbox
            $('#selectAllCheckbox').on('change', function () {
                var isChecked = $(this).prop('checked');
                $('.selectCheckbox_model').prop('checked', isChecked);
            })
            // search data
            $('#staff_data_find').on('input', function () {
                var searchValue = $(this).val();
                table.search(searchValue).draw();
            });
            $('.selectCheckbox_model').change(function () {
                if ($(this).is(':checked')) {
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
        });
    </script>
@endsection