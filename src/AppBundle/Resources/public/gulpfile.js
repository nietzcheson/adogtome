'use strict';

var gulp = require('gulp'),
     sass = require('gulp-sass'),
     browserSync = require('browser-sync'),
     reload = browserSync.reload;

     gulp.task('browser-sync', function() {
       //watch files
       var files = [
         'css/app.css',
         'scripts/**/*.js',
         'images/**/*',
         '../views/**/*.twig'
       ];
       //initialize browsersync
       browserSync.init(files, {
         proxy: "http://127.0.0.1:8000" // BrowserSync proxy, change to match your local environment
       });
     });

gulp.task('default', ['browser-sync'], function(){
});
