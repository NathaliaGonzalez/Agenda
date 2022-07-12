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
    $idalumno = $_POST['idalumno'];

    require("../conexion.php");

    $sql = "insert into recordatorio(nombre,tipo_recordatorio,descripcion,fecha,hora,alumnos_idAlumnos)
        values('$title','$notificacion','$description','$start','$hora','$idalumno')";
    mysqli_set_charset( $con, 'utf8');

    $res = mysqli_query($con, $sql);

    mysqli_close($con);

    echo $res;

?>