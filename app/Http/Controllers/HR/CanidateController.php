<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Candidate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CanidateController extends Controller
{
    public function list_applications(Request $request)
    {
        $candidates = Candidate::query();

        $candidates_before_filtered = $candidates->get();

        $query_name = $request->query('name');
        $query_status = $request->query('status');

        if ($query_name) {
            $candidates = $candidates->where('name', 'like', '%' . $query_name . '%');
        }
        if ($query_status) {
            $candidates = $candidates->where('status', $query_status);
        }

        if (!is_a($candidates, 'Illuminate\Database\Eloquent\Collection')) {
            $candidates = $candidates->get();
        }

        foreach ($candidates as $candidate) {
            $candidate->job_title = $candidate->application->job?->name;
            $candidate->job_id = $candidate->application->job?->id;
        }

        return view('company.applications.index', [
            "role" => User::DISPLAYED_ROLE[Auth::user()->role],
            "breadcrumb_tabs" => ["Quản lý ứng viên" => ""],
            'candidates' => $candidates,
            'candidates_before_filtered' => $candidates_before_filtered,
            'query_name' => $query_name,
            'query_status' => $query_status
        ]);
    }

    public function search_applications(Request $request)
    {
        $urlWithQuery = $request->fullUrlWithQuery([
            'name' => $request->input('name'),
            'status' => $request->input('status')
        ]);

        return redirect($urlWithQuery);
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

    public function update(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        $candidate = $application->candidate;

        $candidate->birthday = !is_null($request->input('birthday')) ? $request->input('birthday') : $candidate->birthday;
        $candidate->gender = !is_null($request->input('gender')) ? $request->input('gender') : $candidate->gender;
        $candidate->identity_card = !is_null($request->input('identity_card')) ? $request->input('identity_card') : $candidate->identity_card;
        $candidate->address = !is_null($request->input('address')) ? $request->input('address') : $candidate->address;

        $candidate->save();

        session()->flash('success', 'Cập nhật hồ sơ ứng viên thành công!');

        return back();
    }

    public function show_recruiment_process($id)
    {
        $application = Application::findOrFail($id);
        $candidate_status = $application->candidate->status;
        $candidate_comment = $application->candidate->comment;

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
            'comment' => $candidate_comment,
            'interview' => $interview,
            'interviewers' => $interviewers
        ]);
    }

    public function post_comment(Request $request, $id)
    {
        // echo $request->input('comment');
        $application = Application::findOrFail($id);
        $candidate = $application->candidate;
        $candidate->comment = $request->input('comment');
        $candidate->save();

        session()->flash('success', 'Cập nhật thông tin thành công');

        return back();
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
