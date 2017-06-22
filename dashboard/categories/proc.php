<?php


require("../../lib/database.php");



$q=trim($_POST['q']);
$lugar=trim($_POST['lugar']);

if($lugar=="ajax")
{


	$sql = "SELECT * FROM categorias WHERE nombre_categoria LIKE ? ORDER BY nombre_categoria";
	$params = array("%$q%");


	$data = Database::getRows($sql, $params);


?>

<table class='striped' id="mytable">
	<thead>
		<tr>
			<th>NOMBRE</th>
			<th>DESCRIPCIÓN</th>
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
				<td>".$row['nombre_categoria']."</td>
				<td>".$row['descripcion_categoria']."</td>
				<td>
					<a href='save.php?id=".$row['id_categoria']."' class='blue-text'><i class='material-icons'>edit</i></a>
					<a href='delete.php?id=".$row['id_categoria']."' class='red-text'><i class='material-icons'>delete</i></a>
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
    $sql = "SELECT * FROM categorias ORDER BY nombre_categoria";
	$params = null;


	$data = Database::getRows($sql, $params);
?>

<table class='striped' id="mytable">
	<thead>
		<tr>
			<th>NOMBRE</th>
			<th>DESCRIPCIÓN</th>
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
				<td>".$row['nombre_categoria']."</td>
				<td>".$row['descripcion_categoria']."</td>
				<td>
					<a href='save.php?id=".$row['id_categoria']."' class='blue-text'><i class='material-icons'>edit</i></a>
					<a href='delete.php?id=".$row['id_categoria']."' class='red-text'><i class='material-icons'>delete</i></a>
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
