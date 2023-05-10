<!DOCTYPE html>
<html xmlns="http://wwww.w3.org/1999/xhtml">
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
		<div class="col-md-1">
		</div>

		<div class="col-md-10">
	<p></p>
	<br><br>
	<h2>Relatório de Estabelecimentos</h2>
	<table border="2" class="table table-striped">
		<thead><tr>
			<td>Id</td>
			<td>Nome do Estabelecimento</td>
			<td>Endereço</td>
			<td>Cidade</td>
			<td>N° Lojas</td>
			<td>Data Cadastro</td>
		</tr>
		</thead>
		<tbody>
		<?php	
			$link = new PDO ("mysql:;localhost;dbname=mybdados","root","");
		
			$query = $link -> prepare("SELECT id, nome_fantasia, endereco, cidade, num_lojas, dta_cadastro FROM mybdados.estabelecimentos;");
		
			$query -> execute();
			$rows = $query->fetchAll(PDO::FETCH_ASSOC);
			
			foreach($rows as $row)
			{
		?>
		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['nome_fantasia'];?></td>
			<td><?php echo $row['endereco'];?></td>
			<td><?php echo $row['cidade'];?></td>
			<td><?php echo $row['num_lojas'];?></td>
			<td><?php echo $row['dta_cadastro'];?></td>
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