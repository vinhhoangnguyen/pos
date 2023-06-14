<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\SalaryController;


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
    return view('welcome');
});

// Admin Home Index Page = /dashboard
Route::get('/dashboard', function () {
    return view('backend.admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    //Admin
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'AdminProfile')->name('admin.profile');
        Route::post('/admin/profile', 'AdminProfileStore')->name('admin.profile.store');
        Route::get('/admin/change/password', 'PasswordChange')->name('password.change');
        Route::post('/admin/update/password', 'PasswordUpdate')->name('password.update');
    });

    //Employee
    Route::controller(EmployeeController::class)->group(function () {
        Route::get('/all/employee', 'AllEmployee')->name('all.employee');
        Route::get('/add/employee', 'AddEmployee')->name('add.employee');
        Route::post('/store/employee', 'StoreEmployee')->name('store.employee');
        Route::get('/edit/employee/{id}', 'EditEmployee')->name('edit.employee');
        Route::post('/update/employee', 'UpdateEmployee')->name('update.employee');
        Route::get('/delete/employee/{id}', 'DeleteEmployee')->name('delete.employee');

        //Ajax load View Detail Employee
        Route::get('/employee/view/modal/{id}', 'employeeViewAjax')->name('viewDetail.employee');

    });

    //Customer
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/all/customer', 'AllCustomer')->name('all.customer');
        Route::get('/add/customer', 'AddCustomer')->name('add.customer');
        Route::post('/store/customer', 'StoreCustomer')->name('store.customer');

        Route::get('/edit/customer/{id}', 'EditCustomer')->name('edit.customer');
        Route::post('/update/customer', 'UpdateCustomer')->name('update.customer');
        Route::get('/delete/customer/{id}', 'DeleteCustomer')->name('delete.customer');

         //Ajax load View Detail customer
         Route::get('/customer/view/modal/{id}', 'CustomerViewAjax')->name('viewDetail.customer');

    });

    //Supplier
    Route::controller(SupplierController::class)->group(function () {
        Route::get('/all/supplier', 'Allsupplier')->name('all.supplier');
        Route::get('/add/supplier', 'Addsupplier')->name('add.supplier');
        Route::post('/store/supplier', 'Storesupplier')->name('store.supplier');

        Route::get('/edit/supplier/{id}', 'Editsupplier')->name('edit.supplier');
        Route::post('/update/supplier', 'Updatesupplier')->name('update.supplier');
        Route::get('/delete/supplier/{id}', 'Deletesupplier')->name('delete.supplier');

        //Ajax load View Detail Supplier
        Route::get('/supplier/view/modal/{id}', 'SupplierViewAjax')->name('viewDetail.supplier');
    });

    //Salary
    Route::controller(SalaryController::class)->group(function () {

        //Adance
        Route::get('/add/AdvanceSalary', 'add_AdvanceSalary')->name('add.AdvanceSalary');
        Route::post('/storeAdvanceSalary', 'store_AdvanceSalary')->name('store.AdvanceSalary');
        Route::get('/all/AdvanceSalary','all_AdvanceSalary')->name('all.AdvanceSalary');
        Route::get('/edit/AdvanceSalary/{id}','edit_AdvanvceSalary')->name('edit.AdvanceSalary');
        Route::post('/update/AdvanceSalary','update_AdvanvceSalary')->name('update.AdvanceSalary');
        Route::get('/delete/AdvanceSalary/{id}','delete_AdvanvceSalary')->name('delete.AdvanceSalary');

        //Pay
        Route::get('/all/PaySalary','all_PaySalary')->name('all.PaySalary');
        Route::get('/add/PaySalary/{id}', 'add_PaySalary')->name('add.PaySalary');
        //Route::post('/storePaySalary', 'store_PaySalary')->name('store.PaySalary');

       // Route::get('/edit/AdvanceSalary/{id}','edit_AdvanvceSalary')->name('edit.AdvanceSalary');
        //Route::post('/update/AdvanceSalary','update_AdvanvceSalary')->name('update.AdvanceSalary');
       // Route::get('/delete/AdvanceSalary/{id}','delete_AdvanvceSalary')->name('delete.AdvanceSalary');

        //Ajax load View Detail Employee
        Route::get('/view/PaySalary/{id}', 'view_PaySalary')->name('view.PaySalary');

    });



});

