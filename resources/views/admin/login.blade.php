<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{env('APP_NAME')}} | Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/login.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/admin/css/font.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
</head>

<body>
<div class="">
    <div class="hajri-signup">
        <div class="hajri-left-bg">

            <div class="hajri-main-logo">
                <img src="{{asset('assets/admin/images/login/logo.svg')}}" alt="">
            </div>

            <div class="hajri-steps">
                <div class="navigation_menu" id="navigation_menu">
                    <ul class="navigation_tabs" id="navigation_tabs">
                        <li class="tab_active">
                            <div class="nav-active">
                                <h2 class="nav-tab-title proxima_nova_semibold">Your details</h2>
                                <span class="nav-tab-des">Enter your mobile number.</span>
                            </div>
                        </li>
                        <li class="">
                            <div class="nav-active">
                                <h2 class="nav-tab-title proxima_nova_semibold">Business information</h2>
                                <span class="nav-tab-des">One step away to move your business online.</span>
                            </div>
                        </li>
                        <li class="">
                            <div class="nav-active">
                                <h2 class="nav-tab-title proxima_nova_semibold">Salary structure</h2>
                                <span class="nav-tab-des">Define salary calculation method & working hours.</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="navigation_menu_mobile" id="navigation_menu">
                    <ul class="navigation_tabs" id="navigation_tabs_mobile">
                        <li class="tab_actives">
                            <div class="nav-active">
                                <h2 class="nav-tab-title proxima_nova_semibold">Your details</h2>
                            </div>
                        </li>
                        <li class="">
                            <div class="nav-active">
                                <h2 class="nav-tab-title proxima_nova_semibold">Business information</h2>
                            </div>
                        </li>
                        <li class="">
                            <div class="nav-active">
                                <h2 class="nav-tab-title proxima_nova_semibold">Salary structure</h2>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="hajri-main-footer">
                <h2 class="footer-title proxima_nova_bold">Hajri<span class="footer-title-sub">.app</span></h2>
                <p class="footer-content proxima_nova_semibold">Seamless Solutions for Workforce Management</p>
                <div class="footer-inner-sec">
                    <p class="footer-number proxima_nova_semibold">+91 8460460916</p>
                    <p class="footer-email proxima_nova_semibold">hajri.app@gmail.com</p>
                </div>

            </div>
        </div>
        <div class="hajri-left-right">
            <div class="hajri-main-right">
                <form id="mobile-form" method="" action="">
                    @csrf
                    <input type="hidden" id="user_id" name="user_id">
                    <div class="hajri-right step" id="step-1">
                        <div class="hajri-right-main-logo">
                            <img src="{{asset('assets/admin/images/login/icon2.svg')}}" alt="">
                        </div>
                        <div class="hajri-right-text">
                            <h1 class="hajri-right-title proxima_nova_semibold">Your Details</h1>
                            <p class="hajri-right-con proxima_nova_semibold">Provide your mobile number</p>

                            <div class="hajri-phone-number" id="edit-mobile" >
                                <div class="form-group" id="error">
                                    <label for="exampleInputPassword1" class="form-label phone-field">Phone Number</label>
                                    <input type="text" id="mobile_code" oninput='mobiledigit(this)' class="form-control phone_input" placeholder="Phone Number" name="phone_number" maxlength="11">
                                </div>
                                <div class="hajri-form-btn">
                                    <button type="button" name="" class="hajri-submit-btnss">Submit</button>
                                </div>
                            </div>

                            <div class="hajri-phone-otp">
                                <div class="hajri-inner-otp">
                                    <p class="otp_num proxima_nova_semibold" id="otp_num"></p>
                                    <img class="phone-number-text" src="{{asset('assets/admin/images/login/icon-edit.svg')}}" alt="" style="cursor:pointer">
                                </div>
                                <div class="hajri-inner-text">
                                    <p class="digit_text">4-Digit Verification Code</p>
                                </div>
                                <div class="text-center digit-num">
                                    <div class="digit-main-num">
                                        <div class="digit-inner-num">
                                            <input class="otp digit_number" type="number" oninput='digitValidate(this)' onkeyup='tabChange(1)' maxlength=1>
                                            <input class="otp digit_number" type="number" oninput='digitValidate(this)' onkeyup='tabChange(2)' maxlength=1>
                                            <input class="otp digit_number" type="number" oninput='digitValidate(this)' onkeyup='tabChange(3)' maxlength=1>
                                            <input class="otp digit_number" type="number" oninput='digitValidate(this)' onkeyup='tabChange(4)' maxlength=1>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-loader">
                                    <img src="{{asset('assets/admin/images/login/loading.gif')}}">
                                    <p class="inner-loadr-text">Waiting for OTP</p>
                                </div>
                                <div class="main-counter">
                                    <a class="resend_otp" style="cursor:pointer"> Resend OTP</a>
                                    <span id="countdowntimer"></span>
                                </div>

                                <div class="hajri-form-btn form-btn-otp-btn">
                                    <button type="button" name="" class="hajri-submit-btn-submit otp-button">Submit
                                        <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                                    </button>
                                </div>

                            </div>
                            <div class="hajri-form-link">
                                <p>Having trouble login? <a href="#"> Contact Admin</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="hajri-right step" id="step-2">
                        <div class="hajri-right-main-logo">
                            <img src="{{asset('assets/admin/images/login/business.svg')}}" alt="">
                        </div>
                        <div class="hajri-right-text">
                            <h1 class="hajri-right-title proxima_nova_semibold">Business Information</h1>
                            <p class="hajri-right-con proxima_nova_semibold">One step away to move your business
                                online</p>

                            <div class="hajri-busi-field">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="form-label business-info-field">Your Name</label>
                                    <div class="input_form-fields">
                                        <input type="text" class="form-control input-field-form" placeholder="Your Name" id="name" name="name">
                                    </div>
                                </div>
                                <div class="form-group hajri-form-info">
                                    <label for="exampleInputPassword1" class="form-label business-info-field">Business Name</label>
                                    <div class="input_form-fields">
                                        <input type="text" class="form-control input-field-form" placeholder="Enter business name" id="business_name" name="business_name">
                                    </div>
                                </div>
                                <div class="form-group hajri-form-info">
                                    <label for="exampleInputPassword1" class="form-label business-info-field">Email ID</label>
                                    <div class="input_form-fields">
                                        <input type="email" class="form-control input-field-form" placeholder="Enter email address" id="email" name="email">
                                    </div>
                                </div>
                                <div class="form-group hajri-form-info">
                                    <label for="exampleInputPassword1" class="form-label business-info-field">Business Address</label>
                                    <div class="input_form-fields">
                                        <input type="email" class="form-control input-field-form" placeholder="Enter business address" id="business_address" name="business_address">
                                    </div>
                                </div>
                            </div>
                            <div class="hajri-form-btn">
                                <button type="button" name="" class="hajri-continue-btn hajri-submit-btn step-2-continue-button">Continue</button>
                            </div>
                        </div>
                    </div>

                    <div class="hajri-right step" id="step-3">
                        <div class="hajri-right-inner">
                            <div class="hajri-right-main-logo">
                                <img src="{{asset('assets/admin/images/login/salary.svg')}}" alt="">
                            </div>
                            <div class="hajri-right-text">
                                <div class="hajri-main-con">
                                    <h1 class="hajri-right-title hajri-step-3-title proxima_nova_semibold">How do you pay your salary?</h1>
                                    <p class="hajri-right-con hajri-step-3-con proxima_nova_semibold">Define salary calculation method & working hours</p>
                                </div>
                                <div class="hajri-salary-field">
                                    <div class="hajri-salary-pay-main">
                                        <div class="hajri-salary-pay-inner">
                                            <div class="salary-main-box">
                                                <div class="salary-inner-input">
                                                    <input type="radio" name="salary_calculation" value="month">
                                                </div>
                                                <div class="salary-inner-label">
                                                    <label class="radio-button-container proxima_nova_semibold">Total days in month :</label>
                                                    <p class="salary-date">Ex : January - 31 days, February - 28 days</p>
                                                    <span class="salary-days">Salary/day = total salary / 30</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="hajri-salary-pay-main salary_pay_gap">
                                        <div class="hajri-salary-pay-inner">
                                            <div class="salary-main-box">
                                                <div class="salary-inner-input">
                                                    <input type="radio" name="salary_calculation" value="calculate">
                                                </div>
                                                <div class="salary-inner-label">
                                                    <label class="radio-button-container proxima_nova_semibold">Calculate 30 days for each month :</label>
                                                    <p class="salary-date">Ex : January - 30 days, February - 30 days</p>
                                                    <span class="salary-days">(Per day salary = Salary/No. of days in month)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hajri-salary-pay-main salary_pay_gap">
                                        <div class="hajri-salary-pay-inner">
                                            <div class="salary-main-box">
                                                <div class="salary-inner-input">
                                                    <input type="radio" name="salary_calculation" value="days">
                                                </div>
                                                <div class="salary-inner-label">
                                                    <label class="radio-button-container proxima_nova_semibold">Count only working days :</label>
                                                    <p class="salary-date">Ex : January - 22 workdays, 8 weekend days</p>
                                                    <span class="salary-days">(Per day salary = Total Salary / Workdays)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hajri-form-btn">
                                <button type="button" name="" class="hajri-continue-btns">Continue</button>
                            </div>
                        </div>
                        <div class="hajri-right-sub-inner">
                            <div class="hajri-right-main-logo">
                                <img src="{{asset('assets/admin/images/login/salary.svg')}}" alt="">
                            </div>
                            <div class="hajri-right-text">
                                <div class="hajri-main-con">
                                    <h1 class="hajri-right-title hajri-step-3-title proxima_nova_semibold">Salary Structure</h1>
                                    <p class="hajri-right-con hajri-step-3-con proxima_nova_semibold">Define salary calculation method & working hours </p>
                                    <p class="hajri-structure proxima_nova_semibold">How long do staff work in one shift?</p>
                                </div>
                                <div class="hajri-salary-field">
                                    <div class="form-group login_shift_hours_group">
                                        <label for="exampleInputPassword1" class="form-label shift-hour-label">Shift Hours</label>
                                        <div class="salary-stru-field">
                                            <input type="time" class="form-control hajri_shift_hours" placeholder="08:30 Hrs" name="shift_hour" id="shift_hour" value="08:30:00">
                                            
                                        </div>
                                    </div>
                                    <div class="hajri-form-btn">
                                        <button type="button" name="" class="hajri-continue-btn hajri-submit-btn step-3-button">Continue</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div id="progress-dots">
                <span class="dot active" id="dot-1"></span>
                <span class="dot" id="dot-2"></span>
                <span class="dot" id="dot-3"></span>
            </div>


        </div>
        <div class="hajri-main-footer-mobile">
            <h2 class="footer-title proxima_nova_bold">Hajri<span class="footer-title-sub">.app</span></h2>
            <p class="footer-content proxima_nova_semibold">Seamless Solutions for Workforce Management</p>
            <div class="footer-inner-sec">
                <p class="footer-number proxima_nova_semibold">+91 8460460916</p>
                <p class="footer-email proxima_nova_semibold">hajri.app@gmail.com</p>
            </div>
        </div>
    </div>
</div>

</body>

</html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $('.loader').hide();
    var currentStep = 1;

    function changeStep(step) {
        // Remove the "tab_active" and "tab_inactive" classes from all "li" elements
        $("#navigation_tabs li").removeClass("tab_active");

        // Add the appropriate class to the "li" element based on the current step
        $("#navigation_tabs li").eq(step - 1).addClass("tab_active");
        $("#navigation_tabs li:lt(" + (step - 1) + ")").addClass("tab_active");

        $("#navigation_tabs_mobile li").removeClass("tab_actives");

        // Add the appropriate class to the "li" element based on the current step
        $("#navigation_tabs_mobile li").eq(step - 1).addClass("tab_actives");
        $("#navigation_tabs_mobile li:lt(" + (step - 1) + ")").addClass("tab_actives");

        $(".step").hide();
        $("#step-" + step).show();

        $(".nav-active").removeClass("nav_field_active");
        $(".nav-active").eq(step - 1).addClass("nav_field_active");

        $(".dot").removeClass("active");
        $("#dot-" + step).addClass("active");
    }

    changeStep(currentStep);
    // multi country num
    $("#mobile_code").intlTelInput({
        initialCountry: "in",
        separateDialCode: true,
    });
    function getAll() {
        var allData = {};
        var keys = Object.keys(localStorage);
        for (var i = 0; i < keys.length; i++) {
            var key = keys[i];
            if (key.toLowerCase().startsWith('data_')) {
                var scenarioNumber = key;
                var storeData = localStorage.getItem(key);
                if (storeData !== null) {
                    allData[scenarioNumber] = JSON.parse(storeData);
                }
            }
        }
        return allData;
    }
    // number and otp screen chnage
    $(document).ready(function () {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "2000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        // $(".hajri-phone-otp").hide();
        $(".hajri-submit-btn").click(function () {
            $(".hajri-phone-number").hide()
            $(".hajri-phone-otp").show();
        });
        var allDatas = getAll();

        if(Object.keys(allDatas).length === 0 && allDatas.constructor === Object){
            window.location.href = '/';
        } 
    });
    function getAll() {
        var allData = {};
        var keys = Object.keys(localStorage);
        for (var i = 0; i < keys.length; i++) {
            var key = keys[i];
            if (key.toLowerCase().startsWith('data_')) {
                var scenarioNumber = key;
                var storeData = localStorage.getItem(key);
                if (storeData !== null) {
                    allData[scenarioNumber] = JSON.parse(storeData);
                }
            }
        }
        return allData;
    }
    $(document).ready(function () {
        var allDatas = getAll();
        var otp = allDatas.data_register_number.otp;
        otp = otp.toString();
        $('.otp.digit_number').each(function(index) {
            // console.log(otp);
            $(this).val(otp.charAt(index));
        });
    
        if (Object.keys(allDatas).length === 0) {
            $(".hajri-phone-number").css("display", "");
            $(".hajri-phone-otp").css("display", "none");
        } else {
            if(allDatas.data_register_number != "") {
                $('#otp_num').text('+91 ' + allDatas.data_register_number.phone_number);
                $('#mobile_code').val(allDatas.data_register_number.phone_number);
                $(".hajri-phone-number").css("display", "none");
                $(".hajri-phone-otp").css("display", "");
                $("#step-2").removeClass("step");
                // changeStep(1);

            }
            if(allDatas.data_otp){
                $(".hajri-phone-number").css("display", "none");
                $(".hajri-phone-otp").css("display", "none");
                $("#step-1").addClass("d-none");
                // $("#step-2").removeClass("step");
                changeStep(2);
            }
            if(allDatas.data_business_information){
                $(".hajri-phone-number").css("display", "none");
                $("#step-2").addClass("d-none");
                $("#step-3").removeClass("step");
                changeStep(3);
            }
            if(allDatas.data_salary_calculation) {
                $(".hajri-phone-number").css("display", "none");
                $("#step-3").removeClass("step");
                $(".hajri-right-inner").addClass("hajri_salary_none").hide();
                $(".hajri-right-sub-inner").show();
            }
        }
    });    

    let digitValidate = function (ele) {
        // console.log(ele.value);
        ele.value = ele.value.replace(/[^0-9]/g, '').slice(0, 1);
    }

    let mobiledigit = function (ele) {
        ele.value = ele.value.replace(/[^0-9]/g, '').slice(0, 10);
    }

    // add otp text
    let tabChange = function (val) {
        let ele = document.querySelectorAll('.digit-inner-num input');
        if (ele[val - 1].value != '') {
            ele[val].focus();
            $('.otp-button').removeAttr('disabled');
            $('.main-loader').css("display", "none");
        } else if (ele[val - 1].value == '') {
            ele[val - 2].focus();
            // $('.hajri-submit-btn-submit').attr('disabled', 'disabled');
        }
    }

    //  timer
    var downloadTimer;
    function countdown(){
        $('.resend_otp').hide();
        clearInterval(downloadTimer);
        var timeleft = 30;
        downloadTimer = setInterval(function () {
        var minutes = Math.floor(timeleft / 60);
        var seconds = timeleft % 60;

        // Add leading zeros if necessary
        var minutesStr = (minutes < 10) ? "0" + minutes : minutes.toString();
        var secondsStr = (seconds < 10) ? "0" + seconds : seconds.toString();
        // Display the time in the "00:26" format
        document.getElementById("countdowntimer").textContent = minutesStr + ":" + secondsStr;

        timeleft--;

        if (timeleft <= -1){
            $('.resend_otp').show(); 
            clearInterval(downloadTimer);
        }
        }, 1000);
    }
    countdown();
    $("#edit-mobile").hide();
    $(".phone-number-text").click(function () {
        // $(this).hide();
        localStorage.clear();
        var phone_number = $('#mobile_code').val();
        var phone_number = phone_number.replace(/\s/g, '');

        // if (phone_number.length >= 10) {
            // phone_number.replace(/(\d{5})/g, '$1 ').trim();
            var formattedValue = phone_number.replace(/(\d{5})/g, '$1 ').trim();
            var phone_number = $('#mobile_code').val(formattedValue);
        // }
        // window.location.href = '/';
        $("#edit-mobile").show();
        $(".hajri-phone-otp").css("display", "none");
    });

    // multi step dots hide show
    // $(document).ready(function () {

        // function changeStep(step) {

        //     $(".dot").removeClass("active");
        //     $("#dot-" + step).addClass("active");

        // }
    // });

    // Handle "Submit" button click
    $(".otp-button").click(function () {
        // $('.otp-button').removeAttr('disabled');
        var allDatas = getAll();

        var inputElements = $('.digit-inner-num input');
        var otp = '';
        inputElements.each(function() {
            otp += $(this).val();
        });
        var phone_number = $('#mobile_code').val();
        var phone_number = phone_number.replace(/\s/g, '');
        // console.log(otp);
        if($('#countdowntimer').html() === "00:00"){
            toastr["error"]('Time out resend otp');
        } else {
            $('.otp-button').prop('disabled', true);
            $('.loader').show();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('verify_otp') }}",
                data: {
                    "otp":otp,
                    "phone_number":allDatas.data_register_number.phone_number
                },
                success: function(response) {
                    // console.log(response);
                    if (response['status'] == 1) {
                        $('.phone-number-text').removeAttr('style');
                        localStorage.setItem('data_otp', true);
                        // toastr["success"](response.message)
                        var isValid = true;

                        if (isValid) {
                            currentStep++;
                            changeStep(currentStep);
                        } else {
                            $(".error_message").show();
                        }
                    }else if(response['status'] == 2){
                        $('.phone-number-text').removeAttr('style');
                        localStorage.clear();
                        toastr["success"](response.message)
                        setTimeout(function () {
                            window.location.href = '/dashboard';
                        }, 3000);
                    }
                    else {
                        toastr["error"](response.message)
                    }
                }
            });
        }

    });

    // multi step
    // $(document).ready(function () {
    //     $(".hajri-submit-btn").click(function () {
    //         var currentTab = $("ul.navigation_tabs li.tab_active");
    //         if (currentTab.next().length > 0) {
    //             currentTab.removeClass("tab_active").addClass("tab_active");

    //             currentTab.next().removeClass("tab_inactive").addClass("tab_active");
    //         }
    //     });
    // });
    

    // $(document).ready(function () {

        // step 3 radio button
    $("input[type='radio']").change(function () {
        $(".hajri-salary-pay-main").removeClass("border-color-checked");

        $(this).closest(".hajri-salary-pay-main").addClass("border-color-checked");
    });

    // step 3 hide show
    function salaryvalidation(){
        var valid = true;
        $(".error").remove();
        if ($('input[name=salary_calculation]:checked').length <= 0) {      
            $(".hajri-salary-field").after(
                '<span class="error error_message proxima_nova_bold">Business name is required</span>'
            );
            valid = false;
        }       
        return valid;
    }
    $(".hajri-right-sub-inner").hide();
    $(".hajri-continue-btns").click(function () {
        if(salaryvalidation()){
            var selectedValue = $('input[name="salary_calculation"]:checked').val();
            var newItemData = [{
                salary_calculation:selectedValue,
            }];
            localStorage.setItem('data_salary_calculation', JSON.stringify(newItemData[0]));
            $(".hajri-right-inner").addClass("hajri_salary_none").hide();
            $(".hajri-right-sub-inner").show();
        }
    });
    // });
    const phoneNumberInput = document.getElementById('mobile_code');

    // Add an input event listener to format the phone number
    phoneNumberInput.addEventListener('input', function (event) {
        let value = event.target.value.replace(/\D/g, ''); // Remove non-numeric characters
        const formattedValue = formatPhoneNumber(value);
        event.target.value = formattedValue;
    });

    // Function to format the phone number with spaces after every 5 digits
    function formatPhoneNumber(value) {
        // Add spaces after every 5 digits
        return value.replace(/(\d{5})/g, '$1 ').trim();
    }

    function loginValidation(){
        var valid = true;
        $(".error").remove();
        var filter = /^[6-9]\d{4}\s\d{5}$/;
        if ($('#mobile_code').val() == "") {
            $("#error").after(
                '<span class="error error_message proxima_nova_bold">Mobile number is required</span>'
            );
            valid = false;
        } else if ($('#mobile_code').val() != "") {
            if (!filter.test($('#mobile_code').val())) {
                $("#error").after(
                    '<span class="error error_message proxima_nova_bold">Please enter valid mobile number</span>'
                );
                valid = false;
            }
        }
        return valid;
    }

    $(".hajri-submit-btnss, .resend_otp").click(function () {
        // var countryData = $("#mobile_code").intlTelInput("getSelectedCountryData");
        // var countryCode = countryData.dialCode;
        countdown();
        var phone_number = $('#mobile_code').val();
        var phone_number = phone_number.replace(/\s/g, '');
        console.log(phone_number);
        if(loginValidation()){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('register_number') }}",
                data: {
                    "phone_number":phone_number
                },
                success: function(response) {
                    // console.log(response.data[0].otp);
                    var otp = response.data[0].otp;
                    otp = otp.toString();
                    $('.otp.digit_number').each(function(index) {
                        $(this).val(otp.charAt(index));
                    });
                    if (response['status'] == 1) {
                        localStorage.setItem('data_register_number', JSON.stringify(response.data[0]));
                        $('#user_id').val(response.data.id);
                        $('#otp_num').text('+91 '+response.data[0].phone_number);
                        $(".hajri-phone-number").addClass("hajri_phone_none").hide();
                        $(".hajri-phone-otp").show();
                        toastr["success"](response.message)
                    } else if (response['status'] == 2) {
                        $(".hajri-phone-number").addClass("hajri_phone_none").hide();
                        $(".hajri-phone-otp").show();

                        localStorage.setItem('data_register_number', JSON.stringify(response.data[0]));
                        toastr["success"](response.message)
                    }else {
                        // toastr["error"](response.message)
                    }
                }
            });
        }
    });

    // $(".resend_otp").click(function(){
    //     $('.digit_number').val('');
    // })

    function businessvalidation(){
        var valid = true;
        $(".error").remove();
        if ($('#name').val() == "") {
            $("#name").after(
                '<span class="error error_message proxima_nova_bold">Your name is required</span>'
            );
            valid = false;
        }
        if ($('#business_name').val() == "") {
            $("#business_name").after(
                '<span class="error error_message proxima_nova_bold">Business name is required</span>'
            );
            valid = false;
        }
        if ($('#email').val() == "") {
            $("#email").after(
                '<span class="error error_message proxima_nova_bold">Email ID is required</span>'
            );
            valid = false;
        }
        if ($('#business_address').val() == "") {
            $("#business_address").after(
                '<span class="error error_message proxima_nova_bold">Business address is required</span>'
            );
            valid = false;
        }
        return valid;
    }

    $('.step-2-continue-button').on('click',function (){
        if(businessvalidation()){
            var newItemData = [{
                name:$('#name').val(),
                email:$('#email').val(),
                business_name:$('#business_name').val(),
                business_address:$('#business_address').val(),
            }];
            localStorage.setItem('data_business_information', JSON.stringify(newItemData[0]));
            // localStorage.setItem('data_business_information', true);
            $('#step-2').hide();
            $(".hajri-right-inner").addClass("hajri_salary_none").show();
            $('#step-3').show();
    
            changeStep(3)
        }
    })
    $('.step-3-button').on('click',function (){
        $('.step-3-button').prop('disabled',true);
        $('.step-3-button').text('Continue...');
        var time = $('#shift_hour').val();
        var allDatas = getAll();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: "{{ route('store_business') }}",
            data: {
                "time":time,
                "data":allDatas
            },
            success: function(response) {
                if (response['status'] == 1) {
                    localStorage.clear();
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
</script>