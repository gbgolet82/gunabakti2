<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\Usaha;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataUsahaController extends Controller
{
    public function index(Request $request)
    {
        //get data tabel usaha
        $dataUsaha = Usaha::select('id_usaha', 'nama_usaha', 'alamat_usaha', 'jenis_usaha', 'produk_usaha')
            ->get();

        $modelHead = "Tambah Data Usaha";
        $active_page = "DATA USAHA";
        return view('contents.usaha', compact('active_page', 'modelHead', 'dataUsaha'));
    }

    public function simpanData(Request $request)
    {
        // dd($request->all());
        // Validasi data
        $request->validate(
            [
                'nama_usaha' => 'required',
                'alamat_usaha' => 'required',
                'jenis_usaha' => 'required',
                'produk_usaha' => 'required',
            ],
            [
                'nama_usaha.required' => 'Masukan nama usaha',
                'alamat_usaha.required' => 'Masukan alamat usaha',
                'jenis_usaha.required' => 'Masukan jenis usaha',
                'produk_usaha.required' => 'Masukan produk usaha',
            ]
        );

        // Membuat UUID baru
        $idUsaha = Uuid::uuid4();

        $result = Usaha::create([
            'id_usaha' => $idUsaha,
            'nama_usaha' => $request->input('nama_usaha'),
            'alamat_usaha' => $request->input('alamat_usaha'),
            'jenis_usaha' => $request->input('jenis_usaha'),
            'produk_usaha' => $request->input('produk_usaha'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // $result = DB::table('usaha')->insert([
        //     'id_usaha' => $idUsaha,
        //     'nama_usaha' => $request->input('nama_usaha'),
        //     'alamat_usaha' => $request->input('alamat_usaha'),
        //     'jenis_usaha' => $request->input('jenis_usaha'),
        //     'produk_usaha' => $request->input('produk_usaha'),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

        // Redirect atau berikan respons sesuai kebutuhan
        if ($result) {
            return redirect()->to('/data-usaha')->with('success', 'Data Usaha berhasil disimpan.');
        } else {
            return redirect()->to('/data-usaha')->with('error', 'Terjadi kesalahan saat menyimpan data informasi.');
        }
    }

    public function editUsaha(Request $request)
    {
        $id = $request->id;

        // Fetch the data or perform any necessary operations for editing
        $usaha = Usaha::find($id);

        return view('modals.edit-usaha', compact('usaha'));
    }

    public function HapusData($id)
    {
        $data = Usaha::findOrFail($id);
        $data->delete();
        // dd($data);
        if ($data) {
            return redirect()->to('/data-usaha')->with('success', 'Data Usaha berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data usaha');
        }
    }
}
