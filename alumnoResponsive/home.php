<?php 
	
        header('Content-Type: text/html; charset=utf-8');
        session_start();
	if(isset($_SESSION["id"])&& isset($_SESSION["Correo"])&& isset($_SESSION["Nombre"])&& isset($_SESSION["Apellido"])
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
	<link rel="stylesheet" href="./css/main.css">
	<script src="components/jquery/jquery.min.js"></script>
	<link href='lib/main.css' rel='stylesheet' />
    <script src='lib/main.js'></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	

<script>
	

	document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
			initialView: 'dayGridMonth',
		  locale: 'es',
		  headerToolbar: {
			  left: 'prev, next, today',
			  center: 'title',
			  right: 'dayGridMonth,timeGridWeek,listWeek'
			  
		  },
		  dateClick: function(info) {
			$('#txtFecha').val(info.dateStr);
			$("#registroevento").modal();
				
		},

			events:'dataeventos.php?idalumno=<?php echo $_SESSION["id"]; ?>',
			
		 	eventClick:function(info){
			  if (info.event.extendedProps.hora != "") {
				$('#tituloEvento').html(info.event.title+" ("+info.event.extendedProps.hora+")");
			  }else{
				$('#tituloEvento').html(info.event.title);
			  }

			  if(info.event.extendedProps.recordatorio == "si"){
				$('#vistanoti').html("Notificarme este evento");
			  }else{
				$('#vistanoti').html("");
			  }

			  if (info.event.extendedProps.tiporecor === undefined) {
				$('#btneliminarevento').attr('disabled',false);
				$('#btnModificar').attr('disabled',false);
				
			  }else{
				$('#btneliminarevento').attr('disabled',true);
				$('#btnModificar').attr('disabled',true);

				
			  }
			$('#descripcionEvento').html(info.event.extendedProps.description);

			//Agregar informacion al modal de modificacion
			$('#txtTitulom').val(info.event.title);
			$('#txtDescripcionm').val(info.event.extendedProps.description);
			$('#txtHoram').val(cortarFecha(info.event.extendedProps.hora));
			if (info.event.extendedProps.recordatorio == "si") {
				$('#notificacionm').prop("checked",true);
			}else{
				$('#notificacionm').prop("checked",false);
			}
			$('#idrecordatorio').val(info.event.extendedProps.idrecordatorio);
			
			$('#txtFecham').val(info.event.extendedProps.fecha);
			

			//abri modal de vista del evento
			$("#exampleModal").modal();
		  },

		  selectable: true,
		  
		  dayMaxEventRows: true,
		  views:{
			  dayGridMonth: {
				  dayMaxEventRows: 2
			  }
		  }

		 
        });
        calendar.render();


	
      });

	  

	  function cortarFecha(fecha){
		  /*
			fecha = fecha.split("T");
			if(fecha[1]){
				fecha[1] = fecha[1].substr(0,8);
			}
			return fecha;
			*/
			console.log(fecha);
		}
	   
		
</script>


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

			<i class="zmdi zmdi-circle" style="color: blue"></i>  Eventos del Alumno                                                          
			<i class="zmdi zmdi-circle" style="color: red"></i>   Examenes Finales

			
			<!-- Aqui es donde se genera el fullcalendar -->
			<!-- todo los styles del div se pueden colocar posteriormente en un documento css aparte para mas pulcritud -->
			<div style="background-color: white; max-width: 1100px;
  						margin: 40px auto; padding: 6px; border-radius: 20px;" id='calendar'>
			</div>
			<?php 
				require("../conexion.php");
				
				
				setlocale(LC_TIME,"es_ES");
				date_default_timezone_set("America/Manaus");
				$dia = date('D');
				

				if ($dia == "Fri") {
					$diaes = "Viernes";
				} elseif ($dia == "Sat") {
					$diaes = "Sabado";
				} elseif ($dia == "Sun") {
					$diaes = "Domingo";
				} elseif ($dia == "Mon") {
					$diaes = "Lunes";
				} elseif ($dia == "Tue") {
					$diaes = "Martes";
				} elseif ($dia == "Wed") {
					$diaes = "Miercoles";
				} elseif ($dia == "Thu") {
					$diaes = "Jueves";
				};

				$sql="SELECT alum.idAlumnos,hor.*,mat.nombre,concat(prof.nombre,' ',prof.apellido) as profesor FROM alumnos alum 
				inner join horario_clase hor on alum.dSemestre = hor.idSemestre and alum.idcarreras = hor.idcarreras
				INNER JOIN materias mat on mat.idmaterias = hor.idmaterias 
				INNER JOIN profesores prof ON prof.idprofesores = hor.idprofesores where idAlumnos=".$_SESSION["id"]." and dia='".$diaes."';";
				mysqli_set_charset( $con, 'utf8');
                                $res= mysqli_query($con, $sql);

				//echo $sql;
				
			?>
			<div class="col-lg-10">
						<div class="card card-margin">
							<div class="card-header no-border">
								<h7 class="card-title">Hoy tienes:</h7>
							</div>
							<div class="card-body pt-0" id="">
								<?php 
									if (mysqli_num_rows($res)>0) {
										while($reg=mysqli_fetch_array($res)){
											echo "<p><b>".$reg["nombre"]."</b> a las <b>".$reg["h_inicio"]."</b></p>";
										}
									}else {
										echo "<p><b>Dia libre</b></p>";
									}
								?>
							</div>
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
	<script src="lib/locales/es.js"></script>
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="push.min.js" type="text/javascript"></script>
        <script src="serviceWorker.min.js" type="text/javascript"></script>

	



	  <!-- Modal informacion evento-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tituloEvento"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Descripcion:</p>
				<div id="descripcionEvento"></div>
				<div id="vistanoti" class="alert alert-light" role="alert">
					
				</div>
			</div>
			<div class="modal-footer">
				
				<button type="button" id="btnModificar" class="btn btn-primary">Modificar</button>
				<button type="button" id="btneliminarevento" class="btn btn-danger">Eliminar</button>
				<button type="button" id="cerrarinformacion" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			</div>
		</div>
		</div>

		<!-- Modal nuevo evento-->
		<div class="modal fade" id="registroevento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="example">Registro Evento</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<label for="txtFecha" class="col-sm-2 col-form-label">Fecha</label>
						<div class="col-sm-10">
							<input class="form-control" type="date" name="txtFecha" id="txtFecha">
						</div>
					</div>
					<div class="form-group row">
						<label for="txtTitulo" class="col-sm-2 col-form-label">Titulo</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="txtTitulo" id="txtTitulo">
						</div>
					</div>
					<div class="form-group row">
						<label for="txtHora" class="col-sm-2 col-form-label" value=" ">Hora</label>
						<div class="col-sm-10">
							<input class="form-control" type="time" name="txtHora" id="txtHora">
						</div>
					</div>
					<div class="form-group row">
						<label for="txtDescripcion" class="col-sm-2 col-form-label">Descripcion</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="txtDescripcion" id="txtDescripcion" col="2" rows="2"></textarea>
						</div>
					</div>
	
					<label for="notificacion">Notificarme: </label> <input type="checkbox" name="notificacion" id="notificacion" value="si">
				</div>
				<div class="modal-footer">
					<button id="btnAgregar" type="button" class="btn btn-primary">Guardar evento</button>
					<button type="button" class="btn btn-secondary" id="cerraragregar" data-dismiss="modal">Cerrar</button>
					
				</div>
				</div>
			</div>
		</div>

	  	<!-- modal modificacion -->
		<div class="modal fade" id="modificarevento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="example">Modificacion Evento</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<label for="txtFecha" class="col-sm-2 col-form-label">Fecha</label>
						<div class="col-sm-10">
							<input class="form-control" type="date" name="txtFecham" id="txtFecham">
						</div>
					</div>
					<div class="form-group row">
						<label for="txtTitulo" class="col-sm-2 col-form-label">Titulo</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="txtTitulom" id="txtTitulom">
						</div>
					</div>
					<div class="form-group row">
						<label for="txtHora" class="col-sm-2 col-form-label" value=" ">Hora</label>
						<div class="col-sm-10">
							<input class="form-control" type="time" name="txtHoram" id="txtHoram">
						</div>
					</div>
					<div class="form-group row">
						<label for="txtDescripcion" class="col-sm-2 col-form-label">Descripcion</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="txtDescripcionm" id="txtDescripcionm" col="2" rows="2"></textarea>
						</div>
					</div>
					<label for="notificacionm">Notificarme: </label> <input type="checkbox" name="notificacionm" id="notificacionm" value="si">
					<input type="hidden" name="idrecordatorio" id="idrecordatorio">
				</div>
				<div class="modal-footer">
					<button id="btnmodificarevento" type="button" class="btn btn-primary">Guardar evento</button>
					<button type="button" class="btn btn-secondary" id="cerrarmodificarevento" data-dismiss="modal">Cerrar</button>
					
				</div>
				</div>
			</div>
		</div>

		
		<div id="error"></div>
		

		<!-- script agregar evento en la bd .... puede ir en un documento js  -->
		<script>

                            var eventosNoti = [];
									
			//consulta si dentro de 3 dias o menos existe un evento
			//si existe lo notifica
			//solo se ejecuta la consulta al abrir esta pagina o recargar
			recordatorioproximo();
			function recordatorioproximo() {
				Push.Permission.request();
				$.ajax({
				url: "dataeventos.php",
				type: "GET",
                                dataType: "json",
				data: {idalumno: <?php echo $_SESSION["id"]; ?>}
				}).done(function(respuesta){
					
					
					let date = new Date()
					//obtenemos la fecha actual
					let dia = date.getDate()
					let mes = date.getMonth() + 1
					let year = date.getFullYear()
					//console.log(`${dia}-${mes}-${year}`);
					//recorremos el json array
					$.each(respuesta, function(i, item) {
						//[0] = year [1] = mes [2] = dia
						console.log(item);
						let fechaRecordatorio = item.fecha.split('-');

						let day1;
						let day2;
						let diferencia;
						//consultar si la fecha se aproxima a 3 dias antes del recordatorio
						if (item.recordatorio == "si") {
							if (year <= fechaRecordatorio[0]) {
								if (parseInt(mes)< parseInt(fechaRecordatorio[1])) {
									
										day1 = new Date(`${mes}/${dia}/${year}`)
										day2 = new Date(`${fechaRecordatorio[1]}/${fechaRecordatorio[2]}/${fechaRecordatorio[0]}`);
										diferencia = (Math.abs(day2-day1))/(1000*3600*24);
										if (diferencia <=3) {
											noti(item.title,item.description,diferencia,item.idrecordatorio);
										}
										eventosNoti.push(item);
									
								}else{
									if(parseInt(mes)== parseInt(fechaRecordatorio[1])){
										if (parseInt(dia)<= parseInt(fechaRecordatorio[2])) {
											
											day1 = new Date(`${mes}/${dia}/${year}`)
											day2 = new Date(`${fechaRecordatorio[1]}/${fechaRecordatorio[2]}/${fechaRecordatorio[0]}`);
											diferencia = (Math.abs(day2-day1))/(1000*3600*24);
											if (diferencia <=3) {
												noti(item.title,item.description,diferencia,item.idrecordatorio);
											}
											
										}
										eventosNoti.push(item);
									}
								}
								
							}
							
							
						}
					
						
						
					});
				});
				
			}
			
			navigator.serviceWorker.register('serviceWorker.min.js');


			//notificacion proximo evento
			
			function noti(titulo,descripcion,dias,idrecordatorio){
				let fechas = new Date().toLocaleDateString();
				if (localStorage.getItem("id"+idrecordatorio+"fecha") != fechas && localStorage.getItem("id"+idrecordatorio)=="notificado") {
					localStorage.setItem("id"+idrecordatorio, "");
				}
		
				
				
				if (localStorage.getItem("id"+idrecordatorio) != "notificado") {
					Push.create(titulo+' - en '+dias+' dia/s', {
					body: descripcion,
				
					
					onClick: function (titulo,descripcion,dias) {
						
						window.focus();
						this.close();
					},
						vibrate: [200, 100, 200, 100, 200, 100, 200]
					});

					function showNotification() {
						
						
						Notification.requestPermission(function(result) {
							if (result === 'granted') {
							navigator.serviceWorker.ready.then(function(registration) {
								registration.showNotification('Vibration Sample', {
								body: title+' - en '+dias+' dia/s',
								vibrate: [200, 100, 200, 100, 200, 100, 200],
								tag: 'vibration-sample'
								});
							});
							}
						});
						}
						// Guardar en localstore la fecha en que se notifico
						localStorage.setItem("id"+idrecordatorio+"fecha", new Date().toLocaleDateString());
						// Guardar que se notifico
						localStorage.setItem("id"+idrecordatorio, "notificado");
				}

			}

			//notificacion evento por minuto
			window.addEventListener('load', function() {
				notificacionLive();
			});
			
			function notificacionLive() {
					let date = new Date()
					//obtenemos la fecha actual
					let dia = date.getDate()
					let mes = date.getMonth() + 1
					let year = date.getFullYear()
					
					console.log(eventosNoti);
				
			}	






				$('#btnAgregar').click(function(){
				
				$.ajax({
					url:"agregarevento.php",
					type:"POST",
					
					data: {title:$('#txtTitulo').val(),start: $('#txtFecha').val(),description: $('#txtDescripcion').val(),notificarme: $('input:checkbox[name=notificacion]:checked').val(),idalumno: <?php echo $_SESSION["id"]; ?>,hora: $('#txtHora').val() }
				});
				
				//alert($('input:checkbox[name=notificacion]:checked').val());
				window.location.reload();
				$('#cerraragregar').trigger('click');
			});

			
			$('#btnmodificarevento').click(function(){
				$.ajax({
					url:"modificarevento.php",
					type:"POST",
					datatype: "HTML",
					data: {title:$('#txtTitulom').val(),start: $('#txtFecham').val(),description: $('#txtDescripcionm').val(),notificarme: $('input:checkbox[name=notificacionm]:checked').val() ,idalumno: <?php echo $_SESSION["id"]; ?>,hora: $('#txtHoram').val(),idrecordatorio: $('#idrecordatorio').val() }
				})
				
				;

				
				window.location.reload();
				$('#cerrarmodificarevento').trigger('click');
			})
			;

			

			$('#btneliminarevento').click(function(){
				$.ajax({
					url:"eliminarevento.php",
					type:"POST",
					data: {idrecordatorio: $('#idrecordatorio').val() }
				});

				setTimeout(function(){
					window.location.reload();
				$('#cerrarinformacion').trigger('click');
				}, 0200)
				
			});

			$('#btnModificar').click(function(){
				
				$("#modificarevento").modal();
			});

			
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