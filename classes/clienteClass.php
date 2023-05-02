<?php
session_start();

class Cliente {

}
if(isset($_POST["name"])){    
    echo '<pre>';
    print_r($_POST);
    print_r($_FILES);

    $nome = addslashes($_POST['name']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $comentario = addslashes($_POST['comentario']);
    $img = $_FILES['receita'];

    if(!empty($nome) && ){

    }
}

?>