<!DOCTYPE html>
<html xmlns="http://wwww.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8"/>
	<!-- Link para arquivo local do Boostrap Core CSS -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
	<title>Relatório</title>
	<link rel="stylesheet" type="text/css" href="meu_estilo.css"/>
</head>
<body>
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
			<br>
			<br>
		<h1>Pesquisa</h1>
			<form action="validar_precos.php" method="post">
			<fieldset>
				<div class="row">
					<!-- Cria uma combobox com os nomes dos estabelecimentos -->
					<label for="estabelecimento">Filtrar por Estabelecimento:</label>
					<select type="text" name="id_estabelecimento" value="" class="form-control"><br/>
						<option value="">Selecione</option>
						<?php
						$link = new PDO ("mysql:localhost;dbname=mybdados","root","");

						$query = $link -> prepare('SELECT id, nome_fantasia FROM mybdados.estabelecimentos ORDER BY nome_fantasia;');
						
						$query -> execute();
						$rows = $query -> fetchAll(PDO::FETCH_ASSOC);

							foreach($rows as $row)
							{
						?>
							<option value="<?php echo $row['id'];?>"><?php echo $row['nome_fantasia'];?></option>
						<?php
								}
						?>
					</select><br><br>
				</div>
				<br>
			</fieldset>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
		<!-- Exibe o resultado como forma de tabela -->
			<h4>Relatório de Produtos mais baratos</h4>
			<table border="2" class="table table-striped">
			<thead>
			<tr>
				<td>Id</td>
				<td>Nome do Produto</td>
				<td>Marca</td>
				<td>Quantidade</td>
				<td>Data Cadastro</td>
			</tr>
			</thead>
			<tbody>
			<?php
				//busca os dados na tabela produtos do banco de dados
				$query = $link -> prepare("SELECT id, nome_produto, marca, quantidade, data_cadastro FROM mybdados.produtos;");
			
				$query -> execute();
				$rows = $query->fetchAll(PDO::FETCH_ASSOC);
				
				foreach($rows as $row)
				{
			?>
			<tr>
				<td><?php echo $row['id'];?></td>
				<td><?php echo $row['nome_produto'];?></td>
				<td><?php echo $row['marca'];?></td>
				<td><?php echo $row['quantidade'];?></td>
				<td><?php echo $row['data_cadastro'];?></td>
			</tr>
			<?php
				}
			?>
			</tbody>
			</table>
		</div>
	</div>
</body>
</html>