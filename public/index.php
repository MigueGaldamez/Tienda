<!DOCTYPE html>
<html lang='es'>
<head>
	<meta charset='utf-8'>
	<title>CardTrader</title>
	<link type='text/css' rel='stylesheet' href='../css/materialize.min.css'/>
	<link type='text/css' rel='stylesheet' href='../css/icons.css'/>
	

	<link href="../css/animate.css" rel="stylesheet">
	<link href="../css/hover.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link type='text/css' rel='stylesheet' href='../css/Style.css'/>

	<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
	<?php require("../lib/database.php");
	?>
</head>
<body>
	<!-- Menú del sitio público -->
	<div class='navbar-fixed'>
		<nav class='azul'>
			<div class='nav-wrapper'>
				<a href='index.php' class='brand-logo'><img src='../img/logo.png' height='60'></a>
				<a href='#' data-activates='mobile' class='button-collapse'><i class='material-icons'>menu</i></a>
				<ul class='right hide-on-med-and-down'>
					<li><a href='#productos'><i class='material-icons left'>view_module</i>Productos</a></li>
					<li><a href='#'><i class='material-icons left'>shopping_cart</i>Compras</a></li>
					<li><a href='#acceder'><i class='material-icons left'>person</i>Acceder</a></li>
				</ul>
			</div>
		</nav>
	</div>

	<!-- Menú lateral para dispositivos móviles -->
	<ul class='side-nav' id='mobile'>
		<li><a href='#productos'><i class='material-icons left'>view_module</i>Productos</a></li>
		<li><a href='#'><i class='material-icons left'>shopping_cart</i>Compras</a></li>
		<li><a href='#acceder'><i class='material-icons left'>person</i>Acceder</a></li>
	</ul>

	<!-- Slider con subtítulos e indicadores y con una altura de 400px -->
    <div class="slider">
    <ul class="slides">
      <li>
        <img src="../img/slider/dark_magician.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3><b>Yugioh Dark Side of Dimensions</b></h3>
          <h5 class="light grey-text text-lighten-3">Disponible desde el 7 de Febrero 2017 en cines</h5>
        </div>
      </li>
      <li>
        <img src="../img/slider/raging_tempest.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3><b>Disponible Preventa de Raging Tempest Booster Box</b></h3>
          <h5 class="light grey-text text-lighten-3">Dawn of the Zoodiacs</h5>
        </div>
      </li>
      <li>
        <img src="../img/slider/5tempos.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3><b>La 5ta serie de Yugioh apunto de terminar!</b></h3>
          <h3 class="light grey-text text-lighten-3"><font color = "black">6 capitulos restantes?</font></h3>
        </div>
      </li>
      <li>
        <img src="../img/slider/dragon_rulers.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3><b>Hoy en decks prevalentes: Dragon Rulers!</b></h3>
          <h5 class="light grey-text text-lighten-3">Compra una Booster Box de esta baraja que domino el juego por 6 meses!</h5>
        </div>
      </li>
    </ul>
  </div>

	<!-- Sección de productos -->
	<div class='container' id='productos'>
		<h4 class='center-align'>NUESTROS PRODUCTOS</h4>
		<div class='row'>
		<?php
		
    

		$sql2 = "SELECT count(*) AS cantidad FROM productos, categorias WHERE productos.id_categoria = categorias.id_categoria AND estado_producto = 1 ";
        $data2 = Database::getRow($sql2, null);
		$Cantidad =$data2["cantidad"];
		$properpag=3;
		$norpag=$_GET['num'];
        $canpag=$Cantidad/$properpag;
		if(is_numeric($norpag))
		{
               $inicio=($norpag-1)*$properpag;
		}
		else
		{
			$inicio=0;
		}

		
		
        	$sql = "SELECT * FROM productos, categorias WHERE productos.id_categoria = categorias.id_categoria AND estado_producto = 1 limit $inicio,$properpag ";
		//$sql = "SELECT * FROM productos, categorias WHERE productos.id_categoria = categorias.id_categoria AND estado_producto = 1 ";
		$data = Database::getRows($sql, null);
		

		if($data != null)
		{
			foreach ($data as $row) 
			{
				print("
					<div class='card hoverable col s12 m6 l4 '>
						<div class='card-image waves-effect waves-block waves-light '>
							<img class='activator' src='data:image/*;base64,$row[imagen_producto]'>
						</div>
						<div class='card-content'>
							<span class='card-title activator grey-text text-darken-4'>$row[nombre_producto]<i class='material-icons right'>more_vert</i></span>
							<p><a href='#'><i class='material-icons left'>loupe</i>Seleccionar</a></p>
						</div>
						<div class='card-reveal'>
							<span class='card-title grey-text text-darken-4'>$row[nombre_producto]<i class='material-icons right'>close</i></span>
							<p>$row[descripcion_producto]</p>
							<p>Precio (US$) $row[precio_producto]</p>
						</div>
					</div>
				");
			}
		}
		else
		{
			print("<div class='card-panel rosado'><i class='material-icons left'>warning</i>No hay registros disponibles en este momento.</div>");
		}
?>

		</div><!-- Fin de row -->

	<div class="row center aling">
		<ul class="">
		<?php
		if($norpag>1)
		{
                echo "<a class='waves-effect circularpag' href='index.php?num=".($norpag-1)."#productos'><i class='material-icons'>chevron_left</i></a>";
		}
		for($i=1;$i<=$canpag;$i++)
		{
			if($i==$norpag)
			{ 

                   echo " <a class='waves-effect circularpag activoo'>$i</a>";
			}
			else
			{
                   echo "<a class='waves-effect circularpag' href='index.php?num=$i#productos'>$i</a>";   
			}
		}
		if($norpag<$canpag)
		{
                echo "<a class='waves-effect circularpag' href='index.php?num=".($norpag+1)."#productos'><i class='material-icons'>chevron_right</i></a>";
		}
		?>
         </ul>
		 
		</div>
	</div><!-- Fin de container -->	
	
	

	<!-- Efecto parallax con una altura de 500px -->
	<div class='parallax-container'>
		<div class='parallax'><img src='../img/slider/CGvgvNH.jpg'></div>
	</div>
   
    
 	<!-- Formularios para acceder -->
	<div class='formacc' id='acceder'>
		<h4 class='center-align'>ACCEDER</h4>
		<ul class='tabs center-align'>
			<li class='tab'><a href='#cuenta'>CREAR CUENTA</a></li>
			<li class='tab'><a href='#sesion'>INICIAR SESIÓN</a></li>
		</ul>
		<!-- Formulario para nueva cuenta -->
		<div id='cuenta'>
			<form>
				<div class='row'>
					<div class='input-field col s12 m6'>
						<i class='material-icons prefix'>account_box</i>
						<input type='text' id='nombres' class='validate'>
						<label for='nombres'>Nombres</label>
					</div>
					<div class='input-field col s12 m6'>
						<i class='material-icons prefix'>account_box</i>
						<input type='text' id='apellidos' class='validate'>
						<label for='apellidos'>Apellidos</label>
					</div>
					<div class='input-field col s12 m6'>
						<i class='material-icons prefix'>email</i>
						<input type='email' id='correo' class='validate'>
						<label for='correo' data-error='Error' data-success='Bien'>Correo</label>
					</div>
					<div class='input-field col s12 m6'>
						<i class='material-icons prefix'>phone</i>
						<input type='text' id='telefono' class='validate'>
						<label for='telefono' data-error='Error' data-success='Bien'>Teléfono</label>
					</div>
					<div class='input-field col s12 m6'>
						<i class='material-icons prefix'>security</i>
						<input type='password' id='clave1' class='validate'>
						<label for='clave1' data-error='Error' data-success='Bien'>Contraseña</label>
					</div>
					<div class='input-field col s12 m6'>
						<i class='material-icons prefix'>security</i>
						<input type='password' id='clave2' class='validate'>
						<label for='clave2' data-error='Error' data-success='Bien'>Confirmar contraseña</label>
					</div>
					<div class='input-field col s12'>
						<i class='material-icons prefix'>place</i>
						<textarea id='textarea1' class='materialize-textarea'></textarea>
						<label for='textarea1'>Dirección</label>
					</div>
				</div>
				<div class='row center-align'>
					<div class='col s12'>
						<input type='checkbox' id='terminos'>
						<label for='terminos'>Acepto <a href='#terminos'>términos y condiciones</a></label>
					</div>
					<div class='col s12'>
						<button type='submit' class='btn waves-effect azul'><i class='material-icons'>send</i></button>
					</div>
				</div>
			</form>
		</div>
		<!-- Formulario para iniciar sesión -->
		<div id='sesion'>
			<form>
				<div class='row'>
					<div class='input-field col s12 m6 offset-m3'>
						<i class='material-icons prefix'>email</i>
						<input type='email' id='correo' class='validate'>
						<label for='correo' data-error='Error' data-success='Bien'>Correo</label>
					</div>
					<div class='input-field col s12 m6 offset-m3'>
						<i class='material-icons prefix'>security</i>
						<input type='password' id='clave' class='validate'>
						<label for='clave' data-error='Error' data-success='Bien'>Contraseña</label>
					</div>
				</div>
				<div class='row center-align'>
					<button type='submit' class='btn waves-effect azul'><i class='material-icons'>send</i></button>
				</div>
			</form>
		</div>
	</div>

	<!-- Efecto parallax con una altura de 500px -->
	<div class='parallax-container'>
		<div class='parallax'><img src='../img/slider/frightfurs_by_thatcraigfellow-d923245.png'></div>
	</div>

	<!-- Ventana modal de términos y condiciones -->
	<div id='terminos' class='modal'>
		<div class='modal-content'>
			<h4 class='center-align'>TÉRMINOS Y CONDICIONES</h4>
			<p>Nuestra empresa ofrece los mejores productos a nivel nacional con una calidad garantizada y...</p>
		</div>
		<div class='divider'></div>
		<div class='modal-footer'>
			<a href='#!' class='modal-action modal-close btn waves-effect'><i class='material-icons'>done</i></a>
		</div>
	</div>

	<!-- Ventana modal para la misión -->
	<div id='mision' class='modal'>
		<div class='modal-content'>
			<h4 class='center-align'>MISIÓN</h4>
			<p>Ofrecer los mejores productos a nivel nacional para satisfacer a nuestros clientes y...</p>
		</div>
		<div class='divider'></div>
		<div class='modal-footer'>
			<a href='#!' class='modal-action modal-close btn waves-effect'><i class='material-icons'>done</i></a>
		</div>
	</div>

	<!-- Ventana modal para la visión -->
	<div id='vision' class='modal'>
		<div class='modal-content'>
			<h4 class='center-align'>VISIÓN</h4>
			<p>Ser la empresa lider en la región ofreciendo productos de calidad a precios accesibles y...</p>
		</div>
		<div class='divider'></div>
		<div class='modal-footer'>
			<a href='#!' class='modal-action modal-close btn waves-effect'><i class='material-icons'>done</i></a>
		</div>
	</div>

	<!-- Ventana modal para los valores -->
	<div id='valores' class='modal'>
		<div class='modal-content center-align'>
			<h4>VALORES</h4>
			<p>Responsabilidad</p>
			<p>Honestidad</p>
			<p>Seguridad</p>
			<p>Calidad</p>
		</div>
		<div class='divider'></div>
		<div class='modal-footer'>
			<a href='#!' class='modal-action modal-close btn waves-effect'><i class='material-icons'>done</i></a>
		</div>
	</div>

	<!-- Pie de pagina del sitio público -->
<footer id="footer "class="azul"><!--Footer-->
	<div class="footer-widget ">
		<div class="container">
				
			<div class="row">
				<div class="col s6">
					<div class="single-widget">
						<div class="enlacescirculo"><a class="center"><h4>Enlaces</h4></a></div>
						<ul class="nav nav-pills nav-stacked">
							<li><a href="#vision" title="Contacto"  target="_blank">Contacto</a></li>
							<li><a href="page/aviso-legal" title="Aviso Legal"  target="_blank">Aviso Legal</a></li>
							<li><a href="page/politica-de-cookies" title="Política de Cookies"  target="_blank">Política de Cookies</a></li>
							<li><a href="page/condiciones-generales" title="Condiciones Generales"  target="_blank">Condiciones Generales</a></li>
							<li style="display:none"><a href="index.html" title=""></a></li>
						</ul>
					</div>
				</div>

				<div class="col l6 s12">
        <h5 class="grey-text text-lighten-4">Ubicación</h5>
            <p class="grey-text text-lighten-4"><div id="map"></div></p>
        </div>
				
				<div class="col m12 center">
                    <div class="text-center">
                        <div class="social">
                            <ul>
                                <li class="socialcirculo">
						           <a   href="https://www.facebook.com" title="Únete a Facebook" target="_blank"><img class="topsocial" src="../img/facebook.png"></a>
					            </li>
                                <li class="socialcirculo">
						           <a href="https://twitter.com" title="Síguenos en Twitter" target="_blank"><img class="topsocial" src="../img/twitter.png"></a>
                                </li>
					            <li class="socialcirculo">
						           <a href="https://www.instagram.com/" title="Síguenos en Instagram" target="_blank"><i class="fa fa-lg fa-instagram fa-2x"></i></a>
					            </li>
					            <li class="socialcirculo">
						           <a href="https://plus.google.com/u/0/+D%C3%80LITNATURAproductosecologicosBIO" title="Síguenos en Google+" target="_blank"><i class="fa fa-lg fa-google-plus fa-2x"></i></a>
					            </li>
					            <li class="socialcirculo">
						           <a href="https://www.youtube.com/channel/UCCiLs5dgtvDqTR8P4Pe9Ubg" title="Subscríbete a mi canal en YouTube" target="_blank"><i class="fa fa-lg fa-youtube fa-2x"></i></a>
					            </li>
					            <li class="socialcirculo">
						           <a href="https://es.linkedin.com/in/dalitnatura" title="Síguenos en Linkedin" target="_blank"><i class="fa fa-lg fa-linkedin fa-2x"></i></a>
					            </li>
					            <li class="socialcirculo">
						           <a href="tel:685033733" title="685033733"><i class="fa fa-lg fa-phone fa-2x"></i></a>
					            </li>
					            <li class="socialcirculo">
					               <a href="mailto:admon@dalitnatura.com" title="admon@dalitnatura.com"><i class="fa fa-envelope fa-lg"></i></a>
					            </li>
					        </ul>
					    </div>
                    </div>
                </div>
				<a class="ir-arriba circularSub" href="#!"><img src="../img/arriba.png"></a>
			</div>
		</div>
	
	</div>
	
	<div class="footer-bottom ">
		<div class="container ">
			<div class="row ">
				<div class="col-md-4" style="font-size:9pt"><?php print('<span>©'.date(' Y ').'CardTrader, todos los derechos reservados.</span>') ?></div>
				<div class="col-md-4" style="text-align: center; font-size:9pt">
					Tienda creada por <a>MigueC:</a>
				</div>
				<div class="col-md-4" style="text-align: right">
			</div>
			
		</div>
		
	</div>
	
</footer>

	<!-- Importación de archivos JavaScript -->
	<script type='text/javascript' src='../js/jquery-2.1.1.min.js'></script>
	<script type='text/javascript' src='../js/materialize.min.js'></script>
	<script type='text/javascript' src='js/public.js'></script>
	<script type='text/javascript' src='../js/main.js'></script>
	<!--  <script src="../js/mapa.js" async defer></script>-->
</body>
</html>