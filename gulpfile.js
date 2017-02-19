const gulp = require('gulp')
const shell = require('gulp-shell')
const spawn = require('gulp-spawn')

gulp.task('default', ['start'], function() {
    gulp.watch(['./src/**/*.php', './tests/**/*.php'], ['update'])
})

gulp.task('start', function() {
    return gulp.src('.')
        .pipe(spawn({ cmd: "docker-compos", args: [ "-f", "./development/start.yml", "up" ]}))
        .pipe(shell(['docker-compose -f ./development/install.yml up']))
})

gulp.task('update', shell.task(['docker-compose -f ./development/update.yml up']))