<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detRecord;
use App\Models\records;
use App\Models\Employees;


class RecordsController extends Controller
{
    
    
    public function index(Request $request)
    {
        $Rec = Records::get();

        return ['Rec'=>$Rec];
    }

    public function getData(Request $request)
    {
        $buscar=$request->idBuscar;

        if ($buscar=='') {
            $Rec = Records::select('id_employee')->get();
        }else{
            $Fol = Records::select('id_employee')->where('id','=',$buscar)->get();
        }
        return ['Records'=>$Rec];
    }
    
    //Guardar informacion
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

            $det=$request->arrayDetails;

            foreach($det as $item=>$detail)
            {
                $detDetails = new det_follows;

                $detDetails->id_record=$Rec->id;
                $detDetails->Registration_Date = $date;
                $detDetails->Turn=$detail['Turn'];
                $detDetails->Time_Entry=$detail['Time_Entry'];
                $detDetails->Time_Departure=$detail['Time_Departure'];
                $detDetails->Observation=$detail['Observation'];
                $detDetails->Observation=$detail['Place'];

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
        $Rec = Records::find($request->id);
        $Rec ->id_employee = $request->id_employee;
        $Rec ->Instructor = $request->Instructor;                                        
        $Rec ->Name_Employee = $request->Name_Employee;
        $Rec ->Employee_Surnames = $request->Employee_Surnames;
    
        $Rec ->save();
    } 

    
    
// metodo eliminar 
    public function destroy(Request $request)
    {
        try 
        {
            DB::beginTransaction();
            $deleteFol = Records::where('id_record', $request->id)->delete();

            $deleteFol = det_Follows::where('id_record', $request->id)->delete();
    
            $Rec = Records::findOrFail($request->id);
            $Rec->delete();
            DB::Commit();
        } catch (Exception $e) 
        {
            DB::rollback();
        }
    }
 
}

    

