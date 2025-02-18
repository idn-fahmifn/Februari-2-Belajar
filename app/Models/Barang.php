<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{

    use HasFactory;
    // definisikan nama table
    protected $table = 'barang';

    // mengenalkan column yang terdapat pada tabel barang.
    protected $fillable = [
        'nama_barang', 'qty', 'kategori', 'size', 'merk', 'deskripsi'
    ];

}
