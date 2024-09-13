const glob = require('glob');

// Keenthemes' plugins
var componentJs = glob.sync(`resources/_keenthemes/src/js/components/*.js`) || [];
var coreLayoutJs = glob.sync(`resources/_keenthemes/src/js/layout/*.js`) || [];
var grafJs = glob.sync(`resources/_keenthemes/src/js/graf/*.js`) || [];

module.exports = [
    ...componentJs,
    ...coreLayoutJs,
    ...grafJs,
];
