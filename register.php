<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=devide-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<p align="center">
		<?php
			include ("connect.php");
			function checkUser($nom,$en){
				$con=mysqli_query($en,"SELECT nombre FROM usuario WHERE nombre='$nom'");
				if(mysqli_num_rows($con)==0){
					return TRUE;
				}else{
					return FALSE;
				}
			}
			@$nom=$_POST["nom"];
			@$con=$_POST["con"];
			if($nom==null or $nom=="" or $con==null or $con==""){
				echo"No has completado los datos";
			}else{
				if(checkUser($nom,$en)==TRUE){
					$sql=mysqli_query($en,"INSERT INTO usuario SET nombre='$nom',contraseña='$con'");
					if($sql){
						echo"Registro correcto";
					}else{
						echo"Error en el registro: ".mysqli_error($en);
					}
				}else{
					echo"Error... ese nombre de usuario ya existe";
				}
			}
		?>
		<br>
		<a href="index.php" class="btn btn-danger">Atras</a></p>
	</div>	
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>	
</body>
</html>