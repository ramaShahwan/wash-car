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
        $services = Service::all();

        return view('site.index',
        ['services' => $services]);
    }

    
    public function create()
    {
        $services = Service::all();

       return view('site.index',
       ['services' => $services]);
    }



    public function store(Request $request)
    {
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
            'location_id'=>$request->location_id,
            'user_id'=>$request->user_id,
            'payWay_id'=>$request->payWay_id,
        ]);

        $order_ser = Order::latest()->first()->id;
        Order_Service::create([
            'order_id'=> $order_ser,
            'service_id'=> $request->service,
        ]);

        foreach($request->service_ids as $service)
        {
            $order_ser = Order::latest()->first()->id;
            Order_Service::create([
                'order_id'=> $order_ser,
                'service_id'=> $service,
            ]);
        }

        // $order= Order::latest()->first();
        session()->flash('Add', 'تم تثبيت طلبك بنجاح');
        // return view('site.summary');

        return redirect()->route('ord.summary');
    }

    public function summary()
    {
        $totalPrice = 0;
        $order = Order::latest()->first();
    //    $allServices = Order_Service::where('order_id',$order->id)->get('service_id');
    $allServices = Order_Service::where('order_id', $order->id)->pluck('service_id');
        foreach($allServices as $serviceId){
            $service = Service::find($serviceId);
            if ($service) 
            { $totalPrice += $service->price;}
        }
    
        $date =  $order->orderDate;
        $time = $order->orderTime;
        Order::find($order->id)->update([
            'totalPrice' => $totalPrice,
        ]);
        return view('site.summary',['totalPrice' => $totalPrice,
                                  'orderDate'=>$date,
                                  'orderTime'=>$time  ]);
    
       // return view('site.index',compact('totalPrice','date','time'));

    }

    public function getPayway()
    {
        $pay = PayWay::all();
        return view('site.pay',compact('pay'));
    }

    public function setPayway($id)
    {
        $order = Order::latest()->first();
        $pay = PayWay::find($id);

        Order::find($order->id)->update([
          'payWay_id' => $pay,
        ]);
    }



 }


