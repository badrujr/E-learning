<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePdf extends Model
{
    use HasFactory;

    protected $table = 'course_pdfs';

    protected $primaryKey = 'id';

    public function course(){
        return $this->belongTo(Course::class);
    }
}
