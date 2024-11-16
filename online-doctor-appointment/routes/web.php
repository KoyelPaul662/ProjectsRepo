<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;


 

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
    return view('index');
});


//Route::view('hospital-registration', 'hospital-registration');
Route::get('/', [LoginController::class, 'index'])->name('index');
Route::post('feedback', [LoginController::class, 'feedback'])->name('feedback');
Route::view('registration', 'registration');
Route::get('user-login', [LoginController::class, 'user_login'])->name('allLogin');
//Route::view('hospital-login', 'hospital-login');
Route::post('logins', [LoginController::class, 'login'])->name('logins');
//Route::view('admin-login', 'admin-login');
Route::post('registration',[UserController::class,'savedata'])->name('registration');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth:admin')->group(function () {
    // Route::view('admin-dashboard', 'admin-dashboard');
    Route::get('/admin-dashboard',[AdminController::class,'viewDynamicData'])->name('admin-dashboard');
    Route::get('/chart',[AdminController::class,'chartRegistration'])->name('chart');
    Route::get('/doctorchart',[AdminController::class,'doctorchartRegistration'])->name('doctorchart');
    Route::view('new-hospital', 'new-hospital');
    Route::post('/submit', [HospitalController::class, 'submit'])->name('submit');
    Route::get('/view-hospital',[HospitalController::class,'view'])->name('view-hospital');
    Route::get('/edit/{id}',[HospitalController::class,'edit'])->name('edit');
    Route::patch('/users/{user}', [HospitalController::class, 'update'])->name('update');   
    Route::get('/studentview/delete/{id}',[HospitalController::class,'delete'])->name('student-delete');

    
    // doctor starts
    Route::get('/new-doctor',[AdminController::class,'viewspecialization'])->name('new-doctor'); 
    Route::post('/savedoctor',[AdminController::class,'savedoctor'])->name('savedoctor'); 
    Route::view('view-doctor', 'view-doctor'); 
    Route::get('/view-doctor',[AdminController::class,'viewdoctor'])->name('view-doctor');
    Route::get('/doctoredit/{id}',[AdminController::class,'doctoredit'])->name('doctoredit');
    Route::patch('/doctorupdate/{user}', [AdminController::class, 'doctorupdate'])->name('doctorupdate'); 
    Route::get('/doctor/delete/{id}',[AdminController::class,'doctordelete'])->name('doctor-delete');
    Route::get('/doctor/active',[AdminController::class,'updateStatus'])->name('doctor-active-status');
    Route::get('/doctor/deactive',[AdminController::class,'updateDeactiveStatus'])->name('doctor-deactive-status');
    Route::get('/doctors/delete',[AdminController::class,'deleteall'])->name('doctor-deleteall');
    Route::get('/doctorgetApprove/{id}',[AdminController::class,'doctorgetApprove'])->name('doctorgetApprove');
    Route::get('/doctorgetUnApprove/{id}',[AdminController::class,'doctorgetUnApprove'])->name('doctorgetUnApprove');

    // Specialization starts
    Route::view('new-specialization', 'admin.new-specialization'); 
    Route::post('/savespecialization', [AdminController::class, 'savespecialization'])->name('savespecialization'); 
    Route::view('view-specialization', 'view-specialization'); 
    Route::get('/view-specialization',[AdminController::class,'view'])->name('view-specialization');
    Route::get('/spe-edit/{id}',[AdminController::class,'edit'])->name('spe-edit');
    Route::patch('/users/{user}', [AdminController::class, 'update'])->name('update'); 
    Route::get('/specialization/delete/{id}',[AdminController::class,'delete'])->name('student-delete');
    // Specialization ends

    // Users Starts
        Route::get('/user-view',[AdminController::class,'UserView'])->name('user-view');
        Route::get('/usergetApprove/{id}',[AdminController::class,'usergetApprove'])->name('usergetApprove');
        Route::get('/usergetUnApprove/{id}',[AdminController::class,'usergetUnApprove'])->name('usergetUnApprove');
        Route::get('/user/active',[AdminController::class,'userallupdateStatus'])->name('user-active-status');
        Route::get('/user/deactive',[AdminController::class,'userallupdateDeactiveStatus'])->name('user-deactive-status');
    // Users End

    // Request Starts
        Route::get('/user-request',[AdminController::class,'AllUserRequest'])->name('user-request'); 
        Route::get('/getApprove/{id}',[AdminController::class,'getApprove'])->name('getApprove');
        Route::get('/getReject/{id}',[AdminController::class,'getReject'])->name('getReject');
    // Request ends

    //DAYWISE DOCTOR'S SCHEDULE TIME LIST
   // Route::view('doctor-schedule', 'doctor-schedule'); 
   Route::get('/doctor-schedule',[AdminController::class,'DoctorScheduleList'])->name('doctor-schedule');
   
   Route::get('/view-feedback',[AdminController::class,'ViewFeedback'])->name('view-feedback');  

});


Route::middleware('auth:hospital')->group(function(){
    // Route::view('doctor-dashboard', 'hospital-dashboard'); 
    Route::get('/doctor-dashboard',[HospitalController::class,'DoctorDynamicData'])->name('doctor-dashboard');
    Route::get('/all-request',[HospitalController::class,'AllRequest'])->name('all-request'); 
    // Route::get('logoutUser', [LoginController::class, 'logout'])->name('logout');
    
});

Route::middleware('auth:user')->group(function(){
    // Route::view('user-dashboard', 'user-dashboard');   
    Route::get('/user-dashboard',[UserController::class,'UserDynamicData'])->name('user-dashboard');
    Route::get('/new-request',[UserController::class,'viewspecialization'])->name('new-request'); 
    Route::post('/new-request',[UserController::class,'searchdoctor'])->name('searchdoctor');
    Route::get('/book-request/{id}',[UserController::class,'BookRequest'])->name('book-request');
    Route::post('/send-request', [UserController::class, 'SaveRequest'])->name('request');  
    Route::get('/view-request',[UserController::class,'ViewRequest'])->name('view-request');
    Route::view('cancel-request', 'cancel-request');
    Route::get('/usergetCancel/{id}',[UserController::class,'usergetCancel'])->name('usergetCancel');

});