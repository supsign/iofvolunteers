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

    $('.checkbox-required-text').on('click', function () {
        var textarea = $(this).parent().parent().find('textarea');
        var upload = $(this).parent().parent().find('#skill_map_upload');
        if ($(this).prop('checked')) {
            textarea.attr('required', '');
            if (upload) {
                upload.attr('required', '');
            }
        } else {
            const checkboxelements = $(this).parent().parent().find('.checkbox-required-text:checked');
            if (checkboxelements.length) {
                return;
            }
            textarea.removeAttr('required', '');
            upload.removeAttr('required', '');
        }
    });

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

    $('.required-btn').click(function () {
        checked = $('.required-checkboxes-disciplines:checked').length;

        if (!checked) {
            var errorDiv = document.createElement('div');
            errorDiv.setAttribute('id', 'errorDiv-disciplines');

            if (!document.contains(document.getElementById('errorDiv-disciplines'))) {
                errorDiv.appendChild(document.createTextNode('You must check at least one checkbox'));
                errorDiv.classList.add('alert', 'alert-danger');
                document.getElementById('error-wrapper-disciplines').appendChild(errorDiv);
            }
            return false;
        } else {
            if (document.contains(document.getElementById('errorDiv-disciplines'))) {
                document.getElementById('errorDiv-disciplines').remove();
            }
        }
    });

    $('.required-btn').click(function () {
        checked = $('.required-checkboxes-offers:checked').length;

        if (!checked) {
            var errorDiv = document.createElement('div');
            errorDiv.setAttribute('id', 'errorDiv-offers');

            if (!document.contains(document.getElementById('errorDiv-offers'))) {
                errorDiv.appendChild(document.createTextNode('You must check at least one checkbox'));
                errorDiv.classList.add('alert', 'alert-danger');
                document.getElementById('error-wrapper-offers').appendChild(errorDiv);
            }
            return false;
        } else {
            if (document.contains(document.getElementById('errorDiv-offers'))) {
                document.getElementById('errorDiv-offers').remove();
            }
        }
    });

    $('.project_name_select').on('change', function () {
        $('#project_name_wrapper').text($(this).children('option:selected').text());
    });

});
