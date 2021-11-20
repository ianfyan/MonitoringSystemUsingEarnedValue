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
                                            <label >Data Master &nbsp</label><i class="fas fa-caret-square-right"></i><label>&nbsp Sumber Dana</label>
                                    
                                    </div>
                                    <div class="col-6" >
                                        <div class=" float-right">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fas fa-plus-circle"></i><b> &nbspTambah Sumber Dana</b>
                                            </button> 
                                        </div>
                                    </div>

                                        <!--Add Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Sumber Dana</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-window-close"></i></button>
                                                    </div>                                                    
                                                    <form action="/data_sumber/create" method="POST" class="custom-validation">
                                                    {{csrf_field()}}
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Sumber Dana</label>
                                                                <div>
                                                                    <input type="text" name="nama_sumber" class="form-control" required placeholder="Masukkan sumber dana ..."/>
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
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" style="width: 75%;" aria-label="Position: activate to sort column ascending">Sumber Dana</th>
                                            <th style="width: 20%;">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_sumber as $no => $sumber)
                                        <tr>
                                            <td >{{++$no}}.</td>
                                            <td style="display: none;">{{$sumber->id_sumber}}</td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td>{{$sumber->nama_sumber}}</td>
                                            <td align="center">
                                                <button type="button" class="btn btn-warning btn-sm edit_sumber"><i class="fas fa-edit"></i></button> &nbsp
                                                <button type="button" class="btn btn-danger btn-sm delete_sumber"><i class="fas fa-trash-alt"></i></button>
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
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Sumber Dana</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-window-close"></i></button>
                                            </div>                                                    
                                            <form action="" method="POST" id="editForm" class="custom-validation">
                                            {{csrf_field()}}
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Sumber Dana</label>  
                                                        <div>
                                                            <input type="text" name="nama_sumber" id="nama_sumber" class="form-control" required placeholder="Masukkan sumber dana ..."/>
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