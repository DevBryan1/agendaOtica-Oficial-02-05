$(document).ready(function(){

    
    $('#search').on('focus', function(){
       $(this).on('keyup', function(){
        var txt = $(this).val();
        
        if(txt.length >= 5){
            $.ajax({
                method:'POST',
                url:'classes/PesquisaClass.php',
                data:{
                    txt:txt
                },
                beforeSend:function(){
                    console.log('pesquisando...')
                },
                success:function(ee){
                    $('#getResults').html(ee);
                }
            });

        }
       });
    })
    
});