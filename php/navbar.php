
  
 
 <?php
$documento = basename($_SERVER['PHP_SELF']);

if ($documento=="index.php")
{
  include("php/opcionesindex.php");
}
else  
if ($documento=="cartas.php")
{
  include("opcionescartas.php");
}
  else
  if ($documento=="registro.php")
{
  include("opcionesregistro.php");
}else

 if ($documento=="contactos.php")
{
  include("opcionescontactos.php");
}  
else
if ($documento=="login.php")
{
  include("opcioneslogin.php");
}
else
if ($documento=="promociones.php")
{
  include("opcionespromociones.php");
}
else
if ($documento=="nosotros.php")
{
  include("opcionesnosotros.php");
}
  ?>
