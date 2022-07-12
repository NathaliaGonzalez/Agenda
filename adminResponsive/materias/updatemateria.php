<?php
    $id=$_POST["idmaterias"];
    $nombre=$_POST["nombre"];
    $profesor=$_POST["profesor"];
    //conectar
    require("../../conexion.php");

    $sql = "select * from materias where idmaterias='$id'";
    mysqli_set_charset( $con, 'utf8');

    $res = mysqli_query($con, $sql) or die ("Error: ". mysql_error());

    while($reg=mysqli_fetch_array($res)){
        $sql = "select * from materias where idcarreras='".$reg['idcarreras']."' and nombre='$nombre' and idmaterias!='$id'";

        
        $res = mysqli_query($con, $sql) or die ("Error: ". mysql_error());

        if(mysqli_fetch_array($res)){
            //echo "Los  incorrectamente";
            
            header('Location:actualizarmateria.php?e=0&idmaterias='.$id);
           
    
           // echo $sql;
            
        }else {
            $sql = "update materias set nombre='$nombre', idprofesores='$profesor' where idmaterias='$id'";
    
            $res = mysqli_query($con, $sql) or die ("Error: ". mysql_error());
            
            //procesar el resultado
        
            if (empty($res)){
                echo "no se pudo modificar";
            } else {
                header('Location:actualizarmateria.php?e=1&idmaterias='.$id);
                //echo "se pudo modificar";
            }
        };
    };

    

    



 //cerrar la conexión

mysqli_close($con);


    
?>
