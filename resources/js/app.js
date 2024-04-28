import './bootstrap';
import 'toastr/toastr.scss'; // Import toastr styles
import toastr from 'toastr'; // Import toastr JavaScript

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.toastr = toastr; // Assign toastr to the window object for global access
