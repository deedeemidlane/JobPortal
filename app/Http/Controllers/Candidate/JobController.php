<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplyJobRequest;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function home()
    {
        $latest_jobs = Job::orderByDesc('created_at')->limit(5)->get();
        return view('candidate.home', [
            'current_page' => 'home',
            'latest_jobs' => $latest_jobs
        ]);
    }

    public function list_jobs()
    {
        $jobs = Job::all();
        return view('candidate.job-list', [
            'current_page' => 'job-list',
            'jobs' => $jobs
        ]);
    }

    public function job_detail($id)
    {
        $job = Job::findOrFail($id);

        return view('candidate.job-detail', [
            'current_page' => 'job-detail',
            'job' => $job
        ]);
    }

    public function apply(ApplyJobRequest $request, $id)
    {
        $validated = $request->validated();

        $current_job = Job::findOrFail($id);

        $cv_path = "";

        if ($request->hasfile('cv')) {
            $cv = $request->file('cv');
            $cvName = time() . rand(1, 100) . '.' . $cv->extension();

            if ($cv->move(public_path('uploads'), $cvName)) {
                $cv_path = '/' . 'uploads/' . $cvName;
                echo $cv_path;
            } else {
                session()->flash('error', 'Upload CV thất bại');
                return back();
            }
        }

        DB::beginTransaction();

        try {
            Application::create([
                'job_id' => $current_job->id,
                'candidate_name' => $validated['candidate_name'],
                'candidate_email' => $validated['candidate_email'],
                'candidate_phone' => $validated['candidate_phone'],
                'cv_path' => $cv_path,
                'cover_letter' => $request->input('cover_letter'),
            ]);

            session()->flash('success', 'Ứng tuyển thành công!');

            DB::commit();
        } catch (\Throwable $th) {
            throw $th;
            // session()->flash('error', 'Có lỗi xảy ra');

            DB::rollBack();
        }

        return redirect('/jobs');
    }

    public function search(Request $request)
    {

        return view('candidate.job-list', [
            'current_page' => 'job-list',
            // 'jobs' => $jobs
        ]);
    }
}
