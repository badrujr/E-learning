<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $primaryKey = 'id';

    public function courseCategory(){
        return $this->belongsTo(CourseCategory::class);
    }
    public function courseVideo(){
        return $this->hasMany(CourseVideo::class);
    }

    public function coursePdf(){
        return $this->hasMany(CoursePdf::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function quiz(){
        return $this->hasMany(Quiz::class);
    }
    public function student(){
        return $this->hasMany(Student::class);
    }
    public function cart(){
        return $this->hasMany(Cart::class);
    }
    public function tutor(){
        return $this->belongsTo(Tutor::class);
    }
    
}
