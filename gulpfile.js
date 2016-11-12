var elixir = require('laravel-elixir');

// elixir.config. ... for various config options

require('laravel-elixir-browserify-official');
require('laravel-elixir-vueify');

elixir(function(mix) {
    // Compile CSS
    mix.sass([
            'app.scss',                                                     // Source files
            'datetimepicker.scss'
        ],                                  
        'public/css',                                                       // Destination folder
        null,                                                               // Source base dir
        {includePaths: ['vendor/bower_components/foundation-sites/scss']}   // Options
    );

    // Compile JavaScript
    mix.browserify("main.js");

    mix.scripts([
            'modernizr/modernizr.js', 
            'jquery/dist/jquery.js', 
            'foundation-sites/dist/foundation.js'
            ], 
        'public/js/dependencies.js', 
        'vendor/bower_components/' 
    );
});
