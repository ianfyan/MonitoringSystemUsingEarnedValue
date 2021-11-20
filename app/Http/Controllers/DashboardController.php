<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $tahun = idate("Y");
        $data_rkas = \App\Models\Rkas::where('tahun_anggaran', $tahun)->get();
        if(count($data_rkas) != 0){
            $data_analisis = \App\Models\Analisis::where('id_rkas', $data_rkas[0]->id_rkas)->get();
            return view('home', ['data_rkas' => $data_rkas, 'data_analisis' => $data_analisis]);
        }else{
            $analisis = new \App\Models\Analisis;
            $analisis->id_rkas = 0;
            $analisis->nilai_bcws = 0;
            $analisis->nilai_bcwp = 0;
            $analisis->nilai_acwp = 0;
            $analisis->nilai_spi = 0.00;
            $analisis->nilai_cpi = 0.00;
            $data_analisis = array($analisis);
            return view('home', ['data_analisis' => $data_analisis]);
        }
    }

    public function dataSumber(){
        $data_sumber = \App\Models\Sumber::all();
        return view('data-sumber', ['data_sumber' => $data_sumber]);
    }

    public function dataJenis(){
        $data_jenis = \App\Models\Jenis::whereNotIn('id_jenis', [3])->get();
        return view('data-jenis', ['data_jenis' => $data_jenis]);
    }

    public function dataRekening(){
        $data_rekening = \App\Models\Rekening::orderBy('nomer_rekening', 'asc')->get();
        $data_jenis = \App\Models\Jenis::whereNotIn('id_jenis', [3])->get();
        return view('data-rekening', ['data_rekening' => $data_rekening, 'data_jenis' => $data_jenis]);
    }

    public function dataKegiatan(){
        $data_kegiatan = \App\Models\Kegiatan::all();
        return view('data-kegiatan', ['data_kegiatan' => $data_kegiatan]);
    }

    public function dataKegiatanId($id_pengguna){
        $data_kegiatan = \App\Models\Kegiatan::where('id_pengguna', $id_pengguna)->get();
        return view('data-kegiatan', ['data_kegiatan' => $data_kegiatan]);
    }

    public function dataJabatan(){
        $data_jabatan = \App\Models\Jabatan::all();
        return view('data-jabatan', ['data_jabatan' => $data_jabatan]);
    }

    public function dataPengguna(){
        $data_jabatan = \App\Models\Jabatan::all();
        $data_pengguna = \App\Models\Pengguna::all();
        return view('data-pengguna', ['data_jabatan' => $data_jabatan, 'data_pengguna' => $data_pengguna]);
    }

    public function dataLogin(){
        $data_login = \App\Models\User::all();
        return view('data-login', ['data_login' => $data_login]);
    }

    public function dataRkas(){
        $data_rkas = \App\Models\Rkas::orderBy('tahun_anggaran', 'desc')->get();
        return view('data-rkas', ['data_rkas' => $data_rkas]);
    }

    public function dataDana(){
        $data_dana = \App\Models\Dana::all();
        $data_rkas = \App\Models\Rkas::orderBy('tahun_anggaran', 'desc')->get();
        $data_sumber = \App\Models\Sumber::all();
        return view('data-dana', ['data_dana' => $data_dana, 'data_rkas' => $data_rkas, 'data_sumber' => $data_sumber]);
    }

    public function dataBelanja(){
        $data_belanja = \App\Models\Detail::orderBy('id_rkas', 'desc')->get();
        return view('data-belanja', ['data_belanja' => $data_belanja]);
    }

    public function dataPengajuan(){
        $data_pengajuan = \App\Models\Pengajuan::orderBy('status_pengajuan', 'asc')->orderBy('waktu', 'asc')->get();
        $data_rekening = \App\Models\Rekening::orderBy('nama_rekening', 'asc')->get();
        return view('data-pengajuan', ['data_pengajuan' => $data_pengajuan, 'data_rekening' => $data_rekening]);
    }

    public function pengajuan(){
        $pengajuan = \App\Models\Pengajuan::orderBy('status_pengajuan', 'asc')->orderBy('waktu', 'asc')->get();
        $data_rkas = \App\Models\Rkas::orderBy('tahun_anggaran', 'desc')->get();
        $data_kegiatan = \App\Models\Kegiatan::all();
        return view('pengajuan', ['pengajuan' => $pengajuan, 'data_rkas' => $data_rkas, 'data_kegiatan' => $data_kegiatan]);
    }

    public function pengajuanId($id_pengguna){
        $pengajuan = \App\Models\Pengajuan::where('id_pengguna', $id_pengguna)->orderBy('tgl_pengajuan', 'desc')->get();
        $data_rkas = \App\Models\Rkas::orderBy('tahun_anggaran', 'desc')->get();
        $data_kegiatan = \App\Models\Kegiatan::where('id_pengguna', $id_pengguna)->get();
        return view('pengajuan', ['pengajuan' => $pengajuan, 'data_rkas' => $data_rkas, 'data_kegiatan' => $data_kegiatan]);
    }

    public function realisasi(){
        $pengajuan = \App\Models\Pengajuan::where('status_pengajuan', 'Diterima')->where('realisasi', '0')->get();
        $realisasi = \App\Models\Realisasi::all();
        $data_rkas = \App\Models\Rkas::orderBy('tahun_anggaran', 'desc')->get();
        $data_kegiatan = \App\Models\Kegiatan::all();
        return view('realisasi', ['pengajuan' => $pengajuan, 'realisasi' => $realisasi, 'data_rkas' => $data_rkas, 'data_kegiatan' => $data_kegiatan]);
    }

    public function realisasiId($id_pengguna){
        $pengajuan = \App\Models\Pengajuan::where('id_pengguna', $id_pengguna)->where('status_pengajuan', 'Diterima')->where('realisasi', '0')->get();
        $realisasi = \App\Models\Realisasi::where('id_pengguna', $id_pengguna)->get();
        $data_rkas = \App\Models\Rkas::orderBy('tahun_anggaran', 'desc')->get();
        $data_kegiatan = \App\Models\Kegiatan::where('id_pengguna', $id_pengguna)->get();
        return view('realisasi', ['pengajuan' => $pengajuan, 'realisasi' => $realisasi, 'data_rkas' => $data_rkas, 'data_kegiatan' => $data_kegiatan]);
    }

    public function monitoring(){
        $data_rkas = \App\Models\Rkas::orderBy('tahun_anggaran', 'desc')->get();
        return view('monitoring', ['data_rkas' => $data_rkas]);
    }

    public function laporan(){
        $data_rkas = \App\Models\Rkas::orderBy('tahun_anggaran', 'desc')->get();
        return view('laporan', ['data_rkas' => $data_rkas]);
    }

    public function print(Request $request){
        $data_jenis = \App\Models\Jenis::all();
        $data_detail =  \App\Models\Detail::all();
        $data_rekening = \App\Models\Rekening::all();
        $data_rkas = \App\Models\Rkas::find($request->id_rkas);
        return view('print-pdf', ['data_jenis' => $data_jenis, 'data_rkas' => $data_rkas, 'data_detail' => $data_detail]);
    }

    public function analisa($id_rkas){
        $data_rkas = \App\Models\Rkas::find($id_rkas);
        $data_detail = \App\Models\Detail::where('id_rkas', $id_rkas)->get();
        $data_realisasi = \App\Models\Realisasi::where('id_rkas', $id_rkas)->get();

        //Realisasi Anggaran
        $realisasi_anggaran = $data_rkas->dana_terpakai;
        $realisasi_rutin = ($data_realisasi->where('f_waktu', 'Rutin')->sum('f_total_belanja'))/3;
        $realisasi_cawu1 = ($data_realisasi->where('f_waktu', 'Caturwulan 1')->sum('f_total_belanja')) + $realisasi_rutin;
        $realisasi_cawu2 = ($data_realisasi->where('f_waktu', 'Caturwulan 2')->sum('f_total_belanja')) + $realisasi_rutin;
        $realisasi_cawu3 = ($data_realisasi->where('f_waktu', 'Caturwulan 3')->sum('f_total_belanja')) + $realisasi_rutin;
        $realisasi_cawu12 = $realisasi_cawu1 + $realisasi_cawu2;
        $realisasi_total = $realisasi_cawu1 + $realisasi_cawu2 + $realisasi_cawu3;

        $total_anggaran = $data_rkas->total_dana;
        $progress_cawu1 = $data_realisasi->whereIn('f_waktu', ['Caturwulan 1', 'Rutin'])->sum('progress');
        $progress_cawu2 = $data_realisasi->whereIn('f_waktu', ['Caturwulan 2', 'Rutin'])->sum('progress');
        $progress_cawu3 = $data_realisasi->whereIn('f_waktu', ['Caturwulan 3', 'Rutin'])->sum('progress');
        $progress_total = $progress_cawu1 + $progress_cawu2 + $progress_cawu3;
        $pv_total = ($total_anggaran*100)/100;
        $ev_total = ($total_anggaran*$progress_total)/100;
        if($pv_total == 0 || $total_anggaran == 0){
            $spi_total = 0;
            $cpi_total = 0;
        }elseif($realisasi_total == 0){
            $spi_total = $ev_total/$pv_total;
            $cpi_total = 0;
        }else{
            $spi_total = $ev_total/$pv_total;
            $cpi_total = $ev_total/$realisasi_total;
        }

        $data = [
            'id_rkas' => $id_rkas,
            'nilai_bcws' => $pv_total,
            'nilai_bcwp' => $ev_total,
            'nilai_acwp' => $data_rkas->dana_terpakai,
            'nilai_spi' => $spi_total,
            'nilai_cpi' => $cpi_total
        ];
        $data_analisis = \App\Models\Analisis::where('id_rkas', $id_rkas)->get();
        $data_analisis->each->update($data);
        return view('analisa', ['data_rkas' => $data_rkas, 'data_detail' => $data_detail, 'data_realisasi' => $data_realisasi]);
    }

    public function autow($id){
        $pengajuan = \App\Models\Pengajuan::find($id);
        $now = date('d-m-Y');
        $pecah = explode("-", $now);
        $bulan = $pecah[1];
        $con = $pengajuan->waktu;
        if($con == "Rutin"){
            $waktu = "Rutin";
        } else{
            if($bulan <= 4){
                $waktu = "Caturwulan 1";
            } elseif ($bulan > 4 && $bulan <=8){
                $waktu = "Caturwulan 2";
            } else{
                $waktu = "Caturwulan 3";
            }
        }
        $data = array(
            'waktu' => $waktu
        );
        return json_encode($data);
    }

    public function autok($id){
        $kegiatan = \App\Models\Kegiatan::find($id);
        $pelaksanaan = $kegiatan->bln_pelaksanaan;
        if ($pelaksanaan <= 4){
            $waktu = "Caturwulan 1";
        } elseif ($pelaksanaan <= 8){
            $waktu = "Caturwulan 2";
        } elseif ($pelaksanaan <= 12){
            $waktu = "Caturwulan 3";
        } else {
            $waktu = "";
        }
        $data = array(
            'waktu' => $waktu
        );
        return json_encode($data);
    }

    public function getChart(){
        $tahun = idate("Y");
        $rencana = array(0,0,0);        
        $realisasi = array(0,0,0);
        $data_rkas = \App\Models\Rkas::where('tahun_anggaran', $tahun)->get();
        if(count($data_rkas) != 0){
            $data_detail =  \App\Models\Detail::where('id_rkas', $data_rkas[0]->id_rkas)->get();
            $data_realisasi =  \App\Models\Realisasi::where('id_rkas', $data_rkas[0]->id_rkas)->get();
            $d_cawu1 = $data_detail->whereIn('r_waktu', ['Caturwulan 1', 'Rutin'])->sum('r_total_belanja');
            $d_cawu2 = $data_detail->whereIn('r_waktu', ['Caturwulan 2', 'Rutin'])->sum('r_total_belanja');
            $d_cawu3 = $data_detail->whereIn('r_waktu', ['Caturwulan 3', 'Rutin'])->sum('r_total_belanja');
            $r_cawu1 = $data_realisasi->whereIn('f_waktu', ['Caturwulan 1', 'Rutin'])->sum('f_total_belanja');
            $r_cawu2 = $data_realisasi->whereIn('f_waktu', ['Caturwulan 2', 'Rutin'])->sum('f_total_belanja');
            $r_cawu3 = $data_realisasi->whereIn('f_waktu', ['Caturwulan 3', 'Rutin'])->sum('f_total_belanja');
            $rencana = array($d_cawu1, $d_cawu2, $d_cawu3);
            $realisasi = array($r_cawu1, $r_cawu2, $r_cawu3);
            $data = array(
                'rencana' => $rencana,
                'realisasi' => $realisasi,
            );
            return json_encode($data);
        }else{
            $data = array(
                'rencana' => $rencana,
                'realisasi' => $realisasi,
            );
            return json_encode($data);
        }        
    }
}
