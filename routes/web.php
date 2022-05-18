<?php

use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->role == 'admin') {
            return redirect(RouteServiceProvider::ADMIN);
        } elseif (Auth::user()->role == 'umum' || Auth::user()->role == 'asc') {
            return redirect(RouteServiceProvider::ANGGOTA);
        } else {
            return redirect(RouteServiceProvider::CALON);
        }
    } else {
        return view('welcome');
    }
});

Route::controller(AnggotaController::class)->middleware(['auth'])->group(function () {
    //Dashboard Calon Anggota
    Route::get('dashboard', 'index')->name('anggota.dashboard');

    //Daftar Anggota Umum
    Route::get('daftarumum', 'daftarumum')->name('anggota.daftarumum');

    //Daftar Anggota ASC
    Route::get('daftarasc', 'daftarasc')->name('anggota.daftarasc');

    //Simpan Pendaftaran Anggota Umum
    Route::post('daftarumum', 'simpanumum')->name('anggota.simpanumum');

    //Simpan Pendaftaran Anggota ASC
    Route::post('daftarasc', 'simpanasc')->name('anggota.simpanasc');

    //Lacak
    Route::get('lacak', 'lacak')->name('anggota.lacak');

    //Hasil Lacak
    Route::post('tracking', 'tracking')->name('anggota.tracking');

    //List Informasi
    Route::get('informasi', 'info')->name('anggota.info');

    //Show Informasi
    Route::get('informasi/{id}', 'showinfo')->name('anggota.showinfo');

    //Profile Anggota Umum
    Route::get('profilumum', 'profilumum')->name('anggota.profilumum');

    //Profile Anggota ASC
    Route::get('profilasc', 'profilasc')->name('anggota.profilasc');

    //Update Profile Anggota Umum
    Route::put('profilumum/{id}', 'updateprofilumum')->name('anggota.updateprofilumum');

    //Update Profile Anggota ASC
    Route::put('profilasc/{id}', 'updateprofilasc')->name('anggota.updateprofilasc');

    //ID Card Anggota Umum
    Route::get('identitasumum', 'identitasumum')->name('anggota.identitasumum');

    //ID Card Anggota ASC
    Route::get('identitasasc', 'identitasasc')->name('anggota.identitasasc');
});

Route::controller(AdminController::class)->middleware(['auth', 'is_admin'])->group(function () {
    //Dashboard Admin
    Route::get('admindashboard', 'index')->name('admin.dashboard');

    //List Anggota Umum
    Route::get('anggotaumum', 'umum')->name('admin.umum');

    //List Anggota ASC
    Route::get('anggotaasc', 'asc')->name('admin.asc');

    //Update Anggota Umum
    Route::put('anggotaumum/{id}', 'updateumum')->name('admin.updateumum');

    //Update Anggota ASC
    Route::put('anggotaasc/{id}', 'updateasc')->name('admin.updateasc');

    //Delete Anggota Umum
    Route::delete('anggotaumum/{id}', 'hapusumum')->name('admin.hapusumum');

    //Delete Anggota ASC
    Route::delete('anggotaasc/{id}', 'hapusasc')->name('admin.hapusasc');

    //List Informasi
    Route::get('admininformasi', 'info')->name('admin.info');

    //Add Informasi
    Route::post('admininformasi', 'tambahinfo')->name('admin.tambahinfo');

    //Update Informasi
    Route::put('admininformasi/{id}', 'updateinfo')->name('admin.updateinfo');

    //Delete Informasi
    Route::delete('admininformasi/{id}', 'hapusinfo')->name('admin.hapusinfo');

    //Profile Admin
    Route::get('adminprofil', 'profil')->name('admin.profil');

    //Update Profile Admin
    Route::put('adminprofil/{id}', 'updateprofil')->name('admin.updateprofil');
});

require __DIR__ . '/auth.php';
