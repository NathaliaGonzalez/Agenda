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
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/sweetalert2.css">
	

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
							<a href="materiahome.php"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i> Materias</a>
						</li>
						<li>
							<a href="../profesores/profesores.php"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Profesores</a>
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
			  <h1 class="text-titles">Sistema<small >  </small></h1>
			  <h3 > <small style="color:white">Elija la carrera de la materia que va a cargar</small> </h3>
			</div>
		</div>
		<div class="full-box text-center" style="padding: 30px 10px;">
			<a href="materia.php?carrera=1&nombrec=Informatica"><article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					INFORMATICA
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-laptop-mac"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box">
						<!--- Contar Registros Administrador en la BD --->
					</p>
					<small></small>
				</div>
			</article></a>
			<a href="materia.php?carrera=2&nombrec=Civil"><article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					CIVIL
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-city"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box">
						<!--- Contar Registros Alumnos en la BD --->
					
					</p>
					<small></small>
				</div>
			</article></a>
			<a href="materia.php?carrera=3&nombrec=Electricidad"><article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					ELECTRICIDAD
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-exposure"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box">
						<!--- Contar Registros Profesores en la BD --->
						
					</p>
					<small></small>
				</div>
			</article></a>
			<a href="materia.php?carrera=4&nombrec=Electronica"><article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					ELECTRONICA
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-battery-flash"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box">
						<!--- Contar Registros Materias en la BD --->
						
					</p>
					<small></small>
				</div>
			</article></a>
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