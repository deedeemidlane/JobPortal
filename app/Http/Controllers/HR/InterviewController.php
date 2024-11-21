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

        $pre_interview_info = [
            'name' => $validated['name'],
            'type' => $validated['type'],
            'date' => $validated['date'],
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'interviewer_names' => $interviewer_names,
            'interviewer_emails' => $interviewer_emails,
        ];

        $request->session()->put('pre_interview_info', $pre_interview_info);

        return redirect('/company/interviews/create/select-candidate');
    }

    public function select_candidate()
    {
        $candidates = Candidate::all();

        return view('company.interviews.create-select-candidate', [
            "role" => User::DISPLAYED_ROLE[Auth::user()->role],
            "breadcrumb_tabs" => ["Lịch phỏng vấn" => "/company/interviews", "Tạo mới" => ""],
            "candidates" => $candidates
        ]);
    }

    public function post_select_candidate(Request $request)
    {
        $pre_interview_info = $request->session()->get('pre_interview_info');

        DB::beginTransaction();

        try {
            $new_interview = Interview::create([
                'name' => $pre_interview_info['name'],
                'type' => $pre_interview_info['type'],
                'date' => $pre_interview_info['date'],
                'start_time' => $pre_interview_info['start_time'],
                'end_time' => $pre_interview_info['end_time'],
                'interviewer_names' => serialize($pre_interview_info['interviewer_names']),
                'interviewer_emails' => serialize($pre_interview_info['interviewer_emails']),
                'status' => "Chờ xác nhận"
            ]);

            $candidate_ids = explode(",", $request->input("candidates"));

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

        $request->session()->forget('pre_interview_info');

        return redirect('/company/interviews');
    }

    public function show($id)
    {
        $interview = Interview::findOrFail($id);

        $interviewer_names = unserialize($interview->interviewer_names);
        $interviewer_emails = unserialize($interview->interviewer_emails);
        $interviewers = [];

        for ($i = 0; $i < count($interviewer_names); $i++) {
            $interviewers[] = [
                'name' => $interviewer_names[$i],
                'email' => $interviewer_emails[$i]
            ];
        }

        $interview->interviewers = $interviewers;

        $candidates = InterviewCandidate::where('interview_id', $interview->id)
            ->with('candidate')
            ->get()
            ->pluck('candidate');

        return view('company.interviews.show', [
            "role" => User::DISPLAYED_ROLE[Auth::user()->role],
            "breadcrumb_tabs" => ["Lịch phỏng vấn" => "/company/interviews", "Thông tin chi tiết" => ""],
            "interview" => $interview,
            "candidates" => $candidates
        ]);
    }
}
