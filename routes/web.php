<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Middleware\UmurMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // tampilkan file yang ada di folder views -> welcome
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


