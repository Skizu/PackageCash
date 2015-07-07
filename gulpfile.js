var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('guest.scss', 'public/css/styles.css')
        .sass('app.scss')
        .copy('resources/assets/favicons', 'public')
        .copy('resources/assets/fonts', 'public/fonts')
        .copy('resources/assets/images', 'public/images');
});
