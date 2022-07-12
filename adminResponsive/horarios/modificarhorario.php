<?php
    if (isset($_POST["materias"])) {
        $materia = $_POST["materias"];
    }else{
        $materia="";
    }
    
   
        $dia=$_POST["dia"];
    

    
        $inicio=$_POST["inicio"];
    

    
        $final=$_POST["final"];
    

    
        $aula=$_POST["aula"];
    

    
        $carrera=$_POST["carrera"];
    

   
        $semestre=$_POST["semestre"];
    
   
        $profesor=$_POST["profesor"];
    

    require("../../conexion.php");
    if(isset($_POST["inicio"])&& isset($_POST["dia"])&& isset($_POST["final"])){
        if ($_POST["inicio"] != "" && $_POST["final"] != ""&&$_POST["dia"]!="inicio") {
            $sql = "update horario_clase set h_inicio='$inicio', h_final='$final', aula='$aula',dia='$dia', idmaterias='$materia',idcarreras='$carrera',idSemestre='$semestre',idprofesores='$profesor' where idmaterias='$materia'";
            mysqli_set_charset( $con, 'utf8');
            $res = mysqli_query($con, $sql);

            echo $materia;
        }

    }

    
     
    mysqli_close($con);
    
?>