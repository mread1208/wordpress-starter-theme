module.exports = function(grunt) {
	
	// load all grunt tasks matching the ['grunt-*', '@*/grunt-*'] patterns
	require('load-grunt-tasks')(grunt);
	
	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
			dist: {
				files: {
					'style.css': 'scss/style.scss'
				}
			}
		},
		uglify: {
			options: {
				banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
			},
			my_target: {
				files: {
					'functions.min.js': ['js/functions.js']
				}
			}
		},
		watch: {
			css: {
				files: [ 'scss/*.scss', 'js/*.js' ],
				tasks: ['sass', 'uglify']
			}
		}
	});
	
	// Default task(s).
	grunt.registerTask('default', ['watch']);

};