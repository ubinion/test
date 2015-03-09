<?php
class ConfessionController extends BaseController {

	/**
	 * Send back all comments as JSON
	 *
	 * @return Response
	 */
	public function index()
	{
		$uid = $this->getAuthId();

		return Response::json(
			DB::select(	
						DB::raw("SELECT 
							c.id, c.content, c.sender, c.anonymous, 
			 				c.up_vote, c.down_vote, c.created_at,
			 				(select COUNT(id) from votes WHERE voter_id='$uid' AND voteable_id=c.id) AS vote_time

			 				FROM confessions c 
			 				ORDER BY c.created_at DESC
			 				LIMIT 5
							")
						)
				
			);
	}

	/**
	 * Send back all comments as JSON
	 *
	 * @return Response
	 */
	/*public function index()
	{

		$cid = 1;
		$uid = $this->getAuthId();

		return Response::json(
			DB::select(	
				DB::raw("SELECT 
					c.id, c.content, c.sender, c.anonymous, 
			 		c.up_vote, c.down_vote, c.created_at,
			 		(select COUNT(id) from votes WHERE voter_id='$uid' AND voteable_id=c.id) AS vote_time

			 		FROM confessions c 
			 		ORDER BY c.created_at DESC
			 		LIMIT 5
				")
			)
				
		);

	}*/

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$uid = $this->getAuthId();

		Confession::create(array(
			//need to save sender id no matter anonymous or not
			'sender' => $uid,
			'content' => Input::get('content'),
			'anonymous' => Input::get('anonymous')
		));

		return Response::json(array('success' => true));
	}

	/**
	 * Return the specified resource using JSON
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Response::json(Confession::find($id));
	}

	/**
	 * Return the specified resource using JSON
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function vote($id)
	{
		//$id = Input::get('cid');
		$confessionData = Confession::find($id);

		if(Input::get('value')==1)
			$confessionData->up_vote+=1;
		else
			$confessionData->down_vote+=1;

		$confessionData->save();

		return Response::json(array('update_vote_value' => true));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Confession::destroy($id);

		return Response::json(array('success' => true));
	}

	private function getAuthId()
	{
		//if auth user, get data
		if(Auth::check())
			return Auth::id();
		else
			return 0;
	}

}