<template>
	<div class="row thema-group">
		<div class="large-12">
			<div class="row">	
				<div class="large-12 actie-thema actie-thema-kop actiepunt-es columns"> {{ thema.title }}</div>
			</div>
			<actie 
				v-for="actie in verbeteracties"
				:actie="actie"
				:participants="participants"
			>
			</actie> 
			<div class="row actie-rij " v-if="!isWerkAgenda && inactiveVerbeteracties.length && scanbeheerder">
				<div class="large-12 columns actie-voegtoe" @click="showInactief =  ! showInactief"> 
					<span v-show="! showInactief">+</span>
					<span v-show="showInactief">-</span> 
					voeg nog een verbeterpunt toe 
				</div>
				<div class=""
					v-if="showInactief"
				>
					<div class="large12 columns actie-inactief" 
						v-for="actie in inactiveVerbeteracties" 
						:actie="actie"
						@click="setActieActive(actie)"
					>
						{{ actie.title }}
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import Actie from '../components/Actie.vue';
	
	export default {
		http: {
			base: '/base',
			headers: {
				'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
			}
	    },

		components: { Actie },

		props: [
			'thema',
		],

		data() {
			return {
				scan:scan,
				questions: [],
				verbeteracties: [],
				showInactief: false,
				agendaType: agendaType,
				participants: participants,
				scanbeheerder: scanbeheerder,
			};
		},

		ready() {
			this.getQuestions();
			this.getVerbeteracties();
		},

		methods: {
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
				this.showInactief = false;
			},

			saveActie: function (actie) {
				var home = this;
				var resource = this.$resource('/api/verbeteractie/:actie');
				resource.update({actie: actie.id}, {actie: actie})
					.then(function(response){
						home.getVerbeteracties();
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

			inactiveVerbeteracties: function () {
				var inactiveActies = [];
				for (var actie in this.verbeteracties)
				{
					if(this.verbeteracties[actie].active == false)
					{
						inactiveActies.push(this.verbeteracties[actie]);
					}
				}
				return inactiveActies;
			},
		}
	}
</script>

<style>
</style>