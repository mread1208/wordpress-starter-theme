const sass = require("node-sass");

module.exports = function (grunt) {
    // load all grunt tasks matching the ['grunt-*', '@*/grunt-*'] patterns
    require("load-grunt-tasks")(grunt);

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON("package.json"),
        sass: {
            options: {
                implementation: sass,
                sourceMap: false,
                precision: 5,
                outputStyle: "expanded",
                indentType: "tab",
                indentWidth: 1,
            },
            dist: {
                files: {
                    "style.css": "scss/style.scss",
                },
            },
        },
        stylelint: {
            options: {
                configFile: ".stylelintrc",
                formatter: "json",
                ignoreDisables: false,
                failOnError: true,
                outputFile: "report/css-lint/log.json",
                reportNeedlessDisables: false,
            },
            all: ["scss/*.scss"],
        },
        postcss: {
            defaults: {
                options: {
                    map: true,
                    processors: [require("autoprefixer"), require("cssnano")()],
                },
                src: "style.css",
                dest: "style.min.css",
            },
        },
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n',
                compress: true,
                sourceMap: true,
            },
            mrstarter: {
                files: {
                    "js/functions.min.js": ["js/functions.js"],
                },
            },
        },
        watch: {
            css: {
                files: ["scss/**/*.scss", "js/functions.js"],
                tasks: ["sass", "stylelint", "postcss", "uglify:mrstarter"],
            },
        },
    });

    // Default task(s).
    grunt.registerTask("default", ["sass", "stylelint", "postcss", "uglify:mrstarter", "watch"]);
};
