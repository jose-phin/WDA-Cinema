var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    /* Combine all CSS files into site.css */
    mix.styles([
        'global-style.css',
        'movies.css',
        'login.css',
        'footer.css',
        'home.css',
        'search.css'
    ], 'public/css/site.css');

});