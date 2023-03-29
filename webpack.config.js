const path = require("path");
const Dotenv = require("dotenv-webpack");

module.exports = {
  entry: "./src/js/index.js",
  mode: "development",
  output: { path: __dirname, filename: "./dist//main/js/bundle.js" },
  module: {
    rules: [
      {
        test: /\.js$/,
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
  resolve: {
    extensions: ["*", ".js", ".json"],
  },
  plugins: [new Dotenv()],
  target: ["web", "es5"],
};
