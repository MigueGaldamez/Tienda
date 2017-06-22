<?php


require("../../lib/database.php");



$q=trim($_POST['q']);
$lugar=trim($_POST['lugar']);

if($lugar=="ajax")
{


	$sql = "SELECT * FROM usuarios,tipousuario WHERE tipousuario.id_tipo_usuario=usuarios.id_tipo_usuario and apellidos LIKE '".$q."%' OR nombres LIKE '".$q."%' ORDER BY apellidos";
	$params = array("%$q%", "%$q%");


	$data = Database::getRows($sql, $params);


?>

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

	if($data==null){

	echo '<b>No hay sugerencias</b>';


	}else{

	


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
	}
}
else if($lugar=="busquedas")
{
$sql = "SELECT * FROM usuarios,tipousuario WHERE tipousuario.id_tipo_usuario=usuarios.id_tipo_usuario ORDER BY apellidos";
	$params = null;


	$data = Database::getRows($sql, $params);
?>

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

	if($data==null){

	echo '<b>No hay sugerencias</b>';


	}else{



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
	}
}

?>
