<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $guarded;

    public function kategori()
    {
        // relasi ORM.
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
