<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function create()
    {
       return view('site.join');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'birthDate'=>'required',
            'Gender'=>'required',
            'phone'=>'required',
            'aboutYou'=>'required',
            'image'=>'required'
        ]);

        $emp= Employee::create([
            'firstName'=>$request->firstName,
            'lastName'=>$request->lastName,
            'birthDate'=>$request->birthDate,
            'Gender'=>$request->Gender,
            'phone'=>$request->phone,
            'aboutYou'=>$request->aboutYou,
            'image'=>$request->image,

        ]);

        session()->flash('Add', 'تم إرسال طلبك بنجاح');
        return back();
    }
}
