<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateInterviewRequest;
use App\Models\Application;
use App\Models\Candidate;
use App\Models\Interview;
use App\Models\InterviewCandidate;
use App\Models\Job;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InterviewController extends Controller
{
    public function list_interviews()
    {
        $interviews = Interview::all();
        foreach ($interviews as $interview) {
            $interview->candidate_count = $interview->interview_candidate()->count();
        }

        return view('company.interviews.index', [
            "role" => User::DISPLAYED_ROLE[Auth::user()->role],
            "breadcrumb_tabs" => ["Lịch phỏng vấn" => ""],
            "interviews" => $interviews
        ]);
    }

    // public function pre_create()
    // {
    //     $jobs = Job::all();

    //     $filtered_jobs = $jobs->filter(function ($job) {
    //         return DateTime::createFromFormat('d/m/Y', $job->deadline) > new DateTime();
    //     })->all();

    //     return view('company.interviews.pre-create', [
    //         "role" => User::DISPLAYED_ROLE[Auth::user()->role],
    //         "breadcrumb_tabs" => ["Lịch phỏng vấn" => "/company/interviews", "Tạo mới" => ""],
    //         "jobs" => $filtered_jobs
    //     ]);
    // }

    // public function post_pre_create(Request $request)
    // {
    //     $request->session()->put('job_id', $request->input('job_id'));
    //     return redirect('/company/interviews/create');
    // }

    public function create()
    {
        return view('company.interviews.create', [
            "role" => User::DISPLAYED_ROLE[Auth::user()->role],
            "breadcrumb_tabs" => ["Lịch phỏng vấn" => "/company/interviews", "Tạo mới" => ""]
        ]);
    }

    public function post_create(CreateInterviewRequest $request)
    {
        $validated = $request->validated();

        DB::beginTransaction();

        $interviewer_names = [$validated['interviewer_name']];
        $interviewer_emails = [$validated['interviewer_email']];

        if ($request->input('interviewer_indices')) {
            $interviewer_indices = explode(",", $request->input('interviewer_indices'));
            foreach ($interviewer_indices as $interviewer_index) {
                if (
                    $request->input('interviewer_name_' . $interviewer_index)
                    && $request->input('interviewer_email_' . $interviewer_index)
                ) {
                    $interviewer_names[] = $request->input('interviewer_name_' . $interviewer_index);
                    $interviewer_emails[] = $request->input('interviewer_email_' . $interviewer_index);
                }
            }
        }

        try {
            $new_interview = Interview::create([
                'name' => $validated['name'],
                'type' => $validated['type'],
                'date' => $validated['date'],
                'start_time' => $request->input('start_time'),
                'end_time' => $request->input('end_time'),
                'interviewer_names' => serialize($interviewer_names),
                'interviewer_emails' => serialize($interviewer_emails),
                'status' => "Chờ xác nhận"
            ]);

            $candidate_ids = [$validated['candidate_id']];

            if ($request->input('candidate_indices')) {
                $candidate_indices = explode(",", $request->input('candidate_indices'));
                foreach ($candidate_indices as $candidate_index) {
                    if ($request->input('candidate_id_' . $candidate_index)) {
                        $candidate_ids[] = $request->input('candidate_id_' . $candidate_index);
                    }
                }
            }

            foreach ($candidate_ids as $candidate_id) {
                InterviewCandidate::create([
                    'interview_id' => $new_interview->id,
                    'candidate_id' => $candidate_id
                ]);
            }

            session()->flash('success', 'Tạo lịch phỏng vấn thành công!');

            DB::commit();
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }

        $request->session()->forget('job_id');

        return redirect('/company/interviews');
    }

    public function show($id, Request $request)
    {
        $interview = Interview::findOrFail($id);
        $candidates = Candidate::all();

        return view('company.interviews.show', [
            "role" => User::DISPLAYED_ROLE[Auth::user()->role],
            "breadcrumb_tabs" => ["Lịch phỏng vấn" => "/company/interviews", "Thông tin chi tiết" => ""],
            "interview" => $interview,
            "candidates" => $candidates
        ]);
    }
}
