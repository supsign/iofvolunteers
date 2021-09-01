jQuery(document).ready(function ($) {
    $('.default table.table').wrap('<div class="tableWrap"></div>');

    $('.main_menu_burger').click(function (e) {
        e.preventDefault();
        $('body').toggleClass('overlay');

        $('.main_menu').toggleClass('active').slideToggle('normal');
    });

    $('.main_menu > li.menu-item-has-children > a').click(function (e) {
        e.preventDefault();

        $('.main_menu > li.menu-item-has-children > a')
            .not(this)
            .parent()
            .removeClass('active')
            .children('ul.sub-menu')
            .slideUp('normal');
        $(this).parent().toggleClass('active').children('ul.sub-menu').slideToggle('normal');

        if ($('.main_menu > li.menu-item-has-children').hasClass('active') || $('.main_menu').hasClass('active')) {
            $('body').addClass('overlay');
        } else {
            $('body').removeClass('overlay');
        }
    });

<<<<<<< HEAD
    $('.checkbox-required-text').on('click', function () {
        var test = $(this).parent().parent().find('textarea');      
        if ($(this).prop('checked')) {
            test.attr('required', '');
        }
        else {
            test.removeAttr('required', '');
        }
    });
=======
    // $('#cbox').click(function() {
    //     if ($(this).prop('checked')) {
    //         $('#tbox').attr('required', '');
    //         $('.status').text('input is now required');
    //     } else {
    //         $('#tbox').removeAttr('required');
    //         $('.status').text('input is no longer required');
    //     }
    // });

    // $('.checkbox-required-text').click(function () {
    //     if ($(this).prop('checked')) {
    //         $(this).find('textarea').css( 'background-color', 'red' );
    //     }

    // });
>>>>>>> 33e11c937448fbc61b17f9b0af8423fb717d8bce

    $('#continentsCheckboxesTrigger').on('click', function () {
        if (this.checked) {
            $('.continentsCheckboxes').each(function () {
                this.checked = true;
            });
        } else {
            $('.continentsCheckboxes').each(function () {
                this.checked = false;
            });
        }
    });

    $('.continentsCheckboxes').on('click', function () {
        if ($('.continentsCheckboxes:checked').length == $('.continentsCheckboxes').length) {
            $('#continentsCheckboxesTrigger').prop('checked', true);
        } else {
            $('#continentsCheckboxesTrigger').prop('checked', false);
        }
    });
});
