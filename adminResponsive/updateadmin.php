<?php
    session_start();
	$correosesion=$_SESSION["Correo"];
    if (isset($_POST["correo"])) {

        $corre=$_POST["correo"];
        $contra=$_POST["contra"];
        //conectar
        require("../conexion.php");

        $sql = "update administrador set correo='$corre', contra='$contra' where correo='$correosesion'";

        $res = mysqli_query($con, $sql) or die ("Error: ". mysql_error());
     
        //procesar el resultado
        if (empty($res)){
            echo "no se pudo modificar";
        } else {
            echo "registro modificado";
            header('Location:my-account.php?e=1');
        }
    }else{
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $CIN=$_POST["cin"];
        $direccion=$_POST["direccion"];
        $telefono=$_POST["telefono"];
        //conectar
        require("../conexion.php");

        $sql = "update administrador set nombre='$nombre', apellido='$apellido', cin='$CIN',direccion='$direccion', telefono='$telefono' where correo='$correosesion'";

        $res = mysqli_query($con, $sql) or die ("Error: ". mysql_error());
        
        //procesar el resultado

        if (empty($res)){
            echo "No se pudo modificar";
        } else {
            echo "Registro modificado";
            header('Location:my-data.php?e=1');
        }


    }
     //cerrar la conexión

    mysqli_close($con);
?>