<?php

if(!empty($_POST)){
	if(isset($_POST["usuario"]) &&isset($_POST["nombre_carta"]) &&isset($_POST["precio"]) &&isset($_POST["imagen"])])){
		if($_POST["usuario"]!=""&& $_POST["nombre_carta"]!=""&&$_POST["precio"]!=""&&$_POST["imagen"]){
			include "conexion.php";

			$sql = "insert into cartas(usuario,nombre_carta,precio,imagen,created_at) value (\"$_POST[usuario]\",\"$_POST[nombre_carta]\",\"$_POST[precio]\",\"$_POST[imagen]\",NOW())";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Registro exitoso. Espere a que lo llamen\");window.location='../home.php';</script>";
			}
		}
	}
}



?>