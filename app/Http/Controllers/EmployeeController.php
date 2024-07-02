<?php

namespace App\Http\Controllers;

use App\Models\BeforAfter;
use App\Models\Employee;
use App\Models\HomeOrders;
use App\Models\Location;
use App\Models\Order;
use App\Models\Order_Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 

class EmployeeController extends Controller
{

    public function getAcceptedEmp()
    { 
      $employees = Employee::where('status','accepted')->orderBy('created_at','DESC')->paginate(50);
      $dataCount = Employee::get()->count();
      $paginationLinks = $employees->withQueryString()->links('pagination::bootstrap-4'); 

      return view('admin.employees.accept', [
          'employees' => $employees,
          'dataCount'=>$dataCount,
          'paginationLinks' => $paginationLinks
      ]);
    }



    public function getCanceledEmp()
    { 
      $employees = Employee::where('status','canceled')->orderBy('created_at','DESC')->paginate(50);
      $dataCount = Employee::get()->count();
      $paginationLinks = $employees->withQueryString()->links('pagination::bootstrap-4'); 

      return view('admin.employees.cancel', [
          'employees' => $employees,
          'dataCount'=>$dataCount,
          'paginationLinks' => $paginationLinks
      ]);
    }


    public function getPendingEmp()
    { 
      $employees = Employee::where('status','Pending')->orderBy('created_at','DESC')->paginate(50);
      $dataCount = Employee::get()->count();
      $paginationLinks = $employees->withQueryString()->links('pagination::bootstrap-4'); 

      return view('admin.employees.pend', [
          'employees' => $employees,
          'dataCount'=>$dataCount,
          'paginationLinks' => $paginationLinks
      ]);
    }


    public function getPendingEmpDetailes($id)
    { 
      $employees = Employee::where('id',$id)->where('status','Pending')->orderBy('created_at','Asc')->get();
      return view('admin.employees.details',compact('employees'));
    }


    public function create()
    {
      $areas = Location::all();
      return view('site.join',compact('areas'));
    }
    

    public function createForAdmin()
    {
      $areas = Location::all();
      return view('admin.employees.add',compact('areas'));
    }


    public function storeForAdmin(Request $request)
    {
      $validated = $request->validate([
        'firstName' => 'required',
        'lastName' => 'required',
        'birthDate'=>'required',
        'Gender'=>'required',
        'phone'=>'required',
        'area'=>'required',
        'typeOfWork'=>'required',

        //  'aboutYou'=>'required',
        // 'image'=>'required'
      ]);

        $emp = new Employee(); 
        $emp->firstName = $request->firstName;
        $emp->lastName  = $request->lastName;
        $emp->birthDate = $request->birthDate;
        $emp->Gender  = $request->Gender;
        $emp->phone = $request->phone;
        $emp->aboutYou  = $request->aboutYou;
        $emp->area  = $request->area;
        $emp->status = 'accepted';
        $emp->note  = $request->note;
        $emp->typeOfWork  = $request->typeOfWork;
        $emp->save();

        // store image
       if($request->hasFile('image')){
        $newImage = $request->file('image');
        //for change image name
        $newImageName = 'image_' . $emp->id . '.' . $newImage->getClientOriginalExtension();
        $newImage->move(public_path('site/img/emp/'), $newImageName);

       $emp->image = $newImageName;
       $emp->update();
     }

      session()->flash('Add', 'تم إضافة الموظف بنجاح');
      return redirect()->route('employee.accepted');
    }



    public function store(Request $request)
    {
      $validated = $request->validate([
        'firstName' => 'required',
        'lastName' => 'required',
        'birthDate'=>'required',
        'Gender'=>'required',
        'phone'=>'required',
        'area'=>'required',
        'typeOfWork'=>'required',

        //  'aboutYou'=>'required',
        // 'image'=>'required'
      ]);

        $emp = new Employee(); 
        $emp->firstName = $request->firstName;
        $emp->lastName  = $request->lastName;
        $emp->birthDate = $request->birthDate;
        $emp->Gender  = $request->Gender;
        $emp->phone = $request->phone;
        $emp->aboutYou  = $request->aboutYou;
        $emp->area  = $request->area;
        $emp->status = 'Pending';
        $emp->note  = $request->note;
        $emp->typeOfWork  = $request->typeOfWork;
        $emp->save();

        // store image
       if($request->hasFile('image')){
        $newImage = $request->file('image');
        //for change image name
        $newImageName = 'image_' . $emp->id . '.' . $newImage->getClientOriginalExtension();
        $newImage->move(public_path('site/img/emp/'), $newImageName);

       $emp->image = $newImageName;
       $emp->update();
     }

      session()->flash('Add', 'تم إرسال طلب توظيفك سيتم التواصل معك في أقرب وقت');
        return back();
    }



    public function edit($id)
    {
     $emp = Employee::findOrFail($id);
     $areas = Location::all();
     return view('admin.employees.edit',compact('emp','areas'));
    }



    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'birthDate'=>'required',
            'Gender'=>'required',
            'phone'=>'required',
            'area'=>'required',
           // 'aboutYou'=>'required',
           // 'image'=>'required'
        ]);

       $emp = Employee::findOrFail($id);
       $oldImageName=$emp->image;
       $emp->firstName = $request->firstName;
       $emp->lastName  = $request->lastName;
       $emp->birthDate = $request->birthDate;
       $emp->Gender  = $request->Gender;
       $emp->phone = $request->phone;
       $emp->aboutYou  = $request->aboutYou;
       $emp->area  = $request->area;
       $emp->status = 'accepted';
       $emp->note  = $request->note;
  
     // update newImage
      if ($request->hasFile('image')) {
      // Delete the old image from the server
      if ($oldImageName) {
         File::delete(public_path('site/img/emp/') . $oldImageName);
      }
      // Upload new image
      $newImage = $request->file('image');
      $newImageName = 'image_' . $emp->id . '.' . $newImage->getClientOriginalExtension();
      $newImage->move('site/img/emp/', $newImageName);
  
      // Update the image record with the new image name
      $emp->image = $newImageName;
      }
      
      $emp->update();
  
      session()->flash('Edit', 'تم تعديل الموظف بنجاح');
      //   return back();
      return redirect()->route('employee.accepted');
    }



    public function updatePenddingToAccepted($id)
    {
      $emp = Employee::findOrFail($id);
      $emp->status = 'accepted';
      $emp->update();

      $phoneNumber=$emp->phone;
      User::where('phone', $phoneNumber)->update(['role' => 'employee']);
      session()->flash('Edit', 'تم  قبول الموظف بنجاح');
      return back();
    }



    public function updatePenddingToCanceled(Request $request, $id)
    {
      $emp = Employee::findOrFail($id);
      $emp->status = 'canceled';
      $emp->note = $request->note;
      $emp->update();

      session()->flash('delete', 'تم  رفض الموظف بنجاح');
      return back();
    }



    public function destroy($id)
    {
     $orders = Order::where('employee_id',$id)->get();
     foreach($orders as $order)
     {
      $order->employee_id = null;
      $order->update();
     }

      Employee::findOrFail($id)->delete();
      session()->flash('delete', 'تم حذف الموظف بنجاح');
      return back();
    }



    public function GetMyOrders()
  {
    // $results = [];
    $id = auth()->user()->id;
    if (auth()->user()->role == 'employee') {
        $emp_num = User::where('id', $id)->value('phone');
        $emp_id = Employee::where('phone', $emp_num)->value('id');

        // $serviceIdsArray = [];
        // foreach($order as $ord){
        //     $serviceIds = Order_Service::where('order_id', $ord->id)->pluck('service_id');
        //     $serviceIdsArray[] = $serviceIds;
        // }


       // Retrieve orders related to the employee
        $orders = Order::where('employee_id', $emp_id)->where('status', 'معلق')->orderBy('created_at','DESC')->paginate(50);
        $dataCount = Order::get()->count();
        $paginationLinks = $orders->withQueryString()->links('pagination::bootstrap-4'); 

        return view('employee.orders.order_to_work', [
          'orders' => $orders,
          'dataCount'=>$dataCount,
          'paginationLinks' => $paginationLinks
      ]);
    }
  }



  public function openToUpload($orderId)
  {
    $order = Order::findOrFail($orderId);
    return view('employee.orders.upload_img',compact('order'));
  }



  public function uploadOrderImage(Request $request, $orderId)
  {
    $validated = $request->validate([
      'beforeImage' => 'required',
      'afterImage' => 'required',
   ]);

    $id = auth()->user()->id;
    $emp_num = User::where('id',$id)->value('phone');
    $emp_id = Employee::where('phone',$emp_num)->value('id');


    $images = new BeforAfter(); 
    $images->employee_id =$emp_id;
    $images->order_id =$orderId;
    $images->save();


    //store before image
      $newBeforeImage = $request->file('beforeImage');
    //for change image name
      $newBeforeImageName = 'beforeImage_' .$images->id. '.' . $newBeforeImage->getClientOriginalExtension();
      $newBeforeImage->move(public_path('site/img/gallery/'), $newBeforeImageName);
      $images->beforeImage = $newBeforeImageName;     


    //store after image
      $newAfterImage = $request->file('afterImage');
    //for change image name
      $newAfterImageName = 'afterImage_' .$images->id. '.' . $newAfterImage->getClientOriginalExtension();
      $newAfterImage->move(public_path('site/img/gallery/'), $newAfterImageName);
      $images->afterImage = $newAfterImageName;    
    
    
    $images->update();
    session()->flash('Add', 'تم إضافة الصور بنجاح');
   
    $order = Order::where('id',$orderId)->first();
    $order->status = 'منجز';
    $order->update();

   return redirect()->route('ord.get');
  }
    


  public function myGallery()
  {
    $id = auth()->user()->id;
    $emp_num = User::where('id',$id)->value('phone');
    $emp_id = Employee::where('phone',$emp_num)->value('id');

    $gallery = BeforAfter::where('employee_id',$emp_id)->orderBy('created_at','DESC')->paginate(50);
    $dataCount = BeforAfter::get()->count();
    $paginationLinks = $gallery->withQueryString()->links('pagination::bootstrap-4'); 
   
    return view('employee.before_after.show', [
      'gallery' => $gallery,
      'dataCount'=>$dataCount,
      'paginationLinks' => $paginationLinks
    ]);
  }



  public function acceptedFromEmp()
  {
    // $results[] = DB::table('order_service')
    // ->join('orders', 'orders.id', 'order_service.order_id')
    // ->join('services', 'services.id', 'order_service.service_id')
    // ->select('services.name','services.type')
    // ->get();

    if (auth()->user()->role == 'employee')
    {
      $id = auth()->user()->id;
      $emp_num = User::where('id',$id)->value('phone');
      $emp_id = Employee::where('phone',$emp_num)->value('id');
    
      $employee = Employee::find($emp_id);

      $orders = Order::where('employee_id',$emp_id)->where('status','قيد الإنجاز')->orderBy('created_at','DESC')->paginate(50);
      // $dataCount = Order::get()->count();

      $orders_home = HomeOrders::where('employee_id',$emp_id)->where('statuss','قيد الإنجاز')->orderBy('created_at','DESC')->paginate(50);
      // $dataCount = HomeOrders::get()->count();

      // $paginationLinks = $orders->withQueryString()->links('pagination::bootstrap-4'); 
      

      return view('employee.orders.accept', [
        'orders' => $orders,
        'orders_home' => $orders_home,
        'employee' => $employee,

        // 'dataCount'=>$dataCount,
        // 'paginationLinks' => $paginationLinks
      ]);
    }
  }



  public function doneFromEmp()
  {
    if (auth()->user()->role == 'employee')
    {
      $id = auth()->user()->id;
      $emp_num = User::where('id',$id)->value('phone');
      $emp_id = Employee::where('phone',$emp_num)->value('id');

      $employee = Employee::find($emp_id);

      $orders = Order::where('employee_id',$emp_id)->where('status','منجز')->orderBy('created_at','DESC')->paginate(50);
      // $dataCount = Order::get()->count();
      // $paginationLinks = $orders->withQueryString()->links('pagination::bootstrap-4'); 

      $orders_home = HomeOrders::where('employee_id',$emp_id)->where('statuss','قيد الإنجاز')->orderBy('created_at','DESC')->paginate(50);

      foreach($orders as $order){
        $totalPrice = $order->totalPrice;
      }

      $balance = auth()->user()->balance;
      $balance = $balance + $totalPrice;


      // تحديث قيمة balance في الطلب الحالي
      User::find($id)->update([
        'balance' => $balance,
      ]);


      return view('employee.orders.done', [
        'orders' => $orders,
        'orders_home' => $orders_home,
        'employee' => $employee,

        // 'dataCount'=>$dataCount,
        // 'paginationLinks' => $paginationLinks,
      ]);
    }
  }


  //  public function cancelByEmp(Request $request,$id)
  //  {
  //  if (auth()->user()->role == 'employee')
  //   {
  //   $id = auth()->user()->id;
  //   $emp_num = User::where('id',$id)->value('phone');
  //   $emp_id = Employee::where('phone',$emp_num)->value('id');
  //   $order = Order::where('employee_id',$emp_id)->where('id',$id)->first();
  //   $order->status ='مرفوض من قبل الموظف';
  //   $order->note =$request->note;
  //   $order->update();
  //   return back();
  //   }
  //  }


  public function cancelByEmp(Request $request, $orderId)
  {
      if (auth()->user()->role == 'employee')
      {
          $userId = auth()->user()->id;
          $emp_num = User::where('id', $userId)->value('phone');
          $emp_id = Employee::where('phone', $emp_num)->value('id');
          $order = Order::where('employee_id', $emp_id)->where('id', $orderId)->first();
          // return dd($order);
  
          if ($order) {
              $order->status ='مرفوض من قبل الموظف';
              $order->note = $request->note;
              $order->update();
          }
  
          return redirect('get_orders');
      }
  }



  public function showCount($id) 
  {
    $doneOrders = Order::where('employee_id', $id)->where('status','منجز')->count();
    $pendOrders = Order::where('employee_id', $id)->where('status','معلق')->count();
    $waitOrders = Order::where('employee_id', $id)->where('status','قيد الإنجاز')->count();
    $canceledOrders = Order::where('employee_id', $id)->where('status','مرفوض من قبل الموظف')->count();
    
    $total =Order::where('employee_id', $id)->where('status','منجز')->sum('totalPrice');
    $emp_name = Employee::where('id', $id)->first();
    
    return view('admin.employees.show_count' , compact('doneOrders','pendOrders','waitOrders','canceledOrders','total', 'emp_name'));
  }



  // purchases in dashboard
  public function GetMyPend()
  {
    $id = auth()->user()->id;

    $orders = Order::where('user_id', $id)->where('status', 'معلق')->orderBy('created_at','DESC')->paginate(50);
    $orders_home = HomeOrders::where('user_id', $id)->where('statuss', 'معلق')->orderBy('created_at','DESC')->paginate(50);
      
    if (auth()->user()->role == 'employee') {
      return view('employee.purchases.pend', [
        'orders' => $orders,
        'orders_home' => $orders_home,
      ]);
    }

  }

  public function GetMyAccept()
  {
    $id = auth()->user()->id;

    $orders = Order::where('user_id', $id)->where('status', 'قيد الإنجاز')->orderBy('created_at','DESC')->paginate(50);
    $orders_home = HomeOrders::where('user_id', $id)->where('statuss', 'قيد الإنجاز')->orderBy('created_at','DESC')->paginate(50);

      if (auth()->user()->role == 'employee') {
        return view('employee.purchases.accept', [
          'orders' => $orders,
          'orders_home' => $orders_home,
      ]);
    }
  }

  public function GetMyDone()
  {
    $id = auth()->user()->id;

    $orders = Order::where('user_id', $id)->where('status', 'منجز')->orderBy('created_at','DESC')->paginate(50);
    $orders_home = HomeOrders::where('user_id', $id)->where('statuss', 'منجز')->orderBy('created_at','DESC')->paginate(50);

    if (auth()->user()->role == 'employee') {
      return view('employee.purchases.done', [
        'orders' => $orders,
        'orders_home' => $orders_home,
      ]);
    }
  }

  public function GetMyCancel()
  {
    $id = auth()->user()->id;

      // $emp_num = User::where('id', $id)->value('phone');
      // $emp_id = Employee::where('phone', $emp_num)->value('id');

      // cancel purchases related to the employee
      $orders = Order::where('user_id', $id)->where('status', 'مرفوض')->orderBy('created_at','DESC')->paginate(50);
      $orders_home = HomeOrders::where('user_id', $id)->where('statuss', 'مرفوض')->orderBy('created_at','DESC')->paginate(50);

      // $dataCount = Order::get()->count();
      // $paginationLinks = $orders->withQueryString()->links('pagination::bootstrap-4');

      if (auth()->user()->role == 'employee') {
        return view('employee.purchases.cancel', [
          'orders' => $orders,
          'orders_home' => $orders_home,

          // 'dataCount'=>$dataCount,
          // 'paginationLinks' => $paginationLinks
      ]);
    }
  } 



  // purchases in site
  public function all_purchases(Request $request){

    $id = auth()->user()->id;
    $status = $request->status ?? []; 

    if ($status) {
    $orders = Order::where('user_id', $id)->whereIn('status', $status)->orderBy('created_at','DESC')->paginate(50);
    $orders_home = HomeOrders::where('user_id', $id)->whereIn('statuss', $status)->orderBy('created_at','DESC')->paginate(50);
    } 
    else {
      $orders = null;
      $orders_home = null;
    }

    if(auth()->user()){
      return view('site.profile.purchases', [
        'orders' => $orders,
        'orders_home' => $orders_home,
        'status' => $status,
      ]);
    } 
  }


  public function purchases(Request $request){

    $results_order = Order::query();
    $results_home = HomeOrders::query();

    $id = auth()->user()->id;
    $status = $request->status ?? []; 

    
    if ($status) {
    $orders = Order::where('user_id', $id)->whereIn('status', $status)->orderBy('created_at','DESC')->paginate(50);
    $orders_home = HomeOrders::where('user_id', $id)->whereIn('statuss', $status)->orderBy('created_at','DESC')->paginate(50);
    }
    else {
      $orders = Order::where('user_id', $id)->orderBy('created_at','DESC')->paginate(50);
      $orders_home = HomeOrders::where('user_id', $id)->orderBy('created_at','DESC')->paginate(50);
    }

    if(auth()->user()){
      return view('site.profile.purchases', [
        'orders' => $orders,
        'orders_home' => $orders_home,
        'status' => $status,
      ]);
    } 

  }



  }
