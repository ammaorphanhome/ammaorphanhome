module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		watch: {
			scss: {
				files: ['src/sass/**/*.sass'],
				tasks: ['sass', 'autoprefixer']
			},
			jade: {
				files: ['src/jade/**/*.jade'],
				tasks: ['jade']
			}
		},
		jade: {
			compile: {
				options: {
					pretty: true
				},
				files: [{
					src: ['**/*.jade', '!**/_*.jade'],
					dest: "dist/",
					ext: ".html",
					cwd: "src/jade/",
					expand: true
				}]
			}
		},
		sass: {
			dist: {
				options: {
					outputStyle: 'compressed',
					sourceMap: true
				},
				files: [{
					expand: true,
					cwd: 'src/sass/',
					src: ['*.sass'],
					dest: 'dist/css/',
					ext: '.css'
				}]
			}
		},
		autoprefixer: {
			options: {
				browsers: ['last 2 versions', 'ie 8', 'ie 9'],
				safe: true,
				map: false
			},
			dist: {
				src: ['dist/css/main.css']
			}
		}
	});

	// Load the Grunt plugins.
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-jade');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-sass');
};
