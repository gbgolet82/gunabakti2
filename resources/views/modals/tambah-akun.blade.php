<form action="{{ route('tambah.akun') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal-body">

        <div class="tab-content mt-1">
            <div class="tab-pane fade show active" id="nav-satu-tab" role="tabpanel" aria-labelledby="nav-satu-tab">

                <div id="form-lama">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cariKlasifikasi">KLASIFIKASI &nbsp;</label>
                            <sup class="badge rounded-pill badge-danger text-white mb-2"
                                style="background-color:rgba(230,82,82)">WAJIB</sup>
                            <select class="custom-select @error('klasifikasi') is-invalid @enderror"
                                id="inputGroupKlasifikasi" name="klasifikasi">
                                <option selected>Pilih Klasifikasi</option>
                                @foreach ($dataKlasifikasi as $klasifikasi)
                                    <option value="{{ $klasifikasi->klasifikasi_laporan }}"
                                        @if ($klasifikasi->klasifikasi_laporan === 'Semua') selected @endif>
                                        {{ $klasifikasi->klasifikasi_laporan }}</option>
                                @endforeach
                            </select>
                            @error('klasifikasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="cariUnitUsaha">UNIT USAHA &nbsp;</label>
                            <sup class="badge rounded-pill badge-danger text-white mb-2"
                                style="background-color: rgba(230, 82, 82)">WAJIB</sup>
                            <div class="d-flex align-items-center">
                                <!-- Tambahkan div untuk mengelilingi elemen select dan tombol -->
                                <select class="custom-select @error('usaha') is-invalid @enderror" id="inputGroupUsaha"
                                    name="usaha">
                                    <option selected>Pilih Unit Usaha</option>
                                    @foreach ($dataUsaha as $usaha)
                                        <option value="{{ $usaha->nama_usaha }}">{{ $usaha->nama_usaha }}</option>
                                    @endforeach
                                </select>
                                <a href="{{ route('usaha') }}" class="btn btn-primary ml-2">Tambah</a>
                                <!-- Tombol Tambah -->
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    {{-- <div class="modal fade" id="tambahUnitUsahaModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Isi modal disini -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Unit Usaha</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="{{ route('tambah.usaha') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="tab-content mt-1">
                                            <div class="tab-pane fade show active" id="nav-satu-tab" role="tabpanel"
                                                aria-labelledby="nav-satu-tab">

                                                <div id="form-lama">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="cariKlasifikasi">NAMA USAHA &nbsp;</label>
                                                            <sup class="badge rounded-pill badge-danger text-white mb-2"
                                                                style="background-color:rgba(230,82,82)">WAJIB</sup>
                                                            <input type="text"
                                                                class="form-control @error('nama_usaha') is-invalid @enderror"
                                                                id="namaUsaha" placeholder="Masukan nama usaha"
                                                                name="nama_usaha" value="">
                                                            @error('nama_usaha')
                                                                <div class="invalid-feedback" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="cariUnitUsaha">ALAMAT USAHA &nbsp;</label>
                                                            <sup class="badge rounded-pill badge-danger text-white mb-2"
                                                                style="background-color:rgba(230,82,82)">WAJIB</sup>
                                                            <textarea class="form-control" id="AlamatUsaha" name="alamat_usaha" rows="3" placeholder="Masukan alamat usaha"></textarea>
                                                            @error('alamat_usaha')
                                                                <div class="invalid-feedback" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-row ">
                                                        <div class="form-group col-md-12">
                                                            <label for="cariAkun">JENIS USAHA &nbsp;</label>
                                                            <sup class="badge rounded-pill badge-danger text-white mb-2"
                                                                style="background-color:rgba(230,82,82)">WAJIB</sup>
                                                            <input type="text"
                                                                class="form-control @error('jenis_usaha') is-invalid @enderror"
                                                                id="jenisUsaha" placeholder="Masukan jenis usaha"
                                                                name="jenis_usaha" value="">
                                                            @error('jenis_usaha')
                                                                <div class="invalid-feedback" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="cariSubAkun1">PRODUK USAHA &nbsp;</label>
                                                            <sup class="badge rounded-pill badge-danger text-white mb-2"
                                                                style="background-color:rgba(230,82,82)">WAJIB</sup>
                                                            <input type="text"
                                                                class="form-control @error('produk_usaha') is-invalid @enderror"
                                                                id="produkUsaha" placeholder="Masukan produk usaha"
                                                                name="produk_usaha" value="">
                                                            @error('produk_usaha')
                                                                <div class="invalid-feedback" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="card card-body p-2 pl-3 pr-3"
                                                        style="background-color:#cbf2d6;">
                                                        <div class="row">
                                                            <small>
                                                                <b>INFORMASI!</b><br>
                                                                Silakan masukan data diatas secara lengkap!<br>
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex bd-highlight justify-content-end mt-3">
                                                        <div class="bd-highlight">
                                                            <button type="submit" class="btn btn-success text-white"
                                                                id="simpan" onclick="validasiForm()"><i
                                                                    class="fas fa-save"></i> Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}

                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="cariAkun">AKUN &nbsp;</label>
                            <sup class="badge rounded-pill badge-danger text-white mb-2"
                                style="background-color: rgba(230, 82, 82)">WAJIB</sup>
                            <select class="custom-select" name="akun" id="inputGroupAkun">
                                <option selected>Semua</option>
                                <option value="1">Wahana</option>
                                <option value="2">Ketoko</option>
                                <option value="3">Asvalue</option>
                                <option value="4">Operasional</option>
                                <option value="5">Non Operasional</option>
                            </select>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="cariSubAkun1">SUB AKUN 1 &nbsp;</label>
                            <sup class="badge rounded-pill badge-danger text-white mb-2"
                                style="background-color:rgba(230,82,82)">WAJIB</sup>
                            <select class="custom-select" name="sub_akun_1" id="inputGroupSubAKun1">
                                <option selected>Semua</option>
                                <option value="1">Gaji Karyawan</option>
                                <option value="2">Kerugian Piutang Tak Tertagih</option>
                                <option value="3">Kerugian Barang Rusak</option>
                                <option value="4">Bahan Bakar</option>
                                <option value="5">Alat Tulis</option>
                                <option value="6">Penjualan</option>
                                <option value="7">Alat Bungkus</option>
                                <option value="8">Service Peralatan & Kendaraan</option>
                                <option value="9">Pemeliharaan Gedung</option>
                                <option value="10">Pembelian Tunai Barang</option>
                                <option value="11">Ongkos Kirim</option>
                                <option value="12">Ongkos Bongkar</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cariSubAkun2">SUB AKUN 2 &nbsp;</label>
                            {{-- <sup class="badge rounded-pill badge-danger text-white mb-2"
                                style="background-color:rgba(230,82,82)">WAJIB</sup> --}}
                            <select class="custom-select" name="sub_akun_2" id="inputGroupSubAKun2">
                                <option selected>Semua</option>
                                <option value="1">Bolpoin</option>
                                <option value="2">Buku</option>
                                <option value="3">Bensin</option>
                                <option value="4">Solar</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="cariSubAkun3">SUB AKUN 3 &nbsp;</label>
                            {{-- <sup class="badge rounded-pill badge-danger text-white mb-2"
                                style="background-color:rgba(230,82,82)">WAJIB</sup> --}}
                            <select class="custom-select" name="sub_akun_3" id="inputGroupSubAKun3">
                                <option selected>Semua</option>
                                <option value="1">VR4331</option>
                                <option value="2">Mobil Pick Up</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="cariBuktiValid">UPLOAD BUKTI VALID &nbsp;</label>
                            <sup class="badge rounded-pill badge-danger text-white mb-2"
                                style="background-color:rgba(230,82,82)">WAJIB</sup>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="bukti_valid"
                                        id="inputGroupUpload" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label" for="inputGroupUpload">Pilih Bukti Valid</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body p-2 pl-3 pr-3" style="background-color:#cbf2d6;">
                        <div class="row">
                            <small>
                                <b>INFORMASI!</b><br>
                                1.&nbsp;Silakan pilih klasifikasi yang tersedia.<br>
                                2.&nbsp;Pilihlah unit usaha yang sesuai dengan klasifikasi.<br>
                                3.&nbsp;Tambahkan unit usaha jika tidak ada pada pilihan yang sesuai.<br>
                                4.&nbsp;Selanjutnya, pilih akun yang sesuai dengan unit usaha dan klasifikasi yang telah
                                dipilih.<br>
                                5.&nbsp;Tambahkan akun jika tidak ada pada pilihan yang sesuai.<br>
                                6.&nbsp;Terakhir, pilih sub akun dari yang pertama hingga yang terakhir sesuai dengan
                                klasifikasi, unit usaha, dan akun.
                                7.&nbsp;Tambahkan sub akun jika tidak ada pada pilihan yang sesuai.<br>
                            </small>
                        </div>
                    </div>
                    <div class="d-flex bd-highlight justify-content-end mt-3">
                        {{-- <div class="mr-auto bd-highlight">
                            <a type="button" class="btn btn-outline-success left-icon-holder" href="#"><i
                                    class="fas fa-plus-circle"></i>&nbsp;
                                &nbsp; &nbsp; &nbsp;Tambah Penyetor</a>
                        </div> --}}
                        <div class="bd-highlight">
                            <button type="button" class="btn btn-success text-white" id="simpan"
                                onclick="validasiForm()"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@push('script')
    <script>
        var klasifikasiDropdown = document.getElementById('inputGroupKlasifikasi');
        var akunOptions = document.querySelectorAll('#inputGroupAkun option');

        klasifikasiDropdown.addEventListener('change', function() {
            var selectedKlasifikasi = klasifikasiDropdown.value;

            // Sembunyikan semua opsi akun terlebih dahulu
            akunOptions.forEach(function(option) {
                option.style.display = 'none';
            });

            // Tampilkan opsi akun sesuai dengan klasifikasi yang dipilih
            akunOptions.forEach(function(option) {
                if (selectedKlasifikasi === 'pemasukan' && option.classList.contains('pemasukan')) {
                    option.style.display = 'block';
                } else if (selectedKlasifikasi === 'pengeluaran' && option.classList.contains(
                        'pengeluaran')) {
                    option.style.display = 'block';
                }
            });
        });
    </script>

    {{-- <script>
        document.getElementById('tambahUnitUsaha').addEventListener('click', function() {
            window.location.href = "{{ route('usaha') }}";
        });
    </script> --}}
@endpush
