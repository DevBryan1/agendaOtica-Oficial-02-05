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
            $html .= '<a href="#link"><div class="user_list">'.$d['nome'].'</div></a>';
        }
        echo $html;

    }
}

if(isset($_POST['txt']) && !empty(['txt'])){
    $txt = addslashes($_POST['txt']);
    $b = new Buscar();    
    $pesquisa = $b->search($txt);

}

?>