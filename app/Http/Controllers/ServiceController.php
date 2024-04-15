<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function create()
    {
       return view('admin.service.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required',
            'Name' => 'required',
            'price' => 'required',

        ]);

        $service= Service::create([
            'type'=>$request->type,
            'Name'=>$request->Name,
            'price'=>$request->price,
            'period'=>$request->period,
            'description'=>$request->description
        ]);

        session()->flash('Add', 'تم إضافة الخدمة بنجاح');
        return back();
    }

    public function show()
    { 
         $service = Service::orderBy('created_at','Asc')->get();
         return view('site.service',compact('service'));
    }

}
