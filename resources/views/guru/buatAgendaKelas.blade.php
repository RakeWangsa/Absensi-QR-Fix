@extends('layouts.main')

@section('container')
    <div class="pagetitle mt-3">
        <h1>Buat Agenda Kelas</h1>
    </div>
    <section class="section dashboard">
        <div class="row">
            <div class="card col-md-12">
                <div class="card-body">
                    <div class="mt-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <form class="row g-3 mt-3" method="GET" action="{{route('submitAgendaKelas')}}">
                        <div class="col-md-12"> <label for="tgl" class="form-label">Tanggal :</label> <input type="text" class="form-control" id="tgl" name="tgl" value="{{ $hariIni }}" readonly></div>
                        <div class="col-md-12"> <label for="jam" class="form-label">Jam Ke- :</label> <input type="text" class="form-control" id="jam" name="jam" value="{{ old('jam') }}" required></div>
                        <div class="col-md-12"> <label for="tahun_ajaran" class="form-label">Tahun Ajaran :</label> <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="{{ $tahunAjaran }}" readonly></div>
                        <div class="col-md-12">
                            <label for="kelas" class="form-label">Kelas :</label> 
                            <select id="kelas" class="form-select" name="kelas">
                                <option>Pilih Kelas!</option>
                                
                                <!-- Grup Kelas X -->
                                <optgroup label="Kelas X">
                                    <option value="X1">X1</option>
                                    <option value="X2">X2</option>
                                    <option value="X3">X3</option>
                                    <option value="X4">X4</option>
                                    <option value="X5">X5</option>
                                    <option value="X6">X6</option>
                                    <option value="X7">X7</option>
                                    <option value="X8">X8</option>
                                    <option value="X9">X9</option>
                                </optgroup>
                        
                                <!-- Grup Kelas XI IPA -->
                                <optgroup label="Kelas XI IPA">
                                    <option value="XI IPA 1">XI IPA 1</option>
                                    <option value="XI IPA 2">XI IPA 2</option>
                                    <option value="XI IPA 3">XI IPA 3</option>
                                    <option value="XI IPA 4">XI IPA 4</option>
                                    <option value="XI IPA 5">XI IPA 5</option>
                                    <option value="XI IPA 6">XI IPA 6</option>
                                </optgroup>
                        
                                <!-- Grup Kelas XI IPS -->
                                <optgroup label="Kelas XI IPS">
                                    <option value="XI IPS 1">XI IPS 1</option>
                                    <option value="XI IPS 2">XI IPS 2</option>
                                    <option value="XI IPS 3">XI IPS 3</option>
                                    <option value="XI IPS 4">XI IPS 4</option>
                                    <option value="XI IPS 5">XI IPS 5</option>
                                </optgroup>
                        
                                <!-- Grup Kelas XII IPA -->
                                <optgroup label="Kelas XII IPA">
                                    <option value="XII IPA 1">XII IPA 1</option>
                                    <option value="XII IPA 2">XII IPA 2</option>
                                    <option value="XII IPA 3">XII IPA 3</option>
                                    <option value="XII IPA 4">XII IPA 4</option>
                                    <option value="XII IPA 5">XII IPA 5</option>
                                    <option value="XII IPA 6">XII IPA 6</option>
                                </optgroup>
                        
                                <!-- Grup Kelas XII IPS -->
                                <optgroup label="Kelas XII IPS">
                                    <option value="XII IPS 1">XII IPS 1</option>
                                    <option value="XII IPS 2">XII IPS 2</option>
                                    <option value="XII IPS 3">XII IPS 3</option>
                                    <option value="XII IPS 4">XII IPS 4</option>
                                    <option value="XII IPS 5">XII IPS 5</option>
                                </optgroup>
                        
                            </select>
                        </div>                        
                        
                        <div class="col-md-12">
                            <label for="guru" class="form-label">Nama Guru :</label> 
                            <select id="guru" class="form-select" name="guru">
                                <option>Pilih Guru!</option>
                                @foreach($guru as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        {{-- <div class="col-md-12"> <label for="pelajaran" class="form-label">Mata Pelajaran :</label> <input type="text" class="form-control" id="pelajaran" name="pelajaran" value="{{ old('pelajaran') }}" required></div> --}}
                        <div class="col-md-12">
                            <label for="pelajaran" class="form-label">Mata Pelajaran :</label> 
                            <select id="pelajaran" class="form-select" name="pelajaran">
                                <option>Pilih Pelajaran!</option>
                                <option value="Kimia">Kimia</option>
                                <option value="Ekonomi">Ekonomi</option>
                                <option value="Fisika">Fisika</option>
                                <option value="Sejarah Indonesia">Sejarah Indonesia</option>
                                <option value="Biologi">Biologi</option>
                                <option value="Pendidikan Agama Islam">Pendidikan Agama Islam</option>
                                <option value="Bahasa Inggris">Bahasa Inggris</option>
                                <option value="Matematika">Matematika</option>
                                <option value="Sejarah Peminatan">Sejarah Peminatan</option>
                                <option value="Pendidikan Pancasila dan Kewarganegaraan">Pendidikan Pancasila dan Kewarganegaraan</option>
                                <option value="Sosiologi">Sosiologi</option>
                                <option value="Geografi">Geografi</option>
                                <option value="Bahasa Jepang">Bahasa Jepang</option>
                                <option value="Bahasa Arab">Bahasa Arab</option>
                                <option value="Prakarya dan Kewirausahaan">Prakarya dan Kewirausahaan</option>
                                <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                                <option value="PJOK">PJOK</option>
                                <option value="Sejarah">Sejarah</option>
                                <option value="Seni Budaya dan Keterampilan">Seni Budaya dan Keterampilan</option>
                                <option value="PKWU">PKWU</option>
                                <option value="Pendidikan Agama Kristen">Pendidikan Agama Kristen</option>
                                <option value="Biologi Lintas Minat">Biologi Lintas Minat</option>
                                <option value="Geografi Lintas Minat">Geografi Lintas Minat</option>
                                <option value="Matematika Peminatan">Matematika Peminatan</option>
                                <option value="Informatika">Informatika</option>
                            </select>
                        </div>
                        <div class="col-md-12"> <label for="bahasan" class="form-label">Pokok Bahasan :</label> <input type="text" class="form-control" id="bahasan" name="bahasan" value="{{ old('bahasan') }}" required></div>
                        <div class="col-md-12"> <label for="tugas" class="form-label">Tugas/Pengayaan :</label> <input type="text" class="form-control" id="tugas" name="tugas" value="{{ old('tugas') }}" required></div>
                        <div class="col-md-12"> <label for="kehadiran" class="form-label">Kehadiran :</label> <input class="form-check-input" style="margin-right:5px" type="checkbox" value="hadir" name="kehadiran" id="kehadiran"><label>Hadir</label></div>
                        <div class="text-center mb-5 mt-4"> <button type="submit" class="btn btn-primary">Submit</button> <button type="reset" class="btn btn-secondary">Reset</button></div>
                    </form>
                </div>
            </div> 
        </div>
    </section>
@endsection