<?php

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;


/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller {

  public function index() {
    $data = [
      'todoItems' => [['title' => 'give talk at Boston PHP']],
      'todoCount' => 2,
      'todoCountPlural' => true
    ];
    \JavaScript::put($data);

    return view('layouts.master', $data);
  }
}