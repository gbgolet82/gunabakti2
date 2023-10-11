<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_akun' => Uuid::uuid4(), // Menggunakan UUID baru untuk setiap baris
                'id_klasifikasi' => '27fc3e23-36b0-45f8-ae6a-8ffc84ea5bec',
                'id_usaha' => 'ce34bc3b-cb66-4ff4-b68a-116f9fd99748',
                'akun' => 'Pengeluaran Operasional',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_akun' => Uuid::uuid4(), // Menggunakan UUID baru untuk setiap baris
                'id_klasifikasi' => '27fc3e23-36b0-45f8-ae6a-8ffc84ea5bec',
                'id_usaha' => 'ef71e15e-00c3-4c14-ad64-c6bd7aad0bd6',
                'akun' => 'Pengeluaran Operasional',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_akun' => Uuid::uuid4(), // Menggunakan UUID baru untuk setiap baris
                'id_klasifikasi' => '27fc3e23-36b0-45f8-ae6a-8ffc84ea5bec',
                'id_usaha' => '59d81fa0-7f42-4ce6-bf69-42b886a9c24e',
                'akun' => 'Pengeluaran Operasional',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_akun' => Uuid::uuid4(), // Menggunakan UUID baru untuk setiap baris
                'id_klasifikasi' => '27fc3e23-36b0-45f8-ae6a-8ffc84ea5bec',
                'id_usaha' => '12ffc768-b7fc-41e7-b869-21221425876e',
                'akun' => 'Pengeluaran Operasional',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Tambahkan data lain sesuai kebutuhan Anda
        ];

        // Masukkan data ke dalam tabel klasifikasi_laporan
        DB::table('akun')->insert($data);
    }
}
