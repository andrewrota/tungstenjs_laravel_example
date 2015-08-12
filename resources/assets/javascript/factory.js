var registry = {
	views: {},
	models: {},
	templates: {}
};

// Function to add key/value onto registry
function register(type, name, value) {
	registry[type][name] = value;
}

// Convenience functions to register views, models and templates for Factory
module.exports.registerView = function(name, Constructor) {
	register('views', name, Constructor);
};

module.exports.registerModel = function(name, Constructor) {
	register('models', name, Constructor);
};

module.exports.registerTemplate = function(name, template) {
	register('templates', name, template);
};

function doLoad() {
	// Read bootstrapped data from Laravel loaded location
	var bootstrappedData = window.data;
	for (var key in bootstrappedData) {
		if (bootstrappedData.hasOwnProperty(key)) {
			// Ensure the element was loaded on the page, then continue
			var elem = document.getElementById(key);
			if (elem) {
				var inst = bootstrappedData[key];
				// Read constructors and template from registry
				var View = registry.views[inst.view];
				var Model = registry.models[inst.model];
				var template = registry.templates[inst.template];

				var viewIsValid = View && typeof View === 'function' && View.tungstenView;
				var modelIsValid = Model && typeof Model === 'function' && (Model.prototype.tungstenModel || Model.prototype.tungstenCollection);
				var templateIsValid = template && typeof template.toVdom === 'function';

				if (viewIsValid && modelIsValid && templateIsValid) {
					inst.instance = new View({
						el: elem,
						model: new Model(inst.data),
						template: template
					});
				}
			}
		}
	}
}

// Attach to window.onload and bootstrap data
if (typeof window.addEventListener === 'function') {
	window.addEventListener('load', doLoad);
} else {
	window.attachEvent('onload', doLoad);
}