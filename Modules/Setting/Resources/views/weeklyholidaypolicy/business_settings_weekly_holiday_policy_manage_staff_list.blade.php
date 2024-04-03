@extends('admin.layout.main')
@section('title')
    <title>{{env('APP_NAME')}} | Weekly Holiday Template</title>
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
                            <h4 class="page-title pull-left proxima_nova_semibold">Manage Staff List
                            </h4>
                        </div>

                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{route('setting')}}">Settings</a></li>
                        <li class="section_sub_title">/  Business settings</li>
                        <li class="section_sub_title">/  Weekly holiday policy</li>
                        <li class="section_sub_title">/  Manage Staff List</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content') 
        <div class="main-content-inner on-time-main main-atten">

            <row>
                <div class="approve-datas atten-datas business-policy-staff-list">
                    <div class="atten-data-search assign-data-search col-md-6 col-sm-6">
                        @if($day == 0 || $staff_day == 0)
                            <p class="proxima_nova_semibold holiday-staff-list-day">Sunday</p>
                        @elseif($day == 1 || $staff_day == 1)
                            <p class="proxima_nova_semibold holiday-staff-list-day">Monday</p>
                        @elseif($day == 2 || $staff_day == 2)
                            <p class="proxima_nova_semibold holiday-staff-list-day">Tuesday</p>
                        @elseif($day == 3 || $staff_day == 3)
                            <p class="proxima_nova_semibold holiday-staff-list-day">Wednesday</p>
                        @elseif($day == 4 || $staff_day == 4)
                            <p class="proxima_nova_semibold holiday-staff-list-day">Thursday</p>
                        @elseif($day == 5 || $staff_day == 5)
                            <p class="proxima_nova_semibold holiday-staff-list-day">Friday</p>
                        @elseif($day == 6 || $staff_day == 6)
                            <p class="proxima_nova_semibold holiday-staff-list-day">Saturday</p>
                        @endif
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
            
            <div class="approve_staff_data weekly_holiday_policy_staff_manage_table">
                <table id="staff_datas" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th class="data_list_check "><input type="checkbox" id="selectAllCheckbox"></th> <!-- Checkbox Column -->
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

            <div class="assign-edit-btn">
                <button name="" class="save-staff-btn proxima_nova_semibold">Save (<span class="save_count">0</span>)
                    <img class="loader" src="{{asset('assets/admin/images/white_loader.gif')}}" alt="">
                </button>
            </div>
        </div>
@endsection
@section('scripts')
    <script>                 
        //  datatable
        var table;
        var selectedIds = [];
        var unselectedIds = [];
        
        var days = '<?php echo $day; ?>';
        var staff_day = '<?php echo $staff_day; ?>';

        if (days === '') {
            staff_day = '<?php echo $staff_day; ?>';
        }
        if (staff_day === '') {
            days = '<?php echo $day; ?>';
        }
        $(document).ready(function (){
            $('.mySelect_pagi').select2({
                minimumResultsForSearch: Infinity,
            })  .on('select2:open', function (e) {
            $('.select2-container').addClass('staff-down-data');
        });
            // console.log(days);
            function datatable(searchValue = null) {
                table = $('#staff_datas').DataTable({
                    // "lengthMenu": [[5, 10, 20], [5, 10, 20]],
                    searching: false,
                    lengthChange: false,
                    info: false,
                    responsive: true,
                    // pagingType: "full_numbers",
                    order: [
                        [0, "desc"]
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
                        "url": "{{ route('weekly_holiday_staff_list') }}",
                        "dataType": "json",
                        "type": "POST",
                        "data": {_token: "{{csrf_token()}}",'searchValue':searchValue, 'day':days, 'staff_day':staff_day}
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
        
        })                        

        $('.save-staff-btn').click(function(){
            $('.loader').show();
            $('.save-staff-btn').prop('disabled', true);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('weekly_holiday_to_staff') }}",
                data: {
                    'selectedIds':selectedIds,
                    'unselectedIds':unselectedIds,
                    'day' : days,
                    'staff_day':staff_day
                },
                success: function(response) {
                     if ( response['status'] == 1){
                        selectedIds = [];
                        unselectedIds = [];
                        toastr["success"](response.message)
                        setTimeout(function () {
                            var redirectUrl = "{{ url('setting/weekly_holiday_policy_staff_level') }}"
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