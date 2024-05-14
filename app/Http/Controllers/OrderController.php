<?php

namespace App\Http\Controllers;

use App\Models\BeforAfter;
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
        $services = Service::all();
        $areas = Location::all();
        $types = Type::all();

        if(!auth()->check())
        {
            return view('auth.login');
        }

        else{
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

            
            return view('site.index',
            ['services' => $services,
            'areas' => $areas,
            'types' => $types ]);
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
            return redirect()->route('ord.summary');
     
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
    
    public function setPayway(Request $request)
    {
        $user = auth()->user();
        $order = Order::where('user_id', $user->id)->latest()->first();
        $pay = PayWay::find($request->pay_id);
        
        $order->update([
            'payWay_id' => $pay->id,
        ]);

        //     session()->flash('Add', 'تم تثبيت طلبك بنجاح');
            return redirect('/'); 
   
    }
    
   //functions for admin

    public function getDoneOrders()
    { 
        // $order = Order::where('orderDate', '<', now())->get();
        // $order->each(function ($ord) {
        //     $ord->status = 'منجز';
        //     $ord->save();
        // });

        $orders = Order::where('status','منجز')->orderBy('created_at','Asc')->get();
        return view('admin.orders.done',compact('orders'));
    }

    public function getWaitingOrders()
    { 
        $orders = Order::where('status','قيد الإنجاز')->orderBy('updated_at','Asc')->get();
        return view('admin.orders.waiting',compact('orders'));
    }

    public function getPendingOrders()
    { 
        $orders = Order::where('status','معلق')->whereNull('employee_id')->orderBy('created_at','Asc')->get();
        return view('admin.orders.pend',compact('orders'));
    }

    public function getCanceledOrders()
    { 
        $orders = Order::where('status','مرفوض')->orderBy('updated_at','Asc')->get();
        return view('admin.orders.cancel',compact('orders'));
    }

    public function getCanceledOrdersByEmp()
    { 
        $orders = Order::where('status','مرفوض من قبل الموظف')->orderBy('updated_at','Asc')->get();
        return view('admin.orders.cancel_from_emp',compact('orders'));
    }

    public function updatePenddingToWaiting($id)
    {
       $orders = Order::findOrFail($id);
       $orders->status = 'قيد الإنجاز';
       $orders->update();
        session()->flash('Edit', 'تم  قبول الطلب بنجاح');
        return redirect('acceptedFromEmp');
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

    // public function updateWaitingToDone()
    // {
    //    $orders = Order::where('orderDate', '<', now())->get();
    //    $orders->status = 'منجز';
    //    $orders->update();
    // }

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

        // return dd($employees);
        return view('admin.orders.emp_area',compact('employees', 'orderId'));
    }

    public function waitingForEmp() {

        $orders = Order::whereNotNull('employee_id')->where('status','معلق')->get();

        return view('admin.orders.waiting_for_emp',compact('orders'));
    }



    public function seedOrderToEmp(Request $request, $orderId) {
        $employeeId = $request->input('employee_id');
    
        if ($employeeId) {
            $order = Order::findOrFail($orderId);
            $order->employee_id = $employeeId;
            $order->note = '';
            $order->status = 'معلق';
            $order->update();
    
            session()->flash('Edit', 'تم اختيار الموظف بنجاح');
            return redirect()->route('ord.pend');
        } else {
            session()->flash('Edit',  'يرجى اختيار موظف أولاً');
            return redirect()->back();
        }
    }


    public function getOrderDetails($id)
    {
        $order = Order::findOrFail($id);
        $serviceOrder = Order_Service::where('order_id', $id)->pluck('service_id')->toArray();
        
        $primary=[];
        $sec = [];
        
        foreach ($serviceOrder as $service) {
            $primary[] = Service::where('id', $service)->where('type', 'أساسية')->value('name');
            $sec[] = Service::where('id', $service)->where('type', 'إضافية')->value('name');
        }
    
        //  $empOrd = Order::where('id', $id)->value('employee_id');
        //  $employee = Employee::where('id', $empOrd)->get();
        $beforeImage = BeforAfter::where('order_id', $id)->value('beforeImage');
        $afterImage = BeforAfter::where('order_id', $id)->value('afterImage');
        if(auth()->user()->role == "admin") {
        return view('admin.orders.details', compact('order', 'primary', 'sec', 'beforeImage', 'afterImage'));
         }

         elseif(auth()->user()->role == "employee") {
            return view('employee.orders.pend_details', compact('order', 'primary', 'sec', 'beforeImage', 'afterImage'));
             }
    
         
    }


    public function getAcceptOrderDetails($id)
    {
        $order = Order::findOrFail($id);
        $serviceOrder = Order_Service::where('order_id', $id)->pluck('service_id')->toArray();
        
        $primary=[] ;
        $sec = [];
        foreach ($serviceOrder as $service) {
            $primary[] = Service::where('id', $service)->where('type', 'أساسية')->value('name');
            $sec[] = Service::where('id', $service)->where('type', 'إضافية')->value('name');
        }
    
        //  $empOrd = Order::where('id', $id)->value('employee_id');
        //  $employee = Employee::where('id', $empOrd)->get();
        $beforeImage = BeforAfter::where('order_id', $id)->value('beforeImage');
        $afterImage = BeforAfter::where('order_id', $id)->value('afterImage');
     
         if(auth()->user()->role == "employee") {
            return view('employee.orders.accept_details', compact('order', 'primary', 'sec', 'beforeImage', 'afterImage'));
            }
    
         
    }

    
    public function destroy( $id)
    {
      $orders = Order_Service::where('order_id',$id)->get();
      foreach($orders as $order)
      {
       $order->delete();
      }
      Order::findOrFail($id)->delete();
      session()->flash('delete', 'تم حذف الطلب بنجاح');
      return back();
    }
          

}