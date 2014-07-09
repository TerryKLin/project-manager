<?php

class BaseController extends Controller {

	/**
     * Instantiate a new ProjectController instance.
     */
	public function __construct() 
	{
    	$this->beforeFilter('auth');
        $this->beforeFilter('csrf', array('on' => array('post','put','delete')));
        $this->beforeFilter('xss', array('on' => array('post','put')));
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
