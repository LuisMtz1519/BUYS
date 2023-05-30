$(document).ready(function() {
    $('.boleto').on('click', function() {
        var idBoleto = $(this).data('id');
        var botonBoleto = $(this);

        $.ajax({
            url: 'comprar_boleto.php',
            type: 'POST',
            data: {id: idBoleto},
            success: function(response) {
                // Eliminar el boleto de la lista
                botonBoleto.remove();

                // Mostrar mensaje de éxito
                alert(response);
            },
            error: function() {
                alert('Error al comprar el boleto');
            }
        });
    });
});
