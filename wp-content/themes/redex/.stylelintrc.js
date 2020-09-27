module.exports = {
  extends: [
    require.resolve('@wordpress/scripts/config/.stylelintrc'),
    'stylelint-config-prettier',
  ],
  rules: {
    indentation: 2,
    'no-empty-source': null,
    'string-quotes': 'single',
  },
};
