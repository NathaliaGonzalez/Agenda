<?php
   
    $nombre=$_POST["nombre"];
    $carrera=$_POST["carrera"];
    $semestre=$_POST["semestres"];
    $profesor=$_POST["profesores"];
    $nombrec=$_POST["nombrec"];

     //conectar
     require("../../conexion.php");
     //generar la instruccion SQL
     $sql = "select * from materias where nombre='$nombre' and idcarreras='$carrera'";
     mysqli_set_charset( $con, 'utf8');
     //ejecutar SQL
     $res = mysqli_query($con, $sql) or die ("Error: ". mysql_error());
     
     //procesar el resultado
     if(mysqli_fetch_array($res)){
         //echo "Los  incorrectamente";
         
         header('Location:materia.php?e=1&carrera'.$carrera.'&nombrec='.$nombrec);
        
         
     }else{

        $sql = "insert into materias(nombre,idcarreras,idSemestre,idprofesores)
        values('$nombre','$carrera','$semestre','$profesor')";
        $res = mysqli_query($con, $sql);
        echo '<script>alert("Registro Exitosos");</script>';
        //Los datos se ingresaron correctamente
        header('Location:materia.php?e=0&carrera='.$carrera.'&nombrec='.$nombrec);
        //printf("Errormessage: %s\n", mysqli_error($con));
    }
     //cerrar la conexión

    mysqli_close($con);
?>