// webpack.mix.js

const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
       //
   ]);


   mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/modal.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
       //
   ]);
