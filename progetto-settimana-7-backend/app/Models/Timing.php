<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timing extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'beginning',
        'end',
    ];

    public function course()
    {
        return $this->belongsTo(GymCourse::class);
    }
}
