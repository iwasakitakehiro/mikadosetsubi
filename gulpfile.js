const gulp = require("gulp");
const browserSync = require("browser-sync").create();
const sass = require("gulp-sass")(require("sass"));
const webpackStream = require("webpack-stream");
const webpack = require("webpack");
const webpackConfig = require("./webpack.config");

function scssTask() {
  return gulp
    .src("./src/scss/style.scss")
    .pipe(sass({ outputStyle: "expanded" }).on("error", sass.logError))
    .pipe(gulp.dest("./dist/main/css/"))
    .pipe(browserSync.stream());
}

function phpTask() {
  return gulp
    .src("./src/*.php")
    .pipe(gulp.dest("./dist/main/"))
    .pipe(browserSync.stream());
}

function jsTask() {
  return gulp
    .src("./src/js/*.js")
    .pipe(webpackStream(webpackConfig, webpack))
    .pipe(gulp.dest("./"))
    .pipe(browserSync.reload({ stream: true }));
}

function sync(done) {
  browserSync.init({
    proxy: "http://localhost:8000",
    snippetOptions: {
      ignorePaths: ["/wp-admin/**", "/wp-login.php"],
    },
  });
  done();
}

function reload(done) {
  browserSync.reload();
  done();
}

function watch() {
  gulp.watch("./src/scss/style.scss", scssTask);
  gulp.watch("./src/*.php", phpTask);
  gulp.watch("./src/js/*.js", jsTask);
}

const dev = gulp.series(sync, watch);

exports.default = dev;
