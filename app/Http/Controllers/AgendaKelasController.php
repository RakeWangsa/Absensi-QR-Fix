<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Absensi;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;

class AgendaKelasController extends Controller
{
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
}
