jQuery(document).ready(function($){
    $('.default table.table').wrap('<div class="tableWrap"></div>');

    $('.main_menu_burger').click(function (e) {
        e.preventDefault();
        $('body').toggleClass('overlay');

        $('.main_menu').toggleClass('active').slideToggle('normal');
    });

    $('.main_menu > li.menu-item-has-children > a').click(function(e){
        e.preventDefault();

        $('.main_menu > li.menu-item-has-children > a').not(this).parent().removeClass('active').children('ul.sub-menu').slideUp('normal');
        $(this).parent().toggleClass('active').children('ul.sub-menu').slideToggle('normal');

        if ($('.main_menu > li.menu-item-has-children').hasClass("active") || $('.main_menu').hasClass("active")) {
            $('body').addClass('overlay');
        } else {
            $('body').removeClass('overlay');
        }
    });
});

$(document).ready(function(){
    $('#AnyId').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
            $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#AnyId').prop('checked',true);
        }else{
            $('#AnyId').prop('checked',false);
        }
    });
});