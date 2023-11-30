<?php

namespace App\Http\Controllers;

use App\Models\staf;
use App\Models\admin;
use App\Models\Folder;
use App\Models\file;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        ]);

        admin::create([
            'username' => $request['username'],
            'nama_lengkap' => $request['nama_lengkap'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
            'level' => 'admin',
            'image' => $request['image'],
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambahkan Akun');
    }

    public function lihat()
    {
        $admin = admin::where('level', 2)->get();
        return view('content.SuperAdmin.tableAdmin', ['admin' => $admin]);
    }

    public function edit($id)
    {
        $admin = admin::findOrFail($id);
        return view('content.SuperAdmin.tableAdmin', [
            'admin' => $admin,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|min:3',
            'nama_lengkap' => 'required',
        ]);
        $admin = admin::findOrFail($id);
        $admin->update($request->only(['username', 'nama_lengkap', 'role', 'level']));
        $admin->save();

        return redirect()->back()->with('success', 'Berhasil Mengedit Akun');
    }

    public function destroy($id)
    {
        $admin = admin::findOrFail($id);
        $admin->delete();
        return redirect()->back()->with('delete', 'Berhasil Menghapus Akun');
    }

    public function folders($role)
    {
        $data = Folder::where('role', decrypt($role))->get();
        return view('content.SuperAdmin.folder', [
            'data' => $data,
            'role' => decrypt($role),
        ]);
    }

    public function open($id, $role)
    {   
        $file = file::where('id_folder', $id)->where('role', $role)->get();
        return view('content.SuperAdmin.files', [
            'folder' => $file,
            'id_folder' => $id,
            'role'=> $role
        ]);
    }

    public function createFolder(Request $request)
    {
        $stafRole =  $request['role'];
        Folder::create([
            'nama_folder' => $request['nama_folder'],
            'role'  => $stafRole,
        ]);
        return redirect()->back()->with('status', 'Berhasil Menambahkan Folder');
    }
}
{{  }}