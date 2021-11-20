@extends('layouts.master')

@section('title')
    <title>Manajemen Users | Sistem Monitoring Anggaran Keuangan</title>
@stop


@section('content')
<div class="main-content">
    <div class="page-content">
    
        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1">Manajemen Users</h4>
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
                                            <label >Manajemen Users &nbsp</label><i class="fas fa-caret-square-right"></i><label>&nbsp Data Login</label>
                                    </div>
                                </div><hr>

                                <!-- Table -->
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 5%;">No.</th>
                                            <th style="display: none;">ID</th>
                                            <th style="display: none;">ID</th>
                                            <th style="display: none;">ID</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" style="width: 40%;" aria-label="Position: activate to sort column ascending">Nama Pengguna</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" style="width: 35%;" aria-label="Position: activate to sort column ascending">Username</th>
                                            <th style="width: 20%;">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_login as $no => $login)
                                        <tr>
                                            <td >{{++$no}}.</td>
                                            <td style="display: none;">{{$login->id}}</td>
                                            <td style="display: none;">{{$login->id_pengguna}}</td>
                                            <td style="display: none;"></td>
                                            <td>{{$login->pengguna->nama_pengguna}}</td>
                                            <td>{{$login->username}}</td>
                                            <td align="center">
                                                <button type="button" class="btn btn-warning btn-sm edit_login"><i class="fas fa-redo-alt"></i>&nbsp Reset Data Login</button>
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
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Login</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-window-close"></i></button>
                                            </div>                                                    
                                            <form action="" method="POST" id="editForm" class="custom-validation">
                                            {{csrf_field()}}
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Username</label>  
                                                        <div>
                                                            <input type="text" name="username" id="username" class="form-control" required placeholder="Masukkan username ..."/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>  
                                                        <div>
                                                            <input type="text" name="password" id="password" class="form-control" required placeholder="Masukkan password ..."/>
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