@extends('layouts.level-one')

@section('content')
<?php //die($photo_url);?>
		<div class="container" ng-app="confessionApp" ng-controller="mainController" 
		ng-init="userSetup(<% $uid %>, '<% $photo_url %>');">
			<div class="post-confession-bar">
				<form ng-submit="submitConfession()">
					<a href="#" ng-click="toggleAnonymous()"><img class="img-circle pull-left" ng-src="{{pic}}" alt="anonymous" style="
					    margin: 0 10px 0 -10px;
					    height: 30px;
					    width: 30px;" ></a>
			    	<div class="input-group">
			    		<input type="hidden" name="author" value="{{confessionData.sender}}"/>
						<input type="hidden" name="anonymous" value="{{anonymous}}"/>
				        <input type="text" class="form-control input-sm chat-input" name="confession" ng-change="checkUserLogin()" ng-model="confessionData.content" placeholder="Confess here!" required/>
					    <span class="input-group-btn" >     
				            <input type="submit" class="btn btn-success btn-sm" value="Post">
				        </span>    
				    </div>
			    </form>			
			</div>
		
			<!-- LOADING ICON -->
			<!-- show loading icon if the loading variable is set to true -->
			<p class="text-center" ng-show="loading">Loading...</p>

			<!-- THE COMMENTS -->
			<div class="confession-thread" ng-hide="loading" ng-repeat="confession in confessions">
				<span ng-init="getConfessionDetail(confession, <% $uid %>)"></span>
                <div class="post-time">
                	<a href="#"> {{ confession.user_name }}</a>|
					<span class="glyphicon glyphicon-time"></span> {{ formatDate(confession.created_at) }}
				</div>

				<div class="dropdown" ng-if="confession.user_own_post===false">
                    <span class="dropdown-toggle" type="button" data-toggle="dropdown">
                        <a href="#"><span class="glyphicon glyphicon-flag"></span></a>
                    </span>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" ng-click="deleteConfession(confession.id)">Report as inappropriate</a></li>
                    </ul>
                </div>

                <div class="dropdown" ng-if="confession.user_own_post===true">
                    <span class="dropdown-toggle" type="button" data-toggle="dropdown">
                        <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
                    </span>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" ng-click="deleteConfession(confession.id)">Delete</a></li>
                    </ul>
                </div>					
				<div class="media user-post">
				  <a class="media-left media-middle" href="#">
				  	<div class="panel-heading">
				  		<img class="img-circle" src="{{confession.user_photo_url}}" alt="anonymous" width="46px" height="46px"/>
				    	<!--img class="img-circle" ng-if="confession.anonymous==0" src="{{confession.photo_url}}" alt="anonymous" width="46px" height="46px"/-->
				  	</div>
				  </a>
				  <div class="media-body">
				  	<div class="confession-content">
				    	{{ confession.content }}
					</div>
				  </div><!--/.media-body-->
				</div><!--media-->
				<div class="vote-btn">
					<a href="#"><span class="glyphicon glyphicon-chevron-up"></span></a> {{ confession.up_vote}}
					<a href="#"><span class="glyphicon glyphicon-chevron-down"></span></a> {{confession.down_vote}}
				</div>			
				<div class="panel-footer">
					<a href="#"><small><span class="glyphicon glyphicon-comment"></span> Comment</small></a> <!--·
					<a href="#"><small><span class="glyphicon glyphicon-share"></span> Share</small></a-->
				</div>
			</div><!--/.confession-1 thread-->
		</div><!--/.container-->

@stop