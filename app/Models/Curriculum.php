<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $table = 'curriculums';
    use HasFactory;

    protected $fillable = ['name','week_day','class_time','end_date','course_id'];

    public function homeworks() {
        return $this->hasMany(Homework::class);
    }

    public function attendance() {
        return $this->hasMany(Attendance::class);
    }
}
