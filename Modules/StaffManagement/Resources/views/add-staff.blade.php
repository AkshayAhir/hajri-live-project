@extends('admin.layout.main')
@section('title')
    <title>{{env('APP_NAME')}} | Add staff</title>
@endsection
@section('header-page')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6 top-header-sub">
                <div class="breadcrumbs-area clearfix">
                    <div class="breadcrumbs-sub">
                        <a  onclick="history.back()"  class="back_button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z" fill="#050E17"></path>
                            </svg>
                        </a>
                        <h4 class="page-title pull-left proxima_nova_semibold">Add New Staff
                        </h4>
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li class="section_sub_title"><a href="{{route('staff')}}">Staff Management</a></li>
                        <li class="section_sub_title">/  Add New Staff</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <form id="add_staff" method="post">
        @csrf
        <div class="col-sm-12 shift-setting-main">
            <div class="hajri-salary-pays-main">
                <div class="shift-main-sub-edit">
                    <div class="shift-main-inner-edit">
                        <!-- <div class="shift-inner-sub-label-edit">
                            <label class="shift-type-label">Shift Type</label>
                            <select class="form-select shift-edit-select" aria-label="Default select example">
                                <option selected>Fixed shift</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                            </select>
                        </div> -->
                        <div class="shift-inner-sub-label-edit">
                            <label class="shift-type-label">First Name <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                            <input type="text" class="form-control shift-edit-input" id="first_name" name="first_name" placeholder="Enter First Name">
                        </div>
                        <div class="shift-inner-sub-label-edit">
                            <label class="shift-type-label">Last Name <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                            <input type="text" class="form-control shift-edit-input" id="last_name" name="last_name" placeholder="Enter Last Name">
                        </div>
                        <!-- <div class="shift-inner-sub-label-edit">
                            <div class="form-group" id="error">
                                <label for="exampleInputPassword1" class="form-label shift-type-label">Phone Number <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                <input type="tel" id="phone_number" class="form-control phone_input" placeholder="Phone Number" name="phone_number" maxlength="11">
                            </div>
                        </div> -->
                    </div>
                    <div class="shift-main-inner-edit">
                            <div class="shift-inner-sub-label-edit">
                                <label class="shift-type-label">Middle Name <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                <input type="text" class="form-control shift-edit-input" id="middle_name" name="middle_name" placeholder="Enter Middle Name">
                            </div>
                                
                            <div class="shift-inner-sub-label-edit">
                                <div class="form-group" id="error">
                                    <label for="exampleInputPassword1" class="form-label shift-type-label">Phone Number <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                                    <input type="tel" id="phone_number" class="form-control phone_input" placeholder="Phone Number" name="phone_number" maxlength="11">
                                </div>
                            </div>
                        <!-- <div class="shift-inner-sub-label-edit">
                            <label class="shift-type-label">Add Your Profile Photo <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                            <div class="needsclick dropzone" id="images-dropzone">
                                <div class="add-staff-dropzone">
                                    <div class="upload-images">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.73828 8.75C4.73828 5.72969 7.18672 3.28125 10.207 3.28125H21.5198C22.9703 3.28125 24.3613 3.85742 25.3868 4.88301L28.6574 8.15353C29.6829 9.17912 30.2591 10.5701 30.2591 12.0205V26.25C30.2591 29.2703 27.8107 31.7188 24.7904 31.7188H10.207C7.18672 31.7188 4.73828 29.2703 4.73828 26.25V8.75ZM10.207 5.46875C8.39485 5.46875 6.92578 6.93782 6.92578 8.75V26.25C6.92578 28.0622 8.39485 29.5312 10.207 29.5312H24.7904C26.6026 29.5312 28.0716 28.0622 28.0716 26.25V12.0205C28.0716 11.1503 27.7259 10.3157 27.1106 9.70032L23.84 6.42981C23.2247 5.81445 22.3901 5.46875 21.5198 5.46875H10.207Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1445 3.28125C21.7486 3.28125 22.2383 3.77094 22.2383 4.375V9.47917C22.2383 10.4859 23.0544 11.3021 24.0612 11.3021H29.1654C29.7694 11.3021 30.2591 11.7918 30.2591 12.3958C30.2591 12.9999 29.7694 13.4896 29.1654 13.4896H24.0612C21.8463 13.4896 20.0508 11.6941 20.0508 9.47917V4.375C20.0508 3.77094 20.5405 3.28125 21.1445 3.28125Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.7266 16.7266C17.1537 16.2995 17.8463 16.2995 18.2734 16.7266L21.5546 20.0079C21.9818 20.435 21.9818 21.1275 21.5546 21.5546C21.1275 21.9818 20.435 21.9818 20.0079 21.5546L17.5 19.0468L14.9921 21.5546C14.565 21.9818 13.8725 21.9818 13.4454 21.5546C13.0182 21.1275 13.0182 20.435 13.4454 20.0079L16.7266 16.7266Z" fill="#808080" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.4902 16.4062C18.0943 16.4062 18.584 16.8959 18.584 17.5V24.7917C18.584 25.3957 18.0943 25.8854 17.4902 25.8854C16.8862 25.8854 16.3965 25.3957 16.3965 24.7917V17.5C16.3965 16.8959 16.8862 16.4062 17.4902 16.4062Z" fill="#808080" />
                                        </svg>
                                    </div>
                                    <p class="staff-image-dragdrop">Drag & drop your image or <label for="custom-file-upload" class="file-uploadphp">Select Files</label></p>
                                </div>
                            </div>
<<<<<<< HEAD
                            <div class="image-error"></div>
                        </div> -->
                        
                    </div>
                    <div class="shift-main-inner-edit">
=======
                            <span class="image-error"></span>
                        </div>
>>>>>>> 9ee7d98de403d43c1e001aefae0ecaf8228cb55b
                        <div class="shift-inner-sub-label-edit">
                            <label class="shift-type-label">Department <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                            <div class="filters staff_attendance" id="department_error">
                                <select class="form-select create-select section_sub_title select-club-services" id="department_id" name="department_id">
                                    <option value="">Select Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- <div class="location-atten">
                                <input class="form-check-input" type="checkbox" value="" checked id="flexCheckChecked">
                                <p class="section_sub_title ">Give Selfie & Location Attendance Access</p>
                            </div> -->
                        </div>
                        <div class="shift-inner-sub-label-edit">
                            <label class="shift-type-label">Email <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                            <input type="text" class="form-control shift-edit-input" id="staff_email" name="staff_email" placeholder="Enter Your Email">
                        </div>                 
                    </div>
                    <h2 class="proxima_nova_semibold staff-pay-title">Staff Payment Details</h2>
                    <div class="shift-main-inner-edit steff-paymeny-detail">
                        <div class="shift-inner-sub-label-edit">
                            <label class="shift-type-label">Salary Amount <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                            <input type="text" class="form-control shift-edit-input" id="salary_amount" name="salary_amount" placeholder="Enter salary">
                        </div>
                        <!-- <div class="shift-inner-sub-label-edit">
                            <label class="shift-type-label">Salary Cycle <i class="fa-solid fa-star-of-life text-danger fa-2xs" style="font-size: 6px; margin-top: 8px;"></i></label>
                            <div class="staff-salary  date" data-provide="datepicker">
                                <input type="text" id="salary_cycle" name="salary_cycle" class="form-control proxima_nova_semibold create-select section_sub_title " placeholder="1 to 1 of every month">
                                <div class="input-group-addon">
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <h2 class="proxima_nova_semibold staff-pay-title">Bank Account</h2>
                <div class="shift-main-inner-edit steff-paymeny-detail">
                    <div class="shift-inner-sub-label-edit">
                        <label class="shift-type-label">Account Holder Name</label>
                        <input type="text" id="account_holder_name" name="account_holder_name" class="form-control shift-edit-input" placeholder="Enter name">
                    </div>
                    <div class="shift-inner-sub-label-edit">
                        <label class="shift-type-label">Account Number</label>
                        <input type="text" id="account_number" name="account_number" class="form-control shift-edit-input" placeholder="Enter account number">
                    </div>
                </div>
                <div class="shift-main-inner-edit steff-paymeny-detail">
                    <div class="shift-inner-sub-label-edit">
                        <label class="shift-type-label">Confirm Account Number</label>
                        <input type="text" id="confirm_account_number" name="confirm_account_number" class="form-control shift-edit-input" placeholder="Confirm account number">
                    </div>
                    <div class="shift-inner-sub-label-edit">
                        <label class="shift-type-label">IFSC Code</label>
                        <input type="text" id="IFSC_code" name="IFSC_code" class="form-control shift-edit-input" placeholder="Enter IFSC code">
                    </div>
                </div>
                <h2 class="proxima_nova_semibold staff-pay-title">UPI ID</h2>
                <div class="shift-main-inner-edit steff-paymeny-detail">
                    <div class="shift-inner-sub-label-edit">
                        <label class="shift-type-label">UPI ID</label>
                        <input type="text" id="UPI_id" name="UPI_id" class="form-control shift-edit-input" placeholder="Enter UPI ID">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="create-save-btn">
{{--                <button type="submit" name="" class="create-staff-btn proxima_nova_semibold">Create & Continue</button>--}}
                <button type="submit" name="" class="download-btn create-staff-btn proxima_nova_semibold">Create Staff
                    <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                </button>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        $('.staff-salary.date').datepicker({
            format: 'dd, M',
            autoclose: true
        });
        // $('.staff-salary.date').datepicker('setDate', new Date('2023-01-01'));

        $("#phone_number").intlTelInput({
            initialCountry: "in",
            separateDialCode: true,
        });</script>
    <script>
<<<<<<< HEAD
        // $('.add-staff-dropzone').on('click',function (){
        //     $('#images-dropzone').click();
        // })
        // let uploadedDocumentMap = {};
        // Dropzone.autoDiscover = false;
        // let myDropzone = new Dropzone("div#images-dropzone",{
        //     url: '{{ route('uploadStaffPhoto') }}',
        //     autoProcessQueue: false,
        //     thumbnailWidth:'50',
        //     maxFilesize: 2,
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
        //     successmultiple: function(data, response) {
        //         $.each(response['name'], function (key, val) {
        //             $('form').append('<input type="hidden" name="photos[]" value="' + val + '">');
        //             uploadedDocumentMap[data[key].name] = val;
        //         });
        //         var formData = new FormData($('#add_staff')[0]);
        //         $.ajax({

        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },
        //             type: 'POST',
        //             url: "{{ route('add-record-staff') }}",
        //             data: formData,
        //             processData: false,
        //             contentType: false,
        //             success: function(response) {
        //                 // console.log(response);
        //                 if (response['status'] == 1) {
        //                     toastr["success"](response.message);
        //                     $('#add_staff')[0].reset();
        //                     setTimeout(function () {
        //                         window.location.href = '/staff';
        //                     }, 3000);
        //                 }else{
        //                     toastr["error"](response.message)
        //                 }
        //             }
        //         });
        //         // }
        //     },
        //     removedfile: function (file) {
        //         $(".error").remove();
        //         file.previewElement.remove()
        //         let name = '';
        //         if (typeof file.file_name !== 'undefined') {
        //             name = file.file_name;
        //         } else {
        //             name = uploadedDocumentMap[file.name];
        //         }
        //         $('form').find('input[name="photos[]"][value="' + name + '"]').remove();
        //     },
        //     error: function(file, response) {
        //         if (file.size > this.options.maxFilesize * 1024 * 1024) {
        //             $(".image-error").html(
        //                 '<span class="error error_message proxima_nova_semibold">File size upload on ' + this.options.maxFilesize + ' MB</span>'
        //             );
        //         } else {
        //             alert('An error occurred while uploading the file.');
        //         }
        //     }
=======
        $('.add-staff-dropzone').on('click',function (){
            $('#images-dropzone').click();
        })
        let uploadedDocumentMap = {};
        Dropzone.autoDiscover = false;
        let myDropzone = new Dropzone("div#images-dropzone",{
            url: '{{ route('uploadStaffPhoto') }}',
            autoProcessQueue: false,
            thumbnailWidth:'50',
            thumbnailHeight:'50',
            uploadMultiple: true,
            addRemoveLinks: true,
            maxFilesize: 2,
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
            successmultiple: function(data, response) {
                $.each(response['name'], function (key, val) {
                    $('form').append('<input type="hidden" name="photos[]" value="' + val + '">');
                    uploadedDocumentMap[data[key].name] = val;
                });
                var formData = new FormData($('#add_staff')[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ route('add-record-staff') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response['status'] == 1) {
                            toastr["success"](response.message);
                            $('#add_staff')[0].reset();
                            setTimeout(function () {
                                window.location.href = '/staff';
                            }, 3000);
                        }else{
                            toastr["error"](response.message)
                        }
                    }
                });
                // }
            },
            removedfile: function (file) {
                $(".image-error").html('');
                file.previewElement.remove()
                let name = '';
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name;
                } else {
                    name = uploadedDocumentMap[file.name];
                }
                $('form').find('input[name="photos[]"][value="' + name + '"]').remove();
            },
            error: function(file, response) {
                if (file.size > this.options.maxFilesize * 1024 * 1024) {
                    alert('File size exceeds the limit of ' + this.options.maxFilesize + ' MB');
                    $(".error").remove();
                    $(".image-error").html(
                        '<span class="error error_message proxima_nova_semibold">File size upload on ' + this.options.maxFilesize + ' MB</span>'
                    );
                }
            }
        });
        // $('#staff-images').on('click',function (){
        //     $('#photo').click();
>>>>>>> 9ee7d98de403d43c1e001aefae0ecaf8228cb55b
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
                $("#error").after(
                    '<span class="error error_message proxima_nova_semibold">Phone number field is required</span>'
                );
                valid = false;
            } 
            else{
                if (!filter.test($('#phone_number').val())) {
                    $("#error").after(
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
<<<<<<< HEAD
            // if (myDropzone.getQueuedFiles().length === 0) {
            //     $(".image-error").html(
            //         '<span class="error error_message proxima_nova_semibold">At least one image is required</span>'
            //     );
            //     valid = false;
            // }
=======
            if (myDropzone.getQueuedFiles().length === 0) {
                $(".image-error").html(
                    '<span class="error error_message proxima_nova_semibold">At least one image is required</span>'
                );
                valid = false;
            }
>>>>>>> 9ee7d98de403d43c1e001aefae0ecaf8228cb55b
            // if ($('#photo').val() == "") {
            //     $(".staff-images").after(
            //         '<span class="error error_message proxima_nova_semibold">Photo field is required</span>'
            //     );
            //     valid = false;
            // }else {
            //     for (var i = 0; i < $("#photo").get(0).files.length; ++i) {
            //
            //         var img = $("#photo").get(0).files[i].name;
            //
            //         var img_ext = img.split('.').pop().toLowerCase();
            //         if ($.inArray(img_ext, ['jpg', 'jpeg', 'png']) === -1) {
            //             $('.staff-images').after("<span class='error'>File (" + img + ") type not allowed.</span>");
            //             valid = false;
            //         }
            //     }
            // }
            if ($('#confirm_account_number').val() != $('#account_number').val()) {
                $("#confirm_account_number").after(
                    '<span class="error error_message proxima_nova_semibold">Confirm account number not match</span>'
                );
                valid = false;
            }
            return valid;
        }

        $('#add_staff').submit(function(event) {
            event.preventDefault();
            if (fieldValidation()) {
                var phone_number = $('#phone_number').val();
                var phone_number = phone_number.replace(/\s/g, '');
                var formData = new FormData($('#add_staff')[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ route('add-record-staff') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // console.log(response);
                        if (response['status'] == 1) {
                            $('.loader').show();
                            $('.create-staff-btn').prop('disabled', true);
                            toastr["success"](response.message);
                            $('#add_staff')[0].reset();
                            setTimeout(function () {
                                window.location.href = '/staff';
                            }, 3000);
                        }else if (response['status'] == 2) {
                            // toastr["success"](response.message);
                            $("#staff_email").after(
                                '<span class="error error_message proxima_nova_semibold">'+response['message']+'</span>'
                            );
                        }else{
                            toastr["error"](response.message)
                        }
                    }
                    });
                // myDropzone.processQueue();
            }
        });
    </script>
@endsection