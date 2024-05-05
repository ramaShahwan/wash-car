<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    { 
         $users = User::orderBy('created_at','Asc')->get();
         return view('admin.users.show',compact('users'));
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

    public function destroy( $id)
    {
      User::findOrFail($id)->delete();
      session()->flash('delete', 'تم حذف المستخدم بنجاح');
      return back();
    }
}
