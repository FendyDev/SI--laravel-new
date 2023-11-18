<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the {{ reso }}urce.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title'=>'Data Jadwal',
            'data_jadwal'=> jadwal::all(), 
        );

        return view('components.jadwal.list', $data);
    }

    public function store(Request $request)
    {
        jadwal::create([
            'role' => $request->name,
            'judul'=> $request->judul,
            'tanggal'=> $request->tanggal,
            'jam'=> $request->jam,
        ]);
    }

    public function update(Request $request, $id)
    {
        jadwal::where('id', $id)
        ->where('id', $id)
        ->update([
            'role' => $request->name,
            'judul'=> $request->judul,
            'tanggal'=> $request->tanggal,
            'jam'=> $request->jam,
        ]);

        return redirect('/index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $jadwal = jadwal::where('id', $id)->delete();
        return redirect('/index')->with('success', 'Data berhasil dihapus');
    }
}
