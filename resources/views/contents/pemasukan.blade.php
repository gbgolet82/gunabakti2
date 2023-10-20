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
                        <li class="breadcrumb-item active">Pemasukan</li>
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
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-success shadow-lg mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2 mt-3">
                                    <strong class="font-weight-bold">
                                        <h4 style="color:#28a745;">PEMASUKAN</h4>
                                    </strong>
                                </div>
                                <div class="col-10">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">

                                                <div class="col-12 col-md-3 mb-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" for="usaha">Usaha</span>
                                                        </div>
                                                        <select class="custom-select" id="usaha" name="usaha">
                                                            <option value="{{ session('id_usaha') }}" selected>
                                                                {{ session('nama_usaha') }}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-3 mb-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" for="akun">Akun</span>
                                                        </div>
                                                        <select class="custom-select" id="inputAkun" name="akun">
                                                            <option value="Semua" selected>Semua Data</option>
                                                            @foreach ($akunOptions as $dataAkun)
                                                                <option value="{{ $dataAkun->akun}}"
                                                                    @if ($dataAkun->akun === 'Semua') selected @endif>
                                                                    {{ $dataAkun->akun }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-3 mb-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" for="sub_akun_1">Sub Akun
                                                                1</span>
                                                        </div>
                                                        <select class="custom-select" id="inputSub" name="sub_akun_1">
                                                            <option value="Semua" selected>Semua Data</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-3 mb-2 pl-0">
                                                    <div class="d-flex flex-wrap">
                                                        <div class="col-md-6 pl-md-1"> <!-- Adjust the width as needed -->
                                                            <button class="btn btn-outline-success w-100"
                                                                style="border-radius: 10px;" type="button" data-toggle
                                                                a-modal data-target="#eksporData" aria-expanded="false">
                                                                <i class="fas fa-file-excel"></i> Export
                                                            </button>
                                                        </div>
                                                        <div class="col-md-6 pr-md-1 mb-2 mb-md-0">
                                                            <!-- Adjust the width as needed -->
                                                            <button class="btn text-white w-100"
                                                                style="background-color: #28a745; border-radius: 10px;"
                                                                type="button" data-toggle="modal" data-target="#tambahData"
                                                                aria-expanded="false">
                                                                <i class="fas fa-plus-circle left-icon-holder"></i> Tambah
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="modal fade" id="tambahData" data-backdrop="static" data-keyboard="false"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true" data-target="#staticBackdrop">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">
                                                Tambah Pemasukan<i class="fas fa-info-circle" data-toggle="popover"
                                                    data-placement="right" data-html="true" title="Informasi!"
                                                    data-content="<ol>
                                                        <li>Silakan pilih klasifikasi yang tersedia.</li>
                                                        <li>Pilihlah unit usaha yang sesuai dengan klasifikasi.</li>
                                                        <li>Tambahkan unit usaha jika tidak ada pada pilihan yang sesuai.</li>
                                                        <li>Selanjutnya, pilih akun yang sesuai dengan unit usaha dan klasifikasi yang telah dipilih.</li>
                                                        <li>Tambahkan akun jika tidak ada pada pilihan yang sesuai.</li>
                                                        <li>Terakhir, pilih sub akun dari yang pertama hingga yang terakhir sesuai dengan klasifikasi, unit usaha, dan akun.</li>
                                                        <li>Tambahkan sub akun jika tidak ada pada pilihan yang sesuai.</li></ol>"></i>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        {{-- @include('modals.tambah-akun') --}}
                                    </div>
                                </div>
                            </div>


                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Kode Laporan</th>
                                        <th>Tanggal</th>
                                        <th>Kasir</th>
                                        <th>Klasifikasi</th>
                                        <th>Usaha</th>
                                        <th>Akun</th>
                                        <th>Sub Akun 1</th>
                                        <th>Sub Akun 2</th>
                                        <th>Sub Akun 3</th>
                                        <th>Nominal</th>
                                        <th>Gambar Bukti</th>
                                        <th>Status Cek</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $noUrut = 1;
                                    @endphp
                                    @foreach ($data as $pemasukan)
                                        <tr>
                                            <td>{{ $noUrut++ }}</td>
                                            <td style="15%">{{ $pemasukan->kode_laporan }}</td>
                                            <td style="12%">
                                                {{ \Carbon\Carbon::parse($pemasukan->tanggal_laporan)->format('d/m/Y H:i:s') }}
                                            </td>
                                            <td style="15%">{{ $pemasukan->nama_kasir }}</td>
                                            <td style="15%">{{ $pemasukan->klasifikasi }}</td>
                                            <td style="12%">{{ $pemasukan->usaha }}</td>
                                            <td style="15%">{{ $pemasukan->akun }}</td>
                                            <td style="18%">{{ $pemasukan->sub_akun_1 ?? '-' }}</td>
                                            <td style="18%">{{ $pemasukan->sub_akun_2 ?? '-' }}</td>
                                            <td style="18%">{{ $pemasukan->sub_akun_3 ?? '-' }}</td>
                                            <td style="15%">Rp. {{ number_format($pemasukan->nominal, 0, ',', '.') }}
                                            </td>
                                            <td style="10%"><a href="#" class="text-primary"
                                                    data-toggle="modal"
                                                    data-target="#gambarModal{{ $pemasukan->id_laporan }}">Lihat</a>
                                            </td>
                                            <div class="modal fade" id="gambarModal{{ $pemasukan->id_laporan }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Gambar Bukti
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body"
                                                            style="display: flex; justify-content: center; align-items: center;">
                                                            <img src="{{ asset('nota/' . $pemasukan->gambar_bukti) }}"
                                                                alt="Gambar Bukti" style="width: 450px; height: 450px;">
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <td style="15%">{{ $pemasukan->status_cek }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>



                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
<script>
    $(document).ready(function () {
        $('#inputAkun').change(function () {
            var selectedAkunId = $(this).val();

            // console.log(selectedAkunId);

            // Lakukan permintaan AJAX ke endpoint yang mengembalikan opsi sub akun 1 berdasarkan id_akun yang dipilih.
            $.ajax({
                url: '/get-sub-akun-1-options/' + selectedAkunId,
                type: 'GET',
                success: function (data) {
                    // Perbarui opsi sub akun 1 dengan data yang diterima dari server.
                    $('#inputSub').empty();
                    $('#inputSub').append($('<option>', {
                        value: 'Semua',
                        text: 'Semua'
                    }));
                    $.each(data, function (key, value) {
                        console.log(key);
                        $('#inputSub').append($('<option>', {
                            value: key,
                            text: value
                        }));
                    });
                }
            });
        });
    });

    $(document).ready(function() {
        // Get the table and all the select elements
        var table = $('#example2').DataTable();
        var akunSelect = $('#inputAkun');
        var subSelect = $('#inputSub');

        // Handle filter change for Akun
        akunSelect.on('change', function() {
            var selectedAkun = $(this).val();
            if (selectedAkun === 'Semua') {
                // Clear the Akun filter
                table.columns(6).search('').draw();
            } else {
                table.columns(6).search(selectedAkun).draw();
            }
        });

        // Handle filter change for Usaha
        subSelect.on('change', function() {
            var selectedSub = $(this).val();
            if (selectedSub === 'Semua') {
                // Clear the Akun filter
                table.columns(7).search('').draw();
            } else {
                table.columns(7).search(selectedSub).draw();
            }
        });

        
    });
</script>

@endpush
