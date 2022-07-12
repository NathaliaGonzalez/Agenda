<?php 
	session_start();
	if(isset($_SESSION["Correo"])){
 
?>
<?php


    //ALUMNO
    $id = $_GET['idAlumnos'];
    //conectar
    require("../conexion.php");
    //generar la instruccion SQL
    $sql = "delete from alumnos where idAlumnos=$id";
    mysqli_set_charset( $con, 'utf8');
    //ejecutar SQL
    $res = mysqli_query($con, $sql);
    //procesar el resultado
    if($res){
        echo "Los datos se eliminaron";
        header('Location:cerrarsesion.php');
    }else{
        echo "Error al eliminar.";
        echo $id;
    }



  
?>
<?php 
	}else{
		echo "La pagina esta protegida...";
	}	
?>