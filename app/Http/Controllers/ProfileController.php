<?php

namespace App\Http\Controllers;

use App\Models\staf;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProfileController extends Controller
{
    //Super Admin and Admin
    public function profile()
    {
        if (Auth::guard('web')->user()) {
            $id = Auth::guard('web')->user()->id;
            $data = Admin::where('id', $id)->get();
            return view('components.profile.index', [
                'data' => $data
            ]);
        } else if (Auth::guard('staf')->user()) {
            $id = Auth::guard('staf')->user()->id;
            $data = staf::where('id', $id)->get();
            return view('components.profile.index', [
                'data' => $data
            ]);
        }
    }

    //Super Update Profile
    public function update(Request $request, $id)
    {
        if (Auth::guard('web')->user()) {
            $user = Admin::find($id);
            $img = $request->file('image');
            if ($img) {
                $filename = $img->getClientOriginalName();
                $img->move(public_path('uploads/profile'), $filename);
            } else {
                $filename = Auth::guard('web')->user()->image;
            }
            if ($filename) {
                $user->update([
                    'username' => $request->username,
                    'nama_lengkap' => $request->nama_lengkap,
                    'password' => $request->password,
                    'role' => $request->role,
                    'image' => $filename
                ]);
            }


            $user->save();

            return redirect()->back()->with('success', 'Profile Berhasil Diubah!');
        } else if (Auth::guard('staf')->user()) {
            $user = staf::find($id);
            $img = $request->file('image');
            if ($img) {
                $filename = $img->getClientOriginalName();
                $img->move(public_path('uploads/profile'), $filename);
            } else {
                $filename = Auth::guard('web')->user()->image;
            }
            if ($filename) {
                $user->update([
                    'username' => $request->username,
                    'nama_lengkap' => $request->nama_lengkap,
                    'password' => $request->password,
                    'image' => $filename
                ]);
            }

            $user->save();

            return redirect()->back()->with('success', 'Profile Berhasil Diubah!');
        }
    }

    // Menghapus Foto Profile
    public function hapus(Request $request)
    {
        $user = admin::find(Auth::guard('web')->user()->id);
        $user->update([
            'image' => 'p.jpg'
        ]);

        return redirect()->back()->with('delete', 'Berhasil Menghapus Profile');
    }
}
