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
                        <h4 class="page-title pull-left proxima_nova_semibold">Bulk Salary Slip</h4>
                    </div>
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li class="section_sub_title"><a href="#">Reports</a></li>
                        <li class="section_sub_title">/ Payroll Reports</li>
                        <li class="section_sub_title">/ Bulk Salary Slip</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="shift-main-inner-edit">
        <div class="shift-inner-sub-label-edit report-inner-payroll">
            <label class="shift-type-label">Report Cycle</label>
            <input type="text" id="datepicker" class="datepicker_list form-control shift-edit-input attendance_status_month" name="start_month">
        </div>
    </div>
   
    <div class="payroll-approval-review payroll-report-review">
        <div class="approve-report-data approve-payroll-data">
            <table id="staff_datas" class="display dataTable no-footer dtr-inline" style="width: 100%;">
                <thead>
                    <tr>
                        <!-- <th class="data_list_check"><input type="checkbox" id="selectAllCheckbox"></th>  -->
                        <th>Staff Type</th>
                        <th>Report Cycle</th>
                        <th>Report Type</th>
                        <th>Generated On</th>
                        <th>Action</th>
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
        // function downloadDatatable() {         
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
                "url": "{{ route('bulk_salary_slip_list') }}",
                "dataType": "json",
                "type": "POST",
                "data": { _token: "{{csrf_token()}}",
                    "month": month,
                    "year": year,
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
        
    // downloadDatatable();
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

    function downloadPdf(id){
        var url = "{{ route('bulk_salary_pdf') }}";
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