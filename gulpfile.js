const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer');
const concat = require('gulp-concat');
const browserSync = require('browser-sync').create(); // Importez BrowserSync

function compileSass() {
  return gulp
    .src('ALSite/source/scss/test.scss') // Chemin vers le fichier de test SASS
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(concat('style.css')) // Nommez le fichier de sortie
    .pipe(gulp.dest('./')) // Répertoire de sortie à la racine
    .pipe(browserSync.stream()); // Rafraîchir le navigateur
}

function watchSass() {
    browserSync.init({
        proxy: 'http://localhost:8888/starter-theme/', // Adresse de votre serveur local
    });

  gulp.watch('ALSite/source/scss/**/*.scss', compileSass); // Surveillez tous les fichiers SASS
  gulp.watch('*.html').on('change', browserSync.reload); // Surveillez les fichiers HTML pour le rafraîchissement
}

exports.compileSass = compileSass;
exports.watchSass = watchSass;
