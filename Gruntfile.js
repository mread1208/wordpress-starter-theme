module.exports = function(grunt) {
    // load all grunt tasks matching the ['grunt-*', '@*/grunt-*'] patterns
    require("load-grunt-tasks")(grunt);

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON("package.json"),
        sass: {
            dist: {
                files: {
                    "style.css": "scss/style.scss"
                }
            }
        },
        postcss: {
            defaults: {
                options: {
                    map: true,

                    processors: [
                        require("autoprefixer"),
                        require("cssnano")()
                    ]
                },
                src: "style.css",
                dest: "style.min.css"
                // src: "style.css",
            }
        },
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n',
                compress: true,
                sourceMap: true
            },
            mrstarter: {
                files: {
                    "js/functions.min.js": ["js/functions.js"]
                }
            }
        },
        watch: {
            css: {
                files: ["scss/**/*.scss", "js/functions.js"],
                tasks: ["sass", "postcss", "uglify:mrstarter"]
            }
        }
    });

    // Default task(s).
    grunt.registerTask("default", ["sass", "postcss", "uglify:mrstarter", "watch"]);
};
