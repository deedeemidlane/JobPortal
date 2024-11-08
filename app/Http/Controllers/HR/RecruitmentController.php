<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRecruitmentNewsRequest;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecruitmentController extends Controller
{
    public function list_recruitment_news()
    {
        $jobs = Job::orderByDesc('created_at')->get();
        foreach ($jobs as $job) {
            $job->application_count = $job->applications->count();
        }

        return view('hr.recruitment-news', [
            "tab_name" => "Quản lý tin tuyển dụng",
            "breadcrumb_url" => "/hr/recruitment-news",
            "jobs" => $jobs
        ]);
    }

    public function create()
    {
        return view('hr.create-recruitment-news', [
            "tab_name" => "Quản lý tin tuyển dụng",
            "breadcrumb_url" => "/hr/recruitment-news",
        ]);
    }

    public function post_create(CreateRecruitmentNewsRequest $request)
    {
        $validated = $request->validated();

        $salary = "";

        if ($request->input('negotiable', 1) == 0) {
            $salary = "Thỏa thuận";
        } else {
            if ($request->input('min_salary') == "0") {
                $salary = "Lên đến " . $request->input('max_salary') . " triệu";
            } else {
                $salary = $request->input('min_salary') . " - " . $request->input('max_salary') . " triệu";
            }
        }

        $working_time = $validated['start_date'] . " - " . $validated['end_date'] . " (" . $validated['start_time'] . " - " . $validated['end_time'] . ")";

        DB::beginTransaction();

        try {
            Job::create([
                'name' => $validated['name'],
                'employment_type' => $validated['employment_type'],
                'position' => $validated['position'],
                'salary' => $salary,
                'deadline' => $validated['deadline'],
                'description' => $validated['description'],
                'requirement' => $validated['requirement'],
                'benefit' => $validated['benefit'],
                'location' => $validated['location'],
                'workplace' => $validated['workplace'],
                'working_time' => $working_time
            ]);

            session()->flash('success', 'Đăng tin tuyển dụng thành công!');

            DB::commit();
        } catch (\Throwable $th) {
            throw $th;
            session()->flash('error', 'Có lỗi xảy ra');

            DB::rollBack();
        }

        return redirect('/hr/recruitment-news');
    }

    public function update($id)
    {
        $job = Job::findOrFail($id);

        if ($job->salary != "Thỏa thuận") {
            if (str_contains($job->salary, " - ")) {
                $job->min_salary = explode(" ", $job->salary)[0];
                $job->max_salary = explode(" ", $job->salary)[2];
            } else {
                $job->min_salary = 0;
                $job->max_salary = explode(" ", $job->salary)[2];
            }
        }

        preg_match("/^(.*?) - (.*?) \((\d{2}:\d{2}) - (\d{2}:\d{2})\)$/", $job->working_time, $matches);

        $job->start_date = $matches[1];
        $job->end_date = $matches[2];
        $job->start_time = $matches[3];
        $job->end_time = $matches[4];

        return view('hr.update-recruitment-news', [
            "tab_name" => "Quản lý tin tuyển dụng",
            "breadcrumb_url" => "/hr/recruitment-news",
            "job" => $job
        ]);
    }

    public function post_update(CreateRecruitmentNewsRequest $request, $id)
    {
        $validated = $request->validated();

        $job = job::findOrFail($id);

        $salary = "";

        if ($request->input('negotiable', 1) == 0) {
            $salary = "Thỏa thuận";
        } else {
            if ($request->input('min_salary') == "0") {
                $salary = "Lên đến " . $request->input('max_salary') . " triệu";
            } else {
                $salary = $request->input('min_salary') . " - " . $request->input('max_salary') . " triệu";
            }
        }

        $working_time = $validated['start_date'] . " - " . $validated['end_date'] . " (" . $validated['start_time'] . " - " . $validated['end_time'] . ")";

        $job->name = !is_null($validated['name']) ? $validated['name'] : $job->name;
        $job->employment_type = !is_null($validated['employment_type']) ? $validated['employment_type'] : $job->employment_type;
        $job->position = !is_null($validated['position']) ? $validated['position'] : $job->position;
        $job->salary = $salary != "" ? $salary : $job->salary;
        $job->deadline = !is_null($validated['deadline']) ? $validated['deadline'] : $job->deadline;
        $job->description = !is_null($validated['description']) ? $validated['description'] : $job->description;
        $job->requirement = !is_null($validated['requirement']) ? $validated['requirement'] : $job->requirement;
        $job->benefit = !is_null($validated['benefit']) ? $validated['benefit'] : $job->benefit;
        $job->location = !is_null($validated['location']) ? $validated['location'] : $job->location;
        $job->workplace = !is_null($validated['workplace']) ? $validated['workplace'] : $job->location;
        $job->working_time = $working_time != "" ? $working_time : $job->working_time;

        $job->save();

        session()->flash('success', 'Cập nhật tin tuyển dụng thành công!');

        return redirect('/hr/recruitment-news');
    }

    public function delete($id)
    {
        $job = Job::findOrFail($id);

        $job->delete();

        session()->flash('success', 'Xóa tin tuyển dụng thành công!');

        return redirect('/hr/recruitment-news');
    }
}
