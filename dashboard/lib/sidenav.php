<?php
class sidenav{

	public static function sidenavf()
	{
		
	
		
		if(isset($_SESSION['nombre_usuario']))
		{
			print("
				
				
			
			    <ul id='slide-out2' class='side-nav'>
						<li><div class='userView'>
						<div class='background'>
							
						</div>
						
	           ");

							    $q=trim($_SESSION['user']);
								$q2=trim($_SESSION['apellidos']);
						
								$sql = "SELECT * FROM usuarios WHERE nombres =? AND apellidos=? ";
								$params = array($q,$q2);


								$data = Database::getRow($sql, $params);
						
               print("
			            <a class='center-align' href='#!user'>	<img src='data:image/*;base64,".$data['imagen_usuario']."' class='materialboxed circle' width='100' height='100'></a>
						<a class='dropdown-button' href='#' ><i class='material-icons left'>verified_user</i>".$_SESSION['nombre_usuario']."</a>
						<a href='#!email'><span class='white-text email'>jdandturk@gmail.com</span></a>
						</div></li>
						<li><a class='subheader'>Cosas importantes</a></li>
						<li><a href='../products/'><i class='material-icons'>shop</i>Productos</a></li>
					<li><a href='../categories/'><i class='material-icons'>shop_two</i>Categorías</a></li>
					<li><a href='../users/'><i class='material-icons'>group</i>Usuarios</a></li>
					<li><a href='../tipeusers/'><i class='material-icons left'>group</i>Tipo Usuarios</a></li>
						<li><div class='divider'></div></li>
						<li><a class='subheader'>Cosas menos importantes</a></li>
						<li><a class='waves-effect' href='#!'>Third Link With Waves</a></li>
 			    </ul>
             
					
				
		
			");
		}
		
	}
}
?>