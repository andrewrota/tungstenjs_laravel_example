<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;


/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class HomeController extends Controller {

  /**
   * @return \Illuminate\View\View
   */
  public function index()
  {
    \JavaScript::put([
                        'test' => 'it works!'
                      ]);

    return view('welcome');
  }
}