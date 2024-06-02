<?php

namespace App\Http\Controllers;

use App\Models\BeforAfter;
use App\Models\Employee;
use App\Models\Home_Order_Services;
use App\Models\Location;
use App\Models\Order;
use App\Models\Service;
use App\Models\Order_Service;
use App\Models\Page;
use App\Models\PayWay;
use App\Models\Type;
use App\Models\HomeOrders;
use App\Models\HomeServices;
use Illuminate\Http\Request;

use Carbon\Carbon;
use DateTime;

class OrderController extends Controller
{
    // public function generation($href){
    //     $all_pinned_page = Page::first();
    //     $get_data = Page::where('href' , $href)->first();
    //     return view('site.index',compact('all_pinned_page','get_data'));
    
    //     // return view('site.index', compact('all_pinned_page','get_data'));
    //    }

    public function index()
    {
        // $all_pinned_page = Page::all();
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
           'types' => $types,
        //    'all_pinned_page'=>$all_pinned_page
          ]);
     }
    }
    


    public function create()
    {
            $services = Service::all();
            $areas = Location::all();
            $types = Type::all();
            // $all_pinned_page = Page::all();
          
           if(!auth()->check())
           {
            return view('auth.login');
            }

         else{
                return view('site.index',
                ['services' => $services,
                'areas' => $areas,
                'types' => $types,
        //    'all_pinned_page'=>$all_pinned_page

             ]); 
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
    


   //---------- functions for admin ----------

    public function getDoneOrders()
    { 
        // $order = Order::where('orderDate', '<', now())->get();
        // $order->each(function ($ord) {
        //     $ord->status = 'منجز';
        //     $ord->save();
        // });

        $orders = Order::where('status','منجز')->orderBy('created_at','DESC')->paginate(50);
        $orders_home = HomeOrders::where('statuss','منجز')->orderBy('created_at','DESC')->paginate(50);

        // $dataCount = Order::get()->count();
        // $paginationLinks = $orders->withQueryString()->links('pagination::bootstrap-4'); 
        
        return view('admin.orders.done', [
        'orders' => $orders,
        'orders_home'=>$orders_home
        // 'dataCount'=>$dataCount,
        // 'paginationLinks' => $paginationLinks
        ]);
    }



    public function getWaitingOrders()
    { 
        $orders = Order::where('status','قيد الإنجاز')->orderBy('updated_at','DESC')->paginate(50);
        $orders_home = HomeOrders::where('statuss','قيد الإنجاز')->orderBy('created_at','DESC')->paginate(50);

        // $dataCount = Order::get()->count();
        // $paginationLinks = $orders->withQueryString()->links('pagination::bootstrap-4'); 
        
        return view('admin.orders.waiting', [
        'orders' => $orders,
        'orders_home'=>$orders_home,
        // 'dataCount'=>$dataCount,
        // 'paginationLinks' => $paginationLinks
        ]);
    }



    public function getPendingOrders()
    {
        $orders = Order::where('status','معلق')->whereNull('employee_id')->orderBy('created_at','DESC')->paginate(50);
        // $dataCount = Order::get()->count();
        // $paginationLinks = $orders->withQueryString()->links('pagination::bootstrap-4'); 
        
        $orders_home = HomeOrders::where('statuss','معلق')->whereNull('employee_id')->orderBy('created_at','DESC')->paginate(50);
        // $dataCount = HomeOrders::get()->count();
        // $paginationLinks = $orders_home->withQueryString()->links('pagination::bootstrap-4'); 
        
        return view('admin.orders.pend', [
        'orders' => $orders,
        'orders_home' => $orders_home,

        // 'dataCount'=>$dataCount,
        // 'paginationLinks' => $paginationLinks
        ]);
    }



    public function getCanceledOrders()
    { 
        $orders = Order::where('status','مرفوض')->orderBy('updated_at','DESC')->paginate(50);
        $orders_home = HomeOrders::where('statuss','مرفوض')->orderBy('created_at','DESC')->paginate(50);

        // $dataCount = Order::get()->count();
        // $paginationLinks = $orders->withQueryString()->links('pagination::bootstrap-4'); 
        
        return view('admin.orders.cancel', [
        'orders' => $orders,
        'orders_home'=>$orders_home,
        // 'dataCount'=>$dataCount,
        // 'paginationLinks' => $paginationLinks
        ]);
    }



    public function getCanceledOrdersByEmp()
    { 
        $orders = Order::where('status','مرفوض من قبل الموظف')->orderBy('updated_at','DESC')->paginate(50);
        $orders_home = HomeOrders::where('statuss','مرفوض من قبل الموظف')->orderBy('created_at','DESC')->paginate(50);

        // $dataCount = Order::get()->count();
        // $paginationLinks = $orders->withQueryString()->links('pagination::bootstrap-4'); 
        
        return view('admin.orders.cancel_from_emp', [
        'orders' => $orders,
        'orders_home'=>$orders_home
        // 'dataCount'=>$dataCount,
        // 'paginationLinks' => $paginationLinks
        ]);
    }



    public function updatePenddingToWaiting($id)
    {
       $orders = Order::findOrFail($id);
       if($orders)
       {
        $orders->status = 'قيد الإنجاز';
        $orders->update();
       }
     else
     {
        $orders = HomeOrders::findOrFail($id);
        $orders->statuss = 'قيد الإنجاز';
        $orders->update();
     }
        
       session()->flash('Edit', 'تم  قبول الطلب بنجاح');
       return redirect('acceptedFromEmp');
    }



    public function updatePenddingToCanceled(Request $request,$id)
    {
        $orders = Order::findOrFail($id);
        if($orders)
        {
            $orders->status = 'مرفوض';
            $orders->note = $request->note;
            $orders->update();
        }
        else
        {
            $orders = HomeOrders::findOrFail($id);
            $orders->statuss = 'مرفوض';
            $orders->note = $request->note;
            $orders->update();
        }
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
        $orders = Order::find($orderId);

        if($orders)
        {
            $LocationId = Order::where('id',$orderId)->value('location_id');
            $LocationArea = Location::where('id',$LocationId)->value('area');
            $employees = Employee::where('area',$LocationArea)->where('status','accepted')->where('typeOfWork','سيارة')->orderBy('updated_at','DESC')->paginate(50);
        }
        else
        {
            $orders = HomeOrders::find($orderId);
            $LocationId = HomeOrders::where('id',$orderId)->value('location_id');
            $LocationArea = Location::where('id',$LocationId)->value('area');
            $employees = Employee::where('area',$LocationArea)->where('status','accepted')->where('typeOfWork','عقار')->orderBy('updated_at','DESC')->paginate(50);
        }
        // $dataCount = Employee::get()->count();
        // $paginationLinks = $employees->withQueryString()->links('pagination::bootstrap-4'); 
        
        return view('admin.orders.emp_area', [
        'employees' => $employees,
        'orders' => $orders,

        // 'dataCount'=>$dataCount,
        // 'paginationLinks' => $paginationLinks
        ]);
    }



    public function waitingForEmp() {

        $orders = Order::whereNotNull('employee_id')->where('status','معلق')->orderBy('updated_at','DESC')->paginate(50);
        $orders_home = HomeOrders::whereNotNull('employee_id')->where('statuss','معلق')->orderBy('created_at','DESC')->paginate(50);

        // $dataCount = Order::get()->count();
        // $paginationLinks = $orders->withQueryString()->links('pagination::bootstrap-4'); 
        
        return view('admin.orders.waiting_for_emp', [
        'orders' => $orders,
        'orders_home'=>$orders_home
        // 'dataCount'=>$dataCount,
        // 'paginationLinks' => $paginationLinks
        ]);
    }



    public function seedOrderToEmp(Request $request, $orderId) {
        $employeeId = $request->input('employee_id');
        
        if ($employeeId) {
            $order = Order::find($orderId);
            if($order)
            {
                $order->employee_id = $employeeId;
                $order->note = '';
                $order->status = 'معلق';
                $order->update(); 
            }
            else
            {
                $order = HomeOrders::find($orderId);
                $order->employee_id = $employeeId;
                $order->note = '';
                $order->statuss = 'معلق';
                $order->update();
            }
    
            session()->flash('Edit', 'تم اختيار الموظف بنجاح');
            return redirect()->route('ord.pend');
            // return view('admin.orders.pend');
        } 
        else {
            session()->flash('Edit',  'يرجى اختيار موظف أولاً');
            return redirect()->back();
        }
    }



    public function getOrderDetails($id)
    {
        $order = Order::findOrFail($id);
        if($order)
        {
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
        }
        else
        {
            $order = HomeOrders::findOrFail($id);
            $serviceOrder = Home_Order_Services::where('order_id', $id)->pluck('home_services_id')->toArray();
        
            $primary=[];
            $sec = [];
            
            foreach ($serviceOrder as $service) {
                $primary[] = HomeServices::where('id', $service)->where('type', 'أساسية')->value('name');
                $sec[] = HomeServices::where('id', $service)->where('type', 'إضافية')->value('name');
            }
        
            //  $empOrd = Order::where('id', $id)->value('employee_id');
            //  $employee = Employee::where('id', $empOrd)->get();
            $beforeImage = BeforAfter::where('home_orders_id', $id)->value('beforeImage');
            $afterImage = BeforAfter::where('home_orders_id', $id)->value('afterImage');
        }
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
        if($order)
        {
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
        }
        else
        {
           $order = HomeOrders::findOrFail($id);
           $serviceOrder = Home_Order_Services::where('order_id', $id)->pluck('home_services_id')->toArray();
        
            $primary=[];
            $sec = [];
            
            foreach ($serviceOrder as $service) {
                $primary[] = HomeServices::where('id', $service)->where('type', 'أساسية')->value('name');
                $sec[] = HomeServices::where('id', $service)->where('type', 'إضافية')->value('name');
            }
        
            //  $empOrd = Order::where('id', $id)->value('employee_id');
            //  $employee = Employee::where('id', $empOrd)->get();
            $beforeImage = BeforAfter::where('home_orders_id', $id)->value('beforeImage');
            $afterImage = BeforAfter::where('home_orders_id', $id)->value('afterImage');
        }

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