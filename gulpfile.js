var elixir = require('laravel-elixir');
require('laravel-elixir-livereload');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 | https://www.npmjs.com/package/laravel-elixir-livereload#laravel-elixir-livereload-src |livereload
 */

elixir(function(mix) {
    mix.less('app.less');
    mix.livereload();
    mix.scripts([
      "jquery.min.js",
      "bootstrap.min.js",
      "main.js"
    ]);
});
