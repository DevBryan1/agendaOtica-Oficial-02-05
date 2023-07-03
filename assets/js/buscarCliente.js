$(document).ready(function(){
    
    function abrirModal(){
        $('#fade').css('display', 'flex')
        $('#modal').css('display', 'flex')
    }
    function fecharModal(){
        $('#fade').css('display', 'none')
        $('#modal').css('display', 'none')
    }
    $('#botaoFechar').on('click', function(){
        fecharModal();
    })
    $('#fade').on('click', function(){
        fecharModal();
    })
    
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