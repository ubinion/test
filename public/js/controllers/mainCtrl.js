angular.module('mainCtrl', [])

	.controller('mainController', function($scope, $http, Comment) {
		// object to hold all the data for the new comment form
		$scope.commentData = {anonymous:0};

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
			
				alert('Nah... You need to login first to post a comment');
			}
		};
		
		//toggle the anonymous layout and flag
		$scope.toggleAnonymous = function() {
		
			if($scope.uid===0){
			
				alert('Nah... You need to login first to post a comment');
			}else{
				if($scope.commentData.anonymous === 0)
				{
					$scope.commentData.anonymous=1;
					$scope.pic 	= $scope.anonymousPic;
				}
				else
				{
					$scope.commentData.anonymous=0;
					$scope.pic 	= $scope.userPic;
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
		
		// get all the comments first and bind it to the $scope.comments object
		Comment.get()
			.success(function(data) {
				$scope.comments = data;
				$scope.loading = false;
			});


		// function to handle submitting the form
		$scope.submitComment = function() {

			if($scope.uid===0){
				alert('Nah... You need to login first to post a comment');
			}else{
				$scope.loading = true;

				// save the comment. pass in comment data from the form
				Comment.save($scope.commentData)
					.success(function(data) {
						$scope.commentData = {};
						// if successful, we'll need to refresh the comment list
						Comment.get()
							.success(function(getData) {
								$scope.comments = getData;
								$scope.loading = false;
							});

					})
					.error(function(data) {
						console.log(data);
					});
			}
		};

		// function to handle deleting a comment
		$scope.deleteComment = function(id) {
			$scope.loading = true; 

			Comment.destroy(id)
				.success(function(data) {

					// if successful, we'll need to refresh the comment list
					Comment.get()
						.success(function(getData) {
							$scope.comments = getData;
							$scope.loading = false;
						});

				});
		};
	});