<?php

namespace App\Http\Controllers;

use App\Models\staf;
use App\Models\admin;
use App\Models\Folder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('components.login.index');
    }

    function Auth(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        $data = admin::where($infologin)->first();
        if($data == null){
            $data = staf::where('username', $request->username)->first();
            $level = "staf";
            $username = $data->username;
            $role = $data->role;
            session(['username' => $username]);
            session(['role' => $role]);
            session(['level' => $level]);
            return redirect()->route('/');

        } else if($data != null){
            $level = $data->level;
            $username = $data->username;
            $role = $data->role;
            session(['username' => $username]);
            session(['role' => $role]);
            session(['level' => $level]);
            return redirect()->route('/');
        }
    }
    function logout(){
        session()->flush();
        return redirect('/');
    }

    public function tambahstaf()
    {
        return view('components.akun.tambah_staf');
    }

    function create(Request $request)
    {
        // $request->validate([
        //     'username' => 'required|min:3',
        //     'nama_lengkap' => 'required',
        //     'password' => 'required|min:8',
        // ], [
        //     'username.required' => 'Username Wajib Di isi',
        //     'username.min' => 'Bidang username minimal harus 3 karakter.',
        //     'nama_lengkap.required' => 'nama lengkap Wajib Di isi',
        //     'password.required' => 'Password Wajib Di isi',
        //     'password.min' => 'Password min 8 Digit',
        // ]);

        staf::create([
            'username' => $request['username'],
            'nama_lengkap' => $request['nama_lengkap'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
            'level' => 'staf',
        ]);

        return redirect('/tambahStaf');

    }
    public function createFolder(Request $request)
    {
        Folder::create([
            'nama_folder' => $request['nama_folder'],
            'role'  => $request['role']
        ]);

        return view('content.Admin.index');
    }
    function listStaf() {
        $data = staf::all();
        return view('content.Admin.tableStaf', ['data' => $data]);
    }



    public function editStaf($id) {
        $data = staf::find($id);
        return view('content.Admin.editStaf', [
            'data' => $data
        ]);
    }

    function updateStaf(Request $request, $id) {
        $data = staf::find($id);
        $data->update($request->all());

        return redirect('/tambahStaf');
    }

    function deleteStaf($id) {
        $data = staf::find($id);
        $data->delete();

        return redirect('/tambahStaf');
    }
}
