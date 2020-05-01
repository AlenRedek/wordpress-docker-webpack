const defaultConfig = require('@wordpress/scripts/config/.prettierrc');

module.exports = {
  ...defaultConfig,
  parenSpacing: false,
  useTabs: false,
  tabWidth: 2,
  trailingComma: 'all',
};
