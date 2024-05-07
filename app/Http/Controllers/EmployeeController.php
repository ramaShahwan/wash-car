<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Location;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    public function getAcceptedEmp()
    { 
      $employees = Employee::where('status','accepted')->orderBy('created_at','Asc')->get();
      return view('admin.employees.accept',compact('employees'));
    }

    public function getCanceledEmp()
    { 
      $employees = Employee::where('status','canceled')->orderBy('created_at','Asc')->get();
      return view('admin.employees.cancel',compact('employees'));
    }

    public function getPendingEmp()
    { 
      $employees = Employee::where('status','Pending')->orderBy('created_at','Asc')->get();
      return view('admin.employees.pend',compact('employees'));
    }

    public function create()
    {
      $areas = Location::all();
      return view('join',compact('areas'));
    }
    
    public function createForAdmin()
    {
      $areas = Location::all();
      return view('admin.employees.add',compact('areas'));
    }

    public function storeForAdmin(  Request $request)
    {
      $validated = $request->validate([
        'firstName' => 'required',
        'lastName' => 'required',
        'birthDate'=>'required',
        'Gender'=>'required',
        'phone'=>'required',
        'area'=>'required',

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
        $emp->role = 'employee';
        $emp->note  = $request->note;
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

    public function store(  Request $request)
    {
      $validated = $request->validate([
        'firstName' => 'required',
        'lastName' => 'required',
        'birthDate'=>'required',
        'Gender'=>'required',
        'phone'=>'required',
        'area'=>'required',
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
        $emp->role = 'employee';
        $emp->note  = $request->note;
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

    public function edit( $id)
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
       $emp->role = 'employee';
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

    public function updatePenddingToCanceled(Request $request,$id)
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
      Employee::findOrFail($id)->delete();
      session()->flash('delete', 'تم حذف الموظف بنجاح');
      return back();
    }

    public function GetMyOrders()
    {
      $results[] = DB::table('order_service')
        ->join('orders', 'orders.id', 'order_service.order_id')
        ->join('services', 'services.id', 'order_service.service_id')
        ->select('services.name','services.type')
        ->get();

     if (auth()->user()->role == 'employee')
     {
      $id = auth()->user()->id;
      $orders = Order::where('employee_id',$id)->where('status','قيد الإنجاز')->get();
      return view('employee.orders.order_to_work',compact('orders','results'));
    }
  
  }

}
