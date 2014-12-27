var gulp = require('gulp');
var less = require('gulp-less');
var minifycss = require('gulp-minify-css');
var notify = require('gulp-notify');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var path = require('path');

var SRC_PATH = 'resources/assets/';
var BASE_PATH = 'public/assets/';

var third_party = [
    "vendor/bower_components/jquery/dist/jquery.min.js",
    "vendor/bower_components/bootstrap/dist/js/bootstrap.min.js",
    "vendor/bower_components/angular/angular.js",
    "vendor/bower_components/angular-route/angular-route.js",
    "vendor/bower_components/angular-sanitize/angular-sanitize.min.js",
    "vendor/bower_components/angular-bootstrap/ui-bootstrap.min.js",
    "vendor/bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js",
    "vendor/bower_components/ng-flow/dist/ng-flow-standalone.min.js",
    "vendor/bower_components/angular-dialog-service/dialogs.min.js",
    "vendor/bower_components/angular-dragdrop-ganarajpr/draganddrop.js"
];

gulp.task('less', function () {
    return gulp.src(SRC_PATH + 'less/main.less')
        .pipe(less({
            paths: [path.join('vendor', 'bower_components', 'bootstrap', 'less')]
        }))
        .pipe(minifycss())
        .pipe(gulp.dest(BASE_PATH + 'css'))
        .pipe(notify({"message": "LESS compiled!"}));
});

gulp.task('js', function () {
    return gulp.src(SRC_PATH + 'js/**/*.js')
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(gulp.dest(BASE_PATH + 'js'))
        .pipe(notify({"message": "JS compiled!"}));
});

gulp.task('watch', function () {
    gulp.watch(SRC_PATH + 'less/*.less', ['less']);
    gulp.watch(SRC_PATH + 'js/**/*.js', ['js']);
})

gulp.task('admin_less', function () {
    return gulp.src(SRC_PATH + 'admin/less/main.less')
        .pipe(less({
            paths: [path.join('vendor', 'bower_components', 'bootstrap', 'less')]
        }))
        .pipe(minifycss())
        .pipe(gulp.dest(BASE_PATH + 'admin/css'))
        .pipe(notify({"message": "LESS compiled!"}));
});

gulp.task('admin_js', function () {
    return gulp.src(third_party.concat([SRC_PATH + 'admin/js/**/*.js']))
        .pipe(concat('main.js'))
        //.pipe(uglify())
        .pipe(gulp.dest(BASE_PATH + 'admin/js'))
        .pipe(notify({"message": "JS compiled!"}));
});

gulp.task('admin_watch', function () {
    gulp.watch(SRC_PATH + 'admin/less/*.less', ['admin_less']);
    gulp.watch(SRC_PATH + 'admin/js/**/*.js', ['admin_js']);
})

gulp.task('admin_default', ['admin_less', 'admin_js', 'admin_watch']);
gulp.task('default', ['less', 'js', 'watch']);
