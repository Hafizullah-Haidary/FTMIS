<?php

use App\Models\ForeignTrip;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Controllers\DonerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ForeignTripController;
use App\Http\Controllers\InvitingAuthorityController;
use App\Http\Controllers\NatureOfParticipationController;
use App\Http\Controllers\ReportController;
use App\Models\InvitingAuthority;

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
// Auth::routes();

Route::resource('foreigntrip', ForeignTripController::class);
Route::resource('employee', EmployeeController::class);
Route::resource('department', DepartmentController::class);
Route::resource('doner', DonerController::class);
Route::resource('inviter', InvitingAuthorityController::class);
Route::resource('participation', NatureOfParticipationController::class);

Route::get('searchemployee', [ForeignTripController::class, 'search'])->name('searchemployee');

// Route::get('report',[ForeignTripController::class,'report'])->name('report');

Route::post('searchname', [EmployeeController::class, 'search'])->name('searchname');
Route::post('searchdepartment', [DepartmentController::class, 'search'])->name('searchdepartment');
Route::post('searchinviter', [InvitingAuthorityController::class, 'search'])->name('searchinviter');
Route::post('searchdoner', [DonerController::class, 'search'])->name('searchdoner');
//foreigntrip report page
Route::get('foreigntripReport',[ReportController::class,'index'])->name('foreigntripReport');
//foreigntrip report search section
Route::get('searchforeigntrip',[ReportController::class,'search'])->name('searchforeigntrip');

//PDF CONVERT
Route::get('reportPDF',[ReportController::class,'search'])->name('reportPDF');
// Route::get('report',[ReportController::class,'report'])->name('report');
//PDF VIEW
// Route::get('report',[ReportController::class,'search'])->name('report');

Route::get('/', function () {
    return view('auth/login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('user', UserController::class);

    Route::resource('permission', PermissionController::class);


    Route::get('/profile', [UserController::class,'profile'])->name('user.profile');

    Route::post('/profile', [UserController::class,'postProfile'])->name('user.postProfile');

    Route::get('/password/change',[ UserController::class,'getPassword'])->name('userGetPassword');

    Route::post('/password/change', [UserController::class,'postPassword'])->name('userPostPassword');
});


// Route::group(['middleware' => ['auth', 'role_or_permission:admin|create role|create permission']], function() {

    Route::resource('role', RoleController::class);


// });







Auth::routes();


//////////////////////////////// axios request

Route::get('/getAllPermission', [PermissionController::class,'getAllPermissions']);
Route::post("/postRole", [RoleController::class,'store']);
Route::get("/getAllUsers", [UserController::class,'getAll']);
Route::get("/getAllRoles", [RoleController::class,'getAll']);
Route::get("/getAllPermissions", [PermissionController::class,'getAll']);

/////////////axios create user
// Route::post('/account/create', 'UserController@store');
// Route::put('/account/update/{id}', 'UserController@update');
// Route::delete('/delete/user/{id}', 'UserController@delete');
// Route::get('/search/user', 'UserController@search');



require __DIR__.'/auth.php';






