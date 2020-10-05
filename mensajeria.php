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
				$id_dest=$_POST["id"];
				function checkExistChat($id_usu,$id_dest,$en){
					if($id_usu==$id_dest){
						echo"Error... no puedes crear un chat con tigo mismo";echo"<br>";
						echo"<a href='panel.php' class='btn btn-danger'>Atras</a>";
						die();
					}
					$pru=mysqli_query($en,"SELECT id_usu FROM usuario WHERE id_usu='$id_dest'");
					$kp=mysqli_num_rows($pru);
					if($kp==0){
						echo"Error... ID de usuario no valida";echo"<br>";
						echo"<a href='panel.php' class='btn btn-danger'>Atras</a>";
						die();
					}
					$cons1=mysqli_query($en,"SELECT id_sala FROM sala_usu WHERE id_usu='$id_usu'");
					$cons2=mysqli_query($en,"SELECT id_sala FROM sala_usu WHERE id_usu='$id_dest'");
					$k1=mysqli_num_rows($cons1);
					$k2=mysqli_num_rows($cons2);
					for($i=1;$i<=$k1;$i++){
						$row=mysqli_fetch_array($cons1);
						$VEC1[$i]=$row["id_sala"];
					}
					for($j=1;$j<=$k2;$j++){
						$row=mysqli_fetch_array($cons2);
						$VEC2[$j]=$row["id_sala"];
					}
					$chat=FALSE;
					//print_r($VEC1);
					//print_r($VEC2);
					for($i=1;$i<=$k1;$i++){
						for($j=1;$j<=$k2;$j++){
							if($VEC1[$i]==$VEC2[$j]){
								$chat=TRUE;
							}
						}
					}

					if($chat==TRUE){
						echo"Usted ya tiene un chat con este usuario";echo"<br>";
						echo"<a href='panel.php' class='btn btn-danger'>Atras</a>";
					}else{
						mysqli_query($en,"INSERT INTO sala VALUES()");
						$cons=mysqli_query($en,"SELECT MAX(id_sala) FROM sala");
						$row=mysqli_fetch_array($cons);
						$sal=$row['MAX(id_sala)'];
						$_SESSION["sala"]=$sal;
						mysqli_query($en,"INSERT INTO sala_usu VALUES('$sal','$id_usu'),('$sal','$id_dest')");
						header("Location:chateacion.php");
					}
				}
				checkExistChat($_SESSION["id"],$id_dest,$en);
			?>
		</p>
	</div>	
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>	
</body>
</html>