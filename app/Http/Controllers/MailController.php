<?php

namespace App\Http\Controllers;

use App\Http\Requests\SetUpMailTemplateRequest;
use App\Models\Mail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function update_interviewer_mail($id)
    {
        $mail = Mail::where('name', 'interviewer-notification')->first();

        return view('company.interviewer-mail', [
            "role" => User::DISPLAYED_ROLE[Auth::user()->role],
            "breadcrumb_tabs" => [
                "Lịch phỏng vấn" => "/company/interviews",
                "Thông tin chi tiết" => "/company/interviews/" . $id,
                "Thiết lập email" => ""
            ],
            "mail" => $mail
        ]);
    }

    public function post_update_interviewer_mail(SetUpMailTemplateRequest $request, $id)
    {
        $validated = $request->validated();

        DB::beginTransaction();

        try {
            $mail = Mail::where('name', 'interviewer-notification')->first();

            if ($mail) {
                $mail->subject = $validated['subject'];
                $mail->content = $validated['content'];
                $mail->save();
            } else {
                Mail::create([
                    'name' => 'interviewer-notification',
                    'subject' => $validated['subject'],
                    'content' => $validated['content']
                ]);
            }

            session()->flash('success', 'Thiết lập email thành công!');

            DB::commit();
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }

        return redirect('/company/interviews/' . $id);
    }

    public function update_candidate_mail($id)
    {
        $mail = Mail::where('name', 'candidate-notification')->first();

        return view('company.candidate-mail', [
            "role" => User::DISPLAYED_ROLE[Auth::user()->role],
            "breadcrumb_tabs" => [
                "Lịch phỏng vấn" => "/company/interviews",
                "Thông tin chi tiết" => "/company/interviews/" . $id,
                "Thiết lập email" => ""
            ],
            "mail" => $mail
        ]);
    }

    public function post_update_candidate_mail(SetUpMailTemplateRequest $request, $id)
    {
        $validated = $request->validated();

        DB::beginTransaction();

        try {
            $mail = Mail::where('name', 'candidate-notification')->first();

            if ($mail) {
                $mail->subject = $validated['subject'];
                $mail->content = $validated['content'];
                $mail->save();
            } else {
                Mail::create([
                    'name' => 'candidate-notification',
                    'subject' => $validated['subject'],
                    'content' => $validated['content']
                ]);
            }

            session()->flash('success', 'Thiết lập email thành công!');

            DB::commit();
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }

        return redirect('/company/interviews/' . $id);
    }
}
