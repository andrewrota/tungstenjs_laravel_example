var factory = require('./factory');

var AppView = require('./views/todo_app_view');
var AppModel = require('./models/todo_app_model');
var template = require('../../views/todo_app_view.mustache');

factory.registerView('AppView', AppView);
factory.registerModel('AppModel', AppModel);
factory.registerTemplate('todo_app_view', template);

module.exports = new AppView({
  el: '#appwrapper',
  template: template,
  model: new AppModel(window.data)
});