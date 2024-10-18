<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/ncms/financeiro', function () {
  return Inertia::render('Financeiro');
})->middleware(['auth', 'verified'])->name('ncms.financeiro');
