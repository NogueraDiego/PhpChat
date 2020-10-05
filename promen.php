<!DOCTYPE html>
<html>
<head>
	<title>PHPChat</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=devide-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container"><p align="center">
		<?php
			session_start();
			include ("connect.php");
			if(@$_SESSION["usu"]==null or @$_SESSION["usu"]=="" or @$_SESSION["con"]==null or @$_SESSION["con"]==""){
					echo "No ha iniciado sesion";
					echo"<br>";
					echo"<a href='index.php' class='btn btn-danger'>Inicio</a>";
					die();
				}
			$men=$_POST["men"];
			$id_usu=$_SESSION["id"];
			$id_sala=$_SESSION["sala"];
			$cnow=mysqli_query($en,"SELECT NOW()");
			$row=mysqli_fetch_array($cnow);
			$now=$row["NOW()"];
			if($men!=null and $men!="" and $men!=" "){
				mysqli_query($en,"INSERT INTO mensaje VALUES('$id_usu','$id_sala','$men','$now')");
			}
			header("Location:chateacion.php");
		?></p>
	</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>	
</body>
</html>