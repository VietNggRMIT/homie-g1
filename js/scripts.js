$(".card-slider").each(function(i) {
    var carouselCard = $(this)
    //append number in ascending order to id of carousel
    carouselCard.attr('id', 'carouselControls' + i);
    var controlValue = $(this).attr('id');
    //select carousel control buttons
    var carouselBtn = carouselCard.children("button");
    //change button data accordingly
    carouselBtn.attr('data-bs-target', '#carouselControls' + i)
    // console.log(controlValue);
    // console.log(carouselBtn.data('bs-target'));
});