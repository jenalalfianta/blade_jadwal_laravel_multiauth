<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{

    public function index(Request $request)
    {
        $filter = $request->query('filter');

        if(!empty($filter)){
            $ruangs = Ruang::sortable()->where('ruangs.nama_ruang', 'like', '%'.$filter.'%')->orderBy('id','DESC')->paginate(5);
        }else{
            $filter = null;
            $ruangs = Ruang::sortable()->orderBy('id','DESC')->paginate(5);
        }

        return view('admin.ruang.index', compact('filter', 'ruangs'));
    }

    public function create()
    {
        return view('admin.ruang.create');
    }

    public function store(Request $request)
    {
        $request->validateWithBag('create',
        [
            'kode_ruang'        => 'required|unique:ruangs',
            'nama_ruang'        => 'required',
            'lantai_ruang'      => 'required',
            'kapasitas'         => 'required|integer',
        ]);

        Ruang::create([
            'kode_ruang'        => ucfirst($request->kode_ruang),
            'nama_ruang'        => ucfirst($request->nama_ruang),
            'lantai_ruang'      => ucfirst($request->lantai_ruang),
            'kapasitas'         => $request->kapasitas,

        ]);
        
        return redirect('admin/ruang')->with('message','Ruang Berhasil Ditambahkan :)');

    }
    
    public function edit(Ruang $ruang)
    {
        return view('admin.ruang.edit', ['ruang' => $ruang]);
    }

    public function update(Request $request, Ruang $ruang)
    {
        $request->validateWithBag('update',
        [
            'nama_ruang'        => 'required',
            'lantai_ruang'      => 'required',
            'kapasitas'         => 'required|integer',
        ]);

        $ruang->update([
            'nama_ruang'        => $request->nama_ruang,
            'lantai_ruang'      => $request->lantai_ruang,
            'kapasitas'         => $request->kapasitas,
        ]);

        return redirect('admin/ruang')->with('message','Ruang Berhasil Diperbaharui :)');
        
    }
    
    public function destroy(Ruang $ruang)
    {
        Ruang::find($ruang->id)->delete();
        return redirect('admin/ruang')->with('message','Ruang Berhasil Dihapus :)');
    }
}
