<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        if (session()->has('level') != null) {
            if (session()->get('level') == 'staf') {
                return view('content.staff.index', [
                    'title' => 'staff',
                ]);
            }
            else if (session()->get('level') == 'Admin') {
                return view('content.admin.index', [
                    'title' => 'Admin'
                ]);
            }
            else if (session()->get('level') == 'SuperAdmin') {
                return view('content.SuperAdmin.index', [
                    'title' => 'Admin'
                ]);
            }
            
        }else{
            return view('components.login.index', [
                'title' => 'Home',
            ]);
        }
    }
    public function admin()
    {
        return view('components.login.admin', [
            'title' => 'admin',
        ]);
    }   
}
