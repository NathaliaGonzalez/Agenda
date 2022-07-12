<?php
    require("../../conexion.php");
    $carrera=$_POST['carrera'];
    $sql= "SELECT m.idmaterias, m.nombre as materia, c.nombre as carrera, s.semestre, p.nombre, p.apellido FROM materias m
    inner join carreras c on m.idcarreras=c.idcarreras
    inner join semestre s on m.idSemestre=s.idSemestre
    inner join profesores p on m.idprofesores=p.idprofesores
    where c.idcarreras=$carrera;";
    $table="";



    if (isset($_POST['materias'])) {
        $busqueda=$_POST['materias'];
        $sql= "SELECT m.idmaterias, m.nombre as materia, c.nombre as carrera, s.semestre, p.nombre, p.apellido FROM materias m
        inner join carreras c on m.idcarreras=c.idcarreras
        inner join semestre s on m.idSemestre=s.idSemestre
        inner join profesores p on m.idprofesores=p.idprofesores
        where c.idcarreras='$carrera' and m.nombre like '%$busqueda%';";
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
                <th class="text-center">PROFESOR</th>
                <th class="text-center">A. DATOS</th>
                <th class="text-center">ELIMINAR</th>
            
            </tr>
            </thead>
            
        ';

        while ($reg=mysqli_fetch_array($res)) {
            $table.='
            <tbody>
            <tr>
            <td>'.$reg["idmaterias"].'</td>
            <td>'.$reg["materia"].'</td>
            <td>'.$reg["carrera"].'</td>
            <td>'.$reg["semestre"].'</td>
            <td>'.$reg["nombre"].' '.$reg["apellido"].'</td>
            <td>
            <a href="actualizarmateria.php?idmaterias='.$reg["idmaterias"].'" class="btn btn-success btn-raised btn-xs">
                <i class="zmdi zmdi-refresh"></i>
            </a></td>
            <td>
            <form>
                <a href="eliminarmateria.php?idmaterias='.$reg["idmaterias"].'"
                
                onclick="return confirm(
                ';
            
            $table.="
            'Estás seguro que deseas eliminar el registro?')
            ";
            

           
            $table.='
                " class="btn btn-danger btn-raised btn-xs">
                <i class="zmdi zmdi-delete"></i>
                </a>
                    
                </form></td>
                </tr>
               
            ';

       
                    
            

        
        };
        $table.='
        </tbody>
        </table>
        ';

        
    }else {
        $table='Sin resultados para su busqueda';
    };

    echo $table;
?>