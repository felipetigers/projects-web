<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<!-- Link para arquivo local do Boostrap Core CSS -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
	<title>Relatório</title>
	<link rel="stylesheet" type="text/css" href="meu_estilo.css"/>
</head>
<body>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<br>
		<br>
	<h1>Pesquisa</h1>
	<?php
		// Configurações do banco de dados
		$host = "localhost"; // servidor
		$user = "root"; // nome de usuário
		$pass = ""; // senha
		$dbname = "mybdados"; // nome do banco de dados

		// Cria a conexão
		$conn = new mysqli($host, $user, $pass, $dbname);

		// Consulta SQL para obter os estabelecimentos
		$sql_estabelecimentos = "SELECT id, nome_fantasia FROM estabelecimentos ORDER BY nome_fantasia";
		$result_estabelecimentos = $conn->query($sql_estabelecimentos);

		// Verifica se há resultados
		if ($result_estabelecimentos->num_rows > 0) {
			
			// Cria a combobox de estabelecimentos
			echo "<form method='post' action=''>
					<label for='estabelecimento'>Estabelecimento:</label>
					<select name='estabelecimento' id='estabelecimento' class='form-control'>
						<option value=''>Selecione um estabelecimento</option>";
			while($row_estabelecimentos = $result_estabelecimentos->fetch_assoc()) {
				echo "<option value='" . $row_estabelecimentos["id"] . "'>" . $row_estabelecimentos["nome_fantasia"] . "</option>";
			}
			echo "</select>
					<input type='submit' value='Filtrar'>
				</form>";
			// Se houver um estabelecimento selecionado, exibe a tabela com os preços
			if (isset($_POST["estabelecimento"]) && !empty($_POST["estabelecimento"])) {
				$id_estabelecimento = $_POST["estabelecimento"];

				// Consulta SQL para obter os preços dos produtos do estabelecimento selecionado
				$sql_precos = "SELECT p.id_pre, p.id_produto, p.id_estabelecimento, p.valor, e.nome_fantasia, pr.nome_produto
				FROM precos p
				INNER JOIN estabelecimentos e ON p.id_estabelecimento = e.id
				INNER JOIN produtos pr ON p.id_produto = pr.id
				WHERE p.id_estabelecimento = $id_estabelecimento";

				$result_precos = $conn->query($sql_precos);
			// Verifica se há resultados
			if ($result_precos->num_rows > 0) {
			// Cria a tabela
			
			echo "<br><table>
					<tr>
						<th>ID</th>
						<th>Produto</th>
						<th>Estabelecimento</th>
						<th>Valor</th>
					</tr>";
		
			while($row = $result_precos->fetch_assoc()) {
				echo "
					<tr>
						<td>" . $row["id_pre"] . "</td>
						<td>" . $row["nome_produto"] . "</td>
						<td>" . $row["nome_fantasia"] . "</td>
						<td>" . $row["valor"] . "</td>
					</tr>";
			}
			echo "</table>";
		} else {
			echo "Nenhum preço encontrado.";
			}
		}
	}
?>