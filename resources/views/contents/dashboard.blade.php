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
                        <li class="breadcrumb-item active">Dashboard</li>
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <!-- small box -->
                        <div class="card shadow">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-box ml-3 mt-2" style="height: 120px; width: 100px">
                                        <strong style="margin-bottom: 5px;">Data Gejala</strong><br>
                                        <h4 style="margin-top: 10px;">5 Data</h4>
                                    </div>
                                </div>
                                <div class="col-5 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-virus" style="font-size: 40px;"></i>
                                </div>
                            </div>

                            {{-- <a href="#" class="text ml-3 mb-2">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <!-- small box -->
                        <div class="card shadow">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-box ml-3 mt-2" style="height: 120px; width: 100px">
                                        <strong style="margin-bottom: 5px;">Data Penyakit</strong><br>
                                        <h4 style="margin-top: 10px;">4 Data</h4>
                                    </div>
                                </div>
                                <div class="col-5 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-notes-medical" style="font-size: 40px;"></i>
                                </div>
                            </div>

                            {{-- <a href="#" class="text ml-3 mb-2">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <!-- small box -->
                        <div class="card shadow">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-box ml-3 mt-2" style="height: 120px; width: 100px">
                                        <strong style="margin-bottom: 5px;">Data Konsultasi</strong>
                                        <h4 style="margin-top: 10px;">6 Data</h4>
                                    </div>
                                </div>
                                <div class="col-5 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-history" style="font-size: 40px;"></i>
                                </div>
                            </div>

                            {{-- <a href="#" class="text ml-3 mb-2">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <!-- small box -->
                        <div class="card shadow">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-box ml-3 mt-2" style="height: 120px; width: 100px">
                                        <strong style="margin-bottom: 5px;">Bulan</strong>
                                        <h4 style="margin-top: 10px;"></h4>
                                    </div>
                                </div>
                                <div class="col-5 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-calendar-alt" style="font-size: 40px;"></i>
                                </div>
                            </div>
                            {{-- <a href="#" class="text ml-3 mb-2">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="container-fluid rounded-3">
                <div class="card card-outline card-success shadow-lg">
                    <div class="card-header">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-8 p-0">
                                    <div class="card m-2">
                                        <div class="card-body">
                                            <div class="row ml-2">
                                                <strong>Grafik Data Master</strong><br>
                                            </div>
                                            <canvas id="myChart" style="height: 150px; max-height: 250px"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 p-0">
                                    <div class="card m-2 d-flex flex-column">
                                        <div class="card-body">
                                            <div class="row text-center mb-3">
                                                <div class="col-12">
                                                    <strong>Grafik</strong>
                                                </div>
                                            </div>
                                            <div class="row text-center mb-3">
                                                <div class="col-12">
                                                    <div class="slider">
                                                        {{-- @if ($gambarPenyakit && count($gambarPenyakit) > 0)
                                                            @foreach ($gambarPenyakit as $g)
                                                                <div>
                                                                    <img src="{{ asset('storage/public/' . $g->gambar_penyakit) }}"
                                                                        alt="Gambar Penyakit" class="img-fluid"
                                                                        style="width: 100%; max-width: 270px; height: 50%; max-height: 163px;">
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <div>
                                                                <p>Tidak ada gambar penyakit yang tersedia.</p>
                                                            </div>
                                                        @endif --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-center">
                                                <div class="col-12">
                                                    <h5></h5>
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
        </div>
    </section>
@endsection
