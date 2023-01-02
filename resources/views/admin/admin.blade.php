@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
     <div style="text-align:center;margin:30px 0">

   
  </div>
    <section class="content">
        @php
            $jlh_balita= App\Models\Balita::where('status',1)->count(); 
            $jlh_indikator= App\Models\Indikator::where('status',1)->count();   
            $jlh_laki= App\Models\Balita::where('jenis_kelamin',1)->count(); 
            $jlh_per= App\Models\Balita::where('jenis_kelamin',2)->count(); 
      

        @endphp
      <div class="container-fluid">
         <div class="row">
                <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$jlh_balita}}</h3>

                            <p>Balita</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <a href="{{url('/dashboard/balita/data')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                 </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$jlh_indikator}}</h3>

                            <p>Pemantauan</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        </div>
                        <a href="{{url('/dashboard/indikator/data')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    
          
         </div>

         <div class="row">
            
              <div class="col-lg-6 col-md-6 col-12">
                <div class="card">
                  <div class="card-header">
                    Jumlah Anak
                  </div>
                  <div style="width: 300px;height:300px;text-align:center;">
                    <canvas id="jlhBayi"></canvas>
                  </div>
                </div>
  
                </div>
               
         </div>
      



      </div>  
      </section>   

</div>  

<script>
  const ctx = document.getElementById('jlhBayi');

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Laki-laki', 'Perempuan', ],
      datasets: [{
        label: 'Jumlah Bayi',
        data: [{{$jlh_laki}}, {{$jlh_per}}],
        borderWidth: 1
      }]
    },

  });

  
</script>


@endsection