<?php
    $idrecordatorio = $_POST['idrecordatorio'];
    require("../conexion.php");

    $sql = "DELETE FROM recordatorio where idrecordatorio=$idrecordatorio";
    mysqli_set_charset( $con, 'utf8');
    $res = mysqli_query($con, $sql);

    mysqli_close($con);
?>