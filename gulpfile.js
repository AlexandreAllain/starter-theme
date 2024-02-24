require('dotenv').config();

const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer');
const concat = require('gulp-concat');
const browserSync = require('browser-sync').create();
const sassModuleImporter = require('sass-module-importer');
const babel = require('gulp-babel');

// Accédez aux variables d'environnement définies dans le fichier .env
const localServer = process.env.LOCAL_SERVER;

function compileSass() {
    return gulp
        .src('ALSite/source/scss/front.scss')
        .pipe(sass({
            importer: sassModuleImporter(), // Utilisez sass-module-importer pour importer automatiquement les dépendances Sass
        }).on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(concat('style.css'))
        .pipe(gulp.dest('./'))
        .pipe(browserSync.stream());
}

function compileJS() {
    return gulp
        .src('ALSite/source/js/*.js') // Mettez à jour le chemin selon votre structure
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(concat('main.min.js')) // Nom du fichier de sortie
        .pipe(gulp.dest('./')) // Répertoire de destination
        .pipe(browserSync.stream());
}

function watchSass() {
    browserSync.init({
        proxy: localServer,
    });

    gulp.watch('ALSite/source/scss/**/*.scss', compileSass);
    gulp.watch('ALSite/source/js/*.js', compileJS); // Surveillez les changements dans les fichiers JS
    gulp.watch('*.html').on('change', browserSync.reload);
}

exports.compileSass = compileSass;
exports.compileJS = compileJS;
exports.watchSass = watchSass;
