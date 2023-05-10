<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<!-- Link para arquivo local do Boostrap Core CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<title>Relatório</title>
	<link rel="stylesheet" type="text/css" href="meu_estilo.css"/>
</head>
<body>
<div id="fixo" style="background-color: #E6E6FA;">
	<a href="menu.php">Menu |</a>
	<a href="cadastro_produtos.php">Cadastro de Produtos |</a> 
	<a href="cadastro_estabelecimentos.php">Cadastro de Estabelecimentos</a> 
</div>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<br>
		<br>
	<h1>Pesquisa</h1>
	<?php
		// Configurações do banco de dados
		$host = "localhost";
		$user = "root";
		$pass = "";
		$dbname = "mybdados";

		// Cria a conexão
		$conn = new mysqli($host, $user, $pass, $dbname);

		// Consulta SQL para obter os produtos
		$sql_produtos = "SELECT id, nome_produto FROM produtos ORDER BY nome_produto";
		$result_produtos = $conn->query($sql_produtos);

		// Verifica se há resultados
		if ($result_produtos->num_rows > 0) {
			
			// Cria a combobox de estabelecimentos
			echo "<form method='post' action=''>
					<label for='produto'>Produto:</label>
					<select name='produto' id='produto' class='form-control'>
						<option value=''>Selecione um produto</option>";
			while($row_produtos = $result_produtos->fetch_assoc()) {
				echo "<option value='" . $row_produtos["id"] . "'>" . $row_produtos["nome_produto"] . "</option>";
			}
			echo "</select>
				<br>
					<input type='submit' value='Filtrar' class='btn btn-success'>
				</form>";
				
			// Se houver um produto selecionado, exibe a tabela com os preços
			if (isset($_POST["produto"]) && !empty($_POST["produto"])) {
				$id_produto = $_POST["produto"];

				// Consulta SQL para obter os preços nos estabelecimentos do produto selecionado
				$sql_precos = "SELECT precos.id_pre, precos.id_produto, produtos.nome_produto, estabelecimentos.nome_fantasia, precos.valor
				FROM produtos
				INNER JOIN precos ON produtos.id = precos.id_produto
				INNER JOIN estabelecimentos ON precos.id_estabelecimento = estabelecimentos.id
				WHERE precos.id_produto = $id_produto
				ORDER BY valor ASC";
				
				$result_precos = $conn->query($sql_precos);
				
			// Verifica se há resultados
			if ($result_precos->num_rows > 0) {
				
			// Cria a tabela
			echo "<br><table border='2' class='table table-striped'>
					<tr>
						<th>ID</th>
						<th>Produto</th>
						<th>Estabelecimento</th>
						<th>Valor *</th>
					</tr>";
		
			while($row = $result_precos->fetch_assoc()) {
				echo "
					<tr>
						<td>" . $row["id_pre"] . "</td>
						<td>" . $row["nome_produto"] . "</td>
						<td>" . $row["nome_fantasia"] . "</td>
						<td>R$ " . number_format($row["valor"], 2, ',', '.') . "</td>
					</tr>";
			}
			echo "</table>";
		} else {
			echo "Nenhum preço encontrado.";
			}
		}
		ECHO "<p align='center'> * Os valores estão ordenados do menor ao maior valor.</p>";
	}
?>