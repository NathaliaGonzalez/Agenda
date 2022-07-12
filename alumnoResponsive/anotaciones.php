<?php 
	session_start();
	if(isset($_SESSION["id"])&& isset($_SESSION["Correo"])&& isset($_SESSION["Nombre"])&& isset($_SESSION["Apellido"])
    ){
		$idalumno = $_SESSION["id"];
        $nombres = explode(" ", $_SESSION["Nombre"]);
        $apellidos = explode(" ", $_SESSION["Apellido"]);

 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../adminResponsive/css/main.css">
	<link rel="stylesheet" href="horarios.css">
	<script src="components/jquery/jquery.min.js"></script>
	
	
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
			  <h1 class="text-titles" style="color: black">Mis anotaciones<small></small></h1>
			</div>

			<input type="hidden" id="alumno" name="alumno" value="<?php  echo $idalumno;  ?>">
			
			<div class="container">
				<div class="row" style="display: flex;
					flex-direction: row;
					flex-wrap: wrap;" id="anotaciones">
					<div class="col-lg-4">
						<div class="card card-margin">
							<div class="card-header no-border">
								<?php date_default_timezone_set("America/Manaus")?>
								<h5>FECHA:   <?php echo date('d-m-Y')?></h5>
								<input type="hidden" name="fecha" id="fecha" value="<?php echo date('d-m-Y')?>">
							</div>
							<div class="card-body pt-0">
								<div class="widget-49">
									<div class="widget-49-title-wrapper">
											<div class="widget-49-meeting-info">
												<span class="widget-49-meeting-time">HORA:  <?php echo date('H:i:s')?></span>
												<input type="hidden" name="hora" id="hora" value="<?php echo date('H:i:s')?>">
											</div>
										</div>
									</div>
									<textarea name="" id="descripcion" cols="30" rows="10" placeholder="Escriba aqui su anotaciones" style="border: none; resize: none;"></textarea>
									<button style="border-radius: 50%;" title="Guardar" onclick="Guardar()"><i class="zmdi zmdi-check"></i></button>	
									<script>
										function alertaeliminar(anotacion){
											Swal.fire({
												title: 'Estas seguro?',
												text: "Esto eliminara permanentemente su anotación!",
												icon: 'warning',
												showCancelButton: true,
												confirmButtonColor: '#3085d6',
												cancelButtonColor: '#d33',
												confirmButtonText: 'Si, borrar!'
												}).then((result) => {
												if (result.isConfirmed) {
													eliminarhorario(anotacion);
													
												}
											})
										}
										function eliminarhorario(idanotacion) {
												
												
												var anotacion=idanotacion;
												
												
												$.ajax({
													url : 'eliminaranotaciones.php',
													type : 'POST',
													dataType : 'html',
													data : {anotacion: anotacion},
												})
												.done(function(resultado) {
													Swal.fire(
													'Borrado!',
													'Se ha eliminado con exito.',
													'success'
													);
													setTimeout(function(){
														location.reload()
													},1000);
												})
												
											}
									</script>
								</div>
							</div>
					</div>
				</div>
			</div>

			<!-- Final de los horarios-->
		</div>
		
			
		
	</section>
	<!--====== Scripts -->

	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
<script>
	listaanotaciones();

	function Guardar() {
		var alumno=$('#alumno').val();
		var descripcion= $('#descripcion').val();
		var fecha=$('#fecha').val();
		var hora=$('#hora').val();
		
		$.ajax({
			url : 'registraranotaciones.php',
			type : 'POST',
			dataType : 'html',
			data : {alumno: alumno, descripcion: descripcion,fecha: fecha,hora: hora},
		})
		.done(function(resultado) {
			document.getElementById("anotaciones").innerHTML += resultado;
			
		});
		
	}
	function listaanotaciones() {
		var alumno=$('#alumno').val();
		
		$.ajax({
			url : 'listarnotaciones.php',
			type : 'POST',
			dataType : 'html',
			data : {alumno: alumno},
		})
		.done(function(resultado) {
			document.getElementById("anotaciones").innerHTML += resultado;
			
		});
		
	}
</script>
