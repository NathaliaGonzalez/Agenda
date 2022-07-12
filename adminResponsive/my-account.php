<?php
	session_start();

	$correo=$_SESSION["Correo"];

	include_once("../conexion.php");

	$sql="select * from administrador where correo='$correo'";
        mysqli_set_charset( $con, 'utf8');
	$res=mysqli_query($con,$sql);

	$reg=mysqli_fetch_array($res);
	//echo "<script>console.log('".$reg["cin"]."')</script>";
	if(isset($_SESSION["Correo"])&& isset($_SESSION["Nombre"])&& isset($_SESSION["Apellido"])
    ){
        $nombres = explode(" ", $_SESSION["Nombre"]);
        $apellidos = explode(" ", $_SESSION["Apellido"]);

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Mi Cuenta</title>
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
						<?php echo $reg["nombre"]. " ".$reg["apellido"]; ?>
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
						<?php
							if ($_SESSION["rol"]=="primario") {
								echo '<li>
								<a href="admin.php"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Administradores</a>
								</li>';
								
							}
						?>
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
			  <h1 class="text-titles"><i class="zmdi zmdi-settings zmdi-hc-fw"></i> MI CUENTA</small></h1>
			</div>
		</div>

		<!-- Panel mi cuenta -->
		<div class="container-fluid">
			<div class="panel panel-success">
				<div class="panel-heading" style="background: linear-gradient(135deg, #71b7e6,#9b59b6);">
					<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; MI CUENTA</h3>
				</div>
				<div class="panel-body">
					<form id="#" onsubmit="verificarPasswords(); return false" method="POST" action="updateadmin.php">
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-key"></i> &nbsp; Datos de la cuenta</legend>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Correo</label>
										  	<input class="form-control" type="email" name="correo" maxlength="50" value="<?php echo $reg["correo"]; ?>" readonly>
										</div>
				    				</div>
				    			</div>
				    		</div>
				    	</fieldset>
				    	<br>
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-lock"></i> &nbsp; Contraseña</legend>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12">
										<div class="form-group label-floating">
										  	<label class="control-label">Contraseña actual *</label>
										  	<input class="form-control" type="password" name="password-up" required="" maxlength="70" id="actucontra">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Nueva contraseña *</label>
										  	<input class="form-control" type="password" name="contra" required="" minlength="8" maxlength="70" id="ncontra" >
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Repita la nueva contraseña *</label>
										  	<input class="form-control" type="password" name="newPassword2-up" required="" minlength="8" maxlength="70" id="rcontra">
										</div>
				    				</div>
				    			</div>
				    		</div>
				    	</fieldset>
				    	<br>
					    <p class="text-center" style="margin-top: 20px;">
					    	<button type="submit" class="btn btn-success btn-raised btn-sm" id="actualizar"><i class="zmdi zmdi-refresh"></i> Actualizar</button>
					    </p>
						<div id="msg"></div>
						<!-- Mensajes de Verificación -->
						<div id="error" class="alert alert-danger ocultar" role="alert" >
							Las Contraseñas no coinciden, vuelve a intentar !
							
						</div>
						<div id="ok" class="alert alert-success ocultar" role="alert">
							Las Contraseñas coinciden ! 
							Se modificaron correctamente los datos (Se redirigirá al inicio... )
							
						</div>
						<div id="error2" class="alert alert-danger ocultar" role="alert" >
							Las Contraseña actual no coincide con el registro !
						</div>
						<?php 
							if(isset($_GET["e"])){
								if($_GET["e"]=="1") {
									echo "<br>";
									echo "
									<script>
										setTimeout(function(){
											window.location.replace('../adminResponsive/home.php');
										}, 1000);
									</script>
									";
								}
							}
						?>
				    </form>
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
		function verificarPasswords() {
			pass1 = document.getElementById('ncontra');
			pass2 = document.getElementById('rcontra');
			pass3 = document.getElementById('actucontra');
				// Verificamos si las constraseñas no coinciden 
				
			if (pass1.value != pass2.value) {
			
				// Si las constraseñas no coinciden mostramos un mensaje 
				document.getElementById("error").style.display = "block";
				return false;
			} else {

				// Si las contraseñas coinciden ocultamos el mensaje de error
				document.getElementById("error").style.display = "none";

				if (pass3.value == "<?php echo $reg['contra']?>") {
					// Mostramos un mensaje mencionando que las Contraseñas coinciden 
					document.getElementById("ok").style.display = "block";

					// Desabilitamos el botón de login 
						document.getElementById("actualizar").disabled = true;
					
						document.getElementById("error2").style.display = "none";
							

					// Refrescamos la página (Simulación de envío del formulario)
					setTimeout(function() {
						document.getElementById("#").submit();
						console.log("Entro en lafuncion");
					}, 3000); 
				} else {
					document.getElementById("error2").style.display = "block";
					return false;
				}
					return false;
				}
		};

	</script>
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