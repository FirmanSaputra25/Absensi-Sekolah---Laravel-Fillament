<?php

use Illuminate\Support\Facades\Route;
use App\Filament\Resources\AbsensiResource;

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');

//     Route::middleware(['role:guru'])->group(function () {
//         Route::get('/admin/absensi', AbsensiResource::class)->name('absensi.index');
//     });
// });

Route::get('/', function () {
    return view('welcome');
});