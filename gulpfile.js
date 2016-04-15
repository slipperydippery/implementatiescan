var elixir = require('laravel-elixir');

var path = {
    node:       'vendor/bower_components/',
    foundation: 'foundation-sites/',
    motionui:   'motion-ui/',
};


elixir.config.sourcemaps = process.env.APP_DEBUG;

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
    // mix.scripts(
    //     ['vendor/modernizr.js', 'vendor/jquery.js', 'foundation.js'], // Source files. You can also selective choose only some components
    //     'public/js/dependencies.js', // Destination file
    //     'vendor/bower_components/foundation/js/' // Source files base directory
    // );


    mix.scripts([

        // vendor
        path.node + 'jquery/dist/jquery.js',
        path.node + 'underscore/underscore.js',
        path.node + 'what-input/what-input.js',

        // foundation core
        // path.bower + path.foundation + 'dist/foundation.js',
        path.node + path.foundation + 'js/foundation.core.js',
        path.node + path.foundation + 'js/foundation.util.mediaQuery.js',
        // foundation plug-ins
        path.node + path.foundation + 'js/foundation.util.box.js',
        path.node + path.foundation + 'js/foundation.util.nest.js',
        path.node + path.foundation + 'js/foundation.util.motion.js',
        path.node + path.foundation + 'js/foundation.util.keyboard.js',
        path.node + path.foundation + 'js/foundation.util.triggers.js',
        path.node + path.foundation + 'js/foundation.abide.js',
        path.node + path.foundation + 'js/foundation.dropdownMenu.js',
        path.node + path.foundation + 'js/foundation.responsiveMenu.js',
        path.node + path.foundation + 'js/foundation.responsiveToggle.js',
        path.node + path.foundation + 'js/foundation.toggler.js',
        path.node + path.motionui + 'dist/motion-ui.js',

    ], 'public/js/dependencies.js', './');


});
