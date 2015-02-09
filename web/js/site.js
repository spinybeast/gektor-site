// listen click, open modal and .load content
$('#modalButton').click(function () {
    $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));
});


    $('.change-password').click(function(event){
        event.preventDefault();

        var url = '/gektor-site/web/showmessageform';

        var modalContainer = $('#my-modal');
        var modalBody = modalContainer.find('.modal-body');
        var modalTitle = modalContainer.find('.modal-title');
        modalTitle.html('Update password');
        modalContainer.modal({show:true});
        $.ajax({
            url: url,
            type: "GET",
            data: {'userid':UserID},
            success: function (data) {
                $('.modal-body').html(data);
                modalContainer.modal({show:true});
            }
        });
    });
    $(document).on("submit", '.update-password-form', function (e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: "/basic/web/submitupdatepassword",
            type: "POST",
            data: form.serialize(),
            success: function (result) {
                console.log(result);
                if (result == 'true') {
                    $('#my-modal').modal('hide');
                }
                else {
                    var modalContainer = $('#my-modal');
                    var modalBody = modalContainer.find('.modal-body');
                    modalBody.html(result).hide().fadeIn();
                }
            }
        });
    });

