<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Absensi;
use App\Models\Agenda;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;

class AgendaKelasController extends Controller
{

    public function agendaKelas()
    {
        $skrg = Carbon::now()->addHours(7);
        $tahun = $skrg->year;
        $bulan = $skrg->month;
        $tahunSelanjutnya = Carbon::now()->addHours(7)->addYears(1)->year;
        $tahunSebelumnya = Carbon::now()->addHours(7)->subYears(1)->year;
        if($bulan>6){
            $tahunAjaran=$tahun."/".$tahunSelanjutnya;
        }else{
            $tahunAjaran=$tahunSebelumnya."/".$tahun;
        }
        $tanggal = DB::table('agenda')
        ->where('tahun_ajaran',$tahunAjaran)
        ->select('tanggal')
        ->distinct()
        ->get();
        $kelas = DB::table('agenda')
        ->select('kelas')
        ->distinct()
        ->get();
        $agenda = DB::table('agenda')
        ->where('tahun_ajaran',$tahunAjaran)
        ->select('*')
        ->get();
        
        return view('admin.agendaKelas', [
            'title' => 'Agenda Kelas',
            'active' => 'agenda kelas',
            'agenda' => $agenda,
            'tanggal' => $tanggal,
            'kelas' => $kelas,
            'tahunAjaran' => $tahunAjaran,
        ]);
    }

    public function agendaKelasSearch($search)
    {
        $skrg = Carbon::now()->addHours(7);
        $tahun = $skrg->year;
        $bulan = $skrg->month;
        $tahunSelanjutnya = Carbon::now()->addHours(7)->addYears(1)->year;
        $tahunSebelumnya = Carbon::now()->addHours(7)->subYears(1)->year;
        if($bulan>6){
            $tahunAjaran=$tahun."/".$tahunSelanjutnya;
        }else{
            $tahunAjaran=$tahunSebelumnya."/".$tahun;
        }
        $tanggal = DB::table('agenda')
        ->where('tahun_ajaran',$tahunAjaran)
        ->select('tanggal')
        ->distinct()
        ->get();
        $kelas = DB::table('agenda')
        ->select('kelas')
        ->where('kelas',$search)
        ->distinct()
        ->get();
        $agenda = DB::table('agenda')
        ->where('tahun_ajaran',$tahunAjaran)
        ->select('*')
        ->get();
        return view('admin.agendaKelas', [
            'title' => 'Agenda Kelas',
            'active' => 'agenda kelas',
            'agenda' => $agenda,
            'tanggal' => $tanggal,
            'kelas' => $kelas,
            'tahunAjaran' => $tahunAjaran,
        ]);
    }

    public function agendaKelasCetak($cetak)
    {
        $skrg = Carbon::now()->addHours(7);
        $tahun = $skrg->year;
        $bulan = $skrg->month;
        $tahunSelanjutnya = Carbon::now()->addHours(7)->addYears(1)->year;
        $tahunSebelumnya = Carbon::now()->addHours(7)->subYears(1)->year;
        if($bulan>6){
            $tahunAjaran=$tahun."/".$tahunSelanjutnya;
        }else{
            $tahunAjaran=$tahunSebelumnya."/".$tahun;
        }
        $tanggal = DB::table('agenda')
        ->where('tahun_ajaran',$tahunAjaran)
        ->select('tanggal')
        ->distinct()
        ->get();
        $kelas = DB::table('agenda')
        ->where('kelas',$cetak)
        ->select('kelas')
        ->distinct()
        ->get();
        $agenda = DB::table('agenda')
        ->where('tahun_ajaran',$tahunAjaran)
        ->select('*')
        ->get();
        return view('admin.agendaKelasCetak', [
            'title' => 'Agenda Kelas',
            'active' => 'agenda kelas',
            'agenda' => $agenda,
            'tanggal' => $tanggal,
            'kelas' => $kelas,
            'cetak' => $cetak,
            'tahunAjaran' => $tahunAjaran,
        ]);
    }

    public function buatAgendaKelas()
    {
        $hariIni = Carbon::now()->addHours(7)->toDateString();
        $guru = DB::table('Users')
        ->where('role','guru')
        ->select('*')
        ->get();
        $skrg = Carbon::now()->addHours(7);
        $tahun = $skrg->year;
        $bulan = $skrg->month;
        $tahunSelanjutnya = Carbon::now()->addHours(7)->addYears(1)->year;
        $tahunSebelumnya = Carbon::now()->addHours(7)->subYears(1)->year;
        if($bulan>6){
            $tahunAjaran=$tahun."/".$tahunSelanjutnya;
        }else{
            $tahunAjaran=$tahunSebelumnya."/".$tahun;
        }
        return view('guru.buatAgendaKelas', [
            'title' => 'Buat Agenda Kelas',
            'active' => 'agenda kelas',
            'hariIni' => $hariIni,
            'guru' => $guru,
            'tahunAjaran' => $tahunAjaran,
        ]);
    }

    public function submitAgendaKelas(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi ',
            'kelas.required' => 'Pilih Kelas!',
            'kelas.not_in' => 'Pilih Kelas!',
            'guru.required' => 'Pilih Guru!',
            'guru.not_in' => 'Pilih Guru!',
        ];

        $this->validate($request, [
            'guru' => ['required', Rule::notIn(['Pilih Guru!'])],
            'kelas' => ['required', Rule::notIn(['Pilih Kelas!'])],
        ], $messages);

        // dd($request->tgl,$request->kelas,$request->guru,$request->jam,$request->pelajaran,$request->bahasan,$request->kehadiran);
        if($request->kehadiran=="hadir"){
            $kehadiran="hadir";
        }else{
            $kehadiran="tidak hadir";
        }
        Agenda::insert([
                'tanggal' => $request->tgl,
                'tahun_ajaran' => $request->tahun_ajaran,
                'kelas' => $request->kelas,
                'guru' => $request->guru,
                'jam' => $request->jam,
                'pelajaran' => $request->pelajaran,
                'bahasan' => $request->bahasan,
                'kehadiran' => $kehadiran,
            ]);

        return redirect('/home/guru')->with('success');
    }

    public function absensiGuru()
    {
        $guru = DB::table('Users')
        ->where('role','guru')
        ->select('*')
        ->get();

        $tanggal = DB::table('agenda')
        ->select('tanggal')
        ->distinct()
        ->get();
        $kelas = DB::table('agenda')
        ->select('kelas')
        ->distinct()
        ->get();
        $agenda = DB::table('agenda')
        ->select('*')
        ->get();
        return view('admin.absensiGuru', [
            'title' => 'Absensi Guru',
            'active' => 'absensi guru',
            'agenda' => $agenda,
            'tanggal' => $tanggal,
            'kelas' => $kelas,
            'guru' => $guru,
        ]);
    }
}
