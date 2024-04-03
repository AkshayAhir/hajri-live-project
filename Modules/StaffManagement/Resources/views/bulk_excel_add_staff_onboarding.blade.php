@extends('admin.layout.main')
@section('title')
<title>{{env('APP_NAME')}} | Staff management</title>
@endsection
@section('header-page')
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-12 top-header-sub staff-summary-main">
            <div class="breadcrumbs-area clearfix">
                <div class="breadcrumbs-sub">
                    <div class="attendance-breadcrumbs" >
                        <a class="back_button" onclick="history.back()"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                viewBox="0 0 12 12" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z"
                                    fill="#050E17" />
                            </svg></a>
                        <h4 class="page-title pull-left proxima_nova_semibold">Excel Bulk Onboarding
                        </h4>
                    </div>

                </div>
                <ul class="breadcrumbs pull-left">
                    <li class="section_sub_title">Staff Management</li>
                    <li class="section_sub_title">/ Add Staff</li>
                    <li class="section_sub_title">/ Bulk Staff</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
@php
    $count = 0;
    $checked = array();
@endphp
<div class="staff-view-profile-main excel-content">
    <div class="staff-form-muti-step">
        <div class="staff-view-profile" style="cursor:pointer" id="personal_info_form_data">
            <a href="{{route('bulk-excel-add-staff')}}">
                <p id="step1" class="staff-personal-info  proxima_nova_semibold staff-personal-first">
                    <span class="info-step step-1 ">1</span>Upload File
                </p>
            </a>
        </div>
        <div class="staff-view-profile" style="cursor:pointer" id="bank_details_form_data">
            <p id="step2" class="staff-personal-info staff_info_active proxima_nova_semibold staff-personal-secound excel-validate-save">
                <span class="info-step step-2 info_active">2</span>Validate & Save
            </p>
        </div>
        <!-- <div class="staff-view-profile">
                <p id="step3" class="staff-personal-info proxima_nova_semibold staff-personal-third">
                <span class="info-step step-3">3</span>Staff Settings</p>
            </div> -->
    </div>
</div>
<div class="approve_staff_data bulk-staff-onboarding">
    <table id="staff_datas" class="display bulk_excel_staff_onboarding" style="width:100%">
        <thead>
            <tr>
                <th class="data_list_check"><input type="checkbox" id="selectAllCheckbox" checked></th> <!-- Checkbox Column -->
                <th>Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Email</th>
{{--                <th>Department</th>--}}
                <th>Salary Amount</th>
{{--                <th>Salary Cycle Start Date</th>--}}
                <th>Account Holder Name</th>
                <th>Account Number</th>
                <th>IFSC Code</th>
                <th>UPI Id</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($data))
                @foreach($data as $key=>$value)
                    <tr id="{{$key}}">
                        <td>
                            @if($value['exists'] == 1)
                                <input type="checkbox" value="{{$key}}" disabled>
                            @else
                                <input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model" value="{{$key}}" checked>
                                @php $count++; $checked[] = $key; @endphp
                            @endif
                        </td>
                        <td>
                            <div class="user-images">
                                <div><img src="{{asset('assets/admin/images/dummy/dummy-user.png')}}" class="approve-user-img" alt="">
                                </div>
                                <div>{{$value['name']}}<p class="data-sub-field">
{{--                                        @php--}}
{{--                                            $departmentId = $value['department_id'];--}}
{{--                                            $departmentName = '';--}}
{{--                                            foreach ($departments as $department) {--}}
{{--                                                if ($department['id'] == $departmentId) {--}}
{{--                                                    $departmentName = $department['name'];--}}
{{--                                                    break;--}}
{{--                                                }--}}
{{--                                            }--}}
{{--                                            echo $departmentName;--}}
{{--                                        @endphp--}}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td>{{$value['middle_name']}}</td>
                        <td>{{$value['last_name']}}</td>
                        <td>{{$value['phone_number']}}</td>
                        <td>{{$value['email']}}</td>
                        <td>{{$value['salary_amount']}}</td>
                        <td>{{$value['account_holder_name']}}</td>
                        <td>{{$value['account_number']}}</td>
                        <td>{{$value['IFSC_code']}}</td>
                        <td>{{$value['UPI_id']}}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="13">
                        <div class="no_data_found">
                            <div class="">
                                <img src="{{asset('assets/admin/images/staff_manage/no_data.svg')}}" alt="Advertisement">
                            </div>
                            <div class="proxima_nova_semibold section_title">No data found, onboarding staff</div>
                        </div>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
<div class="onboard_btn_staff_main">
    <p>{{$count}} of <span class="selected_check_member">{{$count}}</span> selected</p>
    <button class="onboard_btn_staff">Onboard <span class="selected_check_member">{{$count}}</span> Staff</button>
</div>

@endsection
@section('scripts')
<script>
    var selectedIds = [];
    var selected = {!! json_encode($checked) !!};
    $(selected).each(function(index, value) {
        selectedIds.push('' + value + '');
    });
    var exceldata = {!! json_encode($data) !!};
    $(document).ready(function () {
        var table = $('#staff_datas').DataTable({
            // "sScrollX": "100%",
            // "sScrollXInner": "200%",
            // "bScrollCollapse": false,
            searching: false,
            lengthChange: false,
            info: false,
            responsive: true,
            bPaginate: false,
            drawCallback: function () {
                $('#selectAllCheckbox').on('change', function () {
                    var isChecked = $(this).prop('checked');
                    $('.selectCheckbox_model').prop('checked', isChecked);
                    var checkedCount = $('.selectCheckbox_model:checked').length;
                    $('.selected_check_member').html(checkedCount);
                    if (isChecked) {
                        $('.selectCheckbox_model').each(function () {
                            var id = $(this).val();
                            if (selectedIds.indexOf(id) === -1) {
                                selectedIds.push(id);
                            }
                        });
                    } else {
                        selectedIds = [];
                    }
                });
                $('.selectCheckbox_model').change(function () {
                    var id = $(this).val();
                    var checkedCount = $('.selectCheckbox_model:checked').length;
                    $('.selected_check_member').html(checkedCount);
                    if ($(this).is(':checked')) {
                        selectedIds.push(id);
                    } else {
                        const index = selectedIds.indexOf(id);
                        if (index !== -1) {
                            selectedIds.splice(index, 1);
                        }
                    }
                });
            }
        });
    });
    $('.onboard_btn_staff').on('click',function (){
        // console.log(selectedIds);
        if (selectedIds.length === 0) {
            toastr["error"]('Please at least one selected');
        } else {
            $('.onboard_btn_staff').prop('disabled', true);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('excel-add-staff') }}",
                data: {
                    "data":exceldata,
                    "selectedIds":selectedIds
                },
                // processData: false,
                // contentType: false,
                success: function (response) {
                    console.log(response.data);
                    if (response['status'] == 1) {
                        $('.loader').show();
                        toastr["success"](response.message);
                        setTimeout(function () {
                            window.location.href = '/staff';
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


