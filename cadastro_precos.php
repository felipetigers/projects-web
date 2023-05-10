<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<!-- Link para arquivo local do Boostrap Core CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<title>Cadastro de Preço de Produtos</title>
	<link rel="stylesheet" type="text/css" href="meu_estilo.css"/>
</head>
<body>
<div id="fixo" style="background-color: #E6E6FA;">
	<a href="menu.php">Menu |</a>
	<a href="cadastro_produtos.php">Cadastro de Produtos |</a> 
	<a href="cadastro_estabelecimentos.php">Cadastro de Estabelecimentos</a> 
</div>
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
			<br>
			<br>
		<h1>Cadastro de Preços</h1>
		<br>
	<form action="validar_precos.php" method="post">
	<fieldset>
		<div class="row">
		<label for="produto">Produto:</label>
		<select type="text" name="id_produto" value="" class="form-control"><br/>
			<option value="">Selecione</option>
			<?php
				$link = new PDO ("mysql:localhost;dbname=mybdados","root","");

				$query_prod = $link -> prepare('SELECT id, nome_produto FROM mybdados.produtos ORDER BY nome_produto;');
				
				$query_prod -> execute();
				$rows = $query_prod -> fetchAll(PDO::FETCH_ASSOC);

				foreach($rows as $row)
				{
			?>
				<option value="<?php echo $row['id'];?>"><?php echo $row['nome_produto'];?></option>
			<?php
					}
			?>
		</select><br><br>
		
		<label for="estabelecimento">Estabelecimento:</label>
		<select type="text" name="id_estabelecimento" value="" class="form-control"/><br/>
			<option value="">Selecione</option>
			<?php
				$link = new PDO ("mysql:localhost;dbname=mybdados","root","");

				$query_estab = $link -> prepare('SELECT id, nome_fantasia FROM mybdados.estabelecimentos ORDER BY nome_fantasia;');
				
				$query_estab -> execute();
				$rows = $query_estab -> fetchAll(PDO::FETCH_ASSOC);

				foreach($rows as $row)
				{
			?>
				<option value="<?php echo $row['id'];?>"><?php echo $row['nome_fantasia'];?></option>
			<?php
					}
			?>
		</select><br><br>
		
		<label for="valor">Valor (R$):</label>
		<input type="number" min="0.00" max="10000.00" step="0.01" name="valor" id="valor" class="form-control"><br><br>
		</div>
		<br>
		<div class="row">
			<input type="submit" value="Cadastrar" class="btn btn-success">
		</div>
	</fieldset>
	</form>
	</div>
	</div>
</body>
</html>
