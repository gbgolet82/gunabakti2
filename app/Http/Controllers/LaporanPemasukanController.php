<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\KlasifikasiLaporan;
use App\Models\Laporan;
use App\Models\Usaha;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class LaporanPemasukanController extends Controller
{
    // private $idKlasifikasiPemasukan = null;
    public function index(Request $request)
    {


        $isPemasukanActive = $request->url() == route('pemasukan_blm');
        // dd($isPemasukanActive);
        if ($isPemasukanActive) {
            $idKlasifikasiPemasukan = KlasifikasiLaporan::where('klasifikasi_laporan', 'Pemasukan')
                ->value('id_klasifikasi');
            session(['idKlasifikasiPemasukan' => $idKlasifikasiPemasukan]);
        }


        $usaha = Laporan::join('usaha', 'laporan.id_usaha', '=', 'usaha.id_usaha')
            ->where('usaha.id_usaha', session('id_usaha'))
            ->select('nama_usaha')
            ->first();


        $akunOptions = Akun::join('usaha', 'usaha.id_usaha', '=', 'akun.id_usaha')
            ->join('klasifikasi_laporan', 'klasifikasi_laporan.id_klasifikasi', '=', 'akun.id_klasifikasi')
            ->where('nama_usaha', 'GB2')
            ->where('klasifikasi_laporan', 'Pemasukan')
            ->select('id_akun', 'akun')
            ->orderBy('akun', 'asc')
            ->get();
        //     // dd($akunOptions);

        $date = date('Ymd');
        $nomorTerakhir = Laporan::max('kode_laporan');
        // dd($nomorTerakhir);
        if ($nomorTerakhir) {
            $nomorBaru = (int)substr($nomorTerakhir, -3) + 1;
        } else {
            $nomorBaru = 1;
        }

        $kodeLaporan = 'P' . $date . str_pad($nomorBaru, 3, '0', STR_PAD_LEFT);
        // dd($kodeLaporan);
        $idKaryawan = session('id_karyawan'); // Mengambil nilai id karyawan dari sesi

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
            'laporan.id_laporan as id_laporan',
            'laporan.catatan as catatan',
            'laporan.status_cek as status_cek',
            DB::raw('(SELECT karyawan.nama FROM karyawan WHERE karyawan.kasir = "1" AND karyawan.id_usaha = usaha.id_usaha AND karyawan.id_karyawan = "' . $idKaryawan . '" LIMIT 1) AS nama_kasir'),
            DB::raw('(SELECT karyawan.nama FROM karyawan WHERE karyawan.manajer = "1" AND karyawan.id_usaha = usaha.id_usaha LIMIT 1) AS nama_manajer')
        )
            ->join('akun', 'akun.id_akun', '=', 'laporan.id_akun')
            ->join('klasifikasi_laporan', 'akun.id_klasifikasi', '=', 'klasifikasi_laporan.id_klasifikasi')
            ->join('usaha', 'laporan.id_usaha', '=', 'usaha.id_usaha')
            ->join('sub_akun_1', 'laporan.id_sub_akun_1', '=', 'sub_akun_1.id_sub_akun_1')
            ->leftjoin('sub_akun_2', 'laporan.id_sub_akun_2', '=', 'sub_akun_2.id_sub_akun_2')
            ->leftjoin('sub_akun_3', 'laporan.id_sub_akun_3', '=', 'sub_akun_3.id_sub_akun_3')
            ->where('usaha.id_usaha', session('id_usaha')) // Filter berdasarkan id_usaha dari sesi
            ->where('laporan.status_cek', 'Belum Dicek')
            ->orderBy('laporan.created_at', 'desc')
            ->get();

        // dd($data);


        // dd($data);
        // $modelHead = "Tambah Data Klasifikasi & Akun";
        $active_page = "PEMASUKAN";
        return view('contents.pemasukan', compact('active_page', 'data', 'akunOptions', 'usaha', 'kodeLaporan', 'idKlasifikasiPemasukan'));
    }


    public function simpanPemasukan(Request $request)
    {
        // Validation rules
        $rules = [
            'kode_laporan' => 'required',
            'id_kasir' => 'required',
            'id_usaha' => 'required',
            'id_akun' => 'required',
            'nominal' => 'required|numeric',
            'gambar_bukti' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the file types and size as needed
            'status_cek' => 'required',
        ];

        // Custom error messages
        $customMessages = [
            'kode_laporan.required' => 'Kode Laporan harus diisi.',
            'tanggal_laporan.required' => 'Tanggal Laporan harus diisi.',
            'id_kasir.required' => 'Kasir harus diisi.',
            'id_usaha.required' => 'Unit Usaha harus diisi.',
            'id_akun.required' => 'Akun harus diisi.',
            'nominal.required' => 'Nominal harus diisi.',
            'nominal.numeric' => 'Nominal harus berupa angka.',
            'gambar_bukti.required' => 'Gambar Bukti harus diisi.',
            'gambar_bukti.image' => 'Gambar Bukti harus berupa gambar.',
            'gambar_bukti.mimes' => 'Gambar Bukti harus berupa JPEG, PNG, JPG, atau GIF.',
            'gambar_bukti.max' => 'Gambar tidak boleh melebihi 2MB.',
            'status_cek.required' => 'Status Cek harus diisi.',
        ];

        // Validate the request
        $validatedData = $request->validate($rules, $customMessages);

        // $idKlasifikasiPemasukan = null; // Default value
        // Handle file upload and storage
        if ($request->hasFile('gambar_bukti')) {
            $file = $request->file('gambar_bukti');
            $tujuan_upload = 'nota';
            $filename = $file->getClientOriginalName();
            // upload file
            $file->move($tujuan_upload, $filename);
            // Save the data to the database
            $uuid = Str::uuid()->toString();
            $idKlasifikasiPemasukan = session('idKlasifikasiPemasukan');

            $pemasukan = new Laporan();
            $pemasukan->id_laporan = $uuid;
            $pemasukan->kode_laporan = $validatedData['kode_laporan'];
            $tanggalLaporan = Carbon::parse($request->input('tanggal_laporan'));
            $pemasukan->tanggal_laporan = $tanggalLaporan;
            // sementara  (mengambil id karyawan yg login)
            $pemasukan->id_kasir = session('id_karyawan');
            // sementara (belum tau cara ambil id klasifikasi)
            $pemasukan->id_klasifikasi = $idKlasifikasiPemasukan;
            $pemasukan->id_usaha = session('id_usaha');
            $pemasukan->id_akun = $validatedData['id_akun'];
            $idSubAkun1 = $request->input('id_sub_akun_1'); // nilainya bisa berupa null jika dropdown tidak dipilih
            if ($idSubAkun1 === 'Pilih Sub Akun 1' || $idSubAkun1 === '?') {
                $idSubAkun1 = null;
            }
            $idSubAkun2 = $request->input('id_sub_akun_2');
            if ($idSubAkun2 === 'Pilih Sub Akun 2' || $idSubAkun2 === '?') {
                $idSubAkun2 = null;
            }

            $idSubAkun3 = $request->input('id_sub_akun_3');
            if ($idSubAkun3 === 'Pilih Sub Akun 3' || $idSubAkun3 === '?') {
                $idSubAkun3 = null;
            }

            $pemasukan->id_sub_akun_1 = $idSubAkun1;
            $pemasukan->id_sub_akun_2 = $idSubAkun2;
            $pemasukan->id_sub_akun_3 = $idSubAkun3;
            $pemasukan->nominal = $validatedData['nominal'] = str_replace(".", "", $validatedData['nominal']);
            $pemasukan->gambar_bukti = $filename;
            $pemasukan->status_cek = $validatedData['status_cek'];

            $pemasukan->save();
            // dd($pemasukan);

            // kalo id sub akun 2 sama 3 kosong kasih null ini belum
            // kalo nambah satu semua sub akun 1, 2, 3 ikut semua jadi bukan 1 data aja

            // Redirect or return a response
            return redirect()->route('pemasukan_blm')->with('success', 'Data Pemasukan berhasil ditambah.'); // Replace with your success route
        }
    }

    //     public function getSubAkun($akunId)
    // {
    //     $subAkunOptions = DB::table('sub_akun_1')->where('id_akun', $akunId)->get();

    //     return response()->json($subAkunOptions);
    // }

    public function getSubAkun1Options($akun)
    {
        // dd($akun);
        // Cari ID akun berdasarkan nama akun
        $id_akun = Akun::where('akun', $akun)->value('id_akun');

        // Ambil data sub_akun_1 berdasarkan id_akun yang sesuai
        $subAkun1Options = DB::table('sub_akun_1')->where('id_akun', $id_akun)->pluck('sub_akun_1', 'sub_akun_1');

        return response()->json($subAkun1Options);
    }

    public function ambilSubAkun1($id_akun)
    {
        // dd($akun);
        // Cari ID akun berdasarkan nama akun
        $id_akun = Akun::where('id_akun', $id_akun)->value('id_akun');

        // Ambil data sub_akun_1 berdasarkan id_akun yang sesuai
        $ambilSubAkun1 = DB::table('sub_akun_1')->where('id_akun', $id_akun)->pluck('sub_akun_1', 'id_sub_akun_1');

        return response()->json($ambilSubAkun1);
    }

    public function ambilSubAkun2($id_sub_akun_1)
    {
        $subAkun2Options = DB::table('sub_akun_2')
            ->where('id_sub_akun_1', $id_sub_akun_1)
            ->pluck('sub_akun_2', 'id_sub_akun_2')
            ->toArray();

        return response()->json($subAkun2Options);
    }

    public function ambilSubAkun3($id_sub_akun_2)
    {
        $subAkun3Options = DB::table('sub_akun_3')
            ->where('id_sub_akun_2', $id_sub_akun_2)
            ->pluck('sub_akun_3', 'id_sub_akun_3')
            ->toArray();

        return response()->json($subAkun3Options);
    }

    public function getJumlahBelumDicek()
    {
        $jumlahBelumDicek = Laporan::where('status_cek', 'Belum dicek')
            ->where('laporan.id_usaha', session('id_usaha'))
            ->count();
        // dd($jumlahBelumDicek);

        return response()->json(['jumlah' => $jumlahBelumDicek]);
    }

    public function accPemasukan(Request $request, $id_laporan)
    {
        // Ambil data catatan dan ID karyawan dari request
        $catatan = $request->input('catatan');
        $id_karyawan = session('id_karyawan'); // Menggunakan id karyawan dari sesi, sesuaikan dengan aturan autentikasi Anda

        // Update tabel laporan
        $laporan = Laporan::find($id_laporan);
        if ($laporan) {
            $laporan->catatan = $catatan;
            $laporan->status_cek = 'Sudah Dicek';
            $laporan->id_manager = $id_karyawan;
            $laporan->save();

            return redirect()->route('pemasukan_blm')->with('success', 'Data Laporan Berhasil Dicek'); // Gantilah dengan route yang sesuai
        } else {
            return redirect()->back()->with('error', 'Laporan tidak ditemukan');
        }
    }
}
