<?php
    header('Content-Type: aplication/json');
    $alumno = $_GET['idalumno'];

    require("../conexion.php");

    $sql = "SELECT * FROM recordatorio where alumnos_idAlumnos=$alumno";
    mysqli_set_charset( $con, 'utf8');
    $res = mysqli_query($con, $sql);
    
    $sql2 = "SELECT alum.idAlumnos,hor.*,mat.nombre,concat(prof.nombre,' ',prof.apellido) as profesor FROM alumnos alum 
    inner join e_final hor on alum.dSemestre = hor.idSemestre and alum.idcarreras = hor.idcarreras
    INNER JOIN materias mat on mat.idmaterias = hor.idmaterias 
    INNER JOIN profesores prof ON prof.idprofesores = hor.idprofesores where idAlumnos=$alumno order by hor.fecha asc";
    
    $res2 = mysqli_query($con, $sql2);


    $eventos = array();
    if (mysqli_num_rows($res) > 0) {
        while($row = mysqli_fetch_assoc($res)){
            if ($row["hora"] != "") {
                $fecha = $row["fecha"]."T".$row["hora"];
            }else {
                $fecha = $row["fecha"];
            }
            $eventos[] = array(
          'title'   => $row["nombre"],
          'start'   => $fecha,
          //'end'   => $row["end"]
          'description' => $row["descripcion"],
          'recordatorio' => $row["tipo_recordatorio"],
          'hora' => $row["hora"],
          'fecha' => $row["fecha"],
          'idrecordatorio'   => $row["idrecordatorio"]
        );
        }
    }
    if (mysqli_num_rows($res2) > 0) {
        while($row = mysqli_fetch_assoc($res2)){
            if ($row["horario"] != "") {
                $fecha = $row["fecha"]."T".$row["horario"];
            }else {
                $fecha = $row["fecha"];
            }
            $eventos[] = array(
          'title'   => $row["nombre"],
          'start'   => $fecha,
          'color' =>'#FF0000', 
          //'end'   => $row["end"]
          'recordatorio' => 'si',
          'description' => "Examen Final con: ".$row["profesor"],
          'hora' => $row["horario"],
          'fecha' => $row["fecha"],
          'idrecordatorio'   => $row["ide_final"],
          'tiporecor' => 'exfinal'
        );
        }
    }


    echo json_encode($eventos);
?>