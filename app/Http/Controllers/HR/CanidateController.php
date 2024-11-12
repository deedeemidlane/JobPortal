<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CanidateController extends Controller
{
    public function list_applications()
    {
        $applications = Application::all();
        foreach ($applications as $application) {
            $application->job_title = $application->job?->name;
            $application->job_id = $application->job?->id;
        }

        return view('company.applications.index', [
            "role" => User::DISPLAYED_ROLE[Auth::user()->role],
            "breadcrumb_tabs" => ["Tin tuyển dụng" => "/company/applications", "Quản lý ứng viên" => ""],
            'applications' => $applications
        ]);
    }

    public function delete($id)
    {
        $application = Application::findOrFail($id);

        $application->delete();

        session()->flash('success', 'Xóa ứng viên thành công!');

        return redirect('/company/applications');
    }
}
