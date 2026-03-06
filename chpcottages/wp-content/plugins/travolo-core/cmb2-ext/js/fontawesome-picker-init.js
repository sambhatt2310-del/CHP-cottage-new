jQuery(document).bind('DOMNodeInserted', function (travolo) {
  if (jQuery(travolo.target).find('div.cmb-type-fontawesome-icon').length > 0) {
    jQuery(travolo.target).find('.fontawesome-icon-select').iconpicker({
      hideOnSelect: true
    });
  }
});
jQuery(document).ready(function ($) {
  'use strict';
  $('.fontawesome-icon-select').iconpicker({
    hideOnSelect: true
  });
}); // End Ready