<template>
	<div class="row searchitems">
		<div class="small-6 columns">
			<h3>Zoek op trefwoord</h3>
			<input type="text" v-model="search" placeholder="Vul trefwoord in">
		</div>
		<div class="small-6 columns">
			<h3 class="text-right">Zoekfilter</h3>
			<div v-for="instantie in instanties" class="searchfilter">
				<label :for="instantie" class="inlinelabel">{{ instantie }}</label>
				<input type="checkbox" :id="instantie" :value="instantie" v-model="checkedThemas">
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
		v-for="praktijkvoorbeeld in praktijkvoorbeelds | filterBy search | filterBy checkedThemas[0] | filterBy checkedThemas[1] | filterBy checkedThemas[2]"
	>
		<div class="small-2 columns">
			<a :href="praktijkvoorbeeld.adress">
				{{ praktijkvoorbeeld.title}}
			</a>
		</div>
		<div class="small-7 columns">
			{{ praktijkvoorbeeld.description }}
		</div>
		<div class="small-3 columns">
			<span v-if="praktijkvoorbeeld.bedrijven">
				Bedrijven <br>
			</span>
			<span v-if="praktijkvoorbeeld.scholen">
				Scholen <br>
			</span>
			<span v-if="praktijkvoorbeeld.gemeenten">
				Gemeenten <br>
			</span>
			<span v-if="praktijkvoorbeeld.overig">
				Overig <br>
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
				praktijkvoorbeelds: [],
				checkedThemas: [],
				instanties: [
					'bedrijven',
					'scholen',
					'gemeenten',
					'overig',
				],
			}
		},

		ready() {
			this.getpraktijkvoorbeelds(); //get participants and set availableinstances
		},

		computed: {
			returnRoot: function () {
				return (window.location.protocol + "//" + window.location.host);
			},
		},

		methods: {
			getpraktijkvoorbeelds: function () {
			    this.$http.get('/api/praktijkvoorbeeld')
			        .then(response => {
			            this.praktijkvoorbeelds = response.data;
			            this.replaceThemas();
			        });
			},

			replaceThemas: function () {
				for (var praktijkvoorbeeld in this.praktijkvoorbeelds)
				{
					if(this.praktijkvoorbeelds[praktijkvoorbeeld].bedrijven)
					{
						this.praktijkvoorbeelds[praktijkvoorbeeld].bedrijven = 'bedrijven';
					}
					if(this.praktijkvoorbeelds[praktijkvoorbeeld].scholen)
					{
						this.praktijkvoorbeelds[praktijkvoorbeeld].scholen = 'scholen';
					}
					if(this.praktijkvoorbeelds[praktijkvoorbeeld].gemeenten)
					{
						this.praktijkvoorbeelds[praktijkvoorbeeld].gemeenten = 'gemeenten';
					}
					if(this.praktijkvoorbeelds[praktijkvoorbeeld].overig)
					{
						this.praktijkvoorbeelds[praktijkvoorbeeld].overig = 'overig';
					}
				}
			},

	

		},

		events: {

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