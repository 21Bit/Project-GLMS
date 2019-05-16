let mix = require('laravel-mix');

/// ================================================ ///
               /**  Back-end  ****/
/// ================================================ ///
mix.js('resources/assets/js/back-end.js', 'public/back-end/js')
   .sass('resources/assets/sass/back-end.scss', 'public/back-end/css');

mix.scripts([
   "public/back-end/js/back-end.js",
   "resources/back-end-assets/js/default.min.js",
   "resources/back-end-assets/js/pace.min.js",
   "resources/back-end-assets/js/app.min.js",
   "resources/back-end-assets/js/back-end-custom.js",
], 'public/back-end/js/vendor.js');

mix.styles([
   "public/back-end/css/back-end.css",
   'node_modules/jqueryui/jquery-ui.min.css',
   "resources/back-end-assets/css/style.min.css",
   "resources/back-end-assets/css/style-responsive.min.css",
   "resources/back-end-assets/css/orange.js",
], 'public/back-end/css/vendor.css');

/// ================================================ ///
               /** End of Back-end  ****/
/// ================================================ ///


/// ================================================ ///
               /**  Front-end  ****/
/// ================================================ ///
mix.js('resources/assets/js/front-end.js', 'public/front-end/js')
   .sass('resources/assets/sass/front-end.scss', 'public/front-end/css');

// mix.styles([
//    "resources/front-end-assets/css/bootstrap.min.css",
//    'resources/front-end-assets/css/bootstrap-4-utilities.min.css',
//    "public/plugins/font-awesome/css/font-awesome.min.css",
//    "public/plugins/animate/animate.min.css",
//    "resources/front-end-assets/css/style.css",
//    "resources/front-end-assets/css/style-responsive.min.css",
//    "resources/front-end-assets/css/theme/default.css",
//    "public/css/app.css"
// ], 'public/css/bundle.css');


// mix.scripts([
//    "resources/front-end-assets/js/jquery-3.2.1.min.js",
//    "resources/front-end-assets/js/bootstrap.min.js",
//    "resources/front-end-assets/js/js.cookie.js",
//    "resources/front-end-assets/js/pace.min.js",
//    "public/front-end/js/front-end.js",
// ], 'public/js/bundle.js');

/// ================================================ ///
               /** End of Front-end  ****/
/// ================================================ ///



// mix.js('resources/assets/js/back-end.js', 'public/back-end/js').extract(['vue', 'jquery'])
// mix.sass('resources/assets/sass/back-end.scss', 'public/back-end/css');
//    mix.styles([
//       'node_modules/jqueryui/jquery-ui.min.css'
//    ], 'public/assets/css/bundle.css');
