<?php
   	include("conexao.php");
	$query = "SELECT * FROM produtos";
	$result = mysqli_query($con, $query);

	//número de registros por página
	$total_reg = "10";

	if (!isset($_GET['pagina'])) {
		$pc = "1";
	} else {
		$pc = $_GET['pagina'];
	}
	$inicio = $pc - 1;
	$inicio = $inicio * $total_reg;
	$result = mysqli_query($con, "$query LIMIT $inicio,$total_reg");
	$todos = mysqli_query($con, "$query");

	$tr = mysqli_num_rows($todos); // verifica o número total de registros
	$tp = $tr / $total_reg; // verifica o número total de páginas


	// agora vamos criar os botões "Anterior e próximo"
	$anterior = $pc - 1;
	$proximo = $pc + 1;
	
?>

<p>Todos os produtos:</p>
<div class="w3-row-padding">
	<?php
		while($produto = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	?>
			<div class="w3-row s4">
				<div class="w3-container w3-cell w3-cell-middle">
					<img src="<?php echo "imagens/".$produto['imagem'] ?>" class="w3-round w3-image" alt="Sony Vaio" width="150">
				</div>
				<div class="w3-container w3-cell w3-cell-middle">
					<div><?php echo $produto['nome'] ?></div>
				</div>
				<div class="w3-container w3-cell w3-cell-middle">
					<div>De: <s>R$<?php echo number_format($produto['valor']*1.1, 2, ',', '.') ?></s></div>
					<div>Por: R$<?php echo number_format($produto['valor'], 2, ',', '.') ?></div>
				</div>
				<div class="w3-container w3-cell w3-cell-middle">
					<button class="w3-button w3-round-large w3-black" onclick="$('#conteudo').load('carrinho.php?comprar=<?php echo $produto['id'] ?>');">Comprar</button>
				</div>
			</div>
			<hr class="solid">
	<?php 
		}
	
		if ($pc>1) {
	?>
			<button class="w3-button w3-round-large w3-black" onclick="$('#conteudo').load('produtos.php?pagina=<?php echo $anterior ?>');">Anterior</button>
	<?php 
		}
		if ($pc<$tp) {
	?>
			<button class="w3-button w3-round-large w3-black" onclick="$('#conteudo').load('produtos.php?pagina=<?php echo $proximo ?>');">Próxima</button>
	<?php
		}
	?>
</div>

<?php
	/* fecha a conexao com o banco */
	mysqli_close($con);
?>