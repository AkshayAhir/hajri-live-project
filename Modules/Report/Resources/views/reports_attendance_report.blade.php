@extends('admin.layout.main')
@section('title')
<title>{{env('APP_NAME')}} | Report</title>
@endsection
@section('header-page')
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-12 top-header-sub staff-summary-main">
            <div class="breadcrumbs-area clearfix">
                <div class="breadcrumbs-sub">
                    <div class="attendance-breadcrumbs" onclick="history.back()">
                    <a class="back_button"><svg xmlns="http://www.w3.org/2000/svg"
                            width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z"
                                fill="#050E17" />
                        </svg></a>
                        <h4 class="page-title pull-left proxima_nova_semibold">Attendance Reports
                        </h4>
                    </div>

                </div>
                <ul class="breadcrumbs pull-left">
                    <li class="section_sub_title">Reports</li>
                    <li class="section_sub_title">/ Attendance Reports</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="main-content-inner on-time-main main-atten">

    <row>
        <div class="approve-datas atten-datas report-main-list attendance_reports_table_top report_atten_report ">
            <div class="atten-data-search assign-data-search report_data col-6">
                <p class="proxima_nova_semibold holiday-staff-list-day">Total Staffs
                    <span class="holiday-policy-count proxima_nova_bold">({{$staff_count}})</span>
                </p>
                <form action="" method="">
                    <input class="input-search-rounded" type="text" id="staff_data_find" placeholder="Search">
                </form>

            </div>
            
            <div class="approve-right-data report_atten_right_data col-6">
                <div class="approve-data-download  dropdown-toggle proxima_nova_bold report_data_download">
                    <a id="export_excel">
                        <div class="export_report_data">
                            <p class="export_data_report section_sub_title">Export</p>
                        </div>
                        <div class="report_down_img"> 
                            <img class="" src="{{ asset('assets/admin/images/approve_punches/download-report.svg')}}" alt="">
                        </div>
                    </a>
                </div>
                    <!-- <div class="dropdown-menu" x-placement="bottom-start">
                        <a class="dropdown-item proxima_nova_semibold" id="export_excel" href="{{ route('attendance_report_excel') }}">Excel Report</a>
                        <a class="dropdown-item proxima_nova_semibold" id="export_pdf" href="#">PDF Report</a>
                    </div> -->
                <div class="business_selct_box select_mate_option staff-option_select">
                    <select class="mySelect2 number_page_sorting">
                        <option value="10perpage" selected>10 Per Page</option>
                        <option value="50perpage">50 Per Page</option>
                        <option value="100perpage">100 Per Page</option>
                        <option value="all">All</option>
                    </select>
                </div>
                <div class="input-group date" data-provide="datepicker">
                    <input type="text" id="calender_date" class="form-control input-group-addon proxima_nova_semibold calender-picker" value="{{ date('M Y') }}" readonly="true" autocomplete="off">
                </div>                    
            </div>
        </div>
    </row>

    <div class="approve_staff_data reports_attendance_table">
        <table id="staff_datas" class="display" style="width:100%">
            <thead>
                <tr>
                    <th class="data_list_check"><input type="checkbox" id="selectAllCheckbox"></th> <!-- Checkbox Column -->
                    <th>Staff Name</th>
                    <th>Staff ID</th>
                    <th>Present Days</th>
                    <th>Absent Days</th>
                    <th>Total Work Hours</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')
<script>


    function formatOption(option) {
        if (!option.id) {
            return option.text;
        }
        var optionImage = $(option.element).data('image');
        var optionText = option.text;
        var $option = $(
            '<span><img class="option-image" src="' + optionImage + '"/> ' + optionText + '</span>'
        );
        return $option;
    }

    $('.input-group.date').datepicker({
        format: 'M yyyy',
        autoclose: true,
        startView: 'months',
        minViewMode: 'months',
        endDate: '+0m',
        setDate : new Date(),
    });
    // $('.input-group.date').datepicker('setDate', new Date());

    //  datatable 
    var selectedIds = [];
    var unselectedIds = [];

    $(document).ready(function () {
        $('.mySelect2').select2({
            minimumResultsForSearch: Infinity,
        }).on('select2:open', function (e) {
            $('.select2-container').addClass('staff-down-data');
        });
        var table;

        function datatable(searchValue = null, calender_date = null, number_page_sorting = null) {
            table = $('#staff_datas').DataTable({
                // "lengthMenu": [[5, 10, 20], [5, 10, 20]],
                // lengthMenu: [ [10, 20, 50, -1], [10, 20, 50, "All"] ],
                // dom: '<"float-left"B><"float-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
                searching: false,
                lengthChange: false,
                info: false,
                responsive: true,
                // pagingType: "full_numbers",
                order: [
                    [0, "desc"]
                ],
                drawCallback: function () {
                    $('#selectAllCheckbox').on('change', function () {
                        var isChecked = $(this).prop('checked');
                        $('.selectCheckbox_model').prop('checked', isChecked);
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
                    "url": "{{ route('attendance_report_list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": {
                        _token: "{{csrf_token()}}",
                        'searchValue': searchValue,
                        'calender_date': calender_date,
                        'number_page_sorting': number_page_sorting ,
                    },
                    "dataSrc": "data"
                },
                initComplete: function(settings, json) {
                    var api = this.api();
                    if (table.rows().count() === 0) {
                        // Display image or advertisement
                        var adContent = '<tr><td colspan="7"><div class="no_data_found"><div class=""><img src="{{asset('assets/admin/images/no_reports.svg')}}" alt="Advertisement"></div><div class="proxima_nova_semibold section_title">No data found</div></div></td></tr>';
                        $(api.table().body()).html(adContent);
                    } 
                },
                columns: [
                    {
                        data: 'id',
                        type: 'num',
                        render: function (data, type, row) {
                            return `<input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model" value="${row.id}">`;
                        }
                    },
                    {
                        data: "name",
                        render: function (data, type, row) {
                            var routeUrl = "{{ route('staff-profile', ':id') }}";
                            var url = routeUrl.replace(':id', row.staff_ids);
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
                    { "data": "staff_id" },
                    { "data": "present_days" },
                    { "data": "absent_days" },
                    { "data": "total_work_hours" },
                    // {"data": "overtime"},
                    // {"data": "fine"},
                    // {"data": "action"},
                ],
                columnDefs: [
                    { "width": "10px", "targets": 0 }
                ]
            });
            $('.dataTables_length').addClass('bs-select');
        }
        datatable();

        $('#staff_data_find').on('input', function () {
            var searchValue = $('#staff_data_find').val();
            var calender_date = $('#calender_date').val();
            var number_page_sorting = $('.number_page_sorting').val();
            table.destroy();
            datatable(searchValue,calender_date,number_page_sorting);
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

        $('#calender_date').on('change', function () {
            var searchValue = $('#staff_data_find').val();
            var calender_date = $('#calender_date').val();
            var number_page_sorting = $('.number_page_sorting').val();
            table.destroy();
            datatable(searchValue,calender_date,number_page_sorting);
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
            var calender_date = $('#calender_date').val();
            var number_page_sorting = $('.number_page_sorting').val();
            table.destroy();
            datatable(searchValue,calender_date,number_page_sorting);
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

    $('#export_excel').on('click', function (e) {
        e.preventDefault();
        var url = '{{ route('attendance_report_excel') }}';
        var calender_date = $('#calender_date').val();
        var queryParams = $.param({ selectedIds: selectedIds , calender_date:calender_date}); // Convert array to query param

        // Construct the final URL
        var finalUrl = url + '?' + queryParams;

        // Redirect to the URL with selectedIds as a query parameter
        window.location.href = finalUrl;// Pass the selectedIds array to the function
        $('.selectCheckbox_model').prop('checked', false);
        selectedIds = [];
        unselectedIds = [];
        if(finalUrl){
            toastr["success"]('Your files is being downloaded');
        }else {
            toastr["error"]('Somthing went wrong.');
        }
        // console.log(selectedIds) ;
    });

</script>
@endsection