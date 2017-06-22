<?php
require("../lib/page.php");
if(empty($_GET['id'])) 
{
    Page::header("Agregar usuario");
    $id = null;
    $nombres = null;
    $apellidos = null;
    $correo = null;
    $alias = null;
    $imagen = null;
    $categoria = null;

   $admin= $_SESSION['id_tipo'];
}
else
{
    Page::header("Modificar usuario");
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM usuarios,tipousuario WHERE tipousuario.id_tipo_usuario=usuarios.id_tipo_usuario and id_usuario=?";
    $params = array($id);
    $data = Database::getRow($sql, $params);
    $nombres = $data['nombres'];
    $apellidos = $data['apellidos'];
    $correo = $data['correo'];
    $alias = $data['alias'];
    $imagen = $data['imagen_usuario'];
    $admin= $_SESSION['id_tipo'];
    $categoria = $data['id_tipo_usuario'];
}

if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
  	$nombres = $_POST['nombres'];
  	$apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $archivo = $_FILES['imagen'];
    $categoria = $_POST['tipousuario'];
  
                          

    try 
    {
      	if($nombres != "" && $apellidos != "")
        {
            if($correo != "")
            {

                 if($archivo['name'] != null)
                    {
                        $base64 = Validator::validateImage($archivo);
                        if($base64 != false)
                        {
                            $imagen = $base64;
                        }
                        else
                        {
                            throw new Exception("Ocurrió un problema con la imagen");
                        }
                    }
                     else
                    {
                        if($imagen == null)
                        {
                            throw new Exception("Debe seleccionar una imagen");
                        }
                    }
                          

                if($id == null)
                {

                    
                    $alias = $_POST['alias'];
                    if($alias != "")
                    {
                        $clave1 = $_POST['clave1'];
                        $clave2 = $_POST['clave2'];
                        if($clave1 != "" && $clave2 != "")
                        {

                          

                            if($clave1 == $clave2)
                            {
                                if($admin==1)
                                {
                                $clave = password_hash($clave1, PASSWORD_DEFAULT);
                                $sql = "INSERT INTO usuarios(nombres, apellidos, correo, alias, clave,	imagen_usuario,id_tipo_usuario) VALUES(?, ?, ?, ?, ?,?,?)";
                                $params = array($nombres, $apellidos, $correo, $alias, $clave,$imagen,$categoria);

                                }
                                else 
                                {
                                      $clave = password_hash($clave1, PASSWORD_DEFAULT);
                                $sql = "INSERT INTO usuarios(nombres, apellidos, correo, alias, clave,	imagen_usuario) VALUES(?, ?, ?, ?, ?,?)";
                                $params = array($nombres, $apellidos, $correo, $alias, $clave,$imagen);
                                }
                            }
                            else
                            {
                                throw new Exception("Las contraseñas no coinciden");
                            }
                        }
                        else
                        {
                            throw new Exception("Debe ingresar ambas contraseñas");
                        }
                    }
                    else
                    {
                        throw new Exception("Debe ingresar un alias");
                    }
                }
                else
                {
                    if($admin!=1)
                    {
                    $sql = "UPDATE usuarios SET nombres = ?, apellidos = ?, correo = ? ,imagen_usuario=? WHERE id_usuario = ?";
                    $params = array($nombres, $apellidos, $correo,$imagen, $id);
                    }
                    else
                    {
                         $sql = "UPDATE usuarios SET nombres = ?, apellidos = ?, correo = ? ,imagen_usuario=?,id_tipo_usuario=? WHERE id_usuario = ?";
                    $params = array($nombres, $apellidos, $correo,$imagen,$categoria, $id);
                    }               
                }
                Database::executeRow($sql, $params);
                header("location: index.php");
            }
            else
            {
                throw new Exception("Debe ingresar un correo electrónico");
            }
        }
        else
        {
            throw new Exception("Debe ingresar el nombre completo");
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
          	<i class='material-icons prefix'>person</i>
          	<input id='nombres' type='text' name='nombres' class='validate' value='<?php print($nombres); ?>' required/>
          	<label for='nombres'>Nombres</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>person</i>
            <input id='apellidos' type='text' name='apellidos' class='validate' value='<?php print($apellidos); ?>' required/>
            <label for='apellidos'>Apellidos</label>
        </div>
    </div>
    <div class='row'>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>email</i>
            <input id='correo' type='email' name='correo' class='validate' value='<?php print($correo); ?>' required/>
            <label for='correo'>Correo</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>person_pin</i>
            <input id='alias' type='text' name='alias' class='validate' <?php print("value='$alias' "); print(($id == null)?"required":"disabled"); ?>/>
            <label for='alias'>Alias</label>
        </div>

        	<div class='file-field input-field col s12 m6'>
            <div class='btn waves-effect'>
                <span><i class='material-icons'>image</i></span>
                <input type='file' name='imagen' <?php print(($imagen == null)?"required":""); ?>/>
            </div>
            <div class='file-path-wrapper'>
                <input class='file-path validate' type='text' placeholder='Seleccione una imagen'/>
            </div>
        </div>

        
    </div>
 

    <?php
    if($id == null)
    {
    ?>
    
    <div class='row'>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>security</i>
            <input id='clave1' type='password' name='clave1' class='validate' required/>
            <label for='clave1'>Contraseña</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>security</i>
            <input id='clave2' type='password' name='clave2' class='validate' required/>
            <label for='clave2'>Confirmar contraseña</label>
        </div>
    </div>
    <?php
    }
    
    ?>
    <?php
    if($admin == 1)
    {
    ?>
    <div class="row">
    <div class='input-field col s12 m6'>
            <?php
            $sql = "SELECT id_tipo_usuario, descripcion FROM tipousuario";
            Page::setCombo("tipousuario", "tipousuario", $categoria, $sql);
            ?>
        </div>
       <?php
    }
    
    ?>
    </div>
    <div class='row center-align'>
        <a href='index.php' class='btn waves-effect grey'><i class='material-icons'>cancel</i></a>
        <button type='submit' class='btn waves-effect blue'><i class='material-icons'>save</i></button>
    </div>
</form>

<?php
Page::footer();
?>