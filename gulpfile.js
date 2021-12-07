var gulp = require('gulp');
var sass = require('gulp-sass')(require('sass'));

gulp.task('sass', function(){
    return gulp.src('app/scss/index.scss')
    .pipe(sass())
    .pipe(gulp.dest('app/css'))
});