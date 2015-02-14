<?php
class ConfessionDetailController extends BaseController {

	/**
	 * Return the specified resource using JSON
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Response::json(User::select('first_name','last_name','fb_uid','photo_url')->find($id));
	}

}