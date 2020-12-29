<?php

use Illuminate\Support\Facades\Route;
use App\models\project;
use App\Http\controllers\PartnersController;
use App\Http\controllers\ProjectsController;
use App\Http\controllers\ServicesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/services/{id}/projectes', function ($id) {
    
$service=\App\models\service::find($id);
if($service)
{
  $projects=$service->projects;
  return$projects;

}

  // $services=  project::get() ;
return "service not exist";
    
});



//////partnersController

Route::get('/partners', 'App\Http\controllers\PartnersController@show');

Route::get('/partner/{id}', 'App\Http\controllers\PartnersController@showbyid') ;

///////////servicecontrlooer


Route::get('/services', 'App\Http\controllers\ServicesController@services_show');

Route::get('/service/{id}', 'App\Http\controllers\ServicesController@services_showbyid') ;

Route::get('/service/{service_name}', 'App\Http\controllers\ServicesController@get_projects_by_service_name') ;

//projects controller

Route::get('/projects', 'App\Http\controllers\ProjectsController@show');

Route::get('/projects/{id}', 'App\Http\controllers\ProjectsController@showbyid');
