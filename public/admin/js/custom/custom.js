function showAlertFloating() {
     $(".alert-floating").fadeIn('slow', function () {
            $(this).delay(1500).fadeOut('slow');
    });
}

$('.btn-active').click(function () {
    var row = $(this).parents('tr');
    var id = row.data('id');
    var form = $('#form-active');
    var url = form.attr('action').replace(':VALUE_ID', id);
    var data = form.serialize();

    function animateFloating(message, classAlert)
    {
        $( "#content-message" ).append('<section class="alert-floating alert alert-dismissable"><p></p></section>' );
        $(".alert-floating p ").html(message);
        $(".alert-floating").addClass(classAlert);
        $(".alert-floating").fadeIn('slow', function () {
            $(this).delay(1500).fadeOut('slow');
        });
        row.fadeOut();
    }

    $.post(url, data, function (result) {
        animateFloating(result.message, result.class)
    }).fail(function () {
        animateFloating(result.message, "alert-danger")
    });
    
});

$('#create-button').click(function () {
    console.log('hola');

});
