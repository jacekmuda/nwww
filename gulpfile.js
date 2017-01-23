let gulp = require('gulp'),
    $    = require('gulp-load-plugins')();

let gutil = require('gulp-util'),
    ftp = require('vinyl-ftp');

let themebase =  'web/app/themes/nwww',
    dist = themebase+'/dist',
    bower = 'bower_components/';


let sassPaths = [
    bower+'bootstrap-sass/assets/stylesheets',
    bower+'NWWW/sass/theme',
    bower+'NWWW/sass/app-style'
];



var browserSync = require('browser-sync').create();
var reload = browserSync.reload;



gulp.task('bs-reload', function () {
    browserSync.reload();
});



gulp.task('browser-sync', function() {
    browserSync.init([dist+'/css/*.css', dist+'/js/*.js'], {

        proxy: 'http://nwww.dev',
        open: 'external'

    });
});


gulp.task('js', function (){
  return gulp.src('assets/js/*.js')
        .pipe($.babel({
            presets: ['es2015']
        }))
        .pipe(gulp.dest(dist+'/js'))
        .pipe(reload({stream: true}))
});



gulp.task('sass', function() {
  return gulp.src('assets/scss/main.scss')
    .pipe($.sass({
      includePaths: sassPaths,
      outputStyle: 'compressed'
    })
      .on('error', $.sass.logError))
    .pipe($.autoprefixer({
      browsers: ['last 2 versions', 'ie >= 9']
    }))
    .pipe(gulp.dest(dist+'/css'))
    .pipe(reload({stream: true}))
});



gulp.task('default', ['sass', 'js', 'browser-sync'], function() {


  gulp.watch(['assets/js/**/*.js'], ['js']);
  gulp.watch(['assets/scss/**/*.scss'], ['sass']);

  gulp.watch([themebase+'/**/*.php']).on('change', function(file){

      browserSync.reload({stream: true})
  });

    gulp.watch([themebase+'/**/*.php'], ['bs-reload']);
    gulp.watch([themebase+'/**/*.twig'], ['bs-reload']);

});


var env = require('./env.json');


function ftpco() {
    return ftp.create({
        host: env.host,
        port: env.port,
        user: env.user,
        password: env.password,
        parallel:5,
        log: gutil.log
    });
}

gulp.task('deploy', function () {

    var connect = ftpco();
  
    var remoteFolder = env.base+themebase;
  
    return gulp.src([themebase+'/**/*'], {
        base: themebase,
        buffer: false
    })
        .pipe(connect.newer(remoteFolder))
        .pipe(connect.dest(remoteFolder));
});
