<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BeforAfterController;
use App\Http\Controllers\PayWayController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Searchajax;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::post('/clear-session', function () {
    session()->forget('Add');
    return response()->json(['message' => 'Session Cleared']);
});


Route::get('/', function () {
    return view('site.home');
})->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/index', [OrderController::class, 'create']);


// Admin Routes
Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    // Route::get('/index', [OrderController::class, 'create']);

    Route::get('/admin', function () {
        return view('admin.index');
    });

   //settings
   Route::get('getSetting', [SettingController::class, 'getSetting'])->name('settings.show');
//    Route::get('getSettingForFooter', [SettingController::class, 'getSettingForFooter'])->name('settings.footer');
   Route::post('setSettings', [SettingController::class, 'setSettings'])->name('settings.set');

   
   
    Route::get('searchSites/', [Searchajax::class, 'liveAjaxSearch'])->name('live_search.action');


// Pinned Pages
Route:: prefix('pages')->group(function () {

    Route::get('show', [PageController::class, 'index'])->name('page.show');
    Route::get('add', [PageController::class, 'create']);
    Route::post('save', [PageController::class, 'store'])->name('page.save');
    Route::get('edit/{id}', [PageController::class, 'edit'])->name('page.edit');
    Route::post('update/{id}', [PageController::class, 'update'])->name('page.update');
    Route::delete('delete/{id}', [PageController::class, 'destroy'])->name('page.delete');

});


//payway
Route:: prefix('pay')->group(function () {

    Route::get('show', [PayWayController::class, 'index'])->name('pay.show');
    Route::get('add', [PayWayController::class, 'create']);
    Route::post('save', [PayWayController::class, 'store'])->name('pay.save');
    Route::get('edit/{id}', [PayWayController::class, 'edit'])->name('pay.edit');
    Route::post('update/{id}', [PayWayController::class, 'update'])->name('pay.update');
    Route::delete('delete/{id}', [PayWayController::class, 'destroy'])->name('pay.delete');
});


//order
Route:: prefix('order')->group(function () {

    Route::get('show_done', [OrderController::class, 'getDoneOrders'])->name('ord.done');
    
    Route::get('show_details/{id}', [OrderController::class, 'getOrderDetails'])->name('ord.details');
    Route::get('show_wait', [OrderController::class, 'getWaitingOrders'])->name('ord.wait');
    Route::get('show_pend', [OrderController::class, 'getPendingOrders'])->name('ord.pend');
    Route::get('show_cancel', [OrderController::class, 'getCanceledOrders'])->name('ord.cancel');
    Route::get('waitingForEmp', [OrderController::class, 'waitingForEmp'])->name('ord.waitingForEmp');

    // Route::post('updatePenddingToWaiting/{id}', [OrderController::class, 'updatePenddingToWaiting'])->name('ord.updatePenddingToWaiting');
    Route::post('updatePenddingToCanceled/{id}', [OrderController::class, 'updatePenddingToCanceled'])->name('ord.updatePenddingToCanceled');


    Route::post('chooseEmp/{id}', [OrderController::class, 'chooseEmp'])->name('ord.chooseEmp');
    Route::post('seedOrderToEmp/{id}', [OrderController::class, 'seedOrderToEmp'])->name('ord.seedOrderToEmp');

    Route::delete('delete/{id}', [OrderController::class, 'destroy'])->name('ord.delete');

    Route::get('canceledFormEmp', [OrderController::class, 'getCanceledOrdersByEmp'])->name('ord.canceledFormEmp');

});


//   Route::get('admin_add', [OrderController::class, 'create']);
//   Route::post('admin_save_order', [OrderController::class, 'store'])->name('admin_ord.save');
  
//   Route::get('admin_summary', [OrderController::class, 'summary'])->name('admin_ord.summary');
//   Route::get('admin_pay', [OrderController::class, 'getPayway'])->name('admin_ord.pay');
//   Route::post('admin_set_pay', [OrderController::class, 'setPayway'])->name('admin_ord.setPay');


  //service
Route:: prefix('service')->group(function () {

    Route::get('show', [ServiceController::class, 'index'])->name('service.show');
    Route::get('add', [ServiceController::class, 'create']);
    Route::post('save', [ServiceController::class, 'store'])->name('service.save');
    Route::get('edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::post('update/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('delete/{id}', [ServiceController::class, 'destroy'])->name('service.delete');
});

   //location
Route:: prefix('location')->group(function () {

    Route::get('show', [LocationController::class, 'index'])->name('location.show');
    Route::get('add', [LocationController::class, 'create']);
    Route::post('save', [LocationController::class, 'store'])->name('location.save');
    Route::get('edit/{id}', [LocationController::class, 'edit'])->name('location.edit');
    Route::post('update/{id}', [LocationController::class, 'update'])->name('location.update');
    Route::delete('delete/{id}', [LocationController::class, 'destroy'])->name('location.delete');
});

   //type
Route:: prefix('type')->group(function () {

    Route::get('show', [TypeController::class, 'index'])->name('type.show');
    Route::get('add', [TypeController::class, 'create']);
    Route::post('save', [TypeController::class, 'store'])->name('type.save');
    Route::get('edit/{id}', [TypeController::class, 'edit'])->name('type.edit');
    Route::post('update/{id}', [TypeController::class, 'update'])->name('type.update');
    Route::delete('delete/{id}', [TypeController::class, 'destroy'])->name('type.delete');
});

    //user
Route:: prefix('user')->group(function () {

    Route::get('show', [UserController::class, 'index'])->name('user.show');
    Route::get('add', [UserController::class, 'create']);
    Route::post('save', [UserController::class, 'store'])->name('user.save');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
});

    //employee
Route:: prefix('employee')->group(function () {

    //for admin
    Route::get('showAccepted', [EmployeeController::class, 'getAcceptedEmp'])->name('employee.accepted');
    Route::get('showCanceled', [EmployeeController::class, 'getCanceledEmp'])->name('employee.canceled');
    Route::get('showPending', [EmployeeController::class, 'getPendingEmp'])->name('employee.pending');
    Route::get('showDetails/{id}', [EmployeeController::class, 'getPendingEmpDetailes'])->name('employee.detailes');


    Route::post('updatePenddingToAccepted/{id}', [EmployeeController::class, 'updatePenddingToAccepted'])->name('employee.updateAccepted');
    Route::post('updatePenddingToCanceled/{id}', [EmployeeController::class, 'updatePenddingToCanceled'])->name('employee.updateCanceled');

    Route::get('addForAdmin', [EmployeeController::class, 'createForAdmin']);
    Route::post('saveForAdmin', [EmployeeController::class, 'storeForAdmin'])->name('employee.save');
    Route::get('edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('delete/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete');
    
    Route::get('showCount/{id}', [EmployeeController::class, 'showCount'])->name('employee.showCount');
    
});


    //beforAfter
Route:: prefix('beforAfter')->group(function () {

    Route::get('show', [BeforAfterController::class, 'index'])->name('beforAfter.show');
    Route::get('add', [BeforAfterController::class, 'create']);
    Route::post('save', [BeforAfterController::class, 'store'])->name('beforAfter.save');
    // Route::get('edit/{id}', [BeforAfterController::class, 'edit'])->name('beforAfter.edit');

    Route::get('editAfter/{id}', [BeforAfterController::class, 'editAfter'])->name('after.edit');
    Route::get('editBefore/{id}', [BeforAfterController::class, 'editBefore'])->name('before.edit');
    Route::post('updateBefore/{id}', [BeforAfterController::class, 'updateBefore'])->name('before.update');
    Route::post('updateAfter/{id}', [BeforAfterController::class, 'updateAfter'])->name('after.update');
    Route::delete('deleteBefore/{id}', [BeforAfterController::class, 'destroyBefore'])->name('before.delete');
    Route::delete('deleteAfter/{id}', [BeforAfterController::class, 'destroyAfter'])->name('after.delete');

});

});



// User Routes
Route::middleware(['auth', 'verified', 'user'])->group(function () {

//     Route::get('add', [OrderController::class, 'create']);
//     Route::post('save_order', [OrderController::class, 'store'])->name('ord.save');
//     Route::get('summary', [OrderController::class, 'summary'])->name('ord.summary');
//    // Route::get('getArea', [LocationController::class, 'show'])->name('getArea.show');

//     Route::get('pay', [OrderController::class, 'getPayway'])->name('ord.pay');
//     Route::post('set_pay', [OrderController::class, 'setPayway'])->name('ord.setPay');
    
});



// employee Routes
Route::middleware(['auth', 'verified', 'employee'])->group(function () {
    
    Route::get('/employee', function () {
        return view('employee.index');
    });

    Route::get('get_orders', [EmployeeController::class, 'GetMyOrders'])->name('ord.get');
    Route::post('open/{id}', [EmployeeController::class, 'openToUpload'])->name('ord.upload');

    
    Route::post('image_orders/{id}', [EmployeeController::class, 'uploadOrderImage'])->name('ord.image');
    
    Route::get('myGallery', [EmployeeController::class, 'myGallery'])->name('ord.gallery');

    // Route::get('emp_add', [OrderController::class, 'create']);
    // Route::post('emp_save_order', [OrderController::class, 'store'])->name('emp_ord.save');
    // Route::get('emp_summary', [OrderController::class, 'summary'])->name('emp_ord.summary');

    // Route::get('emp_pay', [OrderController::class, 'getPayway'])->name('emp_ord.pay');
    // Route::post('emp_set_pay', [OrderController::class, 'setPayway'])->name('emp_ord.setPay');

    Route::get('acceptedFromEmp', [EmployeeController::class, 'acceptedFromEmp'])->name('emp_ord.accepted');
    Route::get('doneFromEmp', [EmployeeController::class, 'doneFromEmp'])->name('emp_ord.done');
    
    Route::get('pend_details/{id}', [OrderController::class, 'getOrderDetails'])->name('emp_ord.pend_details');
    Route::get('accept_details/{id}', [OrderController::class, 'getAcceptOrderDetails'])->name('emp_ord.accept_details');

    Route::post('cancel_order/{id}', [EmployeeController::class, 'cancelByEmp'])->name('emp_ord.cancel');

    
    Route::post('updatePenddingToWaiting/{id}', [OrderController::class, 'updatePenddingToWaiting'])->name('ord.updatePenddingToWaiting');
});



Route::get('get_img', [BeforAfterController::class, 'show']);

Route::get('/services', function () {
    return view('site.services');
});

Route::get('/about_us', function () {
    return view('site.about_us');
});

Route::get('add_emp', [EmployeeController::class, 'create']);
Route::post('save', [EmployeeController::class, 'store'])->name('emp.save');



Route::get('add_order', [OrderController::class, 'create']);
Route::post('save_order', [OrderController::class, 'store'])->name('ord.save');

Route::get('summary', [OrderController::class, 'summary'])->name('ord.summary');
Route::get('pay', [OrderController::class, 'getPayway'])->name('ord.pay');
Route::post('set_pay', [OrderController::class, 'setPayway'])->name('ord.setPay');

Route::get('pages/{href}', [PageController::class, 'generation'])->name('page.generation');


Route::get('pages/{href}', [PageController::class, 'generation'])->name('page.generation');



// Route::get('/{any}', function() {
//     return redirect('/');
//   })->where('any', '.*');


require __DIR__.'/auth.php';
