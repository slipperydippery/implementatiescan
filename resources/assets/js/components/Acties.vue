<template>

	<div class="row" v-for="thema in themas">
	{{ thema.pivot.scanmodel_id }}
	pliep

			<div class="large-12">
				<div class="row">	
					<div class="large-3 actie-thema actie-thema-kop actiepunt-es columns"> {{ thema.title }} </div>
					<div class="large-3 actie-thema actiepunt-es columns">Omschrijving</div>
					<div class="large-3 actie-thema actiepunt-es columns">Trekker</div>
					<div class="large-3 actie-thema actiepunt-es columns">Betrokkenen</div>
				</div>
				<actie :thema_id=thema.id></actie> 
			</div>
	</div>

</template>

<script>
	import Actie from '../components/Actie.vue';
	
	export default {

		components: { Actie },

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
			// console.log(themas);
			// var x = themas.1.id;
			// this.fetchVerbeteracties(1);
		},
/*
		methods: {
			fetchVerbeteracties: function(nummer) {
				var resource = this.$resource('../../api/verbeteracties/:id');

				resource.get({ id : nummer }, function(verbeteracties) {
					this.list = verbeteracties;
				}.bind(this));
			},
		},
*/
		computed: {

		}

	}
</script>


<style lang="stylus">
	
</style>