<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    public $fillable = ['nama_kategori'];
    public $visible = ['nama_kategori'];
    public $timestamps = true;

    public function kategori()
    {
        return $this->hasMany(kategori::class, 'id_kategori');
    }
}
