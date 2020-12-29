<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\project;
use App\Models\service;

class ProjectsController extends Controller
{
    public function createProject(Request $request)
    {
      $project=new project();

      $project->title= $request->title;
      $project->service_id= $request->service_id;
      $project->start_date= $request->start_date;
      $project->end_date= $request->end_date;
      $project->description= $request->description;
      $project->image= $request->image;
      $project->is_active=$request->is_active;
          
        $project->save();
       return response()->json($project);
    
    }

    public function show()
    {
        $project = DB::table('projects')
        ->where('is_active', '=', 1)
        ->get();
        
            
       return response()->json($project);
   
    }

    public function showbyid($id)
    {
        
        $project = project::find($id);
        return response()->json($project);
    }

    public function update(Request $request,$id)
    {
        $project= project::find($id);

        $project->title= $request->title;
        $project->service_id= $request->service_id;
        $project->start_date= $request->start_date;
        $project->end_date= $request->end_date;
        $project->description= $request->description;
        $project->image= $request->image;
        $project->is_active=$request->is_active;
            
          $project->save();
         return response()->json($project);


    }

    public function update_is_active($id,Request $request)
    {
        $project= project::find($id);

        $project->is_active=$request->is_active;

        $project->save();
        return  response()->json($project);
    }

   
    public function get_service_name_by_project_name($project_name)
    {
        $serviceID= DB::table('projects') 
                        ->select('service_id')
                        ->where('title','=',$project_name)
                        ->get();
       

         $service_table= DB::table('services') 
                            ->select('title')
                            ->where('id','=',$serviceID)
                            ->get();
            
        return response()->json($service_table);
            

        dd($service_name);
       
        }
}
