@extends('main')

@section('content')
    <style>
        /* CSS untuk memperbesar ukuran modal */
        .modal-dialog {
            max-width: 600px;
            /* Menentukan lebar maksimum modal */
        }

        .modal-content {
            padding: 10px;
            /* Menambahkan ruang padding di dalam modal */
        }

        /* Untuk mengatur tinggi modal, jika diperlukan */
        .modal-body {
            max-height: 500px;
            /* Menentukan tinggi maksimum modal */
            overflow-y: auto;
            /* Tambahkan scrollbar jika kontennya melebihi tinggi maksimum */
        }

        /* Gaya untuk checkbox */
        .form-check-input[type="checkbox"] {
            width: 18px;
            /* Lebar checkbox */
            height: 18px;
            /* Tinggi checkbox */
            margin-right: 5px;
            /* Jarak antara checkbox dan teks label */
        }

        /* Gaya untuk label checkbox */
        .form-check-label {
            margin-left: 5px;
            /* Jarak antara label dan checkbox */
            margin-bottom: 0;
            /* Menghapus margin bawah untuk mempersempit jarak */
        }
    </style>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item text-secondary">
                            Dashboard
                        </li>
                        <li class="breadcrumb-item active">Data Karyawan</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <div class="col-auto">
                            {{ Carbon\Carbon::now()->locale('id_ID')->isoFormat('dddd, D MMMM Y') }}
                        </div>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- card -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-2">
                    <div class="card ijo-kiri">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 font-weight-bold mb-3">Jumlah <br>Karyawan
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold mb-1" style="color: #28a745">11 Orang</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-3x text-gray"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-2">
                    <div class="card ijo-kiri">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 font-weight-bold mb-3">Jumlah <br>Manajer
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold mb-1" style="color: #28a745">11 Orang</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-3x text-gray"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-2">
                    <div class="card ijo-kiri">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 font-weight-bold mb-3"> Jumlah <br>Kasir
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold mb-1" style="color: #28a745">11 Orang</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-3x text-gray"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-2">
                    <div class="card ijo-kiri">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 font-weight-bold mb-3">Manajer & <br>Kasir
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold mb-1" style="color: #28a745">11 Orang</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-3x text-gray"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-success shadow-lg">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3 mt-4">
                                    <strong class="font-weight-bold">
                                        <h4 style="color:#28a745;">DATA KARYAWAN</h4>
                                    </strong>
                                </div>
                                <div class="col-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-md-4 mb-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" for="inputGroupSelect01">Unit
                                                                Usaha</span>
                                                        </div>
                                                        <select class="custom-select" id="inputGroupSelect01">
                                                            <option selected>Semua</option>
                                                            <option value="1">Toko Guna Bakti</option>
                                                            <option value="2">Penggilingan Wangon</option>
                                                            <option value="3">Produksi</option>
                                                            <option value="4">Sawah</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4 mb-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" for="jabatan">Jabatan</span>
                                                        </div>
                                                        <select class="custom-select" id="jabatan">
                                                            <option selected>Semua</option>
                                                            <option value="Owner">Owner</option>
                                                            <option value="Manajer">Manajer</option>
                                                            <option value="Kasir">Kasir</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4 mb-2">
                                                    <button class="btn btn-block text-white"
                                                        style="background-color: #28a745; border-radius: 10px;"
                                                        type="button" data-toggle="modal" data-target="#tambahData"
                                                        aria-expanded="false"><i
                                                            class="fas fa-plus-circle left-icon-holder"></i> &nbsp;
                                                        Tambah
                                                    </button>

                                                    <div class="modal fade" id="tambahData" tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true"
                                                        data-backdrop="static">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah
                                                                        Karyawan</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- Form untuk input informasi karyawan -->
                                                                    <form>
                                                                        @csrf
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="nama">NAMA </label>
                                                                                <sup class="badge rounded-pill badge-danger text-white"
                                                                                    style="background-color: rgba(230, 82, 82); font-size: 10px; padding: 4px 8px;">WAJIB</sup>
                                                                                <input type="text" class="form-control"
                                                                                    name="nama" id="nama"
                                                                                    placeholder="Masukkan nama">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="nomor-hp">NOMOR HP </label>
                                                                                <sup class="badge rounded-pill badge-danger text-white"
                                                                                    style="background-color: rgba(230, 82, 82); font-size: 10px; padding: 4px 8px;">WAJIB</sup>
                                                                                <input type="text" class="form-control"
                                                                                    name="nomorhp" id="nomor-hp"
                                                                                    placeholder="Masukkan nomor HP">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="email">EMAIL </label>
                                                                                <sup class="badge rounded-pill badge-danger text-white"
                                                                                    style="background-color: rgba(230, 82, 82); font-size: 10px; padding: 4px 8px;">WAJIB</sup>
                                                                                <input type="email" class="form-control"
                                                                                    name="email" id="email"
                                                                                    placeholder="Masukkan email">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="unit-usaha">UNIT USAHA</label>
                                                                                <sup class="badge rounded-pill badge-danger text-white"
                                                                                    style="background-color: rgba(230, 82, 82); font-size: 10px; padding: 4px 8px;">WAJIB</sup>
                                                                                <select class="form-control"
                                                                                    id="unit-usaha" name="unitusaha">
                                                                                    <option value="" disabled
                                                                                        selected hidden>Pilih unit usaha
                                                                                    </option>
                                                                                    <option value="Toko Guna Bakti">Toko
                                                                                        Guna
                                                                                        Bakti</option>
                                                                                    <option value="Penggilingan Wangon">
                                                                                        Penggilingan Wangon</option>
                                                                                    <option value="Produksi">Produksi
                                                                                    </option>
                                                                                    <option value="Sawah">Sawah</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-12">
                                                                                <label for="alamat">ALAMAT </label>
                                                                                <sup class="badge rounded-pill badge-danger text-white"
                                                                                    style="background-color: rgba(230, 82, 82); font-size: 10px; padding: 4px 8px;">WAJIB</sup>
                                                                                <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Masukkan alamat"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-12">
                                                                                <label for="alamat">ROLE</label>
                                                                                <sup class="badge rounded-pill badge-danger text-white"
                                                                                    style="background-color: rgba(230, 82, 82); font-size: 10px; padding: 4px 8px;">WAJIB</sup>
                                                                                <br>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox" id="manajer">
                                                                                    <label class="form-check-label"
                                                                                        for="manajer">Manajer</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox" id="kasir">
                                                                                    <label class="form-check-label"
                                                                                        for="kasir">Kasir</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox" id="owner">
                                                                                    <label class="form-check-label"
                                                                                        for="owner">Owner</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal"><i class="fa fa-ban"></i>
                                                                        Tutup</button>
                                                                    <button type="button" class="btn btn-primary"><i
                                                                            class="fa fa-save"></i> Simpan</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table id="example2" class="table table-bordered table-hover mt-0 pt-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Unit Usaha</th>
                                        <th>No HP</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width=5%>1</td>
                                        <td class="font-weight-bold">Muhammad Fikri
                                        </td>
                                        <td><span class="text-white badge badge-primary"
                                                style="font-size: 14px; border-radius: 10px;">Manajer</span> <br>
                                            <span class="text-white badge badge-success"
                                                style="font-size: 14px; border-radius: 10px;">Kasir</span>
                                        </td>
                                        <td>Toko Guna Bakti</td>
                                        <td>089689909911</td>
                                        <td>
                                            <span class="text-white badge badge-success text-center"
                                                style="font-size: 14px; border-radius: 10px;">AKTIF</span>
                                        </td>
                                        <td width=8%>
                                            <div class="d-flex justify-content-center">
                                                <div id="hoverText">
                                                    <a type="button"
                                                        style="color: #046ddd; font-size: 18px; margin-right: 2px;"
                                                        href="{{ route('detail.karyawan') }}"><i class="fa fa-info-circle"
                                                            title="Detail"></i></a>

                                                    <a type="button" style="color: #dc3545; font-size: 18px;"><i
                                                            class="far fa-trash-alt" title="Hapus" data-toggle="modal"
                                                            data-target="#konfirmasiHapus"></i></a>

                                                    <div class="modal fade" id="konfirmasiHapus" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Konfirmasi Hapus</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin menghapus data ini?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal"><i class="fa fa-ban"></i> Batal</button>
                                                                    <button type="button" class="btn btn-danger"
                                                                        onclick="hapusData()"><i
                                                                            class="far fa-trash-alt"></i> Ya, Hapus</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
