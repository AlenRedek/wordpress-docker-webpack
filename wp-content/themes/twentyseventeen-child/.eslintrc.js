const defaultPrettierConfig = require('./.prettierrc');

module.exports = {
  root: true,
  extends: [require.resolve('@wordpress/scripts/config/.eslintrc')],
  rules: {
    'prettier/prettier': ['error', defaultPrettierConfig],
  },
};
