function loadCidades() {
    var idEstado = $('#ddlEstado').val();
    if (idEstado >= 0) {
        $('#ddlCidade').html("<option value=\"-1\">Carregando...</option>");
        var url = 'carregaCidades.php?idEstado=' + idEstado;
        $.get(url, function(dataReturn) {
            $('#ddlCidade').html(dataReturn);
        });
    }
    else{
       $('#ddlCidade').html("<option value=\"-1\">Selecione o Estado</option>"); 
    }
}