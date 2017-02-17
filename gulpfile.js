/*------------------------------------------------------------------------------
  Gulpfile.js
------------------------------------------------------------------------------*/
// Name your theme - this is outputted only when packaging your project.
var theme = 'critica';

/*------------------------------------------------------------------------------
  Variables
------------------------------------------------------------------------------*/

// Global vars
var app = {
    production: true,
    defaultTasks: [
        'copy',
        'scss',
        'scripts'
    ]
};

// Vendor Distributions
var vendors = {
    FontAwesome: 'bower_components/font-awesome',
    Foundation: 'bower_components/foundation-sites',
    SlickCarousel: 'bower_components/slick-carousel/slick',
    NiftyNav: 'bower_components/nifty-nav/src',
    FlexibleContent: 'git_repos/flexible-content',
    Ginger: 'bower_components/ginger-grid',
};

// Asset Paths
var assets = {
    css: 'assets/css',
    scss: 'assets/scss',
    js: 'assets/js',
    images: 'assets/img',
    fonts: 'assets/fonts',
    acfJson: 'acf-json',
    parts: 'parts',
    templates: 'templates',
};

/*------------------------------------------------------------------------------
  Parameters
------------------------------------------------------------------------------*/

// Allow passing a theme version to store versions in dist folder
var theme_version = '';
var argv1 = process.argv.slice(2,3).join();
var argv2 = process.argv.slice(3,4).join();
if((argv1 === 'package' || argv1 === 'build') && argv2 === '--version') {
    theme_version = 'v'+process.argv.slice(4,5).join();
    if(!theme_version.match(/\/$/gi)) {
        theme_version += '/';
    }
}

// Allow passing --dev environment
process.argv.forEach(function(v) {
    if(v.trim() === '--dev') {
        app.production = false;
        app.defaultTasks = ['watch'];
    }
});

/*------------------------------------------------------------------------------
  Dependencies
------------------------------------------------------------------------------*/

var gulp = require('gulp'),
     autoprefixer = require('gulp-autoprefixer'),
     concat = require('gulp-concat'),
     cssnano = require('gulp-cssnano'),
     git = require('gulp-git'),
     imagemin = require('gulp-imagemin'),
     jshint = require('gulp-jshint'),
     newer = require('gulp-newer'),
     notify = require('gulp-notify'),
     plumber = require('gulp-plumber'),
     rename = require('gulp-rename'),
     sass = require('gulp-sass'),
     sourcemaps = require('gulp-sourcemaps'),
     stylish = require('jshint-stylish'),
     uglify = require('gulp-uglify'),
     zip = require('gulp-zip');

/*------------------------------------------------------------------------------
  Tasks
------------------------------------------------------------------------------*/

// Clone vendor repos
gulp.task('repos',function() {

    var repos = [
        'git@bitbucket.org:factr1/flexible-content.git'
    ];

    repos.forEach(function(repo) {
        git.clone(repo,{
            cwd: './git_repos'
        },notify.OnError);
    });

});

// Copy vendor distribution files
gulp.task('copy',function() {

    // Fonts
    gulp.src([
            vendors.FontAwesome+'/fonts/fontawesome-webfont*.*',
            vendors.SlickCarousel+'/fonts/*'
        ])
        .pipe(newer(assets.fonts))
        .pipe(gulp.dest(assets.fonts));

    // SlickCarousel Loader Image
    gulp
        .src([
            vendors.SlickCarousel+'/ajax-loader.gif'
        ])
        .pipe(newer(assets.images))
        .pipe(gulp.dest(assets.images));

    // FlexibleContent
    gulp
        .src([
            vendors.FlexibleContent+'/flexible-content.json',
        ])
        .pipe(rename('group_5734c39eb9287.json'))
        .pipe(newer(assets.acfJson))
        .pipe(gulp.dest(assets.acfJson))

    gulp
        .src([
            vendors.FlexibleContent+'/templates/*.php',
        ])
        .pipe(newer(assets.templates+'/flexible-repeater'))
        .pipe(gulp.dest(assets.templates+'/flexible-repeater'));

});

// Compile styles
gulp.task('scss',function() {
    var task = gulp
        .src([
            assets.scss+'/*.scss'
        ])
        .pipe(sourcemaps.init())
        .pipe(plumber())
        .pipe(
            sass({
                outputStyle: app.production ? 'compressed' : 'nested',
                includePaths: [
                    vendors.FontAwesome+'/scss/',
                    vendors.Foundation+'/scss/',
                    vendors.SlickCarousel+'/',
                    vendors.NiftyNav+'/scss/',
                    vendors.FlexibleContent+'/',
                    vendors.Ginger+'/components/',
                    assets.scss
                ]
            })
            .on('error', sass.logError))
            .on('error', notify.onError("Error compiling SASS!")
        )
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(rename({
            extname: '.css'
        }))
        .pipe(gulp.dest(assets.css));

    if(app.production) {
            task.pipe(cssnano({
                discardComments: {
                    removeAll: true
                },
        minifyFontValues: false
            }));
        }
        
    return task
        .pipe(rename({
            extname: '.min.css'
        }))
        .pipe(gulp.dest(assets.css));
});

// Aliases for styles
gulp.task('sass',['scss']);
gulp.task('styles',['scss']);

// Concatenate & Minify JavaScript
gulp.task('scripts', function() {

    var task = gulp
        .src([
            assets.js+'/src/**/*.js'
        ])
        .pipe(plumber())
        .pipe(jshint())
        .pipe(jshint.reporter(stylish));

    task = gulp.src([
            vendors.SlickCarousel+'/slick.js',
            vendors.NiftyNav+'/js/nifty-nav.js',
            vendors.Ginger+'/js/ginger.js',
            assets.js+'/src/**/*.js'
        ])
        .pipe(plumber())
        .pipe(concat('theme.js'))
        .pipe(gulp.dest(assets.js));

    if(app.production) {
        task.pipe(uglify());
    }

    return task.pipe(rename({
        extname: '.min.js'
    }))
    .pipe(sourcemaps.init())
    .pipe(plumber())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(assets.js));
});

// Compress images
gulp.task('images', function() {
    return gulp
        .src(assets.images+'/*.{jpg,png,gif}')
        .pipe(plumber())
        .pipe(imagemin())
        .pipe(gulp.dest(assets.images));
});

// Package a zip for theme upload
gulp.task('package',function(cb) {

    gulp.on('task_stop',function(e) {
        if(e.task !== 'scss') {
            return;
        }
        gulp.start('scripts');
    });

    gulp.on('task_stop',function(e) {
        if(e.task !== 'scripts') {
            return;
        }
        gulp.start('images');
    });

    gulp.on('task_stop',function(e) {
        if(e.task !== 'images') {
            return;
        }

        gulp.src([
            '*.php',
            '*.png',
            '*.css',
        ])
        .pipe(gulp.dest( 'dist/' + theme ));

        var folders = [
            'acf-json',
            'assets',
            'inc',
            'parts',
            'plugins',
            'templates',
        ];

        folders.forEach(function(folder) {
            gulp.src( folder + '/**').pipe(gulp.dest( 'dist/' + theme + '/' + folder ));
        });

        cb();
    });

    gulp.start('scss');
});

gulp.task('zip',function(cb) {

    gulp.on('task_stop',function(e) {
        if(e.task !== 'package') {
            return;
        }

        setTimeout(function() {
            gulp.src('dist/'+theme+'/**')
                    .pipe(zip( theme + '.zip' ))
                    .pipe(gulp.dest( 'dist/' + theme_version ));

            cb();
        },2000);

    });

    gulp.start('package');
});

gulp.task('build',['zip']);

/*------------------------------------------------------------------------------
  Default Tasks
------------------------------------------------------------------------------*/

gulp.task('watch',function() {
    gulp.watch(assets.scss+'/**',['scss']);
    gulp.watch(assets.js+'/src/**',['scripts']);
});

gulp.task('default',app.defaultTasks);