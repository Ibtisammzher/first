<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

////partnersController

Route::post('/partners', 'App\Http\controllers\PartnersController@createPartner');

Route::put('/partners/{id}', 'App\Http\controllers\PartnersController@update');

Route::put('/partnersupdate_is_active/{id}', 'App\Http\controllers\PartnersController@update_is_active');

////////servicscontroller

Route::post('/services', 'App\Http\controllers\ServicesController@createService');

Route::put('/service/{id}', 'App\Http\controllers\ServicesController@update');

Route::put('/servicesupdate_is_active/{id}', 'App\Http\controllers\ServicesController@update_is_active');

Route::get('/service/{service_name}', 'App\Http\controllers\ServicesController@get_projects_by_service_name') ;





//////projectsController

Route::post('/projects', 'App\Http\controllers\ProjectsController@createProject');

Route::put('/projects/{id}', 'App\Http\controllers\ProjectsController@update');

Route::put('/projectsupdate_is_active/{id}', 'App\Http\controllers\ProjectsController@update_is_active');
