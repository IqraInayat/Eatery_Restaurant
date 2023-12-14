<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
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


Route::get('/', [HomeController::class, 'web_index'])->name('web.main');

Route::group(['prefix' => 'user'], function () {
    Route::get('/logged', [HomeController::class, 'Display_Users'])->name('user_table');
    Route::get('/edit/{id}', [HomeController::class, 'Edit_User'])->name('edit_user');
    Route::post('/update/{id}', [HomeController::class, 'Update_User'])->name('update_user');
    Route::get('/delete/{id}', [HomeController::class, 'Delete_User'])->name('delete_user');
    Route::post('/search',[HomeController::class,"Display_Users"])->name('search');
});

Route::group(['prefix' => 'menu'], function () {
    Route::get('/', [MenuController::class, 'Menu_Page'])->name('add_menu');
    Route::post('/', [MenuController::class, 'store']);
    Route::get('/table', [MenuController::class, 'show'])->name('menu_table');
    Route::get('/delete/{id}', [MenuController::class, 'destroy'])->name('delete_menu');
    Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('edit_menu');
    Route::post('/update/{id}', [MenuController::class, 'update'])->name('update_menu');
    Route::post('/search',[MenuController::class,"show"])->name('search');
});


Route::group(['prefix' => 'chef'], function () {
    Route::get('/', [ChefController::class, 'create'])->name('add_chef');
    Route::post('/', [ChefController::class, 'store']);
    Route::get('/table', [ChefController::class, 'show'])->name('chef_table');
    Route::get('/delete/{id}', [ChefController::class, 'destroy'])->name('delete_chef');
    Route::get('/edit/{id}', [ChefController::class, 'edit'])->name('edit_chef');
    Route::post('/update/{id}', [ChefController::class, 'update'])->name('update_chef');
    Route::post('/search',[ChefController::class,"show"])->name('search');
});

Route::group(['prefix' => 'reservation'], function () {
    Route::post('/', [ReservationController::class, 'store'])->name('add_reserve');
    Route::get('/reserve_data', [ReservationController::class, 'reserved_reservations_table'])->name('reserve_data');
    Route::get('/completed/{id}', [ReservationController::class, 'completed_reservations'])->name('complete_reservation');
    Route::get('/complete_reserve_table', [ReservationController::class, 'completed_reservations_table'])->name('complete_reservation_table');
    Route::get('/edit/{id}', [ReservationController::class, 'edit'])->name('edit_reservation');
    Route::post('/update/{id}', [ReservationController::class, 'update'])->name('update_reservation');
    Route::get('/temp_delete/{id}',[ReservationController::class,'temporary_delete'])->name('temp_delete');
    Route::get('/trash', [ReservationController::class, 'Trash'])->name('trash_reservation');
    Route::get('/delete/{id}', [ReservationController::class, 'forceDelete'])->name('delete_reservation');
    Route::get('/restore/{id}', [ReservationController::class, 'restore'])->name('restore_reservation');
    Route::post('/search',[ReservationController::class,"reserved_reservations_table"])->name('search');
    Route::post('/complete_search_table',[ReservationController::class,"completed_reservations_table"])->name('search');
});

Route::group(['prefix' => 'category'], function () {
  Route::get('/',[CategoryController::class,'category_form'])->name('add_category');
  Route::post('/',[CategoryController::class,'store']);
  Route::get('/table',[CategoryController::class,'show'])->name('category_table');
  Route::get('/delete/{id}',[CategoryController::class,'destroy'])->name('delete_category');
  Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit_category');
  Route::post('/update/{id}',[CategoryController::class,'update'])->name('update_category');
  Route::post('/search',[ChefController::class,"show"])->name('search');

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



// SIMPLE ROUTING

// Menu Functions
// Route::get('/menu',[MenuController::class,'Menu_Page'])->name('add_menu');
// Route::post('/menu',[MenuController::class,'store']);
// Route::get('/menu_table',[MenuController::class,'show'])->name('menu_table');
// Route::get('/delete_menu/{id}',[MenuController::class,'destroy'])->name('delete_menu');
// Route::get('/edit_menu/{id}',[MenuController::class,'edit'])->name('edit_menu');
// Route::post('update_menu{id}',[MenuController::class,'update'])->name('update_menu');

//user functions
// Route::get('/',[HomeController::class,'web_index'])->name('web.main');
// Route::get('/logged',[HomeController::class,'Display_Users'])->name('user_table');
// Route::get('/edit_user/{id}',[HomeController::class,'Edit_User'])->name('edit_user');
// Route::post('/update_user/{id}',[HomeController::class,'Update_User'])->name('update_user');
// Route::get('/delete_user/{id}',[HomeController::class,'Delete_User'])->name('delete_user');

//Chef Functions
// Route::get('/chef',[ChefController::class,'create'])->name('add_chef');
// Route::post('/chef',[ChefController::class,'store']);
// Route::get('/chef_table',[ChefController::class,'show'])->name('chef_table');
// Route::get('/delete_chef/{id}',[ChefController::class,'destroy'])->name('delete_chef');
// Route::get('/edit_chef/{id}',[ChefController::class,'edit'])->name('edit_chef');
// Route::post('update_chef{id}',[ChefController::class,'update'])->name('update_chef');

//Reservation Function
// Route::post('/reservation',[ReservationController::class,'store'])->name('add_reserve');
// Route::get('/reserve_data',[ReservationController::class,'reserved_reservations_table'])->name('reserve_data');
// Route::get('/completed/{id}',[ReservationController::class,'completed_reservations'])->name('complete_reservation');
// Route::get('/complete_reserve_table',[ReservationController::class,'completed_reservations_table'])->name('complete_reservation_table');
// Route::get('/edit_reservation/{id}',[ReservationController::class,'edit'])->name('edit_reservation');
// Route::post('/update_reservation/{id}',[ReservationController::class,'update'])->name('update_reservation');
// Route::get('/trash_reservation',[ReservationController::class,'Trash'])->name('trash_reservation');
// Route::get('/delete_reservation/{id}',[ReservationController::class,'destroy'])->name('delete_reservation');
// Route::get('/restore_reservation/{id}',[ReservationController::class,'restore'])->name('restore_reservation');