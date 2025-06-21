<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

use App\Livewire\Kegiatan\{Index, Create, Edit};

Route::middleware('auth')->group(function () {
    Route::get('/kegiatan', Index::class)->name('kegiatan.index');
    Route::get('/kegiatan/create', Create::class)->name('kegiatan.create');
    Route::get('/kegiatan/{id}/edit', Edit::class)->name('kegiatan.edit');
});

use App\Livewire\Organisasi\{Index as OrganisasiIndex, Create as OrganisasiCreate, Edit as OrganisasiEdit};

Route::middleware('auth')->group(function () {
    Route::get('/organisasi', OrganisasiIndex::class)->name('organisasi.index');
    Route::get('/organisasi/create', OrganisasiCreate::class)->name('organisasi.create');
    Route::get('/organisasi/{id}/edit', OrganisasiEdit::class)->name('organisasi.edit');
});

use App\Livewire\Lokasi\{Index as LokasiIndex, Create as LokasiCreate, Edit as LokasiEdit};

Route::middleware('auth')->group(function () {
    Route::get('/lokasi', LokasiIndex::class)->name('lokasi.index');
    Route::get('/lokasi/create', LokasiCreate::class)->name('lokasi.create');
    Route::get('/lokasi/{id}/edit', LokasiEdit::class)->name('lokasi.edit');
});

use App\Livewire\Anggota\{Index as AnggotaIndex, Create as AnggotaCreate, Edit as AnggotaEdit};

Route::middleware('auth')->group(function () {
    Route::get('/anggota', AnggotaIndex::class)->name('anggota.index');
    Route::get('/anggota/create', AnggotaCreate::class)->name('anggota.create');
    Route::get('/anggota/{id}/edit', AnggotaEdit::class)->name('anggota.edit');
});

use App\Livewire\Kepanitiaan\{Index as KepanitiaanIndex, Create as KepanitiaanCreate, Edit as KepanitiaanEdit};

Route::middleware('auth')->group(function () {
    Route::get('/kepanitiaan', KepanitiaanIndex::class)->name('kepanitiaan.index');
    Route::get('/kepanitiaan/create', KepanitiaanCreate::class)->name('kepanitiaan.create');
    Route::get('/kepanitiaan/{id}/edit', KepanitiaanEdit::class)->name('kepanitiaan.edit');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

use App\Livewire\Laporan\Index as LaporanIndex;

Route::get('/laporan', LaporanIndex::class)->name('laporan.index');




