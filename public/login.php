<?php

if(!empty($_POST)){
	if(isset($_POST["alias"]) &&isset($_POST["clave"])){
		if($_POST["alias"]!=""&&$_POST["clave"]!=""){
			include "../lib/conexion.php";
			
			$user_id=null;
			$sql1= "select * from usuarios where (alias=\"$_POST[alias]\" or correo=\"$_POST[alias]\") and clave=\"$_POST[clave]\" ";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$user_id=$r["id_usuario"];
				break;
			}
			if($user_id==null){
				print "<script>alert(\"Acceso invalido.\");window.location='index.php';</script>";
			}else{
				session_start();
				$_SESSION["user_id"]=$user_id;
				print "<script>window.location='../carrito.php';</script>";				
			}
		}
	}
}



?>