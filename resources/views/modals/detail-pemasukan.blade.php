<form action="{{ route('acc.pemasukan', $pemasukan->id_laporan) }}" method="post" enctype="multipart/form-data">
    {{-- <form action="{{ route('acc.pemasukan') }}" method="post" enctype="multipart/form-data"> --}}
    {{ csrf_field() }}
    <style>
        .badge-cr {
            position: relative;
            top: -1px;
            left: 10px;
            font-size: 14px;
            padding: 3px 5px;
            font-size: 14px;
            border-radius: 10px;
            background-color: #fd7e14;
            color: #fff;
        }

        .badge-ijo {
            position: relative;
            top: -1px;
            left: 10px;
            font-size: 14px;
            padding: 3px 5px;
            font-size: 14px;
            border-radius: 10px;
            background-color: #28a745;
            color: #fff;
        }
    </style>
    <div class="modal-body">
        <div class="d-flex mb-3">
            <span class="text-bold d-flex align-items-center" style="font-size: 18px">Detail Pemasukan</span>
            {{-- @if ($pemasukan->status_cek === 'Belum Dicek') --}}
            <span class="ml-auto mr-3 text-center badge-cr">Belum Dicek</span>
            {{-- @else --}}
            {{-- <span class="ml-auto mr-3 text-center badge-ijo">Sudah Dicek</span>
            @endif --}}

            {{-- </div> --}}
        </div>
        <div class="card" style="border-radius: 10px">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <span>Kode Laporan</span><br>
                        <span class="text-bold">{{ $pemasukan->kode_laporan }}</span>
                    </div>
                    <div class="col-4">
                        <span>Unit Usaha</span><br>
                        <span class="text-bold">{{ $pemasukan->usaha }}</span>
                    </div>
                    <div class="col-4">
                        <span>Kasir</span><br>
                        <span class="text-bold">{{ $pemasukan->nama_kasir }}</span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <span>Tanggal Laporan</span><br>
                        <span
                            class="text-bold">{{ \Carbon\Carbon::parse($pemasukan->tanggal_laporan)->format('d/m/Y H:i:s') }}</span>
                    </div>
                    <div class="col-4">
                        <span>Nominal</span><br>
                        <span class="text-bold">Rp. {{ number_format($pemasukan->nominal, 0, ',', '.') }}</span>
                    </div>
                    <div class="col-4">
                        <span>Gambar Bukti</span><br>
                        <span>
                            <a class="text-primary second-modal-trigger" data-toggle="modal"
                                data-target="#gambarModall{{ $pemasukan->id_laporan }}">Lihat</a>
                        </span>
                        <div class="modal fade" id="gambarModall{{ $pemasukan->id_laporan }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
                            data-backdrop="static">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Gambar Bukti</h5>
                                        <button type="button" class="close" data-toggle="modal"
                                            data-target="#lihatPemasukan{{ $pemasukan->id_laporan }}"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body"
                                        style="display: flex; justify-content: center; align-items: center;">
                                        <img src="{{ asset('nota/' . $pemasukan->gambar_bukti) }}" alt="Gambar Bukti"
                                            style="width: 450px; height: 450px;">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                            data-toggle="modal"
                                            data-target="#lihatPemasukan{{ $pemasukan->id_laporan }}">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" style="border-radius: 10px;">
            <div class="card-body p-3">
                <div class="row">
                    <!-- Add your table inside the modal-body -->
                    <table class="table-border table-hover table-responsive mt-1 p-1" style="border-radius: 10px;">
                        <tr class="bg-light" style="height: 40px;">
                            <th width='480px'>Klasifikasi</th>
                            <th width='480px'>Akun</th>
                            <th width='480px'>Sub Akun 1</th>
                            <th width='480px'>Sub Akun 2</th>
                            <th width='480px'>Sub Akun 3</th>
                        </tr>
                        <tr>
                            <td>{{ $pemasukan->klasifikasi }}</td>
                            <td>{{ $pemasukan->akun }}</td>
                            <td>{{ $pemasukan->sub_akun_1 ?? '-' }}</td>
                            <td>{{ $pemasukan->sub_akun_2 ?? '-' }}</td>
                            <td>{{ $pemasukan->sub_akun_3 ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-flex">
            <span class="text-bold d-flex align-items-center mb-3" style="font-size: 18px">Catatan Pengecekan
                Manager</span>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                @if ($pemasukan->status_cek == 'Belum Dicek')
                    <textarea class="form-control" id="inputCatatan" name="catatan" placeholder="Masukan catatan" rows="3"></textarea>
                @else
                    <textarea class="form-control" id="inputCatatan" name="catatan" rows="2">{{ $pemasukan->catatan }}</textarea>
                @endif
            </div>
        </div>


        <div class="d-flex bd-highlight justify-content-end mt-3">
            <div class="bd-highlight">
                <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal" id="resetData"><i
                        class="fa fa-ban"></i> Batal</button>

                @php
                    $selectedRole = session('selectedRole');
                    $karyawanRoles = session('karyawanRoles');
                    // dd($karyawanRoles);
                @endphp

                @if ($karyawanRoles->first() == 'Manajer')
                    <button type="submit"
                        class="btn btn-success text-white toastrDefaultSuccess @if ($pemasukan->status_cek == 'Sudah Dicek') disabled @endif"
                        id="simpanAcc"><i class="fas fa-check-circle"></i> ACC</button>
                @else
                    <button type="submit" class="btn btn-success text-white toastrDefaultSuccess" id="simpanAcc"><i
                            class="fas fa-print"></i>
                        Print</button>
                @endif
            </div>
        </div>
    </div>
</form>
