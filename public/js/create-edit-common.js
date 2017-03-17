$('#btnSubmit').click(function (e) {

    e.preventDefault();

    var form   = $('#form-submit');
    var action = $('#form-submit').attr('action');
    var button = $(this);

    button.addClass('btn-success').html('<i class="mdi mdi-cached mdi-rotate-3d"></i> Guardando...');
    $.post(action,
        form.serialize(),
        function (response) {
            if (response.status) {
                window.location.href = response.url;
            } else {
                alert("Oops, ha ocurrido un error. No es posible conectar con el servidor.");
            }
        }).fail(function (response) {
            button.removeClass('btn-success').html('<i class="mdi mdi-floppy"></i> Guardar');
            var errors = $.parseJSON(response.responseText);
            $.each(errors, function (index, value) {
                $('#js').html('<i class="fa fa-times"></i> ' + value).removeClass('hide');
                $('#' + index).focus();
                return false;
            });
        }
    );
});
