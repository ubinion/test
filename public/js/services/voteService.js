angular.module('voteService', [])
	.factory('Vote', function($http) {

		return {
			get : function() {
				return $http.get('api/votes');
			},
			show : function(id) {
				return $http.get('api/votes/' + id);
			},
			save : function(voteData) {
				return $http({
					method: 'POST',
					url: 'api/votes',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(voteData)
				});
			},
			destroy : function(id) {
				return $http.delete('api/votes/' + id);
			}
		}
	});