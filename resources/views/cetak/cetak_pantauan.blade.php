<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak</title>
{{-- databales --}}
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css?v=3.2.0')}}">

    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>



    <style type="text/css">
    .vertical {
        writing-mode: vertical-lr;
        text-orientation: sideways-lr;
        transform: rotate(180deg);
        }
			.lead {
				font-family: "Verdana";
				font-weight: bold;
			}
			.value {
				font-family: "Verdana";
			}
			.value-big {
				font-family: "Verdana";
				font-weight: bold;
				font-size: large;
			}
			.td {
				valign : "top";
			}

			/* @page { size: with x height */
			/*@page { size: 20cm 10cm; margin: 0px; }*/
			@page {
				size: A4;
				margin : 0px;
			}
	/*		@media print {
			  html, body {
			  	width: 210mm;
			  }
			}*/
			 .kepala{
        text-align:center;
        font-size: 28px;
        margin:40px 120px;

    }
    .kop_surat {
	position: relative;
	height: 4cm;
	display: flex;
	top: 0;
}

.logo_surat {
	height: 0.5cm;
	width: 0.5cm;
    position: absolute;
    left: 150px;
}
.logo_surat img{
    margin-top: 40px;
  width: 90px;
    height: 75px;
}
.logo_kanan{
    position: absolute;
        right: 150px;

}
.logo_kanan img{
     margin-top: 40px;
    width: 90px;
    height: 75px;
}
.judul_surat {
	padding-top: 0.5cm;
	padding-left: 1cm;
	padding-right: 1cm;
	font-size: 20pt;
	font-weight: 700;
	text-align: center;
	width: 14.8cm;
	/* background: red; */
	margin: 0 auto;
	/* line-height: 1.3;s */
}
	</style>
</head>
{{-- <body onload="window.print();"> --}}
<body>

	<div class="wrapper">
		<div class="container">
<div class="kop_surat">
            <div class="logo_surat">
                <img src="{{url('/')}}/logo/logo.png" alt="" srcset="">
            </div>
                <div class="logo_kanan float-right">
                    <img src="{{url('/')}}/logo/puskesmas.png" alt="" srcset="">

                </div>

                <div class="judul_surat">
                    <p style="font-size:20px">PEMERINTAH KABUPATEN LANGKAT</p> 
                   <p style="line-height: 0;margin-top:16px">POSYANDU PANTAI GEMI</p>
                    {{-- <p style="margin-top:-10px"> KECAMATAN SEMADAM</p> --}}
                   
                    {{-- <p style="font-size:12px;font-weight:400">Jln. Lawe Breingin Horas - Semadam Asal Kode Pos 24678</p> --}}
                 </div>
        </div>

   <div style="text-align:center;margin-top:30px">
    <h5> Formulir Pemantauan Bulanan Anak</h5>
			<h5>{{$dari}} -> {{$sampai}}</h5>
   </div>
   <table id="absensi" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Anak</th>
                <th>
                    <div class="vertical">Jenis Kelamin L/P</div>
                </th>
                <th>Tanggal Lahir</th>
                {{-- <th>Status Gizi</th> --}}
                <th>Umur
                    <br>Bulan
                </th>
                <th>Tinggi
                    <br>Badan
                </th>

                <th>Berat
                    <br>Badan
                </th>

                <th>Panjang
                    <br>Badan
                </th>

                <th>Suntikan
                </th>

                <th width="20%">Hasil
                </th>
                <th>
                    <div class="vertical">Pemberian imunisasi Dasar</div>
                </th>
                <th>
                    <div class="vertical">Pengukuran Berat Badan</div>
                </th>
                <th>
                    <div class="vertical">Pengukuran Tinggi Badan</div>
                </th>
                <th>
                    <div class="vertical">Konseling Gizi</div>
                </th>
                <th>
                    <div class="vertical">Kunjungan Rumah</div>
                </th>

                <th>
                    <div class="vertical">Kepemilikan Akses Air Bersih</div>
                </th>

                <th>
                    <div class="vertical">Kepemilikan Jamban Sehat</div>
                </th>

                <th>
                    <div class="vertical">Akta Lahir</div>
                </th>

                <th>
                    <div class="vertical">Jaminan Kesehatan</div>
                </th>

                <th>
                    <div class="vertical">Pengasuhan PAUD</div>
                </th>

            </tr>
        </thead>
        <tbody>
			   <?php $no=1; ?>
			@foreach ($data as $dt)
			   @php
                   $balita=App\Models\Balita::where('id',$dt->balita_id)->first();
                @endphp
            <tr>
					
                <td>{{$no++}}</td>
				<td>{{$balita->nama}} </td>
				<td>{{format_kelamin($balita->jenis_kelamin)}}</td>
				<td>{{format_tanggal(date('Y-m-d',strtotime($balita->tanggal_lahir)))}}</td>
				{{-- <td></td> --}}
				<td>{{$balita->umur}} </td>
				<td>{{$dt->tinggi}}</td>
				<td>{{$dt->berat}}</td>
				<td>{{$dt->panjang}}</td>
				<td>{{$dt->suntikan}}</td>

				<td>{{format_hasil($dt->hasil)}}</td>
				<td>
                    {{format_cek($dt->imunisasi_dasar)}}
                </td>
                <td>
                    {{format_cek($dt->ukur_berat)}}
                </td>
                <td>
                    {{format_cek($dt->ukur_tinggi)}}
                </td>

                <td>
                    {{format_cek($dt->konseling_gizi)}}
                </td>

                <td>
                    {{format_cek($dt->kunjungan_rumah)}}
                </td>

                <td>
                    {{format_cek($dt->air_bersih)}}
                </td>

                <td>
                    {{format_cek($dt->jamban_sehat)}}
                </td>

                <td>
                    {{format_cek($dt->akta_lahir)}}
                </td>

                <td>
                    {{format_cek($dt->jaminan_kesehatan)}}
                </td>

                <td>
                    {{format_cek($dt->pengasuhan)}}
                </td>
				{{-- <td>{{format_tanggal(date('Y-m-d',strtotime($dt->tanggal)))}} </td> --}}
			
            </tr>  
			@endforeach
        </tbody>   
	</table>

		</div>
	</div>
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

<script>
$('#absensi').dataTable({
	searching: false, paging: false, info: false
});
</script>    
</body>
</html>