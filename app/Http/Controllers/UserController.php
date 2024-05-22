<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
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
        ]);

        $user= User::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'password'=>$request->password,
            'role'=>$request->role,
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
        ]);
      $user = User::findOrFail($id);
  
      $user->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'password'=>$request->password,
            'role'=>$request->role,
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


    public function destroy( $id)
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
}
