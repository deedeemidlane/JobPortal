<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CanidateController extends Controller
{
    public function list_candidates()
    {
        return view('hr.candidate-management', [
            "tab_name" => "Quản lý tin tuyển dụng",
            "breadcrumb_url" => "/hr/recruitment-news",
        ]);
    }
}
