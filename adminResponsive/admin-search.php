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
	<link rel="stylesheet" href="./css/main.css">
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
					<img src="./assets/avatars/AdminMaleAvatar.png" alt="UserIcon">
					<figcaption class="text-center text-titles">
						<?php
							echo $nombres[0]." ".$apellidos[0];
						?>
					</figcaption>
				</figure>
				<ul class="full-box list-unstyled text-center">
					<li>
						<a href="my-data.php" title="Mis datos">
							<i class="zmdi zmdi-account-circle"></i>
						</a>
					</li>
					<li>
						<a href="my-account.php" title="Mi cuenta">
							<i class="zmdi zmdi-settings"></i>
						</a>
					</li>
					<li>
						<a href="../cerrarsesion.php" onclick="return confirm('Estás seguro que deseas quiere cerrar sesion?')" title="Salir del sistema">
							<i class="zmdi zmdi-power"></i>
						</a>
					</li>
				</ul>
			</div>
			<!-- SideBar Menu -->
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				<li>
					<a href="home.php">
						<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Inicio
					</a>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-case zmdi-hc-fw"></i> Administración <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="horarios/horariofinal.php"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Horarios de Examenes Finales</a>
						</li>
						<li>
							<a href="horarios/horario-list.php"><i class="zmdi zmdi-watch zmdi-hc-fw"></i> Horario de Clases</a>
						</li>
						<li>
							<a href="materias/materiahome.php"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i> Materias</a>
						</li>
						<li>
							<a href="profesores/profesores.php"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Profesores</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Usuarios <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="admin.php"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Administradores</a>
						</li>
						<li>
							<a href="alumno.php"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Alumnos</a>
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
			  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Usuarios <small>ADMINISTRADORES</small></h1>
			</div>
		</div>

		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
			  		<a href="admin.php" class="btn btn-info" style="color: white;">
			  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO ADMINISTRADOR
			  		</a>
			  	</li>
			  	<li>
			  		<a href="admin-list.php" class="btn btn-success" style="color: white;">
			  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ADMINISTRADORES
			  		</a>
			  	</li>
			  	<li>
			  		<a href="admin-search.php" class="btn btn-primary" style="color: white;">
			  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR ADMINISTRADOR
			  		</a>
			  	</li>
			</ul>
		</div>

		<div class="container-fluid">
			<form class="well">
				<div class="row">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<div class="form-group label-floating">
							<span class="control-label">¿A quién estas buscando?</span>
							<input class="form-control" type="text" name="search_admin_init" required="">
						</div>
					</div>
					<div class="col-xs-12">
						<p class="text-center">
							<button type="submit" name="enviar" class="btn btn-primary btn-raised btn-sm"><i class="zmdi zmdi-search"></i> &nbsp; Buscar</button>
						</p>
					</div>
				</div>
			</form>
		</div>
		
		<!-- Panel listado de busqueda de administradores -->
		<div class="container-fluid">
			<div class="panel panel-primary">
				<div class="panel-heading" style="background: linear-gradient(135deg, #71b7e6,#9b59b6);">
					<h3 class="panel-title"><i class="zmdi zmdi-search"></i> &nbsp; BUSCAR ADMINISTRADOR</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover text-center">
						<?php
								if (isset($_GET['enviar'])) {
									$busqueda = $_GET['search_admin_init'];
									require("../conexion.php");
									$sql= "SELECT idaministrador,nombre,apellido,cin,telefono FROM administrador where nombre LIKE '%$busqueda%';";
                                                                        mysqli_set_charset( $con, 'utf8');
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
										echo "<th class='text-center'>A. DATOS</th>";
										echo "<th class='text-center'>ELIMINAR</th>";
										
										echo "</tr>";
										echo "</thead>";
										while($reg=mysqli_fetch_array($res)){
											echo"<tbody>";
											echo "<tr>
											<td>".$reg["idaministrador"]."</td>
											<td>".$reg["cin"]."</td>
											<td>".$reg["nombre"]."</td>
											<td>".$reg["apellido"]."</td>
											<td>".$reg["telefono"]."</td>
											<td>
											<a href='actualizaradministradores.php?idaministrador=".$reg["idaministrador"]."' class='btn btn-success btn-raised btn-xs'>
												<i class='zmdi zmdi-refresh'></i>
											</a></td>
											<td>
											<form>
												<a href='eliminar.php?codigo=".$reg["idaministrador"]."'" 
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
									mysqli_close($con);
								}
							
								//05-cerramos la conexión
								
								
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
	</section>

	<!--====== Scripts -->
	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>
<?php 
	}else{
		echo "La pagina esta protegida...";
        
        echo "
        <script>
            setTimeout(function(){
                window.location.replace('../loginResponsive/index.php');
            }, 3000);
        </script>
        ";
    
	}	
?>