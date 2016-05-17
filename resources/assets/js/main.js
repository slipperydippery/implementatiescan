var Vue = require('vue');

Vue.use(require('vue-resource'));

import Acties from './components/Acties.vue';

new Vue({
	el: 'body', 

	data: {
		slider_input: '50'
	},

	components: { Acties },

	ready() {
		// alert('Ready to go!');
	}

});
