<?php

namespace App\Http\Controllers;

use App\Models\staf;
use App\Models\admin;
use App\Models\Folder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
    //Login
    public function login()
    {
        return view('components.login.index');
    }


    function logout()
    {
        if (Auth::guard('staf')->check()) {
            Auth::guard('staf')->logout();
            return redirect('/login');
        } elseif (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
            return redirect('/login');
        }
    }
    //endlogin

    //AddStaff
    public function tambahstaf()
    {
        return view('components.akun.tambah_staf');
    }

    public function create(Request $request)
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

        $adminRole = Auth::user()->role;

        staf::create([
            'username' => $request['username'],
            'nama_lengkap' => $request['nama_lengkap'],
            'password' => bcrypt($request['password']),
            'role' => $adminRole,
            'level' => 'Staff',
        ]);

        return redirect('/tambahStaf')->with('status', 'Berhasil Menambahkan Akun');
    }
    public function listStaf()
    {
        // if ($role) {
        //     $data = staf::where('role', $role)->get();
        // } else {
        //     $data = staf::all();
        // }

        $role = Auth::guard('web')->user()->role;
        $data = staf::where('role', $role)->get();

        // $data = staf::where('role', $role)->get();
        // if ($data = $role) {
            
        // }
        return view('content.Admin.tableStaf', ['data' => $data]);
    }

    public function editStaf($id)
    {
        $data = staf::find($id);
        return view('content.Admin.tableStaf', [
            'data' => $data
        ]);
    }

    public function updateStaf(Request $request, $id)
    {
        $data = staf::find($id);
        $data->update($request->only(['username', 'nama_lengkap', 'role', 'level']));

        return redirect('/tambahStaf')->with('status', 'Berhasil Mengedit Akun');
    }

    public function deleteStaf($id)
    {
        $data = staf::findOrFail($id);
        $data->delete();

        return redirect('/tambahStaf')->with('delete', 'Berhasil Menghapus Akun');
    }

    //endAddStaff

    //AddFolder
    public function createFolder(Request $request)
    {
        $stafRole = Auth::user()->role;

        Folder::create([
            'nama_folder' => $request['nama_folder'],
            'role'  => $stafRole,
        ]);
        $data_folder = Folder::all();

        return view('content.Admin.index', [
            'folder' => $data_folder
        ]);
    }



    public function editFolder($id)
    {
        $folder = Folder::find($id);
        return view('content.Admin.index', [
            'folder' => $folder
        ]);
    }

    public function updateFolder(Request $request, $id)
    {
        $folder = Folder::find($id);
        $folder->update($request->all());

        return redirect('/');
    }

    public function deleteFolder($id)
    {
        $folder = Folder::findOrFail($id);
        $folder->delete();

        return redirect('/');
    }

    public function inFolder()
    {
        // $folder = Folder::find($id);
        return view('content.Admin.folder',[
        ]);
    }
}
