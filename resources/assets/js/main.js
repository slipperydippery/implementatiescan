var Vue = require('vue');

Vue.use(require('vue-resource'));

import Actie from './components/Actie.vue';
import Acties from './components/Acties.vue';


new Vue({
	el: 'body', 

	data: {
		// themas: themas
	},

	components: { Acties, Actie },

	ready() {
		// alert('Ready to go!');
	}

});
