require('dotenv').config();

const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer');
const concat = require('gulp-concat');
const browserSync = require('browser-sync').create();

// Accédez aux variables d'environnement définies dans le fichier .env
const localServer = process.env.LOCAL_SERVER || 'http://localhost:8888/starter-theme/';

function compileSass() {
    return gulp
        .src('ALSite/source/scss/test.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(concat('style.css'))
        .pipe(gulp.dest('./'))
        .pipe(browserSync.stream());
}

function watchSass() {
    browserSync.init({
        proxy: localServer,
    });

    gulp.watch('ALSite/source/scss/**/*.scss', compileSass);
    gulp.watch('*.html').on('change', browserSync.reload);
}

exports.compileSass = compileSass;
exports.watchSass = watchSass;
