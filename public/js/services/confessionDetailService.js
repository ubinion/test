angular.module('confessionDetailService', [])
	.factory('ConfessionDetail', function($http) {
		return {
			show : function(id) {
				return $http.get('api/confessionDetails/' + id);
			}
		}
	});