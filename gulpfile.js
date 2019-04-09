let gulp = require('gulp');
let concat = require('gulp-concat');
let cssimport = require('gulp-cssimport');
let autoprefixer = require('gulp-autoprefixer');
let minifyCSS = require('gulp-minify-css');
let watch = require('gulp-watch');

// task for gulp
// в скобках название задания


function generateCatalog() {
   
    return gulp.src('styles/catalog.css')    
                .pipe(cssimport())
                .pipe(autoprefixer({
                    browsers: ['< 0.1%'],
                    cascade: false
                }))
                .pipe(minifyCSS({keepBreaks:true}))
                .pipe(gulp.dest('styles/dest/'));
                
};

function generateMain() {
   
    return gulp.src('styles/main.css')    
                .pipe(cssimport())
                .pipe(autoprefixer({
                    browsers: ['< 0.1%'],
                    cascade: false
                }))
                .pipe(minifyCSS({keepBreaks:true}))
                .pipe(gulp.dest('styles/dest/'));
                
};
function watchCssFiles() {
    watch ('styles/blocks/**/*.css', generateCatalog);
    watch ('styles/blocks/**/*.css', generateMain);
}


gulp.task('watch', watchCssFiles);
gulp.task('style', generateCatalog);