<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BeforAfterController;
use App\Http\Controllers\PayWayController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('site.home');
});


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
    Route::get('show_wait', [OrderController::class, 'getWaitingOrders'])->name('ord.wait');
    Route::get('show_pend', [OrderController::class, 'getPendingOrders'])->name('ord.pend');
    Route::get('show_cancel', [OrderController::class, 'getCanceledOrders'])->name('ord.cancel');

    Route::post('updatePenddingToWaiting/{id}', [OrderController::class, 'updatePenddingToWaiting'])->name('ord.updatePenddingToWaiting');
    Route::post('updatePenddingToCanceled/{id}', [OrderController::class, 'updatePenddingToCanceled'])->name('ord.updatePenddingToCanceled');

  });

  Route::get('admin_add', [OrderController::class, 'create']);
  Route::post('admin_save_order', [OrderController::class, 'store'])->name('admin_ord.save');
  
  Route::get('admin_summary', [OrderController::class, 'summary'])->name('admin_ord.summary');
  Route::get('admin_pay', [OrderController::class, 'getPayway'])->name('admin_ord.pay');
  Route::post('admin_set_pay', [OrderController::class, 'setPayway'])->name('admin_ord.setPay');


  //service
Route:: prefix('service')->group(function () {

    Route::get('show', [ServiceController::class, 'index'])->name('service.show');
    Route::get('add', [ServiceController::class, 'create']);
    Route::post('save', [ServiceController::class, 'store'])->name('service.save');
    Route::get('edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::post('update/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('delete/{id}', [ServiceController::class, 'destroy'])->name('service.delete');
  });

    //user
Route:: prefix('user')->group(function () {

    Route::get('show', [UserController::class, 'index'])->name('user.show');
    Route::get('add', [UserController::class, 'create']);
    Route::post('save', [UserController::class, 'store'])->name('user.save');
    Route::delete('delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
  });

    //employee
Route:: prefix('employee')->group(function () {

    //for admin
    Route::get('showAccepted', [EmployeeController::class, 'getAcceptedEmp'])->name('employee.accepted');
    Route::get('showCanceled', [EmployeeController::class, 'getCanceledEmp'])->name('employee.canceled');
    Route::get('showPending', [EmployeeController::class, 'getPendingEmp'])->name('employee.pending');

    
    Route::post('updatePenddingToAccepted/{id}', [EmployeeController::class, 'updatePenddingToAccepted'])->name('employee.updateAccepted');
    Route::post('updatePenddingToCanceled/{id}', [EmployeeController::class, 'updatePenddingToCanceled'])->name('employee.updateCanceled');


    Route::get('addForAdmin', [EmployeeController::class, 'createForAdmin']);
    Route::post('saveForAdmin', [EmployeeController::class, 'storeForAdmin'])->name('employee.save');
    Route::get('edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('delete/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete');

  
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

    Route::get('add', [OrderController::class, 'create']);
    Route::post('save_order', [OrderController::class, 'store'])->name('ord.save');
    Route::get('summary', [OrderController::class, 'summary'])->name('ord.summary');

    Route::get('pay', [OrderController::class, 'getPayway'])->name('ord.pay');
    Route::post('set_pay', [OrderController::class, 'setPayway'])->name('ord.setPay');
    
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

require __DIR__.'/auth.php';
