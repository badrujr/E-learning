<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLike extends Model
{
    use HasFactory;

    protected $table = 'course_likes';

    protected $primaryKey = 'id';

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
