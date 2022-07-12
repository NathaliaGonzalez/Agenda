<?php 
	$u=$_POST["correo"];
	$p=$_POST["password"];
	include_once("../conexion.php");



	$sql="select * from alumnos where Correo='$u'";
       
	$res=mysqli_query($con,$sql);

	$sql="select * from administrador where correo='$u'";
	$res2=mysqli_query($con,$sql);

	if(mysqli_num_rows($res2)>0){
		$reg2=mysqli_fetch_array($res2);
		if($reg2["contra"]==$p){
			//iniciar sesion

			
				session_start();
			
		
				$_SESSION["Correo"]=$reg2["correo"];
				$_SESSION["Nombre"]=$reg2["nombre"];
				$_SESSION["Apellido"]=$reg2["apellido"];
				$_SESSION["rol"]=$reg2["rol"];
				
				
				header("location:../adminResponsive/home.php");
			
			

			
			
			
		}else{
			//error de contraseña
			header("location:index.php?e=1");
		}
		//echo "<script>alert('Iniciado como administrador');</script>";
		
		
	}else {
		if(mysqli_num_rows($res)>0){
			$reg=mysqli_fetch_array($res);
			//verifico la contarseña
	
	
	
			if($reg["Contra"]==$p){
				//iniciar sesion
				session_start();
				
				$_SESSION["id"]=$reg["idAlumnos"];
				$_SESSION["Correo"]=$reg["Correo"];
				$_SESSION["Nombre"]=$reg["Nombre"];
				$_SESSION["Apellido"]=$reg["Apellido"];
				
				
				
				//header("location:index.html");
				header("location:../alumnoResponsive/home.php");
				
			}else{
				//error de contraseña
				header("location:index.php?e=1");
			}
		}else{
			//usuario no existe
			header("location:index.php?e=2");
		}
	}

	
?>
