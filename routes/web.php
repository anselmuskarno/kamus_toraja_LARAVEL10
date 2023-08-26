<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\BahasaController;
use App\Models\User;
use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\Berita;
use App\Models\Bahasa;
use App\Models\Agenda;
use App\Models\Keranjang;
use App\Models\Guru;
use App\Models\Pengumuman;
use App\Models\Galleri;
use App\Models\Siswa;
use App\Models\Pemasukan;

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/cariKata', [BahasaController::class, 'cariKata']);
Route::post('/tambahBahasa', [BahasaController::class, 'tambahBahasa']);
Route::post('/editBahasa/{id}', [BahasaController::class, 'updateBahasa']);
Route::get('/hapusBahasa/{id}', [BahasaController::class, 'hapusBahasa']);
Route::get('/', function () {
    $sorted = Bahasa::All()->sortBy('bahasa_indonesia');
    return view('home', [
        'bahasa' => Bahasa::All(),
        'hasilpencarian' => "0",
        'nama' => "0"
    ]);
});
Route::get('/dashboardAdmin', function () {
    return view('admin/index', [
        'bahasa' => Bahasa::All(),
        'totalbahasa' => Bahasa::All()->count()
    ]);
});
Route::get('/bahasa', function () {
    return view('admin/bahasa', [
        'bahasa' => Bahasa::All()
    ]);
});
