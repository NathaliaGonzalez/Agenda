<?php
    require("../../conexion.php");
    $semestre=$_POST['semestre'];
    $carrera=$_POST['carrera'];
    $sql = "SELECT mat.idmaterias,mat.nombre as materia,mat.idcarreras,mat.idSemestre,mat.idprofesores,carr.nombre as carrera,hor.ide_final,
    hor.fecha,hor.oportunidad,hor.aula,hor.horario,sem.semestre
     from materias mat inner join carreras carr on carr.idcarreras = mat.idcarreras 
    inner join semestre sem on sem.idSemestre=mat.idSemestre
    left join e_final hor on mat.idmaterias=hor.idmaterias where mat.idcarreras=$carrera order by mat.idmaterias;";
    $table="";



    if (isset($_POST['materias'])) {
        $busqueda=$_POST['materias'];
        $sql = "SELECT mat.idmaterias,mat.nombre as materia,mat.idcarreras,mat.idSemestre,mat.idprofesores,carr.nombre as carrera,hor.ide_final,
        hor.fecha,hor.oportunidad,hor.aula,hor.horario,sem.semestre
         from materias mat inner join carreras carr on carr.idcarreras = mat.idcarreras 
        inner join semestre sem on sem.idSemestre=mat.idSemestre
        left join e_final hor on mat.idmaterias=hor.idmaterias where mat.idcarreras=$carrera and (mat.nombre like '%$busqueda%' and mat.idSemestre like '%$semestre%') order by mat.idmaterias ;";
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
                <th class="text-center">OPORTUNIDAD</th>
                <th class="text-center">FECHA</th>
                <th class="text-center">HORARIO</th>
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
            <td><select  name='oportunidad".$reg["idmaterias"]."' id='oportunidad".$reg["idmaterias"]."'>
                <option value='inicio' >------</option>
                <option value='Primera' ";
                if($reg['oportunidad'] == 'Primera'){ $table.= 'selected'; }
                $table.= ">Primera</option>
                <option value='Segunda' ";
                if($reg['oportunidad'] == 'Segunda'){ $table.= 'selected'; }
                $table.= ">Segunda</option>
                <option value='Tercera' ";
                if($reg['oportunidad'] == 'Tercera'){ $table.= 'selected'; }
                $table.= ">Tercera</option>
            </select></td>
            <td><input type='date' name='fecha".$reg["idmaterias"]."' id='fecha".$reg["idmaterias"]."' value='".$reg["fecha"]."'></td>
            <td><input type='time' name='horario".$reg["idmaterias"]."' id='horario".$reg["idmaterias"]."' value='".$reg["horario"]."'></td>
            <td><input type='text' name='aula".$reg["idmaterias"]."' id='aula".$reg["idmaterias"]."' value='".$reg["aula"]."'></td>
            <td>";

            if (isset($reg["ide_final"])) {
                $table.= "<section id='agregarmodificar".$reg["idmaterias"]."'><button class='btn btn-outline-success btn-sm' onclick='modificarhorariofinal(".$reg["idmaterias"].")'><i class='zmdi zmdi-refresh zmdi-hc-lg'></i></button></section>";
                
            }else{
                $table.= "<section id='agregarmodificar".$reg["idmaterias"]."'><button class='btn btn-outline-success btn-sm' onclick='registrarhorariofinal(".$reg["idmaterias"].")'><i class='zmdi zmdi-check zmdi-hc-lg'></i></button></section>";
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