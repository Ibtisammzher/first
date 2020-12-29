<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\service;

class ServicesController extends Controller
{

    public function createService(Request $request)
    {
        $service=new service();

        $service->title= $request->title;
        $service->description= $request->description;
        $service->is_active=$request->is_active;

        $service->save();
       return response()->json($service);  
    }
   

    public function services_show()
    {
        $service = DB::table('services')
        ->where('is_active', '=', 1)
        ->get();
        
            
       return response()->json($service);
   
    }

    public function services_showbyid($id)
    {
        
        $service = service::find($id);
        return response()->json($service);
    }

    public function update(Request $request,$id)
    {
        
        $service= service::find($id);

        $service->title= $request->title;
        $service->description= $request->description;
        $service->is_active=$request->is_active;

        $service->save();
        return response()->json( $service);


    }

    public function update_is_active($id,Request $request)
    {
        $service= service::find($id);

        $service->is_active=$request->is_active;

        $service->save();
        return  response()->json($service);
    }

    public function get_projects_by_service_name($service_name){

     //dd($service_name);

        $serviceID= DB::table('services') 
                        ->select('id')
                        ->where('title','=',$service_name)
                        ->get();
       

         $project_table= DB::table('projects') 
                            ->select('*')
                            ->where('service_id','=',$serviceID)
                            ->get();
            dd($project_table);
        return response()->json($project_table);
            

        // dd($service_name);
       
        }


       
}
