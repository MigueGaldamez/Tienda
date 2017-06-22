<?php
require("../lib/page.php");
require("../lib/sidenav.php");
Page::header("Tipo Usuario");

sidenav::sidenavf();
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT * FROM tipousuario WHERE descripcion LIKE ? ORDER BY descripcion";
	$params = array("%$search%");
}
else
{
	$sql = "SELECT * FROM tipousuario  ORDER BY descripcion";
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
			<input id='buscar' type='text' name='buscar' onkeyup="loadXMLDocTipeUsers();tipeusersvacios('buscar')" required/>
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
<table class='striped 'id="mytable">
	<thead>
		<tr>
			<th>codigo</th>
			<th>Descripcion</th>
			<th>ACCIÓN</th>
			
		</tr>
	</thead>
	<tbody >

<?php
	foreach($data as $row)
	{
		print("
			<tr>
			
				<td>".$row['id_tipo_usuario']."</td>
				<td>".$row['descripcion']."</td>
			
		    	<td>
					<a href='save.php?id=".$row['id_tipo_usuario']."' class='blue-text'><i class='material-icons'>mode_edit</i></a>
					<a href='delete.php?id=".$row['id_tipo_usuario']."' class='rosado-text'><i class='material-icons'>delete</i></a>
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