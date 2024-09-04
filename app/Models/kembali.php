<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kembali extends Model
{
    use HasFactory;

    public $fillable = ['jumlah','tanggal_kembali','nama','status','id_minjem','id_data'];
    public $visible = ['jumlah','tanggal_kembali','nama','status','id_minjem','id_data'];
    public $timestamps = true;

    public function buku() {
        return $this->belongsTo(Buku::class,'id_buku');
    }

    public function minjem() {
        return $this->belongsTo(Minjem::class,'id_minjem');
    }
}
