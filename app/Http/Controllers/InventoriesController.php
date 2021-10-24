<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventories;
use Inertia\Inertia;

class InventoriesController extends Controller
{
    //
    public function index(Request $request)
    {
        $Inv = inventories::get();

       // return ['Inv'=>$Inv];
       return Inertia::render('Inventario',['Inv'=>$Inv]);
    }


    public function index2(Request $request)
    {
        $Inv = inventories::get();
        return ['Inventario'=>$Inv];
    }


    public function getData(Request $request)
    {
        $buscar=$request->idBuscar;
    
        if ($buscar=='') {
            $Inv = inventories::select('Serial')->get();
        }else{
             $Inv = inventories::select('Observation')->where('id','=',$Inv)->get();
        }
        return ['inventories'=>$Inv];
    }


    public function store(Request $request)
    {
        $Inv = new Inventories;
        $Inv->Tool_Name = $request->Tool_Name;
        $Inv->Serial = $request->Serial;
        $Inv->Purchase_Date = $request->Purchase_Date;
        $Inv->Observation = $request->Observation;
        $Inv->save();
    }
    
    public function update(Request $request)
    {
        $Inv= Inventories::find($request->id);
        $Inv->Tool_Name = $request->Tool_Name;
        $Inv->Serial = $request->Serial;
        $Inv->Purchase_Date = $request->Purchase_Date;
        $Inv->Observation = $request->Observation;
        $Inv->save();
     
    }  
    
    
    public function destroy(Request $request)
    {
        $Inv = Inventories::findOrFail($request->id);
        $Inv->delete();
    }
}

