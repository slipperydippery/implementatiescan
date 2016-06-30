<template>
	<div class="row searchitems">
		<div class="large-4 small-6 float-right">
			<input type="text" v-model="search" placeholder="Zoek in beschrijving">
			<div v-for="thema in themas" class="searchfilter">
				<label :for="thema.id">{{ thema.title }}</label>
				<input type="checkbox" :id="thema.id" :value="thema.title" v-model="checkedThemas">
			</div>
		</div>
		<br>

	</div>

	<div class="row table-row table-header">
		<div class="small-2 columns">
			Naam
		</div>
		<div class="small-4 columns">
			Beschrijving
		</div>
		<div class="small-3 columns">
			Link
		</div>
		<div class="small-3 columns">
			Themas
		</div>
	</div>


	<div class="row table-row table-row--body"
		v-for="instrument in instruments 
		| filterBy search in 'description' 
		| filterBy checkedThemas in 'themas'"
	>
		<div class="small-2 columns">
			{{ instrument.title}}
		</div>
		<div class="small-4 columns">
			{{ instrument.description }}
		</div>
		<div class="small-3 columns">
			{{ instrument.adress }}
		</div>
		<div class="small-3 columns">
			<span v-for="thema in instrument.themas">
				{{ thema.title }} <br>
			</span>
		</div>
	</div>
	

</template>

<script>

	export default {
		
		components: {  },
		props: [],

		data() {
			return {
				search: '',
				instruments: [],
				themas: [],
				checkedThemas: [],
			}
		},

		ready() {
			this.getInstruments(); //get participants and set availableinstances
			this.getThemas();
		},

		computed: {
			returnRoot: function () {
				return (window.location.protocol + "//" + window.location.host);
			},
		},

		methods: {

			getInstruments: function () {
			    this.$http.get('/api/databank')
			        .then(response => {
			            this.instruments = response.data;
			        });
			},
			getThemas: function () {
				this.$http.get('/api/scanmodel/thema')
					.then(response => {
						this.themas = response.data;
					});
			},

	

		},

		events: {

		},

	}
</script>


<style lang="stylus">

.searchfilter {
	text-align: right;
	label, input {
		display: inline-block;
	}
}
	
</style>