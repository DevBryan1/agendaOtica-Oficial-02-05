<?php
//aqui vc coloca o title da pagina
session_start();
if(isset($_SESSION['user_logado']) && !empty($_SESSION['user_logado'])){
//usuario logado com sucesso
}else{
    //usuario não logado
    //fazer um reload para pagina de login
    header('Location: login.php');
    exit; //para de roda página
}
$head = [
    'title' => 'Dados do cliente', //aqui vc vai mudar
    'desc' => 'desc',
    'og' => 'dadoscliente' // aqui vc vai mudar
];
$GLOBALS['head'] = $head;
// aqui vc seta os css das paginas
$css = [
    1 => [ 'attr' => 'assets/frames/bootstrap/bootstrap.min.css' ], //puxamos o bootstrap css
    2 => [ 'attr' => 'assets/css/root.css'],
    3 => [ 'attr' => 'assets/css/menu.css' ], //puxando o css do menu
    4 => [ 'attr' => 'assets/css/dadosClientes.css' ], // seu css *aqui vc vai mudar
];
$GLOBALS['css'] = $css;
$js = [
    1 => [ 'attr' => 'assets/frames/jQuery.min.js' ], //puxamos o JQUERY
    2 => [ 'attr' => 'assets/frames/bootstrap/bootstrap.min.js' ], // puxamos o bootstrap js
    3 => [ 'attr' => 'assets/js/menu.js' ], //script do menu vai aqui
    4 => [ 'attr' => 'assets/frames/jquery.mask.min.js'],
    5 => [ 'attr' => 'assets/js/dadosClientes.js' ] // aqui vai seu código *aqui vc vai mudar
];
$GLOBALS['js'] = $js;
//aqui puxa o head das paginas
require 'partials/head.php';
//puxando o menu
require 'partials/menu.php';
?>
<!-- aqui começa o site **e aqui dentro -->

<div class="body-site">
    <a href="buscarCliente.php"><button class="searchCliente" >Buscar Cliente <i class="fa-solid fa-magnifying-glass"></i></button></a>

    <div class="cardCadastro">
        <h1>Dados do Cliente</h1>
        <form action="classes/clienteClass.php" class="formulario" method="post" id="dados" enctype="multipart/form-data">
            <div class="name">
                <input placeholder="Nome" type="text" id="name" name="name" required>
            </div>

            <div class="telefone">
                <input placeholder="Telefone" type="tel" name="telefone" id="telefone" required>
            </div>

            <div class="email">
                <input placeholder="Email" type="email" id="email" name="email" required>
            </div>

            <div class="coment">
                <textarea name="comentario" id="coment" cols="23" rows="5"></textarea>
            </div>

            <input type="file" class="input_file" name="receita" id="receita">
            <div class="btn_add_img">Selecionar Receita</div>

            <div class="buttons">
                <button class="btnSalvar">Salvar Dados</button>
                <button class="btnLimpar">Limpar Dados</button>
            </div>

        </form>
        <div id="fade"></div>
        <div id="modal">
            <div class="topModal">
                <h4>Preview da Receita</h4>
                <i id="closedX" class="fa-solid fa-xmark"></i>
            </div>
            <div class="bodyModal">
                <img src="#"  alt="" id="receitaCarregada">
            </div>
        </div>
    </div>
</div>

<!-- aqui termina o site -->
<?php 
//aqui puxa o footer do site
require 'partials/foot.php';
?>
    
