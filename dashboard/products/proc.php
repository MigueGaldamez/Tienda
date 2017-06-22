<?php


require("../../lib/database.php");



$q=trim($_POST['q']);
$lugar=trim($_POST['lugar']);

if($lugar=="ajax")
{

	$sql = "SELECT * FROM productos, categorias WHERE nombre_producto LIKE '".$q."%' AND productos.id_categoria = categorias.id_categoria  ORDER BY nombre_producto";


	$params = array("%$q%");

	$data = Database::getRows($sql, $params);


?>

<table class='striped' id="mytable">
	<thead>
		<tr>
			<th>IMAGEN</th>
			<th>NOMBRE</th>
			<th>PRECIO ($)</th>
			<th>CATEGORÍA</th>
			<th>ESTADO</th>
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
				<td><img src='data:image/*;base64,".$row['imagen_producto']."' class='materialboxed' width='100' height='100'></td>
				<td>".$row['nombre_producto']."</td>
				<td>".$row['precio_producto']."</td>
				<td>".$row['nombre_categoria']."</td>
				<td>
		");
		if($row['estado_producto'] == 1)
		{
			print("<i class='material-icons'>visibility</i>");
		}
		else
		{
			print("<i class='material-icons'>visibility_off</i>");
		}
		print("
				</td>
				<td>
					<a href='save.php?id=".$row['id_producto']."' class='blue-text'><i class='material-icons'>mode_edit</i></a>
					<a href='delete.php?id=".$row['id_producto']."' class='red-text'><i class='material-icons'>delete</i></a>
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
    $sql = "SELECT * FROM productos, categorias WHERE productos.id_categoria = categorias.id_categoria ORDER BY nombre_producto";
  	$params = null;


	$data = Database::getRows($sql, $params);
?>

<table class='striped' id="mytable">
	<thead>
		<tr>
				<th>IMAGEN</th>
			<th>NOMBRE</th>
			<th>PRECIO ($)</th>
			<th>CATEGORÍA</th>
			<th>ESTADO</th>
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
				<td><img src='data:image/*;base64,".$row['imagen_producto']."' class='materialboxed' width='100' height='100'></td>
				<td>".$row['nombre_producto']."</td>
				<td>".$row['precio_producto']."</td>
				<td>".$row['nombre_categoria']."</td>
				<td>
		");
		if($row['estado_producto'] == 1)
		{
			print("<i class='material-icons'>visibility</i>");
		}
		else
		{
			print("<i class='material-icons'>visibility_off</i>");
		}
		print("
				</td>
				<td>
					<a href='save.php?id=".$row['id_producto']."' class='blue-text'><i class='material-icons'>mode_edit</i></a>
					<a href='delete.php?id=".$row['id_producto']."' class='red-text'><i class='material-icons'>delete</i></a>
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
