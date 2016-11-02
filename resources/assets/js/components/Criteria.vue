<template>
	<div class="table ">
		<div class="row table-row table-header">
			<div class="small-6 columns">
				Criterium
			</div>
			<div class="small-2 columns text-center">
				Geselecteerd
			</div>
			<div class="small-2 columns text-center">
				Score
			</div>
			<div class="small-2 columns text-center">
				Verbeterpunten
			</div>
		</div>
		<div class="row table-row" 
			v-for="criterium in criteria "
		>
			<div class="small-6 columns">
				{{criterium.themaid}} - {{criterium.title}}
			</div>
			<div class="small-2 columns text-center">
				{{criterium.activecount}}
			</div>
			<div class="small-2 columns text-center">
				{{ criterium.averagescore }}
			</div>
			<div class="small-2 columns text-center">
				{{ criterium.subacties }}
			</div>

		</div>
	</div>
</template>

<script>
	
	export default {
		http: {
			root: '/root',
			headers: {
				'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
			}
	    },

		props: [
		],

		data() {
			return {
				criteria: [],
			};
		},

		created() {
		},

		ready() {
			this.getCriteria();
		},

		methods: {
			getCriteria: function () {
				var home = this;
				var resource = this.$resource('/api/criteria');
				resource.get({}).then(function (response){
					home.$set('criteria', response.data)
				});
			},

			cssPercent: function (value) {
				return (value * 10) + '%';
			},

		},

		computed: {
			maxParticipants: function () {
				var maxparticipants = 0;
				for (var instantie in this.instantiesveld)
				{
					maxparticipants = Math.max(maxparticipants, this.instantiesveld[instantie].allparticipants);
				}
				return maxparticipants;
			},

		}

	}
</script>


<style>
	.graphbar {
		height: 1.5rem;
		background: #bed675;
	}
	
</style>