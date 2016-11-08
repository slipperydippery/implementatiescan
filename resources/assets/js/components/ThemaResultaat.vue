<template>
	<div class="row sliders-sub slider-verbeterpunten">
		<div class="large-2 small-2 columns">Verbeterpunten</div>
		<div class="small-2 columns checkinput text-center"
			v-for="actie in verbeteracties"
			@click="toggleActie(actie)"
		>
			<div 
				class="checkbox"
				:class="actie.active ? 'checkbox--checked' : 'checkbox--unchecked' "
			>
				<span v-if="actie.active" class="checkbox--check">
					&#x2714;
				</span>
			</div>
			
		</div>
	</div>
	<div class="row">
		<div class="small-4 columns page-next" v-else>
			<a :href="nextLink" 
				class="button button-next"
				@click="checkAndGo($event)"
			>
				Volgende Stap
			</a>
		</div>
	</div>
</template>

<script>

	import SingleSlider from '../components/SingleSlider.vue';

	export default {
		http: {
			base: '/base',
			headers: {
				'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
			}
	    },

		components: { SingleSlider },

		props: [],

		data() {
			return {
				themaResultaat: [],
				scan: scan,
				thema: thema,
				thema_nr: thema_nr,
				verbeteracties: [],
			};
		},

		ready() {
			this.getVerbeteracties();
		},

		created() {
		},

		methods: {
			getVerbeteracties: function() {
				var home = this;
				var resource = this.$resource('/api/scan/:scan/thema/:thema/verbeteractie');
				resource.get({scan: this.scan.id, thema: this.thema.id}).then(function (response) {
					home.$set('verbeteracties', response.data);
				});
			},

			getThemaResultaat: function () {
				this.$http.get('/api/scan/' + this.scan.id + '/thema/' + this.thema.id + '/getThemaOverzichtValues')
					.then(response => {
						this.themaResultaat = response.data;
					});
			},

			toggleActie: function (actie) {
				actie.active = !actie.active;
				var home = this;
				var resource = this.$resource('/api/verbeteractie/:actie');
				resource.update({actie: actie.id}, {actie: actie})
					.then(function(response){
					});
			},

			checkAndGo: function (event) {
				if (event && (this.selectedActies == 0 )) 
				{
					event.preventDefault();
				    confirm('U heeft geen verbeterpunten geslecteerd, wilt u alsnog de pagina verlaten?') ? 
						window.location.href = this.nextLink :
						'' 
				}
			},

			cssPercent: function (value) {
				return value + '%';
			}
		},

		computed: {
			returnRoot: function () {
				return (window.location.protocol + "//" + window.location.host);
			},

			nextLink: function () {
				return this.returnRoot + '/scans/'  + this.scan.id + '/thema/' + this.thema_nr + '/vraag/1000';
			},

			selectedActies: function () {
				var selectedcount = 0;
				for (actie in this.verbeteracties)
				{
					this.verbeteracties[actie].active ? selectedcount ++ : '';
				}
				return selectedcount;
			},
		},
	}
</script>


<style>
	.slider-verbeterpunten {
		padding-top: 1rem;
	}

</style>