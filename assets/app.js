import './bootstrap.js';
import './scripts/color-modes.js';

import './styles/bootstrap.min.css';
import './styles/bootstrap-icons.min.css';
import './vendor/@fortawesome/fontawesome-svg-core/styles.min.css';
import './fontawesome/css/fontawesome.min.css';
import './fontawesome/css/brands.min.css';
import './fontawesome/css/regular.min.css';
import './fontawesome/css/solid.min.css';
import './styles/form-signin.css';
import './styles/app.css';

import { library, dom } from '@fortawesome/fontawesome-svg-core';
import { fab } from '@fortawesome/free-brands-svg-icons';
import { far } from '@fortawesome/free-regular-svg-icons';
import { fas } from '@fortawesome/free-solid-svg-icons';

library.add(fas, far, fab);
dom.watch();

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
