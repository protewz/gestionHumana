<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detRecord;

class RecordsController extends Controller
{
    // //Guardar informacion
    public function store(Request $request)
    {
        try 
        {
            DB::beginTransaction();
            $date=Carbon::now()->format('Y-m-d');
            $Rec = new Records;

            $Rec->id_employee = $request->id_employee;
            $Rec->Instructor = $request->Instructor;
            $Rec->Name_Employee = $request->Name_Employee;
            $Rec->Employee_Surnames = $request->Employee_Surnames;


            $Rec->save();

            $Regis=$request->arrayRegis;

            foreach($Regis as $item=>$detail)
            {
                $recorDetails = new detRecord;

                $recorDetails ->id_record=$Rec->id;
                $recorDetails ->Registration_Date = $date;
                $recorDetails ->Time_Entry=$detail['Time_Entry'];
                $recorDetails ->Time_Departure=$detail['Time_Departure'];
                $recorDetails ->Observation=$detail['Observation'];
                $recorDetails ->Place=$detail['Place'];

                $recorDetails ->save();
           
            }

            DB::Commit();


        } catch (Exception $e) 
        {
            DB::rollback();
        }

    }

    public function update(Request $request)
    {
      $Rec = Follows::find($request->id);
      $Rec->id_employee = $request->id_employee;
      $Rec->Instructor = $request->Instructor;
      $Rec->Name_Employee = $request->Name_Employee;
      $Rec->Employee_Surnames = $request->Employee_Surnames;
     
      $Rec->save()  
    }


    public function destroy(Request $request)
    {
        try 
        {
            DB::beginTransaction();
            $deleteRec = Records::where('id_Follow', $request->id)->delete();

            $deleteRec = det_records::where('id_record', $request->id)->delete();
    
            $Rec = Records::findOrFail($request->id);
            $Rec->delete();
            DB::Commit();
        } catch (Exception $e) 
        {
            DB::rollback();
        }
    }




    
}
