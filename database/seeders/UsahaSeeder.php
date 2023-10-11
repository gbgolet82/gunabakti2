<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UsahaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('usaha')->insert([
                'id_usaha' => Str::uuid(),
                'nama_usaha' => $faker->company,
                'alamat_usaha' => $faker->address,
                'jenis_usaha' => $faker->word,
                'produk_usaha' => $faker->word,
            ]);
        }
    }
}
