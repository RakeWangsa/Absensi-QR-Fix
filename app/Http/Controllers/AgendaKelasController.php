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
        return view('admin.agendaKelas', [
            'title' => 'Agenda Kelas',
            'active' => 'agenda kelas',
            'agenda' => $agenda,
            'tanggal' => $tanggal,
            'kelas' => $kelas,
        ]);
    }

    public function buatAgendaKelas()
    {
        $hariIni = Carbon::now()->addHours(7)->toDateString();
        $guru = DB::table('Users')
        ->where('role','guru')
        ->select('*')
        ->get();
        return view('guru.buatAgendaKelas', [
            'title' => 'Buat Agenda Kelas',
            'active' => 'agenda kelas',
            'hariIni' => $hariIni,
            'guru' => $guru
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
        Agenda::insert([
                'tanggal' => $request->tgl,
                'kelas' => $request->kelas,
                'guru' => $request->guru,
                'jam' => $request->jam,
                'pelajaran' => $request->pelajaran,
                'bahasan' => $request->bahasan,
                'kehadiran' => $request->kehadiran,
            ]);

        return redirect('/home/guru')->with('success');
    }
}
