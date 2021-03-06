<?php
class CommentController extends BaseController {

	/**
	 * Send back all comments as JSON
	 *
	 * @return Response
	 */
	public function index()
	{

	
		return Response::json(Comment::leftJoin('users', 'users.id', '=', 'comments.sender')
					->orderBy('comments.created_at', 'desc')
					 ->select(	'comments.id', 'comments.content', 'comments.sender', 'comments.anonymous', 
					 			'comments.up_vote', 'comments.down_vote', 'comments.created_at', 'users.photo_url')
					 ->get()
					 ->take(5));
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

		Comment::create(array(
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
		return Response::json(Comment::find($id));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Comment::destroy($id);

		return Response::json(array('success' => true));
	}

}