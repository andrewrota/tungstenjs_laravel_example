<?php

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;


/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller {

  public function index() {
    /*
     * In the real world, data would be accessed via a model that pulled from a db or other data source;
     * data is in controller just to bootstrap data for demo app
     */
    $data = [
      'todoItems' => [['title' => 'give talk at Boston PHP']],
      'todoCount' => 1,
      'todoCountPlural' => false
    ];

    // Add data as JS variable.
    \JavaScript::put($data);

    // Render view with same data.  Shared data!
    return view('layouts.master', $data);
  }
}