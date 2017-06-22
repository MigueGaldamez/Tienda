<?php


require("../../lib/database.php");



$q=trim($_POST['q']);
$lugar=trim($_POST['lugar']);

if($lugar=="ajax")
{

    $sql = "SELECT * FROM clientes WHERE  nombre_cliente LIKE '".$q."%' OR apellido_cliente LIKE '".$q."%' ORDER BY apellido_cliente";
	
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
			<th>TELEFONO</th>
			<th>DIRECCION</th>
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
				<td><img src='data:image/*;base64,".$row['imagen_cliente']."' class='materialboxed' width='100' height='100'></td>
				<td>".$row['apellido_cliente']."</td>
				<td>".$row['nombre_cliente']."</td>
				<td>".$row['correo_cliente']."</td>
				<td>".$row['alias_cliente']."</td>
					<td>".$row['telefono_cliente']."</td>
					<td>".$row['direccion_cliente']."</td>
				<td>
					<a href='save.php?id=".$row['id_cliente']."' class='blue-text'><i class='material-icons'>edit</i></a>
					<a href='delete.php?id=".$row['id_cliente']."' class='red-text'><i class='material-icons'>delete</i></a>
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
    $sql = "SELECT * FROM clientes  ORDER BY apellido_cliente";
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
			<th>TELEFONO</th>
			<th>DIRECCION</th>
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
				<td><img src='data:image/*;base64,".$row['imagen_cliente']."' class='materialboxed' width='100' height='100'></td>
				<td>".$row['apellido_cliente']."</td>
				<td>".$row['nombre_cliente']."</td>
				<td>".$row['correo_cliente']."</td>
				<td>".$row['alias_cliente']."</td>
					<td>".$row['telefono_cliente']."</td>
					<td>".$row['direccion_cliente']."</td>
				<td>
					<a href='save.php?id=".$row['id_cliente']."' class='blue-text'><i class='material-icons'>edit</i></a>
					<a href='delete.php?id=".$row['id_cliente']."' class='red-text'><i class='material-icons'>delete</i></a>
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
