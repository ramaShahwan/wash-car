<?php

namespace App\Http\Controllers;
use App\Models\HomeServices;
use App\Http\Controllers\Controller;
use App\Models\Home_Order_Services;

use Illuminate\Http\Request;

class HomeServicesController extends Controller
{
    public function index()
    { 
       $service = HomeServices::orderBy('created_at','DESC')->paginate(50);
       $dataCount = HomeServices::get()->count();
       $paginationLinks = $service->withQueryString()->links('pagination::bootstrap-4'); 
       return view('admin.service_home.show', [
       'service' => $service,
       'dataCount'=>$dataCount,
      'paginationLinks' => $paginationLinks
    ]);
    }

    public function create()
    {
       return view('admin.service_home.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required',
            'name' => 'required',
            'price' => 'required',

        ]);

        $service= HomeServices::create([
            'type'=>$request->type,
            'name'=>$request->name,
            'price'=>$request->price,
            'period'=>$request->period,
            'description'=>$request->description
        ]);

        session()->flash('Add', 'تم إضافة الخدمة بنجاح');
        // return back();
        return redirect()->route('service.show_home');

    }

   
    
  public function edit( $id)
  {
    $service = HomeServices::findOrFail($id);
    return view('admin.service_home.edit',compact('service'));
  }
 
   
  public function update(Request $request, $id)
  {
    $validated = $request->validate([
        'type' => 'required',
        'name' => 'required',
        'price' => 'required',

    ]);
    $service = HomeServices::findOrFail($id);

    $service->update([
        'type'=>$request->type,
        'name'=>$request->name,
        'price'=>$request->price,
        'period'=>$request->period,
        'description'=>$request->description
    ]);


      session()->flash('Edit', 'تم تعديل الخدمة بنجاح');
     //   return back();
      return redirect()->route('service.show_home');
 
    }

    public function destroy($id)
    {
      $srvices_orders = Home_Order_Services::where('home_services_id',$id)->get();
      foreach($srvices_orders as $order)
      {
       $order->delete();
      }
      HomeServices::findOrFail($id)->delete();
      session()->flash('delete', 'تم حذف الخدمة بنجاح');
      return back();
    }

}
