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
        ]);

        $cek = Auth::guard('web')->user()->level;

        if ($cek == 'SuperAdmin') {
            staf::create([
                'username' => $request['username'],
                'nama_lengkap' => $request['nama_lengkap'],
                'password' => bcrypt($request['password']),
                'role' => $request['role'],
                'level' => 'Staff',
                'image' => $request['image'],
            ]);
        }
        if ($cek == 'Admin') {
            $adminRole = Auth::user()->role;

            staf::create([
                'username' => $request['username'],
                'nama_lengkap' => $request['nama_lengkap'],
                'password' => bcrypt($request['password']),
                'role' => $adminRole,
                'level' => 'Staff',
                'image' => $request['image'],
            ]);
        }

        return redirect()->route('listStaf')->with('status', 'Berhasil Menambahkan Akun');
    }

    public function listStaf()
    {
        if (Auth::guard('web')->check() || Auth::guard('staf')->check()) {
            if (Auth::guard('web')->user()->level == 'SuperAdmin') {
                $data = staf::all();

                return view('content.SuperAdmin.tableStaff', ['data' => $data]);
            } else if (Auth::guard('web')->user()->level == 'Admin') {
                $role = Auth::guard('web')->user()->role;
                $data = staf::where('role', $role)->get();

                return view('content.Admin.tableStaf', ['data' => $data]);
            }
        } else {
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

        return redirect()->route('listStaf')->with('status', 'Berhasil Mengubah Akun');
    }

    public function deleteStaf($id)
    {
        $data = staf::findOrFail($id);
        $data->delete();

        return redirect()->route('listStaf')->with('delete', 'Berhasil Menghapus Akun');
    }

    //endStaff

    //CRUD Folder
    public function showFolder()
    {
        $role = Auth::guard('web')->user()->role;
        $data = Folder::where('role', $role)->get();
        return view('content.Admin.folder', [
            'folder' => $data,
        ]);

        // if (Auth::guard('web')->user()->level == 'SuperAdmin' ?? 'Staff' ) {
        // }
        // else if (Auth::guard('staf')->user()->level == 'Staff') {
        //     $role = Auth::guard('staf')->user()->role;
        //     $data = Folder::where('role', $role)->get();
        //     return view('content.staff.folder', [
        //         'folder' => $data,
        //     ]);
        // }
    }

    public function lihatFolder()
    {
        $role = Auth::guard('staf')->user()->role;
        $data = Folder::where('role', $role)->get();
        return view('content.staff.folder', [
            'folder' => $data,
        ]);
    }

    public function createFolder(Request $request)
    {
        if (Auth::guard('web')->user()->level == 'SuperAdmin') {
            $stafRole =  $request['role'];
            Folder::create([
                'nama_folder' => $request['nama_folder'],
                'role'  => $stafRole,
            ]);
            return redirect()->back()->with('status', 'Berhasil Menambahkan Folder');
        } else if (Auth::guard('web')->user()->level == 'Admin') {

            $stafRole = Auth::user()->role;

            Folder::create([
                'nama_folder' => $request['nama_folder'],
                'role'  => $stafRole,
            ]);
            return redirect()->back()->with('status', 'Berhasil Menambahkan Folder');
        }
    }



    public function editFolder($id)
    {
        $folder = Folder::find($id);
        return view('content.Admin.folder', [
            'folder' => $folder
        ]);
    }

    public function updateFolder(Request $request, $id)
    {
        $folder = Folder::find($id);
        $folder->update($request->all()); { {
            }
        }

        return redirect()->back()->with('status', 'Berhasil Mengubah Folder');
    }

    public function deleteFolder($id)
    {
        $folder = Folder::findOrFail($id);
        $folder->delete();

        return redirect()->back()->with('delete', 'Berhasil Menghapus Folder');
    }

        public function inFolder($id)
    {
        $folder = Folder::where('id', decrypt($id))->where('role', Auth::guard('web')->user()->role ?? Auth::guard('staf')->user()->role)->get();
        if ($folder->isEmpty()) {
            return redirect()->back();
        } else {
            $file = file::where('id_folder', decrypt($id))->where('role', Auth::guard('web')->user()->role ?? Auth::guard('staf')->user()->role)->get();
            return view('content.Admin.file', [
                'folder' => $file,
                'id_folder' => $id,
            ]);
        }
    }

    public function inFolderS($id)
    {
        $folder = Folder::where('id', decrypt($id))->where('role', Auth::guard('web')->user()->role ?? Auth::guard('staf')->user()->role)->get();
        if ($folder->isEmpty()) {
            return redirect()->back();
        } else {
            $file = file::where('id_folder', decrypt($id))->where('role', Auth::guard('web')->user()->role ?? Auth::guard('staf')->user()->role)->get();
            return view('content.staff.file', [
                'folder' => $file,
                'id_folder' => $id,
            ]);
        }
    }
}
