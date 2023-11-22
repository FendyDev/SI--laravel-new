<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\staf;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function Auth(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);


        $users = $request->only('username', 'password');

        if (Auth::guard('web')->attempt($users)) {
            return redirect()->route('/');
        } elseif (Auth::guard('staf')->attempt($users)) {
            return redirect()->route('/');
        } else {
            return $users;
        }
       
    }

    public function index()
    {
        if (Auth::guard('web')->check() || Auth::guard('staf')->check()) {
            if (Auth::guard('web')->check() && Auth::guard('web')->user()->level == 'Admin') {
                $data = Folder::all();
                return view('content.Admin.index', [
                    'title' => 'Admin',
                    'folder' =>$data
                ]);
            } else if (Auth::guard('web')->check() && Auth::guard('web')->user()->level == 'SuperAdmin') {
                return view('content.SuperAdmin.index', [
                    'title' => 'SuperAdmin'
                ]);
            } else if (Auth::guard('staf')->check() && Auth::guard('staf')->user()->level == 'Staff') {
                return view('content.staff.index', [
                    'title' => 'Staff',
                ]);
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function admin()
    {
        return view('components.login.admin', [
            'title' => 'admin',
        ]);
    }

    public function server(){
        $data_folder = Folder::Where('role', Auth::guard('staf')->user()->role)->get();
        return view('content.staff.server', [
            'title' => 'Server',
            'folder' => $data_folder
        ]);
    }
}
