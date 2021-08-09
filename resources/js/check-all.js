
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
