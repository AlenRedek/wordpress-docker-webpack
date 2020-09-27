import jQuery from 'jquery';
import { kebabCase } from 'lodash-es';

jQuery(($) => {
  $('body a').text((i, linkText) => kebabCase(linkText));
});
