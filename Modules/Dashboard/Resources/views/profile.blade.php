@extends('admin.layout.main')
@section('title')
<title>{{env('APP_NAME')}} | My profile</title>
@endsection
@section('header-page')
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 top-header-sub">
            <div class="breadcrumbs-area clearfix">
                <div class="breadcrumbs-sub">
                    <a href="{{route('dashboard')}}" class="back_button"><svg xmlns="http://www.w3.org/2000/svg"
                            width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z"
                                fill="#050E17" />
                        </svg></a>
                    <h4 class="page-title pull-left proxima_nova_semibold">Edit Profile</h4>
                </div>
                <ul class="breadcrumbs pull-left">
                    <li class="section_sub_title"><a href="{{route('dashboard')}}">My Profile</a></li>
                    <li class="section_sub_title">/ edit profile</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="sales-report-area mb-5">
    <form id="edit_profile" method="post" novalidate="" enctype="multipart/form-dlta">
        <div class="edit_profile_form_inner">
            <div class="col-sm-6 profile-form-images">
                <div class="">
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" name="profile" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload" class="imageUpload">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M17.652 4.751L16.249 3.348C15.858 2.957 15.225 2.957 14.835 3.348L4 14.182V17H6.818L17.652 6.166C18.043 5.775 18.043 5.142 17.652 4.751Z"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M3 21H21" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M15.8708 7.95L13.0508 5.13" stroke="white" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </label>
                        </div>
                        {{-- {{$user_profile[0]->photo}}--}}
                        <div class="avatar-preview">
                            <div class="half-image">
                                @if(empty($user_profile) || !isset($user_profile[0]))
                                <img id="imagePreview" src="{{ asset('assets/admin/images/dummy/dummy-user.svg') }}"
                                    alt="Image Preview 1">
                                @else
                                <img id="imagePreview"
                                    src="{{asset('assets/admin/images/profile/'.$user_profile[0]->photo)}}"
                                    alt="Image Preview 1">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 profile-main-form">
                <div class="row">
                    <div class="col-sm-6 profile_col_main_field">
                        <div class="form-group">
                            <label class="profile-field-label">Your Name</label>
                            <input type="text" class="form-control profile-field" name="name" id="name"
                                value="{{$user->name}}" required="" placeholder="Enter Your Name">
                        </div>
                    </div>
                    <div class="col-sm-6 profile_col_main_field">
                        <div class="form-group">
                            <label class="profile-field-label">Business Name</label>
                            <input type="text" class="form-control profile-field" required="" name="business_name"
                                id="business_name" value="{{$business_data[0]->name}}"
                                placeholder="Enter business name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 profile_col_main_field">
                        <div class="form-group">
                            <label class="profile-field-label">Email ID</label>
                            <input type="email" class="form-control profile-field" name="email" id="email"
                                value="{{$user->email}}" required="" placeholder="Enter email address" readonly>
                        </div>
                    </div>
                    <div class="col-sm-6 profile_col_main_field">
                        <div class="form-group">
                            <label class="profile-field-label">Phone Number</label>
                            <input type="number" class="form-control profile-field" name="phone_number"
                                id="phone_number" value="{{$user->phone_number}}" required=""
                                placeholder="Enter Phone Number" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 profile_col_main_field">
                        <div class="form-group profile-business-space">
                            <label class="profile-field-label">Business Address</label>
                            <textarea class="form-control profile-field-textarea" name="business_address"
                                id="business_address" rows="4" required=""
                                placeholder="Enter Business Address">{{$business_data[0]->business_address}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-main-btn">
            <button type="submit" class="proxima_nova_semibold profile-edit-submit-btn">Save
                <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
            </button>
        </div>
    </form>
</div>
@endsection
@section('scripts')
<script>
    $('#edit_profile').submit(function (event) {
        event.preventDefault();
        $('.loader').show();
        $('.profile-edit-submit-btn').prop('disabled', true);
        var formData = new FormData($(this)[0]);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: "{{route('edit-profile')}}",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response['status'] == 1) {
                    toastr["success"](response.message)
                    setTimeout(function () {
                        window.location.href = '/dashboard';
                    }, 3000);
                } else {
                    toastr["error"](response.message)
                }
            }
        });
    })
    function updateImagePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imagePreview').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Trigger the updateImagePreview function when a file is selected
    $('#imageUpload').change(function () {
        updateImagePreview(this);
    });
</script>
@endsection