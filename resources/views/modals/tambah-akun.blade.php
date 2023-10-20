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
                                <select class="custom-select @error('usaha') is-invalid @enderror" id="inputGroupUsaha"
                                    name="usaha">
                                    <option selected>Pilih Unit Usaha</option>
                                    @php
                                        $uniqueUsaha = [];
                                    @endphp
                                    @foreach ($dataAkun as $usaha)
                                        @if (!empty($usaha->nama_usaha) && !in_array($usaha->nama_usaha, $uniqueUsaha))
                                            <option value="{{ $usaha->nama_usaha }}">{{ $usaha->nama_usaha }}</option>
                                            @php
                                                $uniqueUsaha[] = $usaha->nama_usaha;
                                            @endphp
                                        @endif
                                    @endforeach
                                </select>
                                <a href="{{ route('usaha') }}" class="btn btn-success ml-2"><i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="cariAkun">AKUN &nbsp;</label>
                            <sup class="badge rounded-pill badge-danger text-white mb-2"
                                style="background-color: rgba(230, 82, 82)">WAJIB</sup>
                            <select class="custom-select" name="akun" id="inputGroupAkun">
                                <option selected>Pilih Akun</option>
                                @php
                                    $uniqueAkun = [];
                                @endphp
                                @foreach ($dataAkun as $akun)
                                    @if (!empty($akun->akun) && !in_array($akun->akun, $uniqueAkun))
                                        <option value="{{ $akun->akun }}">{{ $akun->akun }}</option>
                                        @php
                                            $uniqueAkun[] = $akun->akun;
                                        @endphp
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cariSubAkun1">SUB AKUN 1 &nbsp;</label>
                            <sup class="badge rounded-pill badge-danger text-white mb-2"
                                style="background-color: rgba(230, 82, 82)">WAJIB</sup>
                            <select class="custom-select" name="sub_akun_1" id="inputGroupSubAkun1">
                                <option selected>Pilih Sub Akun 1</option>
                                @php
                                    $uniqueAkun = [];
                                @endphp
                                @foreach ($dataAkun as $subakun1)
                                    @if (!empty($subakun1->sub_akun_1) && !in_array($subakun1->sub_akun_1, $uniqueAkun))
                                        <option value="{{ $subakun1->sub_akun_1 }}">{{ $subakun1->sub_akun_1 }}
                                        </option>
                                        @php
                                            $uniqueAkun[] = $subakun1->sub_akun_1;
                                        @endphp
                                    @endif
                                @endforeach
                                <option value="custom">Tambah Sub Akun 1</option>
                            </select>
                            <div id="customSubAkunInput1" style="display: none;" class="mt-2">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <div class="d-flex align-items-center">
                                            <input type="text" class="form-control" name="custom_sub_akun1"
                                                id="customSubAkun1">&nbsp;&nbsp;
                                            <button class="btn btn-primary" id="addCustomSubAkun1" type="button"><i
                                                    class="fas fa-check"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cariSubAkun2">SUB AKUN 2 &nbsp;</label>
                            <select class="custom-select" name="sub_akun_2" id="inputGroupSubAKun2">
                                <option selected>Pilih Sub Akun 2</option>
                                @php
                                    $uniqueAkun = [];
                                @endphp
                                @foreach ($dataAkun as $subakun2)
                                    @if (!empty($subakun2->sub_akun_2) && !in_array($subakun2->sub_akun_2, $uniqueAkun))
                                        <option value="{{ $subakun2->sub_akun_2 }}">{{ $subakun2->sub_akun_2 }}
                                        </option>
                                        @php
                                            $uniqueAkun[] = $subakun2->sub_akun_2;
                                        @endphp
                                    @endif
                                @endforeach
                                <option value="custom">Tambah Sub Akun 2</option>
                            </select>
                            <div id="customSubAkunInput2" style="display: none;" class="mt-2">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <div class="d-flex align-items-center">
                                            <input type="text" class="form-control" name="custom_sub_akun2"
                                                id="customSubAkun2">&nbsp;&nbsp;
                                            <button class="btn btn-primary" id="addCustomSubAkun2" type="button"><i
                                                    class="fas fa-check"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="cariSubAkun3">SUB AKUN 3 &nbsp;</label>
                            <select class="custom-select" name="sub_akun_3" id="inputGroupSubAKun3">
                                <option selected>Pilih Sub Akun 3</option>
                                @php
                                    $uniqueAkun = [];
                                @endphp
                                @foreach ($dataAkun as $subakun3)
                                    @if (!empty($subakun3->sub_akun_3) && !in_array($subakun3->sub_akun_3, $uniqueAkun))
                                        <option value="{{ $subakun3->sub_akun_3 }}">{{ $subakun3->sub_akun_3 }}
                                        </option>
                                        @php
                                            $uniqueAkun[] = $subakun3->sub_akun_3;
                                        @endphp
                                    @endif
                                @endforeach
                                <option value="custom">Tambah Sub Akun 3</option>
                            </select>
                            <div id="customSubAkunInput3" style="display: none;" class="mt-2">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <div class="d-flex align-items-center">
                                            <input type="text" class="form-control" name="custom_sub_akun3"
                                                id="customSubAkun3">&nbsp;&nbsp;
                                            <button class="btn btn-primary" id="addCustomSubAkun3" type="button"><i
                                                    class="fas fa-check"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    <div class="d-flex bd-highlight justify-content-end mt-3">
                        <div class="bd-highlight">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="resetData"><i
                                    class="fa fa-ban"></i>
                                Tutup</button>
                            <button type="submit" class="btn btn-success text-white toastrDefaultSuccess"
                                id="simpan"><i class="fas fa-save" onclick="validateForm()"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@push('script')
    <script>
        $(document).ready(function() {
            $('#inputGroupAkun').select2();
            $('#inputGroupSubAkun1').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#inputGroupSubAkun2').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#inputGroupSubAkun3').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#inputGroupSubAkun1").change(function() {
                var selectedOption = $(this).val();
                if (selectedOption === "custom") {
                    $("#customSubAkunInput1").show();
                } else {
                    $("#customSubAkunInput1").hide();
                }
            });

            $("#addCustomSubAkun1").click(function() {
                var customSubAkun1 = $("#customSubAkun1").val();
                if (customSubAkun1 !== "") {
                    // Tambahkan opsi baru dengan sub akun yang dimasukkan
                    var newOption = $('<option>', {
                        value: customSubAkun1,
                        text: customSubAkun1
                    });

                    // Hapus opsi "Tambah Sub Akun" jika ada
                    $("#inputGroupSubAkun1 option[value='custom']").remove();

                    // Tambahkan opsi yang baru
                    $("#inputGroupSubAkun1").append(newOption);

                    // Setel opsi yang ditambahkan sebagai yang terpilih
                    $("#inputGroupSubAkun1").val(customSubAkun1);

                    // Kosongkan input setelah menambahkan opsi
                    $("#customSubAkun1").val('');

                    // Sembunyikan input tambah sub akun
                    $("#customSubAkunInput1").hide();

                    // Tampilkan kembali opsi "Tambah Sub Akun"
                    $("#inputGroupSubAkun1").append('<option value="custom">Tambah Sub Akun 1</option>');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#inputGroupSubAkun2").change(function() {
                var selectedOption = $(this).val();
                if (selectedOption === "custom") {
                    $("#customSubAkunInput1").show();
                } else {
                    $("#customSubAkunInput1").hide();
                }
            });

            $("#addCustomSubAkun1").click(function() {
                var customSubAkun2 = $("#customSubAkun2").val();
                if (customSubAkun2 !== "") {
                    // Tambahkan opsi baru dengan sub akun yang dimasukkan
                    var newOption = $('<option>', {
                        value: customSubAkun2,
                        text: customSubAkun2
                    });

                    // Hapus opsi "Tambah Sub Akun" jika ada
                    $("#inputGroupSubAkun2 option[value='custom']").remove();

                    // Tambahkan opsi yang baru
                    $("#inputGroupSubAkun2").append(newOption);

                    // Setel opsi yang ditambahkan sebagai yang terpilih
                    $("#inputGroupSubAkun2").val(customSubAkun2);

                    // Kosongkan input setelah menambahkan opsi
                    $("#customSubAkun2").val('');

                    // Sembunyikan input tambah sub akun
                    $("#customSubAkunInput2").hide();

                    // Tampilkan kembali opsi "Tambah Sub Akun"
                    $("#inputGroupSubAkun2").append('<option value="custom">Tambah Sub Akun 2</option>');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#inputGroupSubAkun3").change(function() {
                var selectedOption = $(this).val();
                if (selectedOption === "custom") {
                    $("#customSubAkunInput1").show();
                } else {
                    $("#customSubAkunInput1").hide();
                }
            });

            $("#addCustomSubAkun1").click(function() {
                var customSubAkun3 = $("#customSubAkun3").val();
                if (customSubAkun3 !== "") {
                    // Tambahkan opsi baru dengan sub akun yang dimasukkan
                    var newOption = $('<option>', {
                        value: customSubAkun3,
                        text: customSubAkun3
                    });

                    // Hapus opsi "Tambah Sub Akun" jika ada
                    $("#inputGroupSubAkun3 option[value='custom']").remove();

                    // Tambahkan opsi yang baru
                    $("#inputGroupSubAkun3").append(newOption);

                    // Setel opsi yang ditambahkan sebagai yang terpilih
                    $("#inputGroupSubAkun3").val(customSubAkun3);

                    // Kosongkan input setelah menambahkan opsi
                    $("#customSubAkun3").val('');

                    // Sembunyikan input tambah sub akun
                    $("#customSubAkunInput3").hide();

                    // Tampilkan kembali opsi "Tambah Sub Akun"
                    $("#inputGroupSubAkun3").append('<option value="custom">Tambah Sub Akun 3</option>');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#simpan').prop('disabled', true);

            // Simpan nilai awal input pada saat halaman dimuat
            var klasifikasiAwal = $("#inputGroupKlasifikasi").val();
            var usahaAwal = $("#inputGroupUsaha").val();
            var akunAwal = $("#inputGroupAkun").val();
            var subAkun1Awal = $("#inputGroupSubAkun1").val();
            var subAkun2Awal = $("#inputGroupSubAKun2").val();
            var subAkun3Awal = $("#inputGroupSubAKun3").val();

            // Fungsi untuk memeriksa apakah ada perubahan pada input
            function validateForm() {
                var klasifikasi = $("#inputGroupKlasifikasi").val();
                var usaha = $("#inputGroupUsaha").val();
                var akun = $("#inputGroupAkun").val();
                var subAkun1 = $("#inputGroupSubAkun1").val();
                var subAkun2 = $("#inputGroupSubAKun2").val();
                var subAkun3 = $("#inputGroupSubAKun3").val();

                // Periksa apakah ada perubahan pada setiap input
                var adaPerubahan = (klasifikasi !== klasifikasiAwal) ||
                    (usaha !== usahaAwal) ||
                    (akun !== akunAwal) ||
                    (subAkun1 !== subAkun1Awal) ||
                    (subAkun2 !== subAkun2Awal) ||
                    (subAkun3 !== subAkun3Awal);

                // Aktifkan atau nonaktifkan tombol Simpan berdasarkan perubahan
                if (adaPerubahan) {
                    $('#simpan').prop('disabled', false);
                } else {
                    $('#simpan').prop('disabled', true);
                }
            }

            // Panggil fungsi validateForm saat input berubah
            $('#inputGroupKlasifikasi, #inputGroupUsaha, #inputGroupAkun, #inputGroupSubAkun1, #inputGroupSubAKun2, #inputGroupSubAKun3')
                .on('input', validateForm);
        });
    </script>

    {{-- mereset data ketika klik close modal --}}
    <script>
        $(document).ready(function() {
            $('#reset').on('click', function() {
                $('#inputGroupKlasifikasi').val('Pilih Klasifikasi');
                $('#inputGroupUsaha').val('Pilih Unit Usaha');
                $('#inputGroupAkun').val('Pilih Akun');
                $('#addCustomSubAkun1').val('Pilih Sub Akun 1');
                $('#addCustomSubAkun2').val('Pilih Sub Akun 2');
                $('#addCustomSubAkun3').val('Pilih Sub Akun 3');
                $('#inputGroupUpload').val('Pilih Bukti Valid');
            });
        });
        $(document).ready(function() {
            $('#resetData').on('click', function() {
                $('#inputGroupKlasifikasi').val('Pilih Klasifikasi');
                $('#inputGroupUsaha').val('Pilih Unit Usaha');
                $('#inputGroupAkun').val('Pilih Akun');
                $('#addCustomSubAkun1').val('Pilih Sub Akun 1');
                $('#addCustomSubAkun2').val('Pilih Sub Akun 2');
                $('#addCustomSubAkun3').val('Pilih Sub Akun 3');
                $('#inputGroupUpload').val('Pilih Bukti Valid');
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data klasifikasi, usaha, dan akun (ganti dengan data yang sesuai)
            var dataKlasifikasi = {!! json_encode($dataKlasifikasi) !!};
            var dataUsaha = {!! json_encode($dataUsaha) !!};
            var dataAkun = {!! json_encode($dataAkun) !!};

            var selectKlasifikasi = document.getElementById('inputGroupKlasifikasi');
            var selectUsaha = document.getElementById('inputGroupUsaha');
            var selectAkun = document.getElementById('inputGroupAkun');
            var selectSubAkun1 = document.getElementById('inputGroupSubAkun1');
            var selectSubAkun2 = document.getElementById('inputGroupSubAkun2');
            var selectSubAkun3 = document.getElementById('inputGroupSubAkun3');

            //js untuk pilih usaha agar sesuai dengan klasifikasi
            selectKlasifikasi.addEventListener('change', function() {
                var selectedKlasifikasi = selectKlasifikasi.value;

                // Hapus opsi lama dari select "Unit Usaha"
                selectUsaha.innerHTML = '<option selected>Pilih Unit Usaha</option>';

                var existingValues = new Set(); // Membuat Set untuk menyimpan nilai yang sudah ada

                dataAkun.forEach(function(usaha) {
                    if (usaha.klasifikasi === selectedKlasifikasi) {
                        if (!existingValues.has(usaha.nama_usaha)) {
                            var option = document.createElement('option');
                            option.value = usaha.nama_usaha;
                            option.textContent = usaha.nama_usaha;
                            selectUsaha.appendChild(option);

                            existingValues.add(usaha.nama_usaha); // Menambahkan nilai ke dalam Set
                        }
                    }
                });

                // // Hapus opsi lama dari select "Akun"
                // selectAkun.innerHTML = '<option selected>Pilih Akun</option>';

                // var existingValues = new Set(); // Membuat Set untuk menyimpan nilai yang sudah ada

                // dataAkun.forEach(function(akun) {
                //     if (akun.klasifikasi === selectedKlasifikasi) {
                //         if (!existingValues.has(akun.akun)) {
                //             var option = document.createElement('option');
                //             option.value = akun.akun;
                //             option.textContent = akun.akun;
                //             selectAkun.appendChild(option);

                //             existingValues.add(akun.akun); // Menambahkan nilai ke dalam Set
                //         }
                //     }
                // });

                // selectSubAkun1.innerHTML = '<option selected>Pilih Sub Akun 1</option>';
                // var existingSubAkun1Values = new Set();

                // dataAkun.forEach(function(subakun1) {
                //     if (subakun1.klasifikasi === selectedKlasifikasi) {
                //         if (!existingSubAkun1Values.has(subakun1.sub_akun_1)) {
                //             var option = document.createElement('option');
                //             option.value = subakun1.sub_akun_1;
                //             option.textContent = subakun1.sub_akun_1;
                //             selectSubAkun1.appendChild(option);

                //             existingSubAkun1Values.add(subakun1
                //                 .sub_akun_1); // Menambahkan nilai ke dalam Set
                //         }
                //     }
                // });
            });

            // js untuk pilih akun agar sesuai dengan klasifikasi dan usaha
            selectKlasifikasi.addEventListener('change', function() {
                selectUsaha.addEventListener('change', function() {
                    var selectedKlasifikasi = selectKlasifikasi.value;
                    var selectedUsaha = selectUsaha.value;

                    // Hapus opsi lama dari select "Akun"
                    selectAkun.innerHTML = '<option selected>Pilih Akun</option>';

                    var existingValues =
                        new Set(); // Membuat Set untuk menyimpan nilai yang sudah ada

                    dataAkun.forEach(function(akun) {
                        if (akun.klasifikasi === selectedKlasifikasi) {
                            // Filter akun berdasarkan klasifikasi yang sesuai
                            var selectedUsaha = selectUsaha
                                .value; // Mendapatkan nilai terpilih dari selectUsaha

                            if (akun.usaha === selectedUsaha) {
                                // Filter akun berdasarkan usaha yang sesuai
                                if (!existingValues.has(akun.akun)) {
                                    var option = document.createElement('option');
                                    option.value = akun.akun;
                                    option.textContent = akun.akun;
                                    selectAkun.appendChild(option);

                                    existingValues.add(akun
                                        .akun); // Menambahkan nilai ke dalam Set
                                }
                            }
                        }
                    });
                });
            });

            selectKlasifikasi.addEventListener('change', updateSubAkunOptions);
            selectUsaha.addEventListener('change', updateSubAkunOptions);
            selectAkun.addEventListener('change', updateSubAkunOptions);

            function updateSubAkunOptions() {
                const selectedKlasifikasi = selectKlasifikasi.value;
                const selectedUsaha = selectUsaha.value;
                const selectedAkun = selectAkun.value;

                // Hapus opsi lama dari select "Sub Akun 1"
                selectSubAkun1.innerHTML = '<option selected>Pilih Sub Akun 1</option>';

                const existingValues = new Set(); // Membuat Set untuk menyimpan nilai yang sudah ada

                dataAkun.forEach(function(akun) {
                    if (
                        akun.klasifikasi === selectedKlasifikasi &&
                        akun.usaha === selectedUsaha &&
                        akun.akun === selectedAkun
                    ) {
                        if (!existingValues.has(akun.subAkun1)) {
                            const option = document.createElement('option');
                            option.value = akun.subAkun1;
                            option.textContent = akun.subAkun1;
                            selectSubAkun1.appendChild(option);

                            existingValues.add(akun.subAkun1);
                        }
                    }
                });
            }
        });
    </script>
@endpush
