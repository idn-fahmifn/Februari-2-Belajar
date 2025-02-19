<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\UmurMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Simple route
Route::get('fahmi', function(){
    // menampilkan output string
    // return 'Ini adalah halaman fahmi';

    return redirect()->route('fahmi.page');

})->name('fahmi');

Route::get('halaman-fahmi', function(){
    return view('halaman.fahmi');
})->name('fahmi.page');

// memberikan nama pada route
Route::get('thoriq', function(){
    return 'Ini adalah halaman thoriq';
})->name('halaman.toriq');

// route dengan parameter.
Route::get('mobil/{param?}', function($mobil = null){
    return 'Saya memiliki mobil : ' . $mobil;
});

// Membuat group pada routing : 
// nama utama
Route::prefix('training')->group(function(){
    // item route
    // ada route apa saja yang termasuk kedalam prefiz /training.
    Route::get('laravel', function(){
        return 'Ini kelas laravel';
    })->name('laravel');

    Route::get('mtcna', function(){
        return 'Ini kelas mtcna';
    })->name('mtcna');

    Route::get('ccna', function(){
        return 'Ini kelas ccna';
    });

    Route::get('linux', function(){
        return 'Ini kelas linux';
    });
});

Route::prefix('umur')->group(function(){

    // halaman form
    Route::get('form', function(){
        return view('umur.form');
    })->name('form.umur');

    // halaman main
    Route::get('sukses', function(){
        return view('umur.main');
    })->middleware(UmurMiddleware::class)->name('sukses');

    // route mengolah data umur
    Route::post('umur', function(Request $req){
        // aturan untuk input nilai.
        $req->validate([
            'nama' => ['string', 'min:1', 'max:30', 'required'],
            'umur' => ['integer', 'min:1', 'max:100', 'required']
        ]);

        //membuat key umur agar data umur bisa diakses di middleware 
        $req->session()->put('umur', $req->umur);

        // mengarahkan ke route selanjutnya (sukses).
        return redirect()->route('sukses')->with('success', 'Kamu berhasil Masuk.');

    })->name('umur.store');
});

Route::get('employee', [EmployeeController::class, 'index']);

// memanggil controller resource
Route::resource('barang', BarangController::class);

Route::get('report', [BarangController::class, 'report'])->name('report');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // route CRUD kategori dan menu.
    // route kategori
    Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('kategori/{param}', [KategoriController::class, 'detail'])->name('kategori.detail');
    Route::put('kategori/{param}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('kategori/{param}', [KategoriController::class, 'delete'])->name('kategori.delete');

    // route untuk menu
    Route::get('menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('menu', [MenuController::class, 'store'])->name('menu.store');
    Route::get('menu/{param}', [MenuController::class, 'detail'])->name('menu.detail');




});

require __DIR__.'/auth.php';
