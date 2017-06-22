<?php


require("../../lib/database.php");





$q=trim($_POST['q']);
$lugar=trim($_POST['lugar']);

if($lugar=="ajax")
{

	$sql = "SELECT * FROM tipousuario WHERE descripcion LIKE '".$q."%' ORDER BY descripcion";

	$params = array("%$q%");


	$data = Database::getRows($sql, $params);


?>

<table class='striped' id="mytable">
	<thead>
		<tr>
			<th>codigo</th>
			<th>Descripcion</th>
			<th>ACCIÓN</th
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
			
				<td>".$row['id_tipo_usuario']."</td>
				<td>".$row['descripcion']."</td>
			
		    	<td>
					<a href='save.php?id=".$row['id_tipo_usuario']."' class='blue-text'><i class='material-icons'>mode_edit</i></a>
					<a href='delete.php?id=".$row['id_tipo_usuario']."' class='red-text'><i class='material-icons'>delete</i></a>
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
$sql = "SELECT * FROM tipousuario  ORDER BY id_tipo_usuario";
	$params = null;


	$data = Database::getRows($sql, $params);
?>

<table class='striped' id="mytable">
	<thead>
		<tr>
			<th>codigo</th>
			<th>Descripcion</th>
			<th>ACCIÓN</th
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
			
				<td>".$row['id_tipo_usuario']."</td>
				<td>".$row['descripcion']."</td>
			
		    	<td>
					<a href='save.php?id=".$row['id_tipo_usuario']."' class='blue-text'><i class='material-icons'>mode_edit</i></a>
					<a href='delete.php?id=".$row['id_tipo_usuario']."' class='red-text'><i class='material-icons'>delete</i></a>
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
