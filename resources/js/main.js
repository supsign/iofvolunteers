jQuery(document).ready(function ($) {
    $(".default table.table").wrap('<div class="tableWrap"></div>');

    $(".main_menu_burger").click(function (e) {
        e.preventDefault();
        $("body").toggleClass("overlay");

        $(".main_menu").toggleClass("active").slideToggle("normal");
    });

    $(".main_menu > li.menu-item-has-children > a").click(function (e) {
        e.preventDefault();

        $(".main_menu > li.menu-item-has-children > a")
            .not(this)
            .parent()
            .removeClass("active")
            .children("ul.sub-menu")
            .slideUp("normal");
        $(this)
            .parent()
            .toggleClass("active")
            .children("ul.sub-menu")
            .slideToggle("normal");

        if (
            $(".main_menu > li.menu-item-has-children").hasClass("active") ||
            $(".main_menu").hasClass("active")
        ) {
            $("body").addClass("overlay");
        } else {
            $("body").removeClass("overlay");
        }
    });

    $("#continentsCheckboxesTrigger").on("click", function () {
        if (this.checked) {
            $(".continentsCheckboxes").each(function () {
                this.checked = true;
            });
        } else {
            $(".continentsCheckboxes").each(function () {
                this.checked = false;
            });
        }
    });

    $(".continentsCheckboxes").on("click", function () {
        if (
            $(".continentsCheckboxes:checked").length ==
            $(".continentsCheckboxes").length
        ) {
            $("#continentsCheckboxesTrigger").prop("checked", true);
        } else {
            $("#continentsCheckboxesTrigger").prop("checked", false);
        }
    });

    // $("#required-btn-disciplines").validate({
    //     rules: {
    //         spam: {
    //             required: function (element) {
    //                 var boxes = $(".checkbox");
    //                 if (boxes.filter(":checked").length == 0) {
    //                     return true;
    //                 }
    //                 return false;
    //             },
    //             minlength: 1,
    //         },
    //     },
    //     messages: {
    //         spam: "Please select at least two types of spam.",
    //     },
    // });

    $("#required-btn-disciplines").click(function () {
        checked = $(".required-disciplines:checked").length;

        if (!checked) {
            alert("You must check at least one checkbox.");
            return false;
        }
    });
});
