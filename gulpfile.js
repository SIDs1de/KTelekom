const { src, dest, watch, parallel, series } = require('gulp')

const scss = require('gulp-sass')(require('sass'))
const concat = require('gulp-concat')
const browserSync = require('browser-sync').create()
const uglify = require('gulp-uglify-es').default
const autoprefixer = require('gulp-autoprefixer')
const del = require('del')
const newer = require('gulp-newer')
const babel = require('gulp-babel')
const sourcemaps = require('gulp-sourcemaps')
const htmlmin = require('gulp-htmlmin')

function browsersync() {
  // Чтобы переставить работу с html на php
  // убрать пункт server полностью и раскомментить
  // proxy, поставить туда название папки из openserver
  browserSync.init({
    server: {
      baseDir: 'src',
    },
    // proxy: 'example.ru',
    notify: false,
  })
}

function cleanPublic() {
  return del('public')
}

function images() {
  return src('src/images/**/*')
    .pipe(browserSync.stream())
}

function scripts() {
  return src(['src/js/*.js', '!src/js/main.min.js'])
    .pipe(sourcemaps.init())
    .pipe(
      babel({
        presets: ['@babel/env'],
      })
    )
    .pipe(concat('main.min.js'))
    .pipe(uglify())
    .pipe(sourcemaps.write('.'))
    .pipe(dest('src/js'))
    .pipe(browserSync.stream())
}

function styles() {
  return src('src/scss/main.scss')
    .pipe(sourcemaps.init())
    .pipe(concat('main.min.css'))
    .pipe(scss({ outputStyle: 'compressed' }).on('error', scss.logError))
    .pipe(
      autoprefixer({
        grid: 'autoplace',
        "overrideBrowserslist": [
          ">1%"
        ]
      })
    )
    .pipe(sourcemaps.write('.'))
    .pipe(dest('src/css'))
    .pipe(browserSync.stream())
}

function fonts() {
  return src('src/fonts/**/*')
    .pipe(browserSync.stream())
}

function build() {
  return src(
    [
      'src/css/**/*.css',
      'src/fonts/**/*',
      'src/js/**/*.js',
      '!src/js/main.js',
      'src/images/**/*',
    ],
    { base: 'src' }
  ).pipe(dest('public'))
}

function html() {
  return (
    src('src/**/*.html')
    // удалить *.html
    // и сделать *.php
  )
    // .pipe(htmlmin({ collapseWhitespace: true }))
    .pipe(browserSync.stream())
    // .pipe(dest('public'))
}


function watching() {
  watch(['src/scss/**/*.scss'], styles)
  watch(['src/images/**/*'], images)
  watch(['src/js/**/*.js', '!src/js/main.min.js'], scripts)
  watch(['src/**/*.{html,php}'], html)
}

exports.styles = styles
exports.watching = watching
exports.browsersync = browsersync
exports.scripts = scripts
exports.images = images
exports.cleanPublic = cleanPublic
exports.fonts = fonts


exports.build = series(cleanPublic, build)
exports.default = parallel(
  html,
  images,
  styles,
  scripts,
  browsersync,
  fonts,
  watching
)
