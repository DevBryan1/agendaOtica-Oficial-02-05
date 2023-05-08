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
        4 => [ 'attr' => 'assets/css/buscarCliente.css' ], // seu css *aqui vc vai mudar
    ];
    $GLOBALS['css'] = $css;
    $js = [
        1 => [ 'attr' => 'assets/frames/jQuery.min.js' ], //puxamos o JQUERY
        2 => [ 'attr' => 'assets/frames/bootstrap/bootstrap.min.js' ], // puxamos o bootstrap js
        3 => [ 'attr' => 'assets/js/menu.js' ], //script do menu vai aqui
        4 => [ 'attr' => 'assets/frames/jquery.mask.min.js'],
        5 => [ 'attr' => 'assets/js/buscarCliente.js' ] // aqui vai seu código *aqui vc vai mudar
    ];
    $GLOBALS['js'] = $js;
    //aqui puxa o head das paginas
    require 'partials/head.php';
    //puxando o menu
    require 'partials/menu.php';
    ?>
    <!-- aqui começa o site **e aqui dentro -->  

    <div class="body-site">
        <a href="dados-cliente.php"><button class="voltarInicio"><i class="fa-solid fa-left-long"></i>Voltar para o Início</button></a>
        <div class="card-busca">
            <h4>Buscar Cliente</h4>
            <div class="searchName">
                <i id="iconeSearch" class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="search" name="name" placeholder="Nome ou Email:">
            </div>
            <div id="getResults" class="receberResultados">
                <a href="#link"><div data-nome="nome" data-email="email" data-img="img" data-telefone="telefone" data-desc="desc" data-ref="id" class="user_list">Daniel Soares</div></a>
            </div>
        </div>
        <div id="fade"></div>
        <div id="modal">
            <div class="topModal">
                <h4>Dados do Cliente</h4>
                <i id="closedX" class="fa-solid fa-xmark"></i>
            </div>
            <div class="bodyModal">
                <div class="informacoesCliente">
                    <div class="clientName">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" value="William">
                    </div>
                    <div class="clientTelefone">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" value="(51)9652-9864">
                    </div>
                    <div class="clientEmail">
                        <label for="email">Email:</label>
                        <input type="text" name="email" value="bryanmellodoc@gmail.com">
                    </div>
                    <div class="clientComent">
                        <label for="coment">O que orçou:</label>
                        <input type="text" name="coment" value="Bla bla bla" >
                    </div>
                    <button>Ver Receita</button>
                </div>
            </div>
        </div>
    </div>
<?php
    require 'partials/foot.php';
?>
