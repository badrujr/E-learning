<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $primaryKey = 'id';

    public function courseVideo(){
        return $this->belongsTo(CourseVideo::class);
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function tutor(){
        return $this->belongsTo(Tutor::class);
    }
}
