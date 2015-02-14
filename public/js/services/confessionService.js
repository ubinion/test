angular.module('confessionService', [])

	.factory('Confession', function($http) {

		return {
			get : function() {
				return $http.get('api/confessions');
			},
			show : function(id) {
				return $http.get('api/confessions/' + id);
			},
			save : function(confessionData) {
				return $http({
					method: 'POST',
					url: 'api/confessions',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(confessionData)
				});
			},
			destroy : function(id) {
				return $http.delete('api/confessions/' + id);
			}
		}

	});