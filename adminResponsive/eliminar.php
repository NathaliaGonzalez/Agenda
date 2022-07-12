<?php 
	session_start();
	if(isset($_SESSION["Correo"])){
 
?>
<?php

    //administrador
    $c = $_GET['codigo'];
    //conectar
    require("../conexion.php");
    //generar la instruccion SQL
    $sql = "delete from administrador where idaministrador=$c";
    mysqli_set_charset( $con, 'utf8');
    //ejecutar SQL
    $res = mysqli_query($con, $sql);
    //procesar el resultado
    if($res){
        echo "Los datos se eliminaron";
        header('Location:admin-list.php');
    }else{
        echo "Error al eliminar.";
    }
    //ALUMNO
    $id = $_GET['id'];
    //conectar
    require("../conexion.php");
    //generar la instruccion SQL
    $sql = "delete from alumnos where idAlumnos=$id";
    //ejecutar SQL
    $res = mysqli_query($con, $sql);
    //procesar el resultado
    if($res){
        echo "Los datos se eliminaron";
        header('Location:admin-list.php');
    }else{
        echo "Error al eliminar.";
    }



  
?>
<?php 
	}else{
		echo "La pagina esta protegida...";
	}	
?>