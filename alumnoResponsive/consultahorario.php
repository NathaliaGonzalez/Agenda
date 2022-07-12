<?php
    require("../conexion.php");
    $horario = array();
    $lunes = " ";
    $martes= " ";
    $miercoles= " ";
    $jueves= " ";
    $viernes=" ";
    $sabado=" ";
    $vacio = '<div class="widget-49-meeting-info" style="justify-content: center;">
                    <span class="widget-49-pro-title">No existen horarios para este dia.</span>
                </div>';

    $sql= "SELECT alum.idAlumnos,hor.*,mat.Nombre,concat(prof.nombre,' ',prof.apellido) as profesor FROM alumnos alum inner join horario_clase hor on alum.dSemestre = hor.idSemestre and alum.idcarreras = hor.idcarreras
    INNER JOIN materias mat on mat.idmaterias = hor.idmaterias INNER JOIN profesores prof ON prof.idprofesores = hor.idprofesores where idAlumnos=".$_POST["alumno"]." order by h_inicio;";
    mysqli_set_charset( $con, 'utf8');
    $res= mysqli_query($con, $sql);


    if (mysqli_num_rows($res)>0) {
        

        while ($reg=mysqli_fetch_array($res)) {
            if ($reg["dia"] == "Lunes") {
                $lunes.='<div class="widget-49">
                            <div class="widget-49-title-wrapper">
                                    <div class="widget-49-meeting-info">
                                        <span class="widget-49-pro-title">'.$reg["Nombre"].'.</span>
                                        <span class="widget-49-meeting-time">'.substr($reg["h_inicio"],0,-3).' hasta '.substr($reg["h_final"],0,-3).' Hrs</span>
                                    </div>
                                </div>
                                <ol class="widget-49-meeting-points" style="list-style-type: none;">
                                    <li class="widget-49-meeting-item"><span>Profesor: '.$reg["profesor"].'</span></li>
                                    <li class="widget-49-meeting-item"><span>Aula: '.$reg["aula"].'</span></li>
                                    
                                </ol>
                                
                            </div>
                        </div>';
            }

            if ($reg["dia"] == "Martes") {
                $martes.='<div class="widget-49">
                            <div class="widget-49-title-wrapper">
                                
                                <div class="widget-49-meeting-info">
                                    <span class="widget-49-pro-title">'.$reg["Nombre"].'.</span>
                                    <span class="widget-49-meeting-time">'.substr($reg["h_inicio"],0,-3).' hasta '.substr($reg["h_final"],0,-3).' Hrs</span>
                                </div>
                            </div>
                                    <ol class="widget-49-meeting-points" style="list-style-type: none;">
                                        <li class="widget-49-meeting-item"><span>Profesor: '.$reg["profesor"].'</span></li>
                                        <li class="widget-49-meeting-item"><span>Aula: '.$reg["aula"].'</span></li>
                                        
                                    </ol>
                                
                        </div>
                            ';
            }

            if ($reg["dia"] == "Miercoles") {
                $miercoles.='<div class="widget-49">
                                <div class="widget-49-title-wrapper">
                                    
                                    <div class="widget-49-meeting-info">
                                        <span class="widget-49-pro-title">'.$reg["Nombre"].'.</span>
                                        <span class="widget-49-meeting-time">'.substr($reg["h_inicio"],0,-3).' hasta '.substr($reg["h_final"],0,-3).' Hrs</span>
                                    </div>
                                </div>
                                <ol class="widget-49-meeting-points" style="list-style-type: none;">
                                    <li class="widget-49-meeting-item"><span>Profesor: '.$reg["profesor"].'</span></li>
                                    <li class="widget-49-meeting-item"><span>Aula: '.$reg["aula"].'</span></li>
                                    
                                </ol>
                                
                                
                            </div>';;
            }

            if ($reg["dia"] == "Jueves") {
                $jueves.='<div class="widget-49">
                                <div class="widget-49-title-wrapper">
                                    
                                    <div class="widget-49-meeting-info">
                                        <span class="widget-49-pro-title">'.$reg["Nombre"].'.</span>
                                        <span class="widget-49-meeting-time">'.substr($reg["h_inicio"],0,-3).' hasta '.substr($reg["h_final"],0,-3).' Hrs</span>
                                    </div>
                                </div>
                                <ol class="widget-49-meeting-points" style="list-style-type: none;">
                                    <li class="widget-49-meeting-item"><span>Profesor: '.$reg["profesor"].'</span></li>
                                    <li class="widget-49-meeting-item"><span>Aula: '.$reg["aula"].'</span></li>
                                    
                                </ol>
                                
                                
                            </div>';;
            }

            if ($reg["dia"] == "Viernes") {
                $viernes.='<div class="widget-49">
                                <div class="widget-49-title-wrapper">
                                    
                                    <div class="widget-49-meeting-info">
                                        <span class="widget-49-pro-title">'.$reg["Nombre"].'.</span>
                                        <span class="widget-49-meeting-time">'.substr($reg["h_inicio"],0,-3).' hasta '.substr($reg["h_final"],0,-3).' Hrs</span>
                                    </div>
                                </div>
                                <ol class="widget-49-meeting-points" style="list-style-type: none;">
                                    <li class="widget-49-meeting-item"><span>Profesor: '.$reg["profesor"].'</span></li>
                                    <li class="widget-49-meeting-item"><span>Aula: '.$reg["aula"].'</span></li>
                                    
                                </ol>
                                
                                
                            </div>';;
            }
            

            if ($reg["dia"] == "Sabado") {
                $sabado.='<div class="widget-49">
                                <div class="widget-49-title-wrapper">
                                    
                                    <div class="widget-49-meeting-info">
                                        <span class="widget-49-pro-title">'.$reg["Nombre"].'.</span>
                                        <span class="widget-49-meeting-time">'.substr($reg["h_inicio"],0,-3).' hasta '.substr($reg["h_final"],0,-3).' Hrs</span>
                                    </div>
                                </div>
                                <ol class="widget-49-meeting-points" style="list-style-type: none;">
                                    <li class="widget-49-meeting-item"><span>Profesor: '.$reg["profesor"].'</span></li>
                                    <li class="widget-49-meeting-item"><span>Aula: '.$reg["aula"].'</span></li>
                                    
                                </ol>
                                
                                
                            </div>';
            }


        };

    };

    if ($lunes == " ") {
        $lunes = $vacio; 
    };
    if ($martes == " ") {
        $martes = $vacio;
    };
    if ($miercoles == " ") {
        $miercoles = $vacio;
    };
    if ($jueves == " ") {
        $jueves = $vacio;
    };
    if ($viernes == " ") {
        $viernes = $vacio;
    };
    if ($sabado == " ") {
        $sabado = $vacio;
    };
    

    $horario['lunes'] = $lunes;
    $horario['martes'] = $martes;
    $horario['miercoles'] = $miercoles;
    $horario['jueves'] = $jueves;
    $horario['viernes'] = $viernes;
    $horario['sabado'] = $sabado;
    
    echo json_encode($horario);


?>