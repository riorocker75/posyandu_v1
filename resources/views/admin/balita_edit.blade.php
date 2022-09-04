@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Balita</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Balita</li>
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
                @foreach($data as $dt)
                <form action="{{ url('/dashboard/balita/update') }}" method="post">
                       @csrf  
                       @method('POST')
                <div class="row">
                 <div class="col-md-6">
                         

                             <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{$dt->nama}}" required>
                                <input type="hidden" class="form-control" name="id" value="{{$dt->id}}" required>

                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                 <select class="custom-select form-control-border border-width-2"  name="jenis_kelamin" required="required">
                                        <option value="{{$dt->jenis_kelamin}}" selected>{{(jenis_kelamin($dt->jenis_kelamin))}}</option>
                                        <option value="1">Pria</option>
                                        <option value="2">Wanita</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lhr" value="{{date('Y-m-d',strtotime($dt->tanggal_lahir))}}" required>
                            </div>
                           

                            <div class="form-group">
                                <label for="exampleInputEmail1">umur</label>
                                <input type="number" class="form-control" min="1" max="1000" name="umur" value="{{$dt->umur}}" required>
                            </div>

                 </div>

            
                </div>
                <button type="submit" class="btn btn-primary btn-lg float-right">Tambah</button>
                 
                 </form>
                 @endforeach

              </div>
              <!-- /.card-body -->
      </section>   

</div>  


@endsection