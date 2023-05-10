<!DOCTYPE html>
<html xmlns="http://wwww.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8"/>
	<!-- Link para arquivo local do Boostrap Core CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<title>Cadastro de Produtos</title>
	<link rel="stylesheet" type="text/css" href="meu_estilo.css"/>
</head>
<body>
<div id="fixo" style="background-color: #E6E6FA;">
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
			<br>
			<form action="validar_produtos.php" method="post">
			<fieldset>
				<div class="row">
					<label for="nome_produto">Nome do Produto:</label>
					<input type="text" id="nome_produto" name="nome_produto" class="form-control" required><br><br>

					<label for="marca">Marca:</label>
					<input type="text" id="marca" name="marca" class="form-control" required><br><br>
					
					<label for="quantidade">Quantidade:</label>
					<input type="number" id="quantidade" name="quantidade" class="form-control"><br><br>
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
