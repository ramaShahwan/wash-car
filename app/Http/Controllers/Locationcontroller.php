<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function show()
    { 
         $areas = Location::orderBy('created_at','Asc')->get();
         return view('site.index',compact('areas'));
    }
    
    public function index()
    { 
         $areas = Location::orderBy('created_at','Asc')->get();
         return view('admin.location.show',compact('areas'));
    }

    public function create()
    {
       return view('admin.location.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'area' => 'required'
        ]);

        $area= Location::create([
            'area'=>$request->area
        ]);

        session()->flash('Add', 'تم إضافة الحي بنجاح');
        return redirect()->route('location.show');

    }
    
  public function edit( $id)
  {
    $area = Location::findOrFail($id);
    return view('admin.location.edit',compact('area'));
  }
 
   
  public function update(Request $request, $id)
  {
    $validated = $request->validate([
        'area' => 'required'
    ]);
    $area = Location::findOrFail($id);

    $area->update([
        'area'=>$request->area
    ]);


      session()->flash('Edit', 'تم تعديل الحي بنجاح');
     //   return back();
      return redirect()->route('location.show');
 
    }

    public function destroy( $id)
    {
      Location::findOrFail($id)->delete();
      session()->flash('delete', 'تم حذف الحي بنجاح');
      return back();
    }


}