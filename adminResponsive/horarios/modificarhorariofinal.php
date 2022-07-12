<?php
    if (isset($_POST["materias"])) {
        $materia = $_POST["materias"];
    }else{
        $materia="";
    }
    
        $fecha=$_POST["fecha"];
        

        
        $horario=$_POST["horario"];



        $oportunidad=$_POST["oportunidad"];

    
        $aula=$_POST["aula"];
    

    
        $carrera=$_POST["carrera"];
    

   
        $semestre=$_POST["semestre"];
    
   
        $profesor=$_POST["profesor"];
    

    require("../../conexion.php");
    if(isset($_POST["fecha"])&& isset($_POST["horario"])&& isset($_POST["oportunidad"])){
        if ($_POST["fecha"] != "" && $_POST["horario"] != ""&&$_POST["oportunidad"]!="inicio") {
            $sql = "update e_final set horario='$horario', oportunidad='$oportunidad', aula='$aula',fecha='$fecha', idmaterias='$materia',idcarreras='$carrera',idSemestre='$semestre',idprofesores='$profesor' where idmaterias='$materia' and idcarreras='$carrera'";
            mysqli_set_charset( $con, 'utf8');
            $res = mysqli_query($con, $sql);

            echo $materia;
        }

    }

    
     
    mysqli_close($con);
    
?>