const mix = require('laravel-mix');
const postcssImport = require('postcss-import');

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
       postcssImport(),
       require('tailwindcss'),
       require('autoprefixer'),
   ]);


  
