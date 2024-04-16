<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use App\Models\Order_Service;


use Illuminate\Http\Request;

use Carbon\Carbon;

class OrderController extends Controller
{

    // public function index()
    // {
    //     $services = Service::get();

    //     return view('site.index',
    //     ['services' => $services]);
    // }

    
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


        $order = Order::latest()->first()->id;
        Order_Service::create([
            'order_id'=> $order,
            'service_id'=> $request->service,
        ]);

        foreach($request->service_ids as $service)
        {
            $order = Order::latest()->first()->id;
            Order_Service::create([
                'order_id'=> $order,
                'service_id'=> $service,
            ]);
         
        }
        session()->flash('Add', 'تم تثبيت طلبك بنجاح');
        return back();
    }

    public function summary($orderId)
    {
        $totalPrice = 0;
        $order = Order::find($orderId);
       $allServices = Order_Service::where('order_id',$orderId)->get('service_id');
        foreach($allServices as $serviceId){
            $service = Service::find($serviceId);
            if ($service) 
            {
          $totalPrice += $service->price;
             }
        }
      
     //   $extraServices = $request->service_ids; 
        // $totalPrice = 0;
        // foreach ($extraServices as $serviceId) {
        //     $service = Service::find($serviceId);
            
        //     if ($service) {
        //         $totalPrice += $service->price;
        //     }
        // }
        // $primaryService= $request->service;
        // $primary = Service::find($primaryService);
        // if ($primary) {
        //     $totalPrice += $primary->price;
        // }

        $date =  $order->orderDate;
        $time = $order->orderTime;
        Order::find($orderId)->update([
            'totalPrice' => $totalPrice,
        ]);

        return view('site.summary',compact('totalPrice','date','time'));

    }
 }


