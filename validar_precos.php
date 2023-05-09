<?php
	// Verifica se os dados foram enviados pelo método POST
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	try {
	    $link = new PDO ("mysql:;localhost;dbname=mybdados","root","");
	
		$id_produto = $_POST['id_produto'];
		$id_estabelecimento = $_POST['id_estabelecimento'];
		$valor = $_POST['valor'];

		$query = $link -> prepare("INSERT INTO mybdados.precos(id_produto, id_estabelecimento, valor)
		VALUES ('$id_produto', '$id_estabelecimento', $valor)");
	
		$results = $query -> execute();
	
		if ($results) {
			echo "<script> alert('Preço cadastrado com sucesso!');
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
