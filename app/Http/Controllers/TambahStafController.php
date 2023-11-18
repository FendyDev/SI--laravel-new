<?php

namespace App\Http\Controllers;

use App\Models\staf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;


class StafController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title'=>'Data Jadwal',
            'data_jadwal'=> staf::all(), 
        );

        return view('components.akun.staf', $data);
    }


    function create(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3',
            'nama_lengkap' => 'required',
            'password' => 'required|min:8',
        ], [
            'username.required' => 'Username Wajib Di isi',
            'username.min' => 'Bidang username minimal harus 3 karakter.',
            'nama_lengkap.required' => 'nama lengkap Wajib Di isi',
            'password.required' => 'Password Wajib Di isi',
            'password.min' => 'Password min 8 Digit',
        ]);

        staf::insert([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        session::flash('success', 'Data berhasil ditambahkan');

        return redirect('/tambahStaf')->with('success', 'Berhasil Menambahkan Data');
    }

    public function update(Request $request, $id)
    {
        staf::where('id', $id)
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
        $staf = staf::where('id', $id)->delete();
        return redirect('/index')->with('success', 'Data berhasil dihapus');
    } 


}