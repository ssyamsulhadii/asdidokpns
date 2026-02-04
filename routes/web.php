<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;


Route::get('/input-dokumen-dbms', [DataController::class, 'index'])->name('beranda');
Route::get('/search', [DataController::class, 'search'])->name('search');
Route::post('/upload-dokumen/{nip}/save', [DataController::class, 'uploadDokumen'])->name('upload.dokumen');

Route::redirect('/', 'input-dokumen-dbms');