//$(obtener_registros());

function obtener_informatica(materias) {
    $.ajax({
        url : 'consultamateria.php',
        type : 'POST',
        dataType : 'html',
        data : {materias: materias,carrera: 1},
    })

    .done(function(resultado) {
        $("#matinfor").html(resultado);
    })
}

function buscar(e) 
{
    var valorBusqueda=e.value;
    if (valorBusqueda!="") {
        obtener_informatica(valorBusqueda);
    } else {
        obtener_informatica();
    }
};

function obtener_civil(materias) {
    $.ajax({
        url : 'consultamateria.php',
        type : 'POST',
        dataType : 'html',
        data : {materias: materias,carrera: 2},
    })

    .done(function(resultado) {
        $("#matcivil").html(resultado);
    })
}

function buscarcivil(e) 
{
    var valorBusqueda=e.value;
    if (valorBusqueda!="") {
        obtener_civil(valorBusqueda);
    } else {
        obtener_civil();
    }
};

function obtener_electricidad(materias) {
    $.ajax({
        url : 'consultamateria.php',
        type : 'POST',
        dataType : 'html',
        data : {materias: materias,carrera: 3},
    })

    .done(function(resultado) {
        $("#matelectricidad").html(resultado);
    })
}

function buscarelectricidad(e) 
{
    var valorBusqueda=e.value;
    if (valorBusqueda!="") {
        obtener_electricidad(valorBusqueda);
    } else {
        obtener_electricidad();
    }
};

function obtener_electronica(materias) {
    $.ajax({
        url : 'consultamateria.php',
        type : 'POST',
        dataType : 'html',
        data : {materias: materias,carrera: 4},
    })

    .done(function(resultado) {
        $("#matelectronica").html(resultado);
    })
}

function buscarelectronica(e) 
{
    var valorBusqueda=e.value;
    if (valorBusqueda!="") {
        obtener_electronica(valorBusqueda);
    } else {
        obtener_electronica();
    }
};