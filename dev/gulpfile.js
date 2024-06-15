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
    // server: {
    //   baseDir: 'src',
    // },
    proxy: 'igor.local',
    notify: false,
  })
}

// function cleanPublic() {
//   return del('public')
// }

// function images() {
//   return src('src/images/**/*')
//     .pipe(browserSync.stream())
// }

function scripts() {
  return src(['src/js/main.js'])
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
        overrideBrowserslist: ['>1%'],
      })
    )
    .pipe(sourcemaps.write('.'))
    .pipe(dest('src/css'))
    .pipe(browserSync.stream())
}

function fonts() {
  return src('src/fonts/**/*').pipe(browserSync.stream())
}

async function moveAssets() {
  await del('./../assets', {
    force: true,
  })
  return src(['src/**/*', '!src/scss/**/*', '!src/scss/', '!src/scss/**']).pipe(browserSync.stream()).pipe(dest('./../assets/'))
}

// function build() {
//   return src(['src/css/**/*.css', 'src/fonts/**/*', 'src/js/**/*.js', 'src/images/**/*', 'src/**/*.html'], {
//     base: 'src',
//   }).pipe(dest('public'))
// }

function html() {
  return (
    src('./../**/*.php')
      // удалить *.html
      // и сделать *.php
      // .pipe(htmlmin({ collapseWhitespace: true }))
      .pipe(browserSync.stream())
  )
  // .pipe(dest('public'))
}

function watching() {
  watch(['src/scss/**/*.scss'], parallel(styles, moveAssets))
  // watch(['./../assets/images/**/*'], images)
  watch(['src/js/**/*.js', '!src/js/main.min.js'], parallel(scripts, moveAssets))
  watch(['./../**/*.{html,php}'], html)
}

exports.styles = styles
exports.watching = watching
exports.browsersync = browsersync
exports.scripts = scripts
// exports.images = images
// exports.cleanPublic = cleanPublic
exports.fonts = fonts
exports.moveAssets = moveAssets

// exports.build = series(cleanPublic, build)
exports.default = parallel(html, styles, scripts, browsersync, fonts, watching)
