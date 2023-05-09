<?php
	//verifica se os dados foram enviados via método POST
	if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
		header("Location: login.php"); exit;
	}
	
	$link = new PDO ("mysql:;localhost;dbname=mybdados","root","");
	
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

	//verifica no banco de dados se os dados existem
	$query = $link -> prepare('SELECT * FROM mybdados.tb_usuarios WHERE usu_nome=:usuario and usu_senha=:senha;');
	
	$query -> bindValue(":usuario", $usuario);
	$query -> bindValue(":senha", $senha);

	$query -> execute();

	if ($query->rowCount()==1){ 		//verifica se há algum registro
		echo "<script>  alert('Logado com sucesso!');
						top.location.href='menu.php';
			  </script>";			
	}
	else {
		echo "<script>  alert('Senha incorreta. Tente novamente!');
						top.location.href='login.php';
			  </script>";			
	}
?>