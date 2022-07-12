<?php
    require("../../conexion.php");
    $semestre=$_POST['semestre'];
    $carrera=$_POST['carrera'];


    $sql = "SELECT mat.idmaterias,mat.nombre as materia,mat.idcarreras,mat.idSemestre,mat.idprofesores,carr.nombre as carrera,hor.idhorario_clase,
    hor.h_inicio,hor.h_final,hor.aula,hor.dia,sem.semestre
     from materias mat inner join carreras carr on carr.idcarreras = mat.idcarreras 
    inner join semestre sem on sem.idSemestre=mat.idSemestre
    left join horario_clase hor on mat.idmaterias=hor.idmaterias where mat.idcarreras=$carrera order by mat.idmaterias;";
    $table="";



    if (isset($_POST['materias'])) {
        $busqueda=$_POST['materias'];
        $sql = "SELECT mat.idmaterias,mat.nombre as materia,mat.idcarreras,mat.idSemestre,mat.idprofesores,carr.nombre as carrera,hor.idhorario_clase,
        hor.h_inicio,hor.h_final,hor.aula,hor.dia,sem.semestre
         from materias mat inner join carreras carr on carr.idcarreras = mat.idcarreras 
        inner join semestre sem on sem.idSemestre=mat.idSemestre
        left join horario_clase hor on mat.idmaterias=hor.idmaterias where mat.idcarreras=$carrera and (mat.nombre like '%$busqueda%' and mat.idSemestre like '%$semestre%') order by mat.idmaterias ;";
    };

    mysqli_set_charset( $con, 'utf8');
    $res= mysqli_query($con, $sql);
    if (mysqli_num_rows($res)>0) {
        $table='
        <table class="table table-hover text-center">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">MATERIA</th>
                <th class="text-center">CARRERA</th>
                <th class="text-center">SEMESTRE</th>
                <th class="text-center">DÍA</th>
                <th class="text-center">Horario Inicio</th>
                <th class="text-center">Horario Final</th>
                <th class="text-center">Aula</th>
                <th class="text-center">GUARDAR</th>
               
            
            </tr>
            </thead>
            
        ';

        while($reg=mysqli_fetch_array($res)){
			$table.="							
            <tbody>
            <tr>
            <td>".$reg["idmaterias"]."</td>
            <td>".$reg["materia"]."</td>
            <td>".$reg["carrera"]."</td>
            <td>".$reg["semestre"]."</td>
            <td><select  name='dia".$reg["idmaterias"]."' id='dia".$reg["idmaterias"]."'>
                <option value='inicio' >------</option>
                <option value='Lunes' ";
                if($reg['dia'] == 'Lunes'){ $table.= 'selected'; }
                $table.= ">Lunes</option>
                <option value='Martes' ";
                if($reg['dia'] == 'Martes'){ $table.= 'selected'; }
                $table.= ">Martes</option>
                <option value='Miercoles' ";
                if($reg['dia'] == 'Miercoles'){ $table.= 'selected'; }
                $table.= ">Miércoles</option>
                <option value='Jueves' ";
                if($reg['dia'] == 'Jueves'){ $table.= 'selected'; }
                $table.= ">Jueves</option>
                <option value='Viernes' ";
                if($reg['dia'] == 'Viernes'){ $table.= 'selected'; }
                $table.= ">Viernes</option>
                <option value='Sabado' ";
                if($reg['dia'] == 'Sabado'){ $table.= 'selected'; }
                $table.= ">Sábado</option>
            </select></td>
            <td><input type='time' name='inicio".$reg["idmaterias"]."' id='inicio".$reg["idmaterias"]."' value='".$reg["h_inicio"]."'></td>
            <td><input type='time' name='final".$reg["idmaterias"]."' id='final".$reg["idmaterias"]."' value='".$reg["h_final"]."'></td>
            <td><input type='text' name='aula".$reg["idmaterias"]."' id='aula".$reg["idmaterias"]."' value='".$reg["aula"]."'></td>
            <td>";

            if (isset($reg["idhorario_clase"])) {
                $table.= "<section id='agregarmodificar".$reg["idmaterias"]."'><button class='btn btn-outline-success btn-sm' onclick='modificarhorario(".$reg["idmaterias"].")'><i class='zmdi zmdi-refresh zmdi-hc-lg'></i></button></section>";
                
            }else{
                $table.= "<section id='agregarmodificar".$reg["idmaterias"]."'><button class='btn btn-outline-success btn-sm' onclick='registrarhorario(".$reg["idmaterias"].")'><i class='zmdi zmdi-check zmdi-hc-lg'></i></button></section>";
            }

            
            
            $table.= "</td>
            <td>
            <input type='hidden' name='carrera".$reg["idmaterias"]."' id='carrera".$reg["idmaterias"]."' value='".$reg["idcarreras"]."'>
            <input type='hidden' name='semestre".$reg["idmaterias"]."' id='semestre".$reg["idmaterias"]."' value='".$reg["idSemestre"]."'>
            <input type='hidden' name='semestre".$reg["idmaterias"]."' id='profesor".$reg["idmaterias"]."' value='".$reg["idprofesores"]."'>
            ";

           
        

        
                    
            
            
            $table.= '</td>
            </tr>
            </tbody>';
        }
        
    }else {
        $table='Sin resultados para su busqueda';
    };

    echo $table;
?>