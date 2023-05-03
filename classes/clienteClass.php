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
        if(self::SalvarNoDB($nome, $telefone, $email, $comentario, $imagem)){
            //tudo ok
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

    public function SalvarNoDB($nome, $telefone, $email, $comentario, $path_final){
        $sql = "INSERT INTO clientes (nome, telefone, email, comentario, receita, creat) VALUES (:nome, :email, :telefone, :comentario, :receita, :creat)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':comentario', $comentario);
        $sql->bindValue(':receita', $path_final);
        $sql->bindValue(':creat', date('Y-m-d H:i:s'));
        $sql->execute();
        $_SESSION['addBd'] = 'Cliente'.$nome.'adicionado com sucesso';
        header('Location:../dados-cliente.php');
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