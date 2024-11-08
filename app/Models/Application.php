<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'candidate_name',
        'candidate_email',
        'candidate_phone',
        'cv_path',
        'cover_letter'
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }
}
