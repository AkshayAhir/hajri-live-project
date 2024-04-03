$(document).ready(function () {
    // sidebar toggle
    $("#close-sidebar").click(function () {
        // console.log("show menu");
        $(".page-wrapper, body").removeClass("nav_responsive");

    });
    // $("#show-sidebar").click(function () {
    //     console.log("hide menu");
    //     $(".page-wrapper, body").addClass("toggled");

    // });

    $("#show-sidebar").click(function () {
        // console.log("hide menu");
        // $(".page-wrapper, body").toggleClass("toggled");
        $(".page-wrapper, body").toggleClass("nav_responsive");
    });
    $('[data-bs-toggle="tooltip"]').tooltip({ 'placement': 'bottom' });

});

$(document).ready(function () {
    $('.dropdown-toggle, body').click(function (e) {
        // e.preventDefault();
        var dropdownMenu = $(this).next('.dropdown-menu');

        if (dropdownMenu.is(":visible")) {
            dropdownMenu.hide();
            $(this).removeClass('active');
        } else {
            dropdownMenu.show();
            $(this).addClass('active');
        }
    });


    $(document).click(function (e) {
        
        var containers = $(".dropdown-toggle");
        containers.each(function () {
            var container = $(this);
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                container.next(".dropdown-menu").hide();
            }
        });

        // $("body").on("click", function (event) {
        var $trigger1 = $(".selectDropdown ");
        if ($trigger1 !== event.target && !$trigger1.has(event.target).length) {
            $trigger1.removeClass("open");
        }
        // });
    });
    $(".atten-work-title-multi").hide();
    $(".tab-data-show").on("click", function () {
        var $row = $(this).closest("tr");
        $(this).toggleClass("show_more_data");
        $row.find(".atten-work-title-multi").toggle();
    });

});
$('table thead>tr>th').wrapInner('<span class="data_lists"></span>')




$(document).ready(function () {
    // Handle click event on sidebar_toggle button
    $(".sidebar_toggle").on("click", function () {
        // Check if nav_responsive class exists
        var text = $(".business_one_data").text();
        $(".business_one_data").html(text);

        if ($(".nav_responsive .sidebar-select-main").length) {
            // Get the text of the paragraph
            var text = $(".business_one_data").text();
            // console.log(text);
            
            // Show only the first letter and hide the rest
            var modifiedText = text.charAt(0);
            for (var i = 1; i < text.length; i++) {
                modifiedText += "<span style='display: none;'>" + text.charAt(i) + "</span>";
            }
            $(".business_one_data").html(modifiedText);
        }  
        if ($(window).width() < 767 && $(".nav_responsive .sidebar-select-main").length) {
            // Get the text of the paragraph
            var text = $(".business_one_data").text();
            
            // Set the HTML content of the paragraph
            $(".business_one_data").html(text);
        }
    });
});



$(document).ready(function () {
    // Handle click event on sidebar_toggle button
    $(".sidebar_toggle").on("click", function () {
        // Check if nav_responsive class exists
        if ($(".nav_responsive .sidebar-select-main").length) {
        var text = $(".select2-selection__rendered").text();
        $(".select2-selection__rendered").html(text);
        }

        if ($(".nav_responsive .sidebar-select-main").length) {
            // Get the text of the paragraph
            var text = $(".select2-selection__rendered").text();
            // console.log(text);
            
            // Show only the first letter and hide the rest
            var modifiedText = text.charAt(0);
            for (var i = 1; i < text.length; i++) {
                modifiedText += "<span style='display: none;'>" + text.charAt(i) + "</span>";
            }
            $(".select2-selection__rendered").html(modifiedText);
        }  
        if ($(window).width() < 767 && $(".nav_responsive .sidebar-select-main").length) {
            // Get the text of the paragraph
            var text = $(".select2-selection__rendered").text();
            
            // Set the HTML content of the paragraph
            $(".select2-selection__rendered").html(text);
        }
    });
});