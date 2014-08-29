<?php namespace App\Controllers\Admin;

use \View;
use \AccessLog;

class AccessLogsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /accesslogs
	 *
	 * @return Response
	 */
	public function index()
	{
		$access_logs = AccessLog::orderBy('created_at', 'desc')->get();
		return View::make('admin.accesslogs.index', compact('access_logs'));
	}

	/**
	 * Display the specified resource.
	 * GET /accesslogs/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$access_log = AccessLog::find($id);
		return View::make('admin.accesslogs.show', compact('access_log'));
	}

}
