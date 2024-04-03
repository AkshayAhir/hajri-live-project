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
                        <h4 class="page-title pull-left proxima_nova_semibold">Payroll Summary</h4>
                    </div>
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li class="section_sub_title"><a href="{{route('payroll')}}">Payroll</a></li>
                        <li class="section_sub_title">/ Payroll Summary</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="dashboard_current_day_txt payroll-summary-date">
        <div class="row">
            <div class="col-10">
                <h2 class="proxima_nova_semibold section_title selected_date"></h2>
            </div>
            <div class="col-2 text-end">
                <input type="text" id="datepicker" name="start_month" class="attendance_status_month proxima_nova_semibold"  readonly="true" autocomplete="off"> 
            </div>
        </div>
        <!-- <div> 
            <h2 class="proxima_nova_semibold section_title">May 2023</h2>
            <input type="text" id="datepicker" name="start_month" class="attendance_status_month proxima_nova_semibold" value="{{ date('M Y') }}" readonly="true" autocomplete="off"> 
        </div> -->
    </div>
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="row">
                    <div class="col-7">
                        <p class="payroll-summary proxima_nova_semibold">Pending</p>
                        <h2 class="proxima_nova_semibold pending_number"></h2>
                    </div>
                    <div class="col-5">
                        <img src="{{asset('assets/admin/images/payroll/pending.png')}} " width="100%"/>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-4">
            <div class="card">
                <div class="row">
                    <div class="col-7">
                        <p class="payroll-summary proxima_nova_semibold">frozen</p>
                        <h2 class="proxima_nova_semibold">0</h2>
                    </div>
                    <div class="col-5">
                        <img src="{{asset('assets/admin/images/payroll/frozen.png')}} "/>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-4">
            <div class="card">
                <div class="row">
                    <div class="col-7">
                        <p class="payroll-summary proxima_nova_semibold">Processed</p>
                        <h2 class="proxima_nova_semibold processed_number">0</h2>
                    </div>
                    <div class="col-5">
                        <img src="{{asset('assets/admin/images/payroll/processed.png')}} " width="100%"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-4">
            <div class="third-section-box">
                <div class="atten-status-boxs">
                    <h2 class="section_title proxima_nova_semibold" id="month_count">Manual Process Payroll</h2>
                    <p class="section_sub_title proxima_nova_semibold new-view-summary">Process all payroll manually</p>
                    <a href="{{route('payroll-approvals')}}">
                        <p class="view-summary proxima_nova_semibold">View Now
                            <img src="{{asset('assets/admin/images/payroll/new-view.svg')}}" alt="">
                        </p>
                    </a>
                </div>
                <div>
                    <img src="{{asset('assets/admin/images/payroll/manual-process-payroll.svg')}}" alt="">
                </div>
            </div>
        </div>
{{--        <div class="col-6">--}}
{{--            <div class="third-section-box">--}}
{{--                <div class="atten-status-boxs">--}}
{{--                    <h2 class="section_title proxima_nova_semibold" id="month_count">Bulk in Process Payroll</h2>--}}
{{--                    <p class="section_sub_title proxima_nova_semibold new-view-summary">Process all payroll at once</p>--}}
{{--                    <a href="#">--}}
{{--                        <p class="view-summary proxima_nova_semibold">View Now--}}
{{--                            <img src="{{asset('assets/admin/images/payroll/new-view.svg')}}" alt="">--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <img src="{{asset('assets/admin/images/payroll/bulk-in-process-payroll.svg')}}" alt="">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

@endsection
@section('scripts')

<script>
    var start_month = new Date();
    start_month.setMonth(start_month.getMonth() - 1);
    // var startDate = new Date(start_month);
    var endDate = new Date(new Date().getFullYear(), new Date().getMonth(), 0);

    $('#datepicker').datepicker({
        format: 'M yyyy',
        startView: 'months',
        minViewMode: 'months',
        endDate: endDate // Disable future months
    });
    var getManualSession = {!! json_encode(Session::get('manual_process_payroll')) !!};
    if(getManualSession){
        var monthNames = [
            "Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];
        // Get the numeric month value from data
        var monthNumber = getManualSession['month'];
        // Convert numeric month to short name format
        var shortMonthName = monthNames[monthNumber - 1];
        // Get the year value from data
        var year = getManualSession['year'];
        // Construct the formatted start month string
        var startDateFormatted = shortMonthName + ' ' + year;
        $('#datepicker').datepicker('setDate', new Date(startDateFormatted));
        $('.selected_date').html(startDateFormatted);
        $('.pending_number').html(getManualSession['pending']);
        $('.processed_number').html(getManualSession['processed']);
    }else {
        var month = start_month.getMonth() + 1; // Add 1 to get the month in the range of 1 to 12
        var year = start_month.getFullYear();
        var monthNames = [
            "Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];
        // Convert numeric month to short name format
        var shortMonthName = monthNames[month - 1];
        // Construct the formatted start month string
        var startDateFormatted = shortMonthName + ' ' + year;
        $('#datepicker').datepicker('setDate', new Date(startDateFormatted));
        $('.selected_date').html(startDateFormatted);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: "{{ route('set-session-payroll') }}",
            data: {
                month: month,
                year:year
            },
            success: function(response) {
                if(response.status == 1){
                    $('.pending_number').html(response.data.pending);
                    $('.processed_number').html(response.data.processed);
                }
            }
        });
    }
    $('.attendance_status_month ').on('change',function(){
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
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: "{{ route('set-session-payroll') }}",
            data: {
                month: month,
                year:year
            },
            success: function(response) {
                if(response.status == 1){
                    location.reload();
                }
            }
        });
    });
</script>
@endsection