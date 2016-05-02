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


    mix.browserify('main.js');

    // Javascript

    // base directories
    var bower = '../../../vendor/bower_components/';
    var foundationScripts = bower + 'foundation/js/foundation/';

    mix.scripts([
        bower + 'jquery/dist/jquery.js',
        foundationScripts + 'foundation.js',
        foundationScripts + 'foundation.topbar.js',
        foundationScripts + 'foundation.alert.js',
        foundationScripts + 'foundation.reveal.js',
        foundationScripts + 'foundation.tooltip.js',
        foundationScripts + 'foundation.accordion.js',
        foundationScripts + 'foundation.util.keyboard.js',
        foundationScripts + 'foundation.util.motion.js',
        foundationScripts + 'foundation.util.nest.js',
        'start_foundation.js'
    ])
       .scripts([
        bower + 'modernizr/modernizr.js'
    ], 'public/js/modernizr.js');

    // Compile JavaScript
/*    mix.scripts(
        ['vendor/modernizr.js', 'vendor/jquery.js', 'foundation.js'], // Source files. You can also selective choose only some components
        'public/js/dependencies.js', // Destination file
        'vendor/bower_components/foundation/js/' // Source files base directory
    );
*/

});


/*

elixir(function(mix) {
    // Sass
    var options = {
        includePaths: ['bower_components/foundation/scss']
    };

    mix.sass('app.scss', null, options);

    // Javascript

    // base directories
    var bower = '../../../bower_components/';
    var foundationScripts = bower + 'foundation/js/foundation/';

    mix.scripts([
        bower + 'jquery/dist/jquery.js',
        foundationScripts + 'foundation.js',
        foundationScripts + 'foundation.topbar.js',
        foundationScripts + 'foundation.alert.js',
        foundationScripts + 'foundation.reveal.js',
        foundationScripts + 'foundation.tooltip.js',
        foundationScripts + 'foundation.accordion.js',
        'start_foundation.js'
    ])
       .scripts([
        bower + 'modernizr/modernizr.js'
    ], 'public/js/modernizr.js');
});*/