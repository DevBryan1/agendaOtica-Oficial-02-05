<?php
session_start();
if(isset($_SESSION['user_logado']) && !empty($_SESSION['user_logado'])){
//usuario logado com sucesso
}else{
    //usuario não logado
    //fazer um reload para pagina de login
    header('Location: login.php');
    exit; //para de roda página
}
//aqui vc coloca o title da pagina
$head = [
    'title' => 'Armações', //aqui vc vai mudar
    'desc' => 'desc',
    'og' => 'armacoes' // aqui vc vai mudar
];
$GLOBALS['head'] = $head;

// aqui vc seta os css das paginas
$css = [
    1 => [ 'attr' => 'assets/frames/bootstrap/bootstrap.min.css' ], //puxamos o bootstrap css
    2 => [ 'attr' => 'assets/css/menu.css' ], //puxando o css do menu
    3 => [ 'attr' => 'assets/css/root.css'],
    4 => [ 'attr' => 'assets/css/armacoes.css' ] // seu css *aqui vc vai mudar
];
$GLOBALS['css'] = $css;

$js = [
    1 => [ 'attr' => 'assets/frames/jQuery.min.js' ], //puxamos o JQUERY
    2 => [ 'attr' => 'assets/frames/bootstrap/bootstrap.min.js' ], // puxamos o bootstrap js
    3 => [ 'attr' => 'assets/js/menu.js' ], //script do menu vai aqui
    4 => [ 'attr' => 'assets/js/armacoes.js' ] // aqui vai seu código *aqui vc vai mudar
];
$GLOBALS['js'] = $js;

//aqui puxa o head das paginas
require 'partials/head.php';
//puxando o menu
require 'partials/menu.php';
?>

<div class="body-site">
    <div class="container-comparador">
        <h1>Comparador de Armações</h1>
        <div class="inputs">
            <div class="image-upload">
                <input type="file" id="image1" accept="image/*" class="file-input">
                <label for="image1">Selecionar Foto 1</label>
            </div>
            <div class="image-upload">
                <input type="file" id="image2" accept="image/*" class="file-input">
                <label for="image2">Selecionar Foto 2</label>
            </div>
            <button id="btnClear" class="btn-clear">Limpar</button>
        </div>
        <div class="image-container">
            <img id="img1">
            <img id="img2">
        </div>
    </div>
</div>

<?php
    require 'partials/foot.php'
?>