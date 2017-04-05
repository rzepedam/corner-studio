$('#region_id').change(function(){

    $.get('/loadProvinces',
        { id: $('#region_id').val() },
        function(data) {
            $('#province_id').empty();
            $('#province_id').append("<option value='provincia'>Seleccione Provincia...</option>");
            $('#commune_id').empty();
            $('#commune_id').append("<option value=''>Seleccione Comuna...</option>");
            $.each(data, function(key, element) {
                $('#province_id').append("<option value='" + key + "'>" + element + "</option>");
            });
        }
    );
});


$('#province_id').change(function(){

    if ($('#province_id').val() == 'provincia') {
        $('#commune_id').empty();
        $('#commune_id').append("<option value=''>Seleccione Comuna...</option>");
    }else {
        $.get('/loadCommunes',
            { id: $('#province_id').val() },
            function(data) {
                $('#commune_id').empty();
                $.each(data, function(key, element) {
                    $('#commune_id').append("<option value='" + key + "'>" + element + "</option>");
                });
            }
        );
    }
});