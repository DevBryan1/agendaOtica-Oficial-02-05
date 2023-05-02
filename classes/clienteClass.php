<?php
session_start();

class Cliente {

    #conectando ao banco de dados
    private $pdo;
    public function __construct(){
        $dbname = 'banco_soares';
        $dbuser = 'root';
        $dbpass = '';
        $this->pdo = new PDO("mysql:dbname=".$dbname.";host=localhost;", $dbuser, $dbpass);
    }

    #Verificando se a imagem está sendo puxada
    public function dadosCliente($nome, $telefone, $email, $comentario, $img){
        if($img['error'] == 0){
            echo 'Veio';
            $formatosImg = [
                "image/png",
                "image/jpeg",
                "image/jpg",
                "image/webp"
            ];
            echo '<pre>';
            print_r($formatosImg);

        }else{
         echo 'Não veio';
        }
    }
}
//receber filtrar e validar dados 
if(isset($_POST["name"])){    
    $nome = addslashes($_POST['name']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $comentario = addslashes($_POST['comentario']);
    $img = $_FILES['receita'];

    //vendo se não está vazio o input
    if(!empty($nome) && !empty($telefone) && !empty($comentario)){
        $c = new Cliente();
        $c->dadosCliente($nome, $telefone, $email, $comentario, $img);
    }
}   

?>