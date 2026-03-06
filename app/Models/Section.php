<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['title', 'order', 'course_id']; 

    public function lessons() {
        return $this->hasMany(Lesson::class);
    }
}