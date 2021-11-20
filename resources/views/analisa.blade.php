@extends('layouts.master')

@section('title')
    <title>Monitoring | Sistem Monitoring Anggaran Keuangan</title>
@stop
@php
{{
    //Rencana Anggaran
    $total_anggaran = $data_rkas->total_dana;
    $anggaran_cawu1 = ($total_anggaran*30)/100;
    $anggaran_cawu2 = ($total_anggaran*40)/100;
    $anggaran_cawu3 = ($total_anggaran*30)/100;

    //Realisasi Anggaran
    $realisasi_anggaran = $data_rkas->dana_terpakai;
    $realisasi_rutin = ($data_realisasi->where('f_waktu', 'Rutin')->sum('f_total_belanja'))/3;
    $realisasi_cawu1 = ($data_realisasi->where('f_waktu', 'Caturwulan 1')->sum('f_total_belanja')) + $realisasi_rutin;
    $realisasi_cawu2 = ($data_realisasi->where('f_waktu', 'Caturwulan 2')->sum('f_total_belanja')) + $realisasi_rutin;
    $realisasi_cawu3 = ($data_realisasi->where('f_waktu', 'Caturwulan 3')->sum('f_total_belanja')) + $realisasi_rutin;
    $realisasi_cawu12 = $realisasi_cawu1 + $realisasi_cawu2;
    $realisasi_total = $realisasi_cawu1 + $realisasi_cawu2 + $realisasi_cawu3;

    //Hitung Progress
    $progress_cawu1 = round($data_realisasi->whereIn('f_waktu', ['Caturwulan 1', 'Rutin'])->sum('progress'), 5);
    $progress_cawu2 = round($data_realisasi->whereIn('f_waktu', ['Caturwulan 2', 'Rutin'])->sum('progress'), 5);
    $progress_cawu3 = round($data_realisasi->whereIn('f_waktu', ['Caturwulan 3', 'Rutin'])->sum('progress'), 5);
    $progress_total = round($progress_cawu1 + $progress_cawu2 + $progress_cawu3, 5);

    //Hitung PV
    $pv_cawu1 = ($total_anggaran*30)/100;
    $pv_cawu2 = ($total_anggaran*40)/100;
    $pv_cawu3 = ($total_anggaran*30)/100;
    $pv_cawu12 = ($total_anggaran*70)/100;
    $pv_total = ($total_anggaran*100)/100;

    //Hitung EV
    $progress_cawu12 = $progress_cawu1 + $progress_cawu2;
    $ev_cawu1 = ($total_anggaran*$progress_cawu1)/100;
    $ev_cawu2 = ($total_anggaran*$progress_cawu2)/100;
    $ev_cawu3 = ($total_anggaran*$progress_cawu3)/100;
    $ev_cawu12 = ($total_anggaran*$progress_cawu12)/100;
    $ev_total = ($total_anggaran*$progress_total)/100;

    if($pv_total == 0 || $realisasi_total == 0 || $realisasi_cawu1 == 0 || $realisasi_cawu2 == 0 || $realisasi_cawu3 == 0){
        if($pv_total == 0 || $realisasi_total == 0){
            //Hitung SPI
            $spi_cawu1 = 0;
            $spi_cawu2 = 0;
            $spi_cawu3 = 0;
            $spi_cawu12 = 0;
            $spi_total = 0;

            //Hitung CPI
            $cpi_cawu1 = 0;
            $cpi_cawu2 = 0;
            $cpi_cawu3 = 0;
            $cpi_cawu12 = 0;
            $cpi_total = 0;
        }elseif($realisasi_cawu1 == 0 && $realisasi_cawu2 == 0){
            //Hitung SPI
            $spi_cawu1 = 0;
            $spi_cawu2 = 0;
            $spi_cawu3 = $ev_cawu3/$pv_cawu3;
            $spi_cawu12 = 0;
            $spi_total = $ev_total/$pv_total;

            //Hitung CPI
            $cpi_cawu1 = 0;
            $cpi_cawu2 = 0;
            $cpi_cawu3 = $ev_cawu3/$realisasi_cawu3;
            $cpi_cawu12 = 0;
            $cpi_total = $ev_total/$realisasi_total;
        }elseif($realisasi_cawu1 == 0 && $realisasi_cawu3 == 0){
            //Hitung SPI
            $spi_cawu1 = 0;
            $spi_cawu2 = $ev_cawu2/$pv_cawu2;
            $spi_cawu3 = 0;
            $spi_cawu12 = 0;
            $spi_total = $ev_total/$pv_total;

            //Hitung CPI
            $cpi_cawu1 = 0;
            $cpi_cawu2 = $ev_cawu2/$realisasi_cawu2;
            $cpi_cawu3 = 0;
            $cpi_cawu12 = 0;
            $cpi_total = $ev_total/$realisasi_total;
        }elseif($realisasi_cawu2 == 0 && $realisasi_cawu3 == 0){
            //Hitung SPI
            $spi_cawu1 = $ev_cawu1/$pv_cawu1;
            $spi_cawu2 = 0;
            $spi_cawu3 = 0;
            $spi_cawu12 = 0;
            $spi_total = $ev_total/$pv_total;

            //Hitung CPI
            $cpi_cawu1 = $ev_cawu1/$realisasi_cawu1;
            $cpi_cawu2 = 0;
            $cpi_cawu3 = 0;
            $cpi_cawu12 = 0;
            $cpi_total = $ev_total/$realisasi_total;
        }elseif($realisasi_cawu1 == 0){
            //Hitung SPI
            $spi_cawu1 = 0;
            $spi_cawu2 = $ev_cawu2/$pv_cawu2;
            $spi_cawu3 = $ev_cawu3/$pv_cawu3;
            $spi_cawu12 = $ev_cawu12/$pv_cawu12;
            $spi_total = $ev_total/$pv_total;

            //Hitung CPI
            $cpi_cawu1 = 0;
            $cpi_cawu2 = $ev_cawu2/$realisasi_cawu2;
            $cpi_cawu3 = $ev_cawu3/$realisasi_cawu3;
            $cpi_cawu12 = $ev_cawu12/$realisasi_cawu12;
            $cpi_total = $ev_total/$realisasi_total;
        }elseif($realisasi_cawu3 == 0){
            //Hitung SPI
            $spi_cawu1 = $ev_cawu1/$pv_cawu1;
            $spi_cawu2 = $ev_cawu2/$pv_cawu2;
            $spi_cawu3 = 0;
            $spi_cawu12 = $ev_cawu12/$pv_cawu12;
            $spi_total = $ev_total/$pv_total;

            //Hitung CPI
            $cpi_cawu1 = $ev_cawu1/$realisasi_cawu1;
            $cpi_cawu2 = $ev_cawu2/$realisasi_cawu2;
            $cpi_cawu3 = 0;
            $cpi_cawu12 = $ev_cawu12/$realisasi_cawu12;
            $cpi_total = $ev_total/$realisasi_total;
        }else{
            //Hitung SPI
            $spi_cawu1 = $ev_cawu1/$pv_cawu1;
            $spi_cawu2 = 0;
            $spi_cawu3 = $ev_cawu3/$pv_cawu3;
            $spi_cawu12 = $ev_cawu12/$pv_cawu12;
            $spi_total = $ev_total/$pv_total;

            //Hitung CPI
            $cpi_cawu1 = $ev_cawu1/$realisasi_cawu1;
            $cpi_cawu2 = 0;
            $cpi_cawu3 = $ev_cawu3/$realisasi_cawu3;
            $cpi_cawu12 = $ev_cawu12/$realisasi_cawu12;
            $cpi_total = $ev_total/$realisasi_total;
        }
    }else{
        //Hitung SPI
        $spi_cawu1 = $ev_cawu1/$pv_cawu1;
        $spi_cawu2 = $ev_cawu2/$pv_cawu2;
        $spi_cawu3 = $ev_cawu3/$pv_cawu3;
        $spi_cawu12 = $ev_cawu12/$pv_cawu12;
        $spi_total = $ev_total/$pv_total;

        //Hitung CPI
        $cpi_cawu1 = $ev_cawu1/$realisasi_cawu1;
        $cpi_cawu2 = $ev_cawu2/$realisasi_cawu2;
        $cpi_cawu3 = $ev_cawu3/$realisasi_cawu3;
        $cpi_cawu12 = $ev_cawu12/$realisasi_cawu12;
        $cpi_total = $ev_total/$realisasi_total;
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
                                <div>
                                    <b>Tabel Data Anggaran</b>
                                </div><hr>

                                <!-- Table data anggaran-->
                                <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th rowspan="2"></th>
                                            <th colspan="2" style="text-align: center;">Rencana</th>
                                            <th colspan="2" style="text-align: center;">Realisasi</th>
                                        </tr>
                                        <tr role="row">
                                            <th style="text-align: center;">Dana</th>
                                            <th style="text-align: center;">Penyelesaian</th>
                                            <th style="text-align: center;">Dana</th>
                                            <th style="text-align: center;">Penyelesaian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Caturwulan I</td>
                                            <td style="text-align: right;">Rp. {{number_format($anggaran_cawu1)}}</td>
                                            <td style="text-align: center;">30 %</td>
                                            <td style="text-align: right;">Rp. {{number_format($realisasi_cawu1)}}</td>
                                            <td style="text-align: center;">{{number_format($progress_cawu1, 2)}} %</td>
                                        </tr>
                                        <tr>
                                            <td>Caturwulan II</td>
                                            <td style="text-align: right;">Rp. {{number_format($anggaran_cawu2)}}</td>
                                            <td style="text-align: center;">40 %</td>
                                            <td style="text-align: right;">Rp. {{number_format($realisasi_cawu2)}}</td>
                                            <td style="text-align: center;">{{number_format($progress_cawu2, 2)}} %</td>
                                        </tr>
                                        <tr>
                                            <td>Caturwulan III</td>
                                            <td style="text-align: right;">Rp. {{number_format($anggaran_cawu3)}}</td>
                                            <td style="text-align: center;">30 %</td>
                                            <td style="text-align: right;">Rp. {{number_format($realisasi_cawu3)}}</td>
                                            <td style="text-align: center;">{{number_format($progress_cawu3, 2)}} %</td>
                                        </tr>
                                        <tr>
                                            <td><b>Jumlah</b></td>
                                            <td style="text-align: right;"><b>Rp. {{number_format($total_anggaran)}}</b></td>
                                            <td style="text-align: center;"><b>100 %</b></td>
                                            <td style="text-align: right;"><b>Rp. {{number_format($realisasi_anggaran)}}</b></td>
                                            <td style="text-align: center;"><b>{{number_format($progress_total, 2)}} %</b></td>
                                        </tr>
                                    </tbody>
                                </table><br><br><hr>
                                <!-- End table data anggaran-->

                                <div>
                                    <b>Tabel Perhitungan Nilai Indikator <i>Earned Value</i></b>
                                </div><hr>

                                <!-- Table PV-->
                                <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th rowspan="2" style="text-align: center;">Perhitungan Nilai <br><i>Planned Value</i> <br>(PV)</th>
                                            <th rowspan="2" style="text-align: center;">Penyelesaian<br> &nbsp</th>
                                            <th rowspan="2" style="text-align: center;">Nilai PV<br> &nbsp</th>
                                            <th colspan="2" style="text-align: center;">Total</th>
                                        </tr>
                                        <tr role="row">
                                            <th style="text-align: center;">Penyelesaian</th>
                                            <th style="text-align: center;">Nilai PVt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Caturwulan I</td>
                                            <td style="text-align: center;">30 %</td>
                                            <td style="text-align: right;">Rp. {{number_format($pv_cawu1)}}</td>
                                            <td style="text-align: center;">30 %</td>
                                            <td style="text-align: right;">Rp. {{number_format($pv_cawu1)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Caturwulan II</td>
                                            <td style="text-align: center;">40 %</td>
                                            <td style="text-align: right;">Rp. {{number_format($pv_cawu2)}}</td>
                                            <td style="text-align: center;">70 %</td>
                                            <td style="text-align: right;">Rp. {{number_format($pv_cawu12)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Caturwulan III</td>
                                            <td style="text-align: center;">30 %</td>
                                            <td style="text-align: right;">Rp. {{number_format($pv_cawu3)}}</td>
                                            <td style="text-align: center;">100 %</td>
                                            <td style="text-align: right;">Rp. {{number_format($total_anggaran)}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Jumlah</b></td>
                                            <td style="text-align: center;"><b>100 %</b></td>
                                            <td style="text-align: right;"><b>Rp. {{number_format($total_anggaran)}}</b></td>
                                            <td colspan="2" style="text-align: right;"><b></b></td>
                                        </tr>
                                    </tbody>
                                </table><br><hr><br>
                                <!-- End table PV-->

                                <!-- Table EV-->
                                <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th rowspan="2" style="text-align: center;">Perhitungan Nilai <br><i>Earned Value</i> <br>(EV)</th>
                                            <th rowspan="2" style="text-align: center;">Penyelesaian<br> &nbsp</th>
                                            <th rowspan="2" style="text-align: center;">Nilai EV<br> &nbsp</th>
                                            <th colspan="2" style="text-align: center;">Total</th>
                                        </tr>
                                        <tr role="row">
                                            <th style="text-align: center;">Penyelesaian</th>
                                            <th style="text-align: center;">Nilai EVt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Caturwulan I</td>
                                            <td style="text-align: center;">{{number_format($progress_cawu1, 2)}} %</td>
                                            <td style="text-align: right;">Rp. {{number_format($ev_cawu1)}}</td>
                                            <td style="text-align: center;">{{number_format($progress_cawu1, 2)}} %</td>
                                            <td style="text-align: right;">Rp. {{number_format($ev_cawu1)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Caturwulan II</td>
                                            <td style="text-align: center;">{{number_format($progress_cawu2, 2)}} %</td>
                                            <td style="text-align: right;">Rp. {{number_format($ev_cawu2)}}</td>
                                            <td style="text-align: center;">{{number_format($progress_cawu12, 2)}} %</td>
                                            <td style="text-align: right;">Rp. {{number_format($ev_cawu12)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Caturwulan III</td>
                                            <td style="text-align: center;">{{number_format($progress_cawu3, 2)}} %</td>
                                            <td style="text-align: right;">Rp. {{number_format($ev_cawu3)}}</td>
                                            <td style="text-align: center;">{{number_format($progress_total, 2)}} %</td>
                                            <td style="text-align: right;">Rp. {{number_format($ev_total)}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Jumlah</b></td>
                                            <td style="text-align: center;"><b>{{number_format($progress_total, 2)}} %</b></td>
                                            <td style="text-align: right;"><b>Rp. {{number_format($ev_total)}}</b></td>
                                            <td colspan="2" style="text-align: right;"><b></b></td>
                                        </tr>
                                    </tbody>
                                </table><br><hr><br>
                                <!-- End table EV-->

                                 <!-- Table AC-->
                                 <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th rowspan="2" style="text-align: center;">Perhitungan Nilai <br><i>Actual Cost</i> <br>(AC)</th>
                                            <th rowspan="2" style="text-align: center;">Nilai AC<br> &nbsp</th>
                                            <th rowspan="2" style="text-align: center;">Nilai ACt<br> &nbsp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Caturwulan I</td>
                                            <td style="text-align: right;">Rp. {{number_format($realisasi_cawu1)}}</td>
                                            <td style="text-align: right;">Rp. {{number_format($realisasi_cawu1)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Caturwulan II</td>
                                            <td style="text-align: right;">Rp. {{number_format($realisasi_cawu2)}}</td>
                                            <td style="text-align: right;">Rp. {{number_format($realisasi_cawu12)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Caturwulan III</td>
                                            <td style="text-align: right;">Rp. {{number_format($realisasi_cawu3)}}</td>
                                            <td style="text-align: right;">Rp. {{number_format($realisasi_total)}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Jumlah</b></td>
                                            <td style="text-align: right;"><b>Rp. {{number_format($realisasi_total)}}</b></td>
                                            <td style="text-align: right;"><b></b></td>
                                        </tr>
                                    </tbody>
                                </table><br><br><hr>
                                <!-- End table AC-->

                                <div>
                                    <b>Tabel Perhitungan Nilai <i>Scheduled Performance Index</i> dan <i> Cost Performance Index</i></b>
                                </div><hr>

                                <!-- Table SPI-->
                                <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th rowspan="2" style="text-align: center; width: 40%;">Perhitungan Nilai <br><i>Scheduled Performance Index</i> <br>(SPI)</th>
                                            <th rowspan="2" style="text-align: center;">Nilai SPI<br> &nbsp</th>
                                            <th rowspan="2" style="text-align: center;">Nilai SPIt<br> &nbsp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Caturwulan I</td>
                                            <td style="text-align: right;">{{number_format($spi_cawu1, 2)}}</td>
                                            <td style="text-align: right;">{{number_format($spi_cawu1, 2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Caturwulan II</td>
                                            <td style="text-align: right;">{{number_format($spi_cawu2, 2)}}</td>
                                            <td style="text-align: right;">{{number_format($spi_cawu12, 2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Caturwulan III</td>
                                            <td style="text-align: right;">{{number_format($spi_cawu3, 2)}}</td>
                                            <td style="text-align: right;">{{number_format($spi_total, 2)}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Nilai Akhir</b></td>
                                            <td style="text-align: right;"><b>{{number_format($spi_total, 2)}}</b></td>
                                            <td style="text-align: right;"><b></b></td>
                                        </tr>
                                    </tbody>
                                </table><br><br><hr>
                                <!-- End table SPI-->

                                <!-- Table CPI-->
                                <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th rowspan="2" style="text-align: center; width: 40%;">Perhitungan Nilai <br><i>Cost Performance Index</i> <br>(CPI)</th>
                                            <th rowspan="2" style="text-align: center;">Nilai CPI<br> &nbsp</th>
                                            <th rowspan="2" style="text-align: center;">Nilai CPIt<br> &nbsp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Caturwulan I</td>
                                            <td style="text-align: right;">{{number_format($cpi_cawu1, 2)}}</td>
                                            <td style="text-align: right;">{{number_format($cpi_cawu1, 2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Caturwulan II</td>
                                            <td style="text-align: right;">{{number_format($cpi_cawu2, 2)}}</td>
                                            <td style="text-align: right;">{{number_format($cpi_cawu12, 2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Caturwulan III</td>
                                            <td style="text-align: right;">{{number_format($cpi_cawu3, 2)}}</td>
                                            <td style="text-align: right;">{{number_format($cpi_total, 2)}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Nilai Akhir</b></td>
                                            <td style="text-align: right;"><b>{{number_format($cpi_total, 2)}}</b></td>
                                            <td style="text-align: right;"><b></b></td>
                                        </tr>
                                    </tbody>
                                </table><br><br><hr>
                                <!-- End table CPI-->
                                <div>
                                    <b>Kesimpulan SPI</b>
                                </div><hr>
                                @if($spi_total > 0.99)
                                    <div class="alert alert-success" role="alert">
                                        Berdasarkan perhitungan nilai SPI diatas, diperoleh nilai SPI sebesar <b>{{number_format($spi_total, 5)}}</b>. Nilai tersebut menandakan bahwa performa realisasi anggaran ditinjau dari waktu pelaksanaan sudah <b>tepat waktu</b>.
                                    </div>
                                @else
                                    <div class="alert alert-danger" role="alert">
                                    Berdasarkan perhitungan nilai SPI diatas, diperoleh nilai SPI sebesar <b>{{number_format($spi_total, 5)}}</b>. Nilai tersebut menandakan bahwa performa realisasi anggaran ditinjau dari waktu pelaksanaan <b>terlambat </b>dari yang dijadwalkan.
                                    </div>
                                @endif
                                <br><hr>
                                <div>
                                    <b>Kesimpulan CPI</b>
                                </div><hr>
                                @if($cpi_total >= 1.00)
                                    <div class="alert alert-success" role="alert">
                                        Berdasarkan perhitungan nilai CPI diatas, diperoleh nilai CPI sebesar <b>{{number_format($cpi_total, 5)}}</b>. Nilai tersebut menandakan bahwa performa realisasi anggaran ditinjau dari dana yang dihabiskan sudah <b>sesuai</b> dengan dana yang dianggarkan.
                                    </div>
                                @else
                                    <div class="alert alert-danger" role="alert">
                                    Berdasarkan perhitungan nilai CPI diatas, diperoleh nilai CPI sebesar <b>{{number_format($cpi_total, 5)}}</b>. Nilai tersebut menandakan bahwa performa realisasi anggaran ditinjau dari dana yang dihabiskan <b>Membengkak</b>dari dana yang dianggarkan.
                                    </div>
                                @endif
                                
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