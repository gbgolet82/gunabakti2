<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Laporan;
use App\Models\Usaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LaporanController extends Controller
{
    public function index(Request $request)
    {

        //get data tabel klasifikasi akun
        $data = Laporan::select(
            'klasifikasi_laporan.klasifikasi_laporan as klasifikasi',
            'usaha.nama_usaha as usaha',
            'akun.akun as akun',
            'sub_akun_1.sub_akun_1 as sub_akun_1',
            'sub_akun_2.sub_akun_2 as sub_akun_2',
            'sub_akun_3.sub_akun_3 as sub_akun_3',
            'laporan.kode_laporan as kode_laporan',
            'laporan.tanggal_laporan as tanggal_laporan',
            'laporan.nominal as nominal',
            'laporan.gambar_bukti as gambar_bukti',
            'laporan.status_cek as status_cek',
            'laporan.id_laporan as id_laporan'
        )
        ->selectRaw('(SELECT karyawan.nama FROM karyawan WHERE karyawan.kasir = "1" AND karyawan.id_usaha = usaha.id_usaha) AS nama_kasir')
        ->selectRaw('(SELECT karyawan.nama FROM karyawan WHERE karyawan.manajer = "1" AND karyawan.id_usaha = usaha.id_usaha) AS nama_manajer')
        ->join('akun', 'akun.id_akun', '=', 'laporan.id_akun')
        ->join('klasifikasi_laporan', 'akun.id_klasifikasi', '=', 'klasifikasi_laporan.id_klasifikasi')
        ->join('usaha', 'laporan.id_usaha', '=', 'usaha.id_usaha')
        ->leftJoin('sub_akun_1', 'akun.id_akun', '=', 'sub_akun_1.id_akun')
        ->leftJoin('sub_akun_2', 'sub_akun_1.id_sub_akun_1', '=', 'sub_akun_2.id_sub_akun_1')
        ->leftJoin('sub_akun_3', 'sub_akun_2.id_sub_akun_2', '=', 'sub_akun_3.id_sub_akun_2')
        ->where('usaha.id_usaha', session('id_usaha')) // Filter berdasarkan id_usaha dari sesi
        ->orderBy('laporan.created_at', 'desc')
        ->get();
        

        // dd($data);
        // $modelHead = "Tambah Data Klasifikasi & Akun";
        $active_page = "PEMASUKAN";
        return view('contents.pemasukan', compact('active_page', 'data'));
    }

    public function getJumlahBelumDicek()
    {
        $jumlahBelumDicek = Laporan::where('status_cek', 'Belum dicek')
        ->where('laporan.id_usaha', session('id_usaha'))
        ->count();
        // dd($jumlahBelumDicek);

        return response()->json(['jumlah' => $jumlahBelumDicek]);
    }



// public function fetchData(Request $request)
// {
//     $akun = $request->input('akun');
//     $subAkun1 = $request->input('sub_akun_1');

//     // Lakukan query database berdasarkan filter yang dipilih.
//     $data = Akun::where('akun', $akun)
//         ->where('sub_akun_1', $subAkun1)
//         ->get();

//     // Kembalikan data dalam bentuk HTML yang sesuai dengan tampilan tabel Anda.
//     return view('contents.pemasukan', compact('data'));
// }


    
}
