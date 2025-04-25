<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InsertController;
use App\Http\Controllers\BlogController;


Route::get('/', [BlogController::class, 'index'])->name('index');
Route::get('/allblog', [BlogController::class, 'allblog'])->name('allblog');



Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'register']);

Route::post('/tables', [AuthController::class, 'adminregister'])->name('tables');


Route::get('/admin', [AuthController::class, 'admin'])->name('admin');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/tables', [InsertController::class, 'tables'])->name('tables');
Route::get('/tables/{id}/edit', [InsertController::class, 'edit'])->name('tables.edit');
Route::post('/tables/{id}', [InsertController::class, 'update'])->name('tables.update');
Route::delete('/tables/{id}', [InsertController::class,'dead'])->name('tables.dead');

Route::get('/services', [InsertController::class, 'services'])->name('services');
Route::post('/services', [InsertController::class, 'insertdata'])->name('insertdata');

Route::get('/customer', [InsertController::class, 'customer'])->name('customer');
Route::post('/customer/store', [InsertController::class, 'store'])->name('customer.store');
Route::get('/customer/{id}/edits', [InsertController::class, 'edits'])->name('customer.edits');
Route::post('/customer/{product}/updates',[InsertController::class, 'updates'])->name('customer.updates');
Route::delete('/customer/{id}', [InsertController::class,'destroy'])->name('customer.destroy');




Route::post('/services/{id}/updated', [InsertController::class, 'updated'])->name('services.updated');
Route::delete('/services/{id}', [InsertController::class,'remove'])->name('services.remove');


Route::post('/import-csv', [InsertController::class, 'importCsv'])->name('import.csv');


Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::post('/blog', [BlogController::class, 'store'])->name('store');

Route::delete('/allblog/{id}', [BlogController::class, 'destroy'])->name('allblog.destroy');
Route::get('/blogedit/{id}', [BlogController::class, 'blogedit'])->name('blogedit');
Route::post('/blogupdate/{id}', [BlogController::class, 'blogupdate'])->name('blogupdate');


Route::get('/restore', [BlogController::class, 'data'])->name('restore');
//----------------------Restore-------------------------------------------------------------->
Route::get('/allblog/trashed', [BlogController::class, 'trashed'])->name('blog.trashed');
Route::put('/allblog/{id}/restore', [BlogController::class, 'restore'])->name('blog.restore');
Route::delete('/allblog/{id}/force-delete', [BlogController::class, 'forceDelete'])->name('blog.forceDelete');


Route::get('/form', [BlogController::class, 'forms'])->name('form');
Route::post('/form/send', [BlogController::class, 'send'])->name('form.send');



















