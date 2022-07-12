<?php
    require("../../conexion.php");
    $sql= "SELECT * FROM profesores;";
    $select="";
    

    if (isset($_POST['profesores'])) {
        $busqueda=$_POST['profesores'];
        $sql= "SELECT * FROM profesores where nombre LIKE '%$busqueda%';";
    };
    mysqli_set_charset( $con, 'utf8');
    $res= mysqli_query($con, $sql);
    if (mysqli_num_rows($res)>0) {
        $select='
            <select size="5" name="profesores" id="profesores" class="form-control" rows="2" maxlength="100" required>
            <option value="" disabled selected>Seleccione Profesor de la materia*</option>
            
        ';

        while ($reg=mysqli_fetch_array($res)) {
            
            $select.='
                <option value="'.$reg["idprofesores"].'"';

            if ($reg["idprofesores"]==$_POST["prof"]) {
                $select.=' selected';
            };

            $select.='>'.$reg["nombre"].' '.$reg["apellido"].'</option>
            ';
        };

        $select.='</select>';
    }else {
        $select='Sin resultados... Desea registrar un profesor? <a title="Registrar profesor" style="FONT-SIZE: 15pt; padding: 5px 15px;border-radius: 100px;" class="btn btn-info btn-raised btn-sm" href="../profesores/profesores.php?ubi=1&carrera='.$_POST['carrera'].'&nombrec='.$_POST['nombrec'].'&nombre='.$_POST['nombre'].'&semestres='.$_POST['semestres'].'">+</a>';
    };

    echo $select;
?>