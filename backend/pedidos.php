<?php

	if((!isset ($_SESSION['email'])) and (!isset ($_SESSION['senha'])))
	{
	  include("login.php");
	}
	else { 
		$email = $_SESSION['email'];
    	$senha = $_SESSION['senha'];
    	include("conexao.php");
    	$query = "SELECT id FROM clientes WHERE email = '$email'";
		$result = mysqli_query($con, $query);
		$cliente = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$idCliente = $cliente['id'];

    	if (isset($_GET['comprar'])){
    		$idProduto = $_GET['comprar'];

			$query = "INSERT INTO pedidos (idProduto, idCliente, data) VALUES ($idProduto, $idCliente, NOW())";
  			if(!mysqli_query($con, $query)){
  				die("Erro ao finalizar a compra!");
  			}
  		}
  		$query = "SELECT * FROM pedidos WHERE idCliente = $idCliente";
		$result = mysqli_query($con, $query);

?>
		<p>Histórico de pedidos:</p>
		<div class="w3-row-padding">
			<?php
				while($pedido = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					$idProduto = $pedido['idProduto'];
					$query = "SELECT * FROM produtos WHERE id = $idProduto";
					$result2 = mysqli_query($con, $query);
					$produto = mysqli_fetch_array($result2, MYSQLI_ASSOC);
			?>
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
						<div class="w3-container w3-cell w3-cell-middle">
							<div>Comprado em: <span><?php echo $pedido['data'] ?></span></div>
						</div>
					</div>
					<hr class="solid">
			<?php
				}
			?>
		</div>
<?php
	/* fecha a conexao com o banco */
	mysqli_close($con);
	}
?>