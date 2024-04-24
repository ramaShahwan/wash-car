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



Route::get('/admin_index', function () {
    return view('admin.index');
});



// Admin Routes
Route::middleware(['auth', 'verified', 'admin'])->group(function () {


//payway
Route:: prefix('pay')->group(function () {

    Route::get('show', [PayWayController::class, 'index'])->name('pay.show');
    Route::get('add', [PayWayController::class, 'create']);
    Route::post('save', [PayWayController::class, 'store'])->name('pay.save');
    Route::get('edit/{id}', [PayWayController::class, 'edit'])->name('pay.edit');
    Route::post('update/{id}', [PayWayController::class, 'update'])->name('pay.update');
    Route::delete('delete/{id}', [PayWayController::class, 'destroy'])->name('pay.delete');
  });

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

    Route::get('show', [EmployeeController::class, 'index'])->name('employee.show');
    Route::get('add', [EmployeeController::class, 'create']);
    Route::post('save', [EmployeeController::class, 'store'])->name('employee.save');
    Route::get('edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('delete/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete');
  });

});



// User Routes
Route::middleware(['auth', 'verified', 'user'])->group(function () {

    Route::get('/index', [OrderController::class, 'create']);
    
    Route::get('add_emp', [EmployeeController::class, 'create']);
    Route::post('save', [EmployeeController::class, '   store'])->name('emp.save');

    // Route::get('show', [OrderController::class, 'index']);
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



require __DIR__.'/auth.php';
