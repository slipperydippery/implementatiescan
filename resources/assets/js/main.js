var Vue = require('vue');


Vue.use(require('vue-resource'));

import Tasks from './components/Tasks.vue';

new Vue({
	el: 'form', 

	data: {
		slider_input: '50'
	},

	components: { Tasks }

});
