<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loans;
use App\Models\Tools;
use App\Http\Controllers\FollowsController;

class ToolsController extends Controller
{


    public function index(Request $request)
    {
        $Toll = tools::get();

        return ['Toll'=>$Toll];
    }

    public function getData(Request $request)
{
    $buscar=$request->idBuscar;

    if ($buscar=='') {
        $Toll = tools::select('id_employee')->get();
    }else{
         $Toll = tools::select('id_employee')->where('id','=',$Toll)->get();
    }
    return ['tools'=>$Toll];
}

//// //Guardar informacion
public function store(Request $request)
{
    try 
    {
        DB::beginTransaction();
        $date=Carbon::now()->format('Y-m-d');
        $Toll = new Tools;

        $Toll->id_employee = $request->id_employee;
        $Toll->Loan_Date = $date;
        $Toll->Return_Date = $date;
        $Toll->Observation = $request->Observation;


        $Toll->save();

        $T=$request->arrayTool;

        foreach($T as $item=>$detail)
        {
            $toolDetails = new Loans;

            $recorLoan ->id_tool=$Toll->id;
            $recorLoan ->id_inventory=$Toll->id;
            $recorLoan ->Registration_Date = $date;
            $recorLoan ->Observation=$detail['Observation'];
            $recorLoan ->Name=$detail['Name'];
           

            $toolDetails ->save();
       
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
       $Toll = Tools::find($request->id);
       $Toll->id_employee = $request->id_employee;
       $Toll->Loan_Date = $date;
       $Toll->Return_Date = $date;
       $Toll->Observation = $request->Observation;
   
       $Toll ->save();
   } 

public function destroy(Request $request)
{
    try 
    {
        DB::beginTransaction();
        $deletToll = Tools::where('id_tool', $request->id)->delete();

        $deleteRec = Loans::where('id_loan', $request->id)->delete();

        $Toll = Records::findOrFail($request->id);
        $Toll->delete();
        DB::Commit();
    } catch (Exception $e) 
    {
        DB::rollback();
    }
}


}

