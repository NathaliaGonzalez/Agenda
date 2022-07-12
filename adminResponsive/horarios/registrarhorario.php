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
            $sql="insert into horario_clase(h_inicio,h_final,aula,dia,idmaterias,idcarreras,idSemestre,idprofesores) values('$inicio','$final','$aula','$dia','$materia','$carrera','$semestre','$profesor')";
            mysqli_set_charset( $con, 'utf8');
            $res = mysqli_query($con, $sql);

            echo $materia;
        }

    }

    
     
    mysqli_close($con);
    
?>