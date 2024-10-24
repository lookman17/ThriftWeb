<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard_admin() {
        return view('admin.dashboard_admin');
    }
    public function dashboard_pengguna() {
        return view('pengguna.dashboard_pengguna');
    }
}
