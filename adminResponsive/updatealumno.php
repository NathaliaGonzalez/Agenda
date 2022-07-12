
<?php
    $id=$_POST["idAlumnos"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $CIN=$_POST["cin"];
    $direccion=$_POST["direccion"];
    $telefono=$_POST["telefono"];
    $carrera=$_POST["carreras"];
    $semestre=$_POST["semestres"];
    //conectar
    require("../conexion.php");

    $sql = "update alumnos set Nombre='$nombre', Apellido='$apellido', CIN='$CIN',Direccion='$direccion', Telefono='$telefono', idcarreras='$carrera', dSemestre='$semestre' where idAlumnos='$id'";

    $res = mysqli_query($con, $sql) or die ("Error: ". mysql_error());
    
    //procesar el resultado

    if (empty($res)){
        echo "no se pudo modificar";
    } else {
        header('Location:actualizaralumnos.php?e=1');
    }

 //cerrar la conexión

mysqli_close($con);


    
?>
