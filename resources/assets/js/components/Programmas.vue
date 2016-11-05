<template>
	<div class="row searchitems">
		<div class="small-6 columns">
			<h3>Zoek op trefwoord</h3>
			<input type="text" v-model="search" placeholder="Vul trefwoord in">
		</div>

	</div>

	<div class="row table-row table-header">
		<div class="small-2 columns">
			Naam
		</div>
		<div class="small-10 columns">
			Beschrijving
		</div>
	</div>

	<div class="row table-row table-row--body"
		v-for="programma in searchedProgrammas"
	>
		<div class="small-2 columns">
			<a :href="programma.adress">
				{{ programma.title}}
			</a>
		</div>
		<div class="small-10 columns">
			{{ programma.description }}
		</div>
	</div>
</template>

<script>
	export default {
		props: [],

		data() {
			return {
				search: '',
				programmas: [],
			}
		},

		ready() {
			this.getProgrammas(); //get participants and set availableinstances
		},

		computed: {
			returnRoot: function () {
				return (window.location.protocol + "//" + window.location.host);
			},

			searchedProgrammas: function () {
				var self = this;
				return self.programmas.filter(function(programma) {
					if( programma.description.toLowerCase().includes(self.search.toLowerCase()) ||
						programma.title.toLowerCase().includes(self.search.toLowerCase()) ||
						programma.adress.toLowerCase().includes(self.search.toLowerCase()) 
					)
					{
						return true;
					}
				})
			},
		},

		methods: {
			getProgrammas: function () {
			    this.$http.get('/api/programma')
			        .then(response => {
			            this.programmas = response.data;
			        });
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