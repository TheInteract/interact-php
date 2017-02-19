const gulp = require('gulp')
const watch = require('gulp-watch')
const run = require('gulp-run')
const exec = require('gulp-exec')

gulp.task('default', ['start'], function() {
    watch('./src/**/*.php', ['update'])
})

gulp.task('start', function() {
    return gulp.src('.')
        .pipe(exec('docker-compose -f ./development/start.yml up'))
})

gulp.task('update', function() {
    return gulp.src('.')
        .pipe(exec('docker-compose -f ./development/update.yml up'))
})