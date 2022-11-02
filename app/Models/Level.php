<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $table = 'levels';

    protected $primaryKey = 'id';

    public function courseCategory(){
        return $this->hasMany(CourseCategory::class);
    }
}
