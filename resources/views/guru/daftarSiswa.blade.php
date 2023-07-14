@extends('layouts.main')

@section('container')
<div class="pagetitle mt-3">
   <div class="container">
      <div class="row align-items-center">
         <div class="col">
            <h1 style="text-align: left;">Rekap Absen (ID Kelas : {{ $id }})</h1>
         </div>
         <div class="col text-right">
            <button id="excel" class="btn btn-primary" style="float: right;"><span class="bi bi-download"></span> Download Rekap</button>
         </div>
      </div>
   </div>
</div>




<style>
   .table-container {
     max-height: 300px;
     overflow-y: scroll;
   }
   
   table {
     width: 100%;
     border-collapse: collapse;
   }
   
   th, td {
     padding: 8px;
     text-align: left;
     border-bottom: 1px solid #ddd;
   }
   
   th {
     background-color: #c3c3c3;
     position: sticky;
     top: 0;
   }
   
   </style>
   <script src="{{asset('admintemplate/js/table2excel.js')}}">
      
   </script>

<div class="row">
      <div class="card col-md-12 mt-2 pb-4">
         <div class="card-body">
             <h5 class="card-title">Total</h5>
             <div class="table-container border">

             <table>
                <thead>
                   <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">ID Siswa</th>
                    <th scope="col" class="text-center">Nama</th>
                    <th scope="col" class="text-center">Jumlah Hadir</th>
                    <th scope="col" class="text-center">Jumlah Sakit</th>
                    <th scope="col" class="text-center">Jumlah Izin</th>
                    <th scope="col" class="text-center">Jumlah Alfa</th>
                   </tr>
                </thead>
                
                <tbody>
                  @php($no=1)
                  @if(count($siswa) > 0)
                  @foreach($siswa as $item)
                  @php($absensi = \App\Models\Absensi::where('id_siswa', $item->id_siswa)->where('id_kelas', $id)->get())
                   <tr>
                      <td scope="row" class="text-center">{{ $no++ }}</td>
                      <td class="text-center">{{ $item->id_siswa }}</td>
                      <td class="text-center">{{ $item->nama }}</td>
                      <td class="text-center">{{ $absensi->where('status', 'Hadir')->count() }}</td>
                      <td class="text-center">{{ $absensi->where('status', 'Sakit')->count() }}</td>
                      <td class="text-center">{{ $absensi->where('status', 'Izin')->count() }}</td>
                      <td class="text-center">{{ $absensi->where('status', 'Alfa')->count() }}</td>
                   </tr>
                   @endforeach
                   @else
                   <tr>
                     <td colspan="6" class="text-center">Tidak ada siswa</td>
                   </tr>
                   @endif
                </tbody>
             </table>
            </div>
         </div>
      </div>
</div>

@php($nomer=1)
@foreach($waktuAbsen as $items)
<div class="row">
   <div class="card col-md-12 mt-2 pb-4">
      <div class="card-body">
         <div class="row align-items-center">
            <div class="col">
               <h5 class="card-title">Tanggal : {{ date('Y-m-d', strtotime($items->waktu)) }}</h5>
            </div>
            <div class="col text-right">
               <button id="excel{{ $nomer++ }}" class="btn btn-primary" style="float: right;"><span class="bi bi-download"></span> Download {{ date('Y-m-d', strtotime($items->waktu)) }}</button>
            </div>
         </div>
         {{-- <div class="row">
         <h5 class="card-title">Tanggal : {{ date('Y-m-d', strtotime($items->waktu)) }}</h5>
         <button id="excels" class="btn btn-primary"><span class="bi bi-download"></span> Download Excel</button>
         </div> --}}
          <div class="table-container border">
          <table>
             <thead>
                <tr>
                 <th scope="col" class="text-center">No</th>
                 <th scope="col" class="text-center">ID Siswa</th>
                 <th scope="col" class="text-center">Nama</th>
                 <th scope="col" class="text-center">Status</th>
                 <th scope="col" class="text-center">Edit</th>
                </tr>
             </thead>
             
             <tbody>
               @php($absensi = \App\Models\Absensi::whereDate('waktu', date('Y-m-d', strtotime($items->waktu)))->where('id_kelas', $id)->get())
               @php($no=1)
               @if(count($absensi) > 0)
               @foreach($absensi as $item)               
                <tr>
                   <td scope="row" class="text-center">{{ $no++ }}</td>
                   <td class="text-center">{{ $item->id_siswa }}</td>
                   <td class="text-center">{{ $item->nama }}</td>
                   <td class="text-center">{{ $item->status }}</td>
                   <td class="text-center">
                     <a class="btn btn-primary" style="border-radius: 100px;" a href="{{ route('editHadir', ['id_siswa' => base64_encode($item->id_siswa), 'id_kelas' => base64_encode($id), 'waktu' => base64_encode($item->waktu)]) }}"><i class="bi bi-check-circle"></i></a>
                     <a class="btn btn-warning" style="border-radius: 100px;" a href="{{ route('editSakit', ['id_siswa' => base64_encode($item->id_siswa), 'id_kelas' => base64_encode($id), 'waktu' => base64_encode($item->waktu)]) }}"><i class="bi bi-thermometer-half"></i></a>
                     <a class="btn btn-info" style="border-radius: 100px;" a href="{{ route('editIzin', ['id_siswa' => base64_encode($item->id_siswa), 'id_kelas' => base64_encode($id), 'waktu' => base64_encode($item->waktu)]) }}"><i class="bi bi-exclamation-circle"></i></a>
                     <a class="btn btn-danger" style="border-radius: 100px;" a href="{{ route('editAlfa', ['id_siswa' => base64_encode($item->id_siswa), 'id_kelas' => base64_encode($id), 'waktu' => base64_encode($item->waktu)]) }}"><i class="bi bi-x-circle"></i></a>
                   </td>
                </tr>
                @endforeach
                
                @else
                <tr>
                  <td colspan="6" class="text-center">Tidak ada siswa</td>
                </tr>
                @endif
             </tbody>
          </table>
         </div>
      </div>
   </div>
</div>
@endforeach


{{-- table buat di print (rekap) --}}
<div style="visibility: collapse;">
   <table id="rekap">
      <thead>
      <tr>
         <th class="text-center">Kelas : {{ $info->pelajaran }}</th>
      </tr>
      <tr>
         <th class="text-center">Pengajar : {{ $info->guru }}</th>
      </tr>
      <tr>
         <th class="text-center">Tahun Ajaran : {{ $tahunAjaran }}</th>
      </tr>
      <tr>
      </tr>
         <tr>
         <th scope="col" class="text-center">No</th>
         <th scope="col" class="text-center">Nama</th>
         <th scope="col" class="text-center">Jumlah Hadir</th>
         <th scope="col" class="text-center">Jumlah Sakit</th>
         <th scope="col" class="text-center">Jumlah Izin</th>
         <th scope="col" class="text-center">Jumlah Alfa</th>
         </tr>
      </thead>
      
      <tbody>
      @php($no=1)
      @if(count($siswa) > 0)
      @foreach($siswa as $item)
      @php($absensi = \App\Models\Absensi::where('id_siswa', $item->id_siswa)->where('id_kelas', $id)->get())
         <tr>
            <td scope="row" class="text-center">{{ $no++ }}</td>
            <td class="text-center">{{ $item->nama }}</td>
            <td class="text-center">{{ $absensi->where('status', 'Hadir')->count() }}</td>
            <td class="text-center">{{ $absensi->where('status', 'Sakit')->count() }}</td>
            <td class="text-center">{{ $absensi->where('status', 'Izin')->count() }}</td>
            <td class="text-center">{{ $absensi->where('status', 'Alfa')->count() }}</td>
         </tr>
         @endforeach
         @else
         <tr>
         <td colspan="6" class="text-center">Tidak ada siswa</td>
         </tr>
         @endif
      </tbody>
   </table>
</div>

{{-- table buat di print (per minggu) --}}
@php($nomer=1)
@foreach($waktuAbsen as $items)
<div>
   <table id="rekap">
      <thead>
      <tr>
         <th class="text-center">Kelas : {{ $info->pelajaran }}</th>
      </tr>
      <tr>
         <th class="text-center">Pengajar : {{ $info->guru }}</th>
      </tr>
      <tr>
         <th class="text-center">Tanggal : {{ date('Y-m-d', strtotime($items->waktu)) }}</th>
      </tr>
      <tr>
      </tr>
         <tr>
         <th scope="col" class="text-center">No</th>
         <th scope="col" class="text-center">Nama</th>
         <th scope="col" class="text-center">Status</th>
         </tr>
      </thead>
      
      <tbody>
      @php($no=1)
      @if(count($siswa) > 0)
      @foreach($siswa as $item)
      @php($absensi = \App\Models\Absensi::where('id_siswa', $item->id_siswa)->where('id_kelas', $id)->get())
         <tr>
            <td scope="row" class="text-center">{{ $no++ }}</td>
            <td class="text-center">{{ $item->nama }}</td>
            <td class="text-center">{{ $absensi->where('status', 'Hadir')->count() }}</td>
         </tr>
         @endforeach
         @else
         <tr>
         <td colspan="6" class="text-center">Tidak ada siswa</td>
         </tr>
         @endif
      </tbody>
   </table>
</div>
@endforeach

<script>
   document.getElementById('excel').addEventListener('click',function(){
      var table2excel = new Table2Excel();
      table2excel.export(document.querySelectorAll("#rekap","Rekap Absen"));
   });
</script>
@endsection