
<?php
    $id=$_POST["idadministrador"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $CIN=$_POST["cin"];
    $direccion=$_POST["direccion"];
    $telefono=$_POST["telefono"];
    //conectar
    require("../conexion.php");

    $sql = "update administrador set nombre='$nombre', apellido='$apellido', cin='$CIN',direccion='$direccion', telefono='$telefono' where idaministrador='$id'";

    $res = mysqli_query($con, $sql) or die ("Error: ". mysql_error());
    
    //procesar el resultado

    if (empty($res)){
        echo "no se pudo modificar";
    } else {
        header('Location:actualizaradministradores.php?e=1');
    }

 //cerrar la conexión

mysqli_close($con);


    
?>
