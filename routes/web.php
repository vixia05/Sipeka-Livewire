<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndikatorPenilaianController;

use App\Http\Livewire\DashboardController;
use App\Http\Livewire\EntryNilaiController;
use App\Http\Livewire\GradePegawaiController;
use App\Http\Livewire\IndikatorPenilaianLivewire;
use App\Http\Livewire\AddIndikatorPenilaianController;
use App\Http\Livewire\ReportPegawaiController;
use App\Http\Livewire\ShowIndikator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard',DashboardController::class)->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/indikatorPenilaian', IndikatorPenilaianController::class);

    Route::get('/entryNilai',EntryNilaiController::class)->name('entryNilai');
    Route::get('/gradePegawai',GradePegawaiController::class)->name('gradePegawai');
    Route::get('/addIndikator',AddIndikatorPenilaianController::class)->name('addIndikator');
    // Route::get('/indikatorPenilaian',IndikatorPenilaianController::class)->name('indikatorPenilaian');
    // Route::get('/indikatorPenilaian/{id}',ShowIndikator::class)->name('showIndikator');
    Route::get('/reportPegawai',ReportPegawaiController::class)->name('reportPegawai');
});

require __DIR__.'/auth.php';
