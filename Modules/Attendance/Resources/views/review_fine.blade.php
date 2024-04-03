@extends('admin.layout.main')
@section('title')
    <title>{{env('APP_NAME')}} | Attendance</title>
@endsection
@section('header-page')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6 top-header-sub">
                <div class="breadcrumbs-area clearfix">
                    <div class="breadcrumbs-sub">
                        <img src="{{asset('assets/admin/images/header/back.svg')}}" alt="">
                        <h4 class="page-title pull-left proxima_nova_semibold">Review Fine
                        </h4>
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="section_sub_title">/  Review Fine</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-content-inner review-fine-main">

        <div class="shifts-data review-approve-time">
            <div class="filters sidebar-select approve-punch-data">
                <select id="main_select_services"
                    class="form-select create-select section_sub_title select-club-services"
                    name="club-services">
                    <option value=".abrikosovaya" selected>Day Shift | 9:00 AM - 6:30 PM</option>
                    <option value=".bratskaya">Designer</option>
                    <option value=".lesi-ukrainki">Android Developer</option>
                    <option value=".lesi-ukrainki">React Developer</option>
                    <option value=".lesi-ukrainki">Flutter Developer</option>
                </select>
            </div>
            <div>
                <a href="" class="over_time proxima_nova_semibold overtime-approve">Bulk Approve Fine</a>
            </div>
        </div>

        <row>
            <div class="approve-datas">
                <div class="approve-data-search col-md-6 col-sm-6">
                    <form action="" method="">
                        <input class="input-search-rounded" type="text" id="staff_data_find"
                            placeholder="Search">
                    </form>
                </div>

                <div class="approve-right-data col-md-6 col-sm-6">
                    <div class="approve-data-download  dropdown-toggle proxima_nova_bold">
                        <a href="#"> <img src="{{asset('assets/admin/images/approve_punches/download-report.svg')}}"
                                alt=""></a>
                    </div>
                    <div class="dropdown-menu" x-placement="bottom-start">
                        <a class="dropdown-item proxima_nova_semibold" href="#">Excel Report</a>
                        <a class="dropdown-item proxima_nova_semibold" href="#">PDF Report</a>
                    </div>
                    <div class="input-group date" data-provide="datepicker">
                        <input type="text" id="calender_date" class="input-group-addon form-control proxima_nova_semibold calender-picker" value="{{ date('d, M y') }}" readonly='true'>
                        <!-- <div class="input-group-addon calender-img">
                            <img src="{{asset('assets/admin/images/approve_punches/calender.svg')}}" alt="">
                        </div> -->
                    </div>
                </div>

            </div>
        </row>

        <div class="approve_staff_data">
            <table id="staff_datas" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectAllCheckbox"></th> <!-- Checkbox Column -->
                        <th>Staff Name</th>
                        <th>Late Time</th>
                        <th>Reason</th>
                        <th>Salary</th>
                        <th>Total</th>
                        <th>Approve/Decline</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

        <!-- @extends('attendance::layouts.daily-report') -->

        <div id="myModal" class="modal check-model">
            <div class="model-section">
                <div class="model_left_side">
                    <div class="proxima_nova_semibold">
                        1
                    </div>
                </div>
                <div class="model_right_side">
                    <div class="member_div proxima_nova_semibold">
                        Members
                        Selected
                    </div>
                    <div class="export_div">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="2.25" y="2.25" width="13.5" height="13.5" rx="2" stroke="#808080"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6.75 2.25V15.75" stroke="#808080" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15.75 6.75H6.75" stroke="#808080" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15.75 11.25H6.75" stroke="#808080" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <p>Export</p>
                    </div>
                    <div class="delete_div">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path d="M4.49805 6.74902V14.2521C4.49805 15.0809 5.1699 15.7528 5.99867 15.7528H12.0012C12.8299 15.7528 13.5018 15.0809 13.5018 14.2521V6.74902" stroke="#808080" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M10.5002 7.49902V12.7512" stroke="#808080" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M7.50016 7.49902V12.7512" stroke="#808080" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M3.37305 4.4982H14.6277" stroke="#808080" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M6 4.49801L6.40817 3.2735C6.61236 2.66043 7.18608 2.24692 7.83226 2.24707H10.1702C10.817 2.24627 11.3915 2.65991 11.5958 3.2735L12.0025 4.49801" stroke="#808080" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>

                        <p>Delete</p>
                    </div>
                    <div class="cancel_div" id="closeModal">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.75 3.75L14.25 14.25" stroke="#808080" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M3.75 14.25L14.25 3.75" stroke="#808080" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <p>Cancel</p>
                    </div>
                </div>
            </div>
            <!-- </div> -->

        </div>

    </div>
@endsection

@section('scripts')
    <script>
        $('.input-group.date').datepicker({
            format: 'dd, M yyyy',
            autoclose: true
        });
        $('.input-group.date').datepicker('setDate', new Date());

        //  datatable
        // var table;
        // $(document).ready(function () {
        //     function datatable(searchValue = null, calender_date = null) {
        //         table = $('#staff_datas').DataTable({
        //             searching: false,
        //             lengthChange: false,
        //             info: false,
        //             responsive: true,
        //             order: [
        //                 [0, "desc"]
        //             ],
        //             ajax: {
        //                 "url": "{{ route('review_fine_list') }}",
        //                 "dataType": "json",
        //                 "type": "POST",
        //                 "data": {_token: "{{csrf_token()}}",'searchValue':searchValue,'calender_date':calender_date}
        //             },
        //             // drawCallback: function() {
        //             //     $('#selectAllCheckbox').on('change', function () {
        //             //         var isChecked = $(this).prop('checked');
        //             //         $('.selectCheckbox_model').prop('checked', isChecked);
        //             //     });
        //             //     $('.selectCheckbox_model').change(function () {
        //             //         if ($(this).is(':checked')) {
        //             //             $('#myModal').show();
        //             //         } else {
        //             //             $('#myModal').hide();
        //             //         }
        //             //     });
        //             //     $('#closeModal').click(function () {
        //             //         $('#myModal').hide();
        //             //     });
        //             //     $('select.select-club-services').each(function () {

        //             //         var dropdown = $('<div />').addClass('select-club-services selectDropdown');

        //             //         $(this).wrap(dropdown);

        //             //         var label = $('<span />').text($(this).attr('placeholder')).insertAfter($(this));
        //             //         var list = $('<ul />');

        //             //         $(this).find('option').each(function () {
        //             //             list.append($('<li />').append($('<a />').text($(this).text())));
        //             //         });

        //             //         list.insertAfter($(this));

        //             //         if ($(this).find('option:selected').length) {
        //             //             label.text($(this).find('option:selected').text());
        //             //             list.find('li:contains(' + $(this).find('option:selected').text() + ')').addClass('active');
        //             //             $(this).parent().addClass('filled');
        //             //         }

        //             //     });

        //             //     $(document).on('click touch', '.selectDropdown ul li a', function (e) {
        //             //         e.preventDefault();
        //             //         var dropdown = $(this).parent().parent().parent();
        //             //         var active = $(this).parent().hasClass('active');
        //             //         var label = active ? dropdown.find('select').attr('placeholder') : $(this).text();

        //             //         dropdown.find('option').prop('selected', false);
        //             //         dropdown.find('ul li').removeClass('active');

        //             //         dropdown.toggleClass('filled', !active);
        //             //         dropdown.children('span').text(label);

        //             //         if (!active) {
        //             //             dropdown.find('option:contains(' + $(this).text() + ')').prop('selected', true);
        //             //             $(this).parent().addClass('active');
        //             //         }

        //             //         dropdown.removeClass('open');
        //             //     });

        //             //     $('.select-club-services > span').on('click touch', function (e) {
        //             //         var self = $(this).parent();
        //             //         self.toggleClass('open');
        //             //     });
        //             // },
        //             columns: [
        //                 {
        //                     data: 'id',
        //                     type: 'num',
        //                     render: function (data, type, row) {
        //                         return `<input type="checkbox" class="selectCheckbox_model" id="selectCheckbox_model" value="${row.id}">`;
        //                     }
        //                 },
        //                 {
        //                     "data": "name",
        //                     render: function (data, type, row) {
        //                         return `
        //                                 <div class="user-images">
        //                                     <div><img src="${row.staff_photo}"
        //                                         class="approve-user-img" alt=""></div>
        //                                     <div>${data}<p class="data-sub-field">${row.department_name}</p></div>
        //                                 </div>
        //                             `;
        //                     }
        //                 },
        //                 { "data": "late_time" },
        //                 { "data": "reason" },
        //                 { "data": "salary" },
        //                 // {
        //                 //     "data": "salary",
        //                 //     render: function (data, type, row) {
        //                 //         return `<div class="filters sidebar-select select_mate_option atten-salary">
        //                 //                 <select id="main_select_services"
        //                 //                     class="form-select create-select section_sub_title select-club-services"
        //                 //                     name="club-services">
        //                 //                     <option value="">Fixed Amount</option>
        //                 //                     <option value="Salary" selected>1x Salary</option>
        //                 //                     <option value="Salary">1.5x Salary</option>
        //                 //                     <option value="Salary">2x Salary</option>
        //                 //                     <option value="Salary">Add Custom Salary Multiple</option>
        //                 //                 </select>
        //                 //             </div>`;
        //                 //     }
        //                 // },
        //                 { "data": "total"},
        //                 { "data": "action"},
        //             ],
        //             createdRow: function (row, data, dataIndex) {
        //                 $(row).find('td:eq(2)').addClass('late_time');
        //             },
        //             columnDefs: [
        //                 { "width": "10px", "targets": 0 },
        //             ],
        //         });
        //         $('.dataTables_length').addClass('bs-select');
        //     }
        //     datatable();

        //     $('#staff_data_find').on('input', function () {
        //         table.destroy();
        //         var searchValue = $('#staff_data_find').val();
        //         var calender_date = $('#calender_date').val();
        //         datatable(searchValue,calender_date);
        //     });

        //     $('#calender_date').on('change', function () {
        //         table.destroy();
        //         var searchValue = $('#staff_data_find').val();
        //         var calender_date = $('#calender_date').val();
        //         datatable(searchValue,calender_date);
        //     });

        // });
    </script>
@endsection
