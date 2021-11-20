@extends('layouts.master-print')

@section('title')
    <title>RKAS SMKN 1 AROSBAYA TAHUN {{$data_rkas->tahun_anggaran}}</title>
@stop

@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">                        
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-center mt-3">
                                    <b>RENCANA KEGIATAN DAN ANGGARAN SEKOLAH (RKAS)</b>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <b>SMK NEGERI 1 AROSBAYA TAHUN {{$data_rkas->tahun_anggaran}}</b>
                                </div>
                                <table class="mt-3 p-3 w-100" style="border: 1px solid black;">
                                    <thead>
                                        <tr align="center" role="row">
                                            <th class="align-middle" style="border: 1px solid black;" rowspan="2">NO</th>
                                            <th class="align-middle" style="border: 1px solid black;" rowspan="2">URAIAN KEGIATAN</th>
                                            <th class="align-middle" style="border: 1px solid black;" rowspan="2" colspan="2">VOLUME</th>
                                            <th class="align-middle" style="border: 1px solid black;" rowspan="2">HARGA SATUAN</th>
                                            <th class="align-middle" style="border: 1px solid black;" rowspan="2">JUMLAH</th>
                                            <th style="border: 1px solid black;" colspan="3">CATURWULAN</th>
                                            <th class="align-middle" style="border: 1px solid black;" rowspan="2">TOTAL DANA</th>
                                        </tr>
                                        <tr align="center" role="row">
                                            <th style="border: 1px solid black;">I (30%)</th>
                                            <th style="border: 1px solid black;">II (40%)</th>
                                            <th style="border: 1px solid black;">III (30%)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid black;"><b>5</b></td>
                                            <td style="border: 1px solid black;"><b>BELANJA</b></td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;" align="right"><b>{{number_format($data_rkas->total_dana)}}</b></td>
                                            <td style="border: 1px solid black;" align="right"><b>{{number_format(($data_rkas->total_dana*30)/100)}}</b></td>
                                            <td style="border: 1px solid black;" align="right"><b>{{number_format(($data_rkas->total_dana*40)/100)}}</b></td>
                                            <td style="border: 1px solid black;" align="right"><b>{{number_format(($data_rkas->total_dana*30)/100)}}</b></td>
                                            <td style="border: 1px solid black;" align="right"><b>{{number_format($data_rkas->total_dana)}}</b></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid black;"><b>5.2</b></td>
                                            <td style="border: 1px solid black;"><b>BELANJA LANGSUNG</b></td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;">&nbsp</td>
                                            <td style="border: 1px solid black;" align="right">{{number_format($data_rkas->total_dana)}}</td>
                                            <td style="border: 1px solid black;" align="right">{{number_format(($data_rkas->total_dana*30)/100)}}</td>
                                            <td style="border: 1px solid black;" align="right">{{number_format(($data_rkas->total_dana*40)/100)}}</td>
                                            <td style="border: 1px solid black;" align="right">{{number_format(($data_rkas->total_dana*30)/100)}}</td>
                                            <td style="border: 1px solid black;" align="right">0</td>
                                        </tr>
                                        @foreach($data_jenis as $no => $jenis)                                        
                                        @if($jenis->id_jenis != 3)
                                        <tr>
                                            <td style="border: 1px solid black;"><b>{{$jenis->nomer_jenis}}</b></td>
                                            <td style="border: 1px solid black;"><b>{{$jenis->nama_jenis}}</b></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;" align="right"><b>
                                            @php
                                            {{
                                                $value = 0;
                                                $value1 = 0;
                                                $value2 = 0;
                                                $value3 = 0;
                                            }}
                                            @endphp
                                            @foreach($jenis->rekening as $no => $data_rekening)
                                            @php
                                            {{
                                                $value = $value + $data_rekening->detail->where('id_rkas', $data_rkas->id_rkas)->sum('r_total_belanja');                                                
                                                $value1 = $value1 + $data_rekening->detail->where('id_rkas', $data_rkas->id_rkas)->where('r_waktu', 'Caturwulan 1')->sum('r_total_belanja') + ($data_rekening->detail->where('id_rkas', $data_rkas->id_rkas)->where('r_waktu', 'Rutin')->sum('r_total_belanja')/3);                                     
                                                $value2 = $value2 + $data_rekening->detail->where('id_rkas', $data_rkas->id_rkas)->where('r_waktu', 'Caturwulan 2')->sum('r_total_belanja') + ($data_rekening->detail->where('id_rkas', $data_rkas->id_rkas)->where('r_waktu', 'Rutin')->sum('r_total_belanja')/3);                                     
                                                $value3 = $value3 + $data_rekening->detail->where('id_rkas', $data_rkas->id_rkas)->where('r_waktu', 'Caturwulan 3')->sum('r_total_belanja') + ($data_rekening->detail->where('id_rkas', $data_rkas->id_rkas)->where('r_waktu', 'Rutin')->sum('r_total_belanja')/3);
                                            }}
                                            @endphp
                                            @endforeach
                                            {{number_format($value)}}
                                            </b></td>
                                            <td style="border: 1px solid black;" align="right"><b>{{number_format($value1)}}</b></td>
                                            <td style="border: 1px solid black;" align="right"><b>{{number_format($value2)}}</b></td>
                                            <td style="border: 1px solid black;" align="right"><b>{{number_format($value3)}}</b></td>
                                            <td style="border: 1px solid black;" align="right"><b>{{number_format($value)}}</b></td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td style="border: 1px solid black;"><b>{{$jenis->nomer_jenis}}</b></td>
                                            <td style="border: 1px solid black;"><b>{{$jenis->nama_jenis}}</b></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;" align="right"><b></b></td>
                                            <td style="border: 1px solid black;" align="right"></td>
                                            <td style="border: 1px solid black;" align="right"></td>
                                            <td style="border: 1px solid black;" align="right"></td>
                                            <td style="border: 1px solid black;" align="right"><b></b></td>
                                        </tr>
                                        @endif
                                            @foreach($jenis->rekening->sortBy('nomer_rekening')->all() as $no => $rekening)
                                            <tr>
                                                <td style="border: 1px solid black;">{{$rekening->nomer_rekening}}</td>
                                                <td style="border: 1px solid black;">{{$rekening->nama_rekening}}</td>
                                                <td style="border: 1px solid black;"></td>
                                                <td style="border: 1px solid black;"></td>
                                                <td style="border: 1px solid black;"></td>
                                                <td style="border: 1px solid black;" align="right">{{number_format($rekening->detail->where('id_rkas', $data_rkas->id_rkas)->sum('r_total_belanja'))}}</td>
                                                <td style="border: 1px solid black;"></td>
                                                <td style="border: 1px solid black;"></td>
                                                <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;" align="right">0</td>
                                            </tr>
                                                @foreach($rekening->detail->where('id_rkas', $data_rkas->id_rkas)->all() as $no => $detail)
                                                <tr>
                                                    <td style="border: 1px solid black;">&nbsp</td>
                                                    <td style="border: 1px solid black;">{{$detail->r_nama_belanja}}</td>
                                                    <td style="border: 1px solid black;" align="center">{{number_format($detail->r_volume)}}</td>
                                                    <td style="border: 1px solid black;" align="center">{{$detail->r_satuan}}</td>
                                                    <td style="border: 1px solid black;" align="right">{{number_format($detail->r_harga_satuan)}}</td>
                                                    <td style="border: 1px solid black;" align="right">{{number_format($detail->r_total_belanja)}}</td>
                                                    @if($detail->r_waktu == "Rutin")
                                                    <td style="border: 1px solid black;" align="right">{{number_format(($detail->r_total_belanja)/3)}}</td>
                                                    <td style="border: 1px solid black;" align="right">{{number_format(($detail->r_total_belanja)/3)}}</td>
                                                    <td style="border: 1px solid black;" align="right">{{number_format(($detail->r_total_belanja)/3)}}</td>
                                                    @else
                                                        @if($detail->r_waktu == "Caturwulan 1")
                                                        <td style="border: 1px solid black;" align="right">{{number_format($detail->r_total_belanja)}}</td>
                                                        @else
                                                        <td style="border: 1px solid black;"></td>
                                                        @endif
                                                        @if($detail->r_waktu == "Caturwulan 2")
                                                        <td style="border: 1px solid black;" align="right">{{number_format($detail->r_total_belanja)}}</td>
                                                        @else
                                                        <td style="border: 1px solid black;"></td>
                                                        @endif
                                                        @if($detail->r_waktu == "Caturwulan 3")
                                                        <td style="border: 1px solid black;" align="right">{{number_format($detail->r_total_belanja)}}</td>
                                                        @else
                                                        <td style="border: 1px solid black;"></td>
                                                        @endif
                                                    @endif
                                                    <td style="border: 1px solid black;" align="right">0</td>
                                                </tr>
                                                @endforeach
                                            @endforeach
                                            @if($jenis->id_jenis != 3)
                                            <tr>
                                                <td style="border: 1px solid black;">&nbsp</td>
                                                <td style="border: 1px solid black;">&nbsp</td>
                                                <td style="border: 1px solid black;">&nbsp</td>
                                                <td style="border: 1px solid black;">&nbsp</td>
                                                <td style="border: 1px solid black;">&nbsp</td>
                                                <td style="border: 1px solid black;">&nbsp</td>
                                                <td style="border: 1px solid black;">&nbsp</td>
                                                <td style="border: 1px solid black;">&nbsp</td>
                                                <td style="border: 1px solid black;">&nbsp</td>
                                                <td style="border: 1px solid black;">&nbsp</td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="container">
                                    <div class="row">
                                        <div  class="col">
                                            
                                        </div>
                                        <div  class="col">
                                             
                                        </div>
                                        <div  class="col">
                                            </br></br>Mengetahui,</br>
                                            Arosbaya, {{date("d F Y")}}</br></br></br></br></br>
                                            ( {{auth()->user()->pengguna->nama_pengguna}} )</br>
                                            NIP. {{auth()->user()->pengguna->nip_pengguna}}
                                        </div>
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
@stop