@extends('layouts.master')

@section('title')
    <title>Pengajuan | Sistem Monitoring Anggaran Keuangan</title>
@stop


@section('content')
<div class="main-content">
    <div class="page-content">
    
        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1">Pengajuan</h4>
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
                                            <label >Pengajuan &nbsp</label><i class="fas fa-caret-square-right"></i><label>&nbsp Realisasi Anggaran</label>
                                    
                                    </div>
                                    <div class="col-6" ><div class=" float-right">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fas fa-plus-circle"></i><b> &nbspTambah Realisasi</b>
                                        </button> 
                                    </div></div>

                                        <!--Add Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Realisasi</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-window-close"></i></button>
                                                    </div>                                                    
                                                    <form action="/realisasi/create" method="POST" class="custom-validation">
                                                    {{csrf_field()}}
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <div>
                                                                    <input type="hidden" name="id_pengguna" class="form-control" value="{{auth()->user()->id_pengguna}}" required />
                                                                </div>
                                                            </div> 
                                                            <div class="form-group">
                                                                <label>Pengajuan</label>
                                                                <div>
                                                                    <select name="id_pengajuan" id="idp" onChange="autofill()" class="form-control" required>                                                                    
                                                                    <option>Pilih Pengajuan ...</option>
                                                                    @foreach($pengajuan as $aju)                                                                        
                                                                        <option value="{{$aju->id_pengajuan}}">{{$aju->nama_belanja}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                            </div> 
                                                            <div class="form-group">
                                                                <label>Waktu Pelaksanaan (Auto)</label>
                                                                <div>
                                                                    <input type="text" name="k_waktu" id="k_waktu" class="form-control" placeholder="Not set ..." disabled/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Jumlah Item</label>
                                                                <div>
                                                                    <input type="text" name="f_volume" id="jml" onChange="hitung()" class="form-control" placeholder="Masukkan jumlah item ..." value=0 required />
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Harga Satuan</label>
                                                                <div>
                                                                    <input type="text" name="f_harga_satuan" id="sat" onChange="hitung()" class="form-control" placeholder="Masukkan harga satuan ..." value=0 required />
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Total Belanja</label>
                                                                <div>
                                                                    <input type="text" name="f_total_belanja" id="tot" class="form-control" style="background-color: #DCDCDC !important;" value=0 placeholder="Masukkan total belanja ..." required readonly/>
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
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" style="width: 20%;" aria-label="Position: activate to sort column ascending">Nama Belanja</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" style="width: 10%;" aria-label="Position: activate to sort column ascending">Pelaksanaan</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" style="width: 10%;" aria-label="Position: activate to sort column ascending">Jumlah Item</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" style="width: 10%;" aria-label="Position: activate to sort column ascending">Harga Satuan</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" style="width: 15%;" aria-label="Position: activate to sort column ascending">Total</th>
                                            <th style="width: 15%;">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($realisasi as $no => $real)
                                        <tr>
                                            <td >{{++$no}}.</td>
                                            <td style="display: none;">{{$real->id_realisasi}}</td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td>{{$real->pengajuan->nama_belanja}}</td>
                                            <td>{{$real->f_waktu}}</td>
                                            <td>{{number_format($real->f_volume)}}</td>
                                            <td>{{number_format($real->f_harga_satuan)}}</td>
                                            <td>{{number_format($real->f_total_belanja)}}</td>
                                            <td align="center">
                                                <button type="button" class="btn btn-warning btn-sm edit_realisasi"><i class="fas fa-edit"></i></button> &nbsp
                                                <button type="button" class="btn btn-danger btn-sm delete_realisasi"><i class="fas fa-trash-alt"></i></button>                                                
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
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Realisasi</h5>
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
                                                        <label>Waktu Pelaksanaan</label>
                                                        <div>
                                                            <select name="f_waktu" id="f_waktu" class="form-control">
                                                                <option value="Caturwulan 1">Caturwulan 1</option>
                                                                <option value="Caturwulan 2">Caturwulan 2</option>
                                                                <option value="Caturwulan 3">Caturwulan 3</option>
                                                                <option value="Rutin">Rutin</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jumlah Item</label>
                                                        <div>
                                                            <input type="text" name="f_volume" id="f_volume" onChange="hitungEdit()" class="form-control" placeholder="Masukkan jumlah item ..." required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Harga Satuan</label>
                                                        <div>
                                                            <input type="text" name="f_harga_satuan" id="f_harga_satuan" onChange="hitungEdit()" class="form-control" placeholder="Masukkan harga satuan ..." required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Total Belanja</label>
                                                        <div>
                                                            <input type="text" name="f_total_belanja" id="f_total_belanja" class="form-control" style="background-color: #DCDCDC !important;"  placeholder="Masukkan total belanja ..." required readonly/>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<script type="text/javascript">
    function autofill(){
        var id = $("#idp").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url : '/autow/' + id,
            success: function(data){
                var obj = JSON.parse(data);
                $("#k_waktu").val(obj.waktu);
            }
        });
    }
    
    function hitung(){
        var nf = Intl.NumberFormat();
        var jml = $("#jml").val();
        var sat = $("#sat").val();
        var xjml = jml.split(',').join('');
        var xsat = sat.split(',').join('');
        var tot = xjml * xsat;
        var jumlah = nf.format(xjml);
        var satuan = nf.format(xsat);
        var total = nf.format(tot);
        $("#jml").val(jumlah);
        $("#sat").val(satuan);
        $("#tot").val(total);
    }

    function hitungEdit(){
        var nf = Intl.NumberFormat();
        var jml = $("#f_volume").val();
        var sat = $("#f_harga_satuan").val();
        var xjml = jml.split(',').join('');
        var xsat = sat.split(',').join('');
        var tot = xjml * xsat;
        var jumlah = nf.format(xjml);
        var satuan = nf.format(xsat);
        var total = nf.format(tot);
        $("#f_volume").val(jumlah);
        $("#f_harga_satuan").val(satuan);
        $("#f_total_belanja").val(total);
    }
</script>
@stop