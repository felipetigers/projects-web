<!DOCTYPE html>
<html xmlns="http://wwww.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8"/>
	<!-- Boostrap Core CSS -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="meu_estilo.css"/>
	<style type="text/css">
		p {
			color:gray;
			font-family: Courier New;
			font-size: 13px;
		}
	</style>
</head>
<body>
	<div class="row">
		<div class="col-md-4">
		</div>
	
		<div class="col-md-4">
			<p></p>
			<p></p>
			<h1>Login de acesso</h1>
			<form action="validar_login.php" method="post">
			<fieldset>
			<div class="row">
				<label for="username">Usuário: </label>
				<input type="text" id="usuario" name="usuario" required class="form-control">
				<br>
				<label for="password">Senha: </label>
				<input type="password" id="senha" name="senha" required class="form-control">
			</div>
			<br>
				<div class="row">
					<input type="submit" value="Entrar" class="btn btn-success">
				</div>
			</fieldset>
			</form>
			<p>
				<br>Login utilizado: <strong>felipe</strong>
				<br>Senha: <strong>mudar123</strong>
			</p>
		</div>
	</div>
</body>
</html>