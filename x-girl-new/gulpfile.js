var gulp 			= require('gulp');
var sass 			= require('gulp-sass');
var browserSync 	= require('browser-sync');
var concat  		= require('gulp-concat');
var uglify  		= require('gulp-uglifyjs');
var cssnano 		= require('gulp-cssnano');
var rename 			= require('gulp-rename');
var del 			= require('del');
var imagemin 		= require('gulp-imagemin');
var pngquant 		= require('imagemin-pngquant');
var cache 			= require('gulp-cache');
var autoprefixer 	= require('gulp-autoprefixer');

gulp.task('sass', function(){
	return gulp.src('src/sass/*.+(scss|sass)')
	.pipe(sass())
	.pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], {cascade: true}))
	.pipe(gulp.dest('src/css/'))
	.pipe(browserSync.reload({stream: true}));
});


gulp.task('scripts', function(){
	return gulp.src([
		'src/js/jquery-3.1.1.min.js',
		'src/js/bootstrap.min.js',
		'src/js/owl.carousel.min.js'
	])
	.pipe(concat('libs.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('dist/js'));
});

gulp.task("customeScript", function(){
	return gulp.src([
		'src/js/main.js'
	])
	.pipe(uglify())
	.pipe(gulp.dest('dist/js'));
});

gulp.task('css-libs', function(){
	return gulp.src([
		'src/css/bootstrap.min.css',
		'src/css/owl.carousel.min.css',
		'src/css/owl.theme.default.min.css',
		'src/css/animate.css'
	])
	.pipe(concat('libs.min.css'))
	.pipe(cssnano())
	.pipe(gulp.dest('dist/css'));
});



gulp.task('browser-sync', function(){
	browserSync({
		server: {
			baseDir: 'src/'
		},
		notify: false
	});
});

gulp.task('build', ['clean', 'img' , 'sass', 'css-libs' , 'scripts', 'customeScript'], function(){
	var buildCss = gulp.src([
		'src/css/main.css',
		'src/css/libs.min.css'
	])
	.pipe(gulp.dest('dist/css')); 

	var buildHtml = gulp.src('src/*.html')
	.pipe(gulp.dest('dist'));

	});

	gulp.task('clean', function(){
		return del.sync('dist');
	});

	gulp.task('clearChache', function(){
		return cache.clearAll();
	});

	gulp.task('img', function(){
		return gulp.src('src/img/**/*')
		.pipe(cache(imagemin({
			interlaced: true,
			progressive: true,
			svgoPlugins: [{removeViewBox: false}],
			use: [pngquant()]
		})))
	.pipe(gulp.dest('dist/img'));
});


gulp.task('watch', ['browser-sync'] , function(){
	gulp.watch('src/sass/*.+(scss|sass)', ['sass']);
	gulp.watch('src/*.html', browserSync.reload);
	gulp.watch('src/css/*.css', browserSync.reload);
	gulp.watch('src/js/*.js', browserSync.reload);
});