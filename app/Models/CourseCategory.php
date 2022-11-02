<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;

    protected $table = 'course_categories';

    protected $primaryKey = 'id';

    public function level(){
        return $this->belongsTo(Level::class);
    }
    public function tutor(){
        return $this->belongsTo(Tutor::class);
    }
    public function courses(){
        return $this->hasMany(Course::class);
    }
}
