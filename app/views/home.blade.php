@extends('layouts.level-one')

@section('content')
<?php //die($photo_url);?>
		<div class="container" ng-app="commentApp" ng-controller="mainController" 
		ng-init="userSetup(<% $uid %>, '<% $photo_url %>');">
			<div class="post-confession-bar">
				<form ng-submit="submitComment()">
					<a href="#" ng-click="toggleAnonymous()"><img class="img-circle pull-left" ng-src="{{pic}}" alt="anonymous" style="
					    margin: 0 10px 0 -10px;
					    height: 30px;
					    width: 30px;" ></a>
			    	<div class="input-group">
			    		<input type="hidden" name="author" ng-model="commentData.sender"/>
				        <input type="text" class="form-control input-sm chat-input" name="comment" ng-change="checkUserLogin()" ng-model="commentData.content" placeholder="Confess here!" required/>
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
			<div class="confession-thread" ng-hide="loading" ng-repeat="comment in comments">
                <div class="post-time">
                	<a href="#"> {{ comment.sender }}-{{ comment.id }} </a>|
					<span class="glyphicon glyphicon-time"></span> {{ formatDate(comment.created_at) }}
				</div>					
                <div class="dropdown">
                    <span class="dropdown-toggle" type="button" data-toggle="dropdown">
                        <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
                    </span>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" ng-click="deleteComment(comment.id)">Delete</a></li>
                    </ul>
                </div>					
				<div class="media user-post">
				  <a class="media-left media-middle" href="#">
				  	<div class="panel-heading">
				    	<img class="img-circle" src="../public/img/anonymous-icon/anonymous-1.jpg" alt="anonymous" width="46px" height="46px"/>
				  	</div>
				  </a>
				  <div class="media-body">
				  	<div class="confession-content">
				    	{{ comment.content }}
					</div>
				  </div><!--/.media-body-->
				</div><!--media-->
				<div class="vote-btn">
					<a href="#"><span class="glyphicon glyphicon-chevron-up"></span></a> {{ comment.up_vote}}
					<a href="#"><span class="glyphicon glyphicon-chevron-down"></span></a> {{comment.down_vote}}
				</div>			
				<div class="panel-footer">
					<a href="#"><small><span class="glyphicon glyphicon-comment"></span> Comment</small></a> <!--·
					<a href="#"><small><span class="glyphicon glyphicon-share"></span> Share</small></a-->
				</div>
			</div><!--/.confession-1 thread-->
		</div><!--/.container-->

@stop