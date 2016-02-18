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

						this.$http.post('/admin/todo/ajax/save', { data: { name: this.newEntry } },
							function (data, status, request) { 
								this.$notify(data.message);
								this.newEntry = '';
							}
						).error(function (error) {
							this.$notify(error, 'warning');
							console.log(error);
						});
					}
					else
					{
						this.$notify('Enter a new entry', 'warning');
					}
				 },
				
				remove: function(entry) 
				{
					this.$http.post('/admin/todo/ajax/delete', { data: { id : entry.id } }, 
						function (data, status, request) {
							this.$notify(data.message);
					});
					this.entries.$remove(entry);
				},
				toggle: function(entry) 
				{
					entry.do = !entry.do;
					console.log(entry);
					this.$http.post('/admin/todo/ajax/toggle', { data: entry }, function (data) { this.$notify(data.message); });
				},
			}
		});
});
