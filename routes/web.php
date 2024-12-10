<?php

use App\Http\Controllers\BloodChemistryController;
use App\Http\Controllers\HematologyController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\PaperDashboardController;
use App\Http\Controllers\PrintFormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\UrineController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/time', function () {
    return [
        'app_time' => now()->toDateTimeString(),
        'server_time' => date('Y-m-d H:i:s'),
    ];
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/test', function () {
    return Inertia::render('Welcomev2', []);
});
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cache cleared successfully";
});


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // Paper Dashboard routes
    Route::controller(PaperDashboardController::class)->group(function () {
        Route::get('/papers/data', 'getData')->name('papers.data');
        Route::get('/offices/data', 'getOfficeData')->name('offices.data');
        Route::get('/papers/dashboard', 'index')->name('papers.dashboard');
    });

    // Print routes
    Route::get('/print/hematology/{hematology}', [PrintFormController::class, 'hematologyForm'])->name('hematologies.print');
    Route::get('/print/urine/{urine}', [PrintFormController::class, 'urineForm'])->name('urines.print');
    Route::get('/print/blood-chemistry/{bloodChemistry}', [PrintFormController::class, 'bloodChemistryForm'])->name('blood-chemistries.print');

    // Resource routes
    Route::resource('papers', PaperController::class);
    Route::resource('offices', OfficeController::class)->except(['destroy']);
    Route::resource('tags', TagController::class)->except(['destroy']);
    Route::resource('hematologies', HematologyController::class);
    Route::resource('urines', UrineController::class);
    Route::resource('blood-chemistries', BloodChemistryController::class);
});

Route::post('/theme/update', [ThemeController::class, 'update'])->name('theme.update');

require __DIR__ . '/auth.php';
