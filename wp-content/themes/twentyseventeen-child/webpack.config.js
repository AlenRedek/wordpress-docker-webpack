const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const LiveReloadPlugin = require('webpack-livereload-plugin');
const defaultConfig = require('@wordpress/scripts/config/webpack.config');

const isProduction = process.env.NODE_ENV === 'production';
const entryPath = 'assets/src';
const outputPath = 'assets/build';

module.exports = {
  ...defaultConfig,
  entry: {
    admin: path.resolve(process.cwd(), `${entryPath}/admin`, 'index.js'),
    front: path.resolve(process.cwd(), `${entryPath}/front`, 'index.js'),
  },
  output: {
    // [name] is an alias for the entry point
    filename: '[name]/[name].js',
    path: path.resolve(process.cwd(), outputPath),
  },
  resolve: {
    ...defaultConfig.resolve,
    extensions: ['.js', '.scss'],
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
    // Replace LiveReload with BrowserSync in order to watch the PHP files
    ...defaultConfig.plugins.filter(
      (plugin) => !(plugin instanceof LiveReloadPlugin),
    ),
    !isProduction &&
      new BrowserSyncPlugin(
        {
          proxy: 'http://localhost:8000',
          files: [
            '**/*.php',
            `${outputPath}/**/*.js`,
            `${outputPath}/**/*.css`,
          ],
        },
        // Prevent BrowserSync from reloading the page and let Webpack do it
        { reload: false },
      ),
    new MiniCssExtractPlugin({
      filename: '[name]/[name].css',
    }),
  ].filter(Boolean),
};
