@extends('layouts.master')

@section('title')
    <title>Laporan | Sistem Monitoring Anggaran Keuangan</title>
@stop


@section('content')
<div class="main-content">
    <div class="page-content">
    
        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1">Laporan</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Cetak laporan Monitoring Anggaran</li>
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
                                            <label >Laporan &nbsp</label><i class="fas fa-caret-square-right"></i><label>&nbsp Cetak Laporan</label>                                    
                                    </div>
                                </div><hr>
                                <div class="row justify-content-center">
                                    <div class="col-6">
                                        <form action="/print" method="POST" target="_blank" class="custom-validation">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <div>
                                                    <select name="id_rkas" class="form-control" required>                                                                    
                                                    <option>Pilih Tahun Anggaran ...</option>
                                                    @foreach($data_rkas as $rkas)                                                                        
                                                        <option value="{{$rkas->id_rkas}}">Tahun Anggaran {{$rkas->tahun_anggaran}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>                                            
                                            <div class="row justify-content-center">
                                                <div>
                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i><b>&nbsp Cetak Laporan &nbsp</b></button>
                                                </div>
                                            </div>                                                        
                                        </form>
                                    </div>
                                </div>
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