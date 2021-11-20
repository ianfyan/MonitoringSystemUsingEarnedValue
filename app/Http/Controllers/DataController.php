<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function createJabatan(Request $request){
        \App\Models\Jabatan::create($request->all());
        return redirect('/data_jabatan')->with('sukses', 'Data berhasil dimasukkan');
    }

    public function editJabatan(Request $request, $id_jabatan){
        $data_jabatan = \App\Models\Jabatan::find($id_jabatan);
        $data_jabatan->update($request->all());
        //$data_jabatan->nama_jabatan = $request->input('nama_jabatan');
        //$data_jabatan->save();

        return redirect('/data_jabatan')->with('sukses', 'Data berhasil diupdate');
    }

    public function deleteJabatan($id_jabatan){
        $data_jabatan = \App\Models\Jabatan::find($id_jabatan);
        $data_jabatan->delete();

        return redirect('/data_jabatan')->with('sukses', 'Data berhasil dihapus');
    }

    public function createJenis(Request $request){
        \App\Models\Jenis::create($request->all());
        return redirect('/data_jenis')->with('sukses', 'Data berhasil dimasukkan');
    }

    public function editJenis(Request $request, $id_jenis){
        $data_jenis = \App\Models\Jenis::find($id_jenis);
        $data_jenis->update($request->all());

        return redirect('/data_jenis')->with('sukses', 'Data berhasil diupdate');
    }

    public function deleteJenis($id_jenis){
        $data_jenis = \App\Models\Jenis::find($id_jenis);
        $data_jenis->delete();

        return redirect('/data_jenis')->with('sukses', 'Data berhasil dihapus');
    }

    public function createRekening(Request $request){
        \App\Models\Rekening::create($request->all());
        return redirect('/data_rekening')->with('sukses', 'Data berhasil dimasukkan');
    }

    public function editRekening(Request $request, $id_rekening){
        $data_rekening = \App\Models\Rekening::find($id_rekening);
        $data_rekening->update($request->all());

        return redirect('/data_rekening')->with('sukses', 'Data berhasil diupdate');
    }

    public function deleteRekening($id_rekening){
        $data_rekening = \App\Models\Rekening::find($id_rekening);
        $data_rekening->delete();

        return redirect('/data_rekening')->with('sukses', 'Data berhasil dihapus');
    }

    public function createKegiatan(Request $request){
        \App\Models\Kegiatan::create($request->all());

        $id_pengguna = auth()->user()->id_pengguna;
        if(auth()->user()->level == 0){
            return redirect('/data_kegiatan')->with('sukses', 'Data berhasil dimasukkan');
        }else {
            return redirect('/data_kegiatan/'.$id_pengguna)->with('sukses', 'Data berhasil dimasukkan');
        }
    }

    public function editKegiatan(Request $request, $id_kegiatan){
        $data_kegiatan = \App\Models\Kegiatan::find($id_kegiatan);
        $data_kegiatan->update($request->all());

        $id_pengguna = auth()->user()->id_pengguna;
        if(auth()->user()->level == 0){
            return redirect('/data_kegiatan')->with('sukses', 'Data berhasil diupdate');
        }else {
            return redirect('/data_kegiatan/'.$id_pengguna)->with('sukses', 'Data berhasil diupdate');
        }
    }

    public function deleteKegiatan($id_kegiatan){
        $data_kegiatan = \App\Models\Kegiatan::find($id_kegiatan);
        $data_kegiatan->delete();

        $id_pengguna = auth()->user()->id_pengguna;
        if(auth()->user()->level == 0){
            return redirect('/data_kegiatan')->with('sukses', 'Data berhasil dihapus');
        }else {
            return redirect('/data_kegiatan/'.$id_pengguna)->with('sukses', 'Data berhasil dihapus');
        }
    }

    public function createSumber(Request $request){
        \App\Models\Sumber::create($request->all());
        return redirect('/data_sumber')->with('sukses', 'Data berhasil dimasukkan');
    }

    public function editSumber(Request $request, $id_sumber){
        $data_sumber = \App\Models\Sumber::find($id_sumber);
        $data_sumber->update($request->all());

        return redirect('/data_sumber')->with('sukses', 'Data berhasil diupdate');
    }

    public function deleteSumber($id_sumber){
        $data_sumber = \App\Models\Sumber::find($id_sumber);
        $data_sumber->delete();

        return redirect('/data_sumber')->with('sukses', 'Data berhasil dihapus');
    }

    public function createRkas(Request $request){        
        $jumlah = str_replace(',', '', $request->total_dana);
        $request->merge([
            'total_dana' => (int)$jumlah,
        ]);
        \App\Models\Rkas::create($request->all());
        return redirect('/data_rkas')->with('sukses', 'Data berhasil dimasukkan');
    }

    public function editRkas(Request $request, $id_rkas){
        $data_rkas = \App\Models\Rkas::find($id_rkas);
        $data_rkas->update($request->all());

        return redirect('/data_rkas')->with('sukses', 'Data berhasil diupdate');
    }

    public function deleteRkas($id_rkas){
        $data_detail_dana = \App\Models\Dana::where('id_rkas', $id_rkas)->get();
        $data_detail_dana->each->delete();
        $data_rkas = \App\Models\Rkas::find($id_rkas);
        $data_rkas->delete();

        return redirect('/data_rkas')->with('sukses', 'Data berhasil dihapus');
    }

    public function createDana(Request $request){  
        $jumlah = str_replace(',', '', $request->jumlah_dana);
        $request->merge([
            'jumlah_dana' => (int)$jumlah,
        ]);
        \App\Models\Dana::create($request->all());
        return redirect('/data_dana')->with('sukses', 'Data berhasil dimasukkan');
    }

    public function editDana(Request $request, $id_dana){
        $data_dana = \App\Models\Dana::find($id_dana);
        $jumlah = str_replace(',', '', $request->jumlah_dana);
        $request->merge([
            'jumlah_dana' => (int)$jumlah,
        ]);
        $data_dana->update($request->all());

        return redirect('/data_dana')->with('sukses', 'Data berhasil diupdate');
    }

    public function deleteDana($id_dana){
        $data_dana = \App\Models\Dana::find($id_dana);
        $data_dana->delete();

        return redirect('/data_dana')->with('sukses', 'Data berhasil dihapus');
    }

    public function createPengguna(Request $request){
        //$request->request->add(['user_id' => $user->id]);
        $data_pengguna = \App\Models\Pengguna::create($request->all());
        
        $user = new \App\Models\User;
        $user->id_pengguna = $data_pengguna->id_pengguna;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        if($request->id_jabatan == "1"){
            $user->level = '0';
        }elseif($request->id_jabatan == "2"){
            $user->level = '1';
        }elseif($request->id_jabatan == "3"){
            $user->level = '2';
        }else {
            $user->level = '3';
        }
        $user->save();

        return redirect('/data_pengguna')->with('sukses', 'Data berhasil dimasukkan');
    }

    public function editPengguna(Request $request, $id_pengguna){
        $data_pengguna = \App\Models\Pengguna::find($id_pengguna);
        $data_pengguna->update($request->all());

        return redirect('/data_pengguna')->with('sukses', 'Data berhasil diupdate');
    }

    public function deletePengguna($id_pengguna){
        $data_pengguna = \App\Models\Pengguna::find($id_pengguna);
        $data_pengguna->delete();

        return redirect('/data_pengguna')->with('sukses', 'Data berhasil dihapus');
    }

    public function editLogin(Request $request, $id){
        $data_login = \App\Models\User::find($id);
        $data_login->username = $request->username;
        $data_login->password = bcrypt($request->password);
        $data_login->save();

        return redirect('/data_login')->with('sukses', 'Data berhasil diupdate');
    }

    public function konfirmasiPengajuan(Request $request, $id_pengajuan){        
        $jumlah = str_replace(',', '', $request->r_volume);
        $satuan = str_replace(',', '', $request->r_harga_satuan);
        $total = str_replace(',', '', $request->r_total_belanja);

        $data_pengajuan = \App\Models\Pengajuan::find($id_pengajuan);
        $data_pengajuan->status_pengajuan = "Diterima";
        $data_pengajuan->waktu = $request->r_waktu;
        $data_pengajuan->satuan = $request->r_satuan;
        $data_pengajuan->volume = (int)$jumlah;
        $data_pengajuan->harga_satuan = (int)$satuan;
        $data_pengajuan->total_belanja = (int)$total;
        $data_pengajuan->save();

        $detail = new \App\Models\Detail;
        $detail->id_rkas = $data_pengajuan->id_rkas;
        $detail->id_rekening = $request->id_rekening;
        $detail->r_nama_belanja = $data_pengajuan->nama_belanja;
        $detail->r_waktu = $request->r_waktu;        
        $detail->r_satuan = $request->r_satuan;
        $detail->r_volume = (int)$jumlah;
        $detail->r_harga_satuan = (int)$satuan;
        $detail->r_total_belanja = (int)$total;
        $detail->r_rincian = $data_pengajuan->rincian;
        $detail->save();
        
        return redirect('/data_pengajuan')->with('sukses', 'Pengajuan berhasil disetujui');
    }

    public function createPengajuan(Request $request){
        $request->request->add(['status_pengajuan' => 'Diproses']);
        $request->request->add(['realisasi' => '0']);
        $jumlah = str_replace(',', '', $request->volume);
        $satuan = str_replace(',', '', $request->harga_satuan);
        $total = str_replace(',', '', $request->total_belanja);
        $request->merge([
            'volume' => (int)$jumlah,
            'harga_satuan' => (int)$satuan,
            'total_belanja' => (int)$total,
        ]);
        \App\Models\Pengajuan::create($request->all());

        $id_pengguna =  auth()->user()->id_pengguna;
        if(auth()->user()->level == 0){
            return redirect('/pengajuan')->with('sukses', 'Data berhasil ditambahkan');
        }else {
            return redirect('/pengajuan/'.$id_pengguna)->with('sukses', 'Data berhasil ditambahkan');
        }
    }

    public function editPengajuan(Request $request, $id_pengajuan){
        $pengajuan = \App\Models\Pengajuan::find($id_pengajuan);
        $jumlah = str_replace(',', '', $request->volume);
        $satuan = str_replace(',', '', $request->harga_satuan);
        $total = str_replace(',', '', $request->total_belanja);
        $request->merge([
            'volume' => (int)$jumlah,
            'harga_satuan' => (int)$satuan,
            'total_belanja' => (int)$total,
        ]);
        $pengajuan->update($request->all());
        
        $id_pengguna =  auth()->user()->id_pengguna;
        if(auth()->user()->level == 0){
            return redirect('/pengajuan')->with('sukses', 'Data berhasil diupdate');
        }else {
            return redirect('/pengajuan/'.$id_pengguna)->with('sukses', 'Data berhasil diupdate');
        }
    }

    public function deletePengajuan($id_pengajuan){
        $pengajuan = \App\Models\Pengajuan::find($id_pengajuan);
        $pengajuan->delete();
        
        $id_pengguna = auth()->user()->id_pengguna;
        if(auth()->user()->level == 0){
            return redirect('/pengajuan')->with('sukses', 'Data berhasil dihapus');
        }else {
            return redirect('/pengajuan/'.$id_pengguna)->with('sukses', 'Data berhasil dihapus');
        }
    }

    public function createRealisasi(Request $request){
        $data_pengajuan = \App\Models\Pengajuan::find($request->input('id_pengajuan'));
        $data_pengajuan->realisasi = '1';
        $data_pengajuan->save();

        $data_rkas = \App\Models\Rkas::find($data_pengajuan->id_rkas);
        $total_anggaran = $data_rkas->total_dana;
        $belanja = $data_pengajuan->total_belanja;
        if($data_pengajuan->waktu == "Rutin"){
            $data_progress = (($belanja/$total_anggaran)*100)/3;
        }else{
            $data_progress = ($belanja/$total_anggaran)*100;
        }

        $now = date('d-m-Y');
        $pecah = explode("-", $now);
        $bulan = $pecah[1];
        $con = $data_pengajuan->waktu;
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

        $realisasi = new \App\Models\Realisasi;
        $jumlah = str_replace(',', '', $request->f_volume);
        $satuan = str_replace(',', '', $request->f_harga_satuan);
        $total = str_replace(',', '', $request->f_total_belanja);
        $realisasi->id_pengguna = $request->input('id_pengguna');
        $realisasi->id_pengajuan = $data_pengajuan->id_pengajuan;
        $realisasi->id_rkas = $data_pengajuan->id_rkas;
        $realisasi->f_waktu = $waktu;
        $realisasi->f_satuan = $data_pengajuan->satuan;
        $realisasi->f_volume = (int)$jumlah;
        $realisasi->f_harga_satuan = (int)$satuan;
        $realisasi->f_total_belanja = (int)$total;
        $realisasi->f_rincian = $data_pengajuan->rincian;
        $realisasi->progress = $data_progress;
        $realisasi->save();

        $id_pengguna =  auth()->user()->id_pengguna;
        if(auth()->user()->level == 0){
            return redirect('realisasi')->with('sukses', 'Data berhasil ditambahkan');
        }else {
            return redirect('/realisasi/'.$id_pengguna)->with('sukses', 'Data berhasil ditambahkan');
        }
    }

    public function editRealisasi(Request $request, $id_realisasi){
        $realisasi = \App\Models\Realisasi::find($id_realisasi);
        $jumlah = str_replace(',', '', $request->f_volume);
        $satuan = str_replace(',', '', $request->f_harga_satuan);
        $total = str_replace(',', '', $request->f_total_belanja);
        $request->merge([
            'f_volume' => (int)$jumlah,
            'f_harga_satuan' => (int)$satuan,
            'f_total_belanja' => (int)$total,
        ]);
        $realisasi->update($request->all());
        
        $id_pengguna =  auth()->user()->id_pengguna;
        if(auth()->user()->level == 0){
            return redirect('/realisasi')->with('sukses', 'Data berhasil diupdate');
        }else {
            return redirect('/realisasi/'.$id_pengguna)->with('sukses', 'Data berhasil diupdate');
        }
    }

    public function deleteRealisasi($id_realisasi){
        $realisasi = \App\Models\Realisasi::find($id_realisasi);

        $data_pengajuan = \App\Models\Pengajuan::find($realisasi->id_pengajuan);
        $data_pengajuan->realisasi = '0';
        $data_pengajuan->save();

        $data_rkas = \App\Models\Rkas::find($realisasi->id_rkas);
        $dana_pakai = $data_rkas->dana_terpakai;
        $dana_sisa = $data_rkas->sisa_dana;
        $dana_pakai_now = $dana_pakai - $realisasi->f_total_belanja;
        $dana_sisa_now = $dana_sisa + $realisasi->f_total_belanja;
        $data_rkas->dana_terpakai = $dana_pakai_now;
        $data_rkas->sisa_dana = $dana_sisa_now;
        $data_rkas->save();
        
        $realisasi->delete();
        
        $id_pengguna = auth()->user()->id_pengguna;
        if(auth()->user()->level == 0){
            return redirect('/realisasi')->with('sukses', 'Data berhasil dihapus');
        }else {
            return redirect('/realisasi/'.$id_pengguna)->with('sukses', 'Data berhasil dihapus');
        }
    }
}
