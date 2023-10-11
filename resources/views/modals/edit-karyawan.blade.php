<form action="{{ route('update.karyawan', $karyawan->id_karyawan) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal-body">
        <div class="tab-content mt-1">
            <div class="tab-pane fade show active" id="nav-satu-tab" role="tabpanel" aria-labelledby="nav-satu-tab">
                <div id="form-lama">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama">NAMA &nbsp;</label>
                            <sup class="badge rounded-pill badge-danger text-white"
                                style="background-color: rgba(230, 82, 82); font-size: 10px; padding: 4px 8px;">WAJIB</sup>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                id="nama" placeholder="Masukan nama usaha" name="nama"
                                value="{{ $karyawan->nama }}" onkeydown="return /[a-z, ]/i.test(event.key)">
                            @error('nama')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nomor_hp">NOMOR HP &nbsp;</label>
                            <sup class="badge rounded-pill badge-danger text-white"
                                style="background-color: rgba(230, 82, 82); font-size: 10px; padding: 4px 8px;">WAJIB</sup>
                            <input type="text" class="form-control @error('nohp') is-invalid @enderror"
                                id="nohp" placeholder="Masukan nomor hp" name="nohp"
                                value="{{ $karyawan->nohp }}"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            @error('nohp')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="email">EMAIL &nbsp;</label>
                            <sup class="badge rounded-pill badge-danger text-white"
                                style="background-color: rgba(230, 82, 82); font-size: 10px; padding: 4px 8px;">WAJIB</sup>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" placeholder="Masukan email" name="email"
                                value="{{ $karyawan->email }}">
                            @error('email')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="unit_usaha">UNIT USAHA &nbsp;</label>
                            <sup class="badge rounded-pill badge-danger text-white"
                                style="background-color: rgba(230, 82, 82); font-size: 10px; padding: 4px 8px;">WAJIB</sup>
                            <select class="form-control" id="unit_usaha" name="id_usaha">
                                @foreach ($unit_usaha as $item)
                                    <option value="{{ $item->id_usaha }}"
                                        {{ $karyawan->id_usaha == $item->id_usaha ? 'selected' : '' }}>
                                        {{ $item->nama_usaha }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_usaha')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="alamat">ALAMAT </label>
                            <sup class="badge rounded-pill badge-danger text-white"
                                style="background-color: rgba(230, 82, 82); font-size: 10px; padding: 4px 8px;">WAJIB</sup>
                            <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Masukkan alamat">{{ $karyawan->alamat }}</textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="alamat">ROLE</label>
                            <sup class="badge rounded-pill badge-danger text-white"
                                style="background-color: rgba(230, 82, 82); font-size: 10px; padding: 4px 8px;">WAJIB</sup>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="manajer" name="manajer"
                                    {{ $karyawan->manajer ? 'checked' : '' }}>
                                <label class="form-check-label" for="manajer">Manajer</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="kasir" name="kasir"
                                    {{ $karyawan->kasir ? 'checked' : '' }}>
                                <label class="form-check-label" for="kasir">Kasir</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="owner" name="owner"
                                    {{ $karyawan->owner ? 'checked' : '' }}>
                                <label class="form-check-label" for="owner">Owner</label>
                            </div>
                        </div>
                    </div>
                    <div class="card card-body p-2 pl-3 pr-3" style="background-color:#cbf2d6;">
                        <div class="row">
                            <small>
                                <b>INFORMASI!</b><br>
                                Silakan masukan data di atas secara lengkap!<br>
                            </small>
                        </div>
                    </div>
                    <div class="d-flex bd-highlight justify-content-end mt-3">
                        <div class="bd-highlight">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                    class="fa fa-ban"></i>
                                Tutup</button>
                            <button type="submit" class="btn btn-success text-white toastrDefaultSuccess"
                                id="simpan"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



