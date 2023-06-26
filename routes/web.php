<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;


/*

*/

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
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

//AuthController Route
Route::controller(AuthController::class)->group(function(){
    Route::get('/admin/logout','AdminLogout')->name('AdminLogout');
    Route::get('/admin/login','AdminLoginView')->name('AdminLoginView');
//    Route::get('/admin/auth','authenticate')->name('authenticate');
});

Route::post('admin/auth', [AuthController::class, 'authenticate'])->name('authenticate');

//AdminController Route
Route::controller(AdminController::class)->group(function (){
    Route::get('/admin/profile/view','AdminProfileView')->name('admin.profile.view');
    Route::post('/store/profile','StoreProfile')->name('StoreProfile');
    Route::get('/change/password/view','ChangePasswordView')->name('ChangePasswordView');
    Route::post('/change/password','ChangePassword')->name('ChangePassword');

});

//HomeSlideController Route
Route::controller(HomeSliderController::class)->group(function (){
    Route::get('/home/slide/view','HomeSlider')->name('home.slide.view');
    Route::post('/update/slider','UpdateSlider')->name('update.slider');

});


//AboutController Route
Route::controller(AboutController::class)->group(function (){
    Route::get('/about/view','AboutePageView')->name('about.page.view');
    Route::post('/update/about','UpdateAbout')->name('update.about');
    Route::get('/about','HomeAbout')->name('home.about');


});
