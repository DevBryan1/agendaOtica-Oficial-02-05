<?php
session_start();
//conectar ao banco de dados

class Login{

    private $pdo;

    public function __construct(){
        $dbname = 'banco_soares';
        $dbuser = 'root';
        $dbpass = '';
        $this->pdo = new PDO("mysql:dbname=".$dbname.";host=localhost;", $dbuser, $dbpass);
    }

    public function logar($email, $senha){
        

        //verificar se email existe no banco de dados
        if(self::verifyEmail($email)){

            //pegar dados do usuario
            $dados = self::getUser($email);
            //verificar se senha confere

            $_SESSION['user_logado'] = $dados;
            
            
            if (password_verify($senha, $dados)) {
                $user = self::getDadosUser($email);
                
                $_SESSION['user_logado'] = $user;
                return true; //usuario logado com sucesso
            } else {
                $_SESSION['erro_login'] = 'Email e/ou senha inválidos';
                return false;
            }
            

        }else{
            
            $_SESSION['erro_login'] = 'Email e/ou senha inválidos';
            return false;
        }
        

    }

    public function verifyEmail($email){

        //simular um retorno true
        //return true;
        $sql = "SELECT * FROM users WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }


        //retornar true se tiver

        //retornar falso se não tive
    }

    public function getUser($email){
        
        $sql = "SELECT * FROM users WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            
            $dados = $sql->fetch();

            return $dados['senha'];
            
        }else{
            return false;
        }

        
    }

    public function getDadosUser($email){
        date_default_timezone_set("America/Sao_Paulo");
        //atualizar last_login
        $sql = "UPDATE users SET last_login = :last_login WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':last_login', date('Y-m-d H:i:s'));
        $sql->bindValue(':email', $email);
        $sql->execute();

        //selecionar user
        $sql = "SELECT * FROM users WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            
            $dados = $sql->fetch();

            $array = [

                'nome' => $dados['nome'],
                'email' => $dados['email'],
                'permission' => $dados['permissao'],
                'last_login' => $dados['last_login'],
            
            ];

            return $array;
            
        }else{
            return false;
        }
    }
    

}

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){

    $log = new Login();
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    /*
    $options = [
        'cost' => 12,
    ];
    $senha = password_hash($senha, PASSWORD_BCRYPT, $options);
    */


    if($log->logar($email, $senha)){
        
        //user logado
        header('Location: ../index.php');
    }else{
        //enviar uma session mostrando o erro;
        header("Location: ../login.php");
    }

}else{
    header('Location: login.php');
    exit;
}