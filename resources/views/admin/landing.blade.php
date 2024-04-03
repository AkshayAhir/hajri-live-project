<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{env('APP_NAME')}} | Landing</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" /> -->

    <link rel="stylesheet" href="{{asset('assets/admin/css/login.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/admin/css/sidebar.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/admin/css/font.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    <link rel="icon" type="image/x-icon" href="{{asset('assets/admin/images/favicon/fav.png')}}" >

</head>

<body>
    <div class="landing-main-sections">
        <div class="main-header">
        <div class="container main-inner-header">
                <a href="https://www.hajri.app/dashboard">
                    <img class="img-responsive logo_img " src="{{asset('assets/admin/images/sidebar/logo.svg')}}" alt="User picture"><span class="logo_txt">Hajri</span>
                </a>
            </div>
            <!-- <div class="container main-inner-header">
                <img src="{{asset('assets/admin/images/sidebar/logo.svg')}}" alt="">
                <div>Hajri</div>
            </div> -->
        </div>
        <div class="landing-main-section">
        <div class="container">
            <div class="hajri-signup">
                <div class="left-main-landing">
                    <div class="landing-left-main-text">
                        <h2 class="manage-hajri proxima_nova_bold">Attendance Through Face Monitoring App</h2>
                        <p class="manage-sub-text proxima_nova_regular section_title manage_staff_attent_con">Manage your staff attendance,
                            salary details and compliances
                            in few clicks + attendance based with face biometric</p>
                    </div>
                    <div class="landing-left-section">
                        <img src="{{asset('assets/admin/images/login/left-image.png')}}" alt="">

                    </div>
                </div>

                <div class="hajri-left-right landing-right">
                    <div class="hajri-main-right hajri-main-landing-right">
                        <form id="mobile-form" method="" action="">

                            <div class="hajri-right step" id="step-1">
                                <div class="hajri-right-main-logo">
                                    <img src="{{asset('assets/admin/images/login/icon2.svg')}}" alt="">
                                </div>
                                <div class="hajri-right-text">
                                    <h1 class="hajri-right-title proxima_nova_semibold">Your Details</h1>
                                    <p class="hajri-right-con proxima_nova_semibold">Enter your mobile number</p>
                                
                                    <div class="hajri-phone-number" id="edit-mobile">
                                        <div class="form-group" id="error">
                                            <label for="exampleInputPassword1" class="form-label phone-field">Phone
                                                Number</label>
                                            <input type="text" id="mobile_code" oninput='mobiledigit(this)'
                                                class="form-control phone_input" placeholder="Phone Number"
                                                name="phone_number" maxlength="11">
                                        </div>
                                        <div class="hajri-form-btn">
                                            <button type="submit" name="" class="hajri-submit-btnss">Submit
                                                <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                                            </button>
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
                                                    <input class="otp digit_number" type="number"
                                                        oninput='digitValidate(this)' onkeyup='tabChange(1)'
                                                        maxlength=1>
                                                    <input class="otp digit_number" type="number"
                                                        oninput='digitValidate(this)' onkeyup='tabChange(2)'
                                                        maxlength=1>
                                                    <input class="otp digit_number" type="number"
                                                        oninput='digitValidate(this)' onkeyup='tabChange(3)'
                                                        maxlength=1>
                                                    <input class="otp digit_number" type="number"
                                                        oninput='digitValidate(this)' onkeyup='tabChange(4)'
                                                        maxlength=1>
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
                                            <button type="submit" name="" class="hajri-submit-btn-submit otp-button">Submit
                                                <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                                            </button>
                                        </div>

                                    </div>
                                    <div class="hajri-form-link">
                                        <p>Having trouble login? <a href="#"> Contact Admin</a></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- <div id="progress-dots"> -->
                        <!-- <span class="dot active" id="dot-1"></span> -->
                        <!-- <span class="dot" id="dot-2"></span>
                        <span class="dot" id="dot-3"></span> -->
                    <!-- </div> -->

                </div>

            </div>
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


</body>

</html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $('.loader').hide();
    $(document).ready(function () {
        localStorage.clear();
        if ($("#step-1").is(":visible")) {
            // console.log('hhhhyyyy');
            $(".hajri-main-footer-mobile").css("bottom", "0px");
        }
    });

    $(document).ready(function () {
        // $('#mobile-form')[0].reset();
        // location.reload();
        // $('#mobile_code').val(''); 
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
        // $(".hajri-submit-btn").click(function () {
        //     $(".hajri-phone-number").hide()
        //     $(".hajri-phone-otp").show();
        // });
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

        if (Object.keys(allDatas).length === 0) {
            $(".hajri-phone-number").css("display", "");
            $(".hajri-phone-otp").css("display", "none");
        } else {
            if (allDatas.data_register_number != "") {
                $('#otp_num').text('+91 ' + allDatas.data_register_number.phone_number);
                $('#mobile_code').val(allDatas.data_register_number.phone_number);
                $(".hajri-phone-number").css("display", "none");
                $(".hajri-phone-otp").css("display", "");
                $("#step-2").removeClass("step");
                // changeStep(1);

            }
            if (allDatas.data_otp) {
                $(".hajri-phone-number").css("display", "none");
                $(".hajri-phone-otp").css("display", "none");
                $("#step-1").addClass("d-none");
                // $("#step-2").removeClass("step");
                changeStep(2);
            }
        }
    });

    // multi country num
    $("#mobile_code").intlTelInput({
        initialCountry: "in",
        separateDialCode: true,
    });

    // number and otp screen chnage
    $(document).ready(function () {
        $(".hajri-phone-otp").hide();
        $(".hajri-submit-btn").click(function () {
            $(".hajri-phone-number").hide()
            $(".hajri-phone-otp").show();
        });
    });

    let phoneNumberClickable = true;
    $(".phone-number-text").click(function () {
        if (!phoneNumberClickable) {
            return false;
        } else {
            localStorage.clear();
            $('.loader').hide();
            $('.hajri-submit-btnss').prop('disabled', false);
            // $(this).hide();
            $("#edit-mobile").show();
            $(".hajri-phone-otp").hide();
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
            // $('.otp-button').removeAttr('disabled');
            // $('.main-loader').css("display", "none");
            $('.loader').hide();
            $('.otp-button').prop('disabled', false);
        } else if (ele[val - 1].value == '') {
            ele[val - 2].focus();
            // $('.hajri-submit-btn-submit').attr('disabled', 'disabled');
        }        
    }
    
    // otp screen enter event 
     $('.digit-inner-num input:last-child').on('keyup', function (event) {
    if (event.key === 'Enter') {
        $('.hajri-submit-btn-submit').click();
    }
});
    //  timer
    var downloadTimer;
    function countdown() {
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

            if (timeleft <= -1) {
                $('.resend_otp').show();
                clearInterval(downloadTimer);
            }
        }, 1000);
    }
    
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

    function loginValidation() {
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

    $(".hajri-submit-btnss, .resend_otp").click(function (e) {
        $('.loader').hide();
        $('.otp-button').prop('disabled', false);
        e.preventDefault();        
        // var countryData = $("#mobile_code").intlTelInput("getSelectedCountryData");
        // var countryCode = countryData.dialCode;
        countdown();
        var phone_number = $('#mobile_code').val();
        
        var phone_number = phone_number.replace(/\s/g, '');
        if (loginValidation()) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('register_number') }}",
                data: {
                    "phone_number": phone_number
                },
                success: function (response) {
                    // console.log(response);
                    if (response['status'] == 1) {
                        $('.loader').show();
                        $('.hajri-submit-btnss').prop('disabled', true);
                        var otp = response.data[0].otp;
                        otp = otp.toString();
                        $('.otp.digit_number').each(function (index) {
                            $(this).val(otp.charAt(index));
                        });
                        localStorage.setItem('data_register_number', JSON.stringify(response.data[0]));
                        $('#user_id').val(response.data.id);
                        $('#otp_num').text('+91 ' + response.data[0].phone_number);
                        $(".hajri-phone-number").addClass("hajri_phone_none").hide();
                        $(".hajri-phone-otp").show();
                        $('.loader').hide();
                        toastr["success"](response.message)
                    }
                    else if (response['status'] == 2) {
                        $('.loader').show();
                        $('.hajri-submit-btnss').prop('disabled', true);
                        window.location.href = '/a_admin/login';

                        localStorage.setItem('data_register_number', JSON.stringify(response.data[0]));
                        toastr["success"](response.message)
                        setTimeout(function () {
                            $('#mobile-form')[0].reset();
                            $('.hajri-submit-btnss').prop('disabled', false);
                            $('.loader').hide();
                        }, 3000);
                       
                    }  else {
                        toastr["error"](response.message)
                    }
                }
            });
        }
    });

    function otpvalidation(){
        var valid = true;
        $(".error").remove();
        if ($('.otp').val() == "") {
            $(".digit-inner-num").after(
                '<span class="error error_message proxima_nova_bold">Enter valid otp.</span>'
            );
            valid = false;
        }
        return valid;
    }
 
    $(".otp-button").click(function (e) {
        // $('.otp-button').removeAttr('disabled');
        // $('.otp-button').prop('disabled', true);
        // $('.otp-button').text('Submit...');
        e.preventDefault();       
        
        var inputElements = $('.digit-inner-num input');
        var otp = '';
        inputElements.each(function () {
            otp += $(this).val();
        });
        var phone_number = $('#mobile_code').val();
        var phone_number = phone_number.replace(/\s/g, '');
        // console.log(otp);
        if(otpvalidation()){
            $('.loader').show();
            $('.otp-button').prop('disabled', true);
            if ($('#countdowntimer').html() === "00:00") {
                toastr["error"]('Time out resend otp');
            } else {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ route('verify_otp') }}",
                    data: {
                        "otp": otp,
                        "phone_number": phone_number
                    },
                    success: function (response) {
                        // console.log(response);
                        if (response['status'] == 1) {
                            $('.phone-number-text').removeAttr('style');
                            phoneNumberClickable = false;
                            localStorage.setItem('data_otp', true);
                            // toastr["success"](response.message)
                            var isValid = true;
    
                            if (isValid) {
                                currentStep++;
                                changeStep(currentStep);
                            } else {
                                $(".error_message").show();
                            }
                        } else if (response['status'] == 2) {
                            $('.phone-number-text').removeAttr('style');
                            phoneNumberClickable = false;
                            localStorage.clear();
                            toastr["success"](response.message)
                            setTimeout(function () {
                                window.location.href = '/dashboard';
                            }, 3000);
                        }
                        else {
                            setTimeout(function () {
                                $('.loader').hide();
                                $('.otp-button').prop('disabled', false);
                            }, 1500);                            
                            phoneNumberClickable = true; 
                            toastr["error"](response.message)
                        }
                    }
                });
            }
        }

    });


    // multi step dots hide show
    $(document).ready(function () {

        // function changeStep(step) {

        //     $(".dot").removeClass("active");
        //     $("#dot-" + step).addClass("active");

        // }
        var currentStep = 1;

        function changeStep(step) {
            // Remove the "tab_active" and "tab_inactive" classes from all "li" elements
            $("#navigation_tabs li").removeClass("tab_active");

            // Add the appropriate class to the "li" element based on the current step
            $("#navigation_tabs li").eq(step - 1).addClass("tab_active");
            $("#navigation_tabs li:lt(" + (step - 1) + ")").addClass("tab_active");

            $(".step").hide();
            $("#step-" + step).show();

            $(".nav-active").removeClass("nav_field_active");
            $(".nav-active").eq(step - 1).addClass("nav_field_active");

            $(".dot").removeClass("active");
            $("#dot-" + step).addClass("active");
        }


        changeStep(currentStep);
        // Handle "Submit" button click
        // $(".hajri-submit-btn-submit").click(function () {
        //     var isValid = true;

        //     if (isValid) {
        //         currentStep++;
        //         changeStep(currentStep);
        //     } else {
        //         $(".error_message").show();
        //     }
        // });
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



    $(document).ready(function () {

        // step 3 radio button
        $("input[type='radio']").change(function () {
            $(".hajri-salary-pay-main").removeClass("border-color-checked");

            $(this).closest(".hajri-salary-pay-main").addClass("border-color-checked");
        });

        // step 3 hide show
        $(".hajri-right-sub-inner").hide();
        $(".hajri-continue-btns").click(function () {
            $(".hajri-right-inner").addClass("hajri_salary_none").hide();
            $(".hajri-right-sub-inner").show();
        });

        // step 1 hide show 
        $(".hajri-phone-otp").hide();
        // $(".hajri-submit-btnss").click(function () {
        //     $(".hajri-phone-number").addClass("hajri_phone_none").hide();
        //     $(".hajri-phone-otp").show();
        // });
    });

</script>
