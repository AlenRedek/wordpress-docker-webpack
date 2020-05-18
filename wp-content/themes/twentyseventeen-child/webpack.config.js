const path = require('path');
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
};
