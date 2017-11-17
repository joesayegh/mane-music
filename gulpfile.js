/* File: gulpfile.js */

// grab our gulp packages
var gulp 			= require('gulp');
var	autoprefixer 	= require('gulp-autoprefixer');
var	concat 			= require('gulp-concat');
var jshint 			= require('gulp-jshint');
var cleanCSS 		= require('gulp-clean-css');
var plumber 		= require('gulp-plumber');
var notify 			= require('gulp-notify');
var sass 			= require('gulp-sass');
var uglify 			= require('gulp-uglify');
var rename 			= require('gulp-rename');
var watch 			= require('gulp-watch');

// run our default tasks
gulp.task('default', ['sass', 'js', 'watch']);

// Compile Sass to CSS
gulp.task('sass', function() {
	gulp.src('./sass/*.scss')
	.pipe(plumber(plumberErrorHandler))
	.pipe(sass())
	.pipe(autoprefixer({
		browsers: ['last 2 versions'],
		cascade: false
	}))
	.pipe(cleanCSS({debug: true}, function(details) {
	}))
	.pipe(gulp.dest(''))
	.pipe(notify({
		message: 'Compiled Sass to CSS'
	}));
});

// Concatenate js files and minify
gulp.task('js', function () {
	gulp.src('js/lib/*.js')
	.pipe(plumber(plumberErrorHandler))
	.pipe(jshint())
	.pipe(jshint.reporter('default'))
	.pipe(concat('global.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('js'))
	.pipe(notify({
		message: 'Combined and Minified JavaScript'
	}));
});

// configure which files to watch and what tasks to use on file changes
gulp.task('watch', function() {
	gulp.watch('**/*.scss', ['sass']);
	gulp.watch('js/lib/*.js', ['js']);
});

var plumberErrorHandler = { errorHandler: notify.onError({
		title: 'Gulp',
		message: 'Error: <%= error.message %>'
	})
};