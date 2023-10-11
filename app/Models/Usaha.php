<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Usaha extends Model
{
    // use HasFactory;

    protected $table = 'usaha';
    protected $primaryKey = 'id_usaha';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id_usaha',
        'nama_usaha',
        'alamat_usaha',
        'jenis_usaha',
        'produk_usaha',
        'created_at',
        'updated_at'
    ];
}
