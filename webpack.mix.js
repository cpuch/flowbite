const mix = require('laravel-mix');

require('mix-tailwindcss');

mix.setPublicPath('dist')
    .sass('resources/sass/components.scss', 'dist/css')
    .tailwind();