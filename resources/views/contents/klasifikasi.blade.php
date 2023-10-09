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
                        <li class="breadcrumb-item active">Data Klasifikasi & Akun</li>
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
                                    <div class="h5 font-weight-bold mb-3">Jumlah <br>Klasifikasi
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold mb-1" style="color: #28a745">11 Data</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calculator fa-3x text-gray"></i>
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
                                    <div class="h5 font-weight-bold mb-3">Jumlah <br>Akun
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold mb-1" style="color: #28a745">11 Data</div>
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
                                    <div class="h5 font-weight-bold mb-3">Jumlah <br>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold mb-1" style="color: #28a745">11 Data</div>
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
                                    <div class="h5 font-weight-bold mb-3">Jumlah <br>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold mb-1" style="color: #28a745">11 Data</div>
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
                    <div class="card card-outline card-success shadow-lg mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3 mt-3">
                                    <strong class="font-weight-bold">
                                        <h4 style="color:#28a745;">DATA KLASIFIKASI & AKUN</h4>
                                    </strong>
                                </div>
                                <div class="col-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-md-4 mb-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"
                                                                for="klasifikasi">Klasifikasi</span>
                                                        </div>
                                                        <select class="custom-select" id="klasifikasi">
                                                            <option selected>Semua</option>
                                                            <option value="1">Pemasukan</option>
                                                            <option value="2">Pengeluaran</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4 mb-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"
                                                                for="inputGroupSelect01">Akun</span>
                                                        </div>
                                                        <select class="custom-select" id="inputGroupSelect01">
                                                            <option selected>Semua</option>
                                                            <option value="1">Wahana</option>
                                                            <option value="2">Ketoko</option>
                                                            <option value="3">Asvalue</option>
                                                            <option value="4">Operasional</option>
                                                            <option value="5">Non Operasional</option>
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
                                                {!! $modelHead !!}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @include('modals.tambah-akun')
                                    </div>
                                </div>
                            </div>

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Klasifikasi</th>
                                        <th>Akun</th>
                                        <th>Sub Akun 1</th>
                                        <th>Sub Akun 2</th>
                                        <th>Sub Akun 3</th>
                                        <th>Sub Akun 4</th>
                                        <th>Bukti Valid</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Pemasukan
                                        </td>
                                        <td>Wahana</td>
                                        <td>Penjualan</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>Nota</td>
                                        {{-- <td width=8%>
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
                                        </td> --}}
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Pengeluaran
                                        </td>
                                        <td>Operasional</td>
                                        <td>Gaji Karyawan</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>Nota</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
