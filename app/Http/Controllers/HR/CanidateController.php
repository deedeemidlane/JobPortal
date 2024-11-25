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
            "breadcrumb_tabs" => ["Quản lý ứng viên" => ""],
            'applications' => $applications
        ]);
    }

    public function show($id)
    {
        $application = Application::findOrFail($id);

        return view('company.applications.show', [
            "role" => User::DISPLAYED_ROLE[Auth::user()->role],
            "breadcrumb_tabs" => ["Quản lý ứng viên" => "/company/applications", "Chi tiết ứng viên" => ""],
            'application' => $application
        ]);
    }

    public function show_recruiment_process($id)
    {
        $application = Application::findOrFail($id);
        $candidate_status = $application->candidate->status;

        $interview = $application->candidate->interview_candidate?->interview;
        $interviewers = [];

        if ($interview && $interview->type === $candidate_status) {
            $interviewer_names = unserialize($interview->interviewer_names);
            $interviewer_emails = unserialize($interview->interviewer_emails);

            for ($i = 0; $i < count($interviewer_names); $i++) {
                $interviewers[] = [
                    'name' => $interviewer_names[$i],
                    'email' => $interviewer_emails[$i]
                ];
            }
        } else {
            $interview = null;
        }

        return view('company.applications.show-recruitment-process', [
            "role" => User::DISPLAYED_ROLE[Auth::user()->role],
            "breadcrumb_tabs" => ["Quản lý ứng viên" => "/company/applications", "Chi tiết ứng viên" => ""],
            'application' => $application,
            'status' => $candidate_status,
            'interview' => $interview,
            'interviewers' => $interviewers
        ]);
    }

    public function update_status($id)
    {
        $application = Application::findOrFail($id);
        $candidate = $application->candidate;

        switch ($candidate->status) {
            case "Ứng tuyển":
                $candidate->status = "Phỏng vấn chuyên sâu";
                break;
            case "Phỏng vấn chuyên sâu":
                $candidate->status = "Phỏng vấn doanh nghiệp";
                break;
            case "Phỏng vấn doanh nghiệp":
                $candidate->status = "Trúng tuyển";
                break;
            default:
                break;
        }

        $candidate->save();
        return back();
    }

    public function delete($id)
    {
        $application = Application::findOrFail($id);
        $candidate = $application->candidate;
        $candidate->delete();

        session()->flash('success', 'Xóa ứng viên thành công!');

        return redirect('/company/applications');
    }
}
