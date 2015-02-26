<?php

class Confession extends Eloquent {
	protected $fillable = array('sender', 'content', 
								'anonymous', 'up_vote', 
								'down_vote');	

	/*public function voted()
    {
        return $this->hasManyThrough('Vote','User', 'vote_item_id','id');
    }

    public function votes()
    {

    	return $this->morphMany('Vote', 'voteable');
    }*/

}
