<?php

namespace App\Http\Controllers;

use App\Models\BeforAfter;
use Illuminate\Http\Request;

class BeforAfterController extends Controller
{
    public function create()
    {
       return view('admin.beforeAfter.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'beforeImage' => 'required',
            'afterImage' => 'required',
        ]);

        $pay= BeforAfter::create([
            'beforeImage'=>$request->beforeImage,
            'afterImage'=>$request->afterImage,
        ]);

        session()->flash('Add', 'تم إضافة الصور بنجاح');
        return back();
    }

    public function show()
    { 
         $data = BeforAfter::orderBy('created_at','Asc')->get();
         return view('site.beforeAfter',compact('data'));
    }

}
