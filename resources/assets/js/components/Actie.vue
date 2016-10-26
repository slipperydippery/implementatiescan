<template>
	<div v-if="!actie.werkactive" class="single_actie">
		<div class="row">
			<div class="large-12 columns actie-titel"> 
				<span class="remove_row remove_row--werkadd"
					v-if="isWerkAgenda"
					@click="toggleWerkActieActive(actie)"
				>
					&#x2713;
				</span>
				{{ actie.title }}
			</div>
		</div>
	</div>
	<div v-if="actie.active && actie.werkactive" class="single_actie">	
		<div class="row">
			<div class="large-12 columns actie-titel"> 
				<span class="remove_row"
					v-if="!isWerkAgenda"
					@click="setActieInactive(actie)"
				>
					&#x2716;
				</span>
				<span class="remove_row remove_row--werkremove"
					v-if="isWerkAgenda"
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
				Overige Betrokkenen
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
					>
					</textarea>
				</div>
			</div>

			<div class="large-3 columns">
				<div class="form-group">
					<select 
						v-model="actie.user_id"
						@blur="saveActie()"
					>
						<option 
							v-for="participant in participants" 
							:value="participant.id"
						> 
							{{ participant.name_first }} 
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
							@click="removeBetrokkene(betrokkene)"
						>
							{{betrokkene.name_first}}
							<span class="indication">-</span>
						</div>				
					</div>

					<div class="betrokkenen__unbet">
						<div class="actie-betrokkene" 
							v-for="betrokkene in unBetrokkenen"
							@click="addBetrokkene(betrokkene)"
						>
							{{ betrokkene.name_first }}
							<span class="indication">+</span>
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
							@click="removeExternaluser(externalUser.id)"
						>
							&times;
						</a>
					</div>
					<input 
						type="text" 
						v-model="newExternalUser"
						placeholder="Voeg iemand toe"
						@blur="addExternaluser()"
						@keyup.enter="addExternaluser()"
					>
				</div>
			</div>
		</div>
		<div class="row subactie--titel" v-if="isWerkAgenda">
			Wilt u het verbeterpunt meenemen naar de werkagenda? <br>
			Forumuleer dan hieronder de acties die u kunt ondernemen.
		</div>

		<sub-actie 
			 v-for="subactie in subacties"
			 v-if="isWerkAgenda"
			:subactie.sync="subactie"
			:participants="participants"
		>
		</sub-actie>

		<div class="row " v-if="isWerkAgenda">		
			<div class="small-12">
					<a href="#" @click="newSubactie()" class="voegsubactie">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+	Voeg nog een subactie toe
					</a>
			</div>

		</div>
	</div>
</template>

<script>
	import SubActie from '../components/SubActie.vue';

	export default {
		http: {
			root: '/root',
			headers: {
				'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
			}
	    },

		components: { SubActie },

		props: [
			'resource', 
			'thema',
			'actie', 
			'participants',
		],

		data() {
			return {
				scan: scan,
				showUnBetrokkene: false,
				editBetrokkenen: false,
				betrokkenen: [],
				unBetrokkenen: [],
				agendaType: agendaType,
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

		created() {
		},

		methods: {

			reloadData: function () {
				this.$dispatch('reloadData');
			},
			reloadUnBetrokkenen: function () {
				this.$dispatch('reloadUnBetrokkenen');
			},

			addBetrokkene: function (participant) {
				this.betrokkenen.push(participant);
				this.unBetrokkenen.$remove(participant);
				// var tempArray = this.unBetrokkenen.splice(0);
				// this.unBetrokkenen = [];
				this.showUnBetrokkene = ! this.showUnBetrokkene;
				var home = this;
				var resource = this.$resource('/api/verbeteractie/:actie/betrokkene/:betrokkene');
				resource.save({actie: this.actie.id, betrokkene: participant.id}, {})
					.then(function(response){
						// home.unBetrokkenen = tempArray;
					});
			},

			removeBetrokkene: function (participant){
				this.unBetrokkenen.push(participant);
				this.betrokkenen.$remove(participant);
				// var tempArray = this.betrokkenen.splice(0);
				// this.betrokkenen = [];
				this.showUnBetrokkene = ! this.showUnBetrokkene;				
				var home = this;
				var resource = this.$resource('/api/verbeteractie/:actie/betrokkene/:betrokkene');
				resource.delete({actie: this.actie.id, betrokkene: participant.id}, {})
					.then(function(response){
						// home.betrokkenen = tempArray;
					});
			},

			getExternalusers: function () {
				this.$http.get('/api/verbeteractie/' + this.actie.id + '/externaluser')
					.then(response => {
						this.externalUsers = response.data;
					})
			},

			addExternaluser: function (newExternalUser){
				// this.externalUsers.push(this.newExternalUser);
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
						//
					}, function(response){
						//
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
						// 
				});
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



			// getBetrokkenen: function () {
			// 	var home = this;
			// 	var resource = this.$resource('/api/verbeteractie/:actie/betrokkene');
			// 	resource.get({actie: this.actiee.id}, {})
			// 		.then(function(response){
			// 			home.$set('actie[betrokkenen]')
			// 		});
			// },

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
		padding: 1rem 0;
		/* line-height: 3rem; */
		/* height: 3rem; */
		width: 100%;
		/* color: white; */
		font-size: .9rem;
		font-weight: 500;
	}
	.voegsubactie:hover {
		background: rgba(159, 194, 54, 0.71);
	}
</style>