// listen click, open modal and .load content
$('#modalButton').click(function () {
    $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));
});

$('#searchButton').click(function () {
    return $('#query').is(':empty');
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

$(window).load(function () {
    var maxH = 0;
    var item = $('div.owl-item > div');
    item.each(function () {
        if ($(this).height() > maxH) {
            maxH = $(this).height()
        }
        $(this).width($(this).parent().width());
    });
    item.height(maxH);
});
$(function() {
    $('.logos-carousel').owlCarousel({
        pagination: false,
        items: 7,
        loop: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplaySpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 6
            }
        }

    });

    $(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
        console.log("beforeInsert");
    });

    $(".dynamicform_wrapper").on("afterInsert", function(e, item) {
        console.log("afterInsert");
    });

    $(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
        if (! confirm("Are you sure you want to delete this item?")) {
            return false;
        }
        return true;
    });

    $(".dynamicform_wrapper").on("afterDelete", function(e) {
        console.log("Deleted item!");
    });

    $(".dynamicform_wrapper").on("limitReached", function(e, item) {
        alert("Limit reached");
    });
});
