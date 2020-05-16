const path = require('path');
const defaultConfig = require('@wordpress/scripts/config/webpack.config');

module.exports = {
  ...defaultConfig,
  entry: {
    admin: path.resolve(process.cwd(), 'assets/js/src/admin', 'admin-index.js'),
    front: path.resolve(process.cwd(), 'assets/js/src/front', 'front-index.js'),
  },
  output: {
    filename: '[name]/[name].js',
    path: path.resolve(process.cwd(), 'assets/js/build'),
  },
};
