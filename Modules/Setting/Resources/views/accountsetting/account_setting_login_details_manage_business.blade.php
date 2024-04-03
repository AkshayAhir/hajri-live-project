@extends('admin.layout.main')
@section('title')
    <title>{{env('APP_NAME')}} | Account Settings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

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
                        <h4 class="page-title pull-left proxima_nova_semibold">Business Details
                        </h4>
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li class="section_sub_title"><a href="http://139.59.38.20/setting">Settings</a></li>
                        <li class="section_sub_title">/  Business Info</li>
                        <li class="section_sub_title">/  Business details</li>
                        <!-- <li class="section_sub_title">/  Manage Business</li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-content-inner">

        <div class="col-sm-12 shift-setting-main account_setting_manage_business">

            <div class="hajri-salary-pays-main">
                <form action="" id="edit_business_form">
                    <div class="account-detail-main-sub-edit">

                        <div class="shift-main-inner-edit">
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Business Name <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                <input type="text" class="form-control shift-edit-input" name="business_name" id="business_name" placeholder="Enter Business Name" value="{{$business_data[0]['name']}}">

                            </div>
                            
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Business Address <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                <textarea class="form-control profile-field-textarea" name="business_address" id="business_address" rows="2" required="" placeholder="Enter Business Address" >{{$business_data[0]['business_address']}}</textarea>
                                <!-- <input type="text" class="form-control shift-edit-input" name="business_address" id="business_address" placeholder="Enter business address" value="{{$business_data[0]['business_address']}}"> -->
                            </div>
                            <!-- <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Email ID</label>
                                <input type="email" class="form-control shift-edit-input" name="email" id="email" placeholder="Enter email" value="{{$login_user['email']}}">

                            </div> -->
                        </div>

                        <div class="shift-main-inner-edit">
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Business Bank Account <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                <input type="number" class="form-control shift-edit-input" name="business_bank_account" id="business_bank_account" placeholder="Enter bank account" value="{{$business_data[0]['bank_account']}}">
                            </div>
                            <div class="shift-inner-sub-label-edit">
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Salary Structure <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                    <div class="shifts-data">
                                        <div class="filters sidebar-select approve-punch-data">
                                            <select id="business_salary_cal"
                                                class="form-select create-select section_sub_title add_new_business section_sub_title"
                                                name="business_salary_cal">
                                                <option>Select salary structure</option>
                                                <option value="month" <?= $business_data[0]['salary_calculation'] === 'month' ? 'selected' : ''?>>Total days in month</option>
                                                <option value="calculate" <?= $business_data[0]['salary_calculation'] === 'calculate' ? 'selected' : ''?>>Calculate 30 days for each month</option>
                                                <option value="days" <?= $business_data[0]['salary_calculation'] === 'days' ? 'selected' : ''?>>Count only working days</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="shift-main-inner-edit">
                            
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Business Category <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                <div class="shifts-data">
                                    <div class="filters sidebar-select approve-punch-data">
                                        <select id="select_business_category" class="form-select create-select section_sub_title account_setting_data">
                                            <option value="" disabled selected>Enter business category</option>
                                            @foreach($business_category as $category)
                                            <option value="{{$category['id']}}">{{$category['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="select_business_category_error"></div>

                                </div>
                            </div>
                            <div class="shift-inner-sub-label-edit">
                            <!-- <label for="time_input">Select a time (24-hour format):</label>
                            <input type="time" id="time_input" name="time" pattern="^(?:[01]\d|2[0-3]):[0-5]\d$"  max="23:00" title="Enter time in 24-hour format (HH:MM)"> -->
                                
                                <div class="shift-inner-sub-label-edit">
                                    <label class="shift-type-label">Work Hours</label>
                                    <!-- <input type="time" name="shift_hour" id="shift_hour" class="form-control shift-edit-input" placeholder="Enter Work Hours" step="2" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]" value="{{$business_data[0]['shift_hour']}}"> -->
                                    <input type="text" class="form-control shift-edit-input hours_time"
                                    onclick="timepicker(this,'a')" name="shift_hour" id="shift_hour"
                                    value="{{$business_data[0]['shift_hour']}}" placeholder="Enter Time">
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

                                    <!-- <input type="time" id="appt" name="appt" min="01:00" max="24:00" required value="24:00" /> -->
                                    <!-- <input type="text" name="shift_hour" id="shift_hour" class="form-control shift-edit-input" placeholder="Enter Work Hours" value="{{$business_data[0]['shift_hour']}}"> -->
                                </div>
                            </div>
                        </div>
 
                        <div class="shift-main-inner-edit">
                            
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Business Logo</label>
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
                        <a href="{{ route('new_business_account') }}" class="proxima_nova_bold">+ Add New Business</a>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <div class="account-business-save-btn">
                <button name="" id="edit_business" class="create-staff-btn proxima_nova_semibold">Save
                    <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                </button>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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

        var category_id = <?= $business_data[0]['category_id'] ? $business_data[0]['category_id'] : '0' ?>;

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
            if ($('#business_bank_account').val() == "") {
                $("#business_bank_account").after(
                    '<span class="error error_message proxima_nova_semibold">Business bank account is required</span>'
                );
                valid = false;
            }
            if ($('#business_name').val() == "") {
                $("#business_name").after(
                    '<span class="error error_message proxima_nova_semibold">Business Name field is required</span>'
                );
                valid = false;
            }
            if ($('#business_salary_cal').val() == "") {
                $("#business_salary_cal").after(
                    '<span class="error error_message proxima_nova_semibold">Salary Structure field is required</span>'
                );
                valid = false;
            }
            if (category_id == 0) {
                $(".select_business_category_error").html(
                    '<span class="error error_message proxima_nova_semibold">Business Category field is required</span>'
                );
                valid = false;
            }
            if ($('#shift_hour').val() == "") {
                $("#shift_hour").after(
                    '<span class="error error_message proxima_nova_semibold">Work hour field is required</span>'
                );
                valid = false;
            }
            // if (myDropzone.getQueuedFiles().length === 0) {
            //     $(".image-error").html(
            //         '<span class="error error_message proxima_nova_semibold">Business logo is required</span>'
            //     );
            //     valid = false;
            // }
            return valid;
        }

        $('.add-staff-dropzone').on('click',function (){
            $('#images-dropzone').click();
        })
        let uploadedDocumentMap = {};
        var url = "{{url('')}}";
        Dropzone.autoDiscover = false;
        let myDropzone = new Dropzone("div#images-dropzone",{
            url: '{{ route('uploadBusinessLogo') }}',
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
                var myDropzone = this;
                var business_logo = <?php echo json_encode($business_data[0]['business_logo']); ?>;
                // console.log(business_logo);
                var thumbnailUrls = [];
                if(business_logo != ''){
                        $('#edit_business_form').append('<input type="hidden" name="photo" value="' + business_logo + '">');
                        thumbnailUrls.push(url+"/assets/admin/images/business_logo/"+business_logo);
                }
                if (thumbnailUrls) {
                    for (var i = 0; i < thumbnailUrls.length; i++) {
                        var imageUrl = thumbnailUrls[i];
                        $.ajax({
                            url: imageUrl,
                            type: 'HEAD',
                            async: false,
                            success: function (data, status, xhr) {
                                var sizeInBytes = xhr.getResponseHeader('Content-Length');
                                var sizeInKB = Math.round(sizeInBytes / 1024); // Convert to KB
                                var sizeInMB = (sizeInKB / 1024).toFixed(2); // Convert to MB with 2 decimal places
                                var mockFile = {
                                    name: "myimage.jpg",
                                    size: sizeInBytes,
                                    type: 'image/jpeg',
                                    status: Dropzone.ADDED,
                                    url: imageUrl,
                                    sizeInKB: sizeInKB,
                                    sizeInMB: sizeInMB
                                };
                                myDropzone.emit("addedfile", mockFile);
                                myDropzone.emit("thumbnail", mockFile, imageUrl);

                                myDropzone.files.push(mockFile);
                            }
                        });
                    }
                }

                this.on("addedfile", function(file, response) {
                    if (this.files.length > 1) {
                        // If more than one file is added, remove the previous file(s)
                        for (let i = 0; i < this.files.length - 1; i++) {
                            this.removeFile(this.files[i]);
                        }
                    }
                });

                this.on("success", function(data, response) {
                    $('#edit_business_form input[name="photo"]').remove();
                    $('#edit_business_form').append('<input type="hidden" name="photo" value="' + response['photo'] + '">');
                    uploadedDocumentMap[data] = response['photo'];
                    // var formData = new FormData($('#edit_business_form')[0]);
                    manageBusiness()
                });

                this.on("error", function(file, response) {
                    if (file.size > this.options.maxFilesize * 1024 * 1024) {
                        $(".image-error").html(
                            '<span class="error error_message proxima_nova_semibold">File size upload on ' + this.options.maxFilesize + ' MB</span>'
                        );
                    } else {
                        alert('An error occurred while uploading the file.');
                    }
                });                
            },
        });

        
        $('select.account_setting_data').each(function () {
            var category = <?= $business_category ?>;
            var i = 0;
            var business_cat = <?= $business_data[0]['category_id'] ? $business_data[0]['category_id'] : '0' ?>;
            // console.log(business_cat);

            var dropdown = $('<div />').addClass('account_setting_data selectDropdown');

            $(this).wrap(dropdown);

            var label = $('<span />').text($(this).attr('placeholder')).insertAfter($(this));
            var list = $('<ul />');

            $(this).find('option').each(function () {
                var optionValue = $(this).val();
                // console.log(optionValue);
                list.append($('<li />').append($('<a class="select_business_category" data-id="' + optionValue + '"/>').text($(this).text())));

                if (optionValue == business_cat) {
                    $(this).prop('selected', true); // Set the option as selected
                    list.addClass('selected'); // Optionally mark the list item as selected in the UI
                }

            });

            list.insertAfter($(this));

            if ($(this).find('option:selected').length) {
                label.text($(this).find('option:selected').text());
                list.find('li:contains(' + $(this).find('option:selected').text() + ')').addClass('active');
                $(this).parent().addClass('filled');
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

        $('.account_setting_data > span').on('click touch', function (e) {
            var self = $(this).parent();
            self.toggleClass('open');
        });


        $(document).on("click", function (e) {
            var container = $(".account_setting_data");

            // Check if the clicked element is the account_setting_data container or its children
            if (container.is(e.target) || container.has(e.target).length > 0) {
                container.find("ul").show();
            } else {
                container.find("ul").removeClass("open").hide();
            }
        });

        $('select.add_new_business').each(function () {

            var dropdown = $('<div />').addClass('add_new_business selectDropdown');

            $(this).wrap(dropdown);

            var label = $('<span />').text($(this).attr('placeholder')).insertAfter($(this));
            var list = $('<ul />');

            $(this).find('option').each(function () {
                list.append($('<li />').append($('<a />').text($(this).text())));
            });

            list.insertAfter($(this));

            if ($(this).find('option:selected').length) {
                label.text($(this).find('option:selected').text());
                list.find('li:contains(' + $(this).find('option:selected').text() + ')').addClass('active');
                $(this).parent().addClass('filled');
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
        // Close the download-data when clicking outside of it
        $(document).on("click", function (e) {
            if (!$(e.target).closest(".approve-data-download, .download-data").length) {
                $(".download-data").hide();
            }
        });
       
        $('.select_business_category').click(function () {
            category_id = $(this).data('id');
        })

        $('#edit_business').click(function() {
            // alert('click');
            // event.preventDefault();
            if(myDropzone.getQueuedFiles().length == 0){
                manageBusiness()
            }else{
                myDropzone.processQueue();
            }
            // if (fieldvalidation()) {
            //     myDropzone.processQueue(); // Trigger upload if files are in the queue
            // } else {
            //     myDropzone.options.autoProcessQueue = false; // Prevent auto upload if validation fails
            // }
        });

        function manageBusiness(){
            if(fieldvalidation()) {
                var formData = new FormData($('#edit_business_form')[0]);
                formData.append('select_business_category', category_id);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ route('edit_business') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response['status'] == 1) {
                            $('.loader').show();
                            $('#edit_business').prop('disabled', true);
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
        }
    </script>
@endsection