<?php
require("../lib/page.php");
if(empty($_GET['id'])) 
{
    Page::header("Agregar TipoUsuario");
    $id = null;
    $nombre = null;
    $descripcion = null;
    $precio = null;
    $imagen = null;
    $estado = 1;
    $categoria = null;
}
else
{
    Page::header("Modificar TipoUsuario");
    $id = $_GET['id'];
    $sql = "SELECT * FROM tipousuario WHERE id_tipo_usuario = ?";
    $params = array($id);
    $data = Database::getRow($sql, $params);
    $nombre = $data['descripcion'];
  
}

if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
  	$nombre = $_POST['descripcion'];


    try 
    {
        if($nombre != "")
        {
        
                            if($id == null)
                            {
                                $sql = "INSERT INTO tipousuario(descripcion) VALUES( ?)";
                                $params = array($nombre);
                            }
                            else
                            {
                                $sql = "UPDATE tipousuario SET descripcion = ? WHERE id_tipo_usuario = ?";
                                $params = array($nombre,  $id);
                            }
                            Database::executeRow($sql, $params);
                            header("location: index.php");
         }
                        
        
        else
        {
            throw new Exception("Debe digitar el nombre");
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
          	<input id='descripcion' type='text' name='descripcion' class='validate' value='<?php print($nombre); ?>' required/>
          	<label for='descripcion'>Nombre</label>
        </div>
        
    </div>
    <div class='row center-align'>
        <a href='index.php' class='btn waves-effect grey'><i class='material-icons'>cancel</i></a>
        <button type='submit' class='btn waves-effect blue'><i class='material-icons'>save</i></button>
    </div>
</form>

<?php
Page::footer();
?>