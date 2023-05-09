<!DOCTYPE html>
<html xmlns="http://wwww.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8"/>
	<!-- Link para arquivo local do Boostrap Core CSS -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
	<title>Cadastro de Produtos</title>
	<link rel="stylesheet" type="text/css" href="meu_estilo.css"/>
</head>
<body>
	<div id=fixo>
		<a href="menu.php">Menu |</a>
		<a href="cadastro_estabelecimentos.php">Cadastro de Estabelecimentos</a> 
	</div>
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
			<br>
			<br>
			<h1>Cadastro de Produtos</h1>
			<form action="validar_produtos.php" method="post">
			<fieldset>
				<div class="row">
					<label for="nome_produto">Nome do Produto:</label>
					<input type="text" id="nome_produto" name="nome_produto" class="form-control" required><br><br>

					<label for="marca">Marca:</label>
					<input type="text" id="marca" name="marca" class="form-control" required><br><br>
					
					<label for="quantidade">Quantidade:</label>
					<input type="number" id="quantidade" name="quantidade" class="form-control" required><br><br>
				</div>
				<br>
				<div class="row">
					<input type="submit" value="Cadastrar" class="btn btn-success">
				</div>
			</fieldset>
			</form>
			<p><li><a href="cadastro_precos.php">Cadastrar Preço dos Produtos</a></li></p>
		</div>
	</div>
	</div
</body>
</html>
