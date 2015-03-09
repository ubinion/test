<?php
class VoteController extends BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Vote::create(array(
			//need to save sender id no matter anonymous or not
			'voter_id' 			=> Input::get('uid'),
			'voteable_id' 		=> Input::get('cid'),
			'voteable_type' 	=> Input::get('type'),
			'voteable_value' 	=> Input::get('value')
		));

		return Response::json(array('success' => true));
	}
}