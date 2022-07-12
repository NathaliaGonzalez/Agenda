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
	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" href="horarios.css">
	<script src="components/jquery/jquery.min.js"></script>
	<link href='lib/main.css' rel='stylesheet' />
    <script src='lib/main.js'></script>
	
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
			  <h1 class="text-titles" style="color: black">Horarios de Examen Final<small></small></h1>
			</div>

			<input type="hidden" id="alumno" id="alumno" name="alumno" value="<?php  echo $idalumno;  ?>">
			
			<div class="container">
                <div class="row" style="display: flex;
                        flex-direction: row;
                        flex-wrap: wrap;">
                <?php 
                    //01-conectar
					require("../conexion.php");
                    $sql = "SELECT alum.idAlumnos,hor.*,mat.nombre,concat(prof.nombre,' ',prof.apellido) as profesor FROM alumnos alum 
                    inner join e_final hor on alum.dSemestre = hor.idSemestre and alum.idcarreras = hor.idcarreras
                    INNER JOIN materias mat on mat.idmaterias = hor.idmaterias 
                    INNER JOIN profesores prof ON prof.idprofesores = hor.idprofesores where idAlumnos=$idalumno order by hor.fecha asc";
                    mysqli_set_charset( $con, 'utf8');
                    $res = mysqli_query($con, $sql);
                    if(mysqli_num_rows($res)>0){
                    while($REG = mysqli_fetch_array($res)){ 
                        echo "
                        <div class='col-lg-4'>
                               <div class='card card-margin'>
                                    <div class='card-header no-border'>
                                        <h5 class='card-title'>
                                            ".$REG['fecha']."
                                        </h5>
                                    </div>
                                <div class='widget-49'>
                                <div class='widget-49-title-wrapper'>
                                    <div class='widget-49-meeting-info'>
                                        <span class='widget-49-pro-title'>".$REG['nombre'].".</span>
                                        <span class='widget-49-meeting-time'>".substr($REG['horario'],0,-3)." Hrs</span>
                                    </div>
                                </div>
                                <ol class='widget-49-meeting-points' style='list-style-type: none;'>
                                    <li class='widget-49-meeting-item'><span>Profesor: ".$REG['profesor']."</span></li>
                                    <li class='widget-49-meeting-item'><span>Aula: ".$REG['aula']."</span></li>
                                    
                                </ol>
                                
                            </div>
                        </div>
                        </div>
                        
                            
                        
                        ";
                    }mysqli_free_result($res);
                }
                //05-cerramos la conexión
                
                mysqli_close($con);
            ?> 
                </div>
			</div>





			<!-- Final de los horarios-->
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="consultahorario.js"></script>


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