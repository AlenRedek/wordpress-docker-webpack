module.exports = {
  extends: [
    require.resolve('@wordpress/scripts/config/.stylelintrc'),
    'stylelint-config-prettier',
  ],
  rules: {
    indentation: 2,
    'string-quotes': 'single',
    'function-url-quotes': 'always',
  },
};
