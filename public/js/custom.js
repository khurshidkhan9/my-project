$('#recipeCarousel').carousel({
    interval: 10000
})

$('.carousel .carousel-item').each(function () {
    var minPerSlide = 3;
    var next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i = 0; i < minPerSlide; i++) {
        next = next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }

        next.children(':first-child').clone().appendTo($(this));
    }
});


// /////////////////////////////profile image upload with ajax
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#upload-image-form').submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    $('#image-input-error').text('');

    $.ajax({
        type: 'POST',
        url: ``,
        data: formData,
        contentType: false,
        processData: false,
        success: (response) => {
            if (response) {
                this.reset();
                alert('Image has been uploaded successfully');
            }
        },
        error: function (response) {
            console.log(response);
            $('#image-input-error').text(response.responseJSON.errors.file);
        }
    });
});




// ////////////////////////
$(document).ready(function () {
    $("#newsletterform").submit(function (event) {
        var formData = {
            email: $("input[name=email]").val(),
            "_token": $('_token').val(),
        };

        $.ajax({
            type: "POST",
            url: "./newsletter",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function (response) {
            if (response['success']) {
                $('#message').html("<div class='alert alert-success error' id='message' role='alert'>" + response['success'] + "</div>");
            } else if (response['error']) {
                $('#message').html("<div class='alert alert-danger error' id='message' role='alert'>" + response['error'] + "</div>");
            }
            return false;

        });

        event.preventDefault();
    });
});
