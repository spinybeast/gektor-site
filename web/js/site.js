// listen click, open modal and .load content
$('#modalButton').click(function () {
    $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));
});

    $(document).on('submit', '#contact-form', function (e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: "/submit-message",
            type: "POST",
            data: form.serialize(),
            success: function (result) {
                if (result == 'true') {
                    var modalContainer = $('#modal');
                    var modalBody = modalContainer.find('.modal-body');
                    modalBody.html(result).hide().fadeIn();
                } else {
                    var modalContainer = $('#modal');
                    var modalBody = modalContainer.find('.modal-body');
                    modalBody.html(result).hide().fadeIn();
                }
            }
        });
    });

