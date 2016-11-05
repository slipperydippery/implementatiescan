<template>
	<single-deelnemer 
		v-for="beheerder in beheerders"
		:participant="beheerder"
		:editable="editable" 
		:instanties="instanties"
		:class="'instantie-' + beheerder.instantiemodel_id"
		@editable="setEditable"
	>
	</single-deelnemer>

	<single-deelnemer 
		v-for="participant in nonbeheerders" 
		:participant="participant"
		:editable="editable" 
		:instanties="instanties"
		:class="'instantie-' + participant.instantiemodel_id"
		@editable="setEditable"
	>
	</single-deelnemer>

	<add-single-deelnemer
		:editable="editable" 
		@editable="setEditable"
		@pushparticipant="pushParticipant"
		:instanties="instanties"
	>
	</add-single-deelnemer>

	<div class="row">
		<div class="small-4 columns page-next" v-if="(editable.id == null)">
			<a href="{{returnRoot}}/scans/{{scan.id}}/inrichten/controlerendeelnemers" class="button button-next">Volgende Stap</a>
		</div>
		<div class="small-4 columns page-next" v-else>
			<a href="#" 
				class="button button-next has-tip"
				aria-haspopup="true" 
				data-disable-hover="false" 
				tabindex="1" title="Maak eerst uw bewerkingen af!"
				@click="alert"
			>
				Volgende Stap
			</a>
		</div>
	</div>

</template>

<script>
	import SingleDeelnemer from '../components/SingleDeelnemer.vue';
	import AddSingleDeelnemer from '../components/AddSingleDeelnemer.vue';

	export default {
		
		components: { SingleDeelnemer, AddSingleDeelnemer },
		props: [],

		data() {
			return {
				scan: scan,
				participants: [],
				beheerders: [],
				nonbeheerders: [],
				editable: {},
				instanties: [],

			}
		},

		ready() {
			this.getParticipants(); 
			this.getInstanties();
		},

		computed: {
			returnRoot: function () {
				return (window.location.protocol + "//" + window.location.host);
			},
			participantCount: function () {
				return this.participants.length;
			},
		},

		methods: {
			setEditable: function (editable) {
				this.editable = editable;
			},

			pushParticipant: function (participant) {
				this.participants.push(participant);
				this.setBeheerder();
			},

			alert: function (event) {
				alert('Sla eerst uw bewerking op voordat u de pagina verlaat.');
			},

			getParticipants: function () {
			    this.$http.get('/api/scan/' + this.scan.id + '/participant')
			        .then(response => {
			            this.participants = response.data;
			            this.setBeheerder();
			        });
			},

			getInstanties: function () {
				var home = this;
				this.$http.get('/api/scan/' + this.scan.id + '/instantie')
					.then(response => {
						this.instanties = response.data;
					})
			},

			setBeheerder: function () {
				this.nonbeheerders = [];
				for (var participant in this.participants)
				{
					if (this.participants[participant].beheerder)
					{
						this.beheerders = [this.participants[participant]];
					} else {
						this.nonbeheerders.push(this.participants[participant]);
					}
				}
				this.nonbeheerders.sort(function(a, b) {
					if (a.instantie_id > b.instantie_id) {
					  return 1;
					}
					if (a.instantie_id < b.instantie_id) {
					  return -1;
					}
					return 0;
				});
			},

			calcAvailableInstanties: function () {
				var tempavailable = [];
				for (var insts in this.participants) 
				{
					// if(this.participants[insts].participants.length < 2)
					// {
						tempavailable.push({
							'title' : this.participants[insts].title, 
							'id' : this.participants[insts].id
						});
					// } 
				}
				this.instanties = tempavailable;
			}	
		},

		events: {
		    reloadParticipants: function () {
		        this.getParticipants();
		    }
		},
	}
</script>


<style>
	
</style>