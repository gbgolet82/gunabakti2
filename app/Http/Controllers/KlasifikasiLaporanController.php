<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\KlasifikasiLaporan;
use App\Models\Usaha;
use Illuminate\Http\Request;

class KlasifikasiLaporanController extends Controller
{
    public function index(Request $request)
    {
        //get data tabel klasifikasi
        $dataKlasifikasi = KlasifikasiLaporan::select('id_klasifikasi', 'klasifikasi_laporan', 'created_at', 'updated_at')->orderBy('klasifikasi_laporan', 'asc')->get();

        //get data tabel usaha
        $dataUsaha = Usaha::select('id_usaha', 'nama_usaha', 'alamat_usaha', 'jenis_usaha', 'produk_usaha')
            ->get();

        //get data tabel klasifikasi akun
        $dataAkun = KlasifikasiLaporan::select(
            'klasifikasi_laporan.klasifikasi_laporan as klasifikasi',
            'usaha.nama_usaha as usaha',
            'akun.akun as akun',
            'sub_akun_1.sub_akun_1 as sub_akun_1',
            'sub_akun_2.sub_akun_2 AS sub_akun_2',
            'klasifikasi_laporan.klasifikasi_laporan as klasifikasi_laporan',
            'usaha.nama_usaha as nama_usaha',
        )
            ->leftJoin('akun', 'klasifikasi_laporan.id_klasifikasi', '=', 'akun.id_klasifikasi')
            ->leftJoin('usaha', 'akun.id_usaha', '=', 'usaha.id_usaha')
            ->leftJoin('sub_akun_1', 'akun.id_akun', '=', 'sub_akun_1.id_akun')
            ->leftJoin('sub_akun_2', 'sub_akun_1.id_sub_akun_1', '=', 'sub_akun_2.id_sub_akun_1')
            ->orderBy('klasifikasi_laporan', 'asc')
            ->get();

            // dd($dataAkun)

        $modelHead = "Tambah Data Klasifikasi & Akun";
        $active_page = "AKUN";
        return view('contents.klasifikasi', compact('active_page', 'modelHead', 'dataKlasifikasi', 'dataUsaha', 'dataAkun'));
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

        if ($request->has('custom_akun')) {
            $idKlasifikasi = $request->post('id_klasifikasi');
            $unitKerja = $request->post('id_usaha');
            $akun = $request->post('custom_akun');

            $saveAkun = Akun::create([
                'id_akun' => $akun,
                'id_klasifikasi' => $idKlasifikasi,
                'id_usaha' => $unitKerja,
                'akun' => $unitKerja,
            ]);
        } else {
            $akun = $request->post('id_akun');
            // Jika pengguna memilih akun yang sudah ada, Anda bisa menentukan bagaimana akan menangani data ini.
        }

        if ($request->has('custom_sub_akun')) {
            $idKlasifikasi = $request->post('id_klasifikasi');
            $unitKerja = $request->post('id_usaha');
            $akun = $request->post('custom_akun');
            $subakun = $request->post('custom_sub_akun');

            $saveAkun = Akun::create([
                'id_sub_akun' => $subakun,
                'id_akun' => $akun,
                'sub_akun_1' => $akun
            ]);
        } else {
            $akun = $request->post('id_akun');
            // Jika pengguna memilih akun yang sudah ada, Anda bisa menentukan bagaimana akan menangani data ini.
        }

        // $saveKlasifikasi = KlasifikasiLaporan::create([
        //     'id_klasifikasi' => $idKlasifikasi,
        // ]);

        // $saveUnitKerja = Usaha::create([
        //     'id_usaha' => $unitKerja,
        // ]);


        // $saveBuktiValid = BuktiValid::create([
        //     'id_bukti_valid' => $akun,
        // ]);
    }
}
