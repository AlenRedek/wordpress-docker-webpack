import jQuery from 'jquery';
import { kebabCase } from 'lodash-es';

jQuery(($) => {
  $('body a').text((i, text) => kebabCase(text));
});
