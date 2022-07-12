$(obtener_registros());

function obtener_registros() {
    
    $.ajax({
        url : 'consultahorario.php',
        type : 'POST',
        dataType : 'json',
        data : {alumno: $("#alumno").val() },
    })

    .done(function(resultado) {
        $("#lunes").html(resultado.lunes);
        $("#martes").html(resultado.martes);
        $("#miercoles").html(resultado.miercoles);
        $("#jueves").html(resultado.jueves);
        $("#viernes").html(resultado.viernes);
        $("#sabado").html(resultado.sabado);
    });

   
}