<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\AddPostController;
use App\Http\Controllers\NoSidebarController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PlanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/save',[App\Http\Controllers\RegistrationController::class, 'store']);
Route::post('login', [LoginController::class, 'login']);
// Route::get('logout/{token}', [LoginController::class, 'logout']);
 // route to get records to edit
 Route::get('getOneUser/{id}', [RegistrationController::class, 'getOneData']);
 Route::get('getSinglePost/{id}', [NoSidebarController::class, 'getSubscriberData']);
 // route to update, modifies record
 Route::patch('updateStudent/{id}', [RegistrationController::class, 'updateData']);

 Route::get('getsubscriber/{id}', [SubscriptionController::class, 'getSubscriberData']);
 Route::post('getUserPost/', [AddPostController::class, 'getUserPost']);

 Route::post('/process-payment', [SubscriptionController::class, 'processPayment']);
 Route::post('add-post', [AddPostController::class, 'addPost']);
 Route::post('get-post', [AddPostController::class, 'getAllPost']);
 Route::post('get-search', [AddPostController::class, 'getSearchPost']);
 Route::get('get-posts', [AddPostController::class, 'getAllPosts']);
 Route::get('get-featured-post', [AddPostController::class, 'getFeaturedPost']);
 Route::get('get-footer-post', [AddPostController::class, 'getFooterPost']);

 Route::get('getEditPost/{id}', [AddPostController::class, 'getEditPost']);
 Route::get('getDeletePost/{id}', [AddPostController::class, 'getDeletePost']);
 Route::post('UpdatePost/{id}', [AddPostController::class, 'UpdatePost']);
 Route::post('add-comments', [CommentController::class, 'addcomment']);
 Route::get('get-Comments/{id}', [CommentController::class, 'getComments']);

 Route::post('add-plan', [PlanController::class, 'addPlan']);
 Route::get('get-amount', [PlanController::class, 'getAmount']);
 Route::get('get-Month/{amt}', [PlanController::class, 'getMonth']);
 Route::get('get-SearchData/{id}', [AddPostController::class, 'getOneData']);


 Route::get('get-edit-amount/{id}', [PlanController::class, 'getEditAmount']);
 Route::post('Update-Amount/{id}', [PlanController::class, 'UpdateAmount']);
 Route::get('get-delete-amount/{id}', [PlanController::class, 'getDeletePost']);


 //Top Comments//
 Route::get('top-comments', [CommentController::class, 'topComments']);

 Route::post('subscriber', [SubscriptionController::class, 'addsubcriber']);
 Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
