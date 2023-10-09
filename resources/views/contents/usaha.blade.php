@extends('main')

@section('dashboard', 'active')


@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item text-secondary">
                            Dashboard
                        </li>
                        <li class="breadcrumb-item active">Data Usaha</li>
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
                                    <div style="color:#28A745" class="h5 font-weight-bold mb-3">Jumlah <br>Usaha
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold mb-1">11 Usaha</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray"></i>
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
                                    <div style="color:#28A745" class="h5 font-weight-bold mb-3">Jumlah Produk Usaha
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold mb-1">11 Produk</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray"></i>
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
                                    <div style="color:#28A745" class="h5 font-weight-bold mb-3">Jumlah
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold mb-1">11 Data</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray"></i>
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
                                    <div style="color:#28A745" class="h5 font-weight-bold mb-3">
                                        Jumlah
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold mb-1">11 Data</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray"></i>
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
                    <div class="card card-outline card-success shadow-lg mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3 mt-4">
                                    <strong class="font-weight-bold">
                                        <h4 style="color:#28a745;">DATA USAHA</h4>
                                    </strong>
                                </div>
                                <div class="col-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-md-4 mb-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" for="klasifikasi">Nama
                                                                Usaha</span>
                                                        </div>
                                                        <select class="custom-select" id="klasifikasi">
                                                            <option selected>Semua</option>
                                                            <option value="1">Guna Bakti 2</option>
                                                            <option value="2">Wangon</option>
                                                            <option value="3">Produksi</option>
                                                            <option value="4">Sawah</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4 mb-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" for="inputGroupSelect01">Jenis
                                                                Usaha</span>
                                                        </div>
                                                        <select class="custom-select" id="inputGroupSelect01">
                                                            <option selected>Semua</option>
                                                            <option value="1">A</option>
                                                            <option value="2">B</option>
                                                            <option value="3">C</option>
                                                            <option value="4">D</option>
                                                            <option value="5">E</option>
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
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="tambahData" data-backdrop="static" data-keyboard="false"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true" data-target="#staticBackdrop">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">
                                                {{ $modelHead }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @include('modals.tambah-usaha')
                                    </div>
                                </div>
                            </div>

                            <table id="example2" class="table table-bordered table-hover mt-0 pt-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Usaha</th>
                                        <th>Alamat Usaha</th>
                                        <th>Jenis Usaha</th>
                                        <th>Produk Usaha</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width: 5%">1</td>
                                        <td>Guna Bakti 2</td>
                                        <td>Cilacap</td>
                                        <td>Penjualan</td>
                                        <td>Pakan Burung</td>
                                        <td width=8%>
                                            <div class="d-flex justify-content-center">
                                                <div id="hoverText">
                                                    <a type="button"
                                                        style="color: #007bff; font-size: 18px; margin-right: 5px;"><i
                                                            class="far fa-edit" title="Detail"></i></a>

                                                    <a type="button" style="color: #dc3545; font-size: 18px;"
                                                        data-toggle="modal" data-target="#"><i class="far fa-trash-alt"
                                                            title="Hapus"></i></a>

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
