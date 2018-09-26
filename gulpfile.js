const gulp = require('gulp');
const minify = require('gulp-minify');
const less = require('gulp-less');
const minifyCSS = require('gulp-csso');
const babel = require('gulp-babel');

gulp.task('css', function(){
    return gulp.src('App/Views/less/**/*.less')
        .pipe(less())
        .pipe(minifyCSS())
        .pipe(gulp.dest('public/assets/css'))
});

gulp.task('js', function() {
    return gulp.src('App/Views/js/**/*.js')
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(minify())
        .pipe(gulp.dest('public/assets/js'))
});

gulp.task('watch', function() {
    gulp.watch(['App/Views/less/**/*.less', 'App/Views/js/**/*.js'], ['css', 'js']);
});

gulp.task('default', ['css', 'js', 'watch']);