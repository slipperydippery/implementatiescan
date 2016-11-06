<template>
	<acties-thema 
		 v-for="thema in themas"
		 :thema="thema"
	>
	</acties-thema>
</template>

<script>
	import ActiesThema from '../components/ActiesThema.vue';
	
	export default {
		components: { ActiesThema },

		data() {
			return {
				scan:scan,
				themas: [],
			};
		},

		ready() {
			this.getThemas();
		},

		methods: {
			getThemas: function () {
			var home = this;
				var resource = this.$resource('/api/scan/:scan/thema');
				resource.get({scan: this.scan.id}).then(function (response) {
				          home.$set('themas', response.data)
				});
			},
		},
	}
</script>

<style>
</style>