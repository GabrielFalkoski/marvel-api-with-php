var gulp = require('gulp');
var concat = require('gulp-concat');
var minify = require('gulp-minify');
var cssnano = require('gulp-cssnano');
var less = require('gulp-less');
var watchLess = require('gulp-watch-less2');
var runSequence = require('run-sequence');
var menu = require("gulp-task-menu");

gulp.task('default', function() {
	menu(this, ['default']);
})

gulp.task('concat', function() {
	gulp.start('concat');
});

gulp.task('minify', function() {
	gulp.start('minify');
});

gulp.task('cssnano', function() {
	gulp.start('cssnano');
});

gulp.task('watch', function () {
	gulp.start('watch');
});

gulp.task('compress', function() {
	runSequence('concat', 'minify');
});

gulp.task('concat', function() {
	return gulp.src('./assets/js/lib/*.js')
	.pipe(concat('lib.js'))
	.pipe(gulp.dest('./assets/js/'));
});

gulp.task('minify', function() {
	gulp.src(['./assets/js/*.js'])
	.pipe(minify())
	.pipe(gulp.dest('./assets/js/min'));
});

gulp.task('cssnano', function() {
	return gulp.src('./assets/css/style.css')
	.pipe(cssnano())
	.pipe(gulp.dest('./assets/css/'));
});

gulp.task('watch', function () {
	return gulp.src('./assets/less/style.less')
	.pipe(watchLess('./assets/less/style.less', {verbose: true}))
	.pipe(less())
	.pipe(cssnano())
	.pipe(gulp.dest('./assets/css/'));
});
