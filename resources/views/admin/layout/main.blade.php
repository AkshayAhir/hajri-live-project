<?php
use App\Models\BusinessUser;
use App\Models\Business;
$user = Auth::user();
$business_id = Session::get('business_id');
// dd($business_id);
$business_name = Business::where('id', $business_id)->first();
$fullName = $business_name['name'];
$nameParts = $fullName[0]; 
$business_count = BusinessUser::where('user_id', $user['id'])->count();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/x-icon" href="{{asset('assets/admin/images/favicon/fav.png')}}" >
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/admin/css/font.css')}}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/sidebar.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/header.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/media.css')}}" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-datepicker.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet"  href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/dropzone.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/style.css')}}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    @yield('title')
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        @include('admin.include.sidebar')
        <main class="page-content">
            <div class="container-fluid">
                @include('admin.include.header')
                @yield('header-page')
                <div class="main-content-inner">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    <!-- <link rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" /> -->

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
        <script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="{{asset('assets/admin/js/main.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->
        <script src="{{asset('assets/admin/js/bootstrap-datepicker.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>


        @yield('scripts')
        <script>
            $(document).ready(function () {
    // Function to update text based on screen width
    function updateTextBasedOnScreenWidth() {
        var screenWidth = $(window).width();
        var isCollapsed = $('.nav_responsive').hasClass('active');
        var businessCount = <?php echo $business_count; ?>;

        if (screenWidth <= 991) {
            // Code to run when screen width is less than or equal to 991 pixels
            $('#select2-business_id-container').text('<?php echo $business_name['name'] ?>');
            $('.business_one_data').text('<?php echo $business_name['name'] ?>');
        } else {
            // Code to run when screen width is greater than 991 pixels
            if (isCollapsed) {
                $('#select2-business_id-container').text('<?php echo $nameParts ?>');
                $('.business_one_data').text('<?php echo $nameParts ?>');
                if (businessCount != 1) {
                    // Additional condition to hide text
                    $('#select2-business_id-container').text('');
                    $('.business_one_data').text('');
                }
            } else {
                $('#select2-business_id-container').text('<?php echo $business_name['name'] ?>');
                $('.business_one_data').text('<?php echo $business_name['name'] ?>');
            }
        }
    }

    // Initial run on page load
    updateTextBasedOnScreenWidth();

    // Update on window resize
    $(window).resize(function () {
        updateTextBasedOnScreenWidth();
    });
});

            // $(document).click(function (e) {                

            //     var isCollapsed = $('.nav_responsive').hasClass('active');
            //     var businessCount = <?php echo $business_count; ?>;

            //     if (isCollapsed) {
            //         // single text get with responsive
            //         $('#select2-business_id-container').text('<?php echo $nameParts ?>');
            //         $('.business_one_data').text('<?php echo $nameParts ?>');
            //         if (businessCount != 1) {
            //         // Additional condition to hide text
            //             $('#select2-business_id-container').text('');
            //             $('.business_one_data').text('');
            //         }
            //     } else {
            //         $('#select2-business_id-container').text('<?php echo $business_name['name'] ?>');
            //         $('.business_one_data').text('<?php echo $business_name['name'] ?>');
            //     } 
                
            // });
            function getBusiness(business_id){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ route('set-session') }}",
                    data: { business_id: business_id },
                    success: function (response) {
                        // console.log(response);
                        location.reload(true)
                    }
                });
            }
            $(document).ready(function () {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "2000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                localStorage.removeItem('attendanceStatus');
                if(<?php echo $business_count ?> > 1){
                    // $('.sidebar-select-main.business_selct_box .select2-container--default .select2-selection--single .select2-selection__arrow b').remove();
                    $('.sidebar-select-id').select2({
                        minimumResultsForSearch: Infinity,
                    });
                } 

                if ($('.hr_sub_active').length) {
                    // Check if elements with the class "hr_sub_active" exist
                    $('.sidebar-layout').addClass('show');
                    $('.nav-item').addClass('hr_sub_active');
                }
            

                //sidebar dropdown js
                var business = <?= $business ?>;
                $('select.sidebar-select-club-services').each(function () {

                    var dropdown = $('<div />').addClass('sidebar-select-club-services sidebarSelectDropdown');

                    $(this).wrap(dropdown);

                    var label = $('<span />').text($(this).attr('placeholder')).insertAfter($(this));
                    var list = $('<ul />');

                    $(this).find('option').each(function (index) {
                        var businessId = business[index]['id'];
                        var listItem = $('<li data-business-id="' + businessId + '"/>').append($('<a />').text($(this).text()));
                        list.append(listItem);
                    });

                    list.insertAfter($(this));

                    if ($(this).find('option:selected').length) {
                        label.text($(this).find('option:selected').text());
                        list.find('li:contains(' + $(this).find('option:selected').text() + ')').addClass('active');
                        $(this).parent().addClass('filled');
                    }

                });

                $(document).on('click touch', '.sidebarSelectDropdown ul li a', function (e) {
                    e.preventDefault();
                    var dropdown = $(this).parent().parent().parent();
                    var active = $(this).parent().hasClass('active');
                    var label = active ? dropdown.find('select').attr('placeholder') : $(this).text();
                    dropdown.find('option').prop('selected', false);
                    dropdown.find('ul li').removeClass('active');

                    dropdown.toggleClass('filled', !active);
                    dropdown.children('span').text(label);

                    if (!active) {
                        dropdown.find('option:contains(' + $(this).text() + ')').prop('selected', true);
                        $(this).parent().addClass('active');
                    }

                    dropdown.removeClass('open');
                    var businessId = $(this).parent().data('business-id');
                    getBusiness(businessId)
                });

                $('.sidebar-select-club-services > span').on('click touch', function (e) {
                    var self = $(this).parent();
                    self.toggleClass('open');
                });
                //end sidebar dropdown js

            });
            
            $('#business_id').change(function() {
                var businessId = $('#business_id').val();
                getBusiness(businessId);
            });

            //  header notification
            function toggleDropdown() {
                const dropdown = document.querySelector('.dropdown-content');
                dropdown.classList.toggle('active');
            }
            function toggleDropdownMobile() {
                const dropdown = document.querySelector('.dropdown-content-mobile');
                dropdown.classList.toggle('active');
            }
            
            // all dropdown js
            $('select.select-club-services').each(function () {

                var dropdown = $('<div />').addClass('select-club-services selectDropdown');

                $(this).wrap(dropdown);

                var label = $('<span />').text($(this).attr('placeholder')).insertAfter($(this));
                var list = $('<ul />');

                $(this).find('option').each(function () {
                    list.append($('<li />').append($('<a />').text($(this).text())));
                });

                list.insertAfter($(this));

                if ($(this).find('option:selected').length) {
                    label.text($(this).find('option:selected').text());
                    list.find('li:contains(' + $(this).find('option:selected').text() + ')').addClass('active');
                    $(this).parent().addClass('filled');
                }

            });

            $(document).on('click touch', '.selectDropdown ul li a', function (e) {
                e.preventDefault();
                var dropdown = $(this).parent().parent().parent();
                var active = $(this).parent().hasClass('active');
                var label = active ? dropdown.find('select').attr('placeholder') : $(this).text();

                dropdown.find('option').prop('selected', false);
                dropdown.find('ul li').removeClass('active');

                dropdown.toggleClass('filled', !active);
                dropdown.children('span').text(label);

                if (!active) {
                    dropdown.find('option:contains(' + $(this).text() + ')').prop('selected', true);
                    $(this).parent().addClass('active');
                }

                dropdown.removeClass('open');
            });

            $('.select-club-services > span').on('click touch', function (e) {
                var self = $(this).parent();
                self.toggleClass('open');
            });
            //end all dropdown js

            // header dropdown
            var dropdown = document.querySelector(".dropdown");
            var dropdownMenu = document.querySelector(".dropdown-menu");

            document.addEventListener("click", function (event) {
                if (!dropdown.contains(event.target)) {
                    dropdownMenu.style.display = "none";
                }
            });

            document.addEventListener('click', function (event) {
<<<<<<< HEAD
                const dropdown = document.querySelector('.dropdown-content');
                if (!event.target.closest('.profile-main-notification')) {
                    dropdown.classList.remove('active');
                }
            });

            $('.loader').hide();

            let xhr = null;
            $('.search_data').hide();
            $('.search_loder').hide();
            $('#global_search').on('input', function(){
                const inputValue = $(this).val().trim(); 
                    if (inputValue === '') {
                    $('.search_data').hide();
                    return;
                }
                $('.search_loder').show();
                $('.search_data').empty();
                if (xhr !== null) {
                    xhr.abort();
                }
                xhr = $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('global_search') }}",
                    type: "POST",
                    data: {
                        "global_search": $('#global_search').val(),
                    },
                    success: function(response) {
                        // console.log(response)
                        $('.search_loder').hide();
                        $('.search_data').show();
                        // $('.search_data').text(response);
                        if (response.Department.length > 0 || response.Staff.length > 0) {

                            let departmentHtml = '';
                            if (response.Department.length > 0) {
                                departmentHtml = '<div class="search_inner_data"><h6>Department</h6>';
                                response.Department.forEach(department => {
                                    departmentHtml += `<a class="staff-edit search_sub_list_data" href="{{route('departments')}}"><p>${department.name}</p></a>`;
                                    // Add other properties as needed
                                });
                                departmentHtml += '</div>';
                                // $('.search_data').append(departmentHtml);
                            }

                            let staffHtml = '';
                            if (response.Staff.length > 0) {
                                staffHtml = '<div class="search_inner_data"> <h6>Staff</h6>';
                                response.Staff.forEach(staff => {
                                    staffHtml += `<a class="staff-edit search_sub_list_data" href="{{url('staff/staff-profile')}}/${staff.id}"><p>${staff.name}</p></a>`;
                                    // Add other properties as needed
                                });
                                staffHtml += '</div>';
                            }

                            $('.search_data').append(departmentHtml + staffHtml);
                        } else {
                            no_data = '<div class="search_inner_data text-center pb-0 staff-edit"><h6>No Data Found.</h6>';
                            $('.search_data').append(no_data);
                        }

                        xhr = null; 
                    },
                });
            })
            
=======
            const dropdown = document.querySelector('.dropdown-content');
            if (!event.target.closest('.profile-main-notification')) {
                dropdown.classList.remove('active');
            }
        });
>>>>>>> 9ee7d98de403d43c1e001aefae0ecaf8228cb55b
        </script>
</body>

</html>
