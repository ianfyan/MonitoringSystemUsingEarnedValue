@extends('layouts.master')

@section('title')
    <title>Data Master | Sistem Monitoring Anggaran Keuangan</title>
@stop


@section('content')
<div class="main-content">
    <div class="page-content">
    
        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1">Data Master</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                @if(session('sukses'))
                                <div class="alert alert-success" role="alert">
                                    {{session('sukses')}}
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-6">
                                            <label >Data Master &nbsp</label><i class="fas fa-caret-square-right"></i><label>&nbsp Data Kegiatan</label>
                                    
                                    </div>
                                    <div class="col-6" >
                                        <div class=" float-right">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fas fa-plus-circle"></i><b> &nbspTambah Kegiatan</b>
                                            </button> 
                                        </div>
                                    </div>

                                        <!--Add Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-window-close"></i></button>
                                                    </div>                                                    
                                                    <form action="/data_kegiatan/create" method="POST" class="custom-validation">
                                                    {{csrf_field()}}
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <div>
                                                                    <input type="hidden" name="id_pengguna" class="form-control" value="{{auth()->user()->id_pengguna}}" required />
                                                                </div>
                                                            </div> 
                                                            <div class="form-group">
                                                                <label>Nama Kegiatan</label>
                                                                <div>
                                                                    <input type="text" name="nama_kegiatan" class="form-control" required placeholder="Masukkan nama kegiatan ..."/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Bulan Pelaksanaan</label>
                                                                <div>
                                                                    <select name="bln_pelaksanaan" class="form-control">
                                                                        <option value="1">Januari</option>
                                                                        <option value="2">Februari</option>
                                                                        <option value="3">Maret</option>
                                                                        <option value="4">April</option>
                                                                        <option value="5">Mei</option>
                                                                        <option value="6">Juni</option>
                                                                        <option value="7">Juli</option>
                                                                        <option value="8">Agustus</option>
                                                                        <option value="9">September</option>
                                                                        <option value="10">Oktober</option>
                                                                        <option value="11">November</option>
                                                                        <option value="12">Desember</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>                                                    
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i><b>&nbsp Tutup &nbsp</b></button>
                                                            <button type="reset" class="btn btn-secondary"><i class="fas fa-eraser"></i><b>&nbsp Reset &nbsp</b></button>
                                                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i><b>&nbsp Simpan &nbsp</b></button>
                                                        </div>                                                        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End add Modal -->  
                                </div><hr>

                                <!-- Table -->
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 5%;">No.</th>
                                            <th style="display: none;">ID</th>
                                            <th style="display: none;">ID</th>
                                            <th style="display: none;">ID</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" style="width: 20%;" aria-label="Position: activate to sort column ascending">Pengguna</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" style="width: 35%;" aria-label="Position: activate to sort column ascending">Nama Kegiatan</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" style="width: 20%;" aria-label="Position: activate to sort column ascending">Pelaksanaan</th>
                                            <th style="width: 20%;">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_kegiatan as $no => $kegiatan)
                                        <tr>
                                            <td >{{++$no}}.</td>
                                            <td style="display: none;">{{$kegiatan->id_kegiatan}}</td>
                                            <td style="display: none;">{{$kegiatan->bln_pelaksanaan}}</td>
                                            <td style="display: none;"></td>                                            
                                            <td>{{$kegiatan->pengguna->nama_pengguna}}</td>
                                            <td>{{$kegiatan->nama_kegiatan}}</td>
                                            @if($kegiatan->bln_pelaksanaan == 1)
                                            <td>Januari</td>
                                            @elseif($kegiatan->bln_pelaksanaan == 2)
                                            <td>Februari</td>
                                            @elseif($kegiatan->bln_pelaksanaan == 3)
                                            <td>Maret</td>
                                            @elseif($kegiatan->bln_pelaksanaan == 4)
                                            <td>April</td>
                                            @elseif($kegiatan->bln_pelaksanaan == 5)
                                            <td>Mei</td>
                                            @elseif($kegiatan->bln_pelaksanaan == 6)
                                            <td>Juni</td>
                                            @elseif($kegiatan->bln_pelaksanaan == 7)
                                            <td>Juli</td>
                                            @elseif($kegiatan->bln_pelaksanaan == 8)
                                            <td>Agustus</td>
                                            @elseif($kegiatan->bln_pelaksanaan == 9)
                                            <td>September</td>
                                            @elseif($kegiatan->bln_pelaksanaan == 10)
                                            <td>Oktober</td>
                                            @elseif($kegiatan->bln_pelaksanaan == 11)
                                            <td>November</td>
                                            @else
                                            <td>Desember</td>
                                            @endif
                                            <td align="center">
                                                <button type="button" class="btn btn-warning btn-sm edit_kegiatan"><i class="fas fa-edit"></i></button> &nbsp
                                                <button type="button" class="btn btn-danger btn-sm delete_kegiatan"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- End table -->    

                                <!--Edit Modal -->
                                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Jenis Belanja</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-window-close"></i></button>
                                            </div>                                                    
                                            <form action="" method="POST" id="editForm" class="custom-validation">
                                            {{csrf_field()}}
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div>
                                                            <input type="hidden" name="id_pengguna" id="id_pengguna" class="form-control" value="{{auth()->user()->id_pengguna}}" required />
                                                        </div>
                                                    </div> 
                                                    <div class="form-group">
                                                        <label>Nama Kegiatan</label>
                                                        <div>
                                                            <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" required placeholder="Masukkan nama kegiatan ..."/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Bulan Pelaksanaan</label>
                                                        <div>
                                                            <select name="bln_pelaksanaan" id="bln_pelaksanaan" class="form-control">
                                                                <option value="1">Januari</option>
                                                                <option value="2">Februari</option>
                                                                <option value="3">Maret</option>
                                                                <option value="4">April</option>
                                                                <option value="5">Mei</option>
                                                                <option value="6">Juni</option>
                                                                <option value="7">Juli</option>
                                                                <option value="8">Agustus</option>
                                                                <option value="9">September</option>
                                                                <option value="10">Oktober</option>
                                                                <option value="11">November</option>
                                                                <option value="12">Desember</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>                                                    
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i><b>&nbsp Tutup &nbsp</b></button>
                                                    <button type="reset" class="btn btn-secondary"><i class="fas fa-eraser"></i><b>&nbsp Reset &nbsp</b></button>
                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i><b>&nbsp Update &nbsp</b></button>
                                                </div>                                                        
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                                <!-- End edit modal -->

                                <!--Confirm Modal -->
                                <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-window-close"></i></button>
                                            </div>
                                            <form action="" method="get" id="confirmForm" class="custom-validation">           
                                                <div class="modal-body" style="font-size: 17px;">
                                                    {{csrf_field()}}
                                                    Apakah anda yakin ingin menghapus <label id="confirmText" style="font-weight: bold;"></label> dari daftar?
                                                </div>                                                    
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i><b>&nbsp Batal &nbsp</b></button>
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i><b>&nbsp Hapus &nbsp</b></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                                <!-- End confirm modal -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </div> 
        <!-- end page-content-wrapper -->
    </div>
    <!-- End Page-content -->
</div>
@stop