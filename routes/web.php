<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TipsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;


// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {

    //routes all controller
    Route::resource('guides', GuideController::class)->except(['index', 'show']);
    Route::resource('news', NewsController::class);
    Route::resource('tips', TipsController::class)->except(['index', 'show']);
    Route::resource('profiles', ProfileController::class);
    Route::resource('content', ContentController::class);

    //routes guides
    Route::get('/guides', [GuideController::class, 'index'])->name('guides.index');
    Route::get('/guides/create', [GuideController::class, 'create'])->name('guides.create');
    Route::post('/guides', [GuideController::class, 'store'])->name('guides.store');
    Route::get('/guides/{guide}/edit', [GuideController::class, 'edit'])->name('guides.edit');
    Route::put('/guides/{guide}', [GuideController::class, 'update'])->name('guides.update');
    Route::delete('/guides/{id}', [GuideController::class, 'destroy'])->name('guides.destroy');

    //routes news
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    //routes tips
    Route::get('/tips', [TipsController::class, 'index'])->name('tips.index');
    Route::get('/tips/create', [TipsController::class, 'create'])->name('tips.create');
    Route::post('/tips', [TipsController::class, 'store'])->name('tips.store');
    Route::get('/tips/{tip}/edit', [TipsController::class, 'edit'])->name('tips.edit');
    Route::put('/tips/{tip}', [TipsController::class, 'update'])->name('tips.update');
    Route::delete('/tips/{id}', [TipsController::class, 'destroy'])->name('tips.destroy');
});

//routes client login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/Vguides', [ClientController::class, 'vguide']);
    Route::get('/Vnews', [ClientController::class, 'vnews']);
    Route::get('/Vtips', [ClientController::class, 'vtips']);
    Route::get('/Vcontent', [ClientController::class, 'vcontent']);
});

//routes all user
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'welcome']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



require __DIR__.'/auth.php';
