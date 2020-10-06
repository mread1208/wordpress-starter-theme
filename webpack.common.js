const path = require("path");

module.exports = {
    entry: {
        main: "./js/functions.js",
    },
    output: {
        filename: "[name].bundle.js",
        path: path.resolve(__dirname),
    },
};
