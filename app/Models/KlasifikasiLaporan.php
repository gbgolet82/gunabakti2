<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiLaporan extends Model
{
    // use HasFactory;

    protected $table = 'klasifikasi_laporan';
    protected $primaryKey = 'id_klasifikasi';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id_klasifikasi',
        'klasifikasi_laporan',
        'created_at',
        'updated_at'
    ];
}
