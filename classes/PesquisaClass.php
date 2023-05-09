<?php
session_start();
class Buscar {
    private $pdo;

    public function __construct(){
        $dbname = 'banco_soares';
        $dbuser = 'root';
        $dbpass = '';
        $this->pdo = new PDO("mysql:dbname=".$dbname.";host=localhost;", $dbuser, $dbpass);
    }

    public function search($txt){
        $sql = "SELECT * FROM clientes WHERE nome LIKE :nome OR email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':nome', '%'.$txt.'%');
        $sql->bindValue(':email', '%'.$txt.'%');
        $sql->execute();
        if($sql->rowCount() > 0){
            $dados = $sql->fetchAll();
            //chamar uma função dentro de outra self::nomedafunção(parametros da função)
            self::mostrarDados($dados);
        }else{
            echo 'sem dados';
        }
    }
    public function mostrarDados($dados){
        $html = '';
        foreach($dados as $d){
            $html .= '<a href="#link"><div class="user_list" data-nome="'.$d['nome'].'" data-telefone="'.$d['telefone'].'" data-email="'.$d['email'].'" data-coment="'.$d['comentario'].'" data-img="'.$d['receita'].'" data-ref="'.$d['id'].'">'.$d['nome'].'</div></a>';
        }
        $html .= ' <div id="fade"></div>
        <div id="modal">
            <div class="topModal">
                <h4>Dados do Cliente</h4>
                <i class="fa-solid fa-xmark" id="btnClose"></i>
            </div>
            <div class="bodyModal">
                <div class="informacoesCliente">
                    <div class="clientName">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" value="William" id="nomeCliente">
                    </div>
                    <div class="clientTelefone">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" value="(51)9652-9864" id="telefoneCliente">
                    </div>
                    <div class="clientEmail">
                        <label for="email">Email:</label>
                        <input type="text" name="email" value="bryanmellodoc@gmail.com" id="emailCliente">
                    </div>
                    <div class="clientComent">
                        <label for="coment">O que orçou:</label>
                        <input type="text" name="coment" value="Bla bla bla" id="comentCliente">
                    </div>
                    <a href="" target=_blank id="imagemReceita"><button id="receitaCliente">Ver Receita</button></a>
                </div>
            </div>
        </div>';

        $html .= '<script type="text/javascript">

        function abrirModal(){
            $("#fade").css("display", "flex");
            $("#modal").css("display", "flex");
        };
    
        function fecharModal(){
            $("#fade").css("display", "none");
            $("#modal").css("display", "none");
        };
    
        $("#btnClose").on("click", function(){
            fecharModal();
        });
    
        $("#fade").on("click", function(){
            fecharModal();
        });

        $(".user_list").each(function(index){
            $(this).on("click", function(){
                 var nome = $(this).attr("data-nome");
                 var telefone = $(this).attr("data-telefone");
                 var email = $(this).attr("data-email");
                 var coment = $(this).attr("data-coment");
                 var img = $(this).attr("data-img");
                 var ref = $(this).attr("data-ref");
                 $("#nomeCliente").val(nome);
                 $("#telefoneCliente").val(telefone);
                 $("#emailCliente").val(email);
                 $("#comentCliente").val(coment);
                 $("#receitaCliente").val(img);
                 $("#imagemReceita").attr("src",img);
                 abrirModal();
            });
        });
        </script>';
        self::receberLink($d['receita']);
        echo $html;

    }

    public function receberLink($link){
        $l = explode('..',$link);
        $l = $l[1];
        $url = str_replace("Novo/","",$_SERVER["REQUEST_URI"]);
        echo $url;
        exit;
    }
}

if(isset($_POST['txt']) && !empty(['txt'])){
    $txt = addslashes($_POST['txt']);
    $b = new Buscar();    
    $pesquisa = $b->search($txt);

}

?>