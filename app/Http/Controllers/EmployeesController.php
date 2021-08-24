<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;


class EmployeesController extends Controller
{
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
    $Emp->Post = $request->Post;
    $Emp->Date_Admission = $request->Date_Admission;
    $Emp->Date_Rretirement = $request->Date_Retirement;
    $Emp->save();
}

}

