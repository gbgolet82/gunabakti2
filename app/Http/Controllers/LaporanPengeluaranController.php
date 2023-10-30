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

class LaporanPengeluaranController extends Controller
{
    public function index(Request $request)
    {
        // buat ambil rute yang aktif
        $pengeluaranBelumActive = $request->url() == route('pengeluaran_blm');
        $pengeluaranSudahAktif = $request->url() == route('pengeluaran_sdh');    

        $klasifikasiOptions = KlasifikasiLaporan::where('klasifikasi_laporan', '!=', 'Pemasukan')
        ->select('klasifikasi_laporan', 'id_klasifikasi')
        ->orderBy('klasifikasi_laporan', 'asc')
        ->get();

        $usahaOption = Usaha::select('id_usaha', 'nama_usaha')
        ->where('nama_usaha', '!=', 'SEMUA') // Exclude "SEMUA" option
        ->orderBy('nama_usaha', 'asc')
        ->get();

        $date = date('Ymd');
        // kode OP
        $nomorTerakhir = Laporan::join('klasifikasi_laporan', 'klasifikasi_laporan.id_klasifikasi', '=', 'laporan.id_klasifikasi')
        ->where('klasifikasi_laporan', 'Pengeluaran OP')
        ->max('kode_laporan');

        if ($nomorTerakhir) {
            $nomorBaru = (int)substr($nomorTerakhir, -3) + 1;
        } else {
            $nomorBaru = 1;
        }
        $kodeOP = 'OP' . $date . str_pad($nomorBaru, 3, '0', STR_PAD_LEFT);
        // kode NOP
        $nomorTerakhir = Laporan::join('klasifikasi_laporan', 'klasifikasi_laporan.id_klasifikasi', '=', 'laporan.id_klasifikasi')
        ->where('klasifikasi_laporan', 'Pengeluaran NOP')
        ->max('kode_laporan');

        if ($nomorTerakhir) {
            $nomorBaru = (int)substr($nomorTerakhir, -3) + 1;
        } else {
            $nomorBaru = 1;
        }
        $kodeNOP = 'NOP' . $date . str_pad($nomorBaru, 3, '0', STR_PAD_LEFT);
        // dd($kodeOP);


        $session = session('nama_usaha');
        // dd($session);

        // dd($kodeLaporan);
        $idKaryawan = session('id_karyawan');

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
            'kasir.nama as nama_kasir', 'manager.nama as nama_manager',
            
        )
        ->join('akun', 'akun.id_akun', '=', 'laporan.id_akun')
        ->join('karyawan as kasir', 'laporan.id_kasir', '=', 'kasir.id_karyawan')
        ->leftjoin('karyawan as manager', 'laporan.id_manager', '=', 'manager.id_karyawan')
        ->join('klasifikasi_laporan', 'laporan.id_klasifikasi', '=', 'klasifikasi_laporan.id_klasifikasi')
        ->join('usaha', 'laporan.id_usaha', '=', 'usaha.id_usaha')
        ->leftjoin('sub_akun_1', 'laporan.id_sub_akun_1', '=', 'sub_akun_1.id_sub_akun_1')
        ->leftjoin('sub_akun_2', 'laporan.id_sub_akun_2', '=', 'sub_akun_2.id_sub_akun_2')
        ->leftjoin('sub_akun_3', 'laporan.id_sub_akun_3', '=', 'sub_akun_3.id_sub_akun_3')
        ->where('laporan.status_cek', 'Belum Dicek')
        ->where('klasifikasi_laporan', '!=', 'Pemasukan')
        ->orderBy('laporan.tanggal_laporan', 'desc');

        if ($session != 'SEMUA') {
            $data->where('usaha.id_usaha', session('id_usaha'));
        }
        
        $data = $data->get();
        // dd($data);
        $active_page = "PENGELUARAN";
        return view('contents.pengeluaran', compact('active_page', 'data','pengeluaranBelumActive', 'pengeluaranSudahAktif', 'klasifikasiOptions', 'kodeOP', 'kodeNOP', 'usahaOption'));
    }

    public function pengeluaran(Request $request)
    {
        // buat ambil rute yang aktif
        $pengeluaranBelumActive = $request->url() == route('pengeluaran_blm');
        $pengeluaranSudahAktif = $request->url() == route('pengeluaran_sdh');    

        $klasifikasiOptions = KlasifikasiLaporan::where('klasifikasi_laporan', '!=', 'Pemasukan')
        ->select('klasifikasi_laporan', 'id_klasifikasi')
        ->orderBy('klasifikasi_laporan', 'asc')
        ->get();

        $usahaOption = Usaha::select('id_usaha', 'nama_usaha')
        ->where('nama_usaha', '!=', 'SEMUA') // Exclude "SEMUA" option
        ->orderBy('nama_usaha', 'asc')
        ->get();


        $session = session('nama_usaha');
        // dd($session);

        // dd($kodeLaporan);
        $idKaryawan = session('id_karyawan');

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
            'kasir.nama as nama_kasir', 'manager.nama as nama_manager',
            
        )
        ->join('akun', 'akun.id_akun', '=', 'laporan.id_akun')
        ->join('karyawan as kasir', 'laporan.id_kasir', '=', 'kasir.id_karyawan')
        ->leftjoin('karyawan as manager', 'laporan.id_manager', '=', 'manager.id_karyawan')
        ->join('klasifikasi_laporan', 'laporan.id_klasifikasi', '=', 'klasifikasi_laporan.id_klasifikasi')
        ->join('usaha', 'laporan.id_usaha', '=', 'usaha.id_usaha')
        ->leftjoin('sub_akun_1', 'laporan.id_sub_akun_1', '=', 'sub_akun_1.id_sub_akun_1')
        ->leftjoin('sub_akun_2', 'laporan.id_sub_akun_2', '=', 'sub_akun_2.id_sub_akun_2')
        ->leftjoin('sub_akun_3', 'laporan.id_sub_akun_3', '=', 'sub_akun_3.id_sub_akun_3')
        ->where('laporan.status_cek', 'Sudah Dicek')
        ->where('klasifikasi_laporan', '!=', 'Pemasukan')
        ->orderBy('laporan.tanggal_laporan', 'desc');

        if ($session != 'SEMUA') {
            $data->where('usaha.id_usaha', session('id_usaha'));
        }
        
        $data = $data->get();
        // dd($data);
        $active_page = "PENGELUARAN";
        return view('contents.pengeluaran', compact('active_page', 'data', 'pengeluaranBelumActive', 'pengeluaranSudahAktif', 'klasifikasiOptions', 'usahaOption'));
    }

    public function getLastReportNumber($selectedKlasifikasi)
    {
        // Anda perlu menulis logika untuk mendapatkan nomor urutan terakhir
        // berdasarkan $selectedKlasifikasiID dari database.
        
        // Contoh logika untuk mendapatkan nomor urutan terakhir
        $kategori = str_replace("Pengeluaran ", "", $selectedKlasifikasi);
        if($kategori == "OP") {
            $kode = Laporan::selectRaw('SUBSTR(kode_laporan, 1, 2) as kode_baru')
                    ->pluck('kode_baru');
        } elseif ($kategori == "NOP") {
            $kode = Laporan::selectRaw('SUBSTR(kode_laporan, 1, 3) as kode_baru')
                    ->pluck('kode_baru');
        }
        $lastReportNumber = Laporan::where($kode, 'like', $kategori . '%')
            ->orderBy('kode_laporan', 'desc')
            ->first();
        
        if ($lastReportNumber) {
            $lastCode = (int) substr($lastReportNumber->kode_laporan, -3); // Ambil 3 karakter terakhir dan ubah ke integer
        } else {
            $lastCode = 1;
        }

        // Kirim nomor urutan terakhir sebagai respons
        return response()->json(['lastReportNumber' => $lastCode]);
    }


    public function getJumlahBelumDicek()
    {
        $session = session('nama_usaha');
        $query = Laporan::join('klasifikasi_laporan', 'klasifikasi_laporan.id_klasifikasi', '=', 'laporan.id_klasifikasi')
        ->where('klasifikasi_laporan','!=', 'Pemasukan')
        ->where('status_cek', 'Belum dicek');

        if ($session != 'SEMUA') {
            $query->where('laporan.id_usaha', session('id_usaha'));
        }

        $jumlahBelumDicek = $query->count();

        return response()->json(['jumlah' => $jumlahBelumDicek]);
    }

    public function getJumlahSudahDicek()
    {
        $session = session('nama_usaha');
        $query = Laporan::join('klasifikasi_laporan', 'klasifikasi_laporan.id_klasifikasi', '=', 'laporan.id_klasifikasi')
        ->where('klasifikasi_laporan','!=', 'Pemasukan')
        ->where('status_cek', 'Sudah dicek');

        if ($session != 'SEMUA') {
            $query->where('laporan.id_usaha', session('id_usaha'));
        }

        $jumlahBelumDicek = $query->count();

        return response()->json(['jumlah' => $jumlahBelumDicek]);
    }

        public function getAkunPengeluaran($klasifikasi_laporan)
        {
            $id_klasifikasi = KlasifikasiLaporan::where('klasifikasi_laporan', $klasifikasi_laporan)->value('id_klasifikasi');

            $getAkun = Akun::where('id_klasifikasi', $id_klasifikasi)->where('id_usaha', session('id_usaha'))
                        ->pluck('akun', 'akun');
            
            return response()->json($getAkun);
        }

        public function getSubAkun1Pengeluaran($akun)
        {
            $id_akun = Akun::where('akun', $akun)->value('id_akun');

            $getSubAkun = DB::table('sub_akun_1')->where('id_akun', $id_akun)
                        ->pluck('sub_akun_1', 'sub_akun_1');
            
            return response()->json($getSubAkun);
        }

        public function getSubAkun1Filter($akun)
        {
            $id_akun = Akun::where('akun', $akun)->value('id_akun');

            $getSubAkun = DB::table('sub_akun_1')->where('id_akun', $id_akun)
                        ->pluck('sub_akun_1', 'sub_akun_1');
            
            return response()->json($getSubAkun);
        }

        public function getPengeluaranAkun($klasifikasi_laporan, $nama_usaha)
        {
            $id_klasifikasi = KlasifikasiLaporan::where('klasifikasi_laporan', $klasifikasi_laporan)->value('id_klasifikasi');
            $id_usaha = Usaha::where('nama_usaha', $nama_usaha)->value('id_usaha');

            $getAkun = DB::table('akun')->where('id_klasifikasi', $id_klasifikasi)->where('id_usaha', $id_usaha)
                        ->pluck('akun', 'akun');
            
            return response()->json($getAkun);
        }

        public function ambilAkun($id_klasifikasi)
        {
            $id_klasifikasi = KlasifikasiLaporan::where('id_klasifikasi', $id_klasifikasi)->value('id_klasifikasi');

            $getAkun = Akun::where('id_klasifikasi', $id_klasifikasi)->where('id_usaha', session('id_usaha'))
                        ->pluck('akun', 'id_akun');
            
            return response()->json($getAkun);
        }

        public function ambilSubAkun1($id_akun)
        {
            $id_akun = Akun::where('id_akun', $id_akun)->value('id_akun');

            $getSubAkun = DB::table('sub_akun_1')->where('id_akun', $id_akun)
                        ->pluck('sub_akun_1', 'id_sub_akun_1');
            
            return response()->json($getSubAkun);
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
    
    public function simpanPengeluaran(Request $request) {
        $rules = [
            'id_klasifikasi' => 'required',
            'nominal' => 'required|numeric',
            'gambar_bukti' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the file types and size as needed
            
        ];

        // Custom error messages
        $customMessages = [
            'id_klasifikasi.required' => 'Klasifikasi harus diisi.',
            'nominal.required' => 'Nominal harus diisi.',
            'nominal.numeric' => 'Nominal harus berupa angka.',
            'gambar_bukti.required' => 'Gambar Bukti harus diisi.',
            'gambar_bukti.image' => 'Gambar Bukti harus berupa gambar.',
            'gambar_bukti.mimes' => 'Gambar Bukti harus berupa JPEG, PNG, JPG, atau GIF.',
            'gambar_bukti.max' => 'Gambar tidak boleh melebihi 2MB.',
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
            $pemasukan->kode_laporan = $request->input('kode_laporan');
            $tanggalLaporan = Carbon::parse($request->input('tanggal_laporan'));
            $pemasukan->tanggal_laporan = $tanggalLaporan; 
            // sementara  (mengambil id karyawan yg login)
            $pemasukan->id_kasir = session('id_karyawan');
            $pemasukan->id_usaha = session('id_usaha');
            $pemasukan->id_klasifikasi = $validatedData['id_klasifikasi'];
            $idAkun = $request->input('id_akun'); // nilainya bisa berupa null jika dropdown tidak dipilih
                if ($idAkun === 'Pilih Akun' || $idAkun === '?') {
                    $idAkun = null;
                }
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

            $pemasukan->id_akun = $idAkun;
            $pemasukan->id_sub_akun_1 = $idSubAkun1;
            $pemasukan->id_sub_akun_2 = $idSubAkun2;
            $pemasukan->id_sub_akun_3 = $idSubAkun3;
            $pemasukan->nominal = $validatedData['nominal'] = str_replace(".", "", $validatedData['nominal']);
            $pemasukan->gambar_bukti = $filename;
            $pemasukan->status_cek = 'Belum Dicek';

            $pemasukan->save();
            // dd($pemasukan);
            return redirect()->route('pengeluaran_blm')->with('success', 'Data Pengeluaran berhasil ditambah.'); // Replace with your success route
        }
    }

    public function accPengeluaran(Request $request, $id_laporan)
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
            
            return redirect()->route('pengeluaran_blm')->with('success', 'Data Laporan Berhasil Dicek'); // Gantilah dengan route yang sesuai
        } else {
            return redirect()->back()->with('error', 'Laporan tidak ditemukan');
        }
    } 
}
