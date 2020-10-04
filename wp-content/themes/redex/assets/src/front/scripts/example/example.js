import jQuery from 'jquery';
import { kebabCase } from 'lodash-es';

jQuery(($) => {
  $('body h1').text((i, text) => kebabCase(text));
});
