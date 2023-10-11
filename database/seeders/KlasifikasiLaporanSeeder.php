<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class KlasifikasiLaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_klasifikasi' => Uuid::uuid4(), // Menggunakan UUID baru untuk setiap baris
                'klasifikasi_laporan' => 'Pemasukan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_klasifikasi' => Uuid::uuid4(), // Menggunakan UUID baru untuk setiap baris
                'klasifikasi_laporan' => 'Pengeluaran Operasional',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_klasifikasi' => Uuid::uuid4(), // Menggunakan UUID baru untuk setiap baris
                'klasifikasi_laporan' => 'Pengeluaran Non Operasional',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
            // Tambahkan data lain sesuai kebutuhan Anda
        ];

        // Masukkan data ke dalam tabel klasifikasi_laporan
        DB::table('klasifikasi_laporan')->insert($data);
    }
}
