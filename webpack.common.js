const path = require("path");

module.exports = {
    entry: {
        main: "./js/main.ts",
    },
    output: {
        filename: "[name].bundle.js",
        path: path.resolve(__dirname),
    },
    resolve: {
        extensions: [".ts", ".tsx", ".js", ".json"],
    },
    module: {
        rules: [
            {
                test: /\.(ts|js)x?$/,
                exclude: /node_modules/,
                use: {
                    loader: "babel-loader",
                    options: {
                        presets: ["@babel/preset-env"],
                    },
                },
            },
        ],
    },
};
