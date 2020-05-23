import { jQuery } from 'jquery';

const $j = jQuery.noConflict();

$j(() => {
  $j('.site-title a').text('example');
});
