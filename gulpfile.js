// // Sass configuration
 var gulp = require('gulp');

// Initialize modules
// Importing specific gulp API functions lets us write them below as series() instead of gulp.series()
// const { src, dest, watch, series, parallel } = require('gulp');
// Importing all the Gulp-related packages we want to use

const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
var replace = require('gulp-replace');


const files = {     
    frontScssPath: 'assets/css/styles.scss',
    scssPath: 'app/scss/**/*.scss',
    jsPath: 'app/js/**/*.js'
}

// Sass task: compiles the style.scss file into style.css
function scssTask(){    
    return gulp.src(files.frontScssPath)
        .pipe(sourcemaps.init()) // initialize sourcemaps first
        .pipe(sass()) // compile SCSS to CSS
        .pipe(postcss([ autoprefixer(), cssnano() ])) // PostCSS plugins
        .pipe(sourcemaps.write('.')) // write sourcemaps file in current directory
        .pipe(gulp.dest(function(f) {
            return f.base;
        })); // put final CSS in dist folder
}

function scss() {
    return gulp.src(files.frontScssPath)
        .pipe(sass())
        .pipe(gulp.dest(function(f) {
            return f.base;
        }));
}

function adminscss() {
    return gulp.src('bbi-admin/content/css/style.scss')
        .pipe(sass())
        .pipe(gulp.dest(function(f) {
            return f.base;
        }));
}

function watchFiles() {
    gulp.watch(['assets/css/*.scss','assets/css/utilities/*.scss','assets/css/pages/*.scss'], gulp.series(scssTask));
}


const build = gulp.series(scss);
const adminbuild = gulp.series(adminscss);
const watch = gulp.parallel(watchFiles);

exports.watch = watch;
exports.scss = scss;
exports.default = build;
exports.admin = adminbuild;