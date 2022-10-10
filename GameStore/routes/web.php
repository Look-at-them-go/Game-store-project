<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\User\UserController;

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

Route::get('/',[StoreController::class,'index']);;


Route::group(['middleware' => 'auth'], function() {

    // ADMIN ROUTES

    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function() {
            Route::get('/panel', [AdminController::class,'index']);
            Route::get('panel/game', [AdminController::class,'game_data']);
            Route::get('panel/genre', [AdminController::class,'genre_data']);
            Route::get('panel/modify', [AdminController::class,'modify_data']);
            Route::get('panel/activity', [AdminController::class,'user_data']);
            Route::get('panel/make-admin', [AdminController::class,'admin_form']);
            Route::get('panel/make-manager', [AdminController::class,'manager_form']);
            Route::get('panel/show-activity/{id}', [AdminController::class,'activity_data']);
            Route::get('panel/export-user/{id}', [AdminController::class,'export_user']);


            Route::post('/add-game', [AdminController::class,'add_game']);
            Route::post('/add-genre', [AdminController::class,'add_genre']);
            Route::get('/edit-game/{id}', [AdminController::class,'edit_game_view']);
            Route::post('/edit-game-submit', [AdminController::class,'edit_game']);
            Route::get('/delete-game/{id}', [AdminController::class,'delete_game']);

            Route::post('/add-admin', [AdminController::class,'add_admin']);
            Route::post('/add-manager', [AdminController::class,'add_manager']);

            Route::get('/comment-delete/{id}', [CommentController::class,'comment_delete']);
        });
        

    // END OF ADMIN ROUTES
    
    // MANAGER ROUTES

    Route::group(['middleware' => 'role:manager', 'prefix' => 'manager'], function() {
            Route::get('panel', [ManagerController::class,'index']);
            Route::get('panel/activity', [ManagerController::class,'user_data']);
            Route::get('panel/show-activity/{id}', [ManagerController::class,'activity_data']);
            Route::get('/comment-delete/{id}', [CommentController::class,'comment_delete']);
        });

    // END OF MANAGER ROUTES

    // USER ROUTES

    Route::group(['middleware' => 'role:user', 'prefix' => 'user'], function() {
            Route::get('library', [UserController::class,'library']);
        });

    // END OF USER ROUTES

});



Route::get('game/{id}',[GameController::class,'index']);
Route::post('game/buy',[PurchaseController::class,'buy_game']);
Route::post('game/rate',[RatingController::class,'rate_game']);
Route::post('game/comment',[CommentController::class,'comment']);
Route::get('game/comment-delete/{id}',[CommentController::class,'comment_delete']);





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
