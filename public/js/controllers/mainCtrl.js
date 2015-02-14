angular.module('mainCtrl', [])

	.controller('mainController', function($scope, $http, Confession) {
		// object to hold all the data for the new confession form
		$scope.confessionData = {anonymous:0};

		// loading variable to show the spinning loading icon
		$scope.loading = true;
		$scope.anonymousPic = 'http://localhost/ubinion2/public/img/anonymous-icon/anonymous-1.jpg';
		
		//setup user picture
		$scope.userSetup = function(uid, userPic){
			$scope.uid 		= uid;
			$scope.userPic	= userPic;
			$scope.pic		= userPic;
		};
		
		$scope.checkUserLogin = function(){
		
			if($scope.uid===0){
			
				alert('Nah... You need to login first to post a confession');
			}
		};
		
		//toggle the anonymous layout and flag
		$scope.toggleAnonymous = function() {
		
			if($scope.uid===0){
			
				alert('Nah... You need to login first to post a confession');
			}else{
				if($scope.confessionData.anonymous === 0)
				{
					$scope.confessionData.anonymous =1;
					$scope.pic 	= $scope.anonymousPic;
					console.log($scope.confessionData.anonymous);
				}
				else
				{
					$scope.confessionData.anonymous =0;
					$scope.pic 	= $scope.userPic;
					console.log($scope.confessionData.anonymous);
				}
			}
		};
		
		//datetime format in post
		$scope.formatDate = function(date) {
		
			date = new Date(date);
		
			var hours = date.getHours();
			var minutes = date.getMinutes();
			var ampm = hours >= 12 ? 'pm' : 'am';
			hours = hours % 12;
			hours = hours ? hours : 12; // the hour '0' should be '12'
			minutes = minutes < 10 ? '0'+minutes : minutes;
			var strTime = hours + ':' + minutes + ' ' + ampm;
			return date.getMonth()+1 + "/" + date.getDate() + "/" + date.getFullYear() + " " + strTime;
		}
		
		// get all the confessions first and bind it to the $scope.confessions object
		Confession.get()
			.success(function(data) {
				$scope.confessions = data;
				$scope.loading = false;
			});


		// function to handle submitting the form
		$scope.submitConfession = function() {
			console.log($scope.confessionData);
			if($scope.uid===0){
				alert('Nah... You need to login first to post a confession');
			}else{
				$scope.loading = true;

				// save the confession. pass in confession data from the form
				Confession.save($scope.confessionData)
					.success(function(data) {
						$scope.confessionData = {anonymous:$scope.confessionData.anonymous};
						// if successful, we'll need to refresh the confession list
						Confession.get()
							.success(function(getData) {
								$scope.confessions = getData;
								$scope.loading = false;
							});

					})
					.error(function(data) {
						console.log(data);
					});
			}
		};

		// function to handle deleting a confession
		$scope.deleteConfession = function(id) {
			$scope.loading = true; 

			Confession.destroy(id)
				.success(function(data) {

					// if successful, we'll need to refresh the confession list
					Confession.get()
						.success(function(getData) {
							$scope.confessions = getData;
							$scope.loading = false;
						});

				});
		};
	});