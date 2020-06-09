import jQuery from 'jquery';
import { repeat } from 'lodash-es';

jQuery(($) => {
  $('.site-title a').text(repeat('example', 3));
});
