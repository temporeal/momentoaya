jQuery(document).ready(function($){
// Slideshows
var slideshows = $('.cycle-slideshow').on('cycle-next cycle-prev', function(e, opts) {
    // advance the other slideshow
    slideshows.not(this).cycle('goto', opts.currSlide);
});

$('#cycle-2 .cycle-slide').click(function(){
    var index = $('#cycle-2').data('cycle.API').getSlideIndex(this);
    slideshows.cycle('goto', index);
});

});

// Star review with Font Awesome
let ratingval = document.getElementById("post-rating").dataset.value;
document.getElementById("post-rating").innerHTML = getStars(ratingval);

function getStars(rating) {

  // Round to nearest half
  rating = Math.round(rating * 2) / 2;
  let output = [];

  // Append all the filled whole stars
  for (var i = rating; i >= 1; i--)
    output.push('<i class="fa fa-star" aria-hidden="true" style="color: gold;"></i>&nbsp;');

  // If there is a half a star, append it
  if (i == .5) output.push('<i class="fa fa-star-half-alt" aria-hidden="true" style="color: gold;"></i>&nbsp;');

  // Fill the empty stars
  for (let i = (5 - rating); i >= 1; i--)
    output.push('<i class="fa fa-star" aria-hidden="true" style="color: #c4c4c4;"></i>&nbsp;');
 // Push the value as text as well
  output.push('&nbsp;<span>'+ratingval+'</span>')
  return output.join('');

}