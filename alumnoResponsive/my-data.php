<?php
	session_start();

	$correo=$_SESSION["Correo"];

	include_once("../conexion.php");

	$sql="select * from alumnos where correo='$correo'";
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
	<title>Mis Datos</title>
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
						<?php echo $reg["Nombre"]. " ".$reg["Apellido"]; ?>
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
						<i class="zmdi zmdi-case zmdi-hc-fw"></i>Horarios <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="horarioclases.php"><i class="zmdi zmdi-watch zmdi-hc-fw"></i> Horario de Clases</a>
						</li>
						<li>
							<a href="horariofinal.php"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Horarios de Examenes Finales</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="anotaciones.php">
						<i class="zmdi zmdi-edit"></i> Notas
					</a>
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
			  <h1 class="text-titles"><i class="zmdi zmdi-account-circle zmdi-hc-fw"></i> MIS DATOS</small></h1>
			</div>
		</div>

		<!-- Panel mis datos -->
		<div class="container-fluid">
			<div class="panel panel-success">
				<div class="panel-heading" style="background: linear-gradient(135deg, #71b7e6,#9b59b6);">
					<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; MIS DATOS</h3>
				</div>
				<div class="panel-body">
					<form action="updatealumno.php" method="POST" >
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12">
								    	<div class="form-group label-floating">
										  	<label class="control-label">DNI/CEDULA *</label>
										  	<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="cin" id="cin" required="" maxlength="30"
											 value="<?php echo $reg["CIN"]; ?>" 
											 disabled >
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Nombres *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre" id="nombre" required="" maxlength="30" 
											value="<?php echo $reg["Nombre"]; ?>">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Apellidos *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido" id="nombre" required="" maxlength="30"
											  value="<?php echo $reg["Apellido"]; ?>">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Teléfono</label>
										  	<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono" maxlength="15"
											  value="<?php echo $reg["Telefono"]; ?>">
										</div>
				    				</div>
				    				<div class="col-xs-12">
										<div class="form-group label-floating">
										  	<label class="control-label">Dirección</label>
										  	<textarea name="direccion" class="form-control" rows="2" maxlength="100" value=""><?php echo $reg["Direccion"]; ?></textarea>
										</div>
				    				</div>
									<div class="col-xs-12 col-sm-6">
									<span class=details>Carrera</span>
										<select name="carreras" id="carreras"  disabled >
											<option value="" disabled selected>Seleccione una carrera* </option>
											<?php
												require("../conexion.php");
												//02-generar instruccion SQL
												$sql = "SELECT * from carreras";
												mysqli_set_charset( $con, 'utf8');
												//03-ejecutar SQL (matriz de resultado)
												$res1 = mysqli_query($con,$sql);
											
                                                while($reg2=mysqli_fetch_array($res1)){
                                                    if ($reg2["idcarreras"] == $reg["idcarreras"]) {
                                                        echo "<option selected='' value='".$reg2["idcarreras"]."'>".$reg2["nombre"]."</option>";
                                                    }else {
                                                        echo "<option value='".$reg2["idcarreras"]."'>".$reg2["nombre"]."</option>";
                                                    };

                                                    
                                                };
                                            ?>
											<?php

                                    	?>
										</select>
										</div>
										<div class="col-xs-12 col-sm-6">
											<span class=details>Semestre</span>
												<select name="semestres" id="semestres" required>
													<option value="" disabled selected>Seleccione una carrera*</option>
													<?php 
															
															//02-generar instruccion SQL
															$sql = "SELECT * from semestre";
															
															//03-ejecutar SQL (matriz de resultado)
															$res1 = mysqli_query($con,$sql);
															//04-procesa el resultado
															while($reg2=mysqli_fetch_array($res1)){
																if ($reg2["idSemestre"] == $reg["dSemestre"]) {
																	echo "<option selected='' value='".$reg2["idSemestre"]."'>".$reg2["semestre"]."</option>";
																}else {
																	echo "<option value='".$reg2["idSemestre"]."'>".$reg2["semestre"]."</option>";
																};
			
																
															};
														
													?> 
												</select>

										</div>
										<input type="hidden" name="idAlumnos" value="<?php echo $reg["idAlumnos"]; ?>">
				    			</div>
				    		</div>
				    	</fieldset>
					    <p class="text-center" style="margin-top: 20px;">
					    	<button type="submit" class="btn btn-success btn-raised btn-sm" id="btn"><i class="zmdi zmdi-refresh"></i> Actualizar</button>
					    </p>
						<?php 
						if(isset($_GET["e"])){
							if($_GET["e"]=="1") {
								echo "<br>";
								echo "<i>Se ha modificado exitosamente! Se actualizaran los datos...</i>";
								echo "
								<script>
									setTimeout(function(){
										window.location.replace('../alumnoResponsive/my-data.php');
									}, 4000);
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
		$.material.init();
	</script>
	<script>
		nombre.addEventListener('input', sololetras);
		apellido.addEventListener('input', sololetras);
		function sololetras(e) {
			let value = e.target.value;
			e.target.value = value.replace(/[^A-Za-z ]/g, "");
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
                window.location.replace('../loginResponsive/index.php');
            }, 3000);
        </script>
        ";
    
	}	
?>