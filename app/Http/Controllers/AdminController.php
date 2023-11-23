<?php

namespace App\Http\Controllers;

use App\Models\staf;
use App\Models\admin;
use App\Models\Folder;
use App\Models\file;
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

    //CRUD Staff SuperAdmin and Admin
    public function create(Request $request)
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

        $cek = Auth::guard('web')->user()->level;

        if($cek == 'SuperAdmin') {
            staf::create([
                'username' => $request['username'],
                'nama_lengkap' => $request['nama_lengkap'],
                'password' => bcrypt($request['password']),
                'role' => $request['role'],
                'level' => 'Staff',
            ]);
            
        }
        if($cek == 'Admin') {
            $adminRole = Auth::user()->role;
    
            staf::create([
                'username' => $request['username'],
                'nama_lengkap' => $request['nama_lengkap'],
                'password' => bcrypt($request['password']),
                'role' => $adminRole,
                'level' => 'Staff',
            ]);
            
        }

        return redirect('/tambahStaf')->with('status', 'Berhasil Menambahkan Akun');
    }

    public function listStaf()
    {
        if(Auth::guard('web')->check() || Auth::guard('staf')->check())
        {
            if(Auth::guard('web')->user()->level == 'SuperAdmin') {
                $data = staf::all();
    
                return view('content.SuperAdmin.tableStaff', ['data' => $data]);
            }
            else if(Auth::guard('web')->user()->level == 'Admin') {
                $role = Auth::guard('web')->user()->role;
                $data = staf::where('role', $role)->get();
        
                return view('content.Admin.tableStaf', ['data' => $data]);
            }
        }
        else{
            return redirect('/');
        }
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

    //endStaff

    //CRUD Folder
    public function createFolder(Request $request)
    {
        $stafRole = Auth::user()->role;

        Folder::create([
            'nama_folder' => $request['nama_folder'],
            'role'  => $stafRole,
        ]);
        return redirect()->route('/');
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
        $folder->update($request->all());{{  }}

        return redirect('/');
    }

    public function deleteFolder($id)
    {
        $folder = Folder::findOrFail($id);
        $folder->delete();

        return redirect('/');
    }

    public function inFolder($id)
    {
        $folder = file::where('id_folder', $id)->where('role', Auth::guard('web')->user()->role ?? Auth::guard('staf')->user()->role)->get();
        return view('content.Admin.folder',[
            'folder' => $folder,
            'id_folder' => $id,
        ]);
    }
}
