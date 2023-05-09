<!DOCTYPE html>
<html xmlns="http://wwww.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8"/>
	<!-- Link para arquivo local do Boostrap Core CSS -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
	<title>Cadastro de Estabelecimentos</title>
	<link rel="stylesheet" type="text/css" href="meu_estilo.css"/>
</head>
<body>
	<div id=fixo>
		<a href="menu.php">Menu |</a>
		<a href="cadastro_produtos.php">Cadastro de Produtos</a>
	</div>
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
			<br>
			<br>
			<h1>Cadastro de Estabelecimentos</h1>
			<form action="validar_estabelecimentos.php" method="post" >
			<fieldset>
				<div class="row">
					<label for="nome_fantasia">Nome Fantasia:</label>
					<input type="text" id="nome_fantasia" name="nome_fantasia" class="form-control" required><br><br>

					<label for="endereco">Endereço:</label>
					<input type="text" id="endereco" name="endereco" class="form-control" required><br><br>

					<label for="cidade">Cidade:</label>
					<input type="text" id="cidade" name="cidade" class="form-control" required><br><br>

					<label for="num_lojas">Número de Lojas:</label>
					<input type="number" id="num_lojas" name="num_lojas" class="form-control" required><br><br>
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
