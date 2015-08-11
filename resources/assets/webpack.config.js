var path = require('path');
var dev = true;
module.exports = {
  entry: './javascript/app',
  output: {
    filename: dev ? 'app.min.js' : path.resolve('./../../public/app.min.js'),
    path: './'
  },
  resolve: {
    alias: {
      // Tungsten.js doesn't need jQuery, but backbone needs a subset of jQuery APIs.  Backbone.native
      // implements tha minimum subset of required functionality
      'jquery': 'backbone.native',
      // alias for template compiler references in templates
      'tungstenjs/src/template/template': path.resolve(__dirname, '../assets/node_modules/tungstenjs/src/template/template')
    }
  },
  resolveLoader: {
    modulesDirectories: ['node_modules', path.join(__dirname, 'node_modules/tungstenjs/precompile')]
  },
  module: {
    loaders: [
      { test: /\.mustache$/, loader: 'tungsten_template' },
      { test: /\.json$/, loader: 'json-loader' }
    ]
  }
};