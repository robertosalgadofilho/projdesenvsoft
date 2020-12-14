<?php
    // session_start inicia a sessão
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    //se o formulario de login enviou os parametros email e senha
    if (isset($_POST['email']) and isset($_POST['senha'])){
      $email = $_POST['email'];
      $senha = $_POST['senha'];
      include("conexao.php");
      $query = "SELECT * FROM clientes WHERE email = '$email' AND senha = '$senha'";
      $result = mysqli_query($con, $query);

      //se o usuario e a senha foram encontrados no banco de dados
      if(mysqli_num_rows ($result) > 0 )
      {
        //define as variaveis de sessao
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
      }
      mysqli_close($con);
      //se clicou no botao sair (parametro "sair" na URL)
    } else if(isset($_GET['sair'])) {
      //remove as variaveis da sessao
      session_unset();
      // destroi a sessao
      session_destroy();
    }

  ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Store</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="estilo/estilo.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="icon" type="image/jpg" href="imagens/ds.jpg" />
</head>
  </head>
<body>
  
  <header> 
    <h2>Digital Store</h2>
    <p class="w3-right">
      <i class="far fa-id-badge w3-margin-right"></i><a onclick="carregar('conta.php');" href="#">Minha conta</a>
      <i class="fa fa-shopping-bag w3-margin-right"></i><a onclick="carregar('pedidos.php');" href="#">Meus pedidos</a>
      <i class="fa fa-shopping-cart w3-margin-right"></i><a onclick="carregar('carrinho.php');" class="w3-margin-right" href="#">Carrinho</a>
      <?php
        if((isset ($_SESSION['email'])) and (isset ($_SESSION['senha']))) { //exibe o link para sair somente se estiver logado
      ?>
      <i class="fa fa-sign-out-alt w3-margin-right"></i><a class="w3-margin-right" href="index.php?sair">Sair</a>
      <?php 
        }
      ?>
	</p>
  </header>
  <nav class="w3-bar w3-black">   
	  <a onclick="carregar('inicio.php');" href="#" class="w3-bar-item w3-button">Início</a>
	  <a onclick="carregar('produtos.php');" href="#" class="w3-bar-item w3-button">Produtos</a>
  </nav>
  <div class="w3-container">
	<div id="conteudo">
	<!-- O conteúdo da página será carregado via jQuery aqui! -->
	</div>
  </div>
  <footer class="w3-container">
    <div class="w3-container w3-black"> 
		<p> Digital Store - Copyright© 2020 UNICNEC</p>
    </div> 
    <div class="w3-center">   
		<p>
			<a onclick="carregar('sobre.html');" href="#">Sobre</a>
		</p>     
	</div>
  </footer>
  <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
  <script>
	/* O código abaixo carrega a página inicial sempre que se acessa a página */
	$( document ).ready(function() {
    let searchParams = new URLSearchParams(window.location.search);
    if(searchParams.has('page')){
      //carrega a pagina passada pelo parametro "page"
		  $("#conteudo").load(searchParams.get('page').concat(".php"));
    } else {
      //carrega a pagina inicial
      $("#conteudo").load("inicio.php");
    }
	});
	/* A função "carregar" é chamada sempre que o usuário clica em um dos links da página. */
    function carregar(pagina){
        $("#conteudo").load(pagina);
    }
  </script>
</body>
</html>