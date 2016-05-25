$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var Vue = require('vue');

Vue.use(require('vue-resource'));



import Actie from './components/Actie.vue';
import Acties from './components/Acties.vue';
import ScanSlider from './components/ScanSlider.vue';
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
	props: ['unanswered'],
	data: {
	},

	components: { Acties, Acties, ScanSlider },

	methods: {
		checkThemaAnswered: function (scan, thema) {
			$.get(window.location.protocol + "//" + window.location.host + '/api/scan/' + scan + '/thema/' + thema + '/themaanswered', function (response) {
				window.unanswered = response;
			});
			return window.unanswered;
		},	

		setThemaAnswered: function (answered)
		{
			this.unanswered = answered;
		},

		allAnswered: function () {
		}
	},

	computed: {
		showMe: function () {
			return this.unanswered == 0 ? true : false;
		}
	},

	ready() {
        var self = this;
		setInterval(function () {
			self.unanswered = this.checkThemaAnswered(scan.id, thema_id);
		}.bind(self), 1000);
	}

});
