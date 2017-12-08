let mix = require('laravel-mix').mix;

mix.options({ 
    processCssUrls: false,
    purifyCss: {
        paths: ['dist/*.html']
    }
});

mix.js('resources/js/app.js', './dist/assets/js')
   .sass('resources/sass/app.scss', './dist/assets/css')
   .copy('resources/img/', './dist/assets/img')
   .copy('node_modules/font-awesome/fonts/', './dist/assets/fonts');

if(process.env.NODE_ENV === 'production') {
    mix.version();
}

mix.browserSync({
    proxy: 'http://aschmelyun-new.dev',
    host: 'aschmelyun-new.dev',
    open: 'external',
    files: [
        'dist/assets/js/*.js',
        'dist/assets/css/*.css',
        '*.php',
        '*.html'
    ]
});