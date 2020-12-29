<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\partner;



class PartnersController extends Controller
{

    public function createPartner(Request $request)
    {
         $this->validate($request,[
            'name' => 'required|min:3|max:120',
            'phone' => 'required|regex:/[0-9]{10}/'
            
            ]);

        $partner=new partner();

        $partner->name= $request->name;
        $partner->address= $request->address;
        $partner->phone= $request->phone;
        $partner->email= $request->email;
        $partner->description= $request->description;
        $partner->image= $request->image;
        $partner->is_active=$request->is_active;
          
        $partner->save();
       return response()->json($partner);
    
    }

    public function show()
    {
        $partner = DB::table('partners')
        ->where('is_active', '=', 1)
        ->get();
        
            
       return response()->json($partner);
   
    }

    public function showbyid($id)
    {
        
        $partner = partner::find($id);
        return response()->json($partner);
    }

    public function update(Request $request,$id)
    {
        $partner= partner::find($id);

        $partner->name= $request->name;
        $partner->address= $request->address;
        $partner->phone= $request->phone;
        $partner->email= $request->email;
        $partner->description= $request->description;
        $partner->image= $request->image;
        $partner->is_active=$request->is_active;

        $partner->save();
        return response()->json($partner);


    }

    public function update_is_active($id,Request $request)
    {
        $partner= partner::find($id);

        $partner->is_active=$request->is_active;

        $partner->save();
        return  response()->json($partner);

    }
}
      
    

