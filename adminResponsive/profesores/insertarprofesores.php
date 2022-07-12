<?php
    $ubi=$_POST["ubi"];
    $carrera=$_POST["carrera"];
    $nombrec=$_POST["nombrec"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $CIN=$_POST["cin"];
    $telefono=$_POST["telefono"];
    $correo=$_POST["correo"];

     //conectar
     require("../../conexion.php");
     //generar la instruccion SQL

     $sql = "select * from profesores where correo='$correo'";
     $sql2 = "select * from profesores where cin='$CIN'";
     mysqli_set_charset( $con, 'utf8');
     //ejecutar SQL
     $res = mysqli_query($con, $sql) or die ("Error: ". mysql_error());
     $res2 = mysqli_query($con, $sql2) or die ("Error: ". mysql_error());
     
     //procesar el resultado
     if(mysqli_fetch_array($res)){
         //ya existe un correo
         
         header('Location:profesores.php?e=1');
    
     }else{
        $sql = "insert into profesores(nombre,apellido,cin,correo,telefono)
        values('$nombre','$apellido','$CIN','$correo','$telefono')";
        $res = mysqli_query($con, $sql);

        $profe = mysqli_insert_id($con);
    
        //Los datos se ingresaron correctamente
        if ($ubi==1) {
            header('Location:../materias/materia.php?carrera='.$carrera.'&nombrec='.$nombrec.'&profe='.$profe.'&materia='.$_POST["materia"].'&semestres='.$_POST["semestres"]);
        }else {
            header('Location:profesores.php?e=0');
        }
        
        //printf("Errormessage: %s\n", mysqli_error($con));
         
     }
     //cerrar la conexión

    mysqli_close($con);
?>