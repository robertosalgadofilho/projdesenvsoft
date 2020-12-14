<?php

	if((!isset ($_SESSION['email'])) and (!isset ($_SESSION['senha'])))
	{
	  include("login.php");
	}
	else { 
		$email = $_SESSION['email'];
    	$senha = $_SESSION['senha'];
    	include("conexao.php");

    	if (isset($_GET['comprar']) OR isset($_SESSION['idProduto'])){
    		if(isset($_GET['comprar'])) {
    			$idProduto = $_GET['comprar'];
    			$_SESSION['idProduto'] = $idProduto;
    		}
    		else {
    			$idProduto = $_SESSION['idProduto'];
    		}

			$query = "SELECT * FROM produtos WHERE id = $idProduto";
  			$result = mysqli_query($con, $query);
  			if(mysqli_num_rows ($result) > 0 )
      		{
  				$produto = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

				<p>Carrinho de compras:</p>
				<div class="w3-row-padding">
					<hr class="solid">
					<div class="w3-row s4">
						<div class="w3-container w3-cell w3-cell-middle">
							<img src="<?php echo "imagens/".$produto['imagem'] ?>" class="w3-round w3-image" alt="Sony Vaio" width="150">
						</div>
						<div class="w3-container w3-cell w3-cell-middle">
							<div><?php echo $produto['nome'] ?></div>
						</div>
						<div class="w3-container w3-cell w3-cell-middle">
							<div>R$<?php echo number_format($produto['valor'], 2, ',', '.') ?></div>
						</div>
					</div>
					<hr class="solid">
					<div class="w3-row">
						<div class="w3-col s4"><br/></div>
						<div class="w3-col s4">
							<div>Frete: Grátis</div>
							<div>Valor total: R$<?php echo number_format($produto['valor'], 2, ',', '.') ?></div>
							<button class="w3-button w3-round-large w3-black" onclick="$('#conteudo').load('pedidos.php?comprar=<?php echo $produto['id'] ?>');">Finalizar pedido</button>
						</div>
						<div class="w3-col s4"><br/></div>
					</div>
				</div>
<?php
			} 
		} else {
			echo "Seu carrinho está vazio!";
		}
		/* fecha a conexao com o banco */
		mysqli_close($con);
	}

?>