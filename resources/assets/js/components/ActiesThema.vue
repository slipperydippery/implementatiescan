<template>
	<div class="row thema-group">
			<div class="large-12">
				<div class="row">	
					<div class="large-12 actie-thema actie-thema-kop actiepunt-es columns"> {{ thema.title }} </div>
				</div>
				<actie 
					v-for="actie in verbeteracties"
					:actie.sync="actie"
					:participants="participants"
				>
					
				</actie> 
				<div class="row actie-rij " v-if="!isWerkAgenda">
					<div class="large-12 columns actie-voegtoe" @click="showInactief =  ! showInactief"> 
						<span v-show="! showInactief">+</span>
						<span v-show="showInactief">-</span> 
						Werk hier uw verbeterpunt nader uit
					</div>
					<div class="large12 columns actie-inactief" 
						v-for="actie in verbeteracties" 
						:actie.sync="actie"
						v-if=" ! actie.active && showInactief"
						@click="setActieActive(actie)"
					>
						{{ actie.title }}
					</div>
				</div>
			</div>
	</div>
</template>

<script>
	import Actie from '../components/Actie.vue';
	
	export default {
		http: {
			root: '/root',
			headers: {
				'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
			}
	    },

		components: { Actie },

		props: [
			'thema',
			'participants'
		],

		data() {
			return {
				scan:scan,
				questions: [],
				verbeteracties: [],
				showInactief: false,
				agendaType: agendaType,
			};
		},

		created() {
		},

		ready() {
			this.getQuestions();
			this.getVerbeteracties();
		},

		methods: {
			getThemas: function () {
				var home = this;
				var resource = this.$resource('/api/scan/:scan/thema');
				resource.get({scan: this.scan.id}).then(function (response) {
				          home.$set('themas', response.data)
				});
			},
			getQuestions: function() {
				var home = this;
				var resource = this.$resource('/api/thema/:thema/question');
				resource.get({thema: this.thema.id}).then(function (response) {
					home.$set('questions', response.data)
				});
			},

			getVerbeteracties: function() {
				var home = this;
				var resource = this.$resource('/api/scan/:scan/thema/:thema/verbeteractie');
				resource.get({scan: this.scan.id, thema: this.thema.id}).then(function (response) {
					home.$set('verbeteracties', response.data);
					home.addUnbetrokkenen();
				});
			},

			getparticipant: function (participant) {
				var home = this;
				var resource = this.$resource('/api/scan/:scan/participant/:participant');
				resource.get({scan: this.scan.id, participant: participant}).then(function (response) {
					//
				});
			},

			addUnbetrokkenen: function () {
				for (var actie in this.verbeteracties)
				{
					this.verbeteracties[actie].unBetrokkenen = [];
					for (var participant in this.participants)
					{
						var commonParts = 0;
						if(this.verbeteracties[actie].betrokkenen.length)
						{
							for (var betrokkene in this.verbeteracties[actie].betrokkenen)
							{
								if (this.verbeteracties[actie].betrokkenen[betrokkene].id == this.participants[participant].id)
								{
									commonParts++;
								}
							}
							if (commonParts == 0) 
							{
								this.verbeteracties[actie].unBetrokkenen.push(this.participants[participant]);
							}
						} else {
							this.verbeteracties[actie].unBetrokkenen.push(this.participants[participant]);
						}
					}
				}
			},

			setActieActive: function (actie) {
				actie.active = true;
				this.saveActie(actie);
			},

			saveActie: function (actie) {
				var home = this;
				var resource = this.$resource('/api/verbeteractie/:actie');
				resource.update({actie: actie.id}, {actie: actie})
					.then(function(response){
					});
			},

		},

		computed: {

			isWerkAgenda: function () {
				if (agendaType == 'werkagenda')
				{
					return true;
				}
				return false;
			},

		}

	}
</script>


<style>
	
</style>