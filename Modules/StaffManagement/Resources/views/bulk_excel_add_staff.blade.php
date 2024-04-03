@extends('admin.layout.main')
@section('title')
<title>{{env('APP_NAME')}} | Staff management</title>
@endsection
@section('header-page')
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 top-header-sub">
            <div class="breadcrumbs-area clearfix">
                <div class="breadcrumbs-sub">
                    <a onclick="history.back()" class="back_button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z"
                                fill="#050E17"></path>
                        </svg>
                    </a>
                    <h4 class="page-title pull-left proxima_nova_semibold">Excel Bulk Onboarding</h4>
                </div>
                <ul class="breadcrumbs pull-left">
                    <li class="section_sub_title"><a href="{{route('staff')}}">Staff Management</a></li>
                    <li class="section_sub_title">/ Add Staff</li>
                    <li class="section_sub_title">/ Bulk Staff</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="staff-view-profile-main excel-content">
    <div class="staff-form-muti-step">
        <div class="staff-view-profile" style="cursor:pointer" id="personal_info_form_data">
            <p id="step1" class="staff-personal-info staff_info_active proxima_nova_semibold staff-personal-first">
                <span class="info-step step-1 info_active">1</span>Upload File
            </p>
        </div>
        <div class="staff-view-profile" style="cursor:pointer" id="bank_details_form_data">
            <a href="{{route('bulk-excel-add-staff-onboarding')}}">
                <p id="step2" class="staff-personal-info proxima_nova_semibold staff-personal-secound excel-validate-save">
                    <span class="info-step step-2">2</span>Validate & Save
                </p>
            </a>
        </div>
        <!-- <div class="staff-view-profile">
                <p id="step3" class="staff-personal-info proxima_nova_semibold staff-personal-third">
                <span class="info-step step-3">3</span>Staff Settings</p>
            </div> -->
    </div>
</div>
<div class="excel-border"></div>
<div class="row">
    <div class="col-8 bulk-dataformate-upload">
        <div class="">
            <h4 class="page-title pull-left proxima_nova_semibold">Excel/CSV sheet format for upload.</h4>
        </div>
        <div class="">
            <a href="{{ route('download_template_excel') }}">
                <button type="button" name="" class="download-btn proxima_nova_semibold apply_staff_filter excel-down-tem" data-bs-dismiss="offcanvas" aria-label="Close">Download Template</button>
            </a>
        </div>
    </div>
</div>
<div class="excel-border"></div>
    <form id="import_form" enctype="multipart/form-data">
        <div class="row">
            <div class="col-10 upload-instru-data-show">
                <div class="col-7 excel-upload-template">
                    <p class="proxima_nova_semibold upload-template">Upload Template</p>
        {{--            <div class="shift-inner-sub-label-edit">--}}
        {{--                <div class="needsclick dropzone excel-dropzone" id="excel-dropzone" style="text-align: center">--}}
        {{--                    <div class="add-staff-dropzone">--}}
        {{--                        <div class="upload-images">--}}
        {{--                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">--}}
        {{--                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.73828 8.75C4.73828 5.72969 7.18672 3.28125 10.207 3.28125H21.5198C22.9703 3.28125 24.3613 3.85742 25.3868 4.88301L28.6574 8.15353C29.6829 9.17912 30.2591 10.5701 30.2591 12.0205V26.25C30.2591 29.2703 27.8107 31.7188 24.7904 31.7188H10.207C7.18672 31.7188 4.73828 29.2703 4.73828 26.25V8.75ZM10.207 5.46875C8.39485 5.46875 6.92578 6.93782 6.92578 8.75V26.25C6.92578 28.0622 8.39485 29.5312 10.207 29.5312H24.7904C26.6026 29.5312 28.0716 28.0622 28.0716 26.25V12.0205C28.0716 11.1503 27.7259 10.3157 27.1106 9.70032L23.84 6.42981C23.2247 5.81445 22.3901 5.46875 21.5198 5.46875H10.207Z" fill="#808080" />--}}
        {{--                                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1445 3.28125C21.7486 3.28125 22.2383 3.77094 22.2383 4.375V9.47917C22.2383 10.4859 23.0544 11.3021 24.0612 11.3021H29.1654C29.7694 11.3021 30.2591 11.7918 30.2591 12.3958C30.2591 12.9999 29.7694 13.4896 29.1654 13.4896H24.0612C21.8463 13.4896 20.0508 11.6941 20.0508 9.47917V4.375C20.0508 3.77094 20.5405 3.28125 21.1445 3.28125Z" fill="#808080" />--}}
        {{--                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.7266 16.7266C17.1537 16.2995 17.8463 16.2995 18.2734 16.7266L21.5546 20.0079C21.9818 20.435 21.9818 21.1275 21.5546 21.5546C21.1275 21.9818 20.435 21.9818 20.0079 21.5546L17.5 19.0468L14.9921 21.5546C14.565 21.9818 13.8725 21.9818 13.4454 21.5546C13.0182 21.1275 13.0182 20.435 13.4454 20.0079L16.7266 16.7266Z" fill="#808080" />--}}
        {{--                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.4902 16.4062C18.0943 16.4062 18.584 16.8959 18.584 17.5V24.7917C18.584 25.3957 18.0943 25.8854 17.4902 25.8854C16.8862 25.8854 16.3965 25.3957 16.3965 24.7917V17.5C16.3965 16.8959 16.8862 16.4062 17.4902 16.4062Z" fill="#808080" />--}}
        {{--                            </svg>--}}
        {{--                        </div>--}}
        {{--                        <p class="staff-image-dragdrop proxima_nova_bold">Drag & drop your files or <label for="custom-file-upload" class="file-upload proxima_nova_bold">Select Files</label></p>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="image-error"></div>--}}
        {{--            </div>--}}
                    <div class="shift-inner-sub-label-edit">
                        <div class="form-group col-sm-12 files file-area">
                            <input type="file" class="custom-file-input form-control import_file" id="import_file" name="import_file"/>
                        </div>
                    </div>
                </div>
                <div class="col-5 excel-instruction">
                    <div>
                        <h2 class="proxima_nova_semibold section_title bulk-instruction">Instructions</h2>
                    </div>
                    <div class="instruction-right-section">
                        <p>1. Download the format (.xlsx) first by clicking the Download
                            Template button on the left. For each salary template, ther e
                            is a different format.</p>
                        <p>2. Add details of the staff as mentioned in the template. Please
                            make sure to read the instructions given in the downloaded
                            template.</p>
                        <p>3. Select the respective salary template and upload the file.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="excel-staff-submit-main">
            <button class="excel-add-staff-btn" type="submit">Submit</button>
        </div>
    </form>

@endsection
@section('scripts')
    <script>
        function fieldValidation(){
            var valid = true;
            $(".error").remove();
            if ($('#import_file').val() == "") {
                $("#import_file").after(
                    '<span class="error error_message proxima_nova_semibold">Upload file field is required</span>'
                );
                valid = false;
            }else{
                var fileExtension = $('#import_file').val().split('.').pop().toLowerCase();
                if (fileExtension !== 'xlsx' && fileExtension !== 'csv') {
                    $("#import_file").after(
                        '<span class="error error_message proxima_nova_semibold">Only Excel (xlsx) and CSV files are allowed</span>'
                    );
                    valid = false;
                }
            }
            return valid;
        }
        // import question file
        $('#import_form').submit(function(event) {
            event.preventDefault();
            if (fieldValidation()) {
                var formData = new FormData($(this)[0]);
                $('.excel-add-staff-btn').prop('disabled', true);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ route('upload-excel-add-staff') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // console.log(response.data);
                        if (response['status'] == 1) {
                            $('.loader').show();
                            toastr["success"](response.message);
                            $('#import_form')[0].reset();
                            setTimeout(function () {
                                window.location.href = '/staff/bulk_excel_add_staff_onboarding';
                            }, 3000);
                        }else{
                            toastr["error"](response.message)
                        }
                    }
                });
            }
        });
    </script>
@endsection