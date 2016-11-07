<template>
	<!-- Collapsed view only possible in Werkagenda -->
	<div class="single_actie--container">
		<div v-if="!actie.werkactive && isWerkAgenda" class="single_actie">
			<div class="row">
				<div class="large-12 columns actie-titel"> 
					<span class="remove_row remove_row--werkadd"
						v-if="isWerkAgenda && scanbeheerder"
						@click="toggleWerkActieActive(actie)"
					>
						&#x2713;
					</span>
					{{ actie.title }}
				</div>
			</div>
		</div>
		<!-- Full view -->
		<div v-if="(actie.active && actie.werkactive) || (!isWerkAgenda && actie.active)" class="single_actie">	
			<div class="row">
				<div class="large-12 columns actie-titel"> 
					<span class="remove_row"
						v-if="!isWerkAgenda && scanbeheerder"
						@click="setActieInactive(actie)"
					>
						&#x2716;
					</span>
					<span class="remove_row remove_row--werkremove"
						v-if="isWerkAgenda && scanbeheerder"
						@click="toggleWerkActieActive(actie)"
					>
						x
					</span>
					{{ actie.title }}
				</div>
			</div>
			<div class="row actie-omschrijvingen">
				<div class="large-4 columns actie-omschrijving">
					Uit te werken verbeterpunten
				</div>
				<div class="large-3 columns actie-omschrijving">
					Initiatiefnemer
				</div>
				<div class="large-3 columns actie-omschrijving">
					Betrokkenen
				</div>
				<div class="large-2 columns actie-omschrijving">
					Overige betrokkenen
				</div>
			</div>

			<div class="row">
				<div class="large-4 columns">
					<div class="form-group">
						<textarea  
							class="form-control" 
							placeholder="Actie Omschrijving"
							rows="6"
							v-model="actie.omschrijving" 
							@blur="saveActie()"
							:disabled="(scanbeheerder ? false : true) || isWerkAgenda"
						>
						</textarea>
					</div>
				</div>

				<div class="large-3 columns">
					<div class="form-group">
						<select 
							v-model="actie.user_id"
							@blur="saveActie()"
							:disabled="(scanbeheerder ? false : true) || isWerkAgenda"
						>
							<option 
								v-for="participant in participants" 
								:value="participant.id"
							> 
								{{ participant.name_first }} {{ participant.name_last }}
							</option>
						</select>
					</div>
				</div>

				<div class="large-3 columns">
					<div class="betrokkenen__group row">
						<div class="betrokkenen__bet ">
							<div class="actie-betrokkene"
								v-if="!betrokkenen.length"
							>
							+
							</div>
							<div class="actie-betrokkene" 
								v-for="betrokkene in betrokkenen"
								@click="((scanbeheerder && !isWerkAgenda) ? removeBetrokkene(betrokkene) : null)"
							>
								{{betrokkene.name_first}}
								<span class="indication" v-if="scanbeheerder && !isWerkAgenda">-</span>
							</div>				
						</div>
						<div class="betrokkenen__unbet" v-if="scanbeheerder && !isWerkAgenda">
							<div class="actie-betrokkene" 
								v-for="betrokkene in unBetrokkenen"
								@click="((scanbeheerder && !isWerkAgenda) ? addBetrokkene(betrokkene) : null)"
							>
								{{ betrokkene.name_first }}
								<span class="indication" v-if="scanbeheerder && !isWerkAgenda">+</span>
							</div>
						</div>
					</div>
				</div>

				<div class="large-2 columns">
					<div class="form-group">
						<div class="actie-exbetrokkene"
							v-for="externalUser in externalUsers"
						>
							{{ externalUser.name }}
							<a href="#" 
								class="close-button closeicon" 
								aria-label="Close alert" 
								type="button" 
								v-if="scanbeheerder && !isWerkAgenda"
								@click="removeExternaluser(externalUser.id)"
							>
								&times;
							</a>
						</div>
						<input 
							type="text" 
							v-model="newExternalUser"
							placeholder="Voeg iemand toe"
							v-if="scanbeheerder && !isWerkAgenda"
							@blur="addExternaluser()"
							@keyup.enter="addExternaluser()"
						>
					</div>
				</div>
			</div>

			<div class="row subactie--titel" v-if="isWerkAgenda">
				Wilt u het verbeterpunt meenemen naar de werkagenda? <br>
				Formuleer dan hieronder de vervolgacties:
			</div>

			<sub-actie 
				 v-for="subactie in activeSubacties"
				:subactie="subactie"
				:participants="participants"
				@removesubactie="removeSubactie"
			>
			</sub-actie>

			<div class="row " v-if="isWerkAgenda">		
				<div class="small-12">
						<a href="#" @click="newSubactie()" class="voegsubactie">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+	Voeg een vervolgactie toe
						</a>
				</div>

			</div>
		</div>
	</div>
</template>

<script>
	import SubActie from '../components/SubActie.vue';

	export default {
		http: {
			base: '/base',
			headers: {
				'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
			}
	    },

		components: { SubActie },

		props: [
			'resource', 
			'thema',
			'actie', 
		],

		data() {
			return {
				scan: scan,
				showUnBetrokkene: false,
				editBetrokkenen: false,
				betrokkenen: [],
				unBetrokkenen: [],
				agendaType: agendaType,
				participants: participants,
				scanbeheerder: scanbeheerder,
				newExternalUser: [''],
				externalUsers: [],
				subacties: [],
			};
		},

		ready() {
			if(this.actie.active){
				this.betrokkenen = this.actie.betrokkenen;
				this.unBetrokkenen = this.actie.unBetrokkenen;
				this.getExternalusers();
				this.getSubActies();
			}
		},

		methods: {
			addBetrokkene: function (participant) {
				this.betrokkenen.push(participant);
				this.unBetrokkenen.splice(this.unBetrokkenen.indexOf(participant), 1);
				this.showUnBetrokkene = ! this.showUnBetrokkene;
				var home = this;
				var resource = this.$resource('/api/verbeteractie/:actie/betrokkene/:betrokkene');
				resource.save({actie: this.actie.id, betrokkene: participant.id}, {})
					.then(function(response){
					});
			},

			removeBetrokkene: function (participant){
				this.unBetrokkenen.push(participant);
				this.betrokkenen.splice(this.betrokkenen.indexOf(participant), 1);
				this.showUnBetrokkene = ! this.showUnBetrokkene;				
				var home = this;
				var resource = this.$resource('/api/verbeteractie/:actie/betrokkene/:betrokkene');
				resource.delete({actie: this.actie.id, betrokkene: participant.id}, {})
					.then(function(response){
					});
			},

			getExternalusers: function () {
				this.$http.get('/api/verbeteractie/' + this.actie.id + '/externaluser')
					.then(response => {
						this.externalUsers = response.data;
					})
			},

			addExternaluser: function (newExternalUser){
				if(! this.newExternalUser == ['']){
					var home = this;
					var resource = this.$resource('/api/verbeteractie/:actie/externaluser/');
					resource.save({actie: this.actie.id}, {externaluser: this.newExternalUser})
						.then(function (response){
							//success callback
							home.newExternalUser = '';
							home.getExternalusers();
						}, function(response) {
							//error callback
					});
				}
			},

			removeExternaluser: function (externaluserid) {
				var home = this;
				var resource = this.$resource('/api/verbeteractie/:actie/externaluser/:externaluser');
				resource.delete({actie: this.actie.id, externaluser: externaluserid}, {})
					.then(function (response) {
						home.getExternalusers();
					}, function(response){
					});
				this.getExternalusers();
			},

			newSubactie: function () {
				var home = this;
				var resource = this.$resource('/api/verbeteractie/:actie/newsubactie');
				resource.get({actie: this.actie.id}, {})
					.then(function(response){
						home.getSubActies();						
					}, function(response){
				});
			},

			removeSubactie: function (subactie) {
				this.subacties.splice(this.subacties.indexOf(subactie), 1);
			},

			saveActie: function () {
				var home = this;
				var resource = this.$resource('/api/verbeteractie/:actie');
				resource.update({actie: this.actie.id}, {actie: this.actie})
					.then(function (response) {
					});
			},

			setActieInactive: function (actie) {
				actie.active = 0;
				this.saveActie();
			},

			toggleWerkActieActive: function (actie) {
				actie.werkactive = !actie.werkactive;
				this.saveActie();
			},

			getSubActies: function () {
				this.$http.get('/api/verbeteractie/' + this.actie.id + '/subactie')
					.then(response => {
						this.subacties = response.data;
					})
			},
		},		

		computed: {
			unblength: function () {
				return this.unBetrokkenen.length
			},

			isWerkAgenda: function () {
				if (agendaType == 'werkagenda')
				{
					return true;
				}
				return false;
			},

			activeSubacties: function () {
				if(this.isWerkAgenda)
				{
					return this.subacties;
				} else {
					return [];
				}
			}
		},
	}
</script>

<style>
	.actie_removebetrokkene {
		font-size: 2rem;
		line-height: 1.5rem;
		font-weight: bold;
		float: right; 
		padding: 0 .5rem;
		color: #999;
	}
	.actie_removebetrokkene:hover {
		cursor:pointer;
		color: #000;
	}

	span.remove_row {
		display: none;
		float: right;
		padding: 0 0.5rem;
		margin: 0;
		height: 100%;
		left: 0;
		top: 0;
		color: #333;
		background: rgba(255,255,255,0.85);
		transition: all .5s;
		overflow: hidden;
		cursor: pointer;
	}

	span.remove_row--werkadd:hover {
		background: green;
	}

	span.remove_row--werkremove:hover {
		background: red;
	}

	.single_actie:hover span.remove_row{
		display: inline-block;
		padding: 0 0.5rem;
		width: auto;
		cursor: pointer;
	}

	.actie-exbetrokkene .closeicon {
		display: none;
	}

	.actie-exbetrokkene:hover .closeicon {
		display: block;
	}

	.voegsubactie {
		display: block;
	    padding: .5rem 0;
		background: rgba(159, 194, 54, 0.71);
	    margin: 0 0 2rem 0;
		width: 100%;
		font-size: .9rem;
		font-weight: 500;
	}
	.voegsubactie:hover {
	    background: rgb(159, 194, 54);
	}
</style>