const sass = require("node-sass");
const webpackProdConfig = require("./webpack.prod.js");
const webpackDevConfig = require("./webpack.dev.js");

module.exports = function (grunt) {
    // load all grunt tasks matching the ['grunt-*', '@*/grunt-*'] patterns
    require("load-grunt-tasks")(grunt);

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON("package.json"),
        webpack: {
            prod: webpackProdConfig,
            dev: webpackDevConfig,
        },
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
                    processors: [require("autoprefixer")(), require("cssnano")()],
                },
                src: "style.css",
                dest: "style.min.css",
            },
        },
        watch: {
            prod: {
                files: ["scss/**/*.scss", "js/**/*.ts"],
                tasks: ["sass", "stylelint", "postcss", "webpack:prod"],
            },
            dev: {
                files: ["scss/**/*.scss", "js/**/*.ts"],
                tasks: ["sass", "stylelint", "postcss", "webpack:dev"],
            },
        },
    });

    // Default task(s).
    grunt.registerTask("default", ["sass", "stylelint", "postcss", "webpack:prod", "watch:prod"]);
    grunt.registerTask("dev", ["sass", "stylelint", "postcss", "webpack:dev", "watch:dev"]);
};
