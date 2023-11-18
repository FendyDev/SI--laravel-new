<?php

namespace App\Http\Controllers;

use App\Models\staf;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('content.SuperAdmin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.SuperAdmin.tableAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        admin::create([
            'username' => $request['username'],
            'nama_lengkap' => $request['nama_lengkap'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
            'level' => 'admin',
        ]);

        return redirect()->route('lihat')->with('success', 'Berhasil Menambahkan Data');
    }

    public function lihat()
    {
        $admin = admin::where('level', 2)->get();
        return view('content.SuperAdmin.tableAdmin', ['admin' => $admin]);
    }

    public function edit($id)
    {
        $admin = admin::findOrFail($id);
        // dd($admin);
        return view('content.SuperAdmin.tableAdmin', [
            'admin' => $admin,
        ]);
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'username' => 'required|min:3',
        //     'nama_lengkap' => 'required',
        // ], [
        //     'username.required' => 'Username Wajib Di isi',
        //     'username.min' => 'Bidang username minimal harus 3 karakter.',
        //     'nama_lengkap.required' => 'nama lengkap Wajib Di isi',
        // ]);
        $admin = admin::findOrFail($id);
        $admin->update($request->only(['username', 'nama_lengkap', 'role', 'level']));
        $admin->save();

        return redirect()->route('lihat')->with('success', 'Berhasil Mengedit Data');
    }

    public function destroy($id)
    {
        $admin = admin::findOrFail($id);
        $admin->delete();
        return redirect()->route('lihat')->with('success', 'Berhasil Menghapus Data');
    }
}
