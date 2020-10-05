<!DOCTYPE html>
<html>
<head>
	<title>Panel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=devide-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<p align="center">
			<?php
				session_start();
				include ("connect.php");
				if(@$_SESSION["usu"]==null or @$_SESSION["usu"]=="" or @$_SESSION["con"]==null or @$_SESSION["con"]==""){
					echo "No ha iniciado sesion";
					echo"<br>";
					echo"<a href='index.php' class='btn btn-danger'>Inicio</a>";
					die();
				}
			?>
		</p>
		<div class="navbar navbar-default">
			<div class="row">
				<button class="btn btn-info" disabled><b>Nombre:</b> <?php echo $_SESSION["usu"]; ?>
				<b>ID:</b> <?php echo $_SESSION["id"]; ?></button>
				<a href="panel.php" class="btn btn-warning">Panel</a>
				<a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<iframe src="mensajes.php" name="iframe" width="100%"></iframe>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<form action="promen.php" method=POST>
						<input type=textarea name=men placeholder="Mensaje" width="80%" autofocus="autofocus" autocomplete="off" class="form-control">
						<input type=submit value=Enviar class="btn btn-primary">
				</form>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<form action=panel.php method=POST>
					<h4 align="center">Seleccionar otro chat</h4>
					<div class="form-group">
						<select name=chat class="form-control">
							<?php
								$id_usu=$_SESSION["id"];
								$cons=mysqli_query($en,"SELECT * FROM sala_usu WHERE id_usu='$id_usu'");
								for($i=1;$i<=mysqli_num_rows($cons);$i++){
									$row=mysqli_fetch_array($cons);
									$id_sala=$row["id_sala"];
									$nom_usu=$_SESSION["usu"];

									$cons2=mysqli_query($en,"SELECT usuario.nombre FROM usuario,sala_usu WHERE sala_usu.id_sala='$id_sala' and sala_usu.id_usu=usuario.id_usu and usuario.nombre<>'$nom_usu'");

									$row2=mysqli_fetch_array($cons2);
									$nom_dest=$row2["nombre"];
								?>
								<option value="<?php echo $id_sala;?>"><?php echo $nom_dest;?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<input type=submit value="Ir al Chat" class="btn btn-warning btn-block">
					</div>
				</form>
			</div>
		</div>
	</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>	
</body>
</html>