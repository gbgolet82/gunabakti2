<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use Illuminate\Http\Request;

class DataUsahaController extends Controller
{
    public function index()
    {
        $modelHead = "Tambah Data Usaha";
        $active_page = "DATA USAHA";
        return view('contents.usaha', compact('active_page', 'modelHead'));
    }

    public function simpanData(Request $request)
    {
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

        // Simpan data ke dalam tabel
        $result = Usaha::create([
            'nama_usaha' => $request->input('nama_usaha'),
            'alamat_usaha' => $request->input('alamat_usaha'),
            'jenis_usaha' => $request->input('jenis_usaha'),
            'produk_usaha' => $request->input('produk_usaha'),
        ]);
        dd($result);

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->to('/data-usaha')->with('success', 'Data Usaha berhasil disimpan.');
    }
}
