const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const dotenv = require('dotenv');
const path = require('path');

// Add .env constants to process.env
dotenv.config({ path: '../../../.env' });

const isProduction = process.env.NODE_ENV === 'production';
const siteUrl = process.env.WP_SITEURL;

const entryPath = 'assets/src';
const outputPath = 'assets/build';

const cssLoaders = defaultConfig.module.rules
  .find((rule) => rule.test?.test('.scss'))
  .use.filter((rule) => !rule.loader?.includes('sass-loader'));

const config = {
  ...defaultConfig,
  entry: {
    admin: path.resolve(process.cwd(), `${entryPath}/admin`, 'index.js'),
    front: path.resolve(process.cwd(), `${entryPath}/front`, 'index.js'),
  },
  output: {
    // [name] is an alias for the entry point
    filename: '[name].js',
    path: path.resolve(process.cwd(), outputPath),
  },
  resolve: {
    ...defaultConfig.resolve,
    extensions: ['.js', '.scss'],
  },
  performance: {
    maxEntrypointSize: 512000,
    maxAssetSize: 1024000,
  },
  stats: {
    modules: false,
  },
  module: {
    ...defaultConfig.module,
    rules: [
      ...defaultConfig.module.rules
        .filter((rule) => !rule.test?.test('.scss'))
        .filter(
          (rule) => !rule.test?.test('.svg') || !rule.issuer?.test('.scss'),
        ),
      // Replace default SASS loader to ignore dart-sass warnings for external dependencies
      {
        test: /\.(sc|sa)ss$/,
        use: [
          ...cssLoaders,
          {
            loader: require.resolve('sass-loader'),
            options: {
              sourceMap: !isProduction,
              sassOptions: {
                quietDeps: true,
              },
            },
          },
        ],
      },
      // Replace default SVG loader to prevent huge CSS files filled with Base64 encoding
      {
        test: /\.svg$/,
        issuer: /\.(sc|sa|c)ss$/,
        type: 'asset/resource',
        generator: {
          filename: 'fonts/[name].[hash:8][ext]',
        },
      },
    ],
  },
  plugins: [
    ...defaultConfig.plugins,
    // Replace LiveReload with BrowserSync in order to watch the PHP files
    !isProduction &&
      new BrowserSyncPlugin(
        {
          files: [
            '**/*.php',
            `${outputPath}/**/*.js`,
            `${outputPath}/**/*.css`,
          ],
          open: false,
          proxy: siteUrl,
        },
        // Prevent BrowserSync from reloading the page and let Webpack take care of this
        {
          reload: false,
        },
      ),
  ].filter(Boolean),
};

module.exports = config;
