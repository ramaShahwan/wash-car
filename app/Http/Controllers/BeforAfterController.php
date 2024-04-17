<?php

namespace App\Http\Controllers;

use App\Models\BeforAfter;
use Illuminate\Http\Request;

class BeforAfterController extends Controller
{
    public function create()
    {
       return view('admin.before_after.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'beforeImage' => 'required',
            'afterImage' => 'required',
        ]);

    $images = new BeforAfter(); 
        //store before image
    $newBeforeImage = $request->file('beforeImage');
    //for change image name
    $newBeforeImageName = 'beforeImage' . time(). '.' . $newBeforeImage->getClientOriginalExtension();
    $newBeforeImage->move('assets/img/gallery/', $newBeforeImageName);
    $images->beforeImage = $newBeforeImage;     

      //store after image
    $newAfterImage = $request->file('afterImage');
    //for change image name
    $newAfterImageName = 'afterImage' . time(). '.' . $newAfterImage->getClientOriginalExtension();
    $newAfterImage->move('assets/img/gallery/', $newAfterImageName);
    $images->afterImage = $newAfterImageName;     
    
        session()->flash('Add', 'تم إضافة الصور بنجاح');
        return back();
    }
    
    public function show()
    { 
         $data = BeforAfter::orderBy('created_at','Asc')->get();
         return view('site.before_after',compact('data'));
    }

}
