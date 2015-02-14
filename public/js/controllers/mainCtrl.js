angular.module('mainCtrl', [])

	.controller('mainController', function($scope, $http, Confession, ConfessionDetail) {
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
		
		//get non anonymous confession info
		$scope.getConfessionData = function(anonymous, cid) {
		
			if(cid===0){
			
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
		
		//generate a random ubinion pic url for anonymous confession
		$scope.randomUbinionPic = function() {
			var number = 1 + Math.floor(Math.random() * 11);
			return ('../public/img/anonymous-icon/anonymous-'+ number +'.jpg');
		}
		
		// get all the confessions first and bind it to the $scope.confessions object
		Confession.get()
			.success(function(data) {
				$scope.confessions = data;
				$scope.loading = false;
			});

		// get confession data for specific one
		$scope.getConfessionDetail = function(confession,uid) {
		
			confession.user_photo_url=[];
			confession.user_name=[];
			confession.user_own_post=[];
			confession.user_own_post=false;
			
			//check only when the user is logged in 
			if(uid>0)
			{
				//if the user is the sender
				if(confession.sender === uid)
					confession.user_own_post=true;
					
			}

			if(confession.id>0 && confession.anonymous!= 1){
				//get confession data
				ConfessionDetail.show(confession.sender)
					.success(function(data) {
						data.photo_url = data.photo_url.replace('?type=large','');
						confession.user_photo_url=data.photo_url;
						confession.user_name=data.first_name+ ' '+data.last_name;
					});
					
			}else{
				confession.user_name='Anonymous '+confession.id;
				confession.user_photo_url=$scope.randomUbinionPic();
				
			}
		};
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