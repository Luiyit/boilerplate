var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync').create();
const image = require('gulp-image');
const del = require('del');
const nunjucks = require('gulp-nunjucks');
const njkRender = require('gulp-nunjucks-render');
const prettify = require('gulp-html-prettify');
var csso = require('gulp-csso');
const webpack = require('webpack');
const webpackStream = require('webpack-stream');
const webpackConfig = require('./webpack.config.js');

var input = './src/assets/scss/*.scss';
var output = './public/css';

var sassOptions = {
  errLogToConsole: true,
  outputStyle: 'compressed'
};

var autoprefixerOptions = {
  browsers: ['last 3 versions', 'IE 9', 'IE 10', 'IE 11']
};

gulp.task('icons', function() {
    return gulp.src('node_modules/@fortawesome/fontawesome-free/webfonts/*')
               .pipe(gulp.dest('./public/webfonts/'));
});


gulp.task('sass', function() {
    return gulp
        .src(input)
        .pipe(sourcemaps.init())
        .pipe(sass(sassOptions).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(autoprefixer(autoprefixerOptions))
        .pipe(gulp.dest(output));
});

gulp.task('sass:min', function() {
    return gulp
        .src(input)
        .pipe(sass({ outputStyle: 'compressed' }))
        .pipe(autoprefixer(autoprefixerOptions))
        .pipe(csso())
        .pipe(gulp.dest(`${output}`));
});

gulp.task('js', () => {
    return gulp.src('./src/assets/js/main.js')
        .pipe(webpackStream(webpackConfig), webpack)
        .pipe(gulp.dest('./public/js'));
});

gulp.task('js:watch', function () {
    return gulp.watch('./src/assets/js/**/*.js', ['js']);
});

gulp.task('clean:image', function() {
    return del(['./public/img/**', '!public/img'], {force:true})
});

gulp.task('image:prod', gulp.series(['clean:image'], function () {
    return gulp.src('./src/assets/img/**')
        .pipe(image())
        .pipe(gulp.dest('./public/img'));
}));

gulp.task('image', gulp.series(['clean:image'], function () {
    return gulp.src('./src/assets/img/**')
        .pipe(gulp.dest('./public/img'));
}));

gulp.task('watch', function() {
  return gulp
    .watch(input, ['sass'])
    .on('change', function(event) {
      console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
    });
});

gulp.task('serve', gulp.series(['icons', 'sass', 'image', 'js'], function() { 
// gulp.task('serve', ['icons', 'sass', 'sass:min', 'js', 'js:watch'], function() {
    gulp.watch("./src/assets/scss/**/*.scss", gulp.series(['sass']))
    gulp.watch("./src/assets/js/**/*.js",  gulp.series(['js']))
    gulp.watch("./src/assets/img/**", gulp.series(['image']))
}));

gulp.task('default', gulp.series('serve', function() { 
    // default task code here
}));

gulp.task('prod', gulp.series(['image:prod']));