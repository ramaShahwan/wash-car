<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Home_Order_Services;
use App\Models\HomeOrders;
use App\Models\HomeServices;
use App\Models\Location;
use App\Models\PayWay;
use App\Models\Recharge;
use App\Models\User;
use Illuminate\Http\Request;


class HomeOrdersController extends Controller
{
    public function index()
    {
        $services = HomeServices::all();
        $areas = Location::all();

        if(!auth()->check())
        {
            return view('auth.login');
        }

        else{
            return view('site.index_home',
           ['services' => $services,
           'areas' => $areas,
          ]);
     }
    }

    public function create()
    {
            $services = HomeServices::all();
            $areas = Location::all();
   
           if(!auth()->check())
           {
            return view('auth.login');
            }

         else{
                return view('site.index_home',
                ['services' => $services,
                'areas' => $areas,

             ]); 
            }
    }

    public function store(Request $request)
    {
        $areaId = $request->location_id;
        if (is_numeric($areaId)) {
            // إذا كانت القيمة هي id
            $locationId = $areaId;
        } else {
            // إذا كانت القيمة هي اسم
            $locationId = Location::where('area', $areaId)->value('id');
        }

        $user = auth()->user();

        $validated = $request->validate([
            'typeOfHome' => 'required',
            'NumOfbulding' => 'required',
            'NumOfFloor' => 'required',
            // 'NumOfEmp' => 'required',
            'OrderDate' => 'required',
            'OrderTime'=>'required',
           'location_id' => 'required',
           // 'user_id' => 'required',
            'NumOfHour' => 'required',
            'cleanMaterial' => 'required',
        ]);

        $order = new HomeOrders(); 
        $order->typeOfHome = $request->typeOfHome;
        $order->NumOfbulding = $request->NumOfbulding;
        $order->NumOfFloor = $request->NumOfFloor;
        // $order->NumOfEmp = $request->NumOfEmp;
        $order->OrderDate = $request->OrderDate;
        $order->OrderTime = $request->OrderTime;
        $order->NumOfHour = $request->NumOfHour;
        $order->cleanMaterial = $request->cleanMaterial;

        $order->note = '';
        $order->location_id = $locationId;
        $order->user_id = $user->id;
        // $order->payWay_id = $request->payWay_id;
        $order->statuss = 'معلق';

        // return dd($order);

        $order->save();

        $order_ser = HomeOrders::where('user_id',$user->id)->latest()->first()->id;
        Home_Order_Services::create([
            'home_orders_id'=> $order_ser,
            'home_services_id'=> $request->service_id,
        ]);

        if($request->service_ids)
        {
            foreach($request->service_ids as $service)
            {
                $order_ser = HomeOrders::where('user_id',$user->id)->latest()->first()->id;

                Home_Order_Services::create([
                    'home_orders_id'=> $order_ser,
                    'home_services_id'=> $service,
                ]);
            }
        }

            // session()->flash('Add', 'تم تثبيت طلبك بنجاح');
            return redirect()->route('ord.home.summary');
     
    }

    public function summary()
    { 
         $user = auth()->user();
         $order = HomeOrders::where('user_id', $user->id)->latest()->first();
        
         $totalPrice = 0;
         $balance = $user->balance;

         $date = $order->OrderDate;
         $time = $order->OrderTime;
        
         // حساب القيمة الإجمالية لجميع الخدمات في الطلب
         $allServices = Home_Order_Services::where('home_orders_id', $order->id)->pluck('home_services_id');
    
         foreach ($allServices as $serviceId) {
            $service = HomeServices::find($serviceId);
            
            if ($service) {
                $totalPrice += $service->price;
            }
         }

        //  $mul = $order->NumOfEmp * $order->NumOfHour;
         $totalPrice = $totalPrice * $order->NumOfHour;
         if( $order->cleanMaterial == 1)
         {
            $totalPrice += 50000;
         }

         
        // إذا كان الرصيد أكبر من مبلغ الطلب يتم اقتطاع المبلغ من الرصيد
         if($balance >= $totalPrice){
            $balance = $balance - $totalPrice;
         }
         else {
            return back()->with("message", "لا يوجد رصيد كافٍ");
         }

         // تحديث قيمة totalPrice في الطلب الحالي
         HomeOrders::find($order->id)->update([
            'totalPrice' => $totalPrice,
          ]);

         // تحديث قيمة balance في الطلب الحالي
         User::find($user->id)->update([
            'balance' => $balance,
         ]);
    

            // تخزين في جدول recharge
            $recharge = new Recharge(); 
            $recharge->type = 'عقار';
            $recharge->amount = $totalPrice;
            $recharge->user_id = $user->id;
            $recharge->car_home_id = $order->id;
            $recharge->save();


            return view('site.summary_home', [
                'totalPrice' => $totalPrice,
                'OrderDate' => $date,
                'OrderTime' => $time,
            ]);
    }

    public function getPayway()
    {
        $pay = PayWay::all();

          return view('site.pay_home',compact('pay'));
     
    }
    
    public function setPayway(Request $request)
    {
        $user = auth()->user();
        $order = HomeOrders::where('user_id', $user->id)->latest()->first();
        $pay = PayWay::find($request->pay_id);
        
        $order->update([
            'payWay_id' => $pay->id,
        ]);

        //     session()->flash('Add', 'تم تثبيت طلبك بنجاح');
            return redirect('/'); 
    }


}
