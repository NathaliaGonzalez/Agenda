<?php

    $carrera=$_POST["carrera"];
    
    

    require("../../conexion.php");
    $sql="delete from e_final where idcarreras=$carrera";
    mysqli_set_charset( $con, 'utf8');       
    $res = mysqli_query($con, $sql);

    mysqli_close($con);
    
?>