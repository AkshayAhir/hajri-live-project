@extends('admin.layout.main')
@section('title')
<title>{{env('APP_NAME')}} | Reports </title>
@endsection
@section('content')
<div class="main-content-inner">
    <a class="report-list" href="{{ route('attendance_report') }}">
        <!-- <div class="report-list"> -->
        <div class="atten-report-list">
            <div>
                <div class="atten_arrow_add">
                    <div class="section_sub_title proxima_nova_semibold business-manager-name">Attendance Reports
                        <div class="setting-nest-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.95462 15.8911C6.60367 15.5401 6.60367 14.9711 6.95462 14.6201L11.1121 10.4626L6.95462 6.30513C6.60367 5.95417 6.60367 5.38516 6.95462 5.0342C7.30558 4.68325 7.8746 4.68325 8.22556 5.0342L13.0185 9.82718C13.3695 10.1781 13.3695 10.7471 13.0185 11.0981L8.22556 15.8911C7.8746 16.242 7.30558 16.242 6.95462 15.8911Z"
                                    fill="#808080"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <p class="report-inner-content proxima_nova_regular">Attendance Report of Staff Month wise with single,
                multiple and all staff.</p>
        </div>


        <!-- </div> -->
    </a>
    <a class="report-list" href="{{ route('report_user_list_export') }}">
        <!-- <div class="report-list"> -->
        <div class="atten-report-list">
            <div>
                <div class="atten_arrow_add">
                    <div class="section_sub_title proxima_nova_semibold business-manager-name">User List export
                        <div class="setting-nest-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.95462 15.8911C6.60367 15.5401 6.60367 14.9711 6.95462 14.6201L11.1121 10.4626L6.95462 6.30513C6.60367 5.95417 6.60367 5.38516 6.95462 5.0342C7.30558 4.68325 7.8746 4.68325 8.22556 5.0342L13.0185 9.82718C13.3695 10.1781 13.3695 10.7471 13.0185 11.0981L8.22556 15.8911C7.8746 16.242 7.30558 16.242 6.95462 15.8911Z"
                                    fill="#808080"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <p class="report-inner-content proxima_nova_regular">Export user list for all user details and their
                summary.</p>
        </div>
        <div>
            <!-- <a class="setting-nest-arrow" href="{{ route('report_user_list_export') }}"> -->

            <!-- </a> -->
        </div>

        <!-- </div> -->
    </a>
    <a class="report-list" href="{{ route('salary_report') }}">
        <!-- <div class="report-list"> -->
        <div class="atten-report-list">
            <div>
                <div class="atten_arrow_add">
                    <div class="section_sub_title proxima_nova_semibold business-manager-name">Salary Report
                        <div class="setting-nest-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.95462 15.8911C6.60367 15.5401 6.60367 14.9711 6.95462 14.6201L11.1121 10.4626L6.95462 6.30513C6.60367 5.95417 6.60367 5.38516 6.95462 5.0342C7.30558 4.68325 7.8746 4.68325 8.22556 5.0342L13.0185 9.82718C13.3695 10.1781 13.3695 10.7471 13.0185 11.0981L8.22556 15.8911C7.8746 16.242 7.30558 16.242 6.95462 15.8911Z"
                                    fill="#808080"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <p class="report-inner-content proxima_nova_regular">Get Salary report of every employees salary and other
                related details.</p>
        </div>
        <div>
            <!-- <a class="setting-nest-arrow" href="{{ route('salary_report') }}"> -->
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M6.95462 15.8911C6.60367 15.5401 6.60367 14.9711 6.95462 14.6201L11.1121 10.4626L6.95462 6.30513C6.60367 5.95417 6.60367 5.38516 6.95462 5.0342C7.30558 4.68325 7.8746 4.68325 8.22556 5.0342L13.0185 9.82718C13.3695 10.1781 13.3695 10.7471 13.0185 11.0981L8.22556 15.8911C7.8746 16.242 7.30558 16.242 6.95462 15.8911Z"
                    fill="#808080"></path>
            </svg> -->
            <!-- </a> -->
        </div>
        <!-- </div> -->
    </a>
</div>
@endsection
@section('scripts')
<script>
    //  header notification
    function toggleDropdown() {
        const dropdown = document.querySelector('.dropdown-content');
        dropdown.classList.toggle('active');
    }

    document.addEventListener('click', function (event) {
        const dropdown = document.querySelector('.dropdown-content');
        if (!event.target.closest('.profile-main-notification')) {
            dropdown.classList.remove('active');
        }
    });

    $('.input-group.date').datepicker({
        format: 'dd, M yyyy',
        autoclose: true
    });
    $('.input-group.date').datepicker('setDate', new Date('2023-01-01'));

    //  datatable 

    $(document).ready(function () {
        var table = $('#business-setting-department').DataTable({
            searching: false,
            lengthChange: false,
            info: false,
            responsive: true,
        });

        // muklti checkbox
        $('#selectAllCheckbox').on('change', function () {
            var isChecked = $(this).prop('checked');
            $('.selectCheckbox_model').prop('checked', isChecked);
        });

        // search data
        $('#staff_data_find').on('input', function () {
            var searchValue = $(this).val();
            table.search(searchValue).draw();
        });
        $('.selectCheckbox_model').change(function () {
            if ($(this).is(':checked')) {
                $('#myModal').show();
            } else {
                $('#myModal').hide();
            }
        });
        $('#closeModal').click(function () {
            $('#myModal').hide();
        });
    });
</script>
@endsection