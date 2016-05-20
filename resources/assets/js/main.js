var Vue = require('vue');

Vue.use(require('vue-resource'));

// import Actie from './components/Actie.vue';
// import Acties from './components/Acties.vue';

Vue.component('acties', {
	template: '#acties-template',
	data() {
		return {
			list: [],
			themas: themas
		};
	},

	created() {

	}
});

Vue.component('actie', {
	template: '#actie-template',
})



new Vue({
	el: 'body', 

	data: {
		// themas: themas
	},

	// components: { Acties, Actie },

	ready() {
		// alert('Ready to go!');
	}

});
