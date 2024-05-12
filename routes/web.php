<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\MasterLotController;
use App\Http\Controllers\Admin\LotNoController;
use App\Http\Controllers\Admin\WebsiteController;
use App\Http\Controllers\Admin\MasterSizeController;
use App\Http\Controllers\Admin\MasterColorController;
use App\Http\Controllers\Admin\MasterWorkerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomeController::class, 'login'])->name('new_login');
Route::get('/lot_activity_delete', [HomeController::class, 'lot_activity_delete'])->name('lot_activity_delete');
Route::post('edit_profile/insert', [HomeController::class, 'edit_profile_insert'])->name('edit_profile.insert');
Route::get('edit_profile/', [HomeController::class, 'edit_profile'])->name('edit_profile');
Route::get('/get_worker', [AjaxController::class, 'get_worker'])->name('get_worker');
Route::get('/get_worker_price', [AjaxController::class, 'get_worker_price'])->name('get_worker_price');
Route::get('/get_master_lot_details', [AjaxController::class, 'get_master_lot_details'])->name('get_master_lot_details');

Auth::routes();

// ___________________________ Admin Route ____________________________
Route::group(['middleware' => ['auth','is_Admin']], function () {
    Route::prefix('admin')->group(function () {
        
        // Website Setting
        Route::get('website-setting', [WebsiteController::class, 'index'])->name('website.setting');
        Route::post('website-setting/insert', [WebsiteController::class, 'insert'])->name('website.setting.insert');

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    });
    // Size
    Route::get('master/size', [MasterSizeController::class, 'index'])->name('master.size.index');
    Route::get('master/size/datatable', [MasterSizeController::class, 'datatable'])->name('master.size.datatable');
    Route::post('master/size/insert', [MasterSizeController::class, 'insert'])->name('master.size.insert');
    Route::get('master/size/edit/{id}', [MasterSizeController::class, 'edit'])->name('master.size.edit');
    Route::get('master/size/delete/{id}', [MasterSizeController::class, 'delete'])->name('master.size.delete');
    Route::get('master/size/status/{id}', [MasterSizeController::class, 'status'])->name('master.size.status');
    // Color
    Route::get('master/color', [MasterColorController::class, 'index'])->name('master.color.index');
    Route::get('master/color/datatable', [MasterColorController::class, 'datatable'])->name('master.color.datatable');
    Route::post('master/color/insert', [MasterColorController::class, 'insert'])->name('master.color.insert');
    Route::get('master/color/edit/{id}', [MasterColorController::class, 'edit'])->name('master.color.edit');
    Route::get('master/color/delete/{id}', [MasterColorController::class, 'delete'])->name('master.color.delete');
    Route::get('master/color/status/{id}', [MasterColorController::class, 'status'])->name('master.color.status');
    // Worker
    Route::get('master/worker', [MasterWorkerController::class, 'index'])->name('master.worker.index');
    Route::get('master/worker/datatable', [MasterWorkerController::class, 'datatable'])->name('master.worker.datatable');
    Route::post('master/worker/insert', [MasterWorkerController::class, 'insert'])->name('master.worker.insert');
    Route::get('master/worker/edit/{id}', [MasterWorkerController::class, 'edit'])->name('master.worker.edit');
    Route::get('master/worker/delete/{id}', [MasterWorkerController::class, 'delete'])->name('master.worker.delete');
    Route::get('master/worker/status/{id}', [MasterWorkerController::class, 'status'])->name('master.worker.status');
    // Master Lot
    Route::get('master/master_lot', [MasterLotController::class, 'index'])->name('master.master_lot.index');
    Route::get('master/master_lot/datatable', [MasterLotController::class, 'datatable'])->name('master.master_lot.datatable');
    Route::post('master/master_lot/insert', [MasterLotController::class, 'insert'])->name('master.master_lot.insert');
    Route::get('master/master_lot/edit/{id}', [MasterLotController::class, 'edit'])->name('master.master_lot.edit');
    Route::get('master/master_lot/delete/{id}', [MasterLotController::class, 'delete'])->name('master.master_lot.delete');
    Route::get('master/master_lot/status/{id}', [MasterLotController::class, 'status'])->name('master.master_lot.status');
});

// ___________________________ Admin & User Route ____________________________
Route::group(['middleware' => ['auth','is_User']], function () {
   // LotNo
   Route::get('lot_no', [LotNoController::class, 'index'])->name('lot_no.index');
   Route::get('lot_no/datatable', [LotNoController::class, 'datatable'])->name('lot_no.datatable');
   Route::post('lot_no/insert', [LotNoController::class, 'insert'])->name('lot_no.insert');
   Route::get('lot_no/edit/{id}', [LotNoController::class, 'edit'])->name('lot_no.edit');
   Route::get('lot_no/delete/{id}', [LotNoController::class, 'delete'])->name('lot_no.delete');
   Route::get('lot_no/show/{id}', [LotNoController::class, 'show'])->name('lot_no.show');
   Route::get('lot_no/activity', [LotNoController::class, 'activity'])->name('lot_no.activity');
   Route::post('lot_no/activity_insert', [LotNoController::class, 'activity_insert'])->name('lot_no.activity_insert');
   Route::post('lot_no/multiple_delete', [LotNoController::class, 'multiple_delete'])->name('lot_no.multiple_delete');

   // Worker Salary
   Route::get('worker_salary', [MasterWorkerController::class, 'worker_salary'])->name('worker_salary.index');
   Route::get('worker_salary/datatable', [MasterWorkerController::class, 'worker_salary_datatable'])->name('worker_salary.datatable');
   Route::get('worker_salary/show/{worker_id}', [MasterWorkerController::class, 'worker_salary_show'])->name('worker_salary.show');
});