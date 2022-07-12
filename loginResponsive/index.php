<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>
	<div class="container">
		<div class="img">
			<img src="bg.png">
		</div>
		<div class="login-content">
			<form method="POST" action="controlarsesion.php">
				<img src="avatar.png">
				<h2 class="title">Bienvenido</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Correo</h5>
           		   		<input type="text" class="input" name="correo" value="" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Contra</h5>
           		    	<input type="password" class="input" name="password" value="" required>
            	   </div>
            	</div>
            	
            	<input id="ingresar" type="submit" class="btn" value="Ingresar">
				
				
				<button type="reset" class="btn" name="registrarse" onclick="location.href='../alumnoResponsive/registrar_alumno.php'">Registrarse</button>
				<?php 
					if(isset($_GET["e"])){
						if($_GET["e"]=="1") {
							echo "<br>";
							echo "<i>La contraseña es incorrecta...</i>";
						}else{
							echo "<br>";
							echo "<i>El usuario no existe...</i>";				
						}
					}
				?>
            </form>
			
        </div>
    </div>
    <script>
		const inputs = document.querySelectorAll(".input");

		function addcl(){
			let parent = this.parentNode.parentNode;
			parent.classList.add("focus");
		}

		function remcl(){
			let parent = this.parentNode.parentNode;
			if(this.value == ""){
				parent.classList.remove("focus");
			}
		}


		inputs.forEach(input => {
			input.addEventListener("focus", addcl);
			input.addEventListener("blur", remcl);
		});
	</script>

	
</body>
</html>
