<!--<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}
?>-->
<html>
	<head>
		<title>Formulario de Registro</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/materialize.min.css">
	<link rel="stylesheet" href="../css/estilo.css">
		
	  <input name="nomPag" id="nomPag" type="hidden" value="cartas" />
	</head>
	<body>
	<?php include "navbar.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-6">
		<h2>Compras</h2>

		<form role="form" name="cartas" action="compras.php" method="post">
		  <div class="form-group">
		    <label for="precio"><h5>Madolche Magileine </h5></label>
		  </div>
			  <img class="materialboxed" data-caption="A picture of some deer and tons of trees" width="250" src="../img/madolche_magileine.png">
			<div class="form-group">
		    <label for="precio"><h5>Cantidad: </h5></label> 7
		  </div>
		  <div class="form-group">
		    <label for="precio"><h5>Precio: </h5></label> $14.97

				<hr>

				<form role="form" name="cartas" action="compras.php" method="post">
		  <div class="form-group">
		    <label for="precio"><h5>Frightfur Tiger </h5></label>
		  </div>
			  <img class="materialboxed" data-caption="A picture of some deer and tons of trees" width="250" src="../img/frightfur_tiger.jpg">
			<div class="form-group">
		    <label for="precio"><h5>Cantidad: </h5></label> 10
		  </div>
		  <div class="form-group">
		    <label for="precio"><h5>Precio: </h5></label> $8.59

				<hr>

				<form role="form" name="cartas" action="compras.php" method="post">
		  <div class="form-group">
		    <label for="precio"><h5>Judgement Dragon </h5></label>
		  </div>
			  <img class="materialboxed" data-caption="A picture of some deer and tons of trees" width="250" src="../img/judgement_dragon.png">
			<div class="form-group">
		    <label for="precio"><h5>Cantidad: </h5></label> 2
		  </div>
		  <div class="form-group">
		    <label for="precio"><h5>Precio: </h5></label> $19.99

		  </div>
			</div>
			</div>
			<button type="submit" class="btn btn-default">Comprar</button>
		  </div>

		</form>
		</div>
		</div>
		</div>

	 <?php include "social.php";?>
	</body>
	  <footer><?php include "footer.php";?></footer>

      <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script type="text/javascript" src="../js/pgwslider.min.js"></script>
      <script type="text/javascript" src="../js/main.js"></script>

</html>