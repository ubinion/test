angular.module('mainCtrl', [])
	.controller('mainController', function($scope, $http, Confession, ConfessionDetail, Vote) {
		// object to hold all the data for the new confession form, default set anonymous to 0
		$scope.confessionData = {anonymous:0};

		// loading variable to show the spinning loading icon
		$scope.loading = true;

		//url for anonymous picture
		$scope.anonymousPic = 'http://localhost/ubinion2/public/img/anonymous-icon/anonymous-1.jpg';
		
		// setup user picture
		$scope.userSetup = function(uid, userPic) {
			$scope.uid 		= uid;
			$scope.userPic	= userPic;
			//set to default image if usernot set any image
			if($scope.userPic == '')
				$scope.userPic = 'http://www.joesdaily.com/wp-content/uploads/2014/07/star-wars-long-shadow-flat-icons-storm-trooper.jpg';
				
			$scope.pic		= $scope.userPic;
		};
		
		$scope.checkUserLogin = function() {
			if($scope.uid===0)
				alert('Nah... You need to login first to post a confession');
		};
		
		//toggle the anonymous layout and flag
		$scope.toggleAnonymous = function() {
			if($scope.uid===0) {
			
				alert('Nah... You need to login first to post a confession');
			}else{
				if($scope.confessionData.anonymous === 0) {
					$scope.confessionData.anonymous =1;
					$scope.pic 	= $scope.anonymousPic;
					console.log($scope.confessionData.anonymous);
				}else {
					$scope.confessionData.anonymous =0;
					$scope.pic 	= $scope.userPic;
					console.log($scope.confessionData.anonymous);
				}
			}
		};
		
		//get non anonymous confession info
		$scope.getConfessionData = function(anonymous, cid) {
			if(cid===0) {
				alert('Nah... You need to login first to post a confession');
			}else{
				if($scope.confessionData.anonymous === 0) {
					$scope.confessionData.anonymous =1;
					$scope.pic 	= $scope.anonymousPic;
					console.log($scope.confessionData.anonymous);
				}
				else {
					$scope.confessionData.anonymous =0;
					$scope.pic 	= $scope.userPic;
					console.log($scope.confessionData.anonymous);
				}
			}
		};
		
		//datetime format in post
		$scope.formatDate = function(date) {
			date = date.replace(' ','T');
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
			//check only when the user is logged in 
			if(uid>0 && confession.sender == uid)
				confession.user_own_post=true;	
			
			if(confession.id>0 && confession.anonymous!= 1) {
				//get confession data
				ConfessionDetail.show(confession.sender) 
					.success(function(data) {
					
						if(data.photo_url == null)
							data.photo_url = 'http://www.joesdaily.com/wp-content/uploads/2014/07/star-wars-long-shadow-flat-icons-storm-trooper.jpg';
						if (data.photo_url.indexOf("?type=large") >= 0)
							data.photo_url = data.photo_url.replace('?type=large','');

						confession.user_photo_url=data.photo_url;
						confession.user_name=data.first_name+ ' '+data.last_name;
					});
					
			}else {
				confession.user_name='Anonymous '+confession.id;
				confession.user_photo_url=$scope.randomUbinionPic();
			}
		};
		// function to handle submitting the form
		$scope.submitConfession = function()
		{
			console.log($scope.confessionData);
			if($scope.uid===0) {
				alert('Nah... You need to login first to post a confession');
			}else {
				$scope.loading = true;

				// save the confession. pass in confession data from the form
				Confession.save($scope.confessionData)
					.success(function(data) {
						$scope.confessionData = {anonymous:$scope.confessionData.anonymous};
						// if successful, we'll need to refresh the confession list
						Confession.get()
							.success(function(getData) {
								getData.user_photo_url=[];
								getData.user_photo_url='../public/img/anonymous-icon/anonymous-9';
								getData.user_name=[];
								getData.user_name='Default User';
								getData.user_own_post=[];
								getData.user_own_post=false;
								
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
							getData.user_photo_url=[];
							getData.user_photo_url='../public/img/anonymous-icon/anonymous-9';
							getData.user_name=[];
							getData.user_name='Default User';
							getData.user_own_post=[];
							getData.user_own_post=false;
							$scope.confessions = getData;
							$scope.loading = false;
						});

				});
		};
		
		//For voting section
		$scope.voteConfession = function(uid, cid, type, value) {
			if(uid===0)
				alert('You need to login first to vote this Confession');
			else{
				var voteData = {uid:uid, cid:cid, type:type, value:value};

				//if upvote
				if(value === 1)
					var voteValueDiv = '#upvote-value-'+cid;
				else
					var voteValueDiv = '#downvote-value-'+cid;

				//get current vote value and add one
				var voteValue = $(voteValueDiv).attr('value');
				$(voteValueDiv).html(++voteValue);

				//$('#vote-btn-'+cid).addClass('disabled');
				$('#vote-btn-'+cid).children('a').removeAttr('ng-click').css('color','grey');
	
				Vote.save(voteData)
				.success(function(data) {
					console.log(data);
					//update the total in Confession Table
					Confession.vote(voteData)
					.success(function(data) {
						console.log(data);
					})
					.error(function(data) {
						console.log(data);
					});
				})
				.error(function(data) {
					console.log(data);
				});

			}
				
		};
		//display login message / modal
		$scope.displayVotedMessage = function(){
			alert('nah... you voted before');
		};
	});