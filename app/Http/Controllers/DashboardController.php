<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function superadmin()
    {
        return view('dashboard.superadmin_dashboard');
    }
    public function admin()
    {
        return view('dashboard.admin_dashboard');
    }
    public function user()
    {
        return view('dashboard.user_dashboard');
    }
}
