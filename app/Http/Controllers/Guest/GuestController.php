<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Carbon\Carbon;

class GuestController extends Controller
{
    public function index()
    {
        $datas      = [];
        $today      = Carbon::now()->toDateString();
        $jadwals    = Jadwal::with(['user','ruang'])->get();

        foreach ($jadwals as $jadwal){
            $datas[] = [
                'id'         => $jadwal->id,
                'kegiatan'   => $jadwal->title,
                'title'      => $jadwal->ruang->nama_ruang,
                'id_ruang'   => $jadwal->ruang->id,
                'start'      => $jadwal->start,
                'end'        => $jadwal->finish,
                'keterangan' => $jadwal->keterangan,
                'create_by'  => $jadwal->user->name,
            ];
        }

        return view('guest.index', compact('datas'));
    }
}
