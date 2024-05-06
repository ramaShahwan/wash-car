<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Location;
use App\Models\Order;
use App\Models\Service;
use App\Models\Order_Service;
use App\Models\PayWay;
use App\Models\Type;
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
         $areas = Location::all();
         $types = Type::all();

        return view('admin.site.index',
        ['services' => $services,
        'areas' => $areas,
        'types' => $types
       ]);
        }

        else if(auth()->user()->role == "user") {
          
        $services = Service::all();
         $areas = Location::all();
         $types = Type::all();
          
        return view('site.index',
        ['services' => $services,
        'areas' => $areas,
        'types' => $types
      ]);
        }
      
    }
    
    public function create()
    {
        $services = Service::all();
        $areas = Location::all();
        $types = Type::all();

        if(auth()->user()->role == "admin") {
            
            return view('admin.site.index',
            ['services' => $services,
            'areas' => $areas,
            'types' => $types ]);}

        elseif(auth()->user()->role == "user") {

            return view('site.index',
            ['services' => $services,
            'areas' => $areas,
            'types' => $types ]);
        }
    }


    public function store(Request $request)
    {
        $areaId = $request->location_id;
    // return dd($areaId);
        if (is_numeric($areaId)) {
            // إذا كانت القيمة هي id
            $locationId = $areaId;
        } else {
            // إذا كانت القيمة هي اسم
            $locationId = Location::where('area', $areaId)->value('id');
        }

        // dd($request->all());

        
        // return dd($locationId);

        $user = auth()->user();
        $validated = $request->validate([
            'typeOfCar' => 'required',
            'sizeOfCar' => 'required',
            'numOfCar' => 'required|max:6|min:6',
          //  'totalPrice' => 'required',
            'orderDate' => 'required',
          //  'location_id' => 'required',
           // 'user_id' => 'required',
           // 'payWay_id' => 'required',
            'orderTime'=>'required'
        ]);

        $order = new Order(); 
        $order->typeOfCar = $request->typeOfCar;
        $order->sizeOfCar = $request->sizeOfCar;
        $order->numOfCar = $request->numOfCar;
        $order->totalPrice = $request->totalPrice;
        $order->orderDate = $request->orderDate;
        $order->orderTime = $request->orderTime;
        $order->note = '';
        $order->location_id = $locationId;
        $order->user_id = $user->id;
        $order->payWay_id = $request->payWay_id;
        $order->status = 'معلق';
        

        $order->save();

        $order_ser = Order::where('user_id',$user->id)->latest()->first()->id;
        Order_Service::create([
            'order_id'=> $order_ser,
            'service_id'=> $request->service_id,
        ]);

        if($request->service_ids)
        {
            foreach($request->service_ids as $service)
            {
                $order_ser = Order::where('user_id',$user->id)->latest()->first()->id;

                Order_Service::create([
                    'order_id'=> $order_ser,
                    'service_id'=> $service,
                ]);
            }
        }

        // session()->flash('Add', 'تم تثبيت طلبك بنجاح');

        if(auth()->user()->role == "admin")
        {
            // session()->flash('Add', 'تم تثبيت طلبك بنجاح');
            return redirect()->route('admin_ord.summary');
        }

        elseif(auth()->user()->role == "user")
        {
            // session()->flash('Add', 'تم تسجيل طلبك سيتم التواصل معك في أقرب وقت');
            return redirect()->route('ord.summary');
        }
    }


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

    if(auth()->user()->role == "admin") {

        return view('admin.site.summary', [
            'totalPrice' => $totalPrice,
            'orderDate' => $date,
            'orderTime' => $time,
        ]);
    }

    elseif(auth()->user()->role == "user") {

        return view('site.summary', [
            'totalPrice' => $totalPrice,
            'orderDate' => $date,
            'orderTime' => $time,
        ]);
    }
  }


    public function getPayway()
    {
        $pay = PayWay::all();
      if(auth()->user()->role == "admin") {
            return view('admin.site.pay',compact('pay'));
            }
     elseif(auth()->user()->role == "user") {
        return view('site.pay',compact('pay'));
            }
    }
    
    public function setPayway(Request $request)
    {
        $user = auth()->user();
        $order = Order::where('user_id', $user->id)->latest()->first();
        $pay = PayWay::find($request->pay_id);
        
        $order->update([
            'payWay_id' => $pay->id,
        ]);

        if(auth()->user()->role == "admin") {

            session()->flash('Add', 'تم تثبيت طلبك بنجاح');
            return redirect('/'); 
        }

        elseif(auth()->user()->role == "user") {
            
            session()->flash('Add', 'تم تسجيل طلبك سيتم التواصل معك في أقرب وقت');
            // return view('site.home'); 
            return redirect('/'); 
        }
    }
    
  //functions for admin
    // public function getDoneOrders()
    // { 
    //     $ord = Order::where('orderDate', '<', now())->get();
    //     $ord->status = 'منجز';
    //     $ord->update();

    //     $orders = Order::where('status','منجز')->orderBy('created_at','Asc')->get();
    //     return view('admin.orders.done',compact('orders'));
    // }
    public function getDoneOrders()
   { 
    $order = Order::where('orderDate', '<', now())->get();
    $order->each(function ($ord) {
        $ord->status = 'منجز';
        $ord->save();
    });

    $orders = Order::where('status','منجز')->orderBy('created_at','Asc')->get();
    return view('admin.orders.done',compact('orders'));
}

    public function getWaitingOrders()
    { 
        $orders = Order::where('status','قيد الإنجاز')->orderBy('created_at','Asc')->get();
        return view('admin.orders.waiting',compact('orders'));
    }

    public function getPendingOrders()
    { 
        $orders = Order::where('status','معلق')->orderBy('created_at','Asc')->get();
        return view('admin.orders.pend',compact('orders'));
    }

    public function getCanceledOrders()
    { 
         $orders = Order::where('status','مرفوض')->orderBy('created_at','Asc')->get();
         return view('admin.orders.cancel',compact('orders'));
    }

    public function updatePenddingToWaiting($id)
    {
       $orders = Order::findOrFail($id);
       $orders->status = 'قيد الإنجاز';
       $orders->update();

        session()->flash('Edit', 'تم  قبول الطلب بنجاح');
        return back();
    }

    public function updatePenddingToCanceled(Request $request,$id)
    {

       $orders = Order::findOrFail($id);
       $orders->status = 'مرفوض';
       $orders->note = $request->note;
        $orders->update();

        session()->flash('delete', 'تم  رفض الطلب بنجاح');
        return back();
    }

    public function updateWaitingToDone()
    {
       $orders = Order::where('orderDate', '<', now())->get();
       $orders->status = 'منجز';
       $orders->update();

    }

    public function searchByArea(Request $request)
    {
    $searchTerm = $request->input('search_area');
    $request->session()->put('search_area', $searchTerm);
    $areas =  Location::where('area', 'like', '%'.$searchTerm.'%')->orderBy('area', 'Asc');
    return view('site.index', compact('areas'));
    }

    public function chooseEmp($orderId)
    {
        $LocationId = Order::where('id',$orderId)->value('location_id');
        $LocationArea = Location::where('id',$LocationId)->value('area');
        $employees = Employee::where('area',$LocationArea)->where('status','accepted')->get();
      return view('admin.orders.emp_area',compact('employees', 'orderId'));
    }

    public function seedOrderToEmp(Request $request,$orderId)
    {
        $empId = $request->id;
        $order = Order::findOrFail($orderId);
        $order->employee_id = $empId;
        $order->status = 'قيد الإنجاز';
        $order->update();

        session()->flash('Edit', 'تم  قبول الطلب بنجاح');
        return redirect()->route('ord.pend');
    }

    public function getOrderDetails($id)
    {
        $order = Order::findOrFail($id)->all();
        $serviceOrder = Order_Service::where('order_id',$id)->get('service_id');

        if($serviceOrder)
        {
            foreach($serviceOrder as $service)
            {
          $primary = Service::where('id',$serviceOrder)->where('type','أساسية')->value('name');
            $sec = Service::where('id',$serviceOrder)->where('type','إضافية')->value('name');
            }
        }
        return view('admin.orders.details',compact('order','primary','sec'));
    }

}


