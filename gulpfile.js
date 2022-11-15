// Initialize modules
// Importing specific gulp API functions lets us write them below as series() instead of gulp.series()
const {src, dest, watch, series, parallel} = require('gulp');
// Importing all the Gulp-related packages we want to use
const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');
const terser = require('gulp-terser');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const browsersync = require('browser-sync').create();

// File paths
const files = {
    scssPath: 'src/scss/**/*.scss',
    jsPath: 'src/js/app.js',
    jsPathBootstrap: 'src/js/bootstrap5/**/*.js',
    jsPathVendor: 'src/js/vendor/**/*.js',
};

// Sass task: compiles the style.scss file into style.css
function scssTask() {
    return src(files.scssPath, {sourcemaps: true}) // set source and turn on sourcemaps
        .pipe(sass()) // compile SCSS to CSS
        .pipe(postcss([autoprefixer(), cssnano()])) // PostCSS plugins
        .pipe(concat('style.min.css'))
        .pipe(dest('dist/css', {sourcemaps: '.'})); // put final CSS in dist folder with sourcemap
}

// JS task: concatenates and uglifies JS files to script.js
function jsTask() {
    return src(
        [
            files.jsPath,
            //,'!' + 'includes/js/jquery.min.js', // to exclude any specific files
        ],
        {sourcemaps: true}
    )
        .pipe(concat('scripts.min.js'))
        .pipe(terser())
        .pipe(dest('dist/js', {sourcemaps: '.'}));
}

// JS task: Compiles bootstrap5 js
function jsBootstrap() {
    return src(
        [
            files.jsPathBootstrap,
        ],
        {sourcemaps: true}
    )
        .pipe(concat('bootstrap.min.js'))
        .pipe(terser())
        .pipe(dest('dist/js/bootstrap5', {sourcemaps: '.'}));
}

//JS task: Compile Vendor 
function jsVendor() {
    return src(
        [
            files.jsPathVendor,
        ],
        {sourcemaps: true}
    )
        .pipe(concat('vendor.min.js'))
        .pipe(terser())
        .pipe(dest('dist/js/vendor', {sourcemaps: '.'}));
}

// Browsersync to spin up a local server
function browserSyncServe(cb) {
    // initializes browsersync server
    browsersync.init({
        server: {
            baseDir: '.',
        },
        notify: {
            styles: {
                top: 'auto',
                bottom: '0',
            },
        },
    });
    cb();
}

// Watch task: watch SCSS and JS files for changes
// If any change, run scss and js tasks simultaneously
function watchTask() {
    watch(
        [files.scssPath, files.jsPath],
        {interval: 1000, usePolling: true}, //Makes docker work
        series(parallel(scssTask, jsTask, jsBootstrap, jsVendor))
    );
}

// Export the default Gulp task so it can be run
// Runs the scss and js tasks simultaneously
// then runs cacheBust, then watch task
exports.default = series(parallel(scssTask, jsTask, jsBootstrap, jsVendor), watchTask);

// Runs all of the above but also spins up a local Browsersync server
// Run by typing in "gulp bs" on the command line
exports.bs = series(
    parallel(scssTask, jsTask, jsBootstrap, jsVendor),
    browserSyncServe,
);
