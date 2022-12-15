<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Admin;
use App\Models\Balita;
use App\Models\Indikator;










class AdminCtrl extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

	public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-adm')){
                return redirect('/login')->with('alert-danger','Dilarang Masuk Terlarang');
            }
            return $next($request);
        });
        
    }
    public function __invoke(Request $request)
    {
       

    }

    function index(){
          return view('admin.admin');
    }

    // balita
    function balita(){
        $data=Balita::orderBy('id','desc')->get();
        return view('admin.balita',[
            'data' =>$data
        ]);
    }
    function balita_add(){
        return view('admin.balita_add');
    }
    function balita_act(Request $request){
        $request->validate([
            'nama' => 'required',
        ]);

         $date=date('Y-m-d');

         DB::table('balita')->insert([
            'nama' => $request->nama,
            'jenis_kelamin' =>$request->jenis_kelamin,
            'tanggal_lahir'=> $request->tgl_lhr,
            'umur'=> $request->umur,
            'status' => 1
        ]);

        return redirect('/dashboard/balita/data')->with('alert-success','Data berhasil');

    }
    function balita_edit($id){
        $data=Balita::where('id',$id)->get();
        return view('admin.balita_edit',[
            'data' =>$data
        ]);
    }
    function balita_update(Request $request){
        $request->validate([
            'nama' => 'required',
        ]);
        $id=$request->id;

         $date=date('Y-m-d');

         DB::table('balita')->where('id',$id)->update([
            'nama' => $request->nama,
            'jenis_kelamin' =>$request->jenis_kelamin,
            'tanggal_lahir'=> $request->tgl_lhr,
            'umur'=> $request->umur,
            'status' => 1
        ]);

        return redirect('/dashboard/balita/data')->with('alert-success','Data berhasil');

    }
    function balita_delete($id){
        $balita=Balita::where('id',$id)->first();
        Indikator::where('balita_id',$balita->id)->delete();
        Balita::where('id',$id)->delete();
        return redirect('/dashboard/balita/data')->with('alert-success','Data berhasil');

    }


     // indikator
     function indikator(){
        $data=Indikator::orderBy('id','desc')->get();
        return view('admin.indikator',[
            'data' =>$data
        ]);
     }
     function indikator_add(){
        return view('admin.indikator_add');
     }
     function indikator_act(Request $request){
        $request->validate([
            'balita_id' => 'required',
        ]);

         $date=date('Y-m-d');

         DB::table('indikator')->insert([
            'balita_id' => $request->balita_id,
            'imunisasi_dasar' =>$request->imunisasi_dasar,
            'ukur_berat' => $request->ukur_berat,
            'ukur_tinggi' => $request->ukur_tinggi,
            'konseling_gizi' => $request->konseling_gizi,
            'kunjungan_rumah' => $request->kunjungan_rumah,
            'air_bersih' => $request->air_bersih,
            'jamban_sehat' => $request->jamban_sehat,
            'akta_lahir' => $request->akta_lahir,
            'jaminan_kesehatan' => $request->jaminan_kesehatan,
            'pengasuhan' => $request->pengasuhan,
            'tanggal' => $request->tanggal,
            'status' => 1
        ]);

        return redirect('/dashboard/indikator/data')->with('alert-success','Data berhasil');

     }
     function indikator_edit($id){
        $data=Indikator::where('id',$id)->get();
        return view('admin.indikator_edit',[
            'data' =>$data
        ]);
     }
     function indikator_update(Request $request){
        $request->validate([
            'balita_id' => 'required',
        ]);

         $date=date('Y-m-d');
            $id=$request->id;
         DB::table('indikator')->where('id',$id)->update([
            'balita_id' => $request->balita_id,
            'imunisasi_dasar' =>$request->imunisasi_dasar,
            'ukur_berat' => $request->ukur_berat,
            'ukur_tinggi' => $request->ukur_tinggi,
            'konseling_gizi' => $request->konseling_gizi,
            'kunjungan_rumah' => $request->kunjungan_rumah,
            'air_bersih' => $request->air_bersih,
            'jamban_sehat' => $request->jamban_sehat,
            'akta_lahir' => $request->akta_lahir,
            'jaminan_kesehatan' => $request->jaminan_kesehatan,
            'pengasuhan' => $request->pengasuhan,
            'tanggal' => $request->tanggal,
            'status' => 1
        ]);

        return redirect('/dashboard/indikator/data')->with('alert-success','Data berhasil');

     }
     function indikator_delete($id){
        Indikator::where('id',$id)->delete();
        return redirect('/dashboard/indikator/data')->with('alert-success','Data berhasil');

     }


    // pasien
    function pasien(){
        return view('pasien.pasien');
    }

    function pasien_act(Request $request){
         $request->validate([
            'nama' => 'required',
            'nik' => 'required'
        ]);

         $date=date('Y-m-d');

         DB::table('pasien')->insert([
            'nama' => $request->nama,
            'nik' =>$request->nik,
            'kartu_berobat'=> $request->kartu,
            'tanggal_lahir'=> $request->tgl_lhr,
            'tempat_lahir' => $request->tmp_lhr,
            'agama'=> $request->agama,
            'pekerjaan'=> $request->kerja,
            'alamat'=> $request->alamat,
            'nama_kepala'=> $request->kepala,
            'tgl_registrasi' => $date,
            'status' => 1
        ]);

        return redirect('/dashboard/pasien/data')->with('alert-success','Data diri anda sudah terkirim');

    }

     function pasien_data(){
         $data = Pasien::orderBy('id','desc')->get();
        return view('admin.pasien_data',[
            'data' =>$data
        ]);
    }
    function pasien_edit($id){
          $data = Pasien::where('id',$id)->get();
        return view('admin.pasien_edit',[
            'data' =>$data
        ]);
    }

    function pasien_update(){
        
    }
    function pasien_delete(){
               Pasien::where('id',$id)->delete();
        return redirect('/dashboard/pasien/data')->with('alert-success','Data Berhasil');  
    }


    // pegawai

    function pegawai(){
        $data=Pegawai::orderBy('id','desc')->get();
        return view('admin.pegawai_data',[
            'data' =>$data
        ]);

    }

    function pegawai_add(){
        return view('admin.pegawai_add');
    }

    function pegawai_act(Request $request){
            $request->validate([
                'nama' => 'required',
                'nip' => 'required'
            ]);

             $date=date('Y-m-d');

         DB::table('pegawai')->insert([
            'nama' => $request->nama,
            'nip' =>$request->nip,
            'jenis_kelamin' => $request->kelamin,
            'tanggal_lahir' => $request->tgl_lhr,
            'tempat_lahir' => $request->tmp_lhr,
            'alamat' => $request->alamat,
            'telepon' => $request->no_hp,
            'jabatan' => $request->jabatan,
            'pendidikan_nama' => $request->pendidikan,
            'pendidikan_tahun_lulus' => $request->thn_lulus,
            'pendidikan_tk_ijazah' => $request->pt_ijazah,
            // 'pangkat' => $request->pangkat,
            'tmt_cpns' => $request->cpns,
            'tanggal' => date('Y-m-d'),

            'status' => 1
        ]);

        return redirect('/dashboard/pegawai/data')->with('alert-success','Data diri anda sudah terkirim');


    }

    function pegawai_edit($id){
        $data=Pegawai::where('id',$id)->get();
        return view('admin.pegawai_edit',[
            'data' => $data
        ]);
    }
    function pegawai_update(Request $request){
          $request->validate([
                'nama' => 'required',
                'nip' => 'required'
            ]);
            $id=$request->id;

             $date=date('Y-m-d');

         DB::table('pegawai')->where('id',$id)->update([
            'nama' => $request->nama,
            'nip' =>$request->nip,
            'jenis_kelamin' => $request->kelamin,
            'tanggal_lahir' => $request->tgl_lhr,
            'tempat_lahir' => $request->tmp_lhr,
            'alamat' => $request->alamat,
            'telepon' => $request->no_hp,
            'jabatan' => $request->jabatan,
            'pendidikan_nama' => $request->pendidikan,
            'pendidikan_tahun_lulus' => $request->thn_lulus,
            'pendidikan_tk_ijazah' => $request->pt_ijazah,
            // 'pangkat' => $request->pangkat,
            'tmt_cpns' => $request->cpns,
            'status' => 1
        ]);

        return redirect('/dashboard/pegawai/data')->with('alert-success','Data diri anda sudah terkirim');

    }

    function pegawai_delete($id){
                 Pegawai::where('id',$id)->delete();
        return redirect('/dashboard/pegawai/data')->with('alert-success','Data Berhasil');
    }


    // data dokter
    function dokter(){
        $data=Dokter::orderBy('id','desc')->get();
        return view('admin.dokter_data',[
            'data' => $data
        ]);
    }
    function dokter_add(){
        return view('admin.dokter_add');
    }
    function dokter_act(Request $request){
            $request->validate([
                'nama' => 'required',
                'nip' => 'required'
            ]);

             $date=date('Y-m-d');

         DB::table('dokter')->insert([
            'nama' => $request->nama,
            'nip' =>$request->nip,
            'jenis_kelamin' => $request->kelamin,
            'tanggal_lahir' => $request->tgl_lhr,
            'tempat_lahir' => $request->tmp_lhr,
            'alamat' => $request->alamat,
            'telepon' => $request->no_hp,
            'poli' => $request->poli,
            'tanggal' =>$date,
            'status' => 1
        ]);
        return redirect('/dashboard/dokter/data')->with('alert-success','Data Berhasil disimpan');

    }
    function dokter_edit($id){
        $data=Dokter::where('id',$id)->get();
        return view('admin.dokter_edit',[
            'data' => $data
        ]);
    }
    function dokter_update(Request $request){
        $request->validate([
                'nama' => 'required',
                'nip' => 'required'
            ]);
            $id=$request->id;
             $date=date('Y-m-d');

         DB::table('dokter')->where('id',$id)->update([
            'nama' => $request->nama,
            'nip' =>$request->nip,
            'jenis_kelamin' => $request->kelamin,
            'tanggal_lahir' => $request->tgl_lhr,
            'tempat_lahir' => $request->tmp_lhr,
            'alamat' => $request->alamat,
            'telepon' => $request->no_hp,
            'poli' => $request->poli,
        ]);
        return redirect('/dashboard/dokter/data')->with('alert-success','Data Berhasil diubah');

    }
    function dokter_delete($id){
        Dokter::where('id',$id)->delete();
        return redirect('/dashboard/dokter/data')->with('alert-success','Data Berhasil terhapus');

    }





    // data poli

function poli(){
    $data=Poli::orderBy('id','desc')->get();
        return view('admin.poli_data',[
            'data' =>$data
        ]);
}
function  poli_act(Request $request){
       $request->validate([
            'nama' => 'required',
        ]);

         DB::table('poli')->insert([
            'prosedur' => $request->nama,
        ]);
        return redirect('/dashboard/poli/data')->with('alert-success','Data Berhasil');

}
function  poli_edit($id){
    $dpoli=Poli::where('id',$id)->get();
       $data=Poli::orderBy('id','desc')->get();
        return view('admin.poli_edit',[
            'data' =>$data,
            'poli' => $dpoli
        ]);
}
function  poli_update(Request $request){
        $request->validate([
            'nama' => 'required',
        ]);

        $id=$request->id;
         DB::table('poli')->where('id',$id)->update([
            'prosedur' => $request->nama,
        ]);
        return redirect('/dashboard/poli/data')->with('alert-success','Data Berhasil');


}
function  poli_delete($id){
         Poli::where('id',$id)->delete();
        return redirect('/dashboard/poli/data')->with('alert-success','Data Berhasil');
       
}


// rekam medis
function  rekam(){
    $data=Rekam::orderBy('id','desc')->get();
        return view('admin.rekam_data',[
            'data' =>$data
        ]);
}


 function profile(){
    return view('admin.v_profile');
 }

  function struktur(){
    return view('admin.v_struktur');
 }

   function pelayanan(){
    return view('admin.v_pelayanan');
 }
    function visimisi(){
    return view('admin.v_visimisi');
 }

   function galeri(){
    return view('admin.v_galeri');
 }


 function role(){
     $data=Admin::orderBy('id','asc')->get();
     return view('admin.r_role_data',[
         'data' =>$data
     ]);
 }

  function role_edit($id){
     $data_user=Admin::where('id',$id)->first();
     $data=Admin::orderBy('id','asc')->get();

     return view('admin.r_role_data',[
         'data' =>$data,
         'd_user' =>$data_user
     ]);
 }

  function role_update(Request $request){
    $request->validate([
         'username' => 'required',
         'password' => 'required',
         'role' => 'required',
    ]);
    $cek_admin=Admin::where('level',1)->count();
    $cek_kapus=Admin::where('level',2)->count();

    if($cek_admin < 3 || $cek_kapus < 1){
        if($request->role == 1){
            Admin::insert([
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'level' => 1,
                'status' => 1,
            ]);
     return redirect('/dashboard/role/data')->with('alert-success','data telah berhasil ditambahkan');

         }elseif($request->role == 2){
        Admin::insert([
             'username' => $request->username,
            'password' => bcrypt($request->password),
            'level' => 2,
            'status' => 1
        ]);
     return redirect('/dashboard/role/data')->with('alert-success','data telah berhasil ditambahkan');

    }
    }else{

     return redirect('/dashboard/role/data')->with('alert-success','maaf data sudah maksimal');

    }
    
 }

 function role_delete($id){
     Admin::where('id',$id)->delete();
     return redirect('/dashboard/role/data')->with('alert-success','Data telah terhapus');

 }



 function pengaturan(){
     $username= Session::get('adm_username');
    $data= Admin::where('username',$username)->first();
    return view('admin.pengaturan',[
        'data'=> $data
    ]);

 }

  function pengaturan_update(Request $request){
     $username= Session::get('adm_username');
   
     if($request->password == ""){
        return redirect('/dashboard')->with('alert-success','Tidak Ada perubahan');
     }else{
         Admin::where('level','1')->update([
             'password' =>bcrypt($request->password)
         ]);
        return redirect('/dashboard/pengaturan/data')->with('alert-success','Password telah berubah');

     }

 }


 function cetak_pantuan(Request $request){
    $dari =$request->dari;
    $sampai =$request->sampai;  

    $fdari=format_tanggal(date('Y-m-d',strtotime($dari)));
    $fsampai=format_tanggal(date('Y-m-d',strtotime($sampai)));

    $cek_data=DB::table('surat_masuk')
            ->where('status',1)
            ->whereBetween('tanggal_masuk', [$dari, $sampai])
            ->orderBy('tanggal_masuk','desc')
            ->get();

    if(count($cek_data) < 1){
         return redirect()->back();
    }
            
    return view('cetak.cetak_surat_masuk',[
        'data' =>$cek_data,
        'dari' => $fdari,
        'sampai' => $fsampai,
    ]);

}




}
