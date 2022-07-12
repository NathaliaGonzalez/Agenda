<?php
    
    
   
        $alumno=$_POST["alumno"];
        $tabla="";

    

    require("../conexion.php");

        $sql2="SELECT * FROM notas_personales where alumnos_idAlumnos=$alumno";
        mysqli_set_charset( $con, 'utf8');
        $res2 = mysqli_query($con, $sql2);

        if(mysqli_num_rows($res2)>0){
            while($reg2=mysqli_fetch_array($res2)){
                $tabla .='<div class="col-lg-4" id="notas'.$reg2["idNotas_personales"].'">
                            <div class="card card-margin">
                                <div class="card-header no-border">
                                
                                    <h5>FECHA: '.$reg2["Fecha"].'</h5>
                                    
                                </div>
                                <div class="card-body pt-0">
                                <div class="widget-49">
                                    <div class="widget-49-title-wrapper">
                                            <div class="widget-49-meeting-info">
                                                <span class="widget-49-meeting-time">HORA:  '.$reg2["Hora"].'</span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <textarea  cols="30" rows="10" style="border: none; resize: none;" placeholder="'.$reg2["Descripcion"].'" readonly></textarea>
                                    <button style="border-radius: 100%; width:30px;" title="Eliminar" onclick="alertaeliminar('.$reg2["idNotas_personales"].')"><i class="zmdi zmdi-minus"></i></button>
                                </div>
                                
                            </div>
                        </div>';
            }
            
        }

        echo $tabla;
     
    mysqli_close($con);
    
?>