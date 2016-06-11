// grab our gulp packages
var gulp = require('gulp');
var	autoprefixer = require('gulp-autoprefixer');
var	concat = require('gulp-concat');
var imagemin = require('gulp-imagemin');
var jshint = require('gulp-jshint');
var livereload = require('gulp-livereload');
var minifycss = require('gulp-minify-css');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var watch = require('gulp-watch');

// run our default tasks
gulp.task('default', ['sass', 'js', 'img', 'watch']);

// configure our sass task
gulp.task('sass', function() {
	gulp.src('./sass/*.scss')
	.pipe(plumber(plumberErrorHandler))
	.pipe(sass())
	.pipe(autoprefixer())
	.pipe(minifycss())
	.pipe(gulp.dest(''))
	.pipe(livereload());
});

// configure our js task
gulp.task('js', function () {
	gulp.src('js/lib/*.js')
	.pipe(plumber(plumberErrorHandler))
	.pipe(jshint())
	.pipe(jshint.reporter('default'))
	.pipe(concat('global.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('js'))
	.pipe(livereload());
});

gulp.task('img', function() {
	gulp.src('img/src/*.{png,jpg,gif}')
	.pipe(plumber(plumberErrorHandler))
	.pipe(imagemin({
		optimizationLevel: 7,
		progressive: true
	}))
	.pipe(gulp.dest('img'))
	.pipe(livereload());
});

// configure which files to watch and what tasks to use on file changes
gulp.task('watch', function() {
	livereload.listen();
	gulp.watch('**/*.scss', ['sass']);
	gulp.watch('js/lib/*.js', ['js']);
	gulp.watch('img/src/*.{png,jpg,gif}', ['img']);
});

var plumberErrorHandler = { errorHandler: notify.onError({
		title: 'Gulp',
		message: 'Error: <%= error.message %>'
	})
};