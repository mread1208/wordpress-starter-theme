const path = require("path");

module.exports = {
    mode: "development",
    entry: ["./js/functions.js"],
    output: {
        filename: "functions.min.js",
        path: path.resolve(__dirname, "js"),
    },
};
