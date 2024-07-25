<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\TicketController;
use App\Models\Teams;
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



    Route::get('/index', function () {
        return view('index');
    })->name('index');




      
   
Route::get('/showall',[Controller::class, 'showall'])->name('showall');
Route::post('/addmember', [Controller::class, 'store'])->name('addmember');
Route::get('/addmember', [Controller::class, 'Teams'])->name('Teams');
Route::get('/edit/{id}',[Controller::class, 'edit'])->name('edit');
Route::post('/update/{id}',[Controller::class, 'update'])->name('update');


Route::delete('/delete/{id}', [Controller::class, 'destroy'])->name('delete');


// lead section
Route::get('/Lead',[LeadsController::class, 'showall'])->name('Lead');
Route::post('/addLead',[LeadsController::class, 'store'])->name('addLead');
Route::get('/addLead',[LeadsController::class, 'addLead'])->name('addLead');



Route::get('/Leadedit/{id}',[LeadsController::class, 'edit'])->name('Leadedit');
Route::post('/updateLead/{id}',[LeadsController::class, 'update'])->name('updateLead');


Route::delete('/deleteLead/{id}', [LeadsController::class, 'destroy'])->name('deleteLead');



// status  section

Route::post('/status', [LeadsController::class, 'status'])->name('status');
Route::get('/statusshow', [LeadsController::class, 'statusshow'])->name('statusshow');
Route::delete('/deletestatus/{id}', [LeadsController::class, 'deletestatus'])->name('deletestatus');
Route::get('/editstatus/{id}', [LeadsController::class, 'editstatus'])->name('editstatus');
Route::put('/updatestatus/{id}', [LeadsController::class, 'updatestatus'])->name('updatestatus');





/// task section 

Route::get('gettask', [TasksController::class, 'gettask'])->name('gettask');

// Route to store a new task
Route::post('addtask', [TasksController::class, 'addtask'])->name('addtask');

// Route to display all tasks with pagination
Route::get('showtask', [TasksController::class, 'showall'])->name('showtask');

// Route to display the form for editing a specific task
Route::get('tasks/{id}/edit', [TasksController::class, 'edittask'])->name('tasks.edit');

// Route to update a specific task
Route::put('tasks/{id}', [TasksController::class, 'update'])->name('tasks.update');

// Route to delete a specific task
Route::delete('tasks/{id}', [TasksController::class, 'destroy'])->name('tasks.destroy');


// roles section



Route::get('roles', [RoleController::class, 'create'])->name('roles');
Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
Route::get('/showrole', [RoleController::class, 'showrole'])->name('showrole');
Route::delete('/deleterole/{id}', [RoleController::class, 'deleterole'])->name('deleterole');
Route::get('/editrole/{id}', [RoleController::class, 'editrole'])->name('editrole');
Route::put('/updaterole/{id}', [RoleController::class, 'updaterole'])->name('updaterole');
Route::get('/roles/view/{id}', [RoleController::class, 'viewrole'])->name('viewroles');

// login section '




Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);



// tickets section   



Route::get('/tickets', [TicketController::class, 'create'])->name('tickets');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
Route::get('/showallticket', [TicketController::class, 'showall'])->name('showallticket');
Route::patch('/tickets/{id}/status', [TicketController::class, 'updateStatus'])->name('tickets.updateStatus');
Route::delete('/tickets/{id}', [TicketController::class, 'destroy'])->name('tickets.destroy');
Route::get('/tickets/{id}', [TicketController::class, 'show'])->name('show');



// feedback 

Route::post('/tickets/{id}/feedback', [TicketController::class, 'storeFeedback'])->name('tickets.storeFeedback');
