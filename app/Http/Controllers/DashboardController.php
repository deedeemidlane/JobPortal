<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('admin.dashboard', [
            "tab_name" => "Trang chủ"
        ]);
    }
}
