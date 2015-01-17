@extends('layouts.level-one')

@section('content')

		<div class="container">
			<div class="post-confession-bar">
				<form>
			    	<div class="input-group">
				        <input type="text" class="form-control input-sm chat-input" placeholder="Confess here!" required/>
					    <span class="input-group-btn" >     
				            <input type="submit" class="btn btn-success btn-sm" value="Post">
				        </span>    
				    </div>
			    </form>			
			</div>
		</div>

		<div class="container"><!--confession-1 post-->		
			<div class="confession-thread">
                <div class="post-time">
                	<a href="#"> Anonymous-1 </a>|
					<span class="glyphicon glyphicon-time"></span> Jun 27, 2014
				</div>					
                <div class="dropdown">
                    <span class="dropdown-toggle" type="button" data-toggle="dropdown">
                        <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
                    </span>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Delete</a></li>
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
				    	"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
					</div>
				  </div><!--/.media-body-->
				</div><!--media-->
				<div class="vote-btn">
					<a href="#"><span class="glyphicon glyphicon-chevron-up"></span></a> 200
					<a href="#"><span class="glyphicon glyphicon-chevron-down"></span></a> 100
				</div>			
				<div class="panel-footer">
					<a href="#"><small><span class="glyphicon glyphicon-comment"></span> Comment</small></a> ·
					<a href="#"><small><span class="glyphicon glyphicon-share"></span> Share</small></a>				
				</div>
			</div><!--/.confession-1 thread-->

			<div class="confession-thread"><!--confession-2 thread-->
                <div class="post-time">
                	<a href="#"> Anonymous-2 </a>|
					<span class="glyphicon glyphicon-time"></span> Jun 24, 2014
				</div>					
                <div class="dropdown">
                    <span class="dropdown-toggle" type="button" data-toggle="dropdown">
                        <a href="#"><span class="glyphicon glyphicon-flag"></span></a>
                    </span>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Report</a></li>
                    </ul>
                </div>					
				<div class="media user-post">
				  	<a class="media-left media-middle" href="#">
				  		<div class="panel-heading">
				    		<img class="img-circle" src="../public/img/anonymous-icon/anonymous-2.jpg" alt="anonymous" width="46px" height="46px"/>
				  		</div>
				  	</a>
					<div class="media-body">
					  	<div class="confession-content">
					    	"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
						</div>
					</div><!--/.media-body-->
				</div><!--media-->
				<div class="vote-btn">
					<a href="#"><span class="glyphicon glyphicon-chevron-up"></span></a> 200
					<a href="#"><span class="glyphicon glyphicon-chevron-down"></span></a> 100
				</div>	
				<div class="panel-footer">
					<a href="#"><small><span class="glyphicon glyphicon-comment"></span> Comment</small></a> ·
					<a href="#"><small><span class="glyphicon glyphicon-share"></span> Share</small></a>				
				</div>
			</div><!--/.confession-2 thread-->

			<div class="confession-thread"><!--confession-3 thread-->
                <div class="post-time">
                	<a href="#"> Anonymous-3 </a>|
					<span class="glyphicon glyphicon-time"></span> July 22, 2014
				</div>					
                <div class="dropdown">
                    <span class="dropdown-toggle" type="button" data-toggle="dropdown">
                        <a href="#"><span class="glyphicon glyphicon-flag"></span></a>
                    </span>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Report</a></li>
                    </ul>
                </div>					
				<div class="media user-post">
				  	<a class="media-left media-middle" href="#">
					  	<div class="panel-heading">
					    	<img class="img-circle" src="../public/img/anonymous-icon/anonymous-3.jpg" alt="anonymous" width="46px" height="46px"/>
					  	</div>
				  	</a>
				  <div class="media-body">
				  	<div class="confession-content">
				    	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</div>
				  </div><!--/.media-body-->
				</div><!--media-->
				<div class="vote-btn">
					<a href="#"><span class="glyphicon glyphicon-chevron-up"></span></a> 200
					<a href="#"><span class="glyphicon glyphicon-chevron-down"></span></a> 100
				</div>	
				<div class="panel-footer">
					<a href="#"><small><span class="glyphicon glyphicon-comment"></span> Comment</small></a> ·
					<a href="#"><small><span class="glyphicon glyphicon-share"></span> Share</small></a>				
				</div>
			</div><!--/.confession-3 thread-->

			<div class="confession-thread"><!--confession-4 thread-->
                <div class="post-time">
                	<a href="#"> Anonymous-4 </a>|
					<span class="glyphicon glyphicon-time"></span> July 22, 2014
				</div>					
                <div class="dropdown">
                    <span class="dropdown-toggle" type="button" data-toggle="dropdown">
                        <a href="#"><span class="glyphicon glyphicon-flag"></span></a>
                    </span>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Report</a></li>
                    </ul>
                </div>					
				<div class="media user-post">
				  	<a class="media-left media-middle" href="#">
					  	<div class="panel-heading">
					    	<img class="img-circle" src="../public/img/anonymous-icon/anonymous-4.jpg" alt="anonymous" width="46px" height="46px"/>
					  	</div>
				  	</a>
				  <div class="media-body">
				  	<div class="confession-content">
				    	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</div>
				  </div><!--/.media-body-->
				</div><!--media-->
				<div class="vote-btn">
					<a href="#"><span class="glyphicon glyphicon-chevron-up"></span></a> 200
					<a href="#"><span class="glyphicon glyphicon-chevron-down"></span></a> 100
				</div>	
				<div class="panel-footer">
					<a id="js-comment-toggle"><small><span class="glyphicon glyphicon-comment"></span> Comment</small></a> ·
					<a href="#"><small><span class="glyphicon glyphicon-share"></span> Share</small></a>
	                    <li class="list-group-item js-input-comment">
	                        <div class="row">
	                            <div class="col-xs-2 col-md-1">
	                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="anonymous" width="25px" height="25px"/></div>
	                            <div class="col-xs-10 col-md-11">
	                                <div class="comment-text">
	                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
	                                    euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim
	                                </div>
	                            </div>
	                        </div>
	                    </li>					
					<form class="js-input-comment">
					    <div class="input-group">
					      	<input type="text" class="form-control" placeholder="Message" required/>
					      	<span class="input-group-btn">
					        	<input type="submit" class="btn btn-primary" type="button" value="Comment"/>
					      	</span>
					    </div><!-- /input-group -->					    
				    </form>									
				</div>		
			</div><!--/.confession-4 thread-->			
		</div><!--/.container-->

@stop