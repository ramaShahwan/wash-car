<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use App\Models\Order_Service;
use App\Models\PayWay;
use Illuminate\Http\Request;

use Carbon\Carbon;
use DateTime;

class OrderController extends Controller
{

    public function index()
    {
        if(!auth()->check())
        {
            return view('auth.login');
        }
        else if(auth()->user()->role == "admin") {

         $services = Service::all();

        return view('site.index',
        ['services' => $services]);

        }
        else if(auth()->user()->role == "user") {
          
          $services = Service::all();
          
        return view('site.index',
        ['services' => $services]);
        }
      
    }
    
    public function create()
    {
        $services = Service::all();

       return view('site.index',
       ['services' => $services]);
    }



    public function store(Request $request)
    {
        $user = auth()->user();
        // $validated = $request->validate([
        //     'typeOfCar' => 'required',
        //     'sizeOfCar' => 'required',
        //     'numOfCar' => 'required',
        //     'totalPrice' => 'required',
        //     'orderDate' => 'required',
        //     'location_id' => 'required',
        //     'user_id' => 'required',
        //     'payWay_id' => 'required',
        //     'orderTime'=>'required'
        // ]);

        $order= Order::create([
            'typeOfCar'=>$request->typeOfCar,
            'sizeOfCar'=>$request->sizeOfCar,
            'numOfCar'=>$request->numOfCar,
            'totalPrice'=>$request->totalPrice,
            'orderDate'=>$request->orderDate,
            'orderTime'=>$request->orderTime,
            'status'=>'معلق',
            'note'=>'',
            'location_id'=>$request->location_id,
            'user_id'=>$user->id,
            'payWay_id'=>$request->payWay_id,
        ]);

        $order_ser = Order::where('user_id',$user->id)->latest()->first()->id;
        Order_Service::create([
            'order_id'=> $order_ser,
            'service_id'=> $request->service_id,
        ]);

        foreach($request->service_ids as $service)
        {
        $order_ser = Order::where('user_id',$user->id)->latest()->first()->id;
            Order_Service::create([
                'order_id'=> $order_ser,
                'service_id'=> $service,
            ]);
        }
        session()->flash('Add', 'تم تثبيت طلبك بنجاح');
        return redirect()->route('ord.summary');
    }

    // public function summary()
    // {
    //     $totalPrice = 0;
    //     $user = auth()->user();
    //     $order = Order::where('user_id',$user->id)->latest()->first();
    //     $allServices = Order_Service::where('order_id', $order->id)->pluck('service_id');
    //     foreach($allServices as $serviceId){
    //         $service = Service::find($serviceId);
    //         if ($service) 
    //         { $totalPrice += $service->price;}
    //     }
    
    //     $date =  $order->orderDate;
    //     $time = $order->orderTime;
    //     Order::find($order->id)->update([
    //         'totalPrice' => $totalPrice,
    //     ]);
    //     return view('site.summary',['totalPrice' => $totalPrice,
    //                               'orderDate'=>$date,
    //                               'orderTime'=>$time  ]);
    // }

    public function summary()
{
    $user = auth()->user();
    $order = Order::where('user_id', $user->id)->latest()->first();
    
    $totalPrice = 0;
    $date = $order->orderDate;
    $time = $order->orderTime;
    
    // حساب القيمة الإجمالية لجميع الخدمات في الطلب
    $allServices = Order_Service::where('order_id', $order->id)->pluck('service_id');
    foreach ($allServices as $serviceId) {
        $service = Service::find($serviceId);
        if ($service) {
            $totalPrice += $service->price;
        }
    }
    
    // تحديث قيمة totalPrice في الطلب الحالي
    Order::find($order->id)->update([
        'totalPrice' => $totalPrice,
    ]);
    
    return view('site.summary', [
        'totalPrice' => $totalPrice,
        'orderDate' => $date,
        'orderTime' => $time,
    ]);
}


    public function getPayway()
    {
        $pay = PayWay::all();
        return view('site.pay',compact('pay'));
    }

    // public function setPayway($id)
    // {  $user = auth()->user();
    //     $order = Order::where('user_id',$user->id);
    //     $pay = PayWay::find($id);
    //     Order::find($order->id)->update([
    //       'payWay_id' => $pay,
    //     ]);
    //     return view('site.home');}
    
    public function setPayway(Request $request)
    {
        $user = auth()->user();
        $order = Order::where('user_id', $user->id)->latest()->first();
        $pay = PayWay::find($request->pay_id); // استخدام $request->pay_id بدلاً من $request->id
        
        $order->update([
            'payWay_id' => $pay->id,
        ]);
        
        return view('site.home'); // تغيير الراوت إلى اسم الراوت الصحيح
    }
    




}


