<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\excelController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KompetensiKeahlianController;
use App\Http\Controllers\AsalKotaController;
use App\Http\Controllers\AsalSekolahController;
use App\Http\Controllers\JalurController;
use App\Http\Controllers\BuktiPpdbController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\DataPendaftarController;
use App\Http\Controllers\FormulirPendaftaranController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\DistanceController;
use App\Http\Controllers\JarakController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\MinatBakatController;
use App\Http\Controllers\NilaiRapotController;
use App\Http\Controllers\SMPController;

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
    return view('welcom');
});

//API MAPS
Route::get('/hitung-jarak', [JarakController::class, 'index']);
Route::post('/hitung-jarak', [JarakController::class, 'hitungJarak'])->name('hitung-jarak');

//API Open Source Route
Route::get('/calculate-distance', [DistanceController::class, 'showForm'])->name('show.calculate.distance');
Route::post('/calculate-distance', [DistanceController::class, 'calculateDistance'])->name('calculate.distance');
Route::get('/calculate-distance/result', [DistanceController::class, 'showResult'])->name('calculate.distance.result');

//REGISTER
Route::get('/register',[AuthController::class,'loadRegister']);
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/login',function(){
    return redirect('/');
});

//LOGIN
Route::get('/',[AuthController::class,'loadLogin']);
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/logout',[AuthController::class,'logout']);


// ********** Super Admin Routes *********
Route::group(['prefix' => 'super-admin','middleware'=>['web','isSuperAdmin']],function(){
    Route::get('/dashboard',[SuperAdminController::class,'dashboard']);
    Route::get('/dashboard',[SuperAdminController::class,'dashboardSpan'])->name('dashboardSuperAdmin');;

    // Asal Kelurahan
    Route::get('/asal-kelurahan', [KelurahanController::class, 'asalKelurahan'])->name('asalKelurahan');
    Route::get('/create-asal-kelurahan', [KelurahanController::class, 'loadCreateAsalKelurahan']);
    Route::post('/create-asal-kelurahan', [KelurahanController::class, 'createAsalKelurahan'])->name('createAsalKelurahan');
    Route::delete('/asal-kelurahan/delete/{id}', [KelurahanController::class, 'deleteAsalKelurahan'])->name('deleteAsalKelurahan');
    Route::get('/asal-kelurahan/edit/{id}', [KelurahanController::class, 'editAsalKelurahan'])->name('editAsalKelurahan');
    Route::put('/asal-kelurahan/update/{id}', [KelurahanController::class, 'updateAsalKelurahan'])->name('updateAsalKelurahan');
    Route::get('/asal-kelurahan/search', [KelurahanController::class, 'searchAsalKelurahan'])->name('asalKelurahan.search');


    //Panitia
    Route::get('/users',[SuperAdminController::class,'users'])->name('superAdminUsers');
    Route::delete('/users/delete/{id}',[SuperAdminController::class,'deleteUser'])->name('deleteUser');
    Route::get('/manage-role',[SuperAdminController::class,'manageRole'])->name('manageRole');
    Route::post('/update-role',[SuperAdminController::class,'updateRole'])->name('updateRole');
    Route::get('/create-user',[SuperAdminController::class,'loadCreateUser']);
    Route::post('/create-user',[SuperAdminController::class,'createUser'])->name('createUser');
    Route::get('/users/search',[SuperAdminController::class,'searchUser'])->name('searchUser');

    //Export To Excel
    Route::get('/export-to-excel',[excelController::class,'exportToExcel'])->name('exportToExcel');
    Route::get('/pendaftar/export', [excelController::class, 'exportPendaftar'])->name('pendaftar.export');


    //Jurusan
    Route::get('/jurusan',[JurusanController::class,'index'])->name('jurusan');
    Route::get('/jurusan/tambah',[JurusanController::class,'tambah'])->name('jurusantambah');
    Route::post('/jurusan/simpan',[JurusanController::class,'simpan'])->name('jurusansimpan');
    Route::delete('/jurusan/hapus/{id}', [JurusanController::class, 'hapus'])->name('jurusanhapus');
    Route::get('/jurusan/edit/{idjurusan}',[JurusanController::class,'edit'])->name('editJurusan');
    Route::put('/jurusan/update/{idjurusan}',[JurusanController::class,'update'])->name('updateJurusan');
    Route::get('/jurusan/search', [JurusanController::class, 'searchJurusan'])->name('searchJurusan');

    //Kompetensi Keahlian
    Route::get('/kompetensi-keahlian',[KompetensiKeahlianController::class,'index'])->name('kompetensiKeahlian');
    Route::get('/kompetensi-keahlian/tambah',[KompetensiKeahlianController::class,'tambah'])->name('kompetensiKeahlianTambah');
    Route::post('/kompetensi-keahlian/simpan',[KompetensiKeahlianController::class,'simpan'])->name('kompetensiKeahlianSimpan');
    Route::delete('/kompetensi-keahlian/hapus/{idkompetensikeahlian}', [KompetensiKeahlianController::class, 'hapus'])->name('kompetensiKeahlianHapus');
    Route::get('/kompetensi-keahlian/edit/{idkompetensikeahlian}',[KompetensiKeahlianController::class,'edit'])->name('kompetensiKeahlianEdit');
    Route::put('/kompetensi-keahlian/update/{idkompetensikeahlian}',[KompetensiKeahlianController::class,'update'])->name('kompetensiKeahlianUpdate');
    Route::get('/kompetensi-keahlian/search', [KompetensiKeahlianController::class, 'searchKompetensiKeahlian'])->name('searchKompetensiKeahlian');

    //Asal Kota
    Route::get('/asal-kota', [AsalKotaController::class, 'index'])->name('asal-kota.index');
    Route::get('/asal-kota/create', [AsalKotaController::class, 'create'])->name('asal-kota.create');
    Route::post('/asal-kota/store', [AsalKotaController::class, 'store'])->name('asal-kota.store');
    Route::delete('/asal-kota/{asalKota}', [AsalKotaController::class, 'destroy'])->name('asal-kota.destroy');
    Route::get('/asal-kota/search', [AsalKotaController::class, 'search'])->name('asal-kota.search');

    //Asal Sekolah
    Route::get('/asal-sekolah', [AsalSekolahController::class, 'index'])->name('asal-sekolah.index');
    Route::get('/asal-sekolah/create', [AsalSekolahController::class, 'create'])->name('asal-sekolah.create');
    Route::post('/asal-sekolah/store', [AsalSekolahController::class, 'store'])->name('asal-sekolah.store');
    Route::delete('/asal-sekolah/{id}', [AsalSekolahController::class, 'destroy'])->name('asal-sekolah.destroy');
    Route::get('/asal-sekolah/search', [AsalSekolahController::class, 'search'])->name('asal-sekolah.search');

    //Jalur
    Route::get('/jalur', [JalurController::class, 'index'])->name('jalur.index');
    Route::get('/jalur/create', [JalurController::class, 'create'])->name('jalur.create');
    Route::post('/jalur/store', [JalurController::class, 'store'])->name('jalur.store');
    Route::get('/jalur/{id}/edit', [JalurController::class, 'edit'])->name('jalur.edit');
    Route::put('/jalur/{id}/update', [JalurController::class, 'update'])->name('jalur.update');
    Route::delete('/jalur/{id}', [JalurController::class, 'destroy'])->name('jalur.destroy');
    Route::get('/jalur/search', [JalurController::class, 'search'])->name('jalur.search');

    //Bukti Jalur PPDB
    Route::get('/bukti-ppdb', [BuktiPpdbController::class, 'index'])->name('bukti-ppdb.index');
    Route::get('/bukti-ppdb/create', [BuktiPpdbController::class, 'create'])->name('bukti-ppdb.create');
    Route::post('/bukti-ppdb', [BuktiPpdbController::class, 'store'])->name('bukti-ppdb.store');
    Route::get('/bukti-ppdb/{id}/edit', [BuktiPpdbController::class, 'edit'])->name('bukti-ppdb.edit');
    Route::put('/bukti-ppdb/{id}', [BuktiPpdbController::class, 'update'])->name('bukti-ppdb.update');
    Route::delete('/bukti-ppdb/{id}', [BuktiPpdbController::class, 'destroy'])->name('bukti-ppdb.destroy');


    //Periode
    Route::get('/periode', [PeriodeController::class, 'index'])->name('periode.index');
    Route::get('/periode/create', [PeriodeController::class, 'create'])->name('periode.create');
    Route::post('/periode/store', [PeriodeController::class, 'store'])->name('periode.store');
    Route::get('/periode/{id}', [PeriodeController::class, 'show'])->name('periode.show');
    Route::get('/periode/{id}/edit', [PeriodeController::class, 'edit'])->name('periode.edit');
    Route::put('/periode/{id}', [PeriodeController::class, 'update'])->name('periode.update');
    Route::delete('/periode/{id}', [PeriodeController::class, 'destroy'])->name('periode.destroy');
    Route::post('/periode/search', [PeriodeController::class, 'search'])->name('periode.search');

});


// ********** Sub Admin Routes *********
Route::group(['prefix' => 'sub-admin','middleware'=>['web','isSubAdmin']],function(){
    Route::get('/dashboard',[SubAdminController::class,'dashboard']);


    Route::get('/pendaftar/verifikasi', [SubAdminController::class, 'pendaftar'])->name('udahpendaftar.index');
    Route::get('/pendaftar/export', [excelController::class, 'exportPendaftar'])->name('formulir.export');

    Route::get('/verifikasi-pendaftaran/{id}/edit', [SubAdminController::class, 'edit'])->name('verifikasi-pendaftaran.edit');
    Route::put('/verifikasi-pendaftaran/{id}', [SubAdminController::class, 'update'])->name('verifikasi-pendaftaran.update');



});


// ********** Asal Sekolah Routes *********
Route::group(['prefix' => 'asal-sekolah','middleware'=>['web','isSMP']],function(){
    Route::get('/dashboard',[SMPController::class,'dashboard']);

       // Pendaftar
       Route::get('/userpendaftar', [PendaftarController::class, 'index'])->name('pendaftar.index');
       Route::get('/userpendaftar/create', [PendaftarController::class, 'create'])->name('pendaftar.create');
       Route::post('/userpendaftar', [PendaftarController::class, 'store'])->name('pendaftar.store');
       Route::get('/userpendaftar/{id}', [PendaftarController::class, 'show'])->name('pendaftar.show');
       Route::get('/userpendaftar/{id}/edit', [PendaftarController::class, 'edit'])->name('pendaftar.edit');
       Route::put('/userpendaftar/{id}', [PendaftarController::class, 'update'])->name('pendaftar.update');
       Route::delete('/userpendaftar/{id}', [PendaftarController::class, 'destroy'])->name('pendaftar.destroy');
       Route::get('/pendaftar/search', [PendaftarController::class, 'search'])->name('pendaftar.search');

       Route::post('/import-excel', [UserController::class, 'importExcel'])->name('import.excel');



       Route::get('/pendaftar/export', [excelController::class, 'exportPendaftar'])->name('daftar.export');

       //Export
       Route::get('/nilai/import', [excelController::class, 'exportNilai'])->name('nilai.export');
       Route::get('/nilai/export', [excelController::class, 'importNilai'])->name('nilai.import');

       //Nilai Rapot
       Route::get('/nilai-rapot', [NilaiRapotController::class, 'index'])->name('nilai.index');

       Route::put('/nilai/{id_pendaftar}', [NilaiRapotController::class, 'update'])->name('nilai.update');


       Route::get('/nilai/{id}', [NilaiRapotController::class, 'show'])->name('nilai.show');
       Route::get('/nilai/{id}/edit', [NilaiRapotController::class, 'edit'])->name('nilai.edit');
       Route::delete('/nilai/{id}', [NilaiRapotController::class, 'destroy'])->name('nilai.destroy');
       Route::get('/nilai/search', [NilaiRapotController::class, 'search'])->name('nilai.search');


});


// ********** Admin Routes *********
Route::group(['prefix' => 'admin','middleware'=>['web','isAdmin']],function(){
    Route::get('/dashboard',[AdminController::class,'dashboard']);

    //Informasi PPDB
    Route::get('/informasi/ppdb', [AdminController::class, 'informasiPPDB'])->name('informasiPPDB');
    Route::get('/create-informasi/ppdb',[AdminController::class,'loadCreateInformasiPPDB']);
    Route::post('/create-informasi/ppdb',[AdminController::class,'createInformasiPPDB'])->name('createInformasiPPDB');
    Route::delete('/informasi/delete/{id}/ppdb',[AdminController::class,'deleteInformasiPPDB'])->name('deleteInformasiPPDB');
    Route::get('/informasi/edit/{id}/ppdb',[AdminController::class,'editPPDB'])->name('editInformasiPPDB');
    Route::put('/informasi/update/{id}/ppdb', [AdminController::class, 'updatePPDB'])->name('updateInformasiPPDB');
    Route::get('/informasi/search/ppdb',[AdminController::class,'searchPPDB'])->name('informasiPPDB.search');


    //Informasi Sekolah
    Route::get('/informasi/sekolah', [AdminController::class, 'informasiSekolah'])->name('informasiSekolah');
    Route::get('/create-informasi/sekolah',[AdminController::class,'loadCreateInformasiSekolah']);
    Route::post('/create-informasi/sekolah',[AdminController::class,'createInformasiSekolah'])->name('createInformasiSekolah');
    Route::delete('/informasi/sekolah/delete/{id}',[AdminController::class,'deleteInformasiSekolah'])->name('deleteInformasiSekolah');
    Route::get('/informasi/sekolah/edit/{id}',[AdminController::class,'editSekolah'])->name('editInformasiSekolah');
    Route::put('/informasi/update/{id}',[AdminController::class,'updateSekolah'])->name('updateInformasiSekolah');
    Route::get('/informasi/sekolah/search',[AdminController::class,'searchSekolah'])->name('informasiSekolah.search');



});



// ********** Administrator Routes *********
Route::group(['middleware'=>['web','isUser']],function(){
    Route::get('/dashboard',[UserController::class,'dashboard']);

    //Data PEndaftar
    Route::get('/pendaftar', [DataPendaftarController::class, 'index'])->name('userpendaftar.index');
    Route::get('/pendaftar/create', [DataPendaftarController::class, 'create'])->name('userpendaftar.create');
    Route::post('/pendaftar', [DataPendaftarController::class, 'store'])->name('userpendaftar.store');
    Route::get('/pendaftar/{id}/edit', [DataPendaftarController::class, 'edit'])->name('userpendaftar.edit');
    Route::put('/pendaftar/{id}', [DataPendaftarController::class, 'update'])->name('userpendaftar.update');
    Route::delete('/pendaftar/{id}', [DataPendaftarController::class, 'destroy'])->name('userpendaftar.destroy');
    Route::get('/pendaftar/detail/{id}', [DataPendaftarController::class, 'show'])->name('userpendaftar.show');
    Route::get('/pendaftar/search', [DataPendaftarController::class, 'search'])->name('userpendaftar.search');

    //Formulir Pendaftaran
    Route::get('/formulir-pendaftaran', [FormulirPendaftaranController::class, 'index'])->name('formulir-pendaftaran.index');
    Route::get('/formulir-pendaftaran/create', [FormulirPendaftaranController::class, 'create'])->name('formulir-pendaftaran.create');
    Route::post('/formulir-pendaftaran', [FormulirPendaftaranController::class, 'store'])->name('formulir-pendaftaran.store');
    Route::get('/formulir-pendaftaran/{id}', [FormulirPendaftaranController::class, 'show'])->name('formulir-pendaftaran.show');
    Route::get('/formulir-pendaftaran/{id}/edit', [FormulirPendaftaranController::class, 'edit'])->name('formulir-pendaftaran.edit');
    Route::put('/formulir-pendaftaran/{id}', [FormulirPendaftaranController::class, 'update'])->name('formulir-pendaftaran.update');
    Route::delete('/formulir-pendaftaran/{id}', [FormulirPendaftaranController::class, 'destroy'])->name('formulir-pendaftaran.destroy');
    Route::get('/formulir-pendaftaran/search', [FormulirPendaftaranController::class, 'search'])->name('formulir-pendaftaran.search');
    Route::get('/formulir/export', [excelController::class, 'exportPendaftar'])->name('formulir.export');
    Route::get('/formulir/export', [excelController::class, 'exportPendaftar'])->name('pendaftar.export');


    Route::get('/formulir/search', [FormulirPendaftaranController::class, 'search'])->name('formulir.search');




    Route::get('/minat-bakat', [MinatBakatController::class, 'index'])->name('minatBakat.index');
    Route::get('/minat-bakat/create', [MinatBakatController::class, 'create'])->name('minatBakat.create');
    Route::post('/minat-bakat', [MinatBakatController::class, 'store'])->name('minatBakat.store');
    Route::get('/minat-bakat/{id}', [MinatBakatController::class, 'show'])->name('minatBakat.show');
    Route::get('/minat-bakat/{id}/edit', [MinatBakatController::class, 'edit'])->name('minatBakat.edit');
    Route::put('/minat-bakat/{id}', [MinatBakatController::class, 'update'])->name('minatBakat.update');
    Route::delete('/minat-bakat/{id}', [MinatBakatController::class, 'destroy'])->name('minatBakat.destroy');
    Route::get('/minat-bakat/search', [MinatBakatController::class, 'search'])->name('minatBakat.search');

});
