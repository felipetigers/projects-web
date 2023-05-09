<?php
	// Verifica se os dados foram enviados pelo método POST
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	try {
	    $link = new PDO ("mysql:;localhost;dbname=mybdados","root","");
	
		$nome_fantasia = $_POST['nome_fantasia'];
		$endereco = $_POST['endereco'];
		$cidade = $_POST['cidade'];
		$num_lojas = $_POST['num_lojas'];

		$query = $link -> prepare("INSERT INTO mybdados.estabelecimentos(nome_fantasia, endereco, cidade, num_lojas)
		VALUES ('$nome_fantasia', '$endereco', '$cidade', $num_lojas)");
	
		$results = $query -> execute();
	
		if ($results) {
			echo "<script> alert('Estabelecimento cadastrado com sucesso!');
			   top.location.href='menu.php';
				  </script>";
		} else {
			echo ("Erro de inclusão. Operação não foi realizada");
		}
	}
	catch(PDOException $erro) {
            echo "<strong>ERRO DETECTADO:</strong><br>", $erro->getMessage();
	}
}
?>