
<?php
    session_start();
    $correosesion=$_SESSION["Correo"];
    if (isset($_POST["correo"])) {

        $corre=$_POST["correo"];
        $contra=$_POST["contra"];
        //conectar
        require("../conexion.php");
        $sql = "update alumnos set Correo='$corre', Contra ='$contra' where Correo='$correosesion'";

        $res = mysqli_query($con, $sql) or die ("Error: ". mysql_error());

        if (empty($res)){
        } else {
            header('Location:my-account.php?e=1');
        }

    }else {
        $id=$_POST["idAlumnos"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $direccion=$_POST["direccion"];
        $telefono=$_POST["telefono"];
        $semestre=$_POST["semestres"];
        //conectar
        require("../conexion.php");

        $sql = "update alumnos set Nombre='$nombre', Apellido='$apellido',Direccion='$direccion', Telefono='$telefono', dSemestre='$semestre' where idAlumnos='$id'";

        $res = mysqli_query($con, $sql) or die ("Error: ". mysql_error());
        
        //procesar el resultado

        if (empty($res)){
            echo "no se pudo modificar";
        } else {
            header('Location:my-data.php?e=1');
        }
    }

    

 //cerrar la conexión

mysqli_close($con);


    
?>
