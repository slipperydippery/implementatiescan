<template>
	<acties-thema 
		 v-for="thema in themas"
		 :thema.sync="thema"
		 :participants="participants"
	>
		
	</acties-thema>
	
</template>

<script>
	import ActiesThema from '../components/ActiesThema.vue';
	
	export default {

		components: { ActiesThema },

		props: [],

		data() {
			return {
				scan:scan,
				themas: [],
				participants: participants,
			};
		},

		created() {
		},

		ready() {
			this.getThemas();
		},

		methods: {
			getThemas: function () {
			var home = this;
				var resource = this.$resource('/api/scan/:scan/thema');
				resource.get({scan: this.scan.id}).then(function (response) {
				          home.$set('themas', response.data)
				});
			},


			getparticipant: function (participant) {
				var home = this;
				var resource = this.$resource('/api/scan/:scan/participant/:participant');
				resource.get({scan: this.scan.id, participant: participant}).then(function (response) {
					//
				});
			},

		},

		computed: {

		},

		events: {
		    reloadData: function () {
		        this.getThemas();
		    }
		},

	}
</script>


<style>
	
</style>