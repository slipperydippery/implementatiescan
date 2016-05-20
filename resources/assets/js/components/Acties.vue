<template>

	<div class="row" v-for="thema in themas">
		{{ thema.title }}
		{{ thema.id }}
		<actie></actie>
	</div>

</template>

<script>
	export default {
		props: {
			model: Object
		},

		data() {
			return {
				list: [],
				themas: themas
			};
		},
		created() {
			console.log(themas);
			// var x = themas.1.id;
			this.fetchVerbeteracties(1);
		},

		methods: {
			fetchVerbeteracties: function(nummer) {
				var resource = this.$resource('../../api/verbeteracties/:id');

				resource.get({ id : nummer }, function(verbeteracties) {
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