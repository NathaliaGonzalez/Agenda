<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registrar Alumnos</title>
</head>
<body>
    <div class="container">
        <div class="title">Registrar Alumno</div>
        <form id="#" onsubmit="verificarPasswords(); return false" method="POST" action="insertaralumnos.php">
            <div class="user-details">
                <div class="input-box">
                    <span class=details>Nombre</span>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre *" maxlength="30" required>
                </div>
                <div class="input-box">
                    <span class=details>Apellido</span>
                    <input type="text" name="apellido" id="apellido" placeholder="Apellido *" maxlength="30" required>
                </div>
                <div class="input-box">
                    <span class=details>Cedula de Identidad</span>
                    <input type="text" name="cin" id="cin" placeholder="CIN *" maxlength="20" required>
                </div>
                
                <div class="input-box">
                    <span class=details>Direccion</span>
                    <input type="text" name="direccion" id="direccion" placeholder="Direccion" maxlength="40">
                </div>
                <div class="input-box">
                    <span class=details>Telefono</span>
                    <input type="tel" placeholder="Telefono" name="telefono" id="telefono" pattern="[0-9]{10}" maxlength="15">
                </div>
                <div class="input-box">
                    <span class=details>Correo Electronico</span>
                    <input type="email" name="correo" id="correo" placeholder="Correo *" maxlength="40" required>
                </div>
                <div class="input-box">
                    <span class=details>Contraseña</span>
                    <input type="password" name="contra" id="contra" placeholder="Contraseña *" minlength="8" maxlength="40" required>
                </div>
                <div class="input-box">
                    <span class=details>Confirmar Contraseña</span>
                    <input type="password" name="confirmar" id="confirmar" placeholder="Confirmar Contraseña *" minlength="8" maxlength="40" required>
                </div>
                <div class="input-box">
                    <span class=details>Carrera</span>
                        <select name="carreras" id="carreras" required>
                            <option value="" disabled selected>Seleccione una carrera*</option>
                            <?php 
                                    //01-conectar
                                    require("../conexion.php");
                                    //02-generar instruccion SQL
                                    $sql = "SELECT * from carreras";
                                    mysqli_set_charset( $con, 'utf8');
                                    //03-ejecutar SQL (matriz de resultado)
                                    $res = mysqli_query($con,$sql);
                                    //04-procesa el resultado
                                    
                                    if(mysqli_num_rows($res)>0){
                                        //recorrer cada fila de la matriz
                                        
                                        while($reg=mysqli_fetch_array($res)){
                                            echo "<option value='".$reg['idcarreras']."'>".$reg['nombre']."</option>";
                                           
                                        }
                                        //liberamos la variable(solo con sentencia SQL de tipo select)
                                        mysqli_free_result($res);
                                        echo "</table>";
                                    }
                            ?> 
                        </select>
                </div>
                <div class="input-box">
                    <span class=details>Semestre</span>
                        <select name="semestres" id="semestres" required>
                            <option value="" disabled selected>Seleccione un semestre*</option>
                            <?php 
                                    
                                    //02-generar instruccion SQL
                                    $sql = "SELECT * from semestre";
                                    mysqli_set_charset( $con, 'utf8');
                                    //03-ejecutar SQL (matriz de resultado)
                                    $res = mysqli_query($con,$sql);
                                    //04-procesa el resultado
                                    
                                    if(mysqli_num_rows($res)>0){
                                        //recorrer cada fila de la matriz
                                        
                                        while($reg=mysqli_fetch_array($res)){
                                            echo "<option value='".$reg['idSemestre']."'>".$reg['semestre']."</option>";
                                           
                                        }
                                        //liberamos la variable(solo con sentencia SQL de tipo select)
                                        mysqli_free_result($res);
                                        echo "</table>";
                                    }
                            ?> 
                        </select>
                </div>
            </div>
            <div id="msg"></div>
            <!-- Mensajes de Verificación -->
            <div id="error" class="alert alert-danger ocultar" role="alert">
                Las Contraseñas no coinciden, vuelve a intentar !
            </div>
            <div id="ok" class="alert alert-success ocultar" role="alert">
                Las Contraseñas coinciden ! (Procesando formulario ... )
            </div>
            <div class="button">
                <input type="submit" value="Registrar" id="registrar" >
            </div>
            <div >
                <a href="../loginResponsive/index.php">Cancelar</a>
            </div>
            
        
            <?php 
            if(isset($_GET["e"])){
                if($_GET["e"]=="0") {
                    echo "<br>";
                        echo "
                        <script>
                            setTimeout(function(){
                                window.location.replace('../loginResponsive/index.php');
                            }, 3000);
                        </script>
                        ";		
                }else {
                    echo '<i>("El correo ya existe, Ingrese un correo nuevo")</i>';

                }
            }
            ?>
        </form>
        </div>
        <script>
                nombre.addEventListener('input', sololetras);
                apellido.addEventListener('input', sololetras);
                function sololetras(e) {
                    let value = e.target.value;
                    e.target.value = value.replace(/[^A-Za-z ]/g, "");
                }
                document.getElementById("cin").addEventListener("input", (e) => {
                    let value = e.target.value;
                    e.target.value = value.replace(/[^0-9A-Za-z--]/g, "");
                }); 
                function verificarPasswords() {
                    pass1 = document.getElementById('contra');
                    pass2 = document.getElementById('confirmar');
                     // Verificamos si las constraseñas no coinciden 
                    if (pass1.value != pass2.value) {
                    
                        // Si las constraseñas no coinciden mostramos un mensaje 
                        document.getElementById("error").classList.add("mostrar");

                        return false;
                    } else {

                        // Si las contraseñas coinciden ocultamos el mensaje de error
                        document.getElementById("error").classList.remove("mostrar");

                    // Mostramos un mensaje mencionando que las Contraseñas coinciden 
                        document.getElementById("ok").classList.remove("ocultar");

                    // Desabilitamos el botón de login 
                        document.getElementById("registrar").disabled = true;

                    // Refrescamos la página (Simulación de envío del formulario)
                    setTimeout(function() {
                        document.getElementById("#").submit();
                    }, 3000); 
                        return true;
                    }
                }     

            </script>
</body>
</html>
<style>

@media (max-width: 584px){
    .container{
        max-width: 100%;
    }
    form .user-details .input-box{
        margin-bottom: 15px;
        width: 100%;
    }
     form .user-details{
        max-height: 300px;
        overflow: scroll;
    }
    .user-details::-webkit-scrollbar{
        width: 0;
    }

}
</style>