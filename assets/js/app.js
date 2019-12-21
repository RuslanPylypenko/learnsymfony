/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
import '../css/app.scss'

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
import $ from 'jquery';

import 'popper.js';

import "bootstrap";


$('.news-item').each(function (key, element) {

   let cHeight = $(element).find('.news-title').outerHeight();
   let allHeight = $('.news-item .news-title').height();
   if(cHeight > allHeight ) $('.news-item .news-title').height(cHeight + 20);

});

$(document).on("click", ".browse", function() {
   var file = $(this).parents().find(".file");
   file.trigger("click");
});
$('input[type="file"]').change(function(e) {
   var fileName = e.target.files[0].name;
   $(this).parent().find('label').html(fileName);

   var reader = new FileReader();
   reader.onload = function(e) {
      // get loaded data and render thumbnail.
      document.getElementById("preview").src = e.target.result;
   };
   // read the image file as a data URL.
   reader.readAsDataURL(this.files[0]);
});