<?php

namespace App\Http\Controllers;

use App\Models\PayWay;
use Illuminate\Http\Request;

class PayWayController extends Controller
{
    public function create()
    {
       return view('admin.payWay.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'way' => 'required',
            'accountNumber' => 'required',
        ]);

        $pay= PayWay::create([
            'way'=>$request->way,
            'accountNumber'=>$request->accountNumber,
        ]);

        session()->flash('Add', 'تم إضافة الحساب بنجاح');
        return back();
    }

    public function show()
    { 
         $pay = PayWay::orderBy('created_at','Asc')->get();
         return view('site.payWay',compact('pay'));
    }

}
