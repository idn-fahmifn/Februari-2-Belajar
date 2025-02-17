<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    // definisikan nama table
    protected $table = 'barang';

    // mengenalkan column yang terdapat pada tabel barang.
    protected $fillable = [
        'nama_barang', 'qty', 'kategori', 'size', 'merk', 'deskripsi'
    ];

}
