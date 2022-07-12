<?php
   
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $CIN=$_POST["cin"];
    $direccion=$_POST["direccion"];
    $telefono=$_POST["telefono"];
    $correo=$_POST["correo"];
    $contra=$_POST["contra"];
    $carrera=$_POST["carreras"];
    $semestre=$_POST["semestres"];
    

     //conectar
     require("../conexion.php");
     //generar la instruccion SQL

     $sql = "select * from alumnos where Correo='$correo'";
     mysqli_set_charset( $con, 'utf8');
     //ejecutar SQL
     $res = mysqli_query($con, $sql) or die ("Error: ". mysql_error());
     
     //procesar el resultado
     if(mysqli_fetch_array($res)){
         //Los datos se ingresaron correctamente
         
         header('Location:alumno.php?e=1');
        
         
     }else{
        $sql = "insert into alumnos(Nombre,Apellido,CIN,Correo,Direccion,Telefono,Contra,idcarreras,dSemestre)
        values('$nombre','$apellido','$CIN','$correo','$direccion','$telefono','$contra','$carrera','$semestre')";
        $res = mysqli_query($con, $sql);
        //echo '<script>alert("Registro Exitosos");</script>';
        header('Location:alumno.php?e=0');
        //printf("Errormessage: %s\n", mysqli_error($con));
         
     }
     //cerrar la conexión

    mysqli_close($con);
?>