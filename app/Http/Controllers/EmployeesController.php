<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use Inertia\Inertia; 


class EmployeesController extends Controller
{

    public function index(Request $request)
    {
        $Emp = Employees::get();
        

       // return ['Emp'=>$Emp];
       return Inertia::render('Empleado',['Emp'=>$Emp]);
    }

    public function index2(Request $request)
    {
        $Emp = Employees::get();
        return ['Empleado'=>$Emp];
    }

    public function getData(Request $request)
    {
        $buscar=$request->idBuscar;

        $Emp = Employees::select('id','Name')->OrderBy('Name','asc')->get();
        return ['Empleado'=>$Emp];
    }


    public function store(Request $request)
{
    $Emp = new employees;
    $Emp->Name = $request->Name;
    $Emp->Surnames = $request->Surnames;
    $Emp->Ident_Card = $request->Ident_Card;
    $Emp->Phone = $request->Phone;
    $Emp->Mail = $request->Mail;
    $Emp->Adrres = $request->Adrres;
    $Emp->Date_Birth = $request->Date_Birth;
    $Emp->Date_Admission = $request->Date_Admission;
    $Emp->Date_Retirement = $request->Date_Retirement;
    $Emp->save();
}



public function update(Request $request)
{
    $Emp = employees::find($request->id);
    $Emp->Name = $request->Name;
    $Emp->Surnames = $request->Surnames;
    $Emp->Ident_Card = $request->Ident_Card;
    $Emp->Phone = $request->Phone;
    $Emp->Mail = $request->Mail;
    $Emp->Adrres = $request->Adrres;
    $Emp->Date_Birth = $request->Date_Birth;
    $Emp->Date_Admission = $request->Date_Admission;
    $Emp->Date_Rretirement = $request->Date_Retirement;
    $Emp->save();
}  


public function destroy(Request $request)
{
    $Emp = employees::findOrFail($request->id);
    $Emp->delete();
}

}

