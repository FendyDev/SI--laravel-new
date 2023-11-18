<?php

namespace App\Http\Controllers;

use App\Models\meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data Meeting',
            'data_meeting' => meeting::all(),
        );

        return view('components.meeting.list', $data);
    }

    public function store(Request $request)
    {
        meeting::create([
            'role' => $request->role,
            'nama_lengkap' => $request->nama_lengkap,
            'tanggal' => $request->tanggal,
            'artikel' => $request->artikel,
        ]);
    }

    public function update(Request $request, $id)
    {
        meeting::where('id', $id)
            ->where('id', $id)
            ->update([
                'role' => $request->role,
                'nama_lengkap' => $request->nama_lengkap,
                'tanggal' => $request->tanggal,
                'artikel' => $request->artikel,
            ]);

        return redirect('/index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $meeting = meeting::where('id', $id)->delete();
        return redirect('/index')->with('success', 'Data berhasil dihapus');
    }
}
