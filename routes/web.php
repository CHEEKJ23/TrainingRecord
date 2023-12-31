<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', function () {
    return view('homeApp');
});

Route::post('/event-list/search',[App\Http\Controllers\EventController::class, 'eventSearch'])->name('eventSearch');

Route::get('/event-list',[App\Http\Controllers\EventController::class, 'showEvent'])->name('eventList');

Route::get('/event-list/remove/event/{id}', [App\Http\Controllers\EventController::class, 'deleteEvent'])->name('deleteEvent');

Route::post('/event-list/add-event',[App\Http\Controllers\EventController::class, 'addEvent'])->name('addEvent');


Route::post('/employee-list/search',[App\Http\Controllers\EmployeeController::class, 'employeeSearch'])->name('employeeSearch');

Route::get('/employee-list',[App\Http\Controllers\EmployeeController::class, 'showEmployee'])->name('employeeList');

Route::get('/employee-list/remove/employee/{id}', [App\Http\Controllers\EmployeeController::class, 'deleteEmployee'])->name('deleteEmployee');

Route::post('/employee-list/add-employee',[App\Http\Controllers\EmployeeController::class, 'addEmployee'])->name('addEmployee');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/assignEmployee', [App\Http\Controllers\addEmployeeToTraining::class, 'showEmployeeAndEvent'])->name('showEmployeeAndEvent');

Route::post('/assign-employee-to-event',[App\Http\Controllers\addEmployeeToTraining::class, 'associateEmployeesToEvents'])->name('associateEmployeesToEvents');

Route::get('/employees/{id}', [App\Http\Controllers\EmployeeController::class, 'showEmployeeDetails'])->name('showEmployeeDetails');

Route::get('/generate-pdf/{id}', [App\Http\Controllers\addEmployeeToTraining::class, 'generatePDF'])->name('generatePDF');

Route::get('/events/{id}', [App\Http\Controllers\EventController::class, 'showEventDetails'])->name('showEventDetails');

Route::get('/delete-employee-from-event/{employeeId}/{eventId}', [App\Http\Controllers\addEmployeeToTraining::class, 'deleteEmployeeFromEvent'])->name('deleteEmployeeFromEvent');

Route::get('/editEventInfo/{id}', [App\Http\Controllers\EventController::class, 'editEventInfo'])->name('editEventInfo');

Route::post('/updateEventInfo',[App\Http\Controllers\EventController::class,'updateEventInfo'])->name('updateEventInfo');

Route::get('/editEmployeeInfo/{id}', [App\Http\Controllers\EmployeeController::class, 'editEmployeeInfo'])->name('editEmployeeInfo');

Route::post('/updateEmployeeInfo',[App\Http\Controllers\EmployeeController::class,'updateEmployeeInfo'])->name('updateEmployeeInfo');