<form action="{{ route('edit.usaha', $usaha->id_usaha) }}" method="POST">
    @csrf
    @method('PUT')
    <div id="form-lama">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="cariKlasifikasi">NAMA USAHA &nbsp;</label>
                <sup class="badge rounded-pill badge-danger text-white mb-2"
                    style="background-color:rgba(230,82,82)">WAJIB</sup>
                <input type="text" class="form-control @error('nama_usaha_edit') is-invalid @enderror" id="namaUsaha"
                    placeholder="Masukan nama usaha" name="nama_usaha_edit" value="{{ $usaha->nama_usaha }}">
                @error('nama_usaha_edit')
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
                    style="background-color: rgba(230, 82, 82)">WAJIB</sup>
                <textarea class="form-control" id="AlamatUsaha" name="alamat_usaha_edit" rows="3"
                    placeholder="Masukkan alamat usaha">{{ $usaha->alamat_usaha }}</textarea>
                @error('alamat_usaha_edit')
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
                <input type="text" class="form-control @error('jenis_usaha_edit') is-invalid @enderror"
                    id="jenisUsaha" placeholder="Masukan jenis usaha" name="jenis_usaha_edit"
                    value="{{ $usaha->jenis_usaha }}">
                @error('jenis_usaha_edit')
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
                <input type="text" class="form-control @error('produk_usaha_edit') is-invalid @enderror"
                    id="produkUsaha" placeholder="Masukan produk usaha" name="produk_usaha_edit"
                    value="{{ $usaha->produk_usaha }}">
                @error('produk_usaha_edit')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="card card-body p-2 pl-3 pr-3" style="background-color:#cbf2d6;">
            <div class="row">
                <small>
                    <b>INFORMASI!</b><br>
                    Silakan lakukan perubahan data diatas!<br>
                </small>
            </div>
        </div>
    </div>
    {{-- <div class="modal-footer"> --}}
    <div class="d-flex bd-highlight justify-content-end mt-3">
        <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal"><i class="fas fa-ban"></i>
            Tutup</button>
        <button type="submit" class="btn btn-success text-white" id="simpan" onclick="validasiForm()">
            <i class="fas fa-save"></i> Simpan Perubahan
        </button>
    </div>
    {{-- </div> --}}
</form>

@push('script')
    <script>
        $(document).ready(function() {
            $('#simpan').prop('disabled', true);
            // Simpan nilai awal input pada saat halaman dimuat
            var namaUsahaAwal = $("#namaUsaha").val();
            var alamatUsahaAwal = $("#AlamatUsaha").val();
            var jenisUsahaAwal = $("#jenisUsaha").val();
            var produkUsahaAwal = $("#produkUsaha").val();

            // Fungsi untuk memeriksa apakah ada perubahan pada input
            function validateForm() {
                var namaUsaha = $("#namaUsaha").val();
                var alamatUsaha = $("#AlamatUsaha").val();
                var jenisUsaha = $("#jenisUsaha").val();
                var produkUsaha = $("#produkUsaha").val();

                // Periksa apakah ada perubahan pada setiap input
                var adaPerubahan = (namaUsaha !== namaUsahaAwal) ||
                    (alamatUsaha !== alamatUsahaAwal) ||
                    (jenisUsaha !== jenisUsahaAwal) ||
                    (produkUsaha !== produkUsahaAwal);

                // Aktifkan atau nonaktifkan tombol Simpan berdasarkan perubahan
                if (adaPerubahan) {
                    $('#simpan').prop('disabled', false);
                } else {
                    $('#simpan').prop('disabled', true);
                }
            }

            // Panggil fungsi validateForm saat input berubah
            $('#namaUsaha, #AlamatUsaha, #jenisUsaha, #produkUsaha').on('input', validateForm);
        });
    </script>
@endpush
