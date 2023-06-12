<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CommandController;

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





// Route::get('/',[
//     'uses'=>'HomeController@index',
//     'as'=>'home'
// ]);
Route::get('/',[HomeController::class,'index'])->name('home');


Route::post('/search',
[HomeController::class,'search'])->name('search');


Route::resource('cars', CarController::class);
Route::resource('commands',CommandController::class);
Route::resource('admin',AdminController::class)->middleware(['auth', 'admin']);
Route::resource('users',UsersController::class);


Route::get('/register',function(){
    return view('cars.view');
});


Route::get('/login',function(){
    return view('users.login');
})->name('login');


Route::post('/login',[
    UsersController::class,'login',

])->name('users.login');


Route::group(['middleware' => ['auth']], function () {
    Route::post('/delete/command/{id}',[
        UsersController::class,'deleteCommand',
    ])->name('users.deleteCommand');

    Route::get('/logout',[
        UsersController::class,'logout',
    ])->name('users.logout');


    Route::get('/delete/car/{id}',[CarController::class,'destroy'])->name('cars.destroy');

    Route::get('/delete/{id}',[
            UsersController::class,'destroy',
        ])->name('users.destroy');
    Route::get('/delete/commands/{id}',[
        CommandController::class,'destroy',
        ])->name('commands.destroy');


    Route::get('/delete/{id}',[
    
        UsersController::class,'destroy',
        ])->name('users.destroy');

});
