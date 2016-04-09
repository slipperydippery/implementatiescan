var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');

elixir(function(mix) {
    // Compile CSS
    mix.sass(
        'app.scss', // Source files
        'public/css', // Destination folder
        {includePaths: ['vendor/bower_components/foundation/scss']}
    );

    mix.browserify('main.js');

    // Compile JavaScript
    mix.scripts(
        ['vendor/modernizr.js', 'vendor/jquery.js', 'foundation.min.js'], // Source files. You can also selective choose only some components
        'public/js/dependencies.js', // Destination file
        'vendor/bower_components/foundation/js/' // Source files base directory
    );
});
