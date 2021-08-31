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

    $("#required-btn-disciplines").click(function () {
        checked = $(".required-disciplines:checked").length;

        if (!checked) {
            var div = document.createElement("div");
            div.setAttribute("id", "errorDiv");       

            if (!document.contains(document.getElementById("errorDiv"))) {
                div.appendChild(document.createTextNode("You must check at least one checkbox"));
                div.classList.add("alert", "alert-danger");
                document.getElementById("error-message").appendChild(div);
            } 
            return false;
        }
        
        else {
            if (document.contains(document.getElementById("errorDiv"))) {
                document.getElementById("errorDiv").remove();
            }
        }
    });
});
