<?php
require("../lib/page.php");
if(empty($_GET['id'])) 
{
    Page::header("Agregar Oferta");
    $id = null;
    
    $descripcion = null;
    $descuento = null;
    $imagen = null;
    $fechainicio = null;
    $fechafin = null;
    $registros=null;
}
else
{
    Page::header("Modificar Oferta");
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM ofertas WHERE id_oferta = ?";
    $params = array($id);
    $data = Database::getRow($sql, $params);
    
    $descripcion = $data['descripcion_oferta'];
    $descuento = $data['descuento'];
   // $imagen = $data['imagen_oferta'];????
    $fechainicio = $data['fecha_inicio'];
    $fechafin = $data['fecha_fin'];
}

if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
  	$descripcion = $_POST['descripcion'];
    $descuento = $_POST['descuento'];
    //$archivo = $_FILES['imagen'];??
    $fechainicio = $_POST['datepickerinicio'];
    $fechafin = $_POST['datepickerfin'];
    $proc=0;


    try 
    {
        if($descripcion != "")
        {
             
            if($descuento != "")
            {
                if($fechainicio != null)
                {
                    if($fechafin != null)
                    {
                        
                           
                            if($id == null)
                            {
                                $sql = "INSERT INTO ofertas(descripcion_oferta,fecha_inicio, fecha_fin,descuento) VALUES (?,?,?,?)";
                                $params = array($descripcion, $fechainicio, $fechafin,$descuento);

                                $proc=1;
                                
                            }
                            else
                            {
                                $sql = "UPDATE ofertas SET descripcion_oferta= ?, fecha_inicio = ?, fecha_fin = ?, descuento = ?  WHERE id_oferta = ?";
                                $params = array($descripcion, $fechainicio, $fechafin,$descuento, $id);
                                $proc=1;
                            }
                            Database::executeRow($sql, $params);

                            $sql2 = "SELECT id_oferta FROM ofertas WHERE descripcion_oferta = ?";
                            $params2 = array($descripcion);
                            $data2 = Database::getRow($sql2, $params2);
                           
                            $id= $data2['id_oferta'];
                            //header("location: index.php");
                            Page::showMessage(2,$data2['id_oferta'] , null); 
                            ?>
                            
                           <script language="JavaScript" type="text/javascript">guardarlala('<?php print($id)?>');</script>;
                            <?php
                    }
                    else
                    {
                        throw new Exception("Debe seleccionar una fecha de finalizacion");
                    }
                }
                else
                {
                    throw new Exception("Debe seleccionar una fecha de inicio");
                }
            }
            else
            {
                throw new Exception("Debe ingresar el descuento");
            }
        }
        else
        {
            throw new Exception("Debe digitar una descripcion");
        }
    }
    catch (Exception $error)
    {
        Page::showMessage(2, $error->getMessage(), null);
    }
}
?>

<form method='post' enctype='multipart/form-data'>
    <div class='row'>
        <div class='input-field col s12 m6'>
          	<i class='material-icons prefix'>note_add</i>
          	<input id='descripcion' type='text' name='descripcion' class='validate' value='<?php print($descripcion); ?>' required/>
          	<label for='descripcion'>Descripción</label>
        </div>

        <div class='input-field col s12 m6'>
            <label for='datepickerinicio'   >Fecha inicio </label>    
            <input type="text" id="datepickerinicio" name="datepickerinicio" class="validate" value='<?php print($fechainicio); ?>' required />
        </div>
        <div class='input-field col s12 m6'>
          	<i class='material-icons prefix'>shopping_cart</i>
               
          	 <label for='datepickerfin'  >Fecha FIn </label>    
            <input type="text" id="datepickerfin"  name="datepickerfin" value='<?php print($fechafin); ?>' required />
        </div>
         
        <div class='input-field col s12 m6'>
            <?php
            
            $sql = "SELECT id_producto, nombre_producto FROM productos";

            Page::setCombo("productos","productos", NULL, $sql);
            ?>
        </div>
        <div class='input-field col s12 m6'>
          	<i class='material-icons prefix'>note_add</i>
          	<input id='descuento' type='number' name='descuento' step='any' max='100.00' min='0.01' class='validate' value='<?php print($descuento); ?>' required/>
          	<label for='descuento'>Descripción</label>
        </div>
         <div  class='input-field col s12 m6'>
          
<?php
    $sql3 = "SELECT * FROM productos WHERE id_oferta = ? ORDER BY nombre_producto";
	$params3 = array($id);
    $data3 = Database::getRows($sql3, $params3);

    $sql4 = "SELECT count(*) AS cantidad FROM productos WHERE id_oferta = ? ORDER BY nombre_producto";
	$params4 = array($id);
    $data4 = Database::getRow($sql4, $params4);
    $Cantidad =$data4["cantidad"];

  
?>
              <input type='hidden' name='proc' id='proc' value='<?php print($proc); ?>'/>
              <input type="button" value="sera?" onclick="guardarlala('<?php print($id);?>')"/>
            
            <input type="button" value="Add item to list" onclick="appendToList()"/>
          	<div >
                <table class='striped' id='mitablita'>
                    
                    <thead>
                        <tr>
                            <th>DESCRIPCION</th>
                             <th>Quitar</th>
                        </tr>
                    </thead>
                    <tbody id="items">
<?php
  foreach($data3 as $row)
	{
		
		print("
		
			<tr>
				<td>" .$row['nombre_producto']. "</td> <td><a class='red-text'><i class='material-icons'>delete</i></a></td>


               
			</tr>
		");
       

	}
      
      echo '<script language="JavaScript" type="text/javascript">rojo('.$Cantidad.');</script>';
        
  
       
?>


                	</tbody>
	           </table>
               
              </div>
        </div>
      	
       
    </div>
    <div class='row center-align'>
        <a href='index.php' class='btn waves-effect grey'><i class='material-icons'>cancel</i></a>
        <button type='submit'  class='btn waves-effect blue'><i class='material-icons'>save</i></button>
    </div>
</form>

<?php
Page::footer();
?>