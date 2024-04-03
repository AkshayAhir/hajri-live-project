@extends('admin.layout.main')
@section('title')
    <title>{{env('APP_NAME')}} | Account Settings</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/dropzone.css')}}">
@endsection
@section('header-page')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6 top-header-sub">
                <div class="breadcrumbs-area clearfix">
                    <div class="breadcrumbs-sub" onclick="history.back()">
                    <a onclick="history.back()" class="back_button"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z" fill="#050E17"></path>
                        </svg></a>
                        <h4 class="page-title pull-left proxima_nova_semibold">Add New Business
                        </h4>
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li class="section_sub_title"><a href="http://139.59.38.20/setting">Settings</a></li>
                        <li class="section_sub_title">/  Business settings</li>
                        <!-- <li class="section_sub_title">/  Login details</li> -->
                        <!-- <li class="section_sub_title">/  Manage Business</li> -->
                        <li class="section_sub_title">/  Add New Business</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endsection
@section('content')
    <div class="main-content-inner">

        <div class="col-sm-12 shift-setting-main account_add_new_business">
            <form action="" id="add_business">
                <div class="hajri-salary-pays-main">
                    <div class="account-detail-main-sub-edit">

                        <div class="shift-main-inner-edit">
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Business Name <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                <input type="text" name="business_name" id="business_name" class="form-control shift-edit-input" placeholder="Enter Business Name">
                            </div>
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Email ID <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                <input type="text" name="business_email" id="business_email" class="form-control shift-edit-input" placeholder="Enter email">
                            </div>
                        </div>

                        <div class="shift-main-inner-edit">
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Business Bank Account <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                <input type="number" name="business_bank_detail" id="business_bank_detail" class="form-control shift-edit-input" placeholder="Enter bank account">
                            </div>
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Business Address <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                <input type="text" name="business_address" id="business_address" class="form-control shift-edit-input" placeholder="Enter business address">
                            </div>
                        </div>

                        <div class="shift-main-inner-edit">
                            <div class="shift-inner-sub-label-edit shift-salary-calc">
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Select Salary Structure <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                    <div class="shifts-data">
                                        <div class="filters sidebar-select approve-punch-data">
                                            <select id="business_salary_cal"
                                                class="form-select create-select section_sub_title add_new_business section_sub_title"  
                                                name="business_salary_cal">
                                                <option value="">Select salary structure</option>
                                                <option value="month">Total days in month</option>
                                                <option value="calculate">Calculate 30 days for each month</option>
                                                <option value="days">Count only working days</option>
                                            </select>
                                        </div>
                                        <div class="business_salary_cal_error"></div>
                                    </div>
                                </div>
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Work Hours <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                    <!-- <input type="time" name="shift_hour" id="shift_hour" class="form-control shift-edit-input" placeholder="Enter Work Hours" step="2" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]"> -->
                                    <input type="text" class="form-control shift-edit-input hours_time"
                                    onclick="timepicker(this,'a')" name="shift_hour" id="shift_hour"
                                    value="" placeholder="Enter Time">
                                    <!-- model start -->
                                    <div class="timepicker_wrapper">
                                    <div class="modal-content_time">
                                        <div class="timepicker_wrapper_main">
                                            <p class="timepicker_header">
                                                <b>12</b><b>00</b>
                                            </p>
                                            <div class="timepicker_data_select">
                                                <div class="timing_title">
                                                    <label for="" class="label_title">Hours</label>
                                                    <select onchange="changeTimepickerheader(this,'1')" size="5"
                                                        class="timepicker_hour"></select>
                                                </div>
                                                <div class="timing_title">
                                                    <label for="" class="label_title">Min</label>
                                                <select onchange="changeTimepickerheader(this,'2')" size="5"
                                                    class="timepicker_minute"></select>
                                                </div>
                                            </div>
                                            <div class="timepicker_control">
                                                <!-- <span
                                                                onclick="timepicker(this,'x'); document.querySelector('.timepicker_wrapper').style.display = 'none';">Close</span> -->

                                                <!-- <span onclick="timepicker(this,'c')">Clear</span> -->
                                                <!-- <span onclick="timepicker(this,'s')">Set</span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- model end -->
                                </div>
                            </div>

                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Business Logo <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
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
                                <div class="image-error"></div>
                            </div>                         
                        </div>
                    </div>
               </div>
            </form>
        </div>
        <div>
            <div class="account-business-save-btn">
                <button name="" id="add_business_btn" class="create-staff-btn proxima_nova_semibold">Save
                    <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                </button>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script>
         var c_t = "";

function timepicker(el, S) {
    // e.preventDefault();
    var div = document.querySelector('.timepicker_wrapper')
    function pad(n) {
        var len = 2 - ('' + n).length;
        return (len > 0 ? new Array(++len).join('0') : '') + n
    }

    if (S == 'a') {
        html = "";
        for (i = 0; i <= 23; i++) {
            html += '<option value="' + pad(i) + '">' + pad(i) + '</option>'
        }
        document.querySelector('.timepicker_hour').innerHTML = html

        html = "";
        for (i = 0; i <= 59; i++) {
            html += '<option value="' + pad(i) + '">' + pad(i) + '</option>'
        }
        document.querySelector('.timepicker_minute').innerHTML = html

        c_t = "";
        c_t = el;
        document.querySelector('.timepicker_wrapper').style.display = "block";

    }
    if (S == 'c') {
        document.querySelector('.timepicker_hour').value = "";
        document.querySelector('.timepicker_minute').value = "";
        c_t.value = "";
    }
    if (S == 'x') {
        div.style.display = "block";
    }
    if (S == 's') {
        var hr = document.querySelector('.timepicker_hour').value;
        var min = document.querySelector('.timepicker_minute').value;
        if (hr != "" && min != "") {
            c_t.value = hr + ":" + min;
            div.style.display = "none";
        }
    }
}

function changeTimepickerheader(el, S) {
    var k = document.querySelectorAll('.timepicker_header b');

    if (S == '1') {
        k[0].innerHTML = el.value;
    }
    if (S == '2') {
        k[1].innerHTML = el.value;
    }
    var mergedValue = Array.from(k).map(function (bElement) {
        return bElement.innerHTML;
    }).join(':');

    var time = mergedValue;
    $('.hours_time').val(time);

}

$(document).ready(function () {
    // Show timepicker_wrapper when hours_time is clicked
    $(".hours_time").on("click", function () {
        $(".timepicker_wrapper").show();
    });

    // Hide timepicker_wrapper when anything other than timepicker_wrapper or hours_time is clicked
    $(document).on("click", function (e) {
        var containers = $(".timepicker_wrapper, .hours_time");
        if (!containers.is(e.target) && containers.has(e.target).length === 0) {
            $(".timepicker_wrapper").hide();
        }
    });
});
    </script>
    <script>
        var business_salary_cal;

        function fieldvalidation(){
            var valid = true;
            $(".error").remove();
            var filter = /^[6-9][0-9]{9}$/;
            if ($('#business_address').val() == "") {
                $("#business_address").after(
                    '<span class="error error_message proxima_nova_semibold">Business address field is required</span>'
                );
                valid = false;
            }             
            if ($('#business_bank_detail').val() == "") {
                $("#business_bank_detail").after(
                    '<span class="error error_message proxima_nova_semibold">Business bank account is required</span>'
                );
                valid = false;
            }
            if ($('#business_email').val() == "") {
                $("#business_email").after(
                    '<span class="error error_message proxima_nova_semibold">Business Email field is required</span>'
                );
                valid = false;
            }
            if ($('#business_name').val() == "") {
                $("#business_name").after(
                    '<span class="error error_message proxima_nova_semibold">Business Name field is required</span>'
                );
                valid = false;
            }
            if (!business_salary_cal) {
                $(".business_salary_cal_error").after(
                    '<span class="error error_message proxima_nova_semibold">Salary Structure field is required</span>'
                );
                valid = false;
            }
            if ($('#shift_hour').val() == "") {
                $("#shift_hour").after(
                    '<span class="error error_message proxima_nova_semibold">Work hour field is required</span>'
                );
                valid = false;
            }
            if (myDropzone.getQueuedFiles().length === 0) {
                $(".image-error").html(
                    '<span class="error error_message proxima_nova_semibold">Business logo is required</span>'
                );
                valid = false;
            }
            return valid;
        }
        $('.add-staff-dropzone').on('click',function (){
            $('#images-dropzone').click();
        }) 
       

        $('select.add_new_business').each(function () {

            var dropdown = $('<div />').addClass('add_new_business selectDropdown');

            $(this).wrap(dropdown);

            var label = $('<span />').text($(this).attr('placeholder')).insertAfter($(this));
            var list = $('<ul />');

            $(this).find('option').each(function () {
                var optionValue = $(this).val();
                // console.log(optionValue);
                list.append($('<li />').append($('<a class="business_salary_cal" data-value="'+optionValue+'"/>').text($(this).text())));
            });

            list.insertAfter($(this));

            if ($(this).find('option:selected').length) {
                label.text($(this).find('option:selected').text());
                list.find('li:contains(' + $(this).find('option:selected').text() + ')').addClass('active');
                $(this).parent().addClass('filled');
            }

        });
        
        $('.business_salary_cal').click(function () {
            business_salary_cal = $(this).data('value');
            // console.log(business_salary_cal);
        })

        $('#add_business_btn').click(function() {
            if (fieldvalidation()) {
                $('.loader').show();
                $('#add_business_btn').prop('disabled', true);
                myDropzone.processQueue();
            }
        });
        

        $(document).on('click touch', '.selectDropdown ul li a', function (e) {
            e.preventDefault();
            var dropdown = $(this).parent().parent().parent();
            var active = $(this).parent().hasClass('active');
            var label = active ? dropdown.find('select').attr('placeholder') : $(this).text();

            dropdown.find('option').prop('selected', false);
            dropdown.find('ul li').removeClass('active');

            dropdown.toggleClass('filled', !active);
            dropdown.children('span').text(label);

            if (!active) {
                dropdown.find('option:contains(' + $(this).text() + ')').prop('selected', true);
                $(this).parent().addClass('active');
            }

            dropdown.removeClass('open');
        });

        $('.add_new_business > span').on('click touch', function (e) {
            var self = $(this).parent();
            self.toggleClass('open');
        });
        let uploadedDocumentMap = {};
        var url = "{{url('')}}";
        Dropzone.autoDiscover = false;
        let myDropzone = new Dropzone("div#images-dropzone",{
            url: '{{ route('addBusinessLogo') }}',
            autoProcessQueue: false,
            thumbnailWidth:'50',
            maxFilesize: 2,
            // maxFiles:1,
            thumbnailHeight:'50',
            // uploadMultiple: false,
            addRemoveLinks: true,
            parallelUploads: 10,
            acceptedFiles: 'image/jpeg, image/jpg, image/png',
            dictRemoveFile: `
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.84154 2.83958C3.07296 2.60816 3.44817 2.60816 3.67959 2.83958L13.1611 12.3211C13.3925 12.5525 13.3925 12.9277 13.1611 13.1591C12.9296 13.3905 12.5544 13.3905 12.323 13.1591L2.84154 3.67763C2.61011 3.44621 2.61011 3.071 2.84154 2.83958Z" fill="#ffffff"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1611 2.83958C13.3925 3.071 13.3925 3.44621 13.1611 3.67763L3.67959 13.1591C3.44817 13.3905 3.07296 13.3905 2.84154 13.1591C2.61011 12.9277 2.61011 12.5525 2.84154 12.3211L12.323 2.83958C12.5544 2.60816 12.9296 2.60816 13.1611 2.83958Z" fill="#ffffff"/>
                        </svg>`,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            init: function () {
                
                this.on("addedfile", function(file, response) {
                    let businessNameInput = document.getElementById('business_name');
                    
                    this.on("sending", function (file, xhr, formData) {
                        let business_name = businessNameInput.value;
                        formData.append('business_name', business_name);
                    });
                    if (this.files.length > 1) {
                        for (let i = 0; i < this.files.length - 1; i++) {
                            this.removeFile(this.files[i]);
                        }
                    }
                });
            },
            success: function(data, response) {
                $('#add_business input[name="photo"]').remove();
                $('#add_business').append('<input type="hidden" name="photo" value="' + response['photo'] + '">');
                uploadedDocumentMap[data] = response['photo'];
                var formData = new FormData($('#add_business')[0]);
                formData.append('business_salary_cal', business_salary_cal);                
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ route('add_business') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response['status'] == 1) {
                            toastr["success"](response.message);
                            setTimeout(function () {
                                var redirectUrl = "{{ url('setting') }}"
                                window.location.href = redirectUrl;
                            }, 3000);
                        }else{
                            toastr["error"](response.message)
                        }
                    }
                });
            },
            // removedfile: function (file) {
            //     $(".error").remove();
            //     file.previewElement.remove()
            //     let name = '';
            //     if (typeof file.file_name !== 'undefined') {
            //         name = file.file_name;
            //     } else {
            //         name = uploadedDocumentMap[file.name];
            //     }
            //     $('form').find('input[name="photos[]"][value="' + name + '"]').remove();
            // },
            error: function(file, response) {
                if (file.size > this.options.maxFilesize * 1024 * 1024) {
                    $(".image-error").html(
                        '<span class="error error_message proxima_nova_semibold">File size upload on ' + this.options.maxFilesize + ' MB</span>'
                    );
                } else {
                    alert('An error occurred while uploading the file.');
                }
            }
        });

    </script>
@endsection