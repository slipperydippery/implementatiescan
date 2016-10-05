<template>
	<div class="row searchitems">
		<div class="small-6 columns">
			<input type="text" v-model="search" placeholder="Zoek in beschrijving">
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
		v-for="programma in programmas | filterBy search | filterBy checkedThemas[0] | filterBy checkedThemas[1] | filterBy checkedThemas[2]"
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
		
		components: {  },
		props: [],

		data() {
			return {
				search: '',
				programmas: [],
				themas: [],
				checkedThemas: [],
			}
		},

		ready() {
			this.getProgrammas(); //get participants and set availableinstances
		},

		computed: {
			returnRoot: function () {
				return (window.location.protocol + "//" + window.location.host);
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