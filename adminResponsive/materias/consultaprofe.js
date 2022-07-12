$(obtener_registros());

function obtener_registros(profesores) {
    
    $.ajax({
        url : 'consultaprofe.php',
        type : 'POST',
        dataType : 'html',
        data : {profesores: profesores,carrera: $("#carrera").val(),nombrec: $("#nombrec").val(),nombre: $("#nombre").val(),semestres: $("#semestres").val(),prof: $("#prof").val() },
    })

    .done(function(resultado) {
        $("#selectprof").html(resultado);
    });

   
}

function buscar(e) 
{
    

    


    var valorBusqueda=e.value;
    
    if (valorBusqueda!="") {
        obtener_registros(valorBusqueda);
    } else {
        obtener_registros();
    }
};