<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiLaporan;
use App\Models\Usaha;
use Illuminate\Http\Request;

class KlasifikasiLaporanController extends Controller
{
    public function index(Request $request)
    {
        //get data tabel klasifikasi
        $dataKlasifikasi = KlasifikasiLaporan::select('id_klasifikasi', 'klasifikasi_laporan', 'created_at', 'updated_at')->get();

        //get data tabel usaha
        $dataUsaha = Usaha::select('id_usaha', 'nama_usaha', 'alamat_usaha', 'jenis_usaha', 'produk_usaha')
            ->get();
        $modelHead = "Tambah Data Klasifikasi & Akun";
        $active_page = "AKUN";
        return view('contents.klasifikasi', compact('active_page', 'modelHead', 'dataKlasifikasi', 'dataUsaha'));
    }

    public function simpan(Request $request)
    {
        $request->validate(
            [
                'klasifikasi' => 'required',
                'unit_usaha' => 'required',
                'akun' => 'required',
                'sub_akun_1' => 'required',
                'sub_akun_2' => 'required',
                'sub_akun_3' => 'required',
                'bukti_valid' => 'required|image|mimes:jpeg,jpg,png|max:3000',
            ],
            [
                'klasifikasi.required' => 'Klasifikasi harus dipilih',
                'unit_usaha.required' => 'Unit Usaha harus dipilih',
                'akun.required' => 'Akun harus dipilih',
                'akun.required' => 'Akun harus dipilih',
                'sub_akun_1.required' => 'Sub Akun 1 belum dipilih',
                'sub_akun_2.required' => 'Sub Akun 2 belum dipilih',
                'sub_akun_3.required' => 'Sub Akun 3 belum dipilih',
                'bukti_valid.required' => 'Bukti valid tidak boleh kosong',
                'bukti_valid.image' => 'Bukti valid harus berupa file gambar',
                'bukti_valid.mimes' => 'Bukti valid harus memiliki format jpeg, jpg, atau png',
                'bukti_valid.max' => 'Bukti valid maksimal memiliki ukuran 3 MB',
            ]
        );

        $idKlasifikasi = $request->post('id_klasifikasi');
        $unitKerja = $request->post('id_usaha');
        $akun = $request->post('id_akun');
        $buktiValid = $request->post('id_bukti_valid');

        // $saveKlasifikasi = KlasifikasiLaporan::create([
        //     'id_klasifikasi' => $idKlasifikasi,
        // ]);

        // $saveUnitKerja = Usaha::create([
        //     'id_usaha' => $unitKerja,
        // ]);

        // $saveAkun = Akun::create([
        //     'id_akun' => $akun,
        // ]);

        // $saveBuktiValid = BuktiValid::create([
        //     'id_bukti_valid' => $akun,
        // ]);
    }
}
