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
            $formatosImg = [
                "image/png",
                "image/jpeg",
                "image/jpg",
                "image/webp"
            ];
            if(in_array($img['type'],$formatosImg)){
                $nome_img = self::nomeCliente($nome);
                $path = '../assets/uploadsReceita/';
                $imagem = self::salvarImagens($img, $nome_img, $path);
            }
           

        }else{
         echo 'Não veio';
        }
    }

    static function nomeCliente($nome){
        $n = explode(' ',$nome);
        $n = implode('_',$n);
        $n = strtolower($n);
        $hash = md5(time().rand(99,999999));
        $nome_img = $n.'_'.$hash;
        return $nome_img;
    }

    public function salvarImagens($img, $nome_img, $path){
        $types = [
            'image/png' => 'png',
            'image/jpg' => 'jpg',
            'image/jpeg' => 'jpeg',
            'image/webp' => 'webp'
        ];
        $type = $types[$img['type']];
        $path_final = $path.$nome_img.'.'.$type;
        move_uploaded_file($img['tmp_name'], $path_final);
        return $path_final;
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