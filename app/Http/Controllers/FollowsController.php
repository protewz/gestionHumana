<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Follows;
use App\Models\detFollows;
use App\Models\Employees;
use Carbon\Carbon;

class FollowsController extends Controller
{
  
    public function index(Request $request)
    {
        $Fol = Follows::get();

        return ['Fol'=>$Fol];
    }

    public function getData(Request $request)
    {
        $buscar=$request->idBuscar;

        if ($buscar=='') {
            $Fol = Follows::select('Name')->get();
        }else{
            $Fol = Follows::select('Name')->where('id','=',$buscar)->get();
        }
        return ['Follows'=>$Fol];
    }

     //Guardar informacion
     public function store(Request $request)
     {
         try 
         {
             DB::beginTransaction();
             $date=Carbon::now()->format('Y-m-d');
             $Fol = new Follows;
 
             $Fol->id_employee = $request->id_employee;
             $Fol->Name = $request->Name;
             $Fol->Surnames = $request->Surnames;
             $Fol->Ident_Card = $request->Ident_Card;
             $Fol->Phone = $request->Phone;
             $Fol->Mail = $request->Mail;
 
             $Fol->save();
 
             $det=$request->arrayDetails;
 
             foreach($det as $item=>$detail)
             {
                 $detDetails = new detFollows;
 
                 $detDetails->id_Follows=$Fol->id;
                 $detDetails->Date = $date;
                 $detDetails->Turn=$detail['Turn'];
                 $detDetails->Time_Entry=$detail['Time_Entry'];
                 $detDetails->Time_Departure=$detail['Time_Departure'];
                 $detDetails->Observation=$detail['Observation'];
 
                 $detDetails->save();
             }
 
             DB::Commit();
 
 
         } catch (Exception $e) 
         {
             DB::rollback();
         }
 
     }

     // metodo para modificar datos 
     public function update(Request $request)
     {
         $Fol = Follows::find($request->id);
         $Fol ->id_employee = $request->id_employee;
         $Fol ->Name = $request->Name;                                        
         $Fol ->Surnames = $request->Surnames;
         $Fol ->Ident_Card = $request->Ident_Card;
         $Fol ->Phone = $request->Phone;
         $Fol ->Mail = $request->Mail;
     
         $Fol ->save();
     } 

    

     public function destroy(Request $request)
     {
         try 
         {
             DB::beginTransaction();
             $deleteFol = Follows::where('id_Follow', $request->id)->delete();
 
             $deleteFol = det_Follows::where('id_Follow', $request->id)->delete();
     
             $Fol = orders::findOrFail($request->id);
             $Fol->delete();
             DB::Commit();
         } catch (Exception $e) 
         {
             DB::rollback();
         }
     }

     
    


}


