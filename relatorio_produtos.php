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
	
	<h2>Relatório de Produtos</h2>
	<table border="2" class="table table-striped">
		<thead><tr>
			<td>Id</td>
			<td>Nome do Produto</td>
			<td>Marca</td>
			<td>Quantidade</td>
			<td>Data Cadastro</td>
		</tr>
		</thead>
		<tbody>
		<?php
			//conectando-se ao banco de dados
			$link = new PDO ("mysql:;localhost;dbname=mybdados","root","");
			
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