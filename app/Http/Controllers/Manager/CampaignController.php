<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCampaignRequest;
use App\Http\Requests\CreateRecruitmentNewsRequest;
use App\Models\Campaign;
use App\Models\Job;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
    public function list_campaigns()
    {
        $user = Auth::user();
        $campaigns = Campaign::orderByDesc('created_at')->get();
        foreach ($campaigns as $campaign) {
            $campaign->user_in_charge = User::where("id", $campaign->user_in_charge_id)->first()->name;
            $campaign->is_active = DateTime::createFromFormat('d/m/Y', $campaign->end_time) > new DateTime();
        }

        return view('company.campaigns.index', [
            "role" => User::DISPLAYED_ROLE[$user->role],
            "breadcrumb_tabs" => ["Chiến dịch tuyển dụng" => ""],
            "campaigns" => $campaigns
        ]);
    }

    public function create()
    {
        $user = Auth::user();
        $managers = User::where('role', "MANAGER")->get();

        return view('company.campaigns.create', [
            "role" => User::DISPLAYED_ROLE[$user->role],
            "breadcrumb_tabs" => ["Chiến dịch tuyển dụng" => "/company/campaigns", "Thêm chiến dịch" => ""],
            "managers" => $managers
        ]);
    }

    public function post_create(CreateCampaignRequest $request)
    {
        $validated = $request->validated();

        DB::beginTransaction();

        try {
            $new_campaign = Campaign::create($validated);

            $jobs = $request->session()->get('jobs');
            if (!is_null($jobs)) {
                foreach ($jobs as $job) {
                    $salary = "";

                    if ($job["negotiable"] == 0) {
                        $salary = "Thỏa thuận";
                    } else {
                        if ($job['min_salary'] == "0") {
                            $salary = "Lên đến " . $job['max_salary'] . " triệu";
                        } else {
                            $salary = $job['min_salary'] . " - " . $job['max_salary'] . " triệu";
                        }
                    }

                    $working_time = $job['start_date'] . " - " . $job['end_date'] . " (" . $job['start_time'] . " - " . $job['end_time'] . ")";

                    Job::create([
                        'campaign_id' => $new_campaign->id,
                        'name' => $job['name'],
                        'employment_type' => $job['employment_type'],
                        'position' => $job['position'],
                        'salary' => $salary,
                        'deadline' => $job['deadline'],
                        'description' => $job['description'],
                        'requirement' => $job['requirement'],
                        'benefit' => $job['benefit'],
                        'location' => $job['location'],
                        'workplace' => $job['workplace'],
                        'working_time' => $working_time
                    ]);
                }
            }

            $request->session()->forget("jobs");

            session()->flash('success', 'Thêm chiến dịch thành công!');

            DB::commit();
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }

        return redirect("/company/campaigns");
    }

    public function add_job(CreateRecruitmentNewsRequest $request)
    {
        $validated = $request->validated();

        $validated['negotiable'] = $request->input('negotiable', 1);
        $validated['min_salary'] = $request->input('min_salary');
        $validated['max_salary'] = $request->input('max_salary');

        $jobs = $request->session()->has('jobs') ? $request->session()->get('jobs') : [];

        $jobs[] = $validated;

        $request->session()->put('jobs', $jobs);

        return $validated;
    }

    public function remove_job(Request $request)
    {
        $request->session()->put("jobs", $request->input("new_job_list"));
    }

    public function show($id)
    {
        $user = Auth::user();
        $managers = User::where('role', "MANAGER")->get();
        $campaign = Campaign::findOrFail($id);
        $jobs = $campaign->jobs;

        return view('company.campaigns.update', [
            "role" => User::DISPLAYED_ROLE[$user->role],
            "breadcrumb_tabs" => ["Chiến dịch tuyển dụng" => "/company/campaigns", $campaign->name => ""],
            "managers" => $managers,
            "campaign" => $campaign,
            "jobs" => $jobs
        ]);
    }

    public function post_update($id)
    {
        echo $id;
    }

    public function delete($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->delete();
        session()->flash('success', 'Xóa chiến dịch thành công!');
        return redirect('/company/campaigns');
    }

    public function list_recruitment_news($id)
    {
        $user = Auth::user();
        $campaign = Campaign::findOrFail($id);
        $jobs = $campaign->jobs;
        foreach ($jobs as $job) {
            $job->application_count = $job->applications->count();
        }

        return view('company.campaigns.list-recruitment-news', [
            "role" => User::DISPLAYED_ROLE[$user->role],
            "breadcrumb_tabs" => ["Chiến dịch tuyển dụng" => "/company/campaigns", $campaign->name => "/company/campaigns/" . $campaign->id, "Vị trí tuyển dụng" => ""],
            "campaign" => $campaign,
            "jobs" => $jobs
        ]);
    }
}
