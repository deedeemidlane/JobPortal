<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('admin.dashboard', [
            "tab_name" => "Trang chủ",
            "breadcrumb_url" => "/admin/user-management",
        ]);
    }
}
