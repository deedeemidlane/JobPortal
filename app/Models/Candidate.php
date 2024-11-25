<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'cv_path',
        'cover_letter',
        'status'
    ];

    public function application(): HasOne
    {
        return $this->hasOne(Application::class);
    }

    public function interview_candidate(): HasOne
    {
        return $this->hasOne(InterviewCandidate::class);
    }
}
