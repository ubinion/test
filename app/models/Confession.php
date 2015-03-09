<?php
class Confession extends Eloquent {
	protected $fillable = array('sender', 'content', 
								'anonymous', 'up_vote', 
								'down_vote');	
}
