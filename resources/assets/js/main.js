$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var Vue = require('vue');
Vue.use(require('vue-resource'));
window.scanoverviewHub = new Vue();

// var bus = new Vue();

// import scanoverviewHub from './eventhubs/ScanoverviewHub.js';
import InvoerenDeelnemers from './components/InvoerenDeelnemers.vue';
import ControlerenDeelnemers from './components/ControlerenDeelnemers.vue';
import ScanSlider from './components/ScanSlider.vue';
import SingleSlider from './components/SingleSlider.vue';
import ThemaResultaat from './components/ThemaResultaat.vue';
import PreThemaResultaat from './components/PreThemaResultaat.vue';
import Acties from './components/Acties.vue';
import Instrumenten from './components/Instrumenten.vue';
import Programmas from './components/Programmas.vue';
import Praktijkvoorbeelds from './components/Praktijkvoorbeelds.vue';
import Pdfs from './components/Pdfs.vue';
import Deelnemersveld from './components/Deelnemersveld.vue';
import Criteria from './components/Criteria.vue';
import Scanlist from './components/Scanlist.vue';
import Kennismaken from './components/Kennismaken.vue';
import DeelnemersMenuItem from './components/DeelnemersMenuItem.vue';


new Vue({
	http: {
		base: '/base',
		headers: {
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

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
		Instrumenten,
		Programmas,
		Praktijkvoorbeelds,
		Pdfs,
		Deelnemersveld,
		Criteria,
		Scanlist,
		Kennismaken,
		DeelnemersMenuItem
	},
	

	methods: {
	},

	computed: {
	},

	ready() {
	}

});
