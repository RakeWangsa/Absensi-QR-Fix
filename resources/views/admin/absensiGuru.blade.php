@extends('layouts.main')

@section('container')
<div class="pagetitle mt-3">
   <div class="container">
      <div class="row align-items-center">
         <div class="col">
            <h1 style="text-align: left;">Absensi Guru</h1>
         </div>
         <div class="col text-right" style="text-align: right;">

            {{-- <div class="dropdown d-inline-block">
               <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-search"></i> Search
               </button>
               <ul class="dropdown-menu dropdown-menu-scrollable" style="max-height: 200px; overflow-y: auto;">
                  <!-- Daftar pilihan -->
                  <li><a class="dropdown-item" href="{{ route('agendaKelas') }}">Tidak ada</a></li>
                  <li><p class="dropdown-item mb-0 fw-bold">Kelas X</p></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'X1']) }}">X1</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'X2']) }}">X2</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'X3']) }}">X3</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'X4']) }}">X4</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'X5']) }}">X5</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'X6']) }}">X6</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'X7']) }}">X7</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'X8']) }}">X8</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'X9']) }}">X9</a></li>
                  <li><p class="dropdown-item mb-0 fw-bold">Kelas XI IPA</p></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XI IPA 1']) }}">XI IPA 1</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XI IPA 2']) }}">XI IPA 2</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XI IPA 3']) }}">XI IPA 3</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XI IPA 4']) }}">XI IPA 4</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XI IPA 5']) }}">XI IPA 5</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XI IPA 6']) }}">XI IPA 6</a></li>
                  <li><p class="dropdown-item mb-0 fw-bold">Kelas XI IPS</p></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XI IPS 1']) }}">XI IPS 1</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XI IPS 2']) }}">XI IPS 2</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XI IPS 3']) }}">XI IPS 3</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XI IPS 4']) }}">XI IPS 4</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XI IPS 5']) }}">XI IPS 5</a></li>
                  <li><p class="dropdown-item mb-0 fw-bold">Kelas XII IPA</p></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XII IPA 1']) }}">XII IPA 1</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XII IPA 2']) }}">XII IPA 2</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XII IPA 3']) }}">XII IPA 3</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XII IPA 4']) }}">XII IPA 4</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XII IPA 5']) }}">XII IPA 5</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XII IPA 6']) }}">XII IPA 6</a></li>
                  <li><p class="dropdown-item mb-0 fw-bold">Kelas XII IPS</p></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XI IPS 1']) }}">XII IPS 1</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XI IPS 2']) }}">XII IPS 2</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XI IPS 3']) }}">XII IPS 3</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XI IPS 4']) }}">XII IPS 4</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasSearch', ['search' => 'XII IPS 5']) }}">XII IPS 5</a></li>
               </ul>
             </div>

             <div class="dropdown d-inline-block">
               <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="bi bi-download"></span> Download Rekap
               </button>
               <ul class="dropdown-menu dropdown-menu-scrollable" style="max-height: 200px; overflow-y: auto;">
                  <!-- Daftar pilihan -->
                  <li><p class="dropdown-item mb-0 fw-bold">Kelas X</p></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'X1']) }}">X1</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'X2']) }}">X2</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'X3']) }}">X3</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'X4']) }}">X4</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'X5']) }}">X5</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'X6']) }}">X6</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'X7']) }}">X7</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'X8']) }}">X8</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'X9']) }}">X9</a></li>
                  <li><p class="dropdown-item mb-0 fw-bold">Kelas XI IPA</p></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XI IPA 1']) }}">XI IPA 1</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XI IPA 2']) }}">XI IPA 2</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XI IPA 3']) }}">XI IPA 3</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XI IPA 4']) }}">XI IPA 4</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XI IPA 5']) }}">XI IPA 5</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XI IPA 6']) }}">XI IPA 6</a></li>
                  <li><p class="dropdown-item mb-0 fw-bold">Kelas XI IPS</p></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XI IPS 1']) }}">XI IPS 1</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XI IPS 2']) }}">XI IPS 2</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XI IPS 3']) }}">XI IPS 3</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XI IPS 4']) }}">XI IPS 4</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XI IPS 5']) }}">XI IPS 5</a></li>
                  <li><p class="dropdown-item mb-0 fw-bold">Kelas XII IPA</p></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XII IPA 1']) }}">XII IPA 1</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XII IPA 2']) }}">XII IPA 2</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XII IPA 3']) }}">XII IPA 3</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XII IPA 4']) }}">XII IPA 4</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XII IPA 5']) }}">XII IPA 5</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XII IPA 6']) }}">XII IPA 6</a></li>
                  <li><p class="dropdown-item mb-0 fw-bold">Kelas XII IPS</p></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XI IPS 1']) }}">XII IPS 1</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XI IPS 2']) }}">XII IPS 2</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XI IPS 3']) }}">XII IPS 3</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XI IPS 4']) }}">XII IPS 4</a></li>
                  <li><a class="dropdown-item" href="{{ route('agendaKelasCetak', ['cetak' => 'XII IPS 5']) }}">XII IPS 5</a></li>
               </ul>
            </div> --}}
            
            {{-- <button id="excel" class="btn btn-primary d-inline-block"><span class="bi bi-download"></span> Download Rekap</button> --}}
            {{-- <button id="excel2" class="btn btn-primary d-inline-block"><span class="bi bi-download"></span> Download Harian</button> --}}
         </div>
      </div>
      {{-- @if(isset($filter))
         <div class="col">
            <h1>Filter Bulan : {{ $filter }}</h1>
         </div>
      @endif
      <form class="mt-4" method="GET" action="">
            <div class="row justify-content-end">
              <div class="col-md-4">
                <div class="input-group">
                  <label class="col-form-label" style="padding-right: 10px;">Search :</label>
                  <input name="nama" type="text" class="form-control" @if(isset($search)) value="{{ $search }}" @endif>
                  <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                </div>
              </div>
            </div>
       </form> --}}
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

{{-- @if(!isset($filter))
<div class="row">
      <div class="card col-md-12 mt-2 pb-4">
         <div class="card-body">
             <h5 class="card-title">Total</h5>
             <div class="table-container border">

             <table>
                <thead>
                   <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">NIS</th>
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
                  @php($user = \App\Models\User::where('id', $item->id_siswa)->get())
                   <tr>
                      <td scope="row" class="text-center">{{ $no++ }}</td>
                      <td class="text-center">{{ $user[0]->nomor }}</td>
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
@endif --}}

{{-- @php($nomer=1) --}}
{{-- @foreach($guru as $items) --}}
<div class="row">
   <div class="card col-md-12 mt-2 pb-4">
      <div class="card-body">
         <div class="row align-items-center">
            <div class="col">
               <h5 class="card-title"></h5>
            </div>
            {{-- <div class="col text-right">
              
            </div> --}}
         </div>
          <div class="table-container border">
          <table>
             <thead>
                <tr>
                 <th scope="col" class="text-center">No</th>
                 <th scope="col" class="text-center">Nama</th>
                 <th scope="col" class="text-center">Jumlah Kehadiran</th>
                </tr>
             </thead>
             
             <tbody>
               
               @php($no=1)
               @if(count($guru) > 0)
               @foreach($guru as $item)               
               {{-- @php($user = \App\Models\User::where('id', $item->id_siswa)->get()) --}}
               @php($absensiGuru = \App\Models\Agenda::where('guru', $item->name)->get())
                <tr>
                   <td scope="row" class="text-center">{{ $no++ }}</td>
                   {{-- <td class="text-center">{{ $user[0]->nomor }}</td> --}}
                   <td class="text-center">{{ $item->name }}</td>
                   <td class="text-center">{{ $item->id }}</td>
                </tr>
                @endforeach
                
                @else
                <tr>
                  <td colspan="6" class="text-center">Tidak ada data</td>
                </tr>
                @endif
             </tbody>
          </table>
         </div>
      </div>
   </div>
</div>
{{-- @endforeach --}}


{{-- table buat di print (rekap) --}}
{{-- <div style="visibility: collapse">
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
         <th scope="col" class="text-center">NIS</th>
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
      @php($user = \App\Models\User::where('id', $item->id_siswa)->get())
         <tr>
            <td scope="row" class="text-center">{{ $no++ }}</td>
            <td class="text-center">{{ $user[0]->nomor }}</td>
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
</div> --}}

{{-- table buat di print (harian) --}}
{{-- @foreach($waktuAbsen as $items)
<div style="visibility: collapse">
   <table id="harian">
      <thead>
      <tr>
         <th class="text-center">{{ date('Y-m-d', strtotime($items->waktu)) }}</th>
      </tr>
      <tr>
         <th class="text-center">Kelas : {{ $info->pelajaran }}</th>
      </tr>
      <tr>
         <th class="text-center">Pengajar : {{ $info->guru }}</th>
      </tr>
      <tr>
      </tr>
      <tr>
         <th scope="col" class="text-center">No</th>
         <th scope="col" class="text-center">NIS</th>
         <th scope="col" class="text-center">Nama</th>
         <th scope="col" class="text-center">Status</th>
      </tr>
      </thead>
      
      <tbody>
      @php($no=1)
      @if(count($siswa) > 0)
      @foreach($siswa as $item)
         @php($waktu = new DateTime($items->waktu))
         @php(
            $absensi = \App\Models\Absensi::where('id_siswa', $item->id_siswa)->where('id_kelas', $id)->whereDate('waktu', $waktu->format('Y-m-d'))->get()
         )
         @php($user = \App\Models\User::where('id', $item->id_siswa)->get())
         @if(count($absensi)>0)
            <tr>
               <td scope="row" class="text-center">{{ $no++ }}</td>
               <td class="text-center">{{ $user[0]->nomor }}</td>
               <td class="text-center">{{ $item->nama }}</td>
               <td class="text-center">{{ $absensi[0]->status }}</td>
            </tr>
         @endif
         @endforeach
         @else
         <tr>
         <td colspan="6" class="text-center">Tidak ada siswa</td>
         </tr>
         @endif
      </tbody>
   </table>
</div>
@endforeach --}}

{{-- <script>
   const pelajaran = "<?php echo $info->pelajaran; ?>";
   const kelas = "<?php echo $info->ruang; ?>";
   const tahunAjaran = "<?php echo $tahunAjaran; ?>";
   const tahunAjaranFormatted = tahunAjaran.replace("/", "-");

   document.getElementById('excel').addEventListener('click',function(){
      var table2excel = new Table2Excel();
      table2excel.export(document.querySelectorAll("#rekap"), `Rekap Absen ${pelajaran} ${kelas} (${tahunAjaranFormatted})`);
   });
</script>
<script>
   const excelButton = document.getElementById(`excel2`);
   const rekapDiv = document.getElementById(`harian`);
 
     excelButton.addEventListener('click', function() {
       var table2excel = new Table2Excel();
       table2excel.export(document.querySelectorAll(`#harian`), `Absen Harian ${pelajaran} ${kelas}`);
     });
 </script> --}}
@endsection