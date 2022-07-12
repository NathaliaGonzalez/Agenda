function obtener_informatica(materias,semestre) {
    $.ajax({
        url : 'consultahorariofinal.php',
        type : 'POST',
        dataType : 'html',
        data : {materias: materias,carrera: '1',semestre: semestre},
    })

    .done(function(resultado) {
        $("#matinfor").html(resultado);
        
    })
    
}

function filtrosemestre(e) {
    var valorSemestre=e;
    var valorBusqueda= $('#search1').val();
    
   
    obtener_informatica(valorBusqueda,valorSemestre);
}

function buscarinformatica(e) 
{
    var valorBusqueda=e.value;
    var valorSemestre= $('#semestres').val();
    
   
        obtener_informatica(valorBusqueda,valorSemestre);
    
    
    
};

function obtener_civil(materias,semestre) {
    $.ajax({
        url : 'consultahorariofinal.php',
        type : 'POST',
        dataType : 'html',
        data : {materias: materias,carrera: 2,semestre: semestre},
    })

    .done(function(resultado) {
        $("#matcivil").html(resultado);
    })
}
function filtrosemestrecivil(e) {
    var valorSemestre=e;
    var valorBusqueda= $('#search2').val();
    
   
    obtener_civil(valorBusqueda,valorSemestre);
}

function buscarcivil(e) 
{
    var valorBusqueda=e.value;
    var valorSemestre= $('#semestrecivil').val();
    
    obtener_civil(valorBusqueda,valorSemestre);
    
};

function obtener_electricidad(materias,semestre) {
    $.ajax({
        url : 'consultahorariofinal.php',
        type : 'POST',
        dataType : 'html',
        data : {materias: materias,carrera: 3,semestre: semestre},
    })

    .done(function(resultado) {
        $("#matelectricidad").html(resultado);
    })
}
function filtrosemestreelectricidad(e) {
    var valorSemestre=e;
    var valorBusqueda= $('#search3').val();
    
   
    obtener_electricidad(valorBusqueda,valorSemestre);
}

function buscarelectricidad(e) 
{
    var valorBusqueda=e.value;
    var valorSemestre= $('#semestreelectricidad').val();
    obtener_electricidad(valorBusqueda,valorSemestre);
    
};

function obtener_electronica(materias, semestre) {
    $.ajax({
        url : 'consultahorariofinal.php',
        type : 'POST',
        dataType : 'html',
        data : {materias: materias,carrera: 4,semestre: semestre},
    })

    .done(function(resultado) {
        $("#matelectronica").html(resultado);
    })
}
function filtrosemestreelectronica(e) {
    var valorSemestre=e;
    var valorBusqueda= $('#search4').val();
    
   
    obtener_electronica(valorBusqueda,valorSemestre);
}

function buscarelectronica(e) 
{
    var valorBusqueda=e.value;
    var valorSemestre= $('#semestreelectronica').val();
    obtener_electronica(valorBusqueda,valorSemestre);
    
    
};
