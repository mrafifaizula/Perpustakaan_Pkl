<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profil extends Model
{
    use HasFactory;
    public $fillable = ['alamat','tlp','image_profil', 'id_user'];
    public $visible = ['alamat','tlp','image_profil', 'id_user'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(user::class, 'id_user');

    }
}
