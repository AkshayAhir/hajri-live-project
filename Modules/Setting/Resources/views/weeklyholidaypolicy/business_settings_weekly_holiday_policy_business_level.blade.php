    @extends('admin.layout.main')
@section('title')
    <title>{{env('APP_NAME')}} | Weekly Holiday Template</title>
@endsection
@section('header-page')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="top-header-sub">
                <div class="breadcrumbs-area clearfix">
                    <div class="breadcrumbs-sub">
                    <a onclick="history.back()" class="back_button"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z" fill="#050E17"></path>
                        </svg></a>
                        <h4 class="page-title pull-left proxima_nova_semibold">Weekly Holiday Policy
                        </h4>
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{route('setting')}}">Settings</a></li>
                        <li class="section_sub_title">/  Business settings</li>
                        <li class="section_sub_title">/  Weekly holiday policy</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-content-inner">
        <div class="weekly-top-nots">
            <h2 class="proxima_nova_semibold">Weekly Holidays Policy</h2>
            <p class="">Assign weekly off days of your business to automatically mark attendance for
                those days</p>
        </div>

        <div class="leavel-data">
            <div>
                <h2 class="proxima_nova_semibold section_sub_title">Weekly Off Preference</h2>
            </div>
            <div>
                <p>Choose if you wish to keep same holidays for all your staff or different</p>
            </div>
            <div class="leavel-btn">
                <button class="business-level proxima_nova_semibold level-active">Business Level</button>
                <button type="button" class="staff-level proxima_nova_semibold " data-bs-toggle="offcanvas" data-bs-target="#create-toggle-right" aria-controls="create-toggle-right">Staff Level</button>
            </div>
        </div>
        <form id="business_holiday_form" class="business_weekly_holiday_inner_form">
            <div class="staff-view-profile-main">
                <div class="holiday-days">
                    <h2 class="proxima_nova_semibold staff-pay-title">Holiday Days</h2>
                    <div class="shift-main-inner-edit">
                        <div class="shift-inner-sub-label-edit">
                            <div class="staff-work-date">
                                <input type="checkbox" class="days" name="sunday" id="sunday" value="0">
                                <label for="sunday"
                                    class="staff-setting-holiday section_sub_title">Sunday</label>
                            </div>
                            <div class="staff-work-date">
                                <input type="checkbox" class="days" name="monday" id="monday" value="1">
                                <label for="monday" class="staff-setting-holiday section_sub_title">Monday</label>
                            </div>
                            <div class="staff-work-date">
                                <input type="checkbox" class="days" name="Tuesday" id="Tuesday" value="2">
                                <label for="Tuesday" class="staff-setting-holiday section_sub_title">Tuesday</label>
                            </div>
                            <div class="staff-work-date">
                                <input type="checkbox" class="days" name="wednesday" id="wednesday" value="3">
                                <label for="wednesday" class="staff-setting-holiday section_sub_title">Wednesday</label>
                            </div>
                            <div class="staff-work-date">
                                <input type="checkbox" class="days" name="thursday" id="thursday" value="4">
                                <label for="thursday" class="staff-setting-holiday section_sub_title">Thursday</label>
                            </div>
                            <div class="staff-work-date">
                                <input type="checkbox" class="days" name="friday" id="friday" value="5">
                                <label for="friday" class="staff-setting-holiday section_sub_title">Friday</label>
                            </div>
                            <div class="staff-work-date">
                                <input type="checkbox" class="days" name="saturday" id="saturday" value="6">
                                <label for="saturday" class="staff-setting-holiday section_sub_title">Saturday</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="staff-profile-btn">
            <button name="" class="create-staff-btn staff-next-btn proxima_nova_semibold" id="save_weekly_business_holiday">Save
                <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
            </button>
        </div>
    </div>

    <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="create-toggle-right"
        data-bs-scroll="true" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <div class="popup-close-btns" data-bs-dismiss="offcanvas" aria-label="Close"><svg
                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M2.84154 2.84056C3.07296 2.60914 3.44817 2.60914 3.67959 2.84056L13.1611 12.322C13.3925 12.5535 13.3925 12.9287 13.1611 13.1601C12.9296 13.3915 12.5544 13.3915 12.323 13.1601L2.84154 3.67861C2.61011 3.44719 2.61011 3.07198 2.84154 2.84056Z"
                        fill="#808080" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M13.1611 2.84056C13.3925 3.07198 13.3925 3.44719 13.1611 3.67861L3.67959 13.1601C3.44817 13.3915 3.07296 13.3915 2.84154 13.1601C2.61011 12.9287 2.61011 12.5535 2.84154 12.322L12.323 2.84056C12.5544 2.60914 12.9296 2.60914 13.1611 2.84056Z"
                        fill="#808080" />
                </svg></div>
        </div>
        <div class="offcanvas-body overflow-auto">
            <h5 class="section_title_heading proxima_nova_bold download-work-main-header filter-title-main">
                Switch to Staff
                level?</h5>
            <hr>
            <div class="filter-sub-sec">
                <form method="" class="switch_staff_level_form">
                    <div class="daily-work-select business_swith_staff">
                        <h2 class="holiday-staff-select  proxima_nova_semibold">Your current weekly off setting will be removed.
                        </h2>
                    </div>
                </form>
                <div class="download-cancel-btns-main">
                    <div class="holiday-data-save-btn">
                        <button name="" class="continue_btn download-btn proxima_nova_semibold w-100">Continue</button>
                        <button name="" class="cancel-btn-btn proxima_nova_semibold w-100" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>        
@endsection
@section('scripts')
    <script>

        $('.continue_btn').on("click", function(){
            window.location.href = "{{ url('setting/weekly_holiday_policy_staff_level') }}";
        });

        var checkDays = [];
        var uncheckDays = [];
        $('.days').on("click", function(){
            var val = $(this).val();
            if ($(this).is(':checked')) {
                checkDays.push(val);
                const index = uncheckDays.indexOf(val);
                if (index !== -1) {
                    uncheckDays.splice(index, 1);
                }
            } else {
                const index = checkDays.indexOf(val);
                if (index !== -1) {
                    checkDays.splice(index, 1);
                }                
                if (!uncheckDays.includes(val)) {
                    uncheckDays.push(val);
                }
            }
        });

        function fieldValidation() {
            var valid = true;
            $(".error").remove();
            if (!$(".days:checked").length > 0) {
                $("#business_holiday_form").after(
                    '<span class="error error_message proxima_nova_semibold">Check at least one day.</span>'
                );
                valid = false;
            }
            return valid;
        }
        
        $('#save_weekly_business_holiday').on('click',function(event){       
            event.preventDefault();
            $('.loader').show();
            $('#save_weekly_business_holiday').prop('disabled', true);
            if(fieldValidation()){
                var id = <?php echo $business_id?>;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ route('save_weekly_business_holiday') }}",
                    data: {
                        'checkDays':checkDays,
                        'uncheckDays':uncheckDays,
                        'id':id
                    },
                    success: function(response) {
                        if ( response['status'] == 1){
                            checkDays = [];
                            uncheckDays = [];
                            toastr["success"](response.message);
                            setTimeout(function () {
                                window.location.href = '/setting';
                            }, 3000);
                        } else {
                            toastr["error"](response.message)
                        }
                    }
                });
            }
        })

        $(document).ready(function(){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('business_holiday') }}",
                success: function(response) {
                    // console.log(response);
                    if ( response['status'] == 1){                        
                        response['business_holiday'].forEach(function(holiday) {
                            if(holiday == 0){
                                $('#sunday').prop("checked", true);
                            }
                            if(holiday == 1){
                                $('#monday').prop("checked", true);
                            }
                            if(holiday == 2){
                                $('#tuesday').prop("checked", true);
                            }
                            if(holiday == 3){
                                $('#wednesday').prop("checked", true);
                            }
                            if(holiday == 4){
                                $('#thursday').prop("checked", true);
                            }
                            if(holiday == 5){
                                $('#friday').prop("checked", true);
                            }
                            if(holiday == 6){
                                $('#saturday').prop("checked", true);
                            }
                        });                                            
                    } else {
                        toastr["error"](response.message)
                    }
                }
            });
        })
    </script>
@endsection