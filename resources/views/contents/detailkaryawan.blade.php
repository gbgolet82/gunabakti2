@extends('main')

@section('karyawan', 'active')

@section('content')
    <style>
        <blade media|%20(max-width%3A%20820px)%20%7B%0D>.hidden {
            display: none !important;
        }

        .profile-image-container {
            position: relative;
            display: inline-block;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .profile-image-container:hover .overlay {
            opacity: 1;
        }

        .camera-icon i {
            color: white;
            font-size: 24px;
            /* Sesuaikan ukuran ikon sesuai kebutuhan Anda */
            cursor: pointer;
        }

        .text {
            color: rgb(126, 125, 125);
            font-weight: bold;
            margin-top: 5px;
        }
    </style>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item active">
                            <a href="/" class="text-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ route('karyawan') }}" class="text-primary">Data Karyawan</a>
                        </li>
                        <li class="breadcrumb-item active">Muhammad Fikri</li>
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
    </div><!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="font-weight-bold">
                                <i class="fa fa-user" style="font-size: 23px"></i> <span style="font-size: 23px">Detail
                                    Karyawan</span>
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card card-success card-outline">
                                <div class="card-body box-profile">
                                    {{-- <div class="text-center">
                                        <img class="profile-user-img img-fluid rounded-circle"
                                            src="{{ asset('gambar/fotoo.jfif') }}" alt="User profile picture"
                                            style="width: 140px; height: 140px; object-fit: cover;">
                                    </div> --}}
                                    <div class="text-center">
                                        <div class="profile-image-container">
                                            <img class="profile-user-img img-fluid rounded-circle"
                                                src="{{ asset('gambar/fotoo.jfif') }}" alt="User profile picture"
                                                style="width: 140px; height: 140px; object-fit: cover;">
                                            <div class="overlay">
                                                <div class="camera-icon" id="change-profile-pic">
                                                    <i class="fa fa-camera"></i>
                                                </div>
                                                <div class="text">Ubah Foto</div>
                                            </div>
                                        </div>
                                        <input type="file" id="profile-pic-input" style="display: none;">
                                    </div>





                                    <h3 class="profile-username text-center">Muhammad Fikri</h3>
                                    <p class="text-muted text-center">
                                        <span class="badge badge-primary mr-1"
                                            style="font-size: 14px; border-radius: 10px;">Manajer</span>
                                        <span class="badge badge-success"
                                            style="font-size: 14px; border-radius: 10px;">Kasir</span>
                                    </p>

                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <span class="font-weight-bold">Unit Usaha</span> <span class="float-right">Toko
                                                Guna Bakti</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="font-weight-bold">No HP</span> <span
                                                class="float-right">089909900099</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="font-weight-bold">Status</span> <button
                                                class="btn btn-outline-success float-right"
                                                style="font-size: 12px; border-radius: 10px;"><i class="fa fa-user" aria-hidden="true"></i> AKTIF</button>
                                            {{-- <span class="font-weight-bold">Status</span> <button
                                                class="btn btn-outline-success float-right"
                                                style="font-size: 12px; border-radius: 10px;"><i class="fa fa-user-times" aria-hidden="true"></i> AKTIF</button> --}}
                                        </li>
                                    </ul>
                                    <button class="btn btn-block text-white mt-4"
                                        style="background-color: #28a745; border-radius: 10px;" type="button"
                                        data-toggle="modal" data-target="#perbaruiData" aria-expanded="false"><i
                                            class="fa fa-save"></i> &nbsp;Perbarui Data
                                    </button>

                                    <div class="modal fade" id="perbaruiData" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Form untuk input informasi karyawan -->
                                                    <form>
                                                        @csrf
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="nama">NAMA </label>
                                                                <sup class="badge rounded-pill badge-danger text-white"
                                                                    style="background-color: rgba(230, 82, 82); font-size: 10px; padding: 4px 8px;">WAJIB</sup>
                                                                <input type="text" class="form-control" name="nama"
                                                                    id="nama" placeholder="Masukkan nama">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="nomor-hp">NOMOR HP </label>
                                                                <sup class="badge rounded-pill badge-danger text-white"
                                                                    style="background-color: rgba(230, 82, 82); font-size: 10px; padding: 4px 8px;">WAJIB</sup>
                                                                <input type="text" class="form-control" name="nomorhp"
                                                                    id="nomor-hp" placeholder="Masukkan nomor HP">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="email">EMAIL </label>
                                                                <sup class="badge rounded-pill badge-danger text-white"
                                                                    style="background-color: rgba(230, 82, 82); font-size: 10px; padding: 4px 8px;">WAJIB</sup>
                                                                <input type="email" class="form-control" name="email"
                                                                    id="email" placeholder="Masukkan email">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="unit-usaha">UNIT USAHA</label>
                                                                <sup class="badge rounded-pill badge-danger text-white"
                                                                    style="background-color: rgba(230, 82, 82); font-size: 10px; padding: 4px 8px;">WAJIB</sup>
                                                                <select class="form-control" id="unit-usaha"
                                                                    name="unitusaha">
                                                                    <option value="" disabled selected hidden>Pilih
                                                                        unit usaha
                                                                    </option>
                                                                    <option value="Toko Guna Bakti">Toko
                                                                        Guna
                                                                        Bakti</option>
                                                                    <option value="Penggilingan Wangon">
                                                                        Penggilingan Wangon</option>
                                                                    <option value="Produksi">Produksi
                                                                    </option>
                                                                    <option value="Sawah">Sawah</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label for="alamat">ALAMAT </label>
                                                                <sup class="badge rounded-pill badge-danger text-white"
                                                                    style="background-color: rgba(230, 82, 82); font-size: 10px; padding: 4px 8px;">WAJIB</sup>
                                                                <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Masukkan alamat"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label for="alamat">ROLE</label>
                                                                <sup class="badge rounded-pill badge-danger text-white"
                                                                    style="background-color: rgba(230, 82, 82); font-size: 10px; padding: 4px 8px;">WAJIB</sup>
                                                                <br>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="manajer">
                                                                    <label class="form-check-label"
                                                                        for="manajer">Manajer</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="kasir">
                                                                    <label class="form-check-label"
                                                                        for="kasir">Kasir</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="owner">
                                                                    <label class="form-check-label"
                                                                        for="owner">Owner</label>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal"><i class="fa fa-ban"></i>
                                                        Tutup</button>
                                                    <button type="button" class="btn btn-primary"><i
                                                            class="fa fa-save"></i> Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card card-success card-outline">
                                <div class="card-header"><i class="fa fa-cogs"></i><span style="font-size: 18px">
                                        Pengaturan Akun</span>
                                </div>
                                </h4>
                                <div class="card-body box-profile">
                                    <form>
                                        @csrf
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <i class="fa fa-exclamation-circle"></i>
                                                Terdapat kesalahan! Silahkan cek kembali data Anda. <br>
                                            </div>
                                        @endif
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="password">Password Baru</label>
                                                <div class="input-group">
                                                    <input type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        id="password" name="password"
                                                        placeholder="Masukan password baru" value="{{ old('password') }}">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text toggle-password">
                                                            <i class="fas fa-eye"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                @error('password')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="password_confirmation">Konfirmasi Password</label>
                                                <div class="input-group">
                                                    <input type="password"
                                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                                        id="password_confirmation" name="password_confirmation"
                                                        placeholder="Masukan password baru"
                                                        value="{{ old('password_confirmation') }}">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text toggle-password">
                                                            <i class="fas fa-eye"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                @error('password_confirmation')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex bd-highlight justify-content-end mt-0 mb-1">
                                            <div class="bd-highlight">
                                                <button class="btn btn-block text-white"
                                                    style="background-color: #28a745; border-radius: 10px;" type="button"
                                                    data-toggle="modal" data-target="#perbaruiAkun"
                                                    aria-expanded="false"><i class="fa fa-save"></i> &nbsp;Perbarui Akun
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </section>
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cameraIcon = document.getElementById('change-profile-pic');
            const profilePicInput = document.getElementById('profile-pic-input');

            cameraIcon.addEventListener('click', function() {
                profilePicInput.click();
            });

            profilePicInput.addEventListener('change', function(event) {
                const selectedFile = event.target.files[0];
                if (selectedFile) {
                    // Di sini, Anda dapat menambahkan logika untuk mengunggah gambar ke server Anda.
                    // Setelah mengunggah, Anda juga dapat memperbarui gambar profil yang ditampilkan.
                    // Misalnya, Anda dapat menggunakan FormData untuk mengirim gambar ke server.
                }
            });
        });
    </script>
@endpush
