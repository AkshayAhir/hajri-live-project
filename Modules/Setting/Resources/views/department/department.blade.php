@extends('admin.layout.main')
@section('title')
<title>{{env('APP_NAME')}} | Settings</title>
@endsection
@section('header-page')
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 top-header-sub">
            <div class="breadcrumbs-area clearfix">
                <div class="breadcrumbs-sub">
                    <a onclick="history.back()" class="back_button"><svg xmlns="http://www.w3.org/2000/svg" width="12"
                            height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z"
                                fill="#050E17"></path>
                        </svg></a>
                    <h4 class="page-title pull-left proxima_nova_semibold">Business Settings
                    </h4>
                </div>

                <ul class="breadcrumbs pull-left">
                    <li class="section_sub_title"><a href="{{route('setting')}}">Settings</a></li>
                    <li class="section_sub_title">/ Business settings</li>
                    <li class="section_sub_title">/ Departments</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')

@if(empty($department) || !isset($department[0]))
<div class="business-create-department">
    <p class="proxima_nova_bold">No Departments Added</p>
    <button name="" class="approve-btn-btn proxima_nova_semibold create-data  dropdown-toggle proxima_nova_bold"
        data-bs-toggle="offcanvas" data-bs-target="#create-toggle-right" aria-controls="create-toggle-right">Create
        Department</button>
</div>
@else
<div class="approve_staff_data">
    <div class="create_department_table">
        <table id="staff_datas" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Departments</th>
                    <th>Assign Staff</th>
                    <th>Assign Staff</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>
    <div class="create-department">
        <button name="" class="approve-btn-btn proxima_nova_semibold create-data newly_create_department"
            data-bs-toggle="offcanvas" data-bs-target="#create-toggle-right" aria-controls="create-toggle-right">Create
            Department</button>
    </div>
</div>
@endif


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
        <h5 class="section_title_heading proxima_nova_bold download-work-main-header filter-title-main">Add Department
        </h5>
        <hr>
        <div class="filter-sub-sec">
            <form id="add_department" method="post">
                @csrf
                <div class="daily-work-select create_department_inner_form">
                    <div class="shift-inner-sub-label-edit">
                        <label class="shift-type-label">Department Name</label>
                        <input type="text" class="form-control shift-edit-input" id="name" name="name"
                            placeholder="Enter Department Name">
                    </div>


                </div>
                <div class="download-cancel-btns-main">
                    <div class="download-cancel-btn mb-0">
                        <button type="submit" name="" id="add_department_btn"
                            class="download-btn proxima_nova_semibold w-100">Create Department
                            <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="edit-toggle-right" data-bs-scroll="true"
    aria-labelledby="offcanvasRightLabel">
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
        <h5 class="section_title_heading proxima_nova_bold download-work-main-header filter-title-main">Edit Department
        </h5>
        <hr>
        <div class="filter-sub-sec">
            <form id="edit_department" method="post">
                @csrf
                <div class="edit_department_inner_form">
                    <input type="hidden" id="department_id" name="department_id">
                    <div class="daily-work-select">
                        <div class="shift-inner-sub-label-edit">
                            <label class="shift-type-label">Department Name</label>
                            <input type="text" class="form-control shift-edit-input" id="edit_name" name="edit_name"
                                placeholder="Enter Department Name">
                        </div>
                    </div>

                </div>
                <div class="download-cancel-btns-main">
                    <div class="download-cancel-btn mb-0">
                        <button type="submit" name="" class="download-btn edit_button proxima_nova_semibold w-100">Edit
                            Department
                            <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="deleteModal" data-bs-scroll="true"
    aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <div class="popup-close-btns" data-bs-dismiss="offcanvas" aria-label="Close"><svg
                xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M2.84154 2.84056C3.07296 2.60914 3.44817 2.60914 3.67959 2.84056L13.1611 12.322C13.3925 12.5535 13.3925 12.9287 13.1611 13.1601C12.9296 13.3915 12.5544 13.3915 12.323 13.1601L2.84154 3.67861C2.61011 3.44719 2.61011 3.07198 2.84154 2.84056Z"
                    fill="#808080" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M13.1611 2.84056C13.3925 3.07198 13.3925 3.44719 13.1611 3.67861L3.67959 13.1601C3.44817 13.3915 3.07296 13.3915 2.84154 13.1601C2.61011 12.9287 2.61011 12.5535 2.84154 12.322L12.323 2.84056C12.5544 2.60914 12.9296 2.60914 13.1611 2.84056Z"
                    fill="#808080" />
            </svg>
        </div>
    </div>
    <div class="offcanvas-body overflow-auto">
        <h5 class="section_title_heading proxima_nova_bold download-work-main-header filter-title-main">Delete
            Department</h5>
        <hr>
        <div class="staff_view_delete_title">
            <h5>Are you sure to delete this department?</h5>
        </div>
        <div class="filter-sub-sec">
            <div class="download-cancel-btns-main">
                <div class="download-cancel-btn mb-0">
                    <button type="submit" name=""
                        class="download-btn proxima_nova_semibold w-100 delete_department_btn close_delete_modal"
                        onclick="deleteDepartment()" data-bs-dismiss="offcanvas" aria-label="Close">Delete
                        <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                    </button>
                    <button type="submit" name="" class="download-btn proxima_nova_semibold w-100 cancel_modal" data-bs-dismiss="offcanvas" aria-label="Close">Cancel
                        <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade deleteModal" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content delete_content">
            <div class="modal-header">
                <h5 class="modal-title proxima_nova_bold" id="deleteModalLabel">Delete Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Are you sure to delete this department?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary close_delete_modal delete_department_btn" onclick="deleteDepartment()">Delete Department</button>
            </div>
            </div>
        </div>
    </div> -->
@endsection
@section('scripts')
<script>
    //table show
    $('.newly_create_department').click(function () {
        $('.loader').hide();
        $('#add_department_btn').prop('disabled', false);
    })
    var table;
    $(document).ready(function () {
        function datatable() {
            table = $('#staff_datas').DataTable({
                // "lengthMenu": [[5, 10, 20], [5, 10, 20]],
                searching: false,
                lengthChange: false,
                info: false,
                responsive: true,
                // pagingType: "full_numbers",
                order: [
                    // [0, "desc"]
                ],
                ajax: {
                    "url": "{{ route('all-department') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": { _token: "{{csrf_token()}}" }
                },
                drawCallback: function (settings) {
                    $('.dropdown-toggle').click(function () {
                        $('.dropdown-menu').toggle();
                    });
                },
                columns: [
                    { "data": "name" },
                    {
                        data: "staff_count",
                        render: function (data, type, row) {
                            return `${data} Staff`;
                        }
                    },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return `<a href="assing_staff?id=${row.id}">Assign Staff</a>`;
                        }
                    },
                    {
                        data: null,
                        render: function (data, type, row) {
                            if(row.id == 1) {
                                return ``;
                            }else{
                                return `
                                    <div class="btn-group upload-actions">
                                        <div class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                <path d="M9.9 15.7508C9.9 15.9993 9.69853 16.2008 9.45 16.2008C9.20147 16.2008 9 15.9993 9 15.7508C9 15.5023 9.20147 15.3008 9.45 15.3008C9.69853 15.3008 9.9 15.5023 9.9 15.7508" stroke="#050E17" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M9.9 3.14922C9.9 3.39775 9.69853 3.59922 9.45 3.59922C9.20147 3.59922 9 3.39775 9 3.14922C9 2.90069 9.20147 2.69922 9.45 2.69922C9.69853 2.69922 9.9 2.90069 9.9 3.14922" stroke="#050E17" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M9.9 9.45C9.9 9.69853 9.69853 9.9 9.45 9.9C9.20147 9.9 9 9.69853 9 9.45C9 9.20147 9.20147 9 9.45 9C9.69853 9 9.9 9.20147 9.9 9.45" stroke="#050E17" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item proxima_nova_semibold" href="javascript:(void);" onclick="editDepartment(${row.id})" data-bs-toggle="offcanvas" data-bs-target="#edit-toggle-right" aria-controls="edit-toggle-right">Edit</a>
                                            <a class="dropdown-item proxima_nova_semibold" href="javascript:(void);"  data-bs-toggle="offcanvas" data-bs-target="#deleteModal" aria-controls="deleteModal" onclick="getdeleteDepartment(${row.id})">Delete</a>
                                        </div>
                                    </div>`;
                            }
                        }
                    },
                ],
                // createdRow: function (row, data, dataIndex) {
                //     $(row).attr('id', 'storie_col_' + data['id']);
                // },
                columnDefs: [
                    // { "width": "40%", "targets": 3 },
                    // {'targets': [1,2], 'orderable': false}
                ]
            });
            $('.dataTables_length').addClass('bs-select');
        }
        datatable();
    });
    //end table show
    // add record
    function fieldValidation() {
        var valid = true;
        $(".error").remove();
        if ($('#name').val() == "") {
            $("#name").after(
                '<span class="error error_message proxima_nova_semibold">Department field is required</span>'
            );
            valid = false;
        }
        return valid;
    }
    $('#add_department').submit(function (event) {
        event.preventDefault();
        if (fieldValidation()) {
            var formData = new FormData($(this)[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('add-department') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    var department = <?= $department ?>;
                    if (response['status'] == 1) {
                        $('.loader').show();
                        $('#add_department_btn').prop('disabled', true);
                        toastr["success"](response.message);
                        $('#add_department')[0].reset();
                        $('#create-toggle-right').offcanvas('toggle');
                        if (department.length == 0) {
                            setTimeout(function () {
                                location.reload(true)
                            }, 2000);
                        } else {
                            table.ajax.reload(null, false);
                        }
                    } else {
                        toastr["error"](response.message)
                    }
                }
            });
        }
    });
    //end add record
    //edit and update record
    function editDepartment(departmentId) {
        // $("#edit_department")[0].reset();
        $('.loader').hide();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('edit-department') }}",
            type: "POST",
            data: { "department_id": departmentId },
            success: function (response) {
                if (response['status'] == 1) {
                    data = response['data'][0];
                    $('#department_id').val(data['id']);
                    $('#edit_name').val(data['name']);
                }
            }
        });
    }
    function editFieldValidation() {
        var valid = true;
        $(".error").remove();
        if ($('#edit_name').val() == "") {
            $("#edit_name").after(
                '<span class="error error_message proxima_nova_semibold">Department field is required</span>'
            );
            valid = false;
        }
        return valid;
    }
    $('#edit_department').submit(function (event) {
        event.preventDefault();
        if (editFieldValidation()) {
            $('.loader').show();
            $('.edit_button').prop('disabled', true);
            var formData = new FormData($(this)[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('update-department') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    if (response['status'] == 1) {
                        toastr["success"](response.message);
                        $('#edit_department')[0].reset();
                        $('#edit-toggle-right').offcanvas('toggle');
                        table.ajax.reload(null, false);
                    } else {
                        toastr["error"](response.message)
                    }
                }
            });
        }
    });
    //end edit and update record
    //delete record
    var deleteId;
    function getdeleteDepartment(id) {
        // alert(id);
        $('.delete_department_btn .loader').hide();
        $('.delete_department_btn').prop('disabled', false);
        $('.cancel_modal .loader').hide();
        $('.cancel_modal').prop('disabled', false);
        deleteId = id;
    }
    function deleteDepartment(id) {
        // alert(deleteId);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('delete-department') }}",
            type: "POST",
            data: { "delete_id": deleteId },
            success: function (response) {
                if (response['status'] == 1) {
                    $('.cancel_modal .loader').show();
                    $('.cancel_modal').prop('disabled', true);
                    $('.delete_department_btn .loader').show();
                    $('.delete_department_btn').prop('disabled', true);
                    toastr["success"](response.message);
                    $('#deleteModal').modal('hide');
                    table.ajax.reload(null, false);
                } else {
                    toastr["error"](response.message)
                }
            }
        });
    }

    //end delete record
</script>
@endsection