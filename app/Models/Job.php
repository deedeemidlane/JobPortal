<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'employment_type',
        'position',
        'salary',
        'deadline',
        'description',
        'requirement',
        'benefit',
        'location',
        'workplace',
        'working_time'
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }
}
