@extends('layouts.master')

@section('title')
    <title>Monitoring | Sistem Monitoring Anggaran Keuangan</title>
@stop


@section('content')
<div class="main-content">
    <div class="page-content">
    
        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1">Monitoring Anggaran</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Monitor Efektifitas Anggaran Menggunakan Metode SPI dan CPI</li>
                        </ol>
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
                                            <label >Monitoring Anggaran &nbsp</label><i class="fas fa-caret-square-right"></i><label>&nbsp SPI & CPI</label>                                    
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
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" style="width: 15%;" aria-label="Position: activate to sort column ascending">Tahun Anggaran</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" style="width: 30%;" aria-label="Position: activate to sort column ascending">Total Item Belanja</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" style="width: 30%;" aria-label="Position: activate to sort column ascending">Total Dana</th>
                                            <th style="width: 20%;">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_rkas as $no => $rkas)
                                        <tr>
                                            <td >{{++$no}}.</td>
                                            <td style="display: none;">{{$rkas->id_rkas}}</td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td>{{$rkas->tahun_anggaran}}</td>
                                            <td>{{$data_detail = \App\Models\Detail::where('id_rkas', $rkas->id_rkas)->count()}} Item</td>
                                            <td>Rp. {{number_format($rkas->total_dana)}}</td>
                                            <td align="center">
                                                <a href="/analisa/{{$rkas->id_rkas}}" type="button" class="btn btn-primary btn-sm"><i class="dripicons-export"></i>&nbsp Analisa Data</a>
                                            </td>
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