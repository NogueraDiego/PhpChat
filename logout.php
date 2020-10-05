<!DOCTYPE html>
<html>
<head>
	<title>Cierre de Sesión</title>
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
			}else{
				session_destroy();
				header("Location:index.php");
			}
		?><br>
		<a href="index.php" class="btn btn-danger">Atras</a></p>
	</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>