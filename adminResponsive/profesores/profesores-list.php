<?php 
	session_start();
	if(isset($_SESSION["Correo"])&& isset($_SESSION["Nombre"])&& isset($_SESSION["Apellido"])
    ){
        $nombres = explode(" ", $_SESSION["Nombre"]);
        $apellidos = explode(" ", $_SESSION["Apellido"]);

 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/main.css">
</head>
<body>
	<!-- SideBar -->
	<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				AGENDA FCYT <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
			</div>
			<!-- SideBar User info -->
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
					<img src="../assets/avatars/AdminMaleAvatar.png" alt="UserIcon">
					<figcaption class="text-center text-titles">
						<?php
							echo $nombres[0]." ".$apellidos[0];
						?>
					</figcaption>
				</figure>
				<ul class="full-box list-unstyled text-center">
					<li>
						<a href="../my-data.php" title="Mis datos">
							<i class="zmdi zmdi-account-circle"></i>
						</a>
					</li>
					<li>
						<a href="../my-account.php" title="Mi cuenta">
							<i class="zmdi zmdi-settings"></i>
						</a>
					</li>
					<li>
						<a href="../../cerrarsesion.php" onclick="return confirm('Estás seguro que deseas quiere cerrar sesion?')" title="Salir del sistema">
							<i class="zmdi zmdi-power"></i>
						</a>
					</li>
				</ul>
			</div>
			<!-- SideBar Menu -->
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				<li>
					<a href="../home.php">
						<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Inicio
					</a>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-case zmdi-hc-fw"></i> Administración <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="../horarios/horariofinal.php"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Horarios de Examenes Finales</a>
						</li>
						<li>
							<a href="../horarios/horario-list.php"><i class="zmdi zmdi-watch zmdi-hc-fw"></i> Horario de Clases</a>
						</li>
						<li>
							<a href="../materias/materiahome.php"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i> Materias</a>
						</li>
						<li>
							<a href="profesores.php"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Profesores</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Usuarios <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
					<?php
							if ($_SESSION["rol"]=="primario") {
								echo '<li>
								<a href="../admin.php"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Administradores</a>
								</li>';
								
							}
						?>
						<li>
							<a href="../alumno.php"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Alumnos</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</section>

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		<nav class="full-box dashboard-Navbar">
			<ul class="full-box list-unstyled text-right" style="background: linear-gradient(135deg, #71b7e6,#9b59b6);">
				<li class="pull-left">
					<a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
				</li>
			</ul>
		</nav>
		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i>PROFESOR</h1>
			</div>
		</div>

		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
			  		<a href="profesores.php" class="btn btn-info" style="color: white;">
			  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PROFESOR
			  		</a>
			  	</li>
			  	<li>
			  		<a href="profesores-list.php" class="btn btn-success" style="color: white;">
			  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PROFESORES
			  		</a>
			  	</li>
			  	<li>
			  		<a href="profesores-search.php" class="btn btn-primary" style="color: white;">
			  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR PROFESOR
			  		</a>
			  	</li>
			</ul>
		</div>
		
		
		<!-- Panel listado de administradores -->
		<div class="container-fluid">
			<div class="panel panel-success">
				<div class="panel-heading" style="background: linear-gradient(135deg, #71b7e6,#9b59b6);">
					<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PROFESORES</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover text-center">
							<?php
								//$correo = $_GET['correo'];
								//01-conectar
								require("../../conexion.php");
								//02-generar instruccion SQL
								$sql = "SELECT * FROM profesores;";
								mysqli_set_charset( $con, 'utf8');
								//03-ejecutar SQL (matriz de resultado)
								$res = mysqli_query($con,$sql);
								//04-procesa el resultado
								if(mysqli_num_rows($res)>0){
									//recorrer cada fila de la matriz
									echo "<thead>";
									echo "<tr>";
									echo "<th class='text-center'>#</th>";
									echo "<th class='text-center'>CIN</th>";
									echo "<th class='text-center'>NOMBRES</th>";
									echo "<th class='text-center'>APELLIDOS</th>";
									echo "<th class='text-center'>TELÉFONO</th>";
									echo "<th class='text-center'>CORREO</th>";
									echo "<th class='text-center'>A. DATOS</th>";
									echo "<th class='text-center'>ELIMINAR</th>";
									
									echo "</tr>";
									echo "</thead>";
									while($reg=mysqli_fetch_array($res)){
										echo"<tbody>";
										echo "<tr>
										<td>".$reg["idprofesores"]."</td>
										<td>".$reg["cin"]."</td>
										<td>".$reg["nombre"]."</td>
										<td>".$reg["apellido"]."</td>
										<td>".$reg["telefono"]."</td>
										<td>".$reg["correo"]."</td>
										<td>
										<a href='actualizarprofesores.php?idprofesores=".$reg["idprofesores"]."' class='btn btn-success btn-raised btn-xs'>
											<i class='zmdi zmdi-refresh'></i>
										</a></td>
										<td>
										<form>
											<a href='eliminarprofesores.php?idprofesores=".$reg["idprofesores"]."'"

									   
									

									?>
                                                
										onclick="return confirm('Estás seguro que deseas eliminar el registro?')" class='btn btn-danger btn-raised btn-xs'>
										<i class='zmdi zmdi-delete'></i>
										</a>
											
										</form></td>
										</tr>
										</tbody>
							
										<?php
									}
									//liberamos la variable(solo con sentencia SQL de tipo select)
									mysqli_free_result($res);
								}
								//05-cerramos la conexión
								
								mysqli_close($con);
							?> 
							
						</table>

						
						
					</div>
					<nav class="text-center">
						<ul class="pagination pagination-sm">
							<li class="disabled"><a href="javascript:void(0)">«</a></li>
							<li class="active"><a href="javascript:void(0)">1</a></li>
							<li><a href="javascript:void(0)">2</a></li>
							<li><a href="javascript:void(0)">3</a></li>
							<li><a href="javascript:void(0)">4</a></li>
							<li><a href="javascript:void(0)">5</a></li>
							<li><a href="javascript:void(0)">»</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		
</div>
		
	</section>

	<!--====== Scripts -->
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="../js/sweetalert2.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/material.min.js"></script>
	<script src="../js/ripples.min.js"></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../js/main.js"></script>
	<script>
		$.material.init();
	</script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>
<?php 
	}else{
		echo "La pagina esta protegida...";
        
        echo "
        <script>
            setTimeout(function(){
                window.location.replace('.../loginResponsive/index.php');
            }, 3000);
        </script>
        ";
    
	}	
?>