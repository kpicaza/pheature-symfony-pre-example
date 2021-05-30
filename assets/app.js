/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

import Popper from  'popper.js';
global.Popper = Popper;
const $ = require('jquery');
global.$ = global.jQuery = $;
require('bootstrap-material-design');
import 'bootstrap-material-design/dist/css/bootstrap-material-design.min.css';
import './styles/app.scss'

$(document).ready(function() { $('body').bootstrapMaterialDesign(); });
