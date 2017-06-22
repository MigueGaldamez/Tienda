<?php
require("../lib/page.php");
require("../lib/sidenav.php");
Page::header("Ofertas");
sidenav::sidenavf();
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	
	$sql = "SELECT * FROM ofertas where id_oferta > ? and descripcion_oferta LIKE ? ORDER BY descripcion_oferta";
	$params = array(1,"%$search%");
}
else
{
	$sql = "SELECT * FROM ofertas WHERE id_oferta > ? ORDER BY descripcion_oferta";
	$params = array(1);
}
$data = Database::getRows($sql, $params);
if($data != null)
{
?>

<form method='post'>
	<div class='row'>
		<div class='input-field col s6 m4'>
			<i class='material-icons prefix'>search</i>
			<input id='buscar' type='text' name='buscar'/>
			<label for='buscar'>Buscar</label>
		</div>
		<div class='input-field col s6 m4'>
			<button type='submit' class='btn waves-effect green'><i class='material-icons'>check_circle</i></button> 	
		</div>
		<div class='input-field col s12 m4'>
			<a href='save.php' class='btn waves-effect indigo'><i class='material-icons'>add_circle</i></a>
		</div>
	</div>
</form>
<table class='striped'>
	<thead>
		<tr>
			<th>DESCRIPCION</th>
			<th>DESCUENTO</th>
			<th>FECHA INICIO</th>
	        <th>FECHA FIN</th>
			<th>ACCIÓN</th>
		</tr>
	</thead>
	<tbody>

<?php
	foreach($data as $row)
	{
		$Porciento=($row['descuento'])*100;
		$output="$Porciento %";
		print("
		
			<tr>
				
                 
				<td>".$row['descripcion_oferta']."</td>
				<td>".$output ."</td>
				<td>".$row['fecha_inicio']."</td>
				<td>".$row['fecha_fin']."</td>
				
		");
		
		print("
				
				<td>
					<a href='save.php?id=".$row['id_oferta']."' class='blue-text'><i class='material-icons'>mode_edit</i></a>
					<a href='delete.php?id=".$row['id_oferta']."' class='red-text'><i class='material-icons'>delete</i></a>
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