var fs = require('fs');
var path = require('path');
var merge = require('merge-stream');
var del = require('del');
var gulp = require('gulp');
var watch = require('gulp-watch');
var sass = require('gulp-sass');
var postcss      = require('gulp-postcss');
var sourcemaps   = require('gulp-sourcemaps');
var autoprefixer = require('autoprefixer');
var rename = require('gulp-rename');

//test
//convert sass to css
gulp.task('sass', function() {
  gulp.src('novon/sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(sourcemaps.init())
    .pipe(postcss([ autoprefixer() ]))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('novon/css/'));
});


gulp.task('watch', function() {
    gulp.watch('novon/sass/**/*.scss', ['sass']);
});

gulp.task('default', ['sass', 'watch']);
gulp.task('deploy', ['sass']);
