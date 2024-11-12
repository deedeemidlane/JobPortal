<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    public function list_campaigns()
    {
        $user = Auth::user();

        return view('company.campaigns.index', [
            "role" => User::DISPLAYED_ROLE[$user->role],
            "breadcrumb_tabs" => ["Chiến dịch tuyển dụng" => ""],
        ]);
    }
}
