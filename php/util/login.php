<?php

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["password"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""){
			require("../lib/database.php");
			
			$user_id=null;
			$sql1= "select * from clientes where (alias_cliente=\"$_POST[username]\" or correo_cliente=\"$_POST[username]\") and clave_cliente=\"$_POST[password]\" ";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$user_id=$r["id"];
				break;
			}
			if($user_id==null){
				print "<script>alert(\"Acceso invalido.\");window.location='../../index.php';</script>";
			}else{
				session_start();
				$_SESSION["user_id"]=$user_id;
				print "<script>window.location='../nosotros.php';</script>";				
			}
		}
	}
}



?>