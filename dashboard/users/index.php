<?php
require("../lib/page.php");
require("../lib/sidenav.php");
Page::header("Usuarios");
sidenav::sidenavf();
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT * FROM usuarios,tipousuario WHERE tipousuario.id_tipo_usuario=usuarios.id_tipo_usuario and apellidos LIKE ? OR nombres LIKE ? ORDER BY apellidos";
	$params = array("%$search%", "%$search%");
}
else
{
	$sql = "SELECT * FROM usuarios,tipousuario WHERE tipousuario.id_tipo_usuario=usuarios.id_tipo_usuario ORDER BY apellidos";
	$params = null;
}
$data = Database::getRows($sql, $params);
if($data != null)
{
?>

<form method='post'>
	<div class='row'>
		<div class='input-field col s6 m4'>
			<i class='material-icons prefix'>search</i>
			<input id='buscar' type='text' name='buscar' onkeyup="loadXMLDocUsers();usersvacios('buscar')" required/>
			
			<label for='buscar'>Buscar</label>
		</div>
		<div class='input-field col s6 m4'>
			<button type='submit' class='btn waves-effect rosado'><i class='material-icons'>check_circle</i></button> 	
		</div>
		<div class='input-field col s12 m4'>
			<a href='save.php' class='btn waves-effect indigo'><i class='material-icons'>add_circle</i></a>
		</div>
	</div>
</form>
<table class='striped' id="mytable">
	<thead>
		<tr>
			<th>IMAGEN</th>
			<th>APELLIDOS</th>
			<th>NOMBRES</th>
			<th>CORREO</th>
			<th>ALIAS</th>
			<th>TIPO USUARIO</th>
			<th>ACCIÓN</th>
		</tr>
	</thead>
	<tbody>

<?php
	foreach($data as $row)
	{
		print("
			<tr>
				<td><img src='data:image/*;base64,".$row['imagen_usuario']."' class='materialboxed' width='100' height='100'></td>
				<td>".$row['apellidos']."</td>
				<td>".$row['nombres']."</td>
				<td>".$row['correo']."</td>
				<td>".$row['alias']."</td>
					<td>".$row['descripcion']."</td>
				<td>
					<a href='save.php?id=".$row['id_usuario']."' class='blue-text'><i class='material-icons'>edit</i></a>
					<a href='delete.php?id=".$row['id_usuario']."' class='red-text'><i class='material-icons'>delete</i></a>
				</td>
			</tr>
		");
	}
	print("
		</tbody>
	</table>
	");
} //Fin de if que comprueba la existencia de registros.
else
{
	Page::showMessage(4, "No hay registros disponibles", "save.php");
}
Page::footer();
?>