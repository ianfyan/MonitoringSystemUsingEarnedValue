<!-- Hide Columns -->
<script>
    $(document).ready(function() {
        $('#datatable-buttons').DataTable( {
            "columnDefs": [
                {
                    "targets": [ 1 ],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [ 2 ],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [ 3 ],
                    "visible": false,
                    "searchable": false
                }
            ]
        } );
    } );
</script>

<!-- data_jabatan -->
<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#datatable-buttons').DataTable();

        table.on('click', '.edit_jabatan', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $('#nama_jabatan').val(data[4]);

            $('#editForm').attr('action', '/data_jabatan/edit/'+data[1]);
            $('#editModal').modal('show');
        });

        table.on('click', '.delete_jabatan', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);
                    
            document.getElementById("confirmText").textContent = data[4];
                    
            $('#confirmForm').attr('action', '/data_jabatan/delete/'+data[1]);
            $('#confirmModal').modal('show');
        });
    });
</script>

<!-- data_jenis -->
<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#datatable-buttons').DataTable();

        table.on('click', '.edit_jenis', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $('#nama_jenis').val(data[4]);            
            $('#nomer_jenis').val(data[5]);

            $('#editForm').attr('action', '/data_jenis/edit/'+data[1]);
            $('#editModal').modal('show');
        });

        table.on('click', '.delete_jenis', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);
                    
            document.getElementById("confirmText").textContent = data[4];
                    
            $('#confirmForm').attr('action', '/data_jenis/delete/'+data[1]);
            $('#confirmModal').modal('show');
        });
    });
</script>

<!-- data_rekening -->
<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#datatable-buttons').DataTable();

        table.on('click', '.edit_rekening', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $('#id_jenis').val(data[2]);
            $('#nomer_rekening').val(data[4]);            
            $('#nama_rekening').val(data[5]);

            $('#editForm').attr('action', '/data_rekening/edit/'+data[1]);
            $('#editModal').modal('show');
        });

        table.on('click', '.delete_rekening', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);
                    
            document.getElementById("confirmText").textContent = data[5];
                    
            $('#confirmForm').attr('action', '/data_rekening/delete/'+data[1]);
            $('#confirmModal').modal('show');
        });
    });
</script>

<!-- data_kegiatan -->
<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#datatable-buttons').DataTable();

        table.on('click', '.edit_kegiatan', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $('#nama_kegiatan').val(data[5]);            
            $('#bln_pelaksanaan').val(data[2]);

            $('#editForm').attr('action', '/data_kegiatan/edit/'+data[1]);
            $('#editModal').modal('show');
        });

        table.on('click', '.delete_kegiatan', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);
                    
            document.getElementById("confirmText").textContent = data[5];
                    
            $('#confirmForm').attr('action', '/data_kegiatan/delete/'+data[1]);
            $('#confirmModal').modal('show');
        });
    });
</script>

<!-- data_sumber -->
<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#datatable-buttons').DataTable();

        table.on('click', '.edit_sumber', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $('#nama_sumber').val(data[4]);

            $('#editForm').attr('action', '/data_sumber/edit/'+data[1]);
            $('#editModal').modal('show');
        });

        table.on('click', '.delete_sumber', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);
                    
            document.getElementById("confirmText").textContent = data[4];
                    
            $('#confirmForm').attr('action', '/data_sumber/delete/'+data[1]);
            $('#confirmModal').modal('show');
        });
    });
</script>

<!-- data_rkas -->
<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#datatable-buttons').DataTable();

        table.on('click', '.edit_rkas', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $('#tahun_anggaran').val(data[4]);

            $('#editForm').attr('action', '/data_rkas/edit/'+data[1]);
            $('#editModal').modal('show');
        });

        table.on('click', '.delete_rkas', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);
                    
            document.getElementById("confirmText").textContent = data[4];
                    
            $('#confirmForm').attr('action', '/data_rkas/delete/'+data[1]);
            $('#confirmModal').modal('show');
        });
    });
</script>

<!-- data_dana -->
<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#datatable-buttons').DataTable();

        table.on('click', '.edit_dana', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $('#id_sumber').val(data[2]);
            $('#id_rkas').val(data[3]);
            $('#jumlah_dana').val(data[6]);

            $('#editForm').attr('action', '/data_dana/edit/'+data[1]);
            $('#editModal').modal('show');
        });

        table.on('click', '.delete_dana', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);
                    
            document.getElementById("confirmText").textContent = data[4];
                    
            $('#confirmForm').attr('action', '/data_dana/delete/'+data[1]);
            $('#confirmModal').modal('show');
        });
    });
</script>

<!-- data_pengguna -->
<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#datatable-buttons').DataTable();

        table.on('click', '.edit_pengguna', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);
            if(data[6] == "Laki - Laki"){                
                $('#jenis_kelamin').val('L');
            }else{
                $('#jenis_kelamin').val('P');
            }
            $('#id_jabatan').val(data[2]);
            $('#nama_pengguna').val(data[4]);
            $('#nip_pengguna').val(data[5]);
            $('#tgl_lahir').val(data[8]);
            $('#alamat_pengguna').val(data[3]);

            $('#editForm').attr('action', '/data_pengguna/edit/'+data[1]);
            $('#editModal').modal('show');
        });

        table.on('click', '.delete_pengguna', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);
                    
            document.getElementById("confirmText").textContent = data[4];
                    
            $('#confirmForm').attr('action', '/data_pengguna/delete/'+data[1]);
            $('#confirmModal').modal('show');
        });
    });
</script>

<!-- data_pengguna -->
<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#datatable-buttons').DataTable();

        table.on('click', '.edit_login', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $('#username').val(data[5]);

            $('#editForm').attr('action', '/data_login/edit/'+data[1]);
            $('#editModal').modal('show');
        });
    });
</script>

<!-- pengajuan -->
<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#datatable-buttons').DataTable();

        table.on('click', '.edit_pengajuan', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $('#id_rkas').val(data[2]);
            $('#id_kegiatan').val(data[3]);
            $('#nama_belanja').val(data[4]);
            $('#waktu').val(data[5]);
            $('#volume').val(data[6]);
            $('#satuan').val(data[7]);
            $('#harga_satuan').val(data[8]);
            $('#total_belanja').val(data[9]);

            $('#editForm').attr('action', '/pengajuan/edit/'+data[1]);
            $('#editModal').modal('show');
        });

        table.on('click', '.delete_pengajuan', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);
                    
            document.getElementById("confirmText").textContent = data[4];
                    
            $('#confirmForm').attr('action', '/pengajuan/delete/'+data[1]);
            $('#confirmModal').modal('show');
        });
    });
</script>

<!-- Konfirmasi Pengajuan -->
<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#datatable-buttons').DataTable();

        table.on('click', '.konfirm_pengajuan', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $('#id_pengajuan').val(data[1]);
            $('#id_rkas').val(data[2]);
            $('#r_nama_belanja').val(data[6]);
            $('#r_waktu').val(data[7]);
            $('#r_volume').val(data[11]);
            $('#r_satuan').val(data[12]);
            $('#r_harga_satuan').val(data[13]);
            $('#r_total_belanja').val(data[8]);
            $('#r_rincian').val(data[14]);

            $('#editForm').attr('action', '/konfirmasi/'+data[1]);
            $('#editModal').modal('show');
        });

    });
</script>

<!-- Realisasi -->
<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#datatable-buttons').DataTable();

        table.on('click', '.edit_realisasi', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $('#f_waktu').val(data[5]);
            $('#f_volume').val(data[6]);
            $('#f_harga_satuan').val(data[7]);
            $('#f_total_belanja').val(data[8]);

            $('#editForm').attr('action', '/realisasi/edit/'+data[1]);
            $('#editModal').modal('show');
        });

        table.on('click', '.delete_realisasi', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);
                    
            document.getElementById("confirmText").textContent = data[4];
                    
            $('#confirmForm').attr('action', '/realisasi/delete/'+data[1]);
            $('#confirmModal').modal('show');
        });
    });
</script>

<script type="text/javascript">
    var canvasElement = document.getElementById("myChart");
    var dataChart = [];
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url : '/getChart',
            success: function(data){
                dataChart = JSON.parse(data);                
                var config = {
                    type: "bar",
                    data: {
                        labels: ["Caturwulan 1", "Caturwulan 2", "Caturwulan 3"],
                        datasets: [{label: "Nilai Rencana Anggaran",
                        data: dataChart.rencana,
                        backgroundColor: [
                            "rgba(54, 162, 235, 0.7)",
                        ],
                        borderColor: [
                            "rgba(54, 162, 235, 1)",
                        ],
                        borderWidth: 3,},
                        {label: "Nilai Realaisasi Anggaran",
                        data: dataChart.realisasi,
                        backgroundColor: [
                            "rgba(255, 159, 64, 0.7)",
                        ],
                        borderColor: [
                            "rgba(255, 159, 64, 1)",
                        ],
                        borderWidth: 3,}],
                        
                    },
                }
                var myChart = new Chart(canvasElement, config);
            }
        });
        
</script>