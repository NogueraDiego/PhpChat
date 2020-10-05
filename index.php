<!DOCTYPE html>
<html>
<head>
	<title>PHPChat</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=devide-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6">
				<h4 align="center">Inicio de Sesión</h4>
				<form action="login.php" method=POST>
					<div class="form-group">
						<label><b>Nombre</b></label> <input type="text" name=nom required autocomplete="off" class="form-control">
					</div>
					<div class="form-group">
						<label><b>Contraseña</b></label> <input type="password" name=con required autocomplete="off" class="form-control">
					</div>
					<div class="form-group">
						<input type=submit value="Iniciar Sesión" class="btn btn-primary">
					</div>
				</form>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6">
				<h4 align="center">Registro</h4>
				<form action="register.php" method=POST>
					<div class="form-group">
						<label><b>Nombre</b></label> <input type="text" name=nom required autocomplete="off" class="form-control">
					</div>
					<div class="form-group">
						<label><b>Contraseña</b></label> <input type="password" name=con required autocomplete="off" class="form-control">
					</div>
					<div class="form-group">
						<input type=submit value="Registrarse" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
	</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>	
</body>
</html>