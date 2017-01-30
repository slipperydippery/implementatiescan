<template>
	<div class="table deelnemersveld">
		<div class="row deelnemersveld--title table-row table-header">
			<div class="small-3 columns">
				Overzicht Deelnemersvelden
			</div>
			<div class="small-8 columns">
			</div>
			<div class="small-1 columns">
				#
			</div>
		</div>
		<div class="row table-row" 
			v-for="instantie in instantiesveld"
		>
			<div class="small-3 columns">
				{{instantie.title}}
			</div>
			<div class="small-8 columns">
				<div class="graphbar" 
				:style="{width: (instantie.activeparticipants/maxParticipants) * 100 + '%'}"
				>
				</div>
			</div>
			<div class="small-1 columns">
				{{instantie.activeparticipants}}
			</div>
		</div>
	</div>
</template>

<script>
	
	export default {
		http: {
			base: '/base',
			headers: {
				'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
			}
	    },

		props: [
		],

		data() {
			return {
				instantiesveld: [],
			};
		},

		created() {
		},

		ready() {
			this.getInstantiesVeld();
		},

		methods: {
			getInstantiesVeld: function() {
				var home = this;
				var resource = this.$resource('/api/instantiesveld');
				resource.get({}).then(function (response) {
					home.$set('instantiesveld', response.data)
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
					maxparticipants = Math.max(maxparticipants, this.instantiesveld[instantie].activeparticipants);
				}
				return maxparticipants;
			}

		}

	}
</script>


<style>
	.graphbar {
		height: 1.5rem;
		background: #bed675;
	}
	
</style>