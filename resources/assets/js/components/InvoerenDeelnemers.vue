<template>
	<div 
		v-for="instantie in participants"
	>

		<single-deelnemer 
			v-for="participant in instantie.participants" 
			:participant="participant"
			:editable.sync="editable" 
			:instantie="instantie"
			:availableinstanties="availableinstanties"
			:class="'instantie-' + instantie.modelid"
			v-if="participant.beheerder"
		>
		</single-deelnemer>

	</div>
	<div 
		v-for="instantie in participants"
	>

		<single-deelnemer 
			v-for="participant in instantie.participants" 
			:participant="participant"
			:editable.sync="editable" 
			:instantie="instantie"
			:availableinstanties="availableinstanties"
			:class="'instantie-' + instantie.modelid"
			v-if="!participant.beheerder"
		>
		</single-deelnemer>

	</div>	

	<add-single-deelnemer
		:editable.sync="editable" 
		:availableinstanties="availableinstanties"
	>
	</add-single-deelnemer>

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
				editable: {},
				availableinstanties: {},

			}
		},

		ready() {
			this.getParticipants(); //get participants and set availableinstances
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

			getParticipants: function () {
			    this.$http.get('/api/scan/' + this.scan.id + '/participants')
			        .then(response => {
			            this.participants = response.data;
						this.calcAvailableInstanties();
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
				this.availableinstanties = tempavailable;
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