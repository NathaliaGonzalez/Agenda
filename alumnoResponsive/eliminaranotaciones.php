<?php

    $anotaciones=$_POST["anotacion"];
    
    

    require("../conexion.php");
    $sql="delete from notas_personales where idNotas_personales=$anotaciones";
    mysqli_set_charset( $con, 'utf8');      
    $res = mysqli_query($con, $sql);

    mysqli_close($con);
    
?>