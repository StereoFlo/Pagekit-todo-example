$(document).ready(function(){
	Vue.http.options.emulateJSON = true;
	new Vue({
			el: '#todo',

			data: {
				entries: window.$data.entries,
				newEntry: ''
			},

			methods: {
				
				save: function () 
				{
					if (this.newEntry)
					{
						this.entries.push({
							name: this.newEntry
						});

						this.$http.post('/admin/todo/ajax/save', { data: { name: this.newEntry } }).then(
							function (data) { 
								this.$notify(data.data.message);
								this.newEntry = '';
							}).catch(function (error) {
							this.$notify(data.data.message, 'warning');
							console.log(data);
						});
					}
					else
					{
						this.$notify('Enter a new entry', 'warning');
					}
				 },
				
				remove: function(entry) 
				{
					this.$http.post('/admin/todo/ajax/delete', { data: { id : entry.id } }).then(
						function (data) {
							this.$notify(data.data.message);
							this.entries.$remove(entry);
						}).catch(
						function (data) {
							this.$notify(data.data.message, 'warning');
							console.log(data);
					});
					
				},
				toggle: function(entry) 
				{
					entry.do = !entry.do;
					console.log(entry);
					this.$http.post('/admin/todo/ajax/toggle', { data: entry }).then(function (data) { this.$notify(data.data.message); }).catch(function (data) { this.$notify(data.data.message, 'warning'); });
				},
			}
		});
});
