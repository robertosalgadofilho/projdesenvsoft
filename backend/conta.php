<?php

	if((!isset ($_SESSION['email'])) and (!isset ($_SESSION['senha'])))
	{
	  include("login.php");
	}
	else { 
		$email = $_SESSION['email'];
    	$senha = $_SESSION['senha'];
    	include("conexao.php");
    	$query = "SELECT * FROM clientes WHERE email = '$email' AND senha = '$senha'";
  		$result = mysqli_query($con, $query);
  		$usuario = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

	<p>Informações do usuário:</p>
	<div class="w3-row-padding">
		<div><b>Nome: </b><span><?php echo $usuario["nome"]; ?></span></div>
		<div><b>E-mail: </b><span><?php echo $usuario["email"]; ?></span></div>
		<div><b>Telefone: </b><span><?php echo $usuario["telefone"]; ?></span></div>
		<div><b>Cidade: </b><span><?php echo $usuario["cidade"]; ?></span></div>
		<div><b>Estado: </b><span><?php echo $usuario["estado"]; ?></span></div>
	</div>

<?php
	/* fecha a conexao com o banco */
	mysqli_close($con);
	}
?>

