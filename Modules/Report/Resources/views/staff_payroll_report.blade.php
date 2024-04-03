@extends('admin.layout.main')
@section('title')
    <title>{{env('APP_NAME')}} | Payroll Approvals List</title>
@endsection
@section('header-page')
    <div class="page-title-area payroll-approvals payroll-approval active">
        <div class="row align-items-center">
            <div class="top-header-sub">
                <div class="breadcrumbs-area clearfix">
                    <div class="breadcrumbs-sub">
                    <div class="attendance-breadcrumbs approval-visit-btn active" id="back-button-1">
                    <a onclick="history.back()" class="back_button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z" fill="#050E17"></path>
                        </svg></a>
                        <h4 class="page-title pull-left proxima_nova_semibold">Staff Payroll Report</h4>
                    </div>
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li class="section_sub_title"><a href="#">Reports</a></li>
                        <li class="section_sub_title">/ Payroll Reports</li>
                        <li class="section_sub_title">/ Staff Payroll Report</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="">
        <div class="dashboard_current_day_txt">
            <div class="row">
                <div class="col-12 text-end">
                    <input type="text" id="datepicker" name="start_month" class="selected_date attendance_status_month proxima_nova_semibold"  readonly="true" autocomplete="off"> 
                </div>
                <!-- <div class="col-2 ">
                </div> -->
            </div>
        </div>
        <div class="approve-payroll-data">
            <table id="staff_datas" class="display dataTable no-footer dtr-inline" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Staff Payment Type</th>
                        <th>Report Cycle</th>
                        <th>Report Type</th>
                        <th>Generated On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr class="odd">
                        <td>Non Weekly Staff</td>
                        <td>Feb, 2023</td>
                        <td>Half Page</td>
                        <td>02 April,2023 | 6:51 PM</td>
                        <td>
                            <svg width="24" height="24" class="download-pdf-btn" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0009 3C12.3833 3 12.6932 3.30996 12.6932 3.69231V16.6154C12.6932 16.9977 12.3833 17.3077 12.0009 17.3077C11.6186 17.3077 11.3086 16.9977 11.3086 16.6154V3.69231C11.3086 3.30996 11.6186 3 12.0009 3Z" fill="#808080"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.69231 15.9238C4.07466 15.9238 4.38462 16.2338 4.38462 16.6161C4.38462 18.2729 5.72789 19.6161 7.38462 19.6161H16.6154C18.2721 19.6161 19.6154 18.2729 19.6154 16.6161C19.6154 16.2338 19.9253 15.9238 20.3077 15.9238C20.69 15.9238 21 16.2338 21 16.6161C21 19.0376 19.0368 21.0008 16.6154 21.0008H7.38462C4.96319 21.0008 3 19.0376 3 16.6161C3 16.2338 3.30996 15.9238 3.69231 15.9238Z" fill="#808080"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.89423 11.5113C7.16462 11.241 7.60296 11.241 7.8733 11.5114L11.9991 15.6381L16.1259 11.5114C16.3962 11.241 16.8346 11.241 17.1049 11.5114C17.3753 11.7817 17.3753 12.2201 17.1049 12.4904L12.4886 17.1067C12.3588 17.2366 12.1827 17.3095 11.9991 17.3095C11.8154 17.3095 11.6393 17.2366 11.5095 17.1067L6.89413 12.4904C6.62379 12.22 6.62384 11.7817 6.89423 11.5113Z" fill="#808080"/>
                            </svg>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
    
@endsection
@section('scripts')

<script>
    var start_month = new Date();
    start_month.setMonth(start_month.getMonth() - 1);
    var startDate = new Date(start_month);
    var endDate = new Date(new Date().getFullYear(), new Date().getMonth(), 0);

    $('#datepicker').datepicker({
        format: 'M yyyy',
        startView: 'months',
        minViewMode: 'months',
        endDate: endDate // Disable future months
    });
    var startDateFormatted = start_month.toLocaleString('en-US', { month: 'short', year: 'numeric' });
    $('#datepicker').datepicker('setDate', new Date(startDateFormatted));
    var table;
    function downloadDatatable(month = null , year = null) {
        table = $('#staff_datas').DataTable({

            // "lengthMenu": [[5, 10, 20], [5, 10, 20]],
            // lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
            // dom: '<"float-left"B><"float-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
            searching: false,
            lengthChange: false,
            info: false,
            responsive: true,
            // pagingType: "full_numbers",
            order: [
                // [0, "desc"]
            ],
            ajax: {
                "url": "{{ route('staff_report_download_list') }}",
                "dataType": "json",
                "type": "POST",
                "data": { _token: "{{csrf_token()}}",
                    'month': month,
                    'year': year
                },
                "dataSrc": "data"
            },
            initComplete: function (settings, json) {
                var api = this.api();
                if (table.rows().count() === 0) {
                    // Display image or advertisement
                    var adContent = '<tr><td colspan="5"><div class="no_data_found"><div class=""><img src="{{asset('assets/admin/images/staff_manage/no_data.svg')}}" alt="Advertisement"></div><div class="proxima_nova_semibold section_title">No data found, add staff</div></div></td></tr>';
                    $(api.table().body()).html(adContent);
                }
            },
            columns: [
                // {
                //     data: 'id',
                //     type: 'num',
                //     render: function (data, type, row) {
                //         return `<input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model" value="${row.id}">`;
                //     }
                // },
                { "data": "staff_payment_type" },
                { "data": "report_cycle" },
                { "data": "report_type" },
                { "data": "generated_on" },
                { "data": "action"},
            ],
            // createdRow: function (row, data, dataIndex) {
            //     $(row).attr('id', 'storie_col_' + data['id']);
            // },
            columnDefs: [
                // { "width": "10px", "targets": 0 },
                // { "width": "40%", "targets": 3 },
                {'targets': [0], 'orderable': false}
            ]
        });
        $('.dataTables_length').addClass('bs-select');
    }
    var start_month = $("input[name='start_month']").val();
        // Split the input string into month and year
    var parts = start_month.split(' ');
    var month_str = parts[0]; // Extract month string
    var year_str = parts[1]; // Extract year string
    // Create a date object using the month and year
    var date = new Date(Date.parse(month_str + " 1, " + year_str));
    // Extract the month and year values from the date object
    var month = date.getMonth() + 1; // Add 1 because getMonth() returns zero-based index
    var year = date.getFullYear();

    downloadDatatable(month,year);
    // $('#staff_data_find').on('input', function () {
    //     var searchValue = $(this).val();
    //     process_table.destroy();
    //     datatable(searchValue);
    // });

    $('.attendance_status_month ').on('change',function(){
        var start_month = $("input[name='start_month']").val();
        var parts = start_month.split(' ');
        var month_str = parts[0];
        var year_str = parts[1];
        var date = new Date(Date.parse(month_str + " 1, " + year_str));
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        table.destroy();
        downloadDatatable(month,year);
    });

    function downloadPayrolls(id){
        var url = "{{ route('payroll_export') }}";
        var queryParams = $.param({ payrun_id: id });
        var finalUrl = url + '?' + queryParams;
        window.location.href = finalUrl;
        if(finalUrl){
            toastr["success"]('Your files is being downloaded');
        }else {
            toastr["error"]('Somthing went wrong.');
        }
    }
</script>
@endsection