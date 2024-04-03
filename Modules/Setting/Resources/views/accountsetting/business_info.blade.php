@extends('admin.layout.main')
@section('title')
<title>{{env('APP_NAME')}} | Account Settings</title>
@endsection
@section('header-page')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-12 top-header-sub staff-summary-main">
                <div class="breadcrumbs-area clearfix">
                    <div class="breadcrumbs-sub">
                        <div class="attendance-breadcrumbs">
                            <a onclick="history.back()" class="back_button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z" fill="#050E17"></path>
                                </svg>
                            </a>
                            <h4 class="page-title pull-left proxima_nova_semibold">Business Details
                            </h4>
                        </div>

                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{route('setting')}}">Settings</a></li>
                        <li class="section_sub_title">/  Business info</li>
                        <li class="section_sub_title">/  Business Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-content-inner on-time-main main-atten">
        <form action="" id="edit_business_info" method="post">
            @csrf
            <div class="shift-main-inner-edit steff-paymeny-detail">
    
                <div class="shift-inner-sub-label-edit">
                    <label class="shift-type-label">Business Name</label>
                    <input type="text" name="business_name" class="form-control shift-edit-input" placeholder="Enter Number" value="{{$business_data[0]['name']}}">
    
                </div>
                <div class="shift-inner-sub-label-edit">
                    <label class="shift-type-label">Business Address</label>
                    <input type="text" name="business_address" class="form-control shift-edit-input" placeholder="Enter business address" value="{{$business_data[0]['business_address']}}">
    
                </div>
    
            </div>
    
            <div class="shift-main-inner-edit steff-paymeny-detail">
    
                <div class="shift-inner-sub-label-edit">
                    <label class="shift-type-label">Working Hours</label>
                    <input type="time" name="shift_hour" id="shift_hour" class="form-control hajri_shift_hours" name="time"
                    value="{{$business_data[0]['shift_hour']}}">
                </div>
                
                <div class="shift-inner-sub-label-edit">
                    <label class="shift-type-label">Bank Business</label>
                    <input type="text" name="bank_account" class="form-control shift-edit-input" placeholder="Enter Number" value="{{$business_data[0]['bank_account']}}">
                </div>
    
            </div>
    
            <div class="assign-edit-btn">
                <button name="" id="business_info_btn" class="save-staff-btn proxima_nova_semibold">Save
                <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                </button>
            </div>
        </form>

    </div>

@endsection
@section('scripts')
    <script>
        $('#business_info_btn').on('click',function(event) {
            var formData = new FormData($('#edit_business_info')[0]);
            $('.loader').show();
            $('#business_info_btn').prop('disabled', true);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('edit_business_info') }}",
                data: formData,
                processData: false,
                contentType: false,
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
        });
    </script>
@endsection