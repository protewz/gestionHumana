<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolsController extends Controller
{
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

    public function update(Request $request)
    {
      $Toll = Follows::find($request->id);
      $Toll->id_employee = $request->id_employee;
      $Toll->Loan_Date = $request->Loan_Date;
      $Toll->Return_Date = $request->Return_Date;
      $Toll->Observation  = $request->Observation ;

      $Toll->save()  
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
