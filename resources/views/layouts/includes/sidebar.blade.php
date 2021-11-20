<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="/dashboard" class="waves-effect">
                        <div class="d-inline-block icons-sm mr-1"><i class="uim uim-airplay"></i></div><!--<span class="badge badge-pill badge-success float-right">3</span>-->
                        <span><b>Dashboard</b></span>
                    </a>
                </li>
                @if(auth()->user()->level == 0 | auth()->user()->level == 2 | auth()->user()->level == 3)
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1"><i class="uim uim uim-list-ul"></i></div>
                        <span><b>Data Master</b></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if(auth()->user()->level == 0 | auth()->user()->level == 2)
                        <!--<li><a href="/data_sumber">Sumber Dana</a></li>-->
                        <li><a href="/data_jenis">Jenis Belanja</a></li>
                        <li><a href="/data_rekening">Data Rekening</a></li>
                        @endif
                        @if(auth()->user()->level == 0 | auth()->user()->level == 2)
                        <li><a href="/data_kegiatan">Data Kegiatan</a></li>
                        @else
                        <li><a href="/data_kegiatan/{{auth()->user()->id_pengguna}}">Data Kegiatan</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                @if(auth()->user()->level == 0)
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <div class="d-inline-block icons-sm mr-1"><i class="uim uim-sign-in-alt"></i></div>
                            <span><b>Manajemen Users</b></span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="/data_jabatan">Kategori Jabatan</a></li>
                            <li><a href="/data_pengguna">Data Pengguna</a></li>
                            <li><a href="/data_login">Data Login</a></li>
                        </ul>
                    </li>
                @endif
                @if(auth()->user()->level == 0 | auth()->user()->level == 2)
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1"><i class="uim uim-grids"></i></div>
                        <span><b>Manajemen Rkas</b></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/data_rkas">Data RKAS</a></li>
                        <!--<li><a href="/data_dana">Data Dana</a></li>-->
                        <li><a href="/data_pengajuan">Data Pengajuan</a></li>
                        <li><a href="/data_belanja">Daftar Belanja</a></li>
                    </ul>
                </li>
                @endif
                @if(auth()->user()->level == 0 | auth()->user()->level == 3)
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1"><i class="uim uim-upload-alt"></i></div>
                        <span><b>Pengajuan</b></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if(auth()->user()->level == 0)
                        <li><a href="/pengajuan">Pengajuan Anggaran</a></li>
                        <li><a href="/realisasi">Realisasi Anggaran</a></li>
                        @else
                        <li><a href="/pengajuan/{{auth()->user()->id_pengguna}}">Pengajuan Anggaran</a></li>
                        <li><a href="/realisasi/{{auth()->user()->id_pengguna}}">Realisasi Anggaran</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                @if(auth()->user()->level == 0 | auth()->user()->level == 1 | auth()->user()->level == 2)
                <li>
                    <a href="/monitoring" class="waves-effect">
                        <div class="d-inline-block icons-sm mr-1"><i class="uim uim-graph-bar"></i></div>
                        <span><b>Monitoring Anggaran</b></span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->level == 0 | auth()->user()->level == 1 | auth()->user()->level == 2)
                <li>
                    <a href="/laporan" class="waves-effect">
                        <div class="d-inline-block icons-sm mr-1"><i class="uim uim uim-layer-group"></i></div>
                        <!--<span class="badge badge-pill badge-danger float-right">07</span>-->
                        <span><b>Laporan</b></span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>