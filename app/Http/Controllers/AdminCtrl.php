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
            'orang_tua'=> $request->orang_tua,

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
            'orang_tua'=> $request->orang_tua,
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

            'tinggi' => $request->tinggi,
            'berat' => $request->berat,
            'panjang' => $request->panjang,
            'suntikan' => $request->suntikan,
            'hasil' => $request->hasil,

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

            'tinggi' => $request->tinggi,
            'berat' => $request->berat,
            'panjang' => $request->panjang,
            'suntikan' => $request->suntikan,
            'hasil' => $request->hasil,

            'tanggal' => $request->tanggal,
            'status' => 1
        ]);

        return redirect('/dashboard/indikator/data')->with('alert-success','Data berhasil');

     }
     function indikator_delete($id){
        Indikator::where('id',$id)->delete();
        return redirect('/dashboard/indikator/data')->with('alert-success','Data berhasil');

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


 function cetak_pantauan(Request $request){
    $dari =$request->dari;
    $sampai =$request->sampai;  

    $fdari=format_tanggal(date('Y-m-d',strtotime($dari)));
    $fsampai=format_tanggal(date('Y-m-d',strtotime($sampai)));

    $cek_data=DB::table('indikator')
            ->where('status',1)
            ->whereBetween('tanggal', [$dari, $sampai])
            ->orderBy('tanggal','desc')
            ->get();

    if(count($cek_data) < 1){
         return redirect()->back();
    }
            
    return view('cetak.cetak_pantauan',[
        'data' =>$cek_data,
        'dari' => $fdari,
        'sampai' => $fsampai,
    ]);

}




}
