/*
This file is the main entry point for defining Gulp tasks and using Gulp plugins.
Click here to learn more. https://go.microsoft.com/fwlink/?LinkId=518007
*/

'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
const zip = require('gulp-zip');
var livereload = require('gulp-livereload');

var gutil = require( 'gulp-util' );
var ftp = require( 'vinyl-ftp' );

//variables
var theme = "mediafish";

//creates minified distribution theme
gulp.task('dist',function() {
    
    gulp.src([
        './**/*',
        '!./{sass,sass/**}',
        '!./{node_modules,node_modules/**}',
        '!./{archive,archive/**}',
        '!./{dist,dist/**}',
        '!gulpfile.js',
        '!package.json',
        '!package-lock.json',
        '!./{css/src,css/src/**}',
        '!./{js/src,js/src/**}',
        '!.gitignore'
    ])
   // .pipe(del('./dist/**', {force:true}))
    //.pipe(gulp.dest('./dist/mediafish/'))
    //.pipe(zip(theme + '.zip'))
    .pipe(gulp.dest('./dist/'));
});


//compiles scss files 
gulp.task('admin-compile-sass', function () {
    return gulp.src('./sass/*.scss')
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(rename('style.min.css'))
        .pipe(livereload())
        .pipe(gulp.dest('./css/'));
});

//adds dependencies to folders
gulp.task('get-dependencies', function() {
    //bootstrap 4 scss files
    gulp.src('./node_modules/bootstrap/scss/**/*').pipe(gulp.dest('./sass/bootstrap/'));
 });

//minify and compile scripts.js
gulp.task('admin-compile-scripts', function() {
    return gulp.src('./js/src/*.js')
      .pipe(uglify())
      .pipe(rename(function(path) {
        path.extname = ".min.js";
      }))
      .pipe(livereload())
      .pipe(gulp.dest('./js/'));
  });


/*WARNING DO NOT PUBLISH GULPFILE WITH FTP INFO TO PUBLIC REPO*/

//Publish theme to production server
gulp.task( 'publish',['dist'],function () {
 
    var conn = ftp.create( {
        host:     '',
        user:     '',
        password: '',
        parallel: 21,
        log:      gutil.log
    } );
    var globs = [
        '**',
        '!mediafish.zip'
    ];
    
    return gulp.src( globs,{ base: './dist', cwd: './dist', buffer: false } )
        // only upload newer files
        .pipe( conn.newer( '/public_html/wp-content/themes/' ) ) 
        .pipe( conn.dest( '/public_html/wp-content/themes/' ) );
} );

//Compares remote to local and deletes files in remote that are not located in local
gulp.task( 'clean',function () {
    var conn = ftp.create( {
        host:     'ftp.mediafish.io',
        user:     'mediafis',
        password: 's2c5E9i8iT',
        parallel: 21,
        log:      gutil.log,
        reload: true
    } );

    var globs = ['/public_html/wp-content/themes/mediafish/'];
    var local = './dist/mediafish/'
    conn.clean( globs, local );
});

///Main tasks [gulp, buid, watch]
//bulds dependencies
 gulp.task('build', ['get-dependencies','admin-compile-sass','admin-compile-scripts'])

 //watch for changes
 gulp.task('watch', function(){
    livereload.listen(35729);
    gulp.watch('**/*.php').on('change', function(file) {
          livereload.changed(file.path);
      });
    gulp.watch('./sass/*.scss', ['admin-compile-sass']);
    gulp.watch('./js/*.js', ['admin-compile-scripts']);
 });

 //default gulp builds and watches
 gulp.task('default', ['build', 'dist', 'watch'])
 
  
