<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;


class Karyawan extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use HasFactory;
    // Tentukan bahwa primary key bukanlah incrementing integer
    public $incrementing = false;

    // Tentukan tipe data primary key sebagai UUID
    protected $keyType = 'string';
    protected $table="karyawan";
    protected $guarded = [];
    protected $primaryKey = 'id_karyawan';
}
