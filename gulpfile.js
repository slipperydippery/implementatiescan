var elixir = require('laravel-elixir');

// elixir.config.sourcemaps = process.env.APP_DEBUG;

require('laravel-elixir-vueify');

elixir(function(mix) {
    // Compile CSS
    mix.sass(
        'app.scss', // Source files
        'public/css', // Destination folder
        {includePaths: ['vendor/bower_components/foundation/scss']}
    );

    // Compile JavaScript
    mix.browserify('main.js');

    mix.scripts(
        ['vendor/modernizr.js', 'vendor/jquery.js', 'foundation.js'], // Source files. You can also selective choose only some components
        'public/js/dependencies.js', // Destination file
        'vendor/bower_components/foundation/js/' // Source files base directory
    );

});
