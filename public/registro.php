<?php
if(!empty($_POST)){
	if(isset($_POST["nombres"]) &&isset($_POST["apellidos"]) &&isset($_POST["alias"]) &&isset($_POST["correo"]) &&isset($_POST["clave1"]) &&isset($_POST["clave2"])){
		print "Hola2";
		if($_POST["nombres"]!="" &&$_POST["apellidos"]!="" &&$_POST["alias"]!="" &&$_POST["correo"]!="" &&$_POST["clave1"]==$_POST["clave2"]){
			require("../../lib/database.php");
			
			$found=false;
			print "Hola -1";
			$sql1= "select * from usuarios where alias=\"$_POST[alias]\" or correo=\"$_POST[correo]\"";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$found=true;
				echo "Hola";
				break;
			}
			if($found){
				echo "Hola2";
				print "<script>alert(\"Nombre de usuario o email ya estan registrados.\");window.location='index.php';</script>";
			}
			echo "Hola3";
			$sql = "insert into usuarios(nombres,apellidos,correo,clave,alias,id_tipo_usuario,imagen_usuario) value (\"$_POST[nombres]\",\"$_POST[apellidos]\",\"$_POST[correo]\",\"$_POST[clave1]\",\"$_POST[alias]\,1, Proximamente";
			$query = $con->query($sql);
			if($query!=null){
				echo "Hola4";
				print "<script>alert(\"Registro exitoso. Proceda a logearse\");window.location='index.php';</script>";
			}
		}
	}
}



?>