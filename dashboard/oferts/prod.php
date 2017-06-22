<?php
require("../../lib/database.php");



if(empty($_GET['id'])) 
{
     var_dump("que triste");
}
else
{
     $id = $_GET['id'];
     //var_dump($id);
     $productos = json_decode($_POST["json"]);
     $resultado = count($productos->{"data"}); 
     //var_dump($productos->{"data"});
     //var_dump($resultado);
    // echo $resultado;
     //$valor=$productos->{"data"}[0];
     //echo $valor;

     for($u=0;$resultado>$u;$u++)
     {
        
         $valor=$productos->{"data"}[$u];
         echo $valor;
         $sql = "UPDATE productos set id_oferta=? WHERE  nombre_producto = ?";
         $params = array($id, $valor);
       //echo $id;

         Database::executeRow($sql, $params);
     }

}

 ?>
