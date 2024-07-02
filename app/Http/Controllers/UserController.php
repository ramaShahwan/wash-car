<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Employee;
use App\Models\HomeOrders;
use App\Models\Order;
use App\Models\Recharge;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    { 
      $users = User::orderBy('created_at','DESC')->paginate(50);
     $dataCount = User::get()->count();
     $paginationLinks = $users->withQueryString()->links('pagination::bootstrap-4'); 

     return view('admin.users.show', [
      'users' => $users,
      'dataCount'=>$dataCount,
      'paginationLinks' => $paginationLinks
    ]);
    }

    public function create()
    {
      return view('admin.users.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users|max:10' ,
            'password' => 'required',
            'role' => 'required',
            'balance' => 'required',
        ]);

        $user= User::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'password'=>$request->password,
            'role'=>$request->role,
            'balance'=>$request->balance,
        ]);

        session()->flash('Add', 'تم إضافة المستخدم بنجاح');
        // return back();
        return redirect()->route('user.show');

    }

    public function edit( $id)
    {
      $user = User::findOrFail($id);
      return view('admin.users.edit',compact('user'));
    }
   
     
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required' ,
            'password' => 'required',
            'role' => 'required',
            'balance' => 'required',
        ]);
      $user = User::findOrFail($id);
  
      $user->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'password'=>$request->password,
            'role'=>$request->role,
            'balance'=>$request->balance,
      ]);
      session()->flash('Edit', 'تم تعديل المستخدم بنجاح');
       return redirect()->route('user.show');
    }

    
    public function destroyProfile(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        $orders = Order::where('user_id',$user->id)->get();
        foreach($orders as $order)
        {
         $order->delete();
        }
        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('auth.register');
      }


    public function destroy($id)
    {
      $orders = Order::where('user_id',$id)->get();
      foreach($orders as $order)
      {
       $order->delete();
      }
      User::findOrFail($id)->delete();
      session()->flash('delete', 'تم حذف المستخدم بنجاح');
      return back();
    }


    public function edit_profile($id)
    {
      $id = auth()->user()->id;
      $user = User::findOrFail($id);
      return view('site.profile.edit_profile',compact('user'));
    }


    public function update_profile(Request $request, $id)
    {
      $validated = $request->validate([
        'name' => 'required',
        'phone' => 'required' ,
        // 'password' => 'required',
        // 'role' => 'required',
        'balance' => 'required',
      ]);

      $id = auth()->user()->id;
      $user = User::findOrFail($id);
  
      $user->update([
        'name'=>$request->name,
        'phone'=>$request->phone,
        // 'password'=>$request->password,
        // 'role'=>$request->role,
        'balance'=>$request->balance,
      ]);

      return back()->with("message", "تم تعديل بياناتك بنجاح");
    }


    public function balance(){

      $id = auth()->user()->id;
      $balance = auth()->user()->balance;
      $orders = Order::where('user_id',$id)->get();
      $orders_home = HomeOrders::where('user_id',$id)->get();

      $total = 0;
      $emp_total = 0;

      $balance_details = Recharge::where('user_id', $id)->orderBy('created_at','DESC')->get();


      // // تفاصيل السحب من الرصيد
      // $orders_details = Order::where('user_id',$id)->where('status','منجز')->orderBy('created_at','DESC')->get();
      // $orders_home_details = HomeOrders::where('user_id',$id)->where('statuss','منجز')->orderBy('created_at','DESC')->get();

      // // تفاصيل الإيداع في الرصيد
      // $recharge = Recharge::where('user_id',$id)->get();
      // // $user = User::find($request->user_id);
    

      foreach($orders as $order)
      {
        $totalPrice = $order->totalPrice;
        $total += $totalPrice;
      }

      foreach($orders_home as $home)
      {
        $totalPrice = $home->totalPrice;
        $total += $totalPrice;
      }
      

      if (auth()->user()->role == 'employee')
      {
        $emp_num = User::where('id',$id)->value('phone');
        $emp_id = Employee::where('phone',$emp_num)->value('id');

        $emp_orders = Order::where('employee_id',$emp_id)->where('status','منجز')->orderBy('created_at','DESC')->get();
        $emp_home = HomeOrders::where('employee_id',$emp_id)->where('statuss','منجز')->orderBy('created_at','DESC')->get();

        foreach($emp_orders as $ord){
          $totalPrice = $ord->totalPrice;
          $emp_total += $totalPrice;
        }

        foreach($emp_home as $ord_home){
          $totalPrice = $ord_home->totalPrice;
          $emp_total += $totalPrice;
        }
      }

      return view('site.profile.balance', compact('balance_details', 'balance', 'total', 'emp_total'));
    }


    public function pull_balance(Request $request)
    {
      $user = auth()->user(); // الحصول على كائن المستخدم
      $balance = $user->balance; // الحصول على الرصيد الحالي

      $amount = $request->balance;

      // قم بتحديث الرصيد بناءً على المبلغ المراد سحبه
      if($balance >= $amount){
        $balance -= $amount;
      }
      else {
        return back()->with("error", "لا يتوفر هذا المبلغ في رصيدك");
      }

      // حفظ الرصيد المحدث في قاعدة البيانات
      $user->balance = $balance;
      $user->save();

      $recharge = new Recharge(); 
      $recharge->type = 'سحب';
      $recharge->amount = $amount;
      $recharge->user_id = $user->id;
      $recharge->save();

      
      return back()->with("message", "تم سحب الرصيد بنجاح");
    }


    public function details($id)
    {
      $user = User::where('id',$id)->first();
      $details = Recharge::where('user_id', $id)->orderBy('created_at','DESC')->get();
      
      return view('admin.users.details',compact('user', 'details'));
    }


  
}
