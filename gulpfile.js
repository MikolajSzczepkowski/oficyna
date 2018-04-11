'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var watch = require('gulp-watch');
var uglify = require('gulp-uglify');
var jshint = require('gulp-jshint');
var concat = require('gulp-concat');
var notify = require('gulp-notify');


gulp.task('sass', function () {
  return gulp.src('./sass/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(sass({
        'outputStyle' : 'compressed'
    }))
    .pipe(gulp.dest('./css'));
});

gulp.task('watch', function(){
	gulp.watch("./sass/**/*.scss", ['sass']);
});

gulp.task('js', function () {
   gulp.src('./oficyna_peryferie/js/main.js')
      .pipe(uglify())
      .on('error', notify.onError("Error: <%= error.message %>"))
      .pipe(concat('app.js'))
      .pipe(gulp.dest('build'));
});

gulp.task('css', function () {
   gulp.src('./css/*.css')
      .pipe(uglify())
      .on('error', notify.onError("Error: <%= error.message %>"))
      .pipe(concat('main.css'))
      .pipe(gulp.dest('build'));
});

gulp.task('dist', ['css']);
