@extends('admin.layout.main')
@section('title')
    <title>{{env('APP_NAME')}} | Settings</title>
@endsection
@section('header-page')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-12 top-header-sub staff-summary-main">
                <div class="breadcrumbs-area clearfix">
                    <div class="breadcrumbs-sub"> 
                        <div class="attendance-breadcrumbs">
                        <a onclick="history.back()" class="back_button"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z" fill="#050E17"></path>
                        </svg></a>
                            <h4 class="page-title pull-left proxima_nova_semibold">Assign Staff
                            </h4>
                        </div>

                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="index.html">Settings</a></li>
                        <li class="section_sub_title">/  Business settings</li>
                        <li class="section_sub_title">/  Departments</li>
                        <li class="section_sub_title">/  Assign Staff</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('content')
    <div class="main-content-inner on-time-main main-atten">

        <row>
            <div class="approve-datas atten-datas">
                <div class="atten-data-search assign-data-search col-md-6 col-sm-6">
                    
                    <form action="" method="">
                        <input class="input-search-rounded" type="text" id="staff_data_find"
                            placeholder="Search">
                    </form>

                </div>
                <div class="col-md-6 col-sm-6 staff-right-length">  
                    <div class="business_selct_box select_mate_option staff-option_select">
                        <select class="mySelect_pagi number_page_sorting">
                            <option value="10perpage">10 Per Page</option>
                            <option value="50perpage">50 Per Page</option>
                            <option value="100perpage">100 Per Page</option>
                            <option value="all">All</option>
                        </select>
                    </div>
                </div>
                
            </div>
        </row>

        <div class="approve_staff_data">
            <table id="staff_datas" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th class="data_list_check"><input type="checkbox" id="selectAllCheckbox"></th> <!-- Checkbox Column -->
                        <th>Staff Name</th>
                        <th>Staff ID</th>
                        <th>Salary Payment Type</th>
                        <th>Phone Number</th>
                    </tr>
                </thead>
                <tbody>
                    

                </tbody>
            </table>
        </div>
        <input type="hidden" name="" id="department_id" value="{{$id}}">
        <div class="assign-edit-btn">
            <button name="" id="apply_department_to_staff" class="save-staff-btn proxima_nova_semibold">Assign Staff (<span class="save_count">0</span>)
                <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
            </button>
        </div>

        <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="view-toggle-right"
            data-bs-scroll="true" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <div class="popup-close-btns" data-bs-dismiss="offcanvas" aria-label="Close"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2.84154 2.84056C3.07296 2.60914 3.44817 2.60914 3.67959 2.84056L13.1611 12.322C13.3925 12.5535 13.3925 12.9287 13.1611 13.1601C12.9296 13.3915 12.5544 13.3915 12.323 13.1601L2.84154 3.67861C2.61011 3.44719 2.61011 3.07198 2.84154 2.84056Z"
                            fill="#808080" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M13.1611 2.84056C13.3925 3.07198 13.3925 3.44719 13.1611 3.67861L3.67959 13.1601C3.44817 13.3915 3.07296 13.3915 2.84154 13.1601C2.61011 12.9287 2.61011 12.5535 2.84154 12.322L12.323 2.84056C12.5544 2.60914 12.9296 2.60914 13.1611 2.84056Z"
                            fill="#808080" />
                    </svg></div>
            </div>
            <h5 class="section_title_heading proxima_nova_bold download-work-main-header">View Log</h5>
            <hr>

            <div class="view-log-model">
                <h2 class="proxima_nova_semibold section_title">
                    Sweta Vaghasiya
                </h2>
                <p>20 April | Wed</p>
            </div>
            <ul class="view-log-content">
                <li class="view-log-status proxima_nova_semibold section_title">Marked Absent</li>
                <p>By Dhruvi on 25 April, 10:31 AM</p>
            </ul>
            <div class="download-cancel-btns-main">
                <div class="download-cancel-btn">
                    <button name="" class="download-btn proxima_nova_semibold">Done</button>
                </div>
            </div>
        </div>

        <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="daily-toggle-right"
            data-bs-scroll="true" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <div class="popup-close-btns" data-bs-dismiss="offcanvas" aria-label="Close"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2.84154 2.84056C3.07296 2.60914 3.44817 2.60914 3.67959 2.84056L13.1611 12.322C13.3925 12.5535 13.3925 12.9287 13.1611 13.1601C12.9296 13.3915 12.5544 13.3915 12.323 13.1601L2.84154 3.67861C2.61011 3.44719 2.61011 3.07198 2.84154 2.84056Z"
                            fill="#808080" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M13.1611 2.84056C13.3925 3.07198 13.3925 3.44719 13.1611 3.67861L3.67959 13.1601C3.44817 13.3915 3.07296 13.3915 2.84154 13.1601C2.61011 12.9287 2.61011 12.5535 2.84154 12.322L12.323 2.84056C12.5544 2.60914 12.9296 2.60914 13.1611 2.84056Z"
                            fill="#808080" />
                    </svg></div>
            </div>
            <div class="offcanvas-body overflow-auto">
                <h5 class="section_title_heading proxima_nova_bold download-work-main-header">
                    Daily Report</h5>
                <span class="allow-name">Download daily report</span>
                <hr>
                <div class="filter-sub-sec">
                    <form method="">
                        <div class="download-report-sec">
                            <h2
                                class="filter-shiftcheck proxima_nova_semibold section_sub_title atten-download-report">
                                Excel Report</h2>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path d="M11.667 9.16699L9.99953 10.8337L8.33203 9.16699" stroke="#808080"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <rect x="2.5" y="2.5" width="15" height="15" rx="5" stroke="#808080"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.99967 6.66699V10.8337" stroke="#808080" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12.5 13.3337H7.5" stroke="#808080" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="download-report-sec pdf-report">
                            <h2
                                class="filter-shiftcheck proxima_nova_semibold section_sub_title atten-download-report">
                                PDF Report</h2>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path d="M11.667 9.16699L9.99953 10.8337L8.33203 9.16699" stroke="#808080"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <rect x="2.5" y="2.5" width="15" height="15" rx="5" stroke="#808080"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.99967 6.66699V10.8337" stroke="#808080" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12.5 13.3337H7.5" stroke="#808080" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>

                        <div class="download-cancel-btns-main">
                            <div class="download-cancel-btn">
                                <button name="" class="download-btn proxima_nova_semibold">Apply</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="filter-toggle-right"
            data-bs-scroll="true" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <div class="popup-close-btns" data-bs-dismiss="offcanvas" aria-label="Close"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                        fill="none">
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
                    Filter</h5>
                <hr>
                <div class="filter-sub-sec">
                    <form method="">
                        <div class="daily-work-select">
                            <h2 class="filter-shiftcheck section_title proxima_nova_semibold">Shift Type</h2>
                            <div class="form-check filter-shift-main">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">
                                    Monthly
                                </label>
                            </div>
                            <div class="form-check filter-shift-main">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">
                                    Pay Per Work
                                </label>
                            </div>
                            <div class="form-check filter-shift-main">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">
                                    Weekly
                                </label>
                            </div>
                            <div class="form-check filter-shift-main">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">
                                    Daily Regular
                                </label>
                            </div>
                            <div class="form-check filter-shift-main">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">
                                    Daily
                                </label>
                            </div>
                            <div class="form-check filter-shift-main">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">
                                    Hourly
                                </label>
                            </div>
                            <div class="form-check filter-shift-main">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">
                                    Monthly Regular
                                </label>
                            </div>
                            <div class="form-check filter-shift-main">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label proxima_nova_regular" for="flexCheckChecked">
                                    Hourly Regular
                                </label>
                            </div>
                        </div>

                        <div class="download-cancel-btns-main">
                            <div class="download-cancel-btn">
                                <button name="" class="download-btn proxima_nova_semibold">Apply</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="offcanvas offcanvas-end daily-work-data-download" tabindex="-1" id="create-toggle-right"
            data-bs-scroll="true" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <div class="popup-close-btns" data-bs-dismiss="offcanvas" aria-label="Close"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                        fill="none">
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
                    Add Note</h5>
                <hr>
                <div class="filter-sub-sec">
                    <form method="">
                        <div class="daily-work-select">
                            <h2 class="filter-shiftcheck section_title proxima_nova_semibold">Sweta Vaghasiya
                            </h2>
                            <div class="form-check add-note-main">
                                <textarea placeholder="Leave needs to be added."
                                    class="section_sub_title"></textarea> </textarea>
                            </div>

                            <div class="download-cancel-btns-main">
                                <div class="download-cancel-btn">
                                    <button name="" class="download-btn proxima_nova_semibold">Save</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script> 

    //  datatable 

    var table;
    var selectedIds = [];
    var unselectedIds = [];
   

    $(document).ready(function (){
        $('.mySelect_pagi').select2({
            minimumResultsForSearch: Infinity,
        }) .on('select2:open', function (e) {
            $('.select2-container').addClass('staff-down-data');
        }); 
        function datatable(searchValue = null) {
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
                drawCallback: function() {
                    var checkedCount = $('.selectCheckbox_model:checked').length;
                    $('.save_count').html(checkedCount);
                    $('#selectAllCheckbox').on('change', function () {
                        var isChecked = $(this).prop('checked');
                        $('.selectCheckbox_model').prop('checked', isChecked);
                        var checkedCount = $('.selectCheckbox_model:checked').length;
                        $('.save_count').html(checkedCount);
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
                        // console.log('Selected IDs:', selectedIds);
                    });

                    $('.selectCheckbox_model').change(function () {
                        var checkedCount = $('.selectCheckbox_model:checked').length;
                        $('.save_count').html(checkedCount);
                        var id = $(this).val();
                        
                        if ($(this).is(':checked')) {
                            selectedIds.push(id);
                            
                            const index = unselectedIds.indexOf(id);
                            if (index !== -1) {
                                unselectedIds.splice(index, 1);
                            }
                        } else {
                            const index = selectedIds.indexOf(id);
                            if (index !== -1) {
                                selectedIds.splice(index, 1);
                            }                            
                            if (!unselectedIds.includes(id)) {
                                unselectedIds.push(id);
                            }
                        }
                        // console.log('Selected IDs:', selectedIds);
                        // console.log('unSelected IDs:', unselectedIds);
                    });
                },
                ajax: {
                    "url": "{{ route('department_staff_list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": {_token: "{{csrf_token()}}",'searchValue':searchValue,'department_id': $('#department_id').val()}
                },
                columns: [
                    {
                        data: 'id',
                        type: 'num',
                        render: function (data, type, row) {
                            var isChecked = (row.apply_id) ? 'checked' : '';
                            // return `<input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model" value="${row.id}">`;
                            return `<input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model" value="${row.id}" ${isChecked}>`;
                        }
                    },
                    {
                        data: "name",
                        render: function (data, type, row) {
                            var routeUrl = "{{ route('staff-profile', ':id') }}";
                            var url = routeUrl.replace(':id', row.id);
                            return `
                                <a href="${url}" class="staff-edit">
                                    <div class="user-images">
                                        <div><img src="${row.staff_photo}" class="approve-user-img" alt=""></div>
                                        <div>${data}<p class="data-sub-field">${row.department_name}</p></div>
                                    </div>
                                </a>
                            `;
                        }
                    },
                    { "data": "staff_id"},
                    {
                        data: 'salary_payment_type',
                        render: function (data, type, row) {
                            return `<div class="salary-payment-type">
                            <div class="salary-payment-text section_sub_title">R
                            <div class="tooltip-text">Regular</div></div>Monthly
                        </div>`;
                        }
                    },
                    { "data": "phone_number"},
                ],
                // createdRow: function (row, data, dataIndex) {
                //     $(row).attr('id', 'storie_col_' + data['id']);
                // },
                columnDefs: [
                    { "width": "10px", "targets": 0 }
                    // { "width": "40%", "targets": 3 },
                    // {'targets': [1,2], 'orderable': false}
                ]
            });
            $('.dataTables_length').addClass('bs-select');
        }
        datatable();
        $('#staff_data_find').on('input', function () {
            var searchValue = $('#staff_data_find').val();
            var number_page_sorting = $('.number_page_sorting').val();
            table.destroy();
            datatable(searchValue, number_page_sorting);
            if (number_page_sorting === 'all') {
                table.page.len(-1).draw(); // Show all records
                $('.staff-down-data .select2-dropdown').addClass("pagination_all_data");
            } else if (number_page_sorting === '10perpage') {
                table.page.len(10).draw(); // Show 10 records per page
            } else if (number_page_sorting === '50perpage') {
                table.page.len(50).draw(); // Show 50 records per page
            } else if (number_page_sorting === '100perpage') {
                table.page.len(100).draw(); // Show 100 records per page
            } else {
                table.page.len(parseInt(number_page_sorting)).draw(); // Show selected number of records per page
            }
        });
        $('.number_page_sorting').change(function () {
            var searchValue = $('#staff_data_find').val();
            var number_page_sorting = $('.number_page_sorting').val();
            table.destroy();
            datatable(searchValue, number_page_sorting);
            if (number_page_sorting === 'all') {
                $('.staff-down-data .select2-dropdown').addClass("pagination_all_data");
                table.page.len(-1).draw(); // Show all records
            } else if (number_page_sorting === '10perpage') {
                table.page.len(10).draw(); // Show 10 records per page
            } else if (number_page_sorting === '50perpage') {
                table.page.len(50).draw(); // Show 50 records per page
            } else if (number_page_sorting === '100perpage') {
                table.page.len(100).draw(); // Show 100 records per page
            } else {
                table.page.len(parseInt(number_page_sorting)).draw(); // Show selected number of records per page
            }
        })
        
        
    });

    $('#apply_department_to_staff').click(function(){
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('apply_department_to_staff') }}",
                data: {
                    'selectedIds':selectedIds,
                    'unselectedIds':unselectedIds,
                    'department_id' : $('#department_id').val(),
                },
                success: function(response) {
                     if ( response['status'] == 1){
                        $('.loader').show();
                        $('#apply_department_to_staff').prop('disabled', true);
                        selectedIds = [];
                        unselectedIds = [];
                        toastr["success"](response.message)
                        table.ajax.reload(null, false);
                        setTimeout(function () {
                            var redirectUrl = "{{ url('setting/departments') }}"
                            window.location.href = redirectUrl;
                        }, 3000);
                    } else {
                        toastr["error"](response.message)
                    }
                }
            });
    })


</script>
@endsection