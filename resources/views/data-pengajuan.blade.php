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
                                            <label >Pengajuan &nbsp</label><i class="fas fa-caret-square-right"></i><label>&nbsp Data Pengajuan</label>                                    
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
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" style="width: 15%;" aria-label="Position: activate to sort column ascending">Nama Pengaju</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" style="width: 10%;" aria-label="Position: activate to sort column ascending">Tahun RKAS</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" style="width: 20%;" aria-label="Position: activate to sort column ascending">Nama Belanja</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" style="width: 10%;" aria-label="Position: activate to sort column ascending">Pelaksanaan</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" style="width: 15%;" aria-label="Position: activate to sort column ascending">Total Belanja</th>
                                            <th style="width: 20%;">Tindakan</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" style="width: 20%;" aria-label="Position: activate to sort column ascending">Nama Kegiatan</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" aria-label="Position: activate to sort column ascending">Volume</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" aria-label="Position: activate to sort column ascending">Satuan</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" aria-label="Position: activate to sort column ascending">Harga Satuan</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" aria-label="Position: activate to sort column ascending">Rincian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_pengajuan as $no => $aju)
                                        <tr>
                                            <td >{{++$no}}.</td>
                                            <td style="display: none;">{{$aju->id_pengajuan}}</td>
                                            <td style="display: none;">{{$aju->id_rkas}}</td>
                                            <td style="display: none;"></td>
                                            <td>{{$aju->pengguna->nama_pengguna}}</td>
                                            <td>{{$aju->rkas->tahun_anggaran}}</td>
                                            <td>{{$aju->nama_belanja}}</td>
                                            <td>{{$aju->waktu}}</td>
                                            <td>{{number_format($aju->total_belanja)}}</td>
                                            <td align="center">
                                                @if($aju->status_pengajuan == "Diproses")
                                                <button type="button" class="btn btn-primary btn-sm konfirm_pengajuan"><i class="fas fa-check"></i><b>&nbsp Konfirmasi</b></button>
                                                @else
                                                {{$aju->status_pengajuan}}
                                                @endif
                                            </td>
                                            @if($aju->kegiatan != null)
                                            <td>{{$aju->kegiatan->nama_kegiatan}}</td>
                                            @else
                                            <td>&nbsp</td>
                                            @endif
                                            <td>{{number_format($aju->volume)}}</td>
                                            <td>{{$aju->satuan}}</td>
                                            <td>{{number_format($aju->harga_satuan)}}</td>
                                            <td>{{$aju->rincian}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- End table -->

                                <!--Konfirmasi Modal -->  
                                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pengajuan</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-window-close"></i></button>
                                            </div>                                                    
                                            <form action="" method="POST" id="editForm" class="custom-validation">
                                            {{csrf_field()}}
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div>
                                                            <input type="hidden" name="id_pengajuan" id="id_pengajuan" class="form-control" value="" required />
                                                        </div>
                                                    </div> 
                                                    <div class="form-group">
                                                        <div>
                                                            <input type="hidden" name="id_rkas" id="id_rkas" class="form-control" value="" required />
                                                        </div>
                                                    </div> 
                                                    <div class="form-group">
                                                        <label>Nama Belanja</label>
                                                        <div>
                                                            <input type="text" name="r_nama_belanja" id="r_nama_belanja" class="form-control" placeholder="Masukkan nama belanja ..." required disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nama Rekening</label>
                                                        <div>
                                                            <select name="id_rekening" id="id_rekening" class="form-control">
                                                            @foreach($data_rekening as $rekening)
                                                                <option value="{{$rekening->id_rekening}}">{{$rekening->nama_rekening}}</option>
                                                            @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Waktu Pelaksanaan</label>
                                                        <div>
                                                            <select name="r_waktu" id="r_waktu" class="form-control">
                                                                <option value="Caturwulan 1">Caturwulan 1</option>
                                                                <option value="Caturwulan 2">Caturwulan 2</option>
                                                                <option value="Caturwulan 3">Caturwulan 3</option>
                                                                <option value="Rutin">Rutin</option>
                                                            </select>
                                                        </div>
                                                    </div>                                                                                                                                                               
                                                    <div class="form-group">
                                                        <label>Satuan Belanja</label>
                                                        <div>
                                                            <select name="r_satuan" id="r_satuan" class="form-control">
                                                                <option value="Biji">Biji</option>
                                                                <option value="Botol">Botol</option>
                                                                <option value="Buah">Buah</option>
                                                                <option value="Bulan">Bulan</option>
                                                                <option value="Kotak">Kotak</option>
                                                                <option value="Lembar">Lembar</option>
                                                                <option value="Oj">Oj</option>
                                                                <option value="Ok">Ok</option>
                                                                <option value="Pack">Pack</option>
                                                                <option value="Paket">Paket</option>
                                                                <option value="Pcs">Pcs</option>
                                                                <option value="Rim">Rim</option>
                                                                <option value="Set">Set</option>
                                                                <option value="Tahun">Tahun</option>
                                                                <option value="Unit">Unit</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jumlah Item</label>
                                                        <div>
                                                            <input type="text" name="r_volume" id="r_volume" onChange="hitung()" class="form-control" placeholder="Masukkan jumlah item ..." required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Harga Satuan</label>
                                                        <div>
                                                            <input type="text" name="r_harga_satuan" id="r_harga_satuan" onChange="hitung()" class="form-control" placeholder="Masukkan harga satuan ..." required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Total Belanja</label>
                                                        <div>
                                                            <input type="text" name="r_total_belanja" id="r_total_belanja" class="form-control" style="background-color: #DCDCDC !important;"  placeholder="Masukkan total belanja ..." required readonly/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div>
                                                            <input type="hidden" name="r_rincian" id="r_rincian" required class="form-control" rows="5"></input>
                                                        </div>
                                                    </div>
                                                </div>                                                    
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i><b>&nbsp Tutup &nbsp</b></button>
                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i><b>&nbsp Konfirmasi &nbsp</b></button>
                                                </div>                                                        
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                                <!-- End konfirmasi modal -->
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
<script type="text/javascript">
    function hitung(){
        var nf = Intl.NumberFormat();
        var jml = $("#r_volume").val();
        var sat = $("#r_harga_satuan").val();
        var xjml = jml.split(',').join('');
        var xsat = sat.split(',').join('');
        var tot = xjml * xsat;
        var jumlah = nf.format(xjml);
        var satuan = nf.format(xsat);
        var total = nf.format(tot);
        $("#r_volume").val(jumlah);
        $("#r_harga_satuan").val(satuan);
        $("#r_total_belanja").val(total);
    }
</script>
@stop