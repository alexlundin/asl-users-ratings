const mix = require( 'laravel-mix' );


/**
 * Setup public path to generate assets
 */
mix.setPublicPath( 'assets' );

/**
 * Autoload jQuery
 */
mix.autoload({
    jquery: [ '$', 'window.jQuery', 'jQuery' ]
});

/**
 * Compile JavaScript
 */
mix.js( 'src/admin.js', 'assets/js/admin.js' ).sourceMaps( false ).extract( [ 'vue' ] );

/**
 * Compile Sass
 */
mix.sass( 'src/sass/admin.scss', 'assets/css/admin.css' )