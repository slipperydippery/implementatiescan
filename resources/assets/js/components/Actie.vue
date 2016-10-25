<template>
	<div v-if="actie.active">	
		<div class="row">
			<div class="large-12 columns actie-titel"> 
				<span class="remove_row"
					@click="setActieInactive(actie)"
				>
					x
				</span>
				{{ actie.title }}
			</div>
		</div>
		<div class="row actie-omschrijvingen">
			<div class="large-4 columns actie-omschrijving">
				Omschrijving
			</div>
			<div class="large-3 columns actie-omschrijving">
				Initiatiefnemer
			</div>
			<div class="large-3 columns actie-omschrijving">
				Betrokkenen
			</div>
			<div class="large-2 columns actie-omschrijving">
				Extern Betrokkenen
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
					<div class="actie-exbetrokkene">
						Gerard
					</div>
					<input type="text" placeholder="Voeg iemand toe">
					<div class="actie-betrokkene"
						v-for="exBetrokkene in exBetrokkenen"
					>
						{{ exBetrokkene.name_first }}
					</div>
				</div>
			</div>
		</div>

		<div class="row subactie" v-if="isWerkAgenda">
			<div class="large-3 columns"> 
				<div class="form-group">
					<input type="text" 
						class="form-control" 
						placeholder="Subactie"  
						@blur="saveActie()"
					>
					</input>
				</div>				
			</div>
			<div class="large-3 columns">
				<div class="form-group">
					<textarea  
						class="form-control" 
						rows="5"
						placeholder="Actie Omschrijving" 
						@blur="saveActie()"
					>
					</textarea>
				</div>
			</div>
			<div class="large-3 columns">
				<div class="form-group">
					<select 
					>
						<option value="" disabled selected="selected"></option>
						<option 
							v-for="participant in participants" 
							:value="participant.id"
							@blur="saveConsultant()"
						> 
							{{ participant.name_first }} 
						</option>
					</select>
				</div>
			</div>
			<div class="large-3 columns">
				<div class="form-group">
					<input type="date" class="date">
				</div>
			</div>
		</div>
		<div class="row subactie" v-if="isWerkAgenda">		
			<div class="small-12">
				<div class="form-group">
					<a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+	Voeg nog een subactie toe</a>
				</div>
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
				exBetrokkenen: []
			};
		},

		ready() {
			this.betrokkenen = this.actie.betrokkenen;
			this.unBetrokkenen = this.actie.unBetrokkenen;
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
		display: inline-block;
		width: 0;
		padding: 0;
		margin: 0;
		height: 100%;
		background: #f00;
		left: 0;
		top: 0;
		color: white;
		transition: all .5s;
		overflow: hidden;
	}

	.actie-omschrijving:hover span.remove_row{
		display: inline-block;
		padding: 0 0.5rem;
		margin: 0 .5rem 0 0;
		width: auto;
		cursor: pointer;
	}
</style>