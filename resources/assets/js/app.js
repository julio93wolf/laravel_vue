new Vue({
	el: '#crud',
	created: function(){
		this.getKeeps();
	},
	data: {
		keeps: [],
		newKeep: '',
		errors: [],
		fillKeep: {'id' : '', 'keep': ''}
	},
	methods:{
		
		getKeeps: function(){
			var urlKeeps = 'tasks';
			axios.get(urlKeeps).then(response => {
				this.keeps = response.data
			});
		},

		editKeep: function(keep){
			this.fillKeep.id = keep.id;
			this.fillKeep.keep = keep.keep;
			$('#edit').modal('show');
		},

		updateKeep: function(id){
			var url = 'tasks/' + id ;
			axios.put(url,this.fillKeep).then(response => {
				this.getKeeps();
				this.fillKeep = {'id' : '', 'keep':''};
				this.errors = [];
				$('#edit').modal('hide');
				toastr.success('Tarea actualizada con éxito');
			}).catch(error => {
				this.errors = error.response.data;
			});
		},

		deleteKeep: function(keep){
			var url = 'tasks/' + keep.id;
			axios.delete(url).then(response => {
				this.getKeeps();
				toastr.success('Tarea eliminada correctamente');
			}).catch(response => {
				toastr.error(response);
			});
		},

		createKeep: function(){
			var url = "tasks";
			axios.post(url,{
				keep: this.newKeep
			}).then(response => {
				this.getKeeps();
				this.newKeep = '';
				this.error = [];
				$('#create').modal('hide');
				toastr.success('Nueva tarea agregada con éxito');
			}).catch(error => {
				this.error = error.response.data;
			});
		}
		
	}
});