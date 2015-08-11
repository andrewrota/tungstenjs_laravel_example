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
      'todoCount' => 1,
      'todoCountPlural' => false
    ];
    \JavaScript::put($data);

    return view('layouts.master', $data);
  }
}