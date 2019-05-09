// Sass configuration
var gulp = require('gulp');
var sass = require('gulp-sass');


function scss() {
    return gulp.src('css/styles.scss')
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
    gulp.watch(['css/*.scss','css/utilities/*.scss','css/pages/*.scss'], gulp.series(scss));
}


const build = gulp.series(scss);
const adminbuild = gulp.series(adminscss);
const watch = gulp.parallel(watchFiles);

exports.watch = watch;
exports.scss = scss;
exports.default = build;
exports.admin = adminbuild;