<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;

/*

*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//วิธีที่ 1 เรียกวิว ตรงๆ
// Route::get('/about',function(){return view('about');});
// Route::get('/contact', function(){return view('contact');});

// วิธีที่ 2 เรียกวิวผ่าน Controller แบบแยก
// Route::get('/aboute',[DemoController::class, 'about']);
// Route::get('/contact', [DemoController::class, 'contact']);

//วิะีที่ 3 เรียก ผ่าน Route group Function
Route::controller(DemoController::class)->group(function(){
    Route::get('/about','about')->name('about.page');
    Route::get('/contact','contact')->name('contact.page');
});
//