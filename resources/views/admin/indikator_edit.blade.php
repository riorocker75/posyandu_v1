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
                <h3 class="card-title">Ubah Data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  @foreach ($data as $dt)
                <form action="{{ url('/dashboard/indikator/update') }}" method="post">
                       @csrf  
                       @method('POST')
                           
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        @php
                          $indikator= \App\Models\Balita::where('id',$dt->balita_id)->first();
                         @endphp
                        <label>Balita</label>
                        <input type="text" class="form-control"  value="{{$indikator->nama}} | {{$indikator->umur}} bulan" disabled>
                        <input type="hidden" class="form-control" name="id" value="{{$dt->id}}">

                        <input type="hidden" class="form-control" name="balita_id" value="{{$indikator->id}}">
                   </div>  

                   <div class="form-group">
                    <label for="exampleInputEmail1">Tinggi badan</label>
                        <input type="text" class="form-control" name="tinggi" value="{{$dt->tinggi}}" required>
                   </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Berat badan</label>
                        <input type="text" class="form-control" name="berat" value="{{$dt->berat}}" required>
                   </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Panjang</label>
                        <input type="text" class="form-control" name="panjang" value="{{$dt->panjang}}" required>
                   </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Suntikan Imunisasi</label>
                        <input type="text" class="form-control" name="suntikan"  value="{{$dt->suntikan}}" required>
                   </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Hasil Pemantauan</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio"value="y" {{ $dt->ukur_berat == 'y' ? 'checked' : ''}} name="hasil">
                            <label class="form-check-label">Sehat</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="n" {{ $dt->ukur_berat == 'n' ? 'checked' : ''}} name="hasil">
                        <label class="form-check-label">Stunting</label>
                    </div>
                 </div>

                   
                   <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Input</label>
                        <input type="date" class="form-control" name="tanggal" value="{{date('Y-m-d',strtotime($dt->tanggal) )}}" required>
                   </div>
                </div>
                 <div class="col-md-6">
                         

                             <div class="form-group">
                                <label for="exampleInputEmail1">Pemberian Imunisasi Dasar</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="y" {{ $dt->imunisasi_dasar == 'y' ? 'checked' : ''}} name="imunisasi_dasar">
                                        <label class="form-check-label">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="n" {{ $dt->imunisasi_dasar == 'n' ? 'checked' : ''}} name="imunisasi_dasar">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                             </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Pengukuran Berat Badan</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"value="y" {{ $dt->ukur_berat == 'y' ? 'checked' : ''}} name="ukur_berat">
                                        <label class="form-check-label">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="n" {{ $dt->ukur_berat == 'n' ? 'checked' : ''}} name="ukur_berat">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                             </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Pengukuran Tinggi Badan</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="y" {{ $dt->ukur_tinggi == 'y' ? 'checked' : ''}} name="ukur_tinggi">
                                        <label class="form-check-label">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="n" {{ $dt->ukur_tinggi == 'n' ? 'checked' : ''}} name="ukur_tinggi">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                             </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Konseling Gizi Bagi Orang Tua</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="y" {{ $dt->konseling_gizi == 'y' ? 'checked' : ''}} name="konseling_gizi">
                                        <label class="form-check-label">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="n" {{ $dt->konseling_gizi == 'n' ? 'checked' : ''}} name="konseling_gizi">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                             </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Kunjungan Rumah</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="y" {{ $dt->kunjungan_rumah == 'y' ? 'checked' : ''}} name="kunjungan_rumah">
                                        <label class="form-check-label">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="n" {{ $dt->kunjungan_rumah == 'n' ? 'checked' : ''}} name="kunjungan_rumah">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                             </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Kepemilikan Air Bersih</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="y" {{ $dt->air_bersih == 'y' ? 'checked' : ''}} name="air_bersih">
                                        <label class="form-check-label">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="n" {{ $dt->air_bersih == 'n' ? 'checked' : ''}} name="air_bersih">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                             </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Kepemilikan Jamban Sehat</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="y" {{ $dt->jamban_sehat == 'y' ? 'checked' : ''}} name="jamban_sehat">
                                        <label class="form-check-label">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="n" {{ $dt->jamban_sehat == 'n' ? 'checked' : ''}} name="jamban_sehat">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                             </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Akta Lahir</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="y" {{ $dt->akta_lahir == 'y' ? 'checked' : ''}} name="akta_lahir">
                                        <label class="form-check-label">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="n" {{ $dt->akta_lahir == 'n' ? 'checked' : ''}} name="akta_lahir">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                             </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Jaminan Kesehatan</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="y" {{ $dt->jaminan_kesehatan == 'y' ? 'checked' : ''}} name="jaminan_kesehatan">
                                        <label class="form-check-label">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="n" {{ $dt->jaminan_kesehatan == 'n' ? 'checked' : ''}} name="jaminan_kesehatan">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                             </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Pengasuhan PAUD</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="y"  {{ $dt->pengasuhan == 'y' ? 'checked' : ''}} name="pengasuhan">
                                        <label class="form-check-label">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="n" {{ $dt->pengasuhan == 'n' ? 'checked' : ''}} name="pengasuhan">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                             </div>
                            

                 </div>

            
                </div>
                <button type="submit" class="btn btn-primary btn-lg float-right">Simpan</button>
                 
                 </form>
                 @endforeach

              </div>
              <!-- /.card-body -->
      </section>   

</div>  


@endsection