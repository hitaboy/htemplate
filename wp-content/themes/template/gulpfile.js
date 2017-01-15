var gulp          = require('gulp'),
    sass          = require('gulp-sass'),
    concat        = require('gulp-concat'),
    browserSync   = require('browser-sync').create(),
    notify        = require("gulp-notify"),
    uglify        = require('gulp-uglify'),
    autoprefixer  = require('gulp-autoprefixer'),
    header        = require('gulp-header'),
    fs            = require('file-system'),
    cleanCSS      = require('gulp-clean-css');

gulp.task('sassComp', function() {
  return gulp.src('./sass/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(header(fs.readFileSync('style-config.txt', 'utf8')))
    .pipe(gulp.dest('./'));
});

gulp.task('jsConcat', function() {
  return gulp.src([
  './js/vendor/modernizr.js',
  './js/vendor/jquery-3.1.1.min.js',
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
