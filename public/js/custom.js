$('#recipeCarousel').carousel({
    interval: 10000
  })
  
  $('.carousel .carousel-item').each(function(){
      var minPerSlide = 3;
      var next = $(this).next();
      if (!next.length) {
      next = $(this).siblings(':first');
      }
      next.children(':first-child').clone().appendTo($(this));
      
      for (var i=0;i<minPerSlide;i++) {
          next=next.next();
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

$('#upload-image-form').submit(function(e) {
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
        error: function(response) {
            console.log(response);
            $('#image-input-error').text(response.responseJSON.errors.file);
        }
    });
});