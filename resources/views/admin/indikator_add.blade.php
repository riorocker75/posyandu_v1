@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pantauan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pantauan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
    
    <section class="content">
  
      <div class="container-fluid">
         <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ url('/dashboard/indikator/act') }}" method="post">
                       @csrf  
                       @method('POST')
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Balita</label>
                        <select class="form-control select2" style="width: 100%;" name="balita_id" required>
                            <option selected value="">Cari Nama Balita</option>
                            @php
                                $balita= \App\Models\Balita::get();
                            @endphp
                            @foreach ($balita as $ps)
                             <option value="{{$ps->id}}">{{$ps->nama}} | {{$ps->umur}} bulan</option>
                            @endforeach
                        </select>
                   </div>  

                   <div class="form-group">
                    <label for="exampleInputEmail1">Tinggi badan</label>
                        <input type="text" class="form-control" name="tinggi" required>
                   </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Berat badan</label>
                        <input type="text" class="form-control" name="berat" required>
                   </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Panjang</label>
                        <input type="text" class="form-control" name="panjang" required>
                   </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Suntikan Imunisasi</label>
                        <input type="text" class="form-control" name="suntikan" required>
                   </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Hasil Pemantauan</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio"value="y" name="hasil">
                            <label class="form-check-label">Sehat</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="n" name="hasil">
                        <label class="form-check-label">Stunting</label>
                    </div>
                 </div>

                 <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Input</label>
                        <input type="date" class="form-control" name="tanggal" value="{{date('Y-m-d')}}" required>
                   </div>
                  
                </div>
                 <div class="col-md-6">

                             <div class="form-group">
                                <label for="exampleInputEmail1">Pemberian Imunisasi Dasar</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="y" name="imunisasi_dasar">
                                        <label class="form-check-label">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="n" name="imunisasi_dasar">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                             </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Pengukuran Berat Badan</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"value="y" name="ukur_berat">
                                        <label class="form-check-label">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="n" name="ukur_berat">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                             </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Pengukuran Tinggi Badan</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="y" name="ukur_tinggi">
                                        <label class="form-check-label">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="n" name="ukur_tinggi">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                             </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Konseling Gizi Bagi Orang Tua</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="y" name="konseling_gizi">
                                        <label class="form-check-label">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="n" name="konseling_gizi">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                             </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Kunjungan Rumah</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="y" name="kunjungan_rumah">
                                        <label class="form-check-label">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="n" name="kunjungan_rumah">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                             </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Kepemilikan Air Bersih</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="y" name="air_bersih">
                                        <label class="form-check-label">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="n" name="air_bersih">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                             </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Kepemilikan Jamban Sehat</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="y" name="jamban_sehat">
                                        <label class="form-check-label">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="n" name="jamban_sehat">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                             </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Akta Lahir</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="y" name="akta_lahir">
                                        <label class="form-check-label">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="n" name="akta_lahir">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                             </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Jaminan Kesehatan</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="y" name="jaminan_kesehatan">
                                        <label class="form-check-label">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="n" name="jaminan_kesehatan">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                             </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Pengasuhan PAUD</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="y" name="pengasuhan">
                                        <label class="form-check-label">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="n" name="pengasuhan">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                             </div>
                            

                 </div>

            
                </div>
                <button type="submit" class="btn btn-primary btn-lg float-right">Tambah</button>
                 
                 </form>

              </div>
              <!-- /.card-body -->
      </section>   

</div>  


@endsection