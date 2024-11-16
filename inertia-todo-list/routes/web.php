<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HospitalController;

// Route::get('/', function () {
//     return Inertia::render('logins');
// })->name('logins');

Route::get('/sign-up', function () {
    return Inertia::render('sign-up');
})->name('sign-up');

Route::post('registration',[UserController::class,'savedata'])->name('registration');
Route::get('/', [LoginController::class, 'user_login'])->name('alllogin');
Route::post('logins', [LoginController::class, 'login'])->name('logins');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Admin Section Starts
Route::middleware('auth:admin')->group(function () {
    Route::get('/admindashboard', function () {
        return Inertia::render('admin/admindashboard');
    })->name('admindashboard');


    Route::get('/admindashboard',[AdminController::class,'viewDynamicData'])->name('admindashboard');
    // Specialization Starts:
    Route::get('/new-specialization', [AdminController::class,'create'])->name('new-specialization');
    Route::post('/new-specialization', [AdminController::class,'store'])->name('new-specialization.store');
    Route::get('/view-specialization', [AdminController::class,'index'])->name('view-specialization.index');
    Route::get('/specializations/{specialization}/edit', [AdminController::class, 'edit'])->name('specializations.edit');
    Route::put('/specializations/{specialization}', [AdminController::class, 'update'])->name('specializations.update');
    Route::delete('/specializations/{specialization}', [AdminController::class, 'destroy'])->name('specializations.destroy');
    // Specialization Ends

    //--------------Doctor Starts-----------------------//
    Route::get('/new-doctor', [AdminController::class,'viewspecialization'])->name('new-doctor');
    Route::post('/new-doctor', [AdminController::class,'SaveDoctor'])->name('new-doctor.store');
    Route::get('/view-doctor', [AdminController::class,'ViewDoctor'])->name('view-doctor.index');
    Route::get('/doctors/{doctor}/edit', [AdminController::class, 'doctoredit'])->name('doctors.edit');
    Route::put('/doctors/{doctor}', [AdminController::class, 'doctorupdate'])->name('doctors.update');
    Route::delete('/doctors/{doctor}', [AdminController::class, 'doctordelete'])->name('doctors.destroy');

    Route::get('/doctorgetApprove/{id}',[AdminController::class,'doctorgetApprove'])->name('doctorgetApprove');
        Route::get('/doctorgetUnApprove/{id}',[AdminController::class,'doctorgetUnApprove'])->name('doctorgetUnApprove');

    // Route::get('/view-doctor', function () {
    //     return Inertia::render('admin/view-doctor');
    // })->name('view-doctor');

    //-------------Doctor Ends------------------------------//

    //------------------User------------------------------//
    Route::get('/view-user', [AdminController::class,'ViewUser'])->name('view-user.index');
    Route::get('/usergetApprove/{id}',[AdminController::class,'usergetApprove'])->name('usergetApprove');
    Route::get('/usergetUnApprove/{id}',[AdminController::class,'usergetUnApprove'])->name('usergetUnApprove');

    //--------------------User Ends-------------------------//

    Route::get('/chart',[AdminController::class,'chartRegistration'])->name('chart');
    Route::get('/doctorchart',[AdminController::class,'doctorchartRegistration'])->name('doctorchart');



    //-------------------------Request Starts-----------------//
    Route::get('/user-request',[AdminController::class,'AllUserRequest'])->name('user-request'); 
    Route::get('/getApprove/{id}',[AdminController::class,'getApprove'])->name('getApprove');
    Route::get('/getReject/{id}',[AdminController::class,'getReject'])->name('getReject');

    //-------------------------Request Ends-------------------//


    //DAYWISE DOCTOR'S SCHEDULE TIME LIST
    Route::get('/doctor-schedule',[AdminController::class,'DoctorScheduleList'])->name('doctor-schedule'); 
});
// Admin Section ends


// Doctor starts
Route::middleware('auth:hospital')->group(function () {
    // Route::get('/doctordashboard', function () {
    //     return Inertia::render('doctor/doctordashboard');
    // })->name('doctordashboard');
    Route::get('/doctordashboard',[HospitalController::class,'DoctorDynamicData'])->name('doctordashboard');
    Route::get('/all-request',[HospitalController::class,'AllRequest'])->name('all-request'); 
});
//Doctors ends

// User starts
Route::middleware('auth:user')->group(function () {
    // Route::get('/userdashboard', function () {
    //     return Inertia::render('user/userdashboard');
    // })->name('userdashboard');
    Route::get('/userdashboard',[UserController::class,'UserDynamicData'])->name('userdashboard');
    Route::get('/new-request',[UserController::class,'viewspecialization'])->name('new-request'); 
    Route::post('/new-request',[UserController::class,'searchdoctor'])->name('searchdoctor');
    Route::get('/book-request/{id}',[UserController::class,'BookRequest'])->name('book-request');
    Route::post('/send-request', [UserController::class, 'SaveRequest'])->name('request');  
    Route::get('/view-request',[UserController::class,'ViewRequest'])->name('view-request');
    Route::view('cancel-request', 'cancel-request');
    Route::get('/usergetCancel/{id}',[UserController::class,'usergetCancel'])->name('usergetCancel');
});
//User ends

 Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/todos/index', [TodoController::class,'index'])->name('todos.index');
    Route::get('/todos', [TodoController::class,'create'])->name('todos');
    Route::post('/todos', [TodoController::class,'store'])->name('todos.store');
    Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])->name('todos.edit');
    Route::put('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');
    Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// require __DIR__.'/auth.php';
