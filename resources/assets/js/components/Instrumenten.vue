<template>
	<div class="row searchitems">
		<div class="small-6 columns">
			<h3>Zoek op trefwoord</h3>
			<input type="text" v-model="search" placeholder="Vul trefwoord in">
		</div>
		<div class="small-6 columns">
			<h3 class="text-right">Zoekfilter</h3>
			<div v-for="thema in themas" class="searchfilter">
				<label :for="thema.id" class="inlinelabel">{{ thema.title }}</label>
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
			Thema's
		</div>
	</div>

	<div class="row table-row table-row--body"
		v-for="instrument in searchedAndFilteredInstruments"
	>
		<div class="small-2 columns">
			<a :href="instrument.adress" class="visible_link--basic" >
				{{ instrument.title }}
			</a>
		</div>
		<div class="small-7 columns">
			{{ instrument.description }}
		</div>
		<div class="small-3 columns">
			<span v-for="thema in instrument.themas">
				{{ thema }} <br>
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
				admin: admin,
			}
		},

		ready() {
			this.getThemas();
		},

		computed: {
			returnRoot: function () {
				return (window.location.protocol + "//" + window.location.host);
			},

			searchedAndFilteredInstruments: function () {
				var self = this;
				return self.filteredInstruments.filter(function(instrument) {
					if( (instrument.description.toLowerCase().indexOf(self.search.toLowerCase()) !== -1) ||
						(instrument.title.toLowerCase().indexOf(self.search.toLowerCase()) !== -1) ||
						(instrument.adress.toLowerCase().indexOf(self.search.toLowerCase()) !== -1) 
					)
					{
						return true;
					}
				})
			},

			filteredInstruments: function () {
				var self = this;
				return self.instruments.filter(function (instrument) {
					for(var thema in self.checkedThemas)
					{
						if(instrument.themas.includes(self.checkedThemas[thema]))
						{
							return true;
						}
					}
					if(self.checkedThemas.length == 0)
					{
						return true;
					}
				})
			}
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
					if(this.instruments[instrument].one)
					{
						this.instruments[instrument].one = this.themas[0].title;
						this.instruments[instrument].themas.push(this.themas[0].title);
					}
					if(this.instruments[instrument].two)
					{
						this.instruments[instrument].two = this.themas[1].title;
						this.instruments[instrument].themas.push(this.themas[1].title);
					}
					if(this.instruments[instrument].three)
					{
						this.instruments[instrument].three = this.themas[2].title;
						this.instruments[instrument].themas.push(this.themas[2].title);
					}
				}
			},
		},
	}
</script>

<style>
	.searchfilter {
		text-align: right;
		label, input {
			display: inline-block;
		}
	}
</style>