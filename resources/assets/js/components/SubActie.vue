<template>
	<div class="subactie"
		v-if="notdeleted"
	>
		
		<div class="row">
			<div class="large-11 columns"> 
				<div class="form-group">
					<input type="text" 
						class="form-control" 
						placeholder="Titel Verbeterpunt"  
						v-model="subactie.title"
						@blur="saveSubActie()"
					>
					</input>
				</div>				
			</div>
			<div class="large-1 columns">
				<span class="remove_subactie"
				@click="removeSubactie()"
				>
					x
				</span>
			</div>
		</div>
		<div class="row">
			<div class="large-4 columns">
				<div class="form-group">
					<textarea  
						class="form-control" 
						placeholder="Actie Omschrijving" 
						rows="6"
						v-model="subactie.omschrijving"
						@blur="saveSubActie()"
					>
					</textarea>
				</div>
			</div>
			<div class="large-3 columns">
				<div class="form-group">
					<select 
						v-model="subactie.user_id"
						@blur="saveSubActie()"
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
		<div class="row">
			<div class="small-4 columns subactie--date">
				<div class="form-group">
				<label>datum:</label> 
					<input type="date"
					v-model="subactie.datum">
				</div>

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
			'subactie', 
			'participants',
		],

		data() {
			return {
				externalUsers: [],
				betrokkenen: [],
				unBetrokkenen: [],
				notdeleted: true,
			};
		},

		ready() {
			this.getBetrokkenen();
			this.betrokkenen = this.subactie.betrokkenen;
			this.unBetrokkenen = this.subactie.unBetrokkenen;
			this.getExternalusers();
		},

		created() {
		},

		methods: {

			removeSubactie: function () {
				var home = this;
				var resource = this.$resource('/api/subactie/:subactie/delete');
				resource.get({subactie: this.subactie.id}, {})
					.then(function(response){
						home.notdeleted = false;
					}, function(response){

				});
			},

			reloadData: function () {
				this.$dispatch('reloadData');
			},

			getBetrokkenen: function () {
				this.$http.get('/api/subactie/' + this.subactie.id + '/betrokkene')
					.then(response => {
						this.betrokkenen = response.data;
					});
				this.$http.get('/api/subactie/' + this.subactie.id + '/unbetrokkene')
					.then(response => {
						this.unBetrokkenen = response.data;
					})
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
				var resource = this.$resource('/api/subactie/:subactie/betrokkene/:betrokkene');
				resource.save({subactie: this.subactie.id, betrokkene: participant.id}, {})
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
				var resource = this.$resource('/api/subactie/:subactie/betrokkene/:betrokkene');
				resource.delete({subactie: this.subactie.id, betrokkene: participant.id}, {})
					.then(function(response){
						// home.betrokkenen = tempArray;
					});
			},

			getExternalusers: function () {
				this.$http.get('/api/subactie/' + this.subactie.id + '/externaluser')
					.then(response => {
						this.externalUsers = response.data;
					})
			},

			addExternaluser: function (newExternalUser){
				// this.externalUsers.push(this.newExternalUser);
				if(! this.newExternalUser == ['']){
					var home = this;
					var resource = this.$resource('/api/subactie/:subactie/externaluser/');
					resource.save({subactie: this.subactie.id}, {externaluser: this.newExternalUser})
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
				var resource = this.$resource('/api/subactie/:subactie/subexternaluser/:externaluser');
				resource.delete({subactie: this.subactie.id, externaluser: externaluserid}, {})
					.then(function (response) {
						home.getExternalusers();
						//
					}, function(response){
						//
					});
				this.getExternalusers();
			},

			saveSubActie: function () {
				var home = this;
				var resource = this.$resource('/api/subactie/:subactie');
				resource.update({subactie: this.subactie.id}, {subactie: this.subactie})
					.then(function (response) {
					});
			},

			setActieInactive: function (actie) {
				actie.active = 0;
				this.saveSubActie();
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
	.subactie {
	    border-bottom: 1px solid #333;
	}

	.subactie .row {
	    background: whitesmoke;
	}

	.subactie .row:first-of-type {
	    padding-top: 1rem;
	}

	.subactie--titel {
		font-size: 1rem;
	    background: rgb(187, 211, 112);
	    /* border: 1px solid #333; */
	    padding: 1rem;
	    font-weight: 500;
	}

	.subactie--date {
		clear: both;
	}
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

	span.remove_subactie {
		float: right;
	    padding: .3rem 0.6rem;
	    margin: 0;
	    height: 100%;
	    left: 0;
	    top: 0;
	    color: white;
	    background: rgba(0, 0, 0, 0.53);
	    font-weight: 500;
	    -webkit-transition: all .5s;
	    transition: all .5s;
	    overflow: hidden;
	    cursor: pointer;
	}

	.actie-exbetrokkene .closeicon {
		display: none;
	}

	.actie-exbetrokkene:hover .closeicon {
		display: block;
	}
</style>