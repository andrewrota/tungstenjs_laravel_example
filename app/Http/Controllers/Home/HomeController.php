<?php

namespace App\Http\Controllers\Home;

use App\Providers\TungstenServiceProvider;
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
      'todoItems' => [
        ['title' => 'write basic laravel example', 'completed' => true],
        ['title' => 'create factory bootstrapper', 'completed' => true],
        ['title' => 'give talk at Boston PHP']
      ],
      'todoCount' => 1,
      'todoCountPlural' => false,
      'completedItems' => true
    ];

    $main_view = \View::make('layouts.master');

    \TungstenBootstrapper::register(
      $main_view,
      'todo_app',
      'todo_app_view',
      $data,
      'AppView',
      'AppModel'
    );

    // Render view with same data.  Shared data!
    return $main_view;
  }
}