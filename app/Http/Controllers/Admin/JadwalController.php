<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Ruang;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JadwalController extends Controller
{

    public function index()
    {
        $datas      = [];
        $ruangs     = Ruang::all();
        $today      = Carbon::now()->toDateString();
        // $jadwals    = Jadwal::with(['user','ruang'])->where('start', '>=', $today)->get();
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

        return view('admin.jadwal.index', compact('datas', 'ruangs'));

    }

    public function store(Request $request)
    {

        $today = Carbon::now()->toDateString();

        $request->validateWithBag('create',
        [
            'title'         => 'required',
            'ruang'         => 'required',
            'startDate'     => 'required|after_or_equal:'.$today,
            'startTime'     => 'required|date_format:H:i',
            'endTime'       => 'required|date_format:H:i|after:startTime',
        ]);

        $start  = $request->startDate.' '.$request->startTime.':00';
        $finish = $request->startDate.' '.$request->endTime.':00';

        Jadwal::create([
            'user_id'       => $request->user,
            'ruang_id'      => $request->ruang,
            'title'         => $request->title,
            'start'         => $start,
            'finish'        => $finish,
            'keterangan'    => $request->keterangan,
        ]);
        
        return redirect('admin/jadwal')->with('message','Jadwal Berhasil Ditambahkan :)');

    }

    public function update(Request $request, Jadwal $jadwal)
    {

        $today = Carbon::now()->toDateString();

        $request->validateWithBag('update',
        [
            'titleEdit'         => 'required',
            'ruangEdit'         => 'required',
            'startDateEdit'     => 'required|after_or_equal:'.$today,
            'startTimeEdit'     => 'required|date_format:H:i',
            'endTimeEdit'       => 'required|date_format:H:i|after:startTime',
        ]);

        $start  = $request->startDateEdit.' '.$request->startTimeEdit.':00';
        $finish = $request->startDateEdit.' '.$request->endTimeEdit.':00';

        $jadwal->update([
            'ruang_id'      => $request->ruangEdit,
            'title'         => $request->titleEdit,
            'start'         => $start,
            'finish'        => $finish,
            'keterangan'    => $request->keteranganEdit,
        ]);

        return redirect('admin/jadwal')->with('message','Jadwal Berhasil Diperbaharui :)');
    }

    public function destroy(Jadwal $jadwal)
    {
        Jadwal::find($jadwal->id)->delete();
        return redirect('admin/jadwal')->with('message','Jadwal Berhasil Dihapus :)');
    }
}
