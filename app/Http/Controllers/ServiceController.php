<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Order_Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    { 
       $service = Service::orderBy('created_at','DESC')->paginate(50);
      $dataCount = Service::get()->count();
      $paginationLinks = $service->withQueryString()->links('pagination::bootstrap-4'); 
      return view('admin.service.show', [
       'service' => $service,
       'dataCount'=>$dataCount,
      'paginationLinks' => $paginationLinks
    ]);
    }

    public function create()
    {
       return view('admin.service.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required',
            'name' => 'required',
            'price' => 'required',

        ]);

        $service= Service::create([
            'type'=>$request->type,
            'name'=>$request->name,
            'price'=>$request->price,
            'period'=>$request->period,
            'description'=>$request->description
        ]);

        session()->flash('Add', 'تم إضافة الخدمة بنجاح');
        // return back();
        return redirect()->route('service.show');

    }

   
    
  public function edit( $id)
  {
    $service = Service::findOrFail($id);
    return view('admin.service.edit',compact('service'));
  }
 
   
  public function update(Request $request, $id)
  {
    $validated = $request->validate([
        'type' => 'required',
        'name' => 'required',
        'price' => 'required',

    ]);
    $service = Service::findOrFail($id);

    $service->update([
        'type'=>$request->type,
        'name'=>$request->name,
        'price'=>$request->price,
        'period'=>$request->period,
        'description'=>$request->description
    ]);


      session()->flash('Edit', 'تم تعديل الخدمة بنجاح');
     //   return back();
      return redirect()->route('service.show');
 
    }

    public function destroy( $id)
    {
      $srvices_orders = Order_Service::where('service_id',$id)->get();
      foreach($srvices_orders as $order)
      {
       $order->delete();
      }
      Service::findOrFail($id)->delete();
      session()->flash('delete', 'تم حذف الخدمة بنجاح');
      return back();
    }

}
