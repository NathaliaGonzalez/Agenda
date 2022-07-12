<?php 
	session_start();
	if(isset($_SESSION["Correo"])){
 
?>
<?php


    //ALUMNO
    $id = $_GET['idmaterias'];
    //conectar
    require("../../conexion.php");
    //generar la instruccion SQL
    $sql = "delete from materias where idmaterias=$id";
    //ejecutar SQL
    mysqli_set_charset( $con, 'utf8');
    $res = mysqli_query($con, $sql);
    //procesar el resultado
    if($res){
        //echo "Los datos se eliminaron";
        header('Location:materia-list.php');
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