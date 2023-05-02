<?php
session_start();

class Cliente {

    private $pdo;
    public function __construct(){
        $dbname = 'banco_soares';
        $dbuser = 'root';
        $dbpass = '';
        $this->pdo = new PDO("mysql:dbname=".$dbname.";host=localhost;", $dbuser, $dbpass);
    }

    public function dadosCliente($nome, $telefone, $email, $comentario, $img){

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