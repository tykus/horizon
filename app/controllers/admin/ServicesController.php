<?php namespace App\Controllers\Admin;

use Image;
use Input;
use Redirect;
use Response;
use Service;
use Session;
use View;

class ServicesController extends \BaseController {

  /**
   * Display a listing of the resource.
   * GET /services
   *
   * @return Response
   */
  public function index()
  {
    $services = Service::sorted()->get();
    return View::make('admin.services.index', compact('services'));
  }

  /**
   * Display the specified resource.
   * GET /services/{id}
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $service = Service::find($id);
    return View::make('admin.services.show', compact('service'));
  }

  /**
   * Show the form for editing the specified resource.
   * GET /services/{id}/edit
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $service = Service::find($id);
    return View::make('admin.services.edit', compact('service'));
  }

  /**
   * Update the specified resource in storage.
   * PUT /services/{id}
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    $service = Service::find($id);

    $image = Input::file('image');

    if ($image)
    {
      $image_path = '/img/' . $image->getClientOriginalName();

      $img = Image::make($image);
      $img->resize(null, 334, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
      });
      $img->crop(334,334);
      $img->save(public_path() . $image_path);
      $service->image_path = $image_path;
    }

    $service->title = Input::get('title');
    $service->description = Input::get('description');
    $service->introduction = Input::get('introduction');

    if ($service->save())
    {
      Session::flash('info', 'Service updated successfully.');
      return Redirect::action('admin.services.index');
    }
  }

  public function create()
  {
    $service = new Service;
    return View::make('admin.services.create', compact('service'));
  }

  public function sort()
  {
    $ordering = Input::get('service');

    foreach($ordering as $position => $id)
    {
      $service = Service::find($id);
      $service->sort_order = $position;
      $service->save();
    }
    return Response::json(['message'=>'ok', 200]);
  }

}
