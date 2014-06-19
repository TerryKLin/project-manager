<?php

class ProjectVoteController extends BaseController {

	/**
	 * Display a listing of projects and their votes
	 *
	 * @return Response
	 */
	public function index()
	{
		$votes = Vote::all();

		return View::make('project.vote.index', compact('votes'));
	}

	/**
	 * Store a newly created vote in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Vote::$rules);

		if ($validator->passes())
			Vote::create($data);
	}

	/**
	 * Remove the specified vote from database.
	 * This is for AJAX Calls
	 *`
	 * @param  int  $projectId
	 * @param  int  $vote_id
	 * @return Response
	 */
	public function destroy($projectId, $voteId)
	{
		Vote::destroy($id);
	}

}
