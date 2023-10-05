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
                                    <div style="color:#28A745" class="h5 font-weight-bold mb-3">Donatur Infaq
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold mb-1">11 Orang</div>
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
                                    <div style="color:#28A745" class="h5 font-weight-bold mb-3">Donatur Zakat
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold mb-1">11 Orang</div>
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
                                    <div style="color:#28A745" class="h5 font-weight-bold mb-3">Donatur Qurban
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold mb-1">11 Orang</div>
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
                                        Donatur Wakaf
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold mb-1">11 Orang</div>
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
    <section class="content mb-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-success shadow-lg mb-0 pb-0">
                        <div class="card-body">
                            <div class="row mb-0 pb-0 pl-0">
                                <strong class="col pr-0 pt-0 d-highlight pr-0 mr-0 mb-3">
                                    {{-- <b style="color:#28a745; font-size:120%">DATA KLASIFIKASI & AKUN</b> --}}
                                    <h4 style="color:#28a745;">DATA USAHA</h4>
                                </strong>
                                <div class="col col-md-3 col-sm-12 bt-lg mb-2">
                                    <button class="btn btn-sm btn-block text-white "
                                        style="background-color: #28a745; border-radius: 10px;" type="button"
                                        data-toggle="modal" data-target="#tambahData" aria-expanded="false"><i
                                            class="fas fa-plus-circle left-icon-holder "></i>
                                        &nbsp;&nbsp; Tambah
                                    </button>
                                </div>
                            </div>

                            <table id="example2" class="table table-bordered table-hover mt-0 pt-0">
                                <thead>
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 4.0
                                        </td>
                                        <td>Win 95+</td>
                                        <td> 4</td>
                                        <td>X</td>
                                    </tr>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 5.0
                                        </td>
                                        <td>Win 95+</td>
                                        <td>5</td>
                                        <td>C</td>
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
