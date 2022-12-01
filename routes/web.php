<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\VeterinarianController;
use  App\Http\Controllers\DiseaseController;
use  App\Http\Controllers\ConsultationController;
use  App\Http\Controllers\TransactionController;


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

Route::get('/', function () {
    return view('welcome');
});


// Route::resource("/customer", CustomerController::class);


//customer 
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{id}/update', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
Route::get('/customers/restore/one/{id}', [CustomerController::class, 'restore'])->name('customers.restore');
Route::get('/customers/restore_all', [CustomerController::class, 'restore_all'])->name('customers.restore_all');


// Route::resource('customer','CustomerController');



//service
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/{id}/update', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
Route::get('/services/restore/one/{id}', [ServiceController::class, 'restore'])->name('services.restore');
Route::get('/services/restore_all', [ServiceController::class, 'restore_all'])->name('services.restore_all');




//employee
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{id}/update', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::get('/employees/restore/one/{id}', [EmployeeController::class, 'restore'])->name('employees.restore');
Route::get('/employees/restore_all', [EmployeeController::class, 'restore_all'])->name('employees.restore_all');


//pet

Route::get('/pets', [PetController::class, 'index'])->name('pets.index');
Route::get('/pets/create', [PetController::class, 'create'])->name('pets.create');
Route::post('/pets/store', [PetController::class, 'store'])->name('pets.store');
Route::get('/pets/{id}/edit', [PetController::class, 'edit'])->name('pets.edit');
Route::put('/pets/{id}/update', [PetController::class, 'update'])->name('pets.update');
Route::delete('/pets/{id}', [PetController::class, 'destroy'])->name('pets.destroy');
Route::get('/pets/restore/one/{id}', [PetController::class, 'restore'])->name('pets.restore');
Route::get('/pets/restore_all', [PetController::class, 'restore_all'])->name('pets.restore_all');



//veterinarian
Route::get('/veterinarians', [VeterinarianController::class, 'index'])->name('veterinarians.index');
Route::get('/veterinarians/create', [VeterinarianController::class, 'create'])->name('veterinarians.create');
Route::post('/veterinarians/store', [VeterinarianController::class, 'store'])->name('veterinarians.store');
Route::get('/veterinarians/{id}/edit', [VeterinarianController::class, 'edit'])->name('veterinarians.edit');
Route::put('/veterinarians/{id}/update', [VeterinarianController::class, 'update'])->name('veterinarians.update');
Route::delete('/veterinarians/{id}', [VeterinarianController::class, 'destroy'])->name('veterinarians.destroy');
Route::get('/veterinarians/restore/one/{id}', [VeterinarianController::class, 'restore'])->name('veterinarians.restore');
Route::get('/veterinarians/restore_all', [VeterinarianController::class, 'restore_all'])->name('veterinarians.restore_all');

Route::get('/diseases', [DiseaseController::class, 'index'])->name('diseases.index');
Route::get('/diseases/create', [DiseaseController::class, 'create'])->name('diseases.create');
Route::post('/diseases/store', [DiseaseController::class, 'store'])->name('diseases.store');


Route::get('/consultations', [ConsultationController::class, 'index'])->name('consultations.index');
Route::get('/consultations/create', [ConsultationController::class, 'create'])->name('consultations.create');
Route::post('/consultations/store', [ConsultationController::class, 'store'])->name('consultations.store');


Route::get('/signup', [
    'uses' => 'userController@getSignup',
    'as' => 'user.signup'
]);

Route::post('/signup', [
    'uses' => 'userController@postSignup',
    'as' => 'user.signup'

]);


Route::get('profile', [
'uses' => 'userController@getProfile',
'as' => 'user.profile',
]);

Route::get('logout', [
    'uses' => 'userController@getLogout',
    'as' => 'user.logout',
]);


Route::post('/signin', [
    'uses' => 'UserController@postSignin',
    'as' => 'user.signin',
]);


Route::get('signin', [
    'uses' => 'userController@getSignin',
    'as' => 'user.signin',
]);



Route::get('/transactions', [TransactionController::class, 'index'])->name('shops.index');
Route::get('/shopping-cart', [TransactionController::class, 'getCart'])->name('shop.shoppingCart');
Route::get('add-to-cart/{id}', [TransactionController::class,  'getAddToCart'])->name('shops.addToCart');
Route::get('remove{idd}', [TransactionController::class, 'getRemoveItem'])->name('shop.remove');
Route::get('reduce/{id}', [TransactionController::class, 'getReduceByOne'])->name('shop.reduceByOne');


