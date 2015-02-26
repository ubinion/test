<?php
class ConfessionController extends BaseController {

	/**
	 * Send back all comments as JSON
	 *
	 * @return Response
	 */
	public function index()
	{

		$cid = 1;
		$uid = 2;

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

		/*
left join table style
		return Response::json(Confession::leftJoin('users', 'users.id', '=', 'confessions.sender')
					->orderBy('confessions.created_at', 'desc')
					->select(	'confessions.id', 'confessions.content', 'confessions.sender', 'confessions.anonymous', 
					 			'confessions.up_vote', 'confessions.down_vote', 'confessions.created_at', 'users.photo_url')
					->get()
					->take(5));*/

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//if auth user, get data
		if(Auth::check()){
			$id = Auth::id();
		}else{
			$id=0;
		}

		Confession::create(array(
			//need to save sender id no matter anonymous or not
			'sender' => $id,
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

}