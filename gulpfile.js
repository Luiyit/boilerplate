// https://www.npmjs.com/package/gulp-load-plugins
var gulp = require('gulp');
var sass = require('gulp-sass');
var replace = require('gulp-replace');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
const image = require('gulp-image');
const del = require('del');

var csso = require('gulp-csso');
const webpack = require('webpack');
const webpackStream = require('webpack-stream');
const webpackConfig = require('./webpack.config.js');
const merge = require('webpack-merge')

var input = './src/assets/scss/*.scss';
var output = './public/css';
var concat = require('gulp-concat');
var readJson = require('read-package-json')
function get_packages_paths(){
    var paths = [];

}
gulp.task('read_pack', function() {
    // Puedo leer los package.json de cada paquete con promesas
    // De esa manera leo exactamente los archivos que necesito y no nada extra
    // Ademas tengo el path exacto y no se pasa por alto nada
    // https://stackoverflow.com/questions/36897877/gulp-error-the-following-tasks-did-not-complete-did-you-forget-to-signal-async
    return new Promise(function(resolve, reject) {
        readJson('./package.json', console.error, false, function (er, data) {
            if (er) {
              console.error("There was an error reading the file")
              return
            }
            var paths = [];
            var dependencies = Object.keys(data.dependencies);
            for (var key in dependencies){
                paths.push('node_modules/'+dependencies[key]+'/dist/**/*.min.js')
               console.log(dependencies[key]);
            }
            console.log(paths);
            
            gulp.src(paths, {base:'node_modules'})
            .pipe(concat('vendors.js'))
            .pipe(gulp.dest('./public/js'));

            resolve();
        });
    });
});

var sassOptions = {
  errLogToConsole: true,
  outputStyle: 'compressed'
};

var autoprefixerOptions = {
    Browserslist: ['last 3 versions', 'IE 9', 'IE 10', 'IE 11']
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

gulp.task('shopify-sass', function() {
    return gulp
        .src('./src/assets/scss/shopify.scss', { allowEmpty: true })
        .pipe(sass(sassOptions).on('error', sass.logError))
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
    // return gulp.src(['node_modules/slick-carousel/slick/slick.js', './src/assets/js/main.js'])
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

gulp.task('clean:font', function() {
    return del(['./public/fonts/**', '!public/fonts'], {force:true})
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

gulp.task('font', gulp.series(['clean:font'], function () {
    return gulp.src('./src/assets/fonts/**')
        .pipe(gulp.dest('./public/fonts'));
}));

gulp.task("cache-bust", function() {
    var cbString = new Date().getTime();
    return gulp
        .src(["helpers/frontend_scripts.php"])
        .pipe(
            replace(/cache_bust=\d+;/g, function(match) {
                console.log("New cache bust => cache_bust=" + cbString + ";");
                return "cache_bust=" + cbString + ";";
            })
        )
    .pipe(gulp.dest("./helpers"));
});

gulp.task('watch', function() {
  return gulp
    .watch(input, ['sass'])
    .on('change', function(event) {
      console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
    });
});

gulp.task('serve', gulp.series(['icons', 'sass', 'shopify-sass', 'image', 'font', 'js', 'cache-bust'], function() { 
    gulp.watch("./src/assets/scss/**/*.scss", gulp.series(['shopify-sass']))
    gulp.watch("./src/assets/scss/**/*.scss", gulp.series(['sass']))
    gulp.watch("./src/assets/js/**/*.js",  gulp.series(['js']))
    gulp.watch("./src/assets/img/**", gulp.series(['image']))
    gulp.watch("./src/assets/fonts/**", gulp.series(['font']))
    gulp.watch("./src/assets/**", gulp.series(['cache-bust']))
}));

gulp.task('default', gulp.series('serve', function() { 
    // default task code here
}));

gulp.task('prod', gulp.series(['image:prod']));