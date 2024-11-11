<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function list_campaigns()
    {
        return view('manager.campaigns', [
            "tab_name" => "Chiến dịch tuyển dụng",
            "breadcrumb_url" => "/company/campaigns",
        ]);
    }
}
