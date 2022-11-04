<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseVideo extends Model
{
    use HasFactory;

    protected $table = 'course_videos';

    protected $primaryKey = 'id';

    public function course(){
        return $this->belongsTo(Course::class);
    }
 
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function bookmark(){
        return $this->hasMany(Bookmark::class);
    }
}
