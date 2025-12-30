<?php

use App\Http\Controllers\DegreeProgramController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;


Route::get('/', function () {
    return view('welcome');
});

Route::post('change/lang', function () {
    App::setLocale(request()->lang);
    session()->put('locale', request()->lang);

    return response()->json(['status' => true]);
})->name('admin.changeLocalization');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/change_dp', [ProfileController::class, 'changeDP'])->name('change_dp');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(SettingController::class)->group(function () {
        Route::match(['get', 'post'], 'change_logo', 'changeLogo')->name('change_logo');
        Route::post('change_fave_icon', 'changeFavIcon')->name('change_fave_icon');
        Route::get('clear_cache', 'cacheClear')->name('clear_cache');
    });
    Route::controller(StudentController::class)->group(function () {
        Route::match(['get', 'post'], 'students', 'index')->name('students');
        Route::match(['get', 'post'], 'students/create', 'create')->name('students.create');
        Route::match(['get', 'post'], 'students/update', 'update')->name('students.update');
        Route::get('get', 'change_status')->name('students.change_status');
    });

    Route::controller(DegreeProgramController::class)->group(function () {
        Route::match(['get', 'post'], 'degree_programs', 'index')->name('degree_programs');
        Route::match(['get', 'post'], 'degree_programs/create', 'create')->name('degree_programs.create');
        Route::match(['get', 'post'], 'degree_programs/list', 'list')->name('degree_programs.list');
    });
});


require __DIR__ . '/auth.php';
