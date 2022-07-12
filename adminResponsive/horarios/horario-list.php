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
<body >
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
							<a href="horariofinal.php"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Horarios de Examenes Finales</a>
						</li>
						<li>
							<a href="horario-list.php"><i class="zmdi zmdi-watch zmdi-hc-fw"></i> Horario de Clases</a>
						</li>
						<li>
							<a href="../materias/materiahome.php"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i> Materias</a>
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
		<div class="container-fluid" >
			<div class="page-header">
			  <h1 class="text-titles" id="forms"><i class="zmdi zmdi-file-text"></i> HORARIOS
			  
				</h1>
			</div>
		</div>
		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
			  		<a href="#informatica" class="btn btn-info" style="color: white;">
			  			<i class="zmdi zmdi-laptop-mac"></i> &nbsp; MATERIAS DE INFORMATICA
			  		</a>
			  	</li>
			  	<li>
			  		<a href="#civil" class="btn btn-success" style="color: white;">
			  			<i class="zmdi zmdi-city"></i> &nbsp; MATERIAS DE CIVIL
			  		</a>
			  	</li>
			  	<li>
			  		<a href="#electricidad" class="btn btn-primary" style="color: white;">
			  			<i class="zmdi zmdi-exposure"></i> &nbsp; MATERIAS DE ELECTRICIDAD
			  		</a>
			  	</li>
				  <li>
			  		<a href="#electronica" class="btn btn-primary" style="color: white;">
			  			<i class="zmdi zmdi-battery-flash"></i> &nbsp; MATERIAS DE ELECTRONICA
			  		</a>
			  	</li>
				<li>
				  	<a href="../materias/materiahome.php" title="Insertar nueva Materia" class="btn btn-info" style="color: white;">
			  			<i class="zmdi zmdi-plus-circle-o"></i>
			  		</a>
				</li>
			</ul>
		</div>
		
		
		<!-- Panel listado de administradores -->
		<div class="container-fluid">
			<div class="panel panel-success">
				<div class="panel-heading" style="background: linear-gradient(135deg, #71b7e6,#9b59b6);">
					<h3 class="panel-title" id="informatica"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE MATERIAS DE LA CARRERA INFORMATICA</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<input type="search" id="search1" onkeyup="buscarinformatica(this)" name="search1" placeholder="Buscar materias">
						
							<label style="color: black;" for="semestres">Semestre: </label>
							<select  name="semestres" id="semestres" onchange="filtrosemestre(this.value)">
									<option value="">------</option>
									<option value="1">Primer</option>
									<option value="2">Segundo</option>
									<option value="3">Tercero</option>
									<option value="4">Cuatro</option>
									<option value="5">Quinto</option>
									<option value="6">Sexto</option>
									<option value="7">Septimo</option>
									<option value="8">Octavo</option>
									<option value="9">Noveno</option>
									<option value="10">Decimo</option>
							</select>
							<button onclick="alertaeliminar(1);" style="background-color:red; color:white; float: right;" >Reiniciar Horarios Informatica</button>
						
						<section id="matinfor">
							<br>
						<section id="alerta">

						</section>

						<script>
							function alertaeliminar(carrera){
								Swal.fire({
									title: 'Estas seguro?',
									text: "Esto eliminara permanentemente todos los horarios de la carrera!",
									icon: 'warning',
									showCancelButton: true,
									confirmButtonColor: '#3085d6',
									cancelButtonColor: '#d33',
									confirmButtonText: 'Si, borrar todos los horarios!'
									}).then((result) => {
									if (result.isConfirmed) {
										eliminarhorario(carrera);
										
									}
								})
							}
							function eliminarhorario(idcarrera) {
									
									
									var carrera=idcarrera;
									
									
									$.ajax({
										url : 'eliminarhorario.php',
										type : 'POST',
										dataType : 'html',
										data : {carrera: carrera},
									})
									.done(function(resultado) {
										Swal.fire(
										'Borrado!',
										'Los horarios de la carrera han sido reiniciados.',
										'success'
										)setTimeout(function(){
											location.reload()
										},1000);
									})
									
								}
						</script>
						
						
	

						<table class="table table-hover text-center">
							<?php
								//$correo = $_GET['correo'];
								//01-conectar
								require("../../conexion.php");
								//02-generar instruccion SQL
								$sql = "SELECT mat.idmaterias,mat.nombre as materia,mat.idcarreras,mat.idSemestre,mat.idprofesores,carr.nombre as carrera,hor.idhorario_clase,
								hor.h_inicio,hor.h_final,hor.aula,hor.dia,sem.semestre
								 from materias mat inner join carreras carr on carr.idcarreras = mat.idcarreras 
								inner join semestre sem on sem.idSemestre=mat.idSemestre
								left join horario_clase hor on mat.idmaterias=hor.idmaterias where mat.idcarreras=1 order by mat.idmaterias;";

							        mysqli_set_charset( $con, 'utf8');
								
								//03-ejecutar SQL (matriz de resultado)
								$res = mysqli_query($con,$sql);
								

								//04-procesa el resultado
								if(mysqli_num_rows($res)>0){
									//recorrer cada fila de la matriz
									echo "<thead>";
									echo "<tr>";
									echo "<th class='text-center'>#</th>";
									echo "<th class='text-center'>MATERIA</th>";
									echo "<th class='text-center'>CARRERA</th>";
									echo "<th class='text-center'>SEMESTRE</th>";
									echo "<th class='text-center'>DÍA</th>";
									echo "<th class='text-center'>Horario Inicio</th>";
									echo "<th class='text-center'>Horario Final</th>";
									echo "<th class='text-center'>Aula</th>";
									echo "<th class='text-center'>GUARDAR</th>";
									
									echo "</tr>";
									echo "</thead>";
									while($reg=mysqli_fetch_array($res)){
										
										echo"<tbody>";
										echo "<tr>
										<td>".$reg["idmaterias"]."</td>
										<td>".$reg["materia"]."</td>
										<td>".$reg["carrera"]."</td>
										<td>".$reg["semestre"]."</td>
										<td><select  name='dia".$reg["idmaterias"]."' id='dia".$reg["idmaterias"]."'>
											<option value='inicio' >------</option>
											<option value='Lunes' ";
											if($reg['dia'] == 'Lunes'){ echo 'selected'; }
											echo ">Lunes</option>
											<option value='Martes' ";
											if($reg['dia'] == 'Martes'){ echo 'selected'; }
											echo ">Martes</option>
											<option value='Miercoles' ";
											if($reg['dia'] == 'Miercoles'){ echo 'selected'; }
											echo ">Miércoles</option>
											<option value='Jueves' ";
											if($reg['dia'] == 'Jueves'){ echo 'selected'; }
											echo ">Jueves</option>
											<option value='Viernes' ";
											if($reg['dia'] == 'Viernes'){ echo 'selected'; }
											echo ">Viernes</option>
											<option value='Sabado' ";
											if($reg['dia'] == 'Sabado'){ echo 'selected'; }
											echo ">Sábado</option>
										</select></td>
										<td><input type='time' name='inicio".$reg["idmaterias"]."' id='inicio".$reg["idmaterias"]."' value='".$reg["h_inicio"]."'></td>
										<td><input type='time' name='final".$reg["idmaterias"]."' id='final".$reg["idmaterias"]."' value='".$reg["h_final"]."'></td>
										<td><input type='text' name='aula".$reg["idmaterias"]."' id='aula".$reg["idmaterias"]."' value='".$reg["aula"]."'></td>
										<td>";

										if (isset($reg["idhorario_clase"])) {
											echo "<section id='agregarmodificar".$reg["idmaterias"]."'><button class='btn btn-outline-success btn-sm' onclick='modificarhorario(".$reg["idmaterias"].")'><i class='zmdi zmdi-refresh zmdi-hc-lg'></i></button></section>";
											
										}else{
											echo "<section id='agregarmodificar".$reg["idmaterias"]."'><button class='btn btn-outline-success btn-sm' onclick='registrarhorario(".$reg["idmaterias"].")'><i class='zmdi zmdi-check zmdi-hc-lg'></i></button></section>";
										}

										
										
										echo "</td>
										<td>
										<input type='hidden' name='carrera".$reg["idmaterias"]."' id='carrera".$reg["idmaterias"]."' value='".$reg["idcarreras"]."'>
										<input type='hidden' name='semestre".$reg["idmaterias"]."' id='semestre".$reg["idmaterias"]."' value='".$reg["idSemestre"]."'>
										<input type='hidden' name='semestre".$reg["idmaterias"]."' id='profesor".$reg["idmaterias"]."' value='".$reg["idprofesores"]."'>
										"

									   
									

									?>
                                                
										
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
							<script>
								function registrarhorario(id) {
									var id;
									var dia= $('#dia'+id).val();
									var inicio=$('#inicio'+id).val();
									var final=$('#final'+id).val();
									var aula=$('#aula'+id).val();
									var carrera=$('#carrera'+id).val();
									var semestre=$('#semestre'+id).val();
									var profesor=$('#profesor'+id).val();
									
									$.ajax({
										url : 'registrarhorario.php',
										type : 'POST',
										dataType : 'html',
										data : {materias: id, dia: dia,inicio: inicio,final: final,aula: aula,carrera: carrera,semestre: semestre,profesor: profesor},
									})
									.done(function(resultado) {
										var a ="#agregarmodificar"+resultado;
										//alert(a);
										$(a).html("<button class='btn btn-outline-success btn-sm' onclick='modificarhorario("+resultado+")'><i class='zmdi zmdi-refresh zmdi-hc-lg'></i></button>");
										if (resultado==id) {
											$("#alerta").html("<div class='alert alert-success' id='alertaguardado' style='position: fixed; top: 0; left: 40%; background-color:#B050E0'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Registrado!</strong> Horario guardado con exito.</div>");
										}	
										
									});
									
								}
								function modificarhorario(id) {
									var id;
									var dia= $('#dia'+id).val();
									var inicio=$('#inicio'+id).val();
									var final=$('#final'+id).val();
									var aula=$('#aula'+id).val();
									var carrera=$('#carrera'+id).val();
									var semestre=$('#semestre'+id).val();
									var profesor=$('#profesor'+id).val();
									
									$.ajax({
										url : 'modificarhorario.php',
										type : 'POST',
										dataType : 'html',
										data : {materias: id, dia: dia,inicio: inicio,final: final,aula: aula,carrera: carrera,semestre: semestre,profesor: profesor},
									})
									.done(function(resultado) {
										var a ="#agregarmodificar"+resultado;
										//alert(a);
										$(a).html("<button class='btn btn-outline-success btn-sm' onclick='modificarhorario("+resultado+")'><i class='zmdi zmdi-refresh zmdi-hc-lg'></i></button>");
										if (resultado==id) {
											$("#alerta").html("<div class='alert alert-success' id='alertaguardado' style='position: fixed; top: 0; left: 40%; background-color:#B050E0'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Modificado!</strong> Horario modificado con exito.</div>");
										}
										});
									
								}
							</script>
						</table>
						</section>
						
						
					</div>
					<a href="#forms">Volver al inicio</a>
				</div>
			</div>

			<div class="panel panel-success">
				<div class="panel-heading" style="background: linear-gradient(135deg, #71b7e6,#9b59b6);">
					<h3 class="panel-title" id="civil"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE MATERIAS DE LA CARRERA CIVIL</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<input type="search" id="search2" onkeyup="buscarcivil(this)" name="search2" placeholder="Buscar materias">
						<label style="color: black;" for="semestres">Semestre: </label>
							<select  name="semestrecivil" id="semestrecivil" onchange="filtrosemestrecivil(this.value)">
									<option value="">------</option>
									<option value="1">Primer</option>
									<option value="2">Segundo</option>
									<option value="3">Tercero</option>
									<option value="4">Cuatro</option>
									<option value="5">Quinto</option>
									<option value="6">Sexto</option>
									<option value="7">Septimo</option>
									<option value="8">Octavo</option>
									<option value="9">Noveno</option>
									<option value="10">Decimo</option>
							</select>
							<button onclick="alertaeliminar(2);" style="background-color:red; color:white; float: right;" >Reiniciar Horarios Civil</button>
						
						<section id="matcivil">
							<br>
						
						
						
	

						<table class="table table-hover text-center">
							<?php
								//$correo = $_GET['correo'];
								//01-conectar
								require("../../conexion.php");
								//02-generar instruccion SQL
								$sql = "select mat.idmaterias,mat.nombre as materia,mat.idcarreras,mat.idSemestre,mat.idprofesores,carr.nombre as carrera,hor.idhorario_clase,
								hor.h_inicio,hor.h_final,hor.aula,hor.dia,sem.semestre
								 from materias mat inner join carreras carr on carr.idcarreras = mat.idcarreras 
								inner join semestre sem on sem.idSemestre=mat.idSemestre
								left join horario_clase hor on mat.idmaterias=hor.idmaterias where mat.idcarreras=2 order by mat.idmaterias;";

							
								mysqli_set_charset( $con, 'utf8');
								//03-ejecutar SQL (matriz de resultado)
								$res = mysqli_query($con,$sql);
								

								//04-procesa el resultado
								if(mysqli_num_rows($res)>0){
									//recorrer cada fila de la matriz
									echo "<thead>";
									echo "<tr>";
									echo "<th class='text-center'>#</th>";
									echo "<th class='text-center'>MATERIA</th>";
									echo "<th class='text-center'>CARRERA</th>";
									echo "<th class='text-center'>SEMESTRE</th>";
									echo "<th class='text-center'>DÍA</th>";
									echo "<th class='text-center'>Horario Inicio</th>";
									echo "<th class='text-center'>Horario Final</th>";
									echo "<th class='text-center'>Aula</th>";
									echo "<th class='text-center'>GUARDAR</th>";
									
									echo "</tr>";
									echo "</thead>";
									while($reg=mysqli_fetch_array($res)){
										
										echo"<tbody>";
										echo "<tr>
										<td>".$reg["idmaterias"]."</td>
										<td>".$reg["materia"]."</td>
										<td>".$reg["carrera"]."</td>
										<td>".$reg["semestre"]."</td>
										<td><select  name='dia".$reg["idmaterias"]."' id='dia".$reg["idmaterias"]."'>
											<option value='inicio' >------</option>
											<option value='Lunes' ";
											if($reg['dia'] == 'Lunes'){ echo 'selected'; }
											echo ">Lunes</option>
											<option value='Martes' ";
											if($reg['dia'] == 'Martes'){ echo 'selected'; }
											echo ">Martes</option>
											<option value='Miercoles' ";
											if($reg['dia'] == 'Miercoles'){ echo 'selected'; }
											echo ">Miércoles</option>
											<option value='Jueves' ";
											if($reg['dia'] == 'Jueves'){ echo 'selected'; }
											echo ">Jueves</option>
											<option value='Viernes' ";
											if($reg['dia'] == 'Viernes'){ echo 'selected'; }
											echo ">Viernes</option>
											<option value='Sabado' ";
											if($reg['dia'] == 'Sabado'){ echo 'selected'; }
											echo ">Sábado</option>
										</select></td>
										<td><input type='time' name='inicio".$reg["idmaterias"]."' id='inicio".$reg["idmaterias"]."' value='".$reg["h_inicio"]."'></td>
										<td><input type='time' name='final".$reg["idmaterias"]."' id='final".$reg["idmaterias"]."' value='".$reg["h_final"]."'></td>
										<td><input type='text' name='aula".$reg["idmaterias"]."' id='aula".$reg["idmaterias"]."' value='".$reg["aula"]."'></td>
										<td>";

										if (isset($reg["idhorario_clase"])) {
											echo "<section id='agregarmodificar".$reg["idmaterias"]."'><button class='btn btn-outline-success btn-sm' onclick='modificarhorario(".$reg["idmaterias"].")'><i class='zmdi zmdi-refresh zmdi-hc-lg'></i></button></section>";
											
										}else{
											echo "<section id='agregarmodificar".$reg["idmaterias"]."'><button class='btn btn-outline-success btn-sm' onclick='registrarhorario(".$reg["idmaterias"].")'><i class='zmdi zmdi-check zmdi-hc-lg'></i></button></section>";
										}

										
										
										echo "</td>
										<td>
										<input type='hidden' name='carrera".$reg["idmaterias"]."' id='carrera".$reg["idmaterias"]."' value='".$reg["idcarreras"]."'>
										<input type='hidden' name='semestre".$reg["idmaterias"]."' id='semestre".$reg["idmaterias"]."' value='".$reg["idSemestre"]."'>
										<input type='hidden' name='semestre".$reg["idmaterias"]."' id='profesor".$reg["idmaterias"]."' value='".$reg["idprofesores"]."'>
										"

									   
									

									?>
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
						</section>
					</div>
					<a href="#forms">Volver al inicio</a>
					
				</div>
			</div>
			<div class="panel panel-success">
				<div class="panel-heading" style="background: linear-gradient(135deg, #71b7e6,#9b59b6);">
					<h3 class="panel-title" id="electricidad"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE MATERIAS DE LA CARRERA ELECTRICIDAD</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<input type="search" id="search3" onkeyup="buscarelectricidad(this)" name="search3" placeholder="Buscar materias">
						<label style="color: black;" for="semestres">Semestre: </label>
							<select  name="semestreelectricidad" id="semestreelectricidad" onchange="filtrosemestreelectricidad(this.value)" >
									<option value="">------</option>
									<option value="1">Primer</option>
									<option value="2">Segundo</option>
									<option value="3">Tercero</option>
									<option value="4">Cuatro</option>
									<option value="5">Quinto</option>
									<option value="6">Sexto</option>
									<option value="7">Septimo</option>
									<option value="8">Octavo</option>
									<option value="9">Noveno</option>
									<option value="10">Decimo</option>
							</select>
							<button onclick="alertaeliminar(3);" style="background-color:red; color:white; float: right;" >Reiniciar Horarios Electricidad</button>
						
						<section id="matelectricidad">
							<br>
						
						
						
	

						<table class="table table-hover text-center">
							<?php
								//$correo = $_GET['correo'];
								//01-conectar
								require("../../conexion.php");
								//02-generar instruccion SQL
								$sql = "select mat.idmaterias,mat.nombre as materia,mat.idcarreras,mat.idSemestre,mat.idprofesores,carr.nombre as carrera,hor.idhorario_clase,
								hor.h_inicio,hor.h_final,hor.aula,hor.dia,sem.semestre
								 from materias mat inner join carreras carr on carr.idcarreras = mat.idcarreras 
								inner join semestre sem on sem.idSemestre=mat.idSemestre
								left join horario_clase hor on mat.idmaterias=hor.idmaterias where mat.idcarreras=3 order by mat.idmaterias;";

							
								mysqli_set_charset( $con, 'utf8');
								//03-ejecutar SQL (matriz de resultado)
								$res = mysqli_query($con,$sql);
								

								//04-procesa el resultado
								if(mysqli_num_rows($res)>0){
									//recorrer cada fila de la matriz
									echo "<thead>";
									echo "<tr>";
									echo "<th class='text-center'>#</th>";
									echo "<th class='text-center'>MATERIA</th>";
									echo "<th class='text-center'>CARRERA</th>";
									echo "<th class='text-center'>SEMESTRE</th>";
									echo "<th class='text-center'>DÍA</th>";
									echo "<th class='text-center'>Horario Inicio</th>";
									echo "<th class='text-center'>Horario Final</th>";
									echo "<th class='text-center'>Aula</th>";
									echo "<th class='text-center'>GUARDAR</th>";
									
									echo "</tr>";
									echo "</thead>";
									while($reg=mysqli_fetch_array($res)){
										
										echo"<tbody>";
										echo "<tr>
										<td>".$reg["idmaterias"]."</td>
										<td>".$reg["materia"]."</td>
										<td>".$reg["carrera"]."</td>
										<td>".$reg["semestre"]."</td>
										<td><select  name='dia".$reg["idmaterias"]."' id='dia".$reg["idmaterias"]."'>
											<option value='inicio' >------</option>
											<option value='Lunes' ";
											if($reg['dia'] == 'Lunes'){ echo 'selected'; }
											echo ">Lunes</option>
											<option value='Martes' ";
											if($reg['dia'] == 'Martes'){ echo 'selected'; }
											echo ">Martes</option>
											<option value='Miercoles' ";
											if($reg['dia'] == 'Miercoles'){ echo 'selected'; }
											echo ">Miércoles</option>
											<option value='Jueves' ";
											if($reg['dia'] == 'Jueves'){ echo 'selected'; }
											echo ">Jueves</option>
											<option value='Viernes' ";
											if($reg['dia'] == 'Viernes'){ echo 'selected'; }
											echo ">Viernes</option>
											<option value='Sabado' ";
											if($reg['dia'] == 'Sabado'){ echo 'selected'; }
											echo ">Sábado</option>
										</select></td>
										<td><input type='time' name='inicio".$reg["idmaterias"]."' id='inicio".$reg["idmaterias"]."' value='".$reg["h_inicio"]."'></td>
										<td><input type='time' name='final".$reg["idmaterias"]."' id='final".$reg["idmaterias"]."' value='".$reg["h_final"]."'></td>
										<td><input type='text' name='aula".$reg["idmaterias"]."' id='aula".$reg["idmaterias"]."' value='".$reg["aula"]."'></td>
										<td>";

										if (isset($reg["idhorario_clase"])) {
											echo "<section id='agregarmodificar".$reg["idmaterias"]."'><button class='btn btn-outline-success btn-sm' onclick='modificarhorario(".$reg["idmaterias"].")'><i class='zmdi zmdi-refresh zmdi-hc-lg'></i></button></section>";
											
										}else{
											echo "<section id='agregarmodificar".$reg["idmaterias"]."'><button class='btn btn-outline-success btn-sm' onclick='registrarhorario(".$reg["idmaterias"].")'><i class='zmdi zmdi-check zmdi-hc-lg'></i></button></section>";
										}

										
										
										echo "</td>
										<td>
										<input type='hidden' name='carrera".$reg["idmaterias"]."' id='carrera".$reg["idmaterias"]."' value='".$reg["idcarreras"]."'>
										<input type='hidden' name='semestre".$reg["idmaterias"]."' id='semestre".$reg["idmaterias"]."' value='".$reg["idSemestre"]."'>
										<input type='hidden' name='semestre".$reg["idmaterias"]."' id='profesor".$reg["idmaterias"]."' value='".$reg["idprofesores"]."'>
										"

									   
									

									?>
										
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
						</section>
						
					</div>
					<a href="#forms">Volver al inicio</a>
					
				</div>
			</div>
			<div class="panel panel-success">
				<div class="panel-heading" style="background: linear-gradient(135deg, #71b7e6,#9b59b6);">
					<h3 class="panel-title" id="electronica"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE MATERIAS DE ELECTRONICA</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<input type="search" id="search4" onkeyup="buscarelectronica(this)" name="search4" placeholder="Buscar materias">
						<label style="color: black;" for="semestres">Semestre: </label>
							<select  name="semestreelectronica" id="semestreelectronica" onchange="filtrosemestreelectronica(this.value)" >
									<option value="">------</option>
									<option value="1">Primer</option>
									<option value="2">Segundo</option>
									<option value="3">Tercero</option>
									<option value="4">Cuatro</option>
									<option value="5">Quinto</option>
									<option value="6">Sexto</option>
									<option value="7">Septimo</option>
									<option value="8">Octavo</option>
									<option value="9">Noveno</option>
									<option value="10">Decimo</option>
							</select>
							<button onclick="alertaeliminar(4);" style="background-color:red; color:white; float: right;" >Reiniciar Horarios Electronica</button>
						
						<section id="matelectronica">
							<br>
						
						
						
	

						<table class="table table-hover text-center">
							<?php
								//$correo = $_GET['correo'];
								//01-conectar
								require("../../conexion.php");
								//02-generar instruccion SQL
								$sql = "SELECT mat.idmaterias,mat.nombre as materia,mat.idcarreras,mat.idSemestre,mat.idprofesores,carr.nombre as carrera,hor.idhorario_clase,
								hor.h_inicio,hor.h_final,hor.aula,hor.dia,sem.semestre
								 from materias mat inner join carreras carr on carr.idcarreras = mat.idcarreras 
								inner join semestre sem on sem.idSemestre=mat.idSemestre
								left join horario_clase hor on mat.idmaterias=hor.idmaterias where mat.idcarreras=4 order by mat.idmaterias;";

							
								mysqli_set_charset( $con, 'utf8');
								//03-ejecutar SQL (matriz de resultado)
								$res = mysqli_query($con,$sql);
								

								//04-procesa el resultado
								if(mysqli_num_rows($res)>0){
									//recorrer cada fila de la matriz
									echo "<thead>";
									echo "<tr>";
									echo "<th class='text-center'>#</th>";
									echo "<th class='text-center'>MATERIA</th>";
									echo "<th class='text-center'>CARRERA</th>";
									echo "<th class='text-center'>SEMESTRE</th>";
									echo "<th class='text-center'>DÍA</th>";
									echo "<th class='text-center'>Horario Inicio</th>";
									echo "<th class='text-center'>Horario Final</th>";
									echo "<th class='text-center'>Aula</th>";
									echo "<th class='text-center'>GUARDAR</th>";
									
									echo "</tr>";
									echo "</thead>";
									while($reg=mysqli_fetch_array($res)){
										
										echo"<tbody>";
										echo "<tr>
										<td>".$reg["idmaterias"]."</td>
										<td>".$reg["materia"]."</td>
										<td>".$reg["carrera"]."</td>
										<td>".$reg["semestre"]."</td>
										<td><select  name='dia".$reg["idmaterias"]."' id='dia".$reg["idmaterias"]."'>
											<option value='inicio' >------</option>
											<option value='Lunes' ";
											if($reg['dia'] == 'Lunes'){ echo 'selected'; }
											echo ">Lunes</option>
											<option value='Martes' ";
											if($reg['dia'] == 'Martes'){ echo 'selected'; }
											echo ">Martes</option>
											<option value='Miercoles' ";
											if($reg['dia'] == 'Miercoles'){ echo 'selected'; }
											echo ">Miércoles</option>
											<option value='Jueves' ";
											if($reg['dia'] == 'Jueves'){ echo 'selected'; }
											echo ">Jueves</option>
											<option value='Viernes' ";
											if($reg['dia'] == 'Viernes'){ echo 'selected'; }
											echo ">Viernes</option>
											<option value='Sabado' ";
											if($reg['dia'] == 'Sabado'){ echo 'selected'; }
											echo ">Sábado</option>
										</select></td>
										<td><input type='time' name='inicio".$reg["idmaterias"]."' id='inicio".$reg["idmaterias"]."' value='".$reg["h_inicio"]."'></td>
										<td><input type='time' name='final".$reg["idmaterias"]."' id='final".$reg["idmaterias"]."' value='".$reg["h_final"]."'></td>
										<td><input type='text' name='aula".$reg["idmaterias"]."' id='aula".$reg["idmaterias"]."' value='".$reg["aula"]."'></td>
										<td>";

										if (isset($reg["idhorario_clase"])) {
											echo "<section id='agregarmodificar".$reg["idmaterias"]."'><button class='btn btn-outline-success btn-sm' onclick='modificarhorario(".$reg["idmaterias"].")'><i class='zmdi zmdi-refresh zmdi-hc-lg'></i></button></section>";
											
										}else{
											echo "<section id='agregarmodificar".$reg["idmaterias"]."'><button class='btn btn-outline-success btn-sm' onclick='registrarhorario(".$reg["idmaterias"].")'><i class='zmdi zmdi-check zmdi-hc-lg'></i></button></section>";
										}

										
										
										echo "</td>
										<td>
										<input type='hidden' name='carrera".$reg["idmaterias"]."' id='carrera".$reg["idmaterias"]."' value='".$reg["idcarreras"]."'>
										<input type='hidden' name='semestre".$reg["idmaterias"]."' id='semestre".$reg["idmaterias"]."' value='".$reg["idSemestre"]."'>
										<input type='hidden' name='semestre".$reg["idmaterias"]."' id='profesor".$reg["idmaterias"]."' value='".$reg["idprofesores"]."'>
										"
									   
									

									?>
                                                
										
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
						</section>
						
					</div>
					<a href="#forms">Volver al inicio</a>
					
				</div>
			</div>
		</div>
		

		
</div>
		
	</section>

	<!--====== Scripts -->
	<script src="../js/jquery-3.1.1.min.js"></script>
	
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/material.min.js"></script>
	<script src="../js/ripples.min.js"></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
	<script src="consultahorario.js"></script>
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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