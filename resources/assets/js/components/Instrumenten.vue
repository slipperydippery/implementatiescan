<template>
	<div class="row searchitems">
		<div class="small-6 columns">
			<input type="text" v-model="search" placeholder="Zoek in beschrijving">
		</div>
		<div class="small-6 columns">
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
		<div class="small-7 columns">
			Beschrijving
		</div>
		<div class="small-3 columns">
			Themas
		</div>
	</div>


	<div class="row table-row table-row--body"
		v-for="instrument in instruments | filterBy search | filterBy checkedThemas[0] | filterBy checkedThemas[1] | filterBy checkedThemas[2]"
	>
		<div class="small-2 columns">
			<a :href="instrument.adress">
				{{ instrument.title}}
			</a>
		</div>
		<div class="small-7 columns">
			{{ instrument.description }}
		</div>
		<div class="small-3 columns">
			<span v-if="instrument.one">
				{{ themas[0].title }} <br>
			</span>
			<span v-if="instrument.two">
				{{ themas[1].title }} <br>
			</span>
			<span v-if="instrument.three">
				{{ themas[2].title }} <br>
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
			this.getThemas();
			// this.getInstruments(); //get participants and set availableinstances
		},

		computed: {
			returnRoot: function () {
				return (window.location.protocol + "//" + window.location.host);
			},
		},

		methods: {
			getInstruments: function () {
			    this.$http.get('/api/instruments')
			        .then(response => {
			            this.instruments = response.data;
			            this.replaceThemas();
			        });
			},
			getThemas: function () {
				this.$http.get('/api/scanmodel/thema')
					.then(response => {
						this.themas = response.data;
						this.getInstruments();
					});
			},
			replaceThemas: function () {
				for (var instrument in this.instruments)
				{
					// this.instruments[instrument].themas = [];
					if(this.instruments[instrument].one)
					{
						this.instruments[instrument].one = 	this.themas[0].title;
						this.instruments[instrument].themas.push(this.themas[0].title);
					}
					if(this.instruments[instrument].two)
					{
						this.instruments[instrument].two = 	this.themas[1].title;
						this.instruments[instrument].themas.push(this.themas[1].title);
					}
					if(this.instruments[instrument].three)
					{
						this.instruments[instrument].three = 	this.themas[2].title;
						this.instruments[instrument].themas.push(this.themas[2].title);
					}
				}
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