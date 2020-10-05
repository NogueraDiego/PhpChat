<!DOCTYPE html>
<html>
<head>
	<title>PHPChat</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=devide-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
		<?php
		session_start();
		include ("connect.php");
		if(@$_SESSION["usu"]==null or @$_SESSION["usu"]=="" or @$_SESSION["con"]==null or @$_SESSION["con"]==""){
					echo "<p align='center'>No ha iniciado sesion";
					echo"<br>";
					echo"<a href='index.php' class='btn btn-danger'>Inicio</a></p>";
					die();
				}
		if(isset($_SESSION["usu"])){
			$sala=$_SESSION["sala"];
			$cons=mysqli_query($en,"SELECT usuario.nombre,mensaje.mensaje,mensaje.stamp FROM usuario,mensaje WHERE mensaje.id_sala='$sala' AND mensaje.id_usu=usuario.id_usu ORDER BY mensaje.stamp DESC");
			for($i=1;$i<=mysqli_num_rows($cons);$i++){
				$row=mysqli_fetch_array($cons);
				//print_r($row);
				?>
				<strong><?php echo $row["nombre"];?></strong>: <?php echo $row["mensaje"];?><br>
				<?php
			}
		}
		header("refresh:2; mensajes.php");
	?>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>	
</body>
</html>