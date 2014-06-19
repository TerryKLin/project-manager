<?php

class ProjectController extends BaseController {

	/**
	 * Display a listing of projects that belong to the Authenticated user.
	 * GET /projects
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = Project::all();

		return View::make('project.index', compact('projects'));
	}

	/**
	 * Show the form for creating a new project.
	 * GET /projects/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('project.create');
	}

	/**
	 * Store a newly created resource in database.
	 * POST /projects
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the full information of a project.
	 * GET /projects/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('project.show');
	}

	/**
	 * Show the form for editing the specified project.
	 * GET /projects/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('project.edit');
	}

	/**
	 * Update the specified project in database.
	 * PUT /projects/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified project from database.
	 * DELETE /projects/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}