<!DOCTYPE html>
<html>
<head>
	<title>Inicio de Sesiòn</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=devide-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<p align="center">
		<?php
			include ("connect.php");
			function checkLogin($nom,$con,$en){
				$cons=mysqli_query($en,"SELECT * FROM usuario WHERE nombre='$nom' AND contraseña='$con'");
				if(mysqli_num_rows($cons)==1){
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
				if(checkLogin($nom,$con,$en)==TRUE){
					session_start();
					$_SESSION["usu"]=$nom;
					$_SESSION["con"]=$con;
					$consulta=mysqli_query($en,"SELECT * FROM usuario WHERE nombre='$nom' AND contraseña='$con'");
					$row=mysqli_fetch_array($consulta);
					$_SESSION["id"]=$row["id_usu"];
					header("Location:panel.php");
				}else{
					echo "Error al iniciar sesion... intente de nuevo";
				}
			}
		?><br>
		<a href="index.php" class="btn btn-danger">Atras</a></p>
	</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>