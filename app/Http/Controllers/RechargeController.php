<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\HomeOrders;
use App\Models\Order;
use App\Models\Recharge;
use App\Models\User;
use Illuminate\Http\Request;

class RechargeController extends Controller
{

    public function index()
    {
        $financial = Recharge::where('type', 'شحن')->orderBy('created_at','DESC')->paginate(50);
        $dataCount = Recharge::get()->count();
        $paginationLinks = $financial->withQueryString()->links('pagination::bootstrap-4'); 

        return view('admin.financial.show', [
         'financial' => $financial,
         'dataCount'=>$dataCount,
         'paginationLinks' => $paginationLinks,
        ]);
    }


    public function create()
    {
      return view('admin.users.show');
    }


    public function store(Request $request)
    {
        $users = User::orderBy('created_at','DESC')->paginate(50);
        $admin = auth()->user()->name;   
        $paginationLinks = $users->withQueryString()->links('pagination::bootstrap-4'); 

        $validated = $request->validate([
            'amount' => 'required',
        ]);
        
        $recharge = new Recharge(); 
        $recharge->type = 'شحن';
        $recharge->amount = $request->amount;
        $recharge->user_id = $request->user_id;
        $recharge->admin_who_added = $admin;    // لمعرفة من قام بإضافة رصيد إلى المستخدم
        $recharge->save();


        // إضافة amount إلى رصيد المستخدم balance
        $user = User::find($request->user_id);
        $balance = $user->balance;
        $amount = $recharge->amount;
        $balance = $balance + $amount;
        
        $user->update([
            'balance' => $balance,
        ]);

        session()->flash('Add', 'تم شحن الرصيد بنجاح');
        return back()->with('users', 'paginationLinks');
    }


    // إظهار جميع عمليات السحب لجميع المستخدمين
    public function decrease()
    {
            $users = User::all(); // استرجاع جميع المستخدمين
            $orders_details = [];
            $orders_home_details = [];


                // عرض عمليات السحب في حال طلبات المستخدمين (سيارة أو عقار) 
                foreach ($users as $user) {
                    $userId = $user->id; // الوصول إلى id لكل مستخدم
    
                    $userOrders = Order::where('user_id', $userId)
                    ->where('status', 'منجز')
                    ->orderBy('created_at', 'DESC')
                    ->get()
                    ->toArray(); // تحويل النتائج إلى مصفوفة
                
                    $userHomeOrders = HomeOrders::where('user_id', $userId)
                    ->where('statuss', 'منجز')
                    ->orderBy('created_at', 'DESC')
                    ->get()
                    ->toArray(); // تحويل النتائج إلى مصفوفة
                
                    $orders_details = array_merge($orders_details, $userOrders);
                    $orders_home_details = array_merge($orders_home_details, $userHomeOrders);
                    
                    // تحويل المصفوفات إلى مجموعة من الكائنات
                    $orders_details = collect($orders_details)->map(function ($item) {
                        return (object) $item;
                    })->all();
                    
                    $orders_home_details = collect($orders_home_details)->map(function ($item) {
                        return (object) $item;
                    })->all();
                }

                // عرض عمليات السحب في حال قام المستخدمون بالسحب من الرصيد (سحب) 
                $financial = Recharge::where('type', 'سحب')->orwhere('type', 'سيارة')->orwhere('type', 'عقار')->orderBy('created_at','DESC')->get();

        return view('admin.financial.decrease', compact('financial', 'orders_details', 'orders_home_details'));
    }


}
