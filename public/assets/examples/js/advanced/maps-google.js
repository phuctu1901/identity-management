(function (global, factory) {
  if (typeof define === "function" && define.amd) {
    define('/advanced/maps-google', ['jquery', 'Site'], factory);
  } else if (typeof exports !== "undefined") {
    factory(require('jquery'), require('Site'));
  } else {
    var mod = {
      exports: {}
    };
    factory(global.jQuery, global.Site);
    global.advancedMapsGoogle = mod.exports;
  }
})(this, function (_jquery, _Site) {
  'use strict';

  var _jquery2 = babelHelpers.interopRequireDefault(_jquery);

  (0, _jquery2.default)(document).ready(function () {
    (0, _Site.run)();

    // Simple
    // ------------------

    // Custom
    // ------------------


  });
});
