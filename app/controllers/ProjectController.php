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
	 * GET /project/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$project = new Project;
		return View::make('project.create', compact('project'));
	}

	/**
	 * Store a newly created resource in database.
	 * POST /project
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Project::$rules);

		if ($validator->fails()){
			//Redirect
			return Redirect::back()
				->withErrors($validator)
				->withInput(Input::all());
		}
		else {
			//Store
			$project = new Project;
			$project->name = Input::get("name");
			$project->description = Input::get("description");
			$project->user_id = Auth::user()->id;

			$project->save();

			return Redirect::route('projects')
				->with('message', "Project was created successfuly!");
		}
	}

	/**
	 * Display the full information of a project.
	 * GET /project/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$project = Project::find($id);
		return View::make('project.show', compact('project'));
	}

	/**
	 * Show the form for editing the specified project.
	 * GET /project/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$project = Project::find($id);
		return View::make('project.edit', compact('project'));
	}

	/**
	 * Update the specified project in database.
	 * PUT /project/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$project = Project::find($id);

		if ($project->name != Input::get("name")){
			$validator = Validator::make(Input::all(), Project::$rules);
			if ($validator->fails()){
				//Redirect
				return Redirect::back()
					->withErrors($validator)
					->withInput(Input::except('name'));
			}
		}

		//Update
		$project->name = Input::get("name");
		$project->description = Input::get("description");

		$project->save();

		return Redirect::route('project.show',$project->id)
			->with('message', 'Project has been updated!');
	}

	/**
	 * Remove the specified project from database.
	 * DELETE /project/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}