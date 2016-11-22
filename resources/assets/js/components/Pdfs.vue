<template>
	<div class="row searchitems">
		<div class="small-6 columns">
			<h3>Zoek op trefwoord</h3>
			<input type="text" v-model="search" placeholder="Vul trefwoord in">
		</div>
	</div>

	<div class="row table-row table-header">
		<div class="small-2 columns">
			Organisatie
		</div>
		<div class="small-8 columns">
			Beschrijving
		</div>
		<div class="small-2 columns text-center">
			jaar
		</div>
	</div>

	<div class="row table-row table-row--body"
		v-for="pdf in searchedAndFilteredPdfs"
	>
		<div class="small-2 columns">
			{{ pdf.organisation }}
		</div>
		<div class="small-8 columns">
			<a :href="pdfAdress(pdf)" class="visible_link--basic" >
				{{ pdf.description }}
			</a>
		</div>
		<div class="small-2 columns text-center">
			{{ pdf.publication_year }} 
		</div>
	</div>
</template>

<script>
	export default {
		components: {  },

		props: [],

		data() {
			return {
				search: '',
				pdfs: [],
				themas: [],
				checkedThemas: [],
				admin: admin,
			}
		},

		ready() {
			this.getPdfs();
		},

		computed: {
			returnRoot: function () {
				return (window.location.protocol + "//" + window.location.host);
			},

			searchedAndFilteredPdfs: function () {
				var self = this;
				return this.pdfs.filter(function(pdf) {
					if( (pdf.organisation.toLowerCase().indexOf(self.search.toLowerCase()) !== -1) ||
						(pdf.description.toLowerCase().indexOf(self.search.toLowerCase()) !== -1) ||
						(pdf.publication_year.toLowerCase().indexOf(self.search.toLowerCase()) !== -1) ||
						(pdf.adress.toLowerCase().indexOf(self.search.toLowerCase()) !== -1) 
					)
					{
						return true;
					}
				})
			},
		},

		methods: {
			getPdfs: function () {
			    this.$http.get('/api/pdfs')
			        .then(response => {
			            this.pdfs = response.data;
			        });
			},

			pdfAdress: function (pdf) {
				return this.returnRoot + '/pdf/' + pdf.adress;
			}
		},
	}
</script>

<style>
	.searchfilter {
		text-align: right;
		label, input {
			display: inline-block;
		}
	}
</style>