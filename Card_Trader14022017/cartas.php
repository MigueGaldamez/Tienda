<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}
?>
<html>
	<head>
		<title>Formulario de Registro</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
	<?php include "php/navbar.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-6">
		<h2>Envianos tu Carta!</h2>

		<form role="form" name="cartas" action="php/cartas.php" method="post">
		  <div class="form-group">
		    <label for="usuario">Usuario</label>
		    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
		  </div>
		  <div class="form-group">
		    <label for="nombre_carta">Nombre Carta</label>
		    <input type="text" class="form-control" id="nombre_carta" name="nombre_carta" placeholder="Nombre Carta">
		  </div>
		  <div class="form-group">
		    <label for="precio">Precio</label>
		    <input type="number_format" class="form-control" id="precio" name="precio" placeholder="Precio">
		  </div>
          <div class="form-group">
            <label for="imagen">Imagen (Revisada por Administrador)</label> <button type="submit" class="btn btn-default">Insertar Imagen</button>
		  </div>

		  <button type="submit" class="btn btn-default">Enviar</button>
		</form>
		</div>
		</div>
		</div>

		<script src="js/valida_registro.js"></script>
	</body>
</html>