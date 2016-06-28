$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var Vue = require('vue');

Vue.use(require('vue-resource'));


import InvoerenDeelnemers from './components/InvoerenDeelnemers.vue';
import ControlerenDeelnemers from './components/ControlerenDeelnemers.vue';
import ScanSlider from './components/ScanSlider.vue';
import SingleSlider from './components/SingleSlider.vue';
import ThemaResultaat from './components/ThemaResultaat.vue';
import PreThemaResultaat from './components/PreThemaResultaat.vue';
import Acties from './components/Acties.vue';

// import Algemeenbeeld from './components/Algemeenbeeld.vue';

// Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

new Vue({
	http: {
		root: '/root',
		headers: {
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},
	// headers: {
	//   'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
	// },

	el: 'body', 
	props: [],
	data: {
		number: 0,
	},

	components: { 
		Acties, 
		ScanSlider, 
		SingleSlider, 
		InvoerenDeelnemers, 
		ThemaResultaat, 
		ControlerenDeelnemers ,
		PreThemaResultaat,
	},

	methods: {
	},

	computed: {
	},

	ready() {
	}

});
