$(document).ready(function(){
    $('#telefone').mask('(00) 00000-0000');

    $('.btnLimpar').on('click',function(e){
        e.preventDefault();

        $('#name').val('');
        $('#telefone').val('');
        $('#email').val('');
        $('#coment').val('');
    });

    //abertura e fechamento de modal

    function fecharModal(){
        $('#modal').css('display','none');
        $('#fade').css('display','none');
    }

    function abrirModal(){
        $('#modal').css('display','flex');
        $('#fade').css('display','flex');
    }

    $('#closedX').on('click', function(){
        fecharModal();
    })

    $('#fade').on('click', function(){
        fecharModal();
    })

    //código antigo usado 

    $('.btn_add_img').on('click', function(){
        $('#receita').click();
    });

    $('#receita').on('change', function(){
        var nomearquivo = $('#receita').val();
        
        const file = this.files[0];
        if (file){
            let reader = new FileReader();
            reader.onload = function(event){
                $('#receitaCarregada').attr('src', event.target.result);
                    abrirModal ();

            }
            reader.readAsDataURL(file);
        }
    });

});