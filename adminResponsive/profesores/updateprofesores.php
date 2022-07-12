<?php
    $id=$_POST["idprofesores"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $CIN=$_POST["cin"];
    $telefono=$_POST["telefono"];
    $correo=$_POST["correo"];

    //conectar
    require("../../conexion.php");

    $sql = "update profesores set nombre='$nombre', apellido='$apellido', cin='$CIN',telefono='$telefono', correo='$correo' where idprofesores='$id'";
    mysqli_set_charset( $con, 'utf8');
    $res = mysqli_query($con, $sql) or die ("Error: ". mysql_error());
    
    //procesar el resultado

    if (empty($res)){
        echo "no se pudo modificar";
    } else {
        header('Location:actualizarprofesores.php?e=1');
    }

 //cerrar la conexión

mysqli_close($con);


    
?>
