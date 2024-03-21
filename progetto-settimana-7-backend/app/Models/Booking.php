<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'timing_id',
        'booked',
        'pending',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(GymCourse::class, 'course_id');
    }

    public function timing()
    {
        return $this->belongsTo(Timing::class, 'timing_id');
    }
}
