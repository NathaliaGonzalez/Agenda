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
						<a href="../cerrarsesion.php" onclick="return confirm('Estás seguro que deseas quiere cerrar sesion?')" title="Salir del sistema">
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
						<li>
							<a href="../admin.php"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Administradores</a>
						</li>
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
			<div class="page-header" >
			  <h1 class="text-titles"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> Profesores</h1>
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
		<div class="container-fluid">
			<div id="msg"></div>
			<!-- Mensajes de Verificación -->
			<div id="error" class="alert alert-danger ocultar" role="alert">
				Las Contraseñas no coinciden, vuelve a intentar !
			</div>
			
			<?php 
			
			if(isset($_GET["e"])){
				if($_GET["e"]=="0") {
					echo "<br>";
					echo "<div id='okay' class='alert alert-success ocultar' role='alert' style='display: block;'>
							Se ha registrado correctamente!!
					</div>";
					echo "
					<script>
						setTimeout(function(){
							window.location.replace('profesores-list.php');
						}, 3000);
					</script>
					";		
				}elseif ($_GET["e"]=="1") {
					echo "<div id='okay' class='alert alert-danger ocultar' role='alert' style='display: block;'>
					El correo ya existe, Ingrese un correo nuevo
					</div>";
				}else{
					echo "<div id='okay' class='alert alert-danger ocultar' role='alert' style='display: block;'>
					Este numero de CI ya existe, Ingrese otro numero de Cedula!
					</div>";
				}
			}
			?>
		</div>

		<!-- Panel nuevo administrador -->
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading" style="background: linear-gradient(135deg, #71b7e6,#9b59b6);">
					<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PROFESOR</h3>
				</div>
				<div class="panel-body">
					<form id="#" onsubmit="verificarPasswords(); return false" method="POST" action="insertarprofesores.php" >
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12">
								    	<div class="form-group label-floating">
										  	<label class="control-label">DNI/CEDULA</label>
										  	<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="cin" id="cin" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Nombres *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre" id="nombre" required="" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Apellidos *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido" id="apellido" required="" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Teléfono</label>
										  	<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono" maxlength="15">
										</div>
				    				</div>
									<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Correo</label>
										  	<input class="form-control" type="email" name="correo" id="correo" maxlength="50" required="">
										</div>
				    				</div>
				    			</div>
				    		</div>
				    	</fieldset>
				    	<br>
					    <p class="text-center" style="margin-top: 20px;">
							<input name="ubi" id="ubi" type="hidden" value="<?php
								echo $_GET['ubi'];
							?>">
							<input name="carrera" id="carrera" type="hidden" value="<?php
								echo $_GET['carrera'];
							?>">
							<input name="nombrec" id="nombrec" type="hidden" value="<?php
								echo $_GET['nombrec'];
							?>">
							<input name="materia" id="materia" type="hidden" value="<?php
								echo $_GET['nombre'];
							?>">
							<input name="semestres" id="semestres" type="hidden" value="<?php
								echo $_GET['semestres'];
							?>">
					    	<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy" id="registrar"></i> Guardar</button>
					    </p>
				    </form>
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
	<script>
		nombre.addEventListener('input', sololetras);
		apellido.addEventListener('input', sololetras);
		function sololetras(e) {
			let value = e.target.value;
			e.target.value = value.replace(/[^A-Za-z ]/g, "");
		}
		document.getElementById("cin").addEventListener("input", (e) => {
			let value = e.target.value;
			e.target.value = value.replace(/[^0-9A-Za-z--]/g, "");
		}); 

		function verificarPasswords() {
			pass1 = document.getElementById('contra');
			pass2 = document.getElementById('contra2');
				// Verificamos si las constraseñas no coinciden 
			if (pass1.value != pass2.value) {
			
				// Si las constraseñas no coinciden mostramos un mensaje 
				document.getElementById("error").classList.add("mostrar");

				return false;
			} else {

				// Si las contraseñas coinciden ocultamos el mensaje de error
				document.getElementById("error").classList.remove("mostrar");

			// Mostramos un mensaje mencionando que las Contraseñas coinciden 
				document.getElementById("ok").classList.remove("ocultar");

			// Desabilitamos el botón de login 
				document.getElementById("registrar").disabled = true;

			// Refrescamos la página (Simulación de envío del formulario)
			setTimeout(function() {
				document.getElementById("#").submit();
			}, 3000); 
				

				return true;
			}
		}     

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