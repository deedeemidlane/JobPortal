<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class CanidateController extends Controller
{
    public function list_applications()
    {
        $applications = Application::all();
        foreach ($applications as $application) {
            $application->job_title = $application->job?->name;
            $application->job_id = $application->job?->id;
        }

        return view('hr.applications', [
            "tab_name" => "Quản lý tin tuyển dụng",
            "breadcrumb_url" => "/hr/recruitment-news",
            'applications' => $applications
        ]);
    }

    public function delete($id)
    {
        $application = Application::findOrFail($id);

        $application->delete();

        session()->flash('success', 'Xóa ứng viên thành công!');

        return redirect('/hr/applications');
    }
}
