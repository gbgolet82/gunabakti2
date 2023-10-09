<form action="{{ route('tambah.akun') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal-body">

        <div class="tab-content mt-1">
            <div class="tab-pane fade show active" id="nav-satu-tab" role="tabpanel" aria-labelledby="nav-satu-tab">

                <div id="form-lama">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="cariKlasifikasi">KLASIFIKASI &nbsp;</label>
                            <sup class="badge rounded-pill badge-danger text-white mb-2"
                                style="background-color:rgba(230,82,82)">WAJIB</sup>
                            <select class="form-control @error('klasifikasi') is-invalid @enderror" id="inputGroupKalsifikasi"
                            name="klasifikasi">
                            <option selected>Semua</option>
                                <option value="Pemasukan" @if ($admin->jenis_kelamin === 'Laki-Laki') selected @endif>
                                    Pemasukan</option>
                                <option value="Pengeluaran Operasional" @if ($admin->jenis_kelamin === 'Pengeluaran Operasional') selected @endif>
                                    Pengeluaran Operasional</option>
                                <option value="Pengeluaran Non Operasional" @if ($admin->jenis_kelamin === 'Pengeluaran Non Operasional') selected @endif>
                                    Pengeluaran Non Operasional</option>
                            </select>
                            @error('klasifikasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="cariUnitUsaha">UNIT USAHA &nbsp;</label>
                            <sup class="badge rounded-pill badge-danger text-white mb-2"
                                style="background-color:rgba(230,82,82)">WAJIB</sup>
                            <select class="custom-select" name="unit_usaha" id="inputGroupUnitUsaha">
                                <option selected>Semua</option>
                                <option value="1">Guna Bakti 2</option>
                                <option value="2">Wangon</option>
                                <option value="3">Produksi</option>
                                <option value="4">Sawah</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-12">
                            <label for="cariAkun">AKUN &nbsp;</label>
                            <sup class="badge rounded-pill badge-danger text-white mb-2"
                                style="background-color:rgba(230,82,82)">WAJIB</sup>
                            <select class="custom-select" name="akun" id="inputGroupAkun">
                                <option selected>Semua</option>
                                <option value="1">Wahana</option>
                                <option value="2">Ketoko</option>
                                <option value="3">Asvalue</option>
                                <option value="4">Operasional</option>
                                <option value="5">Non Operasional</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
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
                        <div class="form-group col-md-12">
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
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
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
                                3.&nbsp;Selanjutnya, pilih akun yang sesuai dengan unit usaha dan klasifikasi yang telah
                                dipilih.<br>
                                4.&nbsp;Terakhir, pilih sub akun dari yang pertama hingga yang terakhir sesuai dengan
                                klasifikasi, unit usaha, dan akun.
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#atasNama').tagsinput({
                'tagClass': function(item) {
                    return 'badge badge-success';
                },

            });

            // disable button sebelum semua data diisi
            $("#simpanMal").prop('disabled', true);

            // hidden pengisian dalam transfer
            $("#Transfer").addClass('d-none');
            $("#namaBank").val('-');
            $("#nomorRekening").val('-');
            $("#namaRekening").val('-');
            $('#nama_rekeningdiv').prop('hidden', true);
            $('#customFileInput').on('blur', function(e) {
                $('#customFileInput').val('-'); // won't work
            });

            // js untuk setiap perubahan jenis mal sehingga semua kolom kosong
            $("#jenisMal").change(e => {
                $("#jenisMuzaki").val('');
                $("#nominalRupiah").val('');
                $("#metodeBayar").val('');
                $("#Transfer").addClass('d-none');
                $("#namaBank").val('-');
                $("#nomorRekening").val('-');
                $("#namaRekening").val('-');
                $('#nama_rekeningdiv').prop('hidden', true);
                $('#customFileInput').on('blur', function(e) {
                    $('#customFileInput').val('-'); // won't work
                });
                $("#namaRekening").select2({
                    placeholder: "Pilih rekening tujuan",
                    allowClear: true
                });
                $('#atasNama').tagsinput('removeAll');
                $("#customFileInput").val(null);
                $('#customFileInput').next('label').html('Pilih file');
            });

            // js untuk perubahan metode bayar transfer/langsung
            $("#metodeBayar").change(e => {
                $("#namaRekening").select2({
                    placeholder: "Pilih rekening tujuan",
                    allowClear: true
                });
                $("#customFileInput").val(null);
                $('#customFileInput').next('label').html('Pilih file');
                if ($("#metodeBayar").val() == 'Transfer') {
                    $("#Transfer").removeClass('d-none');
                    $("#namaBank").val('');
                    $("#nomorRekening").val('');
                    $("#namaRekening").val('');
                    $('#nama_rekeningdiv').prop('hidden', false);
                    $('#customFileInput').on('blur', function(e) {
                        $('#customFileInput').val('-'); // won't work
                    });
                } else {
                    $("#Transfer").addClass('d-none');
                    $("#namaBank").val('-');
                    $("#nomorRekening").val('-');
                    $("#namaRekening").val('-');
                    $('#nama_rekeningdiv').prop('hidden', true);
                    $('#customFileInput').on('blur', function(e) {
                        $('#customFileInput').val('-'); // won't work
                    });
                }
            });

            //untuk melakukan fungsi enable dan disable pada button simpan
            $('#atasNama').on('itemAdded', function(event) {
                fungsiBtn();
            });
            $('#atasNama').on('itemRemoved', function(event) {
                fungsiBtn();
            });

            function fungsiBtn() {
                if ($('#metodeBayar').val() == 'Transfer') {
                    var jenisMal = $('#jenisMal').val();
                    var jenisMuzaki = $('#jenisMuzaki').val();
                    var nominalRupiah = $('#nominalRupiah').val();
                    var nama_bank = $('#namaBank').val();
                    var bayar = $('#metodeBayar').val();
                    var nomor_rek = $('#nomorRekening').val();
                    var nama_rek = $('#namaRekening').val();
                    var tf = $('#customFileInput').val();
                    var an = $('#atasNama').val();

                    if (jenisMal.length == 0 || jenisMuzaki.length == 0 || nominalRupiah.length == 0 ||
                        bayar.length == 0 || nama_bank.length == 0 || nomor_rek.length == 0 ||
                        nama_rek.length == 0 || tf.length == 0 || an.length == 0) {
                        console.log('sini sini');
                        $("#simpanMal").prop('disabled', true);
                    } else {
                        console.log('sini sini');
                        $("#simpanMal").prop('disabled', false);
                    }
                } else if ($('#metodeBayar').val() == 'Langsung FO') {
                    var jenisMal = $('#jenisMal').val();
                    var jenisMuzaki = $('#jenisMuzaki').val();
                    var nominalRupiah = $('#nominalRupiah').val();
                    var bayar = $('#metodeBayar').val();
                    var an = $('#atasNama').val();

                    if (jenisMal.length == 0 || jenisMuzaki.length == 0 || nominalRupiah.length == 0 ||
                        bayar.length == 0 || an.length == 0) {
                        console.log('sini sini');
                        $("#simpanMal").prop('disabled', true);
                    } else {
                        console.log('sini sini');
                        $("#simpanMal").prop('disabled', false);
                    }
                } else {
                    $("#simpanMal").prop('disabled', true);
                }
            }

            // js untuk melakukan perubahan pada setiap kolom pengisian dg fungsiBtn
            $("#jenisMal").change(
                e => {
                    fungsiBtn();
                });
            $("#jenisMuzaki").change(
                e => {
                    fungsiBtn();
                });
            $("#nominalRupiah").change(
                e => {
                    fungsiBtn();
                });
            $("#namaBank").change(
                e => {
                    fungsiBtn();
                });
            $("#metodeBayar").change(
                e => {
                    fungsiBtn();
                });
            $("#nomorRekening").change(
                e => {
                    fungsiBtn();
                });
            $("#namaRekening").change(
                e => {
                    fungsiBtn();
                });
            $("#customFileInput").change(
                e => {
                    fungsiBtn();
                });
            $("#atasNama").change(
                e => {
                    fungsiBtn();
                });

        });
    </script>

    <script>
        function formatRupiah(angka, prefix) {
            var number_string = (angka).toString(),
                sisa = number_string.length % 3,
                rupiah = number_string.substr(0, sisa),
                ribuan = number_string.substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            return rupiah;
        }

        $("#nominalRupiah").on('input', function() {
            var nominalRupiah = $('#nominalRupiah').val();
            nominalRupiah = nominalRupiah.split('.').join("");
            if (nominalRupiah != '') {
                console.log(parseInt(nominalRupiah));
                $('#nominalRupiah').val(formatRupiah(nominalRupiah, ''));
            } else {
                $('#nominalRupiah').val();
            }
        });
    </script>

    {{-- 
    <script>
        $("#nilaiAset").on('input', function() {
            var nilaiAset = $('#nilaiAset').val();
            nilaiAset = nilaiAset.split('.').join("");
            if (nilaiAset != '') {
                var percent = parseFloat($('#besaranZakat').val() / 100).toFixed(3);
                console.log(percent);
                console.log(parseInt(nilaiAset));
                $('#ziswaf_nominal_rupiah').val(formatRupiah(parseInt(percent *
                    parseInt(nilaiAset)), ''));
                $('#nilaiAset').val(formatRupiah(nilaiAset, ''));
            } else {
                // $('#besaranZakat').val(0);
                $('#ziswaf_nominal_rupiah').val(0);
            }
        });
        $("#besaranZakat").on('input', function() {
            var nilaiAset = $('#nilaiAset').val();
            nilaiAset = nilaiAset.split('.').join("");
            if (nilaiAset != '') {
                var percent = parseFloat($('#besaranZakat').val() / 100).toFixed(3);
                // console.log(percent);
                $('#ziswaf_nominal_rupiah').val(formatRupiah(percent *
                    parseInt(nilaiAset), ''));
            } else {
                // $('#besaranZakat').val(0);
                $('#ziswaf_nominal_rupiah').val(0);
            }
        });
    </script> --}}
@endpush
