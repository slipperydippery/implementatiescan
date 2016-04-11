var Vue = require('vue');


Vue.use(require('vue-resource'));

import Tasks from './components/Tasks.vue';

new Vue({
	el: 'body', 


	components: { Tasks }

});
