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