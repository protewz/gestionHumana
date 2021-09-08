<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainings;


class TrainingsController extends Controller
{
    //
    public function index(Request $request)
    {
        $Tra = Trainings::get();

        return ['Tra'=>$Tra];
    }

    public function getData(Request $request)
    {
        $buscar=$request->idBuscar;
    
        if ($buscar=='') {
            $Tra = trainings::select('Training_Name')->get();
        }else{
             $Tra = trainings::select('Training_Name')->where('id','=',$Tra)->get();
        }
        return ['training'=>$Tra];
    }


    public function store(Request $request)
    {
        $Tra = new Trainings;
        $Tra ->Training_Name = $request->Training_Name;
        $Tra ->Training_Topic = $request->Training_Topic;                                        
        $Tra ->Instructor_Name = $request->Instructor_Name;
        $Tra ->Training_Date = $request->Training_Date;
        $Tra ->Time_Entry = $request->Time_Entry;
        $Tra ->Time_Departure = $request->Time_Departure;
        $Tra ->Place = $request->Place;
        $Tra ->Observation = $request->Observation;
        $Tra ->save();
    }
    
    public function update(Request $request)
    {
        $Tra = Trainings::find($request->id);
        $Tra ->Training_Name = $request->Training_Name;
        $Tra ->Training_Topic = $request->Training_Topic;                                        
        $Tra ->Instructor_Name = $request->Instructor_Name;
        $Tra ->Training_Date = $request->Training_Date;
        $Tra ->Time_Entry = $request->Time_Entry;
        $Tra ->Time_Departure = $request->Time_Departure;
        $Tra ->Place = $request->Place;
        $Tra ->Observation = $request->Observation;
        $Tra ->save();
    }  
    
    
    public function destroy(Request $request)
    {
        $Tra = Trainings::findOrFail($request->id);
        $Tra->delete();
    }
}



