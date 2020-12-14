<?php
   	include("conexao.php");
	$query = "SELECT * FROM produtos LIMIT 3";
	$result = mysqli_query($con, $query);
?>

<p>Produtos em destaque:</p>
<div class="w3-row-padding">
	<?php
		while($produto = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	?>
	<div class="w3-col s4 w3-center">
		<img src="<?php echo "imagens/".$produto['imagem'] ?>" class="w3-round w3-image" alt="Sony Vaio" width="300">
		<div><?php echo $produto['nome'] ?></div>
		<div>De: <s>R$<?php echo number_format($produto['valor']*1.1, 2, ',', '.') ?></s></div>
		<div>Por: R$<?php echo number_format($produto['valor'], 2, ',', '.') ?></div>
	</div>
	<?php 
		}
	?>
</div>
<?php
	/* fecha a conexao com o banco */
	mysqli_close($con);
?>