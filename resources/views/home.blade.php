@extends('layouts.master')

@section('title')
    <title>Dashboard | Sistem Monitoring Anggaran Keuangan</title>
@stop
@php
{{
    if($data_analisis[0]->nilai_spi >= 1){
        $color = "#00FF00";
    }elseif($data_analisis[0]->nilai_spi == 0){
        $color = "#3051d3";
    }else{
        $color = "#FF0000";
    }

    if($data_analisis[0]->nilai_cpi >= 1){
        $color1 = "#00FF00";
    }elseif($data_analisis[0]->nilai_cpi == 0){
        $color1 = "#3051d3";
    }else{
        $color1 = "#FF0000";
    }
}}
@endphp
@section('content')
<div class="main-content">
    <div class="page-content">                    
        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1">Dashboard</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Welcome to Monitoring System Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h5>Welcome Back !</h5>
                                        <p class="text-muted">{{auth()->user()->pengguna->nama_pengguna}}</p>
                                        <div class="mt-4">
                                            <a href="/data_rkas" class="btn btn-primary btn-sm">View more <i class="mdi mdi-arrow-right ml-1"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-5 ml-auto">
                                        <div>
                                            <img src="assets/images/widget-img.png" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="header-title mb-4">Performance Report</h5>
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-muted mb-2">SPI Value for this periode</p>
                                        <h4>{{$data_analisis[0]->nilai_spi}}</h4>
                                    </div>
                                    <div dir="ltr" class="ml-2">
                                        <input data-plugin="knob" data-width="56" data-height="56" data-linecap=round data-displayInput=false
                                        data-fgColor="{{$color;}}" value="{{$data_analisis[0]->nilai_spi * 100}}" data-skin="tron" data-angleOffset="56"
                                        data-readOnly=true data-thickness=".17" />
                                    </div>
                                </div>
                                <hr>
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-muted mb-2">CPI Value for this periode</p>
                                        <h4>{{$data_analisis[0]->nilai_cpi}}</h4>
                                    </div>
                                    <div dir="ltr" class="ml-2">
                                        <input data-plugin="knob" data-width="56" data-height="56" data-linecap=round data-displayInput=false
                                        data-fgColor="{{$color1;}}" value="{{$data_analisis[0]->nilai_cpi * 100}}" data-skin="tron" data-angleOffset="56"
                                        data-readOnly=true data-thickness=".17" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>        
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="header-title mb-4">Realization Report</h5>
                                <!--
                                <div id="yearly-sale-chart" class="apex-charts"></div>
                                -->
                                <canvas id="myChart" ></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div>
        <!-- end page-content-wrapper -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content-->
@stop