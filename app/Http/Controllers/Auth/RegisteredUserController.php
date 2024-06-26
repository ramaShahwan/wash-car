<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Employee;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
       $val= $request->validate([
           'name' => ['required', 'string', 'max:255'],
           'phone' => ['required', 'string', 'max:10', 'min:10' ,'unique:users,phone'],
          //  'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
          // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
          'password' => ['required', 'confirmed']
        ]);
        
        $user = User::create([
          'name' => $request->name,
          // 'email' => $request->email,
           'phone' => $request->phone,
           'password' => Hash::make($request->password),
       ]);

     $num =  $user->phone;
     $value = Employee::where('phone',$num)->where('status','accepted')->first();
   //   return dd($value);
     if($value)
     {
     User::where('phone', $num)->update(['role' => 'employee']);
     }
     event(new Registered($user));

     Auth::login($user);

     return redirect(RouteServiceProvider::HOME);

    }
}
