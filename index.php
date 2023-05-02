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
    'title' => 'Assistente de Vendas | Início', //aqui vc vai mudar
    'desc' => 'desc',
    'og' => 'index' // aqui vc vai mudar
];
$GLOBALS['head'] = $head;
// aqui vc seta os css das paginas
$css = [
    1 => [ 'attr' => 'assets/frames/bootstrap/bootstrap.min.css' ], //puxamos o bootstrap css
    2 => [ 'attr' => 'assets/css/root.css'],
    3 => [ 'attr' => 'assets/css/menu.css' ], //puxando o css do menu
    4 => [ 'attr' => 'assets/css/index.css' ], // seu css *aqui vc vai mudar
];
$GLOBALS['css'] = $css;
$js = [
    1 => [ 'attr' => 'assets/frames/jQuery.min.js' ], //puxamos o JQUERY
    2 => [ 'attr' => 'assets/frames/bootstrap/bootstrap.min.js' ], // puxamos o bootstrap js
    3 => [ 'attr' => 'assets/js/menu.js' ], //script do menu vai aqui
    4 => [ 'attr' => 'assets/js/script.js' ] // aqui vai seu código *aqui vc vai mudar
];
$GLOBALS['js'] = $js;
//aqui puxa o head das paginas
require 'partials/head.php';
//puxando o menu
require 'partials/menu.php';

require 'classes/indexClass.php';

$dados = new Index();

$infoClimatico = $dados->tempo();
$infoOuro = $dados->ouro();



?>
<!-- aqui começa o site **e aqui dentro -->

<div class="body-site">
    <div class="container-index">
        <h4>SOBRE O APP</h4>
        <h1>Seja bem vindo ao seu assistente de venda</h1>
        <p>Esse app foi desenvolvido para auxiliar no dia-a-dia de vendas de óticas. Visando a agilidade e simplicidade do atendimento de balcão, desenvolvemos esse app que conta com funções que são utilizadas no cotidiano de todo atendente, gerente e proprietário de ótica. </p>
    </div> 
    <div class="boxes">

        <div class="box-ouro">
            <h4>Cotação do Ouro:</h4>
            <hr>
            <h4 class="gramaOuro"> Uma grama de ouro <br/> <strong>R$<?=$infoOuro;?></strong></h4>
        </div>

        <div class="box-hora">
            <h4>Hora atual:</h4>
            <hr>
            <div class="relogio">
                <span>00:00:00</span>
            </div>   
        </div>

        <div class="box-clima">
            <h4>Clima:</h4>
            <hr>
            <div class="box-infos">
                <img class="imagemTempo" src="<?=$infoClimatico['img'];?>" alt=".">
                <h2><?=$infoClimatico['temperatura'];?>°C </h2>
            </div>
            <p class="descricaoTempo"><?=$infoClimatico['descricao'];?></p>
        </div>
    </div>
</div>


<!-- aqui termina o site -->
<?php 


//aqui puxa o footer do site
require 'partials/foot.php';
?>
    
