@extends('layouts.master')

@section('title')
    <title>Manajemen Rkas | Sistem Monitoring Anggaran Keuangan</title>
@stop


@section('content')
<div class="main-content">
    <div class="page-content">
    
        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1">Manajemen RKAS</h4>
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
                                            <label >Manajemen RKAS &nbsp</label><i class="fas fa-caret-square-right"></i><label>&nbsp Daftar Belanja</label>                                    
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
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" aria-label="Position: activate to sort column ascending">Tahun RKAS</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" aria-label="Position: activate to sort column ascending">Nomer Rekening</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" aria-label="Position: activate to sort column ascending">Nama Belanja</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" aria-label="Position: activate to sort column ascending">Jenis Belanja</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" aria-label="Position: activate to sort column ascending">Bulan Pelaksanaan</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" aria-label="Position: activate to sort column ascending">Rencana Biaya</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" aria-label="Position: activate to sort column ascending">Harga Satuan</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" aria-label="Position: activate to sort column ascending">Jumlah Item</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" aria-label="Position: activate to sort column ascending">Rincian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_belanja as $no => $belanja)
                                        <tr>
                                            <td >{{++$no}}.</td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td>{{$belanja->rkas->tahun_anggaran}}</td>
                                            <td>{{$belanja->rekening->nomer_rekening}}</td>
                                            <td>{{$belanja->r_nama_belanja}}</td>
                                            <td>{{$belanja->rekening->jenis->nama_jenis}}</td>
                                            <td>{{$belanja->r_waktu}}</td>
                                            <td>Rp. {{number_format($belanja->r_total_belanja)}}</td>
                                            <td>Rp. {{number_format($belanja->r_harga_satuan)}}</td>
                                            <td>{{number_format($belanja->r_volume)}}</td>
                                            <td>{{$belanja->r_rincian}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- End table -->

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