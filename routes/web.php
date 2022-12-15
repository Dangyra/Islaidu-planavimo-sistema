<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
//Route::get('/login',[AuthController::class,'login'])->middleware('alreadyLoggedIn');
//Route::get('/registration',[AuthController::class,'registration'])->middleware('alreadyLoggedIn');

//Route::get('/', 'HomeController@index')->name('index');

//Route::post('/register-user',[AuthController::class,'registerUser'])->name('register-user');
// Route::post('login-user',[AuthController::class,'loginUser'])->name('login-user');
// Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('isLoggenIn');
//Route::get('/logout', [AuthController::class, 'logout']);

//Categories Route
Route::get('/categories', 'App\Http\Controllers\CategoryController@categories')->name('categories.categories');
Route::get('/categories/createCategory', 'App\Http\Controllers\CategoryController@createCategory')->name('categories.createCategory');
Route::post('/categories/storeCategory', 'App\Http\Controllers\CategoryController@storeCategory')->name('categories.storeCategory');
Route::get('/categories/editCategory/{id}', 'App\Http\Controllers\CategoryController@editCategory')->name('categories.editCategory');
Route::post('/categories/updateCategory', 'App\Http\Controllers\CategoryController@updateCategory')->name('categories.updateCategory');
Route::delete('/categories/deleteCategory/{id}', 'App\Http\Controllers\CategoryController@destroyCategory')->name('categories.deleteCategory');

//Subcategories Route
Route::get('/subcategories', 'App\Http\Controllers\SubcategoryController@subcategories')->name('subcategories.subcategories');
Route::get('/subcategories/createSubcategory', 'App\Http\Controllers\SubcategoryController@createSubcategory')->name('subcategories.createSubcategory');
Route::post('/subcategories/storeSubcategory', 'App\Http\Controllers\SubcategoryController@storeSubcategory')->name('subcategories.storeSubcategory');
Route::get('/subcategories/editSubcategory/{id}', 'App\Http\Controllers\SubcategoryController@editSubcategory')->name('subcategories.editSubcategory');
Route::post('/subcategories/updateSubcategory', 'App\Http\Controllers\SubcategoryController@updateSubcategory')->name('subcategories.updateSubcategory');
Route::delete('/subcategories/deleteSubcategory/{id}', 'App\Http\Controllers\SubcategoryController@destroySubcategory')->name('subcategories.deleteSubcategory');

//Income Route
Route::get('/incomes', 'App\Http\Controllers\IncomesController@incomes')->name('incomes.incomes');
Route::get('/incomes/createIncomes', 'App\Http\Controllers\IncomesController@createIncomes')->name('incomes.createIncomes');
Route::post('/incomes/store', 'App\Http\Controllers\IncomesController@store')->name('incomes.store');
Route::get('/incomes/editIncomes/{id}', 'App\Http\Controllers\IncomesController@editIncomes')->name('incomes.editIncomes');
Route::post('/incomes/updateIncomes', 'App\Http\Controllers\IncomesController@updateIncomes')->name('incomes.updateIncomes');
Route::delete('/incomes/deleteIncomes/{id}', 'App\Http\Controllers\IncomesController@destroyIncomes')->name('incomes.deleteIncomes');

//Expenses Route
Route::get('/expenses', 'App\Http\Controllers\ExpenseController@expenses')->name('expenses.expenses');
Route::get('/expenses/createExpenses', 'App\Http\Controllers\ExpenseController@createExpenses')->name('expenses.createExpenses');
Route::post('/expenses/storeExpenses', 'App\Http\Controllers\ExpenseController@storeExpenses')->name('expenses.storeExpenses');
Route::get('/expenses/editExpenses/{id}', 'App\Http\Controllers\ExpenseController@editExpenses')->name('expenses.editExpenses');
Route::post('/expenses/updateExpenses', 'App\Http\Controllers\ExpenseController@updateExpenses')->name('expenses.updateExpenses');
Route::delete('/expenses/deleteExpenses/{id}', 'App\Http\Controllers\ExpenseController@destroyExpenses')->name('expenses.deleteExpenses');

//Bills Route
Route::get('/bills', 'App\Http\Controllers\BillController@bills')->name('bills.bills');
Route::get('/bills/createBills', 'App\Http\Controllers\BillController@createBills')->name('bills.createBills');
Route::post('/bills/storeBills', 'App\Http\Controllers\BillController@storeBills')->name('bills.storeBills');
Route::get('/bills/editBills/{id}', 'App\Http\Controllers\BillController@editBills')->name('bills.editBills');
Route::post('/bills/updateBills', 'App\Http\Controllers\BillController@updateBills')->name('bills.updateBills');
Route::delete('/bills/deleteBills/{id}', 'App\Http\Controllers\BillController@destroyBills')->name('bills.deleteBills');
//Report Route
Route::get('/report', 'App\Http\Controllers\ReportController@report')->name('report.report');
Route::get('/summary', 'App\Http\Controllers\HomeController@summary')->name('summary.summary');
Route::get('/incomesCalendar', 'App\Http\Controllers\IncomesCalendar@incomesCalendar')->name('calendar.incomesCalendar');
Route::get('/diagram', 'App\Http\Controllers\DiagramController@diagram')->name('diagram.diagram');

//Profile Route
Route::get('profile', 'App\Http\Controllers\ProfileController@show')->name('profile');
Route::put('profile', 'App\Http\Controllers\ProfileController@update');
Route::get('profile/edit', 'App\Http\Controllers\ProfileController@edit');
Route::delete('profile/image', 'App\Http\Controllers\ProfileController@remove');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
 