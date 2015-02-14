<?php

class Confession extends Eloquent {
	protected $fillable = array('sender', 'content', 'anonymous', 'reply_to', 'up_vote', 'down_vote');	
}
