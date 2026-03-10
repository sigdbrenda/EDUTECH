<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Section;
use App\Models\User;

class Course extends Model
{
    protected $fillable = [
        'title', 
        'language', 
        'user_id', 
        'status', 
        'description',
        'learning_goals',
        'price',
        'summary', 
        'level', 
        'image_path',
        'learning_outcomes', 
        'requirements'
    ];

    protected $casts = [
    'learning_outcomes' => 'array',
    'requirements' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

  
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
