<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| /home/geoffray/Documents/my_php_projects/document-management/app/Http/Controllers
| /DocumentController.php
| [RegisterController::class,'index']
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('documents', DocumentController::class)->except(['edit', 'update', 'destroy']);
Route::get('documents/{id}/download', [DocumentController::class, 'download'])->name('documents.donwload');


