$(document).ready(function() {  
    var headId = document.querySelector('[data-headId]');
    $('#head-id').val(headId.getAttribute('data-headId'));

    var chestId = document.querySelector('[data-chestId]');
    $('#chest-id').val(chestId.getAttribute('data-chestId'));

    var legsId = document.querySelector('[data-legsId]');
    $('#legs-id').val(legsId.getAttribute('data-legsId'));
});

$(document).ready(function() {
    var carouselHead = $('#carouselHead').carousel();
  
    carouselHead.on('slide.bs.carousel', function(event) {
      var headId = $(event.relatedTarget).find('img').attr('data-headId');
      $('#head-id').val(headId);
    });

    var carouselChest = $('#carouselChest').carousel();
  
    carouselChest.on('slide.bs.carousel', function(event) {
      var chestId = $(event.relatedTarget).find('img').attr('data-chestId');
      $('#chest-id').val(chestId);
    });

    var carouselLegs = $('#carouselLegs').carousel();
  
    carouselLegs.on('slide.bs.carousel', function(event) {
      var legsId = $(event.relatedTarget).find('img').attr('data-legsId');
      $('#legs-id').val(legsId);
    });
  });