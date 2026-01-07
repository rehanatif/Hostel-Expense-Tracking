<?php

use App\Http\Controllers\DegreeProgramController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FeeCollection;
use App\Http\Controllers\FeeCollectionController;
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

    Route::controller(FeeCollectionController::class)->group(function () {
        Route::match(['get', 'post'], 'fee_collections', 'index')->name('fee_collections');
        Route::match(['get', 'post'], 'fee_collections/create', 'create')->name('fee_collections.create');
        Route::match(['get', 'post'], 'fee_collections/update', 'update')->name('fee_collections.update');
        Route::match(['get', 'post'], 'fee_collections/list', 'list')->name('fee_collections.list');
    });

    Route::controller(ExpenseController::class)->group(function () {
        Route::match(['get', 'post'], 'expenses', 'index')->name('expenses');
        Route::match(['get', 'post'], 'expense/create', 'create')->name('expense.create');
        Route::match(['get', 'post'], 'expense/update', 'update')->name('expense.update');
        Route::match(['get', 'post'], 'expenses/list', 'list')->name('expenses.list');
    });

    Route::controller(DegreeProgramController::class)->group(function () {
        Route::match(['get', 'post'], 'degree_programs', 'index')->name('degree_programs');
        Route::match(['get', 'post'], 'degree_programs/create', 'create')->name('degree_programs.create');
        Route::match(['get', 'post'], 'degree_programs/list', 'list')->name('degree_programs.list');
    });
});


require __DIR__ . '/auth.php';
