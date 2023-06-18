<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleTable extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
    public function student(){
        return $this->belongsTo(User::class,'student_id');
    }
}
