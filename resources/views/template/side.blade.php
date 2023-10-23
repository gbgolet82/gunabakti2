<style>
    @media (max-width: 50px) {
        .hidden {
            display: none !important;
        }
    }
</style>

<aside class="main-sidebar sidebar-light-success elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
        <img src="{{ asset('gambar/logoo.png') }}" alt="GUNA BAKTI" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-bold">GUNA BAKTI</span>
    </a>

    <style>
        .badge {
            font-size: 70%;
        }

        .badge-br {
            position: relative;
            top: -1px;
            left: 10px;
            font-size: 12px;
            padding: 3px 5px;
            font-size: 12px;
            border-radius: 10px;
            background-color: #fd7e14;
            color: #fff;
        }

        .badge-br2 {
            position: relative;
            top: -1px;
            left: 10px;
            font-size: 12px;
            padding: 3px 5px;
            font-size: 12px;
            border-radius: 10px;
            background-color: #28a745;
            color: #fff;
        }
    </style>




    <div class="sidebar">
        <div class="text-center">
            <h5 class="btn-hilang mt-3">
                <p>UD GUNA BAKTI</p>
            </h5>
            <span class="btn-hilang">Zaroh Khoerunisa</span><br>
            @php
                $selectedRole = session('selectedRole');
                $karyawanRoles = session('karyawanRoles');
            @endphp

            @if ($selectedRole)
                <div class="badge badge-success"><strong>{{ $selectedRole }}</strong></div>
            @else
                @if ($karyawanRoles->count() === 1)
                    <div class="badge badge-success"><strong>{{ $karyawanRoles->first() }}</strong></div>
                @else
                    <div class="badge badge-success"><strong>Peran Default</strong></div>
                @endif
            @endif

            <br>
            <a class="btn btn-white btn-sm btn-hilang"><i class="fas fa-cog"></i>
                <p> Pengaturan</p>
            </a>
            <a href="{{ route('logout') }}" class="btn btn-white btn-sm btn-hilang"><i class="fa fa-sign-out-alt"></i>
                <p> Keluar</p>
            </a>
        </div>
        <hr>
        <!-- Sidebar Menu -->
        <nav class="mt-1">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item @yield('dashboard')">
                    <a href="{{ route('dashboard') }}" class="nav-link @if (Request::url() == route('dashboard')) active @endif">
                        {{-- <i class="nav-icon fas fa-users"></i> --}}
                        <i class="bi bi-house-door-fill custom-icon"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-header font-weight-bolder">Data Master</li>
                <li class="nav-item @yield('usaha')">
                    <a href="{{ route('usaha') }}" class="nav-link @if (Request::url() == route('usaha')) active @endif">
                        <i class="bi bi-bar-chart-line-fill custom-icon"></i>
                        <p>
                            Unit Usaha
                        </p>
                    </a>
                </li>
                <li class="nav-item @yield('karyawan')">
                    <a href="{{ route('karyawan') }}" class="nav-link @if (Request::url() == route('karyawan')) active @endif">
                        <i class="bi bi-person-fill custom-icon"></i>
                        <p>
                            Data Karyawan
                        </p>
                    </a>
                </li>
                <li class="nav-item @yield('akun')">
                    <a href="{{ route('akun') }}" class="nav-link @if (Request::url() == route('akun')) active @endif">
                        <i class="fas fa-server"></i>
                        <p>
                            Klasifikasi & Akun
                        </p>
                    </a>
                </li>


                <li class="nav-header font-weight-bolder mt-1">Data Laporan</li>
                <li class="nav-item @yield('labarugi')">
                    <a href="#" class="nav-link @yield('labarugi')">
                        {{-- <i class="bi bi-activity custom-icon"></i> --}}<i class="fas fa-chart-line"></i>
                        <p>
                            Laba Rugi
                        </p>
                    </a>
                </li>
                <li class="nav-item @yield('pemasukan_blm')">
                    <a href="{{ route('pemasukan_blm') }}"
                        class="nav-link @if (Request::url() == route('pemasukan_blm')) active @endif">
                        <i class="bi bi-cart-fill custom-icon"></i>
                        <p>
                            Pemasukan &nbsp;
                        </p>
                        <span class="badge-br badge-info" id="permintaan-badge"></span>
                    </a>
                </li>

                {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

                


                <li class="nav-item @yield('pengeluaran_blm')">
                    <a href="#" class="nav-link @yield('pengeluaran_blm')">
                        <i class="bi bi-file-earmark-text-fill custom-icon"></i>
                        <p>
                            Pengeluaran
                        </p>
                        <span class="badge-br badge-info" id="pengeluaran-badge">Blm dicek (8)</span>
                    </a>
                </li>

                <li class="nav-item @yield('pemasukan_sdh')">
                    <a href="#" class="nav-link @yield('pemasukan_sdh')">
                        <i class="bi bi-cart-fill custom-icon"></i>
                        <p>
                            Pemasukan &nbsp;
                        </p>
                        <span class="badge-br2 badge-info" id="permintaan2-badge">Sdh dicek (8)</span>
                    </a>
                </li>
                <li class="nav-item @yield('pengeluaran_sdh')">
                    <a href="#" class="nav-link @yield('pengeluaran_sdh')">
                        <i class="bi bi-file-earmark-text-fill custom-icon"></i>
                        <p>
                            Pengeluaran
                        </p>
                        <span class="badge-br2 badge-info" id="pengeluaran2-badge">Sdh dicek (8)</span>
                    </a>
                </li>

                <style>
                    .custom-icon {
                        font-weight: bold;
                        /* Jika ingin menjaga tebal */
                    }
                </style>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
