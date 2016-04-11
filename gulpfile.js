//process.env.DISABLE_NOTIFIER = true;
var elixir = require('laravel-elixir');

elixir.config.js.browserify.transformers.push({
    name: 'vueify',
    options: {}
});

elixir.config.js.browserify.watchify = {
    enabled: true,
    options: {
        poll: true
    }
}

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
    mix.browserify('bootstrap.js', 'public/js/app.js');
});