<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/{offset}', 'CalendarController@show');

// API routes...
Route::get('/api/v1/calendar/rules', function() {

  $rules = [
    'a' => 'xxx',
    'b' => 'yyy',
  ];

return Response::json(array(
            'error' => false,
            'rules' => $rules,
            'status_code' => 200
        ));
});
