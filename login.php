<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/login.css">
	<script src="https://kit.fontawesome.com/ca7955397c.js" crossorigin="anonymous"></script>
    <title>Login | Agenda Ótica Soares</title>
</head>
<body>
<?php
if(isset($_SESSION['erro_login'])){
    echo "<div class='erro_login'>".$_SESSION['erro_login']."</div>";
    unset($_SESSION['erro_login']);
}
?>
<form action="classes/loginClass.php" method="post">
	<div class="container">
        <div class="login">
            <img src="assets/images/Logo Loja.png " alt="Logo Soares">

            <div class="input-usuario">
			<i class="fa-regular fa-user fa-lg"></i><input type="email" placeholder="Digite seu nome de usuario" name="email" id="inputUser">
            </div>

            <div class="input-senha">
			<i class="fa-solid fa-lock fa-lg" ></i><input type="password" placeholder="Digite sua senha" name="senha" id="inputSenha">
            </div>
			
            <button type="submit" id="btnEntrar">Entrar</button>
        </div> 
    </div>
</form>

</body>
</html>