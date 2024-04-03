@extends('admin.layout.main')
@section('title')
<title>{{env('APP_NAME')}} | Account Settings</title>
@endsection
@section('header-page')
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="top-header-sub">
            <div class="breadcrumbs-area clearfix">
                <div class="breadcrumbs-sub">
                    <a onclick="history.back()" class="back_button"><svg xmlns="http://www.w3.org/2000/svg" width="12"
                            height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z"
                                fill="#050E17"></path>
                        </svg></a>
                    <h4 class="page-title pull-left proxima_nova_semibold">Profile Details
                    </h4>
                </div>
                <ul class="breadcrumbs pull-left">
                    <li class="section_sub_title"><a href="http://139.59.38.20/setting">Settings</a></li>
                    <li class="section_sub_title">/ Account settings</li>
                    <li class="section_sub_title">/ Login details</li>
                    <li class="section_sub_title">/ Manage Business</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="main-content-inner">

    <div class="col-sm-12 shift-setting-main account_setting_login_details">
        <form method="">
            @csrf
            <div class="hajri-salary-pays-main">
                <div class="account-detail-main-sub-edit">

                    <div class="shift-main-inner-edit">
                        <div class="shift-inner-sub-label-edit">
                            <label class="shift-type-label">Phone Number</label>
                            <input type="text" oninput='mobiledigit(this)' class="form-control shift-edit-input"
                                name="phone_number" value="{{$login_user['phone_number']}}" id="phone_number"
                                maxlength="10">

                        </div>
                        <div class="shift-inner-sub-label-edit">
                            <label class="shift-type-label">Email ID</label>
                            <input type="email" class="form-control shift-edit-input" id="email"
                                placeholder="Enter email" value="{{$login_user['email']}}">

                        </div>
                    </div>

                    <div class="shift-main-inner-edit">
                        <div class="shift-inner-sub-label-edit">

                            <!-- <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Subscription Plan</label>
                                <a href="#" class="month-calculatr-click">
                                    <div class="form-control shift-edit-input manager-login-arrow">Enter subscription
                                        plan
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 18 18" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.69675 14.1099C5.30942 13.7226 5.30942 13.0946 5.69675 12.7072L9.40358 9.00038L5.69675 5.29354C5.30942 4.90621 5.30942 4.27821 5.69675 3.89087C6.08409 3.50354 6.71208 3.50354 7.09942 3.89087L11.5076 8.29904C11.8949 8.68638 11.8949 9.31438 11.5076 9.70172L7.09942 14.1099C6.71209 14.4972 6.08409 14.4972 5.69675 14.1099Z"
                                                fill="#050E17" />
                                        </svg>
                                    </div>
                                </a>
                            </div> -->
                            <!-- <div class="shift-inner-sub-label-edit">
                            <label class="shift-type-label">Manage Business</label>
                            <a href="{{ route('manage_business') }}" class="month-calculatr-click">
                                <div class="form-control shift-edit-input manager-login-arrow">Manage business
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                        fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5.69675 14.1099C5.30942 13.7226 5.30942 13.0946 5.69675 12.7072L9.40358 9.00038L5.69675 5.29354C5.30942 4.90621 5.30942 4.27821 5.69675 3.89087C6.08409 3.50354 6.71208 3.50354 7.09942 3.89087L11.5076 8.29904C11.8949 8.68638 11.8949 9.31438 11.5076 9.70172L7.09942 14.1099C6.71209 14.4972 6.08409 14.4972 5.69675 14.1099Z"
                                            fill="#050E17" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                        <a href="{{ route('new_business_account') }}" class="proxima_nova_bold">+ Add New Business</a> -->

                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="account-business-save-btn">
                    <button name="" id="save_login_detail" class="create-staff-btn proxima_nova_semibold">Save
                        <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                    </button>
                </div>
            </div>
            <form>
    </div>

</div>
@endsection
@section('scripts')
<script>
    let mobiledigit = function (ele) {
        ele.value = ele.value.replace(/[^0-9]/g, '').slice(0, 10);
    }
    function fieldvalidation() {
        var valid = true;
        $(".error").remove();
        var filter = /^[6-9][0-9]{9}$/;
        if ($('#phone_number').val() == "") {
            $("#phone_number").after(
                '<span class="error error_message proxima_nova_semibold">Mobile number field is required</span>'
            );
            valid = false;
        } else if ($('#phone_number').val() != "") {
            if (!filter.test($('#phone_number').val())) {
                $("#phone_number").after(
                    '<span class="error error_message proxima_nova_semibold">Please enter valid Mobile number</span>'
                );
                valid = false;
            }
        }
        return valid;
    }
    
    var category_id;
    $('.select_business_category').click(function () {
        category_id = $(this).data('id');
    })
    $('#save_login_detail').click(function () {
        var phone_number = $('#phone_number').val();
        var email = $('#email').val();
        // alert(category_id);
        if (fieldvalidation()) {
            $('.loader').show();
            $('#save_login_detail').prop('disabled', true);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('edit_account') }}",
                data: {
                    'phone_number': phone_number,
                    'email': email,
                    'select_business_category': category_id,
                },
                success: function (response) {
                    if (response['status'] == 1) {
                        toastr["success"](response.message)
                        setTimeout(function () {
                            var redirectUrl = "{{ url('setting') }}"
                            window.location.href = redirectUrl;
                        }, 3000);
                    } else {
                        toastr["error"](response.message)
                    }
                }
            });
        }
    });

</script>
@endsection