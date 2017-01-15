var gulp          = require('gulp'),
    sass          = require('gulp-sass'),
    concat        = require('gulp-concat'),
    browserSync   = require('browser-sync').create(),
    notify        = require("gulp-notify"),
    uglify        = require('gulp-uglify');

gulp.task('sassComp', function() {
  return gulp.src('./sass/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./'));
});

gulp.task('jsConcat', function() {
  return gulp.src([
  './js/modernizr.min.js',
  './js/jquery-2.1.3.min.js',
  './js/vendor/owl.carousel.2.0.0-beta.2.4/owl.carousel.min.js',
  './js/scripts.js'])
    .pipe(concat('scripts-min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./'))
    .pipe(browserSync.stream())
    .pipe(notify("htemplate.dev > JS concat MAIN MIN DONE"));
});

gulp.task('watch', function() {
    browserSync.init({
      proxy: "htemplate.dev"
    });
    gulp.watch('./sass/*.scss', ['sassComp']);
    gulp.watch('./js/*.js', ['jsConcat']);
    //gulp.watch('./js/vendor/*.js', ['jsConcat']);
    gulp.watch("./**/*.php").on('change', browserSync.reload);
});
