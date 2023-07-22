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
                    <form class="row g-3 mt-3" method="GET" action="">
                        <div class="col-md-12"> <label for="tgl" class="form-label">Tanggal :</label> <input type="text" class="form-control" id="tgl" name="tgl" value="{{ $hariIni }}" readonly></div>
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
                            <label for="guru" class="form-label">Guru :</label> 
                            <select id="guru" class="form-select" name="guru">
                                <option>Pilih Guru!</option>
                                @foreach($guru as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12"> <label for="jam" class="form-label">Jam :</label> <input type="text" class="form-control" id="jam" name="jam" value="{{ old('jam') }}"></div>
                        <div class="col-md-12"> <label for="pelajaran" class="form-label">Mata Pelajaran :</label> <input type="text" class="form-control" id="pelajaran" name="pelajaran" value="{{ old('pelajaran') }}"></div>
                        <div class="col-md-12"> <label for="bahasan" class="form-label">Pokok Bahasan :</label> <input type="text" class="form-control" id="bahasan" name="bahasan" value="{{ old('bahasan') }}"></div>
                        <div class="col-md-12"> <label for="kehadiran" class="form-label">Kehadiran :</label> <input class="form-check-input" style="margin-right:5px" type="checkbox" value="" name="kehadiran" id="kehadiran"><label>Hadir</label></div>
                        <div class="text-center mb-5 mt-4"> <button type="submit" class="btn btn-primary">Submit</button> <button type="reset" class="btn btn-secondary">Reset</button></div>
                    </form>
                </div>
            </div> 
        </div>
    </section>
@endsection