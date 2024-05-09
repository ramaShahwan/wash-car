<?php

namespace App\Http\Controllers;

use App\Models\PayWay;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class PayWayController extends Controller
{

    
    // public function show()
    // { 
    //      $pay = PayWay::orderBy('created_at','Asc')->get();
    //      return view('site.payWay',compact('pay'));
    // }

    public function index()
    { 
         $pay = PayWay::orderBy('created_at','Asc')->get();
         return view('admin.payWay.show',compact('pay'));
    }

    public function create()
    {
       return view('admin.payWay.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'way' => 'required',
            'accountNumber' => 'required',
        ]);
        $pay = new PayWay(); 
        $pay->way = $request->way;
        $pay->accountNumber  = $request->accountNumber;
        $pay->save();

        // store image
       if($request->hasFile('image')){
        $newImage = $request->file('image');
        //for change image name
        $newImageName = 'image_' . $pay->id . '.' . $newImage->getClientOriginalExtension();
        // $newImage->move('assets/site/img/pay/', $newImageName);
        $newImage->move(public_path('site/img/pay/'), $newImageName);

       $pay->image = $newImageName;
       $pay->update();
       
   }
        session()->flash('Add', 'تم إضافة الحساب بنجاح');
        return redirect()->route('pay.show');
        // return back();
    }

    
     public function edit( $id)
     {
      $pay = PayWay::findOrFail($id);
      return view('admin.payWay.edit',compact('pay'));
     }
 
   
  public function update(Request $request, $id)
  {
    $validated = $request->validate([
        'way' => 'required',
        'accountNumber' => 'required',
    ]);

    //   $pay = PayWay::findOrFail($id);
    //   $oldImageName=$pay->image;

    //   $pay->update([
    //     'way'=>$request->way,
    //     'accountNumber'=>$request->accountNumber,
    //   ]);

      $pay = PayWay::findOrFail($id);
     $oldImageName=$pay->image;
     $pay->way = $request->way;
     $pay->accountNumber = $request->accountNumber;

   // update newImage
     if ($request->hasFile('image')) {
    // Delete the old image from the server
    if ($oldImageName) {
         File::delete(public_path('site/img/pay/') . $oldImageName);
    }
    // Upload new image
    $newImage = $request->file('image');
    $newImageName = 'image_' . $pay->id . '.' . $newImage->getClientOriginalExtension();
    $newImage->move('site/img/pay/', $newImageName);

    // Update the image record with the new image name
       $pay->image = $newImageName;
       }
       $pay->update();

       session()->flash('Edit', 'تم تعديل الحساب بنجاح');
       return redirect()->route('pay.show');
    // return back();

    }

    public function destroy( $id)
    {
      $orders = Order::where('payWay_id',$id)->get();
      foreach($orders as $order)
      {
       $order->payWay_id = null;
       $order->update();
      }
      PayWay::findOrFail($id)->delete();
      session()->flash('delete', 'تم حذف الحساب بنجاح');
      return back();
    }

}
