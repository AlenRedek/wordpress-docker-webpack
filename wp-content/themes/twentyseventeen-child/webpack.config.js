const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const defaultConfig = require('@wordpress/scripts/config/webpack.config');

module.exports = {
  ...defaultConfig,
  entry: {
    admin: path.resolve(process.cwd(), 'assets/src/admin', 'index.js'),
    front: path.resolve(process.cwd(), 'assets/src/front', 'index.js'),
  },
  output: {
    // [name] is an alias for the entry point
    filename: '[name]/[name].js',
    path: path.resolve(process.cwd(), 'assets/build'),
  },
  module: {
    ...defaultConfig.module,
    rules: [
      ...defaultConfig.module.rules,
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              importLoaders: 1,
            },
          },
          'postcss-loader',
          'sass-loader',
        ],
      },
    ],
  },
  plugins: [
    ...defaultConfig.plugins,
    new MiniCssExtractPlugin({
      filename: '[name]/[name].css',
    }),
  ],
};
