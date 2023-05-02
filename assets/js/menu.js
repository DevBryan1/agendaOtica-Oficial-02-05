$(document).ready(function(){
    //script do menu vai aqui

    $('.area_click_drop').on('click', function(){
        if($('.area_droped_nav').css('display') === 'none'){
            //abrir
            $('.area_droped_nav').css('display', 'flex');
        }else{
            //fechar
            $('.area_droped_nav').css('display', 'none');
        }
    });

    $('.inputNav').each(function(index){
        $(this).on('click', function(){
            var redirect = $(this).attr('data-url');
            window.location.href = redirect;
        });
    });

});