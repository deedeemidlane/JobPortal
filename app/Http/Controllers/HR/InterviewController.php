<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    public function list_interviews()
    {
        return view('hr.interview-management', [
            "tab_name" => "Quản lý tin tuyển dụng",
            "breadcrumb_url" => "/hr/interview-management",
        ]);
    }
}
