"use strict";

var gulp = require('gulp'),
  sass = require('gulp-sass')(require('sass')),
  del = require('del'),
  concat = require('gulp-concat'),
  uglify = require('gulp-uglify'),
  cleanCSS = require('gulp-clean-css'),
  rename = require("gulp-rename"),
  autoprefixer = require('gulp-autoprefixer'),
  browserSync = require('browser-sync').create();

// Clean task
gulp.task('clean', function () {
  return del(['dist', 'src/css/app.css']);
});

// Run convert scss to css - make a dir css
gulp.task('scss', function () {
  return gulp.src(['./src/scss/*.scss'])
    .pipe(sass.sync({
      outputStyle: 'expanded'
    }).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest('./src/css'))
});

// Minify CSS
gulp.task('css:minify', gulp.series('scss', function cssMinify() {
  return gulp.src("./src/css/*.css")
    .pipe(cleanCSS())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest('./dist/css'))
    .pipe(browserSync.stream());
}));

// Minify Js
gulp.task('js:minify', function () {
  return gulp.src([
    './src/js/app.js'
  ])
    .pipe(uglify())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest('./dist/js'))
    .pipe(browserSync.stream());
});

//Minify VendorJS
gulp.task('jsVendor:minify', function () {
  return gulp.src([
    './src/js/vendor/*.js'
  ])
    .pipe(concat('vendor.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./dist/js/vendor'))
    .pipe(browserSync.stream());
});

// Watch file path for change
// Exclude Bootstrap from watch
gulp.task('dev', function browserDev(done) {
  gulp.watch(['src/scss/*.scss', 'src/scss/**/*.scss'], gulp.series('css:minify', function cssBrowserReload(done) {
    browserSync.reload();
    done();
  }));
  gulp.watch('src/js/app.js', gulp.series('js:minify', function jsBrowserReload(done) {
    browserSync.reload();
    done();
  }));
  gulp.watch('src/js/vendor/*.js', gulp.series('jsVendor:minify', function jsBrowserReload(done) {
    browserSync.reload();
    done();
  }));
  done();
});