<div class="menu_mobile">
  <img src="assets/images/Logo Loja.png" class="imagemLogoMobile" alt="Logo">

  <div class="openMenu"><i class="fa-solid fa-bars-staggered"></i></div>
</div>

<div class="menu-site">
  <img src="assets/images/Logo Loja.png" class="imagemLogo" alt="Logo">
  <div class="cabecalho">
    <input type="text" name="buscar" class="inputSearch" >
    <i id="iconeBuscar" class="fa-solid fa-magnifying-glass fa-lg"></i>
  </div>

    <div class="botoesNav">
      <i id="iconeHome" class="fa-solid fa-table-columns icones"></i><input data-url="index.php" type="button" class="inputNav" name="index" value="Início">
      <i id="iconeDados" class="fa-solid fa-table icones"></i><input data-url="dados-cliente.php" type="button" class="inputNav" name="dadosClientes" value="Dados do Cliente">
      <i id="iconeArmacoes" class="fa-solid fa-glasses icones"></i><input data-url="armacoes.php" type="button" class="inputNav" name="armacoes" value="Armações">
      <i id="iconeProdutos" class="fa-solid fa-cart-shopping icones"></i><input data-url="produtos.php" type="button" class="inputNav" name="produtos" value="Produtos">
      <i id="iconeTratamentos" class="fa-solid fa-signal icones"></i><input data-url="tratamentos.php" type="button" class="inputNav" name="tratamentos" value="Tratamentos">
      <i id="iconeReceita" class="fa-solid fa-receipt icones"></i><input data-url="receita.php" type="button" class="inputNav" name="receita" value="Receita">
    </div>
  
    <div class="drop_nav">
      <div class="area_click_drop">
        <p><?php echo $_SESSION['user_logado']['nome']?></p>
        <i class="fa-solid fa-sort-up"></i>
      </div>
      <div class="area_droped_nav">
        
        <a href="editPerfil.php">Editar perfil</a>
        <hr>
        <a href="partials/sair.php">Sair</a>
        
      </div>
    </div>
</div>