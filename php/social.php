	
  <?php
  $documento = basename($_SERVER['PHP_SELF']);

if ($documento=="index.php")
{
 include("socialindex.php");
}
else  
{
  include("socialresto.php");
}
?>
  
  
  
  