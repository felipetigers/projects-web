<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<!-- Link para arquivo local do Boostrap Core CSS -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
	<title>Cadastro de Preço de Produtos</title>
	<link rel="stylesheet" type="text/css" href="meu_estilo.css"/>
</head>
<body>
<div id=fixo>
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
	<form action="validar_precos.php" method="post">
	<fieldset>
		<div class="row">
		<label for="produto">Produto:</label>
		<select type="text" name="id_produto" value="" class="form-control"><br/>
			<option value="">Selecione</option>
			<?php
				$link = new PDO ("mysql:localhost;dbname=mybdados","root","");

				$query_prod = $link -> prepare('SELECT id, nome_produto FROM mybdados.produtos;');
				
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

				$query_estab = $link -> prepare('SELECT id, nome_fantasia FROM mybdados.estabelecimentos;');
				
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
		<input type="number" name="valor" id="valor" class="form-control"><br><br>
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
