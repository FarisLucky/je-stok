// Load plugins
const browserSync = require("browser-sync").create();
const gulp = require("gulp");
const sass = require("gulp-sass");

function style() {
  return gulp
    .src("./scss/**/*.scss")
    .pipe(sass().on("error", sass.logError))
    .pipe(gulp.dest("./css"))
    .pipe(browserSync.stream());
}

// Watch files
function watchFiles() {
  browserSync.init({
    server: {
      baseDir: "./"
    },
    port: 3000
  });
  gulp.watch("./scss/**/*.scss", style);
  gulp.watch("./*.html").on("change", browserSync.reload);
}

// Define complex tasks
const watch = watchFiles;

// Export tasks
exports.watch = watch;
