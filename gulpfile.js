var gulp = require('gulp');
var sass = require('gulp-sass');
var elixir = require('laravel-elixir');
var BrowserSync = require('laravel-elixir-browsersync2');

elixir(function(mix) {
    mix.sass('./public/src/sass/view.sass','./public/css/view.css');

    BrowserSync.init();
    mix.BrowserSync({
        notify: false
    });
});
