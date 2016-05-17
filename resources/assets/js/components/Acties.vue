<template>
	<div class="row actie-rij" v-for="verbeteractie in list">	
		<div class="large-3 columns actie-omschrijving"> 
			bloop
			{{ verbeteractie.title }} 
		</div>

		<div class="large-3 columns">
			@{{ verbeteractie.omschrijving }}
		</div>

	</div>
</template>

<script>
	export default {
		props: [],

		data() {
			return {
				list: []
			};
		},
		created() {
			this.fetchVerbeteracties();
		},

		methods: {
			fetchVerbeteracties: function() {
				var resource = this.$resource('../../api/verbeteracties/:id');

				resource.get({ id : 1 }, function(verbeteracties) {
					this.list = verbeteracties;
				}.bind(this));
			},
		},

		computed: {

		}

	}
</script>


<style lang="stylus">
	
</style>