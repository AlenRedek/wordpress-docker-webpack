const gulp = require("gulp");
const browserSync = require("browser-sync").create();

function watch() {
	browserSync.init({
		"proxy": "http://localhost:8000",
		"port": 8001,
	});

	gulp.watch('./*.php').on('change',browserSync.reload);
	gulp.watch('./*.js').on('change', browserSync.reload);
	gulp.watch('./*.css').on('change', browserSync.reload);
}

exports.default = watch;