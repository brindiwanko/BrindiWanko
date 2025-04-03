/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './vendor/bootstrap/dist/css/bootstrap.min.css';
import './vendor/@fortawesome/fontawesome-svg-core/styles.min.css';
import './fontawesome/css/fontawesome.min.css';
import './fontawesome/css/brands.min.css';
import './fontawesome/css/regular.min.css';
import './fontawesome/css/solid.min.css';
import './styles/navbar-top-fixed.css';
import './styles/form-signin.css';
import './styles/app.css';

import './vendor/@popperjs/core/core.index.js';
import './vendor/bootstrap/bootstrap.index.js';

import { library, dom } from '@fortawesome/fontawesome-svg-core';
import { fab } from '@fortawesome/free-brands-svg-icons';
import { far } from '@fortawesome/free-regular-svg-icons';
import { fas } from '@fortawesome/free-solid-svg-icons';

library.add(fas, far, fab);
dom.watch();

// console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
