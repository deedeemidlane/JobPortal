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
        $jobs = Job::all();

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
                $salary = "Lên đến " . $request->input('max_salary');
            } else {
                $salary = number_format($request->input('min_salary'), 0, ',', '.') . " ₫" . " - " . number_format($request->input('max_salary'), 0, ',', '.') . " ₫";
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
            //throw $th;
            session()->flash('error', 'Có lỗi xảy ra');

            DB::rollBack();
        }

        return redirect('/hr/recruitment-news');
    }
}
