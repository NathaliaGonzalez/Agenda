<?php
    $title = $_POST['title'];
    $start = $_POST['start'];
    if (isset($_POST['description'])) {
        $description = $_POST['description'];
    }else {
        $description = "";
    };
    if (isset($_POST['notificarme'])) {
        $notificacion = $_POST['notificarme'];
    }else {
        $notificacion = "no";
    };
    if (isset($_POST['hora'])) {
        $hora = $_POST['hora'];
    }else {
        $hora = "";
    };
    $idrecordatorio = $_POST['idrecordatorio'];

    require("../conexion.php");

    $sql = "UPDATE recordatorio SET nombre='$title',tipo_recordatorio='$notificacion',descripcion='$description',fecha='$start',hora='$hora' where idrecordatorio=$idrecordatorio";
    mysqli_set_charset( $con, 'utf8');
    $res = mysqli_query($con, $sql);

    mysqli_close($con);

    echo $sql;
    

?>