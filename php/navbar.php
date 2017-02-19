
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Card Trader</title>
	<link rel="stylesheet" href="../css/materialize.min.css">
	<link rel="stylesheet" href="../css/estilo.css">
  <link href="../css/icons.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="icon" type="ima/png" href="!#" />
    
      
</head>
<body>
  
   
 
 
<script> var variableJS = document.getElementById('nomPag').value;

</script>

$variablePHP = “<script> document.write(variableJS) </script>”;echo “variablePHP = “.$variablePHP;

   

 
if ($variablePHP=="index")
{
  <div class="navbar-fixed">
  <nav>

    <div class="nav-wrapper light-blue">
      <a href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li class="active"><a href="index.php" >Inicio</a></li>
        <li><a href="php/cartas.php">Cartas</a></li>
        <li><a href="php/registro.php">Registro</a></li>
        <li><a href="php/login.php">Login</a></li>
        <li><a href="php/contactos.php">Contactos</a></li>
        <li><a href="php/promociones.php">Promociones</a></li>
        
      </ul>
     </div>
   </nav>
  </div>
  }
else  
if ($variablePHP=="cartas")
{
  <div class="navbar-fixed">
  <nav>

    <div class="nav-wrapper light-blue">
      <a href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li ><a href="../index.php" >Inicio</a></li>
        <li class="active"><a href="cartas.php">Cartas</a></li>
        <li><a href="registro.php">Registro</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="contactos.php">Contactos</a></li>
        <li><a href="promociones.php">Promociones</a></li>
        
      </ul>
     </div>
   </nav>
  </div>
  }
  else
  if ($variablePHP=="registro")
{
  <div class="navbar-fixed">
  <nav>

    <div class="nav-wrapper light-blue">
      <a href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li ><a href="../index.php" >Inicio</a></li>
        <li ><a href="cartas.php">Cartas</a></li>
        <li class="active"><a href="registro.php">Registro</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="contactos.php">Contactos</a></li>
        <li><a href="promociones.php">Promociones</a></li>
        
      </ul>
     </div>
   </nav>
  </div>
  }else
  if ($variablePHP=="contactos")
{
  <div class="navbar-fixed">
  <nav>

    <div class="nav-wrapper light-blue">
      <a href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li ><a href="../index.php" >Inicio</a></li>
        <li ><a href="cartas.php">Cartas</a></li>
        <li ><a href="registro.php">Registro</a></li>
        <li><a href="login.php">Login</a></li>
        <li class="active"><a href="contactos.php">Contactos</a></li>
        <li><a href="promociones.php">Promociones</a></li>
        
      </ul>
     </div>
   </nav>
  </div>
  }
  



	<section>

	</section>
    <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script type="text/javascript" src="../js/main.js"></script>
    </body>
  </html>